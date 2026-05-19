
@if (Auth::check())
    <div class="main-header">

        <div class="header-topbar text-center bg-transparent">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center flex-wrap">
                    <p class="d-flex align-items-center fs-14 mb-0 me-3"><i class="isax isax-call5 me-2"></i><a href="tel:+91 89800 46600" class="text-white">+91 89800 46600</a></p>
                    <p class="d-flex align-items-center fs-14 mb-0 me-3"><i class="isax isax-message-text-15 me-2"></i><a href="mailto:info@skyeagletrip.com" class="text-white">info@skyeagletrip.com</a></p>
                    </div>
                    <div class="d-flex align-items-center">
                        <p class="mb-2 me-3 d-flex align-items-center fw-medium fs-14"><a class="text-white" href="{{url('about-us')}}">About Us</a></p>
                        <p class="mb-2 me-3 d-flex align-items-center fw-medium fs-14"><a class="text-white" href="{{url('contact-us')}}">Contact</a></p>
                        
                        <div class="fav-dropdown mb-2">
                            <a href="{{url('wishlist')}}" class="position-relative">
                                <i class="isax isax-heart"></i><span
                                    class="count-icon bg-secondary text-gray-9">{{ $wishlistCount ?? 0 }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <header>
            <div class="container">
                <div class="offcanvas-info">
                    <div class="offcanvas-wrap">
                        <div class="offcanvas-detail">
                            <div class="offcanvas-head">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a href="{{ route('home') }}" class="black-logo-responsive">
                                        <img src="{{ asset('assets/img/sky_logo.png') }}"  width="100"  height="100"  class="logo" alt="Logo">
                                    </a>
                                    <a href="{{ route('home') }}" class="white-logo-responsive">
                                        <img src="{{ asset('assets/img/sky_logo.png') }}"  width="100"  height="100"  class="logo" alt="Logo">
                                    </a>
                                    <div class="offcanvas-close">
                                        <i class="ti ti-x"></i>
                                    </div>
                                </div>
                                <div class="wishlist-info d-flex justify-content-between align-items-center">
                                    <h6 class="fs-16 fw-medium">Wishlist</h6>
                                    <div class="d-flex align-items-center">
                                        <div class="fav-dropdown">
                                            <a href="{{url('wishlist')}}" class="position-relative">
                                                <i class="isax isax-heart"></i><span
                                                    class="count-icon bg-secondary text-gray-9">{{ $wishlistCount ?? 0 }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu fix mb-3"></div>
                            <div class="offcanvas__contact">
                                <nav id="mobile-menu">
                                    <ul class="main-nav">
                                        <li>
                                            <a href="{{ route('about-us') }}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact-us') }}">Contact</a>
                                        </li>
                                    </ul>
                                </nav> 

                                <div class="mt-4">
                                    <a href="{{url('add-hotel')}}" class="btn btn-primary w-100">Add Listing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="offcanvas-overlay"></div>
                <div class="header-nav">
                    <div class="main-menu-wrapper">
                        <div class="navbar-logo">
                             <a class="logo-dark header-logo" href="{{route('home')}}">
                                <img src="{{ asset('assets/img/sky_logo.png') }}"  width="100"  height="100"  class="logo" alt="Logo">
                            </a>
                            <a class="logo-white header-logo" href="{{route('home')}}">
                                <img src="{{ asset('assets/img/sky_logo.png') }}"  width="100"  height="100"  class="logo" alt="Logo">
                            </a>
                        </div>
                        
                        <div class="header-btn d-flex align-items-center">
                            
                            <div class="dropdown profile-dropdown">
                                <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                                    <span class="avatar avatar-md">
                                        <img src="{{URL::asset('build/img/users/user-05.jpg')}}" alt="Img"
                                            class="img-fluid rounded-circle border border-white border-4">
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                    <li>
                                        <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2"
                                            href="{{url('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2"
                                            href="{{url('customer-hotel-booking')}}">My Booking</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2"
                                            href="{{url('my-profile')}}">My Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider my-2">
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2"
                                            href="{{url('profile-settings')}}">Settings</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('auth.logout') }}" method="POST" id="logout-form">
                                            @csrf
                                            <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2">
                                                Logout
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{url('add-hotel')}}" class="btn btn-primary me-0">Add Listing</a>
                            <div class="header__hamburger d-xl-none my-auto">
                                <div class="sidebar-menu">
                                    <i class="isax isax-menu5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
    </div>
