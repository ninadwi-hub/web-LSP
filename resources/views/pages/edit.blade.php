@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Halaman</h4>

    <form action="{{ route('pages.update', $page->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $page->title }}" required>
        </div>

        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" class="form-control" rows="6" required>{{ $page->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="draft" {{ $page->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $page->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ $page->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Waktu Publish</label>
            <input type="datetime-local" name="published_at" class="form-control" value="{{ $page->published_at ? $page->published_at->format('Y-m-d\TH:i') : '' }}">
        </div>

        <div class="mb-3">
            <label>Featured Image</label>
            <input type="text" name="featured_image" class="form-control" value="{{ $page->featured_image }}">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>
            <input type="text" name="meta_description" class="form-control" value="{{ $page->meta_description }}">
        </div>

        <div class="mb-3">
            <label>Meta Keywords</label>
            <input type="text" name="meta_keywords" class="form-control" value="{{ $page->meta_keywords }}">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_homepage" value="1" {{ $page->is_homepage ? 'checked' : '' }}>
            <label class="form-check-label">
                Tampilkan di Beranda?
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
