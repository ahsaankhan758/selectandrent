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

        <div class="row" id="blog-list">
            <!-- Blog Cards -->
            @include('website.blog.include.blogcard', ['blogs' => $blogs])      
        </div>
        <div class="text-center mb-5">

            @if($totalBlogs > 8)
            <button class="load-more-btn btn btn-orange-clr text-white" 
            data-target="blog-list" 
            data-url="{{ route('load.more.blogs') }}" 
            data-offset="8" 
            data-total="{{ $totalBlogs }}" 
            data-model="Blog">
            {{ __('messages.Load More') }}
            </button>
            @endif
            </div>
    </div>
</section>
<!-- end section -->
@endsection