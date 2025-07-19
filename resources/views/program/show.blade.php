@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $program->gambar) }}" 
                     class="img-fluid rounded shadow"
                     alt="{{ $program->nama }}">
            </div>
            <div class="col-md-6">
                <h1 class="mb-3">{{ $program->nama }}</h1>
                <h4 class="text-primary mb-4">Rp {{ number_format($program->harga, 0, ',', '.') }}</h4>
                
                <div class="mb-4">
                    <h5>Deskripsi Program</h5>
                    <p class="text-muted">{{ $program->deskripsi }}</p>
                </div>

                <a href="#" class="btn btn-primary btn-lg px-4">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</section>
@endsection