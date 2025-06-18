@extends('admin.layouts.Master')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Logo & title -->
                    <div class="clearfix">
                        <div class="float-start">
                            <div class="auth-logo">
                                <div class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-dark.png" alt="" height="22">
                                    </span>
                                </div>

                                <div class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-light.png" alt="" height="22">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <h4 class="m-0 d-print-none">{{ __('messages.invoice') }}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>Hello, {{ $booking->user->name ?? 'N/A' }}</b></p>
                            </div>

                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p><strong>{{ __('messages.order') }} {{ __('messages.date') }} : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ \Carbon\Carbon::parse($booking->created_at)->format('d-m-Y') }}</span></p>
                                <p>
                                    <strong>{{ __('messages.bookingpayment') }}: </strong>
                                    <span class="float-end">
                                        @php
                                            $statusClass = match ($booking->payment_status) {
                                                'failed' => 'bg-danger',
                                                'paid' => 'bg-success',
                                                'pending' => 'bg-warning',
                                                default => 'bg-secondary',
                                            };
                                        @endphp
                                        <span
                                            class="badge {{ $statusClass }}">{{ ucfirst($booking->payment_status) }}</span>
                                    </span>
                                </p>
                                <p>
                                    <strong>{{ __('messages.bookingstatus') }}: </strong>
                                    <span class="float-end">
                                        @php
                                            $bookingClass = match ($booking->booking_status) {
                                                'completed' => 'bg-success',
                                                'cancelled' => 'bg-danger',
                                                'pending' => 'bg-warning',
                                                'confirmed' => 'bg-info',
                                                default => 'bg-secondary',
                                            };
                                        @endphp
                                        <span
                                            class="badge {{ $bookingClass }}">{{ ucfirst($booking->booking_status) }}</span>
                                    </span>
                                </p>
                                <p><strong>{{ __('messages.booking_referenceid') }} </strong> <span
                                        class="float-end">{{ $booking->booking_reference }}</span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h6>{{ __('messages.booking_userinfo') }}</h6>
                            <address>
                                {{ $booking->billing_addresss ?? 'N/A' }}<br>
                                <abbr title="Phone"></abbr> {{ $booking->phonenumber ?? 'N/A' }}
                            </address>
                        </div>

                        <div class="col-sm-6">
                            @if (isset($booking))
                                @foreach ($booking->booking_items as $detail)
                                    <h6>{{ __('messages.company_info') }}</h6>
                                    <address>
                                        {{ $detail->vehicle->company->name }}<br>
                                        {{ $detail->vehicle->company->email }}<br>
                                        <abbr title="Phone"></abbr>{{ $detail->vehicle->company->phone }}<br>
                                        {{ optional($detail->vehicle->company->country)->name }}
                                    </address>
                                @endforeach
                            @endif
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                @foreach ($booking->booking_items as $detail)
                                    <table class="table mt-4 table-centered">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">{{ __('messages.booking_platenumber') }}</th>
                                                <th class="text-nowrap">{{ __('messages.car') }}</th>
                                                <th class="text-nowrap">{{ __('messages.category') }}</th>
                                                <th class="text-nowrap">{{ __('messages.location') }}</th>
                                                @if($detail->vehicle->rent_type == 'day')
                                                <th class="text-nowrap">{{ __('messages.perday') }}</th>
                                                @else 
                                                <th class="text-nowrap">{{ __('messages.perhour') }}</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap">{{ $detail->vehicle->lisence_plate ?? 'N/A' }}</td>
                                                <td class="text-nowrap">
                                                    <b>{{ $detail->vehicle->carModel->name ?? 'N/A' }}</b>
                                                    -{{ $detail->vehicle->year ?? 'N/A' }}
                                                </td>
                                                <td class="text-nowrap">{{ $detail->vehicle->car_categories->name }}</td>
                                                <td>{{ $detail->pickupLocation->area_name ?? 'N/A' }}</td>
                                                <td class="text-nowrap">{{ $detail->vehicle->rent ?? '0' }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                @if ($detail->notes)
                                    <h6 class="text-muted">{{ __('messages.bookingnotes') }}</h6>
                                    <small class="text-muted">
                                        {{ $detail->notes }}
                                    </small>
                                @endif
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end">
                                <p><b>{{ __('messages.Subtotal') }}</b> <span class="float-end">
                                        {{ convertPrice($booking->subtotal,2) }}</span></p>
                                <p><b>{{ __('messages.tax') }}</b> <span class="float-end"> &nbsp;&nbsp;&nbsp;
                                        {{ convertPrice($booking->tax_amount) }}</span></p>
                                <h3>{{ __('messages.Total') }} {{ convertPrice($booking->total_price) }}</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                    class="mdi mdi-printer me-1"></i>{{ __('messages.print') }}</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
