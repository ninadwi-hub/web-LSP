@extends('layouts.website')

@section('title', $skema->nama)

@section('content')

{{-- Breadcrumb --}}
<section class="breadcrumbs py-3" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('frontend.skema.index') }}">Skema Sertifikasi</a></li>
        <li class="breadcrumb-item active">{{ $skema->nama }}</li>
      </ol>
    </div>
  </div>
</section>

{{-- Detail Skema --}}
<section class="py-5" style="background-color:#f0fafa;">
  <div class="container">

    <div class="mb-4" style="line-height: 1.8; font-size: 1.05rem; color:#333;">
      <p><strong>Kode Skema :</strong> {{ $skema->kode }}</p>
      <p><strong>Judul Skema :</strong> {{ $skema->nama }}</p>

      @if($skema->file_skema)
    <p>
        <strong>Dokumen Skema :</strong> 
        <a href="{{ asset('THEMES/minia/assets/files/skema_sertifikasi/' . $skema->file_skema) }}" 
           download
           style="color: #00bcd4; text-decoration: none;">
            Download Link
        </a>
    </p>
@endif


      @if($skema->ringkasan)
        <p style="text-align: justify;">
          <strong>Ringkasan Skema :</strong> {!! nl2br(e($skema->ringkasan)) !!}
        </p>
      @endif
    </div>

    {{-- Tombol Pendaftaran --}}
    <div class="mt-4">
      <a href="{{ route('login') }}" class="btn btn-info text-white px-4 py-2" style="font-size: 1rem; border-radius: 6px;">
        Pendaftaran Uji Kompetensi
      </a>
    </div>

    {{-- Daftar Unit Kompetensi --}}
    @if($skema->unitKompetensi->count())
      <h4 class="mt-5">Daftar Unit Kompetensi</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 150px;">Kode Unit</th>
            <th>Judul Unit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($skema->unitKompetensi as $unit)
            <tr>
              <td>{{ $unit->kode_unit }}</td>
              <td>{{ $unit->judul_unit }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada unit kompetensi untuk skema ini.</p>
    @endif

  </div>
</section>
@endsection
