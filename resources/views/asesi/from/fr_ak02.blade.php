@extends('layouts.app')

@section('title', 'FR.AK.02 | Rekaman Asesmen Kompetensi')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            {{-- Judul Utama --}}
            <div class="mb-3 pb-3 border-bottom border-2">
                <h5 class="fw-bold text-uppercase mb-1">
                    FR.AK.02. REKAMAN ASESMEN KOMPETENSI
                </h5>
            </div>

            {{-- Informasi Umum --}}
            <div class="table-responsive mb-3">
                <table class="table table-bordered align-middle">
                    <tbody>
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
                        <tr>
                            <th>Nama Asesor</th>
                            <td>{{ $asesmen->asesor->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Asesi</th>
                            <td colspan="4">: {{ $asesmen->biodata->user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Asesmen</th>
                            <td>
                                Mulai: {{ $asesmen->tanggal_mulai ?? '-' }} <br>
                                Selesai: {{ $asesmen->tanggal_selesai ?? '-' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Petunjuk --}}
            <p class="fw-semibold">Beri tanda centang (✔) di kolom yang sesuai untuk mencerminkan bukti yang sesuai untuk setiap Unit Kompetensi.</p>

            {{-- Tabel Unit Kompetensi --}}
            <div class="table-responsive mb-4">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="2" class="align-middle">Unit Kompetensi</th>
                            <th colspan="8">Jenis Bukti</th>
                        </tr>
                        <tr>
                            <th>Observasi</th>
                            <th>Portofolio</th>
                            <th>Wawancara</th>
                            <th>Pertanyaan Lisan</th>
                            <th>Pertanyaan Tertulis</th>
                            <th>Tes Praktik</th>
                            <th>Proyek Kerja</th>
                            <th>Lainnya</th>
                        </tr>
                    </thead>
                   <tbody>
                        @forelse($asesmen->units as $unit)
                            <tr>
                                <td class="text-start">{{ $unit->nama_unit ?? '-' }}</td>
                                <td><input type="checkbox" disabled {{ $unit->pivot->observasi ? 'checked' : '' }}></td>
                                <td><input type="checkbox" disabled {{ $unit->pivot->portofolio ? 'checked' : '' }}></td>
                                <td><input type="checkbox" disabled {{ $unit->pivot->wawancara ? 'checked' : '' }}></td>
                                <td><input type="checkbox" disabled {{ $unit->pivot->pertanyaan_lisan ? 'checked' : '' }}></td>
                                <td><input type="checkbox" disabled {{ $unit->pivot->pertanyaan_tertulis ? 'checked' : '' }}></td>
                                <td><input type="checkbox" disabled {{ $unit->pivot->tes_praktik ? 'checked' : '' }}></td>
                                <td><input type="checkbox" disabled {{ $unit->pivot->projek_kerja ? 'checked' : '' }}></td>
                                <td><input type="checkbox" disabled {{ $unit->pivot->lainnya ? 'checked' : '' }}></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Belum ada unit kompetensi terdaftar</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Rekomendasi dan Komentar --}}
            <div class="table-responsive mb-4">
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th width="40%">Rekomendasi Hasil Asesmen</th>
                            <td>
                                <label class="me-4">
                                    <input type="checkbox" {{ $asesmen->hasil == 'Kompeten' ? 'checked' : '' }}> Kompeten
                                </label>
                                <label>
                                    <input type="checkbox" {{ $asesmen->hasil == 'Belum Kompeten' ? 'checked' : '' }}> Belum Kompeten
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>Tindak Lanjut yang Dibutuhkan</th>
                            <td>{{ $asesmen->tindak_lanjut ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Komentar / Observasi oleh Asesor</th>
                            <td>{{ $asesmen->komentar ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Tanda Tangan Asesi & Asesor --}}
            <div class="row mt-5">
                <div class="col-md-6">
                    <h6 class="fw-bold mb-2">Asesi</h6>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama</th>
                            <td colspan="4">: {{ $asesmen->biodata->user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanda Tangan & Tanggal</th>
                            <td>
                                @if($asesmen->dokumen)
                                    <img src="{{ asset('storage/' . ($asesmen->dokumen->tanda_tangan ?? 'placeholder-sign.png')) }}" alt="Tanda Tangan Asesi" height="55">
                                    <p class="text-muted mt-2">Tgl: {{ now()->format('Y-m-d') }}</p>
                                @else
                                    <span class="text-danger">Belum Tanda Tangan</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <h6 class="fw-bold mb-2">Asesor</h6>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama</th>
                            <td>{{ $asesmen->asesor->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>No. Reg</th>
                            <td>{{ $asesmen->asesor->no_reg ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanda Tangan & Tanggal</th>
                            <td>
                                @if($asesmen->ttd_asesor)
                                    <img src="{{ asset('storage/' .$asesmen->ttd_asesor) }}" alt="Tanda tangan Asesor" height="70">
                                @else
                                    <span class="badge bg-danger">Belum Tanda Tangan</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Lampiran --}}
            <div class="mt-4">
                <p><strong>Lampiran Dokumen:</strong></p>
                <ol class="mb-3">
                    <li>Dokumen APL-01 Peserta</li>
                    <li>Dokumen APL-02 Peserta</li>
                    <li>Bukti-bukti Pelaksanaan Peserta</li>
                    <li>Tinjauan Proses Asesmen</li>
                </ol>
            </div>

            {{-- Tombol Simpan --}}
            <div class="text-end mt-4">
                <button class="btn btn-success px-4"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
