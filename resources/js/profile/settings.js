import '../../css/profile-crop.css';
import { createProfilePhotoCropper } from './profile-photo-crop.js';
import { initAjaxFormValidation } from '../common/form-handler.js';
import { showToastmessage } from '../common/common.js';

const CROP_SIZE = 300;

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

function syncSelect2SelectedOption($select) {
    const value = $select.val();

    if (!value) {
        return;
    }

    const label = $select.find('option:selected').text().trim();

    if (!label || label === 'Select') {
        return;
    }

    const option = new Option(label, value, true, true);
    $select.empty().append(option).trigger('change');
}

let isHydratingAddress = false;

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

    destroySelect2($country);
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
        if (isHydratingAddress) {
            return;
        }

        resetSelect($city);
        initCitySelect2($, $state, $city, citiesUrl);
    }

    isHydratingAddress = true;

    initStateSelect2($, $country, $state, statesUrl, resetAndInitCity);
    initCitySelect2($, $state, $city, citiesUrl);

    syncSelect2SelectedOption($country);
    syncSelect2SelectedOption($state);
    syncSelect2SelectedOption($city);

    isHydratingAddress = false;

    $country.off('change.profileAddr').on('change.profileAddr', function () {
        if (isHydratingAddress) {
            return;
        }

        resetSelect($state);
        resetSelect($city);
        initStateSelect2($, $country, $state, statesUrl, resetAndInitCity);
        initCitySelect2($, $state, $city, citiesUrl);
    });
}

function setSelect2Value($select, id, label) {
    if (!id || !label) {
        return;
    }

    const option = new Option(label, id, true, true);
    $select.empty().append(option).trigger('change');
}

function updateAddressSelects(data) {
    if (!data || !window.jQuery) {
        return;
    }

    const $ = window.jQuery;
    const $country = $('#profile_country_id');
    const $state = $('#profile_state_id');
    const $city = $('#profile_city_id');

    if (!$country.length || !$state.length || !$city.length) {
        return;
    }

    isHydratingAddress = true;

    if (data.country_id && data.country) {
        setSelect2Value($country, data.country_id, data.country);
    }

    if (data.state_id && data.state) {
        setSelect2Value($state, data.state_id, data.state);
    }

    if (data.city_id && data.city) {
        setSelect2Value($city, data.city_id, data.city);
    }

    isHydratingAddress = false;
}

function updateSidebarProfile(data) {
    if (!data) {
        return;
    }

    const name = data.name || [data.first_name, data.last_name].filter(Boolean).join(' ').trim();

    if (name) {
        $('.user-sidebar-header .fs-16').text(name);
    }

    if (data.profile_photo_url) {
        $('.js-profile-photo-preview, .profile-dropdown img').attr('src', data.profile_photo_url);
    }
}

