import { initAjaxFormValidation } from '../common/form-handler.js';
import { showToastmessage } from '../common/common.js';

function updateSidebarProfile(data) {
    if (!data) {
        return;
    }

    const name = data.name || [data.first_name, data.last_name].filter(Boolean).join(' ').trim();

    if (name) {
        $('.user-sidebar-header .fs-16').text(name);
    }
}

initAjaxFormValidation('#profile_settings_form', {
    first_name: { required: true },
    last_name: { required: true },
    email: { required: true, email: true },
    phone: { required: true, digits: true, minlength: 10, maxlength: 15 },
}, {}, {
    skipRequiredFor: ['first_name', 'last_name', 'email', 'phone'],
    onSuccess: function (res) {
        showToastmessage(res.message || 'Profile updated successfully.', 'success');
        updateSidebarProfile(res.data);
    },
    onError: function (res) {
        showToastmessage(res.message || 'Something went wrong!', 'error');
    },
});
