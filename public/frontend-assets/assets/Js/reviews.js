$(document).on('click', '#getVehicleId', function() {
    const vehicleId = $(this).data('vehicle-id');
    $('#modal_vehicle_id').val(vehicleId);
  });
$(document).ready(function(){

    $('#reviewForm').on('submit', function (e) {
        
        e.preventDefault();

        let form = $(this);
        let url = form.attr('action');
        let formData = form.serialize();
       
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (response) {

                // Success handling (you can customize this)
                var toast = {
                    title: "Alert",
                    message: response.message,
                    status: response.status,
                    timeout: 5000
                }
                Toast.create(toast);
                $('#reviewModal').modal('hide');
                form.trigger('reset');
            },
            error: function (xhr) {
                // Optional: Display validation errors
                alert('Error: ' + (xhr.responseJSON.message || 'Something went wrong.'));
            }
        });
    });

});
  