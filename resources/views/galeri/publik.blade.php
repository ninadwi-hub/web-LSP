@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">Galeri Kegiatan</h2>

    @if($galeris->count())
        <div class="row">
            @foreach($galeris as $galeri)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($galeri->image_path)
                            <img src="{{ asset('storage/' . $galeri->image_path) }}" class="card-img-top" alt="{{ $galeri->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $galeri->title }}</h5>
                            @if($galeri->description)
                                <p class="card-text">{{ Str::limit($galeri->description, 100) }}</p>
                            @endif
                        </div>
                        <div class="card-footer text-muted small">
                            Diposting: {{ $galeri->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Belum ada galeri yang ditampilkan.</p>
    @endif
</div>
@endsection
