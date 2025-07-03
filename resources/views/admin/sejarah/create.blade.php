@extends('layouts.layouts')

@section('title', 'Tambah Sejarah')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Tambah Sejarah</h3>

    <form action="{{ route('sejarah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Isi Sejarah</label>
            <textarea name="isi" class="form-control" rows="6">{{ old('isi') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('sejarah') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
