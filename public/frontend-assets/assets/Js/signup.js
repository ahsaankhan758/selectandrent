$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Clear field error state when user starts typing
$(document).on('input', '#usersignup input', function () {
    $(this).closest('.input-group').removeClass('input-error');
});

$(document).on('submit', '#usersignup', function(e) {
    e.preventDefault(); 

    // Reset previous error highlights
    $('#usersignup .input-group').removeClass('input-error');

    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var password = $('#password').val();
    var confirmPassword = $('#password_confirmation').val();
    var form = $(this); // reference to the form
    var url = form.attr('action'); // get the action attribute
    
    // Client-side validation with visual feedback
    if(!name){
        $('#name').closest('.input-group').addClass('input-error');
        var message = 'Name Required.';
        showToast(message, "error");
        return;
    }
    if (!email || !password) {
        if (!email) {
            $('#email').closest('.input-group').addClass('input-error');
        }
        if (!password) {
            $('#password').closest('.input-group').addClass('input-error');
        }
        var message = 'Both email and password are required.';
        showToast(message, "error");
        return;
    }
    if (!phone) {
        $('#phone').closest('.input-group').addClass('input-error');
        var message = 'Phone Number is required.';
        showToast(message, "error");
        return;
    }
    if(password !== confirmPassword){
        $('#password').closest('.input-group').addClass('input-error');
        $('#password_confirmation').closest('.input-group').addClass('input-error');
        var message = 'Password and Confirm Password are not Same.';
        showToast(message, "error");
        return;
    }
    
    $.ajax({
        url: url, // double-check your route name
        type: "POST",
        data: {
            name: name,
            email: email,
            phone: phone,
            password: password,
            password_confirmation:confirmPassword,
            _token: $('meta[name="csrf-token"]').attr('content')// Laravel CSRF token
        },
        success: function(response) {
            
            showToast(response.message, response.status);
            
            if (response.status === 'Success') {
                let modal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
                if (modal) modal.hide();
                document.getElementById('usersignup').reset();
                $('#usersignup .input-group').removeClass('input-error');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', xhr.responseText);

            $('#usersignup .input-group').removeClass('input-error');

            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                let errors = xhr.responseJSON.errors;
                var fieldMap = {
                    name: '#name',
                    email: '#email',
                    phone: '#phone',
                    password: '#password',
                    password_confirmation: '#password_confirmation'
                };

                for (let field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        if (fieldMap[field]) {
                            $(fieldMap[field]).closest('.input-group').addClass('input-error');
                        }
                        errors[field].forEach(function(message) {
                            showToast(message, "error");
                        });
                    }
                }
            } else {
                var message = "Something went wrong. Please try again.";
                showToast(message, "error");
            }
        }
    });
});
