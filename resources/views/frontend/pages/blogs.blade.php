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
    
    /* Ensure text is visible in blog cards */
    .blog-card article,
    .blog-card article * {
        color: inherit !important;
    }
    
    .blog-card .text-slate-600 {
        color: #475569 !important;
    }
    
    .blog-card .text-slate-900 {
        color: #0f172a !important;
    }
    
    .blog-card .text-blue-600 {
        color: #2563eb !important;
    }
    
    /* Ensure description text is visible */
    .blog-card div[class*="line-clamp"] {
        color: #475569 !important;
    }
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
                    <span class="text-slate-300">Blogs</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                    @if(isset($blogContents)) {{ $blogContents->blog_title }} @else Blogs @endif
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-4xl mx-auto">
                    @if(isset($blogContents)) {{ $blogContents->blog_description }} @else Stay updated with the latest immigration news, tips, and insights from our expert consultants. @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Blogs Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($blogs) && $blogs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 blog-card">
                    @foreach ($blogs as $index => $data)
                        <article class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-slate-200 group opacity-0 animate-fade-in-up" 
                                 style="animation-delay: {{ ($index % 3) * 0.1 }}s; animation-fill-mode: forwards;">
                            <a href="{{ url('blog-details/'.$data->slug) }}" class="block">
                                {{-- Image --}}
                                <div class="relative overflow-hidden bg-slate-200 aspect-video">
                                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                         src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" 
                                         alt="{{ $data->alt_tag ?? $data->topics }}">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>

                                {{-- Content --}}
                                <div class="p-6">
                                    {{-- Meta Information --}}
                                    <div class="flex items-center justify-between mb-4 text-sm" style="color: #475569 !important;">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #475569 !important;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span style="color: #475569 !important;">
                                                @php 
                                                    $date = $data->date . ' ' . $data->time;
                                                    echo date('M j, Y', strtotime($date));
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #475569 !important;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span style="color: #475569 !important;">By {{ $data->name }}</span>
                                        </div>
                                    </div>

                                    {{-- Title --}}
                                    <h2 class="text-xl font-bold mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors" style="color: #0f172a !important;">
                                        {{ $data->topics }}
                                    </h2>

                                    {{-- Description --}}
                                    <div class="text-sm leading-relaxed mb-4 line-clamp-3" style="color: #475569 !important;">
                                        @if(!empty($data->description))
                                            {!! strip_tags($data->description) !!}
                                        @else
                                            <span style="color: #475569 !important;">Read more about this topic...</span>
                                        @endif
                                    </div>

                                    {{-- Read More Link --}}
                                    <div class="flex items-center text-blue-600 font-semibold text-sm group-hover:text-blue-700 transition-colors">
                                        <span>Read More</span>
                                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-20">
                    <svg class="w-24 h-24 mx-auto text-slate-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">No Blogs Available</h3>
                    <p class="text-slate-600">Check back soon for the latest immigration news and insights.</p>
                </div>
            @endif
        </div>
    </section>

    @include('frontend.Common.getintouch')
</div>

@endsection
