import { initAjaxFormValidation } from '../common/form-handler.js';
import { showToastmessage } from '../common/common.js';
import $ from 'jquery';

$(function () {
    if (!$('#contact_form').length) {
        return;
    }

    initAjaxFormValidation('#contact_form', {
        name: { required: true },
        email: { required: true, email: true },
        phone: { required: true, minlength: 10, maxlength: 15, digits: true },
        message: { required: true },
    }, {}, {
        skipRequiredFor: ['name', 'email', 'phone', 'message'],
        onSuccess(res) {
            showToastmessage(res.message || 'Contact submitted successfully.', 'success');
            $('#contact_form')[0].reset();
        },
        onError(res) {
            showToastmessage(res.message || 'Something went wrong. Please try again!', 'error');
        },
    });
});