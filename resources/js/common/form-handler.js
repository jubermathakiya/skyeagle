import { showToastmessage } from '../common/common.js';
import Swal from "sweetalert2";
import $ from "jquery";
import "jquery-validation";

if (!window.$) {
    window.$ = $;
}
if (!window.jQuery) {
    window.jQuery = $;
}

function showMessage(message, type = "success") {
    if (typeof window.showToastmessage === "function") {
        window.showToastmessage(message, type);
        return;
    }

    Swal.fire({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        icon: type === "error" ? "error" : "success",
        title: message || (type === "error" ? "Something went wrong." : "Success")
    });
}

function getFieldErrorAnchor($input) {
    const $iti = $input.closest(".iti");

    if ($iti.length) {
        return $iti;
    }

    const $inputIcon = $input.closest(".input-icon");

    if ($input.closest(".input-group").length) {
        return $input.closest(".input-group");
    }

    if ($inputIcon.length) {
        return $inputIcon;
    }

    if ($input.hasClass("select2-hidden-accessible")) {
        return $input.next(".select2");
    }

    return $input;
}

function placeFieldError($input, message) {
    const $anchor = getFieldErrorAnchor($input);

    $input.addClass("is-invalid").removeClass("is-valid");
    $('<div class="invalid-feedback d-block"></div>').text(message).insertAfter($anchor);
}

