@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
@endphp
<style>
    .resource-content-body {
        color: #1f2937;
        font-size: 18px;
        line-height: 1.8;
    }

    .resource-content-body p {
        margin-bottom: 20px;
        color: #374151;
    }

    .resource-content-body h1,
    .resource-content-body h2,
    .resource-content-body h3,
    .resource-content-body h4,
    .resource-content-body h5,
    .resource-content-body h6 {
        color: #062358;
        font-weight: bold;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .resource-content-body h1 { font-size: 34px; }
    .resource-content-body h2 { font-size: 30px; }
    .resource-content-body h3 { font-size: 24px; }
    .resource-content-body h4 { font-size: 20px; }
    .resource-content-body h5 { font-size: 18px; }
    .resource-content-body h6 { font-size: 16px; }

    .resource-content-body ul,
    .resource-content-body ol {
        margin: 20px 0;
        padding-left: 40px;
        color: #374151;
    }

    .resource-content-body ul li,
    .resource-content-body ol li {
        margin-bottom: 10px;
        color: #374151;
    }

    .resource-content-body img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 20px 0;
    }

    .resource-content-body a {
        color: #2563eb;
        text-decoration: underline;
    }

    .resource-content-body table {
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        display: block;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        max-width: 100%;
        width: max-content;
        min-width: 100%;
    }

    .resource-content-body table th,
    .resource-content-body table td {
        border: 1px solid #e5e7eb;
        padding: 12px;
        text-align: left;
        color: #374151;
    }

    .resource-content-body table th {
        background-color: #f3f4f6;
        font-weight: bold;
        color: #062358;
    }

    .resource-content-body table tr:nth-child(even) {
        background-color: #f9fafb;
    }
</style>

<div class="min-h-screen bg-slate-50">
    {{-- Hero --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <nav class="mb-6" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-2 text-sm">
                    <li><a href="{{ url('/') }}" class="text-blue-300 hover:text-white transition-colors">Home</a></li>
                    <li><span class="text-slate-500">/</span></li>
                    <li><a href="{{ url('resources') }}" class="text-blue-300 hover:text-white transition-colors">Resources</a></li>
                    <li><span class="text-slate-500">/</span></li>
                    <li><span class="text-slate-300 line-clamp-1">{{ $resource->title }}</span></li>
                </ol>
            </nav>

            @if($resource->Category)
                <span class="inline-block px-4 py-1 bg-blue-600 text-white text-sm font-semibold rounded-full mb-4">
                    {{ $resource->Category->name }}
                </span>
            @endif

            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">{{ $resource->title }}</h1>

            <div class="flex items-center gap-2 text-slate-400 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>
                    @php
                        $date = trim($resource->date . ' ' . $resource->time);
                        echo $date ? date('M j, Y', strtotime($date)) : '';
                    @endphp
                </span>
            </div>
        </div>
    </section>

    {{-- Body --}}
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Featured Image --}}
            <div class="rounded-2xl overflow-hidden shadow-lg mb-10 -mt-20 relative z-10 bg-white">
                <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $resource->image }}"
                     class="w-full h-auto object-cover" alt="{{ $resource->alt_tag ?? $resource->title }}">
            </div>

            {{-- Content --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-10">
                <div class="resource-content-body">{!! $resource->description !!}</div>
            </div>

            {{-- Back link --}}
            <div class="mt-10">
                <a href="{{ url('resources') }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Back to Resources
                </a>
            </div>
        </div>
    </section>

    {{-- Related Resources --}}
    @if(isset($relatedResources) && $relatedResources->count() > 0)
    <section class="py-16 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl md:text-3xl font-bold mb-8" style="color: #0f172a;">Related Resources</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($relatedResources as $related)
                    <article class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-slate-200 group flex flex-col">
                        <a href="{{ url('resource-details/'.$related->slug) }}" class="block">
                            <div class="relative overflow-hidden bg-slate-200 aspect-video">
                                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                     src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $related->image }}"
                                     alt="{{ $related->alt_tag ?? $related->title }}">
                            </div>
                        </a>
                        <div class="p-6 flex flex-col flex-1">
                            <a href="{{ url('resource-details/'.$related->slug) }}">
                                <h3 class="text-lg font-bold mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors" style="color: #0f172a;">
                                    {{ $related->title }}
                                </h3>
                            </a>
                            <a href="{{ url('resource-details/'.$related->slug) }}" class="mt-auto inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-700 transition-colors">
                                <span>Read More</span>
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @include('frontend.Common.getintouch')
</div>
@endsection
