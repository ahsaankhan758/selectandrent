@extends('admin.layouts.Master')
@section('title')  {{ __('messages.car') }}  {{ trans_choice('messages.booking',2) }} @endsection
@section('content')
    <div class="content-body">
        <div class="booking-container  mt-4">
            <div class="booking-header-section">
                <!-- Title -->
                <h2 class="mb-0">{{ __('messages.car') }}  {{ trans_choice('messages.booking',2) }}</h2>
    
                <!-- Search and Filters in the Same Row -->
                <div class="d-flex align-items-center gap-5">
                    <!-- Search Bar -->
                    <div class="booking-search-box mr-2">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="{{ __('messages.search') }}">
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
                <button class="btn booking-btn-add">{{ __('messages.add') }} {{ trans_choice('messages.booking',1) }}</button>
            </div>
            <table id="myTable" class="table table-striped booking-table">
            <thead class="text-nowrap">
                <tr>
                    <th>{{ trans_choice('messages.booking',1) }} ID</th>
                    <th>{{ trans_choice('messages.booking',1) }} Date</th>
                    <th>{{ trans_choice('messages.client',2) }} Name</th>
                    <th>{{ __('messages.car') }} {{ __('messages.model') }}</th>
                    <th>{{ trans_choice('messages.plan',1) }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th>{{ trans_choice('messages.driver',1) }}</th>
                    <th>{{ trans_choice('messages.payment',1) }}</th>
                    <th>{{ __('messages.status') }}</th>
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
    </div>
@endsection