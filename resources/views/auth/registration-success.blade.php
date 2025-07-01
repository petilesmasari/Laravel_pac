@extends('layouts.layouts')

@section('content')
<section id="berita" style="margin-top: 100px">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center">
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            <h4 class="mt-3">Registrasi Berhasil!</h4>
                            <p class="text-muted">Akun Anda telah berhasil dibuat. Silakan login untuk melanjutkan.</p>
                        </div>
                        <a href="/login" class="btn btn-primary">Login Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection