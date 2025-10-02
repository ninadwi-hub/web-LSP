@extends('layouts.app')

@section('title', 'Jadwal Asesmen')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Jadwal Asesmen</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <label>Show
                        <select class="form-select form-select-sm d-inline-block w-auto">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select> entries
                    </label>
                </div>
                <div>
                    <input type="text" class="form-control form-control-sm" placeholder="Search...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>No. SK</th>
                            <th>Tgl. Terbit SK</th>
                            <th>Tanggal Asesmen</th>
                            <th>Skema</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Kuota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwals as $index => $jadwal)
                        <tr>
                            <td>{{ $jadwals->firstItem() + $index }}</td>
                            <td>{{ $jadwal->no_sk }}</td>
                            <td>{{ $jadwal->tgl_terbit_sk->format('d-m-Y') }}</td>
                            <td>{{ $jadwal->tanggal_asesmen->format('d-m-Y') }}</td>
                            <td>{{ $jadwal->skema->nama ?? '-' }}</td>
                            <td>{{ $jadwal->tipe }}</td>
                            <td>{{ number_format($jadwal->harga, 0, ',', '.') }}</td>
                            <td>{{ $jadwal->kuota }}</td>
                            <td>
                                <a href="{{ route('sa.persiapan.jadwal.edit', $jadwal) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('sa.persiapan.jadwal.destroy', $jadwal) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    Showing {{ $jadwals->firstItem() ?? 0 }} to {{ $jadwals->lastItem() ?? 0 }} of {{ $jadwals->total() }} entries
                </div>
                <div>
                    {{ $jadwals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('sa.persiapan.jadwal.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jadwal Asesmen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @include('sa.Persiapan.jadwal.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
