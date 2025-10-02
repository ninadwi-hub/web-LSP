@extends('layouts.app')

@section('title', 'Pendaftaran Asesmen')

@section('content')
<div class="container">
    <h4 class="mb-3">Pendaftaran Asesmen / Uji Kompetensi</h4>

    <a href="{{ route('asesmen.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

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
                <td>{{ \Carbon\Carbon::parse($asesmen->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $asesmen->skema_sertifikasi }}</td>
                <td>{{ $asesmen->kategori_tuk }}</td>
                <td>
                    @if($asesmen->status == 'Administrasi Selesai')
                        <span class="badge bg-success">{{ $asesmen->status }}</span>
                    @elseif($asesmen->status == 'Menunggu')
                        <span class="badge bg-warning text-dark">{{ $asesmen->status }}</span>
                    @else
                        <span class="badge bg-danger">{{ $asesmen->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('asesmen.show', $asesmen->id) }}" class="btn btn-sm btn-warning">👁</a>
                    <a href="{{ route('asesmen.edit', $asesmen->id) }}" class="btn btn-sm btn-info">✏️</a>
                    <form action="{{ route('asesmen.destroy', $asesmen->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">🗑</button>
                    </form>
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
