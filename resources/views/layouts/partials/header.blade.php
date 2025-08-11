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
    <a href="{{ url('/') }}" class="logo me-auto">
      <img src="{{ asset('themes/medicio/assets/img/logo_lsp.png') }}" alt="Logo LSP">
    </a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto" href="{{ url('/') }}">Home</a></li>

        @php
          $kategoriUrutan = ['profil', 'sertifikasi', 'media', 'informasi'];
        @endphp

        @foreach($kategoriUrutan as $kategori)
          @php
            $halamanKategori = $pagesByCategory[$kategori] ?? collect();
            $firstPage = $halamanKategori->first();
          @endphp

          @if($firstPage)
            <li class="dropdown">
              <a class="nav-link scrollto {{ request()->is('halaman/*') ? 'active' : '' }}"
                 href="{{ route('page.show', ['slug' => $firstPage->slug]) }}">
                {{ ucfirst($kategori) }} <i class="bi bi-chevron-down"></i>
              </a>
              <ul>
                @foreach($halamanKategori as $page)
                  @if($page->slug)
                    <li>
                      <a class="nav-link scrollto {{ request()->is('halaman/'.$page->slug) ? 'active' : '' }}"
                         href="{{ route('page.show', ['slug' => $page->slug]) }}">
                        {{ $page->title }}
                      </a>
                    </li>
                  @endif
                @endforeach
              </ul>
            </li>
          @endif
        @endforeach

        <li><a class="nav-link scrollto" href="{{ route('kontak') }}">Kontak Kami</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

    <a href="{{ route('login') }}" class="appointment-btn scrollto">
      <span class="d-none d-md-inline">Login</span>
    </a>
  </div>
</header>
<!-- End Header -->
