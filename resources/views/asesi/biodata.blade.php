@extends('layouts.app')

@section('title', 'Biodata Pengguna')

@section('content')
<div class="container">

    <form action="{{ route('asesi.biodata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Data Pribadi --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header"><h5 class="mb-0">Biodata Pengguna</h5></div>
            <div class="card-body">
                <div class="row mb-3">
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
                        <label class="form-label">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" class="form-control" value="{{ $biodata->kewarganegaraan ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $biodata->tempat_lahir ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $biodata->tanggal_lahir ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">No. HP/Telp *</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $biodata->no_hp ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. Identitas *</label>
                        <input type="text" name="no_identitas" class="form-control" value="{{ $biodata->no_identitas ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Organisasi</label>
                        <input type="text" name="organisasi" class="form-control" value="{{ $biodata->organisasi ?? '' }}">
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
                    <label class="form-label">Alamat *</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ $biodata->alamat ?? '' }}</textarea>
                </div>
            </div>
        </div>

        {{-- Pendidikan & Pekerjaan --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header"><h5 class="mb-0">Data Pendidikan & Pekerjaan</h5></div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Pendidikan *</label>
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
                        <label class="form-label">Pekerjaan *</label>
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
                        <label class="form-label">Nama Perusahaan *</label>
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
                        <label class="form-label">Jabatan di Perusahaan *</label>
                        <input type="text" name="jabatan_perusahaan" class="form-control" value="{{ $biodata->jabatan_perusahaan ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Dokumen --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header"><h5 class="mb-0">Data Dokumen Dasar</h5></div>
            <div class="card-body">
                @php
                    $dokumen = [
                        'foto' => 'Foto 3x4',
                        'ktp_sim_paspor' => 'KTP/SIM/Paspor',
                        'ijazah' => 'Ijazah Terakhir (Minimal SMA/Sederajat)',
                        'sertifikat' => 'Sertifikat Pelatihan Berbasis Kompetensi',
                        'cv' => 'Surat Pengalaman / CV',
                        'tanda_tangan' => 'Tanda Tangan',
                    ];
                @endphp

                @foreach($dokumen as $field => $label)
                    <div class="mb-3">
                        <label class="form-label">{{ $label }}</label>
                        <input type="file" name="{{ $field }}" class="form-control">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-end mb-5">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<script>
function setupEditableDropdown(selectId, inputId){
    const select = document.getElementById(selectId);
    const input = document.getElementById(inputId);

    select.addEventListener('change', function(){
        if(this.value === 'lainnya'){
            input.style.display = 'block';
            input.value = '';
        } else {
            input.style.display = 'none';
            input.value = this.value;
        }
    });

    // Jika value awal bukan dropdown
    if(input.value && !Array.from(select.options).some(o => o.value === input.value)){
        select.value = 'lainnya';
        input.style.display = 'block';
    } else {
        select.value = input.value || '';
    }
}

['jenis_kelamin','pendidikan','pekerjaan','provinsi','kabupaten'].forEach(id => {
    setupEditableDropdown(id + '_select', id + '_input');
});
</script>
@endsection
