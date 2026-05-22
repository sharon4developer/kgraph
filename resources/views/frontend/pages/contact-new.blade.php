@extends('layouts.main')

@push('styles')
<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush

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
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Get in Touch with KGraph Immigration
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed mb-8">
                    Gateway to a New Life in Canada
                </p>
                <div x-data="{ showFullText: false }" class="mb-8">
                    <p class="text-lg text-slate-300 leading-relaxed md:mb-8" 
                       :class="showFullText ? '' : 'line-clamp-3'"
                       x-ref="contentText">
                        We understand that navigating the immigration process can be complex and overwhelming. Whether you're looking to study, work, visit, or settle in Canada, the team at KGraph Immigration is here to support you every step of the way. We are committed to providing expert advice, personalized guidance, and tailored solutions to meet your unique immigration needs. With years of experience in the field, our immigration consultants are well-equipped to help you understand your options, prepare your applications, and overcome any challenges that may arise along the way. At KGraph Immigration, we pride ourselves on offering the highest level of service, ensuring that your immigration journey is as smooth and stress-free as possible. Reach out to us today for a consultation, and let us help you take the next step toward your new life in Canada.
                    </p>
                    <button @click="showFullText = !showFullText" 
                            class="md:hidden text-blue-400 hover:text-blue-300 font-medium text-sm mt-2 underline">
                        <span x-show="!showFullText">Read More</span>
                        <span x-show="showFullText">Read Less</span>
                    </button>
                </div>

                <div class="mt-10 mb-8">
                    <h2 class="text-2xl font-bold text-white mb-6 text-center">Our Team Identity</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-4xl mx-auto text-left">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="text-white font-semibold mb-1">Study Permits:</p>
                                <p class="text-slate-300 text-sm">Assistance with securing study permits for international students wishing to study in Canada.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="text-white font-semibold mb-1">Work Permits:</p>
                                <p class="text-slate-300 text-sm">Guidance for obtaining temporary or permanent work permits for skilled workers, entrepreneurs, and other professionals.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="text-white font-semibold mb-1">Permanent Residency:</p>
                                <p class="text-slate-300 text-sm">Expert advice on applying for Canadian Permanent Residency through Express Entry, Provincial Nominee Programs (PNPs), and other pathways.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="text-white font-semibold mb-1">Family Sponsorship:</p>
                                <p class="text-slate-300 text-sm">Helping Canadian citizens and permanent residents sponsor their loved ones for reunification in Canada.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="inline-flex items-center px-6 py-3 bg-green-900 text-green-300 rounded-full font-medium mt-8">
                    ✅ Free Assessment • Quick Response • Expert Guidance
                </div>
            </div>
        </div>
    </section>

    {{-- Book Your Free Assessment Section --}}
    <section class="py-16 bg-slate-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Book Your Free Assessment</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    Get personalized guidance from our immigration experts
                </p>
            </div>
            <div class="bg-gradient-to-br from-slate-800 to-slate-700 rounded-2xl p-8 border border-slate-600 shadow-2xl">
                <form id="contact-form" action="{{ route('submit-contact-form') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    {{-- Honeypot: hidden field to trap bots --}}
                    <input type="text" name="website" style="display:none !important;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2 font-semibold">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 rounded-lg bg-slate-700/50 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="John">
                        </div>
                        <div>
                            <label class="block text-white mb-2 font-semibold">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 rounded-lg bg-slate-700/50 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Doe">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2 font-semibold">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-slate-700/50 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="john.doe@example.com">
                        </div>
                        <div>
                            <label class="block text-white mb-2 font-semibold">Phone Number <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-slate-700/50 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="+1 (555) 123-4567">
                        </div>
                    </div>
                    <div>
                        <label class="block text-white mb-2 font-semibold">Service of Interest <span class="text-red-500">*</span></label>
                        <select name="service_of_interest" required class="w-full px-4 py-3 rounded-lg bg-slate-700/50 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" class="bg-slate-800 text-white">Select a service</option>
                            @if(isset($allServices) && $allServices->count() > 0)
                                @foreach($allServices as $service)
                                    <option value="{{ $service->title }}" class="bg-slate-800 text-white">{{ $service->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div>
                        <label class="block text-white mb-2 font-semibold">Preferred Contact Method <span class="text-red-500">*</span></label>
                        <div class="flex gap-6 mt-3">
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="preferred_contact_method" value="email" checked class="w-5 h-5 text-blue-600 bg-slate-700/50 border-2 border-slate-500 focus:ring-blue-500 focus:ring-2 focus:ring-offset-0 cursor-pointer">
                                <span class="ml-3 text-white font-medium">Email</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="preferred_contact_method" value="phone" class="w-5 h-5 text-blue-600 bg-slate-700/50 border-2 border-slate-500 focus:ring-blue-500 focus:ring-2 focus:ring-offset-0 cursor-pointer">
                                <span class="ml-3 text-white font-medium">Phone</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-white mb-2 font-semibold">Message <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-lg bg-slate-700/50 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tell us about your immigration goals and any specific questions you have..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="submit-btn" class="w-full px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                            <span id="submit-text">Check your Eligibility</span>
                            <span id="submit-loading" class="hidden">Submitting...</span>
                        </button>
                        <p class="mt-4 text-sm text-slate-400">
                            We'll respond within 24 hours. For urgent matters, call <a href="tel:+14169897788" class="text-blue-400 hover:text-blue-300 underline">+1 416 989 7788</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Office Locations --}}
    @if($locations->count() > 0)
    @php
        // Business hours mapping based on location
        $businessHours = [
            'Toronto' => 'Monday - Saturday: 10:00 AM - 5:00 PM',
            'Kitchener' => 'Monday - Saturday: 10:00 AM - 5:00 PM',
            'Mississauga' => 'Monday - Saturday: 10:00 AM - 5:00 PM',
            'Kochi' => 'Monday - Saturday: 8:00 AM - 3:00 PM',
        ];
        
        // Google Maps URLs for each location
        $mapUrls = [
            'Toronto' => 'https://www.google.com/maps?q=200+Bay+Street+Suite+2900+Toronto+ON+M5J+2J2',
            'Kitchener' => 'https://www.google.com/maps?q=50+Queen+Street+North+Suite+320+Kitchener+ON+N2H+6P4',
            'Mississauga' => 'https://www.google.com/maps?q=100+Matheson+Blvd+East+Suite+104+Mississauga+ON+L4Z+2G7',
            'Kochi' => 'https://www.google.com/maps?q=Marine+Drive+Ernakulam+Kochi+Kerala+682031+India',
        ];
        
        // Helper function to generate Google Maps URL from address
        function getMapUrl($location, $address, $mapUrls) {
            if (isset($mapUrls[$location])) {
                return $mapUrls[$location];
            }
            // Fallback: generate URL from address
            $encodedAddress = urlencode($address);
            return "https://www.google.com/maps?q={$encodedAddress}";
        }
    @endphp
    <section class="py-16 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">Visit Our Offices</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    We have convenient locations across Canada and India to serve you better. 
                    Schedule an in-person consultation at any of our offices.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
                @foreach($locations as $index => $location)
                    @php
                        $locationName = $location->location;
                        $hours = $businessHours[$locationName] ?? 'Monday - Saturday: 10:00 AM - 5:00 PM';
                        $mapUrl = getMapUrl($locationName, $location->address ?? '', $mapUrls);
                    @endphp
                    <div class="bg-gradient-to-br from-slate-800 to-slate-700 rounded-2xl p-5 border border-slate-600 opacity-0 animate-fade-in-up flex flex-col shadow-lg hover:shadow-xl hover:shadow-blue-900/20 hover:border-blue-500 transition-all" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                        {{-- Map Icon --}}
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center shadow-lg">
                                @include('frontend.icons.map-pin', ['class' => 'w-8 h-8 text-white'])
                            </div>
                        </div>
                        
                        {{-- City Name --}}
                        <h3 class="text-xl font-bold text-white mb-6 text-center">{{ $locationName }}</h3>
                        
                        {{-- Contact Information --}}
                        <div class="space-y-3 mb-6 flex-1">
                            @if($location->address)
                                <div class="flex items-start space-x-3">
                                    @include('frontend.icons.map-pin', ['class' => 'w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5'])
                                    <p class="text-slate-300 text-sm">{{ $location->address }}</p>
                                </div>
                            @endif
                            
                            @if($location->phone)
                                <div class="flex items-center space-x-3">
                                    @include('frontend.icons.phone', ['class' => 'w-5 h-5 text-blue-400 flex-shrink-0'])
                                    <a href="tel:{{ $location->phone }}" class="text-blue-400 hover:text-blue-300 text-sm">{{ $location->phone }}</a>
                                </div>
                            @endif
                            
                            @if($location->email)
                                <div class="flex items-center space-x-3">
                                    @include('frontend.icons.mail', ['class' => 'w-5 h-5 text-blue-400 flex-shrink-0'])
                                    <a href="mailto:{{ $location->email }}" class="text-blue-400 hover:text-blue-300 text-sm">{{ $location->email }}</a>
                                </div>
                            @endif
                            
                            <div class="flex items-center space-x-3">
                                @include('frontend.icons.clock', ['class' => 'w-5 h-5 text-blue-400 flex-shrink-0'])
                                <p class="text-slate-300 text-sm">{{ $hours }}</p>
                            </div>
                        </div>
                        
                        {{-- View on Map Button --}}
                        <a 
                            href="{{ $mapUrl }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-full mt-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-center transition-colors"
                        >
                            View on Map
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Contact Methods --}}
    <section class="py-16 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Multiple Ways to Reach Us
                </h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    Choose the contact method that works best for you. We're committed to responding 
                    quickly and providing the support you need.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Call Us --}}
                <div class="bg-gradient-to-br from-slate-700 to-slate-600 rounded-2xl p-8 text-center hover:shadow-lg hover:shadow-blue-900/20 transition-all border border-slate-600/50 opacity-0 animate-fade-in-up" style="animation-delay: 0s; animation-fill-mode: forwards;">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        @include('frontend.icons.phone', ['class' => 'w-6 h-6 text-white'])
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Call Us</h3>
                    <p class="text-slate-300 mb-4">Speak directly with our immigration experts</p>
                    <div class="space-y-2 mb-6">
                        <p class="font-semibold text-white">+1 416 989 7788</p>
                        <p class="text-sm text-slate-400">Monday - Saturday: 10:00 AM - 5:00 PM EST</p>
                    </div>
                    <a href="tel:+14169897788" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-medium">
                        Call Now
                    </a>
                </div>

                {{-- Email Us --}}
                <div class="bg-gradient-to-br from-slate-700 to-slate-600 rounded-2xl p-8 text-center hover:shadow-lg hover:shadow-blue-900/20 transition-all border border-slate-600/50 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        @include('frontend.icons.mail', ['class' => 'w-6 h-6 text-white'])
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Email Us</h3>
                    <p class="text-slate-300 mb-4">Send us your questions and we'll respond within 24 hours</p>
                    <div class="space-y-2 mb-6">
                        <p class="font-semibold text-white">canada@kgraph.ca</p>
                        <p class="text-sm text-slate-400">For urgent matters, please call</p>
                    </div>
                    <a href="mailto:canada@kgraph.ca" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-medium">
                        Send Email
                    </a>
                </div>

                {{-- Free Assessment --}}
                <div class="bg-gradient-to-br from-slate-700 to-slate-600 rounded-2xl p-8 text-center hover:shadow-lg hover:shadow-blue-900/20 transition-all border border-slate-600/50 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        @include('frontend.icons.message-square', ['class' => 'w-6 h-6 text-white'])
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Free Assessment</h3>
                    <p class="text-slate-300 mb-4">Book a personalized assessment with our experts</p>
                    <div class="space-y-2 mb-6">
                        <p class="font-semibold text-white">Schedule Your Meeting</p>
                        <p class="text-sm text-slate-400">30-minute consultation available</p>
                    </div>
                    <a href="{{ url('contact-us') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-medium">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </section>


    {{-- Success Modal Popup --}}
    <div id="success-modal" class="fixed inset-0 z-50 overflow-hidden hidden" style="display: none;">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" onclick="closeSuccessModal()"></div>
        
        <!-- Modal container -->
        <div class="fixed inset-0 flex items-center justify-center px-4 py-4 pointer-events-none">
            <!-- Modal panel -->
            <div class="relative bg-white rounded-2xl text-left shadow-2xl transform transition-all w-full max-w-md z-50 pointer-events-auto">
                <!-- Header -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-5 flex items-center justify-between rounded-t-2xl">
                    <h3 class="text-lg font-bold text-white">Success!</h3>
                    <button onclick="closeSuccessModal()" class="text-white hover:text-green-200 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Content -->
                <div class="px-6 py-8 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Thank You!</h3>
                    <p class="text-gray-700 mb-6" id="success-text">Your consultation request has been submitted successfully. We'll get back to you soon!</p>
                    <button onclick="closeSuccessModal()" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Error Modal Popup --}}
    <div id="error-modal" class="fixed inset-0 z-50 overflow-hidden hidden" style="display: none;">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" onclick="closeErrorModal()"></div>
        
        <!-- Modal container -->
        <div class="fixed inset-0 flex items-center justify-center px-4 py-4 pointer-events-none">
            <!-- Modal panel -->
            <div class="relative bg-white rounded-2xl text-left shadow-2xl transform transition-all w-full max-w-md z-50 pointer-events-auto">
                <!-- Header -->
                <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 py-5 flex items-center justify-between rounded-t-2xl">
                    <h3 class="text-lg font-bold text-white">Error</h3>
                    <button onclick="closeErrorModal()" class="text-white hover:text-red-200 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Content -->
                <div class="px-6 py-8 text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Oops!</h3>
                    <p class="text-gray-700 mb-6" id="error-text">Something went wrong. Please try again.</p>
                    <button onclick="closeErrorModal()" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function closeSuccessModal() {
            const modal = document.getElementById('success-modal');
            if (modal) {
                modal.classList.add('hidden');
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }
        }

        function closeErrorModal() {
            const modal = document.getElementById('error-modal');
            if (modal) {
                modal.classList.add('hidden');
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }
        }

        function showSuccessModal(message) {
            const modal = document.getElementById('success-modal');
            const successText = document.getElementById('success-text');
            if (modal && successText) {
                successText.textContent = message || 'Your consultation request has been submitted successfully. We\'ll get back to you soon!';
                modal.classList.remove('hidden');
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
                
                // Auto close and refresh after 3 seconds
                setTimeout(function() {
                    closeSuccessModal();
                    window.location.reload();
                }, 3000);
            }
        }

        function showErrorModal(message) {
            const modal = document.getElementById('error-modal');
            const errorText = document.getElementById('error-text');
            if (modal && errorText) {
                errorText.textContent = message || 'Something went wrong. Please try again.';
                modal.classList.remove('hidden');
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            
            if (!form) {
                console.error('Contact form not found');
                return;
            }
            
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const submitLoading = document.getElementById('submit-loading');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Disable submit button and show loading
                if (submitBtn) {
                    submitBtn.disabled = true;
                }
                if (submitText) submitText.classList.add('hidden');
                if (submitLoading) submitLoading.classList.remove('hidden');
                
                // Get form data
                const formData = new FormData(form);
                
                // Get CSRF token
                const csrfToken = document.querySelector('input[name="_token"]')?.value;
                if (csrfToken) {
                    formData.append('_token', csrfToken);
                }
                
                // Submit via AJAX
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === true) {
                        // Reset form
                        form.reset();
                        
                        // Show success modal popup
                        showSuccessModal(data.message || 'Your consultation request has been submitted successfully. We\'ll get back to you soon!');
                    } else {
                        // Show error modal popup
                        showErrorModal(data.message || 'Something went wrong. Please try again.');
                        
                        // Re-enable submit button
                        if (submitBtn) submitBtn.disabled = false;
                        if (submitText) submitText.classList.remove('hidden');
                        if (submitLoading) submitLoading.classList.add('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Show error modal popup
                    showErrorModal('Something went wrong. Please try again.');
                    
                    // Re-enable submit button
                    if (submitBtn) submitBtn.disabled = false;
                    if (submitText) submitText.classList.remove('hidden');
                    if (submitLoading) submitLoading.classList.add('hidden');
                });
                
                return false;
            });
        });
    </script>

    {{-- Office Hours --}}
    <section class="py-16 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="opacity-0 animate-fade-in-left" style="animation-fill-mode: forwards;">
                    <h2 class="text-3xl font-bold text-white mb-6">Business Hours</h2>
                    <p class="text-slate-300 mb-8">
                        Our immigration consultants are available during the following hours to assist 
                        with your questions and provide expert guidance.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            @include('frontend.icons.clock', ['class' => 'w-6 h-6 text-blue-600 flex-shrink-0 mt-1'])
                            <div>
                                <h3 class="font-semibold text-white">Canada Offices (EST)</h3>
                                <p class="text-slate-300">Monday - Saturday: 10:00 AM - 5:00 PM</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            @include('frontend.icons.clock', ['class' => 'w-6 h-6 text-blue-600 flex-shrink-0 mt-1'])
                            <div>
                                <h3 class="font-semibold text-white">Kochi Office (IST)</h3>
                                <p class="text-slate-300">Monday - Saturday: 8:00 AM - 3:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 rounded-3xl p-8 text-white opacity-0 animate-fade-in-right shadow-xl" style="animation-fill-mode: forwards;">
                    <h3 class="text-2xl font-bold mb-6">What to Expect</h3>
                    <div class="space-y-4">
                        @foreach([
                            'Free initial consultation (30 minutes)',
                            'Comprehensive assessment of your case',
                            'Personalized immigration strategy',
                            'Clear timeline and cost breakdown',
                            'Ongoing support throughout the process',
                            'Regular updates on application status'
                        ] as $item)
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-blue-300 rounded-full flex-shrink-0"></div>
                                <span class="text-blue-100">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-blue-500">
                        <p class="text-blue-100 italic">
                            "Our team is committed to providing transparent, professional service 
                            that puts your immigration goals first."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
