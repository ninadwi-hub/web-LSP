@extends('layouts.app')

@section('content')
    <h3>Edit Halaman</h3>

    <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.pages.form', ['page' => $page])
        
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
