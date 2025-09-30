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
        @include('layouts.partials.sidebar')

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
    <!-- Sidebar -->
    @if(Auth::check() && Auth::user()->name === 'superadmin')
        @include('layouts.partials.sidebar_superadmin')
    @else
        @include('layouts.partials.sidebar')
    @endif


    <!-- Scripts -->
    <script src="{{ asset('THEMES/minia/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/js/layout.js') }}"></script>
    <script src="{{ asset('THEMES/minia/assets/js/app.js') }}"></script>
    <script> feather.replace(); </script>

    @stack('scripts')
</body>
</html>
