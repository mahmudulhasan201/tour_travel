@extends('frontend.master')
@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/travel/showcase-8.webp);">
        <div class="container position-relative">
            <h1>Gallery</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li class="current">Gallery</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="gallery-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
                    <li data-filter="*" class="filter-active">All Gallery</li>
                </ul>

                <div class="row gallery-grid isotope-container" data-aos="fade-up" data-aos-delay="300">

                    @foreach($galleries as $gallery)
                    @php
                    $images = json_decode($gallery->images, true);
                    $firstImage = $images[0] ?? null;
                    @endphp
                    @if($firstImage)
                    <div class="col-xl-3 col-md-4 col-sm-6 gallery-item isotope-item filter-nature">
                        <div class="gallery-card">
                            <div class="gallery-image">
                                <img src="{{ asset('images/' . $firstImage) }}" class="img-fluid" alt="">
                            </div>
                            <div class="gallery-overlay">
                                <h4>{{$gallery->name}}</h4>
                                <div class="gallery-actions">
                                    <a href="{{route('gallery.images', $gallery->id)}}"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->
                    @endif
                    @endforeach
                </div>
            </div>

        </div>

    </section><!-- /Gallery Section -->

</main>


@endsection