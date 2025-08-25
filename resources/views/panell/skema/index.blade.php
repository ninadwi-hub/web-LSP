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
          <th>Kategori</th>
          <th>Deskripsi</th>
          <th>PDF</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($skemas as $s)
          <tr>
            <td class="text-center">{{ $s->id }}</td>
            <td>{{ $s->nama }}</td>
            <td class="text-center">{{ $s->kode }}</td>
            <td class="text-center">{{ $s->kategori }}</td>
            <td>{{ Str::limit($s->deskripsi, 100) }}</td>
            <td class="text-center">
              @if($s->pdf_path)
                <a target="_blank" href="{{ asset('storage/'.$s->pdf_path) }}" class="btn btn-outline-secondary btn-sm">
                  <i class="bx bx-file"></i> Lihat
                </a>
              @else
                <span class="text-muted">-</span>
              @endif
            </td>
            <td class="text-center">
              <div class="btn-group" role="group">
                <a class="btn btn-warning btn-sm" href="{{ route('panell.skema.edit', $s) }}">
                  <i class="bx bx-edit"></i>
                </a>
                <form action="{{ route('panell.skema.destroy', $s) }}" method="POST"
                      onsubmit="return confirm('Hapus skema ini?')" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm">
                    <i class="bx bx-trash"></i>
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
