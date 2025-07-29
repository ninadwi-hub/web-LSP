@extends('layouts.app')

@section('title', 'Galeri Publik')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Galeri</h2>

    <div class="row">
        @forelse($galeris as $galeri)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $galeri->image_path) }}" class="card-img-top" alt="{{ $galeri->title }}" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeri->title }}</h5>
                        <p class="card-text">{{ Str::limit($galeri->description, 100) }}</p>
                        <small class="text-muted">
                            Diunggah oleh {{ $galeri->uploader ?? 'Admin' }} <br>
                            Kategori: {{ $galeri->category->name ?? '-' }} <br>
                            Tanggal: {{ \Carbon\Carbon::parse($galeri->taken_at)->format('d M Y') ?? '-' }}
                        </small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted text-center">Belum ada galeri yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
