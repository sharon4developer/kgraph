@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
    $serviceFAQs = isset($services->ServiceFaq) && $services->ServiceFaq->count() > 0 ? $services->ServiceFaq->map(function($faq) {
        return (object)[
            'id' => $faq->id,
            'title' => $faq->title,
            'description' => $faq->description,
            'category' => ''
        ];
    }) : collect([]);
    
    // Get active ServicePoints (already filtered by controller)
    $activeServicePoints = isset($services->ServicePoint) && $services->ServicePoint->count() > 0 
        ? $services->ServicePoint 
        : collect([]);
    
    // Icon rotation for service icon (same logic as service-card)
    $iconRotation = [
        'map-pin', 'trending-up', 'globe', 'book-open', 'book-open', 'briefcase',
        'users', 'shield', 'clock', 'shield', 'award', 'trending-up',
        'check-circle', 'users-group',
    ];
    $iconIndex = ($services->id ?? 0) % count($iconRotation);
    $selectedIcon = $iconRotation[$iconIndex];
    
    // Get parent service for back link and category
    $parentService = $services->Services ?? null;
@endphp

<div class="min-h-screen">
    {{-- Header --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ $parentService ? url('service-details/' . $parentService->slug) : url('services') }}" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                    @include('frontend.icons.chevron-left', ['class' => 'w-4 h-4 mr-2'])
                    Back to {{ $parentService ? $parentService->title : 'Services' }}
                </a>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div class="mb-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-16 h-16 bg-slate-700 rounded-2xl flex items-center justify-center">
                                @if($selectedIcon === 'map-pin')
                                    @include('frontend.icons.map-pin', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'trending-up')
                                    @include('frontend.icons.trending-up', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'globe')
                                    @include('frontend.icons.globe', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'book-open')
                                    @include('frontend.icons.book-open', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'briefcase')
                                    @include('frontend.icons.briefcase', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'clock')
                                    @include('frontend.icons.clock', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'shield')
                                    @include('frontend.icons.shield', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'award')
                                    @include('frontend.icons.award', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'users')
                                    @include('frontend.icons.users', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'check-circle')
                                    @include('frontend.icons.check-circle', ['class' => 'w-8 h-8 text-blue-400'])
                                @elseif($selectedIcon === 'users-group')
                                    @include('frontend.icons.users-group', ['class' => 'w-8 h-8 text-blue-400'])
                                @else
                                    @include('frontend.icons.map-pin', ['class' => 'w-8 h-8 text-blue-400'])
                                @endif
                </div>
                            <div>
                                <h1 class="text-3xl md:text-4xl font-bold text-white">{{ $services->title ?? 'Service' }}</h1>
                                @if(isset($services->processing_time))
                                    <div class="flex items-center space-x-2 mt-2">
                                        @include('frontend.icons.clock', ['class' => 'w-5 h-5 text-slate-400'])
                                        <span class="text-slate-300">Processing Time: {{ $services->processing_time }}</span>
                </div>
                                @endif
                        </div>
                        </div>
                        
                        <p class="text-base text-slate-300 leading-relaxed">
                            {{ $services->description ?? $services->sub_title ?? '' }}
                        </p>
                    </div>

                    {{-- Program Features with Cards --}}
                    @php
                        // Get ServicePoint programs (like FSWP, FSTP, CEC)
                        $servicePoints = isset($services->ServicePoint) && $services->ServicePoint->count() > 0 
                            ? $services->ServicePoint->where('status', 1) 
                            : collect([]);
                    @endphp
                    
                    @if($servicePoints->count() > 0)
                    <section class="mb-12" x-data="{ 
                        activeProgram: 0,
                        contentTabs: {},
                        setProgram(index) {
                            this.activeProgram = index;
                            // Reset content tab for this program if not set
                            if (!this.contentTabs[index]) {
                                this.contentTabs[index] = 0;
                            }
                            // Dispatch event to update Application Process section
                            window.dispatchEvent(new CustomEvent('program-changed', { detail: { index: index } }));
                        },
                        setContentTab(programIndex, tabIndex) {
                            this.contentTabs[programIndex] = tabIndex;
                        },
                        getActiveContentTab(programIndex) {
                            return this.contentTabs[programIndex] || 0;
                        }
                    }" x-init="
                        contentTabs[0] = 0;
                        window.programFeaturesActiveProgram = activeProgram;
                    ">
                        <h2 class="text-2xl font-bold text-white mb-6">Program Features</h2>
                        
                        {{-- Program Cards Grid --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                            @foreach($servicePoints as $index => $servicePoint)
                                <button
                                    @click="setProgram({{ $index }})"
                                    :class="activeProgram === {{ $index }} 
                                        ? 'bg-slate-700 border-blue-600' 
                                        : 'bg-slate-800 border-slate-700 hover:bg-slate-700'"
                                    class="flex items-start space-x-3 p-4 rounded-xl border transition-all duration-200 text-left w-full group"
                                >
                                    @include('frontend.icons.check-circle', ['class' => 'w-5 h-5 text-green-600 flex-shrink-0 mt-0.5'])
                                    <span class="text-slate-300 group-hover:text-white transition-colors">{{ $servicePoint->title }}</span>
                                </button>
                            @endforeach
    </div>

                        {{-- Content Section for Each Program --}}
                        @foreach($servicePoints as $programIndex => $servicePoint)
                            @php
                                $contentTabs = $servicePoint->ServicePointContents ?? collect([]);
                            @endphp
                            @if($contentTabs->count() > 0)
                                <div x-show="activeProgram === {{ $programIndex }}" 
                                     x-transition:enter="transition ease-out duration-300" 
                                     x-transition:enter-start="opacity-0 transform translate-y-4" 
                                     x-transition:enter-end="opacity-100 transform translate-y-0"
                                     x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     style="{{ $programIndex === 0 ? 'display: block;' : 'display: none;' }}"
                                     class="space-y-6 mt-6">
                                    
                                    {{-- Content Tabs --}}
                                    <div class="bg-slate-800 rounded-xl p-4 border border-slate-700">
                                        <div class="flex flex-wrap gap-2 overflow-x-auto pb-2">
                                            @foreach($contentTabs as $tabIndex => $contentTab)
                                                <button
                                                    @click="setContentTab({{ $programIndex }}, {{ $tabIndex }})"
                                                    :class="activeProgram === {{ $programIndex }} && getActiveContentTab({{ $programIndex }}) === {{ $tabIndex }} 
                                                        ? 'bg-blue-600 text-white font-semibold shadow-md' 
                                                        : 'bg-slate-700 text-slate-300 hover:bg-slate-600'"
                                                    class="px-5 py-2 rounded-lg transition-all duration-200 text-sm md:text-base whitespace-nowrap"
                                                >
                                                    {{ $contentTab->title }}
                                                </button>
                        @endforeach
        </div>
    </div>

                                    {{-- Content Display --}}
                                    @foreach($contentTabs as $tabIndex => $contentTab)
                                        <div x-show="activeProgram === {{ $programIndex }} && getActiveContentTab({{ $programIndex }}) === {{ $tabIndex }}" 
                                             x-transition:enter="transition ease-out duration-300" 
                                             x-transition:enter-start="opacity-0 transform translate-y-4" 
                                             x-transition:enter-end="opacity-100 transform translate-y-0"
                                             x-transition:leave="transition ease-in duration-200"
                                             x-transition:leave-start="opacity-100"
                                             x-transition:leave-end="opacity-0"
                                             style="{{ $programIndex === 0 && $tabIndex === 0 ? 'display: block;' : 'display: none;' }}"
                                             class="bg-slate-800 rounded-2xl p-8 border border-slate-700 shadow-lg">
                                            @php
                                                $titles = $contentTab->Title ?? collect([]);
                                            @endphp
                                            @if($titles->count() > 0)
                                                <div class="space-y-6">
                                                    @foreach($titles as $title)
                                                        <div class="space-y-4">
                                                            @if(!empty($title->name))
                                                                <h3 class="text-2xl font-bold text-white mb-4 pb-2 border-b border-slate-700">{{ $title->name }}</h3>
                                    @endif
                                                            
                                                            {{-- Display Paragraphs --}}
                                                            @php
                                                                $paragraphs = $title->paragraphs ?? collect([]);
                                                            @endphp
                                                            @if($paragraphs->count() > 0)
                                                                <div class="space-y-4">
                                                                    @foreach($paragraphs as $paragraph)
                                                                        <p class="text-slate-300 leading-relaxed text-base">
                                                            {!! $paragraph->content !!}
                                                                            @if(!empty($paragraph->url))
                                                                                <a href="{{ $paragraph->url }}" class="text-blue-400 hover:text-blue-300 underline font-medium">Read more...</a>
                                                                            @endif
                                                        </p>
                                                    @endforeach
                                                                </div>
                                                @endif
                                                            
                                                            {{-- Display Options (Bullet Lists) --}}
                                                            @php
                                                                $options = $title->options ?? collect([]);
                                                            @endphp
                                                            @if($options->count() > 0)
                                                                <ul class="space-y-3 text-slate-300">
                                                                    @foreach($options as $option)
                                                                        <li class="flex items-start space-x-3">
                                                                            <span class="w-2 h-2 bg-blue-600 rounded-full flex-shrink-0 mt-2"></span>
                                                                            <span class="flex-1">{{ $option->value }}</span>
                                                                        </li>
                                                                        @php
                                                                            $subOptions = $option->subOptions ?? collect([]);
                                                                        @endphp
                                                                        @if($subOptions->count() > 0)
                                                                            <ul class="ml-8 space-y-2 text-slate-400">
                                                                                @foreach($subOptions as $subOption)
                                                                                    <li class="flex items-start space-x-3">
                                                                                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full flex-shrink-0 mt-2"></span>
                                                                                        <span>{{ $subOption->value }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="text-center py-8">
                                                    <p class="text-slate-400">Content will be displayed here once configured in the admin panel.</p>
                                                </div>
                                            @endif
                                        </div>
                                @endforeach
                    </div>
                @endif
            @endforeach
                    </section>
                    @endif

                    {{-- Application Process Timeline --}}
                    @if(isset($services->slug) && $services->slug !== 'noc-code')
                    @php
                        $servicePoints = isset($services->ServicePoint) && $services->ServicePoint->count() > 0 
                            ? $services->ServicePoint->where('status', 1) 
                            : collect([]);
                    @endphp
                    <section class="mb-12 hidden" 
                        @if($servicePoints->count() > 0)
                        x-data="{ 
                            activeProgram: 0,
                            processingTimes: @js($processingTimeDurations ?? []),
                            init() {
                                // Listen for program changes from Program Features section
                                window.addEventListener('program-changed', (e) => {
                                    this.activeProgram = e.detail.index;
                                });
                            }
                        }"
                        @endif
                    >
                        <h2 class="text-2xl font-bold text-white mb-6">Application Process</h2>
                        <div class="space-y-6">
                            @if(isset($processSteps) && $processSteps->count() > 0)
                                @foreach($processSteps as $item)
                                    <div class="flex items-start space-x-4">
                                        <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">
                                            {{ str_replace('0', '', $item->step_number) }}
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-2">
                                                <h3 class="text-lg font-semibold text-white">{{ $item->title }}</h3>
                                                <span class="text-sm text-slate-400 bg-slate-700 px-3 py-1 rounded-full">
                                                    @if(str_replace('0', '', $item->step_number) == 4 && $servicePoints->count() > 0 && isset($processingTimeDurations) && count($processingTimeDurations) > 0)
                                                        <span x-text="processingTimes[activeProgram] || processingTimes[0] || '4 - 12 months'"></span>
                                                    @else
                                                        {{ $item->timeline ?: '4 - 12 months' }}
                                                    @endif
                                                </span>
                                            </div>
                                            <p class="text-slate-300">{{ $item->description }}</p>
        </div>
    </div>
                                @endforeach
                            @else
                                {{-- Fallback to hardcoded data if no steps in database --}}
                                @php
                                    $fallbackSteps = [
                                        [
                                            'step' => 1,
                                            'title' => 'Initial Assessment',
                                            'description' => 'We evaluate your eligibility and create a personalized strategy',
                                            'duration' => '1-2 days'
                                        ],
                                        [
                                            'step' => 2,
                                            'title' => 'Document Preparation',
                                            'description' => 'Compile and prepare all required documentation',
                                            'duration' => '2-4 weeks'
                                        ],
                                        [
                                            'step' => 3,
                                            'title' => 'Application Submission',
                                            'description' => 'Submit your complete application to IRCC',
                                            'duration' => '1 week'
                                        ],
                                        [
                                            'step' => 4,
                                            'title' => 'Processing & Follow-up',
                                            'description' => 'Monitor application status and respond to any requests',
                                            'duration' => 'dynamic'
                                        ]
                                    ];
                                @endphp
                                @foreach($fallbackSteps as $item)
                                    <div class="flex items-start space-x-4">
                                        <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">
                                            {{ $item['step'] }}
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-2">
                                                <h3 class="text-lg font-semibold text-white">{{ $item['title'] }}</h3>
                                                <span class="text-sm text-slate-400 bg-slate-700 px-3 py-1 rounded-full">
                                                    @if($item['step'] === 4 && $servicePoints->count() > 0 && isset($processingTimeDurations) && count($processingTimeDurations) > 0)
                                                        <span x-text="processingTimes[activeProgram] || processingTimes[0] || '4 - 12 months'"></span>
                                                    @else
                                                        {{ $item['step'] === 4 ? '4 - 12 months' : $item['duration'] }}
                                                    @endif
                                                </span>
                                            </div>
                                            <p class="text-slate-300">{{ $item['description'] }}</p>
                </div>
            </div>
                                @endforeach
                            @endif
                        </div>
                    </section>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-8">
                        {{-- Quick Stats --}}
                        <div class="bg-slate-800 rounded-2xl shadow-md p-6 border border-slate-700">
                            <h3 class="text-lg font-bold text-white mb-4">Quick Overview</h3>
                            <div class="space-y-4">
                                @if(isset($services->processing_time))
                                    <div class="flex items-center justify-between">
                                        <span class="text-slate-400">Processing Time</span>
                                        <span class="font-medium text-white">{{ $services->processing_time }}</span>
                                    </div>
                                @endif
                                <div class="flex items-center justify-between">
                                    <span class="text-slate-400">Category</span>
                                    <span class="font-medium text-white">{{ $parentService && $parentService->ServiceCategory ? $parentService->ServiceCategory->title : 'Immigration' }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-slate-400">Success Rate</span>
                                    <span class="font-medium text-green-600">98%</span>
                                </div>
                            </div>
                        </div>

                        {{-- CTA Card --}}
                        <div class="bg-blue-600 rounded-2xl p-6 text-white">
                            <h3 class="text-xl font-bold mb-2">Ready to Apply?</h3>
                            <p class="text-blue-100 mb-6">
                                Get personalized guidance from our immigration experts.
                            </p>
                            <div class="space-y-3">
                                <a href="{{ url('eligibility-check') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-white text-blue-600 rounded-lg font-medium hover:bg-blue-50 transition-colors">
                                    Check your Eligibility
                                </a>
                                <a href="tel:+14169897788" class="w-full inline-flex items-center justify-center px-6 py-3 border-2 border-blue-200 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors">
                                    Call +1 416 989 7788
                                </a>
                            </div>
                        </div>

                        {{-- Related Services --}}
                        @if(isset($relatedServices) && $relatedServices->count() > 0)
                        <div class="bg-slate-800 rounded-2xl shadow-md p-6 border border-slate-700">
                            <h3 class="text-lg font-bold text-white mb-4">Related Programs</h3>
                            <div class="space-y-3">
                                @foreach($relatedServices as $relatedService)
                                    <a href="{{ url('sub-service-details/' . ($relatedService->slug ?? $relatedService->id)) }}" class="block p-3 rounded-xl hover:bg-slate-700 transition-colors border border-slate-600">
                                        <h4 class="font-medium text-white text-sm">{{ $relatedService->title }}</h4>
                                        @if($relatedService->processing_time)
                                            <p class="text-xs text-slate-400 mt-1">{{ $relatedService->processing_time }}</p>
                                        @endif
                                    </a>
                                @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- FAQ Section --}}
                        @if($serviceFAQs->count() > 0)
                        <div class="bg-blue-900 rounded-2xl shadow-md border border-blue-800 overflow-hidden" x-data="{ openIndex: null }">
                            <h3 class="text-base font-bold text-white mb-0 px-6 pt-6 pb-4">Frequently Asked Questions</h3>
                            <div class="divide-y divide-blue-800">
                                @foreach($serviceFAQs->take(5) as $index => $faq)
                                    <div>
                                        <button 
                                            @click="openIndex = openIndex === {{ $index }} ? null : {{ $index }}"
                                            class="w-full px-6 py-4 text-left flex items-start justify-between hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset transition-colors active:brightness-125 button-glow group"
                                        >
                                            <span class="text-sm font-medium text-white pr-4 group-hover:text-blue-200 transition-colors">
                                                {{ $faq->title }}
                                            </span>
                                            <svg 
                                                class="w-5 h-5 text-blue-400 transition-transform duration-200 flex-shrink-0"
                                                :class="openIndex === {{ $index }} ? 'rotate-180' : ''"
                                                fill="none" 
                                                stroke="currentColor" 
                                                viewBox="0 0 24 24"
                                            >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                        <div 
                                            x-show="openIndex === {{ $index }}"
                                            x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 max-h-0"
                                            x-transition:enter-end="opacity-100 max-h-screen"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100 max-h-screen"
                                            x-transition:leave-end="opacity-0 max-h-0"
                                            class="overflow-hidden"
                                            style="display: none;"
                                        >
                                            <div class="px-6 pb-4 pt-0">
                                                <div class="border-t border-blue-800 pt-4">
                                                    <p class="text-xs text-blue-200 leading-relaxed">
                                                        {{ $faq->description }}
                                                    </p>
                </div>
            </div>
        </div>
    </div>
                                @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form Section --}}
    <section class="py-20 bg-slate-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-white mb-4">
                    @if(isset($services->slug) && $services->slug === 'noc-code')
                        Start Your Application
                    @else
                        Start Your {{ $services->title ?? 'Service' }} Application
                    @endif
                </h2>
                <p class="text-base text-slate-300">Get expert guidance and personalized support for your immigration journey</p>
            </div>
            <div class="bg-slate-800 rounded-2xl p-8 border border-slate-700">
                <form action="{{ route('submit-contact-form') }}" method="POST" class="space-y-6">
                    @csrf
                    {{-- Honeypot: hidden field to trap bots --}}
                    <input type="text" name="website" style="display:none !important;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">
                    <input type="hidden" name="service" value="{{ $services->title ?? '' }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2">First Name</label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 rounded-lg bg-slate-700 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-white mb-2">Last Name</label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 rounded-lg bg-slate-700 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2">Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-slate-700 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-white mb-2">Phone</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-slate-700 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-white mb-2">Message</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-lg bg-slate-700 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </div>
@endsection
