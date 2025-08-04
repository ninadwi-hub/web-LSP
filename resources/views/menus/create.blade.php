@extends('layouts.app')

@section('title', 'Tambah Menu')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Tambah Menu</h4>
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

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="row">
            {{-- Judul --}}
            <div class="col-md-6 mb-3">
                <label for="title">Judul Menu</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            {{-- Slug (digunakan jika internal) --}}
            <div class="col-md-6 mb-3">
                <label for="slug">Slug (jika internal)</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
            </div>

            {{-- Tipe menu --}}
            <div class="col-md-6 mb-3">
                <label for="type">Tipe</label>
                <select name="type" class="form-control" required>
                    <option value="internal" {{ old('type') == 'internal' ? 'selected' : '' }}>Internal</option>
                    <option value="external" {{ old('type') == 'external' ? 'selected' : '' }}>External</option>
                </select>
            </div>

            {{-- URL jika external --}}
            <div class="col-md-6 mb-3">
                <label for="url">URL (jika external)</label>
                <input type="text" name="url" class="form-control" value="{{ old('url') }}">
            </div>

            {{-- Parent --}}
            <div class="col-md-6 mb-3">
                <label for="parent_id">Parent Menu</label>
                <select name="parent_id" class="form-control">
                    <option value="">-- Tidak Ada (Menu Utama) --</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                            {{ $parent->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Urutan --}}
            <div class="col-md-6 mb-3">
                <label for="order">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
            </div>

            {{-- Aktif? --}}
            <div class="col-md-6 mb-3">
                <label for="is_active">Status Aktif</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
