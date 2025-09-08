@extends('layouts.website')

@section('title', $page->title ?? 'Informasi')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs py-3 bg-light border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $page->title ?? 'Artikel' }}
                </li>
            </ol>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->

<div class="container py-5">
    <h1 class="mb-4 text-center">{{ $page->title ?? 'Artikel Terbaru' }}</h1>

    <div class="row">
        @forelse($infos as $info)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Thumbnail -->
                    @if($info->thumbnail)
                        <img src="{{ asset('storage/' . $info->thumbnail) }}" 
                             class="card-img-top img-fluid" 
                             alt="{{ $info->title }}">
                    @else
                        <img src="https://via.placeholder.com/400x250?text=No+Image" 
                             class="card-img-top img-fluid" 
                             alt="no image">
                    @endif

                    <!-- Konten -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            <a href="{{ route('informasi.artikel.detail', ['slug' => $info->slug]) }}" 
                               class="text-dark text-decoration-none">
                                {{ $info->title }}
                            </a>
                        </h5>
                        <p class="card-text text-muted small mb-2">
                            <i class="bi bi-calendar-event"></i>
                            {{ $info->created_at->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($info->content), 100, '...') }}
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route('informasi.artikel.detail', ['slug' => $info->slug]) }}" 
                               class="btn btn-outline-primary btn-sm">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada artikel yang tersedia.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $infos->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
