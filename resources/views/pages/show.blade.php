@extends('layouts.app')

@section('title', $page->title)

@section('content')
<div class="container py-4">
    <h1 class="mb-3">{{ $page->title }}</h1>

    @if($page->featured_image)
        <img src="{{ asset('storage/' . $page->featured_image) }}" class="img-fluid mb-4" alt="{{ $page->title }}">
    @endif

    <div class="content">
        {!! nl2br(e($page->content)) !!}
    </div>

    @if($page->published_at)
        <p class="text-muted mt-3">
            Dipublikasikan pada: {{ $page->published_at->format('d M Y H:i') }}
        </p>
    @endif
</div>
@endsection
