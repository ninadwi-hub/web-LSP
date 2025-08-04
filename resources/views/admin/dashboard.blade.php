@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid mt-4">

      {{-- Statistik Dinamis --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h6 class="text-muted">Total Pengguna</h6>
                    <h3>{{ $totalUsers }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h6 class="text-muted">Konten Dipublikasikan</h6>
                    <h3>{{ $totalPages }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h6 class="text-muted">Pesan Masuk</h6>
                    <h3>{{ $totalContacts }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h6 class="text-muted">Galeri</h6>
                    <h3>{{ $totalGaleri }}</h3>
                </div>
            </div>
        </div>
    </div>


   {{-- Aktivitas Terbaru --}}
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card shadow rounded">
            <div class="card-header bg-success text-white">
                Pesan Masuk Terbaru
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse ($latestContacts as $contact)
                        <li class="list-group-item">
                            <strong>{{ $contact->name }}</strong>: {{ Str::limit($contact->message, 50) }}
                            <br>
                            <small class="text-muted">{{ $contact->created_at->diffForHumans() }}</small>
                        </li>
                    @empty
                        <li class="list-group-item">Belum ada pesan masuk.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card shadow rounded">
            <div class="card-header bg-info text-white">
                Galeri Terbaru
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse ($latestGaleri as $galeri)
                        <li class="list-group-item">
                            <strong>{{ $galeri->title }}</strong>
                            <br>
                            <small class="text-muted">Diunggah {{ $galeri->created_at->diffForHumans() }}</small>
                        </li>
                    @empty
                        <li class="list-group-item">Belum ada galeri.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
