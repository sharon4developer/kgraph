@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
    $journeyData = $journey->first() ?? null;
    $crewData = isset($crew) ? $crew : collect([]);
    $locations = isset($locations) ? $locations : collect([]);
    $ourStoryData = isset($ourStory) ? $ourStory->first() : null;
    $aboutUsData = isset($aboutUs) ? $aboutUs->first() : null;
    
    $timelineEvents = [
        [
            'year' => '2015',
            'title' => 'The Beginning',
            'description' => '"CanDirect" was founded by Mr. Mathews Benny, with a deep passion for helping students realize their dreams of studying in Canada.'
        ],
        [
            'year' => '2018',
            'title' => 'The Expansion',
            'description' => 'In 2018, CanDirect underwent a significant transformation, rebranding as KGraph. The company\'s new direction is "K" for knowledge and "Graph" for progress.'
        ],
        [
            'year' => '2020',
            'title' => 'Official Recognition – KGraph Immigration Consultancy Inc.',
            'description' => 'KGraph Immigration Consultancy Inc. was founded in 2020 with a strong focus on Canadian immigration services.'
        ],
        [
            'year' => '2025',
            'title' => 'Pioneering the Future of Immigration',
            'description' => 'In 2025, KGraph takes a bold step into the future of immigration by initiating a new, foolproof immigration process designed to make Canadian immigration smoother from anywhere in the world.'
        ]
    ];
@endphp

