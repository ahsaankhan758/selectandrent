@extends('admin.layouts.Master')
@section('title') {{ ucfirst($role) }} {{__('messages.dashboard') }} @endsection
@section('content')
<script>
    window.orderStatusRoute = "{{ route('orders.status.data') }}";
</script>
<script src="{{ asset('assets/js/admin/dashboard.js') }}"></script>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li> --}}
                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
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
                                <i class="fa fa-car-side"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Orders Confirmed</h6>
                                <h2 class="text-dark">{{ $confirmedCount }}</h2>
                            </div>
                        </div>
                        {{-- <div class="text-success small  ms-5">
                            <span class="change-box"><i class="fa fa-arrow-up"></i> +1.73%</span> from last week
                        </div> --}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-dollar-sign"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                <h2 class="text-dark"> ${{ intval($confirmedtotalprice) }}
                                </h2>
                            </div>
                        </div>
                        {{-- <div class="text-success small  ms-5">
                            <span class="change-box"><i class="fa fa-arrow-up"></i> +2.86%</span> from last week
                        </div> --}}
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-car"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Orders Completed</h6>
                                <h2 class="text-dark">{{ $completedCount }}</h2>
                            </div>
                        </div>
                        {{-- <div class="text-danger small ms-5">
                            <span class="change-box danger"><i class="fa fa-arrow-down"></i> -2.86%</span> from last week
                        </div> --}}
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-dollar-sign"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Orders Cancelled</h6>
                                <h2 class="text-dark">{{ $cancelCount }}</h2>
                            </div>
                        </div>
                        {{-- <div class="text-success small  ms-5">
                            <span class="change-box"><i class="fa fa-arrow-up"></i> +3.45%</span> from last week
                        </div> --}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-car"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Orders Pending</h6>
                                <h2 class="text-dark">{{ $pendingCount }}</h2>
                            </div>
                        </div>
                        {{-- <div class="text-danger small ms-5">
                            <span class="change-box danger"><i class="fa fa-arrow-down"></i> -2.86%</span> from last week
                        </div> --}}
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fa fa-dollar-sign"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Pending Revenue</h6>
                                <h2 class="text-dark"> ${{ intval($pendingtotalprice) }}</h2>
                            </div>
                        </div>
                        {{-- <div class="text-success small  ms-5">
                            <span class="change-box"><i class="fa fa-arrow-up"></i> +3.45%</span> from last week
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- 4 Column Section (Rent Status Card) -->
      <!-- Chart Container -->
<div class="col-xl-4 col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="header-title mb-0">Orders Status</h4>
                <div class="dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        This Week <i class="fas fa-angle-down ms-2"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item filter-option" href="#" data-filter="week">This Week</a></li>
                        <li><a class="dropdown-item filter-option" href="#" data-filter="month">This Month</a></li>
                        <li><a class="dropdown-item filter-option" href="#" data-filter="last_month">Last Month</a></li> <!-- ADD THIS -->
                        <li><a class="dropdown-item filter-option" href="#" data-filter="year">This Year</a></li>
                    </ul>
                                        
                </div>
            </div>

            <div id="cardCollapseRentStatus" class="collapse show">
                <div class="text-center pt-3">
                    <div dir="ltr">
                        <div id="lifetime-sales" data-colors="#07407B,#f06115,#ebeff2" style="height: 270px;" class="morris-chart mt-3"></div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                           
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
    <div class="row mt-2">
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

    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-8">
                        <form class="d-flex flex-wrap align-items-center">
                            <label for="inputPassword2" class="visually-hidden">Search</label>
                            <div class="me-3">
                                <input type="search" class="form-control my-1 my-lg-0" id="inputPassword2" placeholder="Search...">
                            </div>
                            <label for="status-select" class="me-2">Status</label>
                            <div class="me-sm-3">
                                <select class="form-select form-select my-1 my-lg-0" id="status-select">
                                    <option selected>Choose...</option>
                                    <option value="1">Paid</option>
                                    <option value="2">Awaiting Authorization</option>
                                    <option value="3">Payment failed</option>
                                    <option value="4">Cash On Delivery</option>
                                    <option value="5">Fulfilled</option>
                                    <option value="6">Unfulfilled</option>
                                </select>
                            </div>
                        </form>                            
                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-end">
                            @if(can('Bookings','add'))
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button>
                            @endif
                            <button type="button" class="btn btn-light waves-effect mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Booking Ref</th>
                                <th>Transaction ID</th>
                                <th>Payment Status</th>
                                <th>Booking Status</th>
                                <th>Payment Method</th>
                                <th>Coupon</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Insurance</th>
                                <th>Total</th>
                                <th>Subtotal</th>
                                <th>Notes</th>
                                <th style="width: 125px;">Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="#" class="text-body fw-bold">{{ $booking->id }}</a></td>
                                <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                <td>{{ $booking->booking_reference }}</td> 
                                <td>{{ $booking->transaction_id }}</td>
                                <td>
                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-bitcoin"></i>{{ $booking->payment_status }}</span></h5>
                                </td>
                                <td><h5><span class="badge bg-info">{{ $booking->booking_status }}</span></h5></td>
                                <td>{{ ucfirst($booking->payment_method) }}</td>
                                <td>{{ $booking->coupon_code ?: '—' }}</td>
                                <td>{{ number_format($booking->discount_amount, 2) }}</td>
                                <td>{{ number_format($booking->tax_amount, 2) }}</td>
                                <td>{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                                <td>{{ number_format($booking->total_price, 2) }}</td>
                                <td>{{ number_format($booking->subtotal, 2) }}</td>
                                <td>{{ $booking->notes }}</td>
                                <td>
                                    <a href="{{ route('car.booking.detail', ['id' => $booking->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                </td>
                            </tr> 
                            @empty
                            <tr>
                                <td colspan="16" class="text-center">No bookings found.</td>
                            </tr>
                            @endforelse                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
                size: 0, 
                hover: {
                    size: 6, 
                    colors: ['#07407B']
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
@endsection