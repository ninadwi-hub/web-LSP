<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu SuperAdmin</li>

                <!-- Dashboard SuperAdmin -->
                <li class="{{ request()->routeIs('dashboardSA') ? 'mm-active' : '' }}">
                    <a href="{{ route('dashboardSA') }}">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Pengguna -->
                <li class="{{ request()->routeIs('users.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="bx bx-user"></i>
                        <span>Pengguna</span>
                    </a>
                </li>

                <!-- Kategori -->
                <li class="{{ request()->routeIs('kategoris.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('kategoris.index') }}">
                        <i class="bx bx-folder"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <!-- Informasi/Artikel -->
                <li class="{{ request()->routeIs('admin.info.*') || request()->routeIs('infos.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.info.index') }}">
                        <i class="bx bx-info-circle"></i>
                        <span>Informasi</span>
                    </a>
                </li>

                <!-- Halaman Statis -->
                <li class="{{ request()->routeIs('admin.pages.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="bx bx-file"></i>
                        <span>Halaman Statis</span>
                    </a>
                </li>

                <!-- Media Submenu -->
                <li class="has-submenu {{ request()->routeIs('galeri.*') || request()->routeIs('admin.downloads.*') || request()->routeIs('admin.media.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="bx bx-image-alt"></i>
                        <span>Media</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                            <a href="{{ route('galeri.index') }}">Galeri</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.media.index') }}">Media Library</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.downloads.index') }}">File Download</a>
                        </li>
                    </ul>
                </li>

                <!-- Kontak -->
                <li class="{{ request()->routeIs('contacts.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('contacts.index') }}">
                        <i class="bx bx-phone"></i>
                        <span>Kontak</span>
                    </a>
                </li>

                <!-- Manajemen Menu -->
                <li class="{{ request()->routeIs('admin.menus.*') ? 'mm-active' : '' }}">