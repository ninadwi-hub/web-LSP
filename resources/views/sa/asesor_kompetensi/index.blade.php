@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h4 class="mb-2">Manajemen Asesor Kompetensi</h4>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-circle"></i> Tambah
    </button>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>No Registrasi</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>HP</th>
                        <th>Tgl Expired</th>
                        <th>Username</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($asesors as $index => $asesor)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($asesors->currentPage() - 1) * $asesors->perPage() }}</td>
                        <td>{{ $asesor->no_registrasi }}</td>
                        <td>{{ $asesor->nama }}</td>
                        <td>{{ $asesor->email }}</td>
                        <td>{{ $asesor->hp }}</td>
                        <td>{{ $asesor->tgl_expired }}</td>
                        <td>{{ $asesor->username }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $asesor->id }}" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="{{ route('sa.asesor_kompetensi.destroy', $asesor->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $asesor->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $asesor->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('sa.asesor_kompetensi.update', $asesor->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $asesor->id }}">Edit Asesor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">No Registrasi</label>
                                            <input type="text" name="no_registrasi" class="form-control" value="{{ $asesor->no_registrasi }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" value="{{ $asesor->nama }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $asesor->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">No HP</label>
                                            <input type="text" name="hp" class="form-control" value="{{ $asesor->hp }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Expired</label>
                                            <input type="date" name="tgl_expired" class="form-control" value="{{ $asesor->tgl_expired }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" value="{{ $asesor->username }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit -->
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data asesor.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $asesors->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('sa.asesor_kompetensi.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Asesor Kompetensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">No Registrasi</label>
                        <input type="text" name="no_registrasi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="hp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Expired</label>
                        <input type="date" name="tgl_expired" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->

@endsection