<?php $page="index-4";?>
@extends('layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Hero Section -->
    <section class="hero-section hero-sec-two">
        <div class="banner-sliders">
            <div class="slider-wrap home-vertical-slider">
                <div class="slider-fors nav-center" id="large-img">
                    <div class="service-img">
                        <img src="{{URL::asset('build/img/hotels/hotel-slider-01.jpg')}}" class="img-fluid" alt="Slider Img">
                    </div>
                    <div class="service-img">
                        <img src="{{URL::asset('build/img/hotels/hotel-slider-02.jpg')}}" class="img-fluid" alt="Slider Img">
                    </div>
                    <div class="service-img">
                        <img src="{{URL::asset('build/img/hotels/hotel-slider-03.jpg')}}" class="img-fluid" alt="Slider Img">
                    </div>
                    <div class="service-img">
                        <img src="{{URL::asset('build/img/hotels/hotel-slider-04.jpg')}}" class="img-fluid" alt="Slider Img">
                    </div>
                </div>
                <div class="">
                    <div class="slider-nav nav-center" id="small-img">
                        <div><img src="{{URL::asset('build/img/hotels/hotel-slider-thumb-01.jpg')}}" class="img-fluid" alt="Slider Img">
                        </div>
                        <div><img src="{{URL::asset('build/img/hotels/hotel-slider-thumb-02.jpg')}}" class="img-fluid" alt="Slider Img">
                        </div>
                        <div><img src="{{URL::asset('build/img/hotels/hotel-slider-thumb-03.jpg')}}" class="img-fluid" alt="Slider Img">
                        </div>
                        <div><img src="{{URL::asset('build/img/hotels/hotel-slider-thumb-04.jpg')}}" class="img-fluid" alt="Slider Img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="hero-content py-0 text-start">
                <div class="row align-items-center">
                    <div class="col-md-12 mx-auto wow fadeInUp" data-wow-delay="0.3s">
                        <div class="banner-content text-start">
                            <h1 class="text-white display-5 mb-2">Experience the Magic: Exclusive Offers from DreamsTour
                            </h1>
                            <p class="text-white">Your ultimate destination for all things help you celebrate & remember
                                tour experience.</p>
                            <a href="{{url('hotel-grid')}}" class="btn btn-primary">Explore All Hotels</a>
                        </div>
                        <div class="banner-form card mb-0">
                            <div class="card-body">
                                <div class="tab-pane fade active show" id="Hotels">
                                            <form action="{{url('hotel-grid')}}">
                                                <div class="fw-medium fs-16 mb-2 text-dark">Book Hotel -
                                                    Villas, Apartments & more.</div>
                                                <div class="d-lg-flex">
                                                    <div class="d-flex  form-info">
                                                        <div class="form-item booking-dropdown dropdown">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label class="form-label fs-14 text-default mb-1">City,
                                                                    Property name or Location</label>
                                                                <input type="text" class="form-control value-input" value="Newyork">
                                                                <p class="fs-12 mb-0 subname-result">USA</p>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-custom dropdown-md p-0">
                                                                <div class="input-search p-3 border-bottom">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Search for City, Property name or Location">
                                                                        <span
                                                                            class="input-group-text px-2 border-start-0"><i
                                                                                class="isax isax-search-normal"></i></span>
                                                                    </div>
                                                                </div>
                                                                <ul>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">USA
                                                                            </div>
                                                                            <p class="dropdown-sub-name">2000 Properties</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Japan
                                                                            </div>
                                                                            <p class="dropdown-sub-name">3000 Properties</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Singapore</div>
                                                                            <p class="dropdown-sub-name">8000 Properties</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Russia</div>
                                                                            <p class="dropdown-sub-name">8000 Properties</p>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Germany</div>
                                                                            <p class="dropdown-sub-name">2000 Properties</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-item">
                                                            <label class="form-label fs-14 text-default mb-1">Check
                                                                In</label>
                                                            <input type="text" class="form-control check-in"
                                                                value="21-10-2026">
                                                            <p class="fs-12 mb-0">Monday</p>
                                                        </div>
                                                        <div class="form-item">
                                                            <label class="form-label fs-14 text-default mb-1">Check
                                                                Out</label>
                                                            <input type="text" class="form-control check-out"
                                                                value="21-10-2026">
                                                            <p class="fs-12 mb-0">Monday</p>
                                                        </div>
                                                        <div class="form-item dropdown">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Guests</label>
                                                                <div class="home-eight-title text-dark member-count">4 <span
                                                                        class="fw-normal fs-14">Persons</span></div>
                                                                <p class="fs-12 mb-0"><span class="adult">4</span> Adult, <span class="room">2</span> Rooms</p>
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
                                                                                                <span><i class="isax isax-add"></i></span>
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
                                                                                name="room" id="room01" checked>
                                                                            <label class="form-check-label"
                                                                                for="room01">
                                                                                Single
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="room" id="room02">
                                                                            <label class="form-check-label"
                                                                                for="room02">
                                                                                Double
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="room" id="room03">
                                                                            <label class="form-check-label"
                                                                                for="room03">
                                                                                Delux
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="room" id="room04">
                                                                            <label class="form-check-label"
                                                                                for="room04">
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
                                                                                name="property" id="property01" checked>
                                                                            <label class="form-check-label"
                                                                                for="property01">
                                                                                Villa
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="property" id="property02">
                                                                            <label class="form-check-label"
                                                                                for="property02">
                                                                                Condo
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="property" id="property03">
                                                                            <label class="form-check-label"
                                                                                for="property03">
                                                                                Cabin
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="property" id="property04">
                                                                            <label class="form-check-label"
                                                                                for="property04">
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
                                                        <div class="form-item booking-dropdown dropdown">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label class="form-label fs-14 text-default mb-1">Price
                                                                    per Night</label>
                                                                <input type="text" class="form-control value-input"
                                                                    value="$1000 - $15000">
                                                                <p class="fs-12 mb-0">20 Offers Available</p>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-md p-0">
                                                                <ul>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">$500 - $2000</div>
                                                                            <p>Upto 65% offers</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Upto 65% offers</div>
                                                                            <p>Upto 40% offers</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">$5000 - $8000</div>
                                                                            <p>Upto 35% offers</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">$9000 - $11000</div>
                                                                            <p>Upto 20% offers</p>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">$11000 - $15000</div>
                                                                            <p>Upto 10% offers</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary search-btn rounded">Search</button>
                                                </div>
                                            </form>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- Traveling Section -->
    <section class="section traveling-sec">
        <div class="travel-sec-bg">
            <img src="{{URL::asset('build/img/bg/hotel-bg-01.svg')}}" class="bg-1" alt="Img">
            <img src="{{URL::asset('build/img/bg/hotel-bg-02.svg')}}" class="bg-2" alt="Img">
            <img src="{{URL::asset('build/img/bg/hotel-bg-03.svg')}}" class="bg-3" alt="Img">
        </div>
        <div class="container">
            <div class="section-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div>
                    <p class="mb-2 fw-medium d-flex align-items-center"><span class="text-bar"></span>Featured
                        Categories</p>
                    <h2>Travelers & Preferences<span class="text-primary">.</span></h2>
                </div>
                <div>
                    <a href="{{url('hotel-grid')}}" class="btn btn-primary">View All<i
                            class="isax isax-arrow-right-3 ms-2"></i></a>
                </div>
            </div>
            <div class="travelers-slider owl-carousel">
                <div class="card travelers-card">
                    <div class="card-img">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/hotels/hotel-25.jpg')}}" class="rounded-top"
                                alt="Img"></a>
                        <span class="overlay-icon"><i class="isax isax-building-3"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1"><a href="{{url('hotel-grid')}}">Deluxe Room</a></h5>
                            <p>288 Hotels Available</p>
                        </div>
                        <div>
                            <a href="{{url('hotel-grid')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card travelers-card">
                    <div class="card-img">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/hotels/hotel-26.jpg')}}" class="rounded-top"
                                alt="Img"></a>
                        <span class="overlay-icon"><i class="isax isax-buildings-2"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1"><a href="{{url('hotel-grid')}}">Standard Room</a></h5>
                            <p>228 Hotels Available</p>
                        </div>
                        <div>
                            <a href="{{url('hotel-grid')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card travelers-card">
                    <div class="card-img">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/hotels/hotel-27.jpg')}}" class="rounded-top"
                                alt="Img"></a>
                        <span class="overlay-icon"><i class="isax isax-building"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1"><a href="{{url('hotel-grid')}}">Suite Room</a></h5>
                            <p>248 Hotels Available</p>
                        </div>
                        <div>
                            <a href="{{url('hotel-grid')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card travelers-card">
                    <div class="card-img">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/hotels/hotel-28.jpg')}}" class="rounded-top"
                                alt="Img"></a>
                        <span class="overlay-icon"><i class="isax isax-building-4"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1"><a href="{{url('hotel-grid')}}">Executive Room</a></h5>
                            <p>250 Hotels Available</p>
                        </div>
                        <div>
                            <a href="{{url('hotel-grid')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card travelers-card">
                    <div class="card-img">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/hotels/hotel-29.jpg')}}" class="rounded-top"
                                alt="Img"></a>
                        <span class="overlay-icon"><i class="isax isax-buildings4"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1"><a href="{{url('hotel-grid')}}">Family Rooms</a></h5>
                            <p>270 Hotels Available</p>
                        </div>
                        <div>
                            <a href="{{url('hotel-grid')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card travelers-card">
                    <div class="card-img">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/hotels/hotel-25.jpg')}}" class="rounded-top"
                                alt="Img"></a>
                        <span class="overlay-icon"><i class="isax isax-building-3"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1"><a href="{{url('hotel-grid')}}">Deluxe Room</a></h5>
                            <p>288 Hotels Available</p>
                        </div>
                        <div>
                            <a href="{{url('hotel-grid')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Traveling Section -->

    <!-- Support Section -->
    <section class="support-section support-sec-two bg-secondary">
        <div class="horizontal-slide d-flex" data-direction="left" data-speed="slow">
            <div class="slide-list d-flex">
                <div class="support-item">
                    <h5>Personalized Itineraries</h5>
                </div>
                <div class="support-item">
                    <h5>Comprehensive Planning</h5>
                </div>
                <div class="support-item">
                    <h5>Expert Guidance</h5>
                </div>
                <div class="support-item">
                    <h5>Local Experience</h5>
                </div>
                <div class="support-item">
                    <h5>Customer Support</h5>
                </div>
                <div class="support-item">
                    <h5>Sustainability Efforts</h5>
                </div>
                <div class="support-item">
                    <h5>Multiple Regions</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- /Support Section -->

    <!-- Benefit Section -->
    <section class="section benifit-section bg-light-200">
        <div class="container">
            <div class="section-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div>
                    <p class="mb-2 fw-medium d-flex align-items-center"><span class="text-bar"></span>Trending Hotel</p>
                    <h2>Focusing on Unique Experiences<span class="text-primary">.</span></h2>
                </div>
                <div>
                    <a href="{{url('hotel-grid')}}" class="btn btn-primary">View All Hotels<i
                            class="isax isax-arrow-right-3 ms-2"></i></a>
                </div>
            </div>
            <div class="place-slider owl-carousel">
                <div class="place-item mb-4 flex-fill">
                    <div class="place-img">
                        <div class="img-slider image-slide owl-carousel nav-center">
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-01.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-02.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-03.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="fav-item">
                            <span class="badge bg-info d-inline-flex align-items-center"><i
                                    class="isax isax-ranking me-1"></i>Trending</span>
                            <a href="#" class="fav-icon selected">
                                <i class="isax isax-heart5"></i>
                            </a>
                        </div>
                    </div>
                    <div class="place-content">
                        <div class="d-flex align-items-center mb-1">
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">5.0</span>
                            <p class="fs-14">(400 Reviews)</p>
                        </div>
                        <h5 class="mb-1 text-truncate"><a href="{{url('hotel-details')}}">Hotel Plaza Athenee</a></h5>
                        <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Ciutat Vella,
                            Barcelona</p>
                        <div class="border-top pt-2 mb-2">
                            <h6 class="d-flex align-items-center">Facillities :<i
                                    class="isax isax-home-wifi ms-2 me-2 text-primary"></i><i
                                    class="isax isax-scissor me-2 text-primary"></i><i
                                    class="isax isax-profile-2user me-2 text-primary"></i><i
                                    class="isax isax-wind-2 me-2 text-primary"></i><a href="#"
                                    class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-top pt-3">
                            <h5 class="text-primary text-nowrap me-2">$500 <span class="fs-14 fw-normal text-default">/
                                    Night</span></h5>
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Beth Williams</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="place-item mb-4 flex-fill">
                    <div class="place-img">
                        <div class="img-slider image-slide owl-carousel nav-center">
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-07.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-08.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-09.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="fav-item">
                            <span class="badge bg-info d-inline-flex align-items-center"><i
                                    class="isax isax-ranking me-1"></i>Trending</span>
                            <a href="#" class="fav-icon">
                                <i class="isax isax-heart5"></i>
                            </a>
                        </div>
                    </div>
                    <div class="place-content">
                        <div class="d-flex align-items-center mb-1">
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.9</span>
                            <p class="fs-14">(450 Reviews)</p>
                        </div>
                        <h5 class="mb-1 text-truncate"><a href="{{url('hotel-details')}}">The Grand Horizon</a></h5>
                        <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Deansgate,
                            Manchester</p>
                        <div class="border-top pt-2 mb-2">
                            <h6 class="d-flex align-items-center">Facillities :<i
                                    class="isax isax-home-wifi ms-2 me-2 text-primary"></i><i
                                    class="isax isax-scissor me-2 text-primary"></i><i
                                    class="isax isax-profile-2user me-2 text-primary"></i><i
                                    class="isax isax-wind-2 me-2 text-primary"></i><a href="#"
                                    class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-top pt-3">
                            <h5 class="text-primary text-nowrap me-2">$400 <span class="fs-14 fw-normal text-default">/
                                    Night</span></h5>
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-11.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Kenneth Palmer</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="place-item mb-4 flex-fill">
                    <div class="place-img">
                        <div class="img-slider image-slide owl-carousel nav-center">
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-05.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-06.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-07.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="fav-item">
                            <span class="badge bg-info d-inline-flex align-items-center"><i
                                    class="isax isax-ranking me-1"></i>Trending</span>
                            <a href="#" class="fav-icon">
                                <i class="isax isax-heart5"></i>
                            </a>
                        </div>
                    </div>
                    <div class="place-content">
                        <div class="d-flex align-items-center mb-1">
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.7</span>
                            <p class="fs-14">(360 Reviews)</p>
                        </div>
                        <h5 class="mb-1 text-truncate"><a href="{{url('hotel-details')}}">The Luxe Haven</a></h5>
                        <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Oxford Street,
                            London</p>
                        <div class="border-top pt-2 mb-2">
                            <h6 class="d-flex align-items-center">Facillities :<i
                                    class="isax isax-home-wifi ms-2 me-2 text-primary"></i><i
                                    class="isax isax-scissor me-2 text-primary"></i><i
                                    class="isax isax-profile-2user me-2 text-primary"></i><i
                                    class="isax isax-wind-2 me-2 text-primary"></i><a href="#"
                                    class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-top pt-3">
                            <h5 class="text-primary text-nowrap me-2">$600 <span class="fs-14 fw-normal text-default">/
                                    Night</span></h5>
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-09.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Tom Andrews</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="place-item mb-4 flex-fill">
                    <div class="place-img">
                        <div class="img-slider image-slide owl-carousel nav-center">
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-06.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-11.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-12.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="fav-item">
                            <span class="badge bg-info d-inline-flex align-items-center"><i
                                    class="isax isax-ranking me-1"></i>Trending</span>
                            <a href="#" class="fav-icon">
                                <i class="isax isax-heart5"></i>
                            </a>
                        </div>
                    </div>
                    <div class="place-content">
                        <div class="d-flex align-items-center mb-1">
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.5</span>
                            <p class="fs-14">(500 Reviews)</p>
                        </div>
                        <h5 class="mb-1 text-truncate"><a href="{{url('hotel-details')}}">The Urban Retreat</a></h5>
                        <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Princes
                            Street, Edinburgh</p>
                        <div class="border-top pt-2 mb-2">
                            <h6 class="d-flex align-items-center">Facillities :<i
                                    class="isax isax-home-wifi ms-2 me-2 text-primary"></i><i
                                    class="isax isax-scissor me-2 text-primary"></i><i
                                    class="isax isax-profile-2user me-2 text-primary"></i><i
                                    class="isax isax-wind-2 me-2 text-primary"></i><a href="#"
                                    class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-top pt-3">
                            <h5 class="text-primary text-nowrap me-2">$300 <span class="fs-14 fw-normal text-default">/
                                    Night</span></h5>
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-10.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Robert Cogswell</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="place-item mb-4 flex-fill">
                    <div class="place-img">
                        <div class="img-slider image-slide owl-carousel nav-center">
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-03.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-04.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                            <div class="slide-images">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-05.jpg')}}" class="img-fluid" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="fav-item">
                            <span class="badge bg-info d-inline-flex align-items-center"><i
                                    class="isax isax-ranking me-1"></i>Trending</span>
                            <a href="#" class="fav-icon">
                                <i class="isax isax-heart5"></i>
                            </a>
                        </div>
                    </div>
                    <div class="place-content">
                        <div class="d-flex align-items-center mb-1">
                            <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.5</span>
                            <p class="fs-14">(500 Reviews)</p>
                        </div>
                        <h5 class="mb-1 text-truncate"><a href="{{url('hotel-details')}}">The Urban Retreat</a></h5>
                        <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Princes
                            Street, Edinburgh</p>
                        <div class="border-top pt-2 mb-2">
                            <h6 class="d-flex align-items-center">Facillities :<i
                                    class="isax isax-home-wifi ms-2 me-2 text-primary"></i><i
                                    class="isax isax-scissor me-2 text-primary"></i><i
                                    class="isax isax-profile-2user me-2 text-primary"></i><i
                                    class="isax isax-wind-2 me-2 text-primary"></i><a href="#"
                                    class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-top pt-3">
                            <h5 class="text-primary text-nowrap me-2">$300 <span class="fs-14 fw-normal text-default">/
                                    Night</span></h5>
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-10.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Robert Cogswell</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more-companies-logo">
                <div class="owl-carousel client-slider-two">
                    <div class="client-img">
                        <img src="{{URL::asset('build/img/clients/client-01.svg')}}" alt="img">
                    </div>
                    <div class="client-img">
                        <img src="{{URL::asset('build/img/clients/client-02.svg')}}" alt="img">
                    </div>
                    <div class="client-img">
                        <img src="{{URL::asset('build/img/clients/client-03.svg')}}" alt="img">
                    </div>
                    <div class="client-img">
                        <img src="{{URL::asset('build/img/clients/client-04.svg')}}" alt="img">
                    </div>
                    <div class="client-img">
                        <img src="{{URL::asset('build/img/clients/client-05.svg')}}" alt="img">
                    </div>
                    <div class="client-img">
                        <img src="{{URL::asset('build/img/clients/client-06.svg')}}" alt="img">
                    </div>
                    <div class="client-img">
                        <img src="{{URL::asset('build/img/clients/client-07.svg')}}" alt="img">
                    </div>
                    <div class="client-img">
                        <img src="{{URL::asset('build/img/clients/client-04.svg')}}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Benefit Section -->

    <!-- Offer Section -->
    <section class="section offers-section">
        <div class="offer-sec-bg">
            <img src="{{URL::asset('build/img/bg/hotel-bg-02.svg')}}" class="bg-1" alt="Img">
            <img src="{{URL::asset('build/img/bg/hotel-bg-04.svg')}}" class="bg-2" alt="Img">
        </div>
        <div class="container">
            <div class="offer-sec">
                <div class="offer-slider owl-carousel">
                    <div class="offer-slider-img">
                        <img src="{{URL::asset('build/img/hotels/slider-01.jpg')}}" alt="Img">
                    </div>
                    <div class="offer-slider-img">
                        <img src="{{URL::asset('build/img/hotels/slider-01.jpg')}}" alt="Img">
                    </div>
                    <div class="offer-slider-img">
                        <img src="{{URL::asset('build/img/hotels/slider-01.jpg')}}" alt="Img">
                    </div>
                </div>
                <div class="offers-content">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-10">
                            <div>
                                <h2 class="text-white mb-2">Seasonal Promotions</h2>
                                <p class="text-white mb-3">Save 20% on stays of three nights or more during summer
                                    months, including breakfast for two.</p>
                                <a href="{{url('hotel-list')}}" class="btn btn-white text-dark">Explore All Offers<i
                                        class="isax isax-arrow-right-3 ms-2"></i></a>
                                <div class="owl-nav slide-nav mt-4"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-2">
                            <div class="text-center slider-video-btn">
                                <a class="video-btn video-effect" data-fancybox=""
                                    href="https://youtu.be/NSAOrGb9orM"><i class="isax isax-play5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offers-counter bg-white rounded p-2">
                <div class="bg-primary rounded offer-counter-inner">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div>
                                <h6 class="text-white mb-1">Destinations Worldwide</h6>
                                <h3 class="display-6 text-white"><span class="counter">50</span>+</h3>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h6 class="text-white mb-1">Destinations Worldwide</h6>
                                <h3 class="display-6 text-white"><span class="counter">7000</span>+</h3>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h6 class="text-white mb-1">Destinations Worldwide</h6>
                                <h3 class="display-6 text-white"><span class="counter">89</span>+</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popular-hotels">
                <div class="section-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div>
                        <p class="mb-2 fw-medium d-flex align-items-center text-white"><span
                                class="text-bar bg-white"></span>Popular Hotels</p>
                        <h2 class="text-white">Try Relaxing Accomodations<span class="text-primary">.</span></h2>
                    </div>
                    <div>
                        <a href="{{url('hotel-grid')}}" class="btn btn-primary">View All Hotels<i
                                class="isax isax-arrow-right-3 ms-2"></i></a>
                    </div>
                </div>
                <div class="popular-hotel-slider owl-carousel">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                <a href="{{url('hotel-details')}}" class="flex-shrink-0 me-3"><img
                                        src="{{URL::asset('build/img/icons/hotel-logo-01.svg')}}" class="rounded-circle" alt="Img"></a>
                                <div>
                                    <h5 class="mb-2"><a href="{{url('hotel-details')}}">Adventure Suites</a></h5>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.9</span>
                                        <p>(450 Reviews)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center seperate-dot">
                                    <span>Boutique</span>
                                    <span>Germany</span>
                                </div>
                                <span class="badge bg-outline-success">15 Rooms Left</span>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                <a href="{{url('hotel-details')}}" class="flex-shrink-0 me-3"><img
                                        src="{{URL::asset('build/img/icons/hotel-logo-02.svg')}}" class="rounded-circle" alt="Img"></a>
                                <div>
                                    <h5 class="mb-2"><a href="{{url('hotel-details')}}">Mystery Manor</a></h5>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">5.0</span>
                                        <p>(120 Reviews)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center seperate-dot">
                                    <span>Resorts</span>
                                    <span>Ukraine</span>
                                </div>
                                <span class="badge bg-outline-success">20 Rooms Left</span>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                <a href="{{url('hotel-details')}}" class="flex-shrink-0 me-3"><img
                                        src="{{URL::asset('build/img/icons/hotel-logo-03.svg')}}" class="rounded-circle" alt="Img"></a>
                                <div>
                                    <h5 class="mb-2"><a href="{{url('hotel-details')}}">Harmony Retreat</a></h5>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.9</span>
                                        <p>(128 Reviews)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center seperate-dot">
                                    <span>Resorts</span>
                                    <span>London</span>
                                </div>
                                <span class="badge bg-outline-success">05 Rooms Left</span>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                <a href="{{url('hotel-details')}}" class="flex-shrink-0 me-3"><img
                                        src="{{URL::asset('build/img/icons/hotel-logo-04.svg')}}" class="rounded-circle" alt="Img"></a>
                                <div>
                                    <h5 class="mb-2"><a href="{{url('hotel-details')}}">Tranquil Spa</a></h5>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">5.0</span>
                                        <p>(69 Reviews)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center seperate-dot">
                                    <span>Hotel</span>
                                    <span>Japan</span>
                                </div>
                                <span class="badge bg-outline-success">20 Rooms Left</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Offer Section -->

    <!-- Travelers Section -->
    <section class="section">
        <div class="container">
            <div class="section-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div>
                    <p class="mb-2 fw-medium d-flex align-items-center"><span class="text-bar"></span>Popular
                        Destinations</p>
                    <h2>Travelers & Preferences<span class="text-primary">.</span></h2>
                </div>
                <div>
                    <a href="{{url('hotel-grid')}}" class="btn btn-primary">View All<i
                            class="isax isax-arrow-right-3 ms-2"></i></a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="location-wrap location-wrap-two">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/destination/destination-30.jpg')}}" alt="Img"></a>
                        <div class="loc-name-top">
                            <h5 class="text-white mb-1">Ukraine</h5>
                            <span class="text-white">300 Hotels</span>
                        </div>
                        <a href="{{url('hotel-grid')}}" class="loc-view-bottom"><i class="isax isax-arrow-right-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="location-wrap location-wrap-two">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/destination/destination-31.jpg')}}" alt="Img"></a>
                        <div class="loc-name-top">
                            <h5 class="text-white mb-1">Russia</h5>
                            <span class="text-white">458 Hotels</span>
                        </div>
                        <a href="{{url('hotel-grid')}}" class="loc-view-bottom"><i class="isax isax-arrow-right-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="location-wrap location-wrap-two">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/destination/destination-32.jpg')}}" alt="Img"></a>
                        <div class="loc-name-top">
                            <h5 class="text-white mb-1">Thailand</h5>
                            <span class="text-white">175 Hotels</span>
                        </div>
                        <a href="{{url('hotel-grid')}}" class="loc-view-bottom"><i class="isax isax-arrow-right-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="location-wrap location-wrap-two">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/destination/destination-33.jpg')}}" alt="Img"></a>
                        <div class="loc-name-top">
                            <h5 class="text-white mb-1">Azerbaijan</h5>
                            <span class="text-white">155 Hotels</span>
                        </div>
                        <a href="{{url('hotel-grid')}}" class="loc-view-bottom"><i class="isax isax-arrow-right-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="location-wrap location-wrap-two">
                        <a href="{{url('hotel-grid')}}"><img src="{{URL::asset('build/img/destination/destination-34.jpg')}}" alt="Img"></a>
                        <div class="loc-name-top">
                            <h5 class="text-white mb-1">Germany</h5>
                            <span class="text-white">265 Hotels</span>
                        </div>
                        <a href="{{url('hotel-grid')}}" class="loc-view-bottom"><i class="isax isax-arrow-right-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Travelers Section -->

    <!-- Experts Section -->
    <section class="section adavantages-sec bg-light-200">
        <div class="adavantages-sec-bg">
            <img src="{{URL::asset('build/img/bg/hotel-bg-01.svg')}}" class="bg-1" alt="Img">
            <img src="{{URL::asset('build/img/bg/hotel-bg-05.svg')}}" class="bg-2" alt="Img">
            <img src="{{URL::asset('build/img/bg/hotel-bg-06.svg')}}" class="bg-3" alt="Img">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div>
                        <h2 class="mb-2">Where comfort meets elegance and every guest is treated like family.</h2>
                        <p>Our mission is to create memorable experiences for our guests. We believe that every stay
                            should feel special, whether you’re here for business, leisure, or a special occasion.
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span
                                                class="avatar rounded-icon-md rounded-circle bg-primary flex-shrink-0"><i
                                                    class="isax isax-map5 fs-24"></i></span>
                                            <div class="ms-3">
                                                <h6 class="fs-16 mb-2">Exceptional Service</h6>
                                                <p class="text-truncate line-clamb-3">Our dedicated team prioritizes
                                                    your comfort and satisfaction,</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar rounded-icon-md rounded-circle bg-indigo flex-shrink-0">
                                                <i class="isax isax-location-tick5 fs-24"></i>
                                            </span>
                                            <div class="ms-3">
                                                <h6 class="fs-16 mb-2">Prime Locations</h6>
                                                <p class="text-truncate line-clamb-3">Enjoy easy access to local
                                                    attractions, dining, entertainment.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar rounded-icon-md rounded-circle bg-cyan flex-shrink-0">
                                                <i class="isax isax-ticket-star5 fs-24"></i>
                                            </span>
                                            <div class="ms-3">
                                                <h6 class="fs-16 mb-2">Quality Accommodations</h6>
                                                <p class="text-truncate line-clamb-3">Our rooms and facilities are
                                                    designed with your needs in mind, blending </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar rounded-icon-md rounded-circle bg-teal flex-shrink-0">
                                                <i class="isax isax-ticket-star5 fs-24"></i>
                                            </span>
                                            <div class="ms-3">
                                                <h6 class="fs-16 mb-2">Personalized Experience</h6>
                                                <p class="text-truncate line-clamb-3">We tailor our services to meet
                                                    your preferences, making your stay uniquely. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{url('add-hotel')}}" class="btn btn-dark me-3"><i
                                    class="isax isax-add-circle5 me-2"></i>Add Your Hotel</a>
                            <a href="{{url('hotel-grid')}}" class="btn btn-primary"><i
                                    class="isax isax-calendar5 me-2"></i>Book a Hotel</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <div class="section-right-img">
                            <img src="{{URL::asset('build/img/section-img.png')}}" alt="Img">
                            <div class="card review-rate-top border-0 mb-0">
                                <div class="card-body d-flex align-items-center">
                                    <div class="avatar-list-stacked avatar-group-md me-2">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/users/user-01.jpg')}}"
                                                alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/users/user-04.jpg')}}"
                                                alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/users/user-06.jpg')}}"
                                                alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/users/user-07.jpg')}}"
                                                alt="img">
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center fs-12">
                                            <i class="ti ti-star-filled text-warning"></i>
                                            <i class="ti ti-star-filled text-warning"></i>
                                            <i class="ti ti-star-filled text-warning"></i>
                                            <i class="ti ti-star-filled text-warning"></i>
                                            <i class="ti ti-star-filled text-warning me-1"></i>
                                            <p class="fs-14 text-gray-9">5.0</p>
                                        </div>
                                        <p class="fs-14">2K+ Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Experts Section -->

    <!-- How It Work Section -->
    <section class="section work-section">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="section-header">
                        <div>
                            <p class="mb-2 fw-medium d-flex align-items-center text-white"><span
                                    class="text-bar bg-white"></span>How it Works</p>
                            <h2 class="text-white">Here’s a simple breakdown of how our services work</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-lg-8">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="work-avatar">
                                            01<small class="text-primary">.</small>
                                        </span>
                                        <span class="work-icon d-flex"><i class="isax isax-buildings-25"></i></span>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 text-truncate">Search hotels</h5>
                                        <p class="text-truncate line-clamb-3">Choose your dates, select your room type,
                                            and book directly through our website or by contacting us.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="work-avatar">
                                            02<small class="text-primary">.</small>
                                        </span>
                                        <span class="work-icon d-flex"><i class="isax isax-calendar-edit5"></i></span>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 text-truncate">Booking & Confirmation</h5>
                                        <p class="text-truncate line-clamb-3">Upon arrival, check in at our reception.
                                            Our friendly staff will guide you through</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="work-avatar">
                                            03<small class="text-primary">.</small>
                                        </span>
                                        <span class="work-icon d-flex"><i class="isax isax-direct-send5"></i></span>
                                    </div>
                                    <div>
                                        <h5 class="mb-2">Enjoy Your Stay</h5>
                                        <p class="text-truncate line-clamb-3">Explore our amenities, dining options, and
                                            local attractions & Many More</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /How It Work Section -->

    <!-- Testimonial Section -->
    <section class="section testimonial-section testi-sec-two bg-white">
        <div class="testi-sec-bg">
            <img src="{{URL::asset('build/img/bg/hotel-bg-03.svg')}}" class="bg-1" alt="Img">
        </div>
        <div class="container">
            <div class="section-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div>
                    <p class="mb-2 fw-medium d-flex align-items-center"><span class="text-bar"></span>What’s Our User
                        Says</p>
                    <h2>Committed to Helping Our Clients Succeed<span class="text-primary">.</span></h2>
                </div>
                <div>
                    <a href="{{url('testimonial')}}" class="btn btn-primary">View All<i
                            class="isax isax-arrow-right-3 ms-2"></i></a>
                </div>
            </div>
            <div class="owl-carousel testimonial-slider">

                <!-- Testimonial Item-->
                <div class="card border-white wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center fs-12 mb-3">
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled  text-primary me-1"></i>
                            <p class="fs-14 text-gray-9">5.0</p>
                        </div>
                        <h6 class="mb-1">Easy to Find your Leisuere Place</h6>
                        <p class="mb-3">Dream Tours is the only way to go. We had the time of our life on our trip to
                            the Ark. The customer service was wonderful, and the staff was very helpful.</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#" class="avatar avatar-md  flex-shrink-0">
                                <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="img">
                            </a>
                            <div class="d-flex align-items-center ms-2">
                                <h6 class="fs-16 fw-medium"><a href="#">Andrew</a></h6>
                                <p class="fs-14 testimonial-divide-dot">Newyork, United States</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Testimonial Item-->

                <!-- Testimonial Item-->
                <div class="card border-white wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center fs-12 mb-3">
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled  text-primary me-1"></i>
                            <p class="fs-14 text-gray-9">5.0</p>
                        </div>
                        <h6 class="mb-1">Easy to Find your Leisuere Place</h6>
                        <p class="mb-3">I went on the Gone with the Wind tour, and it was my first multi-day bus tour.
                            The experience was terrific, thanks to the friendly tour guides. I’ve told many people about
                            it</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#" class="avatar avatar-md  flex-shrink-0">
                                <img src="{{URL::asset('build/img/users/user-02.jpg')}}" class="rounded-circle" alt="img">
                            </a>
                            <div class="d-flex align-items-center ms-2">
                                <h6 class="fs-16 fw-medium"><a href="#">Bryan</a></h6>
                                <p class="fs-14 testimonial-divide-dot">South Africa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Testimonial Item-->

                <!-- Testimonial Item-->
                <div class="card border-white wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center fs-12 mb-3">
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled  text-primary me-1"></i>
                            <p class="fs-14 text-gray-9">5.0</p>
                        </div>
                        <h6 class="mb-1">Easy to Find your Leisuere Place</h6>
                        <p class="mb-3">Thanks for arranging a smooth travel experience for us. Our cab driver was
                            polite, timely, and helpful. The team ensured that everything was taken care of, making it a
                            stress-free trip</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#" class="avatar avatar-md  flex-shrink-0">
                                <img src="{{URL::asset('build/img/users/user-03.jpg')}}" class="rounded-circle" alt="img">
                            </a>
                            <div class="d-flex align-items-center ms-2">
                                <h6 class="fs-16 fw-medium"><a href="#">Prajakta</a></h6>
                                <p class="fs-14 testimonial-divide-dot">France</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Testimonial Item-->

                <!-- Testimonial Item-->
                <div class="card border-white wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center fs-12 mb-3">
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled text-primary"></i>
                            <i class="ti ti-star-filled  text-primary me-1"></i>
                            <p class="fs-14 text-gray-9">5.0</p>
                        </div>
                        <h6 class="mb-1">Easy to Find your Leisuere Place</h6>
                        <p class="mb-3">Dream Tours is the only way to go. We had the time of our life on our trip to
                            the Ark. The customer service was wonderful, and the staff was very helpful.</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#" class="avatar avatar-md  flex-shrink-0">
                                <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="img">
                            </a>
                            <div class="d-flex align-items-center ms-2">
                                <h6 class="fs-16 fw-medium"><a href="#">Andrew</a></h6>
                                <p class="fs-14 testimonial-divide-dot">Newyork, United States</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Testimonial Item-->

            </div>
        </div>
    </section>
    <!-- /Testimonial Section -->

    <!-- Faq Section -->
    <section class="section faq-sec-two pt-0">
        <div class="faq-sec-bg">
            <img src="{{URL::asset('build/img/bg/hotel-bg-05.svg')}}" class="bg-1" alt="Img">
        </div>
        <div class="container">
            <div class="faq-secpath-two">
                <div class="">
                    <img src="{{URL::asset('build/img/bg/bg-03.png')}}" class="bg-3" alt="img">
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="faq-five  wow zoomIn">
                            <img src="{{URL::asset('build/img/faq/faq-02.png')}}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header">
                            <div>
                                <p class="mb-2 fw-medium d-flex align-items-center"><span
                                        class="text-bar"></span>Frequently Asked Questions</p>
                                <h2>Specializing in dream destinations<span class="text-primary">.</span></h2>
                            </div>
                        </div>
                        <div class="accordion accordion-flush faq-accordion-five" id="accordionFaq">
                            <div class="accordion-item show mb-3 wow fadeInUp" data-wow-delay="0.2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-collapseOne" aria-expanded="false"
                                        aria-controls="faq-collapseOne">
                                        What types of tours do you offer?
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
                                        Are the tours customizable?
                                    </button>
                                </h2>
                                <div id="faq-collapsetwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        <p>We offer a wide range of tours, including cultural, adventure, luxury, and
                                            customized itineraries.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3  wow fadeInUp" data-wow-delay="0.6s"
                                style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-collapsthree" aria-expanded="false"
                                        aria-controls="faq-collapsthree">
                                        What safety measures do you follow?
                                    </button>
                                </h2>
                                <div id="faq-collapsthree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        <p>We offer a wide range of tours, including cultural, adventure, luxury, and
                                            customized itineraries.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3 wow fadeInUp" data-wow-delay="0.8s"
                                style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-collapsefour" aria-expanded="false"
                                        aria-controls="faq-collapsefour">
                                        How far in advance should I book?
                                    </button>
                                </h2>
                                <div id="faq-collapsefour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        <p>We offer a wide range of tours, including cultural, adventure, luxury, and
                                            customized itineraries.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay="1.0s"
                                style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-collapsefive" aria-expanded="false"
                                        aria-controls="faq-collapsefive">
                                        What is your cancellation policy?
                                    </button>
                                </h2>
                                <div id="faq-collapsefive" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        <p>We offer a wide range of tours, including cultural, adventure, luxury, and
                                            customized itineraries.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Faq Section -->

    <!-- Blog Section -->
    <section class="section blog-sec-two pt-0">
        <div class="container">
            <div class="section-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div>
                    <p class="mb-2 fw-medium d-flex align-items-center"><span class="text-bar"></span>Latest Articles
                    </p>
                    <h2>Stay Updated on the Stories<span class="text-primary">.</span></h2>
                </div>
                <div>
                    <a href="{{url('blog-grid')}}" class="btn btn-primary">View All<i
                            class="isax isax-arrow-right-3 ms-2"></i></a>
                </div>
            </div>
            <div class="blog-slider owl-carousel">

                <!-- Blog Item-->
                <div class="card blog-grid wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-img rounded-top">
                        <a href="{{url('blog-details')}}" class="blog-img">
                            <img src="{{URL::asset('build/img/blog/blog-15.jpg')}}" class="rounded-top" alt="img">
                        </a>
                        <div class="blog-date">
                            <h6>15<span class="d-block">Jul</span></h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-3"><a href="{{url('blog-details')}}" class="two-line-ellipsis">It empowers designers to
                                swiftly created informative landing pages</a></h5>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Beth Williams</p>
                            </a>
                            <a href="{{url('blog-details')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Blog Item-->

                <!-- Blog Item-->
                <div class="card blog-grid wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-img rounded-top">
                        <a href="{{url('blog-details')}}" class="blog-img">
                            <img src="{{URL::asset('build/img/blog/blog-16.jpg')}}" class="rounded-top" alt="img">
                        </a>
                        <div class="blog-date">
                            <h6>14<span class="d-block">Jul</span></h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-3"><a href="{{url('blog-details')}}" class="two-line-ellipsis">Want to be notified about
                                new post and news from our Portal ?</a></h5>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-02.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Merkel James</p>
                            </a>
                            <a href="{{url('blog-details')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Blog Item-->

                <!-- Blog Item-->
                <div class="card blog-grid wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-img rounded-top">
                        <a href="{{url('blog-details')}}" class="blog-img">
                            <img src="{{URL::asset('build/img/blog/blog-17.jpg')}}" class="rounded-top" alt="img">
                        </a>
                        <div class="blog-date">
                            <h6>18<span class="d-block">Jul</span></h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-3"><a href="{{url('blog-details')}}" class="two-line-ellipsis">It empowers designers to
                                swiftly created informative landing pages</a></h5>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-03.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Tom Andrews</p>
                            </a>
                            <a href="{{url('blog-details')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Blog Item-->

                <!-- Blog Item-->
                <div class="card blog-grid wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-img rounded-top">
                        <a href="{{url('blog-details')}}" class="blog-img">
                            <img src="{{URL::asset('build/img/blog/blog-16.jpg')}}" class="rounded-top" alt="img">
                        </a>
                        <div class="blog-date">
                            <h6>18<span class="d-block">Jul</span></h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-3"><a href="{{url('blog-details')}}" class="two-line-ellipsis">It empowers designers to
                                swiftly created informative landing pages</a></h5>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#" class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-md flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/img/users/user-03.jpg')}}" class="rounded-circle" alt="img">
                                </span>
                                <p class="fs-14 text-truncate">Tom Andrews</p>
                            </a>
                            <a href="{{url('blog-details')}}" class="rounded-arrow-next"><i
                                    class="isax isax-arrow-right-3"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Blog Item-->

            </div>
        </div>
    </section>
    <!-- /Blog Section -->

    <section class="news-letter-sec">
        <div class="news-sec-bg">
            <img src="{{URL::asset('build/img/bg/hotel-bg-04.svg')}}" class="bg-1" alt="Img">
        </div>
        <div class="container">
            <div class="update-sec news-letter">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="section-header">
                            <h2 class="mb-1 text-white">Subscribe to our Newsletter</h2>
                            <p class="sub-title text-white">Just sign up and we'll send you a notification by email.</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group justify-content-center">
                            <span class="input-group-text px-1"><i class="isax isax-message-favorite5"></i></span>
                            <input type="email" class="form-control" placeholder="Enter Email Address">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection



