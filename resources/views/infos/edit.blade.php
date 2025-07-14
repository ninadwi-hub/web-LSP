@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Info</h4>

    <form action="{{ route('infos.update', $info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $info->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $info->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id == $info->category_id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Gambar (opsional)</label>
            <input type="file" name="thumbnail" class="form-control">
            @if ($info->thumbnail)
                <small class="d-block mt-2">Gambar saat ini:
                    <img src="{{ asset('storage/' . $info->thumbnail) }}" width="100">
                </small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('infos.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
