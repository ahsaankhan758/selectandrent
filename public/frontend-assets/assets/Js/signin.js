$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('submit', '#usersignin', function(e) {
    e.preventDefault(); 

    // console.log('heresignin');

    var email = $('#get-email').val();
    var password = $('#get-password').val();
    var user_status = $('#get-user_status').val();
    var form = $(this); // reference to the form
    var url = form.attr('action'); // get the action attribute
    
    // Optional: Add validation here if needed
    if (!email || !password) {

        Toast.create({
            title: 'Validation Error',
            message: 'Both email and password are required.',
            timeout: 4000
        });

        return;
    }

    $.ajax({
        url: url, // double-check your route name
        type: "POST",
        data: {
            email: email,
            password: password,
            user_status: user_status,
            _token: $('meta[name="csrf-token"]').attr('content')// Laravel CSRF token
        },
        success: function(response) {
            // console.log(response)

            //console.log(response.message);

            let toast = {
                title: response.status,
                message: response.message,
                status: response.status,
                timeout: 5000
            }
            Toast.create(toast);
            // 
            if (response.status === 'Success') {
                let modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                if (modal) modal.hide();
                setTimeout(function() {
                    // Replace the content in #getStartedButton with server-rendered HTML
                    $('#getStartedButton').html(response.html);
                    $('#getStartedButtonMobile').html(response.html);
                }, 1000); // add a slight delay if needed
            }
            
        },
        error: function(xhr, status, error) {
            console.error('Error:', xhr.responseText);
            // Show error message
        }
    });
});
