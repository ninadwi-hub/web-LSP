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
  <div class="slider-caption">
    <h2>{{ $item->title }}</h2>
    @if($item->description)
      <p>{{ $item->description }}</p>
    @endif
  </div>
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

<!-- ======= Departments Section ======= -->
<section id="departments" class="departments">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Skema Sertifikasi</h2>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <!-- Sidebar List -->
      <div class="col-lg-4 mb-5 mb-lg-0">
        <ul class="nav nav-tabs flex-column">
          @forelse($skemas as $skema)
            <li class="nav-item mt-2">
              <a class="nav-link {{ $loop->first ? 'active show' : '' }}"
                 data-bs-toggle="tab"
                 data-bs-target="#tab-{{ $skema->id }}">
                <h4>{{ $skema->nama }}</h4>
                <p>{{ $skema->kode }}</p>
              </a>
            </li>
          @empty
            <li class="nav-item">
              <span class="nav-link disabled">Belum ada skema</span>
            </li>
          @endforelse
        </ul>
      </div>

      <!-- Tab Content -->
      <div class="col-lg-8">
        <div class="tab-content">
          @forelse($skemas as $skema)
            <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="tab-{{ $skema->id }}">
              <h3>{{ $skema->nama }}</h3>
              <p class="fst-italic"><strong>Kode:</strong> {{ $skema->kode }}</p>

              @if(!empty($skema->thumbnail))
                <img src="{{ asset('storage/'.$skema->thumbnail) }}"
                     alt="{{ $skema->nama }}"
                     class="img-fluid mb-3 rounded">
              @endif

              <p>{{ $skema->ringkasan }}</p>
            </div>
          @empty
            <div class="alert alert-info">Belum ada skema ditampilkan.</div>
          @endforelse
        </div>
      </div>
    </div>

  </div>
</section>
<!-- End Departments Section -->

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
