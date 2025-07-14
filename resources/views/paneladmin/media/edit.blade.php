@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit File</h2>

    <form action="{{ route('media.update', $media->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" value="{{ $media->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" value="{{ $media->slug }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $media->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Ganti File (kosongkan jika tidak ingin mengubah)</label>
            <input type="file" name="file_path" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft" {{ $media->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $media->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ $media->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('media.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
