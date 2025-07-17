function renderBookingChart(data) {
    $('#morris-bar-example').empty();

    new Morris.Bar({
        element: 'morris-bar-example',
        data: data,
        xkey: 'month',
        ykeys: ['Pending', 'Confirmed', 'Completed', 'Cancelled', 'Refunded'],
        labels: ['Pending', 'Confirmed', 'Completed', 'Cancelled', 'Refunded'],
        barColors: ['#f06115', '#07407B', '#28a745', '#495057', '#8e44ad'],
        hideHover: 'auto',
        resize: true,
        barSizeRatio: 0.75,
        gridTextSize: 10,
        xLabelAngle: 45
    });
}


document.addEventListener("DOMContentLoaded", function () {
    renderBookingChart(window.formattedChartData);
});

$(document).ready(function () {
    $('#options-dropdown, #startDate, #endDate, #country-dropdown').on('change', function () {
        let userId = $('#options-dropdown').val();
        let startdate = $('#startDate').val();
        let enddate = $('#endDate').val();
        let countryId = $('#country-dropdown').val();

        let isValid = false;

        if (userId || countryId) isValid = true;
        if (startdate && enddate) isValid = true;

        if (isValid) {
            $.ajax({
                url: window.bookingDashboardUrl,
                type: 'GET',
                data: {
                    user_id: userId || null,
                    country_id: countryId || null,
                    start_date: startdate || null,
                    end_date: enddate || null
                },
                success: function (response) {
                    $('#dashboardtable').html(response.table);
                    $('#cards-container').html(response.cards);
                    renderBookingChart(response.chartData);
                },
                error: function (xhr) {
                    alert('Data load failed: ' + xhr.statusText);
                }
            });
        }
    });
});
