@extends('layouts.layouts')

@section('content')
{{-- Video Youtube --}}
<section id="video-youtube" style="margin-top: 50px">
    <div class="container py-5">
        <div class="header text-center py-4">
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
@endsection