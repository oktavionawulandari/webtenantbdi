@extends('main-layouts.template')
@section('title', 'Syarat dan Ketentuan')
@include('navigasi.nav-tenant')
@section('container')
    <div class="mb-3">
        <div class="card-title mb-0 border-bottom">SYARAT DAN KETENTUAN</div>
    </div>
    <div class="mt-4 mb-2">Adapun syarat dan ketentuan dalam mengajukan kartu tenant adalah sebagai berikut.</div>
    <div class="card-group">
        <div class="card">
            <img src="{{ asset('assets/images/sk/sk1.png') }}" class="card-img-top" alt="Tenant Digital">
            <div class="card-body">
                <a class="">
                    <span>1. Team telah terdaftar sebagai tenant Program Inkubasi Bisnis.</span>
                    <i class="mdi mdi-arrow-down-thin menu-icon"></i>
                </a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/sk/sk2.png') }}" class="card-img-top" alt="Tenant Kriya">
            <div class="card-body">
                <a class="mb-3">2. Melengkapi data diri pada menu Registrasi > Daftar Kartu
                    Tenant.</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/sk/sk3.png') }}" class="card-img-top" alt="Tenant Animasi">
            <div class="card-body">
                <a class="mb-3">3. Menunggu validasi kartu oleh admin BDI
                    Denpasar.</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/sk/sk4.png') }}" class="card-img-top" alt="Tenant Animasi">
            <div class="card-body">
                <a class="mb-3">4. Apabila validasi berhasil, maka tenant dapat
                    mencetak kartu pada menu Registrasi > Print Data.</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/sk/sk5.png') }}" class="card-img-top" alt="Tenant Animasi">
            <div class="card-body">
                <a class="mb-3">5.Apabila validasi gagal, maka tenant harus
                    mengulangi pengajuan kartu tenant.</a>
            </div>
        </div>
    </div>
@endsection
