    <!-- Complete Name Modal (one-time for new users) -->
    <div class="modal fade" id="complete-name-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered login-modal-dialog">
            <div class="modal-content login-modal-content border-0 overflow-hidden">
                <div class="row g-0 flex-column flex-lg-row">
                    <div class="col-lg-5 login-modal-banner d-none d-lg-block">
                        <div class="login-modal-banner-inner">
                            <img src="{{ URL::asset('build/img/tours/tours-01.jpg') }}" class="login-modal-banner-img" alt="Sky Eagle Trip offers">
                            <div class="login-modal-promo-card">
                                <p class="fs-12 text-gray-6 mb-1">Welcome aboard!</p>
                                <p class="fw-bold fs-18 mb-1 lh-sm">Tell us your name</p>
                                <p class="fw-semibold fs-14 mb-2 lh-sm">Personalize your Sky Eagle Trip experience.</p>
                                <p class="fs-12 text-gray-6 mb-0">Quick setup — takes a few seconds.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 login-modal-form-col">
                        <div class="login-modal-form-wrap complete-name-modal-body">
                            <div class="complete-name-modal-mobile-brand d-lg-none text-center mb-4">
                                <img src="{{ asset('assets/img/sky_logo.png') }}" width="72" height="72" alt="Sky Eagle Trip" class="rounded-2">
                            </div>

                            <div class="mb-4 pe-lg-4">
                                <h5 class="mb-1 fw-semibold">Almost there!</h5>
                                <p class="text-gray-6 mb-0 fs-14">Please enter your full name to complete your profile. This step is required only once.</p>
                            </div>

                            <form id="auth_complete_name_form" action="{{ route('auth.complete-name') }}" method="POST" novalidate class="complete-name-modal-form">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon"><i class="isax isax-user"></i></span>
                                        <input type="text" name="full_name" class="form-control form-control-lg" placeholder="Enter your full name" autocomplete="name" maxlength="161">
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn btn-xl btn-primary w-100 text-uppercase fw-semibold">Continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Complete Name Modal -->
    <style>
        #complete-name-modal .login-modal-dialog {
            position: relative;
            max-width: 920px;
            width: calc(100% - 2rem);
        }
        #complete-name-modal .login-modal-content {
            border-radius: 16px;
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.2);
        }
        #complete-name-modal .login-modal-banner-inner {
            position: relative;
            min-height: 200px;
            height: 100%;
        }
        @media (min-width: 992px) {
            #complete-name-modal .login-modal-banner-inner {
                min-height: 100%;
            }
        }
        #complete-name-modal .login-modal-banner-img {
            width: 100%;
            height: 100%;
            min-height: 200px;
            object-fit: cover;
            display: block;
        }
        @media (min-width: 992px) {
            #complete-name-modal .login-modal-banner-img {
                min-height: 480px;
            }
        }
        #complete-name-modal .login-modal-promo-card {
            position: absolute;
            left: 1rem;
            right: 1rem;
            bottom: 1rem;
            background: #fff;
            border-radius: 12px;
            padding: 1rem 1.1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        #complete-name-modal .login-modal-form-col {
            background: #fff;
        }
        #complete-name-modal .login-modal-form-wrap {
            position: relative;
            padding: 2rem 1.5rem;
        }
        @media (min-width: 992px) {
            #complete-name-modal .login-modal-form-wrap {
                padding: 3rem 2.25rem;
                min-height: 480px;
            }
        }
        #complete-name-modal .complete-name-modal-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 320px;
        }
        @media (min-width: 992px) {
            #complete-name-modal .complete-name-modal-body {
                min-height: 480px;
            }
        }
        #complete-name-modal .complete-name-modal-form {
            max-width: 100%;
        }
        @media (min-width: 992px) {
            #complete-name-modal .complete-name-modal-form {
                max-width: 420px;
            }
        }
        #complete-name-modal .complete-name-modal-mobile-brand img {
            object-fit: contain;
        }
        #complete-name-modal.modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateY(-24px) scale(0.97);
            opacity: 0;
        }
        #complete-name-modal.modal.fade.show .modal-dialog {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
        #complete-name-modal .input-icon .form-control.is-invalid,
        #complete-name-modal .input-icon .form-control.is-valid.is-invalid {
            border-color: var(--bs-form-invalid-border-color, #dc3545);
            background-image: none;
            box-shadow: none;
        }
        #complete-name-modal .input-icon .form-control.is-invalid:last-child,
        #complete-name-modal .input-icon .form-control.is-valid.is-invalid:last-child {
            padding-right: 1rem;
        }
        #complete-name-modal .input-icon .form-control.is-valid {
            background-image: none;
        }
        #complete-name-modal .input-icon .invalid-feedback {
            display: block;
            margin-top: 0.25rem;
        }
        #complete-name-modal .form-label {
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        #complete-name-modal .btn-xl {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            border-radius: 999px;
        }
    </style>
