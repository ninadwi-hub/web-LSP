@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="container mt-4">
    <h2>Manajemen User</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tombol Tambah --}}
    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $i => $user)
                    <tr>
                        <td class="text-center">{{ $i + $users->firstItem() }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit"></i> Edit
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
                        <td colspan="5" class="text-center">Tidak ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
