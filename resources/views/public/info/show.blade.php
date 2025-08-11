@extends('layouts.website')

@section('title', $info->title)

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">{{ $info->title }}</h2>

    @if($info->thumbnail)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $info->thumbnail) }}" class="img-fluid rounded shadow" alt="{{ $info->title }}">
        </div>
    @endif

    <div class="mb-5">
        {!! $info->content !!}
    </div>

    <a href="{{ route('public.info.indexp') }}" class="btn btn-secondary">← Kembali</a>
</div>
@endsection
