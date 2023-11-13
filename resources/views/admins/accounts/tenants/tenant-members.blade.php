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
            <h3 class="m-0 pr-3">Data Tenant</h3>
        </div>
    </div>

    <div class="mt-3 mb-3">
        <a href="/super-admin/create-tenant"
            class="hovertext btn btn-md btn-info border-info float-start text-light ms-2 mb-3" data-hover="Add new">
            <i class="bi bi-plus-lg"></i>
        </a>
        <a href="{{ route('admin.export-pdf') }}" target="_blank"
            class="hovertext btn btn-md btn-danger border-danger float-start ms-2 mb-3" data-hover="Export to PDF"><i
                class="bi bi-file-earmark-pdf-fill"></i>
        </a>
        <a href="{{ route('admin.export-excel') }}" target="_blank"
            class="hovertext btn btn-md btn-success border-success float-start ms-2 mb-3" data-hover="Export to Excel"><i
                class="bi bi-file-earmark-spreadsheet-fill"></i>
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered table-hover" id="s">
        <thead class="text-center">
            <tr>
                <th scope="col" class="font-weight-bold">No.</th>
                <th scope="col" class="font-weight-bold">Nama Lengkap</th>
                <th scope="col" class="font-weight-bold">Nama Team</th>
                <th scope="col" class="font-weight-bold">No.Hp</th>
                <th scope="col" class="font-weight-bold">Detail</th>
                <th scope="col" class="font-weight-bold">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php $no=1; @endphp
            @forelse($tenant_members as $member)
                <tr>

                    <td>{{ $no++ }}</td>
                    <td>{{ $member->full_name }}</td>
                    <td>{{ $member->tenant->name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>
                        <a href="{{ route('detail.tenant.members', $member->id) }}">Show Details</a>
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="" class="hoverbtn btn btn-sm btn-primary" data-hover="Edit"><span
                                    class="mdi mdi-pencil menu-icon"></span></a>
                            <form method="POST" action=""
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
