@extends('layouts.main')

@push('styles')
<style>
    /* Homepage-specific lg:text-6xl override */
    @media (min-width: 1024px) {
        .lg\:text-6xl {
            font-size: 2.75rem;
            line-height: 1;
        }
    }
</style>
@endpush

@section('content')
@php
    $locationData = getLocationData();
    $featuredServices = $services->take(6) ?? collect([]);
    $featuredTestimonials = $testimonials->take(3) ?? collect([]);
    $featuredBlogs = $blogs->take(3) ?? collect([]);
    $homeData = $home ?? null;
    $journeyData = $journey->first() ?? null;
    $certificateData = $certificate->first() ?? null;
    
    // Toronto phone number - format for WhatsApp (remove + and spaces)
    $phoneNumber = '+14169897788';
    $whatsappNumber = preg_replace('/[^0-9]/', '', $phoneNumber); // Remove + and spaces: 14169897788
    $displayNumber = '+1 416 989 7788';
@endphp

<div class="min-h-screen overflow-x-hidden" x-data="{ 
    currentImageIndex: 0,
    currentNewsIndex: 0,
    heroHeight: window.innerWidth < 768 ? '700px' : 'auto',
    isMobile: window.innerWidth < 768,
    init() {
        // Detect mobile on init
        this.isMobile = window.innerWidth < 768;
        
        // Set initial height to prevent shift
        if (this.isMobile) {
            this.heroHeight = '700px';
        }
        
        // Wait for images to load before calculating height
        this.waitForImagesAndCalculate();
        
        // Recalculate on window resize with debounce
        let resizeTimeout;
        window.addEventListener('resize', () => {
            this.isMobile = window.innerWidth < 768;
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                this.calculateHeroHeight();
            }, 250);
        });
        
        // Auto-rotate hero images
        setInterval(() => {
            this.currentImageIndex = (this.currentImageIndex + 1) % 3;
            this.updateSlidePositions();
        }, 5000);
        
        // Update slide positions on init
        this.$nextTick(() => {
            this.updateSlidePositions();
        });
    },
    updateSlidePositions() {
        this.$nextTick(() => {
            const slides = document.querySelectorAll('[data-slide-index]');
            slides.forEach((slide, index) => {
                const isActive = this.currentImageIndex === index;
                if (isActive) {
                    slide.style.position = 'relative';
                    slide.style.opacity = '1';
                } else {
                    slide.style.position = 'absolute';
                    slide.style.top = '0';
                    slide.style.left = '0';
                    slide.style.opacity = '0';
                }
            });
        });
    },
    waitForImagesAndCalculate() {
        // Calculate height immediately first to prevent shift
        this.calculateHeroHeight();
        
        // Wait for DOM to be ready and images to potentially load
        const heroSection = this.$refs.heroSection;
        if (!heroSection) {
            setTimeout(() => this.waitForImagesAndCalculate(), 100);
            return;
        }
        
        // Wait for regular img tags to load
        const images = heroSection.querySelectorAll('img');
        let loadedCount = 0;
        const totalImages = images.length;
        
        const checkComplete = () => {
            loadedCount++;
            if (loadedCount >= totalImages) {
                // All images loaded, recalculate with final height
                setTimeout(() => this.calculateHeroHeight(), 200);
            }
        };
        
        if (totalImages === 0) {
            // No img tags, recalculate after a short delay
            setTimeout(() => this.calculateHeroHeight(), 300);
            return;
        }
        
        images.forEach(img => {
            if (img.complete) {
                checkComplete();
            } else {
                img.addEventListener('load', checkComplete);
                img.addEventListener('error', checkComplete);
            }
        });
        
        // Fallback: recalculate after timeout even if images haven't loaded
        setTimeout(() => {
            this.calculateHeroHeight();
        }, 1000);
        
        // Fallback timeout - calculate even if some images haven't loaded
        setTimeout(() => {
            this.calculateHeroHeight();
        }, 2000);
    },
    calculateHeroHeight() {
        this.$nextTick(() => {
            const heroSection = this.$refs.heroSection;
            if (!heroSection) return;
            
            const contentContainer = heroSection.querySelector('[data-content-container]');
            if (!contentContainer) return;
            
            const isMobile = window.innerWidth < 768;
            
            // Temporarily show all slides to measure their heights
            const slides = contentContainer.querySelectorAll('[data-slide-index]');
            let maxSlideHeight = 0;
            
            if (slides.length > 0) {
                slides.forEach(slide => {
                    // Save original styles
                    const originalStyles = {
                        display: slide.style.display,
                        visibility: slide.style.visibility,
                        opacity: slide.style.opacity,
                        position: slide.style.position,
                        height: slide.style.height,
                        maxHeight: slide.style.maxHeight
                    };
                    
                    // Temporarily show the slide to measure its natural height
                    slide.style.display = 'block';
                    slide.style.visibility = 'hidden';
                    slide.style.opacity = '0';
                    slide.style.position = 'absolute';
                    slide.style.height = 'auto';
                    slide.style.maxHeight = 'none';
                    
                    // Force a reflow to ensure accurate measurement
                    slide.offsetHeight;
                    
                    // Measure the height including margins
                    const rect = slide.getBoundingClientRect();
                    const computedStyle = window.getComputedStyle(slide);
                    const marginTop = parseInt(computedStyle.marginTop) || 0;
                    const marginBottom = parseInt(computedStyle.marginBottom) || 0;
                    const height = rect.height + marginTop + marginBottom;
                    
                    maxSlideHeight = Math.max(maxSlideHeight, height);
                    
                    // Restore original styles
                    Object.keys(originalStyles).forEach(key => {
                        slide.style[key] = originalStyles[key] || '';
                    });
                });
            } else {
                // If no slides, measure the fallback content
                const fallbackContent = contentContainer.querySelector('h1, .mb-6');
                if (fallbackContent) {
                    const rect = contentContainer.getBoundingClientRect();
                    maxSlideHeight = rect.height || 0;
                }
            }
            
            // Measure the entire content container including button - measure actual rendered height
            // Get the parent grid container to measure full height
            const gridContainer = contentContainer.parentElement;
            let containerHeight = 0;
            
            if (gridContainer) {
                // Measure the grid container which includes all content
                const gridRect = gridContainer.getBoundingClientRect();
                containerHeight = gridRect.height || 0;
            }
            
            // If we couldn't get grid height, measure content container directly
            if (containerHeight === 0) {
                // Temporarily ensure container is visible and in normal flow
                const originalOpacity = contentContainer.style.opacity;
                contentContainer.style.opacity = '1';
                contentContainer.style.visibility = 'visible';
                contentContainer.style.display = 'block';
                
                // Force reflow
                contentContainer.offsetHeight;
                
                // Measure the full container height
                const containerRect = contentContainer.getBoundingClientRect();
                const containerComputedStyle = window.getComputedStyle(contentContainer);
                const containerMarginTop = parseInt(containerComputedStyle.marginTop) || 0;
                const containerMarginBottom = parseInt(containerComputedStyle.marginBottom) || 0;
                containerHeight = containerRect.height + containerMarginTop + containerMarginBottom;
                
                // Restore opacity
                contentContainer.style.opacity = originalOpacity || '';
            }
            
            // If container height is still too small, calculate from components
            if (containerHeight < maxSlideHeight || containerHeight === 0) {
                // Measure button height
                const buttonContainer = contentContainer.querySelector('.phone-whatsapp-link')?.parentElement;
                let buttonHeight = 0;
                if (buttonContainer) {
                    const buttonRect = buttonContainer.getBoundingClientRect();
                    buttonHeight = buttonRect.height || 60;
                } else {
                    buttonHeight = 60; // Estimate button height
                }
                
                // Calculate total: slide height + button + spacing
                containerHeight = maxSlideHeight + buttonHeight + 40; // Add gap and margins
            }
            
            // Add padding (py-12 = 48px, md:py-20 = 80px)
            const paddingTop = isMobile ? 48 : 80;
            const paddingBottom = isMobile ? 48 : 80;
            
            // Container padding already included in measured containerHeight, so don't add again
            const containerPadding = 0;
            
            // Additional spacing for safe area (minimal buffer to prevent cut-off)
            const additionalSpacing = isMobile ? 40 : 20;
            
            // Calculate total height with all spacing
            const totalHeight = containerHeight + paddingTop + paddingBottom + containerPadding + additionalSpacing;
            
            // Set minimum height for very small content
            const minHeight = isMobile ? 700 : 700;
            const calculatedHeight = Math.max(totalHeight, minHeight);
            
            // Only update if height changed significantly to prevent micro-shifts
            const currentHeight = parseInt(this.heroHeight) || minHeight;
            if (Math.abs(calculatedHeight - currentHeight) > 20 || !this.heroHeight || this.heroHeight === 'auto') {
                this.heroHeight = calculatedHeight + 'px';
            }
        });
    },
    prevNews() {
        if (this.currentNewsIndex > 0) {
            this.currentNewsIndex--;
        }
    },
    nextNews() {
        const maxIndex = Math.max(0, {{ max(0, $featuredBlogs->count() - 3) }});
        if (this.currentNewsIndex < maxIndex) {
            this.currentNewsIndex++;
        }
    }
}">
    {{-- Hero Section --}}
    <section x-ref="heroSection" class="relative py-12 md:py-20 overflow-hidden" :style="{ height: heroHeight || (isMobile ? '700px' : 'auto'), minHeight: heroHeight ? '0' : (isMobile ? '700px' : '500px') }">
        <div class="absolute inset-0 bg-blue-950">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800"></div>
            @if(isset($banner) && $banner->count() > 0)
                @foreach($banner->take(3) as $index => $bannerItem)
                    @php
                        // Check if image is external URL or local path
                        $imageUrl = (str_starts_with($bannerItem->image, 'http://') || str_starts_with($bannerItem->image, 'https://')) 
                            ? $bannerItem->image 
                            : $locationData['storage_server_path'] . $locationData['storage_image_path'] . $bannerItem->image;
                    @endphp
                    <div 
                        class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out"
                        data-image-index="{{ $index }}"
                        x-bind:class="currentImageIndex === parseInt($el.dataset.imageIndex) ? 'opacity-80' : 'opacity-0'"
                        style="background-image: url('{{ $imageUrl }}'); background-size: cover; background-position: center; background-repeat: no-repeat; will-change: opacity;"
                        x-cloak
                        x-show="true"
                    ></div>
                @endforeach
            @endif
            <div class="absolute inset-0 bg-blue-950 bg-opacity-40"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 h-full pt-8 pb-8 md:flex md:items-center md:pt-0 md:pb-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center w-full">
                <div class="opacity-0 animate-slide-up-fade" data-content-container style="min-height: 325px;">
                    @if(isset($banner) && $banner->count() > 0)
                        <div class="relative mb-8" style="min-height: 325px;">
                            @foreach($banner->take(3) as $index => $bannerItem)
                                <div 
                                    data-slide-index="{{ $index }}"
                                    x-bind:style="currentImageIndex === {{ $index }} ? 'position: relative; opacity: 1; z-index: 10;' : 'position: absolute; top: 0; left: 0; opacity: 0; z-index: 1; pointer-events: none;'"
                                    class="w-full transition-opacity duration-700 ease-out"
                                    x-cloak
                                >
                                    @if($bannerItem->badge_text)
                                        <div class="mb-6">
                                            <span class="inline-flex items-center px-4 py-2 bg-blue-800 text-blue-200 rounded-full text-sm font-medium">
                                                {{ $bannerItem->badge_text }}
                                            </span>
                                        </div>
                                    @endif
                                    
                                    @if($bannerItem->title)
                                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                                            {!! $bannerItem->title !!}
                                        </h1>
                                    @endif
                                    
                                    @if($bannerItem->sub_title)
                                        <div class="text-xl text-slate-300 leading-relaxed mb-4">
                                            {!! $bannerItem->sub_title !!}
                                        </div>
                                    @endif
                                    
                                    @if($bannerItem->description)
                                        <div class="text-lg text-slate-300 leading-relaxed mb-8">
                                            {!! $bannerItem->description !!}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Fallback content if no banners --}}
                        <div class="mb-6">
                            <span class="inline-flex items-center px-4 py-2 bg-blue-800 text-blue-200 rounded-full text-sm font-medium">
                                Journey With Confidence Migrate With Us
                            </span>
                        </div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                            Your Trusted Partner For Canada Immigration
                        </h1>
                        <p class="text-xl text-slate-300 leading-relaxed mb-4">
                            Immigration feels complex. We make it clear, easy, and convenient.
                        </p>
                    @endif
                    
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                        <a 
                            href="tel:{{ $phoneNumber }}" 
                            onclick="handlePhoneClick(event, '{{ $phoneNumber }}', '{{ $whatsappNumber }}')"
                            class="inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors phone-whatsapp-link"
                        >
                            {{-- Phone Icon (shown on mobile) --}}
                            <svg class="w-5 h-5 mr-2 phone-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            {{-- WhatsApp Icon (shown on desktop) --}}
                            <svg class="w-5 h-5 mr-2 whatsapp-icon hidden" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            <span class="link-text">Call {{ $displayNumber }}</span>
                        </a>
                    </div>
                </div>
                
                <div class="relative opacity-0 animate-fade-in-right">
                    <div class="relative z-10 bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl p-8 border border-white/20">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Talk to a Licensed Immigration Expert</h3>
                            <p class="text-gray-300 mb-2">10+ Years of Immigration Experience</p>
                            <p class="text-gray-300 mb-2">Thousands of Profiles Assessed Across Canada</p>
                            <p class="text-gray-300 mb-4">Free Immigration Eligibility Assessment</p>
                        </div>
                        
                        <div class="mb-6">
                            <p class="text-gray-300 text-sm mb-4">Get guidance on your best path to Canadian permanent residence</p>
                            <div class="space-y-3">
                                @foreach(['Permanent Residency Eligibility', 'Provincial Nominee Program options', 'Rural And Pilot Programs', 'Sponsorship Programs'] as $item)
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-gray-300 text-sm">{{ $item }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <a href="{{ url('eligibility-check') }}" class="w-full mt-6 inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                            Start Your Free Assessment Today
                        </a>
                    </div>
                    
                    <div class="absolute -top-4 -right-4 bg-blue-600 text-white px-4 py-2 rounded-2xl text-sm font-medium shadow-lg z-20">
                        98% Success Rate
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-blue-600 text-white px-4 py-2 rounded-2xl text-sm font-medium shadow-lg z-20">
                        10+ Years Experience
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- KGraph Introduction --}}
    <section class="py-20 bg-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <div class="lg:sticky lg:top-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">KGraph Immigration</h2>
                    <p class="text-xl text-blue-200 font-medium mb-8">Get the Most Accurate Guided Pathway to Canada</p>
                    <p class="text-lg text-blue-200 leading-relaxed mb-8 text-justify">
                        At KGraph Immigration, we help you plan to move to Canada with the right steps. We have hands-on experience in Canadian immigration with more than 10 thousand past cases and hundreds of ongoing applications. We focus on simplifying the process for you. Our team of experts review your profile carefully, explains your options clearly, and helps you make informed decisions at every stage. As Regulated Canadian Immigration Consultants, we follow all the legal steps that protect your application and your future. Our role is simple: to guide you step by step with clarity, honesty, and strategy, and get your immigration completed smoothly.
                    </p>
                    @if($certificateData)
                        <div class="bg-blue-800/50 rounded-2xl p-6 border border-blue-700">
                            <div class="flex items-start space-x-4">
                                <div class="w-24 min-h-32 md:w-72 md:h-auto bg-white rounded-xl flex items-center justify-center flex-shrink-0 p-3 md:p-6">
                                    @if($certificateData->image)
                                        <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $certificateData->image }}" alt="CICC and CCIC Certified" class="w-full h-auto object-contain">
                                    @endif
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-white mb-1">Regulated Canadian Immigration Consultants</p>
                                    <p class="text-blue-300">RCIC-licensed professionals committed to comprehensive immigration guidance.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="relative">
                    <div class="bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl shadow-2xl p-6 border-2 border-blue-600/30 backdrop-blur-sm">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="text-2xl font-bold text-white mb-1">Check Your Eligibility for Canadian Permanent Residence</h3>
                                <p class="text-blue-200 text-sm">No obligation • Clear assessment • Guidance from licensed experts</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-3 mb-6">
                            @foreach([
                                ['icon' => '✓', 'text' => 'Express Entry profile assessment'],
                                ['icon' => '✓', 'text' => 'Provincial Nominee Program eligibility review'],
                                ['icon' => '✓', 'text' => 'CRS score calculation and analysis'],
                                ['icon' => '✓', 'text' => 'Profile-based recommendations']
                            ] as $item)
                                <div class="flex items-center space-x-3 bg-blue-800/50 rounded-lg p-3 border border-blue-700/50">
                                    <div class="w-6 h-6 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-md flex items-center justify-center flex-shrink-0 shadow-md">
                                        <span class="text-white text-sm font-bold">{{ $item['icon'] }}</span>
                                    </div>
                                    <span class="text-blue-100 text-sm font-medium">{{ $item['text'] }}</span>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ url('eligibility-check') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors shadow-lg shadow-green-600/30">
                            Free Eligibility Check
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Your Canadian Immigration - In Trusted Hands --}}
    <section class="pt-20 pb-4 bg-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Your Canadian Immigration - In Trusted Hands</h2>
                <p class="text-xl text-blue-200 font-medium mb-8">Experience, Excellence, and Expertise!</p>
                <p class="text-lg text-blue-200 max-w-4xl mx-auto leading-relaxed mb-8">
                    We operate with complete authorisation under RCIC, CAPIC, and the Ministry of the Attorney General, Ontario, so your application stays compliant, transparent, and protected at every stage.
                </p>
                <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-800 rounded-lg font-medium hover:bg-blue-50 transition-colors">
                    Speak With an Authorised Immigration Consultant
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Trust Badges / Stats --}}
    <section class="py-16 bg-blue-900 border-b border-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">WHY CHOOSE KGRAPH IMMIGRATION</h2>
                <p class="text-gray-300 max-w-2xl mx-auto">We focus on clear guidance, legal processes, and outcomes built on expertise and years of experience.</p>
            </div>
            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
                @php
                    $stats = [
                        ['value' => '10,000+', 'label' => 'Clients Served', 'icon' => 'users'],
                        ['value' => '98%', 'label' => 'Approval Rate', 'icon' => 'trending'],
                        ['value' => '100%', 'label' => 'Full Proof System', 'icon' => 'award'],
                        ['value' => '4.9/5', 'label' => 'Rated', 'icon' => 'star']
                    ];
                @endphp
                @foreach($stats as $index => $stat)
                    <div class="text-center opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                        <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl p-3 md:p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-blue-700/50 h-full flex flex-col items-center justify-center gap-2 md:gap-0">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-700 rounded-lg md:rounded-xl flex items-center justify-center flex-shrink-0 md:mb-4">
                                @if($stat['icon'] == 'users')
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                @elseif($stat['icon'] == 'trending')
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                                @elseif($stat['icon'] == 'award')
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                                @else
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                                @endif
                            </div>
                            <div class="text-lg md:text-3xl font-bold text-white md:mb-2">{{ $stat['value'] }}</div>
                            <div class="text-xs md:text-base text-blue-100 font-medium text-center">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Service Categories --}}
    <section class="pt-12 pb-4 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 text-left md:text-center">
                    Comprehensive Immigration Services Built Around Your Eligibility
                </h2>
                <p class="text-xl text-blue-200 text-left md:text-center md:max-w-3xl md:mx-auto">
                    We provide expert guidance for all your Canadian immigration needs - permanent residency & temporary permits.
                </p>
            </div>
            
            {{-- Horizontal Scrollable Cards - All Devices with Navigation Arrows --}}
            <div class="relative px-4 md:px-12 py-8" x-data="{ 
                scrollContainer: null,
                canScrollLeft: false,
                canScrollRight: true,
                checkScroll() {
                    if (this.scrollContainer) {
                        this.canScrollLeft = this.scrollContainer.scrollLeft > 0;
                        this.canScrollRight = this.scrollContainer.scrollLeft < (this.scrollContainer.scrollWidth - this.scrollContainer.clientWidth - 10);
                    }
                },
                scrollLeft() {
                    if (this.scrollContainer) {
                        this.scrollContainer.scrollBy({ left: -400, behavior: 'smooth' });
                    }
                },
                scrollRight() {
                    if (this.scrollContainer) {
                        this.scrollContainer.scrollBy({ left: 400, behavior: 'smooth' });
                    }
                }
            }" x-init="
                scrollContainer = $refs.scrollContainer;
                checkScroll();
                scrollContainer.addEventListener('scroll', () => checkScroll());
                new ResizeObserver(() => checkScroll()).observe(scrollContainer);
            ">
                {{-- Left Arrow --}}
                <button 
                    @click="scrollLeft()"
                    x-show="canScrollLeft"
                    x-cloak
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    class="absolute left-0 z-20 bg-blue-800/20 hover:bg-blue-800/40 backdrop-blur-md text-white rounded-full p-1.5 md:p-4 shadow-lg hover:shadow-xl border border-white/20 hover:border-white/30 transition-all duration-200 flex items-center justify-center w-8 h-8 md:w-14 md:h-14"
                    style="top: 50%; transform: translateY(-50%);"
                    aria-label="Scroll left"
                >
                    <svg class="w-4 h-4 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                {{-- Right Arrow --}}
                <button 
                    @click="scrollRight()"
                    x-show="canScrollRight"
                    x-cloak
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    class="absolute right-0 z-20 bg-blue-800/20 hover:bg-blue-800/40 backdrop-blur-md text-white rounded-full p-1.5 md:p-4 shadow-lg hover:shadow-xl border border-white/20 hover:border-white/30 transition-all duration-200 flex items-center justify-center w-8 h-8 md:w-14 md:h-14"
                    style="top: 50%; transform: translateY(-50%);"
                    aria-label="Scroll right"
                >
                    <svg class="w-4 h-4 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div 
                    x-ref="scrollContainer"
                    class="flex flex-nowrap gap-6 overflow-x-auto pb-4 scrollbar-hide scroll-smooth snap-x snap-mandatory touch-pan-x"
                >
                {{-- Permanent Residency --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up flex-shrink-0 w-[90%] sm:w-[85%] md:w-[400px] lg:w-[350px] snap-start" style="animation-delay: 0s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Permanent Residency</h3>
                    <ul class="space-y-2">
                        @foreach(['Express Entry', 'PNP', 'Family Sponsorship', 'Business/Investor Visa'] as $service)
                            <li>
                                <a href="{{ $serviceLinks[$service] ?? url('services') }}" class="group text-blue-200 hover:text-white transition-all duration-200 flex items-center py-5 md:py-2.5 px-4 rounded-lg bg-blue-800/30 hover:bg-blue-700/60 border border-blue-700/50 hover:border-blue-500 hover:shadow-lg cursor-pointer">
                                    <span class="w-2.5 h-2.5 bg-blue-400 rounded-full mr-3 group-hover:bg-blue-300 transition-colors flex-shrink-0"></span>
                                    <span class="text-base md:text-sm font-medium underline decoration-blue-400/50 hover:decoration-blue-300 flex-grow">{{ $service }}</span>
                                    <svg class="w-4 h-4 ml-2 opacity-60 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Temporary Residency --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up flex-shrink-0 w-[90%] sm:w-[85%] md:w-[400px] lg:w-[350px] snap-start" style="animation-delay: 0.1s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Temporary Residency</h3>
                    <ul class="space-y-2">
                        @foreach(['PGWP', 'Spouse Open Work Permit', 'Visiting Visa', 'Super Visa'] as $service)
                            <li>
                                <a href="{{ $serviceLinks[$service] ?? url('services') }}" class="group text-blue-200 hover:text-white transition-all duration-200 flex items-center py-5 md:py-2.5 px-4 rounded-lg bg-blue-800/30 hover:bg-blue-700/60 border border-blue-700/50 hover:border-blue-500 hover:shadow-lg cursor-pointer">
                                    <span class="w-2.5 h-2.5 bg-blue-400 rounded-full mr-3 group-hover:bg-blue-300 transition-colors flex-shrink-0"></span>
                                    <span class="text-base md:text-sm font-medium underline decoration-blue-400/50 hover:decoration-blue-300 flex-grow">{{ $service }}</span>
                                    <svg class="w-4 h-4 ml-2 opacity-60 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Refusals and Appeals --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up flex-shrink-0 w-[90%] sm:w-[85%] md:w-[400px] lg:w-[350px] snap-start" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Refusals and Appeals</h3>
                    <ul class="space-y-2">
                        @foreach(['IAD Appeals', 'Refusal and Reapplication'] as $service)
                            <li>
                                <a href="{{ $serviceLinks[$service] ?? url('services') }}" class="group text-blue-200 hover:text-white transition-all duration-200 flex items-center py-5 md:py-2.5 px-4 rounded-lg bg-blue-800/30 hover:bg-blue-700/60 border border-blue-700/50 hover:border-blue-500 hover:shadow-lg cursor-pointer">
                                    <span class="w-2.5 h-2.5 bg-blue-400 rounded-full mr-3 group-hover:bg-blue-300 transition-colors flex-shrink-0"></span>
                                    <span class="text-base md:text-sm font-medium underline decoration-blue-400/50 hover:decoration-blue-300 flex-grow">{{ $service }}</span>
                                    <svg class="w-4 h-4 ml-2 opacity-60 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Pilot and Rural Programs --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up flex-shrink-0 w-[90%] sm:w-[85%] md:w-[400px] lg:w-[350px] snap-start" style="animation-delay: 0.3s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Pilot and Rural Programs</h3>
                    <ul class="space-y-2">
                        @foreach(['RCIP', 'AIP', 'Home Caregiver'] as $service)
                            <li>
                                <a href="{{ $serviceLinks[$service] ?? url('services') }}" class="group text-blue-200 hover:text-white transition-all duration-200 flex items-center py-5 md:py-2.5 px-4 rounded-lg bg-blue-800/30 hover:bg-blue-700/60 border border-blue-700/50 hover:border-blue-500 hover:shadow-lg cursor-pointer">
                                    <span class="w-2.5 h-2.5 bg-blue-400 rounded-full mr-3 group-hover:bg-blue-300 transition-colors flex-shrink-0"></span>
                                    <span class="text-base md:text-sm font-medium underline decoration-blue-400/50 hover:decoration-blue-300 flex-grow">{{ $service }}</span>
                                    <svg class="w-4 h-4 ml-2 opacity-60 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- LMIA --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up flex-shrink-0 w-[90%] sm:w-[85%] md:w-[400px] lg:w-[350px] snap-start" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">LMIA</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ $serviceLinks['Labour Market Impact Assessment'] ?? url('service-details/labour-market-impact-assessment') }}" class="group text-blue-200 hover:text-white transition-all duration-200 flex items-center py-5 md:py-2.5 px-4 rounded-lg bg-blue-800/30 hover:bg-blue-700/60 border border-blue-700/50 hover:border-blue-500 hover:shadow-lg cursor-pointer">
                                <span class="w-2.5 h-2.5 bg-blue-400 rounded-full mr-3 group-hover:bg-blue-300 transition-colors flex-shrink-0"></span>
                                <span class="text-base md:text-sm font-medium underline decoration-blue-400/50 hover:decoration-blue-300 flex-grow">Labour Market Impact Assessment</span>
                                <svg class="w-4 h-4 ml-2 opacity-60 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Your Path to Canada in 4 Simple Steps --}}
    <section class="py-20 bg-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Your Path to Canada in 4 Simple Steps
                </h2>
                <h3 class="text-xl text-blue-300 font-semibold mb-4">
                    A Comprehensive Approach to Canadian Immigration
                </h3>
                <p class="text-xl text-blue-200 max-w-3xl mx-auto">
                    We follow a structured, transparent process so you always know what's happening, why it matters, and what comes next.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @if(isset($processSteps) && $processSteps->count() > 0)
                    @foreach($processSteps as $index => $item)
                        <div class="text-center md:text-center opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.2 }}s; animation-fill-mode: forwards;">
                            <div class="flex md:flex-col items-start md:items-center gap-4 md:gap-0">
                                <div class="relative flex-shrink-0 md:mb-6">
                                    <div class="w-12 h-12 md:w-20 md:h-20 bg-blue-700 rounded-2xl flex items-center justify-center text-white">
                                        @if($item->icon == 'users')
                                            @include('frontend.icons.users', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'shield')
                                            @include('frontend.icons.shield', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'check' || $item->icon == 'check-circle')
                                            @include('frontend.icons.check-circle', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'award')
                                            @include('frontend.icons.award', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'trending-up')
                                            @include('frontend.icons.trending-up', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'globe')
                                            @include('frontend.icons.globe', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'book-open')
                                            @include('frontend.icons.book-open', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'briefcase')
                                            @include('frontend.icons.briefcase', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'clock')
                                            @include('frontend.icons.clock', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item->icon == 'users-group')
                                            @include('frontend.icons.users-group', ['class' => 'w-8 h-8 text-blue-300'])
                                        @else
                                            @include('frontend.icons.users', ['class' => 'w-8 h-8 text-blue-300'])
                                        @endif
                                    </div>
                                    <div class="absolute -top-1 -right-1 md:-top-2 md:-right-2 w-6 h-6 md:w-8 md:h-8 bg-blue-200 text-blue-800 rounded-full flex items-center justify-center text-xs md:text-sm font-bold">
                                        {{ $item->step_number }}
                                    </div>
                                </div>
                                <div class="flex-1 text-left md:text-center">
                                    <h3 class="text-lg md:text-xl font-bold text-white mb-2 md:mb-3">Step {{ $item->step_number }} – {{ $item->title }}</h3>
                                    <p class="text-blue-200 text-sm md:text-base leading-relaxed">{{ $item->description }}</p>
                                    @if($item->timeline)
                                        <p class="text-blue-300 text-xs md:text-sm mt-2 font-semibold">{{ $item->timeline }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Fallback to hardcoded data if no steps in database --}}
                    @php
                        $fallbackSteps = [
                            [
                                'step' => '01',
                                'title' => 'Free Assessment',
                                'description' => 'We understand your background, goals, and concerns, assessing your eligibility to explain which immigration pathways best suit you.',
                                'icon' => 'users'
                            ],
                            [
                                'step' => '02',
                                'title' => 'Strategy Development',
                                'description' => 'We develop a clear immigration strategy for your profile by assessing your eligibility, documentation, and long-term plans.',
                                'icon' => 'shield'
                            ],
                            [
                                'step' => '03',
                                'title' => 'Application Preparation',
                                'description' => 'Our team manages your application preparation, ensuring accuracy with Canadian immigration requirements.',
                                'icon' => 'check'
                            ],
                            [
                                'step' => '04',
                                'title' => 'Success & Ongoing Support',
                                'description' => 'After submission or approval, guide you in preparing for your next steps to support your transition to Canada.',
                                'icon' => 'award'
                            ]
                        ];
                    @endphp
                    @foreach($fallbackSteps as $index => $item)
                        <div class="text-center md:text-center opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.2 }}s; animation-fill-mode: forwards;">
                            <div class="flex md:flex-col items-start md:items-center gap-4 md:gap-0">
                                <div class="relative flex-shrink-0 md:mb-6">
                                    <div class="w-12 h-12 md:w-20 md:h-20 bg-blue-700 rounded-2xl flex items-center justify-center text-white">
                                        @if($item['icon'] == 'users')
                                            @include('frontend.icons.users', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item['icon'] == 'shield')
                                            @include('frontend.icons.shield', ['class' => 'w-8 h-8 text-blue-300'])
                                        @elseif($item['icon'] == 'check')
                                            @include('frontend.icons.check-circle', ['class' => 'w-8 h-8 text-blue-300'])
                                        @else
                                            @include('frontend.icons.award', ['class' => 'w-8 h-8 text-blue-300'])
                                        @endif
                                    </div>
                                    <div class="absolute -top-1 -right-1 md:-top-2 md:-right-2 w-6 h-6 md:w-8 md:h-8 bg-blue-200 text-blue-800 rounded-full flex items-center justify-center text-xs md:text-sm font-bold">
                                        {{ $item['step'] }}
                                    </div>
                                </div>
                                <div class="flex-1 text-left md:text-center">
                                    <h3 class="text-lg md:text-xl font-bold text-white mb-2 md:mb-3">Step {{ $item['step'] }} – {{ $item['title'] }}</h3>
                                    <p class="text-blue-200 text-sm md:text-base leading-relaxed">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    @if($featuredTestimonials->count() > 0)
    <section class="py-20 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-left md:text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Real Experiences From People We've Guided</h2>
                <p class="text-xl text-blue-200 md:max-w-4xl md:mx-auto leading-relaxed mb-4">
                    Immigration decisions come with uncertainty, paperwork, and high emotional stakes. Many of our clients come to us feeling unsure about the process or concerned about making costly mistakes.
                </p>
                <p class="text-lg text-blue-200 md:max-w-4xl md:mx-auto leading-relaxed mb-4">
                    Across permanent residence, work permits, and family visas, we've supported individuals and families with clear guidance, careful preparation, and consistent communication. The experiences below reflect how we work and make us the top partner for Canada immigration with our professionalism, transparency, and attention to detail at every step.
                </p>
                <p class="text-lg text-blue-200 md:max-w-4xl md:mx-auto leading-relaxed mb-6">
                    Client-rated 4.9 out of 5 based on verified experiences
                </p>
                <div class="mt-6">
                    <a href="{{ url('eligibility-check') }}" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                        Thinking about your next step? Start with a free eligibility review.
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <div class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto md:overflow-x-visible pb-4 md:pb-0 scrollbar-hide -mx-4 px-4 md:mx-0 md:px-0">
                @foreach($featuredTestimonials as $index => $testimonial)
                    <div class="flex-shrink-0 w-[85%] md:w-auto">
                        @include('frontend.Common.testimonial-card', ['testimonial' => $testimonial, 'index' => $index])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Insights and Tips Section --}}
    @if($featuredBlogs->count() > 0)
    <section class="py-20 bg-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-left md:text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Insights and Tips for Your Immigration Journey
                </h2>
                <h3 class="text-xl text-blue-300 font-semibold mb-6">
                    Stay Updated on Canada Immigration News and Trends
                </h3>
                <p class="text-lg text-blue-200 md:max-w-5xl md:mx-auto leading-relaxed mb-4">
                    Immigration rules keep updating periodically, and missing a small update can delay your plans significantly. We use this space to break down important Canadian immigration updates in clear, accurate, and easy-to-follow guidelines for aspiring Canadian immigrants.
                </p>
                <p class="text-lg text-blue-200 md:max-w-5xl md:mx-auto leading-relaxed mb-4">
                    From new immigration pathways, eligibility changes, processing timelines and government announcements, our team tracks what is really valuable to the applicants. We regularly share insights on Post-Graduation Work Permits (PGWP), visitor visas, permanent residence applications, and family and spouse sponsorships, along with guidance around refusals and reapplications.
                </p>
                <p class="text-lg text-blue-200 md:max-w-5xl md:mx-auto leading-relaxed mb-6">
                    Our goal is to help you stay informed and prepared at every stage of your immigration journey.
                </p>
                <div class="text-center">
                    <a href="{{ url('blogs') }}" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-lg transition-all duration-200 shadow-lg active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Read the Latest Updates
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            
            {{-- News Slider --}}
            <div class="mt-20 overflow-hidden">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-bold text-white">Latest Immigration News</h3>
                    <div class="hidden md:flex items-center space-x-2">
                        <button
                            @click="prevNews()"
                            class="w-10 h-10 bg-blue-800 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 button-glow"
                            aria-label="Previous news"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            @click="nextNews()"
                            class="w-10 h-10 bg-blue-800 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 button-glow"
                            aria-label="Next news"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="relative overflow-x-auto md:overflow-hidden -mx-3 scrollbar-hide">
                    <div 
                        class="flex transition-transform duration-500 ease-in-out"
                        x-bind:style="'transform: translateX(-' + (currentNewsIndex * (100 / 3)) + '%)'"
                        x-cloak
                    >
                        @foreach($featuredBlogs as $index => $article)
                            <div class="w-full md:w-1/3 flex-shrink-0 px-3 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                                <div class="bg-blue-800 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-blue-700 overflow-hidden h-full">
                                    {{-- Image --}}
                                    <div class="relative aspect-video overflow-hidden">
                                        @if($article->image)
                                            <img
                                                src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $article->image }}"
                                                alt="{{ $article->title }}"
                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                                            />
                                        @else
                                            <div class="w-full h-full bg-blue-700 flex items-center justify-center">
                                                <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/50 to-transparent"></div>
                                    </div>
                                    
                                    {{-- Content --}}
                                    <div class="p-6">
                                        {{-- Date and Time --}}
                                        <div class="flex items-center text-sm text-blue-300 mb-3 space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span>{{ $article->date ? \Carbon\Carbon::parse($article->date)->format('F d, Y') : 'Recent' }}</span>
                                            @if($article->time)
                                                <span>•</span>
                                                <span>{{ $article->time }}</span>
                                            @endif
                                        </div>

                                        {{-- Title --}}
                                        <h4 class="text-lg font-bold text-white mb-3 line-clamp-2">
                                            {{ $article->title }}
                                        </h4>

                                        {{-- Author --}}
                                        @if($article->name)
                                            <div class="flex items-center text-sm text-blue-300 mb-3 space-x-1 md:hidden">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                <span>{{ $article->name }}</span>
                                            </div>
                                        @endif
                                        
                                        {{-- Excerpt --}}
                                        @if($article->description)
                                            <p class="text-blue-200 text-sm leading-relaxed mb-4 line-clamp-3">
                                                {{ Str::limit(strip_tags($article->description), 150) }}
                                            </p>
                                        @endif

                                        {{-- Author - Desktop only --}}
                                        @if($article->name)
                                            <div class="hidden md:flex items-center text-sm text-blue-300 mb-4 space-x-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                <span>{{ $article->name }}</span>
                                            </div>
                                        @endif

                                        {{-- Read More Button --}}
                                        <a href="{{ url('blogs/' . ($article->slug ?? $article->id)) }}" class="inline-flex items-center text-blue-300 hover:text-blue-200 font-medium transition-colors group">
                                            Read More
                                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Mobile Navigation Dots --}}
                <div class="flex md:hidden justify-center mt-6 space-x-2">
                    @php
                        $maxDots = max(1, $featuredBlogs->count() - 2);
                    @endphp
                    @for($i = 0; $i < $maxDots; $i++)
                        <button
                            data-dot-index="{{ $i }}"
                            @click="currentNewsIndex = parseInt($el.dataset.dotIndex)"
                            class="w-2 h-2 rounded-full transition-colors"
                            x-bind:class="currentNewsIndex === parseInt($el.dataset.dotIndex) ? 'bg-blue-400' : 'bg-blue-700'"
                            aria-label="Go to slide {{ $i + 1 }}"
                            x-cloak
                        ></button>
                    @endfor
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- FAQ Section --}}
    @if(isset($faqs) && $faqs->count() > 0)
    <section class="py-20 bg-blue-950">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Got immigration questions?</h2>
                <p class="text-xl text-blue-200 font-medium mb-2">We have the answers.</p>
                <p class="text-lg text-blue-200">Get the facts. Forget the myths.</p>
            </div>
            @include('frontend.Common.faq', ['faqs' => $faqs, 'title' => ''])
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="pt-20 pb-4 bg-blue-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready To Apply For Canadian Immigration?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Contact KGraph today for a smooth & guided process with successful immigration approval.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ url('eligibility-check') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-800 rounded-lg font-medium hover:bg-blue-50 transition-colors">
                    Free Eligibility Check
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                <a href="tel:+14169897788" class="inline-flex items-center justify-center px-6 py-3 border-2 border-blue-200 text-blue-200 rounded-lg font-medium hover:bg-blue-200 hover:text-blue-800 transition-colors">
                    Call +1 416 989 7788
                </a>
            </div>
        </div>
    </section>
