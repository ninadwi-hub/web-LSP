@php
  // ambil slug semua menu aktif untuk jadi kategori
  $kategoriUrutan = \App\Models\Menu::where('is_active', 1)->orderBy('order')->pluck('slug')->toArray();
@endphp

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="title" class="form-control"
        value="{{ old('title', $page->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Kategori</label>
    <select name="category" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategoriUrutan as $kategori)
            <option value="{{ $kategori }}"
                {{ old('category', $page->category ?? '') == $kategori ? 'selected' : '' }}>
                {{ ucfirst($kategori) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Konten</label>
    <textarea id="editor" name="content" class="form-control" rows="8" required>
        {{ old('content', $page->content ?? '') }}
    </textarea>
</div>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="draft" {{ old('status', $page->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status', $page->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
    </select>
</div>

<div class="mb-3">
    <label>Tanggal Publikasi</label>
    <input type="datetime-local" name="published_at" class="form-control"
        value="{{ old('published_at', isset($page->published_at) ? date('Y-m-d\TH:i', strtotime($page->published_at)) : '') }}">
</div>

<div class="mb-3">
    <label>Featured Image</label>
    <input type="file" name="featured_image" class="form-control">
</div>

<div class="mb-3">
    <label>Meta Description</label>
    <textarea name="meta_description" class="form-control">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Meta Keywords</label>
    <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $page->meta_keywords ?? '') }}">
</div>

<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="is_homepage" value="1"
        {{ old('is_homepage', $page->is_homepage ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">Jadikan sebagai homepage</label>
</div>
