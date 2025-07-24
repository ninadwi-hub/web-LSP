@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Galeri Foto</h3>
    <div class="row">
        @foreach ($galeris as $g)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('storage/'.$g->image_path) }}" class="card-img-top" alt="{{ $g->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $g->title }}</h5>
                    <p class="card-text">{{ Str::limit($g->description, 50) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
