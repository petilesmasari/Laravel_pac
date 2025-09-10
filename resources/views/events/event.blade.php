@extends('layouts.layouts')

@section('content')
{{-- Event --}}
<section id="event" style="margin-top: 50px">
    <div class="container py-5">
        <div class="header text-center py-4">
            <h2>Event Pontianak Archery Club</h2>
        </div>

        {{-- CSS supaya ukuran gambar sama --}}
        <style>
            .fixed-img {
                width: 100%;
                height: 220px; /* bisa diganti sesuai kebutuhan, misal 250px */
                object-fit: cover; /* biar gambar tidak gepeng */
                border-top-left-radius: 0.5rem;
                border-top-right-radius: 0.5rem;
            }
        </style>

        <div class="row">
            @foreach ($events as $item)
            <div class="col-lg-4 mb-4" data-aos="flip-up">
                <div class="card border-0 shadow h-100 d-flex flex-column">
                    <img src="{{ asset('storage/event/' . $item->image)}}" 
                         alt="{{ $item->judul }}" 
                         class="card-img-top fixed-img">

                    <div class="px-2 py-3">
                        <p class="mb-3">
                            {{ $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
                        </p>
                        <h4 class="mb-3 font-bold">{{ $item->judul }}</h4>
                        <a href="/events/detail/{{ $item->slug }}" 
                           class="mb-3 text-danger text-decoration-none">
                           Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- End Event --}}
@endsection
