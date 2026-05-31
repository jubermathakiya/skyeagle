import $ from "jquery";
import { initAjaxFormValidation } from "../common/form-handler.js";

let loginOtpTimerInterval = null;

export function showLoginPanel(panel) {
    $("#login-modal [data-login-panel]").addClass("d-none");
    $(`#login-modal [data-login-panel="${panel}"]`).removeClass("d-none");
}

export function setLoginTab(tab) {
    $("#login-modal [data-login-tab]").removeClass("active");
    $(`#login-modal [data-login-tab="${tab}"]`).addClass("active");
    $("#login-modal [data-login-tab-pane]").addClass("d-none");
    $(`#login-modal [data-login-tab-pane="${tab}"]`).removeClass("d-none");
}

export function showLoginSuccess(redirect) {
    if (redirect) {
        $("#login_success_redirect").val(redirect);
        $("#login_success_dashboard_btn").attr("href", redirect);
    }
    showLoginPanel("success");
}

function clearLoginOtpTimer() {
    if (loginOtpTimerInterval) {
        clearInterval(loginOtpTimerInterval);
        loginOtpTimerInterval = null;
    }
}

function startLoginOtpTimer(expiresIso) {
    const expiresAt = new Date(expiresIso).getTime();
    clearLoginOtpTimer();

    const $count = $("#login_otp_countdown");
    const $resend = $("#login_resend_otp_btn");
    $resend.addClass("d-none");
    $count.closest("p").removeClass("d-none");

    loginOtpTimerInterval = setInterval(() => {
        const diff = expiresAt - Date.now();
        if (diff <= 0) {
            $count.text("00:00");
            clearLoginOtpTimer();
            $count.closest("p").addClass("d-none");
            $resend.removeClass("d-none");
            return;
        }
        const mins = Math.floor(diff / 60000).toString().padStart(2, "0");
        const secs = Math.floor((diff % 60000) / 1000).toString().padStart(2, "0");
        $count.text(`${mins}:${secs}`);
    }, 1000);
}

function clearLoginOtpDigits() {
    $(".login-otp-digit").val("");
    $("#login_otp_combined").val("");
}

function syncLoginOtpCombined() {
    const digits = $(".login-otp-digit")
        .map(function () {
            return $(this).val();
        })
        .get()
        .join("");
    $("#login_otp_combined").val(digits);
    return digits;
}

function resetFormValidation($form) {
    if (!$form.length) {
        return;
    }
    $form[0].reset();
    const validator = $form.data("validator");
    if (validator) {
        validator.resetForm();
    }
    $form.find(".is-invalid, .is-valid").removeClass("is-invalid is-valid");
    $form.find(".invalid-feedback").remove();
    $form.find('button[type="submit"]').prop("disabled", false);
}

export function resetLoginModalUI() {
    showLoginPanel("credentials");
    setLoginTab("otp");
    clearLoginOtpDigits();
    clearLoginOtpTimer();
    $("#login_otp_login_holder, #login_otp_verify_login").val("");
    $("#login_otp_display_target").text("—");
    $("#login_resend_otp_btn").addClass("d-none");
    $("#login_otp_countdown").closest("p").removeClass("d-none");
    $("#login_otp_countdown").text("00:45");

    resetFormValidation($("#auth_login_form"));
    resetFormValidation($("#auth_login_otp_send_form"));
    resetFormValidation($("#auth_login_otp_verify_form"));

    $("#remembers_me").prop("checked", false);
    $("#auth_login_form .pass-input").attr("type", "password");
    $("#auth_login_form .toggle-password i").attr("class", "isax isax-eye-slash");
}

function initLoginOtpDigitInputs() {
    const $digits = $(".login-otp-digit");

    $digits.on("input", function () {
        const $el = $(this);
        const val = $el.val().replace(/\D/g, "").slice(-1);
        $el.val(val);
        syncLoginOtpCombined();
        if (val && $el.data("otp-index") < 5) {
            $digits.eq($el.data("otp-index") + 1).focus();
        }
    });

    $digits.on("keydown", function (e) {
        const $el = $(this);
        const idx = $el.data("otp-index");
        if (e.key === "Backspace" && !$el.val() && idx > 0) {
            $digits.eq(idx - 1).focus().val("");
            syncLoginOtpCombined();
        }
    });

    $digits.on("paste", function (e) {
        const pasted = (e.originalEvent.clipboardData || window.clipboardData).getData("text");
        const digits = String(pasted).replace(/\D/g, "").slice(0, 6);
        if (!digits.length) {
            return;
        }
        e.preventDefault();
        digits.split("").forEach((d, i) => {
            $digits.eq(i).val(d);
        });
        syncLoginOtpCombined();
        $digits.eq(Math.min(digits.length, 5)).focus();
    });
}

