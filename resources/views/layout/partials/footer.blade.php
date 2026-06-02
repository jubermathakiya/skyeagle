    <footer class="footer-five">
        <div class="container">
            <div class="footer-top">
                <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <div class="col-lg-5">
                        <div class="footer-about">
                            <span class="d-block mb-2 footer-logo-light"><img src="{{asset('assets/img/sky_logo.png')}}"
                                    width="100" height="100" alt="Logo"></span>
                            <span class="mb-2 footer-logo-dark"><img src="{{asset('assets/img/sky_logo.png')}}" width="100" height="100" alt="Logo"></span>
                            <p>At <strong>Sky Eagle Trip Tour</strong>, we are committed to delivering a seamless and unforgettable cruise
                                experience. </p>
                            <h5>Subscribe to Our Newsletter</h5>
                            <div class="footer-input">
                                <form id="newsletter_subscribe_form" action="{{ route('newsletter.subscribe') }}"
                                    method="POST">
                                    @csrf
                                    <div class="input-group align-items-center justify-content-center">
                                        <span class="input-group-text px-1"><i
                                                class="isax isax-message-favorite5"></i></span>
                                        <input type="email" name="email" id="newsletter_email"
                                            class="form-control" placeholder="Enter Email Address"
                                            autocomplete="email" required>
                                        <button type="submit" class="btn btn-primary">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
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
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>Company</h5>
                            <ul class="footer-menu">
                                <li>
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Careers</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Affiliate Program</a>
                                </li>
                                <li>
                                    <a href="add-flight.html">Add Your Listing</a>
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
                                    <span class="avatar avatar-lg bg-primary rounded-circle flex-shrink-0"><i class="isax isax-call5 text-white"></i></span>
                                </div>
                                <div class="customer-info-content">
                                    <span>Customer Support</span>
                                    <h6>+91 89800 46600</h6>
                                </div>
                            </div>
                            <div class="customer-info">
                                <div class="customer-info-icon">
                                    <span class="avatar avatar-lg bg-secondary rounded-circle flex-shrink-0"><i class="isax isax-sms5 text-white"></i></span>
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
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <p class="fs-14">Copyright &copy; {{date('Y')}}. All Rights Reserved, <a href="#"
                                    class="text-primary fw-medium"> {{ config('app.name') }}</a></p>
                            <div class="d-flex align-items-center">
                                <ul class="social-icon">
                                    <li>
                                        <a href="https://www.facebook.com/skyeagletrip.world/" target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://x.com/sky_trip_eagle" target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-x-twitter"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://www.instagram.com/skyeagletrip/" target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://www.linkedin.com/company/skyeagletrip/" target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-linkedin"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://in.pinterest.com/sky_eagle_trip/" target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-pinterest"></i>
                                        </a>
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