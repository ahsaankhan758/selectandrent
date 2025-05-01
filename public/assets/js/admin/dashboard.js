$(document).ready(function () {
    let donutChart;
    const legendColors = ['#07407B', '#f06115', '#ebeff2', '#28a745'];

    function renderChart(data) {
        const total = data.reduce((sum, d) => sum + d.value, 0);
        const chartData = total === 0
            ? [
                { label: "Confirmed", value: 25 },
                { label: "Pending", value: 25 },
                { label: "Cancelled", value: 25 },
                { label: "Completed", value: 25 }
            ]
            : data;

        $('#lifetime-sales').empty();

        donutChart = new Morris.Donut({
            element: 'lifetime-sales',
            data: chartData,
            colors: legendColors,
            formatter: function (y, dataItem) {
                const actualItem = data.find(d => d.label === dataItem.label);
                return (actualItem?.value ?? 0) + '%';
            }
        });

        const legendContainer = document.querySelector('#lifetime-sales').parentElement;
        legendContainer.querySelectorAll('.d-flex.px-3').forEach(e => e.remove());

        const labels = ['confirmed', 'pending', 'cancelled', 'completed'];
        labels.forEach((label, i) => {
            const percentage = data.find(d => d.label.toLowerCase() === label)?.value ?? 0;
            const legend = `
                <div class="d-flex justify-content-between px-3">
                    <span>
                        <i class="mdi mdi-square" style="color: ${legendColors[i]}"></i>
                        ${label.charAt(0).toUpperCase() + label.slice(1)}
                    </span>
                    <span>${percentage}%</span>
                </div>
            `;
            legendContainer.insertAdjacentHTML('beforeend', legend);
        });
    }

    function loadDefaultChart() {
        const defaultFilter = 'week';
        $.ajax({
            url: window.orderStatusRoute,
            type: 'GET',
            data: { filter: defaultFilter },
            success: function (response) {
                const chartData = [
                    { label: "Confirmed", value: response.confirmed.percentage },
                    { label: "Pending", value: response.pending.percentage },
                    { label: "Cancelled", value: response.cancelled.percentage },
                    { label: "Completed", value: response.completed.percentage }
                ];
                renderChart(chartData);
                $('.chart-dropdown-toggle').html('This Week <i class="fas fa-angle-down ms-2"></i>');
            },
            error: function () {
                alert('Failed to load default chart data.');
            }
        });
    }

    loadDefaultChart();

    $('.filter-option').on('click', function (e) {
        e.preventDefault();
        const filter = $(this).data('filter');

        $.ajax({
            url: window.orderStatusRoute,
            type: 'GET',
            data: { filter: filter },
            success: function (response) {
                const chartData = [
                    { label: "Confirmed", value: response.confirmed.percentage },
                    { label: "Pending", value: response.pending.percentage },
                    { label: "Cancelled", value: response.cancelled.percentage },
                    { label: "Completed", value: response.completed.percentage }
                ];
                renderChart(chartData);
            },
            error: function () {
                alert('Failed to load data.');
            }
        });
        $(this).closest('.dropdown').find('.chart-dropdown-toggle').html($(this).text() + ' <i class="fas fa-angle-down ms-2"></i>');
    });
});
