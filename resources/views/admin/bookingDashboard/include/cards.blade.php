
    <div id="cards-container">
        <div class="booking-dashboard">
            {{-- Card 1 --}}
            <div class="card booking-card card-clickable">
                <a href="{{ route('carBooking', ['filter' => 'confirmed']) }}" style="text-decoration: none;">
                <div class="booking-cards-header">
                    <span class="booking-booking-icon-container">
                        <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">
                    </span>
                    <h6>{{ __('messages.upcoming_booking') }}</h6>
                </div>
                <h3 class="mt-2">{{ $futureConfirmedCount }}</h3>
                <div class="booking-chart-up"></div>
                <div class="booking-status">
                    <span class="up">&#9650; +2.97%</span>
                </div>
                <div class="booking-bottom-text">from last week</div>
                </a>
            </div>

            {{-- Card 2 --}}
            <div class="card booking-card card-clickable">
                <a href="{{ route('carBooking', ['filter' => 'pending']) }}" style="text-decoration: none;">
                <div class="booking-cards-header">
                    <span class="booking-booking-icon-container">
                        <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">
                    </span>
                    <h6>{{ __('messages.pending_booking') }}</h6>
                </div>
                <h3 class="mt-2">{{ $pendingCount }}</h3>
                <div class="booking-chart-up"></div>
                <div class="booking-status">
                    <span class="up">&#9650; +1.72%</span>
                </div>
                <div class="booking-bottom-text">from last week</div>
                </a>
            </div>

            {{-- Card 3 --}}
            <div class="card booking-card card-clickable">
                <a href="{{ route('carBooking', ['filter' => 'cancelled']) }}" style="text-decoration: none;">
                <div class="booking-cards-header">
                    <span class="booking-booking-icon-container">
                        <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">
                    </span>
                    <h6>{{ __('messages.cancelled_booking') }}</h6>
                </div>
                <h3 class="mt-2">{{ $cancelledCount }}</h3>
                <div class="chart-down"></div>
                <div class="booking-status">
                    <span class="down">&#9660; -4.02%</span>
                </div>
                <div class="booking-bottom-text">from last week</div>
                </a>
            </div>

            {{-- Card 4 --}}
            <div class="card booking-card card-clickable">
                <a href="{{ route('carBooking', ['filter' => 'completed']) }}" style="text-decoration: none;">
                <div class="booking-cards-header">
                    <span class="booking-booking-icon-container">
                        <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">
                    </span>
                    <h6>{{ __('messages.complete_booking') }}</h6>
                </div>
                <h3 class="mt-2">{{ $confirmedCount }}</h3>
                <div class="booking-chart-up"></div>
                <div class="booking-status">
                    <span class="up">&#9650; +3.15%</span>
                </div>
                <div class="booking-bottom-text">from last week</div>
                </a>
            </div>
        </div>
    </div>

