@extends('layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
    <h3 class="mb-4">Tambah Galeri</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image_path" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="number" name="category_id" class="form-control" value="{{ old('category_id') }}">
        </div>

        <div class="mb-3">
            <label>Album</label>
            <input type="number" name="album_id" class="form-control" value="{{ old('album_id') }}">
        </div>

        <div class="mb-3">
            <label>Uploader</label>
            <input type="text" name="uploader" class="form-control" value="{{ old('uploader') }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

       <div class="mb-3">
    <label>Tanggal Pengambilan</label>
    <input type="date" name="taken_at" class="form-control"
        value="{{ old('taken_at') }}">
</div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_featured" class="form-check-input" id="featuredCheck" value="1" {{ old('is_featured') ? 'checked' : '' }}>
            <label class="form-check-label" for="featuredCheck">Tampilkan di Beranda (Featured)</label>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
