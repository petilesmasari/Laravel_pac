@extends('layouts.layouts')

@section('content')
<section id="struktur-organisasi" style="margin-top: 50px">
    <div class="container py-5">
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <aside class="col-md-3 col-lg-2 min-vh-50 p-0 shadow-sm" style="background-color: #DC3545">
      <div class="text-center py-4 text-white border-bottom border-light">
        
      </div>

      <nav class="nav flex-column px-3 pt-3">
        <a href="/" target="_blank" class="nav-link text-white mb-2">
          <i class="fas fa-globe me-2"></i> Lihat Website
        </a>

        <h6 class="text-white text-uppercase mt-4 mb-2">Data Master</h6>

        <a href="/members" class="nav-link text-white mb-2">
          <i class="fas fa-book me-2"></i> Data Member
        </a>
        <a href="/" class="nav-link text-white mb-2">
          <i class="fas fa-book me-2"></i> Data Best Skor
        </a>
        <a href="/programs" class="nav-link text-white mb-2">
          <i class="fas fa-book me-2"></i> Data Program
        </a> 
        <a href="/blog" class="nav-link text-white mb-2">
          <i class="fas fa-newspaper me-2"></i> Data Blog
        </a>
        <a href="/photo" class="nav-link text-white mb-2">
          <i class="fas fa-image me-2"></i> Data Foto
        </a>
        <a href="/video" class="nav-link text-white mb-2">
          <i class="fas fa-video me-2"></i> Data Video
        </a>

        {{-- <h6 class="text-white text-uppercase mt-4 mb-2">Profil</h6>
        <a href="/admin/about" class="nav-link text-white">
          <i class="fas fa-user me-2"></i> Sejarah
        </a>
        <a href="/admin/contact" class="nav-link text-white">
          <i class="fas fa-phone me-2"></i> Visi Misi
        </a>
        <a href="/login" class="nav-link text-white">
          <i class="fas fa-sign-out-alt me-2"></i> Struktur Organisasi
        </a> --}}
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="col-md-9 col-lg-10 px-5 py-4">
      <h3 class="mb-4">Selamat Datang, Admin!</h3>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <i class="fa-solid fa-newspaper fa-3x mb-3 text-danger"></i>
              <h5 class="card-title">Blog Artikel</h5>
              <p class="card-text">Kelola artikel kegiatan PAC</p>
              <a href="/blog" class="btn btn-danger btn-sm">Detail</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <i class="fa-solid fa-image fa-3x mb-3 text-danger"></i>
              <h5 class="card-title">Photo Kegiatan</h5>
              <p class="card-text">Kelola galeri foto kegiatan PAC</p>
              <a href="/photo" class="btn btn-danger btn-sm">Detail</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <i class="fa-solid fa-video fa-3x mb-3 text-danger"></i>
              <h5 class="card-title">Video Kegiatan</h5>
              <p class="card-text">Kelola galeri video kegiatan PAC</p>
              <a href="/videos" class="btn btn-danger btn-sm text-white">Detail</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <i class="fa-solid fa-image fa-3x mb-3 text-danger"></i>
              <h5 class="card-title">Pendaftaran Anggota</h5>
              <p class="card-text">Kelola Data Anggota</p>
              <a href="/members" class="btn btn-danger btn-sm">Detail</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <i class="fa-solid fa-image fa-3x mb-3 text-danger"></i>
              <h5 class="card-title">Program</h5>
              <p class="card-text">Kelola Data Program</p>
              <a href="/programs" class="btn btn-danger btn-sm">Detail</a>
            </div>
          </div>
        </div>


      </div>
    </main>
  </div>
</div>
@endsection
