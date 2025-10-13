@extends('layouts.app')

@section('title', 'FR.AK.01 | Formulir Persetujuan Asesmen dan Kerahasiaan')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3 fw-bold">Persetujuan Asesmen</h5>

            <p>
                Persetujuan Asesmen ini untuk menjamin bahwa Peserta telah diberi arahan secara rinci tentang perencanaan dan proses asesmen.
            </p>

            <table class="table table-bordered">
                <tr>
                    <th>Skema Sertifikasi/Klaster Asesmen</th>
                    <td>:</td>
                    <td>{{ $asesi->skema ?? '-' }}</td>
                    <th>Judul</th>
                    <td>:</td>
                    <td>{{ $asesi->judul ?? '-' }}</td>
                </tr>
                <tr>
                    <th>TUK</th>
                    <td>:</td>
                    <td>{{ $asesi->tuk ?? 'TUK Sewaktu Cepit' }}</td>
                    <th>Tempat Kerja</th>
                    <td colspan="2">
                        <input type="radio" name="tempat" checked> Sewaktu
                        <input type="radio" name="tempat"> Tempat Kerja
                        <input type="radio" name="tempat"> Mandiri
                    </td>
                </tr>
                <tr>
                    <th>Nama Asesor</th>
                    <td>:</td>
                    <td>{{ $asesor->nama ?? '-' }}</td>
                    <th>Nama Peserta</th>
                    <td>:</td>
                    <td>{{ $asesi->nama ?? '-' }}</td>
                </tr>
            </table>

            <p><strong>Bukti yang dikumpulkan:</strong></p>
            <div class="ms-3">
                <label><input type="checkbox"> Verifikasi Portofolio</label><br>
                <label><input type="checkbox"> Observasi Langsung</label><br>
                <label><input type="checkbox" checked> Daftar Pertanyaan Tulis</label><br>
                <label><input type="checkbox"> Daftar Pertanyaan Lisan</label><br>
                <label><input type="checkbox"> Daftar Pertanyaan Wawancara</label>
            </div>

            <hr>

            <h6>Pelaksanaan Asesmen yang Disepakati</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Hari/Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="col-md-6">
                    <label>TUK</label>
                    <input type="text" class="form-control" value="TUK Sewaktu Cepit" readonly>
                </div>
            </div>

            <p><strong>Asesor</strong> menyatakan telah menjelaskan hak dan prosedur banding oleh asesi.</p>
            <p><strong>Asesor</strong> menyatakan tidak akan membuka hasil pekerjaan selain kepada pihak berwenang.</p>
            <p><strong>Asesi</strong> menyatakan setuju dengan penjelasan dan proses asesmen.</p>

            <div class="row mt-4">
                <div class="col-md-6 text-center">
                    <p><strong>Tanda Tangan Peserta</strong></p>
                    <img src="{{ $asesi->tanda_tangan ?? '/images/placeholder-sign.png' }}" height="80">
                    <p>Tgl: {{ now()->format('Y-m-d') }}</p>
                </div>
                <div class="col-md-6 text-center">
                    <p><strong>Tanda Tangan Asesor</strong></p>
                    <img src="{{ $asesor->tanda_tangan ?? '/images/placeholder-sign.png' }}" height="80">
                    <p>Tgl: {{ now()->format('Y-m-d') }}</p>
                </div>
            </div>

            <div class="text-end mt-4">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
