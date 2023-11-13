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
            <h3 class="m-0 pr-3">Data Registrasi Anggota Tenant</h3>
        </div>
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
                <th scope="col" class="font-weight-bold">Proses</th>
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
                    <td>
                        @if ($member->process == 'Pending')
                            <span class="badge bg-secondary text-light">
                                <i class="mdi mdi-clock-outline menu-icon"></i>{{ $member->process }}</span>
                        @elseif($member->process == 'Success')
                            <span class="badge bg-success text-light">
                                <i class="mdi mdi-check-bold menu-icon"></i>{{ $member->process }}</span>
                            <p>{{ $member->short_name }}</p>
                        @elseif($member->process == 'Failed')
                            <span class="badge bg-danger text-light">
                                <i class="mdi mdi-alert-circle menu-icon"></i>{{ $member->process }}</span>
                        @endif
                    </td>


                    <td>
                        <a href="{{ route('registration.detail', $member->id) }}">Show Details</a>
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">

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
                    scrollY: '500px',
                    scrollCollapse: true,
                    paging: true,
                });
            });
        </script>
    </table>
@endsection
