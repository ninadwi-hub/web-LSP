@extends('layouts.app')

@section('title', 'Manajemen Kontak')

@section('content')
<div class="container mt-4">
    <h1>Manajemen Kontak</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
            <i class="bx bx-plus-circle"></i> Tambah
        </a>

        <form method="GET" action="{{ route('admin.contacts.index') }}" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari nama/email..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
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
                            <div class="btn-group">
                                <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit"></i> Edit
                                </a>

                                <form method="POST" action="{{ route('admin.contacts.destroy', $contact->id) }}" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bx bx-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-2">
            {{ $contacts->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
