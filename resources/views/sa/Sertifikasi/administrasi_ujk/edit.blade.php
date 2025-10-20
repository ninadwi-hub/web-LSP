@extends('layouts.app')

@section('title', 'Administrasi UJK')

@section('content')
<div class="container">
    <h4 class="mb-3">Administrasi UJK</h4>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('sa.sertifikasi.administrasi_ujk.update', $data->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- =========================
                    ADMINISTRASI PESERTA
                ========================== --}}
                <h5 class="text-primary mb-3">Administrasi Peserta</h5>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label class="form-label">Status Administrasi</label>
                        <select name="status_administrasi" class="form-control">
                            <option value="Proses" {{ $data->status_administrasi == 'Proses' ? 'selected' : '' }}>Proses</option>
                            <option value="Selesai" {{ $data->status_administrasi == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Jumlah Pembayaran</label>
                        <input type="number" name="jumlah_pembayaran" class="form-control" value="{{ $data->jumlah_pembayaran }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sumber Pendanaan</label>
                        <select name="sumber_pendanaan" class="form-control">
                            <option value="-" {{ $data->sumber_pendanaan == '-' ? 'selected' : '' }}>-</option>
                            <option value="Mandiri" {{ $data->sumber_pendanaan == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                            <option value="Institusi" {{ $data->sumber_pendanaan == 'Institusi' ? 'selected' : '' }}>Institusi</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-control">
                            <option value="-" {{ $data->metode_pembayaran == '-' ? 'selected' : '' }}>-</option>
                            <option value="Transfer" {{ $data->metode_pembayaran == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                            <option value="Tunai" {{ $data->metode_pembayaran == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                        </select>
                    </div>

                    <div class="col-md-3 mt-3">
                        <label class="form-label">No Rekening</label>
                        <input type="text" name="no_rekening" class="form-control" value="{{ $data->no_rekening }}">
                    </div>

                    <div class="col-md-3 mt-3">
                        <label class="form-label">Nama Rekening</label>
                        <input type="text" name="nama_rekening" class="form-control" value="{{ $data->nama_rekening }}">
                    </div>

                    <div class="col-md-3 mt-3">
                        <label class="form-label">Tanggal Pembayaran</label>
                        <input type="date" name="tanggal_pembayaran" class="form-control" value="{{ $data->tanggal_pembayaran }}">
                    </div>

                    <div class="col-md-3 mt-3">
                        <label class="form-label">Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" class="form-control">
                        @if($data->bukti_pembayaran)
                            <small class="text-muted">File saat ini: {{ $data->bukti_pembayaran }}</small>
                        @endif
                    </div>
                </div>

                {{-- =========================
                    BIODATA PESERTA
                ========================== --}}
                <h5 class="text-primary mb-3">Biodata Peserta</h5>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">No Identitas</label>
                        <input type="text" class="form-control" value="{{ $data->no_identitas }}" readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $data->nama }}" readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $data->email }}" readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" class="form-control" value="{{ $data->telepon }}" readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $data->tempat_lahir }}" readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" value="{{ $data->tanggal_lahir }}" readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div>
                            <label class="me-3">
                                <input type="radio" disabled {{ $data->jenis_kelamin == 'Pria' ? 'checked' : '' }}> Pria
                            </label>
                            <label>
                                <input type="radio" disabled {{ $data->jenis_kelamin == 'Wanita' ? 'checked' : '' }}> Wanita
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="2" readonly>{{ $data->alamat }}</textarea>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Rekomendasi</label>
                        <select name="rekomendasi" class="form-control">
                            <option value="Lanjut" {{ $data->rekomendasi == 'Lanjut' ? 'selected' : '' }}>Lanjut</option>
                            <option value="Tunda" {{ $data->rekomendasi == 'Tunda' ? 'selected' : '' }}>Tunda</option>
                        </select>
                    </div>

                    <div class="col-md-9 mb-3">
                        <label class="form-label">Catatan</label>
                        <textarea name="catatan" class="form-control" rows="2">{{ $data->catatan }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('sa.sertifikasi.administrasi_ujk.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
