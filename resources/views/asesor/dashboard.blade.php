@extends('layouts.app')

@section('title', 'Dashboard Asesor')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h4 class="card-title">Halo, {{ Auth::user()->name }}</h4>
                <p class="card-text text-muted">
                    Anda login sebagai <strong>Asesor</strong>.  
                    Silakan gunakan menu di sidebar untuk mengelola asesmen.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Box Statistik -->
    <div class="col-md-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Asesi Bimbingan</p>
                        <h4 class="mb-0">15</h4>
                    </div>
                    <div class="flex-shrink-0 align-self-center">
                        <i class="bx bx-group h2 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Box Statistik -->
    <div class="col-md-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Uji Kompetensi</p>
                        <h4 class="mb-0">7</h4>
                    </div>
                    <div class="flex-shrink-0 align-self-center">
                        <i class="bx bx-task h2 text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Box Statistik -->
    <div class="col-md-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Hasil Penilaian</p>
                        <h4 class="mb-0">Pending</h4>
                    </div>
                    <div class="flex-shrink-0 align-self-center">
                        <i class="bx bx-file h2 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
