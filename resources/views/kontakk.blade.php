@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hubungi Kami</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('kontakk.kirim') }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nomor HP</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Subjek</label>
            <input type="text" name="subject" class="form-control">
        </div>

        <div class="mb-3">
            <label>Pesan</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
@endsection
