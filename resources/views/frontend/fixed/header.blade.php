<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between header-container">

    <!-- 1st Column: Logo -->
    <div class="col-md-2 d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ url('logo.png') }}" alt="Logo" width="150" height="100">
      </a>
    </div>

    <!-- 2nd Column: Navigation Menu (2 Rows) -->
    <div class="col-md-7 d-flex flex-column">
      <nav id="navmenu" class="navmenu w-100">

        <!-- Row 1 -->
        <ul class="d-flex justify-content-center flex-wrap" style="list-style: none; padding: 0;">
          <li class="nav-item"><a href="{{ route('homepage') }}" class="active">Home</a></li>
          <li class="nav-item"><a href="{{route('about.us')}}">About</a></li>
          <li class="nav-item"><a href="destinations.html">Our Service</a></li>
          <li class="nav-item"><a href="{{route('create.application')}}">How to Apply</a></li>
          <li class="nav-item dropdown">
            <a href="#"><span>Visa Success</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="destination-details.html"> Visa Gallery</a></li>
              <li><a href="tour-details.html">Video</a></li>
            </ul>
          </li>
        </ul>

        <!-- Row 2 -->
        <ul class="d-flex justify-content-center flex-wrap" style="list-style: none; padding: 0;">
          <li class="nav-item"><a href="gallery.html">Global Office</a></li>
          <li class="nav-item"><a href="blog.html">Review</a></li>
          <li class="nav-item dropdown">
            <a href="#"><span>Our Policy</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="destination-details.html">English</a></li>
              <li><a href="tour-details.html">Bangla</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="{{route('contact')}}">Contact</a></li>
        </ul>

        <!-- Mobile Nav Toggle -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>

    <!-- 3rd Column: User Icon, Get Started Button -->
    <div class="col-md-3 d-flex align-items-center gap-3">

      <!-- User Icon Dropdown -->
      <div class="dropdown custom-icon-dropdown">
        @guest('customerGuard')
        <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
          <i class="bi bi-person-circle user-icon fs-4"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="{{ route('signup') }}">Sign Up</a></li>
          <li><a class="dropdown-item" href="{{ route('customer.signin') }}">Sign In</a></li>
        </ul>
        @else
        <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
          @if(auth('customerGuard')->user()->image)
          <img src="{{ url('images/customers/' . auth('customerGuard')->user()->image) }}"
            alt="Profile" class="rounded-circle me-2"
            style="width: 40px; height: 40px; object-fit: cover;">
          @else
          <i class="bi bi-person-circle user-icon me-2 fs-4"></i>
          @endif
          <span>{{ auth('customerGuard')->user()->first_name }}</span>
          <i class="fa fa-angle-down ms-1"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">View Profile</a></li>
          <li><a class="dropdown-item" href="{{ route('customer.logout') }}">Sign Out</a></li>
        </ul>
        @endguest
      </div>

      <!-- Get Started Button -->
      <a class="btn-getstarted d-none d-lg-inline-block" href="destinations.html">Application Status</a>
    </div>

  </div>
</header>