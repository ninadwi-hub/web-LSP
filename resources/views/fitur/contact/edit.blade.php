@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Ubah Status Pesan</h3>

    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diproses" {{ $contact->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $contact->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
