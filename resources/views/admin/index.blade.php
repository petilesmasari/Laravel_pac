@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="berita" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <h3 class="fw-bold mb-3">Halaman Dashboard Admin</h3>
        <p>Selamat datang Admin di dashboard website pesantren</p>

        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-xl rounded-3 border-1">
                    <img src="{{asset('assets/images/bg-admin.jpg')}}" class="card-img-top object-fit-cover" alt="..." style="height: 200px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Blog Artikel</h5>
                        <p class="card-text">Atur dan kelola artikel kegiatan pesantren</p>
                        <a href="/blog" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-xl rounded-3 border-1">
                <img src="{{asset('assets/images/bg-admin-2.jpg')}}" class="card-img-top object-fit-cover" alt="..." style="height: 200px">
                <div class="card-body">
                    <h5 class="card-title">Photo Kegiatan</h5>
                    <p class="card-text">Atur dan kelola photo kegiatan pesantren</p>
                    <a href="/photo" class="btn btn-primary">Detail</a>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-xl rounded-3 border-1">
                <img src="{{asset('assets/images/bg-admin-3.jpg')}}" class="card-img-top object-fit-cover" alt="..." style="height: 200px">
                <div class="card-body">
                    <h5 class="card-title">Video Kegiatan</h5>
                    <p class="card-text">Atur dan kelola video kegiatan pesantren</p>
                    <a href="/video" class="btn btn-primary">Detail</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End Berita --}}
@endsection
