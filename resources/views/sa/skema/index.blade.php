@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Manajemen Skema Sertifikasi</h5>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th width="120px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skemas as $skema)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $skema->kode }}</td>
                    <td>{{ $skema->nama }}</td>
                    <td>{{ $skema->jenis }}</td>
                    <td>{{ $skema->level }}</td>
                    <td>
                        @if($skema->status == 'aktif')
                        <span class="badge bg-success">Aktif</span>
                        @else
                        <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $skema->id }}">
                            <i class="fa fa-edit"></i>
                        </button>
                        <form action="{{ route('sa.skema.destroy', $skema->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus skema ini?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit{{ $skema->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action="{{ route('sa.skema.update', $skema->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Skema</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label>Kode Skema</label>
                                            <input type="text" name="kode" class="form-control" value="{{ $skema->kode }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nama Skema</label>
                                            <input type="text" name="nama" class="form-control" value="{{ $skema->nama }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Jenis</label>
                                            <input type="text" name="jenis" class="form-control" value="{{ $skema->jenis }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Level</label>
                                            <input type="text" name="level" class="form-control" value="{{ $skema->level }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tanggal Mulai</label>
                                            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $skema->tanggal_mulai }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tanggal Selesai</label>
                                            <input type="date" name="tanggal_selesai" class="form-control" value="{{ $skema->tanggal_selesai }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Kuota</label>
                                            <input type="number" name="kuota" class="form-control" value="{{ $skema->kuota }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="aktif" {{ ($skema->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="nonaktif" {{ ($skema->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data skema sertifikasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $skemas->links() }}
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('sa.skema.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Skema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Kode Skema</label>
                            <input type="text" name="kode" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Skema</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis</label>
                            <input type="text" name="jenis" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Level</label>
                            <input type="text" name="level" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Kuota</label>
                            <input type="number" name="kuota" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="aktif" {{ ($skema->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ ($skema->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection