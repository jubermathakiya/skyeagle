import { initAjaxFormValidation } from '../common/form-handler.js';
import { showToastmessage } from '../common/common.js';

function normalizeProfilePhone(value) {
    const digits = String(value || '').replace(/\D/g, '');

    return digits.length > 10 ? digits.slice(-10) : digits;
}

function initProfilePhoneInput($) {
    const $phone = $('#profile_phone');

    if (!$phone.length) {
        return;
    }

    $phone.on('input.profilePhone', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
    });
}

function destroySelect2($el) {
    if ($el.hasClass('select2-hidden-accessible')) {
        $el.select2('destroy');
    }
}

function resetSelect($el) {
    destroySelect2($el);
    $el.empty().append($('<option></option>').attr('value', '').text('Select'));
}

function initStateSelect2($, $country, $state, statesUrl, resetAndInitCity) {
    destroySelect2($state);

    $state.select2({
        width: '100%',
        placeholder: 'Select',
        ajax: {
            url: statesUrl,
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    country_id: $country.val() || 0,
                    q: params.term || '',
                };
            },
            processResults: function (response) {
                const rows = response && response.data ? response.data : [];
                return {
                    results: rows.map(function (item) {
                        return { id: item.id, text: item.name };
                    }),
                };
            },
            cache: true,
        },
    });

    $state.off('change.profileAddr').on('change.profileAddr', function () {
        resetAndInitCity();
    });
}

function initCitySelect2($, $state, $city, citiesUrl) {
    destroySelect2($city);

    $city.select2({
        width: '100%',
        placeholder: 'Select',
        ajax: {
            url: citiesUrl,
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    state_id: $state.val() || 0,
                    q: params.term || '',
                };
            },
            processResults: function (response) {
                const rows = response && response.data ? response.data : [];
                return {
                    results: rows.map(function (item) {
                        return { id: item.id, text: item.name };
                    }),
                };
            },
            cache: true,
        },
    });
}

function initProfileAddressPickers($) {
    const $form = $('#profile_settings_form');
    if (!$form.length || !$.fn.select2) {
        return;
    }

    const $country = $('#profile_country_id');
    const $state = $('#profile_state_id');
    const $city = $('#profile_city_id');

    if (!$country.length || !$state.length || !$city.length) {
        return;
    }

    const statesUrl = $form.data('statesUrl');
    const citiesUrl = $form.data('citiesUrl');
    const countriesSearchUrl = $form.data('countriesSearchUrl');

    destroySelect2($state);
    destroySelect2($city);

    $country.select2({
        width: '100%',
        placeholder: 'Select',
        allowClear: false,
        ajax: {
            url: countriesSearchUrl,
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term || '' };
            },
            processResults: function (response) {
                const rows = response.data || [];
                return {
                    results: rows.map(function (item) {
                        return { id: item.id, text: item.name };
                    }),
                };
            },
            cache: true,
        },
    });

    function resetAndInitCity() {
        resetSelect($city);
        initCitySelect2($, $state, $city, citiesUrl);
    }

    initStateSelect2($, $country, $state, statesUrl, resetAndInitCity);
    initCitySelect2($, $state, $city, citiesUrl);

    $country.off('change.profileAddr').on('change.profileAddr', function () {
        resetSelect($state);
        resetSelect($city);
        initStateSelect2($, $country, $state, statesUrl, resetAndInitCity);
        initCitySelect2($, $state, $city, citiesUrl);
    });
}

function updateSidebarProfile(data) {
    if (!data) {
        return;
    }

    const name = data.name || [data.first_name, data.last_name].filter(Boolean).join(' ').trim();

    if (name) {
        $('.user-sidebar-header .fs-16').text(name);
    }
}

window.jQuery(function ($) {
    initProfileAddressPickers($);
    initProfilePhoneInput($);

    initAjaxFormValidation(
        '#profile_settings_form',
        {
            first_name: { required: true },
            last_name: { required: true },
            email: { required: true, email: true },
            phone: { required: true, digits: true, minlength: 10, maxlength: 10 },
            address_line1: { required: true, maxlength: 255 },
            address_line2: { maxlength: 255 },
            country_id: { required: true, digits: true },
            state_id: { required: true, digits: true },
            city_id: { required: true, digits: true },
            postal_code: { maxlength: 32 },
        },
        {
            phone: {
                minlength: 'Enter a valid 10-digit mobile number.',
                maxlength: 'Enter a valid 10-digit mobile number.',
                digits: 'Enter a valid 10-digit mobile number.',
            },
        },
        {
            skipRequiredFor: [
                'first_name',
                'last_name',
                'email',
                'address_line1',
                'country_id',
                'state_id',
                'city_id',
            ],
            beforeSubmit: function () {
                const $phone = $('#profile_phone');
                $phone.val(normalizeProfilePhone($phone.val()));
            },
            onSuccess: function (res) {
                showToastmessage(res.message || 'Profile updated successfully.', 'success');
                updateSidebarProfile(res.data);

                if (res.data?.phone) {
                    $('#profile_phone').val(normalizeProfilePhone(res.data.phone));
                }
            },
            onError: function (res) {
                showToastmessage(res.message || 'Something went wrong!', 'error');
            },
        }
    );
});
