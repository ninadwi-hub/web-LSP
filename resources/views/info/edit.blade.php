@extends('layouts.app')

@section('content')
@php
    $kategoriUrutan = ['home','profil', 'sertifikasi', 'media', 'informasi','kontak'];
@endphp

<div class="container">
    <h1 class="mb-4">Edit Info</h1>

    <form action="{{ route('admin.info.update', $info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            {{-- Kategori --}}
            <div class="mb-3">
                <label>Kategori</label>
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

        {{-- Halaman Statis Opsional --}}
        <div class="mb-3">
            <label>Halaman Statis (Opsional)</label>
            <select name="page_id" class="form-control">
                <option value="">-- Tidak Ada --</option>
                @foreach($pages as $p)
                    <option value="{{ $p->id }}" {{ old('page_id', $info->page_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Judul --}}
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $info->title) }}" required>
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label>Konten</label>
            <textarea name="content" class="form-control" rows="8">{{ old('content', $info->content) }}</textarea>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="draft" {{ old('status', $info->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $info->status) == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status', $info->status) == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        {{-- Thumbnail --}}
        <div class="mb-3">
            <label>Thumbnail (Opsional)</label>
            <input type="file" name="thumbnail" class="form-control">
            @if($info->thumbnail)
                <p class="mt-2">
                    <img src="{{ asset('storage/'.$info->thumbnail) }}" alt="" width="150">
                </p>
            @endif
        </div>

        {{-- Checkbox tampil di publik --}}
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_public" value="1"
                {{ old('is_public', $info->is_active) ? 'checked' : '' }}>
            <label class="form-check-label">Tampilkan di halaman publik</label>
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.info.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