function initProfilePhotoCropper($) {
    const $form = $('#profile_settings_form');
    const $picker = $('#profile_image_picker');
    const $fileInput = $('#profile_image_input');
    const $removeFlag = $('#remove_profile_image');
    const $removeBtn = $('#profile_image_remove_btn');
    const $cropModal = $('#profile_crop_modal');
    const $cropCanvas = $('#profile_crop_canvas');
    const $cropApplyBtn = $('#profile_crop_apply_btn');
    const defaultPhoto = $form.data('defaultPhoto') || '';

    if (!$picker.length || !$fileInput.length || !$cropModal.length || !$cropCanvas.length) {
        return;
    }

    if (!$cropModal.parent().is('body')) {
        $cropModal.appendTo('body');
    }

    let photoCropper = null;
    let objectUrl = null;
    let pendingImage = null;

    function destroyPhotoCropper() {
        if (photoCropper) {
            photoCropper.destroy();
            photoCropper = null;
        }
    }

    function cleanupCropSession() {
        destroyPhotoCropper();
        pendingImage = null;

        if (objectUrl) {
            URL.revokeObjectURL(objectUrl);
            objectUrl = null;
        }
    }

    function initCropCanvas() {
        if (!pendingImage) {
            return;
        }

        destroyPhotoCropper();
        photoCropper = createProfilePhotoCropper($cropCanvas[0], pendingImage);
    }

    function openCropModal() {
        const modalEl = $cropModal[0];
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);

        const onShown = function () {
            modalEl.removeEventListener('shown.bs.modal', onShown);
            initCropCanvas();
        };

        modalEl.addEventListener('shown.bs.modal', onShown);
        modal.show();
    }

    function setPreview(url) {
        const previewUrl = url || defaultPhoto;
        const $previews = $('#profile_photo_preview, .js-profile-photo-preview');

        $previews.each(function () {
            if (previewUrl) {
                this.src = previewUrl;
            } else {
                this.removeAttribute('src');
            }
        });
    }

    function setCroppedFile(file) {
        const dt = new DataTransfer();
        dt.items.add(file);
        $fileInput[0].files = dt.files;
        $removeFlag.val('0');
    }

    function clearSelectedFile() {
        $fileInput.val('');
        $picker.val('');
    }

    $picker.on('change', function () {
        const file = this.files?.[0];
        this.value = '';

        if (!file) {
            return;
        }

        if (!/^image\/(jpeg|jpg|png|webp)$/i.test(file.type)) {
            showToastmessage('Please choose a JPG, PNG, or WEBP image.', 'error');
            return;
        }

        cleanupCropSession();
        objectUrl = URL.createObjectURL(file);

        const preload = new Image();

        preload.onload = function () {
            pendingImage = preload;
            openCropModal();
        };

        preload.onerror = function () {
            showToastmessage('Unable to load this image. Please try another file.', 'error');
            cleanupCropSession();
        };

        preload.src = objectUrl;
    });

    $cropModal.on('hidden.bs.modal', function () {
        cleanupCropSession();
    });

    $cropApplyBtn.on('click', function () {
        if (!photoCropper) {
            showToastmessage('Crop tool is not ready. Please try uploading again.', 'error');
            return;
        }

        const canvas = photoCropper.getCroppedCanvas(CROP_SIZE);

        if (!canvas) {
            showToastmessage('Unable to crop this image. Please try another file.', 'error');
            return;
        }

        const previewUrl = canvas.toDataURL('image/jpeg', 0.92);

        canvas.toBlob(function (blob) {
            if (!blob) {
                showToastmessage('Unable to process image. Please try again.', 'error');
                return;
            }

            const croppedFile = new File([blob], 'profile.jpg', { type: 'image/jpeg' });
            setCroppedFile(croppedFile);
            setPreview(previewUrl);
            bootstrap.Modal.getInstance($cropModal[0])?.hide();
            showToastmessage('Photo ready. Click Save to update your profile.', 'success');
        }, 'image/jpeg', 0.92);
    });

    $removeBtn.on('click', function () {
        clearSelectedFile();
        $removeFlag.val('1');
        setPreview(defaultPhoto);
        showToastmessage('Profile photo removed. Click Save to apply.', 'success');
    });
}

window.jQuery(function ($) {
    initProfileAddressPickers($);
    initProfilePhoneInput($);
    initProfilePhotoCropper($);

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
            first_name: { required: 'First name is required.' },
            last_name: { required: 'Last name is required.' },
            email: { required: 'Email is required.', email: 'Enter a valid email address.' },
            phone: {
                required: 'Phone number is required.',
                minlength: 'Enter a valid 10-digit mobile number.',
                maxlength: 'Enter a valid 10-digit mobile number.',
                digits: 'Enter a valid 10-digit mobile number.',
            },
            address_line1: { required: 'Address is required.' },
            country_id: { required: 'Please select a country.' },
            state_id: { required: 'Please select a state.' },
            city_id: { required: 'Please select a city.' },
        },
        {
            beforeSubmit: function () {
                const $phone = $('#profile_phone');
                $phone.val(normalizeProfilePhone($phone.val()));
            },
            onSuccess: function (res) {
                showToastmessage(res.message || 'Profile updated successfully.', 'success');
                updateSidebarProfile(res.data);
                updateAddressSelects(res.data);

                if (res.data?.phone) {
                    $('#profile_phone').val(normalizeProfilePhone(res.data.phone));
                }

                if (res.data?.profile_photo_url) {
                    $('#remove_profile_image').val('0');
                    $('#profile_image_input').val('');
                    $('#profile_image_picker').val('');
                }
            },
            onError: function (res) {
                showToastmessage(res.message || 'Something went wrong!', 'error');
            },
            onInvalid: function () {
                showToastmessage('Please fill in all required fields.', 'error');
            },
            onValidationError: function () {
                showToastmessage('Please correct the highlighted fields.', 'error');
            },
        }
    );
});
