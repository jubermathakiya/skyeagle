<?php $page="index-10";?>
@extends('layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Start Categories Section -->
    <section class="section categories-section-ten">
        <div class="container">
            <div class="section-header-ten wow fadeInUp" data-wow-delay="1.5">
                <h2 class="section-title">Featured Tour <span>Categories</span> </h2>
                <a href="#" class="btn btn-primary">View All Categories <i class="isax isax-arrow-right-3"></i> </a>
            </div>

            <!-- start row -->
            <div class="row row-cols-lg-5 row-cols-md-2 row-cols-sm-2 row-cols-1 g-4 justify-content-center">
                <div class="col">
                    <!-- Item 1 -->
                    <div class="categories-item-ten wow fadeInUp" data-wow-delay="1" data-wow-duration="1s">
                        <div class="categories-overlay">
                            <img src="{{URL::asset('build/img/tours/categories-img-1.jpg')}}" alt="categories-img"
                                class="img-fluid img-1">
                        </div>
                        <div class="categories-content">
                            <h3 class="custom-title">Ecotourism</h3>
                            <p class="mb-0">25 Guides</p>
                        </div>
                        <a href="#" class="arrow-icon"><i class="isax isax-arrow-right-1"></i></a>
                        <img src="{{URL::asset('build/img/icons/categories-icon-1.svg')}}" alt="categories" class="img-fluid shape-1">
                    </div>
                </div> <!-- end col -->
                <div class="col">
                    <!-- Item 1 -->
                    <div class="categories-item-ten wow fadeInUp" data-wow-delay="1.5" data-wow-duration="1.5s">
                        <div class="categories-overlay">
                            <img src="{{URL::asset('build/img/tours/categories-img-2.jpg')}}" alt="categories-img"
                                class="img-fluid img-1">
                        </div>
                        <div class="categories-content">
                            <h3 class="custom-title">Adventure Tour</h3>
                            <p class="mb-0">47 Guides</p>
                        </div>
                        <a href="#" class="arrow-icon"><i class="isax isax-arrow-right-1"></i></a>
                        <img src="{{URL::asset('build/img/icons/categories-icon-1.svg')}}" alt="categories" class="img-fluid shape-1">
                    </div>
                </div> <!-- end col -->
                <div class="col">
                    <!-- Item 1 -->
                    <div class="categories-item-ten wow fadeInUp" data-wow-delay="2" data-wow-duration="2s">
                        <div class="categories-overlay">
                            <img src="{{URL::asset('build/img/tours/categories-img-3.jpg')}}" alt="categories-img"
                                class="img-fluid img-1">
                        </div>
                        <div class="categories-content">
                            <h3 class="custom-title">Group Tours</h3>
                            <p class="mb-0">38 Guides</p>
                        </div>
                        <a href="#" class="arrow-icon"><i class="isax isax-arrow-right-1"></i></a>
                        <img src="{{URL::asset('build/img/icons/categories-icon-1.svg')}}" alt="categories" class="img-fluid shape-1">
                    </div>
                </div> <!-- end col -->
                <div class="col">
                    <!-- Item 1 -->
                    <div class="categories-item-ten wow fadeInUp" data-wow-delay="2.5" data-wow-duration="2.5s">
                        <div class="categories-overlay">
                            <img src="{{URL::asset('build/img/tours/categories-img-4.jpg')}}" alt="categories-img"
                                class="img-fluid img-1">
                        </div>
                        <div class="categories-content">
                            <h3 class="custom-title">Beach Tours</h3>
                            <p class="mb-0">54 Guides</p>
                        </div>
                        <a href="#" class="arrow-icon"><i class="isax isax-arrow-right-1"></i></a>
                        <img src="{{URL::asset('build/img/icons/categories-icon-1.svg')}}" alt="categories" class="img-fluid shape-1">
                    </div>
                </div> <!-- end col -->
                <div class="col">
                    <!-- Item 1 -->
                    <div class="categories-item-ten wow fadeInUp" data-wow-delay="3" data-wow-duration="3s">
                        <div class="categories-overlay">
                            <img src="{{URL::asset('build/img/tours/categories-img-5.jpg')}}" alt="categories-img"
                                class="img-fluid img-1">
                        </div>
                        <div class="categories-content">
                            <h3 class="custom-title">Honey Moon</h3>
                            <p class="mb-0">22 Guides</p>
                        </div>
                        <a href="#" class="arrow-icon"><i class="isax isax-arrow-right-1"></i></a>
                        <img src="{{URL::asset('build/img/icons/categories-icon-1.svg')}}" alt="categories" class="img-fluid shape-1">
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div>
    </section>
    <!-- End Categories Section -->

    <!-- Start Destination Section -->
    <section class="section destination-section-ten">
        <div class="container">
            <div class="section-header-ten wow fadeInUp" data-wow-delay="1.5">
                <h2 class="section-title">Explore our hand picked <span>destinations around the globe</span> </h2>
            </div>
            <!-- start row -->
            <div class="row row-gap-4">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="destination-item-ten wow fadeInUp" data-wow-delay="1" data-wow-duration="1s">
                        <div class="destination-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/destination/destination-img-1.jpg')}}" alt="destination" class="img-fluid img-1"></a>
                            <img src="{{URL::asset('build/img/icons/shape-2.svg')}}" alt="categories" class="img-fluid shape-1">
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title"><a href="#">Santorini, Greece</a></h3>
                                <p> Starts From <span> $200</span> </p>
                            </div>
                            <div>
                                <a href="#" class="link-icon"> <i class="isax isax-arrow-right-3"></i> </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="destination-item-ten wow fadeInUp" data-wow-delay="1.5" data-wow-duration="1.5s">
                        <div class="destination-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/destination/destination-img-2.jpg')}}" alt="destination" class="img-fluid img-1"></a>
                            <img src="{{URL::asset('build/img/icons/shape-2.svg')}}" alt="categories" class="img-fluid shape-1">
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title"><a href="#">Tokyo, Japan</a></h3>
                                <p> Starts From <span> $300</span> </p>
                            </div>
                            <div>
                                <a href="#" class="link-icon"> <i class="isax isax-arrow-right-3 text-xl"></i> </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="destination-item-ten wow fadeInUp" data-wow-delay="2" data-wow-duration="2s">
                        <div class="destination-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/destination/destination-img-3.jpg')}}" alt="destination" class="img-fluid img-1"></a>
                            <img src="{{URL::asset('build/img/icons/shape-2.svg')}}" alt="categories" class="img-fluid shape-1">
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title"><a href="#">Paris, France</a></h3>
                                <p> Starts From <span> $320</span> </p>
                            </div>
                            <div>
                                <a href="#" class="link-icon"> <i class="isax isax-arrow-right-3 text-xl"></i> </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="destination-item-ten wow fadeInUp" data-wow-delay="2.5" data-wow-duration="2.5s">
                        <div class="destination-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/destination/destination-img-4.jpg')}}" alt="destination" class="img-fluid img-1"></a>
                            <img src="{{URL::asset('build/img/icons/shape-2.svg')}}" alt="categories" class="img-fluid shape-1">
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title"><a href="#">Bali, Indonesia</a></h3>
                                <p> Starts From <span> $180</span> </p>
                            </div>
                            <div>
                                <a href="#" class="link-icon"> <i class="isax isax-arrow-right-3 text-xl"></i> </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="view-more wow fadeInUp" data-wow-delay="1.5">
                <a href="{{url('destination')}}" class="btn btn-primary">View All Destinations <i
                        class="isax isax-arrow-right-3"></i> </a>
            </div>

        </div>
    </section>
    <!-- End Destination Section -->

    <!-- Start Slide Section -->
    <section class="support-section support-sec-eight support-section-ten overflow-hidden wow fadeInUp"
        data-wow-delay="1.5">
        <div class="horizontal-slide d-flex" data-direction="right" data-speed="slow">
            <div class="slide-list d-flex">
                <div class="support-item">
                    <h3>Comprehensive Planning</h3>
                </div>
                <div class="support-item">
                    <div><img src="{{URL::asset('build/img/users/user-icon-1.png')}}" alt="user" class="img-1"></div>
                </div>
                <div class="support-item">
                    <h3>Expert Guidance</h3>
                </div>
                <div class="support-item">
                    <div><img src="{{URL::asset('build/img/users/user-icon-1.png')}}" alt="user" class="img-1"></div>
                </div>
                <div class="support-item">
                    <h3>Local Experience</h3>
                </div>
                <div class="support-item">
                    <div><img src="{{URL::asset('build/img/users/user-icon-1.png')}}" alt="user" class="img-1"></div>
                </div>
                <div class="support-item">
                    <h3>Languages spoken</h3>
                </div>
                <div class="support-item">
                    <div><img src="{{URL::asset('build/img/users/user-icon-1.png')}}" alt="user" class="img-1"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Slide Section -->

    <!-- Start Experience Section -->
    <section class="section experience-section-ten">
        <div class="container">
            <div class="section-header-ten wow fadeInUp" data-wow-delay="1.5">
                <h2 class="section-title">We're committed to providing the <span class="d-block"> best tour
                        experiences</span> </h2>
            </div>

            <!-- start row -->
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <!-- Item 1  -->
                    <div class="experience-item-ten">
                        <div class="experience-icon">
                            <i class="isax isax-calendar-search5"></i>
                        </div>
                        <div class="experience-content">
                            <h3 class="custom-title mb-2">Custom Itineraries</h3>
                            <p>Flexible tours tailored to your interests and schedule</p>
                        </div>
                    </div>
                    <!-- Item 2  -->
                    <div class="experience-item-ten">
                        <div class="experience-icon bg-teal">
                            <i class="isax isax-money5"></i>
                        </div>
                        <div class="experience-content">
                            <h3 class="custom-title mb-2">Best Price Guarantee</h3>
                            <p>Get the best value with our price match promise</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-flex">
                    <div class="experience-img wow zoomIn" data-wow-delay="1.5">
                        <img src="{{URL::asset('build/img/experiance/experience-img-1.png')}}" alt="experience-img"
                            class="img-fluid img-1">
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- Item 3  -->
                    <div class="experience-item-ten">
                        <div class="experience-icon bg-primary">
                            <i class="isax isax-document-copy5"></i>
                        </div>
                        <div class="experience-content">
                            <h3 class="custom-title mb-2">Certified Guides</h3>
                            <p>All our guides are certified professionals with local knowledge</p>
                        </div>
                    </div>
                    <!-- Item 4  -->
                    <div class="experience-item-ten">
                        <div class="experience-icon bg-secondary">
                            <i class="isax isax-security-user5"></i>
                        </div>
                        <div class="experience-content">
                            <h3 class="custom-title mb-2">24/7 Support</h3>
                            <p>Round-the-clock assistance whenever you need it</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <img src="{{URL::asset('build/img/experiance/exp-shadow-3.png')}}" alt="shadow-img" class="img-fluid shadow-1">
    </section>
    <!-- End Experience Section -->

    <!-- Start Team Section -->
    <section class="section team-section-ten">
        <div class="container">
            <div class="section-header-ten wow fadeInUp" data-wow-delay="1.5">
                <h2 class="section-title">Featured <span> Guides</span> </h2>
            </div>

            <!-- start row -->
            <div class="row row-gap-4">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-item-ten wow fadeInUp" data-wow-delay="1" data-wow-duration="1s">
                        <div class="team-item-ten">
                            <div class="team-overlay">
                                <a href="{{url('team')}}">
                                    <img src="{{URL::asset('build/img/users/user-lg-31.jpg')}}" alt="destination"
                                        class="img-fluid img-1">
                                    <img src="{{URL::asset('build/img/icons/shape-3.png')}}" alt="categories" class="img-fluid shape-1">
                                </a>
                            </div>
                            <div class="team-content">
                                <div class="title">
                                    <h3 class="custom-title"><a href="{{url('team')}}">Anthony Perez</a></h3>
                                    <p> Chicago </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-item-ten wow fadeInUp" data-wow-delay="1.5" data-wow-duration="1.5s">
                        <div class="team-item-ten">
                            <div class="team-overlay">
                                <a href="{{url('team')}}">
                                    <img src="{{URL::asset('build/img/users/user-lg-32.jpg')}}" alt="destination"
                                        class="img-fluid img-1">
                                    <img src="{{URL::asset('build/img/icons/shape-3.png')}}" alt="categories" class="img-fluid shape-1">
                                </a>
                            </div>
                            <div class="team-content">
                                <div class="title">
                                    <h3 class="custom-title"><a href="{{url('team')}}">Olivia Martinez</a></h3>
                                    <p> Tokyo </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-item-ten wow fadeInUp" data-wow-delay="2" data-wow-duration="2s">
                        <div class="team-item-ten">
                            <div class="team-overlay">
                                <a href="{{url('team')}}">
                                    <img src="{{URL::asset('build/img/users/user-lg-33.jpg')}}" alt="destination"
                                        class="img-fluid img-1">
                                    <img src="{{URL::asset('build/img/icons/shape-3.png')}}" alt="categories" class="img-fluid shape-1">
                                </a>
                            </div>
                            <div class="team-content">
                                <div class="title">
                                    <h3 class="custom-title"><a href="{{url('team')}}">Tyler Morgan</a></h3>
                                    <p> Bangkok </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-item-ten wow fadeInUp" data-wow-delay="2.5" data-wow-duration="2.5s">
                        <div class="team-item-ten">
                            <div class="team-overlay">
                                <a href="{{url('team')}}">
                                    <img src="{{URL::asset('build/img/users/user-lg-34.jpg')}}" alt="destination"
                                        class="img-fluid img-1">
                                    <img src="{{URL::asset('build/img/icons/shape-3.png')}}" alt="categories" class="img-fluid shape-1">
                                </a>
                            </div>
                            <div class="team-content">
                                <div class="title">
                                    <h3 class="custom-title"><a href="{{url('team')}}">Karen Perez</a></h3>
                                    <p> Singapore </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- End Experience Section -->

    <!-- Start Testimonial Section -->
    <section class="section testimonial-section-ten">
        <div class="container">
            <div class="testimonial-header wow fadeInUp" data-wow-delay="1.5">
                <div class="section-header-ten">
                    <h2 class="section-title">Hear From Our <span> Happy Clients</span> </h2>
                </div>
                <div class="advisor-icon">
                    <img src="{{URL::asset('build/img/icons/testimonial-icon-1.svg')}}" alt="testimonial" class="img-fluid img-1">
                    <p>
                        <i class="fa-solid fa-circle"></i>
                        <i class="fa-solid fa-circle"></i>
                        <i class="fa-solid fa-circle"></i>
                        <i class="fa-solid fa-circle"></i>
                        <i class="fa-solid fa-circle"></i>
                        <span>5.0 From 2560+Reviews </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Slide section  -->
        <div class="horizontal-slide d-flex mb-4 wow fadeInUp" data-wow-delay="1.5" data-direction="left"
            data-speed="slow">
            <div class="slide-list d-flex gap-4">
                <!-- Item 1 -->
                <div class="testimonial-item-ten ">
                    <div class="testimonial-author">
                        <div class="testimonial-view">
                            <div class="author-img">
                                <a href="#" class="author"><img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="profile"></a>
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Dazzle Healer</a>
                                <p class="professional">Front End Developer</p>
                            </div>
                        </div>
                        <div class="review-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                    <p class="description">
                        I've explored many tour options, but this one stands out. The detailed planning and
                        user-friendly approach are exceptional. Highly recommended for seamless travel experiences.
                        Kudos to the team!
                    </p>
                </div>

                <!-- Item 2 -->
                <div class="testimonial-item-ten">
                    <div class="testimonial-author">
                        <div class="testimonial-view">
                            <div class="author-img">
                                <a href="#" class="author"><img src="{{URL::asset('build/img/users/user-02.jpg')}}" alt="profile"></a>
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Crystal Maiden</a>
                                <p class="professional">UIUX Designer</p>
                            </div>
                        </div>
                        <div class="review-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                    <p class="description">
                        This tour platform has transformed my travel planning. The intuitive interface and comprehensive
                        information save valuable time. Perfect for both novice and experienced travelers seeking
                        adventure.
                    </p>
                </div>

                <!-- Item 3 -->
                <div class="testimonial-item-ten">
                    <div class="testimonial-author">
                        <div class="testimonial-view">
                            <div class="author-img">
                                <a href="#" class="author"><img src="{{URL::asset('build/img/users/user-03.jpg')}}" alt="profile"></a>
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Steave Paul </a>
                                <p class="professional">Back End Developer</p>
                            </div>
                        </div>
                        <div class="review-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                    <p class="description">
                        This guide turned our trip into an unforgettable experience. The planning was perfect, the timing was smooth, and the stories shared at each location made the tour truly come alive.
                    </p>
                </div>

                <!-- Item 4 -->
                <div class="testimonial-item-ten">
                    <div class="testimonial-author">
                        <div class="testimonial-view">
                            <div class="author-img">
                                <a href="#" class="author"><img src="{{URL::asset('build/img/users/user-05.jpg')}}" alt="profile"></a>
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Thomos John</a>
                                <p class="professional">Mobile App Developer</p>
                            </div>
                        </div>
                        <div class="review-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                    <p class="description">
                        I’ve explored many destinations, but this tour felt different because of the guide’s personal attention and deep local insight. Everything was well organized and easy to follow. Highly recommended.
                    </p>
                </div>

            </div>
        </div>
        <!-- Slide section -->

        <!-- Slide section  -->
        <div class="horizontal-slide d-flex wow fadeInUp" data-wow-delay="1.5" data-direction="right" data-speed="slow">
            <div class="slide-list d-flex gap-4">
                <!-- Item 1 -->
                <div class="testimonial-item-ten">
                    <div class="testimonial-author">
                        <div class="testimonial-view">
                            <div class="author-img">
                                <a href="#" class="author"><img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="profile"></a>
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Dazzle Healer</a>
                                <p class="professional">Front End Developer</p>
                            </div>
                        </div>
                        <div class="review-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                    <p class="description">
                        From pickup to the final stop, the guide handled everything perfectly. Clear instructions, friendly attitude, and great destination knowledge made this one of my best travel experiences.
                    </p>
                </div>

                <!-- Item 2 -->
                <div class="testimonial-item-ten">
                    <div class="testimonial-author">
                        <div class="testimonial-view">
                            <div class="author-img">
                                <a href="#" class="author"><img src="{{URL::asset('build/img/users/user-02.jpg')}}" alt="profile"></a>
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Crystal Maiden</a>
                                <p class="professional">UIUX Designer</p>
                            </div>
                        </div>
                        <div class="review-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                    <p class="description">
                        As a tourist, I truly enjoyed every part of the tour because of the guide’s excellent planning and friendly support. The explanations were clear and the entire journey felt relaxed and enjoyable.
                    </p>
                </div>

                <!-- Item 3 -->
                <div class="testimonial-item-ten">
                    <div class="testimonial-author">
                        <div class="testimonial-view">
                            <div class="author-img">
                                <a href="#" class="author"><img src="{{URL::asset('build/img/users/user-03.jpg')}}" alt="profile"></a>
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Steave Paul </a>
                                <p class="professional">Back End Developer</p>
                            </div>
                        </div>
                        <div class="review-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                    <p class="description">
                       This guide made our trip smooth and worry free from start to finish. The local tips, well timed stops, and personal attention made the experience feel special and highly memorable.
                    </p>
                </div>

                <!-- Item 4 -->
                <div class="testimonial-item-ten">
                    <div class="testimonial-author">
                        <div class="testimonial-view">
                            <div class="author-img">
                                <a href="#" class="author"><img src="{{URL::asset('build/img/users/user-05.jpg')}}" alt="profile"></a>
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Thomos John</a>
                                <p class="professional">Mobile App Developer</p>
                            </div>
                        </div>
                        <div class="review-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                    <p class="description">
                        I've explored many tour options, but this one stands out. The detailed planning and
                        user-friendly approach are exceptional. Highly recommended for seamless travel experiences.
                        Kudos to the team!
                    </p>
                </div>

            </div>
        </div>
        <!-- Slide section -->

        <img src="{{URL::asset('build/img/experiance/exp-shadow-4.png')}}" alt="shadow" class="img-flui shadow-1">
    </section>
    <!-- End Testimonial Section -->

    <!-- Start Partners Section -->
    <div class="section bg-white pt-0">
        <section class="section partners-section-ten wow fadeInUp" data-wow-delay="1.5">
            <div class="container">
                <div class="partners-slider">
                    <div class="slide-item">
                        <h2><img src="{{URL::asset('build/img/clients/client-1.svg')}}" alt="client"></h2>
                    </div>
                    <div class="slide-item">
                        <h2><img src="{{URL::asset('build/img/clients/client-2.svg')}}" alt="client"></h2>
                    </div>
                    <div class="slide-item">
                        <h2><img src="{{URL::asset('build/img/clients/client-3.svg')}}" alt="client"></h2>
                    </div>
                    <div class="slide-item">
                        <h2><img src="{{URL::asset('build/img/clients/client-4.svg')}}" alt="client"></h2>
                    </div>
                    <div class="slide-item">
                        <h2><img src="{{URL::asset('build/img/clients/client-5.svg')}}" alt="client"></h2>
                    </div>
                    <div class="slide-item">
                        <h2><img src="{{URL::asset('build/img/clients/client-6.svg')}}" alt="client"></h2>
                    </div>
                    <div class="slide-item">
                        <h2><img src="{{URL::asset('build/img/clients/client-7.svg')}}" alt="client"></h2>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End Partners Section -->

    <!-- Start FAQ Section -->
    <section class="section faq-section-ten">
        <div class="container">
            <!-- start row  -->
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section-header-ten wow fadeInUp" data-wow-delay="1.5">
                        <h2 class="section-title">Frequently <span> Asked Questions </span> </h2>
                    </div>
                    <div class="accordion accordion-flush faq-accordion-five" id="accordionFaq">
                        <div class="accordion-item show mb-3 wow fadeInUp" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapseOne" aria-expanded="false"
                                    aria-controls="faq-collapseOne">
                                    <span>Q1</span> What types of tours do you offer?
                                </button>
                            </h2>
                            <div id="faq-collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p class="mb-0">We offer a wide range of tours, including cultural, adventure,
                                        luxury, and customized itineraries.</p>
                                    <p>Popular destinations include Europe, Africa (e.g., Morocco), </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 wow fadeInUp" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapsetwo" aria-expanded="false"
                                    aria-controls="faq-collapsetwo">
                                    <span>Q2</span> Do I need a travel guide for every tour?
                                </button>
                            </h2>
                            <div id="faq-collapsetwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p>Not always. Travel guides are helpful for cultural sites, unfamiliar
                                        destinations, group tours, or when you want deeper local insight. Independent
                                        travelers may skip a guide for simple or well-marked trips.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3  wow fadeInUp" data-wow-delay="0.6s"
                            style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapsthree" aria-expanded="false"
                                    aria-controls="faq-collapsthree">
                                    <span>Q3</span> What languages do travel guides speak?
                                </button>
                            </h2>
                            <div id="faq-collapsthree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p>Many guides are multilingual. Common languages include English, Spanish, French,
                                        German, Mandarin, and regional languages. Availability depends on the
                                        destination and guide certification.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 wow fadeInUp" data-wow-delay="0.8s"
                            style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapsefour" aria-expanded="false"
                                    aria-controls="faq-collapsefour">
                                    <span>Q4</span> Can travel guides customize the tour?
                                </button>
                            </h2>
                            <div id="faq-collapsefour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p>Yes. Most guides can tailor itineraries based on your interests, pace, budget,
                                        dietary needs, accessibility requirements, and time constraints.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="1.0s"
                            style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapsefive" aria-expanded="false"
                                    aria-controls="faq-collapsefive">
                                    <span>Q5</span> Are travel guides suitable for families or solo travelers?
                                </button>
                            </h2>
                            <div id="faq-collapsefive" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p>Absolutely. Guides adapt experiences for families (kid-friendly activities,
                                        safety) and solo travelers (personalized pacing, local connections, and added
                                        security).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row  -->
                <div class="col-lg-4">
                    <div class="faq-img-ten">
                        <img src="{{URL::asset('build/img/faq/faq-img-1.jpg')}}" alt="faq" class="img-fluid img-1">
                    </div>
                </div> <!-- end row  -->
            </div>
            <!-- end row  -->
        </div>
    </section>
    <!-- End FAQ Section -->

    <!-- Start Blog Section -->
    <section class="section blog-section-ten">
        <div class="container">
            <div class="section-header-ten wow fadeInUp" data-wow-delay="1.5">
                <h2 class="section-title">Stay Updated  <span> on the Stories </span> </h2>
                <a href="{{url('blog-grid')}}" class="btn btn-primary d-flex align-items-center"> View All <i class="isax isax-arrow-right-3"></i> </a>
            </div>

            <!-- start slider  -->
            <div class="blog-ten-slider">
                <div class="slide-item wow fadeInUp" data-wow-delay="1" data-wow-duration="1s">
                    <!-- Item 1  -->
                    <div class="blog-item-ten">
                        <div class="blog-overlay">
                            <img src="{{URL::asset('build/img/blog/blog-img-1.jpg')}}" alt="blog-img" class="img-1">
                        </div>
                        <div class="blog-content">
                            <button class="badge border-0">Guided Tours</button>
                            <h3 class="custom-title"><a href="#">How a Travel Guide Can Enhance Your Adventure </a></h3>
                        </div>
                        <div class="blog-date">
                            <h4 class="date">30</h4>
                            <p class="month">Mar</p>
                        </div>
                    </div>
                </div> <!-- end Item  -->

                <div class="slide-item">
                    <!-- Item 2  -->
                    <div class="blog-item-ten wow fadeInUp" data-wow-delay="1.5" data-wow-duration="1.5s">
                        <div class="blog-overlay">
                            <img src="{{URL::asset('build/img/blog/blog-img-2.jpg')}}" alt="blog-img" class="img-1">
                        </div>
                        <div class="blog-content">
                            <button class="badge border-0">Travel Tips</button>
                            <h3 class="custom-title"><a href="#">How to Choose the Right Travel Guide for Your Trip</a>
                            </h3>
                        </div>
                        <div class="blog-date">
                            <h4 class="date">22</h4>
                            <p class="month">Feb</p>
                        </div>
                    </div>
                </div> <!-- end Item  -->

                <div class="slide-item">
                    <!-- Item 3  -->
                    <div class="blog-item-ten wow fadeInUp" data-wow-delay="2" data-wow-duration="2s">
                        <div class="blog-overlay">
                            <img src="{{URL::asset('build/img/blog/blog-img-3.jpg')}}" alt="blog-img" class="img-1">
                        </div>
                        <div class="blog-content">
                            <button class="badge border-0">Activity Tours</button>
                            <h3 class="custom-title"><a href="#">Adventure Sports Experiences with Professional Guides</a></h3>
                        </div>
                        <div class="blog-date">
                            <h4 class="date">15</h4>
                            <p class="month">Jan</p>
                        </div>
                    </div>
                </div> <!-- end Item  -->

                <div class="slide-item wow fadeInUp" data-wow-delay="1" data-wow-duration="1s">
                    <!-- Item 1  -->
                    <div class="blog-item-ten">
                        <div class="blog-overlay">
                            <img src="{{URL::asset('build/img/blog/blog-img-1.jpg')}}" alt="blog-img" class="img-1">
                        </div>
                        <div class="blog-content">
                            <button class="badge border-0">Guided Tours</button>
                            <h3 class="custom-title"><a href="#">How a Travel Guide Can Enhance Your Adventure </a></h3>
                        </div>
                        <div class="blog-date">
                            <h4 class="date">30</h4>
                            <p class="month">Mar</p>
                        </div>
                    </div>
                </div> <!-- end Item  -->

                <div class="slide-item">
                    <!-- Item 3  -->
                    <div class="blog-item-ten wow fadeInUp" data-wow-delay="2" data-wow-duration="2s">
                        <div class="blog-overlay">
                            <img src="{{URL::asset('build/img/blog/blog-img-3.jpg')}}" alt="blog-img" class="img-1">
                        </div>
                        <div class="blog-content">
                            <button class="badge border-0">Activity Tours</button>
                            <h3 class="custom-title"><a href="#">Adventure Sports Experiences with Professional Guides</a></h3>
                        </div>
                        <div class="blog-date">
                            <h4 class="date">15</h4>
                            <p class="month">Jan</p>
                        </div>
                    </div>
                </div> <!-- end Item  -->

            </div>
            <!-- end slider  -->

            <div class="arrow-item wow fadeInUp" data-wow-delay="1.5">
                <button type="button" class="slick-arrow blog-ten-prev"><i class="isax isax-arrow-left-2"></i></button>
                <button type="button" class="slick-arrow blog-ten-next"><i class="isax isax-arrow-right-3"></i></button>
            </div>

        </div>
    </section>
    <!-- End Blog Section -->

    <!-- ========================
        End Page Content
    ========================= -->

@endsection



