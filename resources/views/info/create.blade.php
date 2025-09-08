@extends('layouts.app')

@section('title', 'Tambah Info')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Tambah Info</h3>

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.info.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        {{-- Kategori --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Judul --}}
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="content" class="form-control" rows="8">{{ old('content') }}</textarea>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        {{-- Upload thumbnail --}}
        <div class="mb-3">
            <label class="form-label">Thumbnail (Opsional)</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>

        {{-- Tombol --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.info.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
