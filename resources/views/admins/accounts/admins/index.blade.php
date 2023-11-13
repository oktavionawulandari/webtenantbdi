@extends('main-layouts.template')
@section('title', 'Data Admin')
@include('navigasi.nav-superadmin')
@section('container')
    <div>
        <div class="header-left card-title mb-4 border-bottom">
            <h3 class="m-0 pr-3">Akun Admin</h3>
        </div>
    </div>
    <div class="mt-3 mb-3">
        <a href="{{ route('superadmin.admin.create') }}"
            class="hovertext btn btn-md btn-info border-info float-start text-light ms-2 mb-3" data-hover="Add new admin">
            <i class="bi bi-plus-lg"></i>
        </a>
        <a href="{{ route('export-admin-pdf') }}" target="_blank"
            class="hovertext btn btn-md btn-danger border-danger float-start ms-2 mb-3" data-hover="Export to PDF"><i
                class="bi bi-file-earmark-pdf-fill"></i>
        </a>
        <a href="{{ route('export-admin-excel') }}" target="_blank"
            class="hovertext btn btn-md btn-success border-success float-start ms-2 mb-3" data-hover="Export to Excel"><i
                class="bi bi-file-earmark-spreadsheet-fill"></i>
        </a>

    </div>
    <table class="table table-bordered table-hover" id="s">
        <thead class="text-center">
            <tr>
                <th scope="col" class="font-weight-bold">No.</th>
                <th scope="col" class="font-weight-bold">NIP</th>
                <th scope="col" class="font-weight-bold">Nama</th>
                <th scope="col" class="font-weight-bold">Username</th>
                <th scope="col" class="font-weight-bold">Email</th>
                <th scope="col" class="font-weight-bold">No. Hp</th>
                <th scope="col" class="font-weight-bold">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php $no=1; @endphp
            @forelse($admins as $admin)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $admin->nip }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('superadmin.admin.edit', $admin->id) }}"
                                class="hoverbtn btn btn-sm btn-primary" data-hover="Edit"><span
                                    class="mdi mdi-pencil menu-icon"></span></a>
                            <form method="POST" action="{{ route('superadmin.admin.destroy', $admin->id) }}"
                                onclick="return confirm('Apakah Anda yakin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="hoverbtn btn btn-sm btn-danger ms-1" data-hover="Hapus"> <span
                                        class="mdi mdi-delete menu-icon"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
                </tr>
            @endforelse
        </tbody>
        <script>
            $(document).ready(function() {
                $('#s').DataTable({
                    // scrollX: true,
                    // scrollY: '500px',
                    // scrollCollapse: true,
                    // paging: true,
                });
            });
        </script>
    </table>
@endsection
