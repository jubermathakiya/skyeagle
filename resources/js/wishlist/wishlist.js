import $ from "jquery";
import { showToastmessage } from "../common/common.js";
import { openLoginModal } from "../common/form-handler.js";

function updateWishlistCount(count) {
    $(".fav-dropdown .count-icon").text(count);

    if ($("#wishlist-page-count").length) {
        $("#wishlist-page-count").text(`Items in Wishlist : ${count}`);
    }
}

$(document).on("click", ".wishlist-toggle", function (e) {
    e.preventDefault();

    const $button = $(this);
    const packageId = $button.data("package-id");
    const url = $button.data("toggle-url");

    $.ajax({
        url,
        type: "POST",
        data: {
            package_id: packageId,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (!res?.status) {
                return;
            }

            showToastmessage?.(res.message, "success");
            $button.toggleClass("selected", !!res.data?.wishlisted);
            updateWishlistCount(res.data?.count ?? 0);

            if ($("#wishlist-items-wrapper").length && !res.data?.wishlisted) {
                $button.closest(".place-item").fadeOut(200, function () {
                    $(this).remove();
                    const remaining = $("#wishlist-items-wrapper .place-item").length;
                    updateWishlistCount(remaining);

                    if (remaining === 0) {
                        window.location.reload();
                    }
                });
            }
        },
        error: function (xhr) {
            const res = xhr.responseJSON;

            if (res?.open_login_modal) {
                showToastmessage?.(
                    res?.message || "Please sign in to save items to your wishlist.",
                    "error"
                );

                openLoginModal();
                return;
            }

            showToastmessage?.(res?.message || "Unable to update wishlist.", "error");
        },
    });
});