function bindLoginModalUi() {
    $(document).on("click", "#login-modal [data-login-tab]", function () {
        setLoginTab($(this).data("login-tab"));
    });

    $(document).on("click", "#login-modal [data-login-back]", function () {
        showLoginPanel($(this).data("login-back"));
    });

    $(document).on("change", "#remembers_me", function () {
        $("#login_remember_hidden").val(this.checked ? "1" : "0");
    });
}

function initLoginOtpForms() {
    if ($("#auth_login_otp_send_form").length) {
        initAjaxFormValidation(
            "#auth_login_otp_send_form",
            { login: { required: true } },
            {},
            {
                skipRequiredFor: ["login"],
                onSuccess(res) {
                    if (!res?.status || !res?.data) {
                        window.showToastmessage?.("Unable to send OTP.", "error");
                        return;
                    }
                    const login = res.data?.login || $('#auth_login_otp_send_form [name="login"]').val();
                    $("#login_otp_login_holder").val(login);
                    $("#login_otp_verify_login").val(login);
                    $("#login_otp_display_target").text(res.data.display_login || login);
                    clearLoginOtpDigits();
                    showLoginPanel("otp-verify");
                    $(".login-otp-digit").first().focus();
                    if (res.data.otp_expires_at) {
                        startLoginOtpTimer(res.data.otp_expires_at);
                    }
                    window.showToastmessage?.(res.message || "OTP sent successfully.", "success");
                },
                onError(res) {
                    window.showToastmessage?.(res?.message || "Unable to send OTP.", "error");
                },
            }
        );
    }

    if ($("#auth_login_otp_verify_form").length) {
        initAjaxFormValidation(
            "#auth_login_otp_verify_form",
            {
                login: { required: true },
                otp: { required: true, digits: true, minlength: 6, maxlength: 6 },
            },
            {},
            {
                skipRequiredFor: ["login", "otp"],
                beforeSubmit() {
                    syncLoginOtpCombined();
                    if ($("#login_otp_combined").val().length !== 6) {
                        window.showToastmessage?.("Please enter the 6-digit OTP.", "error");
                        return false;
                    }
                },
                onSuccess(res) {
                    if (!res?.status) {
                        window.showToastmessage?.(res?.message || "Invalid OTP.", "error");
                        return;
                    }
                    window.showToastmessage?.(res.message || "Login successful.", "success");
                    showLoginSuccess(res.redirect);
                },
                onError(res) {
                    window.showToastmessage?.(res?.message || "Invalid OTP.", "error");
                },
            }
        );

        $("#auth_login_otp_verify_form").on("submit", function () {
            syncLoginOtpCombined();
        });
    }
}

export function initLoginModal() {
    if (!$("#login-modal").length) {
        return;
    }

    window.resetLoginModalUI = resetLoginModalUI;
    bindLoginModalUi();
    initLoginOtpDigitInputs();
    initLoginOtpForms();

    $(document).on("click", "#login_resend_otp_btn", function (e) {
        e.preventDefault();
        const login = $("#login_otp_verify_login").val() || $("#login_otp_login_holder").val();
        if (!login) {
            return;
        }
        $.ajax({
            url: "/auth/login-otp/resend",
            type: "POST",
            data: {
                login,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success(res) {
                if (res?.status && res?.data?.otp_expires_at) {
                    startLoginOtpTimer(res.data.otp_expires_at);
                    clearLoginOtpDigits();
                    window.showToastmessage?.(res.message || "OTP resent successfully.", "success");
                }
            },
            error(xhr) {
                const msg = xhr.responseJSON?.message || "Unable to resend OTP.";
                window.showToastmessage?.(msg, "error");
            },
        });
    });
}
