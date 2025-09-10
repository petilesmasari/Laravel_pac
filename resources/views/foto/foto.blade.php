@extends('layouts.layouts')

@section('content')
{{-- Galeri Foto --}}
<section id="foto" class="parallax" data-aos="zoom-in-up" style="margin-top: 50px">
            <div class="container">
                <div class="header text-center py-4">
                    <h2>Foto Kegiatan Pontianak Archery Club</h2>
                </div>

        <div class="row p-4">
                    @foreach ($photos as $photo)
                    <div class="col-lg-3 col-6 mb-2">
                        <a class="image-link" href="{{ asset('storage/photo/' . $photo->image)}}">
                            <img src="{{ asset('storage/photo/' . $photo->image) }}" alt="" class="img-fluid">
                        </a>
                        <p>{{$photo->judul}}</p>
                    </div>
                    @endforeach
                </div>
    </div>
</section>
{{-- End Galeri Foto --}}
@endsection
