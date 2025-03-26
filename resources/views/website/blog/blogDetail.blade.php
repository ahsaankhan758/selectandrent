@extends('website.layout.master')
@section('title')
Blog-Detail | Select and Rent
@endsection

@section('content')
<section class="blog-section">
    <div class="container">
        <div class="text-center mb-4">
            <p class="blog-subtitle">From the Blog</p>
            <h2 class="blog-title">Car And Bike Rental News</h2>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Carousel Wrapper -->
                <div id="blogCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <!-- Slides -->
                    <div class="carousel-inner mb-4">
                        @php $images = json_decode($blog->images, true); @endphp

                        <!-- Thumbnail Image (Initially Active) -->
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="d-block w-100 rounded shadow" style="max-height: 100%; height: 100%; object-fit: cover;">
                        </div>

                        @if(is_array($images) && count($images) > 0)
                            @foreach($images as $key => $image)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 rounded shadow" style="max-height: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Slides -->

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <!-- Controls -->
                </div>
            </div>
        </div>

        <!-- Thumbnails -->
        @if(is_array($images) && count($images) > 0)
            <div class="row justify-content-center mt-3">
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <!-- Thumbnail (As First Slide) -->
                    <button type="button" class="btn p-0 border-0" data-bs-target="#blogCarousel" data-bs-slide-to="0">
                        <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="img-fluid rounded shadow w-100" style="height: 100px; object-fit: cover;">
                    </button>
                </div>
                @foreach($images as $key => $image)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <button type="button" class="btn p-0 border-0" data-bs-target="#blogCarousel" data-bs-slide-to="{{ $key + 1 }}">
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded shadow w-100" style="height: 100px; object-fit: cover;">
                        </button>
                    </div>
                @endforeach
            </div>
        @endif
        <!-- Thumbnails -->

        <!-- Blog Details -->
        <div class="row mt-4">
            <div class="col-lg-8">
                <h2 class="fw-bold text-start">{{ $blog->name }}</h2>
                <p class="text-muted text-start"><strong>Date:</strong> {{ date('d F, Y', strtotime($blog->date)) }}</p>
                <p class="text-muted text-start"><strong>Author:</strong> {{ $blog->authorName }}</p>
            </div>
        </div>
        <div class="col-lg-12">
            <p class="text-muted text-start">{{ $blog->detail }}</p>
        </div>
    </div>
</section>
@endsection
