@extends('layouts.app')

@section('title', 'Manajemen File Download')

@section('content')
<div class="container mt-4">
    <h3 class="mb-2">Manajemen File Download</h3>

    <!-- Tombol tambah di bawah judul -->
    <div class="mb-3">
        <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Uploader</th>
                            <th>Status</th>
                            <th>File</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($downloads as $key => $download)
                        <tr>
                            <td>{{ $downloads->firstItem() + $key }}</td>
                            <td>{{ $download->title }}</td>
                            <td>{{ Str::limit($download->description, 50) }}</td>
                            <td>{{ $download->uploader }}</td>
                            <td>
                                @if($download->status == 'published')
                                    <span class="badge bg-success">Published</span>
                                @elseif($download->status == 'draft')
                                    <span class="badge bg-warning">Draft</span>
                                @else
                                    <span class="badge bg-secondary">Archived</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $download->file_path) }}" 
                                   target="_blank" class="btn btn-sm btn-primary">
                                   <i class="bi bi-eye"></i> Lihat
                                </a>
                            </td>
                            <td>
                               <!-- Tombol Edit -->
        <a href="{{ route('admin.downloads.edit', $download->id) }}" class="btn btn-warning btn-sm">
            <i class="bx bx-edit"></i> Edit
        </a>

        <!-- Tombol Hapus -->
        <form action="{{ route('admin.downloads.destroy', $download->id) }}" method="POST" class="d-inline" 
              onsubmit="return confirm('Yakin ingin menghapus file ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
                <i class="bx bx-trash"></i> Hapus
            </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada file download.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $downloads->links() }}
    </div>

</div>
@endsection
