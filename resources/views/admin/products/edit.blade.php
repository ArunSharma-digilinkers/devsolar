@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

<div class="main-wrapper py-4">
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Edit Product</h3>
            <small class="text-muted">Update product details</small>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-light border">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>
    </div>

    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">

        <!-- LEFT SIDE -->
        <div class="col-lg-8">

            <!-- Basic Info -->
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Basic Information</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Category</label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name"
                                value="{{ old('name', $product->name) }}"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Descriptions -->
            <div class="card border-0 shadow-sm rounded-3 mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Descriptions</h6>

                    <textarea name="short_description" class="form-control ckeditor mb-3">
                        {{ old('short_description', $product->short_description) }}
                    </textarea>

                    <textarea name="description" class="form-control ckeditor mb-3">
                        {{ old('description', $product->description) }}
                    </textarea>

                    <textarea name="technical_features" class="form-control ckeditor mb-3">
                        {{ old('technical_features', $product->technical_features) }}
                    </textarea>

                    <textarea name="warranty" class="form-control ckeditor">
                        {{ old('warranty', $product->warranty) }}
                    </textarea>
                </div>
            </div>

            <!-- Gallery -->
            <div class="card border-0 shadow-sm rounded-3 mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Gallery Images</h6>

                    <input type="file" name="images[]" class="form-control mb-3" multiple>

                    <div class="row">
                        @foreach ($product->images ?? [] as $img)
                        <div class="col-3 mb-3 text-center" id="img-{{ $loop->index }}">
                            <div class="position-relative">
                                <img src="{{ asset('storage/products/gallery/'.$img) }}"
                                    class="img-thumbnail w-100">

                                <button type="button"
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                    onclick="removeImage('{{ $img }}', {{ $loop->index }})">
                                    ×
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- ADD-ON PRODUCTS -->
<div class="card border-0 shadow-sm rounded-3 mt-4">
    <div class="card-body">

        <h6 class="fw-bold mb-3">Add-on Products</h6>

        <select name="addons[]" class="form-select" multiple>
            @foreach ($products as $addon)
                @if($addon->id != $product->id)
                    <option value="{{ $addon->id }}"
                        {{ $product->addons->contains($addon->id) ? 'selected' : '' }}>
                        {{ $addon->name }} (₹{{ $addon->price }})
                    </option>
                @endif
            @endforeach
        </select>

        <small class="text-muted">
            Hold <b>Ctrl</b> to select multiple add-ons.
        </small>

    </div>
</div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-4">

            <!-- Image -->
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Main Image</h6>

                    <input type="file" name="image" class="form-control mb-2">

                    @if ($product->image)
                    <img src="{{ asset('storage/products/'.$product->image) }}"
                        class="img-fluid rounded border">
                    @endif
                </div>
            </div>

            

            <!-- Pricing -->
            <div class="card border-0 shadow-sm rounded-3 mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Pricing</h6>

                    <input type="number" name="price"
                        value="{{ $product->price }}"
                        class="form-control mb-2" placeholder="Price">

                    <input type="number" name="sale_price"
                        value="{{ $product->sale_price }}"
                        class="form-control" placeholder="MRP">
                </div>
            </div>

            
            <!-- Inventory -->
            <div class="card border-0 shadow-sm rounded-3 mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Inventory</h6>

                    <input type="number" name="quantity"
                        value="{{ $product->quantity }}"
                        class="form-control mb-2">

                    <input type="text" name="hsn_code"
                        value="{{ $product->hsn_code }}"
                        class="form-control" placeholder="HSN Code">
                </div>
            </div>

            <!-- Tax & Shipping -->
            <div class="card border-0 shadow-sm rounded-3 mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Tax & Shipping</h6>

                    <input type="number" name="gst_percentage"
                        value="{{ $product->gst_percentage }}"
                        class="form-control mb-2">

                    <select name="gst_type" class="form-select mb-2">
                        <option value="inclusive" {{ $product->gst_type == 'inclusive' ? 'selected' : '' }}>Inclusive</option>
                        <option value="extra" {{ $product->gst_type == 'extra' ? 'selected' : '' }}>Extra</option>
                    </select>

                    <select name="shipping_type" class="form-select mb-2"
                        onchange="toggleShippingRate()" id="shipping-type">
                        <option value="free" {{ $product->shipping_type == 'free' ? 'selected' : '' }}>Free</option>
                        <option value="zone" {{ $product->shipping_type == 'zone' ? 'selected' : '' }}>Paid</option>
                    </select>

                    <input type="number" name="shipping_rate"
                        value="{{ $product->shipping_rate }}"
                        class="form-control"
                        id="shipping-rate-wrap"
                        style="{{ $product->shipping_type == 'zone' ? '' : 'display:none;' }}">
                </div>
            </div>

            

            <!-- Status -->
            <div class="card border-0 shadow-sm rounded-3 mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Status</h6>

                    <select name="status" class="form-select mb-2">
                        <option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactive</option>
                    </select>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            name="is_new_arrival"
                            {{ $product->is_new_arrival ? 'checked' : '' }}>
                        <label class="form-check-label">New Arrival</label>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Actions -->
    <div class="text-end mt-4">
        <button class="btn btn-warning px-5 shadow-sm">
            <i class="fas fa-save me-2"></i> Update Product
        </button>
    </div>

    </form>

</div>
</div>

<script>
function toggleShippingRate() {
    let el = document.getElementById('shipping-rate-wrap');
    el.style.display = document.getElementById('shipping-type').value === 'zone' ? 'block' : 'none';
}
</script>

@endsection