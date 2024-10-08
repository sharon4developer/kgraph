@extends('layouts.main')

@section('content')
{{-- Load GSAP --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


<style>
    .banner-container-elem {
        opacity: 0;
        transform: translateX(100%);
        scale: 0.5;
    }
    .banner-contain-text{
        opacity: 0;
        transform: translateX(20%);
        scale: 0.5;
    }
    .left-to-right-animation, .secleft-to-right-animation, .thirdleft-to-right-animation, .fourthleft-to-right-animation, .fifthleft-to-right-animation {
        opacity: 0;
        transform: translateX(-100%);
    }
    .left-to-right-width-animation, .secleft-to-right-width-animation, .thirdleft-to-right-width-animation, .fourthleft-to-right-width-animation,.fifthleft-to-right-width-animation{
        opacity: 0;
        transform: translateX(-100%);
        width: 0;
    }
    @media (min-width: 1900px){
        .left-aligner{
            padding-left: 15rem
        }
    }
    .slick-slider-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1; /* This ensures it stays behind the content */
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
        z-index: 1; /* Ensure the gradient is above the slider but below the content */
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
    .knowmore:hover + .w-full .expandable-line {
        width: 100%;
    }
    .RegulatedSec-left-wrapper, .RegulatedSec-right-wrapper {
        position: relative;
        width: 100%; /* Ensure it takes full width of the parent */
        overflow: hidden; /* Prevent elements from moving outside */
    }

    .RegulatedSec-left, .RegulatedSec-right {
    position: relative;
    width: 100%;
    }

    .image-card-explore>.view-button{
        display: none;
    }
    .image-card-explore>.view-button>button{
        color: #051b3b;
        background: white;
        padding-left: 15px;
        padding-right: 15px;
        border-radius: 10px;
        font-weight: 600;
        text-transform: capitalize;
    }
    .image-card-explore:hover>.view-button{
        display: flex;
    }
    /* .your-slider-class {
        width: 100%;
        display: flex;
    } */
    .your-slider-class .slick-track , .explore-section .slick-track{
        width: 20000px !important;
    }


</style>

{{-- banner section --}}
<div class="h-dvh md:h-screen lg:h-full w-full homeBanner relative overflow-hidden">
    <!-- Gradient overlay -->
    <div class="banner-gradient-overlay absolute inset-0"></div>

    <!-- Slick Slider for Background Images -->

    <div class="slick-slider-background absolute inset-0 z-[-1]">
        @foreach ($banner as $data)
        <div><img class="w-full h-full object-cover" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="Slide 1"></div>
        @endforeach
    </div>

    <!-- Banner Content -->
    <div class="container mx-auto px-5 xl:px-12 h-full w-full relative z-10">
        <div class="h-full w-full flex flex-col justify-start md:justify-center items-center text-center mb-4 md:pt-8 pb-0 gap-[5%] md:gap-[31px] lg:gap-0">
            <div class="z-10 flex flex-col lg:flex-row items-center lg:gap-[23px] pt-[10%] lg:pt-[22%] xl:pt-[205px] banner-container-elem">
                <img class="pt-[22px] md:pt-0 w-[40px] lg:w-[100px]" src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="rocket icon">
                <h2 class="banner_text-one text-[20px] lg:text-[23px] font_inter font-medium text-white text-center capitalize">
                    Journey with Confidence <span class="text-[#579aff]">Migrate</span> with Us
                </h2>
            </div>
            <h1 class="md:text-center text-[31px] md:text-[55px] xl:text-[85px] lg:text-[70px] lg:w-[80%] font-medium font_inter gradient-text z-10 lg:mt-8 banner_main-text lg:inline-block banner-contain-text leading-[1.2]">
                Visa Made Easy Dreams Made Possible
            </h1>
            <h6 class="font_inter font-medium text-[20px] lg:text-[23px] z-20 text-white lg:mt-14 banner-container-elem">
                Visa Made Easy Dreams Made Possible
            </h6>
            <div class="z-10 flex flex-col md:flex-row justify-center items-start md:items-center gap-4 lg:mb-7 lg:mt-10">
                <img width="52px" src="{{ asset('assets/home_Banner/CanadaFlag.png') }}" alt="CanadaFlag">
                <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-[4.5px] pl-6 pr-1 overflow-hidden group">
                    <!-- Background animation using pseudo-element -->
                    <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>
                    <h6 class="relative z-10 text-white text-[10px] md:text-[14px]">Let's turn your vision into reality.</h6>
                    <div class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:py-[4px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="" class="h-full text-[12px] lg:text-[16px] font-semibold">Connect Us</a>
                    </div>
                </div>
            </div>
            <div class="z-10 flex flex-wrap md:flex-nowrap justify-around items-center py-5 w-full lg:mb-0">
                <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/segment.png') }}" alt="">
                <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/splunk.png') }}" alt="">
                <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/Hubspot.png') }}" alt="">
                <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/asna.png') }}" alt="">
                <img class="w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/airtasker.png') }}" alt="">
            </div>
            <div class="lg:absolute bottom-0 right-0 w-full lg:w-fit flex justify-center lg:right-12 lg:bottom-[35%] z-10">
                <div class="flex lg:flex-col items-center gap-[30px] border border-white py-2 lg:py-4 px-6 lg:px-2 rounded-full mb-3 lg:mb-0">
                    <img class="w-[15px]" src="{{ asset('assets/facebookban.png') }}" alt="facebook">
                    <img class="w-[15px]" src="{{ asset('assets/instagramban.png') }}" alt="instagram">
                    <img class="w-[15px]" src="{{ asset('assets/linkedinban.png') }}" alt="linkedin">
                    <img class="w-[15px]" src="{{ asset('assets/youtubeban.png') }}" alt="youtube">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-[#051b3b]">
    {{-- our service section --}}
    <div class="serviceSection gradient-evition relative overflow-hidden z-10 bg-[#051b3b]">
        <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full pt-10 lg:pt0">
            <div class="md:flex items-center">
                <h2 class="left-to-right-animation font_inter font-semibold text-[46px] md:text-[50px] xl:text-[100px] text-white leading-none uppercase gradient-text"><span class="inline-block">Our</span><span class="inline-block">Services</span></h2>
                <div class="md:pl-2 lg:pl-10 w-full" style="margin-bottom: -6%;">
                    <div class="my-4 md:my-0 flex justify-start md:justify-end items-center">
                        <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[4.5px] pl-5 pr-1 overflow-hidden group">
                            <!-- Background animation using pseudo-element -->
                            <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>
                            <h6 class="relative z-10 text-white text-[10px] md:text-[12px] xl:text-[16px]">Let's turn your vision into reality.</h6>
                            <div class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[4px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                                <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-6 left-to-right-width-animation" style="border: 1px solid #FFFFFF8C;"></div>
                </div>
            </div>
            <h4 class="text-white font_inter font-semibold text-[22px] xl:text-[36px] py-4 lg:pb-0 left-to-right-animation capitalize mt-6">Visa Immigration for a Brighter You Future</h4>
            <p class="text-white font_inter font-extralight text-justify text-[14px] xl:text-[16px] left-to-right-animation">We enable some of the most demanding organizations to enrich customer experiences, optimize efficiencies, launch new platforms, and monetize data opportunities. We offer fully-managed and end-to-end technology, tools, talent, </p>
            <div class="gap-5 flex justify-start lg:justify-between items-center scrollbar-hidden" style="">
                @foreach ($services as $data)
                    <div class="box-grading mb-9 lg:mb-0 p-4 lg:p-6 h-[400px] lg:min-h-[360px] lg:max-h-[360px] xl:max-h-[450px] w-full md:w-[33%] lg:w-full rounded-xl cursor-pointer">
                        <h2 class="text-white font_inter text-[20px] font-bold pb-8 flex flex-col"><span class="xl:inline-block">{{ $data->title }}</span>
                           {{-- <span class="xl:inline-block">nationals</span>  --}}
                        </h2>
                        <div class="text-white font_inter font-bold text-[16px] md:text-sm py-3">Choose Your Services</div>

                        <div class="flex flex-col xl:mt-4 gap-3 knowbutton ">
                            @foreach ($data->ServicePoint as $points)
                            <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-1 py-2">
                                <div class="text-xs xl:text-sm text-white">{{ $points->title }}</div>
                                <div>
                                    <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                    </svg>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- who are --}}
    <div class="whoSec bg-[#051b3b]">
        <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full">
            <div class="md:flex md:justify-between items-end ">
                <div class="lg:w-full flex items-end">
                    <h2 class="font_inter font-semibold text-[46px] md:text-[50px] xl:text-[100px] text-white leading-none uppercase secleft-to-right-animation flex flex-col">
                        <span class="inline-block">Who</span>
                        <span class="inline-block whitespace-nowrap">We Are</span>
                    </h2>
                    <div class="w-full mb-4 secleft-to-right-width-animation" style="border: 1px solid #FFFFFF8C;"></div>
                </div>
                {{-- know more button animtion --}}
                <div class="animation-section" style="">
                    <div class="flex lg:justify-end flex-col items-center pt-4 lg:pt-0">
                        <div class="flex items-center gap-7 whitespace-nowrap mb-7">
                            <div class="text-white">Meet our Firm</div>
                            <button class="flex items-center gap-4 rounded-full knowmore border border-white px-6 py-2" data-line="1">
                                <div class="text-white">Know more</div>
                                <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.7266 5.37891L10.2266 8.87891C9.89844 9.23438 9.32422 9.23438 8.99609 8.87891C8.64062 8.55078 8.64062 7.97656 8.99609 7.64844L10.9922 5.625H0.875C0.382812 5.625 0 5.24219 0 4.75C0 4.23047 0.382812 3.875 0.875 3.875H10.9922L8.99609 1.87891C8.64062 1.55078 8.64062 0.976562 8.99609 0.648438C9.32422 0.292969 9.89844 0.292969 10.2266 0.648438L13.7266 4.14844C14.082 4.47656 14.082 5.05078 13.7266 5.37891Z" fill="white"/>
                                </svg>
                            </button>
                        </div>
                        <div class="w-full h-[1px] mb-4 bg-[#FFFFFF8C] flex items-center">
                            <div class="w-[5%] h-[5px] bg-[#FFFFFF8C] rounded-full expandable-line" data-line="1"></div>
                        </div>
                    </div>
                </div>

            </div>
            <p class="py-5 text-white font_inter font-medium text-[18px] xl:text-[36px] lg:w-[50%] xl:w-[60%]  secleft-to-right-animation">Navigate Your Canadian Immigration Journey with Confidence</p>

            <div class="video-carousel lg:mt-10">
                @foreach ($whoweare as $data)
                <div class="video-container z-99">
                    <video id="customVideo1" width="320" height="240">
                        <source src="{{ $locationData['storage_server_path'] . $locationData['storage_video_path'] . $data->file }}" type="video/mp4">
                        <source src="{{ $locationData['storage_server_path'] . $locationData['storage_video_path'] . $data->file }}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>

                    <!-- Custom Play/Pause Button -->
                    <div id="playPauseButton1" class="custom-controls">
                        <img src="{{ asset('assets/play.png') }}" alt="Play" width="50" height="50">
                    </div>
                </div>
                @endforeach
            </div>

            <div class="container mx-auto px-5 xl:px-12 py-8 lg:pt-1 lg:pb-16 h-full w-full">
                <div class="flex justify-end gap-3 items-center">
                    <div class="card-whosec-slide-next-button cursor-pointer">
                        <img class="w-[40px]" src="{{ asset('assets/Button-Previous.png') }}" alt="">
                    </div>
                    <div class="cursor-pointer card-whosec-slide-prev-button">
                        <img class="w-[40px]" src="{{ asset('assets/nextbutton.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- navigate section --}}
    <div class="Navigatesec gradient-evition relative overflow-hidden z-10 bg-[#051b3b]">
        <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full">

            <div class="md:flex justify-between items-start gap-5">
                <div class="md:w-1/2">
                    <h4 class="text-white font_inter font-semibold text-[22px] lg:text-[30px] lg:w-[75%]">Navigate Your Canadian Immigration Journey with Confidence</h4>
                    <p class="text-white font_inter font-thin text-justify text-[14px] py-4  lg:w-[75%]">We enable some of the most demanding organizations to enrich customer experiences, optimize efficiencies, launch new platforms, and monetize data opportunities. We offer fully-managed and end-to-end technology, tools, talent, </p>
                    <h2 id="count-number" class="text-white font_inter font-bold text-[85px] leading-none">@if (isset($journey))
                        {{ $journey->experience }}
                    @endif</h2>
                    <input type="hidden" id="exp-count" value=@if (isset($journey)) {{ $journey->experience }} @endif>

                    <p class="text-white">Years of Experience</p>
                    <div class="my-6 flex flex-wrap md:flex-nowrap items-start gap-5">
                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">@if (isset($journey)){{ $journey->employees }}@endif</h2>
                            <span class="text-white">Employes</span>
                        </div>

                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">@if (isset($journey)){{ $journey->ratings }}@endif</h2>
                            <span class="text-white block leading-none">Google</span>
                            <span class="text-white">Rating</span>
                        </div>

                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">@if (isset($journey)){{ $journey->offices }}@endif</h2>
                            <span class="text-white">Offices</span>
                        </div>
                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">@if (isset($journey)){{ $journey->customers }}@endif</h2>
                            <span class="text-white w-[30%] block">Customers Served</span>
                        </div>
                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">@if (isset($journey)){{ $journey->cases }}@endif</h2>
                            <span class="text-white">Active Cases</span>
                        </div>
                    </div>

                    {{-- know more button animtion --}}
                    <div class="animation-section w-fit" style="">
                        <div class="flex lg:justify-end flex-col items-start pt-4 lg:pt-0">
                            <div class="flex items-center gap-7 whitespace-nowrap mb-7">
                                <div class="text-white">Meet our Firm Again</div>
                                <button class="flex items-center gap-4 rounded-full knowmore border border-white px-6 py-2" data-line="2">
                                    <div class="text-white">Know more</div>
                                    <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.7266 5.37891L10.2266 8.87891C9.89844 9.23438 9.32422 9.23438 8.99609 8.87891C8.64062 8.55078 8.64062 7.97656 8.99609 7.64844L10.9922 5.625H0.875C0.382812 5.625 0 5.24219 0 4.75C0 4.23047 0.382812 3.875 0.875 3.875H10.9922L8.99609 1.87891C8.64062 1.55078 8.64062 0.976562 8.99609 0.648438C9.32422 0.292969 9.89844 0.292969 10.2266 0.648438L13.7266 4.14844C14.082 4.47656 14.082 5.05078 13.7266 5.37891Z" fill="white"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="w-full h-[1px] mb-4 bg-[#FFFFFF8C] flex items-center">
                                <div class="w-[5%] h-[5px] bg-[#FFFFFF8C] rounded-full expandable-line" data-line="2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Navigatesec-image grid grid-cols-2 gap-4 bg-[#0d2139] lg:w-1/2 mb-4 lg:mb-0">
                    <!-- Top Left -->
                    <div class="flex justify-center items-center rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="Immigration" class="w-full h-full object-cover" />
                    </div>

                    <!-- Right Side (Spans both rows) -->
                    <div class="row-span-2 rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/cityrectangle.png') }}" alt="Cityscape" class="w-full h-full object-cover" />
                    </div>

                    <!-- Bottom Left -->
                    <div class="flex justify-center items-center rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/suareman.png') }}" alt="Lawyer" class="w-full h-full object-cover" />
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- regulated section --}}
    <div class="RegulatedSec bg-black overflow-hidden">
        <div class="container mx-auto px-5 xl:px-12 py-6 lg:py-16 h-full w-full">
            <div class="md:flex justify-center items-start gap-5">
                <div class="RegulatedSec-left md:w-1/2">
                    <h2 class="text-white font_inter font-semibold text-2xl lg:text-3xl xl:text-4xl">Regulated Canadian Immigration Consultants (RCIC-IRB)</h2>
                    <p class="py-5 text-white font-normal font_inter text-[14px] xl:text-lg lg:py-10">Proudly regulated by and in good standing with the College of Immigration and Citizenship Consultants (CICC). Jamie Dowla, registration #: R507233</p>
                    <div class="flex flex-col lg:flex-row gap-5 items-center mb-8">
                        @foreach ($certificate as $data)
                        <div>
                            <img class="w-[200px]" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="">
                            <h6 class="font_inter font-semibold text-white text-[14px] w-[80%] text-center py-2">{{ $data->title }} {{ $data->sub_title }}</h6>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="RegulatedSec-right grid grid-cols-2 gap-4">
                    <!-- Right Side (Spans both rows) -->
                    <div class="row-span-2 rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/cityrectangle.png') }}" alt="Cityscape" class="w-[200px] xl:w-[300px] h-full object-cover" />
                    </div>
                    <!-- Top Left -->
                    <div class="flex justify-center items-center rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="Immigration" class="w-[200px] xl:w-[300px] h-full object-cover" />
                    </div>
                    <!-- Bottom Left -->
                    <div class="flex justify-center items-center rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/suareman.png') }}" alt="Lawyer" class="w-[200px] xl:w-[300px] h-full object-cover" />
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- testimonial section --}}
    <div class="testimonial bg-[#051b3b] gradient-evition relative overflow-hidden z-10">
        <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full">
            <div class="flex items-end w-full gap-2 lg:gap-7">
                <h2 class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] xl:text-[65px] leading-none thirdleft-to-right-animation">Testimonials</h2>
                <div class="w-full thirdleft-to-right-width-animation" style="border: 2px solid #FFFFFF8C;margin-bottom: 8px;"></div>
            </div>
            <p class="py-5 text-white font_inter font-medium text-[18px] lg:text-[32px] lg:whitespace-nowrap lg:w-[30%] thirdleft-to-right-animation">Let’s See what our customers want to say</p>
            <p class="text-white font_inter font-normal text-justify text-[14px] md:w-[45%] thirdleft-to-right-animation">We enable some of the most demanding organizations to enrich customer experiences, optimize efficiencies, launch new platforms, and monetize data opportunities. We offer fully-managed and end-to-end technology, tools, talent, </p>
        </div>

        <div class="testimonial-slider-wrapper pl-5 lg:pl-12 pt-9 pb-0 lg:py-[70px] z-50">
            <div class="your-slider-class">
                @foreach ($testimonials as $data)
                <div class="!flex !w-[400px] md:w-[440px] overflow-hidden mr-5 !h-[250px] bg-white rounded-xl">
                    <img src={{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="">
                    <div class="w-full py-4 px-4">
                        <div class="flex items-center justify-end">
                            <div class="font-semibold text-[#051b3b] text-xl font_inter pr-[8px]">{{$data->rating}}</div>
                            <div class="flex items-center gap-1">
                                @for($i=1;$i<=$data->rating;$i++)
                                <img class="w-[12px]" src="{{ asset('assets/Navigation/ratingstar.png') }}" alt="">
                                @endfor
                            </div>
                        </div>
                        <div>
                            <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="">
                        </div>
                        <div class="py-2 font_inter text-[#072558]">
                            <h4 class="font-extrabold">{{$data->title}}</h4>
                            <p class="text-[8px] py-2 font-semibold">{{$data->description}}</p>
                            <div>
                                <h5 class="font-bold">{{$data->name}}</h5>
                                <h6 class="text-[10px] font-semibold">{{$data->occupation}} {{$data->place}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full flex flex-col-reverse md:flex-row gap-4 items-center justify-between relative z-20">
            <div class="flex justify-start items-center">
                <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group">
                    <!-- Initially the background will cover the full button -->
                    <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>
                    <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Be One of Them</h6>
                    <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                    </div>
                </div>

            </div>

            <div class="flex justify-center gap-3 items-center">
                <div class="card-home-slide-prev-button cursor-pointer">
                    <img class="w-[40px]" src="{{ asset('assets/Button-Previous.png') }}" alt="">
                </div>
                <div class="cursor-pointer card-home-slide-next-button">
                    <img class="w-[40px]" src="{{ asset('assets/nextbutton.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    {{-- Blog sect --}}
    <div class="BlogCRDS bg-[#051b3b]">
        <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full">
            <div class="flex items-end w-full gap-2 lg:gap-7">
                <h2 class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] xl:text-[65px] leading-none fourthleft-to-right-animation">Blogs</h2>
                <div class="w-full fourthleft-to-right-width-animation" style="border: 2px solid #FFFFFF8C;margin-bottom: 8px;"></div>
            </div>
            <p class="py-5 text-white font_inter font-medium text-[18px] lg:text-[32px] lg:whitespace-nowrap lg:w-[30%] fourthleft-to-right-animation">Canadian Immigration News, Tips, and Resources</p>
            <p class="text-white font_inter font-normal text-justify text-[14px] md:w-[45%] fourthleft-to-right-animation">Stay in the loop and keep up with all our news and updates!</p>
            <div class="flex justify-start items-center my-12">
                <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group">
                    <!-- Initially the background will cover the full button -->
                    <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>
                    <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Be One of Them</h6>
                    <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                    </div>
                </div>

            </div>

            <div class="pt-[20px] md:pb-[70px] gap-6 w-full blog-slider-class" style="">


                @foreach ($blogs as $data)
                <div class="bg-white w-[350px] mr-5">
                    <img class="h-[200px] w-full object-cover" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="blog_image"/>
                    <div class="py-4 px-6">
                        <div class="flex items-center gap-4">
                            <img class="w-[50px] lg:w-[70px] h-[50px] lg:h-[70px]" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->user_image }}" alt="profile_image"/>
                            <div>
                                <h6 class="font_inter font-semibold text-16px text-[#072558] xl:text-[22px]">{{ $data->name }}</h6>
                                <?php $date = $data->date . ' ' . $data->time; ?>
                                <p class="text-[#072558] font_inter font-medium text-[14px] xl:text-[16px]">by {{ $data->name }}, on  {{ $data->name }}, on {{ date('M j, Y h:i:s A', strtotime($date)) }}</p>
                                <p class="text-[#072558] font_inter font-medium text-[14px] xl:text-[16px]">Topics: {{ $data->topics }}</p>
                            </div>
                        </div>
                        <h5 class="text-[#072558] font_inter font-bold text-[14px] xl:text-[20px] py-5 xl:pb-[15px] xl:pt-[42px]">{{ $data->title }}</h5>
                        <p class="text-[#072558] font_inter font-normal text-justify text-[14px] lg:text-[16px] xl:text-[20px]"> {{ $data->description }}</p>
                        <div class="flex justify-end items-center pt-8 pb-2">
                            <a class="capitalize text-[#062358] underline font-bold font_inter text-lg" href="">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full flex items-center justify-end">
                <div class="flex justify-center gap-3 items-center">
                    <div class="card-blog-slide-prev-button cursor-pointer">
                        <img class="w-[40px]" src="{{ asset('assets/Button-Previous.png') }}" alt="">
                    </div>
                    <div class="cursor-pointer card-blog-slide-next-button">
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
                <h2 class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] xl:text-[65px] leading-none fifthleft-to-right-animation">Explore</h2>
                <div class="w-full fifthleft-to-right-width-animation" style="border: 2px solid #FFFFFF8C;margin-bottom: 8px;"></div>
            </div>
            <p class="text-white font_inter font-semibold text-[26px] lg:w-[35%] mt-6 fifthleft-to-right-animation">Learn About All of the Great ThingsCanada Has to Offer!</p>
        </div>

        <div class="pb-8 md:pb-[100px] xl:pl-[50px] explore-slider-class h-[380px] z-0">
            @foreach ($explore as $data)
            <div class="my-0 mx-4 !w-[300px] xl:!w-[380px] md:mx-4 lg:mx-8 relative image-card-explore">
                <img class="w-[300px] md:w-[380px]" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="">
                <div class="absolute bg-gradient-to-b from-transparent to-black flex justify-center items-center w-full h-full z-10 inset-0 view-button">
                    <button class="text-white">view</button>
                </div>
            </div>
            @endforeach
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
            <h2 class="font_aktiv font-bold text-[18px] faqSectHead text-[#07245A]">Have Any Questions?</h2>
            <div>
                <h2 class="font_aktiv font-bold text-[32px] faqSectHeading text-[#07245A]">FAQs ?</h2>
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
                        <svg class="icon-collapsed" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="20" fill="#E4E4E4" />
                            <path d="M14 18C14 17.7188 14.0938 17.4688 14.2812 17.2812C14.6562 16.875 15.3125 16.875 15.6875 17.2812L20 21.5625L24.2812 17.2812C24.6562 16.875 25.3125 16.875 25.6875 17.2812C26.0938 17.6562 26.0938 18.3125 25.6875 18.6875L20.6875 23.6875C20.3125 24.0938 19.6562 24.0938 19.2812 23.6875L14.2812 18.6875C14.0938 18.5 14 18.25 14 18Z" fill="#072558" />
                        </svg>
                        <!-- Expanded Icon -->
                        <svg class="icon-expanded hidden" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="20" fill="#072558" />
                            <path d="M26 22C26 22.2813 25.9062 22.5313 25.7188 22.7188C25.3438 23.125 24.6875 23.125 24.3125 22.7188L20 18.4375L15.7188 22.7188C15.3438 23.125 14.6875 23.125 14.3125 22.7188C13.9062 22.3438 13.9062 21.6875 14.3125 21.3125L19.3125 16.3125C19.6875 15.9063 20.3438 15.9063 20.7188 16.3125L25.7188 21.3125C25.9062 21.5 26 21.75 26 22Z" fill="white" />
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
            <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group w-fit">
                <!-- Background that moves on hover -->
                <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>

                <!-- Text color that changes on hover -->
                <h6 class="relative z-10 text-white text-[10px] md:text-[12px] xl:text-[16px] transition-colors duration-500 group-hover:text-[#072558]">Let's turn your vision into reality.</h6>

                <!-- "Connect Us" button, background changes to #072558 on hover -->
                <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full transition-all duration-500 group-hover:bg-[#072558] group-hover:text-white">
                    <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                </div>
            </div>
        </div>




    </div>
</div>

{{-- get in touch section --}}
<div class="get-in-Touch bg-[#051b3b] py-28">
    <div class="container mx-auto px-5xlg:px-12 h-full w-full">
        <div class="flex justify-center items-center flex-col ">
            <div class="flex flex-col-reverse md:flex-row items-center">
                <h2 class="font_inter font-semibold text-4xl text-center md:text-left gettouch uppercase gradient-text">Get IN TOUCH WITH US</h2>
                <img class="w-[70px]" src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="">
            </div>
            <p class="text-white py-6 paddadjuster md:w-3/5 lg:w-1/2 text-center font_inter font-semibold lg:text-[22px] gettouchpara">Labaton Keller Sucharow is elevating excellence through innovation, client service, and teamwork.</p>
            <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group">
                <!-- Initially the background will cover the full button -->
                <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>
                <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Have any doubt</h6>
                <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                    <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                </div>
            </div>

        </div>
    </div>
</div>

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

        playPauseButtons.forEach((button, index) => {
            const video = videos[index]; // Corresponding video for the button

            button.addEventListener('click', function() {
                if (video.paused) {
                    video.play();
                    button.innerHTML =
                        '<img src="{{ asset('assets/pause.png') }}" alt="Pause" width="50" height="50">';
                } else {
                    video.pause();
                    button.innerHTML =
                        '<img src="{{ asset('assets/play.png') }}" alt="Play" width="50" height="50">';
                }
            });

            // Automatically update play/pause button when the video ends
            video.addEventListener('ended', function() {
                button.innerHTML =
                    '<img src="{{ asset('assets/play.png') }}" alt="Play" width="50" height="50">';
            });
        });
    });

    // playPauseButton.addEventListener('click', function () {
    //     if (video.paused) {
    //     video.play();
    //     playPauseButton.innerHTML = '⏸️'; // Change to pause icon
    //     } else {
    //     video.pause();
    //     playPauseButton.innerHTML = '▶️'; // Change to play icon
    //     }
    // });

    // // Optional: Automatically update play/pause button when video ends
    // video.addEventListener('ended', function () {
    //     playPauseButton.innerHTML = '▶️'; // Reset to play icon when video ends
    // });

    // Select the knowmore button and expandable line

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
        $('.your-slider-class').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            pauseOnHover: false,
            pauseOnFocus: false,
            prevArrow: $('.card-home-slide-prev-button'),
            nextArrow: $('.card-home-slide-next-button'),
            responsive: [{
                    breakpoint: 1200, // Extra large devices
                    settings: {
                        slidesToShow: 3.5,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992, // Desktop view
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768, // Tablet view
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576, // Mobile view (Updated)
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });

        $('.blog-slider-class').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            pauseOnHover: false,
            pauseOnFocus: false,
            prevArrow: $('.card-blog-slide-prev-button'),
            nextArrow: $('.card-blog-slide-next-button'),
            responsive: [{
                    breakpoint: 1200, // extra large devices
                    settings: {
                        slidesToShow: 3.5
                    }
                },
                {
                    breakpoint: 992, // desktop view
                    settings: {
                        slidesToShow: 2.5
                    }
                },
                {
                    breakpoint: 768, // tablet view
                    settings: {
                        slidesToShow: 1.5
                    }
                },
                {
                    breakpoint: 576, // mobile view
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.explore-slider-class').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            pauseOnHover: false,
            pauseOnFocus: false,
            prevArrow: $('.card-explore-slide-prev-button'),
            nextArrow: $('.card-explore-slide-next-button'),
            responsive: [{
                    breakpoint: 1200, // extra large devices
                    settings: {
                        slidesToShow: 3.5
                    }
                },
                {
                    breakpoint: 992, // desktop view
                    settings: {
                        slidesToShow: 2.5
                    }
                },
                {
                    breakpoint: 768, // tablet view
                    settings: {
                        slidesToShow: 1.5
                    }
                },
                {
                    breakpoint: 576, // mobile view
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

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


@endsection
