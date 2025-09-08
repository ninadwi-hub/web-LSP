@extends('layouts.app')

@section('title', 'Tambah File Download')

@section('content')
<div class="container py-4">
    <h3>Tambah File Download</h3>

    <form action="{{ route('admin.downloads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Judul -->
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title') }}" required>
        </div>

        <!-- Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" 
                   value="{{ old('slug') }}">
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected':'' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Upload File -->
        <div class="mb-3">
            <label for="file_path" class="form-label">File</label>
            <input type="file" name="file_path" id="file_path" class="form-control" required>
        </div>

        <!-- File Type -->
        <div class="mb-3">
            <label for="file_type" class="form-label">Tipe File</label>
            <input type="text" name="file_type" id="file_type" class="form-control" 
                   value="{{ old('file_type') }}">
        </div>

        <!-- File Size -->
        <div class="mb-3">
            <label for="file_size" class="form-label">Ukuran File (KB)</label>
            <input type="number" name="file_size" id="file_size" class="form-control" 
                   value="{{ old('file_size') }}">
        </div>

        <!-- Uploader -->
        <div class="mb-3">
            <label for="uploader" class="form-label">Uploader</label>
            <input type="text" name="uploader" id="uploader" class="form-control" 
                   value="{{ old('uploader', auth()->user()->name ?? '') }}">
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="draft" {{ old('status')=='draft' ? 'selected':'' }}>Draft</option>
                <option value="published" {{ old('status')=='published' ? 'selected':'' }}>Published</option>
                <option value="archived" {{ old('status')=='archived' ? 'selected':'' }}>Archived</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.downloads.index') }}" class="btn btn-secondary me-2">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
