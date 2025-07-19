@extends('layouts.layouts')

@section('content')
{{-- Member --}}
<section id="member" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <a href="{{route('members.index')}}" class="text-decoration-none">Data Member</a>
        </div>

        <h4 class="fw-bold mb-3">Halaman Data Member</h4>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Informasi</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
                                <a href="{{ asset('storage/' . $member->bukti_pembayaran_path) }}" 
                                   target="_blank" 
                                   class="btn btn-sm btn-info">
                                    Lihat Bukti
                                </a>
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $member->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
{{-- End Member --}}
@endsection