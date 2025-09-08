@extends('layouts.website')

@section('title', $info->title)

@section('content')

<!-- Breadcrumb Section -->
<div class="py-4 mb-5" style="background: linear-gradient(to bottom, #f8fbfc, #eaf6f9);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $info->title }}
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Konten Artikel -->
<div class="container py-5">

    <!-- Judul Artikel -->
    <h1 class="mb-3 text-center">{{ $info->title }}</h1>

    <!-- Tanggal Publikasi + Kategori -->
    <p class="text-muted text-center mb-4">
        {{ $info->kategori->nama ?? 'Umum' }} | 
        {{ $info->created_at->format('d M Y') }}
    </p>

    <!-- Thumbnail -->
    @if($info->thumbnail)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $info->thumbnail) }}" 
                 class="img-fluid rounded shadow" 
                 alt="{{ $info->title }}">
        </div>
    @endif

    <!-- Isi Artikel -->
    <div class="content mb-5">
        {!! $info->content !!}
    </div>

    <!-- Berita Terkait -->
    @if(isset($related) && $related->count() > 0)
        <hr>
        <h4 class="mb-3">Berita Lainnya</h4>
        <div class="row">
            @foreach($related as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                                 class="card-img-top" 
                                 alt="{{ $item->title }}">
                        @endif
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ route('informasi.artikel.detail', ['slug' => $item->slug]) }}" 
                                   class="text-dark text-decoration-none">
                                   {{ Str::limit($item->title, 50) }}
                                </a>
                            </h6>
                            <p class="small text-muted mb-1">
                                {{ $item->created_at->format('d M Y') }}
                            </p>
                            <p class="card-text small">
                               {{ Str::limit(strip_tags($item->content), 100, '...') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
