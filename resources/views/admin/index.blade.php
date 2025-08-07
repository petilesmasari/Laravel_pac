@extends('layouts.layouts')

@section('content')
<section id="struktur-organisasi" style="margin-top: 50px">
  <div class="container py-5">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Content -->
        <main class="col-12 px-4 py-4">
          <h3 class="fw-bold mb-3">Halaman Dashboard Admin</h3>
          <p>Selamat datang di halaman dashboard admin</p>
          <hr class="mb-4">

          <div class="row g-4">
            <!-- Best Skor -->
            <div class="col-sm-6 col-lg-4">
              <div class="card text-center shadow-sm rounded-3 border-0 h-100 hover-shadow">
                <div class="card-body">
                  <img src="{{ asset('assets/images/logo_pac.png') }}" alt="Best Skor" class="mb-3" style="width:60px; height:auto;">
                  <i class="fa-solid fa-bullseye fa-3x mb-3 text-danger"></i>
                  <h5 class="card-title">Best Skor</h5>
                  <p class="card-text">Kelola Skor Latihan Bulanan PAC</p>
                  <a href="/skors" class="btn btn-danger btn-sm w-100">Detail</a>
                </div>
              </div>
            </div>

            <!-- Blog Artikel -->
            <div class="col-sm-6 col-lg-4">
              <div class="card text-center shadow-sm rounded-3 border-0 h-100 hover-shadow">
                <div class="card-body">
                  <img src="{{ asset('assets/images/logo_pac.png') }}" alt="Best Skor" class="mb-3" style="width:60px; height:auto;">
                  <i class="fa-solid fa-newspaper fa-3x mb-3 text-danger"></i>
                  <h5 class="card-title">Berita</h5>
                  <p class="card-text">Kelola artikel kegiatan PAC</p>
                  <a href="/blog" class="btn btn-danger btn-sm w-100">Detail</a>
                </div>
              </div>
            </div>

            <!-- Galeri Foto -->
            <div class="col-sm-6 col-lg-4">
              <div class="card text-center shadow-sm rounded-3 border-0 h-100 hover-shadow">
                <div class="card-body">
                  <img src="{{ asset('assets/images/logo_pac.png') }}" alt="Best Skor" class="mb-3" style="width:60px; height:auto;">
                  <i class="fa-solid fa-images fa-3x mb-3 text-danger"></i>
                  <h5 class="card-title">Foto Kegiatan</h5>
                  <p class="card-text">Kelola galeri foto kegiatan PAC</p>
                  <a href="/photo" class="btn btn-danger btn-sm w-100">Detail</a>
                </div>
              </div>
            </div>

            <!-- Galeri Video -->
            <div class="col-sm-6 col-lg-4">
              <div class="card text-center shadow-sm rounded-3 border-0 h-100 hover-shadow">
                <div class="card-body">
                  <img src="{{ asset('assets/images/logo_pac.png') }}" alt="Best Skor" class="mb-3" style="width:60px; height:auto;">
                  <i class="fa-solid fa-video fa-3x mb-3 text-danger"></i>
                  <h5 class="card-title">Video Kegiatan</h5>
                  <p class="card-text">Kelola galeri video kegiatan PAC</p>
                  <a href="/videos" class="btn btn-danger btn-sm w-100">Detail</a>
                </div>
              </div>
            </div>

            <!-- Pendaftaran Anggota -->
            <div class="col-sm-6 col-lg-4">
              <div class="card text-center shadow-sm rounded-3 border-0 h-100 hover-shadow">
                <div class="card-body">
                  <img src="{{ asset('assets/images/logo_pac.png') }}" alt="Best Skor" class="mb-3" style="width:60px; height:auto;">
                  <i class="fa-solid fa-user-plus fa-3x mb-3 text-danger"></i>
                  <h5 class="card-title">Pendaftaran Anggota</h5>
                  <p class="card-text">Kelola Data Pendaftaran Anggota PAC</p>
                  <a href="/members" class="btn btn-danger btn-sm w-100">Detail</a>
                </div>
              </div>
            </div>

            <!-- Program -->
            <div class="col-sm-6 col-lg-4">
              <div class="card text-center shadow-sm rounded-3 border-0 h-100 hover-shadow">
                <div class="card-body">
                  <img src="{{ asset('assets/images/logo_pac.png') }}" alt="Best Skor" class="mb-3" style="width:60px; height:auto;">
                  <i class="fa-solid fa-clipboard-list fa-3x mb-3 text-danger"></i>
                  <h5 class="card-title">Program</h5>
                  <p class="card-text">Kelola Data Program PAC</p>
                  <a href="/programs" class="btn btn-danger btn-sm w-100">Detail</a>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
  </div>
</section>
@endsection
