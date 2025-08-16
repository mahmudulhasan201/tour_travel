 @extends('frontend.master')

 @section('content')

 <main class="main">

     <!-- Travel Hero Section -->
     <section id="travel-hero" class="travel-hero section dark-background">

         <div class="hero-background">
             <video autoplay="" muted="" loop="">
                 <source src="{{url('frontend/assets/img/travel/video-2.mp4')}}" type="video/mp4">
             </video>
             <div class="hero-overlay"></div>
         </div>

         <div class="container position-relative">
             <div class="row align-items-center">
                 <div class="col-lg-7">
                     <div class="hero-text" data-aos="fade-up" data-aos-delay="100" style="padding-top: 20px;">
                         <h6 style="font-size: 30px;" class="">Shahriar Worldwide Ventures</h6>
                         <p class="hero-subtitle">One of the Best organizations in the Bangladesh, We seek to create close, long-lasting and mutually beneficial partnerships with all our clients and candidates. We are committed to the highest standards of excellence and professionalism. We value and invest in our agency personnel, developing skills and enabling their employment aspirations to be fulfilled.</p>
                         <p class="hero-subtitle">Our aim is simple; to provide skilled candidates, flexible and adaptable, with the ability to perform a premier service for all our clients, no matter the time, 365 days a year.</p>
                         <!-- <div class="hero-buttons"> 
                             <a href="#" class="btn btn-primary me-3">Start Exploring</a>
                             <a href="#" class="btn btn-outline">Browse Tours</a>
                         </div> -->
                     </div>
                 </div>
             </div>
         </div>

     </section><!-- /Travel Hero Section -->


     <!-- Call To Action Section -->
     <section id="call-to-action" class="call-to-action section light-background">
         <div class="container" data-aos="fade-up" data-aos-delay="100">
             <div class="newsletter-section" data-aos="fade-up" data-aos-delay="300">
                 <div class="col-lg-12 text-center" data-aos="fade-right" data-aos-delay="200" style="padding-bottom: 20px;">
                     <div class="content">
                         <h1>Our Special Services</h1>
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

     <!-- Customer Review Section -->
     <section id="testimonials-home" class="testimonials-home section">
         <!-- Section Title -->
         <div class="container section-title" data-aos="fade-up">
             <div><span>What Our Customers</span> <span class="description-title">Are Saying</span></div>
         </div><!-- End Section Title -->
         <div class="container" data-aos="fade-up" data-aos-delay="100">
             <div class="swiper init-swiper">
                 <script type="application/json" class="swiper-config">
                     {
                         "loop": true,
                         "speed": 600,
                         "autoplay": {
                             "delay": 5000
                         },
                         "slidesPerView": "auto",
                         "pagination": {
                             "el": ".swiper-pagination",
                             "type": "bullets",
                             "clickable": true
                         },
                         "breakpoints": {
                             "320": {
                                 "slidesPerView": 1,
                                 "spaceBetween": 40
                             },
                             "1200": {
                                 "slidesPerView": 3,
                                 "spaceBetween": 1
                             }
                         }
                     }
                 </script>
                 <div class="swiper-wrapper">
                     <div class="swiper-slide">
                         <div class="testimonial-item">
                             <p>
                                 <i class="bi bi-quote quote-icon-left"></i>
                                 <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                                 <i class="bi bi-quote quote-icon-right"></i>
                             </p>
                             <img src="{{url('frontend/assets/img/person/person-m-9.webp')}}" class="testimonial-img" alt="">
                             <h3>Saul Goodman</h3>
                             <h4>Ceo &amp; Founder</h4>
                         </div>
                     </div><!-- End testimonial item -->

                     <div class="swiper-slide">
                         <div class="testimonial-item">
                             <p>
                                 <i class="bi bi-quote quote-icon-left"></i>
                                 <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                                 <i class="bi bi-quote quote-icon-right"></i>
                             </p>
                             <img src="{{url('frontend/assets/img/person/person-f-5.webp')}}" class="testimonial-img" alt="">
                             <h3>Sara Wilsson</h3>
                             <h4>Designer</h4>
                         </div>
                     </div><!-- End testimonial item -->

                     <div class="swiper-slide">
                         <div class="testimonial-item">
                             <p>
                                 <i class="bi bi-quote quote-icon-left"></i>
                                 <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                                 <i class="bi bi-quote quote-icon-right"></i>
                             </p>
                             <img src="{{url('frontend/assets/img/person/person-f-12.webp')}}" class="testimonial-img" alt="">
                             <h3>Jena Karlis</h3>
                             <h4>Store Owner</h4>
                         </div>
                     </div><!-- End testimonial item -->

                     <div class="swiper-slide">
                         <div class="testimonial-item">
                             <p>
                                 <i class="bi bi-quote quote-icon-left"></i>
                                 <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                                 <i class="bi bi-quote quote-icon-right"></i>
                             </p>
                             <img src="{{url('frontend/assets/img/person/person-m-12.webp')}}" class="testimonial-img" alt="">
                             <h3>Matt Brandon</h3>
                             <h4>Freelancer</h4>
                         </div>
                     </div><!-- End testimonial item -->

                     <div class="swiper-slide">
                         <div class="testimonial-item">
                             <p>
                                 <i class="bi bi-quote quote-icon-left"></i>
                                 <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                                 <i class="bi bi-quote quote-icon-right"></i>
                             </p>
                             <img src="{{url('frontend/assets/img/person/person-m-13.webp')}}" class="testimonial-img" alt="">
                             <h3>John Larson</h3>
                             <h4>Entrepreneur</h4>
                         </div>
                     </div><!-- End testimonial item -->
                 </div>
                 <div class="swiper-pagination"></div>
             </div>
         </div>
     </section><!-- /Testimonials Home Section -->

     <!-- Google Maps (Full Width) -->
     <div class="map-section text-center" data-aos="fade-up" data-aos-delay="200">
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" width="95%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>

     <!-- Call To Action Section -->
     <section id="call-to-action" class="call-to-action section light-background" style="padding: 60px 0; background-color: #f9f9f9;">

         <div class="container" data-aos="fade-up" data-aos-delay="100">
             <div class="row d-flex align-items-center justify-content-center">

                 <!-- Left Content -->
                 <div class="col-md-6 d-flex justify-content-center">
                     <div class="content-wrapper" data-aos="zoom-in" data-aos-delay="200">
                         <div class="badge-wrapper mb-3">
                         </div>
                         <h2 style="font-weight: 700; margin-bottom: 15px;">We are “Authentic” and we “care”</h2>
                         <p style="margin-bottom: 25px;">“Our Shahriar Worldwide Venture Licensed Consultant Offers valuable information that can guide you successfully through the complex of visa system until you lodge your Work permit Application With Our 𝑺𝑯𝑨𝑯𝑹𝑰𝑨𝑹 𝑾𝑶𝑹𝑳𝑫𝑾𝑰𝑫𝑬 𝑽𝑬𝑵𝑻𝑼𝑹𝑬𝑺 , we focus energy and attention on our client’s wishes and goals. We make sure that we provide the highly personalized service that our clients need.</p>
                         <p style="margin-bottom: 25px;">We are AUTHENTIC and we CARE. For us it’s not just work, we take pride in building a FRIENDSHIP with our clients.”</p>

                         <div class="action-section">
                             <div class="main-actions mb-1">
                                 <h5>Morsed Rahman</h5><br>
                             </div>
                             <div class="">
                                 <h6>CEO</h6>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Right Form -->
                 <div class="col-md-6 d-flex justify-content-center">
                     <form class="cta-form text-center p-4" action="forms/interest.php" method="post"
                         style="background-color: #AAD4F0; color: white; border-radius: 10px; width: 100%; max-width: 400px;">
                         <img src="{{url('frontend/icon.png')}}" height="80" width="80" alt="icon" class="mb-3">
                         <h5 style="margin-bottom: 10px; font-weight: 600;">Alex Jhon</h5>
                         <input type="text" name="name" placeholder="Your Name" required
                             style="width: 100%; padding: 10px 12px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 8px;">
                         <input type="email" name="email" placeholder="Your Email" required
                             style="width: 100%; padding: 10px 12px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 8px;">
                         <input type="number" name="phone" placeholder="Your Phone" required
                             style="width: 100%; padding: 10px 12px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 8px;">
                         <br><br>
                         <button type="submit" class="btn btn-submit"
                             style="width: 50%; padding: 10px; background-color: #0055FF; color: white; border: none; border-radius: 8px; font-weight: bold;">
                             <i class="bi bi-send"></i> Get A Callback
                         </button>
                     </form>
                 </div>

             </div>
         </div>
     </section>

 </main>

 @endsection