<!doctype html>
<html lang="id" data-layout="vertical" data-layout-style="default" data-layout-mode="light"
    data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-width="fluid" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard') | STMIK EL RAHMA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Laravel Admin Dashboard" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('themes/minia/assets/images/favicon.ico') }}">

    <!-- CSS -->
    <link href="{{ asset('themes/minia/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('themes/minia/assets/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('themes/minia/assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('themes/minia/assets/css/custom.min.css') }}" rel="stylesheet" />

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

    <!-- Scripts -->
    <script src="{{ asset('themes/minia/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/js/layout.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/js/app.js') }}"></script>
    <script> feather.replace(); </script>

    @stack('scripts')
</body>
</html>
