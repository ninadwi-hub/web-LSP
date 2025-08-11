
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Manajemen Kontak</h1>

        {{-- Tombol Tambah Pesan --}}
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Pesan
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('contacts.index') }}" class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari nama/email..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </form>

    {{-- Tabel Kontak --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ Str::limit($contact->message, 50) }}</td>
                        <td>
                            <span class="badge bg-{{ $contact->status === 'baru' ? 'info' : 'secondary' }}">
                                {{ ucfirst($contact->status) }}
                            </span>
                        </td>
                        <td>{{ $contact->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $contacts->withQueryString()->links() }}
    </div>
</div>
@endsection