export function initAjaxFormValidation(formSelector, rules, messages, extraOptions = {}, arrField = [], rowSelector = "", subrowSelector = "  ") {
    const $form = $(formSelector);
    const setSubmittingState = ($formRef, isSubmitting) => {
        const $submitBtn = $formRef.find('button[type="submit"]');
        const $saveBtn = $formRef.find('.btn-save');
        const $loadingBtn = $formRef.find('.btn-loading');

        $submitBtn.prop("disabled", isSubmitting);

        if ($saveBtn.length || $loadingBtn.length) {
            if (isSubmitting) {
                $saveBtn.hide();
                $loadingBtn.show();
            } else {
                $saveBtn.show().prop("disabled", false);
                $loadingBtn.hide();
            }
        }
    };

    // Initialize validation and capture the validator instance
    const validator = $form.validate({
        ignore: [],
        rules: rules,
        messages: messages,
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        errorPlacement: function(error, element) {
            const skipRequiredFor = extraOptions.skipRequiredFor || [];

            if ((skipRequiredFor.includes(element.attr("name")) || element.attr("name").includes("[]")) && error.text().includes("required")) {
                return;
            }

            error.addClass("invalid-feedback d-block");
            error.insertAfter(getFieldErrorAnchor($(element)));
        },
        highlight: function(element, errorClass, validClass) {
            const name = $(element).attr('name');
            const $el = $(element);
            
            if (this.settings.rules[name]) {
                if ($el.hasClass("select2-hidden-accessible")) {
                    $el.next('.select2').find('.select2-selection').addClass(errorClass).removeClass(validClass);
                    return;
                }
                if ($el.closest('.iti').length) {
                    $el.closest('.iti').addClass(errorClass).removeClass(validClass);
                }
                $(element).addClass(errorClass).removeClass(validClass);
            }

            // for editor
            if ($el.hasClass("editor-hidden-field")) {
                
                const $editorWrap = $el.prev('.snow-editor-cls');
                $editorWrap.find('.ql-editor').addClass(errorClass).removeClass(validClass);
                
                $el.removeClass(errorClass).removeClass(validClass);
                return;
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            const name = $(element).attr('name');
            const $el = $(element);
            if (this.settings.rules[name]) {
                if ($el.hasClass("select2-hidden-accessible")) {
                    $el.next('.select2').find('.select2-selection').addClass(validClass).removeClass(errorClass);
                    return;
                }
                if ($el.closest('.iti').length) {
                    $el.closest('.iti').addClass(validClass).removeClass(errorClass);
                }
                $(element).removeClass(errorClass).addClass(validClass);
            }
            
            // for editor
            if ($el.hasClass("editor-hidden-field")) {
                const $editorWrap = $el.prev('.snow-editor-cls');
                $editorWrap.find('.ql-editor').removeClass(errorClass).addClass(validClass);
                $el.removeClass(errorClass).removeClass(validClass);
                return;
            }
        },
        // submitHandler can call your existing AJAX logic
        submitHandler: function(form) {
            let $form = $(form);
            let submitBtn = $form.find('button[type="submit"]');
            // Run beforeSubmit first so Quill editors (e.g. inclusion/exclusion) sync to hidden inputs
            if (extraOptions.beforeSubmit) {
                if (extraOptions.beforeSubmit($form, null, submitBtn) === false) {
                    return;
                }
            }
            let formData = new FormData(form);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            // Remove old server errors
            $form.find(".is-invalid, .is-valid").removeClass("is-invalid is-valid");
            $form.find(".invalid-feedback").remove();

            var editor = [];
            $('.snow-editor-cls').each(function(i, el){
                // Skip inclusion/exclusion editors – they use name="inclusion" and name="exclusion", not description[]
                let $el = $(el);
                if ($el.attr('id') === 'inclusion_editor' || $el.attr('id') === 'exclusion_editor') {
                    return;
                }
                var html = $el.find(".ql-editor").html();
                var jsonEditor = JSON.stringify(html).slice(1, -1);
                let editorEncode = btoa(jsonEditor);
                editor.push(editorEncode);
            });
            if (editor.length) {
                formData.append("description[]", editor);
            }

            $.ajax({
                url: $form.attr("action"),
                type: $form.attr("method"),
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    setSubmittingState($form, true);
                },
                success: function(response) {
                    if (response.status) {
                        $($form).find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");

                        if (extraOptions.onSuccess) {
                            extraOptions.onSuccess(response);
                        } else {
                            if (extraOptions.stayOnPage) {
                                showMessage(response.message || "Saved successfully", "success");
                            } else if (response.redirect) {
                                window.location.href = response.redirect;
                            } else {
                                showMessage(response.message || "Saved successfully", "success");
                            }
                        }
                    } else {
                        
                        if (extraOptions.onError) {
                            extraOptions.onError(response);
                        } else {
                            showMessage(response.message || "Something went wrong", "error");
                        }
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            if (field.includes('.')) {
                                //for allow only multipale field
                                let fieldName = field.replace(/\.\d+$/, "[]");
                                // find the matching input
                                let input = $(`[name="${fieldName}"]`).eq(field.match(/\d+/)?.[0] || 0);
                                if (input.hasClass("select2")) {
                                    placeFieldError(input, messages[0]);
                                }
                                return;
                            }

                            let input = $form.find('[name="' + field + '"]');
                            placeFieldError(input, messages[0]);
                        });
                    }
                },
                complete: function() {
                    setSubmittingState($form, false);
                    if (extraOptions.onComplete) {
                        extraOptions.onComplete($form);
                    }
                }
            });
        }
    });

    $('.snow-editor-cls').each(function(index) {
        let editorName = `sub_description[${index}][${index}]`;

        // Add rule to hidden input
        $(`input[name="${editorName}"]`).rules("add", {
            editorRequired: `.snow-editor-cls:eq(${index})`,
            messages: {
                editorRequired: ""
            }
        });
    });

    /* if(subrowSelector!='' && rowSelector!=''){

        applyRulesToIndexedFields($form,arrField);
    } */
    if ((Array.isArray(arrField) && arrField.length>0) || (!Array.isArray(arrField) && typeof arrField === 'object' && arrField !== null)) {
        reindexRows($form,rowSelector);
        applyRulesToIndexedFields($form,arrField);
    }
}

$.validator.addMethod("editorRequired", function(value, element, selector) {
    let html = $(selector).find(".ql-editor").html();
    let text = $(selector).find(".ql-editor").text().trim();

    // Valid if editor has any text or images
    return text.length > 0 || html.includes("<img");
}, "");

// remove rule
export function removeRulesValidate($form){
    $form.find('[name]').each(function() {
        try { $(this).rules('remove'); } catch (e) {}
    });
}

