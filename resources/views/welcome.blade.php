@extends('layouts.layouts')

@section('content')
    <style>
        .fixed-img-berita {
            height: 200px; /* Atur tinggi gambar yang diinginkan */
            object-fit: cover;
        }

        /* Carousel Styles */
        #foto .carousel-item img {
            height: 400px;
            object-fit: cover;
        }

        .video-responsive {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .video-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #berita .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        #berita .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        #join {
            background-color: #f8f9fa;
        }

        .stripe {
            width: 5px;
            height: 50px;
            background-color: #dc3545;
        }

        .hero-text {
            font-size: 3rem;
            font-weight: 700;
        }
    </style>

        {{-- Hero --}}
        <section id="hero">
            <div class="container">
                <div class="hero-title text-center" data-aos="fade-up">
                    <div class="hero-text ">Selamat Datang <br> Di Pontianak Archery Club </div>
                    <h5>Belajar Panahan Jadi Asyik dan Menyenangkan</h5>
                </div>
            </div>
        </section>
        {{-- End Hero --}}

        {{-- Foto --}}
        <section id="foto" class="py-5 bg-light">
            <div class="container" data-aos="zoom-in-up">
                <div class="header text-center mb-5">
                    <h2 class="display-6 font-bold">Foto Terbaru</h2>
                </div>

                <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3 shadow">
                        @foreach ($photos as $index => $photo)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/photo/' . $photo->image) }}" class="d-block w-100" alt="{{ $photo->judul }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $photo->judul }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="footer text-center mt-4">
                    <a href="/foto" class="btn btn-danger">Lihat Semua Foto</a>
                </div>
            </div>
        </section>
        {{-- End Foto --}}

        {{-- Join --}}
        <section id="join" class="py-5" data-aos="flip-up">
            <div class="container py-5">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="stripe me-2"></div>
                            <h5> Daftar  Jadi Member </h5>
                        </div>
                        <h1 class="mb-2">Jadilah Bagian dari Keluarga Besar Pontianak Archery Club</h1>
                        <p class="mb-3">Pontianak Archery Club adalah tempat yang tepat untuk mengembangkan kemampuan panahan, melatih fokus, dan membangun karakter juara dengan bimbingan pelatih berpengalaman</p>
                        <a href="{{ route('membership.daftar') }}" class="btn btn-outline-danger">Daftar</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/lomba.jpeg')}}" alt="Join" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </section>
        {{-- End Join --}}

        {{-- Berita --}}
        <section id="berita" class="py-5">
            <div class="container">
                <div class="header text-center py-4">
                    <h2>Berita Terbaru</h2>
                </div>

                {{-- CSS untuk menyamakan ukuran gambar --}}
                <style>
                    .fixed-img {
                        width: 100%;
                        height: 220px; /* atur tinggi sesuai kebutuhan, misalnya 220px */
                        object-fit: cover; /* supaya gambar proporsional */
                        border-top-left-radius: 0.5rem;
                        border-top-right-radius: 0.5rem;
                    }
                </style>

                <div class="row">
                    @foreach ($artikels as $item)
                    <div class="col-lg-4 mb-4" data-aos="flip-up">
                        <div class="card border-0 shadow h-100 d-flex flex-column">
                            <img src="{{ asset('storage/artikel/' . $item->image)}}" 
                                alt="{{ $item->judul }}" 
                                class="card-img-top fixed-img">

                            <div class="px-2 py-3">
                                <p class="mb-3">
                                    {{ $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
                                </p>
                                <h4 class="mb-3 font-bold">{{ $item->judul }}</h4>
                                <a href="/detail/{{ $item->slug }}" 
                                class="mb-3 text-danger text-decoration-none">
                                Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="footer text-center py-4">
                    <a href="{{ route('berita') }}" class="btn btn-outline-danger font-bold">
                        Berita Lainnya
                    </a>
                </div>
            </div>
        </section>
        {{-- End Berita --}}


        {{-- Video Youtube --}}
        <section id="video_youtube" class="py-5" data-aos="zoom-in">
            <div class="container">
                <div class="header text-center">
                    <h2>Video Terbaru</h2>
                </div>

                <div class="row py-5">
                    @foreach ($videos as $video)
                    <div class="col-lg-4">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{$video->youtube_code}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    @endforeach
                </div>

                <div class="footer text-center">
                    <a href="/video" class="btn btn-outline-danger font-bold">Video Lainnya</a>
                </div>
            </div>
        </section>
        {{-- End Video Youtube --}}

@endsection
