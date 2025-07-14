@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="mb-4">
        <a href="{{ route('info.index') }}" class="btn btn-secondary btn-sm">← Kembali ke Daftar Informasi</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $info->judul }}</h3>
            <p class="text-muted">
                Kategori: {{ $info->kategori->nama ?? '-' }} |
                Tanggal: {{ $info->created_at->format('d M Y') }}
            </p>

            @if ($info->gambar)
                <img src="{{ asset('storage/' . $info->gambar) }}" class="img-fluid mb-3" alt="Gambar Info">
            @endif

            <div class="content">
                {!! nl2br(e($info->isi)) !!}
            </div>
        </div>
    </div>
</div>
@endsection
