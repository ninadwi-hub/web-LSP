@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Galeri</h1>
    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Gambar Baru (opsional)</label>
            <input type="file" name="gambar" class="form-control">
            <br>
            <img src="{{ asset('storage/'.$galeri->gambar) }}" width="100">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ $galeri->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
