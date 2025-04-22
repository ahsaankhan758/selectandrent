$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('submit', '#bookingForm', function(e) {
    e.preventDefault();
    var form = $(this);
    var submitBtn = $('#submitBtn');
  
    submitBtn.prop('disabled', true).text('Processing...');

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function(response) {
            submitBtn.prop('disabled', false).text('Order Confirmation');
            // toaster alert
                let toast = {
                    title: "Alert",
                    message: response.message,
                    status: response.status,
                    timeout: 5000
                }
                Toast.create(toast);
                setTimeout(function () {
                    window.location.href = response.redirect_url;
                }, 3000);
                 
        },
        error: function(xhr) {
            submitBtn.prop('disabled', false).text('Order Confirmation');
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
});