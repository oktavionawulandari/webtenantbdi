@extends('main-layouts.template')
@section('title', 'Informasi Kartu')
@include('navigasi.nav-tenant')
@section('container')
    <div>
        <div class="card-title mb-0 border-bottom">INFORMASI KARTU</div>
    </div>
    <div class="mt-4 mr-5 float-left">
        <img src="{{ asset('assets/images/ex-card.png') }}" style="width: 15rem; height: 25rem" alt="profile" />
        <p>Contoh kartu tenant</p>
    </div>
    <div class="mt-4 mr-5">
        <div class="card-title">Berikut adalah informasi mengenai kartu tenant.</div>
        <div class="mt-2">1. Setiap anggota tenant wajib memiliki satu kartu tenant.</div>
        <div class="mt-2">2. Foto pada kartu tenant harus menghadap depan dan memperlihatkan wajah dengan jelas serta
            diusahakan agar menggunakan foto terbaru.</div>
        <div class="mt-2">3. Nama yang dicetak adalah nama panggilan (sesuai dengan data yang diinput).</div>
        <div class="mt-2">4. Nama tenant akan otomatis terisi apabila tenant telah melengkapi bagin profile tenant pada
            halaman Home.</div>
        <div class="mt-2">5. Apabila kartu hilang ataupun rusak, diharapkan agar segera mencetak kartu tenant kembali.
        </div>
    </div>
@endsection
