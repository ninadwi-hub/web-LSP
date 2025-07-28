@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Pesan Kontak</h3>

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label>Subjek</label>
            <input name="subject" class="form-control">
        </div>
        <div class="mb-3">
            <label>Pesan</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button class="btn btn-success">Kirim</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
