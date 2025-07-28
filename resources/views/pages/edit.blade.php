@extends('layouts.app')

@section('title', 'Edit Halaman')

@section('content')
    <h3 class="mb-3">Edit Halaman Statis</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan input:<br>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Halaman</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select name="category" class="form-control" required>
                <option value="profil" {{ old('category', $page->category) == 'profil' ? 'selected' : '' }}>Profil</option>
                <option value="informasi" {{ old('category', $page->category) == 'informasi' ? 'selected' : '' }}>Informasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="published" {{ old('status', $page->status) == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ old('status', $page->status) == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Konten</label>
            <textarea name="content" rows="8" class="form-control" required>{{ old('content', $page->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
