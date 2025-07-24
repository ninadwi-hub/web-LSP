@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-success" role="alert">
            Selamat datang di <strong>Admin Panel STMIK El Rahma</strong>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card text-bg-primary">
            <div class="card-body">
                <h5 class="card-title">Jumlah Kategori</h5>
                <p class="card-text display-6">{{ $kategoriCount ?? 0 }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-info">
            <div class="card-body">
                <h5 class="card-title">Jumlah Galeri</h5>
                <p class="card-text display-6">{{ $galeriCount ?? 0 }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-warning">
            <div class="card-body">
                <h5 class="card-title">Pesan Masuk</h5>
                <p class="card-text display-6">{{ $pesanCount ?? 0 }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