<div class="min-h-screen">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    About KGraph Immigration
                </h1>
                <p class="text-lg text-slate-300 leading-relaxed max-w-3xl mx-auto mb-6">
                    For over 10 years, we've been helping individuals and families achieve their Canadian 
                    dream through expert immigration guidance, personalized service, and unwavering commitment to success.
                </p>
                <div class="inline-flex items-center px-6 py-2 bg-blue-900 text-blue-300 rounded-full font-medium text-sm">
                    🇨🇦 Your Trusted Immigration Partner Since 2015
                </div>
            </div>
        </div>
    </section>

    {{-- Learn More About Our Team --}}
    <section class="py-12 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h2 class="text-2xl font-bold text-white mb-3">Learn More About Our Team</h2>
                <h3 class="text-xl font-semibold text-blue-400">Dedicated to Guiding You on Your Immigration Journey</h3>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                <div class="lg:col-span-2 opacity-0 animate-fade-in-left" style="animation-fill-mode: forwards;">
                    <p class="text-base text-slate-300 leading-relaxed mb-4">
                        At KGraph Immigration Consultancy, our journey began with the vision of making the Canadian immigration process accessible and straightforward for everyone. Founded by a team of dedicated immigration professionals, we understand the challenges faced by individuals and families seeking a new life in Canada, and we are committed to providing the guidance, resources, and expertise needed to navigate this complex process.
                    </p>
                    <p class="text-base text-slate-300 leading-relaxed mb-4">
                        As Regulated Canadian Immigration Consultants (RCICs), we offer a range of services tailored to your unique immigration needs, whether it's study permits, work visas, or permanent residency applications. Our team of experienced counselors, caseworkers, and documentation specialists works diligently to ensure that each application is handled with care and precision.
                    </p>
                    <p class="text-base text-slate-300 leading-relaxed">
                        We stay informed on the latest updates and changes in immigration policies from Immigration, Refugees and Citizenship Canada (IRCC), ensuring that our clients receive accurate and timely advice. At KGraph, we are focused on building trusted relationships with our clients, providing clarity, professionalism, and unwavering support every step of the way as we help you unlock new opportunities and experiences in Canada. Let us guide you through the process and take the first step toward your future in Canada.
                    </p>
                </div>

                <div class="flex justify-center lg:justify-start opacity-0 animate-fade-in-right" style="animation-fill-mode: forwards;">
                    @if(isset($whoweare) && $whoweare->count() > 0)
                        @php
                            $firstItem = $whoweare->first();
                            $filePath = $firstItem->type == 1 
                                ? $locationData['storage_server_path'] . $locationData['storage_image_path'] . $firstItem->file
                                : asset('assets/template/learn-more-about-our-team-33-LxbevsCZg8tU72N.jpg');
                        @endphp
                        <img src="{{ $filePath }}" alt="Learn More About Our Team" class="w-full max-w-sm h-auto rounded-2xl shadow-xl">
                    @else
                        <img src="{{ asset('assets/template/learn-more-about-our-team-33-LxbevsCZg8tU72N.jpg') }}" alt="Learn More About Our Team" class="w-full max-w-sm h-auto rounded-2xl shadow-xl">
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Director's Message --}}
    <section class="py-12 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="order-2 lg:order-1 flex justify-center lg:justify-start opacity-0 animate-fade-in-left" style="animation-fill-mode: forwards;">
                    <img src="{{ asset('assets/template/mathews-benny-director(1)-FNewO59bME0sVWc.png') }}" alt="Mathews Benny" class="w-full max-w-sm h-auto rounded-2xl shadow-xl">
                </div>

                <div class="order-1 lg:order-2 opacity-0 animate-fade-in-right" style="animation-fill-mode: forwards;">
                    <h2 class="text-2xl font-bold text-white mb-4">Director's Message</h2>
                    <p class="text-sm text-slate-300 leading-relaxed mb-3">
                        Mathews Benny, RCIC, CAPIC Member, Commissioner of Oaths (Ontario) Canada is a land of dreams and opportunities for many people who seek quality education and rewarding careers. Can-Direct Overseas Education Services, our first venture founded in 2015, has been a catalyst for many students and professionals who wanted to pursue their aspirations in Canada.
                    </p>
                    <p class="text-sm text-slate-300 leading-relaxed mb-3">
                        In 2018, we launched KGraph Inc, a vibrant and rapidly growing firm that offers expert guidance on various programs offered by the Canadian government in the fields of Immigration, education, and career development. As the Director of KGraph, I am honoured and humbled to say that we touch the lives of our clients by providing them with personalized and professional advice from our consultants who have lived and worked in Canada themselves.
                    </p>
                    <p class="text-sm text-slate-300 leading-relaxed mb-3">
                        Since its inception in 2018, I have seen KGraph's growth as an outstanding overseas immigration firm in both Canada and India. We have seen an increase in our staff strength, as much as we have seen our team take action and support our clientele across our various offices in Toronto, Mississauga & Kitchener in Canada, and Kochi in Kerala.
                    </p>
                    <p class="text-sm text-slate-300 leading-relaxed mb-3">
                        We have also tailored our services to meet the needs and expectations of each location, and we have added new features such as visa assistance, pre-departure orientation, post-arrival support, and career counseling. It has been a privilege to serve as the Director over the years, collaborating with a brilliant and committed team of staff members in this organization.
                    </p>
                    <p class="text-sm text-slate-300 leading-relaxed mb-3">
                        I would like to express my heartfelt gratitude to everyone who has contributed to KGraph's success and recognition among overseas consultancies in Canada. I look forward to the challenges and opportunities that await us!
                    </p>
                    <div class="mt-4">
                        <p class="text-lg font-semibold text-white">Mathews Benny</p>
                        <p class="text-blue-400 text-sm">RCIC, CAPIC Member, Commissioner of Oaths (Ontario)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Story & Stats Combined --}}
    <section class="py-12 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h2 class="text-2xl font-bold text-white mb-3">Our Story: Empowering Your Path to Canada</h2>
                <p class="text-base text-slate-300 leading-relaxed max-w-4xl mx-auto mb-4">
                    At KGraph Immigration Consultancy, our journey began with a clear mission: to simplify the Canadian immigration process and make it accessible to all. Founded by a team of experienced immigration specialists, we recognized the challenges and uncertainties that individuals and families face when pursuing new opportunities in Canada.
                </p>
                <p class="text-base text-slate-300 leading-relaxed max-w-4xl mx-auto">
                    Our foundation is grounded in the belief that everyone deserves the chance to build a better future. From our humble beginnings, we have grown into a trusted partner for countless clients, offering tailored solutions and unwavering support throughout their immigration journey.
                </p>
            </div>

            <div class="mt-10">
                <h3 class="text-xl font-bold text-white text-center mb-6">Journey with KGraph</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @foreach([
                        ['value' => ($journeyData->experience ?? '10') . '+', 'label' => 'Years of Experience'],
                        ['value' => ($journeyData->employees ?? '30') . '+', 'label' => 'Employees'],
                        ['value' => ($journeyData->ratings ?? '4.8'), 'label' => 'Google Rating'],
                        ['value' => ($journeyData->offices ?? '5'), 'label' => 'Offices'],
                        ['value' => ($journeyData->customers ?? '10000') . '+', 'label' => 'Customers Served']
                    ] as $index => $stat)
                        <div class="text-center opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                            <div class="bg-slate-700 rounded-xl p-4 border border-slate-600">
                                <div class="text-3xl font-bold text-blue-400 mb-1">{{ $stat['value'] }}</div>
                                <div class="text-xs text-slate-300">{{ $stat['label'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- From Vision to Reality: Our Journey --}}
    <section class="py-12 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white mb-3">From Vision to Reality: Our Journey</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-slate-800 rounded-2xl p-6 border border-slate-700 opacity-0 animate-fade-in-up" style="animation-delay: 0s; animation-fill-mode: forwards;">
                    <div class="flex items-start space-x-3 mb-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            @include('frontend.icons.target', ['class' => 'w-5 h-5 text-white'])
                        </div>
                        <h3 class="text-xl font-bold text-white">Our Mission</h3>
                    </div>
                    <p class="text-base text-slate-300 leading-relaxed">
                        Is to help you overcome immigration challenges and achieve your Canadian dreams by providing dedicated support throughout the entire process. We build strong relationships with our clients from the moment we submit their application, ensuring full assistance in navigating the job market, securing permanent residency, and finding legal solutions.
                    </p>
                </div>

                <div class="bg-slate-800 rounded-2xl p-6 border border-slate-700 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                    <div class="flex items-start space-x-3 mb-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            @include('frontend.icons.globe', ['class' => 'w-5 h-5 text-white'])
                        </div>
                        <h3 class="text-xl font-bold text-white">Our Vision</h3>
                    </div>
                    <p class="text-base text-slate-300 leading-relaxed mb-3">
                        At KGraph Immigration Consultancy, our motto is clear: <span class="text-blue-400 font-semibold">"We break the limits of the sky to let you soar high."</span>
                    </p>
                    <p class="text-base text-slate-300 leading-relaxed">
                        We strive to provide a platform that makes accessing immigration services simple and stress-free, recognizing immigrants as the foundation of Canada's success. Our commitment is to offer the guidance and support needed to help immigrants thrive and reach their full potential.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Timeline Section --}}
    <section class="py-20 bg-slate-800 timeline-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Our Journey Through Time</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    From humble beginnings to pioneering the future of immigration services.
                </p>
            </div>
        </div>

        <div 
            id="timeline-scroll-wrapper"
            class="timeline-scroll-wrapper" 
            style="overflow-x: auto !important; overflow-y: visible !important; scroll-behavior: smooth; -webkit-overflow-scrolling: touch; -ms-overflow-style: none; scrollbar-width: none; width: 100%; cursor: grab;">
            <div class="flex space-x-6 px-4 sm:px-6 lg:px-8 pb-4 timeline-scroll-content" style="display: inline-flex; flex-wrap: nowrap; width: max-content;">
                @foreach(array_merge($timelineEvents, $timelineEvents) as $index => $event)
                    <div class="flex-shrink-0 w-80 bg-slate-700 rounded-2xl p-8 border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: {{ ($index % 4) * 0.1 }}s; animation-fill-mode: forwards;">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-6">
                            <span class="text-2xl font-bold text-white">{{ $event['year'] }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">{{ $event['title'] }}</h3>
                        <p class="text-slate-300 leading-relaxed">{{ $event['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Office Locations & Certifications Combined --}}
    @if($locations->count() > 0)
    <section class="py-12 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white mb-2">Our Office Locations</h2>
                <p class="text-slate-300 max-w-2xl mx-auto text-sm">
                    Visit us at any of our convenient locations across Canada and India.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
                @foreach($locations as $index => $location)
                    <div class="bg-slate-800 rounded-xl p-4 border border-slate-700 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                        <div class="text-center mb-4">
                            <div class="w-12 h-12 bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-3">
                                @include('frontend.icons.map-pin', ['class' => 'w-6 h-6 text-blue-600'])
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2">{{ $location->location }}</h3>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-start space-x-2">
                                @include('frontend.icons.map-pin', ['class' => 'w-4 h-4 text-slate-500 mt-0.5 flex-shrink-0'])
                                <p class="text-slate-300 text-xs leading-relaxed">{{ $location->address }}</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                @include('frontend.icons.phone', ['class' => 'w-4 h-4 text-slate-500 flex-shrink-0'])
                                <a href="tel:{{ $location->phone }}" class="text-blue-400 hover:text-blue-300 font-medium transition-colors text-sm">{{ $location->phone }}</a>
                            </div>
                            @if($location->email)
                                <div class="flex items-center space-x-2">
                                    @include('frontend.icons.mail', ['class' => 'w-4 h-4 text-slate-500 flex-shrink-0'])
                                    <a href="mailto:{{ $location->email }}" class="text-blue-400 hover:text-blue-300 font-medium transition-colors text-sm">{{ $location->email }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white mb-2">
                    Certifications & Professional Memberships
                </h2>
                <p class="text-slate-300 max-w-2xl mx-auto text-sm">
                    We maintain the highest professional standards through ongoing education and membership 
                    in recognized industry organizations.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach([
                    [
                        'title' => 'CICC Membership',
                        'description' => 'College of Immigration and Citizenship Consultants',
                        'credential' => 'Licensed RCICs'
                    ],
                    [
                        'title' => 'CAPIC Member',
                        'description' => 'Canadian Association of Professional Immigration Consultants',
                        'credential' => 'Professional Standards'
                    ],
                    [
                        'title' => 'Continuing Education',
                        'description' => 'Regular training on immigration law updates',
                        'credential' => 'Current Knowledge'
                    ]
                ] as $index => $cert)
                    <div class="bg-slate-800 rounded-xl p-6 text-center border border-slate-700 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.2 }}s; animation-fill-mode: forwards;">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                            @include('frontend.icons.award', ['class' => 'w-6 h-6 text-white'])
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">{{ $cert['title'] }}</h3>
                        <p class="text-slate-300 mb-2 text-sm">{{ $cert['description'] }}</p>
                        <span class="inline-flex items-center px-3 py-1 bg-blue-900 text-blue-300 text-xs font-medium rounded-full">
                            {{ $cert['credential'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    {{-- Certifications Only if no locations --}}
    <section class="py-12 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white mb-2">
                    Certifications & Professional Memberships
                </h2>
                <p class="text-slate-300 max-w-2xl mx-auto text-sm">
                    We maintain the highest professional standards through ongoing education and membership 
                    in recognized industry organizations.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach([
                    [
                        'title' => 'CICC Membership',
                        'description' => 'College of Immigration and Citizenship Consultants',
                        'credential' => 'Licensed RCICs'
                    ],
                    [
                        'title' => 'CAPIC Member',
                        'description' => 'Canadian Association of Professional Immigration Consultants',
                        'credential' => 'Professional Standards'
                    ],
                    [
                        'title' => 'Continuing Education',
                        'description' => 'Regular training on immigration law updates',
                        'credential' => 'Current Knowledge'
                    ]
                ] as $index => $cert)
                    <div class="bg-slate-800 rounded-xl p-6 text-center border border-slate-700 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.2 }}s; animation-fill-mode: forwards;">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                            @include('frontend.icons.award', ['class' => 'w-6 h-6 text-white'])
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">{{ $cert['title'] }}</h3>
                        <p class="text-slate-300 mb-2 text-sm">{{ $cert['description'] }}</p>
                        <span class="inline-flex items-center px-3 py-1 bg-blue-900 text-blue-300 text-xs font-medium rounded-full">
                            {{ $cert['credential'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-12 bg-blue-600 border-t border-slate-700">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h2 class="text-2xl font-bold text-white mb-3">
                    Ready to Start Your Canadian Journey?
                </h2>
                <p class="text-base text-blue-200 mb-6 max-w-2xl mx-auto">
                    Join the thousands of families who have trusted KGraph Immigration to help them 
                    make Canada their new home.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4">
                    <a href="{{ url('contact-us') }}" class="px-6 py-3 bg-white text-blue-600 rounded-xl hover:bg-blue-50 transition-colors font-medium">
                        Book Free Consultation
                    </a>
                    <a href="tel:+14169897788" class="px-6 py-3 border-2 border-blue-200 text-blue-200 rounded-xl hover:bg-blue-200 hover:text-blue-600 transition-colors font-medium">
                        Call +1 416 989 7788
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
(function() {
    let isInitialized = false;
    
    function initTimelineScroll() {
        // Prevent double initialization
        if (isInitialized) {
            console.log('Already initialized, skipping...');
            return;
        }
        
        const timelineWrapper = document.getElementById('timeline-scroll-wrapper');
        
        if (!timelineWrapper) {
            console.error('Timeline wrapper not found!');
            return;
        }
        
        // Wait a bit more to ensure content is rendered
        setTimeout(() => {
            const maxScroll = timelineWrapper.scrollWidth - timelineWrapper.clientWidth;
            
            console.log('Timeline initialized');
            console.log('Scroll width:', timelineWrapper.scrollWidth);
            console.log('Client width:', timelineWrapper.clientWidth);
            console.log('Max scroll:', maxScroll);
            console.log('Initial scrollLeft:', timelineWrapper.scrollLeft);
            
            if (maxScroll <= 0) {
                console.warn('No overflow detected, cannot scroll');
                return;
            }
            
            isInitialized = true;
            
            let scrollSpeed = 0.5;
            let isPaused = false;
            let animationId = null;
            let scrollTimeout = null;
            let isUserScrolling = false;
            let isAutoScrolling = false;
            let lastProgrammaticScroll = 0;
            
            function autoScroll() {
                if (!timelineWrapper) return;
                
                const currentMaxScroll = timelineWrapper.scrollWidth - timelineWrapper.clientWidth;
                
                if (currentMaxScroll <= 0) {
                    animationId = requestAnimationFrame(autoScroll);
                    return;
                }
                
                if (!isPaused && !isUserScrolling) {
                    isAutoScrolling = true;
                    const currentScroll = timelineWrapper.scrollLeft;
                    const now = Date.now();
                    
                    if (currentScroll >= currentMaxScroll - 1) {
                        // Reset to start for infinite scroll
                        timelineWrapper.scrollLeft = 0;
                        lastProgrammaticScroll = now;
                    } else {
                        timelineWrapper.scrollLeft = currentScroll + scrollSpeed;
                        lastProgrammaticScroll = now;
                    }
                } else {
                    isAutoScrolling = false;
                }
                
                animationId = requestAnimationFrame(autoScroll);
            }
            
            // Start auto-scroll
            console.log('Starting auto-scroll...');
            autoScroll();
            
            // Pause on hover
            timelineWrapper.addEventListener('mouseenter', () => {
                isPaused = true;
            });
            
            // Resume on mouse leave
            timelineWrapper.addEventListener('mouseleave', () => {
                isPaused = false;
            });
            
            // Detect manual scrolling - only if it wasn't caused by our programmatic scroll
            timelineWrapper.addEventListener('scroll', function() {
                const now = Date.now();
                // If scroll happened more than 100ms after our programmatic scroll, it's user scroll
                if (now - lastProgrammaticScroll > 100) {
                    isUserScrolling = true;
                    
                    if (scrollTimeout) {
                        clearTimeout(scrollTimeout);
                    }
                    
                    scrollTimeout = setTimeout(() => {
                        isUserScrolling = false;
                    }, 1500);
                }
            }, { passive: true });
            
            // Handle wheel events
            timelineWrapper.addEventListener('wheel', function() {
                isUserScrolling = true;
                
                if (scrollTimeout) {
                    clearTimeout(scrollTimeout);
                }
                
                scrollTimeout = setTimeout(() => {
                    isUserScrolling = false;
                }, 1500);
            }, { passive: true });
        }, 500);
    }
    
    // Initialize once when page is ready
    if (document.readyState === 'complete') {
        setTimeout(initTimelineScroll, 1500);
    } else {
        window.addEventListener('load', function() {
            setTimeout(initTimelineScroll, 1500);
        });
    }
})();
</script>

@endsection
