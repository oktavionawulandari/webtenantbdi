@extends('main-layouts.template')
@section('title', 'Update Data Admin')
@include('navigasi.nav-superadmin')
@section('container')
    <div>
        <div class="header-left card-title mb-4 border-bottom">
            <h3 class="m-0 pr-3">Update Data Admin</h3>
        </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form class="form-sample" action="{{ route('superadmin.admin.update', $admin->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nip')is-invalid @enderror"
                                        id="nip" name="nip" value="{{ old('nip', $admin->nip) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name')is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $admin->name) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('username')is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username', $admin->username) }}"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('email')is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $admin->email) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Hp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('phone')is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone', $admin->phone) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('role')is-invalid @enderror"
                                        id="role" name="role" value="{{ old('role', $admin->role) }}" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href={{ route('superadmin.admin.account') }} class="btn btn-secondary btn-rounded btn-fw"> Batal
                        </a>
                        <button type="submit" class="btn btn-success btn-rounded btn-fw"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
