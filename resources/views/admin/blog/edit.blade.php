@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="berita" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('blog')}}" class="text-decoration-none">Blog</a>
            <div class="mx-1">/</div>
            <a href="" class="text-decoration-none">Edit Artikel</a>
        </div>

        <h4 class="fw-bold mb-3">Halaman Edit Artikel</h4>

        <form action="{{ route('blog.update', $artikel->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="">Masukan Judul Kegiatan</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $artikel->judul) }}">
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Pilih Photo Kegiatan</label>
                <input type="hidden" name="old_image" value="{{ $artikel->image }}" >
                <div>
                    <img src="{{ asset('storage/artikel/' . $artikel->image)}}" alt="Old Image" class="col-lg-4">
                </div>
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
                    {!! $artikel->desc !!}
                </textarea>

                @error('desc')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</section>
{{-- End Berita --}}
@endsection
