@extends('layouts.main')

@section('content')
    {{-- Load GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <style>
        .banner-container-elem {
            opacity: 0;
            transform: translateX(100%);
            scale: 0.5;
        }

        .banner-contain-text {
            opacity: 0;
            transform: translateX(20%);
            scale: 0.5;
        }

        .left-to-right-animation,
        .secleft-to-right-animation,
        .thirdleft-to-right-animation,
        .fourthleft-to-right-animation,
        .fifthleft-to-right-animation {
            opacity: 0;
            transform: translateX(-100%);
        }

        .left-to-right-width-animation,
        .secleft-to-right-width-animation,
        .thirdleft-to-right-width-animation,
        .fourthleft-to-right-width-animation,
        .fifthleft-to-right-width-animation {
            opacity: 0;
            transform: translateX(100%);
            width: 0;
        }

        @media (min-width: 1520px) {

            .left-to-right-width-animation,
            .secleft-to-right-width-animation,
            .thirdleft-to-right-width-animation,
            .fourthleft-to-right-width-animation,
            .fifthleft-to-right-width-animation {
                opacity: 0;
                transform: translateX(-100%);
                width: 0;
            }
        }

        @media (min-width: 1900px) {
            .left-aligner {
                padding-left: 15rem
            }
        }

        .slick-slider-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* This ensures it stays behind the content */
        }


        .banner-gradient-overlay {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 127%;
            /* background: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 100%); */
            /* background-color: #072f77; */
            /* background-color: #072f7796; */
            background-color: #000000ba;
            z-index: 1;
            /* Ensure the gradient is above the slider but below the content */
        }

        /* Set initial width and transition */
        .expandable-line {
            width: 5%;
            transition: width 0.5s ease-in-out;
        }

        .expandable-line {
            width: 5%;
            transition: width 0.5s ease-in-out;
        }


        /* Trigger the width change on hover */
        .knowmore:hover+.w-full .expandable-line {
            width: 100%;
        }

        .RegulatedSec-left-wrapper,
        .RegulatedSec-right-wrapper {
            position: relative;
            width: 100%;
            /* Ensure it takes full width of the parent */
            overflow: hidden;
            /* Prevent elements from moving outside */
        }

        .RegulatedSec-left,
        .RegulatedSec-right {
            position: relative;
            width: 100%;
        }

        .image-card-explore>.view-button {
            display: none;
        }

        .image-card-explore>.view-button>button {
            color: #051b3b;
            background: white;
            padding-left: 15px;
            padding-right: 15px;
            border-radius: 10px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .image-card-explore:hover>.view-button {
            display: flex;
        }

        /* .your-slider-class {
                    width: 100%;
                    display: flex;
                } */
        .your-slider-class .slick-track,
        .explore-section .slick-track {
            width: 20000px !important;
        }

        /* Additional CSS to ensure slides take full width on mobile */
        .your-slider-class .slick-slide {
            /* width: 100% !important; */
            /* box-sizing: border-box; */
            transform: translateX(144px)
        }

        .parent-card-our-serv:hover .height-fuller {
            height: 100%;
        }

        .explore-section {
            overflow-x: hidden;
            /* Prevents horizontal scroll */
        }

        .explore-section .splide__list {
            display: flex;
            justify-content: center;
        }

        .explore-section .splide__slide {
            flex: 1 0 auto;
            /* Ensures slides don't shrink */
        }
        .circle-round::after{
            content: "";
            position: absolute;
            background: white;
            width: 50px;
            height: 14px;
            top: 0;
            right: -24px;
            z-index: -1;
        }
        .mapbg{
            background-image: url(assets/home_Banner/mapforbackground.png) !important;
            background-position-x: center;
            background-position-y: 33%;
            background-size: contain;
            background-repeat: no-repeat;
        }
        @media (min-width:1024px;){
            .mapbg{
                background-image: url(assets/home_Banner/mapforbackground.png) !important;
                background-position-x: center;
                background-position-y: top;
                background-size: contain;
                background-repeat: no-repeat;
            }
        }

    </style>

    <div class="relative overflow-hidden">
        {{--old banner section --}}
        <div class="h-dvh md:h-screen lg:h-full 2xl:h-screen w-full homeBanner relative overflow-hidden">
            <!-- Gradient overlay -->
            {{-- <div class="banner-gradient-overlay absolute inset-0"></div> --}}

            <!-- Slick Slider for Background Images -->

            <div class="slick-slider-background absolute inset-0 z-[-1]">
                @foreach ($banner as $data)
                    <div><img class="w-full h-full object-cover"
                            src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"
                            alt="{{ $data->alt_tag }}"></div>
                @endforeach
            </div>

            <!-- Banner Content -->
            <div class="container mx-auto px-5 xl:px-12 h-full w-full relative z-10">
                <div
                    class="h-full w-full flex flex-col justify-start md:justify-center items-center text-center mb-4 md:pt-8 pb-0 gap-[5%] md:gap-[31px] lg:gap-0">
                    <div
                        class="z-10 flex flex-col lg:flex-row items-center lg:gap-[23px] pt-[10%] lg:pt-[22%] xl:pt-[205px] 2xl:pt-[120px] banner-container-elem">
                        <img class="pt-[22px] md:pt-0 w-[40px] lg:w-[100px]"
                            src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="rocket icon">
                        <h2
                            class="banner_text-one text-[20px] lg:text-[23px] font_inter font-medium text-white text-center capitalize">
                            Journey with Confidence <span class="text-[#579aff]">Migrate</span> with Us
                        </h2>
                    </div>
                    <h1
                        class="md:text-center text-[31px] md:text-[55px] 2xl:text-[85px] lg:text-[70px] lg:w-[80%] font-medium font_inter gradient-text z-10 lg:mt-8 banner_main-text lg:inline-block banner-contain-text leading-[1.2]">
                        Visa Made Easy Dreams Made Possible
                    </h1>
                    <h6
                        class="font_inter font-medium text-[20px] lg:text-[23px] z-20 text-white lg:mt-14 banner-container-elem">
                        Visa Made Easy Dreams Made Possible
                    </h6>
                    <div
                        class="z-10 flex flex-col md:flex-row justify-center items-start md:items-center gap-4 lg:mb-7 lg:mt-10">
                        <img width="52px" src="{{ asset('assets/home_Banner/CanadaFlag.png') }}" alt="CanadaFlag">
                        <div
                            class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-[4.5px] pl-6 pr-1 overflow-hidden group">
                            <!-- Background animation using pseudo-element -->
                            <div
                                class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                            </div>
                            <h6 class="relative z-10 text-white text-[10px] md:text-[14px] 2xl">Let's turn your vision into
                                reality.</h6>
                            <div
                                class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:py-[4px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                                <a href="" class="h-full text-[12px] lg:text-[16px] font-semibold">Connect Us</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="z-10 flex flex-wrap md:flex-nowrap justify-around items-center py-5 w-full lg:mb-0">
                    <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/segment.png') }}" alt="">
                    <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/splunk.png') }}" alt="">
                    <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/Hubspot.png') }}" alt="">
                    <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/asna.png') }}" alt="">
                    <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/airtasker.png') }}" alt="">
                </div> --}}
                    <div
                        class="lg:absolute bottom-0 right-0 w-full lg:w-fit flex justify-center lg:right-12 lg:bottom-[35%] z-10">
                        <div
                            class="flex lg:flex-col items-center gap-[30px] border border-white py-2 lg:py-4 px-6 lg:px-2 rounded-full mb-3 lg:mb-0">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125"
                                src="{{ asset('assets/facebookban.png') }}" alt="facebook">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125"
                                src="{{ asset('assets/instagramban.png') }}" alt="instagram">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125"
                                src="{{ asset('assets/linkedinban.png') }}" alt="linkedin">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125"
                                src="{{ asset('assets/youtubeban.png') }}" alt="youtube">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('frontend.Common.modal-contact') --}}
    </div>
    @include('frontend.Common.whatsapplogo')
    <div class="bg-[#051b3b]">
        {{-- our service section --}}
        <div class="serviceSection relative overflow-hidden z-10 bg-[#051b3b]">
            <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full pt-10 lg:pt0">
                <div class="md:flex items-center">
                    <h2
                        class="left-to-right-animation font_inter font-semibold text-[46px] md:text-[50px] lg:text-[65px] 2xl:text-[100px] text-white leading-none uppercase gradient-text">
                        <span class="inline-block">
                            @if (isset($home))
                                {{ $home->service_first_title }}
                            @endif
                        </span><span class="inline-block">
                            @if (isset($home))
                                {{ $home->service_second_title }}
                            @endif
                        </span>
                    </h2>
                    <div class="md:pl-2 lg:pl-10 w-full lg:mb-[-8%] 2xl:mb-[-10%]">
                        <div class="my-4 lg:mt-[16px] flex justify-start md:justify-end items-center">
                            <div
                                class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[4.5px] pl-5 pr-1 lg:mt-[-76px] overflow-hidden group">
                                <div
                                    class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                                </div>
                                <h6 class="relative z-10 text-white text-[10px] md:text-[12px] 2xl:text-[16px]">Let's turn
                                    your vision into reality.</h6>
                                <div
                                    class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[4px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                                    <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full left-to-right-width-animation" style="border: 1px solid #FFFFFF8C;"></div>
                    </div>
                </div>
                <h4
                    class="text-white font_inter font-semibold text-[22px] xl:text-[36px] py-4 lg:pb-0 left-to-right-animation capitalize mt-6">
                    @if (isset($home))
                        {{ $home->service_sub_title }}
                    @endif
                </h4>
                <p
                    class="text-white font_inter font-extralight text-justify text-[14px] xl:text-[16px] left-to-right-animation">
                    @if (isset($home))
                        {{ $home->service_description }}
                    @endif
                </p>
                <div class="grid gap-5 my-16 lg:mt-16 lg:mb-0 w-full lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1">
                    @foreach ($serviceCategory as $data)
                        <div class="relative overflow-hidden">
                            <div class="flex items-center gap-[10px] p-[20px] bg-white rounded-t-xl rounded-br-xl">
                                <img class="w-[35px] 2xl:w-[55px]" src="{{ asset('assets/home_Banner/box-one.png') }}" alt="">
                                <h2 class="text-[18px] 2xl:text-[22px] text-[#062358] font_inter font-bold w-1/2 clamp-text-two ">
                                    {{ $data->title }}
                                </h2>
                            </div>

                            <div class="flex justify-between">
                                <div class="bg-white rounded-b-xl w-full lg:w-[30%] xl:w-[42%] 2xl:w-full text-white 2xl:h-full relative circle-round">
                                    <button class="rounded-full px-5 py-0 my-0 2xl:py-2 2xl:my-2 mx-2 border border-white text-white flex items-center gap-[10px] w-fit invisible">
                                        Apply Now
                                        <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.7266 5.37891L10.2266 8.87891C9.89844 9.23438 9.32422 9.23438 8.99609 8.87891C8.64062 8.55078 8.64062 7.97656 8.99609 7.64844L10.9922 5.625H0.875C0.382812 5.625 0 5.24219 0 4.75C0 4.23047 0.382812 3.875 0.875 3.875H10.9922L8.99609 1.87891C8.64062 1.55078 8.64062 0.976562 8.99609 0.648438C9.32422 0.292969 9.89844 0.292969 10.2266 0.648438L13.7266 4.14844C14.082 4.47656 14.082 5.05078 13.7266 5.37891Z" fill="white"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="bg-[#051b3b] rounded-tl-xl w-full overflow-hidden">
                                    <button class="rounded-full px-5 py-2 my-2 mx-2 border border-white text-white flex items-center gap-[10px] w-fit">
                                        Apply Now
                                        <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.7266 5.37891L10.2266 8.87891C9.89844 9.23438 9.32422 9.23438 8.99609 8.87891C8.64062 8.55078 8.64062 7.97656 8.99609 7.64844L10.9922 5.625H0.875C0.382812 5.625 0 5.24219 0 4.75C0 4.23047 0.382812 3.875 0.875 3.875H10.9922L8.99609 1.87891C8.64062 1.55078 8.64062 0.976562 8.99609 0.648438C9.32422 0.292969 9.89844 0.292969 10.2266 0.648438L13.7266 4.14844C14.082 4.47656 14.082 5.05078 13.7266 5.37891Z" fill="white"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        {{-- eligibility check section --}}
        <div class="eligibilitySection relative overflow-hidden z-10 bg-[#051b3b]">
            <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full pt-10 lg:pt0">
                <div class="lg:flex items-center mapbg">
                    <div class="w-[100%]">
                        <h2 class="left-to-right-animation font_inter font-semibold text-[46px] md:text-[50px] lg:text-[53px]  text-white leading-none gradient-text">
                            <span class="inline-block">Find your</span>
                            <span class="flex items-center gap-[25px]"><span class="">Eligibility for PR</span> <span><img class="w-[85px]" src="{{ asset('assets/home_Banner/eligiblity.png') }}" alt=""></span></span>
                        </h2>
                        <p
                            class="text-white font_inter font-extralight text-justify text-[14px] xl:text-[16px] left-to-right-animation mt-4">
                            Welcome to our CRS Score Calculator tool, designed to help you determine your
                            Comprehensive Ranking System (CRS) score based on the information you provide.
                            The CRS is a pivotal points-based system utilized for evaluating and ranking
                            profiles within the Express Entry pool, a key component of Canadian immigration
                        </p>

                        <h4 class="text-white font_inter font-medium text-[22px] xl:w-[70%] py-4 lg:pb-0 left-to-right-animation capitalize mt-6">Navigate Your Canadian Immigration Journey with Confidence</h4>

                        <div class="left-to-right-animation">
                            <a href="#" class="px-6 py-2 block w-fit mt-6 border-2 border-white  text-white bg-[#0a2540] rounded-full font-bold text-sm uppercase hover:bg-white hover:text-[#0a2540] transition duration-300">
                                Free Eligibility Check
                            </a>
                        </div>

                    </div>
                    <div class="w-full flex justify-center my-24 lg:my-0"><img class="w-full lg:w-[65%] object-contain" src="{{ asset('assets/home_Banner/backgroun-eligiblity.png') }}" alt=""></div>
                </div>
            </div>
        </div>

        {{-- who are --}}
        <div class="whoSec bg-[#051b3b] my-8 lg:my-0">
            <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full">
                <div class="md:flex md:justify-between items-end ">
                    <div class="lg:w-full flex items-end">
                        <h2
                            class="font_inter font-semibold text-[46px] md:text-[50px] lg:text-[65px] 2xl:text-[100px] text-white leading-none uppercase secleft-to-right-animation flex flex-col">
                            <span class="inline-block">
                                @if (isset($home))
                                    {{ $home->who_we_are_first_title }}
                                @endif
                            </span>
                            <span class="inline-block whitespace-nowrap">
                                @if (isset($home))
                                    {{ $home->who_we_are_second_title }}
                                @endif
                            </span>
                        </h2>
                        <div class="w-full mb-4 secleft-to-right-width-animation lg:ml-10"
                            style="border: 1px solid #FFFFFF8C;"></div>
                    </div>
                    {{-- know more button animtion --}}
                    <div class="animation-section" style="">
                        <div class="flex lg:justify-end flex-col items-center pt-4 lg:pt-0">
                            <div class="flex items-center gap-7 whitespace-nowrap mb-7">
                                <div class="text-white">Meet our Firm</div>
                                <button class="flex items-center gap-4 rounded-full knowmore border border-white px-6 py-2"
                                    data-line="1">
                                    <div class="text-white">Know more</div>
                                    <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.7266 5.37891L10.2266 8.87891C9.89844 9.23438 9.32422 9.23438 8.99609 8.87891C8.64062 8.55078 8.64062 7.97656 8.99609 7.64844L10.9922 5.625H0.875C0.382812 5.625 0 5.24219 0 4.75C0 4.23047 0.382812 3.875 0.875 3.875H10.9922L8.99609 1.87891C8.64062 1.55078 8.64062 0.976562 8.99609 0.648438C9.32422 0.292969 9.89844 0.292969 10.2266 0.648438L13.7266 4.14844C14.082 4.47656 14.082 5.05078 13.7266 5.37891Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </div>
                            <div class="w-full h-[1px] mb-4 bg-[#FFFFFF8C] flex items-center">
                                <div class="w-[5%] h-[5px] bg-[#FFFFFF8C] rounded-full expandable-line" data-line="1">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <p
                    class="py-5 text-white font_inter font-medium text-[18px] xl:text-[20px] lg:w-[50%] xl:w-[60%]  secleft-to-right-animation">
                    @if (isset($home))
                        {{ $home->who_we_are_sub_title }}
                    @endif
                </p>

                <div class="flex flex-col lg:flex-row items-center justify-center gap-5">

                    <div class="flex justify-between flex-col gap-5">
                        <img src="{{ asset('assets/home_Banner/videodummy.png') }}" alt="Video Thumbnail">
                        <div class="bg-white rounded-3xl p-8 space-y-4">
                            <div class="flex items-center space-x-3">
                                <img src="{{ asset('assets/home_Banner/box-one.png') }}" alt="Icon">
                                <h5 class="text-[#051B3B] font-semibold">
                                    {{ $home->journey_title ?? '' }}
                                </h5>
                            </div>

                            <p class="font_inter text-justify font-medium text-sm text-[#052350]">
                                {{ $home->journey_description ?? '' }}
                            </p>


                            <div class="flex items-center space-x-4">
                                <div class="text-[#052350]">
                                    <h2 id="count-number" class="font_inter font-bold text-[85px] leading-none">
                                        {{ $journey->experience ?? '' }}
                                    </h2>
                                    <input type="hidden" id="exp-count" value="{{ $journey->experience ?? '' }}">
                                    <p>Years of Experience</p>
                                </div>
                                <div class="my-6 flex flex-wrap md:flex-nowrap items-start gap-5">
                                    <div>
                                        <h2 class="text-[#052350] font_inter font-bold text-[25px] leading-none">
                                            {{ $journey->employees ?? '' }}
                                        </h2>
                                        <span class="text-[#052350]">Employees</span>
                                    </div>
                                    <div>
                                        <h2 class="text-[#052350] font_inter font-bold text-[25px] leading-none">
                                            {{ $journey->ratings ?? '' }}
                                        </h2>
                                        <span class="text-[#052350]">Google Rating</span>
                                    </div>
                                    <div>
                                        <h2 class="text-[#052350] font_inter font-bold text-[25px] leading-none">
                                            {{ $journey->offices ?? '' }}
                                        </h2>
                                        <span class="text-[#052350]">Offices</span>
                                    </div>
                                    <div>
                                        <h2 class="text-[#052350] font_inter font-bold text-[25px] leading-none">
                                            {{ $journey->customers ?? '' }}
                                        </h2>
                                        <span class="text-[#052350]">Customers Served</span>
                                    </div>
                                    <div>
                                        <h2 class="text-[#052350] font_inter font-bold text-[25px] leading-none">
                                            {{ $journey->cases ?? '' }}
                                        </h2>
                                        <span class="text-[#052350]">Active Cases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between flex-col gap-5">
                        <div class="bg-black rounded-3xl p-8 text-white">
                            <h2 class="font_inter font-semibold text-2xl  xl:w-[80%]">
                                {{ $home->certificate_title ?? '' }}
                            </h2>
                            <p class="py-5 font-normal font_inter text-[12px] lg:py-10">
                                {{ $home->certificate_description ?? '' }}
                            </p>
                            <div class="flex flex-col lg:flex-row gap-5 items-center mb-8">
                                @foreach ($certificate as $data)
                                    <div class="flex items-center flex-col justify-center">
                                        <img class="w-[200px] max-h-[66px]" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="{{ $data->alt_tag ?? 'Certificate' }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <img src="{{ asset('assets/home_Banner/immigration.png') }}" alt="Immigration">
                    </div>
                </div>


            </div>
        </div>

        {{-- testimonial section --}}
        <div class="testimonial bg-[#051b3b] gradient-evition relative overflow-hidden z-10">
            <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full">
                <div class="flex items-end w-full gap-2 lg:gap-7">
                    <h2
                        class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] 2xl:text-[65px] leading-none thirdleft-to-right-animation">
                        @if (isset($home))
                            {{ $home->testimonial_title }}
                        @endif
                    </h2>
                    <div class="w-full thirdleft-to-right-width-animation"
                        style="border: 1px solid #FFFFFF8C;margin-bottom: 8px;"></div>
                </div>
                <p
                    class="py-5 text-white font_inter font-medium text-[18px] lg:text-[32px] lg:whitespace-nowrap lg:w-[30%] thirdleft-to-right-animation">
                    @if (isset($home))
                        {{ $home->testimonial_sub_title }}
                    @endif
                </p>
                <p class="text-white font_inter font-normal text-justify text-[14px] thirdleft-to-right-animation">
                    @if (isset($home))
                        {{ $home->testimonial_description }}
                    @endif
                </p>
            </div>

            <div class="testimonial-slider-wrapper pl-5 lg:pl-12 pt-9 pb-0 lg:py-[10px] z-50">
                <div id="testimonial-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($testimonials as $data)
                                <li class="splide__slide">
                                    <div class="max-w-md mx-auto p-6 bg-white rounded-xl shadow-lg border border-gray-200 relative">
                                        <!-- Top Section: Quote Icon and Rating -->
                                        <div class="flex justify-between items-start mb-4">
                                            <!-- Quote Icon -->
                                            <div class="w-[40px]">
                                                <svg width="40" height="32" viewBox="0 0 54 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M27.8723 28.0452C27.493 27.7417 27.4172 27.3624 27.5689 26.7176L34.8519 1.49248C34.9657 0.999357 35.383 0.657959 35.914 0.657959H53.0595C53.7423 0.657959 54.0078 0.96142 54.0078 1.60627V4.18567C53.9699 4.67879 53.8181 5.13399 53.5526 5.51331L34.5105 30.6246C34.2071 31.0798 33.5622 31.2315 33.0691 30.9281L27.8723 28.0452ZM1.1679 28.0452C0.788574 27.7417 0.712715 27.3624 0.864445 26.7176L8.14748 1.49248C8.26128 0.961424 8.7544 0.620028 9.28545 0.657959H26.3551C27.0378 0.657959 27.3034 0.96142 27.3034 1.60627V4.18567C27.2654 4.67879 27.1137 5.13399 26.8482 5.51331L7.88195 30.6246C7.57849 31.0798 6.93364 31.2315 6.44052 30.8901L1.1679 28.0452Z" fill="#062358"/>
                                                </svg>
                                            </div>

                                            <!-- Rating with Stars -->
                                            <div class="flex items-center text-yellow-400">
                                                <span class="text-lg font-semibold text-gray-800">{{ $data->rating }}</span>
                                                @for ($i = 1; $i <= floor($data->rating); $i++)
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 17.27l5.18 3.73-1.64-6.73 5.18-4.27H13.82L12 2 10.18 9H4.28l5.18 4.27-1.64 6.73L12 17.27z" />
                                                    </svg>
                                                @endfor
                                                @if ($data->rating - floor($data->rating) >= 0.5)
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 17.27l5.18 3.73-1.64-6.73 5.18-4.27H13.82L12 2 10.18 9H4.28l5.18 4.27-1.64 6.73L12 17.27z" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Testimonial Text -->
                                        <p class="text-[#071C3D] font-medium  text-sm leading-relaxed my-12 truncate-text">
                                            {{ $data->description }}
                                        </p>

                                        <!-- Profile Section -->
                                        <div class="flex items-center mt-6">
                                            <!-- Profile Image -->
                                            <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"
                                                 alt="{{ $data->alt_tag }}"
                                                 class="w-12 h-12 rounded-full border-2 border-gray-200">

                                            <!-- Name and Occupation -->
                                            <div class="ml-4">
                                                <h3 class="text-[#051B3B] font-semibold">{{ $data->name }}</h3>
                                                <p class="text-white text-[14px]">{{ $data->occupation }} {{ $data->place }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full flex flex-col-reverse md:flex-row gap-4 items-center justify-between relative z-20">
                <div class="flex justify-start items-center">
                    <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group">

                        <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                        </div>
                        <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Be One of Them</h6>
                        <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                            <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                        </div>
                    </div>

                </div>

                <div class="flex justify-center gap-3 items-center">
                    <div class="card-testi-slide-prev-button cursor-pointer">
                        <img class="w-[40px]" src="{{ asset('assets/Button-Previous.png') }}" alt="">
                    </div>
                    <div class="cursor-pointer card-testi-slide-next-button">
                        <img class="w-[40px]" src="{{ asset('assets/nextbutton.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        {{-- Blog sect --}}
        <div class="BlogCRDS bg-[#051b3b]">
            <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full">
                <div class="flex items-end w-full gap-2 lg:gap-7">
                    <h2
                        class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] 2xl:text-[65px] leading-none fourthleft-to-right-animation">
                        @if (isset($home))
                            {{ $home->blog_title }}
                        @endif
                    </h2>
                    <div class="w-full fourthleft-to-right-width-animation"
                        style="border: 1px solid #FFFFFF8C;margin-bottom: 8px;"></div>
                </div>
                <p
                    class="py-5 text-white font_inter font-medium text-[18px] lg:text-[32px] lg:whitespace-nowrap lg:w-[30%] fourthleft-to-right-animation">
                    @if (isset($home))
                        {{ $home->blog_sub_title }}
                    @endif
                </p>
                <p class="text-white font_inter font-normal text-justify text-[14px] fourthleft-to-right-animation">
                    @if (isset($home))
                        {{ $home->blog_description }}
                    @endif
                </p>

                <div class="flex justify-center lg:justify-start items-center my-12">
                    <div
                        class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group">
                        <!-- Initially the background will cover the full button -->
                        <div
                            class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                        </div>
                        <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Be One of Them</h6>
                        <div
                            class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                            <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                        </div>
                    </div>
                </div>

                <div id="blogSplide" class="splide pt-[20px] md:pb-[40px]">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($blogs as $data)
                                <li class="splide__slide">
                                    <a href="{{ url('blogdetail') }}">
                                        <div
                                            class="mx-auto bg-[#051b3b] shadow-lg rounded-lg overflow-hidden mt-10 lg:h-fit w-full sm:max-w-sm h-auto">
                                            <img class="w-full object-cover h-[225px] aspect-video"
                                                src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"
                                                alt="{{ $data->alt_tag }}">
                                            <div class="p-6 border-b border-l border-r border-white rounded-lg mt-[-7px]">
                                                <?php $date = $data->date . ' ' . $data->time; ?>

                                                <div class="flex items-center justify-between">
                                                    <p class="text-white text-[10px] flex items-center gap-[8px]">
                                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.2207 2.13379H7.5957V1.19629C7.5957 0.891602 7.83008 0.633789 8.1582 0.633789C8.46289 0.633789 8.7207 0.891602 8.7207 1.19629V2.13379H9.6582C10.4785 2.13379 11.1582 2.81348 11.1582 3.63379V11.1338C11.1582 11.9775 10.4785 12.6338 9.6582 12.6338H2.1582C1.31445 12.6338 0.658203 11.9775 0.658203 11.1338V3.63379C0.658203 2.81348 1.31445 2.13379 2.1582 2.13379H3.0957V1.19629C3.0957 0.891602 3.33008 0.633789 3.6582 0.633789C3.96289 0.633789 4.2207 0.891602 4.2207 1.19629V2.13379ZM1.7832 6.44629H3.6582V5.13379H1.7832V6.44629ZM1.7832 7.57129V9.07129H3.6582V7.57129H1.7832ZM4.7832 7.57129V9.07129H7.0332V7.57129H4.7832ZM8.1582 7.57129V9.07129H10.0332V7.57129H8.1582ZM10.0332 5.13379H8.1582V6.44629H10.0332V5.13379ZM10.0332 10.1963H8.1582V11.5088H9.6582C9.8457 11.5088 10.0332 11.3447 10.0332 11.1338V10.1963ZM7.0332 10.1963H4.7832V11.5088H7.0332V10.1963ZM3.6582 10.1963H1.7832V11.1338C1.7832 11.3447 1.94727 11.5088 2.1582 11.5088H3.6582V10.1963ZM7.0332 5.13379H4.7832V6.44629H7.0332V5.13379Z" fill="white"/>
                                                        </svg>

                                                        {{ date('M j, Y h:i:s A', strtotime($date)) }}
                                                    </p>
                                                    <div class="flex items-center gap-[10px] text-white">
                                                        <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.375 7.75879C8.64844 7.75879 10.5 9.61035 10.5 11.8838C10.5 12.3057 10.1484 12.6338 9.75 12.6338H0.75C0.328125 12.6338 0 12.3057 0 11.8838C0 9.61035 1.82812 7.75879 4.125 7.75879H6.375ZM1.125 11.5088H9.35156C9.16406 10.0322 7.89844 8.88379 6.375 8.88379H4.125C2.57812 8.88379 1.3125 10.0322 1.125 11.5088ZM5.25 6.63379C3.58594 6.63379 2.25 5.29785 2.25 3.63379C2.25 1.99316 3.58594 0.633789 5.25 0.633789C6.89062 0.633789 8.25 1.99316 8.25 3.63379C8.25 5.29785 6.89062 6.63379 5.25 6.63379ZM5.25 1.75879C4.19531 1.75879 3.375 2.60254 3.375 3.63379C3.375 4.68848 4.19531 5.50879 5.25 5.50879C6.28125 5.50879 7.125 4.68848 7.125 3.63379C7.125 2.60254 6.28125 1.75879 5.25 1.75879Z" fill="white"/>
                                                        </svg>
                                                        <span class="text-white text-[10px]">By {{ $data->name }}</span>
                                                    </div>
                                                </div>

                                                <h2 class="text-[14px] font-bold text-white mt-[12px] lg:w-[60%] clamp-text-two h-[60px]">
                                                    {{ $data->topics }}</h2>
                                                <div class="text-white text-[10px] my-0 clamp-text">
                                                    {!! $data->description !!}
                                                </div>
                                                <div class="pt-[25px]">
                                                    <a href="#" class="text-[10px] font_inter flex items-center text-white gap-[10px]">
                                                        Read more
                                                        <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.0957 6.00098L10.5957 9.50098C10.2676 9.85645 9.69336 9.85645 9.36523 9.50098C9.00977 9.17285 9.00977 8.59863 9.36523 8.27051L11.3613 6.24707H1.24414C0.751953 6.24707 0.369141 5.86426 0.369141 5.37207C0.369141 4.85254 0.751953 4.49707 1.24414 4.49707H11.3613L9.36523 2.50098C9.00977 2.17285 9.00977 1.59863 9.36523 1.27051C9.69336 0.915039 10.2676 0.915039 10.5957 1.27051L14.0957 4.77051C14.4512 5.09863 14.4512 5.67285 14.0957 6.00098Z" fill="white"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                                {{-- <div class="flex items-center mt-4">
                                                    <img class="w-10 h-10 object-cover rounded-full"
                                                        src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->user_image }}"
                                                        alt="{{ $data->user_alt_tag }}">
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 font-semibold">By {{ $data->name }}</p>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-2 h-full w-full flex items-center justify-end">
                    <div class="flex justify-center gap-3 items-center">
                        <div class="blog-slider-prev cursor-pointer">
                            <img class="w-[40px]" src="{{ asset('assets/Button-Previous.png') }}" alt="">
                        </div>
                        <div class="cursor-pointer blog-slider-next">
                            <img class="w-[40px]" src="{{ asset('assets/nextbutton.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- explore section --}}
        <div class="explore-section bg-black">
            <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full">
                <div class="flex items-end w-full gap-2 lg:gap-7">
                    <h2
                        class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] 2xl:text-[65px] leading-none fifthleft-to-right-animation">
                        @if (isset($home))
                            {{ $home->explore_title }}
                        @endif
                    </h2>
                    <div class="w-full fifthleft-to-right-width-animation"
                        style="border: 1px solid #FFFFFF8C;margin-bottom: 8px;"></div>
                </div>
                <p class="text-white font_inter font-semibold text-[26px] lg:w-[35%] mt-6 fifthleft-to-right-animation">
                    @if (isset($home))
                        {{ $home->explore_sub_title }}
                    @endif
                </p>
            </div>

            <div id="exploreSplide" class="splide pb-8 md:pb-[100px] xl:pl-[50px] explore-slider-class h-[380px] z-0">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($explore as $data)
                            <li class="splide__slide">
                                <div class="!w-[90vw] xl:!w-[385px] relative image-card-explore">
                                    <img class="w-full md:w-[350px] h-full object-cover"
                                        src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"
                                        alt="{{ $data->alt_tag }}">
                                    <div
                                        class="absolute bg-gradient-to-b from-transparent to-black flex justify-center items-center w-full h-full z-10 inset-0 view-button">
                                        <button class="text-white">view</button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="container mx-auto px-5 xl:px-12 py-8 lg:pt-1 lg:pb-16  z-[99] h-full w-full">
                <div class="flex justify-end gap-3 items-center">
                    <div class="card-explore-slide-prev-button cursor-pointer">
                        <img class="w-[40px]" src="{{ asset('assets/Button-Previous.png') }}" alt="">
                    </div>
                    <div class="cursor-pointer card-explore-slide-next-button">
                        <img class="w-[40px]" src="{{ asset('assets/nextbutton.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- faq section --}}
    <div class="faq-section bg-[#F7FCFF]">
        <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full">
            <div class="flex justify-center items-center flex-col">
                <h2 class="font_aktiv font-bold text-[18px] faqSectHead text-[#07245A]">
                    @if (isset($home))
                        {{ $home->faq_title }}
                    @endif
                </h2>
                <div>
                    <h2 class="font_aktiv font-bold text-[32px] faqSectHeading text-[#07245A]">
                        @if (isset($home))
                            {{ $home->faq_sub_title }}
                        @endif
                    </h2>
                    <img class="mt-[-11px]" src="{{ asset('assets/home_Banner/underlinefaq.png') }}" alt="">
                </div>
            </div>
            <div class="mt-8 faq-parent lg:px-[10%]">
                @foreach ($faqs as $data)
                    <div class="accordion bg-white rounded-2xl h-fit p-6">
                        <div class="accordion-header flex justify-between items-center cursor-pointer">
                            <h6>{{ $data->title }}</h6>
                            <div class="icon">
                                <!-- Collapsed Icon -->
                                <svg class="icon-collapsed" width="40" height="40" viewBox="0 0 40 40"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20" r="20" fill="#E4E4E4" />
                                    <path
                                        d="M14 18C14 17.7188 14.0938 17.4688 14.2812 17.2812C14.6562 16.875 15.3125 16.875 15.6875 17.2812L20 21.5625L24.2812 17.2812C24.6562 16.875 25.3125 16.875 25.6875 17.2812C26.0938 17.6562 26.0938 18.3125 25.6875 18.6875L20.6875 23.6875C20.3125 24.0938 19.6562 24.0938 19.2812 23.6875L14.2812 18.6875C14.0938 18.5 14 18.25 14 18Z"
                                        fill="#072558" />
                                </svg>
                                <!-- Expanded Icon -->
                                <svg class="icon-expanded hidden" width="40" height="40" viewBox="0 0 40 40"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20" r="20" fill="#072558" />
                                    <path
                                        d="M26 22C26 22.2813 25.9062 22.5313 25.7188 22.7188C25.3438 23.125 24.6875 23.125 24.3125 22.7188L20 18.4375L15.7188 22.7188C15.3438 23.125 14.6875 23.125 14.3125 22.7188C13.9062 22.3438 13.9062 21.6875 14.3125 21.3125L19.3125 16.3125C19.6875 15.9063 20.3438 15.9063 20.7188 16.3125L25.7188 21.3125C25.9062 21.5 26 21.75 26 22Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                        <div class="accordion-content overflow-hidden max-h-0 transition-all duration-500 ease-out">
                            {{ $data->description }}
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="flex justify-center py-6">
                <div
                    class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group w-fit">
                    <!-- Background that moves on hover -->
                    <div
                        class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                    </div>

                    <!-- Text color that changes on hover -->
                    <h6
                        class="relative z-10 text-white text-[10px] md:text-[12px] 2xl:text-[16px] transition-colors duration-500 group-hover:text-[#072558]">
                        Let's turn your vision into reality.</h6>

                    <!-- "Connect Us" button, background changes to #072558 on hover -->
                    <div
                        class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full transition-all duration-500 group-hover:bg-[#072558] group-hover:text-white">
                        <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                    </div>
                </div>
            </div>




        </div>
    </div>

    @include('frontend.Common.getintouch')

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script>
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const iconCollapsed = this.querySelector('.icon-collapsed');
                const iconExpanded = this.querySelector('.icon-expanded');

                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    iconCollapsed.classList.remove('hidden');
                    iconExpanded.classList.add('hidden');
                } else {
                    document.querySelectorAll('.accordion-content').forEach(c => c.style.maxHeight = null);
                    document.querySelectorAll('.icon-collapsed').forEach(i => i.classList.remove('hidden'));
                    document.querySelectorAll('.icon-expanded').forEach(i => i.classList.add('hidden'));

                    content.style.maxHeight = content.scrollHeight + "px";
                    iconCollapsed.classList.add('hidden');
                    iconExpanded.classList.remove('hidden');
                }
            });
        });

        function animateCountUp(el, start, end, duration) {
            let startTime = null;

            function count(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                el.textContent = Math.floor(progress * (end - start) + start) + "+";
                if (progress < 1) {
                    requestAnimationFrame(count);
                }
            }

            requestAnimationFrame(count);
        }
        document.addEventListener('DOMContentLoaded', function() {
            const numberElement = document.getElementById('count-number');
            const sectionToObserve = document.querySelector('.Navigatesec');

            let hasCounted = false;

            var counterVal = $('#exp-count').val();

            const observer = new IntersectionObserver(function(entries) {
                if (entries[0].isIntersecting && !hasCounted) {
                    hasCounted = true;
                    animateCountUp(numberElement, 0, counterVal, 2000);
                }
            }, {
                threshold: 0.5
            });

            observer.observe(sectionToObserve);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const videos = document.querySelectorAll('video');
            const playPauseButtons = document.querySelectorAll('.custom-controls');

            // Loop through all videos
            videos.forEach((video, index) => {
                const playPauseButton = playPauseButtons[index]; // Get corresponding play/pause button

                // Play video when hovering over the video
                video.addEventListener('mouseenter', function() {
                    video.play();
                    playPauseButton.querySelector('img').src =
                        "{{ asset('assets/pause.png') }}"; // Update button to pause icon
                });

                // Pause video when mouse leaves the video
                video.addEventListener('mouseleave', function() {
                    video.pause();
                    playPauseButton.querySelector('img').src =
                        "{{ asset('assets/play.png') }}"; // Update button to play icon
                });

                // Manually toggle play/pause on button click
                playPauseButton.addEventListener('click', function() {
                    if (video.paused) {
                        video.play();
                        playPauseButton.querySelector('img').src =
                            "{{ asset('assets/pause.png') }}"; // Update to pause icon
                    } else {
                        video.pause();
                        playPauseButton.querySelector('img').src =
                            "{{ asset('assets/play.png') }}"; // Update to play icon
                    }
                });

                // Reset to play button when video ends
                video.addEventListener('ended', function() {
                    playPauseButton.querySelector('img').src = "{{ asset('assets/play.png') }}";
                });
            });
        });
        document.querySelectorAll('.knowmore').forEach(button => {
            const lineId = button.getAttribute('data-line');
            const line = document.querySelector(`.expandable-line[data-line="${lineId}"]`);

            button.addEventListener('mouseenter', () => {
                line.style.transition = 'width 0.5s ease-in-out';
                line.style.width = '100%';
            });

            button.addEventListener('mouseleave', () => {
                line.style.transition = 'width 0.5s ease-in-out';
                line.style.width = '5%';
            });
        });
    </script>

    {{-- gsap animtion --}}
    <script>
        // Register GSAP ScrollTrigger plugin
        gsap.registerPlugin(ScrollTrigger);

        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);
            gsap.to(".flag-img-contact", {
                scrollTrigger: {
                    trigger: ".contact-US-banner", // The section that triggers the animation
                    start: "top center", // When the top of the trigger hits the center of the viewport
                    toggleActions: "play none none none", // Play animation when triggered
                },
                duration: 2, // Duration of the animation
                top: "4px", // Final position of the flag (curtain falling to this point)
                opacity: 1, // Fade in the flag as it falls
                ease: "bounce.out", // Bounce effect to mimic a natural falling curtain
            });
        });

        // Animation for banner-container-elem
        gsap.to(".banner-container-elem", {
            scrollTrigger: {
                trigger: ".homeBanner",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            scale: 1,
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });
        gsap.to(".banner-contain-text", {
            scrollTrigger: {
                trigger: ".homeBanner",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            scale: 1,
            opacity: 1,
            duration: 0.5,
            ease: "power2.out"
        });

        gsap.to(".left-to-right-animation", {
            scrollTrigger: {
                trigger: ".serviceSection",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });
        gsap.to(".left-to-right-width-animation", {
            scrollTrigger: {
                trigger: ".serviceSection",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            width: "100%",
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });

        gsap.to(".secleft-to-right-animation", {
            scrollTrigger: {
                trigger: ".whoSec",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });
        gsap.to(".secleft-to-right-width-animation", {
            scrollTrigger: {
                trigger: ".whoSec",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            width: "100%",
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });

        gsap.to(".thirdleft-to-right-animation", {
            scrollTrigger: {
                trigger: ".testimonial",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });
        gsap.to(".thirdleft-to-right-width-animation", {
            scrollTrigger: {
                trigger: ".testimonial",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            width: "100%",
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });

        gsap.to(".fourthleft-to-right-animation", {
            scrollTrigger: {
                trigger: ".BlogCRDS",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });
        gsap.to(".fourthleft-to-right-width-animation", {
            scrollTrigger: {
                trigger: ".BlogCRDS",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            width: "100%",
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });
        gsap.to(".fifthleft-to-right-animation", {
            scrollTrigger: {
                trigger: ".explore-section",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });
        gsap.to(".fifthleft-to-right-width-animation", {
            scrollTrigger: {
                trigger: ".explore-section",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            x: 0,
            width: "100%",
            opacity: 1,
            duration: 2,
            ease: "power2.out"
        });

        gsap.fromTo(".video-container", {
            scale: 0.5
        }, {
            scale: 1,
            scrollTrigger: {
                trigger: ".whoSec",
                start: "top center",
                end: "bottom center",
                scrub: false,
                markers: false,
                once: true
            }
        });

        gsap.fromTo(".Navigatesec-image", {
            scale: 0.5
        }, {
            scale: 1,
            scrollTrigger: {
                trigger: ".Navigatesec",
                start: "top center",
                end: "bottom center",
                scrub: true,
                markers: false,
                once: true
            }
        });

        // Animate the left element from offscreen to its normal position
        gsap.fromTo(".RegulatedSec-left", {
            x: "-100%", // Start from offscreen (left)
            opacity: 0 // Initially invisible
        }, {
            scrollTrigger: {
                trigger: ".RegulatedSec",
                start: "top 80%", // Start animation when the section enters the viewport
                toggleActions: "play none none none"
            },
            x: 0, // Move back to the original position
            opacity: 1, // Fade in
            duration: 2,
            ease: "power2.out"
        });

        // Animate the right element from offscreen to its normal position
        gsap.fromTo(".RegulatedSec-right", {
            x: "100%", // Start from offscreen (right)
            opacity: 0 // Initially invisible
        }, {
            scrollTrigger: {
                trigger: ".RegulatedSec",
                start: "top 80%", // Start animation when the section enters the viewport
                toggleActions: "play none none none"
            },
            x: 0, // Move back to the original position
            opacity: 1, // Fade in
            duration: 2,
            ease: "power2.out"
        });
    </script>

    {{-- slick slider --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slick-slider-background').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                fade: true,
                speed: 1000,
                arrows: false,
                dots: false
            });

            $('.video-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: $('.card-whosec-slide-prev-button'),
                nextArrow: $('.card-whosec-slide-next-button'),
                infinite: true,
                fade: true,
                adaptiveHeight: true,
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('#splide', {
                type: 'loop',
                autoplay: true,
                interval: 3000,
                arrows: false,
                pagination: false,
                perPage: 4,
                gap: '16px',
                drag: true,
                snap: true,
                perMove: 1,
                breakpoints: {
                    640: { // Mobile devices
                        perPage: 1,
                    },
                    768: { // Tablets
                        perPage: 1.5,
                    },
                    1024: { // Large devices (lg)
                        perPage: 2,
                    },
                    1280: { // XL devices
                        perPage: 2.5,
                    },
                    1536: { // 2XL devices
                        perPage: 3,
                    },
                }
            }).mount();

            // Custom Previous Button
            document.querySelector('.card-home-slide-prev-button').addEventListener('click', function() {
                splide.go('<'); // Go to the previous slide
            });

            // Custom Next Button
            document.querySelector('.card-home-slide-next-button').addEventListener('click', function() {
                splide.go('>'); // Go to the next slide
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var slides = document.querySelectorAll('#blogSplide .splide__slide');

            if (slides.length > 1) {
                var splide = new Splide('#blogSplide', {
                    type: 'loop',
                    perMove: 1,
                    perPage: 3.1,
                    arrows: false,
                    pagination: false,
                    autoplay: true,
                    interval: 3000,
                    pauseOnHover: false, // Prevent autoplay from pausing on hover
                    gap: '16px',
                    breakpoints: {
                        640: {
                            perPage: 1,
                            gap: '12px'
                        },
                        768: {
                            perPage: 2.1,
                            gap: '16px'
                        },
                        1024: {
                            perPage: 2,
                            gap: '20px'
                        },
                        1280: {
                            perPage: 2.5,
                            gap: '24px'
                        },
                    }
                }).mount();

                // Custom Previous Button
                document.querySelector('.blog-slider-prev').addEventListener('click', function() {
                    splide.go('<'); // Go to the previous slide
                    splide.play(); // Ensure autoplay resumes
                });

                // Custom Next Button
                document.querySelector('.blog-slider-next').addEventListener('click', function() {
                    splide.go('>'); // Go to the next slide
                    splide.play(); // Ensure autoplay resumes
                });
            } else {
                console.log("Not enough slides to initialize the slider.");
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('#exploreSplide', {
                type: 'loop', // Loop through the slides
                perMove: 1, // Moves one slide at a time
                perPage: 3.5, // Shows one slide per page
                arrows: false, // Disable default arrows
                pagination: false, // Disable the dots (pagination)
                autoplay: false,
                interval: 3000, // Auto-slide interval
                breakpoints: {
                    640: {
                        perPage: 1
                    },
                    768: {
                        perPage: 1.9
                    },
                    1024: {
                        perPage: 2
                    },
                    1280: {
                        perPage: 3.1
                    },
                }
            }).mount();

            // Custom Previous Button
            document.querySelector('.card-explore-slide-prev-button').addEventListener('click', function() {
                splide.go('<'); // Go to the previous slide
            });

            // Custom Next Button
            document.querySelector('.card-explore-slide-next-button').addEventListener('click', function() {
                splide.go('>'); // Go to the next slide
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var slides = document.querySelectorAll('#testimonial-slider .splide__slide'); // Select all the slides

            if (slides.length > 1) { // Only initialize if there's more than 1 slide
                var splide = new Splide('#testimonial-slider', {
                    type: 'loop', // Loop through the slides
                    perMove: 1, // Moves one slide at a time
                    perPage: 2.8, // Shows 3.5 slides per page (visible slides)
                    arrows: false, // Disable default arrows
                    pagination: false, // Disable the dots (pagination)
                    autoplay: true, // Enable autoplay
                    interval: 3000, // Auto-slide interval (3 seconds)
                    breakpoints: {
                        640: {
                            perPage: 1
                        }, // 1 slide per page on small screens
                        768: {
                            perPage: 1.9
                        }, // 1.9 slides per page on medium screens
                        1024: {
                            perPage: 2
                        }, // 2 slides per page on large screens
                        1280: {
                            perPage: 2.8,
                            gap: '56px',
                        },
                        1536: {
                            gap: '100px',
                        },
                    }
                }).mount();

                // Custom Previous Button
                document.querySelector('.card-testi-slide-prev-button').addEventListener('click', function() {
                    splide.go('<'); // Go to the previous slide
                });

                // Custom Next Button
                document.querySelector('.card-testi-slide-next-button').addEventListener('click', function() {
                    splide.go('>'); // Go to the next slide
                });
            } else {
                console.log("Not enough slides to initialize the slider.");
            }
        });
    </script>
@endsection
