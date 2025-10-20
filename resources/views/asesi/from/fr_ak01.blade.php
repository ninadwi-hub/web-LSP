@extends('layouts.app')

@section('title', 'FR.AK.01 | Formulir Persetujuan Asesmen dan Kerahasiaan')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            {{-- Judul Utama --}}
            <div class="mb-3 pb-3 border-bottom border-2">
                <h5 class="fw-bold text-uppercase mb-1">
                    FR-AK-01 FORMULIR PERSETUJUAN ASESMEN DAN KERAHASIAAN
                </h5>
            </div>

            {{-- Paragraf Pengantar --}}
            <p class="mb-4">
                Persetujuan Asesmen ini untuk menjamin bahwa <strong>Peserta</strong> telah diberi arahan secara rinci 
                tentang perencanaan dan proses asesmen.
            </p>

            {{-- Informasi Asesmen --}}
            <div class="table-responsive mb-2">
                <table class="table table-bordered align-middle">
                    <tbody>
                        {{-- Skema --}}
                        <tr>
                            <th class="w-25 align-middle">Skema Sertifikasi Klaster/Asesmen</th>
                            <td class="w-75" colspan="4" style="padding: 8px 12px;">
                                <div class="row align-items-center mb-2">
                                    <label class="col-sm-2 col-form-label fw-bold">Judul</label>
                                    <div class="col-sm-10">: {{ $asesmen->jadwal->skema->judul_skema ?? '-' }}</div>
                                </div>
                                <hr class="my-1 border-dark">
                                <div class="row align-items-center">
                                    <label class="col-sm-2 col-form-label fw-bold">Nomor</label>
                                    <div class="col-sm-10">: {{ $asesmen->jadwal->skema->nomor_skema ?? '-' }}</div>
                                </div>
                            </td>
                        </tr>

                        {{-- TUK --}}
                        <tr>
                            <th>TUK</th>
                            <td colspan="4">
                                :
                                <div class="form-check form-check-inline ms-2">
                                    <input type="radio" name="tuk" id="sewaktu" class="form-check-input" {{ $asesmen->tuk == 'Sewaktu' ? 'checked' : '' }}>
                                    <label for="sewaktu" class="form-check-label">Sewaktu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="tuk" id="tempatKerja" class="form-check-input" {{ $asesmen->tuk == 'Tempat Kerja' ? 'checked' : '' }}>
                                    <label for="tempatKerja" class="form-check-label">Tempat Kerja</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="tuk" id="mandiri" class="form-check-input" {{ $asesmen->tuk == 'Mandiri' ? 'checked' : '' }}>
                                    <label for="mandiri" class="form-check-label">Mandiri</label>
                                </div>
                            </td>
                        </tr>

                        {{-- Nama Asesor & Asesi --}}
                        <tr>
                            <th>Nama Asesor</th>
                            <td colspan="4">: {{ $asesmen->jadwal->asesor->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Peserta</th>
                            <td colspan="4">: {{ $asesmen->biodata->user->name ?? '-' }}</td>
                        </tr>

                        {{-- Bukti yang dikumpulkan --}}
                        <tr>
                            <th>Bukti yang dikumpulkan</th>
                            <td colspan="4">
                                <div class="row ms-1">
                                    <div class="col-md-6"><label><input type="checkbox"> TL: Verifikasi Portofolio</label></div>
                                    <div class="col-md-6"><label><input type="checkbox"> L: Observasi Langsung</label></div>
                                    <div class="col-md-6"><label><input type="checkbox"> T: Daftar Pertanyaan Tulis</label></div>
                                    <div class="col-md-6"><label><input type="checkbox"> T: Daftar Pertanyaan Lisan</label></div>
                                    <div class="col-md-6"><label><input type="checkbox"> T: Daftar Pertanyaan Wawancara</label></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Pelaksanaan Asesmen --}}
            <div class="mb-4">
                <h6 class="fw-bold mb-3">Pelaksanaan Asesmen yang Disepakati</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Hari / Tanggal</label>
                        <input type="text" class="form-control" value="{{ $asesmen->jadwal->tanggal_asesmen ?? '-' }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tempat Uji Kompetensi (TUK)</label>
                        <input type="text" class="form-control" value="{{ $asesmen->tuk ?? '-' }}" readonly>
                    </div>
                </div>
            </div>

            {{-- Pernyataan --}}
            <div class="mb-4">
                <p><strong>Asesor</strong> menyatakan telah menjelaskan hak dan prosedur banding oleh asesi.</p>
                <p><strong>Asesor</strong> menyatakan tidak akan membuka hasil pekerjaan selain kepada pihak berwenang.</p>
                <p><strong>Asesi</strong> menyatakan setuju dengan penjelasan dan proses asesmen.</p>
            </div>

            {{-- Tanda Tangan --}}
            <div class="row text-center mt-5">
                <div class="col-md-6">
                    <p class="fw-bold">Tanda Tangan Asesi</p>
                    <img src="{{ asset('storage/' . ($asesmen->dokumen->tanda_tangan ?? 'placeholder-sign.png')) }}" alt="Tanda Tangan Asesi" height="80">
                    <p class="text-muted mt-2">Tgl: {{ now()->format('Y-m-d') }}</p>
                    <p class="fw-semibold">{{ $asesmen->biodata->nama_lengkap ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p class="fw-bold">Tanda Tangan Asesor</p>
                    <img src="{{ asset('storage/' . ($asesmen->jadwal->asesor->tanda_tangan ?? 'placeholder-sign.png')) }}" alt="Tanda Tangan Asesor" height="80">
                    <p class="text-muted mt-2">Tgl: {{ now()->format('Y-m-d') }}</p>
                    <p class="fw-semibold">{{ $asesmen->jadwal->asesor->nama ?? '-' }}</p>
                </div>
            </div>

            <div class="text-end mt-4">
                <button class="btn btn-success px-4"><i class="fa fa-save"></i> Simpan</button>
            </div>

        </div>
    </div>
</div>
@endsection
