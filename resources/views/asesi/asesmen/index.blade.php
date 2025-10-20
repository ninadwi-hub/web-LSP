@extends('layouts.app')

@section('title', 'Pendaftaran Asesmen')

@section('content')
<div class="container">
    <h4 class="mb-3">Pendaftaran Asesmen / Uji Kompetensi</h4>

    <a href="{{ route('asesi.asesmen.list_jadwal') }}" class="btn btn-primary mb-3">+ Tambah</a>

    {{-- 🔽 Tombol FR (APL.01, APL.02, dll) — muncul setelah baris diklik --}}
    <div id="fr-buttons" class="d-none mb-3">
        <a href="#" id="btn-apl01" class="btn btn-success me-2">FR.APL.01</a>
        <a href="#" id="btn-apl02" class="btn btn-info me-2">FR.APL.02</a>
        <a href="#" id="btn-ak01" class="btn btn-warning me-2">FR.AK.01</a>
        <a href="#" id="btn-ak03" class="btn btn-danger">FR.AK.03 Umpan Balik</a>
    </div>

    <table class="table table-bordered table-striped table-hover align-middle" id="table-asesmen">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Skema Sertifikasi</th>
                <th>Kategori/TUK</th>
                <th>Status</th>
                <th width="140px" >Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($asesmens as $i => $asesmen)
            <tr data-id="{{ $asesmen->id }}">
                <td>{{ $asesmens->firstItem() + $i }}</td>
                <td>{{ \Carbon\Carbon::parse($asesmen->jadwal_uji)->format('d-m-Y') }}</td>
                <td>
                    {{ $asesmen->jadwal && $asesmen->jadwal->skema
                        ? $asesmen->jadwal->skema->nama
                        : ($asesmen->tujuan_asesmen ?? 'Tidak ada skema') }}
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
                    <div class="btn btn-group">
                    <a href="{{ route('asesi.asesmen.show', $asesmen->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('asesi.asesmen.edit', $asesmen->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('asesi.asesmen.destroy', $asesmen->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $asesmens->links() }}
</div>

{{-- 🔽 Script agar tombol FR muncul hanya setelah klik baris --}}
<script>
document.querySelectorAll('#table-asesmen tr[data-id]').forEach(row => {
    row.addEventListener('click', function() {
        const id = this.dataset.id;
        const frButtons = document.getElementById('fr-buttons');
        const btnApl01 = document.getElementById('btn-apl01');
        const btnApl02 = document.getElementById('btn-apl02');
        const btnAk01 = document.getElementById('btn-ak01');
        const btnAk03 = document.getElementById('btn-ak03');

        // Munculkan tombol FR
        frButtons.classList.remove('d-none');

        // Ubah link sesuai ID asesmen
        btnApl01.href = `/asesi/apl01/${id}`;
        btnApl02.href = `/asesi/apl02/${id}`;
        btnAk01.href  = `/asesi/ak01/${id}`;
        btnAk03.href  = `/asesi/ak03/${id}`;

        // Highlight baris aktif
        document.querySelectorAll('#table-asesmen tr').forEach(r => r.classList.remove('table-primary'));
        this.classList.add('table-primary');
    });
});
</script>
@endsection
