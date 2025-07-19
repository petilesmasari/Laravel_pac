@extends('layouts.layouts')

@section('title', 'Terima Kasih')

@section('content')
<section id="berita" style="margin-top: 50px">
    <div class="container py-5 text-center">
        <h2 class="mb-4">Terima Kasih Telah Mendaftar!</h2>
        <p>Pendaftaran Anda telah kami terima. Admin akan menghubungi Anda setelah melakukan verifikasi.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</section>
@endsections