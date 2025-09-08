<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Dashboard - TKI')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f8fd;
    }
    .sidebar {
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      background: #fff;
      border-right: 1px solid #e5e5e5;
      padding: 1rem;
    }
    .sidebar .logo {
      text-align: center;
      margin-bottom: 2rem;
    }
    .sidebar .menu-title {
      font-weight: bold;
      font-size: 0.9rem;
      margin: 1rem 0 0.5rem;
      color: #777;
    }
    .sidebar .nav-link {
      color: #444;
      font-weight: 500;
      margin-bottom: .3rem;
    }
    .sidebar .nav-link.active {
      color: #0d6efd;
    }
    .content {
      margin-left: 250px;
      padding: 1.5rem;
    }
    .topbar {
      height: 60px;
      background: #fff;
      border-bottom: 1px solid #e5e5e5;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1rem;
      margin-bottom: 1rem;
    }
    .profile-img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="logo">
      <img src="/THEMES/Medicio/assets/img/logo_lsp.png" alt="TKI Logo" class="img-fluid">
    </div>
    <div class="menu-title">MAIN MENU</div>
    <nav class="nav flex-column">
      <a href="{{ url('/publik/dashboard') }}" class="nav-link @if(request()->is('dashboard')) active @endif">
        <i class="bi bi-house-door"></i> Dashboard
      </a>
      <a href="#submenuAsesi" class="nav-link" data-bs-toggle="collapse">
        <i class="bi bi-person"></i> Asesi
      </a>
      <div class="collapse @if(request()->is('asesi/*')) show @endif" id="submenuAsesi">
        <nav class="nav flex-column ms-3">
          <a href="{{ url('/asesi/biodata') }}" class="nav-link @if(request()->is('asesi/biodata')) active @endif">Biodata</a>
          <a href="{{ url('/asesi/asesmen') }}" class="nav-link @if(request()->is('asesi/asesmen')) active @endif">Asesmen</a>
        </nav>
      </div>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="content">
    <!-- Topbar -->
    <div class="topbar">
      <button class="btn btn-light d-md-none" id="sidebarToggle"><i class="bi bi-list"></i></button>
      <div></div>
      <img src="/THEMES/Medicio/assets/img/departments-5.jpg" alt="Profile" class="profile-img">
    </div>

    <!-- Dynamic Content -->
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
