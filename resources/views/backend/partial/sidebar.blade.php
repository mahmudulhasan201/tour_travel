  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps ps--active-y bg-white" id="sidenav-main">
      <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
              <img src="{{url('backend/assets/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
              <span class="ms-1 font-weight-bold">Tour Travel</span>
          </a>
      </div>
      <hr class="horizontal dark mt-0">

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
          <div class="sb-nav-link-icon">
              <i class="fas fa-tachometer-alt" style="color: #1E90FF;"></i>
          </div>
          <span class="fw-semibold fs-6">Dashboard</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="{{route('admin.event.list')}}">
          <div class="sb-nav-link-icon">
              <i class="fas fa-calendar-alt" style="color: #20c997;"></i> <!-- Teal Event Icon -->
          </div>
          <span class="fw-semibold fs-6">Event</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="{{route('admin.service.list')}}">
          <div class="sb-nav-link-icon">
              <i class="fas fa-concierge-bell" style="color: #fd7e14;"></i> <!-- Orange Service Icon -->
          </div>
          <span class="fw-semibold fs-6">Service</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-book" style="color: #6f42c1;"></i> <!-- Purple Booking Icon -->
          </div>
          <span class="fw-semibold fs-6">Booking</span>
      </a>

      <!-- <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-layer-group" style="color: #6f42c1;"></i>
          </div>
          Group
      </a>


      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-th-large" style="color: #6f42c1;"></i>
          </div>
          Category
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-tags" style="color: #FF5733;"></i>
          </div>
          Brand
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-box" style="color: #28a745;"></i>
          </div>
          Product
      </a> -->

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-user-tag" style="color: #FFC107;"></i>
          </div>
          <span class="fw-semibold fs-6">Customer</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-shopping-cart" style="color: #17a2b8;"></i>
          </div>
          <span class="fw-semibold fs-6">Order</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-credit-card" style="color: #4CAF50;"></i>
          </div>
          <span class="fw-semibold fs-6">Payment</span>
      </a>

      <hr class="text-white my-2">
      <div class="sb-sidenav-menu-heading">External</div>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#" data-bs-toggle="collapse"
          data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon">
              <i class="fas fa-heart" style="color: #FF69B4;"></i>
          </div>
          <span class="fw-semibold fs-6">Wish-List</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#" data-bs-toggle="collapse"
          data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon">
              <i class="fas fa-chart-bar" style="color: #4682B4;"></i> <!-- Steel Blue Report Icon -->
          </div>
          <span class="fw-semibold fs-6">Report</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-percentage" style="color: #FF6347;"></i>
          </div>
          <span class="fw-semibold fs-6">Discount</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-id-badge" style="color: #4CAF50;"></i>
          </div>
          <span class="fw-semibold fs-6">Role</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-user" style="color: #4682B4;"></i>
          </div>
          <span class="fw-semibold fs-6">User</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="#">
          <div class="sb-nav-link-icon">
              <i class="fas fa-cog" style="color: #808080;"></i> <!-- Grey Setting Icon -->
          </div>
          <span class="fw-semibold fs-6">Setting</span>
      </a>

      <a class="nav-link collapsed d-flex align-items-center gap-2" href="{{ route('logout') }}">
          <div class="sb-nav-link-icon">
              <i class="fas fa-sign-out-alt" style="color: #DC143C;"></i> <!-- Red Sign Out Icon -->
          </div>
          <span class="fw-semibold fs-6">SignOut</span>
      </a>
  </aside>