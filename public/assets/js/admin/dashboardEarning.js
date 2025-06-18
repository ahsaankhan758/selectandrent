document.addEventListener("DOMContentLoaded", function () {
    new Morris.Bar({
        element: 'morris-bar-example',
        data: formattedChartData,
        xkey: 'month',
        ykeys: ['Pending', 'Confirmed', 'Completed'],
        labels: ['Pending', 'Confirmed', 'Completed'],
        barColors: ['#4fc6e1', '#98a6ad', '#1abc9c'],
        hideHover: 'auto',
        resize: true,
        barSizeRatio: 0.75,
        gridTextSize: 10,
        xLabelAngle: 45
    });
});
