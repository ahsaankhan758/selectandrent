$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('submit', '#usersignup', function(e) {
    e.preventDefault(); 

    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var password = $('#password').val();
    var confirmPassword = $('#password_confirmation').val();
    var form = $(this); // reference to the form
    var url = form.attr('action'); // get the action attribute
    
    // Optional: Add validation here if needed
    if(!name){
        
        var message = 'Name Required.';
        showToast(message, "error");
        return;
    }
    if (!email || !password) {
        
        var message = 'Both email and password are required.';
        showToast(message, "error");
        return;
    }
    if (!phone) {
        
        var message = 'Phone Number is required.';
        showToast(message, "error");
        return;
    }
    if(password !== confirmPassword){
        
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
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', xhr.responseText);

            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;

                for (let field in errors) {
                    if (errors.hasOwnProperty(field)) {
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


