@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Galeri</h1>
    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-3">Tambah Galeri</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galeris as $galeri)
                <tr>
                    <td>{{ $galeri->judul }}</td>
                    <td><img src="{{ asset('storage/'.$galeri->gambar) }}" width="100"></td>
                    <td>{{ $galeri->keterangan }}</td>
                    <td>
                        <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
