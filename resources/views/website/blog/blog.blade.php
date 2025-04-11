@extends('website.layout.master')
@section('title')
{{ __('messages.Blog') }} | {{ __('messages.Select and Rent') }}
@endsection

@section('content')
<section class="blog-section">
    <div class="container">
        <div class="text-center mb-4">
            <p class="blog-subtitle">{{ __('messages.From the Blog') }}</p>
            <h2 class="blog-title">{{ __('messages.Car And Bike Rental News') }}</h2>
        </div>

        <div class="row">
            <!-- Blog Cards -->
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <a href="{{ route('blog.detail', $blog->id) }}">
                        <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="blog-image" alt="Blog Image">
                    </a>                    
                    <div class="date-box">
                        {{ date('d', strtotime($blog->date)) }} <br> {{ date('F', strtotime($blog->date)) }}
                    </div>
                    <div class="p-3 blog-card-text">
                        <p class="author">{{ __('messages.by') }} {{ $blog->authorName }}</p>
                        <h5 class="blog-title">
                            {{ $blog->name }}
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach            
        </div>

        <!-- Pagination -->
        {{-- <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">‹</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">›</a></li>
            </ul>
        </nav> --}}
    </div>
</section>
<!-- end section -->
@endsection