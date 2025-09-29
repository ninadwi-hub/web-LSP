@extends('layouts.app')

@section('title', 'Edit Galeri')

@section('content')
    <h3 class="mb-4">Edit Galeri</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $galeri->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $galeri->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Lama</label><br>
            <img src="{{ asset('storage/'.$galeri->image_path) }}" width="150" class="mb-2 rounded shadow-sm">
            <input type="file" name="image_path" class="form-control mt-2">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="number" name="category_id" class="form-control" value="{{ old('category_id', $galeri->category_id) }}">
        </div>

        <div class="mb-3">
    <label for="tipe_tampilan">Tipe Tampilan</label>
    <select name="tipe_tampilan" class="form-control" required>
        <option value="slider">Slider</option>
        <option value="gallery">Gallery</option>
        <option value="both">Keduanya</option>
    </select>
</div>

        <div class="mb-3">
            <label>Album</label>
            <input type="number" name="album_id" class="form-control" value="{{ old('album_id', $galeri->album_id) }}">
        </div>

        <div class="mb-3">
            <label>Uploader</label>
            <input type="text" name="uploader" class="form-control" value="{{ old('uploader', $galeri->uploader) }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="draft" {{ $galeri->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $galeri->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ $galeri->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <div class="mb-3">
    <label>Tanggal Pengambilan</label>
    <input type="date" name="taken_at" class="form-control"
        value="{{ old('taken_at', $galeri->taken_at ? \Carbon\Carbon::parse($galeri->taken_at)->format('Y-m-d') : '') }}">
</div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_featured" class="form-check-input" id="featuredCheck" value="1" {{ $galeri->is_featured ? 'checked' : '' }}>
            <label class="form-check-label" for="featuredCheck">Tampilkan di Beranda (Featured)</label>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
