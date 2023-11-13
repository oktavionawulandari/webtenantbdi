<!DOCTYPE html>
<html>

<head>
    <title>Profile Tenant PDF</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
</head>

<body>
    <style type="text/css">
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
        <h5>Profile Tenant</h4>

    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Logo</th>
                <th>Angkatan</th>
                <th>Nama Team</th>
                <th>Jenis Usaha/Bisnis</th>
                <th>Badan Usaha</th>
                <th>No.Telp</th>
                <th>Whatsapp</th>
                {{-- <th>Instagram</th>
                <th>Facebook</th> --}}
                <th>Website</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($profileTenantPDF as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td style="width: 50px">
                        @if ($p->logo)
                            <img src="{{ public_path('storage/' . $p->logo) }}"
                                alt="{{ $p->logo }}"class="img-fluid mt-3">
                        @endif
                    </td>
                    <td>{{ $p->batch }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->type }}</td>
                    <td>{{ $p->bussinessEntity }}</td>
                    <td>{{ $p->phone }}</td>
                    <td>{{ $p->whatsapp }}</td>
                    {{-- <td>{{ $p->instagram }}</td>
                    <td>{{ $p->facebook }}</td> --}}
                    <td>{{ $p->website }}</td>
                    <td>{{ $p->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
