@extends('layouts.website')

@section('title', $galeri->title)

@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Detail Galeri</h3>

```
<div class="card shadow mb-4">
    <div class="card-body">
        <h4 class="card-title">{{ $galeri->title }}</h4>

        {{-- ========== Kondisi berdasarkan tipe_tampilan ========== --}}
        @if($galeri->tipe_tampilan === 'slider' || $galeri->tipe_tampilan === 'both')
            {{-- SLIDER --}}
            <div id="galeriCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($galeri->images as $key => $img)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="d-block w-100 rounded" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#galeriCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galeriCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        @endif

        @if($galeri->tipe_tampilan === 'gallery' || $galeri->tipe_tampilan === 'both')
            {{-- GALLERY GRID --}}
            <div class="row g-3 mb-4">
                @foreach($galeri->images as $img)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid rounded shadow-sm" alt="">
                    </div>
                @endforeach
            </div>
        @endif
        {{-- ======================================================== --}}

        {{-- Deskripsi transparan --}}
        <p class="card-text text-muted" 
           style="background-color: rgba(255, 255, 255, 0.6); padding: 10px; border-radius: 5px;">
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
        <p class="card-text"><strong>Tanggal Diambil:</strong> 
            {{ $galeri->taken_at ? \Carbon\Carbon::parse($galeri->taken_at)->format('d M Y') : '-' }}
        </p>
        <p class="card-text"><strong>Featured:</strong> {{ $galeri->is_featured ? 'Ya' : 'Tidak' }}</p>

        <a href="{{ route('galeri.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
</div>
```

</div>
@endsection
