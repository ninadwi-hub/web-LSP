<!doctype html>
<html lang="id" data-layout="vertical" data-layout-style="default" data-layout-mode="light"
    data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-width="fluid" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard') | LSP Trainer Kompeten Indonesia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Laravel Admin Dashboard" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('THEMES/minia/images/logo.bg.png') }}">

    <!-- CSS -->
    <link href="{{ asset('THEMES/minia/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('THEMES/minia/assets/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('THEMES/minia/assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('THEMES/minia/assets/css/custom.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('THEMES/minia/assets/css/custom.css') }}" rel="stylesheet">
    

    <!-- Tambahkan purple theme (opsional override warna default) -->
    <style>
        :root {
            --vz-primary: #7269ef;
            --vz-primary-rgb: 114, 105, 239;
        }
        .btn-primary {
            background-color: var(--vz-primary) !important;
            border-color: var(--vz-primary) !important;
        }
    </style>

    @stack('styles')
</head>

<body>
    <div id="layout-wrapper">

        @include('layouts.partials.topbar')
   <!-- Sidebar -->
@if(Auth::check())
    @php
        // Gunakan active_role langsung
        $activeRole = Auth::user()->active_role ?? explode(',', Auth::user()->role)[0];
    @endphp

    @if($activeRole === 'asesi')
        @include('layouts.partials.sidebar_asesi')
    @elseif($activeRole === 'asesor')
        @include('layouts.partials.sidebar_asesor')
    @elseif($activeRole === 'superadmin')
        @include('layouts.partials.sidebar_superadmin')
    @elseif($activeRole === 'admin')
        @include('layouts.partials.sidebar')
    @endif
@endif



        <!-- Page Content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('layouts.partials.footer')
        </div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('THEMES/minia/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/js/layout.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/js/app.js') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script> feather.replace(); </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>

    @stack('scripts')
</body>
</html>
