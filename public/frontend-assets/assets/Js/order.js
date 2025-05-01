$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('submit', '#orderBookingFormSubmit', function(e) {
    e.preventDefault();
    var form = $(this);
    var submitBtn = $('#OrderSubmitBtn');
    var isValid = true;
    // validation for input
    $('#orderBookingFormSubmit input').each(function () {
        var input = $(this);
        if (input.val().trim() === '') {
            input.css('border', '1px solid red');
            isValid = false;
        } else {
            input.css('border', '');
        }
    });
    
    submitBtn.prop('disabled', true).html(`<img src="../frontend-assets/assets/loader.gif" alt="Loading..." width="25">`);
        

    if (isValid) {
        // start ajax
        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                // console.log(response)
                // toaster alert
                    let toast = {
                        title: "Alert",
                        message: response.message,
                        status: response.status,
                        timeout: 5000
                    }
                    Toast.create(toast);
                    // 
                    if(response.status == false){
                        submitBtn.prop('disabled', false).html('<i class="fa-solid fa-cart-shopping"></i> Process to Checkout');
                    }
                    
                    if (response.status && response.redirect_url) {
                        submitBtn.prop('disabled', true).html('<i class="fa-solid fa-cart-shopping"></i> Process to Checkout');
                        window.location.href = response.redirect_url;
                    }
                           
            },
            error: function(xhr) {
                submitBtn.prop('disabled', false).html('<i class="fa-solid fa-cart-shopping"></i> Process to Checkout');
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    $.each(errors, function(key, val) {
                        errorMsg += val[0] + '\n';
                    });
                    alert(errorMsg);
                } else {
                    alert('An unexpected error occurred.');
                }
            }
        });
        // end ajax
    } else {

        let toast = {
            title: "Alert",
            message: 'Please fill all required fields correctly.',
            status: 'Error',
            timeout: 5000
        }
        Toast.create(toast);
        submitBtn.prop('disabled', false).html('<i class="fa-solid fa-cart-shopping"></i> Process to Checkout');
       
    }
    
});