@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container">
<h3 class="mb-4">Edit User</h3>

@if ($errors->any())
<div class="alert alert-danger">
<strong>Ups!</strong> Ada beberapa masalah dengan inputan Anda:<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('users.update', $user->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
<label for="name" class="form-label">Nama Lengkap</label>
<input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
</div>

<div class="mb-3">
<label for="email" class="form-label">Alamat Email</label>
<input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
</div>

<div class="mb-3">
<label for="role" class="form-label">Role</label>
<select name="role" class="form-select" required>
<option value="">-- Pilih Role --</option>
<option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
<option value="dosen" {{ old('role', $user->role) == 'dosen' ? 'selected' : '' }}>Dosen</option>
<option value="mahasiswa" {{ old('role', $user->role) == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
</select>
</div>

<div class="mb-3">
<label for="password" class="form-label">Kata Sandi (Kosongkan jika tidak ingin mengubah)</label>
<input type="password" name="password" class="form-control" minlength="6">
</div>

<div class="mb-3">
<label for="password_confirmation" class="form-label">Ulangi Kata Sandi</label>
<input type="password" name="password_confirmation" class="form-control" minlength="6">
</div>

<a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
<button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection
