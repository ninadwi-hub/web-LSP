@extends('layouts.app')

@section('content')
    <h3>Daftar Halaman</h3>

    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary mb-3">Tambah Halaman</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Unggulan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ ucfirst($page->category) }}</td>
                    <td>{{ $page->status }}</td>
                    <td>{{ $page->is_featured ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
