@extends('main-layouts.template')
@section('title', 'Daftar Tenant')
@include('navigasi.nav-tenant')
@section('container')
    <div class="mb-3">
        <div class="card-title mb-4 border-bottom">LENGKAPI DATA TENANT</div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Data Tenant</h4>
                    <p class="card-description">Silakan lengkapi data tenant Anda di bawah ini!</p>
                    <form class="forms-sample" action="{{ route('profile.tenant.update', $tenant->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="logo" class="form-label fw-bold mt-3">Upload Logo Team</label>
                            <img class="logo-preview img-fluid mb-3 col-sm-2">
                            <input type="file" class="form-control @error('logo')is-invalid @enderror" type="file"
                                id="logo" name="logo" onchange="previewLogo()">

                            <span>
                                <i class="mdi mdi-alert-circle menu-icon" style="font-size: 10px">
                                    Format: jpg, jpeg, png. Maks. 6MB!
                                </i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" class="form-control @error('username')is-invalid @enderror" id="username"
                                name="username" value="{{ old('username', $tenant->username) }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Angkatan</label>
                            <input type="text" class="form-control @error('batch')is-invalid @enderror" id="batch"
                                name="batch" value="{{ old('batch', $tenant->batch) }}" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Team</label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $tenant->name) }}" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Jenis Usaha/Bisnis</label>
                            <select class="form-control @error('type')is-invalid @enderror" id="type" name="type"
                                value="{{ old('type', $tenant->type) }}" required>
                                <option value="Digital">Digital</option>
                                <option value="Kriya">Kriya</option>
                                <option value="Animasi">Animasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Badan Usaha</label>
                            <input type="text" class="form-control @error('bussinessEntity')is-invalid @enderror"
                                id="bussinessEntity" name="bussinessEntity"
                                value="{{ old('bussinessEntity', $tenant->bussinessEntity) }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Deskripsi Singkat</label>
                            <textarea class="form-control @error('desc')is-invalid @enderror" id="desc" name="desc" rows="2"
                                value="{{ old('desc', $tenant->desc) }}" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No. Telp</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('phone')is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone', $tenant->phone) }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Whatsapp</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('whatsapp')is-invalid @enderror"
                                            id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $tenant->whatsapp) }}"
                                            required />
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
                                            id="instagram" name="instagram"
                                            value="{{ old('instagram', $tenant->instagram) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Facebook</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            class="form-control  @error('facebook')is-invalid @enderror" id="facebook"
                                            name="facebook" value="{{ old('facebook', $tenant->facebook) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lainnya</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control  @error('other')is-invalid @enderror"
                                            id="other" name="other" value="{{ old('other', $tenant->other) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Website</label>
                            <input type="text" class="form-control  @error('website')is-invalid @enderror"
                                id="website" name="website" value="{{ old('website', $tenant->website) }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Company Profile</label>
                            <input type="text" class="form-control  @error('companyLink')is-invalid @enderror"
                                id="companyLink" name="companyLink"
                                value="{{ old('companyLink', $tenant->companyLink) }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Alamat Tenant</label>
                            <textarea class="form-control  @error('address')is-invalid @enderror" id="address" name="address" required
                                rows="4" value="{{ old('address', $tenant->address) }}" required></textarea>
                        </div>

                        <a href={{ route('home.tenants') }} class="btn btn-secondary btn-rounded btn-fw"> Back
                        </a>
                        <button type="submit" class="btn btn-success btn-rounded btn-fw"> Submit </button>

                        {{-- <button href="{{ route('tenants.home') }}" class="btn btn-light mr-2">Cancel</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Submit </button> --}}

                        {{-- MODAL --}}
                        {{-- <div class="modal fade" tabindex="-1" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin untuk menyimpan data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tidak</button>
                                        <a href="{{ route('tenants.home.regist') }}" type="submit"
                                            class="btn btn-primary">Ya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- END MODAL --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function previewLogo() {
            const image = document.querySelector('#logo');
            const imgPreview = document.querySelector('.logo-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
