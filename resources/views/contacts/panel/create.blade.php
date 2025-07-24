@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kontak Manual</h1>

    <form action="{{ route('contacts.panel.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label>No. HP</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label>Subjek</label>
            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
        </div>

        <div class="mb-3">
            <label>Pesan</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="baru" {{ old('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('contacts.panel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
