@extends('website.layout.master')

@section('title')
Booking Detail | Select and Rent
@endsection

@section('content')
<div class="container py-2">
    <div class="row d-flex">
        <p><strong>Order ID:</strong> {{ $booking->id }}</p>
        <p><strong>Customer Name:</strong> {{ $booking->user->name ?? 'N/A' }}</p>
    </div>
</div>

<!-- Booking Items Header -->
<div class="container py-3">
    <div class="vehicle-card d-flex mobile-car">
        <ul class="col-md-12"><b>Booking Items</b></ul>
    </div>
    <hr>
</div>

<!-- Horizontal Booking Items Cards -->
<div class="container mb-4">
    @foreach($booking->booking_items as $detail)
        <div class="booking-card shadow-sm rounded-4 mb-4 p-4" style="width: 100%; overflow: visible;">
            <div class="row g-3">
                <div class="col-md-3 col-sm-6"><strong>Vehicle ID:</strong> {{ $detail->vehicle_id }}</div>
                <div class="col-md-3 col-sm-6"><strong>Pickup Location:</strong> {{ $detail->pickup_location }}</div>
                <div class="col-md-3 col-sm-6"><strong>Dropoff Location:</strong> {{ $detail->dropoff_location }}</div>
                <div class="col-md-3 col-sm-6"><strong>Pickup:</strong> {{ $detail->pickup_datetime }}</div>
                <div class="col-md-3 col-sm-6"><strong>Dropoff:</strong> {{ $detail->dropoff_datetime }}</div>
                <div class="col-md-3 col-sm-6"><strong>Duration (Days):</strong> {{ $detail->duration_days }}</div>
                <div class="col-md-3 col-sm-6"><strong>Price per Day:</strong> ${{ $detail->price_per_day }}</div>
                <div class="col-md-3 col-sm-6"><strong>Total Price:</strong> ${{ $detail->total_price }}</div>
                <div class="col-md-3 col-sm-6"><strong>Driver Required:</strong> {{ $detail->driver_required ? 'Yes' : 'No' }}</div>
                <div class="col-md-3 col-sm-6"><strong>Notes:</strong> {{ $detail->notes }}</div>
            </div>
        </div>
    @endforeach
</div>

<!-- Subtotal and Total -->
<div class="container my-3">
    <div class="row justify-content-end align-items-center g-3">
        <div class="col-md-3 col-6">
            <div class="box">
                <div class="text-primary"><strong>SubTotal</strong></div>
                <div class="price-car calculate-subtotal">$ 1000</div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="box">
                <div class="text-primary"><strong>Total</strong></div>
                <div class="price-car calculate-total">$ 2000</div>
            </div>
        </div>
    </div>
</div>
<style>
.booking-card {
  /* Override global fixed height */
  height: auto;
  display: block; /* Or flex if needed for layout */
  padding: 1rem;  /* Adjust spacing as required */
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  border-radius: 0.5rem;
  background-color: #fff;
}

</style>
@endsection


