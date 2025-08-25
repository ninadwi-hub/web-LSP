@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h3>Edit Unit Kompetensi</h3>
  <form method="POST" action="{{ route('panell.unit.update',$unit) }}" class="mt-3">
    @csrf @method('PUT')
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Skema *</label>
        <select name="skema_id" class="form-select" required>
          @foreach($skemas as $s)
            <option value="{{ $s->id }}" {{ (old('skema_id',$unit->skema_id)==$s->id)?'selected':'' }}>{{ $s->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Kode Unit *</label>
        <input name="kode_unit" class="form-control" required value="{{ old('kode_unit',$unit->kode_unit) }}">
      </div>
      <div class="col-md-9">
        <label class="form-label">Judul Unit *</label>
        <input name="judul_unit" class="form-control" required value="{{ old('judul_unit',$unit->judul_unit) }}">
      </div>
      <div class="col-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi',$unit->deskripsi) }}</textarea>
      </div>
    </div>
    <div class="mt-3">
      <button class="btn btn-primary">Update</button>
      <a href="{{ route('panell.unit.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
@endsection
