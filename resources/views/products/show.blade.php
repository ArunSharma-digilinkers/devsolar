@extends('layouts.main')

@section('content')
<div class="main-wrapper section-entry">
    <div class="container">

        <div class="row g-5">

            <div class="col-md-6">

                @php
                $gallery = $product->images ?? [];
                @endphp

                <!-- MAIN IMAGE -->
                <div class="border rounded text-center product-main-image mb-3">
                    <img id="mainImage" src="{{ asset('storage/products/' . $product->image) }}"
                        class="img-fluid main-img" alt="{{ $product->name }}">
                </div>

                <!-- THUMBNAILS -->
                <div class="owl-carousel owl-theme gallery-carousel" id="galleryCarousel">

                    <!-- MAIN -->
                    <div class="item">
                        <img src="{{ asset('storage/products/' . $product->image) }}"
                            class="img-thumbnail thumb active-thumb" onclick="changeImage(this, 0)">
                    </div>

                    <!-- GALLERY -->
                    @foreach ($gallery as $index => $img)
                    <div class="item">
                        <img src="{{ asset('storage/products/gallery/' . $img) }}" class="img-thumbnail thumb"
                            onclick="changeImage(this, {{ $index + 1 }})">
                    </div>
                    @endforeach

                </div>

            </div>


            {{-- RIGHT : PRODUCT INFO --}}
            <div class="col-md-6">

                {{-- TITLE --}}
                <h2 class="fw-bold mb-1">{{ $product->name }}</h2>

                <p class="text-muted mb-2">
                    Category: <strong>{{ $product->category->name }}</strong>
                </p>

                {{-- PRICE --}}
                <div class="mb-1">
                    <h3 class="fw-bold pro-name d-inline mb-0">
                        ₹{{ number_format($product->price) }}
                    </h3>

                    @if ($product->sale_price && $product->sale_price > $product->price)

                    <span class="text-muted fs-6 text-decoration-line-through ms-2">
                        ₹{{ number_format($product->sale_price) }}
                    </span>

                    @php
                    $discountPct = floor(
                    (($product->sale_price - $product->price) / $product->sale_price) * 100
                    );
                    @endphp

                    <span class="badge bg-danger ms-2">{{ $discountPct }}% off</span>

                    @endif

                </div>

                <p class="text-muted small mb-3">
                    @if ($product->gst_percentage > 0)
                    @if ($product->gst_type === 'inclusive')
                    Inclusive of GST ({{ rtrim(rtrim(number_format($product->gst_percentage, 2), '0'), '.') }}%)
                    @else
                    + {{ rtrim(rtrim(number_format($product->gst_percentage, 2), '0'), '.') }}% GST extra
                    @endif
                    @else
                    Price inclusive of all taxes
                    @endif
                    <br>
                    @php
                    $shipping = strtolower($product->shipping_type ?? '');
                    @endphp

                    @if($shipping === 'free')
                    Free Shipping
                    @elseif($shipping === 'zone')
                    Shipping charges extra
                    @else
                    Shipping charges extra
                    @endif
                </p>

                {{-- TRUST BADGES --}}
                <div class="trade-assurance-box">

                    <div class="trust-grid">

                        <div class="trust-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Secure Payments</span>
                        </div>

                        <div class="trust-item">
                            <i class="fas fa-truck"></i>
                            <span>Fast Delivery</span>
                        </div>

                        <div class="trust-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Money-back</span>
                        </div>

                        <div class="trust-item">
                            <i class="fas fa-headset"></i>
                            <span>24/7 Support</span>
                        </div>

                        <div class="trust-item">
                            <i class="fas fa-lock"></i>
                            <span>Data Privacy</span>
                        </div>

                    </div>

                </div>
                <div class="product-detail-feature mb-3">
                    {!! $product->short_description ?? '<p>N/A</p>' !!}
                </div>

                @if ($product->quantity > 0)
                {{-- QUANTITY --}}
                <div id="cart-actions" class="mb-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <label class="fw-semibold mb-0">Qty:</label>

                        <div class="qty-box">
                            <button type="button" onclick="changeQty(-1)">−</button>

                            <input type="number" id="product-qty" value="1" min="1" max="{{ $product->quantity }}"
                                readonly>

                            <button type="button" onclick="changeQty(1)">+</button>
                        </div>

                        <small class="text-muted">{{ $product->quantity }} in stock</small>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="d-flex gap-2 flex-wrap align-items-center">

                        <button type="button" class="btn-submit" id="add-to-cart-btn" onclick="addToCart()">
                            Add to cart
                        </button>

                        <button type="button" class="btn-submit" onclick="buyNow()">
                            Buy Now
                        </button>
                    </div>
                </div>
                @else
                {{-- OUT OF STOCK --}}
                <div class="mb-4">
                    <span class="badge bg-danger fs-6 px-3 py-2 mb-3">Out of Stock</span>
                    <div class="d-flex gap-2 flex-wrap align-items-center">
                        <a href="https://wa.me/918595264742?text={{ urlencode('Enquiry about ' . $product->name . ' (Out of Stock)') }}"
                            target="_blank" class="btn-submit">
                            <i class="fab fa-whatsapp me-1"></i> Notify me when available
                        </a>
                    </div>
                </div>
                @endif

                {{-- CART SUCCESS MESSAGE (hidden by default) --}}
                <div id="cart-success-msg" class="mb-4" style="display: none;">
                    <div class="alert alert-success d-flex align-items-center gap-2 mb-3">
                        <i class="fas fa-check-circle"></i>
                        <span>Product added to cart!</span>
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('cart.index') }}" class="btn-submit">
                            <i class="fas fa-shopping-cart me-1"></i> Go to Cart
                        </a>
                        <a href="{{ route('category.products', $product->category->slug)
                            }}" class="btn-submit">
                            Keep Shopping
                        </a>
                    </div>
                </div>

            </div>

            @php
            $tabs = [
            'desc' => ['label' => 'Description', 'content' => $product->description],
            'tech' => ['label' => 'Technical', 'content' => $product->technical_features],
            'war' => ['label' => 'Warranty', 'content' => $product->warranty],
            ];

            // Filter only non-empty tabs
            $tabs = array_filter($tabs, fn($tab) => !empty(trim(strip_tags($tab['content']))));

            // Get first tab key
            $firstTab = array_key_first($tabs);
            @endphp

            @if(count($tabs) > 0)

            <div class="product-tabs mt-5">

                {{-- Buttons --}}
                <div class="tab-buttons">
                    @foreach($tabs as $key => $tab)
                    <button type="button" class="tab-btn {{ $key === $firstTab ? 'active' : '' }}"
                        onclick="openTab(event,'{{ $key }}')">
                        {{ $tab['label'] }}
                    </button>
                    @endforeach
                </div>

                {{-- Content --}}
                @foreach($tabs as $key => $tab)
                <div id="{{ $key }}" class="tab-content {{ $key === $firstTab ? 'active' : '' }}">
                    {!! $tab['content'] !!}
                </div>
                @endforeach

            </div>

            @endif

            {{-- ADD ON PRODUCTS --}}
            @if ($product->addons->count())
            <h3 class="fw-bold mt-5">Add-on Products</h3>

            <div class="row g-4 mt-2">
                @foreach ($product->addons as $addon)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ route('product.show', $addon->slug) }}" class="text-decoration-none text-dark">
                        <div class="card text-center p-3 h-100 addon-card border border-success rounded">
                            <img src="{{ asset('storage/products/' . $addon->image) }}" class="img-fluid mb-3"
                                alt="{{ $addon->name }}" style="height: 180px; object-fit: contain;" loading="lazy">

                            <h6 class="fw-bold mb-2">{{ $addon->name }}</h6>

                            <p class="mb-0">
                                <span class="fw-bold text-success">₹{{ number_format($addon->price) }}</span>
                                @if ($addon->sale_price && $addon->sale_price > $addon->price)
                                <span
                                    class="text-muted text-decoration-line-through small ms-1">₹{{ number_format($addon->sale_price) }}</span>
                                @endif
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endif

        </div>


    </div>
