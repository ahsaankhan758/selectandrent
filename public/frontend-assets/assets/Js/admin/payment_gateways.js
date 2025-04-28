$(document).ready(function() {
    var selectedId = null;

    $('#name').on('change', function() {
        selectedId = $(this).val();
        if (selectedId) {
            var url = getPaymentData;
            url = url.replace(':id', selectedId);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#c1').val(data.c1);
                    $('#c2').val(data.c2);
                    $('#c3').val(data.c3);
                    $('#c4').val(data.c4);
                    $('#c5').val(data.c5);
                    $('#dev').val(data.dev);
                    $('#dev_endpoint').val(data.dev_endpoint);
                    $('#pro_endpoint').val(data.pro_endpoint);
                }
            });
        } else {
            $('#gatewayForm').trigger("reset");
        }
    });

    $('#gatewayForm').on('submit', function(e) {
        e.preventDefault();

        if (!selectedId) {
            toastr.warning('Please select a Payment Gateway first.');
            return;
        }

        var paymenturl = updatePaymentData;
        var url = paymenturl.replace(':id', selectedId);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                c1: $('#c1').val(),
                c2: $('#c2').val(),
                c3: $('#c3').val(),
                c4: $('#c4').val(),
                c5: $('#c5').val(),
                dev: $('#dev').val(),
                dev_endpoint: $('#dev_endpoint').val(),
                pro_endpoint: $('#pro_endpoint').val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                toastr.success(response.success);

                setTimeout(function() {
                    location.reload();
                }, 3000); // 1.5 seconds delay
            },
            error: function(xhr) {
                toastr.error('An error occurred while updating.');
            }
        });
    });

    $('#addGatewayForm').submit(function(e) {
        e.preventDefault();
        var gatewayName = $('#newGatewayName').val();

        if (gatewayName.trim() === "") {
            toastr.warning('Gateway name is required.');
            return;
        }

        $.ajax({
            url: addGatewayName,
            type: 'POST',
            data: {
                name: gatewayName
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                $('#addGatewayModal').modal('hide');
                toastr.success('Payment Gateway added successfully!');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            },
            error: function(xhr) {
                toastr.error('An error occurred while adding.');
            }
        });
    });
});
