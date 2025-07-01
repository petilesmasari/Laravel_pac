@extends('layouts.layouts')

@section('content')
{{-- Profil --}}
<section id="profil" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <p>Manajemen Profil</p>
        </div>

        <h4 class="fw-bold mb-3">Halaman Manajemen Profil</h4>

        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#profilModal">Tambah Profil</button>

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
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($profils as $profil)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ ucfirst($profil->kategori) }}</td>
                        <td>{{ $profil->judul }}</td>
                        <td>{{ Str::limit($profil->deskripsi, 100) }}</td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#profilModal{{$profil->id}}">Edit</a>
                            <form action="{{ route('profil.destroy', $profil->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="profilModal{{$profil->id}}" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profilModalLabel">Edit Profil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('profil.update', $profil->id) }}" method="POST">
                                        @csrf @method('PUT')

                                        <div class="form-group mb-3">
                                            <label>Kategori</label>
                                            <select name="kategori" class="form-control">
                                                <option value="sejarah" {{ $profil->kategori == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                                                <option value="visi-misi" {{ $profil->kategori == 'visi-misi' ? 'selected' : '' }}>Visi Misi</option>
                                                <option value="struktur-organisasi" {{ $profil->kategori == 'struktur-organisasi' ? 'selected' : '' }}>Struktur Organisasi</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Judul</label>
                                            <input type="text" name="judul" class="form-control" value="{{ $profil->judul }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="4">{{ $profil->deskripsi }}</textarea>
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
    <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profilModalLabel">Tambah Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profil.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control">
                                <option value="sejarah">Sejarah</option>
                                <option value="visi-misi">Visi Misi</option>
                                <option value="struktur-organisasi">Struktur Organisasi</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
