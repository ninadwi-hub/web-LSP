// resources/views/pages/show.blade.php
@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2>{{ $page->title }}</h2>
  <p class="text-muted">Dipublikasikan pada: {{ $page->published_at ? $page->published_at->format('d M Y') : '-' }}</p>
  <div>{!! $page->content !!}</div>
</div>
@endsection
