<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $galeri->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Slug</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $galeri->slug ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="description" class="form-control">{{ old('description', $galeri->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Path Gambar</label>
    <input type="text" name="image_path" class="form-control" value="{{ old('image_path', $galeri->image_path ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Uploader</label>
    <input type="text" name="uploader" class="form-control" value="{{ old('uploader', $galeri->uploader ?? '') }}">
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control" required>
        <option value="draft" {{ old('status', $galeri->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status', $galeri->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
        <option value="archived" {{ old('status', $galeri->status ?? '') == 'archived' ? 'selected' : '' }}>Archived</option>
    </select>
</div>

<div class="mb-3">
    <label>Tanggal Ambil</label>
    <input type="date" name="taken_at" class="form-control" value="{{ old('taken_at', $galeri->taken_at ?? '') }}">
</div>

<div class="mb-3">
    <label>Ditampilkan di Beranda?</label>
    <select name="is_featured" class="form-control">
        <option value="0" {{ old('is_featured', $galeri->is_featured ?? 0) == 0 ? 'selected' : '' }}>Tidak</option>
        <option value="1" {{ old('is_featured', $galeri->is_featured ?? 0) == 1 ? 'selected' : '' }}>Ya</option>
    </select>
</div>

<div class="mb-3">
    <label>ID Kategori</label>
    <input type="number" name="category_id" class="form-control" value="{{ old('category_id', $galeri->category_id ?? '') }}">
</div>

<div class="mb-3">
    <label>ID Album</label>
    <input type="number" name="album_id" class="form-control" value="{{ old('album_id', $galeri->album_id ?? '') }}">
</div>
