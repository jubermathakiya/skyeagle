@if (!Route::is(['index-2', 'index-4', 'index-5', 'index-6', 'index-7', 'index-8', 'index-9', 'index-10', 'index-11', 'index-12', 'index', 'login', 'register', 'forgot-password', 'change-password', 'error-404', 'error-500', 'under-maintenance', 'coming-soon']))
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <div class="col">
                        <div class="footer-widget">
                            <h5>Pages</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{url('team')}}">Our Team</a>
                                </li>
                                <li>
                                    <a href="{{url('pricing-plan')}}">Pricing Plans</a>
                                </li>
                                <li>
                                    <a href="{{url('gallery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{url('profile-settings')}}">Settings</a>
                                </li>
                                <li>
                                    <a href="{{url('my-profile')}}">Profile</a>
                                </li>
                                <li>
                                    <a href="{{url('agent-listings')}}">Listings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-widget">
                            <h5>Company</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{url('about-us')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Careers</a>
                                </li>
                                <li>
                                    <a href="{{url('blog-grid')}}">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Affiliate Program</a>
                                </li>
                                <li>
                                    <a href="{{url('add-flight')}}">Add Your Listing</a>
                                </li>
                                <li>
                                    <a href="#">Our Partners</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-widget">
                            <h5>Destinations</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">Hawai</a>
                                </li>
                                <li>
                                    <a href="#">Istanbul</a>
                                </li>
                                <li>
                                    <a href="#">San Diego</a>
                                </li>
                                <li>
                                    <a href="#">Belgium</a>
                                </li>
                                <li>
                                    <a href="#">Los Angeles</a>
                                </li>
                                <li>
                                    <a href="#">Newyork</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-widget">
                            <h5>Support</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{url('contact-us')}}">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Legal Notice</a>
                                </li>
                                <li>
                                    <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="{{url('terms-conditions')}}">Terms and Conditions</a>
                                </li>
                                <li>
                                    <a href="{{url('chat')}}">Chat Support</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-widget">
                            <h5>Services</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{url('hotel-grid')}}">Hotel</a>
                                </li>
                                <li>
                                    <a href="#">Activity Finder</a>
                                </li>
                                <li>
                                    <a href="{{url('flight-grid')}}">Flight Finder</a>
                                </li>
                                <li>
                                    <a href="{{url('tour-grid')}}">Holiday Rental</a>
                                </li>
                                <li>
                                    <a href="{{url('car-grid')}}">Car Rental</a>
                                </li>
                                <li>
                                    <a href="{{url('tour-details')}}">Holiday Packages</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-wrap bg-white">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-xl-3 col-xxl-3">
                            <div class="mb-3 text-center text-xl-start">
                                <a href="{{url('index')}}" class="d-block footer-logo-light">
                                    <img src="{{URL::asset('build/img/logo-dark.svg')}}" alt="logo">
                                </a>
                                <a href="{{url('index')}}" class="footer-logo-dark">
                                    <img src="{{URL::asset('build/img/logo.svg')}}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 col-xxl-4">
                            <div class="d-flex align-items-center justify-content-center flex-wrap">
                                <h6 class="fs-14 fw-medium me-2 mb-2">Available on : </h6>
                                <a href="#" class="d-block mb-3 me-2">
                                    <img src="{{URL::asset('build/img/icons/googleplay.svg')}}" alt="logo">
                                </a>
                                <a href="#" class="d-block mb-3">
                                    <img src="{{URL::asset('build/img/icons/appstore.svg')}}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-5 col-xxl-5">
                            <div class="d-sm-flex align-items-center justify-content-center justify-content-xl-end">
                                <div
                                    class="d-flex align-items-center justify-content-center justify-content-sm-start me-0 pe-0 me-sm-3 pe-sm-3 border-end mb-3">
                                    <span class="avatar avatar-lg bg-primary rounded-circle flex-shrink-0">
                                        <i class="ti ti-headphones-filled fs-24"></i>
                                    </span>
                                    <div class="ms-2">
                                        <p class="mb-1">Customer Support</p>
                                        <p class="fw-medium text-dark">+91 89800 46600</p>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-center justify-content-sm-start mb-3">
                                    <span class="avatar avatar-lg bg-secondary rounded-circle flex-shrink-0">
                                        <i class="ti ti-message fs-24 text-gray-9"></i>
                                    </span>
                                    <div class="ms-2">
                                        <p class="mb-1">Drop Us an Email</p>
                                        <p class="fw-medium text-dark">info@skyeagletrip.com</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="footer-img">
                    <img src="{{URL::asset('build/img/bg/footer.svg')}}" class="img-fluid" alt="img">
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <p class="fs-14">Copyright &copy; 2026. All Rights Reserved, <a href="#"
                                    class="text-primary fw-medium">DreamsTour</a></p>
                            <div class="d-flex align-items-center">
                                <ul class="social-icon">
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="card-links">
                                <li>
                                    <a href="#">
                                        <img src="{{URL::asset('build/img/icons/card-01.svg')}}" alt="img">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{URL::asset('build/img/icons/card-02.svg')}}" alt="img">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{URL::asset('build/img/icons/card-03.svg')}}" alt="img">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{URL::asset('build/img/icons/card-04.svg')}}" alt="img">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{URL::asset('build/img/icons/card-05.svg')}}" alt="img">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{URL::asset('build/img/icons/card-06.svg')}}" alt="img">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index']))
    <!-- Footer -->
    <footer class="footer-eight">
        <div class="footer-top">
            <img src="{{URL::asset('build/img/bg/footer-bg-03.png')}}" alt="img" class="footer-bg">
            <div class="container">
                <div class="footer-subscribe">
                    <div class="row row-gap-3">
                        <div class="col-lg-7">
                            <div>
                                <h2 class="text-white">Subscribe to our Newsletter</h2>
                                <span class="text-white">Just sign up and we'll send you a notification by email.</span>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="footer-input">
                                <div class="input-group align-items-center justify-content-center">
                                    <span class="input-group-text px-1"><i
                                            class="isax isax-message-favorite5"></i></span>
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit" class="btn btn-primary btn-md">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center row-gap-3">
                    <div class="col-md-5">
                        <div class="footer-about">
                            <div>
                                <a href="{{url('index')}}" class="d-inline-block mb-1">
                                    <img src="{{URL::asset('build/img/logo.svg')}}" alt="logo">
                                </a>
                                <p class="text-white">Our mission is to offer you a seamless and enjoyable car rental
                                    experience. Whether you’re planning a road trip</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row row-cols-xl-3 row-cols-sm-2 row-cols-1 g-4">
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-lg bg-primary rounded-circle flex-shrink-0">
                                        <i class="ti ti-headphones-filled fs-24"></i>
                                    </span>
                                    <div class="ms-2">
                                        <p class="fs-14 mb-1 text-white">Customer Support</p>
                                        <div class="fw-medium text-light">+91 89800 46600</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-lg bg-secondary rounded-circle flex-shrink-0">
                                        <i class="isax isax-message-25 fs-24"></i>
                                    </span>
                                    <div class="ms-2">
                                        <p class="fs-14 mb-1 text-white">Drop Us an Email</p>
                                        <div class="fw-medium text-light">info@skyeagletrip.com</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-lg bg-teal rounded-circle flex-shrink-0">
                                        <i class="isax isax-message-25 fs-24"></i>
                                    </span>
                                    <div class="ms-2">
                                        <p class="fs-14 mb-1 text-white">Toll Free</p>
                                        <div class="fw-medium text-light">+1 56569 54698</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="container">
                <div
                    class="d-flex align-items-center justify-content-center justify-content-lg-between flex-wrap gap-3">
                    <div class="footer-links d-none d-lg-block">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="{{url('hotel-grid')}}">Hotels</a></li>
                            <li><a href="{{url('tour-grid')}}">Tours</a></li>
                            <li><a href="{{url('car-grid')}}">Car Rentals</a></li>
                            <li><a href="{{url('cruise-grid')}}">Cruise</a></li>
                            <li><a href="{{url('activity-grid')}}">Activities</a></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="text-white">Available on</span>
                        <a href="#" class="d-block">
                            <img src="{{URL::asset('build/img/icons/googleplay-white.svg')}}" alt="logo">
                        </a>
                        <a href="#" class="d-block">
                            <img src="{{URL::asset('build/img/icons/appstore-white.svg')}}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <p class="text-white mb-0">Copyright © 2026 <a href="#" class="fw-medium">DreamsTour</a></p>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-bottom-links d-flex align-items-center justify-content-center gap-3">
                            <a href="#">Legal Notice</a>
                            <a href="#">Privacy Policy</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="social-icon">
                            <li>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-2']))
    <!-- Footer -->
    <footer class="footer-nine">
        <div class="footer-top">
            <div class="container">
                <div class="row row-gap-4">
                    <div class="col-xl-7">
                        <div class="footer-about">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="footer-about-text">
                                        <a href="{{url('index')}}" class="d-inline-block mb-1">
                                            <img src="{{URL::asset('build/img/logo.svg')}}" alt="logo">
                                        </a>
                                        <p class="text-white">Our mission is to offer you a seamless and enjoyable car rental experience. Whether you’re planning a road trip</p>
                                    </div>
                                    <div class="home-nine-title text-white">Subscribe to Our Newsletter</div>
                                    <p class="text-white mb-3">Just sign up and we'll send you a notification by email.</p>
                                    <div class="footer-input">
                                        <div class="input-group align-items-center justify-content-center">
                                            <span class="input-group-text px-1"><i class="isax isax-message-favorite5"></i></span>
                                            <input type="email" class="form-control" placeholder="Enter Email Address">
                                            <button type="submit" class="btn btn-primary btn-md">Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="footer-widget mb-0">
                                        <div class="home-nine-title">Services</div>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="{{url('hotel-grid')}}">Hotel</a>
                                            </li>
                                            <li>
                                                <a href="{{url('activity-grid')}}">Activity Finder</a>
                                            </li>
                                            <li>
                                                <a href="{{url('flight-grid')}}">Flight finder</a>
                                            </li>
                                            <li>
                                                <a href="{{url('tour-grid')}}">Tour Packages</a>
                                            </li>
                                            <li>
                                                <a href="{{url('car-grid')}}">Car Rental</a>
                                            </li>
                                            <li>
                                                <a href="{{url('cruise-grid')}}">Luxury Cruises</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                       <div class="footer-image" style="background-image: url(./build/img/bg/footer-nine-bg.jpg)">
                          <div class="footer-content">
                            <h2>Explore Beyond the Horizon: Discover the World’s Wonders</h2>
                            <a href="#" class="btn btn-primary"><i class="isax isax-call-outgoing me-1"></i> Contact Us</a>
                          </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <img src="{{URL::asset('./build/img/bg/footer-nine-bg2.png')}}" alt="img">
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copy-right">
                            <p>Copyright &copy; 2026 <a href="#" class="fw-medium">DreamsTour</a>, All Rights Reserved</p>
                            <div class="d-flex align-items-center">
                                <ul class="social-icon">
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="policy-links">
                                <li>
                                    <a href="#">Legal Notice</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

         <div id="scroll-progress" class="scroll-progress">
            <span id="progress-value">0%</span>
        </div>
    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-4']))
    <!-- Footer -->
    <footer class="footer-two">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-widget">
                            <span class="d-block mb-2 footer-logo-light"><img src="{{URL::asset('build/img/logo-dark.svg')}}"
                                    alt="Img"></span>
                            <span class="mb-2 footer-logo-dark"><img src="{{URL::asset('build/img/logo.svg')}}" alt="Img"></span>
                            <p class="mb-3">The experience of booking your flight tickets, hotel stay</p>
                            <span class="d-block mb-2">Available on</span>
                            <div class="d-flex align-items-center row-gap-2 flex-wrap">
                                <a href="#" class="d-block me-2">
                                    <img src="{{URL::asset('build/img/icons/googleplay.svg')}}" alt="logo">
                                </a>
                                <a href="#" class="d-block">
                                    <img src="{{URL::asset('build/img/icons/appstore.svg')}}" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget">
                                    <h5>Company</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('about-us')}}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Careers</a>
                                        </li>
                                        <li>
                                            <a href="{{url('blog-grid')}}">Blog</a>
                                        </li>
                                        <li>
                                            <a href="#">Affiliate Program</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget">
                                    <h5>Destinations</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="#">Hawai</a>
                                        </li>
                                        <li>
                                            <a href="#">Istanbul</a>
                                        </li>
                                        <li>
                                            <a href="#">San Diego</a>
                                        </li>
                                        <li>
                                            <a href="#">Belgium</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget">
                                    <h5>Support</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('contact-us')}}">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Legal Notice</a>
                                        </li>
                                        <li>
                                            <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="{{url('terms-conditions')}}">Terms and Conditions</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget">
                                    <h5>Services</h5>
                                    <div class="customer-info">
                                        <div class="customer-info-icon">
                                            <span><i class="isax isax-headphone5"></i></span>
                                        </div>
                                        <div class="customer-info-content">
                                            <span>Customer Support</span>
                                            <h6>+1 56589 54598</h6>
                                        </div>
                                    </div>
                                    <div class="customer-info">
                                        <div class="customer-info-icon">
                                            <span><i class="isax isax-sms5"></i></span>
                                        </div>
                                        <div class="customer-info-content">
                                            <span>Drop Us an Email</span>
                                            <h6>info@skyeagletrip.com</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <p class="fs-14">Copyright &copy; 2026. All Rights Reserved, <a href="#"
                                    class="text-primary fw-medium">DreamsTour</a></p>
                            <div class="d-flex align-items-center">
                                <ul class="social-icon social-icon-two">
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-5']))
    <!-- Footer -->
    <footer class="footer-three">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="footer-widget">
                            <div class="footer-about">
                                <div class="mb-4">
                                    <a href="{{url('index')}}" class="d-inline-block mb-1">
                                        <img src="{{URL::asset('build/img/logo.svg')}}" alt="logo">
                                    </a>
                                    <p>Our mission is to offer you a seamless and enjoyable car rental experience.
                                        Whether you’re planning a road trip</p>
                                </div>
                                <h5 class="mb-1">Subscribe to Our Newsletter</h5>
                                <p class="mb-3">Just sign up and we'll send you a notification by email.</p>
                                <div class="footer-input">
                                    <div class="input-group align-items-center justify-content-center">
                                        <span class="input-group-text px-1"><i
                                                class="isax isax-message-favorite5"></i></span>
                                        <input type="email" class="form-control" placeholder="Enter Email Address">
                                        <button type="submit" class="btn btn-primary btn-md">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1">
                            <div class="col">
                                <div class="footer-widget">
                                    <h5>Pages</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('team')}}">Our Team</a>
                                        </li>
                                        <li>
                                            <a href="{{url('pricing-plan')}}">Pricing Plans</a>
                                        </li>
                                        <li>
                                            <a href="{{url('gallery')}}">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="{{url('profile-settings')}}">Settings</a>
                                        </li>
                                        <li>
                                            <a href="{{url('my-profile')}}">Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{url('agent-listings')}}">Listings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-widget">
                                    <h5>Company</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('about-us')}}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Careers</a>
                                        </li>
                                        <li>
                                            <a href="{{url('blog-grid')}}">Blog</a>
                                        </li>
                                        <li>
                                            <a href="#">Affiliate Program</a>
                                        </li>
                                        <li>
                                            <a href="{{url('add-flight')}}">Add Your Listing</a>
                                        </li>
                                        <li>
                                            <a href="#">Our Partners</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-widget">
                                    <h5>Destinations</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="#">Hawai</a>
                                        </li>
                                        <li>
                                            <a href="#">Istanbul</a>
                                        </li>
                                        <li>
                                            <a href="#">San Diego</a>
                                        </li>
                                        <li>
                                            <a href="#">Belgium</a>
                                        </li>
                                        <li>
                                            <a href="#">Newyork</a>
                                        </li>
                                        <li>
                                            <a href="#">Los Angeles</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-contact">
                    <div class="row align-items-center">
                        <div class="col-xl-5">
                            <ul class="social-icon">
                                <li>
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-7">
                            <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg bg-primary rounded-circle flex-shrink-0">
                                            <i class="ti ti-headphones-filled fs-24"></i>
                                        </span>
                                        <div class="ms-2">
                                            <p class="fs-14 mb-1">Customer Support</p>
                                            <h6 class="fw-medium text-light">+91 89800 46600</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg bg-secondary rounded-circle flex-shrink-0">
                                            <i class="ti ti-message-2 fs-24"></i>
                                        </span>
                                        <div class="ms-2">
                                            <p class="fs-14 mb-1">Drop Us an Email</p>
                                            <h6 class="fw-medium text-light">info@skyeagletrip.com</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg bg-teal rounded-circle flex-shrink-0">
                                            <i class="ti ti-message-2 fs-24"></i>
                                        </span>
                                        <div class="ms-2">
                                            <p class="fs-14 mb-1">Toll Free</p>
                                            <h6 class="fw-medium text-light">+1 56569 54698</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <p>Copyright &copy; 2026. All Rights Reserved, <a href="#"
                                class="text-primary fw-medium">DreamsTour</a></p>
                    </div>
                    <div class="col-lg-7">
                        <ul class="policy-links justify-content-xl-end">
                            <li class="me-4">
                                <a href="#">Legal Notice</a>
                            </li>
                            <li class="me-4">
                                <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                            </li>
                            <li class="me-4">
                                <a href="{{url('terms-conditions')}}">Terms and Conditions</a>
                            </li>
                            <li class="me-4">
                                <a href="#">Refund Policy</a>
                            </li>
                            <li>
                                <a href="{{url('chat')}}">Chat Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-6']))
    <!-- Footer -->
    <footer class="footer-four">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="row row-cols-md-4 row-cols-sm-2 row-cols-1">
                            <div class="col">
                                <div class="footer-widget">
                                    <h5>Pages</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('team')}}">Our Team</a>
                                        </li>
                                        <li>
                                            <a href="{{url('pricing-plan')}}">Pricing Plans</a>
                                        </li>
                                        <li>
                                            <a href="{{url('gallery')}}">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="{{url('profile-settings')}}">Settings</a>
                                        </li>
                                        <li>
                                            <a href="{{url('my-profile')}}">Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{url('agent-listings')}}">Listings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-widget">
                                    <h5>Company</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('about-us')}}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Careers</a>
                                        </li>
                                        <li>
                                            <a href="{{url('blog-grid')}}">Blog</a>
                                        </li>
                                        <li>
                                            <a href="#">Affiliate Program</a>
                                        </li>
                                        <li>
                                            <a href="{{url('add-flight')}}">Add Your Listing</a>
                                        </li>
                                        <li>
                                            <a href="#">Our Partners</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-widget">
                                    <h5>Destinations</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="#">Hawai</a>
                                        </li>
                                        <li>
                                            <a href="#">Istanbul</a>
                                        </li>
                                        <li>
                                            <a href="#">San Diego</a>
                                        </li>
                                        <li>
                                            <a href="#">Belgium</a>
                                        </li>
                                        <li>
                                            <a href="#">Newyork</a>
                                        </li>
                                        <li>
                                            <a href="#">Los Angeles</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-widget">
                                    <h5>Quick Links</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('contact-us')}}">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Legal Notice</a>
                                        </li>
                                        <li>
                                            <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="{{url('terms-conditions')}}">Terms and Conditions</a>
                                        </li>
                                        <li>
                                            <a href="{{url('chat')}}">Chat Support</a>
                                        </li>
                                        <li>
                                            <a href="#">Refund Policy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="footer-widget">
                            <div class="mb-4">
                                <h5 class="mb-1">Subscribe to Our Newsletter</h5>
                                <p class="mb-3">Just sign up and we'll send you a notification by email.</p>
                                <div class="footer-input">
                                    <div class="input-group align-items-center justify-content-center">
                                        <span class="input-group-text px-1"><i
                                                class="isax isax-message-favorite5"></i></span>
                                        <input type="email" class="form-control" placeholder="Enter Email Address">
                                        <button type="submit" class="btn btn-primary btn-md">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-0">Contact Info</h5>
                            <div class="d-sm-flex align-items-center justify-content-center justify-content-between">
                                <div
                                    class="d-flex align-items-center justify-content-center justify-content-sm-start me-3 mt-2">
                                    <span class="avatar avatar-lg bg-light rounded-circle flex-shrink-0">
                                        <i class="ti ti-headphones-filled fs-24 text-gray-9"></i>
                                    </span>
                                    <div class="ms-2">
                                        <p class="fs-14 mb-1">Customer Support</p>
                                        <h6 class="fw-medium">+1 56589 54598</h6>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-center justify-content-sm-start mt-2">
                                    <span class="avatar avatar-lg bg-light rounded-circle flex-shrink-0">
                                        <i class="ti ti-message-2 fs-24 text-gray-9"></i>
                                    </span>
                                    <div class="ms-2">
                                        <p class="fs-14 mb-1">Drop Us an Email</p>
                                        <h6 class="fw-medium text-dark">info@skyeagletrip.com</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <p>Copyright &copy; 2026. All Rights Reserved, <a href="#"
                                    class="text-primary fw-medium">DreamsTour</a></p>
                            <div class="d-flex align-items-center">
                                <ul class="social-icon">
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="policy-links">
                                <li>
                                    <a href="#">Legal Notice</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-7']))
    <!-- Footer -->
    <footer class="footer-five">
        <div class="container">
            <div class="footer-top">
                <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <div class="col-lg-5">
                        <div class="footer-about">
                            <span class="d-block mb-2 footer-logo-light"><img src="{{URL::asset('build/img/logo-dark.svg')}}"
                                    alt="Img"></span>
                            <span class="mb-2 footer-logo-dark"><img src="{{URL::asset('build/img/logo.svg')}}" alt="Img"></span>
                            <p>At Deams Tour, we are committed to delivering a seamless and unforgettable cruise
                                experience. </p>
                            <h5>Subscribe to Our Newsletter</h5>
                            <p>Just sign up and we'll send you a notification by email.</p>
                            <div class="footer-input">
                                <div class="input-group align-items-center justify-content-center">
                                    <span class="input-group-text px-1"><i
                                            class="isax isax-message-favorite5"></i></span>
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>Pages</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{url('team')}}">Our Team</a>
                                </li>
                                <li>
                                    <a href="{{url('pricing-plan')}}">Pricing Plans</a>
                                </li>
                                <li>
                                    <a href="{{url('gallery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{url('profile-settings')}}">Settings</a>
                                </li>
                                <li>
                                    <a href="{{url('my-profile')}}">Profile</a>
                                </li>
                                <li>
                                    <a href="{{url('agent-listings')}}">Listings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>Company</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{url('about-us')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Careers</a>
                                </li>
                                <li>
                                    <a href="{{url('blog-grid')}}">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Affiliate Program</a>
                                </li>
                                <li>
                                    <a href="{{url('add-flight')}}">Add Your Listing</a>
                                </li>
                                <li>
                                    <a href="#">Our Partners</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-widget">
                            <h5>Contact Info</h5>
                            <div class="customer-info">
                                <div class="customer-info-icon">
                                    <span><i class="isax isax-headphone5"></i></span>
                                </div>
                                <div class="customer-info-content">
                                    <span>Customer Support</span>
                                    <h6>+1 56589 54598</h6>
                                </div>
                            </div>
                            <div class="customer-info">
                                <div class="customer-info-icon">
                                    <span><i class="isax isax-sms5"></i></span>
                                </div>
                                <div class="customer-info-content">
                                    <span>Drop Us an Email</span>
                                    <h6>info@skyeagletrip.com</h6>
                                </div>
                            </div>
                            <div class="customer-info">
                                <div class="customer-info-icon">
                                    <span><i class="isax isax-call5"></i></span>
                                </div>
                                <div class="customer-info-content">
                                    <span>Toll Free</span>
                                    <h6>+1 56569 54698</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <p class="fs-14">Copyright &copy; 2026. All Rights Reserved, <a href="#"
                                    class="text-primary fw-medium">DreamsTour</a></p>
                            <div class="d-flex align-items-center">
                                <ul class="social-icon">
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-8']))
    <!-- Footer -->
    <footer class="footer-three footer-six">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="footer-widget">
                            <div class="footer-about">
                                <div class="mb-4">
                                    <a href="{{url('index')}}" class="d-inline-block mb-1">
                                        <img src="{{URL::asset('build/img/logo.svg')}}" alt="logo">
                                    </a>
                                    <p>Our mission is to offer you a seamless and enjoyable car rental experience.
                                        Whether you’re planning a road trip</p>
                                </div>
                            </div>
                            <ul class="social-icon">
                                <li>
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <h5 class="mb-2 text-white">Subscribe to Keep Updated</h5>
                            <div class="footer-input">
                                <div class="input-group align-items-center justify-content-center">
                                    <span class="input-group-text px-1"><i
                                            class="isax isax-message-favorite5"></i></span>
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit" class="btn btn-primary btn-md">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h5>Pages</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{url('team')}}">Our Team</a>
                                </li>
                                <li>
                                    <a href="{{url('pricing-plan')}}">Pricing Plans</a>
                                </li>
                                <li>
                                    <a href="{{url('gallery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{url('profile-settings')}}">Settings</a>
                                </li>
                                <li>
                                    <a href="{{url('my-profile')}}">Profile</a>
                                </li>
                                <li>
                                    <a href="{{url('agent-listings')}}">Listings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h5>Company</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{url('about-us')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Careers</a>
                                </li>
                                <li>
                                    <a href="{{url('blog-grid')}}">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Affiliate Program</a>
                                </li>
                                <li>
                                    <a href="{{url('add-tour')}}">Add Your Listing</a>
                                </li>
                                <li>
                                    <a href="#">Our Partners</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h5>Destinations</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">Hawai</a>
                                </li>
                                <li>
                                    <a href="#">Istanbul</a>
                                </li>
                                <li>
                                    <a href="#">San Diego</a>
                                </li>
                                <li>
                                    <a href="#">Belgium</a>
                                </li>
                                <li>
                                    <a href="#">Newyork</a>
                                </li>
                                <li>
                                    <a href="#">Los Angeles</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h5>Quick Links</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">Legal Notice</a>
                                </li>
                                <li>
                                    <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="{{url('terms-conditions')}}">Terms and Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="{{url('chat')}}">Chat Support</a>
                                </li>
                                <li>
                                    <a href="#">Tickets</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 mx-auto">
                        <p class="text-center">Copyright &copy; 2026. All Rights Reserved, <a href="#"
                                class="text-primary fw-medium">DreamsTour</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-9']))
    <!-- Footer -->
    <footer class="footer-three footer-seven">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="footer-widget">
                            <div class="footer-about">
                                <div class="mb-4">
                                    <a href="{{url('index')}}" class="d-inline-block mb-3">
                                        <img src="{{URL::asset('build/img/logo.svg')}}" alt="logo">
                                    </a>
                                    <p>Our mission is to offer you a seamless and enjoyable car rental experience.
                                        Whether you’re planning a road trip</p>
                                    <ul class="social-icon mt-3">
                                        <li>
                                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="row row-cols-md-2 row-cols-sm-2 row-cols-1 row-gap-3">
                            <div class="col">
                                <div class="footer-widget mb-0">
                                    <h5>Company</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('about-us')}}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Careers</a>
                                        </li>
                                        <li>
                                            <a href="{{url('blog-grid')}}">Blog</a>
                                        </li>
                                        <li>
                                            <a href="#">Affiliate Program</a>
                                        </li>
                                        <li>
                                            <a href="{{url('add-flight')}}">Add Your Listing</a>
                                        </li>
                                        <li>
                                            <a href="#">Our Partners</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-widget mb-0">
                                    <h5>Destinations</h5>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="#">Hawai</a>
                                        </li>
                                        <li>
                                            <a href="#">Istanbul</a>
                                        </li>
                                        <li>
                                            <a href="#">San Diego</a>
                                        </li>
                                        <li>
                                            <a href="#">Belgium</a>
                                        </li>
                                        <li>
                                            <a href="#">Newyork</a>
                                        </li>
                                        <li>
                                            <a href="#">Los Angeles</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 ">
                        <p class="text-lg-start text-center">Copyright &copy; 2026. All Rights Reserved, <a href="#"
                                class="text-white fw-medium">DreamsTour</a></p>
                    </div>
                    <div class="col-md-5">
                        <ul class="policy-links justify-content-lg-end gap-2">
                            <li>
                                <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="{{url('terms-conditions')}}">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-10']))
    <!-- Start Footer Section -->
    <footer class="footer footer-ten">
        <div class="container">
            <!-- start footer -->
            <div class="foot-ten">
                <!-- start row  -->
                <div class="row row-gap-5">
                    <div class="col-xl-5 col-lg-6">
                        <div class="footer-subscribe">
                            <div class="footer-content">
                                <h2 class="text-white mb-2">Subscribe to our Newsletter</h2>
                                <span class="text-light">Just sign up and we'll send you a notification by email.</span>
                            </div>
                            <div class="footer-input">
                                <div class="input-group align-items-center justify-content-center">
                                    <span class="input-group-text px-1"><i
                                            class="isax isax-message-favorite5"></i></span>
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit" class="btn btn-primary btn-md">Subscribe</button>
                                </div>
                            </div>
                            <ul class="social-icon">
                                <li>
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 d-none d-xl-flex"></div>
                    <div class="col-xl-5 col-lg-6">
                        <!-- start row  -->
                        <div class="row row-gap-3">
                            <div class="col-lg-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Services</h3>
                                    <a href="{{url('hotel-grid')}}" class="link"><span class="dot"><i class="fa-solid fa-circle"></i></span>Hotel</a>
                                    <a href="{{url('activity-grid')}}" class="link"><span class="dot"><i class="fa-solid fa-circle"></i></span>Activity Finder</a>
                                    <a href="{{url('flight-grid')}}" class="link"><span class="dot"><i class="fa-solid fa-circle"></i></span>Flight finder</a>
                                    <a href="{{url('tour-grid')}}" class="link"><span class="dot"><i class="fa-solid fa-circle"></i></span>Tour Packages</a>
                                    <a href="{{url('car-grid')}}" class="link"><span class="dot"><i class="fa-solid fa-circle"></i></span>Car Rental</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Contact Us</h3>
                                    <div class="customer-support mb-4">
                                        <div class="icon bg-primary">
                                            <i class="isax isax-headphone4"></i>
                                        </div>
                                        <div>
                                            <h4 class="number">
                                                <span>Customer Support</span>
                                                +1 56589 54598
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="customer-support mb-4">
                                        <div class="icon bg-secondary">
                                            <i class="isax isax-message-25"></i>
                                        </div>
                                        <div>
                                            <h4 class="number">
                                                <span>Drop Us an Email</span>
                                                info@skyeagletrip.com
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="customer-support mb-0">
                                        <div class="icon bg-teal">
                                            <i class="isax isax-call5"></i>
                                        </div>
                                        <div>
                                            <h4 class="number">
                                                <span>Toll Free</span>
                                                +1 56569 54698
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row  -->
                    </div>
                </div>
                <!-- end row  -->
            </div>
            <!-- end footer -->
        </div>
        <!-- Copy Rights -->
        <div class="copy-rights">
            <div class="container">
                <div class="copy-content">
                    <div class="social-app">
                        <a href="#" target="_blank"><img src="{{URL::asset('build/img/icons/google-play.svg')}}" alt="google" class="img-fluid social-icon"></a>
                        <a href="#" target="_blank"><img src="{{URL::asset('build/img/icons/app-store.svg')}}" alt="google" class="img-fluid social-icon"></a>
                    </div>
                    <p>&copy; 2026. All rights reserved. <a href="#" class="copy-link">DreamsTour</a> </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->
