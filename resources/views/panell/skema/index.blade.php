@extends('layouts.app')

@section('title', 'Manajemen Skema Sertifikasi')

@section('content')
<div class="container py-4">
  <!-- Judul -->
  <h3>Manajemen Skema Sertifikasi</h3>

  <!-- Tombol tambah -->
  <div class="mb-3 mt-2">
    <a href="{{ route('panell.skema.create') }}" class="btn btn-primary">
      <i class="bx bx-plus"></i> Tambah
    </a>
  </div>

  <!-- Alert sukses -->
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <!-- Tabel skema -->
  <div class="table-responsive">
    <table class="table table-bordered align-middle table-striped">
      <thead class="table-dark text-center">
        <tr>
          <th>ID</th>
          <th>Nama Skema</th>
          <th>Kode</th>
          <th>Jenis</th>
          <th>Ringkasan</th>
          <th>PDF</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($skemas as $s)
          <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $s->nama }}</td>
            <td class="text-center">{{ $s->kode }}</td>
            <td class="text-center">{{ $s->jenis}}</td>
            <td>{{ Str::limit($s->ringkasan, 50) }}</td>
            <td class="text-center">
              @if($s->file_skema)
                <a target="_blank" href="{{ asset('assets/files/skema_sertifikasi/'.$s->file_skema) }}" class="btn btn-outline-secondary btn-sm">
                  <i class="bx bx-file"></i> Lihat
                </a>
              @else
                <span class="text-muted">-</span>
              @endif
            </td>
            <td class="text-center">
              <div class="btn-group" role="group">
                <a class="btn btn-warning btn-sm" href="{{ route('panell.skema.edit', $s) }}">
                  <i class="bx bx-edit"></i>Edit
                </a>
                <form action="{{ route('panell.skema.destroy', $s) }}" method="POST"
                      onsubmit="return confirm('Hapus skema ini?')" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm">
                    <i class="bx bx-trash"></i>Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-muted">Belum ada data skema.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-end mt-3">
    {{ $skemas->links('pagination::bootstrap-5') }}
  </div>
</div>
@endsection
