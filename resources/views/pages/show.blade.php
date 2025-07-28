@extends('layouts.app')

@section('title', $page->title)

@section('content')
<div class="container mt-4">
    <h2>{{ $page->title }}</h2>
    <hr>
    <div>
        {!! nl2br($page->content) !!}
    </div>
</div>
@endsection
