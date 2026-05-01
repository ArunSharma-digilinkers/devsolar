@extends('layouts.admin')

@section('title', 'Products')

@section('content')

<div class="main-wrapper py-4">
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Products</h3>
            <p class="text-muted small mb-0">Manage your product inventory</p>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-2"></i> Add Product
        </a>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow rounded-3">
        <div class="card-body p-0">

            <table class="table align-middle table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4">#</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)
                        <tr>

                            <td class="px-4">{{ $loop->iteration }}</td>

                            <!-- Product Info -->
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        @if ($product->image)
                                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                                width="55" height="55"
                                                class="rounded border object-fit-cover">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                                style="width:55px;height:55px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <div>
                                        <div class="fw-semibold">{{ $product->name }}</div>
                                        <small class="text-muted">ID: #{{ $product->id }}</small>
                                    </div>
                                </div>
                            </td>

                            <!-- Category -->
                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $product->category->name ?? 'N/A' }}
                                </span>
                            </td>

                            <!-- Price -->
                            <td>
                                <div class="fw-semibold text-success">
                                    ₹{{ number_format($product->price) }}
                                </div>
                                <small class="text-muted text-decoration-line-through">
                                    ₹{{ number_format($product->sale_price) }}
                                </small>
                            </td>

                            <!-- Stock -->
                            <td>
                                @if($product->quantity > 10)
                                    <span class="badge bg-success-subtle text-success">
                                        In Stock ({{ $product->quantity }})
                                    </span>
                                @elseif($product->quantity > 0)
                                    <span class="badge bg-warning-subtle text-warning">
                                        Low Stock ({{ $product->quantity }})
                                    </span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger">
                                        Out of Stock
                                    </span>
                                @endif
                            </td>

                            <!-- Status -->
                            <td>
                                @if ($product->status)
                                    <span class="badge bg-success-subtle text-success">
                                        ● Active
                                    </span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">
                                        ● Inactive
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="text-end pe-4">
                                <a href="{{ route('products.edit', $product) }}"
                                    class="btn btn-sm btn-light border me-2">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <form action="{{ route('products.destroy', $product) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this product?')"
                                        class="btn btn-sm btn-light border text-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-box-open fa-2x mb-3"></i>
                                    <p class="mb-1">No products found</p>
                                    <small>Start by adding your first product</small>
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