@extends('website.layout.master')
@section('title')
{{ __('messages.checkout') }} 
@endsection

@section('content')
<!-- progress bar order -->
<div class="container my-5">
    <div class="alert alert-danger text-center p-5 shadow rounded">
        <h2 class="mb-4"><i class="fas fa-exclamation-triangle text-danger"></i> Booking Error</h2>
        <p class="lead">{{ $message ?? 'An unexpected error occurred during your booking process.' }}</p>
        <hr>
        <p class="text-muted">If you believe this is a mistake, please <a href="{{ route('contact') }}">contact our support team</a>.</p>
        <a href="/" class="btn btn-primary mt-3">Return to Home</a>
    </div>
</div>
<!-- end cards -->

@endsection