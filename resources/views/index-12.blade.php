<?php $page="index-12";?>
@extends('layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Start Destinations Section -->
    <section class="section destination-section-twelve">
        <div class="container">

            <div class="banner-form card mb-0 wow fadeInDown" data-wow-delay="1.5">
                <div class="card-body">
                    <p class="fw-medium mb-2 text-dark">Check Eligibility</p>
                    <form action="{{url('flight-grid')}}">
                        <div class="normal-trip">
                            <div class="d-lg-flex">
                                <div class="d-flex  form-info">
                                    <div class="form-item booking-dropdown dropdown">
                                        <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                                            <label class="form-label fs-14 text-default mb-1">Destination</label>
                                            <input type="text" class="form-control value-input" value="Newyork">
                                        </div>
                                        <div class="dropdown-menu dropdown-md p-0">
                                            <div class="input-search p-3 border-bottom">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search Location">
                                                    <span class="input-group-text px-2 border-start-0"><i class="isax isax-search-normal"></i></span>
                                                </div>
                                            </div>
                                            <ul>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <span class="fs-16 fw-medium text-dark text-dark dropdown-name">Newyork</span>
                                                        <p>Ken International Airport</p>
                                                    </a>
                                                </li>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <span class="fs-16 fw-medium text-dark text-dark dropdown-name">Boston</span>
                                                        <p>Boston Logan International Airport</p>
                                                    </a>
                                                </li>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <span class="fs-16 fw-medium text-dark text-dark dropdown-name">Northern Virginia</span>
                                                        <p>Dulles International Airport</p>
                                                    </a>
                                                </li>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <span class="fs-16 fw-medium text-dark text-dark dropdown-name">Los Angeles</span>
                                                        <p>Los Angeles International Airport</p>
                                                    </a>
                                                </li>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <span class="fs-16 fw-medium text-dark text-dark dropdown-name">Orlando</span>
                                                        <p>Orlando International Airport</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-item booking-dropdown dropdown">
                                        <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                                            <label class="form-label fs-14 text-default mb-1">Visa Type</label>
                                             <input type="text" class="form-control value-input" value="Select">
                                        </div>
                                        <div class="dropdown-menu dropdown-md p-0">
                                            <div class="input-search p-3 border-bottom">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search Location">
                                                    <span class="input-group-text px-2 border-start-0"><i class="isax isax-search-normal"></i></span>
                                                </div>
                                            </div>
                                             <ul>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <div class="fs-16 fw-medium text-dark  dropdown-name">Tourist Visa </div>
                                                    </a>
                                                </li>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <div class="fs-16 fw-medium text-dark  dropdown-name">Business Visa</div>
                                                    </a>
                                                </li>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <div class="fs-16 fw-medium text-dark  dropdown-name">Student Visa</div>
                                                    </a>
                                                </li>
                                                <li class="border-bottom">
                                                    <a class="dropdown-item" href="#">
                                                        <div class="fs-16 fw-medium text-dark  dropdown-name">Transit Visa</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="fs-16 fw-medium text-dark  dropdown-name">GroupTravel Visa</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-item booking-dropdown dropdown">
                                    <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                        aria-expanded="false" role="menu">
                                        <label
                                            class="form-label fs-14 text-default mb-1">Citizenship</label>
                                        <input type="text" class="form-control value-input" value="Select">
                                    </div>
                                    <div class="dropdown-menu dropdown-md p-0">
                                        <div class="input-search p-3 border-bottom">
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Search">
                                                <span
                                                    class="input-group-text px-2 border-start-0"><i
                                                        class="isax isax-search-normal"></i></span>
                                            </div>
                                        </div>
                                        <ul>
                                            <li class="border-bottom">
                                                <a class="dropdown-item" href="#">
                                                    <div class="fs-16 fw-medium text-dark  dropdown-name">USA</div>
                                                </a>
                                            </li>
                                            <li class="border-bottom">
                                                <a class="dropdown-item" href="#">
                                                    <div class="fs-16 fw-medium text-dark  dropdown-name">Japan</div>
                                                </a>
                                            </li>
                                            <li class="border-bottom">
                                                <a class="dropdown-item" href="#">
                                                    <div class="fs-16 fw-medium text-dark  dropdown-name">Singapore</div>
                                                </a>
                                            </li>
                                            <li class="border-bottom">
                                                <a class="dropdown-item" href="#">
                                                    <div class="fs-16 fw-medium text-dark  dropdown-name">Russia</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="fs-16 fw-medium text-dark  dropdown-name">Germany</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-item dropdown">
                                    <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                        aria-expanded="false" role="menu">
                                        <label
                                            class="form-label fs-14 text-default mb-1">Travelers</label>
                                        <div class="home-eight-title text-dark member-count">4 <span
                                                class="fw-normal fs-14">Persons</span></div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-xl">
                                        <div class="mb-3 home-eight-title text-dark">Select
                                            Travelers & Class</div>
                                        <div class="mb-3 border br-10 info-item pb-1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div
                                                        class="mb-3 d-flex align-items-center justify-content-between">
                                                        <label
                                                            class="form-label text-gray-9 mb-2">Rooms</label>
                                                        <div class="custom-increment">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-btn float-start">
                                                                    <button type="button"
                                                                        class="quantity-left-minus btn btn-light btn-number"
                                                                        data-type="minus"
                                                                        data-field="">
                                                                        <span><i
                                                                                class="isax isax-minus"></i></span>
                                                                    </button>
                                                                </span>
                                                                <input type="text"
                                                                    name="quantity"
                                                                    class=" input-number"
                                                                    value="1" data-type="room">
                                                                <span
                                                                    class="input-group-btn float-end">
                                                                    <button type="button"
                                                                        class="quantity-right-plus btn btn-light btn-number"
                                                                        data-type="plus"
                                                                        data-field="">
                                                                        <span><i
                                                                                class="isax isax-add"></i></span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div
                                                        class="mb-3 d-flex align-items-center justify-content-between">
                                                        <label
                                                            class="form-label text-gray-9 mb-2">Adults</label>
                                                        <div class="custom-increment">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-btn float-start">
                                                                    <button type="button"
                                                                        class="quantity-left-minus btn btn-light btn-number"
                                                                        data-type="minus"
                                                                        data-field="">
                                                                        <span><i
                                                                                class="isax isax-minus"></i></span>
                                                                    </button>
                                                                </span>
                                                                <input type="text"
                                                                    name="quantity"
                                                                    class=" input-number"
                                                                    value="1" data-type="adult">
                                                                <span
                                                                    class="input-group-btn float-end">
                                                                    <button type="button"
                                                                        class="quantity-right-plus btn btn-light btn-number"
                                                                        data-type="plus"
                                                                        data-field="">
                                                                        <span><i
                                                                                class="isax isax-add"></i></span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div
                                                        class="mb-3 d-flex align-items-center justify-content-between">
                                                        <label
                                                            class="form-label text-gray-9 mb-2">Children
                                                            <span
                                                                class="text-default fw-normal">(
                                                                2-12 Yrs )</span></label>
                                                        <div class="custom-increment">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-btn float-start">
                                                                    <button type="button"
                                                                        class="quantity-left-minus btn btn-light btn-number"
                                                                        data-type="minus"
                                                                        data-field="">
                                                                        <span><i
                                                                                class="isax isax-minus"></i></span>
                                                                    </button>
                                                                </span>
                                                                <input type="text"
                                                                    name="quantity"
                                                                    class=" input-number"
                                                                    value="1" data-type="children">
                                                                <span
                                                                    class="input-group-btn float-end">
                                                                    <button type="button"
                                                                        class="quantity-right-plus btn btn-light btn-number"
                                                                        data-type="plus"
                                                                        data-field="">
                                                                        <span><i
                                                                                class="isax isax-add"></i></span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div
                                                        class="mb-3 d-flex align-items-center justify-content-between">
                                                        <label
                                                            class="form-label text-gray-9 mb-2">Infants
                                                            <span
                                                                class="text-default fw-normal">(
                                                                0-12 Yrs )</span></label>
                                                        <div class="custom-increment">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-btn float-start">
                                                                    <button type="button"
                                                                        class="quantity-left-minus btn btn-light btn-number"
                                                                        data-type="minus"
                                                                        data-field="">
                                                                        <span><i
                                                                                class="isax isax-minus"></i></span>
                                                                    </button>
                                                                </span>
                                                                <input type="text"
                                                                    name="quantity"
                                                                    class=" input-number"
                                                                    value="1" data-type="infant">
                                                                <span
                                                                    class="input-group-btn float-end">
                                                                    <button type="button"
                                                                        class="quantity-right-plus btn btn-light btn-number"
                                                                        data-type="plus"
                                                                        data-field="">
                                                                        <span><i
                                                                                class="isax isax-add"></i></span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 border br-10 info-item pb-1">
                                            <div class="fs-16 fw-medium mb-2 text-dark">
                                                Travellers</div>
                                            <div class="d-flex align-items-center flex-wrap">
                                                <div class="form-check me-3 mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="room" id="room9" checked>
                                                    <label class="form-check-label" for="room9">
                                                        Single
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="room" id="room10">
                                                    <label class="form-check-label"
                                                        for="room10">
                                                        Double
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="room" id="room11">
                                                    <label class="form-check-label"
                                                        for="room11">
                                                        Delux
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="room" id="room12">
                                                    <label class="form-check-label"
                                                        for="room12">
                                                        Suite
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 border br-10 info-item pb-1">
                                            <div class="fs-16 fw-medium mb-2 text-dark">Property
                                                Type</div>
                                            <div class="d-flex align-items-center flex-wrap">
                                                <div class="form-check me-3 mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="property" id="property9" checked>
                                                    <label class="form-check-label"
                                                        for="property9">
                                                        Villa
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="property" id="property10">
                                                    <label class="form-check-label"
                                                        for="property10">
                                                        Condo
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="property" id="property11">
                                                    <label class="form-check-label"
                                                        for="property11">
                                                        Cabin
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="property" id="property12">
                                                    <label class="form-check-label"
                                                        for="property12">
                                                        Apartments
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="#"
                                                class="btn btn-light btn-sm me-2">Cancel</a>
                                            <button type="button"
                                                class="btn btn-primary btn-sm apply-btn">Apply</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary search-btn rounded">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="section-header-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1s">
                <div class="subtitle"> <img src="{{URL::asset('build/img/icons/flight-icon-1.svg')}}" alt="flight" class="img-fluid img-1"> Destinations</div>
                <h2 class="section-title"> Explore Visa Services by <span>Country</span> </h2>
            </div>

            <!-- Start row -->
            <div class="row row-cols-lg-5 row-cols-md-2 row-cols-sm-2 row-cols-1 g-4 justify-content-center destination-twelve">
                <div class="col">
                    <!-- Item 1 -->
                    <div class="destination-item-twelve item-1 wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1s">
                        <div class="destination-overlay">
                            <img src="{{URL::asset('build/img/destination/destination-img-5.jpg')}}" alt="destination" class="img-fluid img-1">
                            <a href="#" class="link-icon"> <i class="isax isax-arrow-right-1"></i> </a>
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title">Denmark</h3>
                                <p> 20 Services </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- End col -->
                <div class="col">
                    <!-- Item 1 -->
                    <div class="destination-item-twelve item-2 wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                        <div class="destination-overlay">
                            <img src="{{URL::asset('build/img/destination/destination-img-6.jpg')}}" alt="destination" class="img-fluid img-1">
                            <a href="#" class="link-icon"> <i class="isax isax-arrow-right-1"></i> </a>
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title">Canada</h3>
                                <p> 12 Services </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- End col -->
                <div class="col">
                    <!-- Item 1 -->
                    <div class="destination-item-twelve item-3 wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2s">
                        <div class="destination-overlay">
                            <img src="{{URL::asset('build/img/destination/destination-img-7.jpg')}}" alt="destination" class="img-fluid img-1">
                            <a href="#" class="link-icon"> <i class="isax isax-arrow-right-1"></i> </a>
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title">Spain</h3>
                                <p> 17 Services </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- End col -->
                <div class="col">
                    <!-- Item 1 -->
                    <div class="destination-item-twelve item-4 wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2.5s">
                        <div class="destination-overlay">
                            <img src="{{URL::asset('build/img/destination/destination-img-8.jpg')}}" alt="destination" class="img-fluid img-1">
                            <a href="#" class="link-icon"> <i class="isax isax-arrow-right-1"></i> </a>
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title">Denmark</h3>
                                <p> 25 Services </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- End col -->
                <div class="col">
                    <!-- Item 1 -->
                    <div class="destination-item-twelve item-5 wow fadeInDown" data-wow-delay="0.3" data-wow-duration="3s">
                        <div class="destination-overlay">
                            <img src="{{URL::asset('build/img/destination/destination-img-9.jpg')}}" alt="destination" class="img-fluid img-1">
                            <a href="#" class="link-icon"> <i class="isax isax-arrow-right-1"></i> </a>
                        </div>
                        <div class="destination-content">
                            <div class="title">
                                <h3 class="custom-title">UAE</h3>
                                <p> 31 Services </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- End col -->
            </div>
            <!-- End row -->

            <!-- Start row -->
            <div class="row row-gap-4 pack-section">
                <div class="col-lg-4 col-md-4 d-flex">
                    <div class="pack-item-twelve flex-fill wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1s">
                        <div>
                            <h3 class="custom-title">VIP Packages</h3>
                            <p>Include premium seating, meet  experiences, backstage tours.</p>
                        </div>
                        <div class="pack-icon bg-secondary">
                            <i class="isax isax-lock-1"></i>
                        </div>
                    </div>
                </div>  <!-- End col -->
                <div class="col-lg-4 col-md-4 d-flex">
                    <div class="pack-item-twelve flex-fill wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                        <div>
                            <h3 class="custom-title">Travel Packages</h3>
                            <p>Bundles that include concert tickets, accommodations</p>
                        </div>
                        <div class="pack-icon bg-purple">
                            <i class="isax isax-receipt-add"></i>
                        </div>
                    </div>
                </div>  <!-- End col -->
                <div class="col-lg-4 col-md-4 d-flex">
                    <div class="pack-item-twelve flex-fill wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2s">
                        <div>
                            <h3 class="custom-title">Best Price Guarantee</h3>
                            <p>Such as private rehearsals, soundcheck access,</p>
                        </div>
                        <div class="pack-icon bg-teal">
                            <i class="isax isax-location-tick"></i>
                        </div>
                    </div>
                </div>  <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <img src="{{URL::asset('build/img/bg/destination-bg-1.png')}}" alt="destination" class="img-fluid element-1 d-none d-lg-block">
    </section>
    <!-- End Destinations Section -->

    <!-- Start why Choose Section -->
    <section class="section whychoose-section-twelve">
        <div class="container">

            <!-- Start row -->
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="why-choose-img wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                        <div class="choose-imgs-1">
                            <img src="{{URL::asset('build/img/provider/choose-img-1.jpg')}}" alt="choose" class="img-fluid img-1">
                            <img src="{{URL::asset('build/img/provider/choose-img-2.jpg')}}" alt="choose" class="img-fluid img-1">
                        </div>
                        <div class="choose-imgs-2">
                            <img src="{{URL::asset('build/img/provider/choose-img-3.jpg')}}" alt="choose" class="img-fluid img-1">
                            <img src="{{URL::asset('build/img/provider/choose-img-4.jpg')}}" alt="choose" class="img-fluid img-1">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="why-choose-details">
                        <div class="section-header-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1s">
                            <div class="subtitle"> <img src="{{URL::asset('build/img/icons/flight-icon-1.svg')}}" alt="flight" class="img-fluid img-1"> 100% Trusted Agency</div>
                            <h2 class="section-title"> Why Choose Our  <span>Visa Agency?</span> </h2>
                            <p class="para">We believe in creating immersive experiences that connect you with local culture, nature, and unforgettable moments. Every activity is carefully selected to ensure authenticity, safety, and the magic that makes travel truly special.From adrenaline-pumping adventures to peaceful cultural discoveries, we've got something for every type of traveler. Let us help you create memories that last a lifetime.</p>
                        </div>
                        <div class="choose-content">
                            <!-- Item 1  -->
                            <div class="choose-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                                <div class="choose-icon bg-secondary">
                                    <i class="isax isax-like-1"></i>
                                </div>
                                <h3>High Visa Approval Rate & it’s 99%.</h3>
                            </div>
                            <!-- Item 2  -->
                            <div class="choose-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                                <div class="choose-icon bg-danger">
                                    <i class="isax isax-timer"></i>
                                </div>
                                <h3>Fast & Reliable Visa Processing.</h3>
                            </div>
                            <!-- Item 3  -->
                            <div class="choose-item-twelve mb-0 wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                                <div class="choose-icon bg-cyan">
                                    <i class="isax isax-security-safe4"></i>
                                </div>
                                <h3>100% Secure & Confidential.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->

        </div>
        <img src="{{URL::asset('build/img/provider/why-choose-img.png')}}" alt="why" class="img-fluid shadow-1">
    </section>
    <!-- End why Choose Section -->

    <!-- Start Activities Section -->
    <section class="section activities-section-twelve">
        <div class="container">
            <div class="section-header-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                <div class="subtitle"> <img src="{{URL::asset('build/img/icons/flight-icon-1.svg')}}" alt="flight" class="img-fluid img-1"> Visa By Activities</div>
                <h2 class="section-title"> Visas for Every  <span>Journey</span> </h2>
            </div>
        </div>

        <div class="container-fluid">
            <div class="activities-slider-twelve">
                <!-- Item 1 -->
                <div class="slide-item wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1s">
                    <div class="activities-item-twelve">
                        <div class="activities-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/activities/activity-1.jpg')}}" alt="activity" class="img-fluid img-1"></a>
                            <div class="activities-badge">
                                <button class="fav-icon">
                                    <i class="isax isax-heart5"></i>
                                </button>
                                <span class="badge d-inline-flex align-items-center">Business Visa</span>
                            </div>
                        </div>
                        <div class="activities-content">
                            <p class="time"> <i class="isax isax-clock"></i>2-4 Weeks </p>
                            <h3 class="custom-title">
                                <a href="#">Electronic Visa for Tourism and Recreation</a>
                            </h3>
                            <div class="mode">
                                <p>Mode : Consular Visa</p>
                                <i class="fa-solid fa-circle"></i>
                                <p>Validity : 90 Days</p>
                            </div>
                            <div class="activities-footer">
                                <p>From <span class="price">$300</span> /Person</p>
                                <p> <i class="isax isax-location5"></i> USA</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="slide-item wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                    <div class="activities-item-twelve">
                        <div class="activities-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/activities/activity-2.jpg')}}" alt="activity" class="img-fluid img-1"></a>
                            <div class="activities-badge">
                                <button class="fav-icon">
                                    <i class="isax isax-heart5"></i>
                                </button>
                                <span class="badge d-inline-flex align-items-center">Student Visa</span>
                            </div>
                        </div>
                        <div class="activities-content">
                            <p class="time"> <i class="isax isax-clock"></i>2-4 Weeks </p>
                            <h3 class="custom-title">
                                <a href="#">Long term for Academic with Health Insurance</a>
                            </h3>
                            <div class="mode">
                                <p>Mode : Consular Visa</p>
                                <i class="fa-solid fa-circle"></i>
                                <p>Validity : 1 Year</p>
                            </div>
                            <div class="activities-footer">
                                <p>From <span class="price">$300</span> /Person</p>
                                <p> <i class="isax isax-location5"></i> Egypt</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="slide-item wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2s">
                    <div class="activities-item-twelve">
                        <div class="activities-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/activities/activity-3.jpg')}}" alt="activity" class="img-fluid img-1"></a>
                            <div class="activities-badge">
                                <button class="fav-icon">
                                    <i class="isax isax-heart5"></i>
                                </button>
                                <span class="badge d-inline-flex align-items-center">Work Visa</span>
                            </div>
                        </div>
                        <div class="activities-content">
                            <p class="time"> <i class="isax isax-clock"></i>15-20 Working Days</p>
                            <h3 class="custom-title">
                                <a href="#">Work Visa for Employment Opportunities</a>
                            </h3>
                            <div class="mode">
                                <p>Mode : Paper</p>
                                <i class="fa-solid fa-circle"></i>
                                <p>Validity : 2 Years</p>
                            </div>
                            <div class="activities-footer">
                                <p>From <span class="price">$800</span> /Person</p>
                                <p> <i class="isax isax-location5"></i> Spain</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="slide-item wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2.5s">
                    <div class="activities-item-twelve">
                        <div class="activities-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/activities/activity-4.jpg')}}" alt="activity" class="img-fluid img-1"></a>
                            <div class="activities-badge">
                                <button class="fav-icon">
                                    <i class="isax isax-heart5"></i>
                                </button>
                                <span class="badge d-inline-flex align-items-center">Transit Visa</span>
                            </div>
                        </div>
                        <div class="activities-content">
                            <p class="time"> <i class="isax isax-clock"></i>3-5 Working Days </p>
                            <h3 class="custom-title">
                                <a href="#">Short term Visa for Travelers with Layovers</a>
                            </h3>
                            <div class="mode">
                                <p>Mode : Electronic</p>
                                <i class="fa-solid fa-circle"></i>
                                <p>Validity : 72 Hours</p>
                            </div>
                            <div class="activities-footer">
                                <p>From <span class="price">$100</span> /Person</p>
                                <p> <i class="isax isax-location5"></i> Qatar</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="slide-item wow fadeInDown" data-wow-delay="0.3" data-wow-duration="3s">
                    <div class="activities-item-twelve">
                        <div class="activities-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/activities/activity-5.jpg')}}" alt="activity" class="img-fluid img-1"></a>
                            <div class="activities-badge">
                                <button class="fav-icon">
                                    <i class="isax isax-heart5"></i>
                                </button>
                                <span class="badge d-inline-flex align-items-center">Family Reunion Visa</span>
                            </div>
                        </div>
                        <div class="activities-content">
                            <p class="time"> <i class="isax isax-clock"></i>8-12 Working Days </p>
                            <h3 class="custom-title">
                                <a href="#">Family Members to Join Our Relatives</a>
                            </h3>
                            <div class="mode">
                                <p>Mode : Paper</p>
                                <i class="fa-solid fa-circle"></i>
                                <p>Validity : 1 Year</p>
                            </div>
                            <div class="activities-footer">
                                <p>From <span class="price">$600</span> /Person</p>
                                <p> <i class="isax isax-location5"></i> Spain</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="slide-item">
                    <div class="activities-item-twelve">
                        <div class="activities-overlay">
                            <a href="#"><img src="{{URL::asset('build/img/activities/activity-6.jpg')}}" alt="activity" class="img-fluid img-1"></a>
                            <div class="activities-badge">
                                <button class="fav-icon">
                                    <i class="isax isax-heart5"></i>
                                </button>
                                <span class="badge d-inline-flex align-items-center">Tourist Visa</span>
                            </div>
                        </div>
                        <div class="activities-content">
                            <p class="time"> <i class="isax isax-clock"></i>10-15 Working Days </p>
                            <h3 class="custom-title">
                                <a href="#">Cultural Programs and Exchanges</a>
                            </h3>
                            <div class="mode">
                                <p>Mode : Electronic</p>
                                <i class="fa-solid fa-circle"></i>
                                <p>Validity : 1 Year</p>
                            </div>
                            <div class="activities-footer">
                                <p>From <span class="price">$400</span> /Person</p>
                                <p> <i class="isax isax-location5"></i> USA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="arrow-item wow fadeInDown" data-wow-delay="1.5">
                <button type="button" class="slick-arrow activities-twelve-prev"><i class="isax isax-arrow-left-2"></i></button>
                <button type="button" class="slick-arrow activities-twelve-next"><i class="isax isax-arrow-right-3"></i></button>
            </div>
        </div>
    </section>
    <!-- End Activities Section -->

    <!-- Start Statistics Section -->
    <section class="section stat-section-twelve">
        <div class="container">
            <div class="section-header-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                <div class="subtitle"> <img src="{{URL::asset('build/img/icons/flight-icon-1.svg')}}" alt="flight" class="img-fluid img-1"> Working Process </div>
                <h2 class="section-title text-white"> Checkout How our System Works</h2>
            </div>

            <div class="row row-gap-4">
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center position-relative">
                    <div class="counter-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1s">
                        <div class="card-body">
                            <h3 class="count"><span class="counter">50</span></h3>
                            <p>Apply Online</p>
                        </div>
                    </div>
                    <img src="{{URL::asset('build/img/icons/flight-icon-2.svg')}}" alt="flight" class="icon-1 d-none d-md-block">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center position-relative">
                    <div class="counter-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                        <div class="card-body">
                            <h3 class="count"><span class="counter">48</span></h3>
                            <p>Get an Appointment</p>
                        </div>
                    </div>
                    <img src="{{URL::asset('build/img/icons/flight-icon-2.svg')}}" alt="flight" class="icon-1 d-none d-lg-block">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center position-relative">
                    <div class="counter-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2s">
                        <div class="card-body">
                            <h3 class="count"><span class="counter">45</span></h3>
                            <p>Submit Documents</p>
                        </div>
                    </div>
                    <img src="{{URL::asset('build/img/icons/flight-icon-2.svg')}}" alt="flight" class="icon-1 d-none d-md-block">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center position-relative">
                    <div class="counter-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2.5s">
                        <div class="card-body">
                            <h3 class="count"><span class="counter">45</span></h3>
                            <p>Receive Visa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{URL::asset('build/img/bg/stat-twelve-bg.png')}}" alt="bg" class="element-1">
    </section>
    <!-- End Statistics Section -->

    <!-- Start Visa Section -->
    <section class="section visa-section-twelve">
        <div class="container">
            <div class="section-header-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                <div class="subtitle"> <img src="{{URL::asset('build/img/icons/flight-icon-1.svg')}}" alt="flight" class="img-fluid img-1">Visa Types</div>
                <h2 class="section-title"> Complete <span>visa assistance</span> for every type of traveler</h2>
            </div>

            <!-- start row -->
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="visa-img d-none d-lg-block wow zoomIn" data-wow-delay="0.3" data-wow-duration="1.5s">
                        <img src="{{URL::asset('build/img/visa/visa-img-1.jpg')}}" alt="visa" class="img-fluid img-1">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="accordion accordion-flush faq-accordion-five" id="accordionFaq">
                        <div class="accordion-item show mb-3 wow fadeInDown" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseOne" aria-expanded="false" aria-controls="faq-collapseOne">
                                    <span>01</span> Tourist Visa
                                </button>
                            </h2>
                            <div id="faq-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <div class="accordion-inner">
                                        A tourist visa is an official document issued by a country that allows you to enter and stay there for leisure, sightseeing, visiting friends/relatives, and other non-work purposes.
                                        <div class="accordion-img">
                                            <img src="{{URL::asset('build/img/visa/visa-img-01.jpg')}}" alt="visa" class="img-fluid img-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 wow fadeInDown" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapsetwo" aria-expanded="false" aria-controls="faq-collapsetwo">
                                    <span>02</span> Business Visa
                            </button>
                            </h2>
                            <div id="faq-collapsetwo" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <div class="accordion-inner">
                                        Apply for a student visa with complete guidance from application to approval. We help you choose the right country, university, and ensure all documents meet embassy requirements.
                                        <div class="accordion-img">
                                            <img src="{{URL::asset('build/img/visa/visa-img-02.jpg')}}" alt="visa" class="img-fluid img-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3  wow fadeInDown" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapsthree" aria-expanded="false" aria-controls="faq-collapsthree">
                                    <span>03</span>  Student Visa
                                </button>
                            </h2>
                            <div id="faq-collapsthree" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <div class="accordion-inner">
                                        A Student Visa allows international students to enter and stay in a foreign country for educational purposes, such as university degrees, diploma courses, language programs, or professional training.
                                        <div class="accordion-img">
                                            <img src="{{URL::asset('build/img/visa/visa-img-03.jpg')}}" alt="visa" class="img-fluid img-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 wow fadeInDown" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapsefour" aria-expanded="false" aria-controls="faq-collapsefour">
                                    <span>04</span>  Transit Visa
                                </button>
                            </h2>
                            <div id="faq-collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <div class="accordion-inner">
                                        A Transit Visa allows travelers to pass through a country while traveling to another destination, usually for a short period, without entering the country for tourism or work.
                                        <div class="accordion-img">
                                            <img src="{{URL::asset('build/img/visa/visa-img-04.jpg')}}" alt="visa" class="img-fluid img-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInDown" data-wow-delay="1.0s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInDown;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapsefive" aria-expanded="false" aria-controls="faq-collapsefive">
                                    <span>05</span>  Group Travel Visa
                                </button>
                            </h2>
                            <div id="faq-collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <div class="accordion-inner">
                                        A Group Travel Visa allows multiple travelers to apply and travel together under a single visa application, commonly used for tour groups, families, corporate trips, students, or pilgrimages.
                                        <div class="accordion-img">
                                            <img src="{{URL::asset('build/img/visa/visa-img-05.jpg')}}" alt="visa" class="img-fluid img-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </section>
    <!-- End Statistics Section -->

    <!-- Start Trip Section -->
    <section class="section trip-section-twelve p-0">
        <div class="container">
            <div class="trip-twelve">
                <div class="section-header-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                    <h2 class="section-title"> Plan Your Trip Without Worries </h2>
                    <p>Visa support and unforgettable experiences — all in one place.</p>
                    <a href="{{url('agent-visa-booking')}}" class="btn btn-white"> Start Visa Application <i class="isax isax-arrow-right-3"></i></a>
                </div>
            </div>
        </div>
        <img src="{{URL::asset('build/img/flight/flight-img-1.png')}}" alt="flight" class="img-fluid flight-1 wow zoomIn" data-wow-delay="0.3" data-wow-duration="2.5s">
    </section>
    <!-- End Trip Section -->

    <!-- Start Testimonial Section -->
    <section class="section tesitimonial-section-twelve">
        <div class="container">
            <div class="section-header-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                <div class="subtitle"> <img src="{{URL::asset('build/img/icons/flight-icon-1.svg')}}" alt="flight" class="img-fluid img-1">Traveler Testimonials</div>
                <h2 class="section-title"> Hear from travelers who <span> trusted us </span> with their journey</h2>
            </div>

            <!-- Start row  -->
            <div class="row row-gap-4">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="tesitimonial-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1s">
                        <p class="review">“The visa process was smooth and stress-free. The team guided me clearly at every step and kept me updated until approval. I booked my Dubai activities right after getting my visa.”</p>
                        <div class="tesitimonial-review">
                            <div class="tesitimonial-author">
                                <div class="author">
                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="user" class="img-fluid img-1">
                                </div>
                                <div>
                                    <div class="author-name"><a href="#">Robinson</a></div>
                                    <p class="visa">Business Visa</p>
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
                    </div>
                </div>   <!-- end col  -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="tesitimonial-item-twelve">
                        <p class="review">“I was worried about documentation, but they handled everything professionally. My Schengen visa got approved on time, and planning my Europe trip became so much easier.”</p>
                        <div class="tesitimonial-review">
                            <div class="tesitimonial-author">
                                <div class="author">
                                    <img src="{{URL::asset('build/img/users/user-06.jpg')}}" alt="user" class="img-fluid img-1">
                                </div>
                                <div>
                                    <div class="author-name"><a href="#">Immaculate</a></div>
                                    <p class="visa">Business Visa</p>
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
                    </div>
                </div>   <!-- end col  -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="tesitimonial-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                        <p class="review">“Excellent support throughout my UK student visa process line through. They explained every requirement clearly and responded quickly whenever I had questions.”Thank You.</p>
                        <div class="tesitimonial-review">
                            <div class="tesitimonial-author">
                                <div class="author">
                                    <img src="{{URL::asset('build/img/users/user-20.jpg')}}" alt="user" class="img-fluid img-1">
                                </div>
                                <div>
                                    <div class="author-name"><a href="#">Lossy diea</a></div>
                                    <p class="visa">Work Visa</p>
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
                    </div>
                </div>   <!-- end col  -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="tesitimonial-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2s">
                        <p class="review">This was my first international trip, and I was nervous about the visa process. The team handled everything smoothly and gave me confidence throughout. I would definitely recommend them.</p>
                        <div class="tesitimonial-review">
                            <div class="tesitimonial-author">
                                <div class="author">
                                    <img src="{{URL::asset('build/img/users/user-03.jpg')}}" alt="user" class="img-fluid img-1">
                                </div>
                                <div>
                                    <div class="author-name"><a href="#">Rishvin</a></div>
                                    <p class="visa">Tourist Visa</p>
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
                    </div>
                </div>   <!-- end col  -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="tesitimonial-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2.5s">
                        <p class="review"> The document checklist and follow-ups were very well managed. I didn’t have to worry about missing anything. A very professional experience overall.Thank you for your guidelines. </p>
                        <div class="tesitimonial-review">
                            <div class="tesitimonial-author">
                                <div class="author">
                                    <img src="{{URL::asset('build/img/users/user-04.jpg')}}" alt="user" class="img-fluid img-1">
                                </div>
                                <div>
                                    <div class="author-name"><a href="#">Adam John</a></div>
                                    <p class="visa">Business Visa</p>
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
                    </div>
                </div>   <!-- end col  -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="tesitimonial-item-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="3s">
                        <p class="review">I liked that I could get visa assistance and plan my travel activities in the same platform. It saved a lot of time and made the trip planning very easy. Thank you for your support.</p>
                        <div class="tesitimonial-review">
                            <div class="tesitimonial-author">
                                <div class="author">
                                    <img src="{{URL::asset('build/img/users/user-05.jpg')}}" alt="user" class="img-fluid img-1">
                                </div>
                                <div>
                                    <div class="author-name"><a href="#">Tom Cruise</a></div>
                                    <p class="visa">Visiting Visa</p>
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
                    </div>
                </div>   <!-- end col  -->
            </div>
            <!-- end row  -->

        </div>
        <img src="{{URL::asset('build/img/bg/testimonial-bg.png')}}" alt="testimonial" class="img-fluid bg-img">
    </section>
    <!-- End Testimonial Section -->

    <!-- Start Blogs Section -->
    <section class="section blog-section-twelve">
        <div class="container">
            <div class="section-header-twelve wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                <div class="subtitle"> <img src="{{URL::asset('build/img/icons/flight-icon-1.svg')}}" alt="flight" class="img-fluid img-1">Latest Articles & Blogs</div>
                <h2 class="section-title"> Stay <span>Updated</span> on the Stories</h2>
            </div>

            <!-- start row -->
            <div class="row justify-content-center row-gap-4">
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="blog-item-twelve flex-fill wow fadeInDown" data-wow-delay="0.3" data-wow-duration="1.5s">
                        <div class="blog-overlay">
                            <span class="badge">Adventure Travel</span>
                            <img src="{{URL::asset('build/img/blog/blog-img-5.jpg')}}" alt="blog" class="img-fluid blog-img">
                        </div>
                        <div class="blog-content">
                            <h3 class="custom-title"><a href="{{url('blog-grid')}}"> Visas for Thrill Seekers</a></h3>
                            <p>Explore how adventure travelers secure visas for extreme sports, expeditions, and cultural immersion, ensuring safe and legal experiences.</p>
                        </div>
                        <div class="blog-footer">
                            <div class="blog-author">
                                <img src="{{URL::asset('build/img/users/blog-user-1.jpg')}}" alt="blog" class="img-fluid img-1">
                                <a href="#" class="link">John Smith</a>
                            </div>
                            <p class="blog-time"> <i class="isax isax-calendar-1"></i> 25 Jun 2026</p>
                        </div>
                    </div>
                </div>  <!-- end col -->
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="blog-item-twelve flex-fill wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2s">
                        <div class="blog-overlay">
                            <span class="badge">Remote Work Policies</span>
                            <img src="{{URL::asset('build/img/blog/blog-img-6.jpg')}}" alt="blog" class="img-fluid blog-img">
                        </div>
                        <div class="blog-content">
                            <h3 class="custom-title"><a href="{{url('blog-grid')}}"> Visa for Remote Workers</a></h3>
                            <p>Discover the best visa options for remote workers, balancing work flexibility with legal travel requirements for extended stays abroad.</p>
                        </div>
                        <div class="blog-footer">
                            <div class="blog-author">
                                <img src="{{URL::asset('build/img/users/blog-user-2.jpg')}}" alt="blog" class="img-fluid img-1">
                                <a href="#" class="link">Kim David</a>
                            </div>
                            <p class="blog-time"> <i class="isax isax-calendar-1"></i> 30 Apr 2026 </p>
                        </div>
                    </div>
                </div>  <!-- end col -->
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="blog-item-twelve flex-fill wow fadeInDown" data-wow-delay="0.3" data-wow-duration="2.5s">
                        <div class="blog-overlay">
                            <span class="badge">Travel Insights</span>
                            <img src="{{URL::asset('build/img/blog/blog-img-7.jpg')}}" alt="blog" class="img-fluid blog-img">
                        </div>
                        <div class="blog-content">
                            <h3 class="custom-title"><a href="{{url('blog-grid')}}"> Visas for Digital Nomads</a></h3>
                            <p>Learn how digital nomads utilize explore the globe, access remote work opportunities, and ensure compliance with immigration laws.</p>
                        </div>
                        <div class="blog-footer">
                            <div class="blog-author">
                                <img src="{{URL::asset('build/img/users/blog-user-3.jpg')}}" alt="blog" class="img-fluid img-1">
                                <a href="#" class="link">David Kim</a>
                            </div>
                            <p class="blog-time"> <i class="isax isax-calendar-1"></i> 28 Jul 2026 </p>
                        </div>
                    </div>
                </div>  <!-- end col -->
            </div>
            <!-- end row -->

        </div>
    </section>
    <!-- End Blogs Section -->

    <!-- ========================
        End Page Content
    ========================= -->

@endsection



