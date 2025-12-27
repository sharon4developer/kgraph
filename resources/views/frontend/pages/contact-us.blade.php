@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
    $locations = \App\Models\Location::select('address', 'id', 'location', 'email', 'phone', 'image')
        ->orderBy('order', 'asc')
        ->where('status', 1)
        ->get();
@endphp

<div class="min-h-screen">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Get in Touch with KGraph Immigration</h1>
            <p class="text-xl text-slate-300 leading-relaxed max-w-3xl mx-auto mb-8">
                Gateway to a New Life in Canada
            </p>
            <p class="text-lg text-slate-300 leading-relaxed max-w-3xl mx-auto">
                We understand that navigating the immigration process can be complex and overwhelming. Whether you're looking to study, work, visit, or settle in Canada, the team at KGraph Immigration is here to support you every step of the way.
            </p>
        </div>
    </section>

    {{-- Contact Methods --}}
    <section class="py-20 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">Multiple Ways to Reach Us</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">Choose the contact method that works best for you. We're committed to responding quickly and providing the support you need.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-slate-700 rounded-2xl p-8 text-center hover:shadow-md transition-shadow border border-slate-600">
                    <div class="w-16 h-16 bg-slate-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                        @include('frontend.icons.phone', ['class' => 'w-6 h-6 text-blue-600'])
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Call Us</h3>
                    <p class="text-slate-300 mb-4">Speak directly with our immigration experts</p>
                    <div class="space-y-2">
                        <p class="font-semibold text-white">+1 416 989 7788</p>
                        <p class="text-sm text-slate-400">Monday - Friday: 9:00 AM - 6:00 PM EST</p>
                    </div>
                    <a href="tel:+14169897788" class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-medium">
                        Call Now
                    </a>
                </div>

                <div class="bg-slate-700 rounded-2xl p-8 text-center hover:shadow-md transition-shadow border border-slate-600">
                    <div class="w-16 h-16 bg-slate-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                        @include('frontend.icons.mail', ['class' => 'w-6 h-6 text-blue-600'])
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Email Us</h3>
                    <p class="text-slate-300 mb-4">Send us your questions and we'll respond within 24 hours</p>
                    <div class="space-y-2">
                        <p class="font-semibold text-white">canada@kgraph.ca</p>
                        <p class="text-sm text-slate-400">For urgent matters, please call</p>
                    </div>
                    <a href="mailto:canada@kgraph.ca" class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-medium">
                        Send Email
                    </a>
                </div>

                <div class="bg-slate-700 rounded-2xl p-8 text-center hover:shadow-md transition-shadow border border-slate-600">
                    <div class="w-16 h-16 bg-slate-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                        @include('frontend.icons.message-square', ['class' => 'w-6 h-6 text-blue-600'])
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Free Consultation</h3>
                    <p class="text-slate-300 mb-4">Book a personalized consultation with our experts</p>
                    <div class="space-y-2">
                        <p class="font-semibold text-white">Schedule Your Meeting</p>
                        <p class="text-sm text-slate-400">30-minute consultation available</p>
                    </div>
                    <a href="{{ url('contact-us') }}" class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-medium">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Office Locations --}}
    @if($locations->count() > 0)
    <section class="py-20 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">Visit Our Offices</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    We have convenient locations across Canada and India to serve you better. 
                    Schedule an in-person consultation at any of our offices.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($locations as $index => $location)
                    <div class="bg-slate-800 rounded-2xl p-6 border border-slate-700 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                        <h3 class="text-xl font-bold text-white mb-3">{{ $location->location }}</h3>
                        <div class="flex items-start space-x-2 mb-3">
                            @include('frontend.icons.map-pin', ['class' => 'w-4 h-4 text-blue-400 flex-shrink-0 mt-1'])
                            <p class="text-slate-300 text-sm">{{ $location->address }}</p>
                        </div>
                        <div class="flex items-center space-x-2 mb-2">
                            @include('frontend.icons.phone', ['class' => 'w-4 h-4 text-blue-400'])
                        <a href="tel:{{ $location->phone }}" class="text-blue-400 hover:text-blue-300 text-sm">{{ $location->phone }}</a>
                        </div>
                        @if($location->email)
                            <div class="flex items-center space-x-2">
                                @include('frontend.icons.mail', ['class' => 'w-4 h-4 text-blue-400'])
                                <a href="mailto:{{ $location->email }}" class="text-blue-400 hover:text-blue-300 text-sm">{{ $location->email }}</a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Book Your Free Consultation Section --}}
    <section class="py-20 bg-slate-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Book Your Free Consultation</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    Take the first step towards your Canadian dream. Fill out the form below and our immigration experts will get back to you within 24 hours.
                </p>
            </div>
            <div class="bg-slate-700 rounded-2xl p-8 border border-slate-600">
                <form action="{{ route('submit-contact-form') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2 font-semibold">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="John">
                        </div>
                        <div>
                            <label class="block text-white mb-2 font-semibold">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Doe">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2 font-semibold">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="john.doe@example.com">
                        </div>
                        <div>
                            <label class="block text-white mb-2 font-semibold">Phone <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="+1 416 989 7788">
                        </div>
                    </div>
                    <div>
                        <label class="block text-white mb-2 font-semibold">Message <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tell us about your immigration goals and how we can help you..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors shadow-lg hover:shadow-xl">
                            Book Free Consultation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

