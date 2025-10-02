@extends('layouts.app')

@section('title', 'Dashboard SuperAdmin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard SuperAdmin</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Dashboard SuperAdmin</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Selamat Datang, {{ Auth::user()->name }}!</h4>
                <p class="text-muted">Anda login sebagai <strong>SuperAdmin</strong></p>
                
                <div class="alert alert-success" role="alert">
                    <i class="bx bx-check-circle me-2"></i>
                    Anda berhasil login ke Dashboard SuperAdmin
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan widget statistik atau konten lainnya di sini -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Users</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="{{ $totalUsers }}">0</span>
                        </h4>
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart1" data-colors='["--vz-primary"]' class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan widget lainnya sesuai kebutuhan -->
</div>
@endsection