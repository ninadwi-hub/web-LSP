@extends('layouts.app')

@section('title', 'Manajemen Info')

@section('content')
<div class="container mt-4">
    <h1 class="mb-2">Manajemen Info</h1>

    <a href="{{ route('admin.info.create') }}" class="btn btn-primary mb-3">
        <i class="bx bx-plus"></i> Tambah
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Thumbnail</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aktif</th>
                    <th>Dilihat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($info as $i => $item)
                    <tr>
                        <td class="text-center">{{ $i + $info->firstItem() }}</td>
                        <td class="text-center">
                            @if($item->thumbnail)
                                <img src="{{ asset('storage/'.$item->thumbnail) }}" width="80" alt="">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->kategori->nama ?? '-' }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $item->status == 'published' ? 'success' : 'secondary' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="text-center">{{ $item->is_active ? 'Ya' : 'Tidak' }}</td>
                        <td class="text-center">{{ $item->views }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.info.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit"></i> Edit
                                </a>

                                <form action="{{ route('admin.info.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
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
                        <td colspan="8" class="text-center">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {{ $info->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
