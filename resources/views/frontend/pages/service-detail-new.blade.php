@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
    $serviceFAQs = isset($services->ServiceFaq) ? $services->ServiceFaq : collect([]);
@endphp

<div class="min-h-screen">
    {{-- Header --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ url('services') }}" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Services
                </a>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div class="mb-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-16 h-16 bg-slate-700 rounded-2xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl md:text-4xl font-bold text-white">{{ $services->title ?? 'Service' }}</h1>
                                @if(isset($services->processing_time))
                                    <div class="flex items-center space-x-2 mt-2">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-slate-300">Processing Time: {{ $services->processing_time }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <p class="text-xl text-slate-300 leading-relaxed">
                            {{ $services->description ?? $services->sub_title ?? '' }}
                        </p>
                    </div>

                    {{-- Key Features --}}
                    @if(isset($services->ServicePoint) && $services->ServicePoint->count() > 0)
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-white mb-6">Program Features</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($services->ServicePoint as $point)
                                <div class="flex items-start space-x-3 p-4 bg-slate-800 rounded-xl border border-slate-700">
                                    <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-300">{{ $point->title }}</span>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif

                    {{-- Service Content --}}
                    @if(isset($services->ServiceContent) && $services->ServiceContent->count() > 0)
                        @foreach($services->ServiceContent as $content)
                            <section class="mb-12">
                                <h2 class="text-2xl font-bold text-white mb-6">{{ $content->title ?? '' }}</h2>
                                <div class="bg-slate-800 rounded-2xl p-6 border border-slate-700">
                                    <div class="text-slate-300 leading-relaxed">
                                        {!! $content->description ?? '' !!}
                                    </div>
                                </div>
                            </section>
                        @endforeach
                    @endif

                    {{-- FAQ Section --}}
                    @if($serviceFAQs->count() > 0)
                        <section class="mb-12">
                            <h2 class="text-2xl font-bold text-white mb-6">Frequently Asked Questions</h2>
                            @include('frontend.Common.faq', ['faqs' => $serviceFAQs, 'title' => ''])
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
                                <div class="flex items-center justify-between">
                                    <span class="text-slate-400">Category</span>
                                    <span class="font-medium text-white">{{ $services->ServiceCategory->title ?? 'Immigration' }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-slate-400">Success Rate</span>
                                    <span class="font-medium text-green-600">98%</span>
                                </div>
                            </div>
                        </div>

                        {{-- CTA Card --}}
                        <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-lg p-6 border border-blue-500">
                            <h3 class="text-xl font-bold text-white mb-4">Ready to Get Started?</h3>
                            <p class="text-blue-100 mb-6">Book a free consultation with our immigration experts today.</p>
                            <a href="{{ url('contact-us') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-white text-blue-600 rounded-lg font-medium hover:bg-blue-50 transition-colors">
                                Book Free Consultation
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

