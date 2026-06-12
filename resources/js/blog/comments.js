import { initAjaxFormValidation } from '../common/form-handler.js';
import { showToastmessage } from '../common/common.js';
import $ from 'jquery';

$(function () {
    if (!$('#blog_comment_form').length) {
        return;
    }

    initAjaxFormValidation('#blog_comment_form', {
        name: { required: true },
        email: { required: true, email: true },
        message: { required: true },
    }, {}, {
        skipRequiredFor: ['name', 'email', 'message'],
        onSuccess(res) {
            showToastmessage(res.message || 'Comment submitted successfully.', 'success');
            $('#blog_comment_form')[0].reset();
            $('#blog_comment_form').find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');
        },
        onError(res) {
            showToastmessage(res.message || 'Something went wrong. Please try again!', 'error');
        },
    });
});
