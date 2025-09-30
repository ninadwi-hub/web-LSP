 <div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <!-- Title -->
                        <li class="menu-title">Menu</li>

                        <!-- Dashboard -->
                        <li class="{{ request()->routeIs('dashboard') ? 'mm-active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <i class="bx bx-home-circle"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Asesi (Dropdown) -->
                        <li>
                            <a href="javascript:void(0);" class="has-arrow">
                                <i class="bx bx-user"></i>
                                <span>Asesi</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('asesi.biodata') }}">Biodata</a></li>
                                <li><a href="{{ route('asesi.asesmen') }}">Asesmen</a></li>
                                <li><a href="{{ route('asesi.riwayat') }}">Riwayat Asesmen</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>