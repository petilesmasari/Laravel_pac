@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="berita" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <a href="{{route('blog')}}" class="text-decoration-none">Blog Artikel</a>
        </div>

        <h4 class="fw-bold mb-3">Halaman Blog Artikel</h4>

        <a href="{{ route('blog.create') }}" class="btn btn-primary mb-2">Buat Artikel</a>

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
                    <th>Judul</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($artikels as $artikel)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>
                            <img src="{{asset('storage/artikel/' . $artikel->image)}}" alt="Image" height="100">
                        </td>
                        <td>{{ $artikel->judul }}</td>
                        <td>
                            <a href="{{route('blog.edit', $artikel->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('blog.destroy', $artikel->id)}}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
</section>
{{-- End Berita --}}
@endsection
