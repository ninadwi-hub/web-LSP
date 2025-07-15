@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Galeri</h4>

    <form action="{{ route('galeri.store') }}" method="POST">
        @csrf

        @include('panel.galeri._form', ['galeri' => null])

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
