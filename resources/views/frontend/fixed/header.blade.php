<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container container-xl d-flex align-items-center justify-content-between header-container">

    <!-- 1st Column: Logo -->
    <div class="col-md-2 d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ url('logo.png') }}" alt="Logo" width="150" height="100">
      </a>
    </div>

    <!-- 2nd Column: Navigation Menu (Desktop) -->
    <div class="col-md-6 d-flex flex-column d-none d-lg-flex">
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
      </nav>
    </div>

    <!-- 3rd Column: User Icon, Get Started Button, Toggle for Mobile -->
<!-- 3rd Column: User Icon, Get Started Button, Toggle for Mobile -->
<div class="col-md-4 d-flex align-items-center gap-2 justify-content-end">
  <!-- Boro device e phone number -->
  <span class="d-none d-lg-flex align-items-center gap-2">
    <i class="bi bi-telephone-fill"></i> +971 522169430
  </span>

  <!-- Boro device e Application Status button -->
  <a class="btn-getstarted d-none d-lg-inline-block" href="{{route('application-status')}}">Application Status</a>

  <!-- Choto device e Application Status button -->
  <a class="btn-getstarted d-lg-none d-inline-block" href="{{route('application-status')}}">Application Status</a>

  <!-- Mobile toggle button -->
  <button class="mobile-nav-toggle d-lg-none border-0 bg-transparent fs-3">
    <i class="bi bi-list"></i>
  </button>
</div>


  </div>

  <!-- Mobile Menu (Hidden by default) -->
  <div id="mobileMenu" class="mobile-menu d-lg-none">
    <ul class="list-unstyled m-0 p-3">
      <li><a href="{{ route('homepage') }}">Home</a></li>
      <li><a href="{{route('about.us')}}">About</a></li>
      <li><a href="{{route('all.services')}}">Our Service</a></li>
      <li><a href="{{route('create.application')}}">How to Apply</a></li>
      <li><a href="{{route('all.gallery')}}">Visa Gallery</a></li>
      <li><a href="{{route('all.video')}}">Video</a></li>
      <li><a href="{{route('web.offices.index')}}">Global Office</a></li>
      <li><a href="{{route('web.review.index')}}">Review</a></li>
      <li><a href="{{route('web.policy.index')}}">Our policy</a></li>
      <li><a href="{{route('contact')}}">Contact</a></li>
    </ul>
    <div class="p-3 text-center">
      <a class="btn-getstarted d-inline-block" href="{{route('application-status')}}">Application Status</a>
    </div>
  </div>
</header>

<style>
  .mobile-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    max-height: 80vh;
    overflow-y: auto;
  }

  .mobile-menu ul li a {
    color: #000 !important;
    /* Text color black */
    display: block;
    padding: 10px 0;
    text-decoration: none;
    border-bottom: 1px solid #eee;
  }

  /* Optional scrollbar style for better look */
  .mobile-menu::-webkit-scrollbar {
    width: 6px;
  }

  .mobile-menu::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 3px;
  }
</style>

<script>
  document.querySelector(".mobile-nav-toggle").addEventListener("click", function() {
    const mobileMenu = document.getElementById("mobileMenu");
    mobileMenu.style.display = mobileMenu.style.display === "block" ? "none" : "block";
  });
</script>