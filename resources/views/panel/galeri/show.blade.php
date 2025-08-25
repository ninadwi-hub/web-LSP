@extends('layouts.app')

@section('title', 'Detail Galeri')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Detail Galeri</h3>

    <div class="card shadow mb-4">
        <div class="row g-0">
            <div class="col-md-5">
                @if ($galeri->image_path)
                    <img src="{{ asset('storage/' . $galeri->image_path) }}" class="img-fluid rounded-start" alt="{{ $galeri->title }}">
                @else
                    <div class="bg-secondary text-white text-center p-5">Tidak ada gambar</div>
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title">{{ $galeri->title }}</h5>
                    
                    <!-- Deskripsi transparan -->
                    <p class="card-text text-muted" style="opacity: 0.6;">
                        {{ $galeri->description }}
                    </p>

                    <p class="card-text"><strong>Kategori:</strong> {{ $galeri->category->name ?? '-' }}</p>
                    <p class="card-text"><strong>Album:</strong> {{ $galeri->album->name ?? '-' }}</p>
                    <p class="card-text"><strong>Uploader:</strong> {{ $galeri->uploader ?? '-' }}</p>
                    <p class="card-text"><strong>Status:</strong> 
                        <span class="badge bg-{{ $galeri->status === 'published' ? 'success' : ($galeri->status === 'draft' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($galeri->status) }}
                        </span>
                    </p>
                    <p class="card-text"><strong>Tanggal Diambil:</strong> {{ $galeri->taken_at ? \Carbon\Carbon::parse($galeri->taken_at)->format('d M Y') : '-' }}</p>
                    <p class="card-text"><strong>Featured:</strong> {{ $galeri->is_featured ? 'Ya' : 'Tidak' }}</p>

                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
