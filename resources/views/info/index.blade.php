@extends('layouts.app')

@section('title', 'Manajemen Informasi')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Manajemen Informasi</h3>

    <!-- Tombol Tambah Info -->
    <div class="mb-3">
        <a href="{{ route('admin.info.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Info
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel daftar info --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-primary">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Kategori</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Thumbnail</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($info as $i => $row)
                        <tr>
                            <td>{{ $info->firstItem() + $i }}</td>
                            <td>{{ $row->kategori?->nama ?? '-' }}</td>
                            <td>{{ $row->title }}</td>
                            <td>
                                <span class="badge bg-{{ $row->status == 'published' ? 'success' : ($row->status == 'draft' ? 'secondary' : 'warning') }}">
                                    {{ ucfirst($row->status) }}
                                </span>
                            </td>
                            <td>
                                @if($row->thumbnail)
                                    <img src="{{ asset('storage/'.$row->thumbnail) }}" 
                                         alt="thumb" width="60" class="rounded shadow-sm">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.info.edit', $row->id) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="bx bx-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.info.destroy', $row->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bx bx-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data info.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $info->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
