<?php $page="profile-settings";?>
@extends('layout.mainlayout')
@section('content')

    <style>
        .profile-phone-field .input-group-text {
            gap: 6px;
            background-color: var(--bs-tertiary-bg, #f8f9fa);
        }
        .profile-phone-field .input-group-text .iti__flag {
            transform: scale(1.15);
        }
        #profile_photo_preview {
            width: 120px !important;
            height: 120px !important;
            min-width: 120px;
            min-height: 120px;
            object-fit: cover;
            display: block;
            background-color: #e9ecef;
        }
    </style>

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-04 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Settings</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{url('index')}}"><i class="isax isax-grid-55"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Wrapper -->
    <div class="content">
        <div class="container">

            <div class="row">

                <!-- Sidebar -->
                <div class="col-xl-3 col-lg-4 theiaStickySidebar">
                    <div class="card user-sidebar mb-4 mb-lg-0">
                        <div class="card-header user-sidebar-header">
                            <div class="profile-content rounded-pill">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class=" d-flex align-items-center justify-content-center">
                                        <img src="{{ $user->profile_photo_url }}" alt="image"
                                            class="img-fluid avatar avatar-lg rounded-circle flex-shrink-0 me-1 js-profile-photo-preview">
                                        <div>
                                            <h6 class="fs-16">{{ $user->name }}</h6>
                                            <span class="fs-14 text-gray-6">Since {{ $user->created_at?->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{url('profile-settings')}}"
                                                class="p-1 rounded-circle btn btn-light d-flex align-items-center justify-content-center"><i
                                                    class="isax isax-edit-2 fs-14"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body user-sidebar-body">
                            <ul>
                                <li>
                                    <span class="fs-14 text-gray-3 fw-medium mb-2">Main</span>
                                </li>
                                <li>
                                    <a href="{{url('dashboard')}}" class="d-flex align-items-center">
                                        <i class="isax isax-grid-55"></i> Dashboard
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="#" class="d-block"><i class="isax isax-calendar-tick5"></i><span>My
                                            Bookings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li>
                                            <a href="{{url('customer-flight-booking')}}"
                                                class="fs-14 d-inline-flex align-items-center">Flights</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-hotel-booking')}}"
                                                class="fs-14 d-inline-flex align-items-center">Hotels</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-car-booking')}}"
                                                class="fs-14 d-inline-flex align-items-center">Cars</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-cruise-booking')}}"
                                                class="fs-14 d-inline-flex align-items-center">Cruise</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-tour-booking')}}"
                                                class="fs-14 d-inline-flex align-items-center">Tour</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-tour-guides')}}"
                                                class="fs-14 d-inline-flex align-items-center">Tour Guides</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-bus-booking')}}"
                                                class="fs-14 d-inline-flex align-items-center">Bus</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-visa-booking')}}"
                                                class="fs-14 d-inline-flex align-items-center">Visa</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-activities-booking')}}"
                                                class="fs-14 d-inline-flex align-items-center">Activities</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('review')}}" class="d-flex align-items-center">
                                        <i class="isax isax-magic-star5"></i> My Reviews
                                    </a>
                                </li>
                                <li>
                                    <div class="message-content">
                                        <a href="{{url('chat')}}" class="d-flex align-items-center">
                                            <i class="isax isax-message-square5"></i> Messages
                                        </a>
                                        <span class="msg-count rounded-circle">02</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <a href="{{url('wishlist')}}" class="d-flex align-items-center">
                                        <i class="isax isax-heart5"></i> Wishlist
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="#" class="d-block"><i class="isax isax-discount-shape5"></i><span>Offers &
                                            Rewards</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li>
                                            <a href="{{url('customer-coupons')}}"
                                                class="fs-14 d-inline-flex align-items-center">Coupons</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-loyalty-points')}}"
                                                class="fs-14 d-inline-flex align-items-center">Loyalty Points</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-reward-history')}}"
                                                class="fs-14 d-inline-flex align-items-center">Rewards History</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-referral-program')}}"
                                                class="fs-14 d-inline-flex align-items-center">Referral Program</a>
                                        </li>
                                        <li>
                                            <a href="{{url('customer-gift-cards')}}"
                                                class="fs-14 d-inline-flex align-items-center">Gift Cards</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="fs-14 text-gray-3 fw-medium mb-2">Finance</span>
                                </li>
                                <li>
                                    <a href="{{url('wallet')}}" class="d-flex align-items-center">
                                        <i class="isax isax-wallet-add-15"></i> Wallet
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{url('payment')}}" class="d-flex align-items-center">
                                        <i class="isax isax-money-recive5"></i> Payments
                                    </a>
                                </li>
                                <li>
                                    <span class="fs-14 text-gray-3 fw-medium mb-2">Account</span>
                                </li>
                                <li>
                                    <a href="{{url('my-profile')}}" class="d-flex align-items-center">
                                        <i class="isax isax-profile-tick5"></i> My Profile
                                    </a>
                                </li>
                                <li>
                                    <div class="message-content">
                                        <a href="{{url('notification')}}" class="d-flex align-items-center">
                                            <i class="isax isax-notification-bing5"></i> Notifications
                                        </a>
                                        <span class="msg-count bg-purple rounded-circle">05</span>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{url('profile-settings')}}" class="d-flex align-items-center active">
                                        <i class="isax isax-setting-25"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('index')}}" class="d-flex align-items-center pb-0">
                                        <i class="isax isax-logout-15"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar -->

                <!-- Profile Settings -->
                <div class="col-xl-9 col-lg-8">
                    <form id="profile_settings_form" action="{{ route('profile-settings.update') }}" method="POST"
                        data-states-url="{{ route('locations.states') }}"
                        data-cities-url="{{ route('locations.cities') }}"
                        data-countries-search-url="{{ route('locations.countries.search') }}"
                        data-initial-country-id="{{ $user->userAddress?->country_id ?? '' }}"
                        data-initial-state-id="{{ $user->userAddress?->state_id ?? '' }}"
                        data-initial-city-id="{{ $user->userAddress?->city_id ?? '' }}"
                        data-default-photo="{{ asset('build/img/users/user-01.jpg') }}">
                        @csrf
                        @method('PUT')
                    <div class="card settings mb-0">
                        <div class="card-header">
                            <h6>Settings</h6>
                        </div>
                        <div class="card-body pb-3">
                            <div class="settings-link d-flex align-items-center flex-wrap">
                                <a href="{{url('profile-settings')}}" class="active ps-3"><i
                                        class="isax isax-user-octagon me-2"></i>Profile Settings</a>
                                <a href="{{url('security-settings')}}"><i class="isax isax-shield-tick me-2"></i>Security</a>
                                <a href="{{url('notification-settings')}}"><i
                                        class="isax isax-notification me-2"></i>Notifications</a>
                                <a href="{{url('integration-settings')}}" class="pe-3"><i
                                        class="isax isax-hierarchy me-2"></i>Integrations</a>
                            </div>

                            <!-- Settings Content -->
                            <div class="settings-content mb-3">
                                <h6 class="fs-16 mb-3">Basic Information</h6>
                                <div class="row gy-2">
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $user->profile_photo_url }}" alt="Profile photo"
                                                id="profile_photo_preview"
                                                class="img-fluid avatar avatar-xxl br-10 flex-shrink-0 me-3 js-profile-photo-preview">
                                            <div>
                                                <p class="fs-14 text-gray-6 fw-normal mb-2">Image will be cropped to
                                                    300 x 300 pixels. You can adjust the crop after upload.</p>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <label class="upload-btn" for="profile_image_picker">Upload</label>
                                                        <input type="file" id="profile_image_picker" accept="image/jpeg,image/jpg,image/png,image/webp" style="display: none;">
                                                        <input type="file" name="profile_image" id="profile_image_input" class="d-none">
                                                        <input type="hidden" name="remove_profile_image" id="remove_profile_image" value="0">
                                                    </div>
                                                    <button type="button" class="btn btn-light btn-md" id="profile_image_remove_btn">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="profile-phone-field">
                                            <label class="form-label">Phone</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <span class="iti__flag iti__in" aria-hidden="true"></span>
                                                    <span>+91</span>
                                                </span>
                                                <input type="tel"
                                                    id="profile_phone"
                                                    name="phone"
                                                    value="{{ old('phone', $user->phone) }}"
                                                    class="form-control"
                                                    maxlength="10"
                                                    inputmode="numeric"
                                                    placeholder="10-digit mobile number"
                                                    autocomplete="tel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('pages.profile.partials.address-form-fields', ['user' => $user])
                            <!-- /Settings Content-->

                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="{{ route('my-profile') }}" class="btn btn-light me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- /Profile Settings -->

            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- ========================
        End Page Content
    ========================= -->

    <!-- Profile Photo Crop Modal -->
    <div class="modal fade" id="profile_crop_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop profile photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="profile-crop-stage">
                        <canvas id="profile_crop_canvas" aria-label="Crop profile photo"></canvas>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="profile_crop_apply_btn">Crop &amp; Apply</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Profile Photo Crop Modal -->

@endsection

@section('script')
    @vite(['resources/js/profile/settings.js'])
@endsection
