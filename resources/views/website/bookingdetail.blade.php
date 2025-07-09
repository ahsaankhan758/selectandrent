@extends('website.layout.master')

@section('title')
 {{ __('messages.booking') }} {{ __('messages.detail') }} 
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

@section('content')

<div class="container py-4">
    <div class="bg-white p-4 rounded shadow-sm mb-4">
        <h4 class="mb-3 text-primary">{{ __('messages.booking') }} {{ __('messages.summary') }} </h4>
        <p><strong>{{ __('messages.order') }} {{ __('messages.reference') }} :</strong> {{ $booking->booking_reference }}</p>
        <p><strong>{{ __('messages.customer') }} {{ __('messages.name') }} :</strong> {{ $booking->user->name ?? 'N/A' }}</p>
    </div>

    <div class="bg-light p-3 rounded mb-3">
        <h5 class="mb-0 text-secondary"><i class="bi bi-list-check me-2"></i>{{ __('messages.booking') }} {{ __('messages.items') }} </h5>
    </div>
    {{-- @php
    echo"<pre>";
        print_r($booking);die;
    @endphp --}}
    @foreach($booking->booking_items as $detail)
   
    
        <div class="rent-card shadow-sm rounded-4 mb-4 border-0 overflow-hidden">
            <div class="row g-0">
                <div class="col-md-3 bg-light d-flex align-items-center justify-content-center p-3">
                    @php
                        $thumbnail = $detail->vehicle->thumbnail ?? null;
                    @endphp
                
                    @if($thumbnail && file_exists(public_path('storage/' . $thumbnail)))
                        <img src="{{ asset('storage/' . $thumbnail) }}" alt="Vehicle Thumbnail" class="img-fluid rounded" style="max-height: 140px; object-fit: contain;">
                    @else
                        <img src="{{ asset('/frontend-assets/assets/car-suv.png') }}" alt="Default Vehicle Image" class="img-fluid rounded" style="max-height: 140px; object-fit: contain;">
                    @endif
                </div>
                
                <!-- Details -->
                <div class="col-md-9 p-4 bg-white">
                    <h5 class="mb-3 text-dark">
                        <i class="bi bi-car-front-fill me-2 text-primary"></i>
                        <span class="text-secondary"> 
                            {{ $detail->vehicle->carModel->name ?? 'N/A' }} - {{ $detail->vehicle->year ?? 'N/A' }}
                        </span>
                    </h5>
                    
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <strong><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ __('messages.pickup') }}:</strong>
                            {{ $detail->pickupLocation->area_name ?? 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong><i class="bi bi-geo-fill text-success me-1"></i> {{ __('messages.dropoff') }}:</strong>
                            {{ $detail->dropoffLocation->area_name ?? 'N/A' }}
                        </div>
                        

                        <div class="col-md-6">
                            <strong><i class="bi bi-calendar-event text-warning me-1"></i> {{ __('messages.Pickup Date') }}:</strong>
                            {{ \Carbon\Carbon::parse($detail->pickup_datetime)->format('d M Y, h:i A') }}
                        </div>
                        <div class="col-md-6">
                            <strong><i class="bi bi-calendar-check text-success me-1"></i> {{ __('messages.Drop-off Date') }}:</strong>
                            {{ \Carbon\Carbon::parse($detail->dropoff_datetime)->format('d M Y, h:i A') }}
                        </div>

                        <div class="col-md-6">
                            <strong><i class="bi bi-clock-fill text-info me-1"></i> {{ __('messages.duration') }}:</strong> {{ $detail->duration_days }} {{ ucfirst($detail->vehicle->rent_type) }}(s)
                        </div>
                        <div class="col-md-6">
                            <strong><i class="bi bi-currency-dollar text-success me-1"></i> {{ __('messages.price') }}/ {{ ucfirst($detail->vehicle->rent_type) }}:</strong> $ {{ $detail->price_per_day }}
                        </div>

                        <div class="col-md-6">
                            <strong><i class="bi bi-person-fill-check text-secondary me-1"></i> {{ __('messages.driver') }} {{ __('messages.required') }}:</strong>
                            <span class="badge bg-{{ $detail->driver_required ? 'success' : 'secondary' }}">
                                {{ $detail->driver_required ? 'Yes' : 'No' }}
                            </span>
                        </div>
                        
                        <div class="col-md-6">
                            <strong><i class="bi bi-cash-coin text-primary me-1"></i> {{ __('messages.subtotal') }}:</strong> $ {{ $detail->total_price }}
                        </div>

                        @if($detail->notes)
                        <div class="col-md-12">
                            <strong><i class="bi bi-card-text me-1"></i> {{ __('messages.notes') }}:</strong>
                            <div class="bg-light border rounded p-2 mt-1">{{ $detail->notes }}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    <div class="row justify-content-end">
        <div class="col-md-4">
            <div class="bg-white shadow-sm p-3 rounded mb-2 d-flex justify-content-between">
                <strong class="text-muted">{{ __('messages.subtotal') }}</strong>
                <span class="text-primary fw-bold">$ {{ number_format($booking->subtotal) }}</span>
            </div>
            <div class="bg-white shadow-sm p-3 rounded mb-2 d-flex justify-content-between">
                <strong class="text-muted">{{ __('messages.tax') }}</strong>
                <span class="text-primary fw-bold">$ {{ number_format($booking->tax_amount) }}</span>
            </div>
            
            <div class="bg-white shadow-sm p-3 rounded d-flex justify-content-between">
                <strong class="text-muted">{{ __('messages.total') }}</strong>
                <span class="text-success fw-bold">$ {{ number_format($booking->total_price) }}</span>
            </div>
        </div>
    </div>
</div>

<style>
    .rent-card {
  height: 318px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
    }
    .rent-card img {
  max-width: 262px;
  height: auto;
}
</style>
@endsection
