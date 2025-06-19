<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Pontianak Archery Club</title>

        {{-- Meta untuk tampil di Whatsapp --}}
        @if (Request:: segment(1) == '')
            <meta property="og:title" content="Pesantren Al Hijrah"/>
            <meta name="description" content="Pesantren Moderan dengan Fasilitas Lengkap"/>
            <meta property="og:url" content="http://pesantrenalhijrah.com"/>
            <meta property="og:description" content="Pesantren Al Hijrah" />
            <meta property="og:image" content="{{ asset('assets/icons/logo_pac.png') }}"> <meta property="og:type" content="article" />
            <title>Pontianak Archery Club</title>
        @elseif (Request::segment (1) == 'detail')
            <meta property="og:title" content="{{ $artikel->judul }}" />
            <meta name="description" content="{{ $artikel->judul }}"/>
            <meta property="og:url" content="http://pesantrenalhijrah.com/detail/{{ $artikel->slug }}" /> <meta property="og:description" content="{{ $artikel->judul }}" />
            @if ($artikel->image)
                <meta property="og:image" content="{{ asset('storage/artikel/' . $artikel->image) }}" />
            @else
                <meta property="og:image" content="{{ asset('assets/icons/logo_pac.png') }}" />
            @endif
            <meta property="og:type" content="article" />
            <title>Pontianak Archery Club | {{ $artikel->title }}</title>
        @endif

        <link rel="shortcut icon" href="{{ asset('assets/images/logo_pac.png') }}">

        {{-- AOS --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        {{-- Magnific --}}
        <link rel="stylesheet" href="{{ asset('assets/css/magnific.css') }}">

        {{-- summernote --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css">


        {{-- style --}}
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    </head>
    <body>

        {{-- navbar --}}
        @include('layouts.navbar')


        {{-- content --}}
        @yield('content');

        {{-- Footer --}}
        <section id="footer" data-aos="zoom-in-up">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="font-bold mb-3">Jam Buka</h5>
                        <div class="d-flex">
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2">
                                    <a class="nav-link p-0 text-muted" href="#">SABTU - MINGGU<br />Sessi 1: 07.30 - 09.00 WIB<br/>Sessi 2: 09.30 - 11.00</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="font-bold mb-3">Follow Kami</h5>
                        <div class="d-flex mb-3">
                            <a href="#" target="_blank" class="text-decoration-none text-dark">
                                <img src="{{asset('assets/icon/instagram.svg')}}" alt="FB" height="30" width="30" class="me-2">
                            </a>
                            <a href="#" target="_blank" class="text-decoration-none text-dark">
                                <img src="{{asset('assets/icon/fb.svg')}}" alt="FB" height="30" width="30" class="me-2">
                            </a>
                            <a href="#" target="_blank" class="text-decoration-none text-dark">
                                <img src="{{asset('assets/icon/youtube.svg')}}" alt="FB" height="30" width="30" class="me-2">
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="font-bold mb-3">Kontak Kami</h5>
                        <div class="d-flex">
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2">
                                    <a class="nav-link p-0 text-muted" href="#">0896 3187 3410 (Bayu)</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link p-0 text-muted" href="#">0822 5427 0012 (Danz)</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <h5 class="font-inter font-bold mb-3">Alamat</h5>
                        <p>Jl. Uray Bawadi Gang Sentosa No. 15B, Sungai Bangkong, Kecamatan Pontianak Kota, Kota Pontianak, Kalimantan Barat</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8174245658756!2d109.3229791!3d-0.0383938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d595b612c9705%3A0xee52da2c8a70455d!2sPontianak%20Archery%20Club!5e0!3m2!1sid!2sid!4v1749009429242!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Footer --}}

        {{-- Copyright --}}
        <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>PontianakArcheryClub</span></strong>. All Rights Reserved
                </div>

            </div>
        {{-- Copyright --}}

        {{-- bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        {{-- AOS --}}
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        {{-- Magnific --}}
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         <script src="{{asset('assets/js/magnific.js')}}"></script>

         {{-- summernote --}}
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnX11h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 200,
                });
            });


            const navbar = document.querySelector('.fixed-top');
            window.onscroll = () => {
                if(window.scrollY > 100) {
                    navbar.classList.add("scroll-nav-active");
                    navbar.classList.add("text-nav-active");
                } else {
                    navbar.classList.remove("scroll-nav-active");
                }
            }

            // Animasi IOS
            AOS.init();

            // Magnific
            $(document).ready(function() {
                $('.image-link').magnificPopup({
                    type: 'image',
                    retina: {
                        ratio: 1,
                        replaceSrc: function(item, ratio) {
                            return item.src.replace(/\.\w+$/, function(m) {
                                return '@2x' + m;
                            })
                        }
                    }
                })
            })

            // modal photo bila error
            document.addEventListener('DOMContentLoaded', function () {
                @if ($errors->any())
                    @if (old('id_video'))
                        // Modal untuk edit video
                        var editModalId = 'videoModal' + {{ old('id_video') }};
                        var editModal = new bootstrap.Modal(document.getElementById(editModalId));
                        editModal.show();
                    @else
                        // Modal untuk create video
                        var createModal = new bootstrap.Modal(document.getElementById('videoModal'));
                        createModal.show();
                    @endif

                    @if (old('id_photo'))
                        // Modal untuk edit video
                        var editModalId = 'photoModal' + {{ old('id_photo') }};
                        var editModal = new bootstrap.Modal(document.getElementById(editModalId));
                        editModal.show();
                    @else
                        // Modal untuk create photo
                        var createModal = new bootstrap.Modal(document.getElementById('photoModal'));
                        createModal.show();
                    @endif
                @endif
            });
        </script>
    </body>
</html>
