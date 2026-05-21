<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Google Tag Manager --}}
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5PZHBL2C');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.partials.seo')
    
    <link rel="shortcut icon" href="{{ asset('assets/KgraphLogo.png') }}" type="image/png" sizes="32x32">

    {{-- Fonts (optimize based on actual usage) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    {{-- CSS Loading - Try live server first, fallback to dev server --}}
    @if(file_exists(public_path('build/manifest.json')))
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
            $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
        @endphp
        @if($cssFile)
            {{-- Primary CSS from live server --}}
            <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}" id="main-css">
            {{-- Fallback mechanism via JavaScript --}}
            <script>
                (function() {
                    var cssLink = document.getElementById('main-css');
                    var fallbackCss = 'https://dev2.luminefy.com/build/assets/app-DIj0EiP8.css';
                    var cssFileName = '{{ basename($cssFile) }}';
                    
                    // Check if CSS loaded successfully after a short delay
                    setTimeout(function() {
                        var sheets = document.styleSheets;
                        var cssLoaded = false;
                        
                        // Check if main CSS is loaded
                        for (var i = 0; i < sheets.length; i++) {
                            try {
                                if (sheets[i].href && sheets[i].href.includes(cssFileName)) {
                                    cssLoaded = true;
                                    break;
                                }
                            } catch(e) {
                                // Cross-origin stylesheet, skip
                            }
                        }
                        
                        // If CSS not loaded, add fallback
                        if (!cssLoaded) {
                            var link = document.createElement('link');
                            link.rel = 'stylesheet';
                            link.href = fallbackCss;
                            link.id = 'fallback-css';
                            document.head.appendChild(link);
                            console.log('CSS fallback loaded from dev server');
                        }
                    }, 1000);
                    
                    // Also check on error event
                    cssLink.onerror = function() {
                        if (!document.getElementById('fallback-css')) {
                            var link = document.createElement('link');
                            link.rel = 'stylesheet';
                            link.href = fallbackCss;
                            link.id = 'fallback-css';
                            document.head.appendChild(link);
                            console.log('CSS fallback loaded from dev server (error detected)');
                        }
                    };
                })();
            </script>
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
    {{-- Google Tag Manager (noscript) --}}
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PZHBL2C"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
    <div style="position:fixed;bottom:96px;right:16px;z-index:9999;width:56px;height:56px;">
        {{-- Ripple rings --}}
        <span style="position:absolute;inset:0;border-radius:9999px;background:#25D366;opacity:0.4;animation:wa-ripple 2s ease-out infinite;"></span>
        <span style="position:absolute;inset:0;border-radius:9999px;background:#25D366;opacity:0.25;animation:wa-ripple 2s ease-out infinite 0.6s;"></span>

        {{-- WhatsApp Button --}}
        <a
            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsappNumber) }}?text={{ urlencode($whatsappMessage) }}"
            target="_blank"
            rel="noopener noreferrer"
            style="position:relative;display:flex;align-items:center;justify-content:center;width:56px;height:56px;background:#25D366;border-radius:9999px;box-shadow:0 4px 15px rgba(37,211,102,0.4);transition:transform 0.2s,background 0.2s;"
            onmouseover="this.style.background='#1ebe5d';this.style.transform='scale(1.1)';"
            onmouseout="this.style.background='#25D366';this.style.transform='scale(1)';"
            aria-label="Chat with us on WhatsApp"
            title="Chat with us on WhatsApp"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" style="width:30px;height:30px;">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.882 2.64.001 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.882m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

    <style>
        @keyframes wa-ripple {
            0%   { transform: scale(1);   opacity: 0.4; }
            70%  { transform: scale(1.5); opacity: 0;   }
            100% { transform: scale(1.5); opacity: 0;   }
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
