{{-- Navbar --}}
<nav class="navbar navbar-expand-lg py-3 fixed-top {{ Request::segment(1) == '' ? '' : 'bg-white shadow'}}">
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
                    <li><a class="dropdown-item text-dark" href="/sejarah">Sejarah</a></li>
                    <li><a class="dropdown-item text-dark" href="/visi_misi">Visi Misi</a></li>
                    <li><a class="dropdown-item text-dark" href="/struktur_organisasi">Struktur Organisasi</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Membership
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-dark" href="/syarat_member">Syarat Jadi Member</a></li>
                    <li><a class="dropdown-item text-dark" href="{{ route('membership.daftar') }}">Daftar Jadi Member</a></li>
                    <li><a class="dropdown-item text-dark" href="{{ route('skorfrontend') }}">Best Skor</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/program">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/events">Event</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Galeri
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-dark" href="/foto">Foto</a></li>
                    <li><a class="dropdown-item text-dark" href="/video">Video</a></li>
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
                    {{-- <a href="/register" class="btn btn-outline-danger me-2">Register</a>
                    <a href="/login" class="btn btn-danger">Login</a> --}}
                @endauth
            </div>
        </div>
    </div>
</nav>
{{-- End Navbar --}}