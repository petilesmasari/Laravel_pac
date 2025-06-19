@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="berita" style="margin-top: 50px">
    <div class="container py-5">
        <div class="header text-center py-4">
            <h2>Berita Kegiatan Pontianak Archery Club</h2>
        </div>

        <div class="row">
            @foreach ($artikels as $item)
                <div class="col-lg-4 mb-4" data-aos="flip-up">
                    <div class="card border-0 shadow">
                        <img src="{{ asset('storage/artikel/' . $item->image)}}" alt="Berita">
                        <div class="px-2 py-3">
                            <p class="mb-3">{{$item->created_at}}</p>
                            <h4 class="mb-3 font-bold">{{$item->judul}}</h4>
                            <p class="mb-3">#panahankeren</p>
                            <a href="/detail/{{ $item->slug }}" class="mb-3 text-danger text-decoration-none">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="footer text-center py-4">
            <button class="btn btn-outline-danger font-bold">Berita Lainnya</button>
        </div>
    </div>
</section>
{{-- End Berita --}}
@endsection
