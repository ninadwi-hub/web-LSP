@extends('layouts.app')

@section('title', 'Informasi - ' . $kategori->nama_kategori)

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Informasi: {{ $kategori->nama_kategori }}</h2>

    <div class="mb-3">
        <strong>Kategori:</strong>
        @foreach($kategoris as $kat)
            <a href="{{ route('info.kategori', $kat->slug) }}"
               class="btn btn-sm {{ $kat->id == $kategori->id ? 'btn-primary' : 'btn-outline-primary' }}">
                {{ $kat->nama_kategori }}
            </a>
        @endforeach
    </div>

    @forelse($infos as $info)
        <div class="card mb-3">
            <div class="card-body">
                <h5><a href="{{ route('info.show', $info->slug) }}">{{ $info->title }}</a></h5>
                <p class="mb-1 text-muted">{{ $info->created_at->format('d M Y') }}</p>
                <p>{{ \Str::limit(strip_tags($info->content), 150) }}</p>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada informasi di kategori ini.</p>
    @endforelse
</div>
@endsection
