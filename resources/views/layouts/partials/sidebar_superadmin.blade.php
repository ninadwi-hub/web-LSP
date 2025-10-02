<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu SuperAdmin</li>

                <!-- Dashboard -->
                <li class="{{ request()->routeIs('dashboardSA') ? 'mm-active' : '' }}">
                    <a href="{{ route('dashboardSA') }}">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Persiapan -->
                <li class="has-submenu {{ request()->routeIs('sa.persiapan.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="bx bx-briefcase"></i>
                        <span>Persiapan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('sa.persiapan.jadwal') ? 'active' : '' }}">
                            <a href="#">Jadwal Asesmen</a>
                        </li>
                         <li class="{{ request()->routeIs('sa.persiapan.jadwal') ? 'active' : '' }}">
                            <a href="#">Token</a>
                        </li>
                    </ul>
                </li>

                 <!--Sertifikasi -->
                <li class="has-submenu {{ request()->routeIs('#') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="bx bx-file-text"></i>
                        <span>Sertifikasi</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
                            <a href="#">Administrasi UJK</a>
                        </li>
                         <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
                            <a href="#">Pairing</a>
                        </li>
                         <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
                            <a href="#">Pra Asesmen</a>
                        </li>
                         <li class="{{ request()->routeIs('#l') ? 'active' : '' }}">
                            <a href="#">Real Asasmen</a>
                        </li>
                         <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
                            <a href="#">Uji Kompetensi</a>
                        </li>
                         <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
                            <a href="#">Rekomendasi Asesor</a>
                        </li>
                         <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
                            <a href="#">Berita Acara Asesmen</a>
                        </li>
                         <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
                            <a href="#">Sertifikasi</a>
                        </li>
                    </ul>
                </li>

