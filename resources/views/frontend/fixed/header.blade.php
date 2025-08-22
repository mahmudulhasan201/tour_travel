<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container container-xl d-flex align-items-center justify-content-between header-container">

    <!-- 1st Column: Logo -->
    <div class="col-md-2 d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ url('logo.png') }}" alt="Logo" width="150" height="100">
      </a>
    </div>

    <!-- 2nd Column: Navigation Menu (2 Rows) -->
    <div class="col-md-6 d-flex flex-column">
      <nav id="navmenu" class="navmenu w-100">

        <!-- Row 1 -->
        <ul class="d-flex justify-content-center flex-wrap" style="list-style: none; padding: 0;">
          <li class="nav-item"><a href="{{ route('homepage') }}" class="active">Home</a></li>
          <li class="nav-item"><a href="{{route('about.us')}}">About</a></li>
          <li class="nav-item"><a href="{{route('all.services')}}">Our Service</a></li>
          <li class="nav-item"><a href="{{route('create.application')}}">How to Apply</a></li>
          <li class="nav-item dropdown">
            <a href="#"><span>Visa Success</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{route('all.gallery')}}"> Visa Gallery</a></li>
              <li><a href="{{route('all.video')}}">Video</a></li>
            </ul>
          </li>
        </ul>

        <!-- Row 2 -->
        <ul class="d-flex justify-content-center flex-wrap" style="list-style: none; padding: 0;">
          <li class="nav-item"><a href="{{route('web.offices.index')}}">Global Office</a></li>
          <li class="nav-item"><a href="{{route('web.review.index')}}">Review</a></li>
          <li class="nav-item"><a href="{{route('web.policy.index')}}">Our policy</a></li>
          <li class="nav-item"><a href="{{route('contact')}}">Contact</a></li>
        </ul>

        <!-- Mobile Nav Toggle -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>

    <!-- 3rd Column: User Icon, Get Started Button -->
    <div class="col-md-4 d-flex align-items-center gap-2">

      <i class="bi bi-telephone-fill"></i> +855 96 822 5091

      <!-- Get Started Button -->
      <a class="btn-getstarted d-none d-lg-inline-block" href="{{route('application-status')}}">Application Status</a>
    </div>

  </div>
</header>