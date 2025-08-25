@extends('layouts.website')

@section('title', $page->title)

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">{{ $page->title }}</h2>

    {{-- Konten statis dari admin --}}
    <div class="mb-4">
        {!! $page->content !!}
    </div>

    {{-- Search box --}}
    <div class="mb-3">
        <input type="text" id="searchBox" class="form-control" placeholder="Cari skema sertifikasi...">
    </div>

    {{-- Data Skema Sertifikasi --}}
    @if($skemaList->isEmpty())
        <p>Belum ada skema sertifikasi yang tersedia.</p>
    @else
    <div class="table-responsive">
        <table id="skemaTable" class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width:50px;" class="text-center"><i class="bi bi-gear"></i></th>
                    <th>Skema Sertifikasi</th>
                    <th>Jumlah Unit</th>
                    <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skemaList as $skema)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('skema.detail', $skema->id) }}" class="text-dark">
                            <i class="bi bi-search"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('skema.detail', $skema->id) }}" class="text-info fw-semibold">
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

{{-- Script pencarian --}}
<script>
document.getElementById('searchBox').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#skemaTable tbody tr");
    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });
});
</script>
@endsection
