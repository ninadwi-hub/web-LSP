@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Galeri</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-3">
        <i class="bx bx-plus"></i> Tambah
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Tanggal Ambil</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galeris as $index => $g)
                    <tr>
                        <td>{{ $index + $galeris->firstItem() }}</td>
                        <td>{{ $g->title }}</td>
                        <td><img src="{{ asset('storage/'.$g->image_path) }}" width="100" class="rounded shadow-sm"></td>
                        <td>{{ ucfirst($g->status) }}</td>
                        <td>
                            {{ $g->taken_at ? \Carbon\Carbon::parse($g->taken_at)->translatedFormat('d F Y') : '-' }}
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('galeri.edit', $g->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit"></i> Edit
                                </a>

                                <form action="{{ route('galeri.destroy', $g->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus galeri ini?')">
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
                        <td colspan="6" class="text-center">Belum ada galeri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-2">
            {{ $galeris->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
