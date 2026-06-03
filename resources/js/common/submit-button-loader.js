import $ from "jquery";

const LOADING_CLASS = "is-submit-loading";
const SPINNER_HTML = '<span class="btn-submit-spinner" aria-hidden="true"></span>';

function getSubmitControls($form) {
    return $form.find('button[type="submit"], input[type="submit"]');
}

export function setSubmitButtonLoading($btn, isLoading) {
    if (!$btn?.length) {
        return;
    }

    $btn.each(function () {
        const $el = $(this);
        const isButton = $el.is("button");

        if (isLoading) {
            if ($el.data("submit-loading")) {
                return;
            }

            $el.data("submit-loading", true);

            if (isButton) {
                $el.data("submit-btn-original-html", $el.html());
                const label = ($el.attr("data-loading-text") || $el.text().trim() || "Loading").trim();
                $el.html(`${SPINNER_HTML}<span class="btn-submit-label">${label}</span>`);
            } else {
                $el.data("submit-btn-original-value", $el.val());
                $el.val($el.attr("data-loading-text") || "Loading...");
            }

            $el.prop("disabled", true).addClass(LOADING_CLASS).attr("aria-busy", "true");
            return;
        }

        if (!$el.data("submit-loading")) {
            return;
        }

        if (isButton) {
            const originalHtml = $el.data("submit-btn-original-html");
            if (originalHtml !== undefined) {
                $el.html(originalHtml);
            }
            $el.removeData("submit-btn-original-html");
        } else {
            const originalValue = $el.data("submit-btn-original-value");
            if (originalValue !== undefined) {
                $el.val(originalValue);
            }
            $el.removeData("submit-btn-original-value");
        }

        $el.removeData("submit-loading");
        $el.prop("disabled", false).removeClass(LOADING_CLASS).removeAttr("aria-busy");
    });
}

export function setFormSubmitButtonsLoading($form, isLoading) {
    const $formRef = $($form);
    if (!$formRef.length) {
        return;
    }

    const $saveBtn = $formRef.find(".btn-save");
    const $loadingBtn = $formRef.find(".btn-loading");

    if ($saveBtn.length || $loadingBtn.length) {
        getSubmitControls($formRef).prop("disabled", isLoading);

        if (isLoading) {
            $saveBtn.hide();
            $loadingBtn.show();
        } else {
            $saveBtn.show().prop("disabled", false);
            $loadingBtn.hide();
        }
        return;
    }

    getSubmitControls($formRef).each(function () {
        setSubmitButtonLoading($(this), isLoading);
    });
}
