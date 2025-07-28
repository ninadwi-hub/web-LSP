@extends('layouts.app')

@section('title', $info->title)

@section('content')
<div class="card">
    <div class="card-body">
        <h2>{{ $info->title }}</h2>
        <p><small>Kategori: {{ $info->kategori->nama ?? '-' }} | {{ $info->created_at->format('d M Y') }}</small></p>

        @if($info->thumbnail)
            <img src="{{ asset($info->thumbnail) }}" alt="Thumbnail" class="img-fluid mb-3">
        @endif

        <div>
            {!! nl2br(e($info->content)) !!}
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
</div>
@endsection
