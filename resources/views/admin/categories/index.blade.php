@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="main-wrapper py-4">
    <div class="container-fluid">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Product Categories</h3>
                <p class="text-muted mb-0 small">Manage your product categories easily</p>
            </div>

            <a href="{{ route('categories.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus me-2"></i> Add Category
            </a>
        </div>

        <!-- Card -->
        <div class="card border-0 shadow rounded-3">
            <div class="card-body p-0">

                <table class="table align-middle mb-0 table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                            <tr class="align-middle">

                                <td class="px-4">{{ $loop->iteration }}</td>

                                <td>
                                    <div class="fw-semibold">{{ $category->name }}</div>
                                    <small class="text-muted">Slug: {{ $category->slug }}</small>
                                </td>

                                <td>
                                    @if ($category->status)
                                        <span class="badge bg-success-subtle text-success px-3 py-2">
                                            ● Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                                            ● Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="text-end pe-4">
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="btn btn-sm btn-light border me-2"
                                        title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form action="{{ route('categories.destroy', $category) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Delete this category?')"
                                            class="btn btn-sm btn-light border text-danger"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-folder-open fa-2x mb-3"></i>
                                        <p class="mb-1">No categories found</p>
                                        <small>Create your first category to get started</small>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection