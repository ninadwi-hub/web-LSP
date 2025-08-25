@extends('layouts.app')

@section('title', 'Manajemen Unit Kompetensi')

@section('content')
<div class="container mt-4">
    <h3 class="mb-2">Manajemen Unit Kompetensi</h3>

    <!-- Tombol tambah di bawah judul -->
    <a href="{{ route('panell.unit.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Unit
    </a>

    <!-- Alert sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel data -->
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-primary text-center"> <!-- background warna -->
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Skema</th>
                    <th>Kode Unit</th>
                    <th>Judul Unit</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($units as $u)
                    <tr>
                        <td class="text-center">{{ $u->id }}</td>
                        <td>{{ $u->skema?->nama }}</td>
                        <td>{{ $u->kode_unit }}</td>
                        <td>{{ $u->judul_unit }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('panell.unit.edit',$u) }}" class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                    <i class="bx bx-edit"></i> Edit
                                </a>
                                <form action="{{ route('panell.unit.destroy',$u) }}" method="POST" onsubmit="return confirm('Hapus unit ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm d-flex align-items-center gap-1">
                                        <i class="bx bx-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada unit.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-2">
        {{ $units->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
