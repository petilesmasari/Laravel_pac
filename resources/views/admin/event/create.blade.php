@extends('layouts.layouts')

@section('content')
{{-- Event --}}
<section id="event" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('event')}}" class="text-decoration-none">Event</a>
            <div class="mx-1">/</div>
            <a href="{{route('event.create')}}" class="text-decoration-none">Buat Event</a>
        </div>

        <h4 class="fw-bold mb-3">Halaman Buat Event</h4>

        <form action="{{ route('event.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="">Masukan Judul Event</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}">
                @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Pilih Foto Event</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Deskripsi Event</label>
                <textarea name="desc" id="summernote">{{ old('desc') }}</textarea>
                @error('desc')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
{{-- End Event --}}
@endsection
