import { initAjaxFormValidation, openLoginModal, closeLoginModal } from "../common/form-handler.js";
import { initLoginModal, showLoginSuccess, openCompleteNameModal } from "./login-modal.js";
import { initForgotModal, openForgotModal } from "./forgot-modal.js";
import $ from "jquery";

window.openLoginModal = openLoginModal;
window.closeLoginModal = closeLoginModal;
window.openForgotModal = openForgotModal;

let otpTimers = {};
function startOtpTimer(expiresIso, selector) {
    const expiresAt = new Date(expiresIso).getTime();
    if (otpTimers[selector]) {
        clearInterval(otpTimers[selector]);
    }
    const $count = $(selector);
    otpTimers[selector] = setInterval(() => {
        const now = Date.now();
        const diff = expiresAt - now;
        if (diff <= 0) {
            $count.text("00:00");
            clearInterval(otpTimers[selector]);
            return;
        }
        const mins = Math.floor(diff / 60000).toString().padStart(2, "0");
        const secs = Math.floor((diff % 60000) / 1000).toString().padStart(2, "0");
        $count.text(`${mins}:${secs}`);
    }, 1000);
}

initAjaxFormValidation("#auth_register_form", {
    first_name: { required: true },
    last_name: { required: true },
    email: { required: true, email: true },
    phone: { required: true, digits: true, minlength: 10, maxlength: 15 },
    password: { required: true, minlength: 8 },
    password_confirmation: { required: true, equalTo: '#auth_register_form [name="password"]' },
}, {}, {
    skipRequiredFor: ["first_name","last_name","email","phone","password","password_confirmation"],
    onSuccess: function (res) {
        if (!res?.data?.email || !res?.data?.otp_expires_at) {
            window.showToastmessage?.("OTP response missing.", "error");
            return;
        }
        $("#otp_email_holder").val(res.data.email);
        const registerModalEl = document.getElementById("register-modal");
        if (registerModalEl) {
            bootstrap.Modal.getOrCreateInstance(registerModalEl).hide();
        }
        const otpModalEl = document.getElementById("register-otp-modal");
        if (otpModalEl) {
            bootstrap.Modal.getOrCreateInstance(otpModalEl).show();
        }
        startOtpTimer(res.data.otp_expires_at,"#otp_countdown");
        window.showToastmessage?.("OTP sent successfully.", "success");
    }
});

initAjaxFormValidation("#register_otp_form", {
    email: { required: true, email: true },
    otp: { required: true, digits: true, minlength: 6, maxlength: 6 },
}, {}, {
    skipRequiredFor:["email","otp"],
    onSuccess: function (res) {
        window.showToastmessage?.(res.message || "Register successful.", "success");
        const otpModalEl = document.getElementById("register-otp-modal");
        if (otpModalEl) bootstrap.Modal.getOrCreateInstance(otpModalEl).hide();
        if (res.open_login_modal) {
            setTimeout(() => openLoginModal(), 250);
        }
    }
});

$(document).on("click", "#resend_otp_btn", function (e) {
    e.preventDefault();
    const email = $("#otp_email_holder").val();
    $.ajax({
        url: "/auth/register-otp/resend",
        type: "POST",
        data: {
            email,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (res?.status && res?.data?.otp_expires_at) {
                startOtpTimer(res.data.otp_expires_at);
                window.showToastmessage?.(res.message || "OTP resent successfully.", "success");
            }
        },
        error: function () {
            window.showToastmessage?.("Unable to resend OTP.", "error");
        }
    });
});

$(document).on("paste", "#otp_input", function (e) {
    const pasted = (e.originalEvent.clipboardData || window.clipboardData).getData("text");
    const digits = String(pasted).replace(/\D/g, "").slice(0, 6);
    if (digits.length) {
        e.preventDefault();
        $(this).val(digits);
    }
});

//LOGIN FORM
if ($("#auth_login_form").length) {
    initAjaxFormValidation("#auth_login_form", {
        login: { required: true },
        password: { required: true },
    }, {}, {
        skipRequiredFor: ["login", "password"],
        onSuccess: function (res) {
            window.showToastmessage?.(res.message || "Login successful.", "success");
            showLoginSuccess(res.redirect, !!res.needs_name);
        },
        onError: function (res) {
            let message = res?.message || "Invalid credentials.";
            window.showToastmessage?.(message, "error");
        }
    });
}

if ($("#change_password_form").length) {
    initAjaxFormValidation("#change_password_form", {
        password: { required: true, minlength: 8 },
        password_confirmation: { required: true, equalTo: '#change_password_form [name="password"]' },
    }, {}, {
        skipRequiredFor:["password","password_confirmation"],
        onSuccess: function (res) {
            window.showToastmessage?.(res.message || "Password changed successfully.", "success");
            $("#change_password_form")[0]?.reset();
            closeModal("change-password");
        },
        onError: function (res) {
            window.showToastmessage?.(res.message || "Unable to change password.", "error");
        }
    });
}

$(document).on('click', '.login-btn', function (e) {
    e.preventDefault();
    const $parentModal = $(this).closest('.modal');
    if ($parentModal.length && $parentModal.attr('id') !== 'login-modal') {
        const instance = bootstrap.Modal.getInstance($parentModal[0]);
        if (instance) {
            $parentModal.one('hidden.bs.modal', () => openLoginModal());
            instance.hide();
            return;
        }
    }
    openLoginModal();
});

$(document).on('click', '#login-modal [data-close-login-modal], #login-modal .login-modal-close-btn', function (e) {
    e.preventDefault();
    e.stopPropagation();
    closeLoginModal();
});

$(document).on('click', '.modal-backdrop[data-jquery-modal="#login-modal"]', function () {
    closeLoginModal();
});

$(document).on('keydown', function (e) {
    if (e.key === 'Escape' && $('#login-modal').hasClass('show')) {
        closeLoginModal();
    }
});

const AUTH_MODAL_SWITCH_DELAY_MS = 320;

function openBootstrapModal(selector) {
    const modalEl = document.querySelector(selector);
    if (!modalEl || typeof bootstrap === "undefined") {
        return;
    }
    bootstrap.Modal.getOrCreateInstance(modalEl).show();
}

function switchFromLoginModalTo(targetSelector) {
    closeLoginModal();
    setTimeout(() => {
        if (targetSelector === '#forgot-modal') {
            openForgotModal();
            return;
        }
        openBootstrapModal(targetSelector);
    }, AUTH_MODAL_SWITCH_DELAY_MS);
}

$(document).on('click', '#login-modal .js-auth-modal-switch', function (e) {
    e.preventDefault();
    const targetSelector = $(this).data('auth-modal-target');
    if (!targetSelector) {
        return;
    }
    switchFromLoginModalTo(targetSelector);
});

$(document).on('click', '#login-modal [data-bs-target="#register-modal"]', function (e) {
    e.preventDefault();
    switchFromLoginModalTo('#register-modal');
});

$(function () {
    initLoginModal();
    initForgotModal();
    if (document.querySelector('meta[name="open-login-modal"]')) {
        openLoginModal();
    }
    if (document.querySelector('meta[name="needs-name-prompt"]')) {
        openCompleteNameModal("/");
    }
});
