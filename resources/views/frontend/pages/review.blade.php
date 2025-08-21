@extends('frontend.master')
@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/travel/showcase-8.webp);">
    <div class="container position-relative">
        <h1>Contact</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{route('homepage')}}">Home</a></li>
                <li class="current">Reviews</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Customer Review Section -->
<section id="testimonials-home" class="testimonials-home section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div><span>What Our Customers</span> <span class="description-title">Are Saying</span></div>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="col-md-12">
            <div class="row g-5">
                @foreach($reviews as $review)
                <div class="col-md-4">
                    <div class="testimonial-item" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1); padding:20px; text-align:center; border-radius:10px;">
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>{{$review->review}}</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <img src="{{$review->imageUrl}}" class="testimonial-img" alt="">
                        <h3>{{$review->name}}</h3>
                    </div>
                </div><!-- End testimonial item -->
                @endforeach
            </div>
        </div>
    </div>
</section><!-- /Testimonials Home Section -->

@endsection