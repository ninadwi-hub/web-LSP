@extends('layouts.app')

@section('title', 'Administrasi Uji Kompetensi')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Administrasi Uji Kompetensi</h4>

    {{-- 🔘 Tombol Aksi --}}
    <div class="mb-3 d-flex gap-2">
        <button id="btnEdit" class="btn btn-warning">
            <i class="fa fa-edit"></i> Edit
        </button>
        <button id="btnDelete" class="btn btn-danger">
            <i class="fa fa-trash"></i> Delete
        </button>
        <a href="{{ route('sa.sertifikasi.administrasi_ujk.export') }}" class="btn btn-success">
            <i class="fa fa-file-excel"></i> Export Excel Selected
        </a>
    </div>

    {{-- 🔍 Filter Status --}}
    <form method="GET" action="{{ route('sa.sertifikasi.administrasi_ujk.index') }}" class="mb-3 d-flex align-items-center gap-2">
        <label>Status:</label>
        <select name="status" onchange="this.form.submit()" class="form-select w-auto">
            <option value="">Semua</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="belum" {{ request('status') == 'belum' ? 'selected' : '' }}>Belum</option>
        </select>
    </form>

    {{-- 📋 Tabel Data --}}
    <div class="card">
        <div class="card-body">
            <table id="tableAdministrasi" class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="30"><input type="checkbox" id="checkAll"></th>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Skema Sertifikasi</th>
                        <th>Nama Lengkap</th>
                        <th>Administrasi Status</th>
                        <th>Sumber Dana</th>
                        <th>Jumlah Bayar</th>
                        <th>Bukti Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($asesmens as $key => $a)
                    <tr>
                        <td><input type="checkbox" class="checkItem" value="{{ $a->id }}"></td>
                        <td>{{ $loop->iteration + ($asesmens->currentPage() - 1) * $asesmens->perPage() }}</td>
                        <td>{{ \Carbon\Carbon::parse($a->created_at)->format('d-m-Y') }}</td>
                        <td>{{ $a->skema ?? '-' }}</td>
                        <td>{{ $a->biodata->nama_lengkap ?? '-' }}</td>
                        <td>{{ $a->status_administrasi ?? 'Belum' }}</td>
                        <td>{{ $a->sumber_dana ?? '-' }}</td>
                        <td>{{ $a->jumlah_bayar ?? '0' }}</td>
                        <td>
                            @if ($a->bukti_bayar)
                                <a href="{{ asset('storage/' . $a->bukti_bayar) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
                            @else
                                <span>-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Tidak ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- 🔁 Pagination --}}
            <div class="mt-3">
                {{ $asesmens->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Pilih semua checkbox
    document.getElementById('checkAll').addEventListener('change', function() {
        const isChecked = this.checked;
        document.querySelectorAll('.checkItem').forEach(cb => cb.checked = isChecked);
    });

    // Tombol edit (redirect ke edit pertama yang dipilih)
    document.getElementById('btnEdit').addEventListener('click', function() {
        const selected = Array.from(document.querySelectorAll('.checkItem:checked')).map(cb => cb.value);
        if (selected.length === 1) {
            window.location.href = `/sa/sertifikasi/administrasi_ujk/${selected[0]}/edit`;
        } else {
            alert('Pilih 1 data untuk diedit.');
        }
    });

    // Tombol delete (konfirmasi hapus)
    document.getElementById('btnDelete').addEventListener('click', function() {
        const selected = Array.from(document.querySelectorAll('.checkItem:checked')).map(cb => cb.value);
        if (selected.length > 0) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                // Di sini nanti bisa dibuat AJAX delete
                alert('Fungsi delete masih belum diimplementasi.');
            }
        } else {
            alert('Pilih minimal 1 data untuk dihapus.');
        }
    });
</script>
@endpush
