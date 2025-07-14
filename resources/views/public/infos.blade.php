@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Daftar Informasi Publik</h2>

    <!-- Filter Dropdown -->
    <div class="mb-4">
        <label for="filterKategori" class="form-label">Filter Kategori</label>
        <select id="filterKategori" class="form-select">
            <option value="all">Semua Kategori</option>
            @foreach ($kategoris as $kategori)
                <option value="kategori-{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>

    <!-- Daftar Info per Kategori -->
    @foreach ($kategoris as $kategori)
        @if ($kategori->infos->count())
        <div class="kategori-block mb-5" data-kategori="kategori-{{ $kategori->id }}">
            <h4 class="mb-3">{{ $kategori->nama }}</h4>
            <div class="list-group">
                @foreach ($kategori->infos as $info)
                    <a href="{{ route('info.show', $info->id) }}" class="list-group-item list-group-item-action">
                        <h6 class="mb-1">{{ $info->judul }}</h6>
                        <small class="text-muted">{{ $info->created_at->format('d M Y') }}</small>
                        <p class="mb-1">{{ Str::limit(strip_tags($info->konten), 100) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('filterKategori').addEventListener('change', function () {
        const selected = this.value;
        document.querySelectorAll('.kategori-block').forEach(function (block) {
            if (selected === 'all' || block.dataset.kategori === selected) {
                block.style.display = '';
            } else {
                block.style.display = 'none';
            }
        });
    });
</script>
@endpush
