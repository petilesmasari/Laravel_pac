@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="foto" class="parallax" data-aos="zoom-in-up" style="margin-top: 85px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="stripe-putih me-2"></div>
                <h5>Kegiatan Pontianak Archery Club</h5>
            </div>
        </div>

        <div class="row p-4">
            <div class="col-lg-3 col-6 mb-2">
                <a class="image-link" href="{{ asset('assets/images/il-photo-01.png')}}">
                    <img src="{{ asset('assets/images/il-photo-01.png')}}" alt="" class="img-fluid">
                </a>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <a class="image-link" href="{{ asset('assets/images/il-photo-02.png')}}">
                    <img src="{{ asset('assets/images/il-photo-02.png')}}" alt="" class="img-fluid">
                </a>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <a class="image-link" href="{{ asset('assets/images/il-photo-03.png')}}">
                    <img src="{{ asset('assets/images/il-photo-03.png')}}" alt="" class="img-fluid">
                </a>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <a class="image-link" href="{{ asset('assets/images/il-photo-04.png')}}">
                    <img src="{{ asset('assets/images/il-photo-04.png')}}" alt="" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</section>
{{-- End Berita --}}
@endsection
