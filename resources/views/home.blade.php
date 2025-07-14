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

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image:url(/THEMES/Medicio/assets/img/img.png)">
          <div class="container">
              <h2>Pelatihan Asesor Kompetensi</h2>
            <p>Pembukaan Pelatihan Asesor Kompetensi LSP Trainer Kompeten Indonesia dihadiri oleh Kepala Dinas Tenaga Kerja dan Transmigrasi Provinsi Daerah Istimewa Yogyakarta dan Kepala Dinas Tenaga Kerja dan Transmigrasi Kabupaten Bantul.</p>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image:url(/THEMES/Medicio/assets/img/ramah_tamah.png)">
          <div class="container">
            <h2>Ramah Tamah</h2>
            <p>Direktur LSP Trainer Kompeten Indonesia beramah tamah dengan Pejabat Dinas Tenaga Kerja Provinsi Daerah Istimewa Yogyakarta, dalam sesi coffe break pada Pelatihan Asesor Kompetensi bersama Master Asesor Agus Subagyo dan Master Asesor Sujiyanto</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image:url(/THEMES/Medicio/assets/img/rapat_koordinasi.png)">
          <div class="container">
            <h2>Rapat Koordinasi Pelatihan Asesor</h2>
            <p>Rapat Koordinasi Pelatihan Asesor ini diselenggarakan di Kantor LSP Trainer Kompeten Indonesia pada hari Jum'at, 25 Maret 2022 3 Hari menjelang Pelaksanaan Pelatihan Asesor Kompetensi.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>
           <!-- Slide 4 -->
        <div class="carousel-item" style="background-image:url(/THEMES/Medicio/assets/img/pelatihan_asesor.png)">
          <div class="container">
            <h2>Pelatihan Asesor Kompetensi</h2>
            <p>Master Asesor Agus Subagyo sebagai narasumber pada pelatihan Asesor Kompetensi</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>
           <!-- Slide 5 -->
        <div class="carousel-item" style="background-image:url(/THEMES/Medicio/assets/img/pelatihan_auditor.png)">
          <div class="container">
            <h2>Pelatihan Auditor Mutu Sertifikasi</h2>
            <p>dilaksanakan Hari Jum'at - Ahad, 13 - 15 Mei 2022 di The Cube Hotel Yogyakarta dengan Nara Sumber Dr. Agus Sutarna, S. Kp., MN. Sc.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>
