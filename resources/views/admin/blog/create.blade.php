@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="berita" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('blog')}}" class="text-decoration-none">Blog</a>
            <div class="mx-1">/</div>
            <a href="{{route('blog.create')}}" class="text-decoration-none">Buat Artikel</a>
        </div>

        <h4 class="fw-bold mb-3">Halaman Buat Artikel</h4>

        <form action="{{ route('blog.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="">Masukan Judul Kegiatan</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}">
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Pilih Photo Kegiatan</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Artike Berita</label>
                <textarea name="desc" id="summernote">
                    {{ old('desc') }}
                </textarea>

                @error('desc')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
{{-- End Berita --}}
@endsection
