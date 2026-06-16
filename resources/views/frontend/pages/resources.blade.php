@extends('layouts.main')

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Self-contained colors: the page body is text-white and some Tailwind
       slate shades are not present in the compiled CSS, so define them here
       (this style block loads after Tailwind, travels with the view, and
       needs no build step). */
    .resource-card article h2 { color: #0f172a; }
    .resource-card article:hover h2 { color: #2563eb; }
    .resource-card .res-excerpt { color: #475569; }

    .res-pill { background: #f1f5f9; color: #334155; }
    .res-pill:hover { background: #e2e8f0; }
    .res-pill.is-active { background: #2563eb; color: #ffffff; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
</style>
@endpush

@section('content')
@php
    $locationData = getLocationData();
@endphp

<div class="min-h-screen bg-slate-50">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <div class="text-sm text-slate-400 mb-4">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-slate-300">Resources</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                    @if(isset($resourceContents) && $resourceContents) {{ $resourceContents->resource_title }} @else Our Resources @endif
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-4xl mx-auto">
                    @if(isset($resourceContents) && $resourceContents) {{ $resourceContents->resource_description }} @else Explore our guides, insights, and expert resources to help you navigate your Canadian immigration journey with confidence. @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Category Filter --}}
    @if(isset($categories) && $categories->count() > 0)
    <section class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center gap-3 overflow-x-auto scrollbar-hide pb-1">
                <a href="{{ url('resources') }}"
                   class="res-pill flex-shrink-0 px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 {{ empty($activeCategory) ? 'is-active' : '' }}">
                    All
                </a>
                @foreach ($categories as $category)
                    <a href="{{ url('resources') }}?category={{ $category->slug }}"
                       class="res-pill flex-shrink-0 px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 {{ $activeCategory == $category->slug ? 'is-active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Resources Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($resources) && $resources->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 resource-card">
                    @foreach ($resources as $index => $data)
                        <article class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-slate-200 group opacity-0 animate-fade-in-up flex flex-col"
                                 style="animation-delay: {{ ($index % 3) * 0.1 }}s; animation-fill-mode: forwards;">
                            <a href="{{ url('resource-details/'.$data->slug) }}" class="block">
                                {{-- Image --}}
                                <div class="relative overflow-hidden bg-slate-200 aspect-video">
                                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                         src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"
                                         alt="{{ $data->alt_tag ?? $data->title }}">
                                    @if($data->Category)
                                        <span class="absolute top-4 left-4 px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full">
                                            {{ $data->Category->name }}
                                        </span>
                                    @endif
                                </div>
                            </a>

                            {{-- Content --}}
                            <div class="p-6 flex flex-col flex-1">
                                {{-- Date --}}
                                <div class="flex items-center space-x-2 mb-3 text-sm text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>
                                        @php
                                            $date = trim($data->date . ' ' . $data->time);
                                            echo $date ? date('M j, Y', strtotime($date)) : '';
                                        @endphp
                                    </span>
                                </div>

                                {{-- Title --}}
                                <a href="{{ url('resource-details/'.$data->slug) }}">
                                    <h2 class="text-xl font-bold mb-3 line-clamp-2 transition-colors">
                                        {{ $data->title }}
                                    </h2>
                                </a>

                                {{-- Excerpt --}}
                                <div class="res-excerpt text-sm leading-relaxed mb-4 line-clamp-3">
                                    @if(!empty($data->excerpt))
                                        {{ $data->excerpt }}
                                    @elseif(!empty($data->description))
                                        {!! strip_tags($data->description) !!}
                                    @endif
                                </div>

                                {{-- Read More --}}
                                <a href="{{ url('resource-details/'.$data->slug) }}" class="mt-auto inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-700 transition-colors">
                                    <span>Read More</span>
                                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-20">
                    <svg class="w-24 h-24 mx-auto text-slate-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="text-2xl font-bold mb-2" style="color: #0f172a;">No Resources Available</h3>
                    <p style="color: #475569;">Check back soon for the latest guides and insights.</p>
                </div>
            @endif
        </div>
    </section>

    @include('frontend.Common.getintouch')
</div>

@endsection
