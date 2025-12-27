@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
    $featuredServices = $serviceCategory->take(6) ?? collect([]);
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
    }
}">
    {{-- Hero Section --}}
    <section class="relative py-20 overflow-hidden min-h-[600px]">
        <div class="absolute inset-0 bg-blue-950">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800"></div>
            @if(isset($banner) && $banner->count() > 0)
                @foreach($banner->take(3) as $index => $bannerItem)
                    <div 
                        class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1500"
                        :class="{ 'opacity-80': currentImageIndex === {{ $index }}, 'opacity-0': currentImageIndex !== {{ $index }} }"
                        style="background-image: url('{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $bannerItem->image }}');"
                    ></div>
                @endforeach
            @endif
            <div class="absolute inset-0 bg-blue-950 bg-opacity-40"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="opacity-0 animate-fade-in-left">
                    <div class="mb-6">
                        <span class="inline-flex items-center px-4 py-2 bg-blue-800 text-blue-200 rounded-full text-sm font-medium">
                            Journey With Confidence Migrate With Us
                        </span>
                    </div>
                    
                    <div x-show="true">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                            The Pinnacle of Success
                        </h1>
                        <p class="text-xl text-slate-300 leading-relaxed mb-8">
                            KGraph Immigration Consultancy is a renowned provider of Canadian immigration services, We provide services that are specifically tailored to the needs of the client.
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
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
                            <h3 class="text-xl font-bold text-white mb-2">Free Immigration Assessment</h3>
                            <p class="text-gray-300">Discover your best path to Canadian permanent residence</p>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach(['Express Entry eligibility check', 'Provincial Nominee Program options', 'Study and work permit pathways', 'Personalized timeline estimate'] as $item)
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-gray-300">{{ $item }}</span>
                                </div>
                            @endforeach
                        </div>
                        
                        <a href="{{ url('contact-us') }}" class="w-full mt-6 inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                            Get Started Today
                        </a>
                    </div>
                    
                    <div class="absolute -top-4 -right-4 bg-blue-600 text-white px-4 py-2 rounded-2xl text-sm font-medium shadow-lg z-20">
                        98% Success Rate
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-blue-600 text-white px-4 py-2 rounded-2xl text-sm font-medium shadow-lg z-20">
                        12+ Years Experience
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
                    <p class="text-xl text-blue-200 font-medium mb-8">Our Pathway to Canadian Dreams</p>
                    <p class="text-lg text-blue-200 leading-relaxed mb-8">
                        At KGraph Immigration, we understand that the journey to Canada can feel complex and overwhelming.
                        With years of expertise and a deep understanding of the immigration process, we simplify every step for you.
                        As a team of Regulated Canadian Immigration Consultants, we take pride in offering personalized and
                        strategic immigration plans tailored to your unique needs.
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
                                    <p class="text-blue-300">RCIC Licensed Professionals</p>
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
                                <h3 class="text-2xl font-bold text-white mb-1">Find Your Eligibility for PR</h3>
                                <p class="text-blue-200 text-sm">Discover if you qualify for Canadian Permanent Residence</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-3 mb-6">
                            @foreach([
                                ['icon' => '✓', 'text' => 'Express Entry assessment'],
                                ['icon' => '✓', 'text' => 'Provincial Nominee eligibility'],
                                ['icon' => '✓', 'text' => 'CRS score calculation'],
                                ['icon' => '✓', 'text' => 'Personalized recommendations']
                            ] as $item)
                                <div class="flex items-center space-x-3 bg-blue-800/50 rounded-lg p-3 border border-blue-700/50">
                                    <div class="w-6 h-6 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-md flex items-center justify-center flex-shrink-0 shadow-md">
                                        <span class="text-white text-sm font-bold">{{ $item['icon'] }}</span>
                                    </div>
                                    <span class="text-blue-100 text-sm font-medium">{{ $item['text'] }}</span>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ url('contact-us') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white rounded-lg font-medium transition-colors shadow-lg shadow-blue-600/30">
                            Free Eligibility Check
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Trust Badges / Stats --}}
    <section class="py-16 bg-blue-900 border-b border-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Why Choose KGraph Immigration?</h2>
                <p class="text-gray-300 max-w-2xl mx-auto">We're committed to providing exceptional service and achieving successful outcomes for our clients.</p>
            </div>
            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
                @php
                    $stats = [
                        ['value' => $journeyData->customers ?? '3,500+', 'label' => 'Clients Helped', 'icon' => 'users'],
                        ['value' => '98%', 'label' => 'Success Rate', 'icon' => 'trending'],
                        ['value' => ($journeyData->experience ?? '12') . '+', 'label' => 'Years Experience', 'icon' => 'award'],
                        ['value' => '4-6 months', 'label' => 'Average Processing', 'icon' => 'clock']
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
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
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

    {{-- Services Section --}}
    <section class="py-20 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 text-left md:text-center">
                    Comprehensive Immigration Services
                </h2>
                <p class="text-xl text-blue-200 text-left md:text-center md:max-w-3xl md:mx-auto">
                    From permanent residency to temporary permits, we provide expert guidance for all your Canadian immigration needs.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredServices as $index => $service)
                    @include('frontend.Common.service-card', ['service' => $service, 'index' => $index])
                @endforeach
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    @if($featuredTestimonials->count() > 0)
    <section class="py-20 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-left md:text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Real Stories, Real Success</h2>
                <p class="text-xl text-blue-200 md:max-w-4xl md:mx-auto leading-relaxed">
                    We understand that the process of getting Canadian Permanent Residency (PR) is quite daunting. That's why we are to help you to achieve it.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredTestimonials as $index => $testimonial)
                    @include('frontend.Common.testimonial-card', ['testimonial' => $testimonial, 'index' => $index])
                @endforeach
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
                <p class="text-xl text-blue-200 font-medium">We have got solutions</p>
            </div>
            @include('frontend.Common.faq', ['faqs' => $faqs, 'title' => ''])
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-20 bg-blue-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Start Your Canadian Journey?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Book your free consultation today and take the first step towards making Canada your new home.
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

