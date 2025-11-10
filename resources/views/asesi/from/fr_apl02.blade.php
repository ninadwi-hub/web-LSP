@extends('layouts.app')

@section('title', 'FR.APL.02 | Asesmen Mandiri')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            {{-- HEADER --}}
            <div class="mb-3 pb-3 border-bottom border-2">
                <h5 class="fw-bold text-uppercase mb-1">
                    FR.APL.02. ASESMEN MANDIRI
                </h5>
            </div>

            {{-- INFORMASI SKEMA --}}
            <div class="table-responsive mb-4">
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th width="30%">Skema Sertifikasi</th>
                            <td colspan="2">
                                <div class="row mb-1">
                                    <label class="col-sm-2 fw-bold">Judul</label>
                                    <div class="col-sm-10">: {{ $asesmen->jadwal->skema->nama ?? '-' }}</div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 fw-bold">Nomor</label>
                                    <div class="col-sm-10">: {{ $asesmen->jadwal->skema->kode ?? '-' }}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>TUK</th>
                            <td colspan="2">
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
                            <td colspan="2">: {{ $asesor->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Peserta</th>
                            <td colspan="2">: {{ $asesmen->biodata->user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td colspan="2">: {{ now()->format('d-m-Y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- PETUNJUK --}}
            <div class="alert alert-light border mb-4">
                <p class="mb-1">Peserta diminta untuk:</p>
                <ul class="mb-0">
                    <li>Memperhatikan Kriteria Unjuk Kerja (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek kritis seluruh Unit Kompetensi yang diminta untuk di Ases.</li>
                    <li>Melaksanakan Penilaian Mandiri secara obyektif atas setiap pertanyaan yang diajukan.</li>
                    <li>Apabila Anda menilai diri sudah kompeten atas pertanyaan, tuliskan tanda <strong>✔</strong> pada kolom “K” dan bila belum maka beri tanda <strong>✔</strong> pada kolom “BK”.</li>
                    <li>Mengisi bukti-bukti pendukung yang relevan atas sejumlah pertanyaan yang dinyatakan kompeten bila ada.</li>
                    <li>Menandatangani form Asesmen Mandiri.</li>
                </ul>
            </div>

            {{-- FORM PENILAIAN --}}
            <form action="{{ route('asesi.apl02.store', $asesmen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive mb-4">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th width="40%">Rekomendasi</th>
                                <th>Catatan</th>
                                <th width="25%">Tanda Tangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- Rekomendasi --}}
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rekomendasi" value="Dilanjutkan" id="r1">
                                        <label for="r1" class="form-check-label">Asesmen Dilanjutkan</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rekomendasi" value="Tidak Dilanjutkan" id="r2">
                                        <label for="r2" class="form-check-label">Tidak Dilanjutkan</label>
                                    </div>
                                    <hr>
                                    <label class="fw-bold d-block mb-2">Proses Asesmen dilanjutkan melalui jalur:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="jalur[]" value="Uji Kompetensi" id="j1">
                                        <label for="j1" class="form-check-label">Uji Kompetensi</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="jalur[]" value="Asesmen Portofolio" id="j2">
                                        <label for="j2" class="form-check-label">Asesmen Portofolio</label>
                                    </div>
                                </td>

                                {{-- Catatan --}}
                                <td>
                                    <textarea name="catatan" class="form-control" rows="7" placeholder="Tuliskan catatan asesor..."></textarea>
                                </td>

                                {{-- Tanda tangan --}}
                                <td class="text-center">
                                    <p><strong>Nama:</strong> {{ $asesmen->user->name ?? auth()->user()->name }}</p>
                                    <p><strong>TTD:</strong></p>
                                    @if($asesmen->user->dokumenAsesi->tanda_tangan ?? false)
                                        <img src="{{ asset('storage/'.$asesmen->user->dokumenAsesi->tanda_tangan) }}" alt="Tanda Tangan Asesi" style="max-width:120px;">
                                    @else
                                        <em>Belum tanda tangan</em>
                                    @endif
                                    <p class="mt-2"><strong>Tgl:</strong> {{ now()->format('d-m-Y') }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- ASESSOR --}}
                <div class="table-responsive mb-4">
                    <table class="table table-bordered align-middle">
                        <tbody>
                            <tr>
                                <th width="35%">Admin LSP / Asesor</th>
                                <td>
                                    <p class="mb-1"><strong>Nama:</strong> {{ $asesmen->asesor->name ?? '-' }}</p>
                                    <p class="mb-1"><strong>TTD:</strong></p>
                                    @if($asesmen->asesor && $asesmen->asesor->dokumenAsesi->tanda_tangan ?? false)
                                        <img src="{{ asset('storage/'.$asesmen->asesor->dokumenAsesi->tanda_tangan) }}" alt="Tanda Tangan Asesor" style="max-width:120px;">
                                    @else
                                        <em>Belum tanda tangan</em>
                                    @endif
                                    <p class="mb-1"><strong>Tgl:</strong> {{ now()->format('d-m-Y') }}</p>
                                    <p><strong>No. Registrasi:</strong> {{ $asesmen->asesor->no_reg ?? 'MET.000.xxx/xx/2025' }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
