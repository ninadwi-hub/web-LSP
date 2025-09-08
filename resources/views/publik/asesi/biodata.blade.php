@extends('layouts.dashboard')

@section('title','Biodata')

@section('content')
<div class="container py-4">
    <h3>Biodata Pengguna</h3>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <form action="{{ route('asesi.biodata.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Data Pribadi -->
        <div class="card mb-3">
            <div class="card-header">Data Pribadi</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $biodata->nama_lengkap }}">
                </div>
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                </div>
                <div class="col-md-6">
                    <label>No. HP/Telp</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $biodata->no_hp }}">
                </div>
                <div class="col-md-6">
                    <label>No. Identitas</label>
                    <input type="text" name="no_identitas" class="form-control" value="{{ $biodata->no_identitas }}">
                </div>
                <div class="col-md-6">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="Laki-Laki" {{ $biodata->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" class="form-control" value="{{ $biodata->kewarganegaraan }}">
                </div>
                <div class="col-md-6">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $biodata->tempat_lahir }}">
                </div>
                <div class="col-md-6">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $biodata->tanggal_lahir }}">
                </div>
                <div class="col-md-6">
                    <label>Organisasi</label>
                    <input type="text" name="organisasi" class="form-control" value="{{ $biodata->organisasi }}">
                </div>
                <div class="col-md-6">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $biodata->alamat }}">
                </div>
                <div class="col-md-6">
                    <label>Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" value="{{ $biodata->provinsi }}">
                </div>
                <div class="col-md-6">
                    <label>Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" value="{{ $biodata->kabupaten }}">
                </div>
            </div>
        </div>

        <!-- Pendidikan & Pekerjaan -->
        <div class="card mb-3">
            <div class="card-header">Data Pendidikan & Pekerjaan</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label>Pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control" value="{{ $biodata->pendidikan }}">
                </div>
                <div class="col-md-6">
                    <label>Nama Perguruan Tinggi</label>
                    <input type="text" name="nama_pt" class="form-control" value="{{ $biodata->nama_pt }}">
                </div>
                <div class="col-md-6">
                    <label>Nama Program Studi</label>
                    <input type="text" name="program_studi" class="form-control" value="{{ $biodata->program_studi }}">
                </div>
                <div class="col-md-6">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ $biodata->pekerjaan }}">
                </div>
                <div class="col-md-6">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control" value="{{ $biodata->nama_perusahaan }}">
                </div>
                <div class="col-md-6">
                    <label>Alamat Perusahaan</label>
                    <input type="text" name="alamat_perusahaan" class="form-control" value="{{ $biodata->alamat_perusahaan }}">
                </div>
                <div class="col-md-6">
                    <label>No. Telp Perusahaan</label>
                    <input type="text" name="telp_perusahaan" class="form-control" value="{{ $biodata->telp_perusahaan }}">
                </div>
                <div class="col-md-6">
                    <label>Email Perusahaan</label>
                    <input type="text" name="email_perusahaan" class="form-control" value="{{ $biodata->email_perusahaan }}">
                </div>
                <div class="col-md-6">
                    <label>Jabatan di Perusahaan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $biodata->jabatan }}">
                </div>
            </div>
        </div>

        <!-- Upload File -->
        <div class="card mb-3">
            <div class="card-header">Upload Dokumen</div>
            <div class="card-body row g-3">
                @foreach(['foto'=>'Foto 3x4','ktp'=>'KTP/SIM/PASPOR','ijazah'=>'Ijazah Terakhir','sertifikat'=>'Sertifikat Pelatihan','cv'=>'Surat Pengalaman / CV','tanda_tangan'=>'Tanda Tangan'] as $field=>$label)
                <div class="col-md-6">
                    <label>{{ $label }}</label>
                    <input type="file" name="{{ $field }}" class="form-control">
                    @if($biodata->$field)
                        <small><a href="{{ asset('storage/'.$biodata->$field) }}" target="_blank">Lihat file</a></small>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
