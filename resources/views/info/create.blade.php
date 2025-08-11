
@extends('layouts.app')

@section('title', 'Tambah Info')

@section('content')
<div class="container mt-4">
    <h3>Tambah Info</h3>

    @php
        $pageUrutan = ['home','profil', 'sertifikasi', 'media', 'informasi','kontak'];
        $pages = $pages->sortBy(function($page) use ($pageUrutan) {
            return array_search($page->slug, $pageUrutan);
        });
    @endphp

    <form action="{{ route('admin.info.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Kategori --}}
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tampilkan di Halaman --}}
<div class="mb-3">
    <label>Tampilkan di Halaman</label>
    <select name="page_slug" class="form-control">
        <option value="">-- Tidak ditampilkan di halaman statis --</option>
        @foreach ($pages as $page)
            <option value="{{ $page->slug }}" {{ old('page_slug', $info->page_slug ?? '') == $page->slug ? 'selected' : '' }}>
                {{ ucfirst($page->title) }}
            </option>
        @endforeach
    </select>
</div>

        {{-- Judul --}}
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" class="form-control">{{ old('content') }}</textarea>
        </div>

        {{-- Thumbnail --}}
        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
