    <!-- Forgot Password Modal (single modal, panel switching) -->
    <div class="modal fade" id="forgot-modal" tabindex="-1" aria-hidden="true" data-jquery-modal="true">
        <div class="modal-dialog modal-dialog-centered login-modal-dialog">
            <div class="modal-content login-modal-content border-0 overflow-hidden">
                <div class="row g-0 flex-column flex-lg-row">
                    <div class="col-lg-5 login-modal-banner">
                        <div class="login-modal-banner-inner">
                            <img src="{{ URL::asset('build/img/tours/tours-01.jpg') }}" class="login-modal-banner-img" alt="Sky Eagle Trip offers">
                            <div class="login-modal-promo-card">
                                <p class="fs-12 text-gray-6 mb-1">Account recovery:</p>
                                <p class="fw-bold fs-18 mb-1 lh-sm">Reset your password</p>
                                <p class="fw-semibold fs-14 mb-2 lh-sm">Verify your email with OTP and set a new password securely.</p>
                                <p class="fs-12 text-gray-6 mb-0">Quick &amp; secure process</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 login-modal-form-col">
                        <div class="login-modal-form-wrap">
                            <button type="button" class="login-modal-close-btn js-forgot-modal-close" aria-label="Close">
                                <i class="ti ti-x fs-20"></i>
                            </button>

                            {{-- Step 1: Email --}}
                            <div class="login-modal-panel" data-forgot-panel="email">
                                <div class="mb-4 pe-4">
                                    <h5 class="mb-1 fw-semibold">Forgot Password</h5>
                                    <p class="text-gray-6 mb-0 fs-14">Enter your email and we will send you a verification OTP.</p>
                                </div>
                                <form id="forgot_send_otp_form" action="{{ route('auth.forgot.sendOtp') }}" method="POST" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="isax isax-message"></i></span>
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter Email" autocomplete="email">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-xl btn-primary w-100 text-uppercase fw-semibold">Send OTP</button>
                                    </div>
                                </form>
                                <p class="fs-14 text-center mb-0">Remember password? <a href="#" class="link-primary fw-medium js-forgot-to-login">Sign In</a></p>
                            </div>

                            {{-- Step 2: OTP --}}
                            <div class="login-modal-panel d-none" data-forgot-panel="otp-verify">
                                <button type="button" class="btn btn-link login-modal-back-btn p-0 mb-3" data-forgot-back="email">
                                    <i class="ti ti-arrow-left me-1"></i> Back
                                </button>
                                <h5 class="fw-semibold mb-1">Enter OTP</h5>
                                <p class="fs-14 text-gray-6 mb-4">
                                    We have sent a 6-digit OTP to
                                    <span class="fw-semibold text-dark" id="forgot_otp_display_target">—</span>
                                </p>
                                <form id="forgot_verify_otp_form" action="{{ route('auth.forgot.verifyOtp') }}" method="POST" novalidate>
                                    @csrf
                                    <input type="hidden" name="email" id="forgot_otp_email_holder">
                                    <div class="login-otp-inputs d-flex justify-content-between gap-2 mb-3">
                                        @for ($i = 0; $i < 6; $i++)
                                            <input type="text" class="form-control form-control-lg text-center forgot-otp-digit" maxlength="1" inputmode="numeric" autocomplete="one-time-code" data-otp-index="{{ $i }}" aria-label="OTP digit {{ $i + 1 }}">
                                        @endfor
                                    </div>
                                    <input type="hidden" name="otp" id="forgot_otp_combined">
                                    <p class="fs-14 text-gray-6 mb-3">Resend OTP in <span id="forgot_otp_countdown">05:00</span></p>
                                    <button type="button" class="btn btn-link link-primary p-0 mb-3 d-none" id="forgot_resend_otp_btn">Resend OTP</button>
                                    <button type="submit" class="btn btn-xl btn-primary w-100 text-uppercase fw-semibold">Verify OTP</button>
                                </form>
                            </div>

                            {{-- Step 3: Reset password --}}
                            <div class="login-modal-panel d-none" data-forgot-panel="reset-password">
                                <h5 class="fw-semibold mb-1">Reset Password</h5>
                                <p class="fs-14 text-gray-6 mb-4">Create a new secure password for your account.</p>
                                <form id="forgot_reset_password_form" action="{{ route('auth.forgot.reset') }}" method="POST" novalidate>
                                    @csrf
                                    <input type="hidden" name="email" id="forgot_reset_email_holder">
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="isax isax-lock"></i></span>
                                            <input type="password" name="password" class="form-control form-control-lg pass-input" placeholder="Enter New Password" autocomplete="new-password">
                                            <span class="input-icon-addon toggle-password"><i class="isax isax-eye-slash"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="isax isax-lock"></i></span>
                                            <input type="password" name="password_confirmation" class="form-control form-control-lg pass-input" placeholder="Confirm New Password" autocomplete="new-password">
                                            <span class="input-icon-addon toggle-password"><i class="isax isax-eye-slash"></i></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-xl btn-primary w-100 text-uppercase fw-semibold">Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Forgot Password Modal -->
    <style>
        #forgot-modal .login-modal-dialog {
            position: relative;
            max-width: 920px;
            width: calc(100% - 2rem);
        }
        #forgot-modal.show {
            z-index: 1060;
        }
        #forgot-modal .modal-backdrop.forgot-modal-backdrop,
        .modal-backdrop[data-jquery-modal="#forgot-modal"] {
            z-index: 1055;
        }
        #forgot-modal .login-modal-form-wrap {
            position: relative;
            min-height: 420px;
        }
        #forgot-modal .login-modal-close-btn {
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
        #forgot-modal .login-modal-close-btn:hover {
            background: #e5e7eb;
        }
        #forgot-modal .login-modal-content {
            border-radius: 16px;
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.2);
        }
        #forgot-modal .login-modal-banner-inner {
            position: relative;
            min-height: 200px;
            height: 100%;
        }
        @media (min-width: 992px) {
            #forgot-modal .login-modal-banner-inner {
                min-height: 100%;
            }
        }
        #forgot-modal .login-modal-banner-img {
            width: 100%;
            height: 100%;
            min-height: 200px;
            object-fit: cover;
            display: block;
        }
        @media (min-width: 992px) {
            #forgot-modal .login-modal-banner-img {
                min-height: 520px;
            }
        }
        #forgot-modal .login-modal-promo-card {
            position: absolute;
            left: 1rem;
            right: 1rem;
            bottom: 1rem;
            background: #fff;
            border-radius: 12px;
            padding: 1rem 1.1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        #forgot-modal .login-modal-form-col {
            background: #fff;
        }
        #forgot-modal .login-modal-form-wrap {
            padding: 2.75rem 1.75rem 2rem;
        }
        @media (min-width: 992px) {
            #forgot-modal .login-modal-form-wrap {
                padding: 3rem 2.25rem 2rem;
            }
        }
        #forgot-modal .login-otp-digit,
        #forgot-modal .forgot-otp-digit {
            max-width: 52px;
            font-weight: 600;
            font-size: 1.125rem;
            padding-left: 0.25rem;
            padding-right: 0.25rem;
        }
        #forgot-modal .login-modal-back-btn {
            color: #374151;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
        }
        #forgot-modal .login-modal-back-btn:hover {
            color: #111;
        }
        #forgot-modal.modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateY(-24px) scale(0.97);
            opacity: 0;
        }
        #forgot-modal.modal.fade.show .modal-dialog {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
        #forgot-modal .input-icon .form-control.is-invalid,
        #forgot-modal .input-icon .form-control.is-valid.is-invalid {
            border-color: var(--bs-form-invalid-border-color, #dc3545);
            background-image: none;
            box-shadow: none;
        }
        #forgot-modal .input-icon .form-control.is-invalid:not(:last-child),
        #forgot-modal .input-icon .form-control.is-valid.is-invalid:not(:last-child) {
            padding-right: 2.5rem;
        }
        #forgot-modal .input-icon .form-control.is-invalid:last-child,
        #forgot-modal .input-icon .form-control.is-valid.is-invalid:last-child {
            padding-right: 1rem;
        }
        #forgot-modal .input-icon .form-control.is-valid {
            background-image: none;
        }
        #forgot-modal .input-icon .invalid-feedback {
            display: block;
            margin-top: 0.25rem;
        }
    </style>
