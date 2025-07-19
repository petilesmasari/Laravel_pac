@extends('layouts.layouts')

@section('content')
<section id="program" style="margin-top: 56px">
    <div class="container py-5">
        <div class="header text-center py-4">
            <h2>Program Kami</h2>
            <p class="lead">Pilih program terbaik untuk kebutuhan Anda</p>
        </div>                      

        <div class="row">
            @forelse($programs as $program)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($program->gambar)
                            <img src="{{ asset('storage/program/'.$program->gambar) }}" class="card-img-top" alt="{{ $program->nama }}">
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
