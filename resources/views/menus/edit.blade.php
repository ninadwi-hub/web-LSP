@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Edit Menu</h4>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- Judul --}}
            <div class="col-md-6 mb-3">
                <label for="title">Judul Menu</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $menu->title) }}" required>
            </div>

            {{-- Slug (jika internal) --}}
            <div class="col-md-6 mb-3">
                <label for="slug">Slug (jika internal)</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $menu->slug) }}">
            </div>

            {{-- Tipe --}}
            <div class="col-md-6 mb-3">
                <label for="type">Tipe</label>
                <select name="type" class="form-control" required>
                    <option value="internal" {{ $menu->type == 'internal' ? 'selected' : '' }}>Internal</option>
                    <option value="external" {{ $menu->type == 'external' ? 'selected' : '' }}>External</option>
                </select>
            </div>

            {{-- URL jika eksternal --}}
            <div class="col-md-6 mb-3">
                <label for="url">URL (jika eksternal)</label>
                <input type="text" name="url" class="form-control" value="{{ old('url', $menu->url) }}">
            </div>

            {{-- Parent --}}
            <div class="col-md-6 mb-3">
                <label for="parent_id">Parent Menu</label>
                <select name="parent_id" class="form-control">
                    <option value="">-- Tidak Ada (Menu Utama) --</option>
                    @foreach ($parents as $parent)
                        @if ($parent->id != $menu->id)
                            <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>
                                {{ $parent->title }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- Urutan --}}
            <div class="col-md-6 mb-3">
                <label for="order">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $menu->order) }}">
            </div>

            {{-- Aktif? --}}
            <div class="col-md-6 mb-3">
                <label for="is_active">Status Aktif</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ $menu->is_active ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$menu->is_active ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
