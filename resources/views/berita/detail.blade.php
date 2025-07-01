@extends('layouts.layouts')

@section('content')
{{-- Detail Berita --}}
<section id="Detail " style="margin-top: 100px">
    <div class="container col-xl-8">
        <div class="mb-3"> <a href="{{route('home')}}">Beranda</a> / <a href="{{route('berita')}}">Berita</a> / Berita Kegiatan Pontianak Archery Club</div>
        <img src="{{ asset('storage/artikel/' . $artikel->image)}}" alt="Berita 1" class="img-fluid">
        <div class="konten-berita px-2 py-3">
            <p class="mb-3">{{$artikel->created_at}}</p>
            <h4 class="mb-3 font-bold">{{$artikel->judul}}</h4>
            <p class="text-muted">{!! $artikel->desc !!}</p>
        </div>
    </div>
</section>
{{-- End Detail Berita --}}
@endsection
