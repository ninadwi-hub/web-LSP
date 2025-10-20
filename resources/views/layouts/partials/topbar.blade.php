<!-- Header -->
<header id="page-topbar">
    <div class="navbar-header d-flex align-items-center">

        <!-- Kiri: Logo, Sidebar, Search -->
        <div class="d-flex align-items-center">
            <!-- Logo -->
            <div class="navbar-brand-box me-2">
                <a href="{{ route('dashboard') }}" class="logo">
                     <span class="logo-sm">
                        <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="" height="42">
                    </span>
                </a>
            </div>

            <!-- Tombol Sidebar -->
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item me-3" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- Form Search (desktop only) -->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <button class="btn btn-primary" type="button">
                        <i class="bx bx-search-alt align-middle"></i>
                    </button>
                </div>
            </form>
        </div>

       <!-- Kanan: User Dropdown -->
<div class="d-flex align-items-center">
    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle header-profile-user"
                 src="{{ isset($dokumen->foto) && $dokumen->foto ? asset('storage/' . $dokumen->foto) : asset('themes/minia/assets/images/users/avatar-1.jpg') }}"
                 alt="Header Avatar"
                 style="width: 40px; height: 40px;">
            <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name ?? 'User' }}</span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">
                    <i class="mdi mdi-logout me-1"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</div>


    </div>
</header>
<!-- End Header -->
