@extends('layouts.website')

@section('title','Unduh')

@section('content')
<section id="download" class="downloads py-5">
  <div class="container">
    <!-- Judul -->
    <div class="section-title text-center mb-4">
      <h2>Unduh</h2>
      <p>Daftar file dokumen yang tersedia untuk diunduh.</p>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th style="width: 25%">Judul</th>
            <th style="width: 35%">Deskripsi</th>
            <th style="width: 20%">Informasi File</th>
            <th style="width: 10%" class="text-center">Unduh</th>
          </tr>
        </thead>
        <tbody>
          @forelse($downloads as $item)
          <tr>
            <td><strong>{{ $item->title }}</strong></td>
            <td>{{ $item->description ?? '-' }}</td>
            <td>
              {{ strtoupper($item->file_type) }}  
              ({{ number_format($item->file_size/1024,2) }} KB)
            </td>
            <td class="text-center">
              <a href="{{ route('downloads.file', $item->slug) }}" 
                 class="btn btn-sm btn-primary">
                 <i class="bi bi-download"></i> Download
              </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="text-center text-muted">
              Belum ada file yang tersedia.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
      {{ $downloads->links() }}
    </div>
  </div>
</section>
@endsection
