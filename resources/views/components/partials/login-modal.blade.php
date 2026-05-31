    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" aria-hidden="true" data-jquery-modal="true">
        <div class="modal-dialog modal-dialog-centered login-modal-dialog">
            <div class="modal-content login-modal-content border-0 overflow-hidden">
                <div class="row g-0 flex-column flex-lg-row">
                    {{-- Left: advertising banner --}}
                    <div class="col-lg-5 login-modal-banner">
                        <div class="login-modal-banner-inner">
                            <img src="{{ URL::asset('build/img/tours/tours-01.jpg') }}" class="login-modal-banner-img" alt="Sky Eagle Trip offers">
                            <div class="login-modal-promo-card">
                                <p class="fs-12 text-gray-6 mb-1">Plan your next adventure:</p>
                                <p class="fw-bold fs-18 mb-1 lh-sm">Grab up to 50% OFF*</p>
                                <p class="fw-semibold fs-14 mb-2 lh-sm">on Flights, Stays, Tours, Packages &amp; More.</p>
                                <p class="fs-12 text-gray-6 mb-0">*T&amp;C Apply</p>
                            </div>
                        </div>
                    </div>

                    {{-- Right: login panels --}}
                    <div class="col-lg-7 login-modal-form-col">
                        <div class="login-modal-form-wrap">
                            <button type="button" class="login-modal-close-btn js-login-modal-close" data-close-login-modal aria-label="Close">
                                <i class="ti ti-x fs-20"></i>
                            </button>

                            <input type="hidden" id="login_otp_login_holder" value="">
                            <input type="hidden" id="login_success_redirect" value="{{ route('dashboard') }}">

                            {{-- Credentials (tabs: OTP / Password) --}}
                            <div class="login-modal-panel" data-login-panel="credentials">
                                <div class="mb-4 pe-4">
                                    <h5 class="mb-1 fw-semibold">Welcome Back!</h5>
                                    <p class="text-gray-6 mb-0 fs-14">Choose how you want to sign in.</p>
                                </div>

                                <ul class="nav nav-tabs login-modal-tabs mb-4" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" type="button" data-login-tab="otp" role="tab">Login with OTP</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" type="button" data-login-tab="password" role="tab">Login with Password</button>
                                    </li>
                                </ul>

                                {{-- OTP tab --}}
                                <div class="login-modal-tab-pane" data-login-tab-pane="otp">
                                    <form id="auth_login_otp_send_form" action="{{ route('auth.login.otp.send') }}" method="POST" novalidate>
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email or Phone Number</label>
                                            <div class="input-icon">
                                                <span class="input-icon-addon"><i class="isax isax-user"></i></span>
                                                <input type="text" name="login" class="form-control form-control-lg" placeholder="Enter Email or Phone" autocomplete="username">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-xl btn-primary w-100 text-uppercase fw-semibold">Send OTP</button>
                                        </div>
                                    </form>
                                </div>

                                {{-- Password tab --}}
                                <div class="login-modal-tab-pane d-none" data-login-tab-pane="password">
                                    <form id="auth_login_form" action="{{ route('auth.login') }}" method="POST" novalidate>
                                        @csrf
                                        <input type="hidden" name="remember" value="0" id="login_remember_hidden">
                                        <div class="mb-3">
                                            <label class="form-label">Email or Phone</label>
                                            <div class="input-icon">
                                                <span class="input-icon-addon"><i class="isax isax-user"></i></span>
                                                <input type="text" name="login" class="form-control form-control-lg" placeholder="Enter Email or Phone" autocomplete="username">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-icon">
                                                <span class="input-icon-addon"><i class="isax isax-lock"></i></span>
                                                <input type="password" name="password" class="form-control form-control-lg pass-input" placeholder="Enter Password" autocomplete="current-password">
                                                <span class="input-icon-addon toggle-password"><i class="isax isax-eye-slash"></i></span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                            <div class="form-check d-flex align-items-center mb-0">
                                                <input class="form-check-input mt-0" type="checkbox" value="1" id="remembers_me">
                                                <label class="form-check-label ms-2 text-gray-9 fs-14" for="remembers_me">Remember Me</label>
                                            </div>
                                            <a href="#" class="link-primary fw-medium fs-14" data-bs-toggle="modal" data-bs-target="#forgot-modal">Forgot Password?</a>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-xl btn-primary w-100 text-uppercase fw-semibold">Continue</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="login-or mb-3">
                                    <span class="span-or">Or Continue With</span>
                                </div>
                                <div class="login-modal-social d-flex align-items-center justify-content-center gap-3">
                                    <a href="{{ route('auth.social.redirect', ['provider' => 'google', 'redirect' => url()->full()]) }}"
                                        class="login-modal-social-btn" title="Continue with Google"
                                        data-global-loader data-global-loader-message="Redirecting to Google...">
                                        <img src="{{ URL::asset('build/img/icons/google-icon.svg') }}" alt="Google">
                                    </a>
                                    <a href="{{ route('auth.social.redirect', ['provider' => 'facebook', 'redirect' => url()->full()]) }}"
                                        class="login-modal-social-btn" title="Continue with Facebook"
                                        data-global-loader data-global-loader-message="Redirecting to Facebook...">
                                        <img src="{{ URL::asset('build/img/icons/fb-icon.svg') }}" alt="Facebook">
                                    </a>
                                </div>
                            </div>

                            {{-- OTP verification --}}
                            <div class="login-modal-panel d-none" data-login-panel="otp-verify">
                                <button type="button" class="btn btn-link login-modal-back-btn p-0 mb-3" data-login-back="credentials">
                                    <i class="ti ti-arrow-left me-1"></i> Back
                                </button>
                                <h5 class="fw-semibold mb-1">Enter OTP</h5>
                                <p class="fs-14 text-gray-6 mb-4">
                                    We have sent a 6-digit OTP to
                                    <span class="fw-semibold text-dark" id="login_otp_display_target">—</span>
                                    <button type="button" class="btn btn-link link-primary p-0 ms-1 align-baseline" data-login-back="credentials">Edit</button>
                                </p>
                                <form id="auth_login_otp_verify_form" action="{{ route('auth.login.otp.verify') }}" method="POST" novalidate>
                                    @csrf
                                    <input type="hidden" name="login" id="login_otp_verify_login">
                                    <div class="login-otp-inputs d-flex justify-content-between gap-2 mb-3">
                                        @for ($i = 0; $i < 6; $i++)
                                            <input type="text" class="form-control form-control-lg text-center login-otp-digit" maxlength="1" inputmode="numeric" autocomplete="one-time-code" data-otp-index="{{ $i }}" aria-label="OTP digit {{ $i + 1 }}">
                                        @endfor
                                    </div>
                                    <input type="hidden" name="otp" id="login_otp_combined">
                                    <p class="fs-14 text-gray-6 mb-3">Resend OTP in <span id="login_otp_countdown">00:45</span></p>
                                    <button type="button" class="btn btn-link link-primary p-0 mb-3 d-none" id="login_resend_otp_btn">Resend OTP</button>
                                    <button type="submit" class="btn btn-xl btn-primary w-100 text-uppercase fw-semibold">Verify &amp; Login</button>
                                </form>
                            </div>

                            {{-- Success --}}
                            <div class="login-modal-panel d-none text-center login-modal-success-panel" data-login-panel="success">
                                <div class="login-modal-success-illustration mb-3">
                                    <img src="{{ URL::asset('build/img/tours/tours-02.jpg') }}" alt="" class="img-fluid rounded-3">
                                </div>
                                <h5 class="fw-semibold mb-2">Welcome Back! 👋</h5>
                                <p class="text-gray-6 fs-14 mb-4">You have successfully logged in.</p>
                                <a href="{{ route('dashboard') }}" id="login_success_dashboard_btn" class="btn btn-xl btn-primary w-100 text-uppercase fw-semibold">Go to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Login Modal -->
    <style>
        #login-modal .login-modal-dialog {
            position: relative;
            max-width: 920px;
            width: calc(100% - 2rem);
        }
        #login-modal.show {
            z-index: 1060;
        }
        #login-modal .modal-backdrop.login-modal-backdrop,
        .modal-backdrop[data-jquery-modal="#login-modal"] {
            z-index: 1055;
        }
        #login-modal .login-modal-form-wrap {
            position: relative;
            min-height: 420px;
        }
        #login-modal .login-modal-close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 5;
            width: 36px;
            height: 36px;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: #f3f4f6;
            color: #111;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        #login-modal .login-modal-close-btn:hover {
            background: #e5e7eb;
        }
        #login-modal .login-modal-content {
            border-radius: 16px;
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.2);
        }
        #login-modal .login-modal-banner-inner {
            position: relative;
            min-height: 200px;
            height: 100%;
        }
        @media (min-width: 992px) {
            #login-modal .login-modal-banner-inner {
                min-height: 100%;
            }
        }
        #login-modal .login-modal-banner-img {
            width: 100%;
            height: 100%;
            min-height: 200px;
            object-fit: cover;
            display: block;
        }
        @media (min-width: 992px) {
            #login-modal .login-modal-banner-img {
                min-height: 520px;
            }
        }
        #login-modal .login-modal-promo-card {
            position: absolute;
            left: 1rem;
            right: 1rem;
            bottom: 1rem;
            background: #fff;
            border-radius: 12px;
            padding: 1rem 1.1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        #login-modal .login-modal-form-col {
            background: #fff;
        }
        #login-modal .login-modal-form-wrap {
            padding: 2.75rem 1.75rem 2rem;
        }
        @media (min-width: 992px) {
            #login-modal .login-modal-form-wrap {
                padding: 3rem 2.25rem 2rem;
            }
        }
        #login-modal .login-modal-tabs {
            border-bottom: 1px solid #e5e7eb;
            gap: 0;
        }
        #login-modal .login-modal-tabs .nav-link {
            border: 0;
            border-radius: 0;
            color: #6b7280;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 0;
            margin-right: 1.5rem;
            background: transparent;
        }
        #login-modal .login-modal-tabs .nav-link.active {
            color: var(--bs-primary, #0d6efd);
            border-bottom: 2px solid var(--bs-primary, #0d6efd);
            background: transparent;
        }
        #login-modal .login-otp-digit {
            max-width: 52px;
            font-weight: 600;
            font-size: 1.125rem;
            padding-left: 0.25rem;
            padding-right: 0.25rem;
        }
        #login-modal .login-modal-back-btn {
            color: #374151;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
        }
        #login-modal .login-modal-back-btn:hover {
            color: #111;
        }
        #login-modal .login-modal-success-illustration img {
            max-height: 180px;
            width: 100%;
            object-fit: cover;
        }
        #login-modal .login-modal-social-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 1px solid #e5e7eb;
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: box-shadow 0.2s ease, border-color 0.2s ease;
        }
        #login-modal .login-modal-social-btn:hover {
            border-color: #cfd4dc;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        #login-modal .login-modal-social-btn img {
            width: 22px;
            height: 22px;
            object-fit: contain;
        }
        #login-modal.modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateY(-24px) scale(0.97);
            opacity: 0;
        }
        #login-modal.modal.fade.show .modal-dialog {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    </style>
