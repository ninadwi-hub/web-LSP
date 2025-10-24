@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Substansi Wawancara</h5>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('sa.substansi_wawancara.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="skema_id" value="{{ $skema->id }}">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Nama Skema</label>
                    <input type="text" class="form-control" value="{{ $skema->nama }}" readonly>
                </div>
                <div class="col-md-6">
                    <label>Unit Kompetensi</label>
                    <select name="unit_kompetensi_id" class="form-control" required>
                        <option value="">:: Pilih Unit Kompetensi ::</option>
                        @foreach($unitKompetensis as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->judul_unit }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label>Nomor Elemen</label>
                    <input type="text" name="nomor_elemen" class="form-control" placeholder="Contoh: 1.1" required>
                </div>
                <div class="col-md-9">
                    <label>Substansi Wawancara</label>
                    <textarea name="substansi" class="form-control" rows="3" required></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Unit Kompetensi</th>
                    <th>Nomor Elemen</th>
                    <th>Substansi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($substansis as $no => $item)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $item->unitKompetensi->judul_unit ?? '-' }}</td>
                    <td>{{ $item->nomor_elemen }}</td>
                    <td>{{ $item->substansi }}</td>
                    <td>
                        <form action="{{ route('sa.substansi_wawancara.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus substansi ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
