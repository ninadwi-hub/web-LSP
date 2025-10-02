@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen File Download</h2>

    <a href="{{ route('admin.media.create') }}" class="btn btn-success mb-3">+ Tambah </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Ukuran</th>
                <th>Tipe</th>
                <th>Status</th>
                <th>Download</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($media as $file)
                <tr>
                    <td>{{ $file->title }}</td>
                    <td>{{ number_format($file->file_size / 1024, 2) }} KB</td>
                    <td>{{ strtoupper($file->file_type) }}</td>
                    <td>{{ ucfirst($file->status) }}</td>
                    <td>{{ $file->download_count }}</td>
                    <td>
                        <a href="{{ route('admin.media.edit', $file->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.media.destroy', $file->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus file ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
