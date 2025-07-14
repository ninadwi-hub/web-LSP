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

    <a href="/" class="logo me-auto">
      <img src="/THEMES/Medicio/assets/img/logo_lsp.png" alt="Logo LSP">
    </a>

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


<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Kontak Kami</h2>
        </div>

      </div>

      <div>
            <div>
        <iframe style="border:0; width: 100%; height: 350px;"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.920759929992!2d110.3360937!3d-7.8625761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5747828cf8e5%3A0x3f6419de12178de5!2sLSP%20Trainer%20Kompeten%20Indonesia!5e0!3m2!1sid!2sid!4v1720586300994!5m2!1sid!2sid"
 frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Alamat Kami</h3>
                  <p>Jalan Bangmalang No. 5, RT 56, Dusun Diro, Kelurahan Pendowoharjo<br>Kecamatan Sewon, Kabupaten Bantul, Provinsi Daerah Istimewa Yogyakarta</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Kmai</h3>
                  <p>admin@lsptrainerkompetenindonesia.id</p>
                </div>
              </div>
             <div class="col-md-6">
            <div class="info-box mt-4">
             <i class="bx bx-phone-call"></i>
             <h3>Hubungi Kami</h3>
             <a href="https://api.whatsapp.com/send/?phone=6281364715451&text&type=phone_number&app_absent=0" target="_blank" style="color: inherit; text-decoration: none;">
      <p>0813-6471-5451</p>
    </a>
  </div>
</div>


          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->



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
