@extends('website.layout.master')
@section('title')
Blog | Select and Rent
@endsection

@section('content')
<section class="blog-section">
    <div class="container">
        <div class="text-center mb-4">
            <p class="blog-subtitle">From the Blog</p>
            <h2 class="blog-title">Car And Bike Rental News</h2>
        </div>

        <div class="row">
            <!-- Blog Cards -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{asset('/')}}company-assets/icons/girlblog.png" class="blog-image" alt="Blog Image">
                    <div class="date-box">14 <br> June</div>
                    <div class="p-3 blog-card-text">
                        <p class="author">by Mike Hardson</p>
                        <h5 class="blog-title">Your Perfect Memorial Day Weekend Getaway</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{asset('/')}}company-assets/icons/boyblog.png" class="blog-image" alt="Blog Image">
                    <div class="date-box">14 <br> June</div>
                    <div class="p-3 blog-card-text">
                        <p class="author">by Mike Hardson</p>
                        <h5 class="blog-title">Your Perfect Memorial Day Weekend Getaway</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{asset('/')}}company-assets/icons/image.png" class="blog-image" alt="Blog Image">
                    <div class="date-box">14 <br> June</div>
                    <div class="p-3 blog-card-text">
                        <p class="author">by Mike Hardson</p>
                        <h5 class="blog-title">Your Perfect Memorial Day Weekend Getaway</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{asset('/')}}company-assets/icons/boyblog.png" class="blog-image" alt="Blog Image">
                    <div class="date-box">14 <br> June</div>
                    <div class="p-3 blog-card-text">
                        <p class="author">by Mike Hardson</p>
                        <h5 class="blog-title">Your Perfect Memorial Day Weekend Getaway</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{asset('/')}}company-assets/icons/image.png" class="blog-image" alt="Blog Image">
                    <div class="date-box">14 <br> June</div>
                    <div class="p-3 blog-card-text">
                        <p class="author">by Mike Hardson</p>
                        <h5 class="blog-title">Your Perfect Memorial Day Weekend Getaway</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{asset('/')}}company-assets/icons/girlblog.png" class="blog-image" alt="Blog Image">
                    <div class="date-box">14 <br> June</div>
                    <div class="p-3 blog-card-text">
                        <p class="author">by Mike Hardson</p>
                        <h5 class="blog-title">Your Perfect Memorial Day Weekend Getaway</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">‹</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">›</a></li>
            </ul>
        </nav>
    </div>
</section>
<!-- end section -->
@endsection