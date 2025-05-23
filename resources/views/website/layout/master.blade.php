<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="images/icon" href="\frontend-assets\logo\favicon.png">
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


    <script src="{{asset('/')}}assets/Js/loadmore.js"></script>
    <script src="{{asset('/')}}assets/Js/car-listing-filters.js"></script>
    <script src="{{asset('/')}}frontend-assets/assets/Js/signin.js"></script>
    <script src="{{asset('/')}}frontend-assets/assets/Js/signup.js"></script>

    <!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
@include('website.template.header')
<body class="bg-light">
@yield('content')
</body>
<script src="{{asset('/')}}frontend-assets/assets/Js/track-analytics-clicks.js"></script>
@include('website.template.footer')

<!-- Include Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".carousel-control-next-custom",
      prevEl: ".carousel-control-prev-custom",
    },
    breakpoints: {
      320: { slidesPerView: 1, spaceBetween: 10 },
      768: { slidesPerView: 2, spaceBetween: 15 },
      1024: { slidesPerView: 3, spaceBetween: 30 },
    },
  });
});
</script>
</body>
</html>