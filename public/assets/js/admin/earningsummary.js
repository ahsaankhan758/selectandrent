// pie chart
$(document).ready(function () {
    let donutChart;
    const legendColors = ['#07407B', '#f06115', '#ebeff2', '#28a745'];

    function renderChart(data, period = 'this_week') {
        const total = data.reduce((sum, d) => sum + d.value, 0);

        let chartData = data;
        let chartColors = legendColors;

        if (total === 0 && period === 'this_week') {
            chartData = [{ label: "Confirmed", value: 100 }];
            chartColors = [legendColors[0]]; 
        }

        $('#lifetime-sales').empty();

        donutChart = new Morris.Donut({
            element: 'lifetime-sales',
            data: chartData,
            colors: chartColors,
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



// booking chart 

document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("bookingsChart").getContext("2d");

    let chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [],
            datasets: [{
                label: "Bookings",
                data: [],
                backgroundColor: [],
                borderRadius: 5,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    enabled: true,
                    backgroundColor: "#000",
                    bodyColor: "#fff",
                    displayColors: false,
                    titleColor: "#ddd",
                    padding: 10,
                    callbacks: {
                        title: function (tooltipItems) {
                            return `Date: ${tooltipItems[0].label}`;
                        },
                        label: function (tooltipItem) {
                            return `Bookings: ${tooltipItem.raw}`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 10,
                },
            },
            onHover: (event, chartElement) => {
                if (chartElement.length) {
                    const index = chartElement[0].index;
                    const backgroundColors = chart.data.datasets[0].data.map((_, i) => i === index ? 'orange' : 'navy');
                    chart.data.datasets[0].backgroundColor = backgroundColors;
                    chart.update();
                }
            }
        },
    });

    function fetchData(type = 'this_year') {
        fetch(`${window.bookingChartRoute}?type=${type}`)
            .then((res) => res.json())
            .then((response) => {
                chart.data.labels = response.labels;
                chart.data.datasets[0].data = response.data;
                chart.data.datasets[0].backgroundColor = response.data.map((_, i) => i === 5 ? 'orange' : 'navy');
                chart.update();

                const labelMap = {
                    'this_year': 'This Year',
                    'month': 'This Month',
                    'last_month': 'Last Month'
                };
                document.getElementById('bookingDropdown').textContent = labelMap[type] || 'Select Range';
            });
    }

    window.updateChart = fetchData;
    fetchData('this_year');
});


// earning summary 

document.addEventListener("DOMContentLoaded", function () {
    let chart;

    function initChart(labels, data) {
        var options = {
            chart: {
                type: 'line',
                height: 300,
                toolbar: { show: false }
            },
            series: [{
                name: "Earnings",
                data: data
            }],
            xaxis: {
                categories: labels
            },
            stroke: { curve: 'smooth', width: 3 },
            markers: {
                size: 0,
                hover: { size: 6, colors: ['#07407B'] }
            },
            colors: ['#07407B'],
            tooltip: {
                enabled: true,
                x: { show: true },
                y: {
                    formatter: (val) => `$${parseFloat(val).toLocaleString()}`
                }
            }
        };

        chart = new ApexCharts(document.querySelector("#earnings-chart"), options);
        chart.render();
    }

    window.fetchEarnings = function(months = 12, label = 'Last 12 Months') {
        fetch(`${window.earningsdata}?months=${months}`)
            .then(response => response.json())
            .then(data => {
                if (chart) {
                    chart.updateOptions({
                        series: [{ data: data.data }],
                        xaxis: { categories: data.labels }
                    });
                } else {
                    initChart(data.labels, data.data);
                }

                document.getElementById("dropdownBtn").innerText = label;
            });
    };

    fetchEarnings(12, 'Last 12 Months');
});
