@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Dokumen Portofolio</h5>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('sa.dokumen_portofolio.store') }}" method="POST" class="mb-4">
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

            <div class="mb-3">
                <label>Dokumen Portofolio</label>
                <textarea name="dokumen_portofolio" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Unit Kompetensi</th>
                    <th>Dokumen Portofolio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dokumens as $no => $item)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $item->unitKompetensi->judul_unit ?? '-' }}</td>
                    <td>{{ $item->dokumen_portofolio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
