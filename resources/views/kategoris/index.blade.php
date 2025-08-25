@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="container mt-4">
    <h3 class="mb-2">Daftar Kategori</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kategoris.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th style="width:150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $i => $kategori)
                    <tr>
                        <td class="text-center">{{ $i + $kategoris->firstItem() }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->deskripsi }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('kategoris.edit', $kategori->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit"></i> Edit
                                </a>

                                <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bx bx-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {{ $kategoris->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
