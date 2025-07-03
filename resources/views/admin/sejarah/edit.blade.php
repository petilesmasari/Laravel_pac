@extends('layouts.layouts')

@section('title', 'Edit Sejarah')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Edit Sejarah</h3>

    <form action="{{ route('sejarah.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Isi Sejarah</label>
            <textarea name="isi" class="form-control" rows="6">{{ $data->isi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Saat Ini:</label><br>
            @if($data->gambar)
                <img src="{{ asset('storage/' . $data->gambar) }}" width="150" class="mb-2">
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sejarah') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
