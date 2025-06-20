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
            showToast(response.message, response.status);
            if (response.status === 'success') {
            setTimeout(function() {
                location.reload();
            }, 2000);} // 5000 ms = 5 seconds
        },
        error: function(xhr, status, error) {
            var message = 'An error occurred while removing the item.';
            showToast(message, "error");
            console.error(xhr.responseText);
        }
    });
});
