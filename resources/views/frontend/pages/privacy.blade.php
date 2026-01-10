@extends('layouts.main')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('quill/ql-front.css') }}">
<style>
    .cm-editercontent {
        color: #334155;
        line-height: 1.8;
    }
    
    .cm-editercontent h1,
    .cm-editercontent h2,
    .cm-editercontent h3,
    .cm-editercontent h4 {
        color: #0f172a;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    
    .cm-editercontent p {
        margin-bottom: 1.25rem;
        color: #475569;
    }
    
    .cm-editercontent ul,
    .cm-editercontent ol {
        margin-bottom: 1.25rem;
        padding-left: 1.5rem;
        color: #475569;
    }
    
    .cm-editercontent li {
        margin-bottom: 0.5rem;
    }
    
    .cm-editercontent a {
        color: #2563eb;
        text-decoration: underline;
    }
    
    .cm-editercontent a:hover {
        color: #1d4ed8;
    }
    
    .cm-editercontent strong {
        color: #0f172a;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-slate-50">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <div class="text-sm text-slate-400 mb-4">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a> 
                    <span class="mx-2">/</span>
                    <span class="text-slate-300">Privacy Policy</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                    Privacy Policy
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-4xl mx-auto">
                    Your privacy is important to us. Learn how we collect, use, and protect your personal information.
                </p>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-8 md:p-12">
                <div class="textarea_content cm-editercontent prose prose-slate max-w-none">
                    @if(isset($data)) 
                        {!! $data->description !!} 
                    @else
                        <p>Privacy policy content will be displayed here.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @include('frontend.Common.getintouch')
</div>
@endsection
