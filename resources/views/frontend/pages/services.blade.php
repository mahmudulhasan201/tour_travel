@extends('frontend.master')
@section('content')


<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/travel/showcase-8.webp);">
        <div class="container position-relative">
            <h1>All Services</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li class="current">All Srvices</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Travel Destination Details Section -->
    <section id="travel-destination-details" class="travel-destination-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Call To Action Section -->
            <section id="call-to-action" class="call-to-action section light-background">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="newsletter-section" data-aos="fade-up" data-aos-delay="300">
                        <div class="col-lg-12 text-center" data-aos="fade-right" data-aos-delay="200" style="padding-bottom: 20px;">
                            <div class="content">
                                <h1>Our All Services</h1>
                            </div>
                        </div>
                        @foreach($services as $service)
                        <div class="newsletter-card">
                            <div class="newsletter-content">
                                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                                    <div class="content">
                                        <h3>{{$service->name}}</h3>
                                        <p>{{$service->description}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                                    <div class="about-image">
                                        <img width="480" src="{{$service->image_url}}" alt="Travel Experience" class="img-fluid rounded-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br><br>
                </div>
            </section><!-- /Call To Action Section -->

        </div>

    </section><!-- /Travel Destination Details Section -->

</main>

@endsection