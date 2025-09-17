@extends('layouts.layouts')

@section('title', 'Edit Data Member')

@section('content')
<section id="member" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">

        {{-- Breadcrumb --}}
        <div class="d-flex mb-3">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <a href="{{ route('admin.members.index') }}" class="text-decoration-none">Data Member</a>
            <div class="mx-1">/</div>
            <span class="text-muted">Edit Member</span>
        </div>

        <h4 class="fw-bold mb-4">Edit Data Member</h4>

        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Modal Bukti Pembayaran -->
                <div class="modal fade" id="modalBuktiPembayaran" tabindex="-1" aria-labelledby="buktiPembayaranLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buktiPembayaranLabel">Bukti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body text-center">
                        @if ($member->bukti_pembayaran_path)
                            <img src="{{ $member->bukti_pembayaran_url }}" alt="Bukti Pembayaran" class="img-fluid rounded shadow">
                        @else
                            <p class="text-muted">Tidak ada bukti pembayaran tersedia.</p>
                        @endif
                    </div>
                    </div>
                </div>
                </div>

                <form action="{{ route('admin.members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        {{-- Kolom Kiri --}}
                        <div class="col-md-6">
                            {{-- Nama Lengkap --}}
                            <div>
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $member->nama) }}" required>
                                @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="mt-3">
                                <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    value="{{ old('tanggal_lahir', $member->tanggal_lahir) }}" required>
                                @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="mt-3">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Bukti Pembayaran --}}
                            <div class="mt-3">
                                <label class="form-label">Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control @error('bukti_pembayaran') is-invalid @enderror">
                                @if($member->bukti_pembayaran_path)
                                    <small class="d-block mt-2">
                                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalBuktiPembayaran">
                                            <i class="fas fa-eye me-1"></i> Lihat Bukti
                                        </button>
                                    </small>
                                @endif
                                @error('bukti_pembayaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="col-md-6">
                            {{-- Pekerjaan / Sekolah --}}
                            <div>
                                <label class="form-label">Pekerjaan/Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror"
                                    value="{{ old('pekerjaan', $member->pekerjaan) }}" required>
                                @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Telepon --}}
                            <div class="mt-3">
                                <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                    value="{{ old('telepon', $member->telepon) }}" required>
                                @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Status --}}
                            <div class="mt-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="pendaftar" {{ old('status', $member->status) == 'pendaftar' ? 'selected' : '' }}>Pendaftar</option>
                                    <option value="anggota aktif" {{ old('status', $member->status) == 'anggota aktif' ? 'selected' : '' }}>Anggota Aktif</option>
                                    <option value="keluar" {{ old('status', $member->status) == 'keluar' ? 'selected' : '' }}>Keluar</option>
                                </select>
                                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Metode Pembayaran --}}
                            <div class="mt-3">
                                <label class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                                <select name="metode_pembayaran" class="form-select @error('metode_pembayaran') is-invalid @enderror" required>
                                    <option value="Transfer Bank" {{ old('metode_pembayaran', $member->metode_pembayaran) == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                                    <option value="E-Wallet" {{ old('metode_pembayaran', $member->metode_pembayaran) == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                                    <option value="Tunai" {{ old('metode_pembayaran', $member->metode_pembayaran) == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                                </select>
                                @error('metode_pembayaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div class="col-md-12">
                            <label class="form-label mt-2">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $member->alamat) }}</textarea>
                            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
