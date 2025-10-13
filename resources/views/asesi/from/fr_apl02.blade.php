@extends('layouts.app')

@section('title', 'FR.APL.02 | Asesmen Mandiri')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="mb-4">
        <h5 class="fw-bold">FR.APL.02 ASESMEN MANDIRI</h5>
    </div>

    {{-- DATA SKEMA --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <table class="table table-borderless align-middle mb-0">
                <tbody>
                    <tr>
                        <td style="width:30%">Skema Sertifikasi / Klaster Asesmen</td>
                        <td style="width:5%">:</td>
                        <td>{{ $asesmen->skema->nama_skema ?? '-' }}</td>
                        <td style="width:10%">Judul</td>
                        <td style="width:5%">:</td>
                        <td>{{ $asesmen->judul_skema ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        <td>:</td>
                        <td>{{ $asesmen->nomor_skema ?? '-' }}</td>
                        <td>TUK</td>
                        <td>:</td>
                        <td>{{ $asesmen->tuk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Nama Asesor</td>
                        <td>:</td>
                        <td>{{ $asesmen->asesor->name ?? '-' }}</td>
                        <td>Nama Peserta</td>
                        <td>:</td>
                        <td>{{ $asesmen->user->name ?? auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($asesmen->created_at)->format('d-m-Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- PETUNJUK --}}
    <div class="alert alert-light border mb-4">
        <p class="mb-1">Peserta diminta untuk:</p>
        <ul class="mb-0">
            <li>Memperhatikan Kriteria Unjuk Kerja (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek kritis seluruh Unit Kompetensi yang diminta untuk di Ases.</li>
            <li>Melaksanakan Penilaian Mandiri secara obyektif atas setiap pertanyaan yang diajukan.</li>
            <li>Apabila Anda menilai diri sudah kompeten atas pertanyaan, tuliskan tanda <strong>√</strong> pada kolom “K” dan bila belum maka beri tanda <strong>√</strong> pada kolom “BK”.</li>
            <li>Mengisi bukti-bukti pendukung yang relevan atas sejumlah pertanyaan yang dinyatakan kompeten bila ada.</li>
            <li>Menandatangani form Asesmen Mandiri.</li>
        </ul>
    </div>

    {{-- NOTE ASESSOR --}}
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h6 class="fw-bold mb-3">Note **(Diisi oleh Asesor)**</h6>
            <form action="{{ route('asesi.apl02.store', $asesmen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <td style="width:35%">
                                <strong>Rekomendasi:</strong><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rekomendasi" value="Dilanjutkan" id="r1">
                                    <label for="r1" class="form-check-label">Asesmen Dilanjutkan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rekomendasi" value="Tidak Dilanjutkan" id="r2">
                                    <label for="r2" class="form-check-label">Tidak Dilanjutkan</label>
                                </div>
                                <hr>
                                <div class="form-check">
                                    <label><strong>Proses Asesmen dilanjutkan melalui jalur:</strong></label><br>
                                    <input class="form-check-input" type="checkbox" name="jalur[]" value="Uji Kompetensi" id="j1">
                                    <label for="j1" class="form-check-label">Uji Kompetensi</label>
                                    <input class="form-check-input ms-3" type="checkbox" name="jalur[]" value="Asesmen Portofolio" id="j2">
                                    <label for="j2" class="form-check-label">Asesmen Portofolio</label>
                                </div>
                            </td>
                            <td style="width:35%">
                                <strong>Catatan:</strong><br>
                                <textarea name="catatan" class="form-control" rows="5" placeholder="Tuliskan catatan asesor..."></textarea>
                            </td>
                            <td>
                                <strong>Pemohon **)</strong><br>
                                <p class="mb-0 mt-2"><strong>Nama:</strong> {{ $asesmen->user->name ?? auth()->user()->name }}</p>
                                <p class="mb-0">TTD:</p>
                                @if($asesmen->user->dokumenAsesi->tanda_tangan ?? false)
                                    <img src="{{ asset('storage/'.$asesmen->user->dokumenAsesi->tanda_tangan) }}" alt="Tanda Tangan Asesi" style="max-width:120px;">
                                @else
                                    <em>Belum tanda tangan</em>
                                @endif
                                <p class="mb-0">Tgl: {{ now()->format('d-m-Y') }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong>Admin LSP / Asesor **)</strong><br>
                                <p class="mb-0 mt-2">Nama: {{ $asesmen->asesor->name ?? '-' }}</p>
                                <p class="mb-0">TTD:</p>
                                @if($asesmen->asesor && $asesmen->asesor->dokumenAsesi->tanda_tangan ?? false)
                                    <img src="{{ asset('storage/'.$asesmen->asesor->dokumenAsesi->tanda_tangan) }}" alt="Tanda Tangan Asesor" style="max-width:120px;">
                                @else
                                    <em>Belum tanda tangan</em>
                                @endif
                                <p class="mb-0">Tgl: {{ now()->format('d-m-Y') }}</p>
                                <p class="mb-0">No. Registrasi: {{ $asesmen->asesor->no_reg ?? 'MET.000.xxx/xx/2025' }}</p>
                            </td>
                            <td class="text-center align-middle">
                                <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

</div>
@endsection
