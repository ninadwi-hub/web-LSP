@extends('layouts.website')
@section('title', 'Skema Sertifikasi')

@section('content')
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active">Skema Sertifikasi</li>
      </ol>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h3 class="fw-bold mb-4">Daftar Skema Kompetensi</h3>

    @if($skemaList->isEmpty())
        <p>Belum ada skema sertifikasi yang tersedia.</p>
    @else
    {{-- Search box --}}
    <div class="d-flex justify-content-end mb-3">
      <div class="input-group" style="max-width:300px;">
        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
        <input type="text" id="searchBox" class="form-control" placeholder="search">
      </div>
    </div>

    {{-- Table --}}
    <div class="table-responsive">
      <table id="skemaTable" class="table table-bordered align-middle">
        <thead>
          <tr>
            <th class="text-center" style="width:50px;"><i class="bi bi-gear"></i></th>
            <th>Skema Sertifikasi</th>
            <th>Jumlah Unit</th>
            <th>Jenis</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($skemaList as $skema)
          <tr>
            <td class="text-center">
              <a href="{{ route('frontend.skema.detail', $skema->id) }}" class="text-dark">
                <i class="bi bi-search"></i>
              </a>
            </td>
            <td>
              <a href="{{ route('frontend.skema.detail', $skema->id) }}" class="text-info">
                {{ $skema->nama }}
              </a>
            </td>
            <td>{{ $skema->unit_kompetensi_count }}</td>
            <td>{{ $skema->jenis ?? '-' }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </div>
</section>

{{-- Script pencarian --}}
<script>
document.getElementById('searchBox').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    document.querySelectorAll("#skemaTable tbody tr").forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(filter) ? "" : "none";
    });
});
</script>
@endsection