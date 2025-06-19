{{-- Navbar --}}
<nav class="navbar navbar-expand-lg py-3 fixed-top {{ Request::segment(1) == '' ? '' : 'bg-white shadow'}}
">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/images/logo_pac.png')}}" width="40" height="40" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark font-bold" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-dark" href="about">Sejarah</a></li>
                    <li><a class="dropdown-item text-dark" href="team">Visi Misi</a></li>
                    <li><a class="dropdown-item text-dark" href="testimonials">Struktur Organisasi</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Membership
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-dark" href="about">Syarat Jadi Member</a></li>
                    <li><a class="dropdown-item text-dark" href="team">Daftar Jadi Member</a></li>
                    <li><a class="dropdown-item text-dark" href="testimonials">Best Skor</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Galery
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-dark" href="about">Foto</a></li>
                    <li><a class="dropdown-item text-dark" href="team">Video</a></li>
                </ul>
                </li>
            </ul>
            <div class="d-flex">
                @auth
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-dark" class="dropdown-item">Logout</button>
                    </form>
                @else
                    <a href="/login" class="btn btn-danger">Registrasi</a>
                @endauth

            </div>
        </div>
    </div>
    
</nav>
{{-- End Navbar --}}


