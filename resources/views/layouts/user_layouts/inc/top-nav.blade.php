<!-- Topbar -->
    <nav class="navbar navbar-expand navbar-dark topbar mb-4 pl-0 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
        </button>
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search" method="get" action="{{route('search')}}">
        @csrf
            <div class="input-group">
            <input type="text" class="form-control bg-white border-0 small" name="search" placeholder="Search for Movies, Events, TV Series..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn bg-white" type="submit">
                <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            </div>
        </form>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search" method="get" action="{{route('search')}}">
                @csrf
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                        </div>
                    </div>
                </form>
            </div>
            </li>
            <!-- Nav Item - Alerts -->
            {{-- <li class="nav-item no-arrow mx-1">
            <a class="nav-link" href="offers.html">
                <i class="fas fa-fire fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger bg-gradient-danger">NEW</span>
            </a>
            </li> --}}
            {{-- <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">8+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary text-white">
                        KN
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle w-60" src="{{ asset('getThrills/img/s1.png') }}" alt="name-logo">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Duis vel est sit amet ipsum egestas efficitur.</div>
                        <div class="small text-gray-500">Gurdeep Osahan · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle w-60" src="{{ asset('getThrills/img/s2.png') }}" alt="">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Pellentesque euismod diam sit amet nibh molestie, imperdiet feugiat mi feugiat.</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle w-60" src="{{ asset('getThrills/img/s3.png') }}" alt="">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Quisque ac justo bibendum nunc fringilla pharetra nec sit amet mauris.</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        Sed aliquet nibh nec odio congue, in condimentum massa dapibus.
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Pellentesque sit amet nunc consectetur, porta sapien a, bibendum dolor.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
            </li> --}}
            @guest
                <li class="mt-3 mt-md-0"><a href="/login"><button class="btn text-light">Sign In</button></a></li>
            @else
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600">{{ auth::user()->first_name }} {{ auth::user()->last_name }}</span>
            {{-- <img class="img-profile rounded-circle" src="{{ asset('getThrills/img/s4.png') }}"> --}}
            <i class="fas fa-user-circle mt-1" style="font-size: 1.5em;"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user.profile') }}">
                <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
                </a>
                <a class="dropdown-item" href="{{route('book.index')}}">
                <i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400"></i>
                View Cart
                </a>
                {{-- <a class="dropdown-item" href="profile.html">
                <i class="fas fa-heart fa-sm fa-fw mr-2 text-gray-400"></i>
                Watchlist
                </a> --}}
                <a class="dropdown-item" href="{{ route('myticket') }}">
                <i class="fas fa-list-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                My Tickets
                </a>
                <a class="dropdown-item" href="{{ route('user.password') }}">
                <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                Account Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
                </a>
            </div>
            </li>
            @endguest
        </ul>
    </nav>
    <!-- End of Topbar -->
