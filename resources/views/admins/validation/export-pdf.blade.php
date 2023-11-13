<!DOCTYPE html>
<html>

<head>
    <title>Data Tenant PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Profile</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No.HP</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($validPdf as $p)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td style="width: 50px">
                        @if ($p->profile)
                            <img src="{{ public_path('storage/' . $p->profile) }}"
                                alt="{{ $p->profile }}"class="img-fluid mt-3">
                        @endif
                    </td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->full_name }}</td>
                    <td>{{ $p->birth_date }}</td>
                    <td>{{ $p->gender }}</td>
                    <td>{{ $p->phone }}</td>
                    <td>{{ $p->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <style>
        table {

            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }
    </style>
    <style>
        img {
            width: 50px;
        }

        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
    <center>
        <h5>Data Tenant</h4>

    </center> --}}

    {{-- <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Profil</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No.HP</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($validPdf as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td style="width: 50px">
                        @if ($p->profile)
                            <img src="{{ public_path('storage/' . $p->profile) }}"
                                alt="{{ $p->profile }}"class="img-fluid mt-3">
                        @endif
                    </td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->full_name }}</td>
                    <td>{{ $p->birth_date }}</td>
                    <td>{{ $p->gender }}</td>
                    <td>{{ $p->phone }}</td>
                    <td>{{ $p->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
</body>

</html>
