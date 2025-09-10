@extends('layouts.layouts')
@section('title', 'Data Skor')

@section('content')
<section id="skor" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <p>Management Skor Bulanan</p>
        </div>

        <h4 class="fw-bold mb-3">Halaman Management Skor</h4>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('skors.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="col">
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col">
                    <input type="number" name="skor" class="form-control" placeholder="Skor" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered text-center">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Skor</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($skors as $skor)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $skor->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($skor->tanggal)->format('d M Y') }}</td>
                    <td>{{ $skor->skor }}</td>
                    <td>
                        <a href="{{ route('skors.edit', $skor->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('skors.destroy', $skor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection