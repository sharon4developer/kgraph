<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.partials.seo')
    
    <link rel="shortcut icon" href="{{ asset('assets/KgraphLogo.png') }}" type="image/png" sizes="32x32">

    {{-- Fonts (optimize based on actual usage) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')

    @stack('styles')
    @stack('scripts')



    {{-- Slick Carousel --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />


    {{-- jQuery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>


    {{-- <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>


    {{-- GSAP --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script> --}}
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script> --}}
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/SplitText.min.js"></script>


    {{-- Splide.js --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/splide.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/splide.min.css') }}" />

    {{-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js"></script> --}}
    <script src="{{ asset('assets/js/splide.min.js') }}"></script>

    {{-- Alertify & SweetAlerts2 --}}
    <link href="{{ asset('admin/theme/alertifyjs/build/css/alertify.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/theme/src/plugins/src/sweetalerts2/sweetalerts2.css') }}">

    {{-- Custom Styles --}}
    <link href="{{ asset('admin/backend/css/custom.css') }}" rel="stylesheet" />

</head>


<body style="overflow-x: hidden !important; margin: 0; padding: 0;" class="bg-cover !bg-[#041937de] ">
    @include('frontend.Common.navbar')
    <input type="hidden" id="base-route" value="{{ url('/') }}">
    <main class="content-container h-full w-full opacity-0 transition-opacity duration-500 ease-in-out">
        @yield('content')
    </main>

    @include('frontend.Common.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    
</body>


<style>
    .error {
        color: red !important;
        /* padding-top: 15px; */
        font-size: 14px;
        padding-bottom: 10px;
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.to(".content-container", { opacity: 1, duration: 0.5, ease: "power2.inOut" });
    });
</script>

</html>
