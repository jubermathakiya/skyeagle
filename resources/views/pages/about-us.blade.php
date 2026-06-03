<?php $page="about-us";?>
@extends('layout.mainlayout')
@section('title', 'About Us')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-01 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- About Section -->
    <section class="section about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image mb-4 mb-lg-0">
                        <div class="about-listing">
                            <i class="isax isax-calendar-add text-white mb-2"></i>
                            <h6 class="fs-16 mb-3 text-white">All Listings</h6>
                            <div class="listing-img">
                                <div>
                                    <img src="{{URL::asset('build/img/icons/listing.svg')}}" alt="icon">
                                </div>
                                
                            </div>
                        </div>
                        <div class="about-img">
                            <img src="{{URL::asset('build/img/about.png')}}" alt="about">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content mb-4">
                        <h6 class="text-primary fs-14 fw-medium mb-2">About Sky Eagle Trip</h6>
                        <h2 class="display-6 mb-2">Your Trusted Travel Partner for Unforgettable Journeys</h2>
                        <p class="mb-4"> At <strong>Sky Eagle Trip</strong>, we don't just book travel - we craft experiences.
                            Whether you're planning a sun-soaked beach escape, a cultural city tour, a family holiday,
                            or a luxury international getaway, our team is dedicated to making every journey seamless,
                            memorable, and worth every mile.
                            Based in India, we specialize in curating <strong>customized travel packages</strong>
                            for leisure travellers, families, corporates, and Group Tours across the country.
                            With deep expertise in international &amp; domestic destinations and a passion for
                            world-class service, we're your one-stop solution for all things travel.
                        ​</p>                      
                    </div>
                    <div class="about-mission">
                        <h6 class="text-primary fs-14 fw-medium mb-3">Our Mission</h6>
                        <p class="fs-16 text-gray-6">To make quality travel <strong> accessible, effortless, and extraordinary</strong>
                            for every traveller - regardless of budget, destination, or purpose. We believe that the right journey,
                            planned the right way, can change the way you see the world.
                        </p>
                    </div>
                </div>
            </div>
            <div class="about-bg d-none d-md-block">
                <img src="{{URL::asset('build/img/bg/about-bg.png')}}" alt="img" class="about-bg-01">
            </div>
            <div class="about-bg-1 d-none d-md-block">
                <img src="{{URL::asset('build/img/bg/about-arrow.png')}}" alt="img" class="about-bg-01">
            </div>
        </div>
    </section>
    <!-- /About Section -->

    <!-- Why Choose Us -->
    <section class="section choose-us-section">
        <div class="container">
            <div class="choose-title">
                <h2>Why Choose Sky Eagle Trip?</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="choose-card">
                        <div class="choose-icon mb-3">
                            <span class="rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="isax isax-archive-tick text-white"></i></span>
                        </div>
                        <div class="card-content">
                            <h6 class="mb-2">One Platform, Endless Possibilities </h6>
                            <p class="fs-16 text-gray-6">
                                From flights and hotels to tours, transfers, and holiday packages - plan your entire trip with us, without the hassle of juggling multiple platforms.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="choose-card">
                        <div class="choose-icon mb-3">
                            <span class="rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="isax isax-dollar-square text-white"></i></span>
                        </div>
                        <div class="card-content">
                            <h6 class="mb-2">Best Price Guarantee</h6>
                            <p class="fs-16 text-gray-6">
                            We partner with trusted global travel suppliers to offer you competitive pricing without compromising on quality. More value, less stress.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="choose-card">
                        <div class="choose-icon mb-3">
                            <span class="rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="isax isax-headphone text-white"></i></span>
                        </div>
                        <div class="card-content">
                            <h6 class="mb-2">24/7 Dedicated Support </h6>
                            <p class="fs-16 text-gray-6">Travel doesn't stop at business hours - and neither do we. Our support team is always a call or message away to ensure your trip goes exactly as planned.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="choose-card">
                        <div class="choose-icon mb-3">
                            <span class="rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="isax isax-map text-white"></i></span>
                        </div>
                        <div class="card-content">
                            <h6 class="mb-2">Tailored for Every Traveller</h6>
                            <p class="fs-16 text-gray-6">Honeymoon couple? Family of five? Corporate group? Solo explorer? We design travel experiences that fit your unique needs, preferences, and budget.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="choose-bg-01">
                <img src="{{URL::asset('build/img/bg/about-bg-stars-bottom.png')}}" alt="image" class="img-fluid">
            </div>
            <div class="choose-bg-01">
                <img src="{{URL::asset('build/img/bg/about-bg-stars-bottom.png')}}" alt="image" class="img-fluid">
            </div>
            <div class="choose-bg-02">
                <img src="{{URL::asset('build/img/bg/about-bg-stars-top.png')}}" alt="image" class="img-fluid">
            </div>
        </div>
    </section>
    <!-- /Why Choose Us -->

    <!-- Our Team -->
    <section class="section team-section">
        <div class="container">
            <div>
                <div class="col-md-12">
                    <div class="counter-wrap">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="counter-item mb-4">
                                    <h6 class="mb-1 d-flex align-items-center justify-content-center text-teal"><i
                                            class="isax isax-global5 me-2"></i>Destinations</h6>
                                    <h3 class="display-6"><span class="counter">40</span>+</h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter-item mb-4">
                                    <h6 class="mb-1 d-flex align-items-center justify-content-center text-purple"><i
                                            class="isax isax-calendar-2 me-2"></i>Booking Completed</h6>
                                    <h3 class="display-6"><span class="counter">7000</span>+</h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter-item mb-4">
                                    <h6 class="mb-1 d-flex align-items-center justify-content-center text-pink"><i
                                            class="isax isax-tag-user5 me-2"></i>Happy Clients Globally</h6>
                                    <h3 class="display-6"><span class="counter">100</span>+</h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter-item mb-4">
                                    <h6 class="mb-1 d-flex align-items-center justify-content-center text-info"><i
                                            class="isax isax-status-up5 me-2"></i>Trusted Travel Partners</h6>
                                    <h3 class="display-6"><span class="counter">89</span>+</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-bg">
                <img src="{{URL::asset('build/img/bg/about-bg-01.svg')}}" alt="img" class="about-bg-02">
            </div>
        </div>
    </section>
    <!-- /Our Team -->

    <!-- user Section -->
    <style>
        .user-section .testimonial-slider.owl-carousel .owl-stage { display: flex; align-items: stretch; }
        .user-section .testimonial-slider.owl-carousel .owl-item { display: flex; align-items: stretch; height: auto; }
        .user-section .testimonial-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 320px;
            max-height: 320px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .user-section .testimonial-card .card-body {
            display: flex;
            flex-direction: column;
            flex: 1 1 auto;
            min-height: 0;
            height: 100%;
            padding: 1.5rem;
        }
        .user-section .testimonial-card__quote {
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
            min-height: 0;
            overflow: hidden;
            margin-bottom: 0;
        }
        .user-section .testimonial-card__text {
            color: #4e5561;
            line-height: 1.6;
            margin-bottom: 0;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
        }
        .user-section .testimonial-card__text.is-expanded {
            display: block;
            -webkit-line-clamp: unset;
            flex: 1 1 auto;
            min-height: 0;
            overflow-y: auto;
            padding-right: 4px;
        }
        .user-section .testimonial-card__toggle {
            flex-shrink: 0;
            margin-top: 0.5rem;
            padding: 0;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: #0a67f2;
            align-self: flex-start;
        }
        .user-section .testimonial-card__toggle:hover,
        .user-section .testimonial-card__toggle:focus { color: #0a67f2; text-decoration: underline; }
        .user-section .testimonial-card__footer {
            flex-shrink: 0;
            margin-top: auto;
        }
        .user-section .testimonial-card__footer .avatar img {
            width: 48px;
            height: 35px;
            object-fit: cover;
        }
        .user-section .testimonial-card__footer p { margin-bottom: 0; font-size: 14px; color: #4e5561; }
    </style>
    <section class="section user-section pt-0">
        <style>
            .user-section .testimonial-slider.owl-carousel .owl-stage {
                display: flex;
                align-items: stretch;
            }
            .user-section .testimonial-slider.owl-carousel .owl-item {
                display: flex;
                height: auto;
            }
            .user-section .testimonial-card {
                display: flex;
                flex-direction: column;
                width: 100%;
                height: 100%;
                min-height: 300px;
                box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }
            .user-section .testimonial-card .card-body {
                display: flex;
                flex-direction: column;
                flex: 1 1 auto;
                height: 100%;
                padding: 1.5rem;
            }
            .user-section .testimonial-card__quote {
                flex: 1 1 auto;
                display: flex;
                flex-direction: column;
                min-height: 0;
                margin-bottom: 0;
                overflow: hidden;
            }
            .user-section .testimonial-card.is-expanded .testimonial-card__quote {
                overflow-y: auto;
            }
            .user-section .testimonial-card__text {
                color: #4e5561;
                line-height: 1.6;
                margin-bottom: 0;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 4;
                overflow: hidden;
                word-break: break-word;
            }
            .user-section .testimonial-card__text.is-expanded {
                display: block;
                -webkit-line-clamp: unset;
                overflow: visible;
            }
            .user-section .testimonial-card__toggle {
                margin-top: 0.5rem;
                padding: 0;
                font-size: 14px;
                font-weight: 600;
                text-decoration: none;
                color: #0a67f2;
                align-self: flex-start;
            }
            .user-section .testimonial-card__toggle:hover,
            .user-section .testimonial-card__toggle:focus {
                color: #0a67f2;
                text-decoration: underline;
            }
            .user-section .testimonial-card__footer {
                flex-shrink: 0;
                margin-top: auto;
                padding-top: 1rem !important;
            }
            .user-section .testimonial-card__footer .avatar img {
                width: 48px;
                height: 35px;
                object-fit: cover;
            }
            .user-section .testimonial-card__footer p {
                margin-bottom: 0;
                font-size: 14px;
                color: #4e5561;
            }
            @media (max-width: 767.98px) {
                .user-section .testimonial-card {
                    min-height: 280px;
                }
            }
        </style>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-10 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="section-header text-center">
                        <h2 class="mb-2">What’s Our <span class="text-primary  text-decoration-underline">User</span>
                            Says</h2>
                        <p class="sub-title"><strong>Sky Eagle Trip Tour</strong>, a tour operator specializing in dream destinations, offers a
                            variety of benefits for travelers.</p>
                    </div>
                </div>
            </div>
            <div class="owl-carousel testimonial-slider">
                <!-- Testimonial Item-->
                <div class="card border-white testimonial-card wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body">
                        <div class="testimonial-card__quote">
                            <p class="testimonial-card__text">I booked my honeymoon package for Bali through <strong>Sky Eagle Trip</strong> with Nirmesh Bhai, and the experience was awesome. Our trip was from 26th January to 1st February, and throughout the tour the team supported me at every step. The cab service was very good, the hotels were comfortable, and all the locations included in the itinerary were excellent. Everything was well-managed, making our honeymoon stress-free and memorable. Highly recommended!</p>
                            <button type="button" class="testimonial-card__toggle btn btn-link d-none" aria-expanded="false">
                                <span class="testimonial-card__toggle-more">Read more</span>
                                <span class="testimonial-card__toggle-less d-none">Read less</span>
                            </button>
                        </div>
                        <div class="testimonial-card__footer border-top pt-4 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-md flex-shrink-0">
                                    <img src="{{ URL::asset('build/img/users/user-01.jpg') }}" class="rounded-circle" alt="Nikhil Sonera">
                                </span>
                                <div class="ms-2">
                                    <h6 class="fs-16 fw-medium mb-0">Nikhil Sonera</h6>
                                    <p>Bali, Indonesia</p>
                                </div>
                            </div>
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium">5.0</span>
                        </div>
                    </div>
                </div>
                <!-- /Testimonial Item-->

                <!-- Testimonial Item-->
                <div class="card border-white testimonial-card wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body">
                        <div class="testimonial-card__quote">
                            <p class="testimonial-card__text">Our recent trip to Goa was fantastic, largely thanks to the amazing work of <strong>Sky Eagle Trip</strong>. We especially appreciated the excellent hotel recommendations which made our small trip comfortable. The seamless coordination of all our activities exceeded our expectations. Thank you for creating such a memorable experience; we will be recommending your services to our friends and family.</p>
                            <button type="button" class="testimonial-card__toggle btn btn-link d-none" aria-expanded="false">
                                <span class="testimonial-card__toggle-more">Read more</span>
                                <span class="testimonial-card__toggle-less d-none">Read less</span>
                            </button>
                        </div>
                        <div class="testimonial-card__footer border-top pt-4 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-md flex-shrink-0">
                                    <img src="{{ URL::asset('build/img/users/user-02.jpg') }}" class="rounded-circle" alt="Ami Patel">
                                </span>
                                <div class="ms-2">
                                    <h6 class="fs-16 fw-medium mb-0">Ami Patel</h6>
                                    <p>Goa, India</p>
                                </div>
                            </div>
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium">5.0</span>
                        </div>
                    </div>
                </div>
                <!-- /Testimonial Item-->

                <!-- Testimonial Item-->
                <div class="card border-white testimonial-card wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body">
                        <div class="testimonial-card__quote">
                            <p class="testimonial-card__text">I recently had the pleasure of booking my Dubai - Abu Dhabi trip through <strong>Sky Eagle Trip</strong>, and I must say, it was an exceptional experience from start to finish! From the moment I inquired about the trip, their team was professional, responsive, and attentive to my preferences. The itinerary was perfectly planned, balancing sightseeing, adventure, and relaxation. Every detail, from airport transfers to hotel bookings, was seamless. Thank you, Sky Eagle Trip, for an unforgettable experience! I will definitely recommend your services to friends and family.</p>
                            <button type="button" class="testimonial-card__toggle btn btn-link d-none" aria-expanded="false">
                                <span class="testimonial-card__toggle-more">Read more</span>
                                <span class="testimonial-card__toggle-less d-none">Read less</span>
                            </button>
                        </div>
                        <div class="testimonial-card__footer border-top pt-4 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-md flex-shrink-0">
                                    <img src="{{ URL::asset('build/img/users/user-03.jpg') }}" class="rounded-circle" alt="Soju Joseph">
                                </span>
                                <div class="ms-2">
                                    <h6 class="fs-16 fw-medium mb-0">Soju Joseph</h6>
                                    <p>Dubai, Abu Dhabi</p>
                                </div>
                            </div>
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium">5.0</span>
                        </div>
                    </div>
                </div>
                <!-- /Testimonial Item-->

                <!-- Testimonial Item-->
                <div class="card border-white testimonial-card wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body">
                        <div class="testimonial-card__quote">
                            <p class="testimonial-card__text">Awesome experience! Even though this was our first tour with <strong>Sky Eagle Trip</strong>, it definitely won’t be the last. Every small detail was taken care of perfectly, and the entire trip was well-managed and enjoyable. We had an amazing time throughout the journey. Special thanks to Megha Ma’am for her proper guidance and continuous support. Highly recommended!</p>
                            <button type="button" class="testimonial-card__toggle btn btn-link d-none" aria-expanded="false">
                                <span class="testimonial-card__toggle-more">Read more</span>
                                <span class="testimonial-card__toggle-less d-none">Read less</span>
                            </button>
                        </div>
                        <div class="testimonial-card__footer border-top pt-4 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-md flex-shrink-0">
                                    <img src="{{ URL::asset('build/img/users/user-01.jpg') }}" class="rounded-circle" alt="Mayank Gajera">
                                </span>
                                <div class="ms-2">
                                    <h6 class="fs-16 fw-medium mb-0">Mayank Gajera</h6>
                                    <p>Langkawi, Malaysia</p>
                                </div>
                            </div>
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium">5.0</span>
                        </div>
                    </div>
                </div>
                <!-- /Testimonial Item-->
            </div>
        </div>
        <div class="testimonial-bg">
            <img src="{{URL::asset('build/img/bg/testimonial-bg-01.svg')}}" alt="img">
        </div>
    </section>
    <!-- /user Section -->

    <!-- ========================
        End Page Content
    ========================= -->

@endsection

@section('script')
    @vite(['resources/js/about-us/testimonials.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var run = function () {
                if (typeof window.initAboutTestimonials === 'function') {
                    window.initAboutTestimonials();
                }
            };
            run();
            setTimeout(run, 300);
            setTimeout(run, 1000);
        });
    </script>
@endsection
