@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container-fluid mt-4">

    {{-- Carousel Slider --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div id="homepageCarousel" class="carousel slide shadow rounded" data-bs-ride="carousel">
                <div class="carousel-inner">
    @forelse($slides as $slide)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('storage/' . $slide->image_path) }}" class="d-block w-100 rounded" style="height: 400px; object-fit: cover;" alt="{{ $slide->title }}">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h5 class="text-white">{{ $slide->title }}</h5>
                <p class="text-light">{{ \Illuminate\Support\Str::limit($slide->description, 100) }}</p>
            </div>
        </div>
    @empty
        <div class="carousel-item active">
            <img src="{{ asset('storage/cake.jpg') }}" class="d-block w-100" alt="Default Slide">
        </div>
    @endforelse
</div>
                <button class="carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>

    {{-- Info Terbaru & Populer --}}
    <div class="row">
        {{-- Info Terbaru --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <strong>Info Terbaru</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($latestInfos as $info)
                        <li class="list-group-item">
                            <a href="{{ route('infos.show', $info->id) }}" class="text-decoration-none fw-bold">{{ $info->title }}</a><br>
                            <small class="text-muted">{{ $info->created_at->format('d M Y') }} | {{ $info->kategori->nama ?? '-' }}</small>
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center">Belum ada info terbaru.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        {{-- Info Populer --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <strong>Info Populer</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($popularInfos as $info)
                        <li class="list-group-item">
                            <a href="{{ route('infos.show', $info->id) }}" class="text-decoration-none fw-bold">{{ $info->title }}</a><br>
                            <small class="text-muted">{{ $info->created_at->format('d M Y') }} | {{ $info->kategori->nama ?? '-' }}</small>
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center">Belum ada info populer.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection
