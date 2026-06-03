<?php $page="index-3";?>
@extends('layout.mainlayout')
@section('title', 'Home')
@section('content')
    
    <!-- ========================
        Start Page Content
    ========================= -->
   

    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="banner-slider banner-sec owl-carousel">
            @if($homeMedia && $homeMedia->images->count())
                @foreach($homeMedia->images as $image)
                    <div class="slider-img">
                        <img src="{{ $image->image_url }}" alt="Img">
                    </div>
                @endforeach
            @endif
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="row align-items-center">
                    <div class="col-md-12 mx-auto wow fadeInUp" data-wow-delay="0.3s">
                        
                        <div class="banner-form card mb-0 mt-5">
                            <div class="card-header">
                                <ul class="nav">
                                    <li>
                                        <a href="#" class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#flight">
                                            <i class="isax isax-airplane5 me-2"></i>Flights
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Hotels">
                                            <i class="isax isax-buildings5 me-2"></i>Hotels
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Cars">
                                            <i class="isax isax-car5 me-2"></i>Cars
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Cruise">
                                            <i class="isax isax-ship5 me-2"></i>Cruise
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Tour">
                                            <i class="isax isax-camera5 me-2"></i>Tour
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Bus">
                                            <i class="isax isax-bus5 me-2"></i>Bus
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="flight">
                                            
                                            <form action="#" method="get">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="Radio" id="oneway" value="oneway" checked>
                                                            <label class="form-check-label fs-14 ms-2" for="oneway">
                                                                Oneway
                                                            </label>
                                                        </div>
                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="Radio" id="roundtrip" value="roundtrip">
                                                            <label class="form-check-label fs-14 ms-2" for="roundtrip">
                                                                Round Trip
                                                            </label>
                                                        </div>
                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="Radio" id="multiway" value="multiway">
                                                            <label class="form-check-label fs-14 ms-2" for="multiway">
                                                                Multi Trip
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span class="fw-medium fs-16 mb-2 text-dark">Millions of cheap
                                                        flights. One simple search</span>
                                                </div>
                                                <div class="normal-trip">
                                                    <div class="d-lg-flex">
                                                        <div class="d-flex  form-info">
                                                            <div class="form-item change-drop booking-dropdown dropdown">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">From</label>
                                                                    <input type="text" class="form-control value-input"
                                                                        value="Newyork">
                                                                    <p class="fs-12 mb-0">Ken International Airport</p>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-md p-0">
                                                                    <div class="input-search p-3 border-bottom">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Location">
                                                                            <span
                                                                                class="input-group-text px-2 border-start-0"><i
                                                                                    class="isax isax-search-normal"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">Newyork</span>
                                                                                <p>Ken International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">Boston</span>
                                                                                <p>Boston Logan International Airport
                                                                                </p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">NorthernVirginia</span>
                                                                                <p>Dulles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">LosAngeles</span>
                                                                                <p>Los Angeles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">Orlando</span>
                                                                                <p>Orlando International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-item change-drop booking-dropdown dropdown ps-2 ps-sm-3">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">To</label>
                                                                    <input type="text" class="form-control value-input"
                                                                        value="Las Vegas">
                                                                    <p class="fs-12 mb-0">Martini International Airport
                                                                    </p>
                                                                    <span
                                                                        class="way-icon badge badge-primary rounded-pill translate-middle">
                                                                        <i
                                                                            class="fa-solid fa-arrow-right-arrow-left"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-md p-0">
                                                                    <div class="input-search p-3 border-bottom">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Location">
                                                                            <span
                                                                                class="input-group-text px-2 border-start-0"><i
                                                                                    class="isax isax-search-normal"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">Newyork</span>
                                                                                <p>Ken International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">Boston</span>
                                                                                <p>Boston Logan International Airport
                                                                                </p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">NorthernVirginia</span>
                                                                                <p>Dulles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">LosAngeles</span>
                                                                                <p>Los Angeles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                <span
                                                                                    class="fs-16 fw-medium text-dark dropdown-name">Orlando</span>
                                                                                <p>Orlando International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-item">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Departure</label>
                                                                <input type="text" class="form-control datetimepicker"
                                                                    value="21-10-2024">
                                                                <p class="fs-12 mb-0">Monday</p>
                                                            </div>
                                                            <div class="form-item round-drip">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Return</label>
                                                                <input type="text" class="form-control datetimepicker"
                                                                    value="23-10-2024">
                                                                <p class="fs-12 mb-0">Wednesday</p>
                                                            </div>
                                                            <div class="form-item dropdown">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">Travellers
                                                                        and cabin class</label>
                                                                    <div class="home-eight-title text-dark member-count">4 <span
                                                                            class="fw-normal fs-14">Persons</span></div>
                                                                    <p class="fs-12 mb-0"><span class="adult">1</span> Adult, <span class="class-name">Economy</span></p>
                                                                </div>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-end dropdown-xl">
                                                                    <div class="mb-3 home-eight-title text-dark">Select
                                                                        Travelers & Class</div>
                                                                    <div class="mb-3 border br-10 info-item pb-1">
                                                                        <div class="fs-16 fw-medium mb-2 text-dark">
                                                                            Travellers</div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label text-gray-9 mb-2">Adults
                                                                                        <span
                                                                                            class="text-default fw-normal">(
                                                                                            12+ Yrs )</span></label>
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
                                                                                                    data-field="" >
                                                                                                    <span><i
                                                                                                            class="isax isax-add"></i></span>
                                                                                                </button>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label text-gray-9 mb-2">Childrens
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
                                                                            <div class="col-md-4">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label text-gray-9 mb-2">Infants<span
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
                                                                        <span
                                                                            class="fs-16 fw-medium mb-2 text-dark">Travellers</span>
                                                                        <div
                                                                            class="d-flex align-items-center flex-wrap">
                                                                            <div class="form-check me-3 mb-3">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="Economy"
                                                                                    name="cabin-class" id="economy"
                                                                                    checked>
                                                                                <label class="form-check-label"
                                                                                    for="economy">
                                                                                    Economy
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check me-3 mb-3">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="Economy"
                                                                                    name="cabin-class"
                                                                                    id="premium-economy">
                                                                                <label class="form-check-label"
                                                                                    for="premium-economy">
                                                                                    Premium Economy
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check me-3 mb-3">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="Business"
                                                                                    name="cabin-class" id="business2">
                                                                                <label class="form-check-label"
                                                                                    for="business2">
                                                                                    Business
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check mb-3">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="First Class"
                                                                                    name="cabin-class" id="first-class">
                                                                                <label class="form-check-label"
                                                                                    for="first-class">
                                                                                    First Class
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-end d-none banner-dropdown-actions">
                                                                        <a href="#"
                                                                            class="btn btn-light btn-sm me-2 d-none">Cancel</a>
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-sm apply-btn d-none">Apply</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary search-btn rounded">Search</button>
                                                    </div>
                                                </div>
                                                <div class="multi-trip">
                                                    <div class="d-lg-flex">
                                                        <div class="d-flex  form-info">
                                                            <div class="form-item change-drop booking-dropdown dropdown">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">From</label>
                                                                    <input type="text" class="form-control value-input"
                                                                        value="Newyork">
                                                                    <p class="fs-12 mb-0">Ken International Airport</p>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-md p-0">
                                                                    <div class="input-search p-3 border-bottom">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Location">
                                                                            <span
                                                                                class="input-group-text px-2 border-start-0"><i
                                                                                    class="isax isax-search-normal"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Newyork</div>
                                                                                <p>Ken International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Boston</div>
                                                                                <p>Boston Logan International Airport
                                                                                </p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Northern Virginia</div>
                                                                                <p>Dulles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Los Angeles</div>
                                                                                <p>Los Angeles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Orlando</div>
                                                                                <p>Orlando International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-item change-drop booking-dropdown dropdown ps-2 ps-sm-3">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">To</label>
                                                                    <input type="text" class="form-control value-input"
                                                                        value="Las Vegas">
                                                                    <p class="fs-12 mb-0">Martini International Airport
                                                                    </p>
                                                                    <span
                                                                        class="way-icon badge badge-primary rounded-pill translate-middle">
                                                                        <i
                                                                            class="fa-solid fa-arrow-right-arrow-left"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-md p-0">
                                                                    <div class="input-search p-3 border-bottom">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Location">
                                                                            <span
                                                                                class="input-group-text px-2 border-start-0"><i
                                                                                    class="isax isax-search-normal"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Newyork</div>
                                                                                <p>Ken International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Boston</div>
                                                                                <p>Boston Logan International Airport
                                                                                </p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Northern Virginia</div>
                                                                                <p>Dulles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Los Angeles</div>
                                                                                <p>Los Angeles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Orlando</div>
                                                                                <p>Orlando International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-item">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Departure</label>
                                                                <input type="text" class="form-control datetimepicker"
                                                                    value="21-10-2024">
                                                                <p class="fs-12 mb-0">Monday</p>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary search-btn rounded">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="Hotels">
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
                                                                <div class="d-flex justify-content-end d-none banner-dropdown-actions">
                                                                    <a href="#"
                                                                        class="btn btn-light btn-sm me-2 d-none">Cancel</a>
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm apply-btn d-none">Apply</button>
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
                                        <div class="tab-pane fade" id="Cars">
                                            <form action="{{url('car-grid')}}">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="drop" id="same-drop" value="same-drop" checked>
                                                            <label class="form-check-label fs-14 ms-2" for="same-drop">
                                                                Same drop-off
                                                            </label>
                                                        </div>
                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="drop" id="different-drop" value="different-drop">
                                                            <label class="form-check-label fs-14 ms-2"
                                                                for="different-drop">
                                                                Different Drop off
                                                            </label>
                                                        </div>
                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="drop" id="airport" value="airport">
                                                            <label class="form-check-label fs-14 ms-2" for="airport">
                                                                Airport
                                                            </label>
                                                        </div>
                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="drop" id="hourly-drop" value="hourly-drop">
                                                            <label class="form-check-label fs-14 ms-2"
                                                                for="hourly-drop">
                                                                Hourly Package
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="fw-medium fs-16 mb-2 text-dark">Book Car for rental
                                                    </div>
                                                </div>
                                                <div class="d-lg-flex">
                                                    <div class="d-flex  form-info">
                                                        <div class="form-item change-drop booking-dropdown dropdown from-location">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">From</label>
                                                                <input type="text" class="form-control value-input" value="Newyork">
                                                                <p class="fs-12 mb-0">USA</p>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-md p-0">
                                                                <div class="input-search p-3 border-bottom">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Search for Cars">
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
                                                                            <p>2000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Japan
                                                                            </div>
                                                                            <p>3000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Singapore</div>
                                                                            <p>8000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Russia</div>
                                                                            <p>8000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Germany</div>
                                                                            <p>6000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-item change-drop dropdown pickup-airport">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">From</label>
                                                                <input type="text" class="form-control value-input" value="Newyork">
                                                                <p class="fs-12 mb-0">Ken International Airport</p>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-md p-0">
                                                                <div class="input-search p-3 border-bottom">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control value-input"
                                                                            placeholder="Search for Airport">
                                                                        <span
                                                                            class="input-group-text px-2 border-start-0"><i
                                                                                class="isax isax-search-normal"></i></span>
                                                                    </div>
                                                                </div>
                                                                <ul>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark">Hartsfield-Jackson Atlanta International
                                                                            </div>
                                                                            <p>USA</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark">Dallas/Fort Worth International</div>
                                                                            <p>USA</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark">London Heathrow</div>
                                                                            <p>UK</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark">SeoulIncheon</div>
                                                                            <p>South Korea</p>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark">Singapore Changi International</div>
                                                                            <p>Singapore</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-item change-drop booking-dropdown dropdown to-location ps-2 ps-sm-3">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">To</label>
                                                                <input type="text" class="form-control value-input" value="Newyork">
                                                                <p class="fs-12 mb-0">USA</p>
                                                                <span
                                                                    class="way-icon badge badge-primary rounded-pill translate-middle">
                                                                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                                                </span>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-md p-0">
                                                                <div class="input-search p-3 border-bottom">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Search for Cars">
                                                                        <span
                                                                            class="input-group-text px-2 border-start-0"><i
                                                                                class="isax isax-search-normal"></i></span>
                                                                    </div>
                                                                </div>
                                                                <ul>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">USA</div>
                                                                            <p>2000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Japan</div>
                                                                            <p>3000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Singapore</div>
                                                                            <p>8000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Russia</div>
                                                                            <p>8000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Germany</div>
                                                                            <p>6000 Cars</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-item">
                                                            <label
                                                                class="form-label fs-14 text-default mb-1">Departure</label>
                                                            <input type="text" class="form-control datetimepicker"
                                                                value="21-10-2024">
                                                            <p class="fs-12 mb-0">Monday</p>
                                                        </div>
                                                        <div class="form-item return-drop">
                                                            <label
                                                                class="form-label fs-14 text-default mb-1">Return</label>
                                                            <input type="text" class="form-control datetimepicker"
                                                                value="23-10-2024">
                                                            <p class="fs-12 mb-0">Wednesday</p>
                                                        </div>
                                                        <div class="form-item">
                                                            <label class="form-label fs-14 text-default mb-1">Pickup
                                                                Time</label>
                                                            <input type="text" class="form-control timepicker"
                                                                value="11:45 PM">
                                                        </div>
                                                        <div class="form-item dropoff-time">
                                                            <label class="form-label fs-14 text-default mb-1">Dropoff
                                                                Time</label>
                                                            <input type="text" class="form-control timepicker"
                                                                value="11:45 PM">
                                                        </div>
                                                        <div class="form-item hourly-time">
                                                            <label
                                                                class="form-label fs-14 text-default mb-1">Hours</label>
                                                            <div class="home-eight-title text-dark">02 Hrs 10 Kms</div>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary search-btn rounded">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="Cruise">
                                            <form action="{{url('cruise-grid')}}">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                                    <div class="fw-medium fs-16 mb-2 text-dark">Search For Cruise</div>
                                                </div>
                                                <div class="d-lg-flex">
                                                    <div class="d-flex  form-info">
                                                        <div class="form-item booking-dropdown dropdown">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Destination</label>
                                                                <input type="text" class="form-control value-input" value="Newyork">
                                                                <p class="fs-12 mb-0">USA</p>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-md p-0">
                                                                <div class="input-search p-3 border-bottom">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Search Location">
                                                                        <span
                                                                            class="input-group-text px-2 border-start-0"><i
                                                                                class="isax isax-search-normal"></i></span>
                                                                    </div>
                                                                </div>
                                                                <ul>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Newyork</div>
                                                                            <p>Ken International Airport</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Boston</div>
                                                                            <p>Boston Logan International Airport</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Northern Virginia</div>
                                                                            <p>Dulles International Airport</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Los Angeles</div>
                                                                            <p>Los Angeles International Airport</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Orlando</div>
                                                                            <p>Orlando International Airport</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-item">
                                                            <label class="form-label fs-14 text-default mb-1">Start
                                                                Date</label>
                                                            <input type="text" class="form-control check-in"
                                                                value="21-10-2026">
                                                            <p class="fs-12 mb-0">Monday</p>
                                                        </div>
                                                        <div class="form-item">
                                                            <label class="form-label fs-14 text-default mb-1">End
                                                                Date</label>
                                                            <input type="text" class="form-control check-out"
                                                                value="21-10-2026">
                                                            <p class="fs-12 mb-0">Monday</p>
                                                        </div>
                                                        <!-- Add a hidden input or just use one of the inputs to trigger the daterangepicker -->
                                                        <input type="text" class="date-range d-none">
                                                        <div class="form-item dropdown">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Travellers
                                                                    & Cabin </label>
                                                                <div class="home-eight-title text-dark member-count">4 <span
                                                                        class="fw-normal fs-14">Persons</span></div>
                                                                <p class="fs-12 mb-0"><span class="adult">4</span> Adult</p>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-end dropdown-xl">
                                                                <div class="mb-3 home-eight-title text-dark">Select
                                                                    Travelers & Class</div>
                                                                <div class="mb-3 border br-10 info-item pb-1">
                                                                    <div class="fs-16 fw-medium mb-2 text-dark">
                                                                        Travellers</div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label text-gray-9 mb-2">Adults
                                                                                    <span
                                                                                        class="text-default fw-normal">(
                                                                                        12+ Yrs )</span></label>
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
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label text-gray-9 mb-2">Childrens
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
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
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
                                                                    <div class="fs-16 fw-medium mb-2 text-dark">Select
                                                                        Cabin</div>
                                                                    <div class="d-flex align-items-center flex-wrap">
                                                                        <div class="form-check me-3 mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cabin" id="cabin1" checked>
                                                                            <label class="form-check-label"
                                                                                for="cabin1">
                                                                                Solo cabins
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cabin" id="cabin2">
                                                                            <label class="form-check-label"
                                                                                for="cabin2">
                                                                                Balcony
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                value="Business" name="cabin"
                                                                                id="cabin3">
                                                                            <label class="form-check-label"
                                                                                for="cabin3">
                                                                                Oceanview
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cabin" id="cabin4">
                                                                            <label class="form-check-label"
                                                                                for="cabin4">
                                                                                Balcony rooms
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-end d-none banner-dropdown-actions">
                                                                    <a href="#"
                                                                        class="btn btn-light btn-sm me-2 d-none">Cancel</a>
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm apply-btn d-none">Apply</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary search-btn rounded">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="Tour">
                                            <form action="{{ route('tour-list') }}" method="GET">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                                    <div class="fw-medium fs-16 mb-2 text-dark">Search holiday packages
                                                        & trips</div>
                                                </div>
                                                <div class="d-lg-flex">
                                                    <div class="d-flex  form-info">
                                                        <div class="form-item booking-dropdown dropdown">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label class="form-label fs-14 text-default mb-1">Where
                                                                    would like to go?</label>
                                                                <input type="text" class="form-control value-input" name="destination_city"
                                                                    id="home-tour-destination" value="" placeholder="Search destination city" autocomplete="off">
                                                                <p class="fs-12 mb-0" id="home-tour-destination-subtitle">Enter city name to search tours</p>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-md p-0 overflow-visible">
                                                                <div class="input-search p-3 border-bottom">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control js-city-suggest-input"
                                                                            data-city-url="{{ route('cities.autocomplete') }}"
                                                                            data-sync-to="#home-tour-destination"
                                                                            data-subtitle-to="#home-tour-destination-subtitle"
                                                                            placeholder="Search for City, Property name or Location"
                                                                            autocomplete="off">
                                                                        <span
                                                                            class="input-group-text px-2 border-start-0"><i
                                                                                class="isax isax-search-normal"></i></span>
                                                                    </div>
                                                                </div>
                                                                <ul class="js-city-static-list">
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">USA</div>
                                                                            <p>200 Places</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Japan</div>
                                                                            <p>300 Places</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Singapore</div>
                                                                            <p>80 Places</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="border-bottom">
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Russia</div>
                                                                            <p>500 Places</p>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            <div class="fs-16 fw-medium text-dark dropdown-name">Germany</div>
                                                                            <p>150 Places</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-item">
                                                            <label
                                                                class="form-label fs-14 text-default mb-1">Dates</label>
                                                            <input type="text" class="form-control check-in"
                                                                value="21-10-2026">
                                                            <p class="fs-12 mb-0">Monday</p>
                                                        </div>
                                                        <div class="form-item">
                                                            <label class="form-label fs-14 text-default mb-1">Check
                                                                Out</label>
                                                            <input type="text" class="form-control check-out"
                                                                value="21-10-2026">
                                                            <p class="fs-12 mb-0">Wednesday</p>
                                                        </div>
                                                        <div class="form-item dropdown">
                                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                aria-expanded="false" role="menu">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Travellers</label>
                                                                <div class="home-eight-title text-dark member-count">4 <span
                                                                        class="fw-normal fs-14">Persons</span></div>
                                                                <p class="fs-12 mb-0"><span class="adult">2</span> Adult</p>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-end dropdown-xl">
                                                                <div class="mb-3 home-eight-title text-dark">Select
                                                                    Travelers</div>
                                                                <div class="mb-3 border br-10 info-item pb-1">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div
                                                                                class="mb-3 d-flex align-items-center justify-content-between">
                                                                                <label
                                                                                    class="form-label text-gray-9 mb-2">Adult</label>
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
                                                                            <div
                                                                                class="mb-3 d-flex align-items-center justify-content-between">
                                                                                <label
                                                                                    class="form-label text-gray-9 mb-2">Childrens
                                                                                    <span
                                                                                        class="text-default fw-normal">(
                                                                                        12+ Yrs )</span></label>
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
                                                                            <div
                                                                                class="mb-3 d-flex align-items-center justify-content-between">
                                                                                <label
                                                                                    class="form-label text-gray-9 mb-2">Infants
                                                                                    <span
                                                                                        class="text-default fw-normal">(
                                                                                        12+ Yrs )</span></label>
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
                                                                <div class="d-flex justify-content-end d-none banner-dropdown-actions">
                                                                    <a href="#"
                                                                        class="btn btn-light btn-sm me-2 d-none">Cancel</a>
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm apply-btn d-none">Apply</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary search-btn rounded">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="Bus">
                                            <form action="#">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="tripType" id="oneways" value="oneway" checked>
                                                            <label class="form-check-label fs-14 ms-2"
                                                                for="oneways">Oneway</label>
                                                        </div>

                                                        <div class="form-check d-flex align-items-center me-3 mb-2">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                name="tripType" id="roundedtrip" value="roundtrip">
                                                            <label class="form-check-label fs-14 ms-2"
                                                                for="roundedtrip">Round Trip</label>
                                                        </div>
                                                    </div>
                                                    <div class="fw-medium fs-16 mb-2 text-dark">Low cost Buses in One
                                                        simple search</div>
                                                </div>
                                                <div class="normal-trip">
                                                    <div class="d-lg-flex">
                                                        <div class="d-flex  form-info">
                                                            <div class="form-item change-drop booking-dropdown dropdown">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">From</label>
                                                                    <input type="text" class="form-control value-input"
                                                                        value="Newyork">
                                                                    <p class="fs-12 mb-0">USA</p>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-md p-0">
                                                                    <div class="input-search p-3 border-bottom">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Location">
                                                                            <span
                                                                                class="input-group-text px-2 border-start-0"><i
                                                                                    class="isax isax-search-normal"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Newyork</div>
                                                                                <p>USA</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Boston</div>
                                                                                <p>Spain</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Northern Virginia</div>
                                                                                <p>USA</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Los Angeles</div>
                                                                                <p>USA</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Orlando</div>
                                                                                <p>USA</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-item change-drop booking-dropdown dropdown ps-2 ps-sm-3">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">To</label>
                                                                    <input type="text" class="form-control value-input"
                                                                        value="Las Vegas">
                                                                    <p class="fs-12 mb-0">USA</p>
                                                                    <span
                                                                        class="way-icon badge badge-primary rounded-pill translate-middle">
                                                                        <i
                                                                            class="fa-solid fa-arrow-right-arrow-left"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-md p-0">
                                                                    <div class="input-search p-3 border-bottom">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Location">
                                                                            <span
                                                                                class="input-group-text px-2 border-start-0"><i
                                                                                    class="isax isax-search-normal"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Newyork</div>
                                                                                <p>USA</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Boston</div>
                                                                                <p>Spain</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Northern Virginia</div>
                                                                                <p>USA</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Los Angeles</div>
                                                                                <p>USA</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Orlando</div>
                                                                                <p>USA</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-item">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Departure</label>
                                                                <input type="text" class="form-control datetimepicker"
                                                                    value="21-10-2024">
                                                                <p class="fs-12 mb-0">Monday</p>
                                                            </div>
                                                            <div class="form-item round-drip">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Return</label>
                                                                <input type="text" class="form-control datetimepicker"
                                                                    value="23-10-2024">
                                                                <p class="fs-12 mb-0">Wednesday</p>
                                                            </div>
                                                            <div class="form-item dropdown">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">Travellers</label>
                                                                    <div class="home-eight-title text-dark member-count">4 <span
                                                                            class="fw-normal fs-14">Persons</span></div>
                                                                    <p class="fs-12 mb-0"><span class="adult">2</span> Adult, <span class="children">2</span> children</p>
                                                                </div>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-end dropdown-xl">
                                                                    <div class="mb-3 home-eight-title text-dark">Select
                                                                        Travelers & Class</div>
                                                                    <div class="mb-3 border br-10 info-item pb-1">
                                                                        <div class="fs-16 fw-medium mb-2 text-dark">
                                                                            Travellers</div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label text-gray-9 mb-2">Adults
                                                                                        <span
                                                                                            class="text-default fw-normal">(
                                                                                            12+ Yrs )</span></label>
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
                                                                            <div class="col-md-4">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label text-gray-9 mb-2">Childrens
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
                                                                            <div class="col-md-4">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label text-gray-9 mb-2">Infants<span
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
                                                                        <div
                                                                            class="d-flex align-items-center flex-wrap">
                                                                            <div class="form-check me-3 mb-3">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="Economy"
                                                                                    name="cabin-class" id="economys"
                                                                                    checked>
                                                                                <label class="form-check-label"
                                                                                    for="economys">
                                                                                    Seater
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check me-3 mb-3">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="Economy"
                                                                                    name="cabin-class"
                                                                                    id="premium-economys">
                                                                                <label class="form-check-label"
                                                                                    for="premium-economys">
                                                                                    Sleeper
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check me-3 mb-3">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="Business"
                                                                                    name="cabin-class" id="business">
                                                                                <label class="form-check-label"
                                                                                    for="business">
                                                                                    AC Sleeper
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-end d-none banner-dropdown-actions">
                                                                        <a href="#"
                                                                            class="btn btn-light btn-sm me-2 d-none">Cancel</a>
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-sm apply-btn d-none">Apply</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary search-btn rounded">Search</button>
                                                    </div>
                                                </div>
                                                <div class="multi-trip">
                                                    <div class="d-lg-flex">
                                                        <div class="d-flex  form-info">
                                                            <div class="form-item change-drop booking-dropdown dropdown">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">From</label>
                                                                    <input type="text" class="form-control value-input"
                                                                        value="Newyork">
                                                                    <p class="fs-12 mb-0">Ken International Airport</p>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-md p-0">
                                                                    <div class="input-search p-3 border-bottom">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Location">
                                                                            <span
                                                                                class="input-group-text px-2 border-start-0"><i
                                                                                    class="isax isax-search-normal"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Newyork</div>
                                                                                <p>Ken International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Boston</div>
                                                                                <p>Boston Logan International Airport
                                                                                </p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Northern Virginia</div>
                                                                                <p>Dulles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Los Angeles</div>
                                                                                <p>Los Angeles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Orlando</div>
                                                                                <p>Orlando International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-item change-drop booking-dropdown dropdown ps-2 ps-sm-3">
                                                                <div data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false"
                                                                    role="menu">
                                                                    <label
                                                                        class="form-label fs-14 text-default mb-1">To</label>
                                                                    <div class="home-eight-title text-dark value-input">Las Vegas
                                                                    </div>
                                                                    <p class="fs-12 mb-0">Martini International Airport
                                                                    </p>
                                                                    <span
                                                                        class="way-icon badge badge-primary rounded-pill translate-middle">
                                                                        <i
                                                                            class="fa-solid fa-arrow-right-arrow-left"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-md p-0">
                                                                    <div class="input-search p-3 border-bottom">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Location">
                                                                            <span
                                                                                class="input-group-text px-2 border-start-0"><i
                                                                                    class="isax isax-search-normal"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Newyork</div>
                                                                                <p>Ken International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Boston</div>
                                                                                <p>Boston Logan International Airport
                                                                                </p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Northern Virginia</div>
                                                                                <p>Dulles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="border-bottom">
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Los Angeles</div>
                                                                                <p>Los Angeles International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                <div class="fs-16 fw-medium text-dark dropdown-name">Orlando</div>
                                                                                <p>Orlando International Airport</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-item">
                                                                <label
                                                                    class="form-label fs-14 text-default mb-1">Departure</label>
                                                                <input type="text" class="form-control datetimepicker"
                                                                    value="21-10-2024">
                                                                <p class="fs-12 mb-0">Monday</p>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary search-btn rounded">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->

      
    @include('pages.home.partials.destination-section')

    <!-- Place Section -->
    <section class="section place-section bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-10 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="section-header mb-4 text-center">
                        <h2 class="mb-2">Our <span class="text-primary  text-decoration-underline">Trending</span>
                            Places</h2>
                        <p class="sub-title">Here are some famous tourist places around the world that are known for
                            their historical significance, natural beauty, or cultural impact</p>
                    </div>
                </div>
            </div>
            <div class="place-nav">
                <ul class="nav justify-content-center">
                    <li>
                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#flight-list">
                            Flights
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link active" data-bs-toggle="tab" data-bs-target="#Hotels-list">
                            Hotels
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Cars-list">
                            Cars
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Cruise-list">
                            Cruise
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Tour-list">
                            Tour
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#Bus-list">
                            Bus
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">

                <!-- Hotels List -->
                <div class="tab-pane fade active show" id="Hotels-list">
                    <div class="owl-carousel place-slider nav-center">

                        <!-- Place Item-->
                        <div class="place-item mb-4">
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
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">5.0</span>
                                    <p class="fs-14">(400 Reviews)</p>
                                </div>
                                <h5 class="mb-1"><a href="{{url('hotel-details')}}">Hotel Plaza Athenee</a></h5>
                                <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Ciutat
                                    Vella, Barcelona</p>
                                <div class="border-top pt-2 mb-2">
                                    <h6 class="d-flex align-items-center">Facillities :<i
                                            class="isax isax-wifi ms-2 me-2 text-primary"></i><i
                                            class="isax isax-scissor me-2 text-primary"></i><i
                                            class="isax isax-profile-2user me-2 text-primary"></i><i
                                            class="isax isax-wind-2 me-2 text-primary"></i><a href="#"
                                            class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h5 class="text-primary">$500 <span class="fs-14 fw-normal text-default">/
                                            Night</span></h5>
                                    <a href="#" class="d-flex align-items-center">
                                        <span class="avatar avatar-md me-2">
                                            <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14">Beth Williams</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4">
                            <div class="place-img">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-02.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <span class="badge bg-danger d-inline-flex align-items-center"><i
                                            class="isax isax-tag me-1"></i>Hot</span>
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center mb-1">
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">5.0</span>
                                    <p class="fs-14">(210 Reviews)</p>
                                </div>
                                <h5 class="mb-1"><a href="{{url('hotel-details')}}">A Luxury Hotel</a></h5>
                                <p class="d-flex align-items-center mb-2"><i
                                        class="isax isax-location5 me-2"></i>Downtown, New York</p>
                                <div class="border-top pt-2 mb-2">
                                    <h6 class="d-flex align-items-center">Facillities :<i
                                            class="isax isax-wifi ms-2 me-2 text-primary"></i><i
                                            class="isax isax-scissor me-2 text-primary"></i><i
                                            class="isax isax-personalcard me-2 text-primary"></i></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h5 class="text-primary">$500 <span class="fs-14 fw-normal text-default">/
                                            Night</span></h5>
                                    <a href="#" class="d-flex align-items-center">
                                        <span class="avatar avatar-md me-2">
                                            <img src="{{URL::asset('build/img/users/user-06.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14">Kyle Woodward</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4">
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
                                            <img src="{{URL::asset('build/img/hotels/hotel-01.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item justify-content-end">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center mb-1">
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.9</span>
                                    <p class="fs-14">(60 Reviews)</p>
                                </div>
                                <h5 class="mb-1"><a href="{{url('hotel-details')}}">The Start Hotel, Casino</a></h5>
                                <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Paris,
                                    France</p>
                                <div class="border-top pt-2 mb-2">
                                    <h6 class="d-flex align-items-center">Facillities :<i
                                            class="isax isax-wifi ms-2 me-2 text-primary"></i><i
                                            class="isax isax-note-text me-2 text-primary"></i><i
                                            class="isax isax-wind-2 me-2 text-primary"></i></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h5 class="text-primary">$740 <span class="fs-14 fw-normal text-default">/
                                            Night</span></h5>
                                    <a href="#" class="d-flex align-items-center">
                                        <span class="avatar avatar-md me-2">
                                            <img src="{{URL::asset('build/img/users/user-02.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14">Jeanette Lupo</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4">
                            <div class="place-img">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-04.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <span class="badge bg-purple d-inline-flex align-items-center"><i
                                            class="isax isax-more-2 me-1"></i>Featured</span>
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center mb-1">
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.9</span>
                                    <p class="fs-14">(10 Reviews)</p>
                                </div>
                                <h5 class="mb-1"><a href="{{url('hotel-details')}}">Kâ€™s House Tokyo Oasis</a></h5>
                                <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Tokyo,
                                    Japan</p>
                                <div class="border-top pt-2 mb-2">
                                    <h6 class="d-flex align-items-center">Facillities :<i
                                            class="isax isax-wifi ms-2 me-2 text-primary"></i><i
                                            class="isax isax-scissor me-2 text-primary"></i><i
                                            class="isax isax-profile-2user me-2 text-primary"></i><i
                                            class="isax isax-wind-2 me-2 text-primary"></i><a href="#"
                                            class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h5 class="text-primary">$147 <span class="fs-14 fw-normal text-default">/
                                            Night</span></h5>
                                    <a href="#" class="d-flex align-items-center">
                                        <span class="avatar avatar-md me-2">
                                            <img src="{{URL::asset('build/img/users/user-04.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14">Hilda Pate</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4">
                            <div class="place-img">
                                <a href="{{url('hotel-details')}}">
                                    <img src="{{URL::asset('build/img/hotels/hotel-03.jpg')}}" class="img-fluid" alt="img">
                                </a>
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
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">5.0</span>
                                    <p class="fs-14">(400 Reviews)</p>
                                </div>
                                <h5 class="mb-1"><a href="{{url('hotel-details')}}">Hotel Plaza Athenee</a></h5>
                                <p class="d-flex align-items-center mb-2"><i class="isax isax-location5 me-2"></i>Ciutat
                                    Vella, Barcelona</p>
                                <div class="border-top pt-2 mb-2">
                                    <h6 class="d-flex align-items-center">Facillities :<i
                                            class="isax isax-wifi ms-2 me-2 text-primary"></i><i
                                            class="isax isax-scissor me-2 text-primary"></i><i
                                            class="isax isax-profile-2user me-2 text-primary"></i><i
                                            class="isax isax-wind-2 me-2 text-primary"></i><a href="#"
                                            class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h5 class="text-primary">$500 <span class="fs-14 fw-normal text-default">/
                                            Night</span></h5>
                                    <a href="#" class="d-flex align-items-center">
                                        <span class="avatar avatar-md me-2">
                                            <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14">Beth Williams</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                    </div>
                </div>
                <!-- /Hotels List -->

                <!-- Flight List -->
                <div class="tab-pane fade" id="flight-list">
                    <div class="owl-carousel place-slider nav-center">

                        <!-- Flight Item-->
                        <div class="place-item mb-4">
                            <div class="place-img">
                                <a href="{{url('flight-details')}}">
                                    <img src="{{URL::asset('build/img/flight/flight-01.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">4.3</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="flight-loc d-flex align-items-center justify-content-between mb-2">
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-45 me-2"></i>Toronto</span>
                                    <span class="arrow-icon"><i class="isax isax-arrow-2"></i></span>
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-135 me-2"></i>Bangkok</span>
                                </div>
                                <h5 class="text-truncate mb-1"><a href="{{url('flight-details')}}">AstraFlight 215</a></h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="avatar avatar-sm me-2">
                                        <img src="{{URL::asset('build/img/icons/airindia.svg')}}" class="rounded-circle" alt="icon">
                                    </span>
                                    <p class="fs-14 mb-0">Indigo</p>
                                    <p class="fs-14 mb-0">1-stop at Frankfurt</p>
                                </div>
                                <div class="date-info p-2 mb-3">
                                    <p class="d-flex align-items-center"><i class="isax isax-calendar-2 me-2"></i>Sep
                                        04, 2024 - Sep 07, 2024</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="text-primary"><span class="fs-14 fw-normal text-default">From </span>$300
                                    </h6>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-outline-success fs-10 fw-medium p-2 me-2">22 Seats
                                            Left</span>
                                        <a href="#" class="avatar avatar-sm">
                                            <img src="{{URL::asset('build/img/users/user-11.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Flight Item-->

                        <!-- Flight Item-->
                        <div class="place-item mb-4">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('flight-details')}}">
                                            <img src="{{URL::asset('build/img/flight/flight-02.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('flight-details')}}">
                                            <img src="{{URL::asset('build/img/flight/flight-06.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('flight-details')}}">
                                            <img src="{{URL::asset('build/img/flight/flight-07.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">4.7</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="flight-loc d-flex align-items-center justify-content-between mb-2">
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-45 me-2"></i>Chicago</span>
                                    <span class="arrow-icon"><i class="isax isax-arrow-2"></i></span>
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-135 me-2"></i>Melbourne</span>
                                </div>
                                <h5 class="text-truncate mb-1"><a href="{{url('flight-details')}}">Cloudrider 789</a></h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="avatar avatar-sm me-2">
                                        <img src="{{URL::asset('build/img/icons/airindia.svg')}}" class="rounded-circle" alt="icon">
                                    </span>
                                    <p class="fs-14 mb-0">Indigo</p>
                                    <p class="fs-14 mb-0">1-stop at Dallas</p>
                                </div>
                                <div class="date-info p-2 mb-3">
                                    <p class="d-flex align-items-center"><i class="isax isax-calendar-2 me-2"></i>Sep
                                        11, 2024 - Sep 13, 2024</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="text-primary"><span class="fs-14 fw-normal text-default">From </span>$550
                                    </h6>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-outline-success fs-10 fw-medium p-2 me-2">14 Seats
                                            Left</span>
                                        <a href="#" class="avatar avatar-sm">
                                            <img src="{{URL::asset('build/img/users/user-12.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Flight Item-->

                        <!-- Flight Item-->
                        <div class="place-item mb-4">
                            <div class="place-img">
                                <a href="{{url('flight-details')}}">
                                    <img src="{{URL::asset('build/img/flight/flight-03.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">4.5</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="flight-loc d-flex align-items-center justify-content-between mb-2">
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-45 me-2"></i>Miami</span>
                                    <span class="arrow-icon"><i class="isax isax-arrow-2"></i></span>
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-135 me-2"></i>Tokyo</span>
                                </div>
                                <h5 class="text-truncate mb-1"><a href="{{url('flight-details')}}">Aether Express 901</a></h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="avatar avatar-sm me-2">
                                        <img src="{{URL::asset('build/img/icons/airindia.svg')}}" class="rounded-circle" alt="icon">
                                    </span>
                                    <p class="fs-14 mb-0">Indigo</p>
                                    <p class="fs-14 mb-0">1-stop at Seoul</p>
                                </div>
                                <div class="date-info p-2 mb-3">
                                    <p class="d-flex align-items-center"><i class="isax isax-calendar-2 me-2"></i>Sep
                                        22, 2024 - Sep 24, 2024</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="text-primary"><span class="fs-14 fw-normal text-default">From </span>$450
                                    </h6>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-outline-success fs-10 fw-medium p-2 me-2">12 Seats
                                            Left</span>
                                        <a href="#" class="avatar avatar-sm">
                                            <img src="{{URL::asset('build/img/users/user-13.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Flight Item-->

                        <!-- Flight Item-->
                        <div class="place-item mb-4">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('flight-details')}}">
                                            <img src="{{URL::asset('build/img/flight/flight-04.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('flight-details')}}">
                                            <img src="{{URL::asset('build/img/flight/flight-08.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('flight-details')}}">
                                            <img src="{{URL::asset('build/img/flight/flight-10.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">4.3</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="flight-loc d-flex align-items-center justify-content-between mb-2">
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-45 me-2"></i>Boston</span>
                                    <span class="arrow-icon"><i class="isax isax-arrow-2"></i></span>
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-135 me-2"></i>Singapore</span>
                                </div>
                                <h5 class="text-truncate mb-1"><a href="{{url('flight-details')}}">Silverwing 505</a></h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="avatar avatar-sm me-2">
                                        <img src="{{URL::asset('build/img/icons/airindia.svg')}}" class="rounded-circle" alt="icon">
                                    </span>
                                    <p class="fs-14 mb-0">Indigo</p>
                                    <p class="fs-14 mb-0">1-stop at London</p>
                                </div>
                                <div class="date-info p-2 mb-3">
                                    <p class="d-flex align-items-center"><i class="isax isax-calendar-2 me-2"></i>Oct
                                        17, 2024 - Oct 19, 2024</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="text-primary"><span class="fs-14 fw-normal text-default">From </span>$700
                                    </h6>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-outline-success fs-10 fw-medium p-2 me-2">18 Seats
                                            Left</span>
                                        <a href="#" class="avatar avatar-sm">
                                            <img src="{{URL::asset('build/img/users/user-15.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Flight Item-->

                        <!-- Flight Item-->
                        <div class="place-item mb-4">
                            <div class="place-img">
                                <a href="{{url('flight-details')}}">
                                    <img src="{{URL::asset('build/img/flight/flight-10.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">4.6</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="flight-loc d-flex align-items-center justify-content-between mb-2">
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-45 me-2"></i>Paris</span>
                                    <span class="arrow-icon"><i class="isax isax-arrow-2"></i></span>
                                    <span class="loc-name d-inline-flex align-items-center"><i
                                            class="isax isax-airplane rotate-135 me-2"></i>Cape Town</span>
                                </div>
                                <h5 class="text-truncate mb-1"><a href="{{url('flight-details')}}">Nimbus 345</a></h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="avatar avatar-sm me-2">
                                        <img src="{{URL::asset('build/img/icons/airindia.svg')}}" class="rounded-circle" alt="icon">
                                    </span>
                                    <p class="fs-14 mb-0">Indigo</p>
                                    <p class="fs-14 mb-0">1-stop at Doha</p>
                                </div>
                                <div class="date-info p-2 mb-3">
                                    <p class="d-flex align-items-center"><i class="isax isax-calendar-2 me-2"></i>Aug
                                        26, 2024 - Aug 27, 2024</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="text-primary"><span class="fs-14 fw-normal text-default">From </span>$300
                                    </h6>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-outline-success fs-10 fw-medium p-2 me-2">27 Seats
                                            Left</span>
                                        <a href="#" class="avatar avatar-sm">
                                            <img src="{{URL::asset('build/img/users/user-10.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Flight Item-->

                    </div>
                </div>
                <!-- /Flight List -->

                <!-- Cars List -->
                <div class="tab-pane fade" id="Cars-list">
                    <div class="owl-carousel place-slider nav-center">

                        <!-- Car Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-06.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-07.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-08.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon selected">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <a href="#" class="avatar avatar-md ms-3 car-avatar-image">
                                    <img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="rounded-circle" alt="img">
                                </a>
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="badge badge-secondary  fs-10 fw-medium me-1">Sedan</span>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('car-details')}}">Toyota Camry SE 400</a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Ciutat
                                    Vella, Barcelona</p>
                                <div class="mb-3 p-2 border rounded d-flex align-items-center justify-content-between">
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-gas-station me-1"></i>Fuel</span>
                                        <p class="text-dark fs-14">Hybrid</p>
                                    </div>
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-kanban me-1"></i>Gear</span>
                                        <p class="text-dark fs-14">Manual</p>
                                    </div>
                                    <div>
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-routing-2 me-1"></i>Travelled</span>
                                        <p class="text-dark fs-14">14,000 KM</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <h5 class="text-primary">$500 <span class="fs-14 text-gray-6 fw-normal">/
                                                day</span></h5>
                                    </div>
                                    <div class="ms-2 d-flex align-items-center">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <span
                                                class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">5.0</span>
                                            <p class="fs-14">(400 Reviews)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Car Item-->

                        <!-- Car Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-07.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-08.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-09.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <a href="#" class="avatar avatar-md ms-3 car-avatar-image">
                                    <img src="{{URL::asset('build/img/users/user-09.jpg')}}" class="rounded-circle" alt="img">
                                </a>
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="badge badge-secondary  fs-10 fw-medium me-1">Sedan</span>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('car-details')}}">Ford Mustang 4.0 AT</a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Oxford
                                    Street, London</p>
                                <div class="mb-3 p-2 border rounded d-flex align-items-center justify-content-between">
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-gas-station me-1"></i>Fuel</span>
                                        <p class="text-dark fs-14">Hybrid</p>
                                    </div>
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-kanban me-1"></i>Gear</span>
                                        <p class="text-dark fs-14">Auto</p>
                                    </div>
                                    <div>
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-routing-2 me-1"></i>Travelled</span>
                                        <p class="text-dark fs-14">12,000 KM</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <h5 class="text-primary">$600 <span class="fs-14 text-gray-6 fw-normal">/
                                                day</span></h5>
                                    </div>
                                    <div class="ms-2 d-flex align-items-center">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <span
                                                class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">4.7</span>
                                            <p class="fs-14">(300 Reviews)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Car Item-->

                        <!-- Car Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-08.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-09.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-10.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <a href="#" class="avatar avatar-md ms-3 car-avatar-image">
                                    <img src="{{URL::asset('build/img/users/user-10.jpg')}}" class="rounded-circle" alt="img">
                                </a>
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="badge badge-secondary  fs-10 fw-medium me-1">Sedan</span>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('car-details')}}">Ferrari 458 MM Special</a>
                                </h5>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-location5 me-2"></i>Princes Street, Edinburgh</p>
                                <div class="mb-3 p-2 border rounded d-flex align-items-center justify-content-between">
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-gas-station me-1"></i>Fuel</span>
                                        <p class="text-dark fs-14">Hybrid</p>
                                    </div>
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-kanban me-1"></i>Gear</span>
                                        <p class="text-dark fs-14">Auto</p>
                                    </div>
                                    <div>
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-routing-2 me-1"></i>Travelled</span>
                                        <p class="text-dark fs-14">13,000 KM</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <h5 class="text-primary">$300 <span class="fs-14 text-gray-6 fw-normal">/
                                                day</span></h5>
                                    </div>
                                    <div class="ms-2 d-flex align-items-center">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <span
                                                class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">4.0</span>
                                            <p class="fs-14">(320 Reviews)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Car Item-->

                        <!-- Car Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-10.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-11.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-12.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <a href="#" class="avatar avatar-md ms-3 car-avatar-image">
                                    <img src="{{URL::asset('build/img/users/user-12.jpg')}}" class="rounded-circle" alt="img">
                                </a>
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="badge badge-secondary  fs-10 fw-medium me-1">Sedan</span>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('car-details')}}">BMW 3.0 Gran Turismo</a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Kingâ€™s
                                    Road, Chelsea</p>
                                <div class="mb-3 p-2 border rounded d-flex align-items-center justify-content-between">
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-gas-station me-1"></i>Fuel</span>
                                        <p class="text-dark fs-14">Petrol</p>
                                    </div>
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-kanban me-1"></i>Gear</span>
                                        <p class="text-dark fs-14">Manual</p>
                                    </div>
                                    <div>
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-routing-2 me-1"></i>Travelled</span>
                                        <p class="text-dark fs-14">12,800 KM</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <h5 class="text-primary">$550 <span class="fs-14 text-gray-6 fw-normal">/
                                                day</span></h5>
                                    </div>
                                    <div class="ms-2 d-flex align-items-center">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <span
                                                class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">4.3</span>
                                            <p class="fs-14">(300 Reviews)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Car Item-->

                        <!-- Car Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-11.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-12.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('car-details')}}">
                                            <img src="{{URL::asset('build/img/cars/car-13.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <a href="#" class="avatar avatar-md ms-3 car-avatar-image">
                                    <img src="{{URL::asset('build/img/users/user-13.jpg')}}" class="rounded-circle" alt="img">
                                </a>
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="badge badge-secondary  fs-10 fw-medium me-1">Sedan</span>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('car-details')}}">Infiniti QX60 </a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Bold
                                    Street, Liverpool</p>
                                <div class="mb-3 p-2 border rounded d-flex align-items-center justify-content-between">
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-gas-station me-1"></i>Fuel</span>
                                        <p class="text-dark fs-14">Diesel</p>
                                    </div>
                                    <div class="pe-4 border-end">
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-kanban me-1"></i>Gear</span>
                                        <p class="text-dark fs-14">Auto</p>
                                    </div>
                                    <div>
                                        <span class="fs-14 d-flex align-items-center text-dark"><i
                                                class="isax isax-routing-2 me-1"></i>Travelled</span>
                                        <p class="text-dark fs-14">13,500 KM</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <h5 class="text-primary">$450 <span class="fs-14 text-gray-6 fw-normal">/
                                                day</span></h5>
                                    </div>
                                    <div class="ms-2 d-flex align-items-center">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <span
                                                class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">4.1</span>
                                            <p class="fs-14">(450 Reviews)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Car Item-->

                    </div>

                </div>
                <!-- /Cars List -->

                <!-- Cruise List -->
                <div class="tab-pane fade" id="Cruise-list">
                    <div class="owl-carousel place-slider nav-center">

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('cruise-details')}}">
                                            <img src="{{URL::asset('build/img/cruise/cruise-05.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('cruise-details')}}">
                                            <img src="{{URL::asset('build/img/cruise/cruise-02.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('cruise-details')}}">
                                            <img src="{{URL::asset('build/img/cruise/cruise-04.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon selected">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <a href="#" class="d-flex align-items-center overflow-hidden me-2">
                                        <span class="avatar avatar-md flex-shrink-0 me-2">
                                            <img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14 text-truncate">Beth Williams</p>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.9</span>
                                        <p class="fs-14 text-truncate">(400)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('cruise-details')}}">Super Aquamarine</a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Ciutat
                                    Vella, Barcelona</p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-1"><i class="isax isax-calendar-2 text-gray-6 me-1"></i>Year :
                                            <span class="text-dark fw-medium">2021</span></p>
                                        <p><i class="isax isax-user me-1"></i>Guests : <span
                                                class="text-dark fw-medium">4</span></p>
                                    </div>
                                    <div>
                                        <p class="mb-1"><i class="isax isax-fatrows text-gray-6 me-1"></i>Width : <span
                                                class="text-dark fw-medium">88.47 m</span></p>
                                        <p><i class="isax isax-flash-1 me-1"></i>Speed : <span
                                                class="text-dark fw-medium">19 Knots</span></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="d-flex align-items-center"><i
                                            class="isax isax-home-wifi ms-2 me-2"></i><i
                                            class="isax isax-scissor me-2"></i><i
                                            class="isax isax-profile-2user me-2"></i><i
                                            class="isax isax-wind-2 me-2"></i><a href="#"
                                            class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                                    <h5 class="text-primary text-nowrap me-2">$500 <span
                                            class="fs-14 fw-normal text-default">/ day</span></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <a href="{{url('cruise-details')}}">
                                    <img src="{{URL::asset('build/img/cruise/cruise-12.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <a href="#" class="d-flex align-items-center overflow-hidden me-2">
                                        <span class="avatar avatar-md flex-shrink-0 me-2">
                                            <img src="{{URL::asset('build/img/users/user-09.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14 text-truncate">Tom Andrews</p>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.7</span>
                                        <p class="fs-14 text-truncate">(300)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('cruise-details')}}">Bonnie Yacht</a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Oxford
                                    Street, London</p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-1"><i class="isax isax-calendar-2 text-gray-6 me-1"></i>Year :
                                            <span class="text-dark fw-medium">2020</span></p>
                                        <p><i class="isax isax-user me-1"></i>Guests : <span
                                                class="text-dark fw-medium">3</span></p>
                                    </div>
                                    <div>
                                        <p class="mb-1"><i class="isax isax-fatrows text-gray-6 me-1"></i>Width : <span
                                                class="text-dark fw-medium">70.63 m</span></p>
                                        <p><i class="isax isax-flash-1 me-1"></i>Speed : <span
                                                class="text-dark fw-medium">17 Knots</span></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="d-flex align-items-center"><i
                                            class="isax isax-home-wifi ms-2 me-2"></i><i
                                            class="isax isax-scissor me-2"></i><i
                                            class="isax isax-profile-2user me-2"></i><i
                                            class="isax isax-wind-2 me-2"></i><a href="#"
                                            class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                                    <h5 class="text-primary text-nowrap me-2">$600 <span
                                            class="fs-14 fw-normal text-default">/ day</span></h5>

                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <a href="{{url('cruise-details')}}">
                                    <img src="{{URL::asset('build/img/cruise/cruise-09.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <a href="#" class="d-flex align-items-center overflow-hidden me-2">
                                        <span class="avatar avatar-md flex-shrink-0 me-2">
                                            <img src="{{URL::asset('build/img/users/user-10.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14 text-truncate ">Robert Cogswell</p>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.5</span>
                                        <p class="fs-14 text-truncate">(320)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('cruise-details')}}">Coral Cruiser</a></h5>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-location5 me-2"></i>Princes Street, Edinburgh</p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-1"><i class="isax isax-calendar-2 text-gray-6 me-1"></i>Year :
                                            <span class="text-dark fw-medium">2021</span></p>
                                        <p><i class="isax isax-user me-1"></i>Guests : <span
                                                class="text-dark fw-medium">4</span></p>
                                    </div>
                                    <div>
                                        <p class="mb-1"><i class="isax isax-fatrows text-gray-6 me-1"></i>Width : <span
                                                class="text-dark fw-medium">88.47 m</span></p>
                                        <p><i class="isax isax-flash-1 me-1"></i>Speed : <span
                                                class="text-dark fw-medium">19 Knots</span></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="d-flex align-items-center"><i
                                            class="isax isax-home-wifi ms-2 me-2"></i><i
                                            class="isax isax-scissor me-2"></i><i
                                            class="isax isax-profile-2user me-2"></i><i
                                            class="isax isax-wind-2 me-2"></i><a href="#"
                                            class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                                    <h5 class="text-primary text-nowrap me-2">$500 <span
                                            class="fs-14 fw-normal text-default">/ day</span></h5>

                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <a href="{{url('cruise-details')}}">
                                    <img src="{{URL::asset('build/img/cruise/cruise-10.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <a href="#" class="d-flex align-items-center overflow-hidden me-2">
                                        <span class="avatar avatar-md flex-shrink-0 me-2">
                                            <img src="{{URL::asset('build/img/users/user-11.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14 text-truncate ">Kenneth Palmer</p>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.3</span>
                                        <p class="fs-14 text-truncate">(380)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('cruise-details')}}">Harbor Haven</a></h5>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-location5 me-2"></i>Princes Street, Edinburgh</p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-1"><i class="isax isax-calendar-2 text-gray-6 me-1"></i>Year :
                                            <span class="text-dark fw-medium">2016</span></p>
                                        <p><i class="isax isax-user me-1"></i>Guests : <span
                                                class="text-dark fw-medium">6</span></p>
                                    </div>
                                    <div>
                                        <p class="mb-1"><i class="isax isax-fatrows text-gray-6 me-1"></i>Width : <span
                                                class="text-dark fw-medium">98.15 m</span></p>
                                        <p><i class="isax isax-flash-1 me-1"></i>Speed : <span
                                                class="text-dark fw-medium">14 Knots</span></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="d-flex align-items-center"><i
                                            class="isax isax-home-wifi ms-2 me-2"></i><i
                                            class="isax isax-scissor me-2"></i><i
                                            class="isax isax-profile-2user me-2"></i><i
                                            class="isax isax-wind-2 me-2"></i><a href="#"
                                            class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                                    <h5 class="text-primary text-nowrap me-2">$300 <span
                                            class="fs-14 fw-normal text-default">/ day</span></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('cruise-details')}}">
                                            <img src="{{URL::asset('build/img/cruise/cruise-01.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('cruise-details')}}">
                                            <img src="{{URL::asset('build/img/cruise/cruise-07.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('cruise-details')}}">
                                            <img src="{{URL::asset('build/img/cruise/cruise-05.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <a href="#" class="d-flex align-items-center overflow-hidden me-2">
                                        <span class="avatar avatar-md flex-shrink-0 me-2">
                                            <img src="{{URL::asset('build/img/users/user-12.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                        <p class="fs-14 text-truncate ">Timothy Brewer</p>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">4.1</span>
                                        <p class="fs-14 text-truncate">(300)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('cruise-details')}}">Albert Yacht</a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Kingâ€™s
                                    Road, Chelsea</p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-1"><i class="isax isax-calendar-2 text-gray-6 me-1"></i>Year :
                                            <span class="text-dark fw-medium">2018</span></p>
                                        <p><i class="isax isax-user me-1"></i>Guests : <span
                                                class="text-dark fw-medium">3</span></p>
                                    </div>
                                    <div>
                                        <p class="mb-1"><i class="isax isax-fatrows text-gray-6 me-1"></i>Width : <span
                                                class="text-dark fw-medium">90.25 m</span></p>
                                        <p><i class="isax isax-flash-1 me-1"></i>Speed : <span
                                                class="text-dark fw-medium">25 Knots</span></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <h6 class="d-flex align-items-center"><i
                                            class="isax isax-home-wifi ms-2 me-2"></i><i
                                            class="isax isax-scissor me-2"></i><i
                                            class="isax isax-profile-2user me-2"></i><i
                                            class="isax isax-wind-2 me-2"></i><a href="#"
                                            class="fs-14 fw-normal text-default d-inline-block">+2</a></h6>
                                    <h5 class="text-primary text-nowrap me-2">$550 <span
                                            class="fs-14 fw-normal text-default">/ day</span></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                    </div>

                </div>
                <!-- /Cruise List -->

                <!-- Tour List -->
                <div class="tab-pane fade" id="Tour-list">
                    <div class="owl-carousel place-slider nav-center">

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-07.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-08.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-09.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon selected">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="me-1"><i class="ti ti-receipt text-primary"></i></span>
                                        <p class="fs-14 text-gray-9">Ecotourism</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">5.0</span>
                                        <p class="fs-14">(105 Reviews)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('tour-details')}}">Rainbow Mountain Valley</a>
                                </h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Ciutat
                                    Vella, Barcelona</p>
                                <div class="mb-3">
                                    <h6 class="d-flex align-items-center text-gray-6 fs-14 fw-normal">Starts From <span
                                            class="ms-1 fs-18 fw-semibold text-primary">$500</span><span
                                            class="ms-1 fs-18 fw-semibold text-gray-3 text-decoration-line-through">$789</span>
                                    </h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <span class="me-1"><i class="isax isax-calendar-tick text-gray-6"></i></span>
                                        <p class="fs-14 text-gray-9">4 Day,3 Night</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="ms-2 d-flex align-items-center">
                                        <p class="fs-14 text-gray-9 mb-0 text-truncate d-flex align-items-center">
                                            <i class="isax isax-profile-2user me-1"></i>14 Guests
                                        </p>
                                        <a href="#" class="avatar avatar-sm ms-3">
                                            <img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-08.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-09.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-10.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="me-1"><i class="ti ti-receipt text-primary"></i></span>
                                        <p class="fs-14 text-gray-9 text-truncate">Adventure Tour</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">4.7</span>
                                        <p class="fs-14">(110 Reviews)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('tour-details')}}">Mystic Falls</a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Oxford
                                    Street, London</p>
                                <div class="mb-3">
                                    <h6 class="d-flex align-items-center text-gray-6 fs-14 fw-normal">Starts From <span
                                            class="ms-1 fs-18 fw-semibold text-primary">$600</span><span
                                            class="ms-1 fs-18 fw-semibold text-gray-3 text-decoration-line-through">$700</span>
                                    </h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <span class="me-1"><i class="isax isax-calendar-tick text-gray-6"></i></span>
                                        <p class="fs-14 text-gray-9">3 Day, 2 Night</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="ms-2 d-flex align-items-center">
                                        <p class="fs-14 text-gray-9 mb-0 text-truncate d-flex align-items-center">
                                            <i class="isax isax-profile-2user me-1"></i>12 Guests
                                        </p>
                                        <a href="#" class="avatar avatar-sm ms-3">
                                            <img src="{{URL::asset('build/img/users/user-09.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-09.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-10.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-11.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="me-1"><i class="ti ti-receipt text-primary"></i></span>
                                        <p class="fs-14 text-gray-9 text-truncate">Summer Trip</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">4.7</span>
                                        <p class="fs-14">(180 Reviews)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('tour-details')}}">Crystal Lake</a></h5>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-location5 me-2"></i>Princes Street, Edinburgh</p>
                                <div class="mb-3">
                                    <h6 class="d-flex align-items-center text-gray-6 fs-14 fw-normal">Starts From <span
                                            class="ms-1 fs-18 fw-semibold text-primary">$300</span><span
                                            class="ms-1 fs-18 fw-semibold text-gray-3 text-decoration-line-through">$500</span>
                                    </h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <span class="me-1"><i class="isax isax-calendar-tick text-gray-6"></i></span>
                                        <p class="fs-14 text-gray-9">5 Day, 4 Night</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="ms-2 d-flex align-items-center">
                                        <p class="fs-14 text-gray-9 mb-0 text-truncate d-flex align-items-center">
                                            <i class="isax isax-profile-2user me-1"></i>16 Guests
                                        </p>
                                        <a href="#" class="avatar avatar-sm ms-3">
                                            <img src="{{URL::asset('build/img/users/user-10.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-10.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-11.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-12.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="me-1"><i class="ti ti-receipt text-primary"></i></span>
                                        <p class="fs-14 text-gray-9 text-truncate">Adventure Tour</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">4.9</span>
                                        <p class="fs-14">(300 Reviews)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('tour-details')}}">Majestic Peaks</a></h5>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-location5 me-2"></i>Deansgate, Manchester</p>
                                <div class="mb-3">
                                    <h6 class="d-flex align-items-center text-gray-6 fs-14 fw-normal">Starts From <span
                                            class="ms-1 fs-18 fw-semibold text-primary">$400</span><span
                                            class="ms-1 fs-18 fw-semibold text-gray-3 text-decoration-line-through">$480</span>
                                    </h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <span class="me-1"><i class="isax isax-calendar-tick text-gray-6"></i></span>
                                        <p class="fs-14 text-gray-9">3 Day, 2 Night</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="ms-2 d-flex align-items-center">
                                        <p class="fs-14 text-gray-9 mb-0 text-truncate d-flex align-items-center">
                                            <i class="isax isax-profile-2user me-1"></i>10 Guests
                                        </p>
                                        <a href="#" class="avatar avatar-sm ms-3">
                                            <img src="{{URL::asset('build/img/users/user-11.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                        <!-- Place Item-->
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-11.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-12.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                    <div class="slide-images">
                                        <a href="{{url('tour-details')}}">
                                            <img src="{{URL::asset('build/img/tours/tours-13.jpg')}}" class="img-fluid" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="fav-item">
                                    <a href="#" class="fav-icon">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    <span class="badge bg-info d-inline-flex align-items-center"><i
                                            class="isax isax-ranking me-1"></i>Trending</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="me-1"><i class="ti ti-receipt text-primary"></i></span>
                                        <p class="fs-14 text-gray-9 text-truncate">Group Tours</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">4.3</span>
                                        <p class="fs-14">(250 Reviews)</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{url('tour-details')}}">Enchanted Forest</a></h5>
                                <p class="d-flex align-items-center mb-3"><i class="isax isax-location5 me-2"></i>Kingâ€™s
                                    Road, Chelsea</p>
                                <div class="mb-3">
                                    <h6 class="d-flex align-items-center text-gray-6 fs-14 fw-normal">Starts From <span
                                            class="ms-1 fs-18 fw-semibold text-primary">$550</span><span
                                            class="ms-1 fs-18 fw-semibold text-gray-3 text-decoration-line-through">$600</span>
                                    </h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex flex-wrap align-items-center me-2">
                                        <span class="me-1"><i class="isax isax-calendar-tick text-gray-6"></i></span>
                                        <p class="fs-14 text-gray-9">2 Day, 1 Night</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits">
                                        <span
                                            class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="ms-2 d-flex align-items-center">
                                        <p class="fs-14 text-gray-9 mb-0 text-truncate d-flex align-items-center">
                                            <i class="isax isax-profile-2user me-1"></i>17 Guests
                                        </p>
                                        <a href="#" class="avatar avatar-sm ms-3">
                                            <img src="{{URL::asset('build/img/users/user-12.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Place Item-->

                    </div>

                </div>
                <!-- /Tour List -->

                <!-- Bus List -->
                <div class="tab-pane fade" id="Bus-list">
                    <div class="owl-carousel place-slider nav-center">

                        <!-- 1. Red Bird Luxury -->
                        <div class="place-item mb-4 flex-fill bus-grid">
                            <div class="place-img">
                                <a href="{{url('bus-details')}}">
                                    <img src="{{URL::asset('build/img/bus/grid/bus-grid-img-1.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2 selected">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">5.0</span>
                                </div>
                            </div>

                            <div class="place-content">
                                <h5 class="text-truncate mb-1"><a href="{{url('bus-details')}}">Red Bird Luxury</a></h5>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="avatar avatar-sm me-2">
                                        <img src="{{URL::asset('build/img/bus/bus-logo-01.svg')}}" class="rounded-circle" alt="icon">
                                    </span>
                                    <p class="fs-14 mb-0 me-2">Tata</p>
                                    <p class="fs-14 mb-0">
                                        <i class="ti ti-point-filled text-primary me-2"></i>Seater
                                    </p>
                                </div>

                                <div class="date-info p-2 mb-3">
                                    <div class="bus-title d-flex align-items-center justify-content-between gap-2">
                                        <div class="bus-title-item">
                                            <h5 class="text-truncate mb-1 fs-14 fw-semibold">Chicago</h5>
                                            <p class="fs-14 text-default mt-1">09:30 AM</p>
                                        </div>
                                        <div class="dot-line"><span><small class="text-muted">10h 40m</small></span>
                                        </div>
                                        <div class="bus-title-item">
                                            <h5 class="text-truncate mb-1 fs-14 fw-semibold">Miami</h5>
                                            <p class="fs-14 text-default mt-1">10:40 PM</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="avatar avatar-sm rounded-circle"
                                            alt="img">
                                        <span class="badge bg-outline-success fs-10 fw-medium ms-2">20 Seats Left</span>
                                    </div>
                                    <h6 class="text-primary"><span class="fs-14 text-default">From </span>$280</h6>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Elite Ride -->
                        <div class="place-item mb-4 flex-fill bus-grid">
                            <div class="place-img">
                                <a href="{{url('bus-details')}}">
                                    <img src="{{URL::asset('build/img/bus/grid/bus-grid-img-2.jpg')}}" class="img-fluid" alt="img">
                                </a>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">4.0</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <h5 class="text-truncate mb-1"><a href="{{url('bus-details')}}">Elite Ride</a></h5>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="avatar avatar-sm me-2"><img
                                            src="{{URL::asset('build/img/bus/bus-logo-02.svg')}}"></span>
                                    <p class="fs-14 mb-0 me-2">Ashok Leyland</p>
                                    <p class="fs-14 mb-0"><i class="ti ti-point-filled text-primary me-2"></i>AC Sleeper
                                    </p>
                                </div>
                                <div class="date-info p-2 mb-3">
                                    <div class="bus-title d-flex justify-content-between align-items-center">
                                        <div class="bus-title-item">
                                            <h5 class="fs-14 mb-1">Toronto</h5>
                                            <p class="fs-14 text-default">02:25 PM</p>
                                        </div>
                                        <div class="dot-line"><span><small class="text-muted">14h 10m</small></span>
                                        </div>
                                        <div class="bus-title-item">
                                            <h5 class="fs-14 mb-1">Bangkok</h5>
                                            <p class="fs-14 text-default">04:15 PM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{URL::asset('build/img/users/user-09.jpg')}}" class="avatar avatar-sm rounded-circle">
                                        <span class="badge bg-outline-success fs-10 fw-medium ms-2">12 Seats Left</span>
                                    </div>
                                    <h6 class="text-primary"><span class="fs-14 text-default">From </span>$300</h6>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Urban Glide -->
                        <div class="place-item mb-4 flex-fill bus-grid">
                            <div class="place-img">
                                <a href="{{url('bus-details')}}">
                                    <img src="{{URL::asset('build/img/bus/grid/bus-grid-img-3.jpg')}}" class="img-fluid">
                                </a>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2 selected">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">5.0</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <h5 class="mb-1"><a href="{{url('bus-details')}}">Urban Glide</a></h5>
                                <div class="d-flex mb-3">
                                    <span class="avatar avatar-sm me-2"><img
                                            src="{{URL::asset('build/img/bus/bus-logo-03.svg')}}"></span>
                                    <p class="fs-14 me-2 mb-0">Volvo</p>
                                    <p class="fs-14"><i class="ti ti-point-filled text-primary me-2"></i>Sleeper</p>
                                </div>

                                <div class="date-info p-2 mb-3">
                                    <div class="bus-title d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="fs-14 mb-1">Dallas</h5>
                                            <p class="fs-14 text-default">04:45 PM</p>
                                        </div>
                                        <div class="dot-line"><span><small class="text-muted">19h 10m</small></span>
                                        </div>
                                        <div>
                                            <h5 class="fs-14 mb-1">Atlanta</h5>
                                            <p class="fs-14 text-default">08:15 AM</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{URL::asset('build/img/users/user-10.jpg')}}" class="avatar avatar-sm rounded-circle">
                                        <span class="badge bg-outline-success fs-10 fw-medium ms-2">11 Seats Left</span>
                                    </div>
                                    <h6 class="text-primary"><span class="fs-14 text-default">From </span>$400</h6>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Route Max -->
                        <div class="place-item mb-4 flex-fill bus-grid">
                            <div class="place-img">
                                <a href="{{url('bus-details')}}">
                                    <img src="{{URL::asset('build/img/bus/grid/bus-grid-img-4.jpg')}}" class="img-fluid">
                                </a>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">4.0</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <h5 class="mb-1"><a href="{{url('bus-details')}}">Route Max</a></h5>
                                <div class="d-flex mb-3">
                                    <span class="avatar avatar-sm me-2"><img
                                            src="{{URL::asset('build/img/bus/bus-logo-01.svg')}}"></span>
                                    <p class="fs-14 me-2 mb-0">Tata</p>
                                    <p class="fs-14 mb-0"><i class="ti ti-point-filled text-primary me-2"></i>Seater</p>
                                </div>
                                <div class="date-info p-2 mb-3">
                                    <div class="bus-title d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="fs-14 mb-1">New York</h5>
                                            <p class="fs-14">07:00 AM</p>
                                        </div>
                                        <div class="dot-line"><span><small class="text-muted">11h 10m</small></span>
                                        </div>
                                        <div>
                                            <h5 class="fs-14 mb-1">Boston</h5>
                                            <p class="fs-14">08:25 PM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{URL::asset('build/img/users/user-11.jpg')}}" class="avatar avatar-sm rounded-circle">
                                        <span class="badge bg-outline-success fs-10 fw-medium ms-2">20 Seats Left</span>
                                    </div>
                                    <h6 class="text-primary"><span>From </span>$280</h6>
                                </div>
                            </div>
                        </div>

                        <!-- 5. Trail Star -->
                        <div class="place-item mb-4 flex-fill bus-grid">
                            <div class="place-img">
                                <a href="{{url('bus-details')}}">
                                    <img src="{{URL::asset('build/img/bus/grid/bus-grid-img-5.jpg')}}" class="img-fluid">
                                </a>
                                <div class="fav-item">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="fav-icon me-2">
                                            <i class="isax isax-heart5"></i>
                                        </a>
                                        <span class="badge bg-indigo">Cheapest</span>
                                    </div>
                                    <span
                                        class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">5.0</span>
                                </div>
                            </div>
                            <div class="place-content">
                                <h5 class="mb-1"><a href="{{url('bus-details')}}">Trail Star</a></h5>
                                <div class="d-flex mb-3">
                                    <span class="avatar avatar-sm me-2"><img
                                            src="{{URL::asset('build/img/bus/bus-logo-01.svg')}}"></span>
                                    <p class="fs-14 me-2 mb-0">Tata</p>
                                    <p class="fs-14 mb-0"><i class="ti ti-point-filled text-primary me-2"></i>AC Sleeper
                                    </p>
                                </div>
                                <div class="date-info p-2 mb-3">
                                    <div class="bus-title d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="mb-1 fs-14">Seattle</h5>
                                            <p>06:00 PM</p>
                                        </div>
                                        <div class="dot-line"><span><small>13h 20m</small></span></div>
                                        <div>
                                            <h5 class="mb-1 fs-14">Denver</h5>
                                            <p>07:20 AM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                    <div class="d-flex align-items-center">
                                        <img src="{{URL::asset('build/img/users/user-12.jpg')}}" class="avatar avatar-sm rounded-circle">
                                        <span class="badge bg-outline-success fs-10 fw-medium ms-2">14 Seats Left</span>
                                    </div>
                                    <h6 class="text-primary"><span>From </span>$510</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /BUs List -->

            </div>
            <div class="text-center view-all wow fadeInUp">
                <a href="{{url('hotel-grid')}}" class="btn btn-dark d-inline-flex align-items-center">View All Places<i
                        class="isax isax-arrow-right-3 ms-2"></i></a>
            </div>
        </div>
    </section>
    <!-- /Place Section -->

    <!-- Benefit Section -->
    <section class="section benefit-section bg-light-300">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="section-header text-center">
                        <h2 class="mb-2">Our <span class="text-primary  text-decoration-underline">Benefits</span> & Key
                            Advantages</h2>
                        <p class="sub-title">DreamsTour, a tour operator specializing in dream destinations, offers a
                            variety of benefits for travelers.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3 d-flex">
                    <div class="card benefit-card mb-0 flex-fill wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-body text-center">
                            <div class="benefit-icon mb-2 bg-secondary text-gray-9 mx-auto">
                                <i class="isax isax-lock-1"></i>
                            </div>
                            <h5 class="mb-2">VIP Packages</h5>
                            <p class="mb-0">Include premium seating, meet-and-greet experiences, backstage tours.</p>
                            <span class="icon-view text-secondary"><i class="isax isax-lock-1"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 d-flex">
                    <div class="card benefit-card mb-0 flex-fill wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-body text-center">
                            <div class="benefit-icon mb-2 bg-orange text-white mx-auto">
                                <i class="isax isax-magicpen"></i>
                            </div>
                            <h5 class="mb-2">Concert Tickets</h5>
                            <p class="mb-0">A centralized place to buy tickets for various dates of the tour</p>
                            <span class="icon-view text-orange"><i class="isax isax-magicpen"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 d-flex">
                    <div class="card benefit-card mb-0 flex-fill wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-body text-center">
                            <div class="benefit-icon mb-2 bg-purple text-white mx-auto">
                                <i class="isax isax-receipt-add"></i>
                            </div>
                            <h5 class="mb-2">Travel Packages</h5>
                            <p class="mb-0">Bundles that include concert tickets, accommodations</p>
                            <span class="icon-view text-purple"><i class="isax isax-receipt-add"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 d-flex">
                    <div class="card benefit-card mb-0 flex-fill wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-body text-center">
                            <div class="benefit-icon mb-2 bg-teal text-white mx-auto">
                                <i class="isax isax-location-tick"></i>
                            </div>
                            <h5 class="mb-2">Best Price Guarantee</h5>
                            <p class="mb-0">Such as private rehearsals, soundcheck access,</p>
                            <span class="icon-view text-teal"><i class="isax isax-location-tick"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Benefit Section -->


    <!-- Client Section -->
    {{-- <section class="section client-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h6 class="fs-16 fw-medium mb-4">Trusted By 40+ Clients Around the Globe</h6>
                </div>
            </div>
            <div class="owl-carousel client-slider">
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
    </section> --}}
    <!-- /Client Section -->
@endsection
