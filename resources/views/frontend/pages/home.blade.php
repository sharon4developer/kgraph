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
    .left-to-right-animation, .secleft-to-right-animation, .thirdleft-to-right-animation, .fourthleft-to-right-animation {
        opacity: 0;
        transform: translateX(-100%);
    }
    .left-to-right-width-animation, .secleft-to-right-width-animation, .thirdleft-to-right-width-animation, .fourthleft-to-right-width-animation{
        opacity: 0;
        transform: translateX(-100%);
        width: 0;
    }
    @media (min-width: 1900px){
        .left-aligner{
            padding-left: 15rem
        }
    }
</style>
{{-- banner section --}}
<div class="h-full w-full homeBanner">
    <div class="container mx-auto px-5 lg:px-12 h-full w-full">
        <div class="h-full w-full flex flex-col justify-center items-center z-20 text-center mb-4 md:pt-8 pb-14 gap-[20px] md:gap-[31px] lg:gap-0">
            <div class="z-10 md:flex items-center  pt-[10%] lg:pt-[8%] banner-container-elem">
                <img class="pt-[22px] lg:pt-0 w-[50px] lg:w-[100px]"  src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="">
                <h2 class="banner_text-one text-[30px] lg:text-3xl font_inter font-semibold text-white text-left md:text-center">Journey with Confidence <span class="text-[#579aff]">Migrate</span> with Us</h2>
            </div>
            <h1 class="md:text-center text-[15px] lg:text-8xl font-medium font_inter gradient-text z-10 lg:mt-16 banner_main-text lg:inline-block banner-contain-text">Your Trusted Partner for Immigration.</h1>
            <h6 class="font_inter font-semibold text-[20px] md:text-3xl z-20 text-white lg:mt-20 banner-container-elem">Visa Made Easy Dreams Made Possible</h6>
            <div class="z-10 flex flex-col md:flex-row justify-center items-start md:items-center  gap-4 lg:my-7">
                <img width="52px" src="{{asset('assets/home_Banner/CanadaFlag.png')}}" alt="CanadaFlag">
                <div class="duration-200 cursor-pointer ease-linear md:bg-transparent text-blue-600 bg-blue-600 lg:hover:bg-blue-600 flex justify-center items-center rounded-full gap-5 py-[6.5px] pl-5 lg:pr-2">
                    <h6 class="text-white text-[12px] lg:text-[16px]">Let's turn your vision into reality.</h6>
                    <div class="bg-white text-blue-600 hover:bg-blue-600 hover:text-white px-[20px] py-1 lg:py-[6px] md:rounded-sm ease-in duration-500 cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="" class="h-full">Connect Us</a>
                    </div>
                </div>
            </div>
            <div class="z-10 flex flex-wrap md:flex-nowrap justify-around items-center w-full lg:mb-10">
                <img width="100px" height="28px" src="{{ asset('assets/home_Banner/segment.png') }}" alt="">
                <img width="100px" height="28px" src="{{ asset('assets/home_Banner/splunk.png') }}" alt="">
                <img width="100px" height="28px" src="{{ asset('assets/home_Banner/Hubspot.png') }}" alt="">
                <img width="100px" height="28px" src="{{ asset('assets/home_Banner/asna.png') }}" alt="">
                <img width="100px" height="28px" src="{{ asset('assets/home_Banner/airtasker.png') }}" alt="">
            </div>
            <div class="absolute bottom-0 right-0 w-full lg:w-fit flex justify-center lg:right-12 lg:bottom-[35%] z-10">
                <div class="flex md:flex-col items-center gap-[30px] border border-white py-2 lg:py-4 px-6 lg:px-2 rounded-full mb-3 md:mb-0">
                    <img class="w-[15px]" src="{{ asset('assets/facebookban.png') }}" alt="facebook">
                    <img class="w-[15px]" src="{{ asset('assets/instagramban.png') }}" alt="instagram">
                    <img class="w-[15px]" src="{{ asset('assets/linkedinban.png') }}" alt="linked">
                    <img class="w-[15px]" src="{{ asset('assets/youtubeban.png') }}" alt="youtube">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-[#051b3b]">
    {{-- our service section --}}
    <div class="serviceSection gradient-evition relative overflow-hidden z-10 bg-[#051b3b]">
        <div class="container mx-auto px-5 lg:px-12 lg:py-16 h-full w-full pt-10 lg:pt0">
            <div class="md:flex items-center">
                <h2 class="left-to-right-animation font_inter font-semibold text-[50px] lg:text-[80px] text-white leading-none uppercase"><span class="inline-block">Our</span><span class="inline-block">Services</span></h2>
                <div class="md:pl-2 w-full" style="margin-bottom: -6%;">
                    <div class="my-4 md:my-0 flex justify-end items-center">
                        <div class="commongrad rounded-full md:py-[2.5px] flex items-center">
                            <span class="px-5 text-white text-[12px]">Let's turn your vision into reality.</span>
                            <button class="bg-white px-8 py-1 text-[#0153d0] rounded-full whitespace-nowrap">Connect Us</button>
                        </div>
                    </div>
                    <div class="w-full my-6 left-to-right-width-animation" style="border: 2px solid #FFFFFF8C;"></div>
                </div>
            </div>
            <h4 class="text-white font_inter font-semibold text-[26px] py-4 lg:pb-0">Visa Immigration for a Brighter You Future</h4>
            <p class="text-white font_inter font-thin text-justify text-[14px]">We enable some of the most demanding organizations to enrich customer experiences, optimize efficiencies, launch new platforms, and monetize data opportunities. We offer fully-managed and end-to-end technology, tools, talent, </p>
            <div class="grid gap-5 scrollbar-hidden overflow-x-scroll " style="grid-template-columns: 1fr 1fr 1fr 1fr;">
                <div class="box-grading mb-9 lg:mb-0 p-4 lg:p-6 rounded-xl">
                    <h2 class="text-white font_inter text-[20px] font-bold pb-8 flex flex-col"><span class="inline-block">Foreign</span><span class="inline-block">nationals</span></h2>
                    <div class="text-white font_inter font-bold text-sm py-3">Choose Your Services</div>

                    <div class="flex flex-col gap-3 knowbutton">
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>

                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>

                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>

                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>

                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="box-grading mb-9 lg:mb-0 p-4 lg:p-6 rounded-xl">
                    <h2 class="text-white font_inter text-[20px] font-bold pb-8 flex flex-col"><span class="inline-block">Foreign</span><span class="inline-block">nationals</span></h2>
                    <div class="text-white font_inter font-bold text-sm py-3">Choose Your Services</div>

                    <div class="flex flex-col gap-3 knowbutton">
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="box-grading mb-9 lg:mb-0 p-4 lg:p-6 rounded-xl">
                    <h2 class="text-white font_inter text-[20px] font-bold pb-8 flex flex-col"><span class="inline-block">Foreign</span><span class="inline-block">nationals</span></h2>
                    <div class="text-white font_inter font-bold text-sm py-3">Choose Your Services</div>

                    <div class="flex flex-col gap-3 knowbutton">
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="hidden lg:block box-grading mb-9 lg:mb-0 p-4 lg:p-6 rounded-xl">
                    <h2 class="text-white font_inter text-[20px] font-bold pb-8 flex flex-col"><span class="inline-block">Foreign</span><span class="inline-block">nationals</span></h2>
                    <div class="text-white font_inter font-bold text-sm py-3">Choose Your Services</div>

                    <div class="flex flex-col gap-3 knowbutton">
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                        <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                            <div class="text-white">Study in Canada</div>
                            <div>
                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- who are --}}
    <div class="whoSec bg-[#051b3b]">
        <div class="container mx-auto px-5 lg:px-12 lg:py-16 h-full w-full">
            <div class="md:flex items-center">
                <h2 class="font_inter font-semibold text-[50px] lg:text-[80px] text-white leading-none uppercase secleft-to-right-animation"><span class="inline-block">Who</span><span class="inline-block whitespace-nowrap">We Are</span></h2>
                <div class="w-full" style="margin-bottom: -6%;">
                    <div class="flex lg:justify-end items-center pt-4 lg:pt-0">
                        <div class="flex items-center gap-7 whitespace-nowrap">
                            <div class="text-white">Meet our Firm</div>
                            <button class="flex items-center gap-4 rounded-full knowmore border border-white px-6 py-2">
                                <div class="text-white">Know more</div>
                                <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.7266 5.37891L10.2266 8.87891C9.89844 9.23438 9.32422 9.23438 8.99609 8.87891C8.64062 8.55078 8.64062 7.97656 8.99609 7.64844L10.9922 5.625H0.875C0.382812 5.625 0 5.24219 0 4.75C0 4.23047 0.382812 3.875 0.875 3.875H10.9922L8.99609 1.87891C8.64062 1.55078 8.64062 0.976562 8.99609 0.648438C9.32422 0.292969 9.89844 0.292969 10.2266 0.648438L13.7266 4.14844C14.082 4.47656 14.082 5.05078 13.7266 5.37891Z" fill="white"/>
                                </svg>
                            </button>
                            <div class="hidden md:block w-full my-6" style="border: 2px solid #FFFFFF8C;"></div>
                        </div>
                    </div>
                    <div class="w-full my-6 secleft-to-right-width-animation" style="border: 2px solid #FFFFFF8C;"></div>
                </div>
            </div>
            <p class="py-5 text-white font_inter font-medium text-[18px] lg:w-[30%]">Navigate Your Canadian Immigration Journey with Confidence</p>
            <div class="video-container">
                <video id="customVideo" width="320" height="240">
                  <source src="{{ asset('assets/kgraphvideo.mp4') }}" type="video/mp4">
                  <source src="{{ asset('assets/kgraphvideo.ogg') }}" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <!-- Custom Play/Pause Button -->
                <div id="playPauseButton" class="custom-controls">
                    <img src="{{ asset('assets/play.png') }}" alt="Pause" width="50" height="50">
                </div>
              </div>
        </div>
    </div>

    {{-- navigate section --}}
    <div class="Navigatesec gradient-evition relative overflow-hidden z-10 bg-[#051b3b]">
        <div class="container mx-auto px-5 lg:px-12 lg:py-16 h-full w-full">

            <div class="md:flex justify-between items-start gap-5">
                <div class="md:w-1/2">
                    <h4 class="text-white font_inter font-semibold text-[22px] lg:text-[30px] lg:w-[75%]">Navigate Your Canadian Immigration Journey with Confidence</h4>
                    <p class="text-white font_inter font-thin text-justify text-[14px] py-4  lg:w-[75%]">We enable some of the most demanding organizations to enrich customer experiences, optimize efficiencies, launch new platforms, and monetize data opportunities. We offer fully-managed and end-to-end technology, tools, talent, </p>
                    <h2 id="count-number" class="text-white font_inter font-bold text-[85px] leading-none">60+</h2>
                    <p class="text-white">Years of Experience</p>
                    <div class="my-6 flex flex-wrap md:flex-nowrap items-start gap-5">
                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">60+</h2>
                            <span class="text-white">Employes</span>
                        </div>

                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">4.5</h2>
                            <span class="text-white block leading-none">Google</span>
                            <span class="text-white">Rating</span>
                        </div>

                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">4.5</h2>
                            <span class="text-white">Offices</span>
                        </div>
                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">30k+</h2>
                            <span class="text-white">Customers Served</span>
                        </div>
                        <div>
                            <h2 class="text-white font_inter font-bold text-[25px] leading-none">3k</h2>
                            <span class="text-white">Active Cases</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-7 py-6 lg:py-0 whitespace-nowrap">
                        <div class="text-white">Meet our Firm</div>
                        <button class="flex items-center gap-4 rounded-full knowmore border border-white px-6 py-2">
                            <div class="text-white">Know more</div>
                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7266 5.37891L10.2266 8.87891C9.89844 9.23438 9.32422 9.23438 8.99609 8.87891C8.64062 8.55078 8.64062 7.97656 8.99609 7.64844L10.9922 5.625H0.875C0.382812 5.625 0 5.24219 0 4.75C0 4.23047 0.382812 3.875 0.875 3.875H10.9922L8.99609 1.87891C8.64062 1.55078 8.64062 0.976562 8.99609 0.648438C9.32422 0.292969 9.89844 0.292969 10.2266 0.648438L13.7266 4.14844C14.082 4.47656 14.082 5.05078 13.7266 5.37891Z" fill="white"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 bg-[#0d2139] lg:w-1/2 mb-4 lg:mb-0">
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
    <div class="RegulatedSec bg-black">
        <div class="container mx-auto px-5 lg:px-12 py-6 lg:py-16 h-full w-full">
            <div class="md:flex justify-center items-start gap-5">
                <div class="md:w-1/2">
                    <h2 class="text-white font_inter font-semibold text-2xl lg:text-3xl lg:w-[55%]">Regulated Canadian Immigration Consultants (RCIC-IRB)</h2>
                    <p class="py-5 text-white font-normal font_inter text-[14px] lg:w-[80%]">Proudly regulated by and in good standing with the College of Immigration and Citizenship Consultants (CICC). Jamie Dowla, registration #: R507233</p>
                    <div class="flex flex-col lg:flex-row gap-5 items-center mb-8">
                        <img class="w-[200px]" src="{{ asset('assets/home_Banner/ciccc.png') }}" alt="">
                        <img class="w-[200px]" src="{{ asset('assets/home_Banner/capic.png') }}" alt="">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Right Side (Spans both rows) -->
                    <div class="row-span-2 rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/cityrectangle.png') }}" alt="Cityscape" class="w-[300px] h-full object-cover" />
                    </div>
                    <!-- Top Left -->
                    <div class="flex justify-center items-center rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="Immigration" class="w-[300px] h-full object-cover" />
                    </div>
                    <!-- Bottom Left -->
                    <div class="flex justify-center items-center rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/home_Banner/suareman.png') }}" alt="Lawyer" class="w-[300px] h-full object-cover" />
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- testimonial sect --}}
    <div class="testimonial bg-[#051b3b] gradient-evition relative overflow-hidden z-10">
            <div class="container mx-auto px-5 lg:px-12 py-8 lg:py-16 h-full w-full">
                <div class="flex items-end w-full gap-2 lg:gap-7">
                    <h2 class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] lg:text-[65px] leading-none thirdleft-to-right-animation">Testimonials</h2>
                    <div class="w-full thirdleft-to-right-width-animation" style="border: 2px solid #FFFFFF8C;margin-bottom: 8px;"></div>
                </div>
                <p class="py-5 text-white font_inter font-medium text-[18px] lg:text-[32px] lg:whitespace-nowrap lg:w-[30%]">Let’s See what our customers want to say</p>
                <p class="text-white font_inter font-normal text-justify text-[14px] md:w-[45%]">We enable some of the most demanding organizations to enrich customer experiences, optimize efficiencies, launch new platforms, and monetize data opportunities. We offer fully-managed and end-to-end technology, tools, talent, </p>
            </div>

            <div class="pl-5 lg:pl-12 left-aligner py-[70px] your-slider-class z-50">
                <div><img class="" src="{{ asset('assets/home_Banner/cardone.png') }}" alt=""></div>
                <div><img src="{{ asset('assets/home_Banner/jithcaredtwo.png') }}" alt=""></div>
                <div><img src="{{ asset('assets/home_Banner/cardone.png') }}" alt=""></div>
                <div><img src="{{ asset('assets/home_Banner/jithcaredtwo.png') }}" alt=""></div>
            </div>


            <div class="container mx-auto px-5 lg:px-12 py-8 lg:py-16 h-full w-full">
                <div class="flex justify-start items-center mb-12">
                    <div class="commongrad rounded-full py-[2.5px]  w-fit">
                        <span class="px-5 text-white">Be One of Them</span>
                        <button class="bg-white px-8 py-1 text-[#0153d0] rounded-full">Write</button>
                    </div>
                </div>
            </div>
    </div>

    {{-- Blog sect --}}
    <div class="BlogCRDS bg-[#051b3b]">
        <div class="container mx-auto px-5 lg:px-12 lg:py-16 h-full w-full">
            <div class="flex items-end w-full gap-2 lg:gap-7">
                <h2 class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] lg:text-[65px] leading-none fourthleft-to-right-animation">Blogs</h2>
                <div class="w-full fourthleft-to-right-width-animation" style="border: 2px solid #FFFFFF8C;margin-bottom: 8px;"></div>
            </div>
            <p class="py-5 text-white font_inter font-medium text-[18px] lg:text-[32px] lg:whitespace-nowrap lg:w-[30%]">Canadian Immigration News, Tips, and Resources</p>
            <p class="text-white font_inter font-normal text-justify text-[14px] md:w-[45%]">Stay in the loop and keep up with all our news and updates!</p>
            <div class="flex justify-start items-center my-12">
                <div class="commongrad rounded-full py-[2.5px]  w-fit">
                    <span class="px-5 text-white">Be One of Them</span>
                    <button class="bg-white px-8 py-1 text-[#0153d0] rounded-full">Write</button>
                </div>
            </div>


            <div class="pt-[20px] pb-[70px] grid gap-6 overflow-x-scroll scrollbar-hidden w-full" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
                <div class="bg-white w-[350px] mr-5">
                    <img class="h-[200px] w-full object-cover" src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="blog_image"/>
                    <div class="py-4 px-6">
                        <div class="flex items-center gap-4">
                            <img class="w-[50px] h-[50px]" src="{{ asset('assets/home_Banner/athulraj.png') }}" alt="profile_image"/>
                            <div>
                                <h6 class="font_inter font-semibold text-16px text-[#072558]">Anusha</h6>
                                <p class="text-[#072558] font_inter font-medium text-[14px]">by Anusha, on Aug 5, 2024 11:46:47 AM</p>
                                <p class="text-[#072558] font_inter font-medium text-[14px]">Topics: Canada Immigration</p>
                            </div>
                        </div>
                        <h5 class="text-[#072558] font_inter font-bold text-[14px] py-5">Top Immigration Consultant in Bangalore for 2024</h5>
                        <p class="text-[#072558] font_inter font-normal text-justify text-[14px]">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. </p>
                    </div>
                </div>
                <div class="bg-white w-[350px] mr-5">
                    <img class="h-[200px] w-full object-cover" src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="blog_image"/>
                    <div class="py-4 px-6">
                        <div class="flex items-center gap-4">
                            <img class="w-[50px] h-[50px]" src="{{ asset('assets/home_Banner/athulraj.png') }}" alt="profile_image"/>
                            <div>
                                <h6 class="font_inter font-semibold text-16px text-[#072558]">Anusha</h6>
                                <p class="text-[#072558] font_inter font-medium text-[14px]">by Anusha, on Aug 5, 2024 11:46:47 AM</p>
                                <p class="text-[#072558] font_inter font-medium text-[14px]">Topics: Canada Immigration</p>
                            </div>
                        </div>
                        <h5 class="text-[#072558] font_inter font-bold text-[14px] py-5">Top Immigration Consultant in Bangalore for 2024</h5>
                        <p class="text-[#072558] font_inter font-normal text-justify text-[14px]">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. </p>
                    </div>
                </div>
                <div class="bg-white w-[350px] mr-5">
                    <img class="h-[200px] w-full object-cover" src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="blog_image"/>
                    <div class="py-4 px-6">
                        <div class="flex items-center gap-4">
                            <img class="w-[50px] h-[50px]" src="{{ asset('assets/home_Banner/athulraj.png') }}" alt="profile_image"/>
                            <div>
                                <h6 class="font_inter font-semibold text-16px text-[#072558]">Anusha</h6>
                                <p class="text-[#072558] font_inter font-medium text-[14px]">by Anusha, on Aug 5, 2024 11:46:47 AM</p>
                                <p class="text-[#072558] font_inter font-medium text-[14px]">Topics: Canada Immigration</p>
                            </div>
                        </div>
                        <h5 class="text-[#072558] font_inter font-bold text-[14px] py-5">Top Immigration Consultant in Bangalore for 2024</h5>
                        <p class="text-[#072558] font_inter font-normal text-justify text-[14px]">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. </p>
                    </div>
                </div>
                <div class="bg-white w-[350px] mr-5">
                    <img class="h-[200px] w-full object-cover" src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="blog_image"/>
                    <div class="py-4 px-6">
                        <div class="flex items-center gap-4">
                            <img class="w-[50px] h-[50px]" src="{{ asset('assets/home_Banner/athulraj.png') }}" alt="profile_image"/>
                            <div>
                                <h6 class="font_inter font-semibold text-16px text-[#072558]">Anusha</h6>
                                <p class="text-[#072558] font_inter font-medium text-[14px]">by Anusha, on Aug 5, 2024 11:46:47 AM</p>
                                <p class="text-[#072558] font_inter font-medium text-[14px]">Topics: Canada Immigration</p>
                            </div>
                        </div>
                        <h5 class="text-[#072558] font_inter font-bold text-[14px] py-5">Top Immigration Consultant in Bangalore for 2024</h5>
                        <p class="text-[#072558] font_inter font-normal text-justify text-[14px]">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. </p>
                    </div>
                </div>
            </div>


        </div>
    </div>

    {{-- explore section --}}
    <div class="explore-section bg-black">
        <div class="container mx-auto px-5 lg:px-12 py-8 lg:py-16 h-full w-full">
            <div class="flex w-full items-end">
                <h2 class="text-white font_inter font-semibold text-5xl">Explore</h2>
                <div class="w-full" style="border: 2px solid #FFFFFF8C; margin-bottom: 8px;"></div>
            </div>
            <p class="text-white font_inter font-semibold text-[26px] lg:w-[35%] mt-6">Learn About All of the Great ThingsCanada Has to Offer!</p>
        </div>
        <div class="flex justify-between items-center overflow-x-scroll gap-6 scrollbar-hidden pb-[100px]">
            <img class="pl-8 lg:pl-12" src="{{ asset('assets/home_Banner/sliderone.png') }}" alt="">
            <img src="{{ asset('assets/home_Banner/slidertwo.png') }}" alt="">
            <img src="{{ asset('assets/home_Banner/sliderThree.png') }}" alt="">
            <img src="{{ asset('assets/home_Banner/sliderFour.png') }}" alt="">
        </div>
    </div>
