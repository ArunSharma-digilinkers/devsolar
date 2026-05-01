@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')

<div class="main-wrapper py-4">
    <div class="container-fluid">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Edit Category</h3>
                <p class="text-muted small mb-0">Update your category details</p>
            </div>

            <a href="{{ route('categories.index') }}" class="btn btn-light border">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

        <!-- Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card border-0 shadow rounded-3">
                    <div class="card-body p-4">

                        <form method="POST" action="{{ route('categories.update', $category) }}">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Category Name</label>

                                <input type="text"
                                    name="name"
                                    value="{{ old('name', $category->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter category name">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <small class="text-muted">
                                    Slug: {{ \Illuminate\Support\Str::slug(old('name', $category->name)) }}
                                </small>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Status</label>

                                <select name="status"
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>

                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Actions -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('categories.index') }}" class="btn btn-light border">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-warning px-4 shadow-sm">
                                    <i class="fas fa-save me-2"></i> Update
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection