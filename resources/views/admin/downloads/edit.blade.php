@extends('layouts.app')

@section('title', 'Edit File Download')

@section('content')
<div class="container py-4">
    <h3>Edit File Download</h3>

    <form action="{{ route('downloads.update', $download->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $download->title) }}" required>
        </div>

        <!-- Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" 
                   value="{{ old('slug', $download->slug) }}">
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $download->description) }}</textarea>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ (old('category_id',$download->category_id)==$cat->id) ? 'selected':'' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Upload File -->
        <div class="mb-3">
            <label class="form-label">File Saat Ini</label><br>
            <a href="{{ asset('storage/'.$download->file_path) }}" target="_blank">{{ $download->file_path }}</a>
        </div>
        <div class="mb-3">
            <label for="file_path" class="form-label">Ganti File (Opsional)</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
        </div>

        <!-- File Type -->
        <div class="mb-3">
            <label for="file_type" class="form-label">Tipe File</label>
            <input type="text" name="file_type" id="file_type" class="form-control" 
                   value="{{ old('file_type', $download->file_type) }}">
        </div>

        <!-- File Size -->
        <div class="mb-3">
            <label for="file_size" class="form-label">Ukuran File (KB)</label>
            <input type="number" name="file_size" id="file_size" class="form-control" 
                   value="{{ old('file_size', $download->file_size) }}">
        </div>

        <!-- Uploader -->
        <div class="mb-3">
            <label for="uploader" class="form-label">Uploader</label>
            <input type="text" name="uploader" id="uploader" class="form-control" 
                   value="{{ old('uploader', $download->uploader) }}">
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="draft" {{ (old('status',$download->status)=='draft') ? 'selected':'' }}>Draft</option>
                <option value="published" {{ (old('status',$download->status)=='published') ? 'selected':'' }}>Published</option>
                <option value="archived" {{ (old('status',$download->status)=='archived') ? 'selected':'' }}>Archived</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('downloads.index') }}" class="btn btn-secondary me-2">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