@else
    <div class="main-header">
        <!-- Header Topbar-->
        <div class="header-topbar text-center bg-transparent">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center flex-wrap">
                    <p class="d-flex align-items-center fs-14 mb-0 me-3"><i class="isax isax-call5 me-2"></i><a href="tel:+91 89800 46600" class="text-white">+91 89800 46600</a></p>
                    <p class="d-flex align-items-center fs-14 mb-0 me-3"><i class="isax isax-message-text-15 me-2"></i><a href="mailto:info@skyeagletrip.com" class="text-white">info@skyeagletrip.com</a></p>
                    </div>
                    <div class="d-flex align-items-center">
                        <p class="mb-2 me-3 d-flex align-items-center fw-medium fs-14"><a class="text-white" href="{{url('about-us')}}">About Us</a></p>
                        <p class="mb-2 me-3 d-flex align-items-center fw-medium fs-14"><a class="text-white" href="{{url('contact-us')}}">Contact</a></p>
                      
                        <div class="fav-dropdown mb-2">
                            <a href="{{url('wishlist')}}" class="position-relative">
                                <i class="isax isax-heart"></i><span
                                    class="count-icon bg-secondary text-gray-9">{{ $wishlistCount ?? 0 }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Header Topbar-->

        <!-- Header -->
        <header>
            <div class="container">

            <!-- mobile view -->
                <div class="offcanvas-info">
                    <div class="offcanvas-wrap">
                        <div class="offcanvas-detail">
                            <div class="offcanvas-head">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a href="{{ route('home') }}" class="black-logo-responsive">
                                        <img src="{{ asset('assets/img/sky_logo.png') }}"  width="100"  height="100"  class="logo" alt="Logo">
                                    </a>
                                    <a href="{{ route('home') }}" class="white-logo-responsive">
                                        <img src="{{ asset('assets/img/sky_logo.png') }}"  width="100"  height="100"  class="logo" alt="Logo">
                                    </a>
                                    <div class="offcanvas-close">
                                        <i class="ti ti-x"></i>
                                    </div>
                                </div>
                                <div class="wishlist-info d-flex justify-content-between align-items-center">
                                    <h6 class="fs-16 fw-medium">Wishlist</h6>
                                    <div class="d-flex align-items-center">
                                        <div class="fav-dropdown">
                                            <a href="{{url('wishlist')}}" class="position-relative">
                                                <i class="isax isax-heart"></i><span
                                                    class="count-icon bg-secondary text-gray-9">{{ $wishlistCount ?? 0 }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mobile-menu fix mb-3"></div>

                            <div class="offcanvas__contact">
                                <nav id="mobile-menu">
                                    <ul class="main-nav">
                                        <li>
                                            <a href="{{ route('about-us') }}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact-us') }}">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="mt-4">              
                                    <div><a href="#" class="text-white btn btn-dark w-100 mb-3 mt-3" data-bs-toggle="modal"
                                            data-bs-target="#login-modal">Sign In</a></div>
                                    <a href="{{url('become-an-expert')}}" class="btn btn-primary w-100">Become Expert</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- desktop view -->
                <div class="offcanvas-overlay"></div>
                <div class="header-nav">
                    <div class="main-menu-wrapper">
                        <div class="navbar-logo">
                            <a class="logo-dark header-logo" href="{{route('home')}}">
                                <img src="{{ asset('assets/img/sky_logo.png') }}"  width="100"  height="100"  class="logo" alt="Logo">
                            </a>
                            <a class="logo-white header-logo" href="{{route('home')}}">
                                <img src="{{ asset('assets/img/sky_logo.png') }}"  width="100"  height="100"  class="logo" alt="Logo">
                            </a>
                        </div>

                        <div class="header-btn d-flex align-items-center">
                            
                            <a href="#" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#login-modal">Sign In</a>
                            <a href="{{url('become-an-expert')}}" class="btn btn-white me-0">Become Expert</a>

                            <!-- Mpbile screen -->
                            <a href="#" class="d-xl-none my-auto me-3" data-bs-toggle="modal" data-bs-target="#login-modal" aria-label="Sign in">
                                <i class="isax isax-user"></i> Login
                            </a>
                            <div class="header__hamburger d-xl-none my-auto">
                                <div class="sidebar-menu">
                                    <i class="isax isax-menu5"></i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>
        <!-- /Header -->
    </div>
@endif