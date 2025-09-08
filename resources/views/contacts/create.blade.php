@extends('layouts.app')

@section('title', 'Tambah Kontak')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Tambah Kontak</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control"
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control"
                   value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone">No. Telepon</label>
            <input type="text" id="phone" name="phone" class="form-control"
                   value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label for="subject">Subjek</label>
            <input type="text" id="subject" name="subject" class="form-control"
                   value="{{ old('subject') }}">
        </div>

        <div class="mb-3">
            <label for="message">Pesan</label>
            <textarea id="message" name="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="baru" {{ old('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
