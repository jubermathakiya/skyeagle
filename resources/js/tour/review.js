import { initAjaxFormValidation } from '../common/form-handler.js';
import { showToastmessage } from '../common/common.js';
import $ from 'jquery';

const FORM_SELECTOR = '#tour_review_form';
const MODAL_SELECTOR = '#add_review';
const REVIEW_SECTION_SELECTOR = '#tour-reviews-section';

function closeReviewModal() {
    const modalElement = document.querySelector(MODAL_SELECTOR);

    if (modalElement && typeof bootstrap !== 'undefined') {
        bootstrap.Modal.getOrCreateInstance(modalElement).hide();
    } else {
        $(MODAL_SELECTOR).modal('hide');
    }
}

function resetReviewForm($form) {
    if (!$form.length) {
        return;
    }

    $form[0].reset();
    $form.find('.is-invalid, .is-valid').removeClass('is-invalid is-valid');
    $form.find('.invalid-feedback').remove();

    const validator = $form.data('validator');
    if (validator) {
        validator.resetForm();
    }
}

$(function () {
    const $form = $(FORM_SELECTOR);

    if (!$form.length) {
        return;
    }

    initAjaxFormValidation(FORM_SELECTOR, {
        rating: { required: true, digits: true, min: 1, max: 5 },
        name: { required: true, maxlength: 255 },
        email: { required: true, email: true, maxlength: 255 },
        review: { required: true, maxlength: 5000 },
    }, {}, {
        skipRequiredFor: ['rating', 'name', 'email', 'review'],
        onSuccess(res) {
            if (!res.status) {
                showToastmessage(res.message || 'Something went wrong. Please try again!', 'error');
                return;
            }

            if (res.html) {
                $(REVIEW_SECTION_SELECTOR).replaceWith(res.html);
            }

            if (res.reviewRating) {
                $('[data-tour-review-rating]').text(res.reviewRating);
            }

            if (res.reviewCountText) {
                $('[data-tour-review-count]').text(res.reviewCountText);
            }

            showToastmessage(res.message || 'Review submitted successfully.', 'success');
            closeReviewModal();
            resetReviewForm($form);
        },
        onError(res) {
            showToastmessage(res.message || 'Something went wrong. Please try again!', 'error');
        },
    });

    $(MODAL_SELECTOR).on('hidden.bs.modal', function () {
        resetReviewForm($form);
    });
});
