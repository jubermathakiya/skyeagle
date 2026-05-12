import { initAjaxFormValidation } from "../common/form-handler.js";
import { showToastmessage } from '../common/common.js';
import $ from "jquery";

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
            setTimeout(() => {
                const loginModalEl = document.getElementById("login-modal");
                if (loginModalEl) bootstrap.Modal.getOrCreateInstance(loginModalEl).show();
            }, 250);
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
            if (res.redirect) {
                window.location.href = res.redirect;
                return;
            }
            window.location.reload();
        },
        onError: function (res) {
            let message = res?.message || "Invalid credentials.";
            window.showToastmessage?.(message, "error");
        }
    });
}


if ($("#forgot_send_otp_form").length) {
    initAjaxFormValidation("#forgot_send_otp_form", {
        email: { required: true, email: true },
    }, {}, {
        skipRequiredFor: ["email"],
        onSuccess: function (res) {
            const email = res?.data?.email || $('#forgot_send_otp_form [name="email"]').val();
            $("#forgot_otp_email_holder").val(email);
            var forgotModal = bootstrap.Modal.getInstance(document.getElementById('forgot-modal'));
            forgotModal?.hide();            
            setTimeout(() => {
                var otpModal = new bootstrap.Modal(document.getElementById('forgot-otp-modal'));
                otpModal.show();
            }, 300);
            if (res?.data?.otp_expires_at) {
                startOtpTimer(res.data.otp_expires_at, "#forgot_otp_countdown");
            }
            window.showToastmessage?.(res.message || "OTP sent successfully.", "success");
        },
        onError: function (res) {
            window.showToastmessage?.(res.message || "Unable to send OTP.", "error");
        }
    });
}

if ($("#forgot_verify_otp_form").length) {
    initAjaxFormValidation("#forgot_verify_otp_form", {
        otp: { required: true, digits: true, minlength: 6, maxlength: 6 },
    }, {}, {
        skipRequiredFor: ["otp"],
        onSuccess: function (res) {
            if (!res.status) {
                window.showToastmessage(res.message || "Invalid OTP", "error");
                return;
            }
            const email = $("#forgot_otp_email_holder").val();
            $('#forgot_reset_password_form [name="email"]').val(email);
            var otpModal = bootstrap.Modal.getInstance(document.getElementById('forgot-otp-modal'));
            otpModal?.hide();
            setTimeout(() => {
                var resetModal = new bootstrap.Modal(document.getElementById('forgot-reset-modal'));
                resetModal.show();
            }, 300);
            window.showToastmessage?.(res.message || "OTP verified.", "success");
        },
        onError: function (res) {
            window.showToastmessage?.(res.message || "Invalid OTP.", "error");
        }
    });
}

if ($("#forgot_reset_password_form").length) {
    initAjaxFormValidation("#forgot_reset_password_form", {
        email: { required: true, email: true },
        password: { required: true, minlength: 8 },
        password_confirmation: { required: true, equalTo: '#forgot_reset_password_form [name="password"]' },
    }, {}, {
        skipRequiredFor: ["email","password","password_confirmation"],
        onSuccess: function (res) {
            if (!res.status) {
                window.showToastmessage(res.message || "Failed", "error");
                return;
            }
            window.showToastmessage?.(res.message || "Password reset successful.", "success");
            var resetModal = bootstrap.Modal.getInstance(document.getElementById('forgot-reset-modal'));
            resetModal?.hide();
            setTimeout(() => {
                var loginModal = new bootstrap.Modal(document.getElementById('login-modal'));
                loginModal.show();
            }, 300);
        },
        onError: function (res) {
            window.showToastmessage?.(res.message || "Unable to reset password.", "error");
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

$(function () {
    if (document.querySelector('meta[name="open-login-modal"]')) {
        const loginModalEl = document.getElementById("login-modal");
        if (loginModalEl) {
            bootstrap.Modal.getOrCreateInstance(loginModalEl).show();
        }
    }
});

$(document).on("click", "#forgot_resend_otp_btn", function (e) {
    e.preventDefault();
    const email = $("#forgot_otp_email_holder").val();
    $.ajax({
        url: "/auth/forgot-otp/resend",
        type: "POST",
        data: {
            email,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (res?.status && res?.data?.otp_expires_at) {
                startOtpTimer(res.data.otp_expires_at, "#forgot_otp_countdown");
                window.showToastmessage?.(res.message || "OTP resent successfully.", "success");
            }
        },
        error: function () {
            window.showToastmessage?.("Unable to resend OTP.", "error");
        }
    });
});