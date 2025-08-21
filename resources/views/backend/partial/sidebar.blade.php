 <nav class="pcoded-navbar">
     <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
     <div class="pcoded-inner-navbar main-menu">
         <div class="">
             <div class="main-menu-header">
                 <img class="img-80 img-radius" src="{{ asset(auth('admin')->user()->imageUrl) }}" alt="User-Profile-Image">
                 <div class="user-details">
                     <span id="more-details">{{auth('admin')->user()->name}}<i class="fa fa-caret-down"></i></span>
                 </div>
             </div>

             <div class="main-menu-content">
                 <ul>
                     <li class="more-details">
                         <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                     </li>
                 </ul>
             </div>
         </div>
         <br>


         <ul class="pcoded-item pcoded-left-item">
             <li class="active">
                 <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                     <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>



         <ul class="pcoded-item pcoded-left-item">
             <li>
                 <a href="{{route('admin.service.list')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-briefcase"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.form-components.main">Service</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>

         <ul class="pcoded-item pcoded-left-item">
             <li>
                 <a href="{{route('admin.gallery.index')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-gallery"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.form-components.main">Gallery</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>

         <ul class="pcoded-item pcoded-left-item">
             <li>
                 <a href="{{route('video.list')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-video-camera"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.form-components.main">Video</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>

         <ul class="pcoded-item pcoded-left-item">
             <li>
                 <a href="{{route('admin.jobcategory.index')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-menu-alt"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.form-components.main">Job Category</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>

         <ul class="pcoded-item pcoded-left-item">
             <li>
                 <a href="{{route('admin.application.view')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-eye"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.form-components.main">Job Application View</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>

         <ul class="pcoded-item pcoded-left-item">
             <li>
                 <a href="{{route('admin.view.message')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-envelope"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.form-components.main">Contact</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>

         <ul class="pcoded-item pcoded-left-item">
             <li>
                 <a href="{{route('admin.review.index')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-comments"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.form-components.main">Review</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>

         <ul class="pcoded-item pcoded-left-item">
             <li>
                 <a href="{{route('admin.offices.index')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-world"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.form-components.main">Global Office</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>

     </div>
 </nav>