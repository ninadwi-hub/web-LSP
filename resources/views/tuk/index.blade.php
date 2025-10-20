@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Manajemen Tempat Uji Kompetensi</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah
    </button>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tuks as $tuk)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $tuk->kode }}</td>
                            <td>{{ $tuk->nama }}</td>
                            <td>{{ $tuk->alamat }}</td>
                            <td>{{ $tuk->no_hp }}</td>
                            <td>{{ $tuk->email }}</td>
                            <td>{{ $tuk->provinsi }}</td>
                            <td>{{ $tuk->kabupaten }}</td>
                            <td class="text-center">
                                <form action="{{ route('tuk.destroy', $tuk->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data TUK.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $tuks->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form method="POST" action="{{ route('tuk.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tempat Uji Kompetensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Kode TUK</label>
                            <input type="text" name="kode" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama TUK</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Provinsi</label>
                            <select name="provinsi" class="form-select">
                                <option value="">:: Pilih Provinsi ::</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="DI Yogyakarta">DI Yogyakarta</option>
                                <option value="Banten">Banten</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kabupaten</label>
                            <select name="kabupaten" class="form-select">
                                <option value="">:: Pilih Kabupaten ::</option>
                                <option value="Kebumen">Kebumen</option>
                                <option value="Purwokerto">Purwokerto</option>
                                <option value="Cilacap">Cilacap</option>
                                <option value="Semarang">Semarang</option>
                                <option value="Yogyakarta">Yogyakarta</option>
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
