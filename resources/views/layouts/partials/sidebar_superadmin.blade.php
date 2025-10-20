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
                        <li class="{{ request()->routeIs('sa.persiapan.jadwal.index') ? 'active' : '' }}">
                            <a href="{{ route('sa.persiapan.jadwal.index') }}">Jadwal Asesmen</a>
                        </li>
                        <li class="{{ request()->routeIs('sa.tokens.index') ? 'active' : '' }}">
                            <a href="{{ route('sa.tokens.index') }}">Token</a>
                        </li>
                    </ul>
                </li>

                <!-- Sertifikasi -->
                <li class="has-submenu {{ request()->routeIs('#*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i data-feather="file-text"></i>
                        <span>Sertifikasi</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Administrasi UJK</a></li>
                        <li><a href="#">Pairing</a></li>
                        <li><a href="#">Pra Asesmen</a></li>
                        <li><a href="#">Real Asesmen</a></li>
                        <li><a href="#">Uji Kompetensi</a></li>
                        <li><a href="#">Rekomendasi Asesor</a></li>
                        <li><a href="#">Berita Acara Asesmen</a></li>
                        <li><a href="#">Sertifikasi</a></li>
                    </ul>
                </li>

                <!-- Data Dictionary -->
                <li class="has-submenu {{ request()->routeIs('#*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i data-feather="layers"></i>
                        <span>Data Dictionary</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Skema Sertifikasi UJK</a></li>
                        <li>
                            <a href="{{ route('tuk.index') }}">TUK</a>
                        </li>
                        <li><a href="{{ route('sa.asesor_kompetensi.index') }}">Asesor Kompetensi</a></li>
                        <li><a href="#">Pertanyaan Wawancara</a></li>
                        <li><a href="#">Dokumen Portofolio</a></li>
                        <li><a href="#">Substansi Wawancara</a></li>
                    </ul>
                </li>

                <!--CMS -->
                <li class="has-submenu {{ request()->routeIs('#*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i data-feather="layers"></i>
                        <span>Data CMS</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Halaman</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Konfigurasi</a></li>
                        <li><a href="#">Slide</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Download</a></li>
                    </ul>
                </li>

                <!--Perangkat Asesmen -->
                <li class="has-submenu {{ request()->routeIs('#*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i data-feather="layers"></i>
                        <span>Data Perangkat Asesmen</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Master Perangkat</a></li>
                        <li><a href="#">Detail Perangkat</a></li>
                        <li><a href="#">Bank Soal</a></li>
                    </ul>
                </li>

                <!--Report -->
                <li class="has-submenu {{ request()->routeIs('#*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i data-feather="grid"></i>
                        <span>Report</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Laporan Asesmen</a></li>
                        <li><a href="#">Blanko Sertifikat</a></li>
                        <li><a href="#">Monitoring Asesmen</a></li>
                        <li><a href="#">Monitoring TUK</a></li>
                        <li><a href="#">Kinerja Asesor</a></li>
                        <li><a href="#">Ruang Lingkup Asesor</a></li>
                        <li><a href="#">Pemakaian Blanko</a></li>
                    </ul>
                </li>

                <!--Report -->
                <li class="has-submenu {{ request()->routeIs('#*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i data-feather="grid"></i>
                        <span>Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">User</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>