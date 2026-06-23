    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('build/img/apple-touch-icon.png')}}">

    <!-- Favicon -->
    <link rel="icon" href="{{URL::asset('assets/img/favicon.icon')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{URL::asset('assets/img/favicon.ico')}}" type="image/x-icon">

@if (!Route::is(['index-rtl']))
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{URL::asset('build/css/bootstrap.min.css')}}">
@endif

@if (Route::is(['index-rtl']))
	<!-- Bootstrap RTL CSS -->
	<link rel="stylesheet" href="{{URL::asset('build/css/bootstrap.rtl.min.css')}}">
@endif

@if (!Route::is(['login','register','forgot-password','change-password','error-404','error-500','under-maintenance','coming-soon','index-rtl']))
    <!-- Theme Settings Js -->
    <script src="{{URL::asset('build/js/theme-script.js')}}"></script>
@endif

@if (!Route::is(['login','register','forgot-password','change-password','error-404','error-500','under-maintenance','coming-soon','index-rtl']))
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/animate.css')}}">
@endif

    <!-- Main.css -->
    <link rel="stylesheet" href="{{URL::asset('build/css/meanmenu.css')}}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/tabler-icons/tabler-icons.css')}}">

    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('build/plugins/fontawesome/css/all.min.css')}}">

@if (Route::is(['activity-details', 'bus-details', 'car-details', 'cruise-details', 'destination-details', 'flight-details', 'home', 'index-2', 'index-4', 'index-9', 'index-10', 'index-11', 'index-12', 'index', '/', 'tour-details']))
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/slick/slick.css')}}">
@endif

@if (Route::is(['activity-details', 'agent-account-settings', 'agent-activities-booking', 'agent-bus-booking', 'agent-business-details', 'agent-cancellation-requests', 'agent-car-booking', 'agent-chat', 'agent-commission-summary', 'agent-cruise-booking', 'agent-dashboard', 'agent-listings', 'agent-notifications', 'agent-payment-history', 'agent-pending-payouts', 'agent-plans-settings', 'agent-plans', 'agent-security-settings', 'agent-settings-notifications', 'agent-settings', 'agent-tour-guide', 'agent-visa-booking', 'bus-details', 'car-details', 'chat', 'cruise-details', 'customer-activities-booking', 'customer-bus-booking', 'customer-car-booking', 'customer-coupons', 'customer-cruise-booking', 'customer-flight-booking', 'customer-gift-cards', 'customer-hotel-booking', 'customer-loyalty-points', 'customer-referral-program', 'customer-reward-history', 'customer-tour-booking', 'customer-tour-guides', 'customer-visa-booking', 'dashboard', 'destination-details', 'faq', 'flight-details', 'gallery', 'guide-details', 'hotel-details', 'index-2', 'index-3', 'index-4', 'index-5', 'index-6', 'index-7', 'index-8', 'index-10', 'index-11', 'index-12', 'index-rtl', 'index', '/', 'integration-settings', 'my-profile', 'notification-settings', 'notification', 'preferences-sttings', 'pricing-plan-2', 'pricing-plan', 'profile-settings', 'recently-viewed', 'security-settings', 'support-fixes', 'testimonial', 'tour-details', 'visa-details', 'wallet', 'wishlist']))
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/fancybox/jquery.fancybox.min.css')}}">
@endif

@if (!Route::is(['login', 'register', 'forgot-password', 'change-password', 'error-404', 'error-500', 'coming-soon', 'under-maintenance', 'lock-screen']))
    <!-- Owlcarousel CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/owlcarousel/owl.carousel.min.css')}}">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/bootstrap-datetimepicker.min.css')}}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/select2/css/select2.min.css')}}">
@endif

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/iconsax.css')}}">

