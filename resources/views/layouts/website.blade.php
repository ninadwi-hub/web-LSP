
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/THEMES/Medicio/assets/img/favicon.png" rel="icon">
  <link href="/THEMES/Medicio/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/THEMES/Medicio/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/THEMES/Medicio/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/THEMES/Medicio/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/THEMES/Medicio/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/THEMES/Medicio/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/THEMES/Medicio/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/THEMES/Medicio/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/THEMES/Medicio/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/THEMES/Medicio/assets/css/style.css" rel="stylesheet">
    @stack('styles')
</head>

<body>

  @include('layouts.partials.header')

  @yield('content')

  @include('layouts.partials.footer1')

  <!-- Vendor JS Files -->
  <script src="/THEMES/Medicio/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/aos/aos.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/THEMES/Medicio/assets/js/main.js"></script>
  @stack('scripts')
</body>

</html>