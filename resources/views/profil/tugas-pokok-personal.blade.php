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
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
           <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
             <li><a class="dropdown-item" href="{{ url('/profil/sejarah-visi-&-misi') }}">Sejarah, Visi & Misi</a></li>
                <li><a class="dropdown-item" href="{{ url('/profil/struktur-organisasi') }}">Struktur Organisasi</a></li>
               <li><a class="dropdown-item" href="{{ url('/profil/wewenang-tugas-dan-fungsi') }}">Wewenang Tugas dan Fungsi</a></li>
              <li><a class="dropdown-item" href="{{ url('/profil/tugas-pokok-personal') }}">Tugas Pokok Personal</a></li>
             <li><a class="dropdown-item" href="{{ url('/profil/program-kerja') }}">Program Kerja</a></li>
            </ul>
          </li>
        <li class="dropdown"><a href="#"><span>Sertifikasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Skema Sertifikasi</a></li>
              <li><a href="#">Tempat Uji Kompetensi</a></li>
              <li><a href="#">Asesor Kompetensi</a></li>
              <li><a href="#">Pemegang Sertifikat</a></li>
            </ul>
          </li>
   <li class="dropdown"><a href="#"><span>Media</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Youtube </a></li>
              <li><a href="#">Instagram </a></li>
              <li><a href="#">Brosur LSP</a></li>
              <li><a href="#">Gallery</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Alamat</a></li>
              <li><a href="#">FAQ</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login</span> </a>

    </div>
  </header><!-- End Header -->

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
        <h2 class="text-primary fw-bold mb-4">STRUKTUR ORGANISASI</h2>

        {{-- Gambar besar --}}
        <img src="{{ asset('/THEMES/Medicio/assets/img/tugas-pokok.png') }}" alt="Sejarah Visi Misi" class="img-fluid rounded shadow-sm" style="max-width: 700px;">
    </div>
</section>

{{-- Konten --}}
<section class="py-4">
    <div class="container">
         <h4 class="fw-bold mt-4">Dewan Pengarah</h4>
        <ul>
            <li>- Bertanggung atas keberlangsungan LSP</li>
            <li>- Penetapan visi, misi dan tujuan LSP</li>
            <li>- Menyusun rencana strategi, program kerja dan anggaran belanja</li>
            <li>- Mengangkat dan memberhentikan pelaksana LSP</li>
            <li>- Membina komunikasi dengan para pemangku kepentingan</li>
             <li>- Memobilisasi sumber daya.</li>
            <li>Peraturan BNSP Nomor 2 Tahun 2014 (7.1.3)</li>
        </ul>

        <h4 class="fw-bold mt-4">Direktur LSP</h4>
         <ul>
            <li>- Melaksanakan program kerja LSP</li>
            <li>- Melakukan monitoring dan evaluasi</li>
            <li>- Rencana program dan anggaran</li>
            <li>- Memberikan laporan bertanggungjawab kepada Dewan Pengarah</li>
            <li>Peraturan BNSP Nomor 2 Tahun 2014 (7.1.4)</li>
        </ul>

        <h4 class="fw-bold mt-4">Manajer Sertifikasi</h4>
        <ul>
            <li>Menyelenggarakan proses uji kompetensi sesuai prosedur dan sistem sertifikasi</li>
            <li>Memberikan pelayanan prima dan profesional dalam proses sertifikasi</li>
            <li>Menjamin obyektivitas, independensi, dan integritas dalam pelaksanaan uji kompetensi</li>
            <li>Membangun kerja sama dengan dunia usaha, dunia industri, dan lembaga pelatihan dalam memastikan mutu sumber daya manusia</li>
            <li>Meningkatkan kerjasama dan jejaring, bersinergi dengan pemangku kepentingan</li>
        </ul>
    </div>
</section>

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
