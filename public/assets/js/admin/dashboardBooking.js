document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('bookingsChart').getContext('2d');
    let chart;

    function loadChartData(months = 12) {
        fetch(`${window.bookingOverviewDataRoute}?months=${months}`)
            .then(res => res.json())
            .then(data => {
                const labels = data.map(d => d.month);
                const confirmed = data.map(d => d.confirmed);
                const cancelled = data.map(d => -d.cancelled); 

                if (chart) {
                    chart.data.labels = labels;
                    chart.data.datasets[0].data = confirmed;
                    chart.data.datasets[1].data = cancelled;
                    chart.update();
                } else {
                    chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: 'Confirmed',
                                    data: confirmed,
                                    backgroundColor: '#F7A93F',
                                    borderRadius: 8,
                                    barThickness: 20 
                                },
                                {
                                    label: 'Cancelled',
                                    data: cancelled,
                                    backgroundColor: '#07407B',
                                    borderRadius: 8,
                                    barThickness: 20 
                                }
                            ]
                            
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            layout: {
                                padding: {
                                    bottom: 30 
                                }
                            },
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    callbacks: {
                                        label: function (context) {
                                            const label = context.dataset.label || '';
                                            const value = Math.abs(context.parsed.y);
                                            return `${label}: ${value}`;
                                        }
                                    },
                                    backgroundColor: "#EAF4FC",
                                    titleColor: "#000",
                                    titleFont: { size: 12 },
                                    bodyColor: "#000",
                                    bodyFont: { weight: 'bold' },
                                    displayColors: false
                                }
                            },
                            scales: {
                                x: {
                                    stacked: true,
                                    grid: { display: false }
                                },
                                y: {
                                    stacked: true,
                                    grid: { color: "#ddd" },
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1,
                                        callback: function (value) {
                                            return Math.abs(value);
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            });
    }

    loadChartData();

    document.getElementById('monthSelector').addEventListener('change', function () {
        loadChartData(this.value);
    });
});
