@extends('frontend.master')
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/travel/showcase-8.webp);">
  <div class="container position-relative">
    <h1>About</h1>
    <p></p>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('homepage')}}" style="color: white;">Home</a></li>
        <li class="current">About</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Travel About Section -->
<section id="travel-about" class="travel-about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-lg-8 mx-auto text-center mb-5">
        <div class="intro-content" data-aos="fade-up" data-aos-delay="200">
          <h2>𝑺𝑯𝑨𝑯𝑹𝑰𝑨𝑹 𝑾𝑶𝑹𝑳𝑫𝑾𝑰𝑫𝑬 𝑽𝑬𝑵𝑻𝑼𝑹𝑬𝑺</h2>
          <p class="lead">This is Shahriar Worldwide Ventures, One of the Best organization
            in Bangladesh, We seek to create close, long lasting and mutually beneficial partnerships
            with all our clients and candidates. We are committed to the highest standards of excellence and
            professionalism. We value and invest in our agency personnel, developing skills and enabling their
            employment aspirations to be fulfilled.
          </p><br>

          <a href="{{ route('contact') }}"
            class="btn btn-lg px-4 py-2.5 fw-bold shadow-sm"
            style="background-color: #4F7CBD; color: #fff; border: none; border-radius: 8px;">
            Get A Consultation
          </a>
        </div>
      </div>
    </div>

    <div class="row align-items-center mb-5">
      <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="300">
        <div class="hero-image">
          <img src="{{url('frontend/assets/img/travel/showcase-7.webp')}}" class="img-fluid" alt="Travel Adventure">
        </div>
      </div>

      <div class="col-lg-6 offset-lg-1" data-aos="slide-left" data-aos-delay="400">
        <div class="story-content">

          <h3>Our Services</h3>
          <p>What started as weekend camping trips among college friends has evolved
            into a global network of travel enthusiasts dedicated to creating extraordinary journeys.
            We believe travel isn't just about seeing new places – it's about connecting with cultures,
            supporting communities, and discovering parts of yourself you never knew existed.
          </p>
          <p>Every expedition we craft is infused with respect for local traditions and a commitment
            to leaving places better than we found them. Our team of cultural ambassadors and adventure
            specialists work hand-in-hand with indigenous guides to offer you authentic experiences
            that most tourists never see.
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="feature-card">
                <div class="feature-front">
                  <div class="feature-icon">
                    <i class="bi bi-people"></i>
                  </div>
                  <h4>Local Partnerships</h4>
                  <p>Direct collaboration with indigenous communities</p>
                </div>
                <div class="feature-back">
                  <p>We work exclusively with local guides who are passionate storytellers
                    and cultural ambassadors, ensuring authentic experiences while supporting local economies.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
              <div class="feature-card">
                <div class="feature-front">
                  <div class="feature-icon">
                    <i class="bi bi-heart-pulse"></i>
                  </div>
                  <h4>Safety First</h4>
                  <p>Comprehensive safety protocols and emergency support</p>
                </div>
                <div class="feature-back">
                  <p>From pre-trip safety briefings to 24/7 emergency response teams,
                    your wellbeing is our top priority on every single adventure.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
              <div class="feature-card">
                <div class="feature-front">
                  <div class="feature-icon">
                    <i class="bi bi-recycle"></i>
                  </div>
                  <h4>Carbon Conscious</h4>
                  <p>Offsetting 150% of travel emissions</p>
                </div>
                <div class="feature-back">
                  <p>Through reforestation projects and renewable energy investments,
                    we ensure every trip contributes positively to environmental restoration.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-12">
        <div class="cta-banner" data-aos="zoom-in" data-aos-delay="300">
          <div class="cta-overlay">
            <div class="cta-content">
              <p>
                “We have Expert Team and they are always ready to Help you”
              </p>
              <img src="{{url('frontend/icon.png')}}" height="80" width="80" alt="icon" class="mb-3">
              <h5 class="text-white">
                Mr. Shahriar
              </h5>
              <h6 class="text-white">
                CEO, Shahriar Worldwide Ventures
              </h6>
              ☎️ +971522169430
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>

@endsection