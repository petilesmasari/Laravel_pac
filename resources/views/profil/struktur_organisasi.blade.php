@extends('layouts.layouts')

@section('title', 'Struktur Organisasi')

@section('content')
<section id="struktur-organisasi" style="margin-top: 50px">
    <div class="container py-5">
        <div class="header text-center py-4">
            <h2>Struktur Organisasi Klub</h2>
        </div>
        
        <p>Berikut adalah susunan struktur organisasi klub panahan kami:</p>

        <ul>
            <li><strong>Ketua Umum:</strong> Nama Ketua</li>
            <li><strong>Wakil Ketua:</strong> Nama Wakil</li>
            <li><strong>Sekretaris:</strong> Nama Sekretaris</li>
            <li><strong>Bendahara:</strong> Nama Bendahara</li>
            <li><strong>Pelatih Utama:</strong> Nama Pelatih</li>
            <li><strong>Koordinator Program:</strong> Nama Koordinator</li>
        </ul>

        <p class="mt-4">Struktur ini dapat berubah sesuai kebutuhan dan perkembangan klub.</p>
    </div>
</section>
@endsection
