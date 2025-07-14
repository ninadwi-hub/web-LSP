@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Halaman Statis</h4>

    <form action="{{ route('pages.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" class="form-control" rows="6" required></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Waktu Publish</label>
            <input type="datetime-local" name="published_at" class="form-control">
        </div>

        <div class="mb-3">
            <label>Featured Image (opsional)</label>
            <input type="text" name="featured_image" class="form-control" placeholder="URL gambar">
        </div>

        <div class="mb-3">
            <label>Meta Description (SEO)</label>
            <input type="text" name="meta_description" class="form-control">
        </div>

        <div class="mb-3">
            <label>Meta Keywords (dipisah koma)</label>
            <input type="text" name="meta_keywords" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_homepage" value="1" id="is_homepage">
            <label class="form-check-label" for="is_homepage">
                Tampilkan di Beranda?
            </label>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
