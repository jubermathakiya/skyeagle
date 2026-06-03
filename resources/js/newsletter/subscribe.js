import { initAjaxFormValidation } from "../common/form-handler.js";
import { showToastmessage } from "../common/common.js";
import $ from "jquery";

if ($("#newsletter_subscribe_form").length) {
  initAjaxFormValidation(
    "#newsletter_subscribe_form",
    {
      email: { required: true, email: true },
    },
    {},
    {
      skipRequiredFor: ["email"],
      onSuccess: function (res) {
        showToastmessage(res.message || "Subscribed successfully.", "success");
        $("#newsletter_subscribe_form")[0].reset();
      },
      onError: function (res) {
        showToastmessage(res.message || "Something went wrong. Please try again!", "error");
      },
    }
  );
}

