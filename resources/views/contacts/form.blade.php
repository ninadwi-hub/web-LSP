@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kontak Kami</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('kontak.submit') }}">
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
        <button class="btn btn-primary">Kirim Pesan</button>
    </form>
</div>
@endsection
