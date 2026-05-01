@extends('layouts.main')

@section('content')

<div class="main-wrapper py-5">
    <div class="container">

        <h2 class="text-center fw-bold mb-5">Gallery</h2>

        <div class="row g-4">

            @forelse($galleries as $gallery)
                <div class="col-lg-3 col-md-4 col-6">

                    <div class="gallery-item">
                        <img src="{{ asset('storage/'.$gallery->image) }}" class="gallery-img img-fluid" onclick="openLightbox('{{ asset('storage/'.$gallery->image) }}')">
                    </div>

                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No images found</p>
                </div>
            @endforelse

        </div>

    </div>
</div>

{{-- Lightbox --}}
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close">&times;</span>
    <img id="lightbox-img">
</div>

@endsection