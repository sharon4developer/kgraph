@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
    $serviceFAQs = isset($faqs) ? $faqs->filter(function($faq) {
        return in_array($faq->category ?? '', ['Express Entry', 'PNP', 'General']);
    }) : collect([]);
@endphp

<div class="min-h-screen">
    {{-- Header --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                A team of experts to guide you
            </h1>
            <p class="text-xl text-slate-300 leading-relaxed max-w-3xl mx-auto">
                Our team of Regulated and Experienced immigration consultants is here to help you navigate the right Immigration Process.
            </p>
        </div>
    </section>

    {{-- Service Categories --}}
    <section class="py-16 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Permanent Residency --}}
                <div class="bg-slate-700 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: 0s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Permanent Residency</h3>
                    <ul class="space-y-3">
                        @foreach(['Express Entry', 'PNP', 'Family Sponsorship', 'Business/Investor Visa'] as $service)
                            <li>
                                <a href="{{ url('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                    {{ $service }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Temporary Residency --}}
                <div class="bg-slate-700 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: 0.1s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Temporary Residency</h3>
                    <ul class="space-y-3">
                        @foreach(['PGWP', 'Spouse Open Work Permit', 'Visiting Visa', 'Super Visa'] as $service)
                            <li>
                                <a href="{{ url('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                    {{ $service }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Refusals and Appeals --}}
                <div class="bg-slate-700 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Refusals and Appeals</h3>
                    <ul class="space-y-3">
                        @foreach(['IAD Appeals', 'Refusal and Reapplication'] as $service)
                            <li>
                                <a href="{{ url('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                    {{ $service }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Pilot and Rural Programs --}}
                <div class="bg-slate-700 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">Pilot and Rural Programs</h3>
                    <ul class="space-y-3">
                        @foreach(['RCIP', 'AIP', 'Home Caregiver'] as $service)
                            <li>
                                <a href="{{ url('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
                                    {{ $service }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- LMIA --}}
                <div class="bg-slate-700 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold text-white mb-4">LMIA</h3>
                    <p class="text-slate-300">
                        Labour Market Impact Assessment applications for Canadian employers and foreign workers.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Grid --}}
    <section class="py-16 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($serviceCategory))
                    @foreach($serviceCategory as $category)
                        @foreach($category->Service->where('status', 1)->take(6) as $index => $service)
                            @include('frontend.Common.service-card', ['service' => $service, 'index' => $index])
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- Process Overview --}}
    <section class="py-20 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">Our Service Process</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    We follow a structured approach to ensure your immigration application is handled professionally and efficiently.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    [
                        'title' => 'Initial Assessment',
                        'description' => 'We evaluate your profile, discuss your goals, and recommend the best immigration pathway.',
                        'features' => ['Eligibility review', 'Document checklist', 'Timeline estimation', 'Fee structure']
                    ],
                    [
                        'title' => 'Application Preparation',
                        'description' => 'Our team prepares and reviews all documentation to ensure accuracy and completeness.',
                        'features' => ['Form completion', 'Document compilation', 'Quality assurance', 'Government submission']
                    ],
                    [
                        'title' => 'Ongoing Support',
                        'description' => 'We provide continuous updates and support throughout the entire process until approval.',
                        'features' => ['Regular updates', 'IRCC communication', 'Additional requests', 'Landing assistance']
                    ]
                ] as $index => $step)
                    <div class="bg-slate-700 rounded-2xl p-8 shadow-md border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.2 }}s; animation-fill-mode: forwards;">
                        <div class="text-center mb-6">
                            <div class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                                {{ $index + 1 }}
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">{{ $step['title'] }}</h3>
                            <p class="text-slate-300">{{ $step['description'] }}</p>
                        </div>
                        <ul class="space-y-2">
                            @foreach($step['features'] as $feature)
                                <li class="flex items-center text-sm text-slate-300">
                                    <span class="w-2 h-2 bg-blue-600 rounded-full mr-3 flex-shrink-0"></span>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    @if($serviceFAQs->count() > 0)
        <section class="py-20 bg-slate-900">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                @include('frontend.Common.faq', ['faqs' => $serviceFAQs])
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-20 bg-blue-600 border-t border-slate-700">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Begin Your Immigration Journey?</h2>
            <p class="text-xl text-blue-200 mb-8 max-w-2xl mx-auto">
                Let our experienced team guide you through the immigration process with personalized service and expert knowledge.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ url('contact-us') }}" class="px-8 py-4 bg-white text-blue-600 rounded-2xl hover:bg-blue-50 transition-colors font-medium text-lg">
                    Book Free Consultation
                </a>
                <a href="tel:+14169897788" class="px-8 py-4 border-2 border-blue-200 text-blue-200 rounded-2xl hover:bg-blue-200 hover:text-blue-600 transition-colors font-medium text-lg">
                    Call +1 416 989 7788
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

