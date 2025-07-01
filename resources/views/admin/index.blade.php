@extends('layouts.layouts')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container">
  <h3 class="mb-4">Selamat Datang, Admin!</h3>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <i class="fa-solid fa-newspaper fa-3x text-primary mb-3"></i>
          <h5 class="card-title">Blog Artikel</h5>
          <p class="card-text">Kelola artikel kegiatan pesantren.</p>
          <a href="/blog" class="btn btn-primary btn-sm">Detail</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <i class="fa-solid fa-image fa-3x text-success mb-3"></i>
          <h5 class="card-title">Photo Kegiatan</h5>
          <p class="card-text">Kelola galeri foto kegiatan pesantren.</p>
          <a href="/photo" class="btn btn-success btn-sm">Detail</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <i class="fa-solid fa-video fa-3x text-warning mb-3"></i>
          <h5 class="card-title">Video Kegiatan</h5>
          <p class="card-text">Kelola galeri video kegiatan pesantren.</p>
          <a href="/video" class="btn btn-warning btn-sm text-white">Detail</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
