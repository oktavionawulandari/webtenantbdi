@extends('main-layouts.template')
@section('title', 'Create New Admin')
@if (Auth::guard('user')->user()->role == 'Super Admin')
    @include('navigasi.nav-superadmin')
@elseif(Auth::guard('user')->user()->role == 'Admin')
    @include('navigasi.nav-admin')
@endif
@section('container')
    <div>
        <div class="header-left card-title mb-4 border-bottom">
            <h3 class="m-0 pr-3">Create New Admin</h3>
        </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form class="form-sample" action="{{ route('superadmin.admin.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nip')is-invalid @enderror"
                                        id="nip" name="nip" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name')is-invalid @enderror"
                                        id="name" name="name" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('username')is-invalid @enderror"
                                        id="username" name="username" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('email')is-invalid @enderror"
                                        id="email" name="email" required />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password')is-invalid @enderror"
                                        id="password" name="password" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Hp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('phone')is-invalid @enderror"
                                        id="phone" name="phone" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('role')is-invalid @enderror"
                                        id="role" name="role" value="Admin" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href={{ route('superadmin.admin.account') }} class="btn btn-secondary btn-rounded btn-fw"> Back
                    </a>
                    <button type="submit" class="btn btn-success btn-rounded btn-fw"> Submit </button>
                </form>
            </div>
        </div>
    </div>
@endsection