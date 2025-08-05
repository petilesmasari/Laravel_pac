@extends('layouts.layouts')

@section('content')
{{-- Member --}}
<section id="member" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <a href="{{route('admin.members.index')}}" class="text-decoration-none">Data Member</a>
        </div>

        <h4 class="fw-bold mb-3">Halaman Data Member</h4>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Informasi</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form method="GET" action="{{ route('admin.members.index') }}" class="mb-4">
            <div class="row g-2 align-items-end">
                <div class="col-md-4">
                    <label for="status" class="form-label">Filter Status Membership:</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="pendaftar" {{ request('status') == 'pendaftar' ? 'selected' : '' }}>Pendaftar</option>
                        <option value="anggota aktif" {{ request('status') == 'anggota aktif' ? 'selected' : '' }}>Anggota Aktif</option>
                        <option value="keluar" {{ request('status') == 'keluar' ? 'selected' : '' }}>Keluar</option>
                    </select>
                </div>
                <div class="col-md-auto">
                    <button type="submit" class="btn btn-primary">Terapkan</button>
                    <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>


        <div class="table-responsive py-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($members as $member)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $member->nama }}</td>
                        <td>{{ $member->telepon }}</td>
                        <td>
                            <span class="badge 
                                @if($member->status == 'anggota aktif') bg-success text-white
                                @elseif($member->status == 'pendaftar') bg-warning text-dark
                                @elseif($member->status == 'keluar') bg-danger text-white
                                @else bg-secondary text-white
                                @endif">
                                {{ ucfirst($member->status) }}
                            </span>
                        </td>
                        <td>
                            @if($member->bukti_pembayaran_path)
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#buktiModal{{ $member->id }}">
                                    Lihat Bukti
                                </button>
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $member->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal Bukti Pembayaran -->
                    <div class="modal fade" id="buktiModal{{ $member->id }}" tabindex="-1" aria-labelledby="buktiModalLabel{{ $member->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buktiModalLabel{{ $member->id }}">Bukti Pembayaran - {{ $member->nama }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            @if($member->bukti_pembayaran_path)
                                <img src="{{ asset('storage/' . $member->bukti_pembayaran_path) }}" alt="Bukti Pembayaran" class="img-fluid rounded shadow">
                            @else
                                <p class="text-muted">Bukti pembayaran tidak tersedia.</p>
                            @endif
                        </div>
                        </div>
                    </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
{{-- End Member --}}
@endsection