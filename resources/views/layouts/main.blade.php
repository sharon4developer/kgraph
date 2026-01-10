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

    {{-- CSS Loading - Try Vite first, fallback to direct asset link --}}
    @if(file_exists(public_path('build/manifest.json')))
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
            $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
        @endphp
        @if($cssFile)
            <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
        @else
            @vite('resources/css/app.css')
        @endif
    @else
        @vite('resources/css/app.css')
    @endif

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

    {{-- Alpine.js for interactivity --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>

</head>


<body style="overflow-x: hidden !important; margin: 0; padding: 0;" class="min-h-screen flex flex-col bg-blue-950 text-white overflow-x-hidden">
    @include('layouts.partials.header')
    
    <input type="hidden" id="base-route" value="{{ url('/') }}">
    
    <main class="flex-grow pt-20 content-container transition-opacity duration-500 ease-in-out" role="main">
        @yield('content')
    </main>

    @include('layouts.partials.footer')
    
    {{-- Scroll to Top Button --}}
    <div 
        x-data="{ showButton: false }"
        x-init="
            window.addEventListener('scroll', () => {
                showButton = window.scrollY > 400;
            });
        "
        x-show="showButton"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-0"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0"
        style="display: none;"
    >
        <button
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="fixed bottom-8 right-8 z-40 w-12 h-12 bg-blue-700 text-white rounded-full shadow-lg hover:bg-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-blue-900/50 flex items-center justify-center"
            aria-label="Scroll to top"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>
    </div>
    
    {{-- WhatsApp Floating Button --}}
    @php
        $whatsapp = \App\Models\whatsApp::first();
        $whatsappNumber = isset($whatsapp) && $whatsapp->whatsapp ? $whatsapp->whatsapp : '+14169897788';
        $whatsappMessage = "Hi! I'm interested in learning more about Canadian immigration services.";
    @endphp
    <div class="fixed bottom-24 right-8 z-40" x-data="{ showRipple: true }">
        {{-- Ripple Effect Background --}}
        <div 
            class="absolute inset-0 bg-blue-400 rounded-full"
            x-show="showRipple"
            style="animation: ripple 2s ease-in-out infinite;"
        ></div>
        <div 
            class="absolute inset-0 bg-blue-400 rounded-full"
            x-show="showRipple"
            style="animation: ripple 2s ease-in-out infinite 0.5s;"
        ></div>
        
        {{-- Main Button --}}
        <a
            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsappNumber) }}?text={{ urlencode($whatsappMessage) }}"
            target="_blank"
            rel="noopener noreferrer"
            class="relative w-14 h-14 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition-all hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-blue-900/50 flex items-center justify-center"
            aria-label="Contact us on WhatsApp"
            title="Chat with us on WhatsApp"
        >
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
        </a>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    
    <style>
        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 0.7;
            }
            50% {
                transform: scale(1.4);
                opacity: 0;
            }
            100% {
                transform: scale(1.4);
                opacity: 0;
            }
        }
    </style>
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
        // Fade in content on page load
        const contentContainer = document.querySelector('.content-container');
        if (contentContainer) {
            contentContainer.style.opacity = '1';
        }
        
        // GSAP animation if available
        if (typeof gsap !== 'undefined') {
        gsap.to(".content-container", { opacity: 1, duration: 0.5, ease: "power2.inOut" });
        }
    });
</script>

</html>
