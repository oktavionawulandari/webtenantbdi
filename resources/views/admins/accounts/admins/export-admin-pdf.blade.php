<!DOCTYPE html>
<html>

<head>
    <title>Export PDF Data Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center">{{ $title }}</h2>
    <div class="mt-4" style="font-size: 8px">Tanggal Unduh: {{ $date }}</div>

    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">No.Hp</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($adminPDF as $admin)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $admin->nip }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>
            @endforeach
        </tbody>
    </table>
</body>

</html>
