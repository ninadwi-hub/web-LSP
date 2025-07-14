@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Info</h4>

    <form action="{{ route('infos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>

       <div class="mb-3">
    <label for="thumbnail" class="form-label">Gambar (Opsional)</label>
    <input type="file" name="thumbnail" class="form-control">
</div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('infos.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
