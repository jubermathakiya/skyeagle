
    @include('components.partials.login-modal')
    @include('components.partials.forgot-modal')
    @include('components.partials.complete-name-modal')
    
    <style>
        #login-modal.modal.fade .modal-dialog,
        #forgot-modal.modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateY(-24px) scale(0.97);
            opacity: 0;
        }
        #login-modal.modal.fade.show .modal-dialog,
        #forgot-modal.modal.fade.show .modal-dialog {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    </style>

    <!-- /OTP Modal -->
    <div class="modal fade" id="register-otp-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x fs-20"></i></a>
            </div>
            <div class="modal-body p-4 pt-0">
                <form id="register_otp_form" method="POST" action="{{ route('auth.register.otp.verify') }}">
                @csrf
                <div class="text-center border-bottom mb-3">
                    <h5 class="mb-1">Verify OTP</h5>
                    <p class="mb-2">Enter 6-digit OTP sent to your phone</p>
                    <p class="mb-0">Expires in: <span id="otp_countdown">05:00</span></p>
                </div>

                <input type="hidden" name="email" id="otp_email_holder">

                <div class="mb-3">
                    <label class="form-label">OTP</label>
                    <input type="text" class="form-control form-control-lg" name="otp" id="otp_input" maxlength="6" inputmode="numeric" autocomplete="one-time-code" placeholder="Enter 6-digit OTP">
                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-xl btn-primary w-100">Verify & Register</button>
                </div>
                <div class="text-center">
                    <a href="#" id="resend_otp_btn" class="link-primary fw-medium">Resend OTP</a>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="register-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                    <a href="#" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x fs-20"></i>
                    </a>
                </div>
                <div class="modal-body p-4 pt-0">
                    <form action="{{route('auth.register.otp')}}" method="POST" id="auth_register_form">
                        <div class="text-center border-bottom mb-3">
                            <h5 class="mb-1">Sign Up</h5>
                            <p class="mb-3">Create your DreamsTour Account</p>
                        </div>
                        <!-- First Name & Last Name -->
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">First Name</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="isax isax-user"></i>
                                    </span>
                                    <input type="text"
                                        name="first_name"
                                        class="form-control form-control-lg"
                                        placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Last Name</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="isax isax-user"></i>
                                    </span>
                                    <input type="text"
                                        name="last_name"
                                        class="form-control form-control-lg"
                                        placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>

                        <!-- Email & Phone -->
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Email</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="isax isax-message"></i>
                                    </span>
                                    <input type="email"
                                        name="email"
                                        class="form-control form-control-lg"
                                        placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Phone</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="isax isax-call"></i>
                                    </span>
                                    <input type="text"
                                        name="phone"
                                        class="form-control form-control-lg"
                                        placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                        <!-- Password & Confirm Password -->
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Password</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="isax isax-lock"></i>
                                    </span>
                                    <input type="password"
                                        name="password"
                                        class="form-control form-control-lg pass-input"
                                        placeholder="Enter Password">
                                    <span class="input-icon-addon toggle-password">
                                        <i class="isax isax-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="isax isax-lock"></i>
                                    </span>
                                    <input type="password"
                                        name="password_confirmation"
                                        class="form-control form-control-lg pass-input"
                                        placeholder="Enter Password">
                                    <span class="input-icon-addon toggle-password">
                                        <i class="isax isax-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 mb-3">
                            <div class="d-flex">
                                <div class="form-check d-flex align-items-center mb-2">
                                    <input class="form-check-input mt-0"
                                        type="checkbox"
                                        value=""
                                        id="agree">
                                    <label class="form-check-label ms-2 text-gray-9 fs-14" for="agree">
                                        I agree with the
                                        <a href="#" class="link-primary fw-medium">
                                            Terms Of Service.
                                        </a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit"
                                class="btn btn-xl btn-primary d-flex align-items-center justify-content-center w-100">
                                Register
                                <i class="isax isax-arrow-right-3 ms-2"></i>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="fs-14">
                                Already have an account?
                                <a href="#"
                                    class="link-primary fw-medium login-btn"
                                    data-bs-dismiss="modal">
                                    Sign In
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Register Modal -->

    <!-- Change Password -->
    <div class="modal fade" id="change_password_form">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                    <a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x fs-20"></i></a>
                </div>
                <div class="modal-body p-4 pt-0">
                    <form id="change_password_form" action="{{ route('auth.changePassword') }}" method="POST">
                        <div class="text-center border-bottom mb-3">
                            <h5 class="mb-1">Change Password</h5>
                            <p class="mb-3">Enter Details to Change Password</p>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="isax isax-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control form-control-lg pass-input"
                                    placeholder="Enter Password">
                                <span class="input-icon-addon toggle-password">
                                    <i class="isax isax-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="isax isax-lock"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control form-control-lg pass-input"
                                    placeholder="Enter Password">
                                <span class="input-icon-addon toggle-password">
                                    <i class="isax isax-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-0">
                            <button type="submit"
                                class="btn btn-xl btn-primary d-flex align-items-center justify-content-center w-100"
                                data-bs-toggle="modal" data-bs-target="#login-password">Change Password<i
                                    class="isax isax-arrow-right-3 ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Change Password -->

    <!-- Forgot password flow: see components/partials/forgot-modal.blade.php --> 