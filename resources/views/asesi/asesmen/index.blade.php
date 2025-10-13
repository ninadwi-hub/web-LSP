@extends('layouts.app')

@section('title', 'Pendaftaran Asesmen')

@section('content')
<div class="container">
    <h4 class="mb-3">Pendaftaran Asesmen / Uji Kompetensi</h4>

    <a href="{{ route('asesmen.list_jadwal') }}" class="btn btn-primary mb-3">+ Tambah</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Skema Sertifikasi</th>
                <th>Kategori/TUK</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    @forelse($asesmens as $i => $asesmen)
    <tr>
        <td>{{ $asesmens->firstItem() + $i }}</td>
        <td>{{ \Carbon\Carbon::parse($asesmen->jadwal_uji)->format('d-m-Y') }}</td>
        <td>
    {{ $asesmen->jadwal && $asesmen->jadwal->skema 
        ? $asesmen->jadwal->skema->nama 
        : 'Tidak ada skema' }}
</td>
        <td>{{ $asesmen->tuk }}</td>
        <td>
            @if($asesmen->status == 'Administrasi Selesai')
                <span class="badge bg-success">{{ $asesmen->status }}</span>
            @elseif($asesmen->status == 'Menunggu')
                <span class="badge bg-warning text-dark">{{ $asesmen->status }}</span>
            @else
                <span class="badge bg-danger">{{ $asesmen->status ?? 'Belum Diproses' }}</span>
            @endif
        </td>
        <td>
            <a href="{{ route('asesmen.edit', $asesmen->id) }}" class="btn btn-sm btn-info">👁</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">Belum ada data</td>
    </tr>
    @endforelse
</tbody>
    </table>

    {{ $asesmens->links() }}
</div>
@endsection
