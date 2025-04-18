$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('submit', '#usersignup', function(e) {
    e.preventDefault(); 
    console.log('here');

    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var confirmPassword = $('#password_confirmation').val();
    var form = $(this); // reference to the form
    var url = form.attr('action'); // get the action attribute
    
    // Optional: Add validation here if needed
    if(!name){
        alert('Name Required.');
        return;
    }
    if (!email || !password) {
        alert('Both email and password are required.');
        return;
    }
    if(password !== confirmPassword){
        alert('Password and Confirm Password are not Same.');
        return;
    }
    
    $.ajax({
        url: url, // double-check your route name
        type: "POST",
        data: {
            name: name,
            email: email,
            password: password,
            password_confirmation:confirmPassword,
            _token: $('meta[name="csrf-token"]').attr('content')// Laravel CSRF token
        },
        success: function(response) {
            // console.log(response)
            console.log(response.message);
            let toast = {
                title: response.status,
                message: response.message,
                status: response.status,
                timeout: 5000
            }
            Toast.create(toast);
            
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
                            alert(message); // Or use Toast.create for styled messages
                        });
                    }
                }
            } else {
                alert("Something went wrong. Please try again.");
            }
        }
    });
});
