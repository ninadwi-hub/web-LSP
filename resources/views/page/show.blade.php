@extends('layouts.website') 
@section('title', $page->title)

@section('meta')
    @if ($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    @if ($page->meta_keywords)
        <meta name="keywords" content="{{ $page->meta_keywords }}">
    @endif
@endsection

@section('content')

<!-- ======= Breadcrumb Section (Sederhana, tanpa judul besar) ======= -->
<section class="breadcrumbs py-3" style="background-color: #eaf7f9;">
  <div class="container">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
      </ol>
    </div>
  </div>
</section>

<!-- ======= Page Section ======= -->
<section id="page" class="page py-5">
  <div class="container" data-aos="fade-up">
    
    {{-- Jika kategori kontak, tampilkan partial kontak --}}
    <div class="page-content mb-4">
      @if($page->category == 'kontak')
        @include('layouts.partials.contact-section')
      @else
        {!! $page->content !!}
      @endif
    </div>

    {{-- Gambar tampil setelah konten --}}
    @if($page->featured_image)
      <div class="text-center">
        <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}" class="img-fluid rounded">
      </div>
    @endif

  </div>
</section>
<!-- End Page Section -->
@endsection
