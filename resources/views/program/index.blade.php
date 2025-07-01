@extends('layouts.layouts')

@section('title', 'Program')

@section('content')
<section id="berita" style="margin-top: 50px">
    <div class="container py-5">
        <div class="header text-center py-4">
            <h2>Program</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-5 g-4">
            @php
                $programs = [
                    ['nama' => 'Kelas', 'deskripsi' => 'Latihan dengan program khusus dan berjenjang', 'harga' => 'Rp. 55.000 / per sesi'],
                    ['nama' => 'Pelatihan Dasar', 'deskripsi' => 'Latihan dengan program khusus dan berjenjang', 'harga' => 'Rp. 185.000 (regulasi sesi - 1 bulan)'],
                    ['nama' => 'Archery School', 'deskripsi' => 'Latihan dengan program khusus dan berjenjang', 'harga' => null],
                    ['nama' => 'Coaching Clinic', 'deskripsi' => 'Latihan dengan program khusus dan berjenjang', 'harga' => null],
                    ['nama' => 'Scoring Day', 'deskripsi' => 'Latihan dengan program khusus dan berjenjang', 'harga' => null],
                ];
            @endphp

            @foreach($programs as $p)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('assets/images/arrows.jpg') }}" class="card-img-top" alt="program {{ $p['nama'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p['nama'] }}</h5>
                        <p class="card-text">{{ $p['deskripsi'] }}</p>
                        @if ($p['harga'])
                            <p class="text-muted small">{{ $p['harga'] }}</p>
                        @endif
                        <a href="#" class="btn btn-dark w-100">Daftar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-5 text-start">
            <h6 class="fw-bold">Pembayaran via transfer:</h6>
            <p>Bank Syariah Indonesia - No. Rekening <strong>7101658737</strong> a.n. Jumadi</p>
            <h6 class="fw-bold mt-3">Konfirmasi Pembayaran:</h6>
            <p>📱 <a href="https://wa.me/628837367576726" target="_blank">0883-7368-7576-726 (WhatsApp)</a></p>
        </div>
    </div>
</section>
@endsection
