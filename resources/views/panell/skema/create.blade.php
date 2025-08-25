@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h3>Tambah Skema</h3>
  <form method="POST" action="{{ route('panell.skema.store') }}" enctype="multipart/form-data" class="mt-3">
    @csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Nama Skema *</label>
        <input name="nama" class="form-control" required value="{{ old('nama') }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Kode *</label>
        <input name="kode" class="form-control" required value="{{ old('kode') }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Jenis</label>
        <input name="kategori" class="form-control" value="{{ old('kategori','Okupasi') }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Slug (opsional)</label>
        <input name="slug" class="form-control" value="{{ old('slug') }}" placeholder="otomatis dari nama jika dikosongkan">
      </div>
      <div class="col-md-6">
        <label class="form-label">Thumbnail (jpg/png)</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/*">
      </div>
      <div class="mb-3">
    <label for="file_skema" class="form-label">Dokumen Skema (PDF)</label>
    <input type="file" name="file_skema" id="file_skema" class="form-control" accept="application/pdf">
    @if(!empty($skema->file_skema))
        <p class="mt-2">
            File saat ini: 
            <a href="{{ asset('assets/files/skema_sertifikasi/' . $skema->file_skema) }}" target="_blank">
                {{ $skema->file_skema }}
            </a>
        </p>
    @endif
</div>
      <div class="col-12">
        <label class="form-label">Ringkasan</label>
        <textarea name="ringkasan" class="form-control" rows="3">{{ old('ringkasan') }}</textarea>
      </div>
    <div class="mt-3">
      <button class="btn btn-primary">Simpan</button>
      <a href="{{ route('panell.skema.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection
