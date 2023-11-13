@extends('main-layouts.template')
@section('title', 'Profile Tenant')
@include('navigasi.nav-tenant')
@section('container')
    @forelse($tenant as $tenant)
        <div>
            <div class="card-title mb-0 border-bottom">PROFILE {{ $tenant->name }}</div>
            <a href="{{ route('profile.tenant.edit') }}" class="btn btn-primary btn-sm float-right mt-3 d-none d-lg-block">
                <i class="bi bi-pencil-square pr-1 mt-1"></i>
                <span class="menu-title">Edit</span>
            </a>
        </div>

        <table class="table table-borderless mt-2">
            <tbody>
                <tr>
                    <th scope="row-col-4">Nama Team</th>
                    <td>
                        @if ($tenant->logo)
                            <img src="{{ asset('storage/' . $tenant->logo) }}" class="img-thumbnail"
                                style="width: 200px; height: 200px" alt={{ $tenant->logo }}>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row-col-4">Nama Team</th>
                    <td>: {{ $tenant->name }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Jenis Usaha/Bisnis</th>
                    <td>: {{ $tenant->type }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Badan Usaha</th>
                    <td colspan="2">: {{ $tenant->bussinessEntity }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Deskripsi Singkat</th>
                    <td colspan="2">: {{ $tenant->desc }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">No. Telp</th>
                    <td colspan="2">: {{ $tenant->phone }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Whatsapp</th>
                    <td colspan="2">: {{ $tenant->whatsapp }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Instagram</th>
                    <td colspan="2">: {{ $tenant->instagram }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Facebook</th>
                    <td colspan="2">: {{ $tenant->facebook }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Lainnya</th>
                    <td colspan="2">: {{ $tenant->other }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Website</th>
                    <td colspan="2">: {{ $tenant->website }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Company Profile</th>
                    <td colspan="2">: {{ $tenant->companyLink }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td colspan="2">: {{ $tenant->address }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    @empty
        <tr>
            <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
        </tr>
    @endforelse
@endsection
