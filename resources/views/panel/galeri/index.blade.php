@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <h3 class="mb-4">Daftar Galeri</h3>

    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-3">+ Tambah Galeri</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Tanggal Ambil</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galeris as $g)
                <tr>
                    <td>{{ $g->title }}</td>
                    <td><img src="{{ asset('storage/'.$g->image_path) }}" width="100" class="rounded shadow-sm"></td>
                    <td>{{ ucfirst($g->status) }}</td>
                    <td>{{ $g->taken_at ?? '-' }}</td>
                    <td>
                        <a href="{{ route('galeri.edit', $g->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('galeri.destroy', $g->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus galeri ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
