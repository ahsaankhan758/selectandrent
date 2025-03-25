$(document).ready(function () {
    $('#transmission-filter, #sort-filter').on('change', function () {
        fetchFilteredCars();
    });

    function fetchFilteredCars() {
        let transmission = $('#transmission-filter').val();
        let sort = $('#sort-filter').val();

        $.ajax({
            url: carListingRoute,
            type: "GET",
            data: {
                transmission: transmission,
                sort: sort
            },
            success: function (response) {
                $('#car-list').html(response.html);
                $('#current-count').text(response.filteredCount); // Update count dynamically
            }
        });
    }
});