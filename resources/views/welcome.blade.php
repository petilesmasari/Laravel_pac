@extends('layouts.layouts')

@section('content')
        {{-- Hero --}}
        <section id="hero">
            <div class="container">
                <div class="hero-title text-center" data-aos="fade-up">
                    <div class="hero-text">Selamat Datang <br> Di Pontianak Archery Club </div>
                    <h5>Jadilah Bagian dari Keluarga Besar Pontianak Archery Club</h5>
                </div>
            </div>
        </section>
        {{-- End Hero --}}

        {{-- Program --}}
        <section id="program" style="margin-top: -40px">
            <div class="container col-xl-9">
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2" data-aos="fade-up">
                        <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-white shadow">
                            <p class="font-bold">Atlit <br> Berkualitas</p>
                            <img src="{{ asset('assets/images/ic-book.png')}}" width="50" height="50" alt="Buku" >
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-2" data-aos="fade-up">
                        <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-white shadow">
                            <p class="font-bold">Atlit <br> Berakhlak</p>
                            <img src="{{ asset('assets/images/ic-globe.png')}}" width="50" height="50" alt="Buku">
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-2" data-aos="fade-up">
                        <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-white shadow">
                            <p class="font-bold">Atlit <br> Cerdas</p>
                            <img src="{{ asset('assets/images/ic-neraca.png')}}" width="50" height="50" alt="Buku" >
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-2" data-aos="fade-up">
                        <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-white shadow">
                            <p class="font-bold">Atlit <br> Berprestasi</p>
                            <img src="{{ asset('assets/images/ic-komputer.png')}}" width="50" height="50" alt="Buku">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Program --}}

        {{-- Berita --}}
        <section id="berita" class="py-5">
            <div class="container">
                <div class="header text-center py-4">
                    <h2>Berita Kegiatan Pontianak Archery Club</h2>
                </div>

                <div class="row">
                    @foreach ($artikels as $item)
                    <div class="col-lg-4 mb-4" data-aos="flip-up">
                        <div class="card border-0 shadow">
                            <img src="{{ asset('storage/artikel/' . $item->image)}}" alt="Berita 1">
                            <div class="px-2 py-3">
                                <p class="mb-3">{{$item->created_at}}</p>
                                <h4 class="mb-3 font-bold">{{$item->judul}}</h4>
                                <p class="mb-3">#pesantrenmodern</p>
                                <a href="/detail/{{ $item->slug }}" class="mb-3 text-danger text-decoration-none">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="footer text-center py-4">
                    <a href="{{route('berita')}}" class="btn btn-outline-danger font-bold">Berita Lainnya</a>
                </div>
            </div>
        </section>
        {{-- End Berita --}}

        {{-- Join --}}
        <section id="join" class="py-5" data-aos="flip-up">
            <div class="container py-5">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="stripe me-2"></div>
                            <h5>Daftar Member</h5>
                        </div>
                        <h1 class="mb-2">Jadilah Bagian dari Keluarga Besar Pontianak Archery Club</h1>
                        <p class="mb-3">Pontianak Archery Club adalah tempat yang tepat untuk mengembangkan kemampuan panahan, melatih fokus, dan membangun karakter juara dengan bimbingan pelatih berpengalaman</p>
                        <button class="btn btn-outline-danger">Daftar</button>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/lomba.jpeg')}}" alt="Join" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        {{-- End Join --}}

        {{-- video --}}
        <section id="video" class="py-5">
            <div class="container py-5">
                <div class="mx-auto" style="max-width: 550px" data-aos="zoom-in">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/4wFyiRnAMvU?si=6xy1oZIr9kZ7Tkd-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        {{-- End Video --}}

        {{-- Video Youtube --}}
        <section id="video_youtube" class="py-5" data-aos="zoom-in">
            <div class="container">
                <div class="header text-center">
                    <h2>Video Kegiatan Pontianak Archery Club</h2>
                </div>

                <div class="row py-5">
                    @foreach ($videos as $video)
                    <div class="col-lg-4">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{$video->youtube_code}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    @endforeach
                </div>

                <div class="footer text-center">
                    <button class="btn btn-outline-danger font-bold">Video Lainnya</button>
                </div>
            </div>
        </section>
        {{-- End Video Youtube --}}

        {{-- Foto --}}
        <section id="foto" class="parallax" data-aos="zoom-in-up">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="stripe-putih me-2"></div>
                        <h5>Foto Kegiatan</h5>
                    </div>
                    <div>
                        <a href="/foto" class="btn btn-outline-danger">Foto Lainnya</a>
                    </div>
                </div>

                <div class="row p-4">
                    @foreach ($photos as $photo)
                    <div class="col-lg-3 col-6 mb-2">
                        <a class="image-link" href="{{ asset('storage/photo/' . $photo->image)}}">
                            <img src="{{ asset('storage/photo/' . $photo->image) }}" alt="" class="img-fluid">
                        </a>
                        <p>{{$photo->judul}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- End Foto --}}

        {{-- Fasilitas --}}
        <section id="fasilitas" data-aos="zoom-in-up">
            <div class="container py-5">
                <div class="text-center mb-3">
                    <h1 class="font-bold">Fasilitas Pontianak Archery Club</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="{{asset('assets/images/background.jpg')}}" height="300" alt="">
                </div>
                <div class="footer text-center py-4">
                    <button class="btn btn-outline-danger font-bold">Fasilitas Lainnya</button>
                </div>
            </div>
        </section>
        {{-- End Fasilitas --}}

@endsection
