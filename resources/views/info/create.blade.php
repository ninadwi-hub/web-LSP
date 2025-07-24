@extends('layouts.app')

@section('title', 'Tambah Info')

@section('content')
<div class="container mt-4">
    <h3>Tambah Info</h3>
    <form action="{{ route('infos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" class="form-control">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
