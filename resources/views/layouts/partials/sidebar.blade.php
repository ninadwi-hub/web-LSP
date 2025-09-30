<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu</li>

                <li class="{{ request()->routeIs('dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('users.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="bx bx-user"></i>
                        <span>Pengguna</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('kategoris.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.kategoris.index') }}">
                        <i class="bx bx-folder"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('infos.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.infos.index') }}">
                        <i class="bx bx-info-circle"></i>
                        <span>Informasi</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.pages.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="bx bx-file"></i>
                        <span>Halaman Statis</span>
                    </a>
                </li>

                <li class="has-submenu {{ request()->routeIs('galeri.*') || request()->routeIs('media.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="bx bx-image-alt"></i>
                        <span>Media</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.galeri.index') }}">Galeri</a>
                        </li>
                        <li class="{{ request()->routeIs('media.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.media.index') }}">File Download</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('contacts.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.contacts.index') }}">
                        <i class="bx bx-phone"></i>
                        <span>Kontak</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('menus.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.menus.index') }}">
                        <i class="bx bx-food-menu"></i>
                        <span>Manajemen Menu</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('panell.skema.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.skema.index') }}">
                        <i class="bx bx-award"></i>
                        <span>Skema Sertifikasi</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('panell.unit.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.unit.index') }}">
                        <i class="bx bx-check-square"></i>
                        <span>Unit Kompetensi</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
