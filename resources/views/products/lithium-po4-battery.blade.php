@extends('layouts.main')

@section('content')

<div class="main-wrapper">
    <div class="product-wrapper section-entry" data-aos="fade-up">
        <div class="container">
            <div class="row g-4">
                <h2 class="fw-bold mb-4 text-center">Lithium PO4 Battery</h2>

                  @forelse($products as $product)
                <div class="col-md-3">

                    <div class="product-card-3">

                        <!-- CLICKABLE AREA -->
                        <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">

                            <!-- Image -->
                            <div class="product-img-3">
                                @if($product->image)
                                <img src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->name }}"
                                    class="img-fluid">
                                @else
                                <img src="{{ asset('img/no-image.png') }}" alt="No Image">
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="product-content-3 text-center">

                                <h6 class="product-title">
                                    {{ $product->name }}
                                </h6>

                                <p class="product-category">
                                    {{ $product->category->name ?? 'No Category' }}
                                </p>

                                <div class="price-section">
                                    <span class="new-price">
                                        ₹{{ number_format($product->price) }}
                                    </span>

                                    @if($product->sale_price)
                                    <span class="old-price">
                                        ₹{{ number_format($product->sale_price) }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </a>
                        <!-- Add to Cart (separate, not inside link) -->
                        <div class="p-2">
                            <a href="{{ route('product.show', $product->slug) }}" class="btn pro-btn w-100">
                                Add to Cart
                            </a>
                        </div>
                    </div>

                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No products found</p>
                </div>
                @endforelse
                
            </div>
        </div>
    </div>
</div>

@endsection