</div>



<script>
function changeImage(el) {
    document.getElementById('mainImage').src = el.src;
    document.querySelectorAll('.thumb').forEach(i => i.classList.remove('active-thumb'));
    el.classList.add('active-thumb');
}

function shareProduct() {
    if (navigator.share) {
        navigator.share({
            title: "{{ $product->name }}",
            text: "Check out this product",
            url: "{{ url()->current() }}"
        });
    } else {
        navigator.clipboard.writeText("{{ url()->current() }}");
        alert('Product link copied!');
    }
}

function changeQty(delta) {
    let input = document.getElementById('product-qty');
    let max = parseInt(input.getAttribute('max')) || 999;
    let val = parseInt(input.value) + delta;
    if (val < 1) val = 1;
    if (val > max) val = max;
    input.value = val;
}

function buyNow() {
    let qty = document.getElementById('product-qty').value;

    fetch("{{ route('cart.add', $product->slug) }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                quantity: qty
            }),
        })
        .then(res => res.json().then(data => ({
            ok: res.ok,
            data
        })))
        .then(({
            ok,
            data
        }) => {
            if (ok && data.success) {
                window.location.href = "{{ route('checkout') }}";
            } else {
                alert(data.message || 'Something went wrong.');
            }
        })
        .catch(() => {
            alert('Something went wrong. Please try again.');
        });
}

function addToCart() {
    let btn = document.getElementById('add-to-cart-btn');
    let qty = document.getElementById('product-qty').value;
    btn.disabled = true;
    btn.textContent = 'Adding...';

    fetch("{{ route('cart.add', $product->slug) }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                quantity: qty
            }),
        })
        .then(res => res.json().then(data => ({
            ok: res.ok,
            data
        })))
        .then(({
            ok,
            data
        }) => {
            if (ok && data.success) {
                document.getElementById('cart-actions').style.display = 'none';
                document.getElementById('cart-success-msg').style.display = 'block';
            } else {
                btn.disabled = false;
                btn.textContent = 'Add to cart';
                alert(data.message || 'Something went wrong.');
            }
        })
        .catch(() => {
            btn.disabled = false;
            btn.textContent = 'Add to cart';
            alert('Something went wrong. Please try again.');
        });
}
</script>


<style>
.thumb {
    width: 70px;
    cursor: pointer;
    border: 2px solid transparent;
}

.active-thumb {
    border-color: #fff;
}

.main-img {
    max-height: 420px;
    object-fit: contain;
}

.addon-card {
    transition: box-shadow 0.2s, transform 0.2s;
}

.addon-card:hover {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transform: translateY(-3px);
}
</style>
@endsection