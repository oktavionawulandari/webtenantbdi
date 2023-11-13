@extends('main-layouts.template')
@section('title', 'Home')
@include('navigasi.nav-tenant')
@section('container')
    <div>
        <div class="card-title mb-0">Selamat Datang {{ Auth::guard('tenant')->user()->name }}</div>
        <p class="mb-2">Silakan lengkapi data tenant Anda!</p>
        <a href="{{ route('profile.tenant.edit') }}" type="button" class="btn btn-primary btn-icon-text mb-4">
            <span class="menu-title">Lengkapi</span>
        </a>
    </div>
    <div class="card-group">
        <div class="card">
            <img src="{{ asset('assets/images/digital.png') }}" class="card-img-top" alt="Tenant Digital">
            <div class="card-body">
                <a href="/tenants/pages/digital" class="card-title">
                    <span>DIGITAL</span>
                    <i class="mdi mdi-arrow-down-thin menu-icon"></i>
                </a>
                <p class="card-text mt-2">Tenant digital berfokus pada digital marketing, yaitu mengacu pada promosi produk
                    atau layanan menggunakan saluran digital, seperti search engine, media sosial, email, dan situs web.
                    Tujuan digital marketing adalah menjangkau dan terlibat dengan pelanggan melalui saluran ini untuk
                    mendorong penjualan dan meningkatkan kesadaran merek.</p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/kriya.png') }}" class="card-img-top" alt="Tenant Kriya">
            <div class="card-body">
                <a href="/tenants/pages/kriya" class="card-title mb-3">KRIYA</a>
                <p class="card-text mt-2">Tenant kriya berfokus pada pembuatan barang-barang kerajinan seperti baju dari
                    kain perca, tas anyaman, tas kayu, dan lain sebagainya.
                </p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/animasi.png') }}" class="card-img-top" alt="Tenant Animasi">
            <div class="card-body">
                <a href="/tenants/pages/animasi" class="card-title mb-3">ANIMASI</a>
                <p class="card-text mt-2">Tenant animasi berfokus pada pembuatan animasi seperti animasi gambar tangan
                    tradisional, animasi stop-motion, dan animasi buatan komputer. Animasi digunakan dalam berbagai media,
                    termasuk film, televisi, video game, dan iklan digital. Ini dapat digunakan untuk hiburan, pendidikan,
                    dan tujuan lainnya.</p>
            </div>
        </div>
    </div>
    {{-- @endauth --}}
@endsection
