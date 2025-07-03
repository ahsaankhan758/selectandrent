@extends('admin.layouts.Master')
@section('title') {{ __('messages.payment-gateway') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <script src="{{asset('/')}}frontend-assets/assets/Js/admin/payment_gateways.js"></script>

        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>{{ __('messages.payment-gateway') }}</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGatewayModal">+ {{ __('messages.add-new') }}</button>
            </div>    
            <form id="gatewayForm" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('messages.name') }}</label>
                    <select class="form-select" id="name" name="name">
                        <option selected disabled>{{ __('messages.select-name') }}</option>
                        @foreach($gateways as $gateway)
                            <option value="{{ $gateway->id }}">{{ $gateway->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="c1" class="form-label">{{ __('messages.c1') }}</label>
                    <input type="text" class="form-control" id="c1" name="c1">
                </div>

                <div class="mb-3">
                    <label for="c2" class="form-label">{{ __('messages.c2') }}</label>
                    <input type="text" class="form-control" id="c2" name="c2">
                </div>

                <div class="mb-3">
                    <label for="c3" class="form-label">{{ __('messages.c3') }}</label>
                    <input type="text" class="form-control" id="c3" name="c3">
                </div>

                <div class="mb-3">
                    <label for="c4" class="form-label">{{ __('messages.c4') }}</label>
                    <input type="text" class="form-control" id="c4" name="c4">
                </div>

                <div class="mb-3">
                    <label for="c5" class="form-label">{{ __('messages.c5') }}</label>
                    <input type="text" class="form-control" id="c5" name="c5">
                </div>

                <div class="mb-3">
                    <label for="dev" class="form-label">{{ __('messages.for-dev') }}</label>
                    <select class="form-select" id="dev" name="dev">
                        <option selected disabled>{{ __('messages.select') }}</option>
                        <option value="1">Dev</option>
                        <option value="0">Not Dev</option>
                    </select>
                </div>
                

                <div class="mb-3">
                    <label for="dev_endpoint" class="form-label">{{ __('messages.dev-endpoint') }}</label>
                    <input type="text" class="form-control" id="dev_endpoint" name="dev_endpoint">
                </div>

                <div class="mb-3">
                    <label for="pro_endpoint" class="form-label">{{ __('messages.pro-endpoint') }}</label>
                    <input type="text" class="form-control" id="pro_endpoint" name="pro_endpoint">
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
            </form>
            

        </div>

        <!-- Modal -->
        <div class="modal fade" id="addGatewayModal" tabindex="-1" aria-labelledby="addGatewayModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form id="addGatewayForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addGatewayModalLabel">{{ __('messages.add-payment-gateway') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                    <div class="mb-3">
                        <label for="newGatewayName" class="form-label">{{ __('messages.gateway-name') }}</label>
                        <input type="text" class="form-control" id="newGatewayName" name="name" placeholder="{{ __('messages.enter-gateway-name') }}" required>
                    </div>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        {{-- end modal --}}

        <script>
        var getPaymentData = "{{ route('admin.payment-gateways.get', ':id') }}";
        var updatePaymentData = "{{ route('admin.payment-gateways.update', ':id') }}";
        var addGatewayName = "{{ route('admin.payment-gateways.store') }}";
        </script>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection