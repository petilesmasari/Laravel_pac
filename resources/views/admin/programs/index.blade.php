@extends('layouts.layouts')

@section('content')
{{-- Program --}}
<section id="program" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <p>Management Program</p>
        </div>

        <h4 class="fw-bold mb-3">Halaman Management Program</h4>

        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#programModal">Tambah Program</button>

        {{-- Pesan Sukses --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Informasi</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive py-2">
            <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th width="15%">Aksi</th>
                    </tr>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($programs as $program)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $program->nama }}</td>
                        <td>{{ Str::limit($program->deskripsi, 50) }}</td>
                        <td>{{ $program->harga ? 'Rp '.number_format($program->harga, 0, ',', '.') : '-' }}</td>
                        <td>
                            @if($program->gambar)
                                <img src="{{ asset('storage/programs/' . $program->gambar) }}" width="100">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#programModal{{$program->id}}">Edit</a>
                            <form action="{{route('programs.destroy', $program->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade @if ($errors->any()) show @endif" id="programModal{{$program->id}}" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="programModalLabel">Edit Program</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id_program" value="{{ $program->id }}">

                                    <div class="form-group mb-3">
                                        <label for="nama">Nama Program</label>
                                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$program->nama}}">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{$program->deskripsi}}</textarea>
                                        @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="harga">Harga</label>
                                        <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{$program->harga}}">
                                        @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="gambar">Gambar</label>
                                        @if($program->gambar)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/programs/' . $program->gambar) }}" width="100">
                                        </div>
                                        @endif
                                        <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                        @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
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
    <div class="modal fade @if ($errors->any()) show @endif" id="programModal" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programModalLabel">Tambah Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="nama">Nama Program</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
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
{{-- End Program --}}
@endsection