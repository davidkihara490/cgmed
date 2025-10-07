 <!-- ========== Topbar Start ========== -->
 <div class="navbar-custom">
     <div class="topbar">
         <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

             <!-- Brand Logo -->
             <div class="logo-box">
                 <!-- Brand Logo Light -->
                 <a class='logo-light' href='index.html'>
                     <img src="assets/images/logo.png" alt="logo" class="logo-lg" height="20">
                     <img src="assets/images/logo.png" alt="small logo" class="logo-sm" height="20">
                 </a>

                 <!-- Brand Logo Dark -->
                 <a class='logo-dark' href='index.html'>
                     <img src="assets/images/logo.png" alt="dark logo" class="logo-lg" height="20">
                     <img src="assets/images/logo.png" alt="small logo" class="logo-sm" height="20">
                 </a>
             </div>

             <!-- Sidebar Menu Toggle Button -->
             <button class="button-toggle-menu waves-effect waves-dark rounded-circle">
                 <i class="mdi mdi-menu"></i>
             </button>
         </div>

         <ul class="topbar-menu d-flex align-items-center gap-2">

             <li class="d-none d-md-inline-block">
                 <a class="nav-link waves-effect waves-dark" href="#" data-bs-toggle="fullscreen">
                     <i class="mdi mdi-fullscreen font-size-24"></i>
                 </a>
             </li>

             <li class="nav-link waves-effect waves-dark" id="theme-mode">
                 <i class="bx bx-moon font-size-24"></i>
             </li>

             <li class="dropdown">
                 <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-dark" data-bs-toggle="dropdown"
                     href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <img src="{{ asset('assets/images/users/user.png') }}" alt="user-image" class="rounded-circle">
                     <span class="ms-1 d-none d-md-inline-block">
                         {{ auth()->user()?->first_name }} {{ auth()->user()?->last_name }} <i class="mdi mdi-chevron-down"></i>
                     </span>
                 </a>

                 <div class="dropdown-menu dropdown-menu-end profile-dropdown ">

                     <!-- item-->
                     <a class='dropdown-item notify-item' href="#"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i data-lucide="log-out" class="font-size-16 me-2"></i>
                         <span>Logout</span>
                     </a>
                     <form id="logout-form" action="#" method="POST" class="d-none">
                         @csrf
                     </form>

                 </div>
             </li>

         </ul>
     </div>
 </div>