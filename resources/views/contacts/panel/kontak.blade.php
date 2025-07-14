@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Pesan Masuk (Kontak)</h1>

    <a href="{{ route('kontakk') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Form
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Pesan</th>
                <th>Status</th>
                <th>Dikirim</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject ?? '-' }}</td>
                    <td>{{ Str::limit($contact->message, 100) }}</td>
                    <td>{{ ucfirst($contact->status) }}</td>
                    <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada pesan masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
