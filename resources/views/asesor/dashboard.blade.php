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
   
@endsection
