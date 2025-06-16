@extends('admin.layouts.Master')

@section('title')
    {{ __('messages.customer') }} {{ __('messages.reviews') }} 
@endsection

@section('content')
<div class="content-body">
    <div class="booking-container mt-4">
        <div class="booking-header-section">
            <h2 class="mb-0">{{ __('messages.customer') }} {{ __('messages.reviews') }}</h2>
        </div>
    </div>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped booking-table">
            <thead class="text-nowrap">
                <tr>
                    <th class="text-center">{{ __('messages.user') }}</th>
                    <th class="text-center">{{ __('messages.customer') }}</th>
                    <th class="text-center">{{ __('messages.booking') }}</th>
                    <th class="text-center">{{ __('messages.rating') }}</th>
                    <th class="text-center">{{ __('messages.comment') }}</th>
                    <th class="text-center">{{ __('messages.date') }}</th>
                </tr>
            </thead>
            <tbody>
                @if($customerReviews->count())
                    @foreach($customerReviews as $review)
                        <tr>
                            <td class="text-center">{{ $review->reviewer->name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $review->reviewedUser->name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $review->bookings->booking_reference ?? 'N/A' }}</td>
                            <td class="text-center">{{ $review->rating ?? 'N/A'}}</td>
                            <td class="text-center">{{ $review->comment ?? 'N/A'}}</td>
                            <td class="text-center">{{ $review->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No reviews found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
