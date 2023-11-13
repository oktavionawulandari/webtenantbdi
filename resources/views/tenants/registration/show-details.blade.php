@extends('main-layouts.template')
@section('title', 'Detail Data')
@include('navigasi.nav-tenant')
@section('container')
    @if ($tenant_members)
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 border-bottom">Data Users ( {{ $tenant_members->full_name }} )</h4>
                    <form class="forms-sample" action="{{ route('status.failed', $tenant_members->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-3">
                            <label>Proses</label>
                            <div>
                                @if ($tenant_members->process == 'Pending')
                                    <span class="badge bg-secondary text-light">
                                        <i class="mdi mdi-clock-outline menu-icon"></i>{{ $tenant_members->process }}</span>
                                @elseif($tenant_members->process == 'Success')
                                    <span class="badge bg-success text-light">
                                        <i class="mdi mdi-check-bold menu-icon"></i>{{ $tenant_members->process }}</span>
                                @elseif($tenant_members->process == 'Failed')
                                    <span class="badge bg-danger text-light">
                                        <i class="mdi mdi-alert-circle menu-icon"></i>{{ $tenant_members->process }}</span>
                                @endif
                            </div>
                        </div>
                        @if ($tenant_members->process == 'Failed')
                            <div class="form-group">
                                <label for="exampleTextarea1">Keterangan</label>
                                <input class="form-control  @error('message')is-invalid @enderror" id="message"
                                    name="message" value="{{ $tenant_members->message }}" rows="4" readonly />
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @else
                            <a type="hidden"></a>
                        @endif
                        <div class="form-group">
                            <label>Foto Profile</label>
                            <div>
                                @if ($tenant_members->profile)
                                    <img src="{{ asset('/' . $tenant_members->profile) }}" class="rounded"
                                        style="width: 70px; height: 70px" alt={{ $tenant_members->profile }}>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Foto KTP</label>
                            <div>
                                @if ($tenant_members->ktp)
                                    <img src="{{ asset('/' . $tenant_members->ktp) }}" class="rounded"
                                        style="width: 70px; height: 70px" alt={{ $tenant_members->ktp }}>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="exampleInputName1">NIK</label>
                                <input type="text" class="form-control @error('nik')is-invalid @enderror" id="nik"
                                    name="nik" value="{{ $tenant_members->nik }}" readonly />
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Lengkap</label>
                                <input type="text" class="form-control @error('full_name')is-invalid @enderror"
                                    id="full_name" name="full_name" value="{{ $tenant_members->full_name }}" readonly />
                                @error('full_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Panggilan</label>
                                <input type="text" class="form-control @error('short_name')is-invalid @enderror"
                                    id="short_name" name="short_name" value="{{ $tenant_members->short_name }}" readonly />
                                @error('short_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Peran Dalam Team</label>
                                <input type="text" class="form-control @error('position')is-invalid @enderror"
                                    id="position" name="position" value="{{ $tenant_members->position }}" readonly />
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('birth_place')is-invalid @enderror"
                                                id="birth_place" name="birth_place"
                                                value="{{ $tenant_members->birth_place }}" readonly />
                                            @error('birth_place')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                class="form-control @error('birth_date')is-invalid @enderror"
                                                id="birth_date" name="birth_date" value="{{ $tenant_members->birth_date }}"
                                                readonly />
                                            @error('birth_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Gender</label>
                                        <div class="col-sm-8">
                                            <input class="form-control  @error('gender')is-invalid @enderror" id="gender"
                                                name="gender" value="{{ $tenant_members->gender }}" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Agama</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('religion')is-invalid @enderror"
                                                id="religion" name="religion" value="{{ $tenant_members->religion }}"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('status')is-invalid @enderror"
                                                id="status" name="status" value="{{ $tenant_members->status }}"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('email')is-invalid @enderror" id="email"
                                                name="email" value="{{ $tenant_members->email }}" readonly />
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">No.HP Aktif</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('phone')is-invalid @enderror" id="phone"
                                                name="phone" value="{{ $tenant_members->phone }}" readonly />
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Pendidikan Terakhir</label>
                                <input class="form-control @error('education')is-invalid @enderror" id="education"
                                    name="education" value="{{ $tenant_members->education }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Alamat</label>
                                <input class="form-control  @error('address')is-invalid @enderror" id="address"
                                    name="address" value="{{ $tenant_members->address }}" rows="4" readonly />
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleTextarea1">Message</label>
                                <input class="form-control  @error('message')is-invalid @enderror" id="message"
                                    name="message" value="{{ $tenant_members->message }}" rows="4" readonly />
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}


                            <a href={{ route('members.validation') }} class="btn btn-secondary btn-rounded btn-fw mt-4">
                                Back
                            </a>
                    </form>
                </div>
            </div>
        </div>
    @else
        <tr>
            <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
        </tr>
    @endif

@endsection
