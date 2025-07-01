<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard Admin')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }

    .sidebar {
      height: 100vh;
      position: fixed;
      width: 220px;
      background-color: #b8363d;
      padding-top: 60px;
    }

    .sidebar a {
      color: #fff;
      padding: 10px 20px;
      display: block;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #495057;
    }

    .main-content {
      margin-left: 220px;
      padding: 20px;
    }

    .navbar {
      position: fixed;
      top: 0;
      left: 220px;
      right: 0;
      z-index: 1000;
    }

    footer {
      margin-left: 220px;
      padding: 10px 20px;
      background: #f8f9fa;
      border-top: 1px solid #ddd;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: static;
        width: 100%;
        height: auto;
      }

      .main-content {
        margin-left: 0;
      }

      .navbar {
        left: 0;
      }

      footer {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  {{-- Sidebar --}}
  <div class="sidebar">
    <h5 class="text-white text-center">Admin Panel</h5>
    <a href="/admin/dashboard"><i class="fas fa-home me-2"></i>Dashboard</a>
    <a href="/blog"><i class="fas fa-newspaper me-2"></i>Blog Artikel</a>
    <a href="/photo"><i class="fas fa-image me-2"></i>Photo Kegiatan</a>
    <a href="/video"><i class="fas fa-video me-2"></i>Video Kegiatan</a>
    <a href="/" target="_blank"><i class="fas fa-globe me-2"></i>Lihat Website</a>
    <a href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
  </div>

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
      <span class="navbar-brand">Dashboard Admin</span>
    </div>
  </nav>

  {{-- Main Content --}}
  <main class="main-content mt-5 pt-3">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="text-center">
    <small>&copy; {{ date('Y') }} Website Admin. All rights reserved.</small>
  </footer>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
