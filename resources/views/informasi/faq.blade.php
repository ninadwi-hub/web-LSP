<!DOCTYPE html>
<html lang="id">
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

  <!-- =======================================================
  * Template Name: Medicio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Senin - Sabtu, 08.00 - 16.00
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i>Hubungi Kami 0813-6471-5451
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="/THEMES/Medicio/assets/img/logo_lsp.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

        <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto" href="#hero">Home</a></li>

        <!-- Profil Dropdown -->
        <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a class="dropdown-item" href="{{ url('/profil/sejarah-visi-&-misi') }}">Sejarah, Visi & Misi</a></li>
            <li><a class="dropdown-item" href="{{ url('/profil/struktur-organisasi') }}">Struktur Organisasi</a></li>
            <li><a class="dropdown-item" href="{{ url('/profil/wewenang-tugas-&-fungsi') }}">Wewenang Tugas & Fungsi</a></li>
            <li><a class="dropdown-item" href="{{ url('/profil/tugas-pokok-personal') }}">Tugas Pokok Personal</a></li>
            <li><a class="dropdown-item" href="{{ url('/profil/program-kerja') }}">Program Kerja</a></li>
          </ul>
        </li>

        <!-- Sertifikasi Dropdown -->
        <li class="dropdown"><a href="#"><span>Sertifikasi</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
<li><a class="dropdown-item" href="{{ route('sertifikasi.asesor') }}">Asesor Kompetensi</a></li>
            <li><a class="dropdown-item" href="{{ route('sertifikasi.pemegang') }}">Pemegang Sertifikat</a></li>
            <li><a class="dropdown-item" href="{{ route('sertifikasi.skema') }}">Skema Sertifikasi</a></li>
            <li><a class="dropdown-item" href="{{ route('sertifikasi.tuk') }}">Tempat Uji Kompetensi</a></li>
          </ul>
        </li>


          <!-- Media -->
          <li class="dropdown"><a href="#"><span>Media</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="dropdown-item" href="{{ route('media.brosur') }}">Brosur</a></li>
            </ul>
          </li>

          <!-- Informasi -->
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="dropdown-item" href="{{ route('informasi.faq') }}">FAQ</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="{{ route('kontak') }}">Kontak Kami</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

      <a href="#appointment" class="appointment-btn scrollto">
        <span class="d-none d-md-inline">Login</span>
      </a>
    </div>
  </header>
  <!-- End Header -->

    {{-- Breadcrumb Area --}}
<section class="py-3" style="background: #eefafd; border-top: 1px solid #ddd;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex gap-2 align-items-center text-muted">
                <span style="color: #17c0d1; font-weight: 500;">Home</span>
                <span>/</span>
                <span class="text-secondary">Sejarah, Visi & Misi</span>
            </div>
        </div>
    </div>
</section>


{{-- Judul dan Gambar --}}
<section class="py-5 bg-light">
    <div class="container text-center">
<!-- ======= Frequently Asked Questioins Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questioins</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End Frequently Asked Questioins Section -->




     <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>LSP Trainer Kompeten Indonesia</h3>
              <p>
              Alamat: Jalan Bangmalang No. 5, RT 56, Dusun Diro, <br>
              Kelurahan Pendowoharjo<br>
              Kecamatan Sewon, Kabupaten Bantul,<br>
             Provinsi Daerah Istimewa Yogyakarta<br><br><br>
                <strong>Phone:</strong>  081364715451<br>
                <strong>Email:</strong>  admin@lsptrainerkompetenindonesia.id<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">BNSP</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">KEMNAKER</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Instruktur Master</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Instruktur</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Instruktur Junior</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pelatih di Tempat Kerja</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Penyelenggara Pelatihan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Medicio</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

</body>
</html>
