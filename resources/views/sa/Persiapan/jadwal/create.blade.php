@extends('layouts.app')

@section('title', 'Tambah Jadwal Asesmen')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Tambah Jadwal Asesmen</h3>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf

                @include('admin.jadwal.form')

                <div class="d-flex gap-2 justify-content-end mt-4">
                    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
