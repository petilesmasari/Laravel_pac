@extends('layouts.layouts')

@section('content')
{{-- Berita --}}
<section id="berita" style="margin-top: 50px">
    <div class="container py-5 col-xl-8">
        <div class="text-center py-3-3">
            <h2>Halaman Login Admin Pontianak Archery Club</h2>
        </div>

        <form action="/login" method="post" class="d-flex flex-column">
            @csrf
            <label for="email">Masukan Email</label>
            <input type="email" name="email" id="email">
            <label for="password">Masukan Password</label>
            <input type="password" name="password" id="password">
            <button class="btn btn-primary mt-2">Login</button>
        </form>
    </div>
</section>
{{-- End Berita --}}
@endsection
