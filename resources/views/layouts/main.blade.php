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

    {{-- Main CSS via Vite --}}
    @vite('resources/css/app.css')

    {{-- Conditional third-party styles/scripts --}}
    @stack('styles')
    @stack('scripts')

    {{-- Optional: defer JS for performance --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
</head>


<body style="overflow-x: hidden !important; margin: 0; padding: 0;">
    @include('frontend.Common.navbar')
    <input type="hidden" id="base-route" value="{{ url('/') }}">
    <main class="content-container h-full w-full">
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

</html>
