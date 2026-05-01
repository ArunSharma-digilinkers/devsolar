@extends('layouts.admin')

@section('title', 'Add Coupon')

@section('content')

<div class="main-wrapper py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Add Gallery</h2>
            </div>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

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
                <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                        <!-- Images -->
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Images</h6>

                            <!-- Featured Image (Required) -->
                            <label class="form-label">Gallery Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control mb-2" required>
                        </div>
                    </div>

                    <button class="btn btn-success mt-4">
                        <i class="fas fa-save me-2"></i> Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
