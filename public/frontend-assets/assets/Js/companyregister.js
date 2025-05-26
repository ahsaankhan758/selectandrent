$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('submit', '#registerForm', function (e) {
    e.preventDefault();

    var form = $(this);
    var submitBtn = form.find('button[type="submit"]');

    submitBtn.prop('disabled', true).text('Processing...');

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function (response) {
            submitBtn.prop('disabled', false).text('Submit');
           let toast = {
                title: "Alert",
                message: response.message,
                status: response.status,
                timeout: 5000
            }
            Toast.create(toast);
            form.trigger('reset');
        },
        error: function (xhr) {
            submitBtn.prop('disabled', false).text('Submit');

            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let errorMsg = '';
                $.each(errors, function (key, val) {
                    errorMsg += val[0] + '<br>';
                });
                let toast = {
                title: "Alert",
                message: errorMsg,
                status: 'error',
                timeout: 5000
            }
            Toast.create(toast);
            } else {
                toastr.error('An unexpected error occurred.');
            }
        }
    });
});