</div>

<script>
(function() {
    // Detect if device is mobile
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    const link = document.querySelector('.phone-whatsapp-link');
    const displayNumber = '{{ $displayNumber }}';
    
    if (link) {
        const phoneIcon = link.querySelector('.phone-icon');
        const whatsappIcon = link.querySelector('.whatsapp-icon');
        const linkText = link.querySelector('.link-text');
        
        if (!isMobile) {
            // Desktop: Show WhatsApp icon, hide phone icon
            if (phoneIcon) phoneIcon.classList.add('hidden');
            if (whatsappIcon) whatsappIcon.classList.remove('hidden');
            if (linkText) linkText.textContent = 'Chat on WhatsApp';
        } else {
            // Mobile: Show phone icon, hide WhatsApp icon
            if (phoneIcon) phoneIcon.classList.remove('hidden');
            if (whatsappIcon) whatsappIcon.classList.add('hidden');
            if (linkText) linkText.textContent = 'Call ' + displayNumber;
        }
    }
    
    // Handle click event
    window.handlePhoneClick = function(event, phoneNumber, whatsappNumber) {
        const isMobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        
        if (!isMobileDevice) {
            // Desktop/Web: Open WhatsApp chat
            event.preventDefault();
            const whatsappUrl = `https://wa.me/${whatsappNumber}`;
            window.open(whatsappUrl, '_blank');
        }
        // Mobile: Let the default tel: link work (normal phone call)
    };
})();
</script>

<style>
    @keyframes smooth-fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .animate-slide-up-fade {
        animation: smooth-fade-in 1s ease-in-out forwards !important;
        animation-delay: 0.15s !important;
        will-change: opacity;
    }
    @media (max-width: 767px) {
        .animate-slide-up-fade {
            animation: smooth-fade-in 1s ease-in-out forwards !important;
            animation-delay: 0.15s !important;
            will-change: opacity;
        }
    }
    /* Smooth slide transitions - prevent layout shifts */
    [data-slide-index] {
        will-change: opacity;
        transition: opacity 0.7s ease-out;
    }
    [data-slide-index][style*="position: absolute"] {
        pointer-events: none;
    }
    [data-slide-index][style*="opacity: 1"] {
        pointer-events: auto;
    }
    @keyframes fade-in-left {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    @keyframes fade-in-right {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .animate-fade-in-left {
        animation: fade-in-left 0.8s ease-out forwards;
    }
    .animate-fade-in-right {
        animation: fade-in-right 0.8s ease-out 0.2s forwards;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
</style>
@endsection
