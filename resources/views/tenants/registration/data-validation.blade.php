@extends('main-layouts.template')
@section('title', 'Validasi Data')
@include('navigasi.nav-tenant')
@section('container')
    <div class="mb-3">
        <div class="card-title mb-0 border-bottom">VALIDASI DATA</div>
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
    {{-- <form action="{{ route('members.validation') }}" class="row mb-4">
        <div class="col-md-4">
            <input value="{{ Request::get('keyword') }}" name="keyword" class="form-control" type="text"
                placeholder="Masukan email untuk filter..." />
        </div>
        <div class="form-check form-check-inline">
            <input {{ Request::get('process') == 'Pending' ? 'checked' : '' }} value="Pending" name="process" type="radio"
                class="form-check-input" id="pending">Pending

        </div>
        <div class="form-check form-check-inline">
            <input {{ Request::get('process') == 'Success' ? 'checked' : '' }} value="Success" name="process" type="radio"
                class="form-check-input" id="success">Success

        </div>
        <div class="form-check form-check-inline">
            <input {{ Request::get('process') == 'Failed' ? 'checked' : '' }} value="Failed" name="process" type="radio"
                class="form-check-input" id="failed">Failed

        </div>
        <div class="col-md-2">
            <input type="submit" value="Filter" class="btn btn-primary">
        </div>
    </form> --}}
    {{-- <div class="row">
        <div class="col-md-6">
            <form action="{{ route('members.validation') }}">
                <div class="input-group mb-3">
                    <input value="{{ Request::get('keyword') }}" name="keyword" class="form-control col-md-10"
                        type="text" placeholder="Ketik disini" />
                    <div class="input-group-append">
                        <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div> --}}

    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="s">
            <thead class="text-center">
                <tr>
                    <th scope="col" class="font-weight-bold">No.</th>
                    <th scope="col" class="font-weight-bold">NIK</th>
                    <th scope="col" class="font-weight-bold">Nama Lengkap</th>
                    <th scope="col" class="font-weight-bold">Proses</th>
                    <th scope="col" class="font-weight-bold">Message</th>
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
                        <td>{{ $member->full_name }}</td>
                        <td>
                            @if ($member->process == 'Pending')
                                <span class="badge bg-secondary text-light">
                                    <i class="mdi mdi-clock-outline menu-icon"></i>{{ $member->process }}</span>
                            @elseif($member->process == 'Success')
                                <span class="badge bg-success text-light">
                                    <i class="mdi mdi-check-bold menu-icon"></i>{{ $member->process }}</span>
                            @elseif($member->process == 'Failed')
                                <span class="badge bg-danger text-light">
                                    <i class="mdi mdi-alert-circle menu-icon"></i>{{ $member->process }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($member->process == 'Success')
                                Silakan cetak kartu pada menu 'Print Data'
                            @elseif($member->process == 'Failed')
                                {{ $member->message }}
                            @elseif($member->process == 'Pending')
                                {{ $member->message }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('show.detail.tenant.members', $member->id) }}">Show Details</a>
                        </td>
                        @if ($member->process == 'Failed')
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('members.edit', $member->id) }}"
                                        class="hoverbtn btn btn-sm btn-primary" data-hover="Edit"><span
                                            class="mdi mdi-pencil menu-icon"></span></a>
                                </div>
                            </td>
                        @else
                            <td>
                                <div class="d-flex justify-content-center">
                                    -
                                </div>
                            </td>
                        @endif

                    </tr>
                @empty
                    <tr>
                        <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#s').DataTable({
                    // scrollX: true,
                    // scrollY: '500px',
                    // scrollCollapse: true,
                    paging: true,
                });
            });
        </script>
        {{-- <div class="d-flex justify-content-start mt-3">
            {{ $tenant_members->appends(Request::all())->links() }}
        </div> --}}
    </div>

@endsection
