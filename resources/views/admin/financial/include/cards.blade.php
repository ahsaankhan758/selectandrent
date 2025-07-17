 <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box">
                        <i class="fa fa-car"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-2">{{ __('messages.order_confirm') }}</h6>
                        <h2 class="text-dark" id="confirmed_count">{{ $confirmedCount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-2">{{ __('messages.total_revenue') }}</h6>
                        <h2 class="text-dark" id="confirmed_total_price">{{ $defaultCurrencySymbol }} {{ $confirmedTotalPrice }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box">
                        <i class="fa fa-car"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-2">{{ __('messages.order_complete') }}</h6>
                        <h2 class="text-dark" id="completed_count">{{ $completedCount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box">
                        <i class="fa fa-car"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-2">{{ __('messages.order_cancel') }}</h6>
                        <h2 class="text-dark" id="cancel_count">{{ $cancelCount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box">
                        <i class="fa fa-car"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-2">{{ __('messages.order_pending') }}</h6>
                        <h2 class="text-dark" id="pending_count">{{ $pendingCount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-2">{{ __('messages.pending_revenue') }}</h6>
                        <h2 class="text-dark" id="pending_total_price">{{ $defaultCurrencySymbol }} {{ $pendingTotalPrice }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>