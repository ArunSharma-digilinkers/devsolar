@extends('layouts.main')

@section('content')

<div class="main-wrapper">
    <div class="banner-wrapper">
        <img src="{{ asset('img/banner-contact-us.jpg') }}" alt="" class="img-fluid">
    </div>

    <div class="contact-wrapper-info section-entry">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="heading-contact">
                        <h2>
                            Contact Us
                        </h2>
                        <p>
                            Have any questions? We would love to hear from you.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 mt-4">
                    <div class="contact-number-wrap">
                        <h4>
                            Call us for Dealership
                        </h4>
                        <p>
                            For Dealership Uttar Pradesh :-
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91-6396855242"> +91-6396855242</a>,<a
                                href="tel:+91-9259538265"> +91-9259538265</a>
                        </p>
                        <p>
                            For Dealership:- <br>Jharkhand, Punjab, Haryana, Odisha, West Bengal
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91-6396855244"> +91-6396855244</a>,<a
                                href="tel:+91-9528029750"> +91-9528029750</a>
                        </p>
                        <p>
                            For Dealership Other State :-
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91-9528029761">+91-9528029761</a>,<a
                                href="tel:+91-9528029750"> +91-9528029750</a>
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91-9258288614">+91-9258288614</a>,<a
                                href="tel:+91-9259538265">+91-9259538265</a>
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91-6396855247">+91-6396855247</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="contact-number-wrap">
                        <h4>
                            Call us for Sales Enquiry
                        </h4>
                        <p>
                            Get in touch with our sales team to see how we could work together.
                        </p>
                        <p>
                            <i class="fa-solid fa-globe"></i> <a
                                href="mailto:sales@nexussolarenergy.in">sales@nexussolarenergy.in</a>
                        </p>
                        <p>
                            Sales Enquiry :-
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91-6396855243">+91-6396855243</a>, <a
                                href="tel:9528029745">+91-9528029745</a>
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91 9258288615">+91 9258288615</a>, <a
                                href="tel:+91-9258288616,">+91-9258288616</a>
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91-6396855245">+91-6396855245</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="contact-number-wrap">
                        <h4>
                            Help & Support
                        </h4>
                        <p>
                            Our support team is spread across the country to give you answers fast.
                        </p>
                        <p>
                            <i class="fa-solid fa-globe"></i> <a
                                href="mailto:complaint@nexussolarenergy.in">complaint@nexussolarenergy.in</a>
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i> <a href="tel:+91-6396855249">+91-6396855249</a>, <a
                                href="tel:+91-6396855248">+91-6396855248</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="contact-number-wrap">
                        <h4>
                            Address
                        </h4>
                        <p>
                            Our support team is spread across the country to give you answers fast.
                        </p>
                        <p>
                            <b>Office Address :-</b>
                        </p>
                        <p>
                            Chola Choki, Industial Area, Bulandshahr(U.P)-203202
                        </p>
                        <p>
                            <b>Factory Address :- </b>
                        </p>
                        <p>
                            Old G.T. Rd, Shahpur kalan, Uttar Pradesh 203203
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 mt-4">
                    <div class="contact-number-wrap">
                        <h4>
                            Join our team
                        </h4>
                        <p>
                            Are you interested in joining us as our distribution partner. Get in touch.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form-wrapper section-entry">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="contact-card p-4">

                        <h3 class="text-center mb-4 fw-bold">Get in Touch</h3>

                        <form action="#" method="POST">
                            @csrf

                            <div class="row g-3">

                                <!-- NAME -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter your name" required>
                                    </div>
                                </div>

                                <!-- EMAIL -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter your email" required>
                                    </div>
                                </div>

                                <!-- PHONE -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Enter phone number" required>
                                    </div>
                                </div>

                                <!-- ADDRESS -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Enter address">
                                    </div>
                                </div>

                                <!-- MESSAGE -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" rows="4" class="form-control"
                                            placeholder="Write your message"></textarea>
                                    </div>
                                </div>

                                <!-- BUTTON -->
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn-submit px-5">
                                        Send Message
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3511.5333696782577!2d77.76781367505393!3d28.342719975824284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cbb1dd5e3ac5d%3A0xf8686d4d05e49e26!2sDevsol%20Energy!5e0!3m2!1sen!2sin!4v1777014382017!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection