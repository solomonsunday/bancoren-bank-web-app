$('#make-request').submit(function(e) {

    e.preventDefault();

   const formData = getFormAsJsonData('#make-request')
   console.log(formData)
   const actionUrl = $(this).attr('action')

    $.ajax({
        url: actionUrl,
        type: 'POST',
        data: formData,
        beforeSend: function () {
            toggleFullPageLoader(true, 'Submit');
        },
        success: function (data, status, xhr) {

            if (data.status == 1) {
               $('.alert').remove('alert-danger');
               $('.alert').addClass('alert-success')
               $('.alert').css('display', '')
               $('.alert').html(data.message)
               $('#make-request')[0].reset();

            }

        },
        error: function (jqXhr, textStatus, errorMessage) {
            const data = jqXhr.responseJSON;
            const errors = data.errors || data.message || data.data || data;

            if (data.status == 401) {
                redirectTo('../');
            }

            if (typeof errors === "object") {
                Object.keys(data.errors).forEach(function (key) {
                    let selector = $('.alert');
                    selector.remove('alert-success');
                    selector.addClass('alert-danger')
                    selector.css('display', '')
                    selector.html(errors[key][0]);
                    selector.fadeIn();
                });

            } else {
                let selector = $('.alert');
                    selector.remove('alert-success');
                    selector.addClass('alert-danger')
                    selector.css('display', '')
                    selector.html(errors);
            }
        },
        complete: function () {
            toggleFullPageLoader(false, 'Submit');
        }
    })
})