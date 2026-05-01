@extends('layouts.main')

@section('content')

<div class="main-wrapper">

<div class="banner-wrapper">
    <img src="{{ asset('img/banner-about-us.jpg') }}" alt="" class="img-fluid">
</div>

<section class="hm-about-wrapper section-entry" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">

            <!-- IMAGE -->
            <div class="col-md-6">
                <img src="{{ asset('img/Why-Choose-US.jpg') }}" class="img-fluid rounded shadow">
            </div>

            <!-- TEXT -->
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">About Us</h2>
                <p>
                   Devsol Energy Pvt Ltd, established in 2019 by Mr. Deepak Chaudhary, a renowned solar expert in India often referred to as the “Solar Guru,” is a leading solar energy company committed to transforming the nation’s energy landscape. Along with his associate Mr. Vijaypal Singh, he envisions a cleaner, greener future for India through sustainable energy solutions and eco-friendly practices.
                </p>

                <p>
                    With an impressive 17-year background in manufacturing lead-acid battery plates and batteries, Mr. Chaudhary has successfully built Devsol Energy Pvt Ltd into a trusted and prominent name in the solar industry. The company offers a comprehensive range of advanced products, including N-type solar panels, lithium batteries, solar air conditioners, and both off-grid and hybrid solar inverters.
                </p>

                <p>
                    Driven by a strong commitment to quality and innovation, Devsol Energy Pvt Ltd has established a wide network of over 1150 dealers and earned the trust of more than 10 lakh satisfied customers. The company continues to stand as a symbol of reliability, excellence, and dedication to promoting renewable energy and environmental sustainability across India.
                </p>
            </div>



        </div>
    </div>
</section>

<section class="about-section section-entry" data-aos="fade-up">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="about-title">Who We Are</h2>
            <p class="about-subtitle">
                Powering a sustainable future with innovative solar solutions.
            </p>
        </div>

        <!-- Mission / Vision / Values -->
        <div class="row g-4">

            <div class="col-md-4">
                <div class="about-card">
                    <img src="{{ asset('img/mission.png') }}" alt="" class="img-fluid">
                    <h5>Our Mission</h5>
                    <p>
                        Nexus Solar Energy Pvt Ltd is a leading solar energy company in India, with a wide range of high-quality solar products and services. 
                        We focus on delivering exceptional customer service by understanding unique energy needs and providing tailored solutions.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about-card">
                    <img src="{{ asset('img/value.png') }}" alt="" class="img-fluid">
                    <h5>Our Values</h5>
                    <p>
                        We prioritize sustainability, transparency, and social responsibility. Our commitment is to promote clean energy, reduce carbon emissions, 
                        and maintain ethical practices with respect and integrity.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about-card">
                    <img src="{{ asset('img/vision.png') }}" alt="" class="img-fluid">
                    <h5>Our Vision</h5>
                    <p>
                        Our vision is to provide energy independence and empower lives with sustainable solar power. 
                        We aim to help people adopt renewable energy for a greener future.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

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
</div>

@endsection