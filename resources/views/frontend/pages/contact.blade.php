@extends('frontend.master')
@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/travel/showcase-8.webp);">
    <div class="container position-relative">
        <h1>Contact</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{route('homepage')}}">Home</a></li>
                <li class="current">Contact</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="contact-info-box p-4 shadow-sm rounded bg-white d-flex align-items-center justify-content-between flex-wrap mb-5">

            <!-- Left Column -->
            <div class="d-flex align-items-center mb-3 mb-lg-0">
                <div class="icon-box me-3">
                    <img src="{{url('frontend/icon.png')}}" height="60" width="60" alt="icon" class="rounded-circle" style="object-fit: cover;">
                </div>
                <div class="info-content">
                    <h4 class="mb-1">Shahriar Alom</h4>
                    <p class="mb-0 text-muted">Managing Director, Shahriar Worldwide Ventures</p>
                </div>
            </div>

            <!-- Middle Column -->
            <div class="text-center flex-grow-1 mx-3">
                <h5 class="mb-0" style="font-size: 1rem; color: #2c3e50;">
                    I’m Always Ready to consult you<br>through WhatsApp 24×7
                </h5>
            </div>

            <!-- Right Column -->
            <div class="d-flex align-items-center justify-content-end">
                <i class="bi bi-telephone-fill me-2" style="font-size: 1.2rem; color: #2c3e50;"></i>
                <span style="color: #2c3e50; font-weight: 500;">+855 96 822 5091</span>
            </div>

        </div>
    </div>

    <!-- Google Maps (Full Width) -->
    <div class="map-section" data-aos="fade-up" data-aos-delay="200">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.234567!2d90.3660!3d23.7525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0f8e1234567%3A0xabcdef1234567890!2sShahriar+Worldwide+Venture!5e0!3m2!1sen!2sbd!4v1692712345678!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>

    <!-- Contact Form Section (Overlapping) -->
    <div class="container form-container-overlap">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-10">
                <div class="contact-form-wrapper">
                    <h2 class="text-center mb-4">Send Us Message</h2>
                    <h5 class="text-center mb-4">We will reply to you as soon as possible.</h5>

                    <form action="{{route('contact.store')}}" method="post">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <i class="bi bi-person"></i>
                                        <input type="text" class="form-control" name="name" placeholder="Your Name" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <i class="bi bi-envelope"></i>
                                        <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <i class="bi bi-telephone"></i>
                                        <input type="tel" class="form-control" name="phone" placeholder="Phone" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <i class="bi bi-chat-dots message-icon"></i>
                                        <textarea type="text" class="form-control" name="message" placeholder="Write Message..." style="height: 180px" required></textarea>
                                    </div>
                                </div>
                            </div>

                    

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</section><!-- /Contact Section -->

@endsection