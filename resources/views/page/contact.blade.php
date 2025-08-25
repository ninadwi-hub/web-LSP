@extends('layouts.website')

@section('title', 'Kontak')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Kontak</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    @include('layouts.partials.contact-section')
@endsection
