@props(['testimonial', 'index' => 0])

@php
    $rating = $testimonial->rating ?? 5;
    $name = $testimonial->name ?? 'Client';
    $country = $testimonial->place ?? '';
    $program = $testimonial->occupation ?? $testimonial->title ?? '';
    $quote = $testimonial->description ?? '';
@endphp

<div class="bg-blue-900 rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-blue-800 opacity-0 animate-fade-in-scale flex flex-col" style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
    <div class="flex items-start space-x-4 mb-4 flex-1" x-data="{ expanded: false }">
        @include('frontend.icons.quote', ['class' => 'w-8 h-8 text-blue-400 flex-shrink-0 opacity-60 mt-1'])
        <div class="flex-1 min-w-0">
            <div class="flex items-center space-x-1 mb-2">
                @for($i = 0; $i < $rating; $i++)
                    @include('frontend.icons.star', ['class' => 'w-4 h-4 text-yellow-400'])
                @endfor
                <span class="ml-2 text-sm text-blue-200">4.9/5 Rating</span>
            </div>

            {{-- Truncated / expanded quote --}}
            <p class="text-blue-200 leading-relaxed italic transition-all duration-300"
               :class="expanded ? '' : 'line-clamp-4'">
                "{{ $quote }}"
            </p>

            {{-- Toggle button --}}
            <button
                @click="expanded = !expanded"
                class="mt-2 text-sm font-medium text-blue-400 hover:text-white transition-colors focus:outline-none"
                x-text="expanded ? 'Read Less ↑' : 'Read More ↓'">
            </button>
        </div>
    </div>

    <div class="border-t border-blue-800 pt-4 mt-auto">
        <div class="mb-4">
            <p class="font-semibold text-white mb-1">{{ $name }}</p>
            @if($country)
                <p class="text-sm text-blue-300">{{ $country }}</p>
            @endif
            @if($program)
                <p class="text-sm text-blue-300 font-medium">{{ $program }}</p>
            @endif
        </div>
        <a href="{{ url('contact-us') }}" class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-all duration-200 text-sm group shadow-lg active:brightness-125 active:scale-95 hover:scale-102 button-glow focus:outline-none focus:ring-2 focus:ring-blue-500">
            Start Your Journey
            @include('frontend.icons.arrow-right', ['class' => 'w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform'])
        </a>
    </div>
</div>

<style>
    @keyframes fade-in-scale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    .animate-fade-in-scale {
        animation: fade-in-scale 0.5s ease-out;
    }
    .line-clamp-4 {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
