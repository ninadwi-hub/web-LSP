@extends('layouts.app')

@section('title', 'Manajemen Menu')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4>Manajemen Menu Navigasi</h4>
    </div>

    <!-- Tombol tambah -->
    <div class="mb-3">
        <a href="{{ route('menus.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Menu
        </a>
    </div>

    <!-- Alert sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel menu -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Judul</th>
                    <th>Slug / URL</th>
                    <th>Tipe</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($datamenu as $menu)
                    <tr>
                        <td>{{ $menu->title }}</td>
                        <td>{{ $menu->type == 'external' ? $menu->url : $menu->slug }}</td>
                        <td class="text-center">{{ ucfirst($menu->type) }}</td>
                        <td>{{ $menu->parent?->title ?? '-' }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $menu->is_active ? 'success' : 'secondary' }}">
                                {{ $menu->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                      <td class="text-center">
    <div class="btn-group" role="group">
        <!-- Tombol Edit -->
<a href="{{ route('menus.edit', $menu->id) }}" 
   class="btn btn-warning btn-sm d-flex align-items-center justify-content-center" 
   title="Edit" style="width:55px; height:32px;">
    <i class="bx bx-edit"></i>
     <span>Edit</span>
</a>

<!-- Tombol Hapus -->
<form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" 
      onsubmit="return confirm('Yakin ingin menghapus?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" 
            title="Hapus" style="width:55px; height:32px;">
        <i class="bx bx-trash"></i>
         <span>Hapus</span>
    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada data menu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $datamenu->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
