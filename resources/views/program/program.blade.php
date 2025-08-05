@extends('layouts.layouts')

@section('content')
<section id="program" style="margin-top: 56px">
    <div class="container py-5">
        <div class="header text-center py-4">
            <h2>Program Pontianak Archery Club</h2>
            <p class="lead">Jelajahi Program Kami & Temukan yang Paling Cocok untuk Anda</p>
        </div>                      

        <div class="row">
            @forelse($programs as $program)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 h-100">
                        @if($program->gambar)
                            <div class="bg-white rounded-3 mx-3 mt-3">
                                <img src="{{ asset('storage/programs/'.$program->gambar) }}"
                                class="img-fluid rounded-3"
                                alt="{{ $program->nama }}"
                                style="width: 100%; height: 200px; object-fit: cover;">
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $program->nama }}</h5>
                            <p class="card-text">{{ Str::limit($program->deskripsi, 100) }}</p>
                            <p class="text-muted">Rp {{ number_format($program->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada program tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
