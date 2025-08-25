@extends('layouts.app')

@section('content')
@php
    $kategoriUrutan = ['home','profil', 'sertifikasi', 'media', 'informasi','kontak'];
@endphp

<div class="container">
    <h1 class="mb-4">Tambah Info</h1>

    <form action="{{ route('admin.info.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Kategori --}}
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoriUrutan as $kategori)
                    <option value="{{ $kategori }}"
                        {{ old('kategori') == $kategori ? 'selected' : '' }}>
                        {{ ucfirst($kategori) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Halaman Statis Opsional --}}
        <div class="mb-3">
            <label>Halaman Statis (Opsional)</label>
            <select name="kategori_id" class="form-control" required>
    <option value="">-- Pilih Kategori --</option>
    @foreach($kategoris as $kategori)
        <option value="{{ $kategori->id }}"
            {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
            {{ ucfirst($kategori->nama) }}
        </option>
    @endforeach
</select>

        </div>

        {{-- Judul --}}
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title') }}" required>
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label>Konten</label>
            <textarea name="content" class="form-control" rows="8">{{ old('content') }}</textarea>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        {{-- Thumbnail --}}
        <div class="mb-3">
            <label>Thumbnail (Opsional)</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>

        {{-- Checkbox tampil di publik --}}
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_public" value="1" {{ old('is_public', 1) ? 'checked' : '' }}>
            <label class="form-check-label">Tampilkan di halaman publik</label>
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.info.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
