@extends('layouts.website')

@section('title', 'Beranda')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
      @foreach ($sliderGaleri as $key => $item)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image:url('{{ asset('storage/' . $item->image_path) }}')">
          <div class="container">
            <h2>{{ $item->title }}</h2>
            @if($item->description)
              <p>{{ $item->description }}</p>
            @endif
          </div>
        </div>
      @endforeach
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
        <p>
          LSP Trainer Kompeten Indonesia adalah lembaga sertifikasi profesi di bidang Pelatihan Kerja,
          telah mendapatkan lisensi BNSP untuk melakukan sertifikasi profesi pada bidang Pelatihan Kerja.
        </p>
        <a href="{{ route('login') }}" class="cta-btn scrollto">Daftar Sekarang</a>
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
      </div>

      <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
          @forelse ($galeris as $galeri)
            <div class="swiper-slide">
              <a class="gallery-lightbox" href="{{ asset('storage/' . $galeri->image_path) }}">
                <img src="{{ asset('storage/' . $galeri->image_path) }}" class="img-fluid" alt="{{ $galeri->title }}">
              </a>
            </div>
          @empty
            <p>Belum ada galeri ditampilkan.</p>
          @endforelse
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section><!-- End Gallery Section -->

</main><!-- End #main -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

@endsection
