@props(['service', 'index' => 0])

@php
    // Icon rotation array - cycle through all available icons before reusing
    $iconRotation = [
        'map-pin',      // MapPin
        'trending-up',  // Zap/TrendingUp
        'globe',        // Anchor/Globe
        'book-open',    // GraduationCap/BookOpen
        'book-open',    // BookOpen
        'briefcase',    // Briefcase
        'users',        // Plane/Users
        'shield',       // Scale/Shield
        'clock',        // Clock
        'shield',       // Shield
        'award',        // Award
        'trending-up',  // TrendingUp
        'check-circle', // CheckCircle
        'users-group',  // UsersGroup
    ];
    
    // Use service ID or index to deterministically assign icon
    $iconIndex = ($service->id ?? $index) % count($iconRotation);
    $selectedIcon = $iconRotation[$iconIndex];
    
    $serviceSlug = $service->slug ?? '';
    $serviceUrl = $serviceSlug ? url('service-details/' . $serviceSlug) : url('contact-us');
    
    // Extract ServicePoint titles for sub-links
    $servicePoints = [];
    if (isset($service->ServicePoint) && $service->ServicePoint->count() > 0) {
        $servicePoints = $service->ServicePoint->take(4); // Limit to 4 sub-links like the old design
    }
    
    // Processing time - check if available in service data
    $processingTime = $service->processing_time ?? null;
@endphp

<div class="group opacity-0 animate-fade-in-up flex-shrink-0 w-[280px] md:w-auto" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
    <div class="bg-blue-900 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-blue-800 h-full overflow-hidden flex flex-col">
        <div class="p-6 flex-1">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    @if($selectedIcon === 'map-pin')
                        @include('frontend.icons.map-pin', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'trending-up')
                        @include('frontend.icons.trending-up', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'globe')
                        @include('frontend.icons.globe', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'book-open')
                        @include('frontend.icons.book-open', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'briefcase')
                        @include('frontend.icons.briefcase', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'clock')
                        @include('frontend.icons.clock', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'shield')
                        @include('frontend.icons.shield', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'award')
                        @include('frontend.icons.award', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'users')
                        @include('frontend.icons.users', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'check-circle')
                        @include('frontend.icons.check-circle', ['class' => 'w-8 h-8 text-blue-300'])
                    @elseif($selectedIcon === 'users-group')
                        @include('frontend.icons.users-group', ['class' => 'w-8 h-8 text-blue-300'])
                    @else
                        @include('frontend.icons.map-pin', ['class' => 'w-8 h-8 text-blue-300'])
                    @endif
                </div>
                <h3 class="text-xl font-bold text-white mb-2">{{ $service->title ?? 'Service' }}</h3>
                <p class="text-blue-200 text-sm">{{ $service->sub_title ?? ($service->description ? \Illuminate\Support\Str::limit(strip_tags($service->description), 50) : '') }}</p>
            </div>
            
            @if(count($servicePoints) > 0)
                <div class="space-y-3">
                    @foreach($servicePoints as $point)
                        <a href="{{ $serviceUrl }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                            {{ $point->title }}
                        </a>
                    @endforeach
                </div>
            @else
                {{-- Fallback: Show "Learn More" button if no service points --}}
                <div class="space-y-3">
                    <a href="{{ $serviceUrl }}" class="block w-full px-4 py-2 bg-blue-800 text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white transition-all duration-200 text-center text-sm font-medium active:brightness-125 active:scale-95 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Learn More
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.5s ease-out;
    }
</style>
