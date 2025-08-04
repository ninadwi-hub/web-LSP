@extends('layouts.app')

@section('content')
    <h3>Tambah Halaman</h3>

    <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.pages.form')
        
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