@if (Route::is(['about-us', 'activity-booking-confirmation', 'activity-booking', 'activity-grid', 'activity-list', 'activity-map', 'become-an-expert', 'blog-details', 'blog-grid', 'blog-list', 'booking-confirmation', 'bus-booking-confirmation', 'bus-booking', 'bus-left-sidebar', 'bus-list', 'bus-right-sidebar', 'bus-seat-selection', 'car-booking-information', 'card-booking', 'car-grid', 'car-list', 'car-map', 'contact-us', 'cruise-booking-confirmation', 'cruise-booking', 'cruise-grid', 'cruise-list', 'cruise-map', 'error-404', 'error-500', 'faq', 'flight-booking-confirmation', 'flight-booking', 'flight-grid', 'flight-list', 'flight-map', 'gallery', 'guide-booking-confirmation', 'guide-booking', 'guide-details', 'guide-grid', 'hotel-booking', 'hotel-grid', 'hotel-list', 'hotel-map', 'invoices', 'pricing-plan-2', 'pricing-plan', 'privacy-policy', 'terms-conditions', 'testimonial', 'tour-booking-confirmation', 'tour-booking', 'tour-grid', 'tour-list', 'tour-map', 'visa-booking-details', 'visa-details', 'visa-grid', 'visa-list', 'visa-requirements', 'visa-tracking']))
    <!-- Rangeslider CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{URL::asset('build/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
@endif

@if (Route::is(['add-activity', 'add-bus', 'add-car', 'add-cruise', 'add-flight', 'add-guide', 'add-hotel', 'add-tour', 'add-visa', 'agent-enquiry-details', 'edit-bus', 'edit-car', 'edit-cruise', 'edit-flight', 'edit-hotel', 'edit-tour']))
    <!-- Quill css -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/quill/quill.core.css')}}">
    <link rel="stylesheet" href="{{URL::asset('build/plugins/quill/quill.snow.css')}}">
@endif

@if (Route::is(['agent-account-settings', 'agent-plans-settings', 'agent-plans', 'agent-security-settings', 'profile-settings', 'security-settings']))
    <!-- Mobile CSS-->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/intltelinput/css/intlTelInput.css')}}">
@endif

@if (Route::is(['agent-account-settings', 'agent-activities-booking', 'agent-bus-booking', 'agent-business-details', 'agent-cancellation-requests', 'agent-car-booking', 'agent-commission-summary', 'agent-cruise-booking', 'agent-earnings', 'agent-enquirers', 'agent-flight-booking', 'agent-hotel-booking', 'agent-payment-history', 'agent-pending-payouts', 'agent-plans-settings', 'agent-plans', 'agent-review', 'agent-security-settings', 'agent-settings-notifications', 'agent-settings', 'agent-tour-booking', 'agent-tour-guide', 'agent-visa-booking', 'customer-activities-booking', 'customer-bus-booking', 'customer-car-booking', 'customer-coupons', 'customer-cruise-booking', 'customer-flight-booking', 'customer-gift-cards', 'customer-hotel-booking', 'customer-loyalty-points', 'customer-referral-program', 'customer-reward-history', 'customer-tour-booking', 'customer-tour-guides', 'customer-visa-booking', 'destination', 'flight-grid', 'home', 'index-2', 'index-3', 'index-4', 'index-5', 'index-6', 'index-7', 'index-8', 'index-10', 'index-11', 'index-12', 'index-rtl', 'index', '/', 'integration-settings', 'notification-settings', 'payment', 'preferences-settings', 'profile-settings', 'review', 'security-settings', 'support-fixes', 'tour-list', 'wallet', 'wishlist']))
    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/daterangepicker/daterangepicker.css')}}">
@endif

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/style.css')}}">

    <style>
        .dropdown-menu:not(.show):not(.bootstrap-datetimepicker-widget) {
            display: none !important;
        }
        .banner-form .tab-content > .tab-pane:not(.active) {
            display: none !important;
        }
        body > .daterangepicker:not(.show-calendar) {
            display: none !important;
        }
        .banner-form .banner-dropdown-actions {
            display: none !important;
        }
        .banner-form .dropdown-menu.show .banner-dropdown-actions {
            display: none !important;
        }
        .hero-section .banner-form-offset {
            margin-top: 5rem;
        }
        @media (min-width: 992px) {
            .hero-section .hero-content {
                padding-top: 160px;
                padding-bottom: 40px;
            }
        }
        .js-tour-search-form .js-destination-field.has-validation-error {
            box-shadow: inset 0 0 0 2px #dc3545;
            border-radius: 4px;
        }
        .js-tour-search-form .js-destination-field.has-validation-error .form-label {
            color: #dc3545;
        }
        .js-destination-field.is-loading .js-city-suggest-input {
            padding-right: 2.25rem;
        }
        .destination-field-loader {
            position: absolute;
            top: 50%;
            right: 12px;
            width: 16px;
            height: 16px;
            border: 2px solid #d8e0ea;
            border-top-color: #0d6efd;
            border-radius: 50%;
            transform: translateY(-50%);
            animation: destination-field-loader-spin 0.75s linear infinite;
            pointer-events: none;
        }
        @keyframes destination-field-loader-spin {
            to {
                transform: translateY(-50%) rotate(360deg);
            }
        }
        .city-autocomplete-dropdown {
            background: #fff;
            border: 1px solid #e4ebf1;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            max-height: 280px;
            overflow-y: auto;
        }
        .city-autocomplete-option {
            display: block;
            width: 100%;
            padding: 10px 14px;
            border: none;
            background: none;
            text-align: left;
            cursor: pointer;
            font-size: 14px;
            color: #111827;
        }
        .city-autocomplete-option:hover,
        .city-autocomplete-option.is-active {
            background: #f5f8fa;
        }
        .place-img .flight-card-img {
            width: 100%;
            aspect-ratio: 16 / 9;
            object-fit: cover;
            display: block;
            background: #eef2f6;
        }
        .bootstrap-datetimepicker-widget,
        .daterangepicker {
            z-index: 3000;
        }
        .banner-form .form-info .form-item.round-drip:not(.d-none) {
            display: flex;
        }
        @media (min-width: 992px) {
            .flight-search-card .banner-form .form-info {
                height: 122px;
            }
            .flight-search-card .banner-form .form-info .form-item {
                height: 120px;
                padding: 12px;
                min-width: 0;
            }
            .flight-search-card .banner-form .search-btn {
                height: 122px;
                min-width: 108px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .flight-search-card .banner-form .form-info .form-item > div:first-child {
                min-width: 0;
            }
            .flight-search-card .banner-form .form-info .form-item .form-control,
            .flight-search-card .banner-form .form-info .form-item p,
            .flight-search-card .banner-form .form-info .form-item .member-count {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                max-width: 100%;
            }
            .flight-search-card .banner-form .form-info .form-item p {
                line-height: 20px;
            }
        }
    </style>
