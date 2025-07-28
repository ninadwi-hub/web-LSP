@extends('layouts.app')

@section('title', 'Halaman Statis')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Daftar Halaman Statis</h3>
        <a href="{{ route('pages.create') }}" class="btn btn-primary">+ Tambah Halaman</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Slug</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $page)
                        <tr>
                            <td>{{ $page->title }}</td>
                            <td>
                                @if ($page->category === 'profil')
                                    <span class="badge bg-info text-dark">Profil</span>
                                @elseif ($page->category === 'informasi')
                                    <span class="badge bg-warning text-dark">Informasi</span>
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                            <td>
                                @if ($page->status === 'published')
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td>{{ $page->slug }}</td>
                            <td>
                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada halaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
