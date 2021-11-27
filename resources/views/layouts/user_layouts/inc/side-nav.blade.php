<!-- Sidebar -->
         <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - BRAND -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
               <div class="sidebar-brand-icon">
                  <img src="{{ asset('asset/img/logo-bg.jpg')  }}" alt="getThrills.com Logo" height="60rem">
               </div>
               <!-- <div class="sidebar-brand-text mx-3"><img src="{{ asset('asset/img/logo-bg.jpg') }}" alt="" height="auto" width="45rem"></div> -->
            </a>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
             </li>
           
         
            <li class="nav-item">
               <a class="nav-link" href="{{ route('event.all') }}">
               <i class="fas fa-fw fa-glass-cheers"></i>
               <span>Events</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="">
               <i class="fas fa-fw fa-address-card"></i>
               <span>About US</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="">
               <i class="fas fa-fw fa-phone-alt"></i>
               <span>Contact Us</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            {{-- <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">Extra</div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
               <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
               <i class="fas fa-fw fa-pager"></i>
               <span>Pages</span>
               </a>
               <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">All Pages</h6>
                     <a class="collapse-item" href="movies.html">Movies</a>
                     <a class="collapse-item" href="movies-detail.html">Movie Detail</a>
                     <a class="collapse-item" href="events.html">Events</a>
                     <a class="collapse-item" href="events-detail.html">Event Detail</a>
                     <a class="collapse-item" href="people.html">People</a>
                     <a class="collapse-item" href="people-detail.html">People Detail</a>
                     <a class="collapse-item" href="sports.html">Sports</a>
                     <a class="collapse-item" href="sports-detail.html">Sport Detail</a>
                  </div>
               </div>
            </li> --}}
            {{-- <li class="nav-item">
               <a class="nav-link" href="offers.html">
               <i class="fas fa-fw fa-fire"></i>
               <span>Offers</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
               <i class="fas fa-fw fa-clone"></i>
               <span>Extra Pages</span>
               </a>
               <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Login Screens:</h6>
                     <a class="collapse-item" href="login.html">Login</a>
                     <a class="collapse-item" href="register.html">Register</a>
                     <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                     <div class="collapse-divider"></div>
                     <h6 class="collapse-header">Other Pages:</h6>
                     <a class="collapse-item" href="404.html">404 Page</a>
                     <a class="collapse-item" href="blank.html">Blank Page</a>
                  </div>
               </div>
            </li> --}}
         </ul>
         <!-- End of Sidebar -->
