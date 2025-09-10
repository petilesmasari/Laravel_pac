@extends('layouts.layouts')

@section('content')
{{-- Detail Event --}}
<section id="event-detail" style="margin-top: 100px">
    <div class="container col-xl-8">

        {{-- Breadcrumb --}}
        <div class="mb-3">
            <a href="{{ route('home') }}">Beranda</a> /
            <a href="{{ route('event') }}">Event</a> /
            <span>{{ $event->judul }}</span>
        </div>

        {{-- Gambar Event --}}
        <img src="{{ asset('storage/event/' . $event->image) }}" 
             alt="{{ $event->judul }}" 
             class="img-fluid mb-4 rounded shadow">

        {{-- Konten Event --}}
        <div class="konten-event px-2 py-3">
            <p class="mb-2 text-muted">
                {{ $event->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}
            </p>
            <h2 class="mb-3 font-bold">{{ $event->judul }}</h2>
            <div class="text-muted">
                {!! $event->desc !!}
            </div>
        </div>

    </div>
</section>
{{-- End Detail Event --}}
@endsection
