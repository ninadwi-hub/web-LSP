@extends('layouts.app')

@section('title', 'Dashboard Asesi')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h4 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h4>
                <p class="card-text text-muted">
                    Anda login sebagai <strong>Asesi</strong>.  
                    Silakan pilih menu di sidebar untuk melanjutkan.
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
                        <p class="text-muted fw-medium">Total Skema</p>
                        <h4 class="mb-0">12</h4>
                    </div>
                    <div class="flex-shrink-0 align-self-center">
                        <i class="bx bx-layer h2 text-primary"></i>
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
                        <p class="text-muted fw-medium">Sertifikasi Aktif</p>
                        <h4 class="mb-0">3</h4>
                    </div>
                    <div class="flex-shrink-0 align-self-center">
                        <i class="bx bx-check-circle h2 text-success"></i>
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
                        <p class="text-muted fw-medium">Hasil Uji</p>
                        <h4 class="mb-0">Pending</h4>
                    </div>
                    <div class="flex-shrink-0 align-self-center">
                        <i class="bx bx-time h2 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
