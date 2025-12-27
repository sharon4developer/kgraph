@extends('layouts.main')

@section('content')
<div class="min-h-screen">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Build a Rewarding Career With Us</h1>
            <p class="text-xl text-slate-300 leading-relaxed max-w-3xl mx-auto mb-8">
                At KGraph, we are a passionate team dedicated to helping individuals and families navigate their journey to a new life in a new country.
            </p>
        </div>
    </section>

    {{-- Job Listings --}}
    <section class="py-20 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">Current Job Openings</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">Explore exciting career opportunities and find the perfect role for your skills and aspirations.</p>
            </div>
            
            @if(isset($careers) && $careers->count() > 0)
                <div class="space-y-6">
                    @foreach($careers as $index => $career)
                        <div class="bg-slate-800 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-slate-700 p-8 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                            <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-6">
                                <div class="flex-1">
                                    <h3 class="text-2xl font-bold text-white mb-3">{{ $career->title ?? 'Position' }}</h3>
                                    <p class="text-slate-300 leading-relaxed">{{ $career->description ?? '' }}</p>
                                </div>
                                <div class="mt-6 lg:mt-0 lg:ml-8 flex-shrink-0">
                                    <a href="{{ url('contact-us') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                                        Apply Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-slate-300 text-lg">We are continuously seeking skilled and talented individuals to join our workforce. Please check back regularly or follow us on social media for updates.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-blue-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Interested in Joining Our Team?</h2>
            <a href="{{ url('contact-us') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-2xl hover:bg-blue-50 transition-colors font-medium text-lg">
                Send Us Your Resume
            </a>
        </div>
    </section>
</div>
@endsection

