@extends('layouts.layouts')

@section('title', 'Edit Data Member')

@section('content')
{{-- Member --}}
<section id="member" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <a href="{{route('members.index')}}" class="text-decoration-none">Data Member</a>
            <div class="mx-1">/</div>
            <span class="text-muted">Edit Member</span>
        </div>

        <h4 class="fw-bold mb-3">Edit Data Member</h4>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                                       value="{{ old('nama', $member->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                       value="{{ old('tempat_lahir', $member->tempat_lahir) }}" required>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                       value="{{ old('tanggal_lahir', $member->tanggal_lahir) }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Pekerjaan/Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" 
                                       value="{{ old('pekerjaan', $member->pekerjaan) }}" required>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" 
                                       value="{{ old('telepon', $member->telepon) }}" required>
                                @error('telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="pendaftar" {{ old('status', $member->status) == 'pendaftar' ? 'selected' : '' }}>Pendaftar</option>
                                    <option value="anggota aktif" {{ old('status', $member->status) == 'anggota aktif' ? 'selected' : '' }}>Anggota Aktif</option>
                                    <option value="keluar" {{ old('status', $member->status) == 'keluar' ? 'selected' : '' }}>Keluar</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control @error('bukti_pembayaran') is-invalid @enderror">
                                @if($member->bukti_pembayaran_path)
                                    <small class="d-block mt-2">
                                        <a href="{{ asset('storage/' . $member->bukti_pembayaran_path) }}" target="_blank" class="text-primary">
                                            <i class="fas fa-eye me-1"></i> Lihat bukti saat ini
                                        </a>
                                    </small>
                                @endif
                                @error('bukti_pembayaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat', $member->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kontak Orangtua (Khusus Anak)</label>
                        <input type="text" name="kontak_orangtua" class="form-control @error('kontak_orangtua') is-invalid @enderror" 
                               value="{{ old('kontak_orangtua', $member->kontak_orangtua) }}">
                        @error('kontak_orangtua')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Catatan Admin</label>
                        <textarea name="catatan_admin" class="form-control @error('catatan_admin') is-invalid @enderror" rows="3">{{ old('catatan_admin', $member->catatan_admin) }}</textarea>
                        @error('catatan_admin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
{{-- End Member --}}
@endsection