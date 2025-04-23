$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(document).on('submit', '#sendEmailContact', function(e) {
    e.preventDefault();
    var form = $(this);
    var submitBtn = $('#submitBtn');
    submitBtn.prop('disabled', true).text('Processing...');
    $.ajax({
    url: form.attr('action'),
    method: 'POST',
    data: form.serialize(),
    success: function(response) {
        if (response.status) {
            let toast = {
                title: "Alert",
                message: response.message,
                status: response.status,
                timeout: 5000
            }
            Toast.create(toast);
            submitBtn.prop('disabled', false).text('Submit Now');
            form.trigger('reset');
        } else {
    alert('Something went wrong. Please try again.');
    }
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