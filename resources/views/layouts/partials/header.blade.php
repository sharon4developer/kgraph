<header 
    x-data="{ 
        isMenuOpen: false,
        isScrolled: false,
        init() {
            window.addEventListener('scroll', () => {
                this.isScrolled = window.scrollY > 20;
            });
        }
    }"
    @scroll.window="isScrolled = window.scrollY > 20"
    :class="isScrolled ? 'bg-blue-950/95 backdrop-blur-sm shadow-lg border-b border-blue-800' : 'bg-blue-950/80 backdrop-blur-sm'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    style="animation: slideDown 0.5s ease-out;"
>
    <style>
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
            }
            to {
                transform: translateY(0);
            }
        }
    </style>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4 gap-4">
            {{-- Logo --}}
            <a 
                href="{{ url('/') }}" 
                class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg p-1 flex-shrink-0"
                aria-label="KGraph Immigration Consultancy"
            >
                <img 
                    src="{{ asset('assets/KgraphLogo.png') }}" 
                    alt="KGraph Immigration Logo" 
                    class="w-10 h-10 rounded-xl object-contain"
                />
                <div class="flex flex-col">
                    <span class="text-2xl font-bold text-white leading-tight tracking-wide">
                        KGRAPH
                    </span>
                    <span class="text-xs text-gray-300 leading-tight">
                        IMMIGRATION CONSULTANCY INC.
                    </span>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:flex items-center space-x-8 flex-1 justify-center" role="navigation">
                <a
                    href="{{ url('/') }}"
                    class="font-medium transition-colors duration-200 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg px-3 py-2 whitespace-nowrap active:brightness-125 button-glow {{ request()->is('/') ? 'text-blue-200' : 'text-blue-300 hover:text-white' }}"
                >
                    Home
                </a>
                <a
                    href="{{ url('services') }}"
                    class="font-medium transition-colors duration-200 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg px-3 py-2 whitespace-nowrap active:brightness-125 button-glow {{ request()->is('services*') ? 'text-blue-200' : 'text-blue-300 hover:text-white' }}"
                >
                    Services
                </a>
                <a
                    href="{{ url('about-us') }}"
                    class="font-medium transition-colors duration-200 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg px-3 py-2 whitespace-nowrap active:brightness-125 button-glow {{ request()->is('about-us*') ? 'text-blue-200' : 'text-blue-300 hover:text-white' }}"
                >
                    About
                </a>
                <a
                    href="{{ url('careers') }}"
                    class="font-medium transition-colors duration-200 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg px-3 py-2 whitespace-nowrap active:brightness-125 button-glow {{ request()->is('careers*') ? 'text-blue-200' : 'text-blue-300 hover:text-white' }}"
                >
                    Careers
                </a>
                <a
                    href="{{ url('contact-us') }}"
                    class="font-medium transition-colors duration-200 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg px-3 py-2 whitespace-nowrap active:brightness-125 button-glow {{ request()->is('contact-us*') ? 'text-blue-200' : 'text-blue-300 hover:text-white' }}"
                >
                    Contact
                </a>
            </nav>

            {{-- CTA Button & Mobile Menu Button --}}
            <div class="flex items-center gap-4 flex-shrink-0">
                {{-- Book Free Consultation Button --}}
                <a
                    href="{{ url('contact-us') }}"
                    class="hidden lg:inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-medium rounded-2xl transition-all duration-200 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:brightness-125 active:scale-95 hover:scale-102 active:shadow-lg button-glow whitespace-nowrap"
                >
                    Book Free Consultation
                </a>

                {{-- Mobile Menu Button --}}
                <button
                    @click="isMenuOpen = !isMenuOpen"
                    class="lg:hidden p-2 rounded-lg text-blue-300 hover:text-white hover:bg-blue-800 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 active:brightness-125 active:scale-95 button-glow"
                    :aria-expanded="isMenuOpen"
                    aria-label="Toggle navigation menu"
                >
                    <svg x-show="!isMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="isMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Navigation --}}
        <div 
            x-show="isMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 height-0"
            x-transition:enter-end="opacity-100 height-auto"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 height-auto"
            x-transition:leave-end="opacity-0 height-0"
            class="lg:hidden border-t border-blue-800 bg-blue-950 overflow-hidden"
            style="display: none;"
        >
            <nav class="py-4 space-y-2" role="navigation">
                <a
                    href="{{ url('/') }}"
                    @click="isMenuOpen = false"
                    class="block px-4 py-3 rounded-lg font-medium transition-colors duration-200 hover:bg-blue-800 active:brightness-125 button-glow {{ request()->is('/') ? 'text-blue-200 bg-blue-800' : 'text-blue-300 hover:text-white' }}"
                >
                    Home
                </a>
                <a
                    href="{{ url('services') }}"
                    @click="isMenuOpen = false"
                    class="block px-4 py-3 rounded-lg font-medium transition-colors duration-200 hover:bg-blue-800 active:brightness-125 button-glow {{ request()->is('services*') ? 'text-blue-200 bg-blue-800' : 'text-blue-300 hover:text-white' }}"
                >
                    Services
                </a>
                <a
                    href="{{ url('about-us') }}"
                    @click="isMenuOpen = false"
                    class="block px-4 py-3 rounded-lg font-medium transition-colors duration-200 hover:bg-blue-800 active:brightness-125 button-glow {{ request()->is('about-us*') ? 'text-blue-200 bg-blue-800' : 'text-blue-300 hover:text-white' }}"
                >
                    About
                </a>
                <a
                    href="{{ url('careers') }}"
                    @click="isMenuOpen = false"
                    class="block px-4 py-3 rounded-lg font-medium transition-colors duration-200 hover:bg-blue-800 active:brightness-125 button-glow {{ request()->is('careers*') ? 'text-blue-200 bg-blue-800' : 'text-blue-300 hover:text-white' }}"
                >
                    Careers
                </a>
                <a
                    href="{{ url('contact-us') }}"
                    @click="isMenuOpen = false"
                    class="block px-4 py-3 rounded-lg font-medium transition-colors duration-200 hover:bg-blue-800 active:brightness-125 button-glow {{ request()->is('contact-us*') ? 'text-blue-200 bg-blue-800' : 'text-blue-300 hover:text-white' }}"
                >
                    Contact
                </a>
                <a
                    href="{{ url('contact-us') }}"
                    @click="isMenuOpen = false"
                    class="block px-4 py-3 rounded-lg font-medium transition-colors duration-200 bg-blue-600 text-white hover:bg-blue-700 active:brightness-125 button-glow text-center mt-4"
                >
                    Book Free Consultation
                </a>
            </nav>
        </div>
    </div>
</header>

