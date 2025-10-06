@extends('layouts.app')

@section('title', 'Form Pendaftaran Sertifikasi')

@section('content')
<div class="container">
    <form action="{{ isset($asesmen) ? route('asesmen.update', $asesmen->id) : route('asesmen.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($asesmen))
            @method('PUT')
        @endif

        <!-- STEP NAVIGASI -->
        <ul class="nav nav-pills justify-content-center mb-4" id="stepper">
            <li class="nav-item"><a class="nav-link active" data-step="1">1. Data Pribadi</a></li>
            <li class="nav-item"><a class="nav-link" data-step="2">2. Pendidikan & Pekerjaan</a></li>
            <li class="nav-item"><a class="nav-link" data-step="3">3. Data Pendukung</a></li>
            <li class="nav-item"><a class="nav-link" data-step="4">4. Tujuan Asesmen</a></li>
            <li class="nav-item"><a class="nav-link" data-step="5">5. Persyaratan Teknis</a></li>
            <li class="nav-item"><a class="nav-link" data-step="6">6. FR APL-02</a></li>
        </ul>

        <!-- STEP CONTENT -->
        <div class="step-content">

            {{-- STEP 1 --}}
            <div class="step-pane active" data-step="1">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header"><h5>Data Pribadi</h5></div>
                    <div class="card-body">
                        <p><strong>Nama Lengkap:</strong> {{ $biodata->nama_lengkap }}</p>
                        <p><strong>Email:</strong> {{ $biodata->email }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $biodata->jk }}</p>
                        <p><strong>TTL:</strong> {{ $biodata->tempat_lahir }}, {{ $biodata->tanggal_lahir }}</p>
                        <p><strong>No. Identitas:</strong> {{ $biodata->no_identitas }}</p>
                        <p><strong>Alamat:</strong> {{ $biodata->alamat }}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div class="step-pane" data-step="2">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header"><h5>Pendidikan & Pekerjaan</h5></div>
                    <div class="card-body">
                        <p><strong>Pendidikan Terakhir:</strong> {{ $biodata->pendidikan }}</p>
                        <p><strong>Nama PT:</strong> {{ $biodata->perguruan_tinggi }}</p>
                        <p><strong>Program Studi:</strong> {{ $biodata->program_studi }}</p>
                        <p><strong>Pekerjaan:</strong> {{ $biodata->pekerjaan }}</p>
                        <p><strong>Perusahaan:</strong> {{ $biodata->perusahaan }}</p>
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
            <div class="row">
                {{-- Foto --}}
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

                {{-- KTP --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Identitas Pribadi (KTP/SIM/Passport)</label>
                    <div class="upload-box text-center p-3 border border-success border-2 rounded" style="border-style: dashed !important;">
                        @if(!empty($dokumen->ktp))
                            <img src="{{ asset('storage/'.$dokumen->ktp) }}" alt="KTP" class="img-fluid mb-2" style="max-height:150px;">
                            <p><a href="{{ asset('storage/'.$dokumen->ktp) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat KTP</a></p>
                        @else
                            <p class="text-muted">Belum ada file</p>
                        @endif
                        <input type="file" name="ktp" class="form-control mt-2">
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Ijazah --}}
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

                {{-- CV --}}
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
            {{-- Sertifikat Pelatihan Bidang --}}
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
        <div class="card-header">
            <h5 class="mb-0">Tujuan Asesmen</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Tujuan Asesmen</th>
                        <th class="text-center">Ceklis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sertifikasi</td>
                        <td class="text-center">
                            <input class="form-check-input" type="radio" name="tujuan_asesmen" 
                                   value="Sertifikasi"
                                   {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Sertifikasi' ? 'checked' : '' }} required>
                        </td>
                    </tr>
                    <tr>
                        <td>Pengakuan Kompetensi Terkini (PKT)</td>
                        <td class="text-center">
                            <input class="form-check-input" type="radio" name="tujuan_asesmen" 
                                   value="Pengakuan Kompetensi Terkini (PKT)"
                                   {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Pengakuan Kompetensi Terkini (PKT)' ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <td>Rekognisi Pembelajaran Lampau (RPL)</td>
                        <td class="text-center">
                            <input class="form-check-input" type="radio" name="tujuan_asesmen" 
                                   value="Rekognisi Pembelajaran Lampau (RPL)"
                                   {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Rekognisi Pembelajaran Lampau (RPL)' ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <td>Lainnya</td>
                        <td class="text-center">
                            <input class="form-check-input" type="radio" name="tujuan_asesmen" 
                                   value="Lainnya"
                                   {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Lainnya' ? 'checked' : '' }}>
                        </td>
                    </tr>
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
            
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Peralatan/Pertengakapan</th>
                        <th>Spesifikasi</th>
                        <th class="text-center">Ada/Tidak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ruang Uji</td>
                        <td>Minimal 2x3 meter</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="ruang_uji" value="Ada"> Ada</label>
                            <label><input type="radio" name="ruang_uji" value="Tidak Ada" checked> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Minimal</td>
                        <td>Minimal 60x100 cm</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="minimal" value="Ada"> Ada</label>
                            <label><input type="radio" name="minimal" value="Tidak Ada" checked> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Kursi</td>
                        <td>Minimal 45 x 45 x 45 cm</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="kursi" value="Ada"> Ada</label>
                            <label><input type="radio" name="kursi" value="Tidak Ada" checked> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Pengatur Suhu Ruangan</td>
                        <td>Minimal Kipas Angin</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="suhu" value="Ada"> Ada</label>
                            <label><input type="radio" name="suhu" value="Tidak Ada" checked> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Lampu Penerangan</td>
                        <td>Minimal 250 Lux (LED 10 Watt)</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="lampu" value="Ada"> Ada</label>
                            <label><input type="radio" name="lampu" value="Tidak Ada" checked> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Mesin Pengolah Data (PC) dan Kamera Laptop</td>
                        <td>Minimal layar 14 inch, Processor i3 dan RAM 6GB</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="pc" value="Ada"> Ada</label>
                            <label><input type="radio" name="pc" value="Tidak Ada" checked> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Aplikasi Pengolah Data dan Aplikasi Video Conference</td>
                        <td>Minimal aplikasi Microsoft Office (Word, Excel, PowerPoint) dan Zoom</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="aplikasi" value="Ada"> Ada</label>
                            <label><input type="radio" name="aplikasi" value="Tidak Ada" checked> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Telepon Genggam</td>
                        <td>Minimal Android 10 atau iOS 15</td>
                        <td class="text-center">
                            <label class="me-3"><input type="radio" name="hp" value="Ada"> Ada</label>
                            <label><input type="radio" name="hp" value="Tidak Ada" checked> Tidak Ada</label>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- Input tambahan --}}
            <div class="row mt-3">
                <div class="col-md-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="jadwal_uji" class="form-control" 
                           value="{{ old('jadwal_uji', $asesmen->jadwal_uji ?? '') }}">
                </div>
                <div class="col-md-5">
                    <label class="form-label">Tempat Uji Kompetensi (TUK)</label>
                    <input type="text" name="tuk" class="form-control" 
                           value="{{ old('tuk', $asesmen->tuk ?? '') }}">
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

                <!-- Tombol Kembali & Submit -->
                <div class="d-flex justify-content-between mb-5">
                    <button type="button" class="btn btn-secondary prev-step">Kembali</button>
                    <button type="submit" class="btn btn-success">Kirim Pendaftaran</button>
                </div>
            </div>

        </div>
    </form>
</div>

<!-- JS Stepper -->
<script>
    let currentStep = 1;
    const totalSteps = 6;

    function showStep(step) {
        document.querySelectorAll('.step-pane').forEach(pane => pane.classList.remove('active'));
        document.querySelector(`.step-pane[data-step="${step}"]`).classList.add('active');

        document.querySelectorAll('#stepper .nav-link').forEach(link => link.classList.remove('active'));
        document.querySelector(`#stepper .nav-link[data-step="${step}"]`).classList.add('active');

        currentStep = step;
    }

    document.querySelectorAll('.next-step').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep < totalSteps) showStep(currentStep + 1);
        });
    });

    document.querySelectorAll('.prev-step').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep > 1) showStep(currentStep - 1);
        });
    });

    document.querySelectorAll('#stepper .nav-link').forEach(link => {
        link.addEventListener('click', () => {
            showStep(parseInt(link.getAttribute('data-step')));
        });
    });
</script>

<style>
.step-pane { display: none; }
.step-pane.active { display: block; }
#stepper .nav-link { cursor: pointer; }
</style>
@endsection
