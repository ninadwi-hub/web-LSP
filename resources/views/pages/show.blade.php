@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="mb-3">{{ $page->title }}</h2>
            <hr>
            <div class="mt-3">
                {!! nl2br($page->content) !!}
            </div>
        </div>
    </div>
@endsection
