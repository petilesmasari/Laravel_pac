@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="berita" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <p>Management Video</p>
        </div>

        <h4 class="fw-bold mb-3">Halaman Management Video</h4>

        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#videoModal">Tambah Video</button>

        {{-- Pesan Sukses --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Informasi</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive py-2">
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Video</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($videos as $video)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $video->judul }}</td>
                        <td>
                            <iframe height="150" src="https://www.youtube.com/embed/{{$video->youtube_code}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#videoModal{{$video->id}}">Edit</a>
                            <form action="{{route('video.destroy', $video->id)}}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade @if ($errors->any()) show @endif" id="videoModal{{$video->id}}" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="videoModalLabel">Edit video</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_video" value="{{ $video->id }}">

                                        <div class="form-group mb-3">
                                            <label for="judul">Judul</label>
                                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{$video->judul}}">
                                            @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="youtube_code">Video</label>
                                            <input type="text" name="youtube_code" id="youtube_code" class="form-control @error('youtube_code') is-invalid @enderror" value="{{$video->youtube_code}}">
                                            @error('youtube_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade @if ($errors->any()) show @endif" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Tambah Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('video.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="youtube_code">Video</label>
                            <input type="text" name="youtube_code" id="youtube_code" class="form-control @error('youtube_code') is-invalid @enderror" value="{{ old('youtube_code') }}">
                            @error('youtube_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
            </div>
            </div>
        </div>
    </div>
    </section>
{{-- End Berita --}}
@endsection
