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
            <thead class="thead-light">
                <tr>
                    <th style="width:60px">#</th>
                    <th>Token</th>
                    <th style="width:60px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tokens as $index => $token)
                <tr>
                    {{-- nomor urut mengikuti pagination --}}
                    <td>{{ $tokens->firstItem() + $index }}</td>
                    <td>{{ $token->token }}</td>
                    <td>
                        <form action="{{ route('sa.tokens.destroy', $token->id) }}" method="POST" onsubmit="return confirm('Yakin hapus token ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada token</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- pagination links --}}
        <div class="d-flex justify-content-center">
            {{ $tokens->links() }}
        </div>


        @endsection