@extends('layouts.app')

@section('title', 'Edit Info')

@section('content')
<div class="container mt-4">
    <h3>Edit Info</h3>
    <form action="{{ route('infos.update', $info) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
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
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $info->title }}">
        </div>
        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" class="form-control">{{ $info->content }}</textarea>
        </div>
        <div class="mb-3">
            <label>Thumbnail</label><br>
            @if($info->thumbnail)
                <img src="{{ asset('storage/' . $info->thumbnail) }}" width="100"><br><br>
            @endif
            <input type="file" name="thumbnail" class="form-control">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
