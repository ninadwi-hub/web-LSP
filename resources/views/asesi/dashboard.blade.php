@extends('layouts.app')

@section('title', 'Dashboard Asesi')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-welcome shadow-sm border-0">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                <!-- Teks Selamat Datang -->
                <div class="welcome-text text-start">
                    <h5>Selamat Datang, {{ Auth::user()->name }}</h5>
                    <p class="card-text text-muted">
                        Anda login sebagai <strong>Asesi</strong>.  
                        Silakan pilih menu di sidebar untuk melanjutkan.
                    </p>
                </div>

                <!-- Badge Tanggal -->
                <div class="date-badge text-end">
                    {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