<div class="carousel-item" style="background-image:url(/THEMES/Medicio/assets/img/witness.png)">
          <div class="container">
            <h2>Witness</h2>
            <p>Penyaksian Uji Kompetensi LSP Trainer Kompeten Indonesia oleh BNSP</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>
          <!-- Slide 7 -->
        <div class="carousel-item" style="background-image:url(/THEMES/Medicio/assets/img/trainer_kompeten.png)">
        </div>
          <!-- Slide 8 -->
        <div class="carousel-item" style="background-image:url(/THEMES/Medicio/assets/img/Screen-Shot-2023-06-07-at-14.51.35.png)">
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Lembaga Sertifikat Profesi</h3>
          <p> LSP Trainer Kompeten Indonesia adalah lembaga sertifikasi profesi di bidang Pelatihan Kerja, telah mendapatkan lisensi BNSP untuk melakukan sertifikasi profesi pada bidang Pelatihan Kerja.</p>
          <a class="cta-btn scrollto" href="#login">Daftar Sekarang</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
             <i class="fa-solid fa-book-open" style="color: #2dc3c8;"></i>
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>

              <p><strong>Skema Sertifikasi</strong></p>
              <a href="#">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
             <i class="fa-solid fa-user" style="color: #2dc3c8;"></i>
              <span data-purecounter-start="0" data-purecounter-end="19" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Asesor Kompetensi</strong></p>
              <a href="#">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fa-solid fa-users-line" style="color: #2dc3c8;"></i>
              <span data-purecounter-start="0" data-purecounter-end="185" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Pemegang Sertifikat</strong></p>
              <a href="#">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
             <i class="fa-solid fa-diamond-turn-right" style="color: #2dc3c8;"></i>
              <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Tempat Uji Kompetensi</strong></p>
              <a href="#">Find out more &raquo;</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Skema Sertifikasi</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                  <h4>Instruktur Master</h4>
                  <p>SKM-LSPTKI-05-2022</p>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                  <h4>Instruktur</h4>
                  <p>SKM-LSPTKI-04-2022</p>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                  <h4>Instruktur Junior</h4>
                  <p>SKM-LSPTKI-03-2022</p>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                  <h4>Pelatih di Tempat Kerja</h4>
                  <p>SKM-LSPTKI-02-2022</p>
                </a>
              </li>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                  <h4>Penyelenggara Pelatihan</h4>
                  <p>SKM-LSPTKI-01-2022</p>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-8">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <h3>Instruktur Master</h3>
                <p class="fst-italic">SKM-LSPTKI-05-2022</p>
                <img src="/THEMES/Medicio/assets/img/instruktur_master.jpg" alt="" class="img-fluid">
                <p>Skema sertifikasi okupasi Instruktur Master adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Instruktur Master.</p>
              </div>
              <div class="tab-pane" id="tab-2">
                <h3>Instruktur</h3>
                <p class="fst-italic">SKM-LSPTKI-04-2022</p>
                <img src="/THEMES/Medicio/assets/img/instruktur.jpg" alt="" class="img-fluid">
                <p>Skema sertifikasi okupasi Instruktur adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Instruktur.</p>
              </div>
              <div class="tab-pane" id="tab-3">
                <h3>Instruktur Junior</h3>
                <p class="fst-italic">SKM-LSPTKI-03-2022</p>
                <img src="/THEMES/Medicio/assets/img/departments-3.jpg" alt="" class="img-fluid">
                <p>Skema sertifikasi okupasi Instruktur Junior adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Instruktur Junior.</p>
              </div>
              <div class="tab-pane" id="tab-4">
                <h3>Pelatih di Tempat Kerja</h3>
                <p class="fst-italic">SKM-LSPTKI-02-2022</p>
                <img src="/THEMES/Medicio/assets/img/pelatih_di_tempat_kerja.jpg" alt="" class="img-fluid">
                <p>Skema sertifikasi okupasi Pelatih di Tempat Kerja adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Pelatih di Tempat Kerja.</p>
              </div>
               <div class="tab-pane" id="tab-3">
                <h3>Penyelenggara Pelatihan</h3>
                <p class="fst-italic">SKM-LSPTKI-01-2022</p>
                <img src="/THEMES/Medicio/assets/img/penyelenggara_pelatihan.jpg" alt="" class="img-fluid">
                <p>Skema sertifikasi okupasi Penyelenggara Pelatihan adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Penyelenggara Pelatihan.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="gallery-lightbox" href="/THEMES/Medicio/assets/img/img.png"><img src="/THEMES/Medicio/assets/img/img.png" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="/THEMES/Medicio/assets/img/ramah_tamah.png"><img src="/THEMES/Medicio/assets/img/ramah_tamah.png" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="/THEMES/Medicio/assets/img/rapat_koordinasi.png"><img src="/THEMES/Medicio/assets/img/rapat_koordinasi.png" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="/THEMES/Medicio/assets/img/pelatihan_asesor.png"><img src="/THEMES/Medicio/assets/img/pelatihan_asesor.png" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="/THEMES/Medicio/assets/img/witness.png"><img src="/THEMES/Medicio/assets/img/witness.png" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="/THEMES/Medicio/assets/img/pelatihan_auditor.png"><img src="/THEMES/Medicio/assets/img/pelatihan_auditor.png" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="/THEMES/Medicio/assets/img/trainer_kompeten.png"><img src="/THEMES/Medicio/assets/img/trainer_kompeten.png" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->

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

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/THEMES/Medicio/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/aos/aos.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/THEMES/Medicio/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/THEMES/Medicio/assets/js/main.js"></script>

</body>

</html>
