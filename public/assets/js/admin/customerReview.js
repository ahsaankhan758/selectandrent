$(document).ready(function () {
    $('#customer-review-form').on('submit', function (e) {
        alert('submit');
        return;
        e.preventDefault();
       
        let form = $(this);
        let url = form.attr('action');
        let formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (response) {
                let toast = {
                        title: "Alert",
                        message: response.message,
                        status: response.status,
                        timeout: 5000
                    }
                Toast.create(toast);
                $('#reviewModal').modal('hide');
                form.trigger('reset');
                form.find('input[type="radio"]').prop('checked', false);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Show validation errors
                    let errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        let input = form.find('[name="' + field + '"]');
                        input.css('border', '1px solid red');
                        // Optionally show error messages below inputs
                        if (!input.next('.error-text').length) {
                            input.after('<div class="text-danger error-text">' + errors[field][0] + '</div>');
                        }
                    }
                } else {
                    alert('Error: ' + (xhr.responseJSON?.message || 'Something went wrong.'));
                }
            }
        });
    });
});
