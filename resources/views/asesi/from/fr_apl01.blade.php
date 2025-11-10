@extends('layouts.app')

@section('title', 'FR.APL-01 | Formulir Permohonan Sertifikasi Kompetensi')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">

             {{-- Judul Utama --}}
            <div class="mb-3 pb-3 border-bottom border-2">
                <h5 class="fw-bold text-uppercase mb-1">
                    FR.APL-01 Formulir Permohonan Sertifikasi Kompetensi
                </h5>
            </div>

            {{-- Paragraf Pengantar --}}
            <p class="mb-4">
                Form ini digunakan untuk pendaftaran awal peserta sertifikasi.
            </p>

            {{-- FORM --}}
            <form action="{{ route('asesi.apl01.store', $asesmen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- DATA PRIBADI & PEKERJAAN --}}
                <div class="row">
                    {{-- Data Pribadi --}}
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-light fw-bold">Data Pribadi</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="{{ $biodata->user->name ?? '' }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $biodata->user->email ?? '' }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No. HP / Telp</label>
                                    <input type="text" class="form-control" name="no_hp" value="{{ $biodata->no_hp ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="Laki-Laki" {{ ($biodata->jenis_kelamin ?? '')=='Laki-Laki'?'selected':'' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ ($biodata->jenis_kelamin ?? '')=='Perempuan'?'selected':'' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kewarganegaraan</label>
                                    <select name="kewarganegaraan" class="form-select">
                                        <option value="WNI" selected>WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No. Identitas (KTP / SIM / Paspor)</label>
                                    <input type="text" class="form-control" name="no_identitas" value="{{ $biodata->no_identitas ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="{{ $biodata->tempat_lahir ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $biodata->tanggal_lahir ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Organisasi</label>
                                    <input type="text" class="form-control" name="organisasi" value="{{ $biodata->organisasi ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="2">{{ $biodata->alamat ?? '' }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi" value="{{ $biodata->provinsi ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kabupaten</label>
                                        <input type="text" class="form-control" name="kabupaten" value="{{ $biodata->kabupaten ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Data Pendidikan & Pekerjaan --}}
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-74">
                            <div class="card-header bg-light fw-bold">Data Pendidikan & Pekerjaan</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Pendidikan</label>
                                    <select name="pendidikan" class="form-select">
                                        <option value="SMA" {{ ($biodata->pendidikan ?? '')=='SMA'?'selected':'' }}>SMA</option>
                                        <option value="D3" {{ ($biodata->pendidikan ?? '')=='D3'?'selected':'' }}>D3</option>
                                        <option value="S1" {{ ($biodata->pendidikan ?? '')=='S1'?'selected':'' }}>S1</option>
                                        <option value="S2" {{ ($biodata->pendidikan ?? '')=='S2'?'selected':'' }}>S2</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Perguruan Tinggi</label>
                                    <input type="text" class="form-control" name="nama_perguruan_tinggi" value="{{ $biodata->nama_perguruan_tinggi ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Program Studi</label>
                                    <input type="text" class="form-control" name="program_studi" value="{{ $biodata->program_studi ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan" value="{{ $biodata->pekerjaan ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="nama_perusahaan" value="{{ $biodata->nama_perusahaan ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat Perusahaan</label>
                                    <textarea class="form-control" name="alamat_perusahaan" rows="2">{{ $biodata->alamat_perusahaan ?? '' }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. Telp Perusahaan</label>
                                        <input type="text" class="form-control" name="no_telp_perusahaan" value="{{ $biodata->no_telp_perusahaan ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Perusahaan</label>
                                        <input type="email" class="form-control" name="email_perusahaan" value="{{ $biodata->email_perusahaan ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
{{-- TUJUAN ASESMEN (DALAM TABEL SEPERTI GAMBAR) --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-light fw-bold">Skema Sertifikasi & Tujuan Asesmen</div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <tr>
                <th width="30%">Skema Sertifikasi</th>
                <td>
                    <input type="text" class="form-control" name="skema" 
                        value="{{ $asesmen->jadwal->skema->nama ?? '' }}" readonly>
                </td>
            </tr>
            <tr>
                <th>Nomor Skema</th>
                <td>
                    <input type="text" class="form-control" name="nomor_skema" 
                        value="{{ $asesmen->jadwal->skema->kode ?? '' }}" readonly>
                </td>
            </tr>

            {{-- Tambahan: Jenis Skema (KKNI / Klaster / Okupasi) --}}
            <tr>
                <th>Jenis Skema</th>
                <td>
                    <div class="d-flex flex-wrap">
                        <label class="me-3">
                            <input type="radio" name="jenis_skema" value="KKNI"
                                {{ old('jenis_skema', $asesmen->jadwal->skema->jenis ?? '') == 'KKNI' ? 'checked' : '' }}>
                            KKNI
                        </label>
                        <label class="me-3">
                            <input type="radio" name="jenis_skema" value="Klaster"
                                {{ old('jenis_skema', $asesmen->jadwal->skema->jenis ?? '') == 'Klaster' ? 'checked' : '' }}>
                            Klaster
                        </label>
                        <label>
                            <input type="radio" name="jenis_skema" value="Okupasi"
                                {{ old('jenis_skema', $asesmen->jadwal->skema->jenis ?? '') == 'Okupasi' ? 'checked' : '' }}>
                            Okupasi
                        </label>
                    </div>
                </td>
            </tr>

            <tr>
                <th>Tujuan Asesmen</th>
                <td>
                    <div class="d-flex flex-wrap">
                        <label class="me-3">
                            <input type="radio" name="tujuan_asesmen" value="Sertifikasi Baru"
                                {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Sertifikasi Baru' ? 'checked' : '' }}>
                            Sertifikasi Baru
                        </label>
                        <label class="me-3">
                            <input type="radio" name="tujuan_asesmen" value="Pengakuan Kompetensi Terkini (PKT)"
                                {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Pengakuan Kompetensi Terkini (PKT)' ? 'checked' : '' }}>
                            Pengakuan Kompetensi Terkini (PKT)
                        </label>
                        <label class="me-3">
                            <input type="radio" name="tujuan_asesmen" value="Rekognisi Pembelajaran Lampau (RPL)"
                                {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Rekognisi Pembelajaran Lampau (RPL)' ? 'checked' : '' }}>
                            Rekognisi Pembelajaran Lampau (RPL)
                        </label>
                        <label>
                            <input type="radio" name="tujuan_asesmen" value="Lainnya"
                                {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Lainnya' ? 'checked' : '' }}>
                            Lainnya
                        </label>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>


               {{-- DOKUMEN DASAR --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-light fw-bold">Data Dokumen Dasar</div>
    <div class="card-body">
        <ul class="mb-3">
            <li>Upload dokumen pendukung seperti foto, KTP, ijazah, sertifikat, dan CV.</li>
            <li>Pastikan file jelas dan format PDF/JPG/PNG.</li>
        </ul>

        <div class="row">
            {{-- Foto --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold">Foto 3x4</label>
                <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style:dashed !important;">
                    @if(!empty($dokumen->foto))
                        <img src="{{ asset('storage/'.$dokumen->foto) }}" alt="Foto" class="img-fluid mb-2" style="max-height:80px;">
                        <p><a href="{{ asset('storage/'.$dokumen->foto) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Foto</a></p>
                    @else
                        <p class="text-muted">Belum ada file</p>
                    @endif
                    <input type="file" name="foto" class="form-control mt-2">
                </div>
            </div>

            {{-- KTP/SIM/Paspor --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold">Identitas Pribadi (KTP/SIM/Passport)</label>
                <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style:dashed !important;">
                    @if(!empty($dokumen->ktp_sim_paspor))
                        <img src="{{ asset('storage/'.$dokumen->ktp_sim_paspor) }}" alt="KTP" class="img-fluid mb-2" style="max-height:80px;">
                        <p><a href="{{ asset('storage/'.$dokumen->ktp_sim_paspor) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat KTP</a></p>
                    @else
                        <p class="text-muted">Belum ada file</p>
                    @endif
                    <input type="file" name="ktp_sim_paspor" class="form-control mt-2">
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Ijazah --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold">Ijazah Terakhir</label>
                <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style:dashed !important;">
                    @if(!empty($dokumen->ijazah))
                        <span class="text-success">✔ File berhasil diunggah</span><br>
                        <a href="{{ asset('storage/'.$dokumen->ijazah) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Lihat Ijazah</a>
                    @else
                        <p class="text-muted">Belum ada file</p>
                    @endif
                    <input type="file" name="ijazah" class="form-control mt-2">
                </div>
            </div>

            {{-- CV --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold">CV (Daftar Riwayat Hidup)</label>
                <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style:dashed !important;">
                    @if(!empty($dokumen->cv))
                        <span class="text-success">✔ File berhasil diunggah</span><br>
                        <a href="{{ asset('storage/'.$dokumen->cv) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Lihat CV</a>
                    @else
                        <p class="text-muted">Belum ada file</p>
                    @endif
                    <input type="file" name="cv" class="form-control mt-2">
                </div>
            </div>
        </div>

        {{-- Sertifikat --}}
        <div class="col-md-6 mb-3">
            <label class="fw-bold">Sertifikat Pelatihan</label>
            <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style:dashed !important;">
                @if(!empty($dokumen->sertifikat))
                    <span class="text-success">✔ File berhasil diunggah</span><br>
                    <a href="{{ asset('storage/'.$dokumen->sertifikat) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Lihat Sertifikat</a>
                @else
                    <p class="text-muted">Belum ada file</p>
                @endif
                <input type="file" name="sertifikat" class="form-control mt-2">
            </div>
        </div>
    </div>
</div>


             {{-- BAGIAN REKOMENDASI DAN TANDA TANGAN --}}
<div class="mt-4">
    <p><strong>Note ***) diisi oleh Admin LSP</strong></p>

    <table class="table table-bordered align-middle">
        <tr class="table-light">
            <th colspan="2" width="60%">Rekomendasi</th>
            <th width="40%">Pemohon **)</th>
        </tr>

        {{-- Baris Rekomendasi dan Pemohon --}}
        <tr>
            <td colspan="2">
                <p class="mb-3">
                    Berdasarkan Ketentuan Persyaratan dasar pemohon maka pemohon:
                </p>

                <button type="button" class="btn btn-primary btn-sm">N/A</button>
                <span class="ms-2">sebagai peserta sertifikasi</span>
            </td>

            {{-- Kolom Pemohon --}}
             <td>
                <table class="table table-bordered mb-0">
                    <tr>
                        <th width="40%">Nama</th>
                        <td>{{ $asesmen->biodata->user->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanda Tangan</th>
                        <td>
                            @if(!empty($asesmen->dokumen->tanda_tangan))
                                <img src="{{ asset('storage/' . $asesmen->dokumen->tanda_tangan) }}" alt="Tanda tangan Admin" height="70">
                            @else
                                <span class="badge bg-danger">Belum Tanda Tangan</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Baris Catatan dan Admin LSP --}}
        <tr>
            <td colspan="2">
                <label class="fw-bold mb-2">Catatan</label>
                <textarea class="form-control" name="catatan" rows="3"></textarea>
            </td>

            {{-- Kolom Admin LSP --}}
            <td>
                <h6 class="fw-bold mb-2">Admin LSP ***)</h6>
                <table class="table table-bordered mb-0">
                    <tr>
                        <th width="40%">Nama</th>
                        <td>{{ $asesmen->admin->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Admin</th>
                        <td>{{ $asesmen->admin->jabatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>No. Reg MET/NIK</th>
                        <td>{{ $asesmen->admin->no_reg ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>


                {{-- TOMBOL --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4"><i class="fa fa-save me-1"></i> Simpan</button>
                    <button type="button" onclick="window.print()" class="btn btn-success px-4"><i class="fa fa-print me-1"></i> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
