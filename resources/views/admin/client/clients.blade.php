@extends('admin.layouts.Master')
@section('title')  {{ trans_choice('messages.client',2) }}  @endsection
@section('content')
    <div class="content-body">
        <div class="booking-container  mt-4">
            <div class="booking-header-section">
                <!-- Title -->
                <h2 class="mb-0"> {{ trans_choice('messages.client',2) }} </h2>
    
                <!-- Search and Filters in the Same Row -->
                <div class="d-flex align-items-center gap-5">
                    <!-- Search Bar -->
                    <div class="booking-search-box mr-2">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="{{ __('messages.search') }} ">
                    </div>
                    <!-- Filters -->
                    <!-- <button id="carTypeFilter" class="booking-filter-box mr-2">
                        <i class="fa fa-filter"></i> Car Type
                    </button> -->
                    <div class="booking-filter-custom-dropdown mr-2">
                    <span class="booking-filter-icon">
                        <!-- <svg width="16" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 4h18l-7 10v6l-4 2v-8z"/>
                        </svg> -->
                    </span>
                    <select id="statusFilter" class="form-select booking-filter-box">
                        <option value="" disabled selected>{{ __('messages.status') }}</option>
                        <option value="Returned">{{ __('messages.returned') }}</option>
                        <option value="Ongoing">{{ __('messages.ongoing') }}</option>
                        <option value="Cancelled">{{ __('messages.cancelled') }}</option>
                        <option value="Pending">{{ __('messages.pending') }}</option>
                    </select>
                </div>
                <div class="booking-filter-custom-dropdown">
                    <span class="booking-filter-icon">
                    <!-- <svg width="16" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 4h18l-7 10v6l-4 2v-8z"/>
                    </svg> -->
                </span>
                <select id="carTypeFilter" class="form-select booking-filter-box">
                    <option value=""><i class="fa fa-filter"></i> {{ __('messages.car') }} {{ __('messages.type') }}</option>
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
                @if(can('Bookings','add'))
                    <button class="btn booking-btn-add">{{ __('messages.add') }} {{ trans_choice('messages.booking',1) }}</button>
                @endif
            </div>
            <table id="myTable" class="table table-striped booking-table">
                <thead class="text-nowrap">
                    <tr>
                        <th>{{ trans_choice('messages.client',1) }} ID</th>
                        <th>{{ __('messages.name') }}</th>
                        <th>{{ __('messages.contact') }} {{ __('messages.number') }} </th>
                        <th>{{ __('messages.email') }}</th>
                        <th>{{ __('messages.address') }}</th>
                        <th>{{ trans_choice('messages.booking',1) }} ID</th>
                        <th>{{ trans_choice('messages.booking',1) }} {{ __('messages.date') }}</th>
                        <th>{{ __('messages.car') }} {{ __('messages.model') }}</th>
                        <th>{{ trans_choice('messages.plan',1) }}</th>
                        <th>{{ __('messages.rental') }} {{ __('messages.duration') }}</th>
                        <th>{{ trans_choice('messages.driver',1) }} {{ __('messages.assigned') }}</th>
                        <th>{{ trans_choice('messages.payment',1) }} {{ __('messages.status') }} </th>
                        <th>{{ trans_choice('messages.booking',1) }}  {{ __('messages.status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CL-1001</td>
                        <td>Alice Johnson</td>
                        <td>(123) 456-7890</td>
                        <td>alice@example.com</td>
                        <td>123 Main St, NY</td>
                        <td>BK-WZ1001</td>
                        <td>Aug 1, 2028</td>
                        <td>Toyota Corolla <span class="badge car-badge">Sedan</span></td>
                        <td>Standard</td>
                        <td>2 Days (Aug 1 → Aug 2, 2028)</td>
                        <td><span class="driver-icon">➖</span></td>
                        <td>$50 <span class="status-paid">Paid</span></td>
                        <td><span class="status-badge status-returned">Returned</span></td>
                    </tr>
                    <tr>
                        <td>CL-1002</td>
                        <td>Bob Smith</td>
                        <td>(987) 654-3210</td>
                        <td>bob@example.com</td>
                        <td>456 Elm St, CA</td>
                        <td>BK-WZ1002</td>
                        <td>Aug 1, 2028</td>
                        <td>Honda Civic <span class="badge car-badge">Sedan</span></td>
                        <td>Premium</td>
                        <td>7 Days (Aug 1 → Aug 8, 2028)</td>
                        <td><span class="driver-icon">✔️</span></td>
                        <td>$350 <span class="status-pending">Pending</span></td>
                        <td><span class="status-badge status-ongoing">Ongoing</span></td>
                    </tr>
                    <tr>
                        <td>CL-1005</td>
                        <td>Edward Green</td>
                        <td>(555) 789-1234</td>
                        <td>edward@example.com</td>
                        <td>789 Oak St, TX</td>
                        <td>BK-WZ1005</td>
                        <td>Aug 3, 2028</td>
                        <td>Nissan Altima <span class="badge car-badge">Sedan</span></td>
                        <td>Luxury</td>
                        <td>8 Days (Aug 3 → Aug 10, 2028)</td>
                        <td><span class="driver-icon">➖</span></td>
                        <td>$350 <span class="status-pending">Pending</span></td>
                        <td><span class="status-badge status-cancelled">Cancelled</span></td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </div>
@endsection
