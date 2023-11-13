@extends('main-layouts.template')
@section('title', 'Akun Tenant')
@section('container')
    @if (Auth::guard('user')->user()->role == 'Super Admin')
        @include('navigasi.nav-superadmin')
    @elseif(Auth::guard('user')->user()->role == 'Admin')
        @include('navigasi.nav-admin')
    @endif
    @if ($tenant)
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title border-bottom">Data {{ $tenant->name }}</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            @if ($tenant->logo)
                                <img src="{{ asset('/' . $tenant->logo) }}" class="img-thumbnail"
                                    style="width: 70px; height: 70px" alt={{ $tenant->logo }}>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" class="form-control @error('username')is-invalid @enderror" id="username"
                                name="username" value="{{ $tenant->username }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Angkatan</label>
                            <input type="text" class="form-control @error('batch')is-invalid @enderror" id="batch"
                                name="batch" value="{{ $tenant->batch }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Team</label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name"
                                name="name" value="{{ $tenant->name }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Jenis Usaha/Bisnis</label>
                            <input type="text" class="form-control @error('type')is-invalid @enderror" id="type"
                                name="type" value="{{ $tenant->type }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Badan Usaha</label>
                            <input type="text" class="form-control @error('bussinessEntity')is-invalid @enderror"
                                id="bussinessEntity" name="bussinessEntity" value="{{ $tenant->bussinessEntity }}"
                                readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Deskripsi Singkat</label>
                            <input class="form-control @error('desc')is-invalid @enderror" id="desc" name="desc"
                                value="{{ $tenant->desc }}" readonly />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No. Telp</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('phone')is-invalid @enderror"
                                            id="phone" name="phone" value="{{ $tenant->phone }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Whatsapp</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('whatsapp')is-invalid @enderror"
                                            id="whatsapp" name="whatsapp" value="{{ $tenant->whatsapp }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Instagram</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control  @error('instagram')is-invalid @enderror"
                                            id="instagram" name="instagram" value="{{ $tenant->instagram }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Facebook</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control  @error('facebook')is-invalid @enderror"
                                            id="facebook" name="facebook" value="{{ $tenant->facebook }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lainnya</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control  @error('other')is-invalid @enderror"
                                            id="other" name="other" value="{{ $tenant->other }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Website</label>
                            <input type="text" class="form-control  @error('website')is-invalid @enderror"
                                id="website" name="website" value="{{ $tenant->website }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Company Profile</label>
                            <input type="text" class="form-control  @error('companyLink')is-invalid @enderror"
                                id="companyLink" name="companyLink" value="{{ $tenant->companyLink }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Alamat Tenant</label>
                            <input class="form-control  @error('address')is-invalid @enderror" id="address"
                                name="address" required rows="4" value="{{ $tenant->address }}" readonly />
                        </div>
                        <a href={{ route('admins.tenants.account') }} class="btn btn-secondary btn-rounded btn-fw mt-4">
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

    {{-- <a href={{ route('admins.tenants.account') }} class="btn btn-primary btn-rounded btn-fw mt-4"> Users Tenant
    </a> --}}
@endsection
