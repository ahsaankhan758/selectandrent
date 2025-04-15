// Set CSRF token for all AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Handle click on Book Now button
$(document).on('click', '#car-booking-btn', function(e) {
    

    var $button = $(this);
    var carId = $button.data('carid');
    var originalBtnText = $button.html();

    // Show loader on button
    $(this).html(`<img src="../frontend-assets/assets/loader.gif" alt="Loading..." width="25">`);
 
    $.ajax({
        url: "/addToCart", // Make sure this route returns correct URL in the rendered page
        method: 'POST',
        data: {
            id: carId
        },
        success: function(response) {
            console.log(response.message);
            let toast = {
                title: "Alert",
                message: response.message,
                status: response.status,
                timeout: 5000
            }
            Toast.create(toast);
            // 
            setTimeout(function() {
                window.location.href = '/carbooking';
            }, 2000);
            // 5000 ms = 5 seconds
            
        },
        error: function(xhr, status, error) {
            alert('An error occurred while booking the car.');
            console.error(xhr.responseText);
        },
        complete: function() {
            // Reset button in case you don’t reload
            $button.html(originalBtnText);
            $button.prop('disabled', false);
        }
    });
});
