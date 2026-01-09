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
@endphp

<div class="min-h-screen overflow-x-hidden" x-data="{ 
    currentImageIndex: 0,
    currentNewsIndex: 0,
    init() {
        // Auto-rotate hero images
        setInterval(() => {
            this.currentImageIndex = (this.currentImageIndex + 1) % 3;
        }, 5000);
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
    <section class="relative py-20 overflow-hidden min-h-[600px]">
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
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 -mt-8 lg:mt-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="opacity-0 animate-fade-in-left">
                    @if(isset($banner) && $banner->count() > 0)
                        <div class="relative mb-8" style="min-height: 400px;">
                            @foreach($banner->take(3) as $index => $bannerItem)
                                <div 
                                    data-slide-index="{{ $index }}"
                                    x-show="currentImageIndex === parseInt($el.dataset.slideIndex)"
                                    x-transition:enter="transition ease-out duration-500"
                                    x-transition:enter-start="opacity-0 translate-y-4"
                                    x-transition:enter-end="opacity-1 translate-y-0"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-1 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-4"
                                    class="absolute top-0 left-0 right-0"
                                    x-cloak
                                    @if($index === 0)
                                        style="display: block;"
                                    @else
                                        style="display: none;"
                                    @endif
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
                    
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 hidden">
                        <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                            Book Free Consultation
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
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
                        
                        <a href="{{ url('contact-us') }}" class="w-full mt-6 inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
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
    <section class="py-20 bg-blue-800">
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
    <section class="py-20 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 text-left md:text-center">
                    Comprehensive Immigration Services Built Around Your Eligibility
                </h2>
                <p class="text-xl text-blue-200 text-left md:text-center md:max-w-3xl md:mx-auto">
                    We provide expert guidance for all your Canadian immigration needs - permanent residency & temporary permits.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Permanent Residency --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up" style="animation-delay: 0s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Permanent Residency</h3>
                    <ul class="space-y-3">
                        @foreach(['Express Entry', 'PNP', 'Family Sponsorship', 'Business/Investor Visa'] as $service)
                            <li>
                                <a href="{{ $serviceLinks[$service] ?? url('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                    {{ $service }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Temporary Residency --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up" style="animation-delay: 0.1s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Temporary Residency</h3>
                    <ul class="space-y-3">
                        @foreach(['PGWP', 'Spouse Open Work Permit', 'Visiting Visa', 'Super Visa'] as $service)
                            <li>
                                <a href="{{ $serviceLinks[$service] ?? url('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                    {{ $service }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Refusals and Appeals --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Refusals and Appeals</h3>
                    <ul class="space-y-3">
                        @foreach(['IAD Appeals', 'Refusal and Reapplication'] as $service)
                            <li>
                                <a href="{{ $serviceLinks[$service] ?? url('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                    {{ $service }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Pilot and Rural Programs --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Pilot and Rural Programs</h3>
                    <ul class="space-y-3">
                        @foreach(['RCIP', 'AIP', 'Home Caregiver'] as $service)
                            <li>
                                <a href="{{ $serviceLinks[$service] ?? url('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                    {{ $service }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- LMIA --}}
                <div class="bg-blue-900 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-blue-800 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">LMIA</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ $serviceLinks['Labour Market Impact Assessment'] ?? url('service-details/labour-market-impact-assessment') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                Labour Market Impact Assessment
                            </a>
                        </li>
                    </ul>
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
                    <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                        Thinking about your next step? Start with a free eligibility review.
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredTestimonials as $index => $testimonial)
                    @include('frontend.Common.testimonial-card', ['testimonial' => $testimonial, 'index' => $index])
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
    <section class="py-20 bg-blue-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready To Apply For Canadian Immigration?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Contact KGraph today for a smooth & guided process with successful immigration approval.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-800 rounded-lg font-medium hover:bg-blue-50 transition-colors">
                    Book Free Consultation
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

<style>
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
</style>
@endsection
