@extends('layouts.layouts')
@section('title', 'Edit Skor')

@section('content')
<section id="skor" style="margin-top: 56px">
    <div class="container py-5 col-xl-8">
        <div class="d-flex mb-3">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <a href="{{ route('skors') }}" class="text-decoration-none">Management Skor</a>
            <div class="mx-1">/</div>
            <p>Edit Skor</p>
        </div>

        <h4 class="fw-bold mb-3">Edit Data Skor</h4>

        <form action="{{ route('skors.update', $skor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $skor->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $skor->tanggal }}" required>
            </div>

            <div class="mb-3">
                <label for="skor" class="form-label">Skor</label>
                <input type="number" name="skor" class="form-control" value="{{ $skor->skor }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('skors') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</section>
@endsection
