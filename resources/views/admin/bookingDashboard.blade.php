@extends('admin.layouts.Master')
@section('title') {{__('messages.dashboard') }} @endsection
@section('content')
<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            {{-- <div class="content-page"> --}}
                {{-- <div class="content-body"> --}}
                    <!-- eCommerce statistic -->
                  
                    <div class="row mt-3">
                      <!-- Left Side: 4 Cards (2x2 Layout) -->
                      <div class="col-lg-6 col-md-12">
            
                        <div class="booking-dashboard">
                          <div class="card booking-card">
                            <div class="booking-cards-header">
                                <span class="booking-booking-icon-container">
                                  <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px"> 
                                </span>
                                <h6>Upcoming Bookings</h6>
                            </div>
                            <h3 class="mt-2">145</h3>
                            <div class="booking-chart-up"></div>
                            <div class="booking-status">
                                <span class="up">&#9650; +2.97%</span>
                            </div>
                            <div class="booking-bottom-text">from last week</div>
                        </div>
                        
                          <div class="card booking-card">
                            <div class="booking-cards-header">
                              <span class="booking-booking-icon-container">
                                <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px"> 
            
                              </span>
                              <h6>Pending Bookings</h6>
                            </div>
                              <h3 class="mt-2">106</h3>
                              <div class="booking-chart-up"></div>
                              <div class="booking-status">
                                  <span class="up">&#9650; +1.72%</span>
                              </div>
                              <div class="booking-bottom-text">from last week</div>
                          </div>
                          <div class=" card booking-card">
                            <div class="booking-cards-header">
                              <span class="booking-booking-icon-container">
                                <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px"> 
            
                              </span>
                              <h6>Canceled Bookings</h6>
                            </div>
                              <h3 class="mt-2">86</h3>
                              <div class="chart-down"></div>
                              <div class="booking-status">
                                  <span class="down">&#9660; -4.02%</span>
                              </div>
                              <div class="booking-bottom-text">from last week</div>
                          </div>
                          <div class="card booking-card">
                            <div class="booking-cards-header">
                              <span class="booking-booking-icon-container">
                                <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px"> 
            
                              </span>
                              <h6>Completed Bookings</h6>
                            </div>
                              <h3 class="mt-2">298</h3>
                              <div class="booking-chart-up"></div>
                              <div class="booking-status">
                                  <span class="up">&#9650; +3.15%</span>
                              </div>
                              <div class="booking-bottom-text">from last week</div>
                          </div>
                      </div>
                  </div>
            
                  
                      <!-- Right Side: Extra Section -->
                  
                     <div class="col-lg-6 col-md-12">
                     <div class="chart-container">
                      <h3>Bookings Overview</h3>
                      <div class="booking-legend mt-4">
                          <span><div class="done-color"></div> Done</span>
                          <span><div class="canceled-color"></div> Canceled</span>
                      </div>
                      <div class="chart-wrapper">
                          <canvas id="bookingsChart"></canvas>
                      </div>
                  </div>
                  </div>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            
                  
            
                    <!--/ eCommerce statistic -->
                   
                    <!-- Recent Transactions -->
                    <div class="booking-container  mt-4">
                      <div class="booking-header-section">
                        <!-- Title -->
                        <h2 class="mb-0">Car Bookings</h2>
            
                        <!-- Search and Filters in the Same Row -->
                        <div class="d-flex align-items-center gap-5">
                            <!-- Search Bar -->
                            <div class="booking-search-box mr-2">
                                <i class="fa fa-search"></i>
                                <input type="text" placeholder="Search client name, car, etc">
                            </div>
                            <!-- Filters -->
                            <!-- <button id="carTypeFilter" class="booking-filter-box mr-2">
                                <i class="fa fa-filter"></i> Car Type
                            </button> -->
                            <div class="booking-filter-custom-dropdown mr-2">
                              <span class="booking-filter-icon">
                                  <svg width="16" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M3 4h18l-7 10v6l-4 2v-8z"/>
                                  </svg>
                              </span>
                              <select id="statusFilter" class="form-select booking-filter-box">
                                  <option value="" disabled selected>Status</option>
                                  <option value="Returned">Returned</option>
                                  <option value="Ongoing">Ongoing</option>
                                  <option value="Cancelled">Cancelled</option>
                                  <option value="Pending">Pending</option>
                              </select>
                          </div>
                          <div class="booking-filter-custom-dropdown">
                            <span class="booking-filter-icon">
                              <svg width="16" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M3 4h18l-7 10v6l-4 2v-8z"/>
                              </svg>
                          </span>
                          <select id="carTypeFilter" class="form-select booking-filter-box">
                            <option value=""><i class="fa fa-filter"></i> Car Type</option>
                            <option value="Sedan">Sedan</option>
                            <option value="SUV">SUV</option>
                            <option value="Hatchback">Hatchback</option>
                        </select>
                        </div>
                            <!-- <button id="statusFilter" class="booking-filter-box">
                                <i class="fa fa-filter"></i> Status
                            </button> -->
                        </div>
            
                        <!-- Add Booking Button -->
                        <button class="btn booking-btn-add">Add Booking</button>
                    </div>
                    <table id="myTable" class="table table-striped booking-table">
                      <thead class="text-nowrap">
                          <tr>
                              <th>Booking ID</th>
                              <th>Booking Date</th>
                              <th>Client Name</th>
                              <th>Car Model</th>
                              <th>Plan</th>
                              <th>Date</th>
                              <th>Driver</th>
                              <th>Payment</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>BK-WZ1001</td>
                              <td>Aug 1, 2028</td>
                              <td>Alice Johnson</td>
                              <td>Toyota Corolla <span class="badge car-badge">Sedan</span></td>
                              <td>2 Days</td>
                              <td>Aug 1, 2028 → Aug 2, 2028</td>
                              <td><span class="driver-icon">➖</span></td>
                              <td>$50 <span class="status-paid">Paid</span></td>
                              <td><span class="status-badge status-returned">Returned</span></td>
                          </tr>
                          <tr>
                              <td>BK-WZ1002</td>
                              <td>Aug 1, 2028</td>
                              <td>Bob Smith</td>
                              <td>Honda Civic <span class="badge car-badge">Sedan</span></td>
                              <td>7 Days</td>
                              <td>Aug 1, 2028 → Aug 8, 2028</td>
                              <td><span class="driver-icon">✔️</span></td>
                              <td>$350 <span class="status-pending">Pending</span></td>
                              <td><span class="status-badge status-ongoing">Ongoing</span></td>
                          </tr>
                          <tr>
                              <td>BK-WZ1005</td>
                              <td>Aug 3, 2028</td>
                              <td>Edward Green</td>
                              <td>Nissan Altima <span class="badge car-badge">Sedan</span></td>
                              <td>8 Days</td>
                              <td>Aug 3, 2028 → Aug 10, 2028</td>
                              <td><span class="driver-icon">➖</span></td>
                              <td>$350 <span class="status-pending">Pending</span></td>
                              <td><span class="status-badge status-cancelled">Cancelled</span></td>
                          </tr>
                      </tbody>
                  </table>
                  </div>
                  <script>
                    

                    const ctx = document.getElementById('bookingsChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [
                                {
                                    label: 'Done',
                                    data: [320, 380, 540, 500, 410, 586, 530, 450, 520, 590, 510, 600],
                                    backgroundColor: '#F7A93F',
                                    borderRadius: 8, // Rounded corners
                                    barPercentage: 0.6, // Adjust bar thickness
                                    categoryPercentage: 0.8 // Space between bars
                                },
                                {
                                    label: 'Canceled',
                                    data: [-300, -320, -360, -340, -310, -370, -350, -320, -340, -390, -360, -400], // Negative for bottom half
                                    backgroundColor: '#07407B',
                                    borderRadius: 8, // Rounded corners
                                    barPercentage: 0.6,
                                    categoryPercentage: 0.8
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: true, // PREVENTS HEIGHT INCREASE
                            plugins: {
                                legend: { display: false },
                                tooltip: {
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
                                        stepSize: 300, // Align 0 in center
                                        callback: function(value) {
                                            return Math.abs(value); // Remove negative signs
                                        }
                                    }
                                }
                            }
                        }
                    });

                    
             
                </script>

                <!-- DataTables CSS -->

                    <!--/ Recent Transactions -->
                    
                  {{-- </div> --}}

             

            {{-- </div> --}}

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->    
            
   
                   

@endsection