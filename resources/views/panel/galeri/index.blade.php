@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Galeri</h4>
    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-3">Tambah Galeri</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Uploader</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galeris as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->uploader }}</td>
                    <td>
                        <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus galeri ini?')">
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
