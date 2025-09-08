@extends('layouts.app')

@section('title', 'Edit Info')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Edit Info</h3>

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.info.update', $info->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        {{-- Kategori --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-control" required>
  <option value="">-- Pilih Kategori --</option>
  @foreach($kategoris as $kategori)
    <option value="{{ $kategori->id }}"
      {{ old('kategori_id', $info->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
      {{ $kategori->nama }}
    </option>
  @endforeach
</select>
@error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Halaman Statis Opsional --}}
        <div class="mb-3">
            <label class="form-label">Halaman Statis (Opsional)</label>
            <select name="page_id" class="form-select">
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
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" 
                   value="{{ old('title', $info->title) }}" required>
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="content" class="form-control" rows="8">{{ old('content', $info->content) }}</textarea>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="draft" {{ old('status', $info->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $info->status) == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status', $info->status) == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        {{-- Thumbnail lama --}}
        @if ($info->thumbnail)
            <div class="mb-3">
                <label class="form-label">Thumbnail Saat Ini</label><br>
                <img src="{{ asset('storage/' . $info->thumbnail) }}" alt="Thumbnail" class="img-fluid rounded mb-2" style="max-width: 200px;">
            </div>
        @endif

        {{-- Upload thumbnail baru --}}
        <div class="mb-3">
            <label class="form-label">Ganti Thumbnail (Opsional)</label>
            <input type="file" name="thumbnail" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
        </div>

        {{-- Tombol --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.info.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
