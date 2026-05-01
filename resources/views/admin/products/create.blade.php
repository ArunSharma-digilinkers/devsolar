@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')

<div class="main-wrapper py-4">
    <div class="container-fluid">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Add Product</h3>
                <small class="text-muted">Create and manage product details</small>
            </div>

            <a href="{{ route('products.index') }}" class="btn btn-light border">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">

                <!-- LEFT SIDE -->
                <div class="col-lg-8">

                    <!-- Basic Info -->
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Basic Information</h6>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-select" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter product name"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Short Descriptions</h6>
                            <textarea name="short_description" class="form-control mb-3 ckeditor"
                                placeholder="Short Description"></textarea>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Long Description</h6>
                            <textarea name="description" class="form-control mb-3 ckeditor"
                                placeholder="Description"></textarea>
                        </div>
                    </div>


                         <!-- Description -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Technical Feature</h6>
                            <textarea name="technical_features" class="form-control mb-3 ckeditor"
                                placeholder="Technical Feature"></textarea>
                        </div>
                    </div>

                           <!-- Description -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Product Warranty</h6>
                            <textarea name="warranty" class="form-control ckeditor"
                                placeholder="Product Warranty"></textarea>
                        </div>
                    </div>

                    <!-- ✅ ADD-ON PRODUCTS (FIXED POSITION) -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">

                            <h6 class="fw-bold mb-3">Add-on Products</h6>

                            <select name="addons[]" class="form-select" multiple>
                                @foreach ($products as $addon)
                                <option value="{{ $addon->id }}">
                                    {{ $addon->name }} (₹{{ $addon->price }})
                                </option>
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

                    <!-- Images -->
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Images</h6>

                            <!-- Featured Image (Required) -->
                            <label class="form-label">Featured Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control mb-2" required>

                            <!-- Gallery Images (Optional) -->
                            <label class="form-label">Gallery Images</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Pricing</h6>

                            <!-- Price (Required) -->
                            <label class="form-label">Price <span class="text-danger">*</span></label>
                            <input type="number" name="price" class="form-control mb-2" placeholder="Price" required
                                min="0" step="0.01">

                            <!-- MRP (Optional) -->
                            <label class="form-label">MRP</label>
                            <input type="number" name="sale_price" class="form-control" placeholder="MRP" min="0"
                                step="0.01">
                        </div>
                    </div>

                    <!-- Inventory -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Inventory</h6>

                            <!-- Quantity (Required) -->
                            <label class="form-label">Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="quantity" class="form-control mb-2" placeholder="Quantity"
                                required min="0">

                            <!-- HSN Code (Optional) -->
                            <label class="form-label">HSN Code</label>
                            <input type="text" name="hsn_code" class="form-control" placeholder="HSN Code">
                        </div>
                    </div>
                    <!-- Tax & Shipping -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Tax & Shipping</h6>

                            <input type="number" name="gst_percentage" class="form-control mb-2"
                                placeholder="Gst Percentage">

                            <select name="gst_type" class="form-select mb-2">
                                <option value="inclusive">GST Inclusive</option>
                                <option value="extra">GST Extra</option>
                            </select>

                            <select name="shipping_type" class="form-select mb-2" id="shipping-type"
                                onchange="toggleShippingRate()">
                                <option value="free">Free Shipping</option>
                                <option value="zone">Paid Shipping</option>
                            </select>

                            <input type="number" name="shipping_rate" id="shipping-rate-wrap" class="form-control"
                                placeholder="Shipping Rate" style="display:none;">
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="card border-0 shadow-sm rounded-3 mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Status</h6>

                            <select name="status" class="form-select mb-2">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>

                            <div class="form-check mt-2">
                                <input type="checkbox" name="is_new_arrival" class="form-check-input">
                                <label class="form-check-label">New Arrival</label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Actions -->
            <div class="text-end mt-4">
                <button class="btn btn-success px-5 shadow-sm">
                    <i class="fas fa-save me-2"></i> Save Product
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