</div>

{{-- faq section --}}
<div class="faq-section bg-[#F7FCFF]">
    <div class="container mx-auto px-5 lg:px-12 py-8 lg:py-16 h-full w-full">
        <div class="flex justify-center items-center flex-col">
            <h2 class="font_aktiv font-bold text-[18px] faqSectHead text-[#07245A]">Have Any Questions?</h2>
            <div>
                <h2 class="font_aktiv font-bold text-[32px] faqSectHeading text-[#07245A]">FAQs ?</h2>
                <img class="mt-[-11px]" src="{{ asset('assets/home_Banner/underlinefaq.png') }}" alt="">
            </div>
        </div>
        <div class="mt-8 faq-parent lg:px-[10%]">

            <div class="accordion bg-white rounded-2xl h-fit p-6">
                <div class="accordion-header flex justify-between items-center cursor-pointer">
                    <h6>What is the purpose of a visa?</h6>
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
                    Lorem Ipsum is simply dummy text the printing and typese Lorem Ipsum has been the industry's standard dummy text ever.
                </div>
            </div>
            <div class="accordion bg-white rounded-2xl h-fit p-6">
                <div class="accordion-header flex justify-between items-center cursor-pointer">
                    <h6 class="font_jakarta">What is the purpose of a visa?</h6>
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
                <div class="accordion-content font_jakarta overflow-hidden max-h-0 transition-all duration-500 ease-out">
                    Lorem Ipsum is simply dummy text the printing and typese Lorem Ipsum has been the industry's standard dummy text ever.
                </div>
            </div>
            <div class="accordion bg-white rounded-2xl h-fit p-6">
                <div class="accordion-header flex justify-between items-center cursor-pointer">
                    <h6>What is the purpose of a visa?</h6>
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
                    Lorem Ipsum is simply dummy text the printing and typese Lorem Ipsum has been the industry's standard dummy text ever.
                </div>
            </div>
            <div class="accordion bg-white rounded-2xl h-fit p-6">
                <div class="accordion-header flex justify-between items-center cursor-pointer">
                    <h6>What is the purpose of a visa?</h6>
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
                    Lorem Ipsum is simply dummy text the printing and typese Lorem Ipsum has been the industry's standard dummy text ever.
                </div>
            </div>
            <div class="accordion bg-white rounded-2xl h-fit p-6">
                <div class="accordion-header flex justify-between items-center cursor-pointer">
                    <h6>What is the purpose of a visa?</h6>
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
                    Lorem Ipsum is simply dummy text the printing and typese Lorem Ipsum has been the industry's standard dummy text ever.
                </div>
            </div>
            <div class="accordion bg-white rounded-2xl h-fit p-6">
                <div class="accordion-header flex justify-between items-center cursor-pointer">
                    <h6>What is the purpose of a visa?</h6>
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
                    Lorem Ipsum is simply dummy text the printing and typese Lorem Ipsum has been the industry's standard dummy text ever.
                </div>
            </div>
            <div class="accordion bg-white rounded-2xl h-fit p-6">
                <div class="accordion-header flex justify-between items-center cursor-pointer">
                    <h6>What is the purpose of a visa?</h6>
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
                    Lorem Ipsum is simply dummy text the printing and typese Lorem Ipsum has been the industry's standard dummy text ever.
                </div>
            </div>
            <div class="accordion bg-white rounded-2xl h-fit p-6">
                <div class="accordion-header flex justify-between items-center cursor-pointer">
                    <h6>What is the purpose of a visa?</h6>
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
                    Lorem Ipsum is simply dummy text the printing and typese Lorem Ipsum has been the industry's standard dummy text ever.
                </div>
            </div>


        </div>
        <div class="flex justify-center items-center my-12">
            <div class="commongrad flex items-center rounded-full py-[2.5px]  w-fit">
                <span class="px-5 text-white">Ask your questions through</span>
                <button class="bg-white px-8 py-1 text-[#0153d0] rounded-full">Email</button>
            </div>
        </div>
    </div>
