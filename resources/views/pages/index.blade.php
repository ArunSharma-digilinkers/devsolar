@extends('layouts.main')

@section('content')

<div class="main-wrapper">

    <div id="mainSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('img/banner-1.jpg') }}" class="d-block w-100" alt="Slide 1">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/devsolar-banner-2.jpg') }}" class="d-block w-100" alt="Slide 1">
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

    <section class="Product-wrapper section-entry" data-aos="fade-up">
        <div class="container text-center">

            <h2 class="fw-bold mb-4">Our Products</h2>

            <div class="row justify-content-center g-4">

                <!-- Item -->
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="product-circle">
                        <img src="{{ asset('img/solar-panel.svg') }}">
                    </div>
                    <p class="mt-2">Solar Panel</p>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="product-circle">
                        <img src="{{ asset('img/hybrid-inverter.svg') }}">
                    </div>
                    <p class="mt-2">Hybrid 8G Inverter</p>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="product-circle">
                        <img src="{{ asset('img/9g.svg') }}">
                    </div>
                    <p class="mt-2">Hybrid 9G Inverter</p>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="product-circle">
                        <img src="{{ asset('img/lithium-battery.svg') }}">
                    </div>
                    <p class="mt-2">Lithium PO4 Battery</p>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="product-circle">
                        <img src="{{ asset('img/solar_ac.svg') }}">
                    </div>
                    <p class="mt-2">Solar AC</p>
                </div>

            </div>
        </div>
    </section>

    <section class="hm-about-wrapper section-entry" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">

                <!-- IMAGE -->
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('img/owner.jpeg') }}" class="img-fluid rounded shadow">
                </div>

                <!-- TEXT -->
                <div class="col-md-6 mb-3">
                    <h2 class="fw-bold mb-3">About Us</h2>
                    <p>
                        Devsol Energy Pvt Ltd, established in 2019 by Mr. Deepak Chaudhary, a renowned solar expert in
                        India often referred to as the “Solar Guru,” is a leading solar energy company committed to
                        transforming the nation’s energy landscape. Along with his associate Mr. Vijaypal Singh, he
                        envisions a cleaner, greener future for India through sustainable energy solutions and
                        eco-friendly practices.
                    </p>

                    <p>
                        With an impressive 17-year background in manufacturing lead-acid battery plates and batteries,
                        Mr. Chaudhary has successfully built Devsol Energy Pvt Ltd into a trusted and prominent name in
                        the solar industry. The company offers a comprehensive range of advanced products, including
                        N-type solar panels, lithium batteries, solar air conditioners, and both off-grid and hybrid
                        solar inverters.
                    </p>

                    <p>
                        Driven by a strong commitment to quality and innovation, Devsol Energy Pvt Ltd has established a
                        wide network of over 1150 dealers and earned the trust of more than 10 lakh satisfied customers.
                        The company continues to stand as a symbol of reliability, excellence, and dedication to
                        promoting renewable energy and environmental sustainability across India.
                    </p>

                    <a href="#" class="btn default-btn mt-2">Read More</a>
                </div>

            </div>
        </div>
    </section>

    <div class="product-wrapper section-entry" data-aos="fade-up">
        <div class="container">
            <div class="row g-4">
                <h2 class="fw-bold mb-4 text-center">New Arrival</h2>

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

    <div class="counter-wrapper section-entry">
        <div class="container">
            <div class="row text-center">

                <div class="col-6 col-md-2 counter-box">
                    <h2 class="counter" data-target="4">0</h2>
                    <p>Manufacturing Unit</p>
                </div>

                <div class="col-6 col-md-2 counter-box">
                    <h2 class="counter" data-target="10">0</h2>
                    <p>Years Old Brand</p>
                </div>

                <div class="col-6 col-md-2 counter-box">
                    <h2 class="counter" data-target="1150">0</h2>
                    <p>Dealers in India</p>
                </div>

                <div class="col-6 col-md-3 counter-box">
                    <h2 class="counter" data-target="1058774">0</h2>
                    <p>Satisfied Consumers</p>
                </div>

                <div class="col-6 col-md-3 counter-box">
                    <h2 class="counter" data-target="4.9">0</h2>
                    <p>Google Reviews ⭐⭐⭐⭐⭐</p>
                </div>

            </div>
        </div>
    </div>


    <section class="why-section section-entry" data-aos="fade-up">
        <div class="container">

            <!-- Heading -->
            <div class="text-center mb-5">
                <h2 class="section-title">Why Choose Us</h2>
                <p class="section-subtitle">
                    We deliver reliable, efficient, and customer-focused solar solutions.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="why-card">
                        <div class="icon">
                            <img src="{{ asset('img/performance.png') }}" alt="" class="img-fluid">
                        </div>
                        <h6>High Efficiency Products</h6>
                        <p>We provide top-quality solar panels and batteries for maximum performance.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="why-card">
                        <div class="icon">
                            <img src="{{ asset('img/installation.png') }}" alt="" class="img-fluid">
                        </div>
                        <h6>Expert Installation</h6>
                        <p>Our experienced team ensures smooth and professional installation.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="why-card">
                        <div class="icon">
                            <img src="{{ asset('img/money.png') }}" alt="" class="img-fluid">
                        </div>
                        <h6>Cost Effective</h6>
                        <p>Save on electricity bills with affordable and efficient solar solutions.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="why-card">
                        <div class="icon">
                            <img src="{{ asset('img/customer-service.png') }}" alt="" class="img-fluild">
                        </div>
                        <h6>Customer Support</h6>
                        <p>We offer continuous support and maintenance for long-term reliability.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <div class="testimonial-wrapper section-entry" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <h2 class="fw-bold mb-4 text-center mb-5">Testimonials</h2>

                    <div class="testimonial-carousel owl-carousel owl-theme">

                        <div class="item">
                            <div class="testimonial-card text-center">

                                <!-- Image -->
                                <div class="testimonial-img">
                                    <img src="{{ asset('img/profile.jpg') }}" alt="User">
                                </div>

                                <!-- Name -->
                                <h5 class="testimonial-name">Rahul Sharma</h5>

                                <!-- Designation -->
                                <p class="testimonial-designation">Solar Engineer</p>

                                <!-- Stars -->
                                <div class="testimonial-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>

                                <!-- Review -->
                                <p class="testimonial-text">
                                    Amazing service and top-quality solar products. Installation was smooth and support
                                    team is very helpful. Highly recommended!
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection