@extends('layouts.website')

@section('title', 'Info Publik')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Info Terbaru</h2>

    <div class="row">
        @foreach ($infos as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" class="card-img-top" alt="{{ $item->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="text-muted">{{ $item->kategori->nama ?? '-' }}</p>
                        <a href="{{ route('public.info.show', $item->slug) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $infos->links() }}
    </div>
</div>
@endsection
