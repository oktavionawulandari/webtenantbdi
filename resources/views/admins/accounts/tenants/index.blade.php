@extends('main-layouts.template')
@section('title', 'Data Tenant')
@section('container')
    @if (Auth::guard('user')->user()->role == 'Super Admin')
        @include('navigasi.nav-superadmin')
    @elseif(Auth::guard('user')->user()->role == 'Admin')
        @include('navigasi.nav-admin')
    @endif
    <div>
        <div class="header-left card-title mb-4 border-bottom">
            <h3 class="m-0 pr-3">Akun Tenant</h3>
        </div>
    </div>
    <div class="mt-3 mb-3">
        <a href="{{ route('admins.tenants.create') }}"
            class="hovertext btn btn-md btn-info border-info float-start text-light ms-2 mb-3" data-hover="Add new tenant">
            <i class="bi bi-plus-lg"></i>
        </a>
        <a href="{{ route('admin.profile-pdf') }}" target="_blank"
            class="hovertext btn btn-md btn-danger border-danger float-start ms-2 mb-3" data-hover="Export to PDF"><i
                class="bi bi-file-earmark-pdf-fill"></i>
        </a>
        <a href="{{ route('admin.export-profile-excel') }}" target="_blank"
            class="hovertext btn btn-md btn-success border-success float-start ms-2 mb-3" data-hover="Export to Excel"><i
                class="bi bi-file-earmark-spreadsheet-fill"></i>
        </a>
    </div>

    <table class="table table-bordered table-hover" id="s">
        <thead class="text-center">
            <tr>
                <th scope="col" class="font-weight-bold">No.</th>
                <th scope="col" class="font-weight-bold">Nama Tenant</th>
                <th scope="col" class="font-weight-bold">Angkatan</th>
                <th scope="col" class="font-weight-bold">Username</th>
                <th scope="col" class="font-weight-bold">Jenis Usaha/Bisnis</th>
                <th scope="col" class="font-weight-bold">Details</th>
                <th scope="col" class="font-weight-bold">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php $no=1; @endphp
            @forelse($tenants as $tenant)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $tenant->name }}</td>
                    <td>{{ $tenant->batch }}</td>
                    <td>{{ $tenant->username }}</td>
                    <td>{{ $tenant->type }}</td>
                    <td>
                        <a href="{{ route('tenants.show.details', $tenant->id) }}">Show Details</a>
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admins.tenants.edit', $tenant->id) }}"
                                class="hoverbtn btn btn-sm btn-primary"data-hover="Edit"><span
                                    class="mdi mdi-pencil menu-icon"></span></a>
                            <form method="POST" action="{{ route('admins.tenants.destroy', $tenant->id) }}"
                                onclick="return confirm('Apakah Anda yakin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="hoverbtn btn btn-sm btn-danger ms-1" data-hover="Hapus"> <span
                                        class="mdi mdi-delete menu-icon"></span></button>
                            </form>
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
