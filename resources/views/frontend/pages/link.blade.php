@extends('layouts.main')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/ql-front.css') }}">
    <style>



    </style>
    <link rel="shortcut icon" href="{{ asset('admin/theme/assets/images/favicon.ico') }}">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('admin/theme/assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    {{-- <link href="{{ asset('admin/theme/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
    <!-- Icons Css -->
    <link href="{{ asset('admin/theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    {{-- <link href="{{ asset('admin/theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('common/theme/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('common/theme/css/common.css') }}" rel="stylesheet" type="text/css" />
    @include('frontend.Common.whatsapplogo')

    {{-- services banner --}}
    <div class="relative servicesIIner-banner h-full">
        <!-- Background Image -->
        <img src="{{ asset('frontend/images/inner-banner.jpg') }}" alt="Background Image"
            class="absolute inset-0 w-full h-full object-cover z-0">

        <div class="services-banner-overlay relative z-10 bg-black bg-opacity-50 h-full">
            <!-- Overlay for better contrast -->
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                <div class="text-white text-[12px] font_inter font-semibold flex items-center gap-2">
                    {{-- <a href="{{ url('services') }}">
                        Services</a> >
                    <a class="cursor-pointer block text-ellipsis whitespace-nowrap overflow-hidden w-[150px]">
                        cuurent page
                    </a> --}}
                </div>
                <div class="text-center text-white my-10 flex flex-col justify-center items-center">
                    <h1 class="uppercase font_inter font-semibold text-3xl lg:text-[40px]">
                        @if (isset($data))
                            {!! $data->title !!}
                        @endif
                    </h1>
                    {{-- <p class="lg:w-1/2 mt-5 font_inter font-semibold text-sm lg:text-[18px]">
                        Banner Description
                    </p> --}}
                </div>
                <div class="flex justify-center items-center">
                    <div
                        class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group">
                        <div
                            class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                        </div>
                        <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Let's turn your vision into reality.
                        </h6>
                        <div
                            class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                            <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- services section --}}
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
        <div class="px-5 mx-auto md:px-28">
            <h2 class="text-3xl font-bold text-center md:text-4xl lg:text-5xl">
                @if (isset($data))
                    {!! $data->title !!}
                @endif
            </h2><br>

            <div class="relative items-start text-base pt-7 lg:pt-10 lg:text-lg textarea_content cm-editercontent">
                @if (isset($data))
                    {!! $data->description !!}
                @endif
            </div>
        </div>
    </div>

    {{-- @include('frontend.Common.getintouch') --}}
@endsection
