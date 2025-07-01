@extends('layouts.layouts')

@section('content')
{{-- Register --}}
<section id="berita" style="margin-top: 100px">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h4>Register Admin</h4>
                            <p class="text-muted">Pontianak Archery Club</p>
                        </div>

                        <form action="/register" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama lengkap" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email Anda" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password (min 8 karakter)" required>
                            </div>
                            
                            <div class="mb-5">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ulangi password Anda" required>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            
                            <div class="text-center mt-3">
                                <small>Sudah punya akun? <a href="/login">Login disini</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End Register --}}
@endsection