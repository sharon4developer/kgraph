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
    </style>

    @include('frontend.Common.whatsapplogo')

    <div class="blog-detail overflow-hidden relative">
        <div class="container mx-auto px-5 lg:px-32 2xl:px-48 mt-[5%] relative z-10">
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
                    <p class="text-lg text-gray-700 mt-4 leading-[29.6px]">{!! $blog->description !!}</p>
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