</div>

{{-- get in touch section --}}
<div class="get-in-Touch bg-[#051b3b] py-28">
    <div class="container mx-auto px-5 lg:px-12 h-full w-full">
        <div class="flex justify-center items-center flex-col ">
            <div class="flex flex-col-reverse md:flex-row items-center">
                <h2 class="font_inter font-semibold text-4xl text-center md:text-left gettouch uppercase gradient-text">Get IN TOUCH WITH US</h2>
                <img class="w-[70px]" src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="">
            </div>
            <p class="text-white py-6 paddadjuster md:w-3/5 lg:w-1/2 text-center font_inter font-semibold lg:text-[22px] gettouchpara">Labaton Keller Sucharow is elevating excellence through innovation, client service, and teamwork.</p>
            <div class="bg-[#0153d0] flex rounded-full py-[6px]">
                <span class="px-5 text-white">Have any doubt</span>
                <button class="bg-white px-8 py-1 text-[#0153d0] rounded-full whitespace-nowrap">Enquiry Now</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', function () {
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

    // counting animtion
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

    document.addEventListener('DOMContentLoaded', function () {
        const numberElement = document.getElementById('count-number');
        const sectionToObserve = document.querySelector('.Navigatesec');

        let hasCounted = false;

        const observer = new IntersectionObserver(function(entries) {
            if (entries[0].isIntersecting && !hasCounted) {
                hasCounted = true;
                animateCountUp(numberElement, 0, 60, 2000);
            }
        }, {
            threshold: 0.5
        });

        observer.observe(sectionToObserve);
    });

    const video = document.getElementById('customVideo');
    const playPauseButton = document.getElementById('playPauseButton');

    playPauseButton.addEventListener('click', function () {
        if (video.paused) {
            video.play();
            playPauseButton.innerHTML = '<img src="{{ asset('assets/pause.png') }}" alt="Pause" width="50" height="50">';
        } else {
            video.pause();
            playPauseButton.innerHTML = '<img src="{{ asset('assets/play.png') }}" alt="Play" width="50" height="50">';
        }
    });

    // Automatically update play/pause button when the video ends
    video.addEventListener('ended', function () {
        playPauseButton.innerHTML = '<img src="{{ asset('assets/play.png') }}" alt="Play" width="50" height="50">';
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

</script>

{{-- slick slider --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('.your-slider-class').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1
        });

    });
</script>

@endsection
