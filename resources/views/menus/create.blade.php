@extends('layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Galeri</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="album_id" class="form-label">Album</label>
            <select name="album_id" class="form-select">
                <option value="">-- Pilih Album --</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="uploader" class="form-label">Pengunggah</label>
            <input type="text" name="uploader" class="form-control">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="taken_at" class="form-label">Tanggal Diambil</label>
            <input type="date" name="taken_at" class="form-control">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="featured">
            <label for="featured" class="form-check-label">Tampilkan di Beranda</label>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
