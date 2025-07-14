@extends('layouts.app')

@section('title', $info->title)

@section('content')
<div class="container py-4">
    <h2>{{ $info->title }}</h2>
    <p class="text-muted">Diterbitkan: {{ $info->created_at->format('d M Y') }}</p>
    <hr>
    <div>
        {!! $info->content !!}
    </div>
</div>
@endsection
