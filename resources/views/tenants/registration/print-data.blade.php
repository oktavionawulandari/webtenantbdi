@extends('main-layouts.template')
@section('title', 'Print Data')
@include('navigasi.nav-tenant')
@section('container')
    <div class="mb-3">
        <div class="card-title mb-0 border-bottom">PRINT DATA</div>
    </div>
    {{-- <div class="row">
        <div class="col-md-6">
            <form action="{{ route('members.print') }}">
                <div class="input-group mb-3">
                    <input value="{{ Request::get('keyword') }}" name="keyword" class="form-control col-md-10" type="text"
                        placeholder="Ketik disini" />
                    <div class="input-group-append">
                        <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
    <table class="table table-bordered table-hover" id="s">
        <thead class="text-center">
            <tr>
                <th scope="col" class="font-weight-bold">No.</th>
                <th scope="col" class="font-weight-bold">NIK</th>
                <th scope="col" class="font-weight-bold">Nama Lengkap</th>
                <th scope="col" class="font-weight-bold">Status</th>
                <th scope="col" class="font-weight-bold">Detail</th>
                <th scope="col" class="font-weight-bold">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php $no=1; @endphp
            @forelse($tenant_members as $member)
                <tr>

                    <td>{{ $no++ }}</td>
                    <td>{{ $member->nik }}</td>
                    <td>{{ $member->full_name }}
                    <td>
                        @if ($member->process == 'Success')
                            <span class="badge bg-success text-light">
                                <i class="mdi mdi-check-bold menu-icon"></i>{{ $member->process }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('show.detail.tenant.members', $member->id) }}">Show Details</a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('tenants.print.idcard', $member->id) }}" target="_blank"
                            class="hovertext btn btn-success btn-sm " data-hover="Export to ID Card"><i
                                class="bi bi-person-vcard"></i></a>
                        <a href="{{ route('tenants.print.pdf', $member->id) }}" target="_blank"
                            class="hovertext btn btn-danger btn-sm" data-hover="Export to PDF"><i
                                class="bi bi-file-earmark-pdf-fill"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
                </tr>
            @endforelse
            </tr>
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
    {{-- <div class="d-flex justify-content-start mt-3">
        {{ $tenant_members->appends(Request::all())->links() }}
    </div> --}}

@endsection
