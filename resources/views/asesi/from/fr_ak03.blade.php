@extends('layouts.app')

@section('title', 'FR.AK.03 | Umpan Balik Peserta')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3 fw-bold">FR.AK.03 Umpan Balik Peserta</h5>

            <table class="table table-bordered mb-4">
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
                    <th>Nama Asesor</th>
                    <td>:</td>
                    <td>{{ $asesor->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Nama Peserta</th>
                    <td>:</td>
                    <td>{{ $asesi->nama ?? '-' }}</td>
                    <th>Tanggal</th>
                    <td>:</td>
                    <td>{{ now()->format('Y-m-d') }}</td>
                </tr>
            </table>

            <p><strong>Peserta diminta untuk:</strong> Memberikan umpan balik setelah asesmen dilakukan.</p>

            <table class="table table-bordered align-middle">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Komponen</th>
                        <th colspan="2">Hasil</th>
                        <th>Catatan/Komentar Asesi</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Ya</th>
                        <th>Tidak</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(range(1,10) as $i)
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td>Komponen penilaian ke-{{ $i }}</td>
                        <td class="text-center"><input type="checkbox" name="hasil[{{ $i }}]" value="ya"></td>
                        <td class="text-center"><input type="checkbox" name="hasil[{{ $i }}]" value="tidak"></td>
                        <td><textarea class="form-control" name="catatan[{{ $i }}]" rows="1"></textarea></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mb-3">
                <label>Catatan Lainnya:</label>
                <textarea class="form-control" name="catatan_lainnya" rows="3"></textarea>
            </div>

            <div class="text-end">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
