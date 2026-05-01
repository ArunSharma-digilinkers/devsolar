@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')

<div class="main-wrapper py-4">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Gallery</h2>
                <small class="text-muted">Manage your gallery images</small>
            </div>

            <a href="{{ route('gallery.create') }}" class="btn btn-success shadow-sm">
                <i class="fas fa-plus me-2"></i> Add Image
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Gallery Grid --}}
        <div class="row g-4">

            @forelse($galleries as $gallery)
                <div class="col-xl-3 col-lg-4 col-md-6">

                    <div class="gallery-card">

                        {{-- Image --}}
                        <div class="gallery-img">
                            <img src="{{ asset('storage/'.$gallery->image) }}" alt="Gallery">
                        </div>

                        {{-- Actions --}}
                        <div class="gallery-actions">

                            <a href="{{ route('gallery.edit', $gallery->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('gallery.destroy', $gallery->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>

                    </div>

                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>No images found</h5>
                    <p class="text-muted">Start by adding your first gallery image</p>
                </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $galleries->links() }}
        </div>

    </div>
</div>

@endsection