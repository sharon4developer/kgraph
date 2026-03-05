@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
    $featuredTestimonials = isset($testimonials) ? $testimonials->take(3) : collect([]);
    $featuredBlogs = isset($blogs) ? $blogs->take(5) : collect([]);
    $homeData = $home ?? null;
    $journeyData = isset($journey) ? $journey->first() : null;
    $certificateData = isset($certificate) ? $certificate->first() : null;
    
    $slideContent = [
        [
            'mainText' => 'Challenges guided with confidence',
            'subText' => 'We see you as more than just a client; you\'re an individual with unique needs. At our immigration consulting firm, we are dedicated to offering precise legal guidance that prioritizes your best interests above all else.'
        ],
        [
            'mainText' => 'The Pinnacle of Success',
            'subText' => 'KGraph Immigration Consultancy is a renowned provider of Canadian immigration services, We provide services that are specifically tailored to the needs of the client.'
        ],
        [
            'mainText' => 'Experience, Excellence, and Expertise!',
            'subText' => 'We are authorized under the RCIC, CAPIC, and Ministry of the Attorney General-Ontario.'
        ]
    ];
    $blogCount = $featuredBlogs->count();
    $slideContentJson = json_encode($slideContent, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES);
@endphp
@push('scripts')
<script>
    window.initHomePageData = function() {
        return {
    currentImageIndex: 0,
    currentNewsIndex: 0,
            slideContent: {!! $slideContentJson !!},
            blogCount: {{ $blogCount }},
    init() {
                // Auto-rotate hero images and text (3 images from designer's reference site)
        setInterval(() => {
            this.currentImageIndex = (this.currentImageIndex + 1) % 3;
        }, 5000);
            },
            nextNews() {
                const maxIndex = Math.max(1, Math.max(1, this.blogCount - 2));
                if (maxIndex > 0) {
                    this.currentNewsIndex = (this.currentNewsIndex + 1) % maxIndex;
                }
            },
            prevNews() {
                const maxIndex = Math.max(1, Math.max(1, this.blogCount - 2));
                if (maxIndex > 0) {
                    this.currentNewsIndex = (this.currentNewsIndex - 1 + maxIndex) % maxIndex;
                }
    }
        };
    };
