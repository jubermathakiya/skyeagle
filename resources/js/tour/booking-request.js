import { initAjaxFormValidation } from '../common/form-handler.js';
import { showToastmessage } from '../common/common.js';
import $ from 'jquery';

const FORM_SELECTOR = '#tour_booking_request_form';

function clampTravellerCounts($form) {
    const fields = {
        adults: 1,
        children: 0,
        infants: 0,
    };

    Object.keys(fields).forEach((field) => {
        const $input = $form.find(`[name="${field}"]`);
        if (!$input.length) {
            return;
        }

        const minimum = fields[field];
        const value = parseInt($input.val(), 10);
        $input.val(Number.isNaN(value) || value < minimum ? minimum : value);
    });
}

$(function () {
    const $form = $(FORM_SELECTOR);

    if (!$form.length) {
        return;
    }

    $form.on('click', '.quantity-right-plus, .quantity-left-minus', function () {
        window.setTimeout(() => clampTravellerCounts($form), 0);
    });

    $form.on('input', '[name="adults"], [name="children"], [name="infants"]', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    initAjaxFormValidation(FORM_SELECTOR, {
        package_id: { required: true },
        name: { required: true },
        email: { required: true, email: true },
        phone: { required: true, minlength: 10, maxlength: 15, digits: true },
        travel_from_date: { required: true },
        travel_to_date: { required: true },
        adults: { required: true, digits: true, min: 1 },
        children: { required: true, digits: true, min: 0 },
        infants: { required: true, digits: true, min: 0 },
    }, {}, {
        skipRequiredFor: [
            'name',
            'email',
            'phone',
            'travel_from_date',
            'travel_to_date',
            'adults',
            'children',
            'infants',
        ],
        beforeSubmit($formRef) {
            clampTravellerCounts($formRef);
        },
        onSuccess(res) {
            showToastmessage(res.message || 'Booking request submitted successfully.', 'success');

            if (res.redirect) {
                window.setTimeout(() => {
                    window.location.href = res.redirect;
                }, 700);
                return;
            }

            $form.find('[name="special_request"]').val('');
        },
        onError(res) {
            showToastmessage(res.message || 'Something went wrong. Please try again!', 'error');
        },
    });
});
