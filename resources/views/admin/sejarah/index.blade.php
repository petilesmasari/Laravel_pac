{{-- @extends('layouts.layouts')

@section('title', 'Kelola Sejarah')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Kelola Sejarah Klub</h3>
    <a href="{{ route('sejarah.create') }}" class="btn btn-primary mb-3">Tambah Sejarah</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" width="100">
                        @endif
                    </td>
                    <td>{!! Str::limit($item->isi, 100) !!}</td>
                    <td>
                        <a href="{{ route('sejarah.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sejarah.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
<p>Selamat datang di panel admin.</p>
@endsection

