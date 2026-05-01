@extends('layouts.admin')

@section('title', 'Edit Gallery')

@section('content')

<div class="main-wrapper py-4">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Edit Gallery</h2>
            </div>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

        {{-- Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">

                <form method="POST" action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Image Section --}}
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Gallery Image</h6>

                            {{-- Current Image --}}
                            @if($gallery->image)
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('storage/'.$gallery->image) }}"
                                         alt="Gallery Image"
                                         style="max-height: 150px; border-radius: 8px;">
                                </div>
                            @endif

                            {{-- Upload New --}}
                            <label class="form-label">Change Image</label>
                            <input type="file" name="image" class="form-control mb-2">

                            <small class="text-muted">Leave blank if you don't want to change image</small>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button class="btn btn-success mt-4">
                        <i class="fas fa-save me-2"></i> Update
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection