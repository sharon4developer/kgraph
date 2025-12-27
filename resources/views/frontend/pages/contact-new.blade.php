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
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Get in Touch with KGraph Immigration
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-3xl mx-auto mb-8">
                    Gateway to a New Life in Canada
                </p>
                <p class="text-lg text-slate-300 leading-relaxed max-w-3xl mx-auto mb-8">
                    We understand that navigating the immigration process can be complex and overwhelming. Whether you're looking to study, work, visit, or settle in Canada, the team at KGraph Immigration is here to support you every step of the way. We are committed to providing expert advice, personalized guidance, and tailored solutions to meet your unique immigration needs. With years of experience in the field, our immigration consultants are well-equipped to help you understand your options, prepare your applications, and overcome any challenges that may arise along the way. At KGraph Immigration, we pride ourselves on offering the highest level of service, ensuring that your immigration journey is as smooth and stress-free as possible. Reach out to us today for a consultation, and let us help you take the next step toward your new life in Canada.
                </p>

                <div class="max-w-5xl mx-auto mt-16">
                    <h2 class="text-3xl font-bold text-white mb-4 text-center">Our Team Identity</h2>
                    <p class="text-slate-300 text-center mb-10 max-w-2xl mx-auto">
                        Specialized expertise across all immigration pathways to make your Canadian dream a reality
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Study Permits --}}
                        <div class="bg-gradient-to-br from-slate-800 to-slate-700 rounded-2xl p-8 border border-slate-600 hover:border-blue-500 transition-all duration-300 hover:shadow-lg hover:shadow-blue-900/20 opacity-0 animate-fade-in-up" style="animation-delay: 0.1s; animation-fill-mode: forwards;">
                            <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                                @include('frontend.icons.book-open', ['class' => 'w-7 h-7 text-white'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Study Permits</h3>
                            <p class="text-slate-300 leading-relaxed">Assistance with securing study permits for international students wishing to study in Canada.</p>
                        </div>

                        {{-- Work Permits --}}
                        <div class="bg-gradient-to-br from-slate-800 to-slate-700 rounded-2xl p-8 border border-slate-600 hover:border-blue-500 transition-all duration-300 hover:shadow-lg hover:shadow-blue-900/20 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                            <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                                @include('frontend.icons.briefcase', ['class' => 'w-7 h-7 text-white'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Work Permits</h3>
                            <p class="text-slate-300 leading-relaxed">Guidance for obtaining temporary or permanent work permits for skilled workers, entrepreneurs, and other professionals.</p>
                        </div>

                        {{-- Permanent Residency --}}
                        <div class="bg-gradient-to-br from-slate-800 to-slate-700 rounded-2xl p-8 border border-slate-600 hover:border-blue-500 transition-all duration-300 hover:shadow-lg hover:shadow-blue-900/20 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s; animation-fill-mode: forwards;">
                            <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                                @include('frontend.icons.home', ['class' => 'w-7 h-7 text-white'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Permanent Residency</h3>
                            <p class="text-slate-300 leading-relaxed">Expert advice on applying for Canadian Permanent Residency through Express Entry, Provincial Nominee Programs (PNPs), and other pathways.</p>
                        </div>

                        {{-- Family Sponsorship --}}
                        <div class="bg-gradient-to-br from-slate-800 to-slate-700 rounded-2xl p-8 border border-slate-600 hover:border-blue-500 transition-all duration-300 hover:shadow-lg hover:shadow-blue-900/20 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                            <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                                @include('frontend.icons.users-group', ['class' => 'w-7 h-7 text-white'])
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Family Sponsorship</h3>
                            <p class="text-slate-300 leading-relaxed">Helping Canadian citizens and permanent residents sponsor their loved ones for reunification in Canada.</p>
                        </div>
                    </div>
                </div>

                <div class="inline-flex items-center px-6 py-3 bg-green-900 text-green-300 rounded-full font-medium mt-8">
                    ✅ Free Consultation • Quick Response • Expert Guidance
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Methods --}}
    <section class="py-20 bg-slate-800">
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
                <div class="bg-slate-700 rounded-2xl p-8 text-center hover:shadow-md transition-shadow border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: 0s; animation-fill-mode: forwards;">
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

                {{-- Email Us --}}
                <div class="bg-slate-700 rounded-2xl p-8 text-center hover:shadow-md transition-shadow border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
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

                {{-- Free Consultation --}}
                <div class="bg-slate-700 rounded-2xl p-8 text-center hover:shadow-md transition-shadow border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
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

    {{-- Book Your Free Consultation Section --}}
    <section class="py-20 bg-slate-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Book Your Free Consultation</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    Get personalized guidance from our immigration experts
                </p>
            </div>
            <div class="bg-slate-700 rounded-2xl p-8 border border-slate-600">
                <form action="{{ route('submit-contact-form') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2 font-semibold">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="John">
                        </div>
                        <div>
                            <label class="block text-white mb-2 font-semibold">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Doe">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2 font-semibold">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="john.doe@example.com">
                        </div>
                        <div>
                            <label class="block text-white mb-2 font-semibold">Phone Number <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="+1 (555) 123-4567">
                        </div>
                    </div>
                    <div>
                        <label class="block text-white mb-2 font-semibold">Service of Interest <span class="text-red-500">*</span></label>
                        <select name="service_of_interest" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                                <input type="radio" name="preferred_contact_method" value="email" checked class="w-5 h-5 text-blue-600 bg-slate-800 border-2 border-slate-500 focus:ring-blue-500 focus:ring-2 focus:ring-offset-0 cursor-pointer">
                                <span class="ml-3 text-white font-medium">Email</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="preferred_contact_method" value="phone" class="w-5 h-5 text-blue-600 bg-slate-800 border-2 border-slate-500 focus:ring-blue-500 focus:ring-2 focus:ring-offset-0 cursor-pointer">
                                <span class="ml-3 text-white font-medium">Phone</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-white mb-2 font-semibold">Message <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tell us about your immigration goals and any specific questions you have..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="w-full px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors shadow-lg hover:shadow-xl">
                            Book Free Consultation
                        </button>
                        <p class="mt-4 text-sm text-slate-400">
                            We'll respond within 24 hours. For urgent matters, call <a href="tel:+14169897788" class="text-blue-400 hover:text-blue-300 underline">+1 416 989 7788</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Office Hours --}}
    <section class="py-20 bg-slate-800">
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
                                <p class="text-slate-300">Monday - Friday: 9:00 AM - 6:00 PM</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            @include('frontend.icons.clock', ['class' => 'w-6 h-6 text-blue-600 flex-shrink-0 mt-1'])
                            <div>
                                <h3 class="font-semibold text-white">Kochi Office (IST)</h3>
                                <p class="text-slate-300">Monday - Saturday: 9:00 AM - 6:00 PM</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            @include('frontend.icons.clock', ['class' => 'w-6 h-6 text-blue-600 flex-shrink-0 mt-1'])
                            <div>
                                <h3 class="font-semibold text-white">Emergency Support</h3>
                                <p class="text-slate-300">24/7 for urgent immigration matters</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 p-6 bg-slate-700 rounded-2xl border border-slate-600">
                        <h3 class="font-semibold text-blue-400 mb-2">Emergency Contact</h3>
                        <p class="text-slate-300">
                            For urgent immigration matters requiring immediate attention, 
                            please call our emergency line: 
                            <a href="tel:+14169897788" class="font-medium hover:underline ml-1 text-blue-400">
                                +1 416 989 7788
                            </a>
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-3xl p-8 text-white opacity-0 animate-fade-in-right" style="animation-fill-mode: forwards;">
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

    {{-- Office Locations --}}
    @if($locations->count() > 0)
    @php
        // Business hours mapping based on location
        $businessHours = [
            'Toronto' => 'Monday - Friday: 9:00 AM - 6:00 PM',
            'Kitchener' => 'Monday - Friday: 9:00 AM - 5:30 PM',
            'Mississauga' => 'Monday - Friday: 9:00 AM - 6:00 PM',
            'Kochi' => 'Monday - Saturday: 9:00 AM - 6:00 PM',
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
    <section class="py-20 bg-slate-900">
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
                        $hours = $businessHours[$locationName] ?? 'Monday - Friday: 9:00 AM - 6:00 PM';
                        $mapUrl = getMapUrl($locationName, $location->address ?? '', $mapUrls);
                    @endphp
                    <div class="bg-slate-800 rounded-2xl p-5 border border-slate-700 opacity-0 animate-fade-in-up flex flex-col" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
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

    {{-- FAQ Preview --}}
    <section class="py-20 bg-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Quick Questions?
                </h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    Find answers to common questions or contact us for personalized guidance.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach([
                    [
                        'question' => 'How much does a consultation cost?',
                        'answer' => 'Your initial 30-minute consultation is completely free with no obligation.'
                    ],
                    [
                        'question' => 'How quickly can you respond to my inquiry?',
                        'answer' => 'We typically respond to emails within 24 hours and answer calls during business hours.'
                    ],
                    [
                        'question' => 'Do you offer virtual consultations?',
                        'answer' => 'Yes, we offer video consultations for clients who cannot visit our offices in person.'
                    ],
                    [
                        'question' => 'What documents should I prepare?',
                        'answer' => 'We\'ll provide a personalized checklist during your consultation based on your specific case.'
                    ]
                ] as $index => $faq)
                    <div class="bg-slate-700 rounded-2xl p-6 border border-slate-600 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                        <h3 class="font-semibold text-white mb-3">{{ $faq['question'] }}</h3>
                        <p class="text-slate-300">{{ $faq['answer'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
