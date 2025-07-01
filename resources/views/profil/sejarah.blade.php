@extends('layouts.layouts')

@section('title', 'Sejarah')

@section('content')
<section id="sejarah" style="margin-top: 50px">
    <div class="container py-5">
        <div class="header text py-4">
            <h2>Sejarah Klub</h2>
        </div>
        <img src="{{ asset('assets/images/arrows.jpg') }}" class="img-fluid rounded mb-4" alt="Gambar Sejarah Klub">
        <p>
            Klub panahan ini didirikan pada tahun XXXX oleh sekelompok pecinta olahraga panahan
            yang memiliki semangat tinggi dalam mengembangkan prestasi dan membina generasi muda.
            Seiring berjalannya waktu, klub terus berkembang dan berhasil mencetak atlet-atlet berprestasi
            di tingkat daerah maupun nasional.
        </p>
    </div>
</section>
@endsection