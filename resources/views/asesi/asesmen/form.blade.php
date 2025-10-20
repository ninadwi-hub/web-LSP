@extends('layouts.app')

@section('title', 'Form Pendaftaran Sertifikasi')

@section('content')
<div class="container">
    {{-- Notifikasi Success --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Notifikasi Error --}}
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Validasi Error --}}
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mb-0 mt-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form 
        action="{{ isset($asesmen) && $asesmen->id ? route('asesi.asesmen.update', $asesmen->id) : route('asesi.asesmen.store') }}" 
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($asesmen) && $asesmen->id)
            @method('PUT')
        @endif

        <!-- Hidden input agar controller tahu data mana yang digunakan -->
        <input type="hidden" name="biodata_asesi_id" value="{{ $biodata->id }}">
<input type="hidden" name="dokumen_asesi_id" value="{{ $dokumen->id ?? '' }}">


        <!-- STEP NAVIGASI -->
        <ul class="nav nav-pills justify-content-center mb-4" id="stepper">
            <li class="nav-item"><a class="nav-link active" data-step="1">1. Data Pribadi</a></li>
            <li class="nav-item"><a class="nav-link" data-step="2">2. Pendidikan & Pekerjaan</a></li>
            <li class="nav-item"><a class="nav-link" data-step="3">3. Data Pendukung</a></li>
            <li class="nav-item"><a class="nav-link" data-step="4">4. Tujuan Asesmen</a></li>
            <li class="nav-item"><a class="nav-link" data-step="5">5. Persyaratan Teknis</a></li>
            <li class="nav-item"><a class="nav-link" data-step="6">6. FR APL-02</a></li>
            <li class="nav-item"><a class="nav-link" data-step="7">7. Data Pembayaran Sertifikasi</a></li>
        </ul>

        <!-- STEP CONTENT -->
        <div class="step-content">
            {{-- STEP 1 --}}
            <div class="step-pane active" data-step="1">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5>Data Pribadi</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Nama Lengkap</strong></label>
                           <input type="text" name="nama_lengkap" class="form-control" 
       value="{{ old('nama_lengkap', $biodata->user->name ?? '') }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" 
       value="{{ old('email', $biodata->user->email ?? '') }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Jenis Kelamin</strong></label>
                           <select name="jenis_kelamin" class="form-select" required>
                                <option value="Laki-Laki" {{ old('jenis_kelamin', $biodata->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $biodata->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>

                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><strong>Tempat Lahir</strong></label>
                                <input type="text" name="tempat_lahir" class="form-control" 
                                       value="{{ old('tempat_lahir', $biodata->tempat_lahir) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><strong>Tanggal Lahir</strong></label>
                                <input type="date" name="tanggal_lahir" class="form-control" 
                                       value="{{ old('tanggal_lahir', $biodata->tanggal_lahir) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>No. Identitas</strong></label>
                            <input type="text" name="no_identitas" class="form-control" 
                                   value="{{ old('no_identitas', $biodata->no_identitas) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Alamat</strong></label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $biodata->alamat) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div class="step-pane" data-step="2">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5>Pendidikan & Pekerjaan</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Pendidikan Terakhir</strong></label>
                            <input type="text" name="pendidikan" class="form-control" 
                                   value="{{ old('pendidikan', $biodata->pendidikan) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Perguruan Tinggi</strong></label>
                            <input type="text" name="nama_perguruan_tinggi" class="form-control" 
                                   value="{{ old('nama_perguruan_tinggi', $biodata->nama_perguruan_tinggi) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Program Studi</strong></label>
                            <input type="text" name="program_studi" class="form-control" 
                                   value="{{ old('program_studi', $biodata->program_studi) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Pekerjaan</strong></label>
                            <input type="text" name="pekerjaan" class="form-control" 
                                   value="{{ old('pekerjaan', $biodata->pekerjaan) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Perusahaan</strong></label>
                            <input type="text" name="nama_perusahaan" class="form-control" 
                                   value="{{ old('nama_perusahaan', $biodata->nama_perusahaan) }}">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary prev-step">Kembali</button>
                    <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
                </div>
            </div>

            {{-- STEP 3 --}}
            <div class="step-pane" data-step="3">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header"><h5>Data Pendukung</h5></div>
                    <div class="card-body">
                        {{-- Upload file --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pasfoto</label>
                                <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style: dashed !important;">
                                    @if(!empty($dokumen->foto))
                                        <img src="{{ asset('storage/'.$dokumen->foto) }}" alt="Pasfoto" class="img-fluid mb-2" style="max-height:150px;">
                                        <p><a href="{{ asset('storage/'.$dokumen->foto) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Foto</a></p>
                                    @else
                                        <p class="text-muted">Belum ada file</p>
                                    @endif
                                    <input type="file" name="foto" class="form-control mt-2">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Identitas Pribadi (KTP/SIM/Passport)</label>
                                <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style: dashed !important;">
                                    @if(!empty($dokumen->ktp_sim_paspor))
                                        <img src="{{ asset('storage/'.$dokumen->ktp_sim_paspor) }}" alt="KTP" class="img-fluid mb-2" style="max-height:150px;">
                                        <p><a href="{{ asset('storage/'.$dokumen->ktp_sim_paspor) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat KTP</a></p>
                                    @else
                                        <p class="text-muted">Belum ada file</p>
                                    @endif
                                    <input type="file" name="ktp_sim_paspor" class="form-control mt-2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Ijazah Pendidikan Terakhir</label>
                                <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style: dashed !important;">
                                    @if(!empty($dokumen->ijazah))
                                        <span class="text-success">✔ File berhasil terunggah</span><br>
                                        <a href="{{ asset('storage/'.$dokumen->ijazah) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Lihat File</a>
                                    @else
                                        <p class="text-muted">Belum ada file</p>
                                    @endif
                                    <input type="file" name="ijazah" class="form-control mt-2">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">CV (Daftar Riwayat Hidup)</label>
                                <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style: dashed !important;">
                                    @if(!empty($dokumen->cv))
                                        <span class="text-success">✔ File berhasil terunggah</span><br>
                                        <a href="{{ asset('storage/'.$dokumen->cv) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Lihat File</a>
                                    @else
                                        <p class="text-muted">Belum ada file</p>
                                    @endif
                                    <input type="file" name="cv" class="form-control mt-2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Sertifikat Pelatihan Bidang</label>
                            <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style: dashed !important;">
                                @if(!empty($dokumen->sertifikat))
                                    <span class="text-success">✔ File berhasil terunggah</span><br>
                                    <a href="{{ asset('storage/'.$dokumen->sertifikat) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Lihat Sertifikat</a>
                                @else
                                    <p class="text-muted">Belum ada file</p>
                                @endif
                                <input type="file" name="sertifikat" class="form-control mt-2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary prev-step">Kembali</button>
                    <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
                </div>
            </div>

            {{-- STEP 4 --}}
            <div class="step-pane" data-step="4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header"><h5>Tujuan Asesmen</h5></div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Tujuan Asesmen</th>
                                    <th class="text-center">Ceklis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $tujuan = old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '');
                                @endphp
                                @foreach(['Sertifikasi','Pengakuan Kompetensi Terkini (PKT)','Rekognisi Pembelajaran Lampau (RPL)','Lainnya'] as $option)
                                <tr>
                                    <td>{{ $option }}</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="tujuan_asesmen" 
                                               value="{{ $option }}" {{ $tujuan == $option ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary prev-step">Kembali</button>
                    <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
                </div>
            </div>

         {{-- STEP 5 --}}
<div class="step-pane" data-step="5">
    <div class="card mb-4 shadow-sm">
        <div class="card-header"><h5>Persyaratan Teknis</h5></div>
        <div class="card-body">

            {{-- Tabel Peralatan --}}
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Peralatan/Pertengkapan</th>
                        <th>Spesifikasi</th>
                        <th class="text-center">Ada/Tidak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ruang Uji</td>
                        <td>Minimal 2x3 meter</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="ruang_uji" value="Ada" {{ old('ruang_uji', $asesmen->ruang_uji ?? '') == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label><input type="radio" name="ruang_uji" value="Tidak Ada" {{ old('ruang_uji', $asesmen->ruang_uji ?? '') == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Meja</td>
                        <td>Minimal 60x100 cm</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="minimal" value="Ada" {{ old('minimal', $asesmen->minimal ?? '') == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label><input type="radio" name="minimal" value="Tidak Ada" {{ old('minimal', $asesmen->minimal ?? '') == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Kursi</td>
                        <td>Minimal 45 x 45 x 45 cm</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="kursi" value="Ada" {{ old('kursi', $asesmen->kursi ?? '') == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label><input type="radio" name="kursi" value="Tidak Ada" {{ old('kursi', $asesmen->kursi ?? '') == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Pengatur Suhu Ruangan</td>
                        <td>Minimal Kipas Angin</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="suhu" value="Ada" {{ old('suhu', $asesmen->suhu ?? '') == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label><input type="radio" name="suhu" value="Tidak Ada" {{ old('suhu', $asesmen->suhu ?? '') == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Lampu Penerangan</td>
                        <td>Minimal 250 Lux (LED 10 Watt)</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="lampu" value="Ada" {{ old('lampu', $asesmen->lampu ?? '') == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label><input type="radio" name="lampu" value="Tidak Ada" {{ old('lampu', $asesmen->lampu ?? '') == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>PC & Kamera Laptop</td>
                        <td>Minimal layar 14", i3, RAM 6GB</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="pc" value="Ada" {{ old('pc', $asesmen->pc ?? '') == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label><input type="radio" name="pc" value="Tidak Ada" {{ old('pc', $asesmen->pc ?? '') == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Aplikasi Video Conference</td>
                        <td>Zoom / Microsoft Teams</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="aplikasi" value="Ada" {{ old('aplikasi', $asesmen->aplikasi ?? '') == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label><input type="radio" name="aplikasi" value="Tidak Ada" {{ old('aplikasi', $asesmen->aplikasi ?? '') == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Telepon Genggam</td>
                        <td>Minimal Android 10 atau iOS 15</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="hp" value="Ada" {{ old('hp', $asesmen->hp ?? '') == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label><input type="radio" name="hp" value="Tidak Ada" {{ old('hp', $asesmen->hp ?? '') == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- Input tambahan --}}
            <div class="row mt-3">
                <div class="col-md-3">
                    <label class="form-label">Tanggal Asesmen</label>
                    {{-- relasi otomatis ke jadwal --}}
                    <input type="date" name="jadwal_uji" class="form-control"
                        value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" readonly>
                    </div>

                <div class="col-md-5">
    <label class="form-label">Tempat Uji Kompetensi (TUK)</label>
    <input type="text" 
           name="tuk" 
           class="form-control" 
           placeholder="Masukkan nama TUK"
           value="{{ old('tuk', $asesmen->tuk ?? '') }}" >
</div>


                <div class="col-md-4">
                    <label class="form-label">Video Verifikasi TUK</label>
                    <input type="text" name="video_tuk" class="form-control" 
                           value="{{ old('video_tuk', $asesmen->video_tuk ?? '') }}">
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-secondary prev-step">Kembali</button>
        <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
    </div>
</div>


            {{-- STEP 6 --}}
            <div class="step-pane" data-step="6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header"><h5>FR APL-02</h5></div>
                    <div class="card-body">
                        <p>Pilih unit kompetensi yang ingin diuji:</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Pilih</th>
                                    <th>Kode Unit</th>
                                    <th>Judul Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($units as $unit)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="unit_ids[]" value="{{ $unit->id }}"
                                            {{ isset($asesmen) && $asesmen->units->contains($unit->id) ? 'checked' : '' }}>
                                    </td>
                                    <td>{{ $unit->kode_unit }}</td>
                                    <td>{{ $unit->judul_unit }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
    <button type="button" class="btn btn-secondary prev-step">Kembali</button>
    <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
</div>
</div>


                {{-- STEP 7 --}}
<div class="step-pane" data-step="7">
    <div class="card mb-4 shadow-sm">
        <div class="card-header"><h5>Data Pembayaran Sertifikasi</h5></div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Jumlah Pembayaran (Rp)</label>
                    <input type="number" step="0.01" name="jumlah_pembayaran" class="form-control" 
                        value="{{ old('jumlah_pembayaran', $asesmen->jumlah_pembayaran ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Sumber Pendanaan</label>
                    <select name="sumber_pendanaan" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Mandiri" {{ old('sumber_pendanaan', $asesmen->sumber_pendanaan ?? '') == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                        <option value="Subsidi BNSP" {{ old('sumber_pendanaan', $asesmen->sumber_pendanaan ?? '') == 'Subsidi BNSP' ? 'selected' : '' }}>Subsidi BNSP</option>
                        <option value="Lain-lain" {{ old('sumber_pendanaan', $asesmen->sumber_pendanaan ?? '') == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Transfer Bank" {{ old('metode_pembayaran', $asesmen->metode_pembayaran ?? '') == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                        <option value="Tunai" {{ old('metode_pembayaran', $asesmen->metode_pembayaran ?? '') == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">No. Rekening Tujuan</label>
                    <input type="text" name="no_rekening" class="form-control" 
                        value="{{ old('no_rekening', $asesmen->no_rekening ?? '0000xxxx') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Pemilik Rekening</label>
                    <input type="text" name="nama_rekening" class="form-control" 
                        value="{{ old('nama_rekening', $asesmen->nama_rekening ?? '') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Tanggal Pembayaran</label>
                    <input type="date" name="tanggal_pembayaran" class="form-control" 
                        value="{{ old('tanggal_pembayaran', $asesmen->tanggal_pembayaran ?? '') }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control">
                    @if(!empty($asesmen->bukti_pembayaran))
                        <small class="d-block mt-2">
                            <a href="{{ asset('storage/'.$asesmen->bukti_pembayaran) }}" target="_blank">Lihat Bukti Pembayaran</a>
                        </small>
                    @endif
                </div>
            </div>

        </div>
    </div>
                <!-- Tombol Kembali & Submit -->
                <div class="d-flex justify-content-between mb-5">
                    <button type="button" class="btn btn-secondary prev-step">Kembali</button>
                    <button type="submit" class="btn btn-success">Kirim Pendaftaran</button>
                </div>
            </div>
    </form>
</div>

<!-- JS Stepper -->
<script>
    // === Auto close alert setelah 5 detik ===
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        });
    }, 5000);

    // === Wizard Step Form ===
    document.addEventListener('DOMContentLoaded', () => {
        let currentStep = 1;
        const totalSteps = 7; // 🔥 Update ke 7 step
        const stepPanes = document.querySelectorAll('.step-pane');
        const stepLinks = document.querySelectorAll('#stepper .nav-link');
        const nextBtns = document.querySelectorAll('.next-step');
        const prevBtns = document.querySelectorAll('.prev-step');

        function showStep(step) {
            stepPanes.forEach(pane => pane.classList.remove('active'));
            const activePane = document.querySelector(`.step-pane[data-step="${step}"]`);
            if (activePane) activePane.classList.add('active');

            stepLinks.forEach(link => link.classList.remove('active'));
            const activeLink = document.querySelector(`#stepper .nav-link[data-step="${step}"]`);
            if (activeLink) activeLink.classList.add('active');

            currentStep = step;
        }

        nextBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep < totalSteps) showStep(currentStep + 1);
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep > 1) showStep(currentStep - 1);
            });
        });

        stepLinks.forEach(link => {
            link.addEventListener('click', () => {
                const step = parseInt(link.getAttribute('data-step'));
                if (step) showStep(step);
            });
        });
    });
    
</script>
<style>
    .step-pane { display: none; }
    .step-pane.active { display: block; }
    #stepper .nav-link { cursor: pointer; }
</style>
@endsection
