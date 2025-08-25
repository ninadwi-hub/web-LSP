@extends('layouts.app')

@section('title', 'Daftar Halaman')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Halaman</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary mb-3">
        <i class="bx bx-plus"></i> Tambah
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Unggulan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $index => $page)
                <tr>
                    <td>{{ $index + $pages->firstItem() }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ ucfirst($page->category) }}</td>
                    <td>{{ ucfirst($page->status) }}</td>
                    <td>{{ $page->is_featured ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning btn-sm">
                                <i class="bx bx-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus halaman ini?')">
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
                    <td colspan="6" class="text-center">Belum ada data halaman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-2">
            {{ $pages->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
