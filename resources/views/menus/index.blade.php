@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Menu</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">+ Tambah Menu</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Slug</th>
                <th>URL</th>
                <th>Urutan</th>
                <th>Aktif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->title }}</td>
                <td>{{ $menu->slug }}</td>
                <td>{{ $menu->url }}</td>
                <td>{{ $menu->order }}</td>
                <td>{{ $menu->active ? 'Ya' : 'Tidak' }}</td>
                <td>
                    <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
