@extends('layouts.app') {{-- sesuaikan dengan layout Minia kamu --}}

@section('content')
<div class="container-fluid">
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Token</h4>

        <form action="{{ route('sa.tokens.generate') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary">Generate 15</button>
        </form>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tokens as $token)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $token->token }}</td>
                    <td>
                        @if ($token->used)
                        <span class="badge bg-danger">Used</span>
                        @else
                        <span class="badge bg-success">Unused</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('sa.tokens.destroy', $token->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus token ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bx bx-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $tokens->links('pagination::bootstrap-5') }}
        </div>


        {{-- pagination links --}}
        <div class="d-flex justify-content-center">
            {{ $tokens->links() }}
        </div>


        @endsection