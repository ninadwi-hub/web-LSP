@extends('layouts.app')

@section('title', 'Form Pendaftaran Sertifikasi')

@section('content')
<div class="container">
    <form action="{{ isset($asesmen) ? route('asesi.asesmen.update', $asesmen->id) : route('asesi.asesmen.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($asesmen))
            @method('PUT')
        @endif

        {{-- Hidden untuk relasi --}}
        <input type="hidden" name="biodata_id" value="{{ $biodata->id }}">
        <input type="hidden" name="dokumen_id" value="{{ $dokumen->id ?? '' }}">

        {{-- STEP 1 - Data Pribadi --}}
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

        {{-- STEP 2 - Pendidikan & Pekerjaan --}}
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

        {{-- STEP 3 - Data Dokumen --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header"><h5>Data Pendukung</h5></div>
            <div class="card-body">
                @if($dokumen)
                    <p><strong>Foto:</strong> <a href="{{ asset('storage/'.$dokumen->foto) }}" target="_blank">Lihat</a></p>
                    <p><strong>KTP:</strong> <a href="{{ asset('storage/'.$dokumen->ktp) }}" target="_blank">Lihat</a></p>
                    <p><strong>Ijazah:</strong> <a href="{{ asset('storage/'.$dokumen->ijazah) }}" target="_blank">Lihat</a></p>
                    <p><strong>CV:</strong> <a href="{{ asset('storage/'.$dokumen->cv) }}" target="_blank">Lihat</a></p>
                @else
                    <p class="text-danger">Belum ada dokumen yang diupload.</p>
                @endif
            </div>
        </div>

        {{-- STEP 4 - Tujuan Asesmen --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header"><h5>Tujuan Asesmen</h5></div>
            <div class="card-body">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tujuan_asesmen" value="Sertifikasi"
                        {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Sertifikasi' ? 'checked' : '' }} required>
                    <label class="form-check-label">Sertifikasi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tujuan_asesmen" value="Sertifikasi Ulang"
                        {{ old('tujuan_asesmen', $asesmen->tujuan_asesmen ?? '') == 'Sertifikasi Ulang' ? 'checked' : '' }}>
                    <label class="form-check-label">Sertifikasi Ulang</label>
                </div>
            </div>
        </div>

        {{-- STEP 5 - Persyaratan Teknis --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header"><h5>Persyaratan Teknis</h5></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Tempat Uji Kompetensi (TUK)</label>
                    <input type="text" name="tuk" class="form-control" 
                           value="{{ old('tuk', $asesmen->tuk ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jadwal Uji</label>
                    <input type="date" name="jadwal_uji" class="form-control" 
                           value="{{ old('jadwal_uji', $asesmen->jadwal_uji ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Metode Uji</label>
                    <select name="metode_uji" class="form-control">
                        <option value="Online" {{ old('metode_uji', $asesmen->metode_uji ?? '') == 'Online' ? 'selected' : '' }}>Online</option>
                        <option value="Offline" {{ old('metode_uji', $asesmen->metode_uji ?? '') == 'Offline' ? 'selected' : '' }}>Offline</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan Teknis</label>
                    <textarea name="keterangan_teknis" class="form-control">{{ old('keterangan_teknis', $asesmen->keterangan_teknis ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- STEP 6 - FR APL-02 --}}
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

        {{-- SUBMIT --}}
        <div class="text-end mb-5">
            <button class="btn btn-success">Kirim Pendaftaran</button>
        </div>
    </form>
</div>
@endsection
