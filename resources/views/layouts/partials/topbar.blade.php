<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex align-items-center">
            {{-- Tombol Sidebar --}}
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            {{-- Logo --}}
            <div class="d-flex align-items-center ms-3">
                <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="Logo"
                     style="height: 32px;" class="me-2">
            </div>

            {{-- Form Search --}}
            <form class="app-search d-none d-lg-block ms-2">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <button class="btn btn-primary" type="button">
                        <i class="bx bx-search-alt"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- Dropdown User --}}
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                        id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{ asset('themes/minia/assets/images/users/avatar-1.jpg') }}"
                         alt="User Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">
                        {{ Auth::user()->name ?? 'Admin' }}
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">
                            <i class="mdi mdi-logout me-1"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
