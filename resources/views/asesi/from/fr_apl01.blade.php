@extends('layouts.app')

@section('title', 'FR.APL-01 | Formulir Permohonan Sertifikasi Kompetensi')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="mb-4">
        <h5 class="fw-bold">FR-APL-01 FORMULIR PERMOHONAN SERTIFIKASI KOMPETENSI</h5>
        <p class="text-muted">Form ini digunakan untuk pendaftaran Awal peserta</p>
    </div>

    {{-- FORM --}}
    <form action="{{ route('asesi.apl01.store', $asesmen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- DATA PRIBADI & PEKERJAAN --}}
        <div class="row">
            {{-- Data Pribadi --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Data Pribadi</div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" 
                                value="{{ $biodata->nama_lengkap ?? $user->name }}">
                        </div>
                        <div class="mb-2">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ $user->email ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>No. HP/Telp</label>
                            <input type="text" name="no_hp" class="form-control"
                                value="{{ $biodata->no_hp ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki-Laki" {{ ($biodata->jenis_kelamin ?? '')=='Laki-Laki'?'selected':'' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ ($biodata->jenis_kelamin ?? '')=='Perempuan'?'selected':'' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Kewarganegaraan</label>
                            <select name="kewarganegaraan" class="form-control">
                                <option value="WNI" selected>WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>No. Identitas</label>
                            <input type="text" name="no_identitas" class="form-control"
                                value="{{ $biodata->nik ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                value="{{ $biodata->tempat_lahir ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ $biodata->tanggal_lahir ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Organisasi</label>
                            <input type="text" name="organisasi" class="form-control"
                                value="{{ $biodata->organisasi ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="2">{{ $biodata->alamat ?? '' }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Provinsi</label>
                                <input type="text" name="provinsi" class="form-control"
                                    value="{{ $biodata->provinsi ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label>Kabupaten</label>
                                <input type="text" name="kabupaten" class="form-control"
                                    value="{{ $biodata->kabupaten ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Pendidikan & Pekerjaan --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Data Pendidikan & Pekerjaan</div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label>Pendidikan</label>
                            <select name="pendidikan" class="form-control">
                                <option value="SMA" {{ ($biodata->pendidikan ?? '')=='SMA'?'selected':'' }}>SMA</option>
                                <option value="D3" {{ ($biodata->pendidikan ?? '')=='D3'?'selected':'' }}>D3</option>
                                <option value="S1" {{ ($biodata->pendidikan ?? '')=='S1'?'selected':'' }}>S1</option>
                                <option value="S2" {{ ($biodata->pendidikan ?? '')=='S2'?'selected':'' }}>S2</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Nama Perguruan Tinggi</label>
                            <input type="text" name="perguruan_tinggi" class="form-control"
                                value="{{ $biodata->perguruan_tinggi ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Nama Program Studi</label>
                            <input type="text" name="program_studi" class="form-control"
                                value="{{ $biodata->program_studi ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                value="{{ $biodata->pekerjaan ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" class="form-control"
                                value="{{ $biodata->nama_perusahaan ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <label>Alamat Perusahaan</label>
                            <textarea name="alamat_perusahaan" class="form-control" rows="2">{{ $biodata->alamat_perusahaan ?? '' }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>No. Telp Perusahaan</label>
                                <input type="text" name="no_telp_perusahaan" class="form-control"
                                    value="{{ $biodata->no_telp_perusahaan ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label>Email Perusahaan</label>
                                <input type="email" name="email_perusahaan" class="form-control"
                                    value="{{ $biodata->email_perusahaan ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SKEMA SERTIFIKASI --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <p class="mb-3">
                    Tuliskan Judul dan Nomor Skema Sertifikasi. Tujuan Asesmen sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja anda.
                </p>
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 30%">Skema Sertifikasi</td>
                        <td><input type="text" name="skema" class="form-control" value="{{ $asesmen->skema ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td><input type="text" name="judul_skema" class="form-control" value="{{ $asesmen->judul ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        <td><input type="text" name="nomor_skema" class="form-control" value="{{ $asesmen->nomor_skema ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Tujuan Asesmen</td>
                        <td>
                            <label class="me-3"><input type="radio" name="tujuan" value="Sertifikasi Baru" checked> Sertifikasi Baru</label>
                            <label><input type="radio" name="tujuan" value="Sertifikasi Ulang"> Sertifikasi Ulang</label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- DOKUMEN DASAR --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header fw-bold">Data Dokumen Dasar</div>
            <div class="card-body">
                <p><b>Petunjuk:</b></p>
                <ul>
                    <li>Upload dokumen yang relevan</li>
                    <li>Scan ijazah, sertifikat, pengalaman kerja dll yang mendukung kompetensi</li>
                </ul>

                <div class="mb-3">
                    <label>Foto 3x4</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="mb-3">
                    <label>KTP/SIM/Paspor</label>
                    <input type="file" name="ktp" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Ijazah Terakhir</label>
                    <input type="file" name="ijazah" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Sertifikat Pelatihan</label>
                    <input type="file" name="sertifikat" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Surat Pengalaman / CV</label>
                    <input type="file" name="cv" class="form-control">
                </div>
            </div>
        </div>

        {{-- NOTE ADMIN LSP --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h6 class="fw-bold">Note **(diisi oleh Admin LSP)</h6>
                <div class="mb-3">
                    <label>Rekomendasi</label>
                    <select class="form-control" disabled>
                        <option selected>DITERIMA</option>
                    </select>
                </div>
                <p>Berdasarkan ketentuan persyaratan dasar pemohon maka pemohon:</p>
                <p><span class="badge bg-success">DITERIMA</span> sebagai peserta sertifikasi</p>

                <div class="mb-3">
                    <label>Catatan</label>
                    <textarea class="form-control" rows="2" readonly>Lanjut Pra Asesmen</textarea>
                </div>
            </div>
        </div>

        {{-- TOMBOL --}}
        <div class="text-end">
            <button type="submit" class="btn btn-primary">💾 Simpan</button>
            <button type="button" onclick="window.print()" class="btn btn-success">🖨 Cetak</button>
        </div>
    </form>
</div>
@endsection
