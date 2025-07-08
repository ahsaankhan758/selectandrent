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
    
    <title>@yield('title')| {{ __('messages.select_and_rent') }}</title>
    <link rel="stylesheet" href="{{asset('/')}}frontend-assets/assets/css/custom.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend-assets/assets/css/common.css">
    <script src="{{asset('/')}}frontend-assets/assets/Js/custom.js"></script>
    {{-- font cdn --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
     @if(auth()->check() && auth()->user()->role == 'user')
      <script>
          window.baseUrl = "{{ url('/') }}";
      </script>
     @endif

    <script src="{{asset('/')}}assets/js/loadmore.js"></script>
    <script src="{{asset('/')}}assets/js/car-listing-filters.js"></script>
    <script src="{{asset('/')}}frontend-assets/assets/Js/signin.js"></script>
    <script src="{{asset('/')}}frontend-assets/assets/Js/signup.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{ asset('/frontend-assets/assets/Js/toaster-alert.js') }}"></script>

    <!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
    slidesPerView: 3,       // fixed slides per view
    spaceBetween: 15,       // kam space
    centeredSlides: false,  // ensure not centered

    breakpoints: {
      320: { slidesPerView: 1, spaceBetween: 5 },
      768: { slidesPerView: 2, spaceBetween: 10 },
      1024: { slidesPerView: 3, spaceBetween: 15 },
    },
  });
});
</script>
</body>
</html>