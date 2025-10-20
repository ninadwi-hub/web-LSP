@extends('layouts.app')

@section('title', 'Edit Administrasi UJK')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Data Administrasi UJK</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('sa.sertifikasi.administrasi_ujk.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ $data->biodata->nama_lengkap ?? '-' }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Skema Sertifikasi</label>
                    <input type="text" class="form-control" value="{{ $data->tujuan_asesmen ?? '-' }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pembayaran</label>
                    <input type="date" name="tanggal_pembayaran" class="form-control" value="{{ $data->tanggal_pembayaran }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Pembayaran</label>
                    <input type="number" name="jumlah_pembayaran" class="form-control" value="{{ $data->jumlah_pembayaran }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Sumber Pendanaan</label>
                    <input type="text" name="sumber_pendanaan" class="form-control" value="{{ $data->sumber_pendanaan }}">
                </div>

                <div class="text-end">
                    <a href="{{ route('sa.sertifikasi.administrasi_ujk.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