</script>
@endpush
<div class="min-h-screen overflow-x-hidden" x-data="initHomePageData()" x-cloak>
    {{-- Hero Section --}}
    <section class="relative py-20 overflow-hidden min-h-[600px]">
        <div class="absolute inset-0 bg-blue-950">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800"></div>
            @php
                // Using the same images from designer's reference site (Pexels images)
                $sliderImages = [
                    'https://images.pexels.com/photos/1595385/pexels-photo-1595385.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop',
                    'https://images.pexels.com/photos/1519088/pexels-photo-1519088.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop',
                    'https://images.pexels.com/photos/1402787/pexels-photo-1402787.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop'
                ];
            @endphp
            @foreach($sliderImages as $index => $image)
                    <div 
                    class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out"
                    data-image-index="{{ $index }}"
                    x-bind:class="currentImageIndex === parseInt($el.dataset.imageIndex) ? 'opacity-80' : 'opacity-0'"
                    style="background-image: url('{{ $image }}'); background-size: cover; background-position: center; background-repeat: no-repeat; will-change: opacity;"
                    x-cloak
                    x-show="true"
                    ></div>
                @endforeach
            <div class="absolute inset-0 bg-blue-950 bg-opacity-40"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="opacity-0 animate-fade-in-left">
                    <div class="mb-6 opacity-0 animate-fade-in-up" style="animation-delay: 0s; animation-fill-mode: forwards;">
                        <span class="inline-flex items-center px-4 py-2 bg-blue-800 text-blue-200 rounded-full text-sm font-medium">
                            Journey With Confidence Migrate With Us
                        </span>
                    </div>
                    <div class="relative mb-8" style="min-height: 380px;">
                        @foreach($slideContent as $index => $slide)
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
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                                    {{ $slide['mainText'] }}
                        </h1>
                        <p class="text-xl text-slate-300 leading-relaxed mb-8">
                                    {{ $slide['subText'] }}
                        </p>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 mt-8">
                        <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-8 py-4 bg-green-500 hover:bg-green-600 text-white rounded-lg font-semibold text-lg transition-all duration-200 shadow-lg active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-green-500">
                            Check your Eligibility
                            @include('frontend.icons.arrow-right', ['class' => 'w-5 h-5 ml-2'])
                        </a>
                    </div>
                </div>
                
                <div class="relative opacity-0 animate-fade-in-right">
                    <div class="relative z-10 bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl p-8 border border-white/20">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                @include('frontend.icons.globe', ['class' => 'w-8 h-8 text-white'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">
                                Free Immigration Assessment
                            </h3>
                            <p class="text-gray-300">
                                Discover your best path to Canadian permanent residence
                            </p>
                        </div>
                        
                        <div class="space-y-4 mb-6">
                            @foreach(['Express Entry eligibility check', 'Provincial Nominee Program options', 'Study and work permit pathways', 'Personalized timeline estimate'] as $index => $item)
                                <div class="flex items-center space-x-3 opacity-0 animate-fade-in-up" style="animation-delay: {{ 0.4 + ($index * 0.1) }}s; animation-fill-mode: forwards;">
                                    @include('frontend.icons.check-circle', ['class' => 'w-5 h-5 text-gray-400 flex-shrink-0'])
                                    <span class="text-gray-300">{{ $item }}</span>
                                </div>
                            @endforeach
                        </div>
                        
                        <a href="{{ url('contact-us') }}" class="w-full mt-6 inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-semibold transition-all duration-200 shadow-lg active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Get Started Today
                        </a>
                    </div>
                    
                    {{-- Floating badges --}}
                    <div class="absolute -top-4 -right-4 bg-blue-600 text-white px-4 py-2 rounded-2xl text-sm font-medium shadow-lg z-20 opacity-0 animate-fade-in-scale" style="animation-delay: 1s; animation-fill-mode: forwards;">
                        98% Success Rate
                    </div>
                    
                    <div class="absolute -bottom-4 -left-4 bg-blue-600 text-white px-4 py-2 rounded-2xl text-sm font-medium shadow-lg z-20 opacity-0 animate-fade-in-scale" style="animation-delay: 1.2s; animation-fill-mode: forwards;">
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
                    <p class="text-xl text-blue-200 font-medium mb-8">Our Pathway to Canadian Dreams</p>
                    <p class="text-lg text-blue-200 leading-relaxed mb-8">
                        At KGraph Immigration, we understand that the journey to Canada can feel complex and overwhelming.
                        With years of expertise and a deep understanding of the immigration process, we simplify every step for you.
                        As a team of Regulated Canadian Immigration Consultants, we take pride in offering personalized and
                        strategic immigration plans tailored to your unique needs. Let us guide you towards a smooth,
                        successful immigration experience where your Canadian dream becomes a reality.
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
                                @include('frontend.icons.check-circle', ['class' => 'w-7 h-7 text-white'])
                            </div>
                            <div class="text-left">
                                <h3 class="text-2xl font-bold text-white mb-1">
                                    Find Your Eligibility for PR
                                </h3>
                                <p class="text-blue-200 text-sm">
                                    Discover if you qualify for Canadian Permanent Residence
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-3 mb-6">
                            @php
                                $eligibilityItems2 = [
                                    ['text' => 'Express Entry assessment', 'color' => 'from-emerald-500 to-emerald-600'],
                                    ['text' => 'Provincial Nominee eligibility', 'color' => 'from-blue-500 to-blue-600'],
                                    ['text' => 'CRS score calculation', 'color' => 'from-cyan-500 to-cyan-600'],
                                    ['text' => 'Personalized recommendations', 'color' => 'from-indigo-500 to-indigo-600']
                                ];
                            @endphp
                            @foreach($eligibilityItems2 as $index => $item)
                                <div class="flex items-center space-x-3 bg-blue-800/50 rounded-lg p-3 border border-blue-700/50 hover:border-blue-600/50 transition-colors opacity-0 animate-fade-in-up" style="animation-delay: {{ 0.4 + ($index * 0.1) }}s; animation-fill-mode: forwards;">
                                    <div class="w-6 h-6 bg-gradient-to-br {{ $item['color'] }} rounded-md flex items-center justify-center flex-shrink-0 shadow-md">
                                        <span class="text-white text-sm font-bold">✓</span>
                                    </div>
                                    <span class="text-blue-100 text-sm font-medium">{{ $item['text'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ url('contact-us') }}" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white rounded-2xl font-semibold px-6 py-3 inline-flex items-center justify-center transition-all duration-200 shadow-lg shadow-blue-600/30 active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Free Eligibility Check
                        </a>

                        <div class="flex items-center justify-center gap-3 text-center text-xs text-blue-300 mt-4">
                            <span class="flex items-center gap-1">
                                @include('frontend.icons.check-circle', ['class' => 'w-3 h-3'])
                                No obligation
                            </span>
                            <span class="text-blue-700">•</span>
                            <span class="flex items-center gap-1">
                                @include('frontend.icons.check-circle', ['class' => 'w-3 h-3'])
                                Quick assessment
                            </span>
                            <span class="text-blue-700">•</span>
                            <span class="flex items-center gap-1">
                                @include('frontend.icons.check-circle', ['class' => 'w-3 h-3'])
                                Expert guidance
                            </span>
                        </div>
                    </div>
                    
                    {{-- Floating badge --}}
                    <div class="absolute -top-4 -right-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-6 py-3 rounded-2xl text-sm font-bold shadow-xl shadow-emerald-500/30 z-20 opacity-0 animate-fade-in-scale" style="animation-delay: 1s; animation-fill-mode: forwards;">
                        Free Assessment
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
                        ['value' => ($journeyData->experience ?? '10') . '+', 'label' => 'Years Experience', 'icon' => 'award'],
                        ['value' => '4-6 months', 'label' => 'Average Processing', 'icon' => 'clock']
                    ];
                @endphp
                @foreach($stats as $index => $stat)
                    <div class="text-center opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                        <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl p-3 md:p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-blue-700/50 h-full flex flex-col items-center justify-center gap-2 md:gap-0">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-700 rounded-lg md:rounded-xl flex items-center justify-center flex-shrink-0 md:mb-4">
                                @if($stat['icon'] == 'users')
                                    @include('frontend.icons.users', ['class' => 'w-5 h-5 md:w-6 md:h-6 text-blue-400'])
                                @elseif($stat['icon'] == 'trending')
                                    @include('frontend.icons.trending-up', ['class' => 'w-5 h-5 md:w-6 md:h-6 text-blue-400'])
                                @elseif($stat['icon'] == 'award')
                                    @include('frontend.icons.award', ['class' => 'w-5 h-5 md:w-6 md:h-6 text-blue-400'])
                                @else
                                    @include('frontend.icons.clock', ['class' => 'w-5 h-5 md:w-6 md:h-6 text-blue-400'])
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

            <div class="overflow-x-auto md:overflow-x-visible -mx-4 px-4 md:mx-0 md:px-0 scrollbar-hide">
                <div class="flex md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 md:gap-6 pb-4 md:pb-0" style="min-width: min-content;">
                    {{-- Permanent Residency --}}
                    <div class="bg-blue-900 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-blue-800 p-6 flex-shrink-0 w-[280px] md:w-auto opacity-0 animate-fade-in-up" style="animation-delay: 0s; animation-fill-mode: forwards;">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                @include('frontend.icons.map-pin', ['class' => 'w-8 h-8 text-blue-300'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Permanent Residency</h3>
                            <p class="text-blue-200 text-sm">Secure your future in Canada</p>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ url('services') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Express Entry</a>
                            <a href="{{ url('services') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">PNP</a>
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Family Sponsorship</a>
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Business/Investor Visa</a>
                        </div>
                    </div>

                    {{-- Temporary Residency --}}
                    <div class="bg-blue-900 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-blue-800 p-6 flex-shrink-0 w-[280px] md:w-auto opacity-0 animate-fade-in-up" style="animation-delay: 0.1s; animation-fill-mode: forwards;">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                @include('frontend.icons.clock', ['class' => 'w-8 h-8 text-blue-300'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Temporary Residency</h3>
                            <p class="text-blue-200 text-sm">Work and study permits</p>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ url('services') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">PGWP</a>
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Spouse Open Work Permit</a>
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Visiting Visa</a>
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Sponsor Visa</a>
                        </div>
                    </div>

                    {{-- Refusal and Appeals --}}
                    <div class="bg-blue-900 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-blue-800 p-6 flex-shrink-0 w-[280px] md:w-auto opacity-0 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                @include('frontend.icons.shield', ['class' => 'w-8 h-8 text-blue-300'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Refusal and Appeals</h3>
                            <p class="text-blue-200 text-sm">Legal representation</p>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">IAD Appeals</a>
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Refusal and Re-Application</a>
                        </div>
                    </div>

                    {{-- Pilot and Rural Programs --}}
                    <div class="bg-blue-900 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-blue-800 p-6 flex-shrink-0 w-[280px] md:w-auto opacity-0 animate-fade-in-up" style="animation-delay: 0.3s; animation-fill-mode: forwards;">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                @include('frontend.icons.trending-up', ['class' => 'w-8 h-8 text-blue-300'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Pilot and Rural Programs</h3>
                            <p class="text-blue-200 text-sm">Specialized pathways</p>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">RCIP</a>
                            <a href="{{ url('services') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">AIP</a>
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Homecare Giver</a>
                        </div>
                    </div>

                    {{-- LMIA --}}
                    <div class="bg-blue-900 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-blue-800 p-6 flex-shrink-0 w-[280px] md:w-auto opacity-0 animate-fade-in-up" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                @include('frontend.icons.award', ['class' => 'w-8 h-8 text-blue-300'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">LMIA</h3>
                            <p class="text-blue-200 text-sm">Labour Market Impact Assessment</p>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ url('contact-us') }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">Labour Market Impact Assessment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="py-20 bg-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Your Path to Canada in 4 Simple Steps
                </h2>
                <p class="text-xl text-blue-200 max-w-3xl mx-auto">
                    Our proven process ensures you're guided professionally every step of the way.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $processSteps = [
                        [
                            'step' => '01',
                            'title' => 'Free Consultation',
                            'description' => 'We assess your profile and discuss the best immigration options for your situation.',
                            'icon' => 'users'
                        ],
                        [
                            'step' => '02',
                            'title' => 'Strategy Development',
                            'description' => 'Our experts create a customized immigration plan tailored to your goals and timeline.',
                            'icon' => 'shield'
                        ],
                        [
                            'step' => '03',
                            'title' => 'Application Preparation',
                            'description' => 'We handle all documentation, forms, and submissions with meticulous attention to detail.',
                            'icon' => 'check'
                        ],
                        [
                            'step' => '04',
                            'title' => 'Success & Support',
                            'description' => 'From approval to landing, we provide ongoing support for your Canadian journey.',
                            'icon' => 'award'
                        ]
                    ];
                @endphp
                @foreach($processSteps as $index => $item)
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
                                <h3 class="text-lg md:text-xl font-bold text-white mb-2 md:mb-3">{{ $item['title'] }}</h3>
                                <p class="text-blue-200 text-sm md:text-base leading-relaxed">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Your Dream Life in Canada Section --}}
    <section class="py-20 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-left md:text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Your Dream Life in Canada Starts Now
                </h2>
                <p class="text-xl text-blue-200 md:max-w-4xl md:mx-auto leading-relaxed">
                    Are you ready to make Canada your new home? Whether you're seeking to work, study, or settle in one of the world's most welcoming and prosperous countries, we're here to make your immigration journey smooth, simple, and successful. As Licensed Canadian Immigration Consultants, we specialize in creating personalized, step-by-step plans tailored to your unique needs. With years of experience, we'll ensure you're on the right track to achieve your Canadian dream.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Video Section --}}
                <div class="relative pt-4 pr-4">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <video
                            class="w-full h-auto rounded-3xl"
                            controls
                            poster="https://images.pexels.com/photos/1402787/pexels-photo-1402787.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&fit=crop"
                        >
                            <source src="https://kgraph.ca/storage/assets/video/your-dream-life-in-canada-starts-now-WEBSITEVIDEO-SnPaHMP0bftIzsB.mp4" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="absolute top-0 right-0 bg-blue-600 text-white px-4 py-2 rounded-2xl text-sm font-medium shadow-lg z-20">
                        Watch Our Story
                    </div>
                </div>
                
                {{-- Statistics and Consultant Info --}}
                <div class="space-y-8">
                    {{-- Statistics Grid --}}
                    <div class="grid grid-cols-2 gap-3 md:gap-6">
                        @php
                            $dreamStats = [
                                ['value' => ($journeyData->experience ?? '10') . '+', 'label' => 'Years of Experience'],
                                ['value' => ($journeyData->employees ?? '30') . '+', 'label' => 'Employees'],
                                ['value' => ($journeyData->ratings ?? '4.9'), 'label' => 'Google Rating'],
                                ['value' => ($journeyData->offices ?? '5'), 'label' => 'Offices'],
                            ];
                        @endphp
                        @foreach($dreamStats as $index => $stat)
                            <div class="flex flex-col items-center justify-center bg-blue-900 rounded-xl p-3 border border-blue-800 text-center md:p-6 md:rounded-2xl opacity-0 animate-fade-in-up" style="animation-delay: {{ 0.4 + $index * 0.1 }}s; animation-fill-mode: forwards;">
                                <div class="text-xl font-bold text-blue-200 md:text-3xl md:mb-2">{{ $stat['value'] }}</div>
                                <div class="text-xs text-blue-300 font-medium md:text-base">{{ $stat['label'] }}</div>
                            </div>
                        @endforeach
                    </div>
                    
                    {{-- CTA Button --}}
                    <div class="text-center">
                        <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-all duration-200 shadow-lg active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Start Your Canadian Dream Today
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    @if($featuredTestimonials->count() > 0)
    <section class="py-20 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-left md:text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Real Stories, Real Success
                </h2>
                <p class="text-xl text-blue-200 md:max-w-4xl md:mx-auto leading-relaxed">
                    We understand that the process of getting Canadian Permanent Residency (PR) is quite daunting. That's why we are to help you to achieve it. Whether you are applying through Express Entry, Provincial Nominee Program, or any other route, our team of experts will be happy to help you in realizing your dream of living in Canada. We have helped hundreds of individuals and families successfully apply for PR and are proud of the impact we have made. We have years of experience, a deep knowledge of the Canadian immigration policies, and a client-first approach, which provides personal support at every step of the way.
                </p>
            </div>
            
            <div class="relative overflow-x-auto md:overflow-hidden -mx-4 md:mx-0 scrollbar-hide">
                <div class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 px-4 md:px-0">
                @foreach($featuredTestimonials as $index => $testimonial)
                        <div class="w-[85vw] md:w-auto flex-shrink-0">
                    @include('frontend.Common.testimonial-card', ['testimonial' => $testimonial, 'index' => $index])
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="text-center mt-12">
                <p class="text-blue-200 mb-6">
                    Join thousands of successful immigrants who trusted KGraph with their Canadian dream.
                </p>
                <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-lg transition-all duration-200 shadow-lg active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Start Your Journey Today
                </a>
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
                <p class="text-lg text-blue-200 md:max-w-5xl md:mx-auto leading-relaxed">
                    Explore our blog for the latest updates and tips on Canadian immigration, and let us help you take the next step in your immigration journey. Our team of experts continuously monitors government announcements, policy updates, and industry trends to ensure that you receive the most accurate and timely advice. Whether it's new immigration pathways, changes in visa processing times, or updates on eligibility criteria, we keep you informed and prepared for every development. By staying ahead of the curve, we can provide a detailed upto date information regarding post graduation work permit ( PGWP), Visiting Visa, PR application and sponsorship regarding Family and spouse , including issues regarding visa refusals we are here to make your immigration pathways clear.
                </p>
            </div>
            
            <div class="text-center mb-12">
                <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-lg transition-all duration-200 shadow-lg active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Get Started Today
                </a>
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
                            @include('frontend.icons.chevron-left', ['class' => 'w-5 h-5'])
                        </button>
                        <button
                            @click="nextNews()"
                            class="w-10 h-10 bg-blue-800 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 button-glow"
                            aria-label="Next news"
                        >
                            @include('frontend.icons.chevron-right', ['class' => 'w-5 h-5'])
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
                                            @include('frontend.icons.calendar', ['class' => 'w-4 h-4'])
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
                                                @include('frontend.icons.user', ['class' => 'w-4 h-4'])
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
                                                @include('frontend.icons.user', ['class' => 'w-4 h-4'])
                                                <span>{{ $article->name }}</span>
                                            </div>
                                        @endif

                                        {{-- Read More Button --}}
                                        <a href="{{ url('blog-details/' . ($article->slug ?? $article->id)) }}" class="inline-flex items-center text-blue-300 hover:text-blue-200 font-medium transition-colors group button-glow">
                                            Read More
                                            @include('frontend.icons.arrow-right', ['class' => 'w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform'])
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
                <p class="text-xl text-blue-200 font-medium">We have got solutions</p>
                <p class="text-lg text-blue-300 mt-2">Get the facts: forget the myths</p>
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
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 mb-8">
                <a href="{{ url('contact-us') }}" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-lg transition-all duration-200 shadow-lg active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Check your Eligibility
                    @include('frontend.icons.arrow-right', ['class' => 'w-5 h-5 ml-2'])
                </a>
                <a href="tel:+14169897788" class="inline-flex items-center justify-center px-8 py-4 border-2 border-blue-200 text-blue-200 rounded-lg font-semibold text-lg transition-all duration-200 hover:bg-blue-200 hover:text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 active:brightness-125 active:scale-95 hover:scale-102 button-glow">
                    @include('frontend.icons.phone', ['class' => 'w-5 h-5 mr-2'])
                    Call +1 416 989 7788
                </a>
            </div>
            <div class="mt-8 flex flex-col md:flex-row items-center justify-center gap-4 md:gap-8 text-blue-200">
                <div class="flex items-center gap-4 md:gap-8">
                    <div class="flex items-center space-x-2">
                        @include('frontend.icons.check-circle', ['class' => 'w-5 h-5'])
                        <span>Free Consultation</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        @include('frontend.icons.check-circle', ['class' => 'w-5 h-5'])
                        <span>No Obligation</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    @include('frontend.icons.check-circle', ['class' => 'w-5 h-5'])
                    <span>Expert Guidance</span>
                </div>
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
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-left {
        animation: fade-in-left 0.8s ease-out forwards;
    }
    .animate-fade-in-right {
        animation: fade-in-right 0.8s ease-out 0.2s forwards;
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out forwards;
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
