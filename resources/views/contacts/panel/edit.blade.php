@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Status Pesan</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" class="form-control" value="{{ $contact->name }}" disabled>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="baru" {{ $contact->status == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ $contact->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $contact->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('contacts.panel.kontak') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
