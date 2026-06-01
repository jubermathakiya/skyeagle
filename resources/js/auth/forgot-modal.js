import $ from "jquery";
import { initAjaxFormValidation, openLoginModal } from "../common/form-handler.js";

const FORGOT_MODAL_SELECTOR = "#forgot-modal";
const FORGOT_MODAL_TRANSITION_MS = 300;

let forgotOtpTimerInterval = null;

export function showForgotPanel(panel) {
    $(`${FORGOT_MODAL_SELECTOR} [data-forgot-panel]`).addClass("d-none");
    $(`${FORGOT_MODAL_SELECTOR} [data-forgot-panel="${panel}"]`).removeClass("d-none");
}

function setForgotModalAnimating($modal, isAnimating) {
    if (isAnimating) {
        $modal.data("forgot-modal-animating", true);
    } else {
        $modal.removeData("forgot-modal-animating");
    }
}

function getForgotModalBackdrop() {
    return $(`.modal-backdrop[data-jquery-modal="${FORGOT_MODAL_SELECTOR}"]`);
}

function createForgotModalBackdrop() {
    const backdrop = document.createElement("div");
    backdrop.className = "modal-backdrop fade forgot-modal-backdrop";
    backdrop.setAttribute("data-jquery-modal", FORGOT_MODAL_SELECTOR);
    const modalEl = document.querySelector(FORGOT_MODAL_SELECTOR);
    if (modalEl?.parentNode) {
        modalEl.parentNode.insertBefore(backdrop, modalEl);
    } else {
        document.body.appendChild(backdrop);
    }
    return $(backdrop);
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

export function resetForgotModalUI() {
    showForgotPanel("email");
    clearForgotOtpDigits();
    clearForgotOtpTimer();
    $("#forgot_otp_email_holder, #forgot_reset_email_holder").val("");
    $("#forgot_otp_display_target").text("—");
    $("#forgot_resend_otp_btn").addClass("d-none");
    $("#forgot_otp_countdown").closest("p").removeClass("d-none");
    $("#forgot_otp_countdown").text("05:00");

    resetFormValidation($("#forgot_send_otp_form"));
    resetFormValidation($("#forgot_verify_otp_form"));
    resetFormValidation($("#forgot_reset_password_form"));

    $("#forgot_reset_password_form .pass-input").attr("type", "password");
    $("#forgot_reset_password_form .toggle-password i").attr("class", "isax isax-eye-slash");
}

export function openForgotModal() {
    const $modal = $(FORGOT_MODAL_SELECTOR);
    if (!$modal.length) {
        return;
    }

    resetForgotModalUI();

    if ($modal.data("forgot-modal-animating")) {
        return;
    }

    if (typeof bootstrap !== "undefined") {
        bootstrap.Modal.getInstance($modal[0])?.hide();
    }

    if ($modal.hasClass("show")) {
        return;
    }

    setForgotModalAnimating($modal, true);

    let $backdrop = getForgotModalBackdrop();
    if (!$backdrop.length) {
        $backdrop = createForgotModalBackdrop();
    } else {
        $backdrop.removeClass("show");
    }

    $modal.removeClass("show").css("display", "block");
    $modal.attr("aria-modal", "true").removeAttr("aria-hidden");
    $("body").addClass("modal-open");

    void $modal[0].offsetHeight;

    requestAnimationFrame(() => {
        $backdrop.addClass("show");
        $modal.addClass("show").css("z-index", 1060);
        setTimeout(() => setForgotModalAnimating($modal, false), FORGOT_MODAL_TRANSITION_MS);
    });
}

export function closeForgotModal() {
    const $modal = $(FORGOT_MODAL_SELECTOR);
    if (!$modal.length) {
        return;
    }

    const $backdrop = getForgotModalBackdrop();
    const isOpen = $modal.hasClass("show") || $modal.css("display") === "block";

    if (!isOpen) {
        resetForgotModalUI();
        $backdrop.remove();
        if (!$("#login-modal.show").length && !$(".modal.show").length) {
            $("body").removeClass("modal-open").css("padding-right", "");
        }
        return;
    }

    setForgotModalAnimating($modal, true);

    if (typeof bootstrap !== "undefined") {
        bootstrap.Modal.getInstance($modal[0])?.hide();
    }

    $modal.removeClass("show");
    $backdrop.removeClass("show");

    setTimeout(() => {
        $modal.css({ display: "none", zIndex: "" });
        $modal.removeAttr("aria-modal").attr("aria-hidden", "true");
        $backdrop.remove();

        if (!$("#login-modal.show").length && !$(".modal.show").length) {
            $("body").removeClass("modal-open").css("padding-right", "");
        }

        resetForgotModalUI();
        setForgotModalAnimating($modal, false);
    }, FORGOT_MODAL_TRANSITION_MS);
}

function clearForgotOtpTimer() {
    if (forgotOtpTimerInterval) {
        clearInterval(forgotOtpTimerInterval);
        forgotOtpTimerInterval = null;
    }
}

function startForgotOtpTimer(expiresIso) {
    const expiresAt = new Date(expiresIso).getTime();
    clearForgotOtpTimer();

    const $count = $("#forgot_otp_countdown");
    const $resend = $("#forgot_resend_otp_btn");
    $resend.addClass("d-none");
    $count.closest("p").removeClass("d-none");

    forgotOtpTimerInterval = setInterval(() => {
        const diff = expiresAt - Date.now();
        if (diff <= 0) {
            $count.text("00:00");
            clearForgotOtpTimer();
            $count.closest("p").addClass("d-none");
            $resend.removeClass("d-none");
            return;
        }
        const mins = Math.floor(diff / 60000).toString().padStart(2, "0");
        const secs = Math.floor((diff % 60000) / 1000).toString().padStart(2, "0");
        $count.text(`${mins}:${secs}`);
    }, 1000);
}

function clearForgotOtpDigits() {
    $(".forgot-otp-digit").val("");
    $("#forgot_otp_combined").val("");
}

function syncForgotOtpCombined() {
    const digits = $(".forgot-otp-digit")
        .map(function () {
            return $(this).val();
        })
        .get()
        .join("");
    $("#forgot_otp_combined").val(digits);
    return digits;
}

function initForgotOtpDigitInputs() {
    const $digits = $(".forgot-otp-digit");

    $digits.on("input", function () {
        const $el = $(this);
        const val = $el.val().replace(/\D/g, "").slice(-1);
        $el.val(val);
        syncForgotOtpCombined();
        if (val && $el.data("otp-index") < 5) {
            $digits.eq($el.data("otp-index") + 1).focus();
        }
    });

    $digits.on("keydown", function (e) {
        const $el = $(this);
        const idx = $el.data("otp-index");
        if (e.key === "Backspace" && !$el.val() && idx > 0) {
            $digits.eq(idx - 1).focus().val("");
            syncForgotOtpCombined();
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
        syncForgotOtpCombined();
        $digits.eq(Math.min(digits.length, 5)).focus();
    });
}

function initForgotForms() {
    if ($("#forgot_send_otp_form").length) {
        initAjaxFormValidation(
            "#forgot_send_otp_form",
            { email: { required: true, email: true } },
            {},
            {
                skipRequiredFor: ["email"],
                onSuccess(res) {
                    const email = res?.data?.email || $('#forgot_send_otp_form [name="email"]').val();
                    $("#forgot_otp_email_holder").val(email);
                    $("#forgot_reset_email_holder").val(email);
                    $("#forgot_otp_display_target").text(email);
                    clearForgotOtpDigits();
                    showForgotPanel("otp-verify");
                    $(".forgot-otp-digit").first().focus();
                    if (res?.data?.otp_expires_at) {
                        startForgotOtpTimer(res.data.otp_expires_at);
                    }
                    window.showToastmessage?.(res.message || "OTP sent successfully.", "success");
                },
                onError(res) {
                    window.showToastmessage?.(res?.message || "Unable to send OTP.", "error");
                },
            }
        );
    }

    if ($("#forgot_verify_otp_form").length) {
        initAjaxFormValidation(
            "#forgot_verify_otp_form",
            {
                email: { required: true, email: true },
                otp: { required: true, digits: true, minlength: 6, maxlength: 6 },
            },
            {},
            {
                skipRequiredFor: ["email", "otp"],
                beforeSubmit() {
                    syncForgotOtpCombined();
                    if ($("#forgot_otp_combined").val().length !== 6) {
                        window.showToastmessage?.("Please enter the 6-digit OTP.", "error");
                        return false;
                    }
                },
                onSuccess(res) {
                    if (!res?.status) {
                        window.showToastmessage?.(res?.message || "Invalid OTP.", "error");
                        return;
                    }
                    const email = $("#forgot_otp_email_holder").val();
                    $("#forgot_reset_email_holder").val(email);
                    showForgotPanel("reset-password");
                    window.showToastmessage?.(res.message || "OTP verified.", "success");
                },
                onError(res) {
                    window.showToastmessage?.(res?.message || "Invalid OTP.", "error");
                },
            }
        );

        $("#forgot_verify_otp_form").on("submit", function () {
            syncForgotOtpCombined();
        });
    }

    if ($("#forgot_reset_password_form").length) {
        initAjaxFormValidation(
            "#forgot_reset_password_form",
            {
                email: { required: true, email: true },
                password: { required: true, minlength: 8 },
                password_confirmation: { required: true, equalTo: '#forgot_reset_password_form [name="password"]' },
            },
            {},
            {
                skipRequiredFor: ["email", "password", "password_confirmation"],
                onSuccess(res) {
                    if (!res?.status) {
                        window.showToastmessage?.(res?.message || "Unable to reset password.", "error");
                        return;
                    }
                    window.showToastmessage?.(res.message || "Password reset successful.", "success");
                    closeForgotModal();
                    setTimeout(() => openLoginModal(), FORGOT_MODAL_TRANSITION_MS);
                },
                onError(res) {
                    window.showToastmessage?.(res?.message || "Unable to reset password.", "error");
                },
            }
        );
    }
}

function bindForgotModalUi() {
    $(document).on("click", `${FORGOT_MODAL_SELECTOR} [data-forgot-back]`, function () {
        showForgotPanel($(this).data("forgot-back"));
    });

    $(document).on("click", `${FORGOT_MODAL_SELECTOR} .js-forgot-modal-close`, function (e) {
        e.preventDefault();
        closeForgotModal();
    });

    $(document).on("click", `${FORGOT_MODAL_SELECTOR} .js-forgot-to-login`, function (e) {
        e.preventDefault();
        closeForgotModal();
        setTimeout(() => openLoginModal(), FORGOT_MODAL_TRANSITION_MS);
    });

    $(document).on("click", `.modal-backdrop[data-jquery-modal="${FORGOT_MODAL_SELECTOR}"]`, function () {
        closeForgotModal();
    });

    $(document).on("keydown", function (e) {
        if (e.key === "Escape" && $(FORGOT_MODAL_SELECTOR).hasClass("show")) {
            closeForgotModal();
        }
    });

    $(document).on("click", "#forgot_resend_otp_btn", function (e) {
        e.preventDefault();
        const email = $("#forgot_otp_email_holder").val();
        if (!email) {
            return;
        }
        $.ajax({
            url: "/auth/forgot-otp/resend",
            type: "POST",
            data: {
                email,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success(res) {
                if (res?.status && res?.data?.otp_expires_at) {
                    startForgotOtpTimer(res.data.otp_expires_at);
                    clearForgotOtpDigits();
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

export function initForgotModal() {
    if (!$(FORGOT_MODAL_SELECTOR).length) {
        return;
    }

    window.resetForgotModalUI = resetForgotModalUI;
    bindForgotModalUi();
    initForgotOtpDigitInputs();
    initForgotForms();
}
