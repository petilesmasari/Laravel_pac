@extends('layouts.layouts')

@section('content')
{{-- Event --}}
<section id="event" style="margin-top: 56px">
    <div class="container py-5 col-xl-9">
        <div class="d-flex mb-3">
            <a href="{{route('dashboard')}}" class="text-decoration-none">Home</a>
            <div class="mx-1">/</div>
            <a href="{{route('event')}}" class="text-decoration-none">Event</a>
        </div>

        <h4 class="fw-bold mb-3">Halaman Event</h4>

        <a href="{{ route('event.create') }}" class="btn btn-primary mb-2">Buat Event</a>

        {{-- Pesan Sukses --}}
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
                    <th>Image</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($events as $event)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>
                            <img src="{{asset('storage/event/' . $event->image)}}" alt="Image" height="100">
                        </td>
                        <td>{{ $event->judul }}</td>
                        <td>
                            <a href="{{route('event.edit', $event->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('event.destroy', $event->id)}}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                                    Hapus
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
{{-- End Event --}}
@endsection
