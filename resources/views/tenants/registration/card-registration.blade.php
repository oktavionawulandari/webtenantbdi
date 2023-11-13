@extends('main-layouts.template')
@section('title', 'Daftar Kartu Tenant')
@include('navigasi.nav-tenant')
@section('container')
    <div>
        <div class="card-title mb-4 border-bottom">PENDAFTARAN KARTU TENANT</div>
        {{-- <p class="=mb-5 border-bottom">Daftarkan anggota tenant Anda!</p> --}}

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Registrasi</h4>
                    <p class="card-description">Silakan lengkapi data diri Anda di bawah ini!</p>
                    <form class="forms-sample" action="{{ route('members.registration.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Upload Foto Profile</label>
                            <img class="img-preview img-fluid mb-3 col-sm-2">
                            <input class="form-control form-control-sm @error('profile') is-invalid @enderror"
                                id="profile" type="file" name="profile" onchange="previewProfile()">
                            @error('profile')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span>
                                <i class="mdi mdi-alert-circle menu-icon" style="font-size: 10px">
                                    Format: jpg, jpeg, png. Maks. 6MB!
                                </i>
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Upload Foto KTP</label>
                            <img class="ktp-preview img-fluid mb-3 col-sm-2">
                            <input class="form-control form-control-sm @error('ktp') is-invalid @enderror" id="ktp"
                                type="file" name="ktp" onchange="previewKTP()">
                            @error('ktp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span>
                                <i class="mdi mdi-alert-circle menu-icon" style="font-size: 10px">
                                    Format: jpg, jpeg, png. Maks. 6MB!
                                </i>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">NIK</label>
                            <input type="text" class="form-control @error('nik')is-invalid @enderror" id="nik"
                                name="nik" value="{{ old('nik') }}"
                                placeholder="Masukkan Nomor Induk Kependudukan" />
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Lengkap</label>
                            <input type="text" class="form-control @error('full_name')is-invalid @enderror"
                                id="full_name" name="full_name" value="{{ old('full_name') }}"
                                placeholder="Masukkan nama lengkap sesuai KTP" />
                            @error('full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Panggilan</label>
                            <input type="text" class="form-control @error('short_name')is-invalid @enderror"
                                id="short_name" name="short_name" value="{{ old('short_name') }}"
                                placeholder="Masukkan nama panggilan yang akan dicetak pada kartu" />
                            @error('short_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span>
                                <i class="mdi mdi-alert-circle menu-icon" style="font-size: 10px">
                                    Maksimal 6 huruf!
                                </i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Peran Dalam Team</label>
                            <input type="text" class="form-control @error('position')is-invalid @enderror" id="position"
                                name="position" value="{{ old('position') }}" placeholder="Peran/Posisi/Jabatan" />
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
                                            id="birth_place" name="birth_place" value="{{ old('birth_place') }}" />
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
                                            id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                                            placeholder="dd/mm/yyyy" />
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
                                        <select class="form-control  @error('gender')is-invalid @enderror" id="gender"
                                            name="gender" value="{{ old('gender') }} ">
                                            <option value="Laki-laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('religion')is-invalid @enderror" id="religion"
                                            name="religion" value="{{ old('religion') }} ">
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Katholik">Katholik</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('status')is-invalid @enderror" id="status"
                                            name="status" value="{{ old('status') }}">
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        </select>
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
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="Masukkan alamat email anda" />
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
                                            id="phone" name="phone" value="{{ old('phone') }}"
                                            placeholder="Masukkan nomer telepon anda" />
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
                            <select class="form-control @error('education')is-invalid @enderror" id="education"
                                name="education" value="{{ old('education') }}">
                                <option value="SD/Sederajat">SD/Sederajat</option>
                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                <option value="SMA/SLTA/Sederajat">SMA/SLTA/Sederajat</option>
                                <option value="Diploma I/II/III/IV">Diploma I/II/III/IV</option>
                                <option value="Sarjana I/II/III">Sarjana I/II/III</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Alamat</label>
                            <textarea class="form-control  @error('address')is-invalid @enderror" id="address" name="address"
                                value="{{ old('address') }}" placeholder="Masukkan alamat anda" rows="4"></textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1"></label>
                            <input type="hidden" class="form-control  @error('address')is-invalid @enderror"
                                id="process" name="process" value="Pending" />
                            @error('process')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1"></label>
                            <input type="hidden" class="form-control  @error('message')is-invalid @enderror"
                                id="message" name="message" value="Menunggu proses validasi" />
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <a href={{ route('home.tenants') }} class="btn btn-secondary btn-rounded btn-fw"> Back
                        </a>
                        <button type="submit" class="btn btn-success btn-rounded btn-fw"> Submit </button>


                    </form>
                </div>
            </div>
        </div>
    </div>

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
