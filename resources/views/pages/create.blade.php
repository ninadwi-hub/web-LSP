@extends('layouts.app')

@section('title', 'Tambah Halaman')

@section('content')
    <h3 class="mb-3">Tambah Halaman Statis</h3>

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

    <form action="{{ route('pages.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Halaman</label>
            <input type="text" name="title" class="form-control" placeholder="Masukkan judul..." value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select name="category" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="profil" {{ old('category') == 'profil' ? 'selected' : '' }}>Profil</option>
                <option value="informasi" {{ old('category') == 'informasi' ? 'selected' : '' }}>Informasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Konten</label>
            <textarea name="content" rows="8" class="form-control" placeholder="Masukkan konten..." required>{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
