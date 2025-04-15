// Set CSRF token for all AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// AJAX call to remove cart item
$(document).on('click', '.remove-btn', function() {
    $(this).html(`<img src="../frontend-assets/assets/loader.gif" alt="Loading..." width="25">`);
    var rowId = $(this).data('rowid');

    $.ajax({
        url: 'cart/remove', 
        method: 'POST',
        data: { rowId: rowId },
        success: function(response) {
            // alert('Item removed from cart.');
            let toast = {
                title: "Alert",
                message: response.message,
                status: response.status,
                timeout: 5000
            }
            Toast.create(toast);
            if (response.status === 'success') {
            setTimeout(function() {
                location.reload();
            }, 2000);} // 5000 ms = 5 seconds
        },
        error: function(xhr, status, error) {
            alert('An error occurred while removing the item.');
            console.error(xhr.responseText);
        }
    });
});
