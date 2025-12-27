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
    
    // Extract features from ServicePoint (admin-managed only)
    $features = [];
    $totalFeatures = 0;
    if (isset($service->ServicePoint) && $service->ServicePoint->count() > 0) {
        $allFeatures = $service->ServicePoint->pluck('title')->toArray();
        $totalFeatures = count($allFeatures);
        $features = array_slice($allFeatures, 0, 3);
    }
    
    // Processing time - check if available in service data
    $processingTime = $service->processing_time ?? null;
@endphp

<div class="group opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
    <div class="bg-blue-900 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-blue-800 h-full overflow-hidden flex flex-col">
        <div class="p-5 flex-1">
            <div class="flex items-center space-x-3 mb-3">
                <div class="w-10 h-10 bg-blue-800 rounded-xl flex items-center justify-center group-hover:bg-blue-700 transition-all duration-300 flex-shrink-0">
                    @if($selectedIcon === 'map-pin')
                        @include('frontend.icons.map-pin', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'trending-up')
                        @include('frontend.icons.trending-up', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'globe')
                        @include('frontend.icons.globe', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'book-open')
                        @include('frontend.icons.book-open', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'briefcase')
                        @include('frontend.icons.briefcase', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'clock')
                        @include('frontend.icons.clock', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'shield')
                        @include('frontend.icons.shield', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'award')
                        @include('frontend.icons.award', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'users')
                        @include('frontend.icons.users', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'check-circle')
                        @include('frontend.icons.check-circle', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @elseif($selectedIcon === 'users-group')
                        @include('frontend.icons.users-group', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @else
                        @include('frontend.icons.map-pin', ['class' => 'w-5 h-5 text-blue-300 group-hover:text-white'])
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-semibold text-white group-hover:text-blue-200 transition-colors line-clamp-2">
                        {{ $service->title ?? 'Service' }}
                    </h3>
                    @if($processingTime)
                        <p class="text-xs text-blue-300 font-medium mt-1">
                            Processing: {{ $processingTime }}
                        </p>
                    @endif
                </div>
            </div>
            
            <p class="text-sm text-blue-200 mb-3 leading-relaxed line-clamp-2">
                {{ $service->description ?? $service->sub_title ?? '' }}
            </p>
            
            @if(count($features) > 0)
                <div class="space-y-2">
                    <div>
                        <h4 class="text-xs font-medium text-white mb-1.5">Key Features:</h4>
                        <ul class="space-y-1">
                            @foreach($features as $feature)
                                <li class="text-xs text-blue-200 flex items-center">
                                    <span class="w-1 h-1 bg-blue-400 rounded-full mr-1.5 flex-shrink-0"></span>
                                    <span class="line-clamp-1">{{ $feature }}</span>
                                </li>
                            @endforeach
                            @if($totalFeatures > 3)
                                <li class="text-xs text-blue-300 font-medium">
                                    +{{ $totalFeatures - 3 }} more features
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="px-5 pb-5 pt-3 border-t border-blue-800">
            <a
                href="{{ $serviceUrl }}"
                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-800 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 group button-glow active:brightness-125 active:scale-95 hover:scale-102 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Learn More
                @include('frontend.icons.arrow-right', ['class' => 'w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform'])
            </a>
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
