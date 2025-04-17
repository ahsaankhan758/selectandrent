<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/')}}frontend-assets/assets/css/custom.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend-assets/assets/css/common.css">
    <script src="{{asset('/')}}frontend-assets/assets/Js/custom.js"></script>
    {{-- font cdn --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


    <script src="{{asset('/')}}assets/js/loadmore.js"></script>
    <script src="{{asset('/')}}assets/js/car-listing-filters.js"></script>
    <script src="{{asset('/')}}frontend-assets/assets/js/signin.js"></script>
    

    <!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
@include('website.template.header')
<body class="bg-light">
@yield('content')
</body>
@include('website.template.footer')

<!-- Include Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
        delay: 3000, // 3 sec
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".carousel-control-prev-custom",
        prevEl: ".carousel-control-next-custom",
    },
    breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 10 }, // Mobile
        768: { slidesPerView: 3, spaceBetween: 15 }, // Tablet
        1024: { slidesPerView: 4, spaceBetween: 20 }, // Desktop
    },
});
// hide status
$(document).ready(function(){  
    $("#div1").delay(6000).fadeOut(1500); 
});
</script>
</body>
</html>