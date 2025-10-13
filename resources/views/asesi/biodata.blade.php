@extends('layouts.app')

@section('title', 'Biodata Pengguna')

@section('content')
<div class="container">
    <form action="{{ route('asesi.biodata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Data Pribadi --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Biodata Pengguna</h5>

                {{-- Tombol Login Sebagai (hanya muncul untuk multi-role) --}}
                @if(!empty($roles) && count($roles) > 1)
                <div class="dropdown">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="loginAsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Login Sebagai
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="loginAsDropdown">
                        @foreach($roles as $role)
                            @if($role !== Auth::user()->active_role)
                                <li>
                                    <a class="dropdown-item" href="{{ route('switch.role', ['role' => $role]) }}">
                                        {{ ucfirst($role) }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin_select" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="lainnya">Lainnya...</option>
                        </select>
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin_input" class="form-control mt-2" placeholder="Masukkan jenis kelamin" style="display:none;" value="{{ $biodata->jenis_kelamin ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $biodata->no_hp ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">No. Identitas</label>
                        <input type="text" name="no_identitas" class="form-control" value="{{ $biodata->no_identitas ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" class="form-control" value="{{ $biodata->kewarganegaraan ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $biodata->tempat_lahir ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $biodata->tanggal_lahir ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Provinsi</label>
                        <select name="provinsi" id="provinsi_select" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="lainnya">Lainnya...</option>
                        </select>
                        <input type="text" name="provinsi" id="provinsi_input" class="form-control mt-2" placeholder="Masukkan provinsi" style="display:none;" value="{{ $biodata->provinsi ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Kabupaten</label>
                        <select name="kabupaten" id="kabupaten_select" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="lainnya">Lainnya...</option>
                        </select>
                        <input type="text" name="kabupaten" id="kabupaten_input" class="form-control mt-2" placeholder="Masukkan kabupaten" style="display:none;" value="{{ $biodata->kabupaten ?? '' }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control">{{ $biodata->alamat ?? '' }}</textarea>
                </div>
            </div>
        </div>

        {{-- Pendidikan & Pekerjaan --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header"><h5>Data Pendidikan & Pekerjaan</h5></div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan_select" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="lainnya">Lainnya...</option>
                        </select>
                        <input type="text" name="pendidikan" id="pendidikan_input" class="form-control mt-2" placeholder="Masukkan pendidikan" style="display:none;" value="{{ $biodata->pendidikan ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama Perguruan Tinggi</label>
                        <input type="text" name="nama_perguruan_tinggi" class="form-control" value="{{ $biodata->nama_perguruan_tinggi ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="program_studi" class="form-control" value="{{ $biodata->program_studi ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan_select" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Karyawan">Karyawan</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                            <option value="lainnya">Lainnya...</option>
                        </select>
                        <input type="text" name="pekerjaan" id="pekerjaan_input" class="form-control mt-2" placeholder="Masukkan pekerjaan" style="display:none;" value="{{ $biodata->pekerjaan ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control" value="{{ $biodata->nama_perusahaan ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Alamat Perusahaan</label>
                        <input type="text" name="alamat_perusahaan" class="form-control" value="{{ $biodata->alamat_perusahaan ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Telp Perusahaan</label>
                        <input type="text" name="no_telp_perusahaan" class="form-control" value="{{ $biodata->no_telp_perusahaan ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email Perusahaan</label>
                        <input type="text" name="email_perusahaan" class="form-control" value="{{ $biodata->email_perusahaan ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jabatan di Perusahaan</label>
                        <input type="text" name="jabatan_perusahaan" class="form-control" value="{{ $biodata->jabatan_perusahaan ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Dokumen --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header"><h5>Data Dokumen</h5></div>
            <div class="card-body">
                @php
                    $dokumenFields = [
                        'foto' => 'Foto 3x4',
                        'ktp_sim_paspor' => 'KTP/SIM/Paspor',
                        'ijazah' => 'Ijazah Terakhir',
                        'sertifikat' => 'Sertifikat Pelatihan',
                        'cv' => 'CV / Surat Pengalaman',
                    ];
                @endphp

                @foreach($dokumenFields as $field => $label)
                    <div class="mb-3">
                        <label class="form-label">{{ $label }}</label>
                        <input type="file" name="{{ $field }}" class="form-control">
                        @if(!empty($dokumen->$field))
                            <small class="text-muted">
                                File saat ini:
                                <a href="{{ asset('storage/' . $dokumen->$field) }}" target="_blank">Lihat</a>
                            </small>
                        @endif
                    </div>
                @endforeach

                {{-- Tanda tangan digital --}}
                <div class="mb-3">
                    <label class="form-label">Tanda Tangan</label>
                    <div class="border rounded bg-white mb-2" style="width: 300px; height: 150px;">
                        <canvas id="signature-pad" width="300" height="150"></canvas>
                    </div>
                    <input type="hidden" name="tanda_tangan" id="tanda_tangan">
                    @if(!empty($dokumen->tanda_tangan))
                        <div>
                            <small class="text-muted">
                                File saat ini:
                                <a href="{{ asset('storage/' . $dokumen->tanda_tangan) }}" target="_blank">Lihat</a>
                            </small>
                        </div>
                    @endif
                    <button type="button" class="btn btn-sm btn-secondary mt-2" id="clear-signature">
                        Hapus Tanda Tangan
                    </button>
                </div>
            </div>
        </div>

        <div class="text-end mb-5">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

{{-- Script --}}
<script>
function setupEditableDropdown(selectId, inputId) {
    const select = document.getElementById(selectId);
    const input = document.getElementById(inputId);

    // Saat user pilih dropdown
    select.addEventListener('change', function() {
        if (this.value === 'lainnya') {
            input.style.display = 'block';
            input.value = '';
            input.focus();
        } else {
            input.style.display = 'none';
            input.value = this.value;
        }
    });

    // Saat user mengetik di input "lainnya"
    input.addEventListener('input', function() {
        // Ambil semua opsi custom yang sudah ada
        let customOptions = Array.from(select.querySelectorAll('option[data-custom="true"]'));

        // Jika input dikosongkan, jangan hapus opsi lain
        if (this.value.trim() === '') {
            select.value = 'lainnya';
            return;
        }

        // Cek apakah value input sudah ada
        let exists = Array.from(select.options).some(o => o.value.toLowerCase() === this.value.toLowerCase());
        if (!exists) {
            // Buat opsi custom baru
            const newOption = document.createElement('option');
            newOption.dataset.custom = 'true';
            newOption.value = this.value;
            newOption.textContent = this.value;

            // Sisipkan sebelum opsi "Lainnya"
            const lainnyaOption = Array.from(select.options).find(o => o.value === 'lainnya');
            if (lainnyaOption) select.insertBefore(newOption, lainnyaOption);
            else select.appendChild(newOption);
        }

        // Urutkan semua opsi kecuali "--- Pilih ---" dan "Lainnya"
        const pilihOption = select.querySelector('option[value=""]');
        const lainnyaOption = select.querySelector('option[value="lainnya"]');
        const options = Array.from(select.options).filter(o => o.value !== '' && o.value !== 'lainnya');
        options.sort((a, b) => a.text.localeCompare(b.text, 'id', {sensitivity:'base'}));

        // Bersihkan dropdown dan append lagi
        select.innerHTML = '';
        if (pilihOption) select.appendChild(pilihOption);
        options.forEach(o => select.appendChild(o));
        if (lainnyaOption) select.appendChild(lainnyaOption);

        // Pilih value input sekarang
        select.value = this.value;
    });

    // Saat halaman dimuat (misalnya saat edit data)
    if (input.value && !Array.from(select.options).some(o => o.value === input.value)) {
        const customOption = document.createElement('option');
        customOption.value = input.value;
        customOption.textContent = input.value;
        customOption.dataset.custom = 'true';

        const lainnyaOption = Array.from(select.options).find(o => o.value === 'lainnya');
        if (lainnyaOption) select.insertBefore(customOption, lainnyaOption);
        else select.appendChild(customOption);

        select.value = input.value;
        input.style.display = 'none';
    } else {
        select.value = input.value || '';
    }
}

// Aktifkan untuk semua dropdown editable
// Aktifkan untuk semua dropdown editable (tambahkan pendidikan & pekerjaan)
['jenis_kelamin', 'provinsi', 'kabupaten', 'pendidikan', 'pekerjaan'].forEach(id => 
    setupEditableDropdown(id + '_select', id + '_input')
);


document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('signature-pad');
    const ctx = canvas.getContext('2d');
    const inputTtd = document.getElementById('tanda_tangan');
    const clearButton = document.getElementById('clear-signature');
    const form = canvas.closest('form');

    let drawing = false;

    canvas.addEventListener('mousedown', () => { drawing = true; ctx.beginPath(); });
    canvas.addEventListener('mouseup', () => drawing = false);
    canvas.addEventListener('mousemove', e => {
        if (!drawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = 'black';
        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
    });

    clearButton.addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        inputTtd.value = '';
    });

    form.addEventListener('submit', () => {
        const blank = document.createElement('canvas');
        blank.width = canvas.width;
        blank.height = canvas.height;

        if (canvas.toDataURL() === blank.toDataURL()) {
            inputTtd.value = '';
        } else {
            inputTtd.value = canvas.toDataURL('image/png');
        }
    });
});
</script>
@endsection
