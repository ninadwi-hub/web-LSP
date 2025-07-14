@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Halaman</h4>
    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">+ Tambah Halaman</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Publish</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>{{ $page->status }}</td>
                <td>{{ $page->published_at ? $page->published_at->format('d-m-Y') : '-' }}</td>
                <td>
                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
