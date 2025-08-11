
@extends('layouts.app')

@section('title', 'Edit Info')

@section('content')
<div class="container mt-4">
    <h3>Edit Info</h3>

    @php
        $pageUrutan = ['home','profil', 'sertifikasi', 'media', 'informasi','kontak'];
        $pages = $pages->sortBy(function($page) use ($pageUrutan) {
            return array_search($page->slug, $pageUrutan);
        });
    @endphp

    <form action="{{ route('infos.update', $info) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        {{-- Kategori --}}
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $info->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
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
            <input type="text" name="title" class="form-control" value="{{ $info->title }}">
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" class="form-control">{{ $info->content }}</textarea>
        </div>

        {{-- Thumbnail --}}
        <div class="mb-3">
            <label>Thumbnail</label><br>
            @if($info->thumbnail)
                <img src="{{ asset('storage/' . $info->thumbnail) }}" width="100"><br><br>
            @endif
            <input type="file" name="thumbnail" class="form-control">
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="draft" {{ old('status', $info->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $info->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
