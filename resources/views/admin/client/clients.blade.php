@extends('admin.layouts.Master')
@section('title')  {{ trans_choice('messages.client',2) }}  @endsection
@section('content')
    <div class="content-body">
        <div class="booking-container  mt-4">
            <div class="booking-header-section">
                <h2 class="mb-0">{{ trans_choice('messages.client',2) }} </h2>
            </div>
            <!-- Add Booking Button -->
            {{-- @if(can('Bookings','edit'))
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
                            <th class="text-center">{{ __('messages.rating') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            {{-- <td class="text-center">{{ $customer->id }}</td> --}}
                            <td class="text-center">{{ $customer->name }}</td>
                            <td class="text-center">{{ $customer->bookings->first()->phonenumber ?? 'N/A' }}</td>
                            <td class="text-center">{{ $customer->email }}</td>
                            <td class="text-center">
                                <div class="stars text-warning">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($customer->reviews_received_avg_rating))
                                            <i class="fas fa-star text-warning"></i> <!-- Full star -->
                                        @elseif ($i == floor($customer->reviews_received_avg_rating) + 1 && fmod($customer->reviews_received_avg_rating, 1) >= 0.5)
                                            <i class="fas fa-star-half-alt text-warning"></i> <!-- Half star -->
                                        @else
                                            <i class="far fa-star text-warning"></i> <!-- Empty star -->
                                        @endif
                                    @endfor
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>            
        </div>    
@endsection
