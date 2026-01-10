@extends('layouts.main')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<style>
    .packaginner-banner {
        position: relative;
        min-height: 500px;
        background: #062358;
    }
    
    .packaginner-banner img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        z-index: 0;
    }
    
    .packages-banner-overlay {
        background: rgba(0, 0, 0, 0.6);
        height: 100%;
        position: relative;
        z-index: 1;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .accordion-content {
        transition: max-height 0.3s ease-out, padding 0.3s ease-out;
    }
    
    /* Ensure text is visible in cards */
    .package-card p,
    .package-card h3 {
        color: #0f172a !important;
    }
    
    .package-card .text-slate-600 {
        color: #475569 !important;
    }
    
    /* Ensure FAQ text is visible */
    .faq-card h4 {
        color: #0f172a !important;
    }
    
    .faq-card .accordion-content {
        color: #475569 !important;
    }
    
    .faq-card .accordion-content * {
        color: #475569 !important;
    }
    
    .faq-card .accordion-content p {
        margin-bottom: 1rem;
        line-height: 1.7;
    }
    
    .faq-card .accordion-content ul,
    .faq-card .accordion-content ol {
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .faq-card .accordion-content li {
        margin-bottom: 0.5rem;
    }
    
    .faq-card .accordion-content strong {
        color: #0f172a !important;
        font-weight: 600;
    }
    
    .faq-card .accordion-content a {
        color: #2563eb !important;
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
@php
    $locationData = getLocationData();
    $studyData = $study->first() ?? null;
@endphp

<div class="min-h-screen bg-slate-50">
    @if($studyData)
        {{-- Hero Section --}}
        <div class="packaginner-banner h-full relative overflow-hidden min-h-[500px]">
            @if($studyData->study_banner_image)
                <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $studyData->study_banner_image }}"
                     alt="Study in Canada">
            @endif
            <div class="packages-banner-overlay">
                <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                    <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                        <div class="text-sm text-slate-400 mb-4">
                            <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a> 
                            <span class="mx-2">/</span>
                            <span class="text-slate-300">Study</span>
                            <span class="mx-2">/</span>
                            <span class="text-slate-300">Study in Canada</span>
                        </div>
                        <div class="text-center text-white">
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                                {{ $studyData->study_banner_title }}
                            </h1>
                            <p class="text-xl text-slate-300 leading-relaxed max-w-4xl mx-auto mb-8">
                                {!! $studyData->banner_description !!}
                            </p>
                            <a href="{{ url('contact-us') }}" 
                               class="inline-flex items-center px-8 py-4 bg-white text-blue-700 rounded-full font-semibold hover:bg-blue-50 transition-all duration-200 shadow-lg hover:shadow-xl">
                                Connect With Us
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- About Section --}}
        @if($studyData->sub_content_title || $studyData->sub_content_description)
        <section class="py-16 bg-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="opacity-0 animate-fade-in-left" style="animation-fill-mode: forwards;">
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                            {{ $studyData->sub_content_title }}
                        </h2>
                        <p class="text-lg text-slate-300 leading-relaxed mb-8">
                            {!! $studyData->sub_content_description !!}
                        </p>
                        <button class="px-8 py-3 border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-slate-900 transition-all duration-200">
                            Learn More
                        </button>
                    </div>
                    @if($studyData->sub_image)
                    <div class="opacity-0 animate-fade-in-right" style="animation-fill-mode: forwards;">
                        <img class="w-full h-[400px] object-cover rounded-3xl shadow-2xl" 
                             src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $studyData->sub_image }}" 
                             alt="{{ $studyData->sub_content_title }}">
                    </div>
                    @endif
                </div>
            </div>
        </section>
        @endif

        {{-- Packages Section --}}
        @if($studyData->package_title || $studyData->package_description || ($studyData->packages && $studyData->packages->count() > 0))
        <section class="py-16 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @if($studyData->package_title || $studyData->package_description)
                <div class="text-center mb-12 opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        {{ $studyData->package_title }}
                    </h2>
                    <p class="text-xl text-slate-300 max-w-3xl mx-auto">
                        {!! $studyData->package_description !!}
                    </p>
                </div>
                @endif

                @if($studyData->packages && $studyData->packages->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($studyData->packages as $index => $package)
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 opacity-0 animate-fade-in-up package-card" 
                             style="animation-delay: {{ ($index % 4) * 0.1 }}s; animation-fill-mode: forwards;">
                            <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                                <svg width="40" height="40" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M35 0C15.701 0 0 15.701 0 35C0 54.299 15.701 70 35 70C54.299 70 70 54.299 70 35C70 15.701 54.299 0 35 0ZM7 35C7 31.8535 7.546 28.833 8.5085 26.0085L14 31.5L21 38.5V45.5L28 52.5L31.5 56V62.7585C17.7135 61.026 7 49.252 7 35ZM57.155 52.0555C54.8695 50.2145 51.4045 49 49 49V45.5C49 43.6435 48.2625 41.863 46.9497 40.5503C45.637 39.2375 43.8565 38.5 42 38.5H28V28C29.8565 28 31.637 27.2625 32.9497 25.9497C34.2625 24.637 35 22.8565 35 21V17.5H38.5C40.3565 17.5 42.137 16.7625 43.4497 15.4497C44.7625 14.137 45.5 12.3565 45.5 10.5V9.0615C55.748 13.223 63 23.275 63 35C62.9994 41.1764 60.943 47.177 57.155 52.0555Z" fill="#2563eb"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-3" style="color: #0f172a !important;">
                                {{ $package->package_list_title }}
                            </h3>
                            <p class="text-sm leading-relaxed line-clamp-3" style="color: #475569 !important;">
                                {!! strip_tags($package->package_list_description) !!}
                            </p>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
        @endif

        {{-- Cities Slider Section --}}
        @if($studyData->cities && $studyData->cities->count() > 0)
        <section class="py-16 bg-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-12 text-center">
                    Top Cities Preferred by Students in Canada
                </h2>
                <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                    <div id="studyimage-slider" class="splide" aria-label="Cities Slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($studyData->cities as $city)
                                    @if($city->cities_list_image)
                                        <li class="splide__slide">
                                            <div class="relative group">
                                                <img class="h-[260px] w-full rounded-2xl object-cover shadow-lg group-hover:scale-105 transition-transform duration-300" 
                                                     src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $city->cities_list_image }}" 
                                                     alt="{{ $city->cities_list_place }}">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent rounded-2xl"></div>
                                                <div class="absolute bottom-4 left-4">
                                                    <p class="text-white font-semibold text-lg">{{ $city->cities_list_place }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex justify-center items-center gap-5 mt-8">
                        <button id="prev-slide" class="w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="next-slide" class="w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        @endif

        {{-- FAQ Section --}}
        @if($studyData->faqs && $studyData->faqs->count() > 0)
        <section class="py-16 bg-gradient-to-br from-slate-50 to-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">
                        Have Any Questions?
                    </h2>
                    <h3 class="text-2xl md:text-3xl font-bold text-blue-600 mb-4">
                        FAQs
                    </h3>
                    <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                </div>
                <div class="space-y-4">
                    @foreach($studyData->faqs as $index => $faq)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow border border-slate-200 overflow-hidden faq-card">
                            <div class="accordion-header flex justify-between items-center p-6 cursor-pointer hover:bg-slate-50 transition-colors">
                                <h4 class="text-lg font-semibold pr-4" style="color: #0f172a !important;">{{ $faq->faq_question }}</h4>
                                <div class="flex-shrink-0">
                                    <svg class="icon-collapsed w-6 h-6 text-blue-600 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <svg class="icon-expanded hidden w-6 h-6 text-blue-600 transition-transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="accordion-content overflow-hidden max-h-0 transition-all duration-300">
                                <div class="px-6 pb-6 leading-relaxed" style="color: #475569 !important;">
                                    <div style="color: #475569 !important;">
                                        {!! $faq->faq_answer !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-12">
                    <a href="{{ url('contact-us') }}" 
                       class="inline-flex items-center px-8 py-4 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                        Ask Your Questions Through Email
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        @endif
    @endif

    @include('frontend.Common.getintouch')
</div>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Splide slider
        const sliderElement = document.getElementById('studyimage-slider');
        if (sliderElement) {
            var splide = new Splide('#studyimage-slider', {
                type: 'loop',
                perPage: 3,
                perMove: 1,
                gap: '1.5rem',
                pagination: false,
                arrows: false,
                autoplay: true,
                interval: 3000,
                pauseOnHover: true,
                breakpoints: {
                    1024: {
                        perPage: 2,
                        gap: '1rem'
                    },
                    768: {
                        perPage: 1,
                        gap: '1rem'
                    },
                }
            });

            // Custom button controls
            const prevBtn = document.getElementById('prev-slide');
            const nextBtn = document.getElementById('next-slide');
            
            if (prevBtn) {
                prevBtn.addEventListener('click', function() {
                    splide.go('<');
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function() {
                    splide.go('>');
                });
            }

            splide.mount();
        }

        // Accordion functionality
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const iconCollapsed = this.querySelector('.icon-collapsed');
                const iconExpanded = this.querySelector('.icon-expanded');

                // Close all other accordions
                document.querySelectorAll('.accordion-content').forEach(c => {
                    if (c !== content) {
                        c.style.maxHeight = null;
                    }
                });
                document.querySelectorAll('.icon-collapsed').forEach(i => {
                    if (i !== iconCollapsed) {
                        i.classList.remove('hidden');
                    }
                });
                document.querySelectorAll('.icon-expanded').forEach(i => {
                    if (i !== iconExpanded) {
                        i.classList.add('hidden');
                    }
                });

                // Toggle current accordion
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    iconCollapsed.classList.remove('hidden');
                    iconExpanded.classList.add('hidden');
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    iconCollapsed.classList.add('hidden');
                    iconExpanded.classList.remove('hidden');
                }
            });
        });
    });
</script>
@endsection
