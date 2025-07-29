@extends('layouts.app')

@section('title', $info->title)

@section('content')
<div class="container mt-4">
    <h3>{{ $info->title }}</h3>
    <p><small>Kategori: {{ $info->kategori->nama ?? '-' }} | Tanggal: {{ $info->created_at->format('d M Y') }}</small></p>
    
    @if ($info->thumbnail)
        <img src="{{ asset('storage/' . $info->thumbnail) }}" class="img-fluid mb-3">
    @endif

    <div>
        {!! nl2br(e($info->content)) !!}
    </div>
</div>
@endsection
