@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah File Download</h2>

    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Slug (opsional)</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Upload File</label>
            <input type="file" name="file_path" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('media.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
