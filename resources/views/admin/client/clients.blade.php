@extends('admin.layouts.Master')
@section('title')  {{ trans_choice('messages.client',2) }}  @endsection
@section('content')
    <div class="content-body">
        <div class="booking-container  mt-4">
            <div class="booking-header-section">
                <h2 class="mb-0">{{ trans_choice('messages.client',2) }} </h2>
            </div>
            <!-- Add Booking Button -->
            {{-- @if(can('Bookings','add'))
                <button class="btn booking-btn-add">{{ __('messages.add') }} {{ trans_choice('messages.booking',1) }}</button>
            @endif --}}
            </div>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped booking-table">
                    <thead class="text-nowrap">
                        <tr>
                            {{-- <th class="text-center">ID</th> --}}
                            <th class="text-center">{{ __('messages.name') }}</th>
                            <th class="text-center">{{ __('messages.contact') }} {{ __('messages.number') }}</th>
                            <th class="text-center">{{ __('messages.email') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            {{-- <td class="text-center">{{ $customer->id }}</td> --}}
                            <td class="text-center">{{ $customer->name }}</td>
                            <td class="text-center">{{ $customer->phone }}</td>
                            <td class="text-center">{{ $customer->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>            
        </div>    
@endsection
