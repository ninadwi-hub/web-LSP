@extends('layouts.app') {{-- Sesuaikan jika kamu punya layout utama --}}

@section('title', $page->title)

@section('content')
<div class="container my-5">
    <h1 class="mb-3">{{ $page->title }}</h1>

    @if($page->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" class="img-fluid rounded">
        </div>
    @endif

    <div class="content">
        {!! $page->content !!}
    </div>
</div>
@endsection
