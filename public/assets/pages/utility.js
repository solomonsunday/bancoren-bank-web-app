(function($) {
    "use strict";
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

window.getFormAsJsonData = function(form_element) {
    let data = {};
    $.map(
        $(`${form_element} input[type="text"],${form_element} select,
            ${form_element} input[type="number"],${form_element} input[type="password"],
            ${form_element} input[type="radio"]:checked, ${form_element} textarea, ${form_element} input[type="date"], ${form_element} input[type="date"] , ${form_element} input[type="email"]`),
        function(elem, idx) {
            if ($(elem).attr("type") === "radio") {
                let name = $(elem).attr("name");
                data = {
                    ...data,
                    [name]: $(`input[type=radio][name=${name}]:checked`).val()
                };
            } else {
                data = {
                    ...data,
                    [$(elem).attr("id")]: $(elem).val()
                };
            }
        }
    );

    return data;
};

window.getFormAsFormData = function(form_element) {
    const formData = new FormData();

    $.map(
        $(
            `${form_element} input,${form_element} select, ${form_element} textarea`
        ),
        function(elem, idx) {
            if ($(elem).attr("type") === "file") {
                formData.append($(elem).attr("id"), $(elem)[0].files[0]);
            } else {
                formData.append($(elem).attr("id"), $(elem).val());
            }
        }
    );
    return formData;
};

window.redirectTo = function(loginUrl, timeout = false) {
    if (timeout === true) {
        setTimeout(function() {
            window.location.href = loginUrl;
        }, 1000);
    } else {
        window.location.href = loginUrl;
    }
};

window.toggleFullPageLoader = function(show, htmldata) {
    if (show !== undefined) {
        if (show === true) {
            $(".login-btn").attr("disabled", true);

            $(".d-none").css("display", "");
            $("#msg").html("");
            $("#msg").append("loading...");
        } else {
            $(".d-none").css("display", "none");
            $("#msg").html("");
            $("#msg").append(htmldata);
            $(".login-btn").attr("disabled", false);
        }
    } else {
        $(".d-none").css("display", "none");
        $("#msg").html("");
        $("#msg").append(htmldata);
        // $('#full-loader').toggleClass("d-none");
    }
};

$("input.monitor").change(function() {
    $(this)
        .parent(".form-group")
        .removeClass("has-danger");
    let id_attr = ($(this).attr("id") || "").toLowerCase();
    $(`#${id_attr}-error-msg`).html("");
});
