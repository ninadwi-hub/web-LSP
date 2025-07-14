@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Galeri</h1>

    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug (opsional)</label>
            <input type="text" name="slug" id="slug" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="image_path" class="form-label">Gambar</label>
            <input type="file" name="image_path" id="image_path" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
