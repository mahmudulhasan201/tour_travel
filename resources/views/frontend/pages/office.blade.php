@extends('frontend.master')
@section('content')


<section id="call-to-action" class="call-to-action section light-background">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="newsletter-section" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-12 text-center" data-aos="fade-right" data-aos-delay="200" style="padding-bottom: 20px;">
                <div class="content">
                    <h1>Our Global Office</h1>
                </div>
            </div>
            @foreach($offices as $office)
            <div class="newsletter-card">
                <div class="newsletter-content">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="content">
                            <h3>{{$office->country}}</h3>
                            <h3>{{$office->city}}</h3>
                            <h3>{{$office->office_address}}</h3>
                            <p>{{$office->video_link}}</p>
                            <p>Contacts:</p>
                            <ul>
                                @foreach((array)$office->contacts as $contact)
                                <li>{{ $contact }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!--Map Section-->
                        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                            <div class="about-map">
                                <p>{{$office->map_link}}</p>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        <br><br>
    </div>
</section>


@endsection