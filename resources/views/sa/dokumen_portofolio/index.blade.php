@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Dokumen Portofolio</h5>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skemas as $no => $skema)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $skema->kode }}</td>
                    <td>{{ $skema->nama }}</td>
                    <td>{{ $skema->jenis }}</td>
                    <td>{{ $skema->level }}</td>
                    <td><input type="checkbox" {{ $skema->status ? 'checked' : '' }} disabled></td>
                    <td>
                        <a href="{{ route('sa.dokumen_portofolio.show', $skema->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-search"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
