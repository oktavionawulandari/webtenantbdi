@extends('main-layouts.template')
@section('title', 'Edit Data')
@include('navigasi.nav-tenant')
@section('container')
    @if ($tenant_members)
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 border-bottom">Data Users ( {{ $tenant_members->full_name }} )</h4>
                    <form class="forms-sample" action="{{ route('members.update', $tenant_members->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label></label>
                            <div>
                                <input type="hidden" class="form-control @error('process')is-invalid @enderror"
                                    id="process" name="process" value="Pending" required />
                            </div>
                            <span class="badge bg-info text-light">
                                <i class="mdi mdi-alert-circle menu-icon" style="font-size: 15px">
                                    Jika kesalahan bukan pada foto profile atau ktp, mohon untuk mengunggah ulang foto
                                    dengan file yang sama.
                                </i>
                            </span>
                        </div>
                        <div class="form-group">
                            @if ($tenant_members->profile)
                                <label for="profile" class="form-label fw-bold mt-3">Foto Profile</label>
                                <img class="img-preview img-fluid mb-3 col-sm-2">
                                <input type="hidden" name="oldProfile"
                                    value="{{ old('profile', $tenant_members->profile) }}">
                                @if ($tenant_members->profile)
                                    <img src="{{ asset('/' . $tenant_members->profile) }}"
                                        class="img-preview img-fluid mb-3 col-sm-3 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-2">
                                @endif
                                <input class="form-control @error('profile')is-invalid @enderror" type="file"
                                    id="profile" name="profile" onchange="previewProfile()">
                                {{-- <span>
                                    <i class="mdi mdi-alert-circle menu-icon" style="font-size: 12px">
                                        Mohon upload ulang foto dengan file yang sama.
                                    </i>
                                </span> --}}
                            @endif
                            @error('profile')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            @if ($tenant_members->ktp)
                                <label for="ktp" class="form-label fw-bold mt-3">Foto KTP</label>
                                <img class="ktp-preview img-fluid mb-3 col-sm-2">
                                <input type="hidden" name="oldKTP" value="{{ old('ktp', $tenant_members->ktp) }}">
                                @if ($tenant_members->ktp)
                                    <img src="{{ asset('/' . $tenant_members->ktp) }}"
                                        class="img-preview img-fluid mb-3 col-sm-3 d-block">
                                @else
                                    <img class="ktp-preview img-fluid mb-3 col-sm-2">
                                @endif
                                <input class="form-control @error('ktp')is-invalid @enderror" type="file" id="ktp"
                                    name="ktp" onchange="previewKTP()">
                                {{-- <span>
                                    <i class="mdi mdi-alert-circle menu-icon" style="font-size: 12px">
                                        Mohon upload ulang foto dengan file yang sama.
                                    </i>
                                </span> --}}
                            @endif
                            @error('ktp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group mt-3">
                            <label for="exampleInputName1">NIK</label>
                            <input type="text" class="form-control @error('nik')is-invalid @enderror" id="nik"
                                name="nik" value="{{ old('nik', $tenant_members->nik) }}" required />
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Nama Lengkap</label>
                            <input type="text" class="form-control @error('full_name')is-invalid @enderror"
                                id="full_name" name="full_name" value="{{ old('full_name', $tenant_members->full_name) }}"
                                required />
                            @error('full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Panggilan</label>
                            <input type="text" class="form-control @error('short_name')is-invalid @enderror"
                                id="short_name" name="short_name"
                                value="{{ old('short_name', $tenant_members->short_name) }}" required />
                            @error('short_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Peran Dalam Team</label>
                            <input type="text" class="form-control @error('position')is-invalid @enderror" id="position"
                                name="position" value="{{ old('position', $tenant_members->position) }}" required />
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
                                        <input type="text" class="form-control @error('birth_place')is-invalid @enderror"
                                            id="birth_place" name="birth_place"
                                            value="{{ old('birth_place', $tenant_members->birth_place) }}" required />
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
                                        <input type="date" class="form-control @error('birth_date')is-invalid @enderror"
                                            id="birth_date" name="birth_date"
                                            value="{{ old('birth_date', $tenant_members->birth_date) }}" required />
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
                                            name="gender" value="{{ old('gender', $tenant_members->gender) }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <input class="form-control @error('religion')is-invalid @enderror" id="religion"
                                            name="religion" value="{{ old('religion', $tenant_members->religion) }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <input class="form-control @error('status')is-invalid @enderror" id="status"
                                            name="status" value="{{ old('status', $tenant_members->status) }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('email')is-invalid @enderror"
                                            id="email" name="email"
                                            value="{{ old('email', $tenant_members->email) }}" required />
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
                                        <input type="text" class="form-control @error('phone')is-invalid @enderror"
                                            id="phone" name="phone"
                                            value="{{ old('phone', $tenant_members->phone) }}" required />
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
                                name="education" value="{{ old('education', $tenant_members->education) }}" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Alamat</label>
                            <input class="form-control  @error('address')is-invalid @enderror" id="address"
                                name="address" value="{{ old('address', $tenant_members->address) }}" required
                                rows="4" />
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1"></label>
                            <input type="hidden" class="form-control  @error('message')is-invalid @enderror"
                                id="message" name="message" value="Menunggu proses validasi ulang" />
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <a href={{ route('members.validation') }} class="btn btn-secondary btn-rounded btn-fw mt-4">
                            Back
                        </a>
                        <button type="submit" class="btn btn-success btn-rounded btn-fw mt-4"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <tr>
            <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
        </tr>
    @endif

    {{-- PREVIEW PROFILE --}}
    <script type="text/javascript">
        function previewProfile() {
            const image = document.querySelector('#profile');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    {{-- PREVIEW KTP --}}
    <script type="text/javascript">
        function previewKTP() {
            const image = document.querySelector('#ktp');
            const imgPreview = document.querySelector('.ktp-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
