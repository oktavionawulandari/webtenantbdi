<!DOCTYPE html>
<html>
<head>
	<title>Data Tenant PDF</title>
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
		</style>
		<style>
			table {
				
				border-collapse: collapse;
			}
			
			th, td {
				padding: 15px;
				text-align: left;
			}
			</style>
			<style>
				table, th, td {
					border: 1px solid;
				  }
			</style>
	{{-- <center>
		<h5>Data Tenant</h4>
		
	</center> --}}
 
	<table class='table table-bordered' >
		<thead>
			<tr>
				<th>No</th>
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
			@foreach($tenantmembers as $t)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $t->nik }}</td>
				<td>{{ $t->full_name }}</td>
				<td>{{ $t->birth_date }}</td>
				<td>{{ $t->gender }}</td>
				<td>{{ $t->phone }}</td>
                <td>{{ $t->address }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>