<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    @if ($tenant_members)
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="col-12 text-center">
                                <label><b> Profile :</label>

                                @if ($tenant_members->profile)
                                    <img src="{{ public_path('storage/' . $tenant_members->profile) }}" class="rounded"
                                        style="width: 250px; height: 250px" alt={{ $tenant_members->profile }}>
                                @endif

                                <label><b> Foto KTP :</label>

                                @if ($tenant_members->ktp)
                                    <img src="{{ public_path('storage/' . $tenant_members->ktp) }}" class="rounded"
                                        style="width: 250px; height: 250px" alt={{ $tenant_members->ktp }}>
                                @endif

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('nik')is-invalid @enderror"
                                            id="nik" name="nik" value="{{ $tenant_members->nik }}" readonly />
                                    </div>
                                    @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('full_name')is-invalid @enderror" id="full_name"
                                            name="full_name" value="{{ $tenant_members->full_name }}" readonly />
                                    </div>
                                    @error('full_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Panggilan</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('short_name')is-invalid @enderror"
                                                id="short_name" name="short_name"
                                                value="{{ $tenant_members->short_name }}" readonly />
                                        </div>
                                        @error('short_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Peran Dalam Team</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('position')is-invalid @enderror"
                                                id="position" name="position" value="{{ $tenant_members->position }}"
                                                readonly />
                                        </div>
                                        @error('position')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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
                                            <input type="text"
                                                class="form-control @error('birth_date')is-invalid @enderror"
                                                id="birth_date" name="birth_date"
                                                value="{{ $tenant_members->birth_date }}" readonly />
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
                                            <input type="text"
                                                class="form-control  @error('gender')is-invalid @enderror"
                                                id="gender" name="gender" value="{{ $tenant_members->gender }}"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Agama</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('religion')is-invalid @enderror"
                                                id="religion" name="religion"
                                                value="{{ $tenant_members->religion }}" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('status')is-invalid @enderror"
                                                id="status" name="status" value="{{ $tenant_members->status }}"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('email')is-invalid @enderror"
                                                id="email" name="email" value="{{ $tenant_members->email }}"
                                                readonly />
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">No.HP Aktif</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('phone')is-invalid @enderror"
                                                id="phone" name="phone" value="{{ $tenant_members->phone }}"
                                                readonly />
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
                                <input type="text" class="form-control @error('education')is-invalid @enderror"
                                    id="education" name="education" value="{{ $tenant_members->education }}"
                                    readonly />
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Alamat</label>
                                <input type="text" class="form-control  @error('address')is-invalid @enderror"
                                    id="address" name="address" value="{{ $tenant_members->address }}"
                                    rows="4" readonly />
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                    </form>
                </div>
            </div>
        </div>
    @else
        <tr>
            <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
        </tr>
    @endif

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>
