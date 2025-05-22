$(document).ready(function() {
    $('select[name="location"]').prop('disabled', true); 

    $('select[name="city"]').change(function() {
        var city_id = $(this).val(); 
        loadArea(city_id);
    
    });
    function loadArea(city_id){
        if (city_id) {
            $.ajax({
                url: window.getLocationsUrl + '/' + city_id, 
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                 
                    $('select[name="location"]').prop('disabled', false);
                    
                    $('select[name="location"]').empty();

                    $('select[name="location"]').append('<option value="" selected>Select Area</option>');

                    $.each(data, function(key, value) {
                        $('select[name="location"]').append('<option value="' + value.id + '">' + value.area_name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            $('select[name="location"]').prop('disabled', true);
            $('select[name="location"]').empty();
            $('select[name="location"]').append('<option value="" selected>Select Area</option>');
        }
    }
});
