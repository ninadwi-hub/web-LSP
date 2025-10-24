@extends('layouts.app')

@section('title', 'FR.AK.03 | Umpan Balik Peserta')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            
            {{-- Judul Utama --}}
            <div class=" mb-3 pb-3 border-bottom border-2">
                <h5 class="fw-bold text-uppercase mb-1">
                    FR.AK.03. UMPAN BALIK PESERTA
                </h5>
            </div>
            {{-- Informasi Asesmen --}}
        <div class="table-responsive mb-2">
            <table class="table table-bordered align-middle">
                <tbody>
                    {{-- Skema, Judul, Nomor --}}
                   <tr>
                            <th>Skema Sertifikasi Klaster/Asesmen</th>
                                <td class="w-75" colspan="2" style="padding: 4px 10px;">
                                <div class="row align-items-center">
                                    <label class="col-sm-2 col-form-label fw-bold">Judul</label>
                                    <div class="col-sm-10">: {{ $asesmen->jadwal->skema->nama ?? '-' }}</div>
                                </div>
                        
                                <div class="row align-items-center">
                                    <label class="col-sm-2 col-form-label fw-bold">Nomor</label>
                                    <div class="col-sm-10">: {{ $asesmen->jadwal->skema->kode ?? '-' }}</div>
                                </div>
                            </td>
                        </tr>

                    {{-- TUK --}}
                    <tr>
                        <th>TUK</th>
                        <td colspan="4">
                            :
                            <div class="form-check form-check-inline ms-2">
                                <input type="radio" name="tempat" id="sewaktu" class="form-check-input">
                                <label for="sewaktu" class="form-check-label">Sewaktu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="tempat" id="tempatKerja" class="form-check-input">
                                <label for="tempatKerja" class="form-check-label">Tempat Kerja</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="tempat" id="mandiri" class="form-check-input">
                                <label for="mandiri" class="form-check-label">Mandiri</label>
                            </div>
                        </td>
                    </tr>

                    {{-- Nama Asesor & Peserta --}}
                    <tr>
                        <th>Nama Asesor</th>
                        <td colspan="4">: {{ $asesor->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Nama Peserta</th>
                            <td colspan="4">: {{ $asesmen->biodata->user->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td colspan="4">: {{ $asesi->nama ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

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

             <div class="text-end mt-4">
                <button class="btn btn-success px-4"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
