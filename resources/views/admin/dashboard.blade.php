@extends('admin.layouts.Master')
@section('title') {{__('messages.dashboard') }} @endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Dashboard 4</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard 4</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    <!-- added by farhan -->
    <div class="row">
        <!-- 8 Column Section -->
        <div class="col-xl-8 col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-dollar-sign"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                <h2 class="text-dark">$8,450</h2>
                            </div>
                        </div>
                        <div class="text-success small  ms-5">
                            <span class="change-box"><i class="fa fa-arrow-up"></i> +2.86%</span> from last week
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">New Bookings</h6>
                                <h2 class="text-dark">386</h2>
                            </div>
                        </div>
                        <div class="text-success small  ms-5">
                            <span class="change-box"><i class="fa fa-arrow-up"></i> +1.73%</span> from last week
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-car"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Rented Cars</h6>
                                <h2 class="text-dark">214 Unit</h2>
                            </div>
                        </div>
                        <div class="text-danger small ms-5">
                            <span class="change-box danger"><i class="fa fa-arrow-down"></i> -2.86%</span> from last week
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-car-side"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Available Cars</h6>
                                <h2 class="text-dark">89 Unit</h2>
                            </div>
                        </div>
                        <div class="text-success small  ms-5">
                            <span class="change-box"><i class="fa fa-arrow-up"></i> +3.45%</span> from last week
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 4 Column Section (Rent Status Card) -->
        <div class="col-xl-4 col-md-4">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">Rent Status</h4>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                This Week <i class="fas fa-angle-down ms-2"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                    </div>
        
                    <div id="cardCollapseRentStatus" class="collapse show">
                        <div class="text-center pt-3">
                            <div dir="ltr">
                                <div id="lifetime-sales" data-colors="#f06115,#07407B,#ebeff2" style="height: 270px;" class="morris-chart mt-3"></div>                
                            </div>
        
                            <div class="mt-3 mb-3">
                                <div class="d-flex justify-content-between px-3">
                                    <span><i class="mdi mdi-square" style="color:#07407B"></i> Hired</span>
                                    <span>58% ↑</span>
                                </div>
                                <div class="d-flex justify-content-between px-3">
                                    <span><i class="mdi mdi-square" style="color:#f06115"></i> Pending</span>
                                    <span>24% ↓</span>
                                </div>
                                <div class="d-flex justify-content-between px-3">
                                    <span><i class="mdi mdi-square" style="color:#ebeff2"></i> Cancelled</span>
                                    <span>18% ↑</span>
                                </div>
                            </div>
        
                        </div>
                    </div> <!-- end collapse-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->                            
    </div>
    <!-- added by farhan -->
    <div class="row">
    <div class="col-xl-8 col-md-8 summary">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Earnings Summary</h4>
                    <div class="dropdown">
                        <button id="dropdownBtn" class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Last 8 Months <i class="fas fa-angle-down ms-2"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" onclick="updateChart(3, 'Last 3 Months')">Last 3 Months</a>
                            <a class="dropdown-item" href="#" onclick="updateChart(6, 'Last 6 Months')">Last 6 Months</a>
                            <a class="dropdown-item" href="#" onclick="updateChart(8, 'Last 8 Months')">Last 8 Months</a>
                            <a class="dropdown-item" href="#" onclick="updateChart(12, 'Last 12 Months')">Last 12 Months</a>
                        </div>
                    </div>
                </div>
    
                <div id="earnings-chart" style="height: 300px;"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body reminder-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Reminders</h5>
                    <button class="btn btn-light btn-sm rounded-circle"><i class="mdi mdi-plus"></i></button>
                </div>
                <div class="mt-3">
                    <!-- Reminder 1 -->
                    <div class="reminder-item">
                        <div class="reminder-icon">
                            <i class="mdi mdi-alert-circle-outline"></i>
                        </div>
                        <div>
                            <p class="mb-1 reminder-text">Inspect and service the fleet vehicles.</p>
                            <small class="text-muted">2028-08-10</small>
                        </div>
                    </div>
                    <div class="reminder-item">
                        <div class="reminder-icon">
                            <i class="mdi mdi-alert-circle-outline"></i>
                        </div>
                        <div>
                            <p class="mb-1 reminder-text">Inspect and service the fleet vehicles.</p>
                            <small class="text-muted">2028-08-10</small>
                        </div>
                    </div>
                    <!-- Reminder 2 -->
                    <div class="reminder-item">
                        <div class="reminder-icon">
                            <i class="mdi mdi-alert-circle-outline"></i>
                        </div>
                        <div>
                            <p class="mb-1 reminder-text">Update the car rental pricing plans for the upcoming season.</p>
                            <small class="text-muted">2028-08-12</small>
                        </div>
                    </div>
                    <!-- Reminder 3 -->
                    <div class="reminder-item">
                        <div class="reminder-icon">
                            <i class="mdi mdi-alert-circle-outline"></i>
                        </div>
                        <div>
                            <p class="mb-1 reminder-text">Review customer feedback and implement improvements.</p>
                            <small class="text-muted">2028-08-15</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                       
    </div>                        
    <div class="row">
        <div class="col-xl-8 col-md-8 summary2">
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Bookings Overview</h3>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="bookingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            This Year <i class="fas fa-angle-down ms-2"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="bookingDropdown">
                            <li><a class="dropdown-item" href="#" onclick="updateChart('year')">This Year</a></li>
                            <li><a class="dropdown-item" href="#" onclick="updateChart('month')">This Month</a></li>
                        </ul>
                    </div>
                </div>
                <canvas id="bookingsChart"></canvas>
            </div>
        </div>       
    </div>
    <!-- <div class="row"> -->
        <div class="booking-container mt-2">
            <div class="booking-header-section">
                <h2 class="mb-0">Car Bookings</h2>
                <div class="d-flex align-items-center gap-5">
                <div class="booking-search-box mr-2">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search client name, car, etc">
                </div>
                <select id="statusFilter" class="form-select booking-filter-box mr-2">
                    <option value=""> <i class="fa fa-filter"></i>Status</option>
                    <option value="Returned">Returned</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Pending">Pending</option>
                </select>
                <select id="carTypeFilter" class="form-select booking-filter-box mr-2">
                    <option value=""><i class="fa fa-filter"></i> Car Type</option>
                    <option value="Toyota Corolla">Toyota Corolla</option>
                    <option value="Honda Civic">Honda Civic</option>
                    <option value="Nissan Altima">Nissan Altima</option>
                </select>
                </div>
            </div>
            <table id="myTable" class="table table-striped booking-table overflow-x-auto">
                <thead class="text-nowrap">
                <tr>
                    <th>Booking ID</th>
                    <th>Booking Date</th>
                    <th>Client Name</th>
                    <th>Car Model</th>
                    <th>Plan</th>
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>BK-WZ1001</td>
                    <td>Aug 1, 2028</td>
                    <td>Alice Johnson</td>
                    <td>Toyota Corolla <span class="car-number">ABC-1234</span></td>
                    <td>2 Days</td>
                    <td>Aug 1, 2028 - Aug 2, 2028</td>
                    <td>$50 <br><span class="status paid">Paid</span></td>
                    <td><span class="status-badge status-returned">Returned</span></td>
                </tr>
                <tr>
                    <td>BK-WZ1002</td>
                    <td>Aug 1, 2028</td>
                    <td>Bob Smith</td>
                    <td>Honda Civic <span class="car-number">XYZ-5678</span></td>
                    <td>7 Days</td>
                    <td>Aug 1, 2028 - Aug 8, 2028</td>
                    <td>$350 <span class="status pending">Pending</span></td>
                    <td><span class="status-badge status-ongoing">Ongoing</span></td>
                </tr>
                <tr>
                    <td>BK-WZ1005</td>
                    <td>Aug 3, 2028</td>
                    <td>Edward Green</td>
                    <td>Nissan Altima <span class="car-number">LMN-9101</span></td>
                    <td>8 Days</td>
                    <td>Aug 3,2028 - Aug 10,2028</td>
                    <td>$350 <span class="status pending">Pending</span></td>
                    <td><span class="status-badge status-cancelled">Cancelled</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    <!-- Plugins js -->
    <script src="assets/libs/morris.js06/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>
    <!-- Dashboard init-->
    <script src="assets/js/pages/dashboard-4.init.js"></script>
    
    <!-- ApexCharts Library -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                
    <script>
        var earningsData = [
            { month: 'Jan', earnings: 12000 },
            { month: 'Feb', earnings: 10000 },
            { month: 'Mar', earnings: 11000 },
            { month: 'Apr', earnings: 18450 },
            { month: 'May', earnings: 12500 },
            { month: 'Jun', earnings: 15000 },
            { month: 'Jul', earnings: 17000 },
            { month: 'Aug', earnings: 14000 },
            { month: 'Sep', earnings: 13000 },
            { month: 'Oct', earnings: 16000 },
            { month: 'Nov', earnings: 18000 },
            { month: 'Dec', earnings: 19000 }
        ];
    
        var options = {
            chart: {
                type: 'line',
                height: 300,
                toolbar: { show: false }
            },
            series: [{
                name: "Earnings",
                data: earningsData.map(d => d.earnings)
            }],
            xaxis: {
                categories: earningsData.map(d => d.month)
            },
            stroke: { curve: 'smooth', width: 3 },
            markers: { 
                size: 0, // Default me dots hide
                hover: {
                    size: 6, // Hover par dot dikhega
                    colors: ['#07407B'] // Dot ka color
                }
            },
            colors: ['#07407B'],
            tooltip: {
                enabled: true,
                x: { show: true },
                y: { formatter: (val) => `$${val.toLocaleString()}` }
            }
        };
    
        var chart = new ApexCharts(document.querySelector("#earnings-chart"), options);
        chart.render();
    
        function updateChart(months, label) {
            let filteredData = earningsData.slice(-months);
            
            chart.updateOptions({
                series: [{ data: filteredData.map(d => d.earnings) }],
                xaxis: { categories: filteredData.map(d => d.month) }
            });
    
            // Dropdown button text update
            document.getElementById("dropdownBtn").innerText = label;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('bookingsChart').getContext('2d');
            
            let yearlyData = [600, 900, 750, 1100, 800, 985, 820, 910, 1050, 900, 750, 950];
            let monthlyData = [150, 300, 280, 400, 500, 350, 450, 600, 580, 620, 700, 720]; 
            
            let labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
            let chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Bookings',
                        data: yearlyData,
                        backgroundColor: yearlyData.map((_, index) => index === 5 ? 'orange' : 'navy'),
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            enabled: true,
                            backgroundColor: '#000',
                            bodyColor: '#fff',
                            displayColors: false,
                            titleColor: '#ddd',
                            padding: 10,
                            callbacks: {
                                title: function(tooltipItems) {
                                    return tooltipItems[0].label + " 2028";
                                },
                                label: function(tooltipItem) {
                                    return `Bookings: ${tooltipItem.raw}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 1200
                        }
                    },
                    onHover: (event, chartElement) => {
                        if (chartElement.length) {
                            let index = chartElement[0].index;
                            chart.data.datasets[0].backgroundColor = chart.data.datasets[0].data.map((_, i) => i === index ? 'orange' : 'navy');
                            chart.update();
                        }
                    }
                }
            });
    
            window.updateChart = function(type) {
                if (type === 'year') {
                    chart.data.datasets[0].data = yearlyData;
                    document.getElementById('bookingDropdown').textContent = "This Year";
                } else {
                    chart.data.datasets[0].data = monthlyData;
                    document.getElementById('bookingDropdown').textContent = "This Month";
                }
                chart.update();
            }
        });
    </script>
@endsection