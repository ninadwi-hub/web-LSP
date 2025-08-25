@extends('layouts.website')
@section('title', 'Kontak')

@section('content')
<section class="py-5">
  <div class="container">
    <h2 class="mb-4 text-center">Kontak Kami</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @include('partials.contact-section')

  </div>
</section>
@endsection
