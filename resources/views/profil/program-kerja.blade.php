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

        {{-- Gambar besar --}}
        <img src="{{ asset('/THEMES/Medicio/assets/img/program-kerja.png') }}" alt="Sejarah Visi Misi" class="img-fluid rounded shadow-sm" style="max-width: 700px;">
    </div>
</section>

{{-- Konten --}}
<section class="py-4">
    <div class="container">

        <h2 class="fw-bold mb-2">Program Kerja</h2>
        <div class="mb-3 text-muted">
            <i class="bi bi-person-fill"></i> By Admin
            <i class="bi bi-tag-fill ms-3"></i> Profil
        </div>

        <h5 class="fw-bold text-uppercase mt-4">PROGRAM KERJA</h5>
        <p>
            Untuk mencapai target kerja, LSP Trainer Kompeten Indonesia telah menyusun program kerja jangka menengah yaitu 4 (empat) tahun ke depan (2022–2026), dengan garis besar sebagai berikut:
        </p>

        <h6 class="fw-bold mt-4">Bidang Sertifikasi</h6>
        <p>
            Mengajukan permohonan full assessment lisensi kepada BNSP dengan memenuhi semua persyaratan lisensi sesuai ketentuan BNSP.
        </p>
        <p>
            Menyusun <em>time schedule full assessment</em> dan <em>witness</em> untuk memperoleh lisensi, sehingga LSP TKI dapat melaksanakan uji kompetensi bagi para pengelola pelatihan dan instruktur.
        </p>

        <h6 class="fw-bold mt-4">Bidang Skema dan TUK</h6>
        <p>
            Sesuai dengan usulan dalam permohonan lisensi, bahwa skema yang sudah mendapat verifikasi BNSP ada 5 (lima) skema okupasi, yaitu Pelatih di Tempat Kerja, Instruktur Junior, Instruktur, Instruktur Master, dan Penyelenggara Pelatihan.
        </p>
        <ul>
            <li>Komite Skema membentuk tim kerja yang terdiri dari assessor dan Subject Matter Expert (SME) dari Perguruan Tinggi/Lembaga kajian.</li>
            <li>Rencana Pengembangan Skema:</li>
        </ul>

        <div class="text-center my-3">
            <img src="{{ asset('/THEMES/Medicio/assets/img/penambahan_skema.jpg') }}" alt="Tabel Penambahan Skema Sertifikasi" class="img-fluid rounded shadow">
        </div>

        <h6 class="fw-bold mt-4">Pelaksanaan Uji Kompetensi</h6>
        <p>
            Apabila lisensi LSP Trainer Kompeten Indonesia telah diperoleh dari BNSP, maka pelaksanaan uji kompetensi bagi seluruh pengelola pelatihan di sejumlah wilayah segera dilaksanakan. Rencana untuk 5 (lima) skema yang sudah diverifikasi BNSP sebagaimana ditunjukkan dalam tabel di bawah ini:
        </p>

        <div class="text-center my-3">
            <img src="{{ asset('/THEMES/Medicio/assets/img/penambahan_skema.jpg') }}" alt="Pelaksanaan Uji Kompetensi" class="img-fluid rounded shadow">
        </div>

        <h6 class="fw-bold mt-4">Bidang Keuangan</h6>
        <ul>
            <li>Menyusun SOP Bidang Keuangan dan Aplikasi Program Keuangan.</li>
            <li>Menyusun Rencana Kerja dan Anggaran (RKA) tahunan sesuai rencana strategis.</li>
            <li>Evaluasi rencana dan realisasi RKAP secara berkala (per semester).</li>
            <li>Menyusun laporan kinerja LSP secara triwulan dan tahunan.</li>
        </ul>

        <h6 class="fw-bold mt-4">Bidang SDM dan Umum</h6>
        <ul>
            <li>Menyusun rencana pelatihan untuk pengurus, asesor, auditor, dan staf bekerjasama dengan BNSP.</li>
            <li>Mengikutsertakan SDM dalam pelatihan/training eksternal seperti keuangan, pajak, dll.</li>
            <li>Memenuhi kebutuhan operasional LSP (inventaris, kerja sama eksternal).</li>
            <li>Rekrutmen dan seleksi SDM/personil LSP.</li>
            <li>Mengembangkan uji kompetensi berbasis digital yang user friendly dan paperless.</li>
        </ul>

        <h6 class="fw-bold mt-4">Pemeliharaan Kompetensi Pengelola Pelatihan dan Instruktur melalui Surveilance</h6>
        <p>
            Untuk menjaga kualitas kompetensi, LSP Trainer Kompeten Indonesia akan mengadakan surveilans terhadap pengguna sertifikat setiap 2 tahun sekali. Surveilans dilakukan secara sampel dengan memperhatikan keterwakilan peserta.
        </p>

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
