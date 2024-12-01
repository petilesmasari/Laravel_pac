@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="berita" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <p>Management Photo</p>
        </div>

        <h4 class="fw-bold mb-3">Halaman Management Photo</h4>

        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#photoModal">Buat Photo</button>

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
                    <th>Image</th>
                    <th>Kegiatan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($photos as $photo)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>
                            <img src="{{asset('storage/photo/' . $photo->image)}}" alt="Image" height="100">
                        </td>
                        <td>{{ $photo->judul }}</td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#photoModal{{$photo->id}}">Edit</a>
                            <form action="{{route('photo.destroy', $photo->id)}}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade @if ($errors->any()) show @endif" id="photoModal{{$photo->id}}" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="photoModalLabel">Buat Photo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('photo.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_photo" value="{{$photo->id}}">
                                        <div class="form-group mb-3">
                                            <label for="image">Pilih Photo</label>
                                            <div class="col-lg-4">
                                                <img src="{{asset('storage/photo/' . $photo->image)}}" height="100" alt="Photo">
                                            </div>
                                            <input type="hidden" name="old_image" value="{{$photo->image}}">
                                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="judul">Judul Kegiatan</label>
                                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{$photo->judul}}">
                                            @error('judul')
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade @if ($errors->any()) show @endif" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">Buat Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="image">Pilih Photo Kegiatan</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="judul">Judul Kegiatan</label>
                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                            @error('judul')
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
