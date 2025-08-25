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
    @foreach($menus->where('parent_id', null) as $menu)
      @php
        if ($menu->type === 'route' && $menu->route) {
          $url = route($menu->route);
        } elseif ($menu->type === 'internal' && $menu->page) {
          $url = route('page.show', $menu->page->slug);
        } elseif ($menu->url) {
          $url = $menu->url;
        } else {
          $url = '#';
        }
        $children = $menu->children;
      @endphp

      @if($children->count() > 0 || $menu->slug === 'skema-sertifikasi')
        <li class="dropdown">
          {{-- Parent dropdown tidak pakai href, cukup trigger dropdown --}}
          <a href="#" onclick="return false;">
            {{ $menu->title }} <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            {{-- Children biasa --}}
            @foreach($children as $child)
              @php
                if ($child->type === 'route' && $child->route) {
                  $childUrl = route($child->route);
                } elseif ($child->type === 'internal' && $child->page) {
                  $childUrl = route('page.show', $child->page->slug);
                } elseif ($child->url) {
                  $childUrl = $child->url;
                } else {
                  $childUrl = '#';
                }
              @endphp
              <li><a href="{{ $childUrl }}">{{ $child->title }}</a></li>
            @endforeach

            {{-- Submenu skema sertifikasi --}}
            @if($menu->slug === 'skema-sertifikasi')
              @php
              $skemas = \App\Models\Skema::all();
              @endphp
              @foreach($skemas as $skema)
                <li>
                  <a href="{{ route('frontend.skema.detail', $skema->id) }}">
                    {{ $skema->nama }}
                  </a>
                </li>
              @endforeach
            @endif
          </ul>
        </li>
      @else
        <li><a href="{{ $url }}">{{ $menu->title }}</a></li>
      @endif
    @endforeach
  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav>

    <a href="{{ route('login') }}" class="appointment-btn scrollto">
      <span class="d-none d-md-inline">Login</span>
    </a>
  </div>
</header>
<!-- End Header -->
