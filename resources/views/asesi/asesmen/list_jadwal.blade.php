@extends('layouts.app')

@section('title', 'Daftar Jadwal Asesmen')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center">
        @forelse($jadwals as $jadwal)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-4" style="overflow: hidden;">

                    {{-- Thumbnail skema --}}
                    @if($jadwal->skema && $jadwal->skema->thumbnail)
                        <img src="{{ asset('storage/' . $jadwal->skema->thumbnail) }}" 
                             class="card-img-top" 
                             alt="{{ $jadwal->skema->nama }}" 
                             style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" 
                             class="card-img-top" 
                             alt="default" 
                             style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body text-center">
                        {{-- Nama Skema --}}
                        <h5 class="card-title fw-semibold text-primary mb-2">
                            {{ $jadwal->skema->nama ?? 'Tanpa Skema' }}
                        </h5>

                        {{-- Informasi Detail --}}
                        <ul class="list-unstyled text-start small mb-3">
                            <li><strong>No. SK:</strong> {{ $jadwal->no_sk }}</li>
                            <li><strong>Tgl Terbit SK:</strong> 
                                {{ \Carbon\Carbon::parse($jadwal->tgl_terbit_sk)->format('d-m-Y') }}
                            </li>
                            <li><strong>Tanggal Asesmen:</strong> 
                                {{ \Carbon\Carbon::parse($jadwal->tanggal_asesmen)->format('d-m-Y') }}
                            </li>
                            <li><strong>Tipe:</strong> {{ $jadwal->tipe }}</li>
                            <li><strong>Kuota:</strong> {{ $jadwal->kuota }}</li>
                            <li><strong>Harga:</strong> Rp{{ number_format($jadwal->harga, 0, ',', '.') }}</li>
                        </ul>

                        {{-- Tombol Daftar --}}
                       <a href="{{ route('asesi.asesmen.create', $jadwal->id) }}" 
                            class="btn btn-outline-primary rounded-pill px-4">
                            Daftar
                            </a>
                    </div>
                </div>
            </div>
        @empty
            {{-- Jika tidak ada jadwal --}}
            <div class="col-12 text-center py-5">
                <img src="{{ asset('THEMES/Medicio/assets/img/logo_lsp.png') }}" alt="empty" style="max-width:150px; opacity:0.8;">
                <h5 class="mt-3 text-muted">Tidak ada jadwal asesmen hari ini</h5>
                <button type="button" class="btn btn-primary mt-3 rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#noJadwalModal">
                    Tambah Pendaftaran
                </button>
            </div>
        @endforelse
    </div>
</div>

{{-- Modal Tidak Ada Jadwal --}}
<div class="modal fade" id="noJadwalModal" tabindex="-1" aria-labelledby="noJadwalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-semibold text-danger" id="noJadwalModalLabel">Tidak Ada Jadwal Asesmen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body text-center">
        <p class="mb-3">Maaf, belum ada jadwal asesmen yang tersedia untuk hari ini.</p>
        <p class="text-muted">Silakan cek kembali di lain waktu.</p>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection
