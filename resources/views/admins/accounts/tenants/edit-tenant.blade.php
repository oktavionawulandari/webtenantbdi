@extends('main-layouts.template')
@section('title', 'Update Data Tenant')
@if (Auth::guard('user')->user()->role == 'Super Admin')
    @include('navigasi.nav-superadmin')
@elseif(Auth::guard('user')->user()->role == 'Admin')
    @include('navigasi.nav-admin')
@endif
@section('container')
    <div>
        <div class="header-left card-title mb-4 border-bottom">
            <h3 class="m-0 pr-3">Update Data Tenant</h3>
        </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form class="form-sample" action="{{ route('admins.tenants.update', $tenant->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Tenant</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name')is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $tenant->name) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('username')is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username', $tenant->username) }}"
                                        required />
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('email')is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $tenant->email) }}" required />
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password')is-invalid @enderror"
                                        id="password" name="password" value="{{ old('password', $tenant->password) }}"
                                        required />
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Hp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('phone')is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone', $tenant->phone) }}" required />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-3">
                        <a href={{ route('admins.tenants.account') }} class="btn btn-secondary btn-rounded btn-fw"> Batal
                        </a>
                        <button type="submit" class="btn btn-success btn-rounded btn-fw"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