export function reindexParentmultipleRows($form,rowSelector,subrowSelector, Remove = false) {
    var count = $('.multi-sight').length;
    if(Remove){
        count =  count - (1);
    }
    let r = 0;
    $form.find(rowSelector).each(function(rowIndex) {
        $(this).find('[name]').each(function() {
            const $el = $(this);
            
            const name = $el.attr('name');
            const bracketCount = (name.match(/\[/g) || []).length;

            if (!name) return;

            // Remove any [] or [x][y] at the end to normalize the base name
            const base = name.replace(/\[\d*\]\[\d*\]$|\[\]$/g, '').replace(/\[\d+\]$/g, '');
            
            if(bracketCount===1){
                $el.attr('name', `${base}[${rowIndex}]`);
            }
        });
        
        $(this).find(subrowSelector).each(function() {
            
            $(this).find('[name]').each(function() {
                const $el = $(this);
                const name = $el.attr('name');
                if (!name) return;

                const bracketCount = (name.match(/\[/g) || []).length;
                
                // Remove any [] or [x][y] at the end to normalize the base name
                const base = name.replace(/\[\d*\]\[\d*\]$|\[\]$/g, '').replace(/\[\d+\]$/g, '');

                if(bracketCount===2){
                    let i = 0;
                    let rowSubIndex = rowIndex;
                    let rowNameIndex = rowIndex;
                    if(Remove && r==count){
                        rowSubIndex = count;
                        rowNameIndex = rowSubIndex + (1);
                    }

                    $('input[name^="'+base+'['+rowNameIndex+']"]').each(function(){
                        const $el = $(this);
                        $el.attr('name', `${base}[${rowSubIndex}][${i}]`);
                        i++;
                    })
                }
                
            });
        });
        r++;
    });
}

export function reindexRows($form,rowSelector) {
    //const rowSelector = '.multi-row-hotel';

    $form.find(rowSelector).each(function(rowIndex) {
        $(this).find('[name]').each(function() {
            const $el = $(this);
            const name = $el.attr('name');
            if (!name) return;

            if (/\[\]$/.test(name)) {
                const base = name.replace(/\[\]$/, '');
                $el.attr('name', `${base}[${rowIndex}]`);
            } else if (/\[\d+\]$/.test(name)) {
                const base = name.replace(/\[\d+\]$/, '');
                $el.attr('name', `${base}[${rowIndex}]`);
            }
        });
    });
}

export function applyRulesToIndexedFields($form,requiredFields) {
    // remove previous rules (safe)
    /* $form.find('[name]').each(function() {
        try { $(this).rules('remove'); } catch (e) {}
    }); */
    if(Array.isArray(requiredFields) && requiredFields.length>0){
        // add rules for each field
        requiredFields.forEach(base => {
            $form.find(`[name^="${base}["]`).each(function() {
                if ($form.data('validator')) {
                    $(this).rules('add', {
                        required: true,
                        messages: {required:''}
                    });
                }
            });
        });
    }
    
    // 2D array field name validation
    if(!Array.isArray(requiredFields) && typeof requiredFields === 'object' && requiredFields !== null){
        Object.keys(requiredFields).forEach(key => {
            if (Array.isArray(requiredFields[key])) {
                requiredFields[key].forEach(value => {
                    $form.find(`[name^="${key}["][name$="[${value}]"]`).each(function () {
                    $(this).rules('add', {
                            required: true,
                            messages: { required: "" }
                        });
                    });
                });
            }
        });
    }
}

export function closeAndResetModal(modalId) {
    $(modalId).modal('hide');
    $(modalId).find('form')[0].reset();
    $(modalId).find('.is-invalid').removeClass('is-invalid');
    $(modalId).find('.invalid-feedback').remove();
}

const LOGIN_MODAL_SELECTOR = '#login-modal';
const LOGIN_MODAL_TRANSITION_MS = 300;

function setLoginModalAnimating($modal, isAnimating) {
    if (isAnimating) {
        $modal.data('login-modal-animating', true);
    } else {
        $modal.removeData('login-modal-animating');
    }
}

function getLoginModalBackdrop() {
    return $(`.modal-backdrop[data-jquery-modal="${LOGIN_MODAL_SELECTOR}"]`);
}

function createLoginModalBackdrop() {
    const backdrop = document.createElement('div');
    backdrop.className = 'modal-backdrop fade login-modal-backdrop';
    backdrop.setAttribute('data-jquery-modal', LOGIN_MODAL_SELECTOR);
    const modalEl = document.querySelector(LOGIN_MODAL_SELECTOR);
    if (modalEl?.parentNode) {
        modalEl.parentNode.insertBefore(backdrop, modalEl);
    } else {
        document.body.appendChild(backdrop);
    }
    return $(backdrop);
}

export function resetLoginForm() {
    if (typeof window.resetLoginModalUI === 'function') {
        window.resetLoginModalUI();
        return;
    }

    const $form = $('#auth_login_form');
    if (!$form.length) {
        return;
    }

    $form[0].reset();

    const validator = $form.data('validator');
    if (validator) {
        validator.resetForm();
    }

    $form.find('.is-invalid, .is-valid').removeClass('is-invalid is-valid');
    $form.find('.invalid-feedback').remove();
    $form.find('button[type="submit"]').prop('disabled', false);
    $('#remembers_me').prop('checked', false);
    $form.find('.pass-input').attr('type', 'password');
    $form.find('.toggle-password i').attr('class', 'isax isax-eye-slash');
}

export function openLoginModal() {
    const $modal = $(LOGIN_MODAL_SELECTOR);
    if (!$modal.length) {
        return;
    }

    resetLoginForm();

    if ($modal.data('login-modal-animating')) {
        return;
    }

    if (typeof bootstrap !== 'undefined') {
        bootstrap.Modal.getInstance($modal[0])?.hide();
    }

    if ($modal.hasClass('show')) {
        return;
    }

    setLoginModalAnimating($modal, true);

    let $backdrop = getLoginModalBackdrop();
    if (!$backdrop.length) {
        $backdrop = createLoginModalBackdrop();
    } else {
        $backdrop.removeClass('show');
    }

    $modal.removeClass('show').css('display', 'block');
    $modal.attr('aria-modal', 'true').removeAttr('aria-hidden');
    $('body').addClass('modal-open');

    void $modal[0].offsetHeight;

    requestAnimationFrame(() => {
        $backdrop.addClass('show');
        $modal.addClass('show').css('z-index', 1060);
        setTimeout(() => setLoginModalAnimating($modal, false), LOGIN_MODAL_TRANSITION_MS);
    });
}

export function closeLoginModal() {
    const $modal = $(LOGIN_MODAL_SELECTOR);
    if (!$modal.length) {
        return;
    }

    const $backdrop = getLoginModalBackdrop();
    const isOpen = $modal.hasClass('show') || $modal.css('display') === 'block';

    if (!isOpen) {
        resetLoginForm();
        $backdrop.remove();
        $('body').removeClass('modal-open').css('padding-right', '');
        return;
    }

    setLoginModalAnimating($modal, true);

    if (typeof bootstrap !== 'undefined') {
        bootstrap.Modal.getInstance($modal[0])?.hide();
    }

    $modal.removeClass('show');
    $backdrop.removeClass('show');

    const finishClose = () => {
        $modal.css({ display: 'none', zIndex: '' });
        $modal.removeAttr('aria-modal').attr('aria-hidden', 'true');
        $backdrop.remove();

        if (!$('.modal.show').length) {
            $('body').removeClass('modal-open').css('padding-right', '');
        }

        resetLoginForm();
        setLoginModalAnimating($modal, false);
    };

    setTimeout(finishClose, LOGIN_MODAL_TRANSITION_MS);
}

export function confirmDelete(url, table = null) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This record will be permanently deleted.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') // safer than hardcoding
                },
                success: function(response) {
                    if (table) {
                        if(response.status){
                            Swal.fire('Deleted!', response.message, 'success');    
                        }else{
                            Swal.fire('Error!',response.message,'error');
                        }                        
                        table.ajax.reload();
                    }else{
                        location.reload();
                    }
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
}


export function submitAjaxForm($form, extraOptions = {}) {

    let formData;

    if ($form.attr("method").toUpperCase() === "GET") {
        formData = $form.serialize();
    } else {
        formData = new FormData($form[0]);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    }

    $.ajax({
        url: $form.attr("action"),
        type: $form.attr("method"),
        data: formData,
        processData: $form.attr("method").toUpperCase() === "GET",
        contentType: $form.attr("method").toUpperCase() === "GET"
            ? 'application/x-www-form-urlencoded; charset=UTF-8'
            : false,

        beforeSend: function () {

            if (extraOptions.beforeSend) {
                extraOptions.beforeSend($form);
            }
        },

        success: function (response) {

            if (extraOptions.onSuccess) {
                extraOptions.onSuccess(response);
            }
        },

        error: function (xhr) {

            if (extraOptions.onError) {
                extraOptions.onError(xhr.responseJSON || {});
            }
        },

        complete: function () {

            if (extraOptions.onComplete) {
                extraOptions.onComplete($form);
            }
        }
    });
}