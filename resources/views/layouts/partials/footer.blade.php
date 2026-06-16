@php
use App\Models\Location;
use App\Models\whatsApp;
$locations = Location::select('address', 'id', 'location', 'email', 'phone', 'image')
    ->orderBy('order', 'asc')
    ->where('status', 1)
    ->get();
$socialLinks = whatsApp::first();
@endphp

<footer class="bg-blue-950 text-white border-t border-blue-800" role="contentinfo" x-data="{ expandedOffice: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Brand --}}
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <img 
                        src="{{ asset('assets/KgraphLogo.png') }}" 
                        alt="KGraph Immigration Logo" 
                        class="w-10 h-10 rounded-xl object-contain"
                    />
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold leading-tight tracking-wide">KGRAPH</span>
                        <span class="text-xs text-blue-300 leading-tight">IMMIGRATION CONSULTANCY INC.</span>
                    </div>
                </div>
                <p class="text-blue-200 leading-relaxed">
                    Your trusted partner for Canadian immigration. We help individuals and families achieve their Canadian dream with personalized guidance and expert knowledge.
                </p>
                <div class="flex space-x-4">
                    <a 
                        href="{{ isset($socialLinks) && $socialLinks->facebook ? $socialLinks->facebook : 'https://www.facebook.com/KGraphimmigration/' }}" 
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded"
                        aria-label="Follow us on Facebook"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a 
                        href="{{ isset($socialLinks) && $socialLinks->twitter ? $socialLinks->twitter : 'https://twitter.com/kgraphca' }}" 
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded"
                        aria-label="Follow us on Twitter"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a 
                        href="{{ isset($socialLinks) && $socialLinks->linkedin ? $socialLinks->linkedin : 'https://ca.linkedin.com/company/kgraph' }}" 
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded"
                        aria-label="Connect with us on LinkedIn"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a 
                        href="{{ isset($socialLinks) && $socialLinks->instagram ? $socialLinks->instagram : 'https://www.instagram.com/kgraph_immigration' }}" 
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded"
                        aria-label="Follow us on Instagram"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <nav class="space-y-2">
                    <a href="{{ url('services') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Services
                    </a>
                    <a href="{{ url('study') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Study in Canada
                    </a>
                    <a href="{{ url('about-us') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        About Us
                    </a>
                    <a href="{{ url('careers') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Careers
                    </a>
                    <a href="{{ url('blogs') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Blogs
                    </a>
                    <a href="{{ url('resources') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Resources
                    </a>
                    <a href="{{ url('contact-us') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Contact
                    </a>
                </nav>
            </div>

            {{-- Services --}}
            <div>
                <h3 class="text-lg font-semibold mb-4">Immigration Services</h3>
                <nav class="space-y-2">
                    <a href="{{ url('services') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Express Entry
                    </a>
                    <a href="{{ url('services') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Provincial Nominee Program
                    </a>
                    <a href="{{ url('services') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Study Permits
                    </a>
                    <a href="{{ url('services') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Work Permits
                    </a>
                    <a href="{{ url('services') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Atlantic Immigration Program
                    </a>
                    <a href="{{ url('services') }}" class="block text-blue-300 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1">
                        Refusals & Appeals
                    </a>
                </nav>
            </div>

            {{-- Office Locations --}}
            <div>
                <h3 class="text-lg font-semibold mb-4">Our Locations</h3>
                <div class="space-y-4">
                    @foreach($locations as $office)
                        <div class="space-y-1">
                            {{-- Mobile: Collapsible --}}
                            <div class="md:hidden">
                                <button
                                    @click="expandedOffice = expandedOffice === '{{ $office->id }}' ? null : '{{ $office->id }}'"
                                    class="w-full flex items-center justify-between text-left"
                                >
                                    <span class="font-medium">{{ $office->location }}</span>
                                    <svg x-show="expandedOffice === '{{ $office->id }}'" class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                    </svg>
                                    <svg x-show="expandedOffice !== '{{ $office->id }}'" class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div 
                                    x-show="expandedOffice === '{{ $office->id }}'"
                                    x-transition
                                    class="mt-2 space-y-2 pl-2"
                                    style="display: none;"
                                >
                                    <div class="flex items-start space-x-2">
                                        <svg class="w-4 h-4 mt-1 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <p class="text-sm text-blue-300">{{ $office->address }}</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <a
                                            href="tel:{{ $office->phone }}"
                                            class="text-sm text-blue-300 hover:text-white transition-colors"
                                        >
                                            {{ $office->phone }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- Desktop: Always visible --}}
                            <div class="hidden md:block">
                                <div class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 mt-1 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <div>
                                        <p class="font-medium">{{ $office->location }}</p>
                                        <p class="text-sm text-blue-300">{{ $office->address }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 ml-6">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <a
                                        href="tel:{{ $office->phone }}"
                                        class="text-sm text-blue-300 hover:text-white transition-colors"
                                    >
                                        {{ $office->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-blue-800 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-6">
                    <p class="text-blue-300 text-sm">
                        © {{ date('Y') }} KGraph Immigration Consultancy. All rights reserved.
                    </p>
                </div>
                <div class="flex items-center space-x-6 text-sm text-blue-300">
                    <a 
                        href="{{ url('privacy-policy') }}" 
                        class="hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1"
                    >
                        Privacy Policy
                    </a>
                    <a 
                        href="{{ url('terms-and-conditions') }}" 
                        class="hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded px-1 py-1"
                    >
                        Terms of Service
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

