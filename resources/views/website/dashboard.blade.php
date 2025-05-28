@extends('website.layout.master')
@section('title')
{{ __('messages.dashboard')}} | Select and Rent 
@endsection

@section('content')
<div class="container py-5">
    <div class="row g-4">

        <!-- Reusable Card Template Start -->
        <!-- Card 1 -->
         <div class="col-md-12 col-lg-12">
         <a href="{{route('website.booking')}}" class="btn btn-primary">Give Reviews</a>
         </div>
         <div class="col-md-6 col-lg-4">
            <div class="card bg-success text-white shadow rounded-4 h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="me-3">
                        <div class="bg-white bg-opacity-25 rounded-3 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-rocket fs-4 text-white"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ __('messages.confirm_order')}}</h6>
                        <h3 class="mb-1">{{ $statusCounts['confirmed'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- Card 2 -->
         <div class="col-md-6 col-lg-4">
            <div class="card bg-warning text-dark shadow rounded-4 h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="me-3">
                        <div class="bg-dark bg-opacity-25 rounded-3 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-history fs-4 text-dark"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ __('messages.pending_order')}}</h6>
                        <h3 class="mb-1">{{ $statusCounts['pending'] }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
         <div class="col-md-6 col-lg-4">
            <div class="card bg-danger text-white shadow rounded-4 h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="me-3">
                        <div class="bg-white bg-opacity-25 rounded-3 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-times-circle fs-4 text-white"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ __('messages.cancel_order')}}</h6>
                        <h3 class="mb-1">{{ $statusCounts['cancelled'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
         

        <!-- Card 4 -->
       <div class="col-md-6 col-lg-4">
            <div class="card bg-info text-white shadow rounded-4 h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="me-3">
                        <div class="bg-white bg-opacity-25 rounded-3 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-users fs-4 text-white"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ __('messages.confirm_payment')}}</h6>
                        <h3 class="mb-1">${{ number_format($priceTotals['confirmed']) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
         <div class="col-md-6 col-lg-4">
            <div class="card bg-primary text-white shadow rounded-4 h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="me-3">
                        <div class="bg-white bg-opacity-25 rounded-3 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-chart-line fs-4 text-white"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ __('messages.pending_payment')}}</h6>
                        <h3 class="mb-1">${{ number_format($priceTotals['pending']) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="col-md-6 col-lg-4">
            <div class="card bg-secondary text-white shadow rounded-4 h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="me-3">
                        <div class="bg-white bg-opacity-25 rounded-3 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-credit-card fs-4 text-white"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ __('messages.cancel_payment')}}</h6>
                        <h3 class="mb-1">${{ number_format($priceTotals['cancelled']) }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