@endif

@if (Route::is(['index-11']))
    <!-- Footer -->
    <footer class="footer-three footer-eleven">
        <div class="footer-top">
            <div class="footer-title-text">
                DREAMSTOUR
            </div>
            <div class="container">
                <div class="footer-subscribe">
                    <div class="row row-gap-3 align-items-center">
                        <div class="col-lg-7">
                            <div>
                                <h2 class="text-white mb-0">Subscribe to Keep Updated </h2>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="footer-input">
                                <div class="input-group align-items-center justify-content-center">
                                    <span class="input-group-text px-1"><i
                                            class="isax isax-message-favorite5"></i></span>
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit" class="btn btn-primary btn-md">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-4">
                        <div class="footer-widget">
                            <div class="footer-about">
                                <div class="mb-4">
                                    <a href="{{url('index')}}" class="d-inline-block mb-3">
                                        <img src="{{URL::asset('build/img/logo.svg')}}" alt="logo">
                                    </a>
                                    <p>Our mission is to offer you a seamless and enjoyable car rental experience.
                                        Whether you’re planning a road trip</p>
                                    <ul class="social-icon mt-3">
                                        <li>
                                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-8">
                        <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1 row-gap-3">
                            <div class="col">
                                <div class="footer-widget mb-0">
                                    <div class="home-eleven-title">Activities</div>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="#">Sky Dive Ride</a>
                                        </li>
                                        <li>
                                            <a href="#">Hot Air Balloon Ride</a>
                                        </li>
                                        <li>
                                            <a href="#">Desert Safari</a>
                                        </li>
                                        <li>
                                            <a href="#">High Speed Boat Ride</a>
                                        </li>
                                        <li>
                                            <a href="#">Montain Climbing</a>
                                        </li>
                                        <li>
                                            <a href="#">Cultural Events</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-widget mb-0">
                                    <div class="home-eleven-title">Menu</div>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{url('index')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('flight-list')}}">Flight</a>
                                        </li>
                                        <li>
                                            <a href="{{url('hotel-list')}}">Hotel</a>
                                        </li>
                                        <li>
                                            <a href="{{url('car-list')}}">Car</a>
                                        </li>
                                        <li>
                                            <a href="{{url('cruise-list')}}">Cruise</a>
                                        </li>
                                        <li>
                                            <a href="{{url('tour-list')}}">Tour</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-widget mb-0">
                                    <div class="home-eleven-title">Contact Us</div>
                                    <div class="customer-info">
                                        <div class="customer-info-icon">
                                            <span><i class="isax isax-headphone5"></i></span>
                                        </div>
                                        <div class="customer-info-content">
                                            <span>Customer Support</span>
                                            <span class="customer-info-text">+1 56589 54598</span>
                                        </div>
                                    </div>
                                    <div class="customer-info">
                                        <div class="customer-info-icon">
                                            <span><i class="isax isax-sms5"></i></span>
                                        </div>
                                        <div class="customer-info-content">
                                            <span>Drop Us an Email</span>
                                            <span class="customer-info-text">info@skyeagletrip.com</span>
                                        </div>
                                    </div>
                                    <div class="customer-info mb-0">
                                        <div class="customer-info-icon">
                                            <span><i class="isax isax-call5"></i></span>
                                        </div>
                                        <div class="customer-info-content">
                                            <span>Toll Free</span>
                                            <span class="customer-info-text">+1 56569 54698</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 ">
                        <p class="text-lg-start text-center">Copyright &copy; 2026. All Rights Reserved, <a href="#" class="fw-medium">DreamsTour</a></p>
                    </div>
                    <div class="col-md-5">
                        <ul class="policy-links justify-content-lg-end justify-content-center gap-2">
                            <li>
                                <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="{{url('terms-conditions')}}">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->
    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-12']))
    <!-- Start Footer Section -->
    <footer class="footer footer-twelve">
        <div class="footer-top">
            <img src="{{URL::asset('build/img/provider/footer-img-1.png')}}" alt="footer" class="img-fluid img-1 wow fadeInLeft" data-wow-delay="0.3" data-wow-duration="1.5s">
            <div class="container">
                <!-- start row -->
                <div class="row subscribe-item">
                    <div class="col-xl-3"></div>
                    <div class="col-xl-9">
                        <div class="footer-subscribe wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                            <h3 class="subscribe">Subscribe to Keep Updated </h3>
                            <div class="footer-input">
                                <div class="input-group align-items-center justify-content-center">
                                    <span class="input-group-text px-1"><i class="isax isax-message-favorite5"></i></span>
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit" class="btn btn-primary btn-md">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <!-- start row -->
                <div class="row footer-bottom-content align-items-center row-gap-3">
                    <div class="col-lg-6">
                        <div class="footer-content">
                            <a href="{{url('index-12')}}" class="foot-logo d-block mb-2"><img src="{{URL::asset('build/img/logo.svg')}}" alt="logo" class="img-fluid"></a>
                            <p>Our mission is to offer you a seamless and enjoyable car <br> rental experience. Whether you’re planning a road trip</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="footer-link">
                            <li><a href="{{url('index-12')}}" class="link">Home</a></li>
                            <li><a href="{{url('flight-grid')}}" class="link">Flight</a></li>
                            <li><a href="{{url('hotel-grid')}}" class="link">Hotel</a></li>
                            <li><a href="{{url('car-grid')}}" class="link">Car</a></li>
                            <li><a href="{{url('cruise-grid')}}" class="link">Cruise</a></li>
                            <li><a href="{{url('tour-grid')}}" class="link">Tour</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row align-items-center row-gap-3">
                    <div class="col-xxl-6 col-xl-5 col-lg-4">
                        <ul class="social-icon">
                            <li>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xxl-6 col-xl-7 col-lg-8">
                        <div class="d-flex align-items-center justify-content-md-end justify-content-center flex-wrap gap-3 footer-support-twelve">
                            <div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <span class="avatar avatar-lg bg-primary rounded-circle flex-shrink-0">
                                        <i class="ti ti-headphones-filled fs-24"></i>
                                    </span>
                                    <div class="ms-2">
                                        <div class="fw-medium text-light mb-1 fs-16 fw-medium text-white"><a href="#" class="text-white">+91 89800 46600</a></div>
                                        <p class="fs-14 text-light">Customer Support</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <span class="avatar avatar-lg bg-secondary rounded-circle flex-shrink-0">
                                        <i class="isax isax-message-25 fs-24"></i>
                                    </span>
                                    <div class="ms-2">
                                        <div class="fw-medium text-light mb-1 fs-16 fw-medium text-white"><a href="#" class="text-white">info@skyeagletrip.com</a></div>
                                        <p class="fs-14 text-light">Drop Us an Email</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <span class="avatar avatar-lg bg-purple rounded-circle flex-shrink-0">
                                        <i class="isax isax-call5 fs-24"></i>
                                    </span>
                                    <div class="ms-2">
                                        <div class="fw-medium text-light mb-1 fs-16 fw-medium text-white"><a href="#" class="text-white">+1 56569 54698</a></div>
                                        <p class="fs-14 text-light">Toll Free</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
        </div>
        <div class="copy-rights">
            <div class="container">
                <div class="copy-right d-flex align-items-center justify-content-md-between justify-content-center gap-2 flex-wrap">
                    <p>Copyright © 2026. All Rights Reserved, <a href="{{url('index')}}">DreamsTour</a></p>
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <a href="{{url('privacy-policy')}}" class="copy-link">Privacy Policy</a>
                        <a href="{{url('privacy-policy')}}" class="copy-link">Terms and Conditions</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{URL::asset('build/img/bg/globe-img.png')}}" alt="globe" class="img-fluid globe-img">
    </footer>
    <!-- End Footer Section -->
@endif