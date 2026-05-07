import { initAjaxFormValidation } from '../common/form-handler.js';
import { showToastmessage } from '../common/common.js';

initAjaxFormValidation("#toures_details_form", {
    name: { required: true },
    email: { required: true},
    phone: { required: true,minlength: 10,maxlength: 15,digits: true},
    message: { required: true},
}, {
    
}, {
    skipRequiredFor: ["name", "email","phone","message"],
    onSuccess: function (res) {
        showToastmessage(res.message || "Enquiry submitted successfully.", "success");
        $("#toures_details_form")[0].reset();
    },
    onError: function (res) {
        showToastmessage(res.message || "Something went wrong. Please try again!", "error");
    }
});