$('#transfer_type').on('change', function(){
    let value = $(this).val()

  
   if(value === "2"){
       $('#option').css('display', '')
   }else if(value ===  "1"){
         $('#option').css('display', 'none')
   }

})


$('#send-money').submit(function(e){

    e.preventDefault();
    
     const formData = getFormAsJsonData('#send-money')
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
                $('.alert').html('Transaction Done Successfully')
                $('#send-money')[0].reset();



            }
                 
          },
          error: function (jqXhr, textStatus, errorMessage) {
              const data = jqXhr.responseJSON;
              const errors = data.errors || data.message || data.data || data;

              if (data.message == "Unauthenticated") {
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
                  $('.alert').remove('alert-success');
                    $('.alert').addClass('alert-danger')
                    $('.alert').css('display', '')
                 
                  $('.alert').html(errors)
              }
          },
          complete: function () {
              toggleFullPageLoader(false, 'Submit');
          }
      })

})