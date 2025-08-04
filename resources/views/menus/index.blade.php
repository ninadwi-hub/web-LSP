@extends('layouts.app')

@section('title', 'Manajemen Menu')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Manajemen Menu Navigasi</h4>
        <a href="{{ route('menus.create') }}" class="btn btn-primary">+ Tambah Menu</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Slug / URL</th>
                <th>Tipe</th>
                <th>Parent</th>
                <th>Status</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->title }}</td>
                    <td>{{ $menu->type == 'external' ? $menu->url : $menu->slug }}</td>
                    <td>{{ ucfirst($menu->type) }}</td>
                    <td>{{ $menu->parent?->title ?? '-' }}</td>
                    <td><span class="badge bg-{{ $menu->is_active ? 'success' : 'secondary' }}">
                        {{ $menu->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                    <td>{{ $menu->order }}</td>
                    <td>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
