@extends('layouts.main')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('quill/ql-front.css') }}">
    <style>
        .blog-detail{
            background-color: #062358;
        }
        .blog-detail {
            /* background-color: #f9f9f9; */
            padding: 40px 0;
            font-family: 'Times New Roman', serif;
        }

        .blog__content h1 {
            font-size: 34px;
            font-weight: bold;
            color: #ffffff;
        }

        .blog-content h2 {
            font-size: 30px;
            font-weight: bold;
            color: #ffffff;
        }
        .blog-content h3 {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
        }
        .blog-content h4 {
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
        }
        .blog-content h5 {
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
        }
        .blog-content h5 {
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
        }
        .blog-content h6 {
            font-size: 14px;
            font-weight: bold;
            color: #ffffff;
        }

        .blog-content p {
            font-size: 18px;
            color: #ffffff;
            line-height: 1.8;
            margin-bottom: 20px;
        }


        .blog__content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .blog__content .date {
            color: #ffffff;
            font-size: 14px;
        }

        .blog__content .meta-info {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .blog__content .container {
            max-width: 960px;
            margin: 0 auto;
        }

        .blog-content {
            margin-top: 20px;
        }

        .blog-content p {
            margin-bottom: 20px;
        }

        .blog-content h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .blog-detail img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* TinyMCE Content Styling */
        .blog-content-body {
            color: #1f2937;
            font-size: 18px;
            line-height: 1.8;
        }

        .blog-content-body p {
            margin-bottom: 20px;
            color: #374151;
        }

        .blog-content-body h1,
        .blog-content-body h2,
        .blog-content-body h3,
        .blog-content-body h4,
        .blog-content-body h5,
        .blog-content-body h6 {
            color: #062358;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .blog-content-body h1 { font-size: 34px; }
        .blog-content-body h2 { font-size: 30px; }
        .blog-content-body h3 { font-size: 24px; }
        .blog-content-body h4 { font-size: 20px; }
        .blog-content-body h5 { font-size: 18px; }
        .blog-content-body h6 { font-size: 16px; }

        .blog-content-body ul,
        .blog-content-body ol {
            margin: 20px 0;
            padding-left: 40px;
            color: #374151;
        }

        .blog-content-body ul li,
        .blog-content-body ol li {
            margin-bottom: 10px;
            color: #374151;
        }

        .blog-content-body table {
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            /* Mobile responsive: scrollable table */
            display: block;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            max-width: 100%;
            width: max-content;
            min-width: 100%;
        }

        .blog-content-body table th,
        .blog-content-body table td {
            border: 1px solid #e5e7eb;
            padding: 12px;
            text-align: left;
            color: #374151;
        }

        .blog-content-body table th {
            background-color: #f3f4f6;
            font-weight: bold;
            color: #062358;
        }

        .blog-content-body table tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .blog-content-body table tr:hover {
            background-color: #f3f4f6;
        }

        .blog-content-body img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 20px 0;
        }

        .blog-content-body a {
            color: #2563eb;
            text-decoration: underline;
        }

        .blog-content-body a:hover {
            color: #1d4ed8;
        }

        .blog-content-body blockquote {
            border-left: 4px solid #2563eb;
            padding-left: 20px;
            margin: 20px 0;
            font-style: italic;
            color: #4b5563;
            background-color: #f9fafb;
            padding: 15px 20px;
            border-radius: 4px;
        }

        .blog-content-body code {
            background-color: #f3f4f6;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            color: #dc2626;
            border: 1px solid #e5e7eb;
        }

        .blog-content-body pre {
            background-color: #1f2937;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 20px 0;
            border: 1px solid #e5e7eb;
        }

        .blog-content-body pre code {
            background-color: transparent;
            padding: 0;
            color: #f3f4f6;
            border: none;
        }

        .blog-content-body strong,
        .blog-content-body b {
            font-weight: bold;
            color: #1f2937;
        }

        .blog-content-body em,
        .blog-content-body i {
            font-style: italic;
        }

        .blog-content-body hr {
            border: none;
            border-top: 2px solid #e5e7eb;
            margin: 30px 0;
        }
    </style>

    @include('frontend.Common.whatsapplogo')

    <div class="blog-detail overflow-hidden relative">
        <div class="container mx-auto px-5 lg:px-32 2xl:px-48 mt-[5%] relative z-10">
            {{-- Breadcrumb --}}
            <nav class="mb-8 pt-5" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ url('/') }}" class="text-blue-400 hover:text-blue-300 transition-colors">
                            Home
                        </a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li>
                        <a href="{{ url('blogs') }}" class="text-blue-400 hover:text-blue-300 transition-colors">
                            Blogs
                        </a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li>
                        <span class="text-white font-medium">{{ $blog->title }}</span>
                    </li>
                </ol>
            </nav>
            
            <div class="pt-5 blog__content">

                <!-- Dynamic Main Image -->
                <div class="pb-10 z-20 relative">
                    <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $blog->image }}"
                    class="w-full h-full object-cover rounded-sm" alt="{{ $blog->alt_tag }}">
                </div>

                <img class="absolute left-[-30%] top-[30%]" src="{{asset('assets/Group.png')}}" alt="">

                <div class="flex flex-col z-20 relative">
                    <!-- Dynamic Blog Title -->
                    <h1 class="text-6xl font-bold pb-3">{{ $blog->title }}</h1>

                    <!-- Dynamic Meta Information (Date) -->
                    <div class="">
                        <?php $date = $blog->date . ' ' . $blog->time; ?>
                        <span class="date">{{ date('M j, Y h:i:s A', strtotime($date)) }}</span>
                    </div>
                </div>

                <!-- Dynamic Blog Content (Heading and Paragraphs) -->
                <div class="blog-content z-20 relative">
                    <!-- Dynamic Section Heading -->
                    {{-- <h2 class="text-2xl font-bold mt-8">{{ $blog->name }}</h2> --}}

                    <!-- Dynamic Section Content -->
                    <div class="blog-content-body mt-4 bg-white rounded-lg p-8 shadow-lg">{!! $blog->description !!}</div>
                </div>

                <!-- Footer Section or Additional Links -->
                {{-- <div class="flex justify-end items-center pt-8 pb-2">
                    <a class="capitalize text-[#062358] underline font-bold font_inter text-lg" href="">Share</a>
                </div> --}}
            </div>
        </div>
        <img class="absolute right-[-35%] bottom-[-25%]" src="{{asset('assets/Group.png')}}" alt="">
    </div>
@endsection
