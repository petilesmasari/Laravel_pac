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
                    <div class="card border-0 h-100 shadow-sm">
                        @if($program->gambar)
                            <div class="bg-white rounded-3 mx-3 mt-3">
                                {{-- Klik gambar untuk buka modal --}}
                                <a href="#" data-bs-toggle="modal" data-bs-target="#programModal{{ $program->id }}">
                                    <img src="{{ asset('storage/programs/'.$program->gambar) }}"
                                        class="img-fluid rounded-3"
                                        alt="{{ $program->nama }}"
                                        style="width: 100%; height: 200px; object-fit: cover; cursor:pointer;">
                                </a>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $program->nama }}</h5>
                            <p class="card-text">{{ Str::limit($program->deskripsi, 100) }}</p>
                            <p class="text-muted mb-4">Rp {{ number_format($program->harga, 0, ',', '.') }}</p>
                            
                            <div class="mt-auto text-center">
                                {{-- Tombol Daftar --}}
                                <a href="{{ route('membership.daftar', $program->id) }}" 
                                   class="btn btn-outline-danger font-bold">
                                    Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal Detail Program --}}
                <div class="modal fade" id="programModal{{ $program->id }}" tabindex="-1" aria-labelledby="programModalLabel{{ $program->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="programModalLabel{{ $program->id }}">{{ $program->nama }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if($program->gambar)
                                    <img src="{{ asset('storage/programs/'.$program->gambar) }}" 
                                         class="img-fluid rounded mb-3"
                                         alt="{{ $program->nama }}">
                                @endif
                                <p>{{ $program->deskripsi }}</p>
                                <p class="fw-bold text-danger">Harga: Rp {{ number_format($program->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('membership.daftar', $program->id) }}" class="btn btn-outline-danger">
                                    Daftar
                                </a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada program tersedia.</p>
            @endforelse
        </div>

        {{-- Keterangan Pembayaran --}}
        <div class="text-center mt-4">
            <p class="fw-bold">Pembayaran via transfer Bank Syariah Indonesia melalui No Rek 
                <span class="text-danger">7101658737</span> a.n. <span class="text-danger">Jumadi</span>
            </p>
            <p>Untuk Informasi lebih lanjut silakan hubungi admin</p>
        </div>

    </div>
</section>
@endsection
