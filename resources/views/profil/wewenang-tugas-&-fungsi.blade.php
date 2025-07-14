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
            </div>
        </div>
    </div>
</section>


{{-- Judul dan Gambar --}}
<section class="py-5 bg-light">
    <div class="container text-center">

        {{-- Gambar besar --}}
        <img src="{{ asset('/THEMES/Medicio/assets/img/wewenang.png') }}" alt="Sejarah Visi Misi" class="img-fluid rounded shadow-sm" style="max-width: 700px;">
    </div>
</section>

{{-- Konten --}}
<section class="py-4">
    <div class="container">

        <h2 class="fw-bold mb-2">Wewenang, Tugas & Fungsi</h2>
        <div class="mb-3 text-muted">
            <i class="bi bi-person-fill"></i> By Admin
            <i class="bi bi-tag-fill ms-3"></i> Profil
        </div>

        <div class="bg-info bg-opacity-25 rounded p-3 mb-4">
            <strong class="text-primary">KEDUDUKAN DAN FUNGSI</strong>
        </div>

        <p>
            LSP Trainer Kompeten Indonesia adalah organisasi tingkat nasional yang berkedudukan di wilayah Republik Indonesia, berkantor pusat di Jl. Bangmalang No. 5, RT 56, Diro, Pendowoharjo, Sewon Bantul, Daerah Istimewa Yogyakarta.
        </p>

        <p>
            Fungsi dari LSP Trainer Kompeten Indonesia adalah sebagai lembaga sertifikasi profesi di bidang Pelatihan Kerja, yang dilaksanakan dengan memperhatikan perspektif Undang-Undang Ketenagakerjaan No 13 tahun 2003 antara lain:
        </p>

        <ol>
            <li>Pasal 11: Setiap tenaga kerja berhak memperoleh dan/atau meningkatkan dan/atau mengembangkan kompetensi kerja sesuai dengan bakat, minat, dan kemampuannya melalui pelatihan kerja.</li>
            <li>Pasal 12: Pengusaha bertanggungjawab atas peningkatan dan atau pengembangan kompetensi pekerjaannya melalui kerja.</li>
            <li>Pasal 18 ayat 1: Tenaga kerja berhak memperoleh pengakuan kompetensi kerja setelah mengikuti pelatihan kerja yang diselenggarakan lembaga pelatihan kerja (pemerintah, swasta, sendiri).</li>
            <li>Pasal 18 ayat 2: Pengakuan kompetensi kerja dilakukan melalui sertifikasi kompetensi kerja.</li>
            <li>Pasal 18 ayat 3: Sertifikasi kompetensi kerja dapat pula diikuti oleh tenaga kerja berpengalaman.</li>
            <!-- Tambahkan poin lainnya jika perlu -->
        </ol>
        <div class="bg-info bg-opacity-25 rounded p-3 mb-4">
            <strong class="text-primary">TUGAS</strong>
        </div>

        <p>
            LSP Trainer Kompeten Indonesia adalah organisasi tingkat nasional dan dapat memiliki cabang di kota - kota di seluruh wilayah Republik Indonesai, memiliki tugas:
        </p>

        <ol>
            <li>Melaksanakan sertifikasi kompetensi;</li>
            <li>Meninjau ulang standar Kompetensi;</li>
            <li>Menyusun skema sertifikasi melalui identifikasi kompetensi bidang;</li>
            <li>Membuat Materi Uji Kompetensi;</li>
            <li>Menyediakan tenaga penguji (asesor) sekaligus memelihara kinerja asesor; melakukan asesmen;</li>
            <li>Menetapkan tempat uji kompetensi (TUK) sekaligus memelihara kinerja TUK.</li>
            <!-- Tambahkan poin lainnya jika perlu -->
        </ol>
        <div class="bg-info bg-opacity-25 rounded p-3 mb-4">
            <strong class="text-primary">WEWENANG</strong>
        </div>

        <p>
            Wewenang LSP Trainer Kompeten Indonesia adalah sebagai berikut:
        </p>

        <ol>
            <li>Menetapkan biaya uji kompetensi;</li>
            <li>Menerbitkan sertifikat kompetensi;</li>
            <li>Mencabut/membatalkan sertifikat kompetensi;</li>
            <li>Menetapkan dan meverifikasi TUK;</li>
            <li>Memberikan sanksi kepada asesor dan TUK yang melangggar aturan dan ketentuan;</li>
            <li>Mereview dan mengusulkan perbaikan standar kompetensi;</li>
            <li>Menyelenggarakan kerjasama dengan lembaga lain di dalam dan di luar negeri yang mempunyai maksud dan tujuan yang sama.</li>
            <!-- Tambahkan poin lainnya jika perlu -->
        </ol>

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
