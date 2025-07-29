@extends('layouts.app')

@section('title', $kategori->nama)

@section('content')
<div class="container mt-4">
    <h3>{{ $kategori->nama }}</h3>
    <p>{{ $kategori->deskripsi }}</p>

    <div class="row">
        @foreach($infos as $info)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($info->thumbnail)
                        <img src="{{ asset('storage/' . $info->thumbnail) }}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $info->title }}</h5>
                        <a href="{{ route('info.show', $info->slug) }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
