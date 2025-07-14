@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Menu</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

    <div class="mb-3">
    <label for="title" class="form-label">Judul Menu</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $menu->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="url" class="form-label">URL</label>
    <input type="text" name="url" class="form-control" value="{{ old('url', $menu->url ?? '') }}">
</div>

<div class="mb-3">
    <label for="order" class="form-label">Urutan</label>
    <input type="number" name="order" class="form-control" value="{{ old('order', $menu->order ?? 0) }}">
</div>

<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
        {{ old('is_active', $menu->is_active ?? 1) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Aktif</label>
</div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
