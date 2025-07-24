@extends('layouts.app')

@section('title', 'Info')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Info</h3>
    <a href="{{ route('infos.create') }}" class="btn btn-primary mb-3">+ Tambah Info</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Thumbnail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($info as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->kategori->nama }}</td>
                    <td>
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('infos.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('infos.destroy', $item) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ✅ Tampilkan pagination --}}
    <div class="mt-3">
        {{ $info->links() }}
    </div>
</div>
@endsection
