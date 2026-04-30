import { initAjaxFormValidation,showToastmessage } from '../common/form-handler.js';

initAjaxFormValidation("#contact_form", {
    name: { required: true },
    email: { required: true },
    phone: { required: true,  minlength: 10,maxlength: 15,digits: true },
    message: { required: true },
}, {}, {
    skipRequiredFor: ["name", "email", "phone", "message"],
    onSuccess: function (res) {
        $("#contact_form")[0].reset();
        showToastmessage(res.message)
    },
    onError: function (res) {
        if (typeof window.showToastmessage === "function") {
            window.showToastmessage(res.message || "Something went wrong!", "error");
        }
    }
});