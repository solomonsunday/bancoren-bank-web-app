$('#openAccountForm').submit(function(e){

    e.preventDefault();
   
    const formData = getFormAsJsonData('#openAccountForm')
    const actionUrl = $(this).attr('action')
   

     $.ajax({
         url: actionUrl,
         type: 'POST',
         data: formData,
         beforeSend: function () {
             toggleFullPageLoader(true, 'Open Account');
         },
         success: function (data, status, xhr) {
            
            if(data.status == 1){
                $('.alert-success').html('Account open successfully, login details sent to mail')
                $('.alert-success').css('display','')
                  $('#openAccountForm')[0].reset();

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
             toggleFullPageLoader(false,'Open Account');
         }
     })
})