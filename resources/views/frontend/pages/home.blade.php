@extends('layouts.main')

@section('content')
    {{-- Load GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/SplitText.min.js"></script> --}}

{{--
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <style>@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap');</style>
    <style>
        body {
            counter-reset: certificate-counter;
        }
        .font_syne> {
            font-family: "Syne", sans-serif;
        }
        .banner-container-elem {
            opacity: 0;
            transform: translateX(100%);
            scale: 0.5;
        }

        .banner-container-elem-bottom-to-top {
            opacity: 0; /* Start hidden */
            transform: translateY(100%) scale(0.5); /* Start 100% below and scaled down */
            transition: all 0.3s ease-out; /* Smooth fallback transitions */
        }

        .banner-contain-text {
            /* opacity: 0; */
            /* transform: translateX(20%); */
            /* scale: 0.5; */
        }

        /* .left-to-right-animation,
        .secleft-to-right-animation,
        .thirdleft-to-right-animation, */
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
        }


        .banner-gradient-overlay {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 127%;
            z-index: 1;
            background: linear-gradient(180deg, rgba(4, 25, 55, 0) 0%, #041937 100%);
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
            /* overflow-x: hidden; */
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
            .roundring-anim:hover .round-comimg{
                height: 585px;
                width: 500px;
                transform: translate(-353px, -89px);
            }
            .clamp-3{
                max-height: calc(2.6em* 2);
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
            }

        }
        .clamp-3{
            max-height: calc(2.7em* 2);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .round-comimg{
            height: 100px;
            width: 100px;
            transform: translate(-25px, -40px);
            transition: all 0.5s;
        }
        .roundring-anim:hover .round-comimg{
            height: 1028px;
            width: 960px;
            transform: translate(-353px, -289px);
        }
        .roundring-anim:hover h2,
        .roundring-anim:hover p,
        .roundring-anim:hover .bg-liner,
        .roundring-anim:hover svg path {
            color: #005EEA !important;
            fill: #005EEA;

        }
        .bg-liner{
            background-color: white;
        }
        .roundring-anim:hover .bg-liner{
            background-color: #005EEA;
        }
        .bgk-grade{
            background: radial-gradient(83.81% 71.6% at 50% 51.6%, #00B0FF 0%, #00154E 100%);
        }
        .btn-hover{
            transition: all 0.5s;
        }
        .btn-hover:hover{
            background: linear-gradient(89.87deg, #00154E -3.29%, #00B0FF 114.96%);
        }

        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .marquee-content {
            display: inline-flex;
            animation: marquee 15s linear infinite;
            min-width: 200%; /* Make the content twice the width of the container */
        }

        .marquee-content div {
            display: inline-block;
            margin-right: 20px; /* Adjust space between images */
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        .animate-marquee {
            animation: marquee 15s linear infinite;
        }

        .bg-under-ourse{
            background-image: url(assets/home_Banner/radiuselpse.svg) !important;
            width: 100%;
            height: 50%;
            background-position-x: center;
        }
        .ourservices{
            background: linear-gradient(90deg, rgba(4,25,55,1) 0%, rgba(4,25,55,1) 100%);
        }

        .video-imagepos{
            transition: all 2s;
        }
        .video-grade:hover .video-imagepos{
            transform: scale(1.2);
        }
        .bg-grade-testimonial{
            background: linear-gradient(57.95deg, #060B12 -23.39%, #001533 65.33%);
        }
        .ctc-sect h5 {
            font-size: 26.88px;
            font-weight: 700;
            line-height: 0.5;
        }

        .ctc-sect span {
            font-size: 11.34px;
            font-weight: 600;
            line-height: 0.5;
        }

        .video-grade{
            background: linear-gradient(180deg, rgba(17, 49, 101, 0) 26.01%, #113165 133.05%);

        }
        .what-makes{
            background-image: url(assets/home_Banner/radiuselpse.svg) !important;
            width: 100%;
            height: 100%;
            background-position-x: center;
            background-position-y: ;
        }

        [data-animate-left] {
            will-change: opacity, transform;
        }

        @media (max-width: 640px) {
            #testimonial-slider .splide__list {
                padding: 0;
                gap: 0;
            }
            #testimonial-slider .splide__slide {
                width: 100%;
            }
        }
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10000;
            justify-content: center;
            align-items: center;
        }

        .popup-inner {
            background: white;
            padding: 20px;
            position: relative;
            max-width: 90%;
            max-height: 90%;
            overflow: auto;
        }

        .popup img {
            max-width: 100%;
            max-height: 100%;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            cursor: pointer;
            text-decoration: none;
        }

        .award_certificates_s .splide__slide {
            transform: translateY(100px);
            opacity: 0;
        }

        .award_certificates_s .splide__slide.is-visible.is-active {
            z-index: 1;
        }

        .award_certificates_s .splide__slide .certs {
            transition: transform .35s ease;
        }

        .award_certificates_s .splide__slide.is-visible.is-active .certs {
            transform: scale(1.2);
        }
        .award_certificates_s .splide__track {
            padding: 10px 0;
        }


        .award_certificates_s .splide__pagination {
            justify-content: end;
            /* margin-top: -5px; */
            /* margin-left: 20px; */
        }

        /* .award_certificates_s .splide__pagination__page {
            border: 0;
            border-radius: 50%;
            display: inline-block;
            height: 20px;
            width: 20px;
            margin: 0 0.1rem;
            padding: 0;
            position: relative;
            transition: background-color 0.2s ease, color 0.2s ease;
        } */
            /*
        .award_certificates_s .splide__pagination__page::after {
            counter-increment: certificate-counter;
            content: counter(certificate-counter);
            font-weight: 700;
            font-size: 1rem;
        }


        .award_certificates_s .splide__pagination__page {
            color: var(--darkgray);
            transition: all 0.3s ease-in-out;
            transform-origin: bottom;
        }

        .award_certificates_s .splide__pagination__page.is-active {
            color: var(--bg);
            transform: scale(1.25);
        } */

        @media(max-width:767px) {
            .image-card-explore img{
                width: 75px;
            }
        }


        @media(min-width:576px) {
            .award_certificates_s .splide__track {
                padding: 50px 0;
            }
        }
        @media(min-width:768px) {
            .award_certificates_s .splide__track {
                padding: 60px 0;
            }
        }

        @media(min-width:992px) {
            .award_certificates_s .splide__track {
                padding: 70px 0;
            }
            .award_certificates .swiper-slide img {
                height: 100%;
                width: 100%;
                max-width: 100%;
                object-fit: cover;
            }
        }


    </style>


    <div class="relative overflow-hidden">
        {{-- banner section --}}
        <div class="h-dvh md:h-screen lg:h-full 2xl:h-screen w-full homeBanner relative overflow-hidden">
            <!-- Gradient overlay -->
            <div class="banner-gradient-overlay banner-container-elem-bottom-to-top absolute inset-0"></div>

            <!-- Slick Slider for Background Images -->

            <div id="home-banner-slider" class="splide !absolute inset-0 z-[-1] h-full banner-container-elem-bottom-to-top">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($banner as $data)
                            <li class="splide__slide">
                                <img class="w-full h-[155vh] object-cover" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="{{ $data->alt_tag }}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Banner Content -->
            <div class="container mx-auto px-5 xl:px-12 h-full w-full relative z-10">
                <div class="h-full w-full flex flex-col justify-start md:justify-center items-center text-center mb-4 md:pt-8 pb-0 gap-[5%] md:gap-[31px] lg:gap-0">
                    <div class="z-10 flex flex-col lg:flex-row items-center lg:gap-[23px] pt-[10%] lg:pt-[22%] xl:pt-[143px] 2xl:pt-[120px] banner-container-elem">
                        <img class="pt-[22px] md:pt-0 w-[40px] lg:w-[100px]" src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="rocket icon">
                        <h2 class="banner-contain-text text-[20px] lg:text-[23px] font_inter font-medium text-white text-center capitalize"> Journey with Confidence <span class="text-[#579aff]">Migrate</span> with Us</h2>
                    </div>
                    <h1  id="animated-heading" class="md:text-center text-[31px] md:text-[55px] 2xl:text-[85px] lg:text-[70px] lg:w-[80%] font-medium font_inter gradient-text z-10 lg:mt-8 banner_main-text lg:inline-block banner-container-elem leading-[1.2]">Visa Made Easy Dreams Made Possible</h1>
                    <h6 class="font_inter font-medium text-[20px] lg:text-[23px] z-20 text-white lg:mt-14 banner-container-elem"> Visa Made Easy Dreams Made Possible</h6>
                    <div class="z-10 flex flex-col md:flex-row justify-center items-start md:items-center gap-4 lg:mb-7 lg:mt-10">
                        <img width="52px" src="{{ asset('assets/home_Banner/CanadaFlag.png') }}" alt="CanadaFlag">
                        <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-[4.5px] pl-6 pr-1 overflow-hidden group">
                            <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>
                            <h6 class="relative z-10 text-white text-[10px] md:text-[14px] 2xl">Let's turn your vision into reality.</h6>
                            <div class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:py-[4px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                                <a href="{{ url('contact-us') }}" class="h-full text-[12px] lg:text-[16px] font-semibold">Connect Us</a>
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
                    <div class="lg:absolute bottom-0 right-0 w-full lg:w-fit flex justify-center lg:right-12 lg:bottom-[35%] z-10">
                        <div class="flex lg:flex-col items-center gap-[30px] border border-white py-2 lg:py-4 px-6 lg:px-2 rounded-full mb-3 lg:mb-0">
                            <a href="https://www.facebook.com/KGraphimmigration/" target="_blank" rel="noopener noreferrer">
                                <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/facebookban.png') }}" alt="facebook">
                            </a>
                            <a href="https://www.instagram.com/kgraph_immigration?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer">
                                <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/instagramban.png') }}" alt="instagram">
                            </a>
                            <a href="https://ca.linkedin.com/company/kgraph-homeabout-usstudy-abroadcanada-immigrationieltsother-servicescontact-1-416-989-7788-91-94476" target="_blank" rel="noopener noreferrer">
                                <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/linkedinban.png') }}" alt="linkedin">
                            </a>
                            <a href="https://www.youtube.com/@kgraphimmigration8686/featured" target="_blank" rel="noopener noreferrer">
                                <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/youtubeban.png') }}" alt="youtube">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- @include('frontend.Common.modal-contact') --}}
    </div>
    @include('frontend.Common.whatsapplogo')
    {{-- @include('frontend.Common.modal-contact') --}}

    <div class="bg-[#051b3b]">
        {{--our services --}}
        <div class="ourservices rounded-b-[35px] lg:rounded-b-[153px] relative pt-14 pb-6 lg:py-0">
            <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full relative z-10">
                <div class="rounded-lg bgk-grade overflow-hidden mb-10  relative">
                    <div class="py-8 px-8 relative z-10">
                        <div class="flex flex-col lg:flex-row justify-between items-center relative overflow-hidden">
                            <div class="border-r-white lg:border-r-[1px]  h-full lg:pr-14 2xl:pr-0" data-animate>
                                <h2 class="pb-8 text-white text-center lg:text-left">
                                    <span class="font_inter lg:text-4xl xl:text-6xl font-normal uppercase"> @if (isset($home)) {{ $home->service_first_title }} @endif @if (isset($home)) {{ $home->service_second_title }} @endif</span>
                                    <span class="font-semibold lg:text-lg xl:text-xl capitalize">@if (isset($home)) {{ $home->service_sub_title }} @endif</span>
                                </h2>
                                <p class="font_inter text-sm xl:text-base text-center lg:text-left  font-normal text-white clamp-3 xl:w-[80%]">@if (isset($home)){{ $home->service_description }}@endif</p>
                            </div>
                            <div class="lg:w-[40%] my-2 lg:pl-14 text-center lg:text-left" data-animate>
                                <h3 class="font_inter text-base xl:text-xl font-extrabold text-white my-5 lg:w-3/4">Find your Eligibility for PR</h3>
                                <a class="font_syne uppercase font-bold text-xs xl:text-base whitespace-nowrap border border-white py-2 px-5 rounded-full my-4 text-white bg-transparent transition-all duration-300 hover:bg-white hover:text-black" href="{{ url('eligibility-check') }}">Free Eligibility Check</a>


                            </div>
                        </div>
                        <div class="border-white border-[0.5px] w-full mt-10"></div>
                    </div>
                    <div class="absolute inset-0 w-full h-full">
                        <img src="{{ asset('assets/home_Banner/vector-ourser.png') }}" alt="">
                    </div>
                </div>

                <div id="serviceCarousel" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($serviceCategory as $data)
                            <li class="splide__slide">
                                <div class="w-full h-[491px] lg:h-[550px]  2xl:h-[550px] bgk-grade rounded-[26px] py-4 2xl:py-6 text-white lg:shadow-lg relative font-sans overflow-hidden roundring-anim">
                                    <div class="px-3 2xl:px-6">
                                        <div class="flex justify-between items-center" data-animate>
                                            <div class="relative z-10">
                                                <svg width="40" height="44" viewBox="0 0 36 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 34.7294C0 30.122 4.68675 23.2109 18 23.2109C18.801 23.2109 19.5705 23.2354 20.3085 23.2846L19.6875 27.8597C19.1254 27.8315 18.5627 27.8177 18 27.8183V37.0331H27V41.6405H22.5V37.0331H18V41.6405H0V34.7294ZM18 20.9072C16.5871 20.9064 15.1901 20.6028 13.8986 20.0161C12.6072 19.4293 11.45 18.5723 10.5015 17.5002C9.55297 16.4281 8.83409 15.1646 8.39108 13.791C7.94808 12.4173 7.79077 10.964 7.92926 9.52433C8.06775 8.08471 8.49898 6.6907 9.19522 5.43195C9.89146 4.1732 10.8373 3.07758 11.9719 2.21554C13.1065 1.3535 14.4048 0.744132 15.7832 0.426621C17.1616 0.10911 18.5896 0.0904854 19.9755 0.371945L19.1025 4.89181C18.7394 4.8179 18.3702 4.78086 18 4.78123V16.2998C18.3825 16.2998 18.75 16.2629 19.1025 16.1892L19.9755 20.709C19.3249 20.8412 18.6632 20.9075 18 20.9072ZM24.5992 23.8789C26.1517 24.2222 27.5243 24.6852 28.7257 25.2381L26.361 29.1844C25.4728 28.8269 24.5558 28.5494 23.6205 28.355L24.5992 23.8789ZM31.5 41.6405V37.0331H36V41.6405H31.5ZM35.64 32.4257H30.627C30.3093 31.9556 29.9393 31.525 29.5245 31.1425L32.31 27.5096C34.065 29.03 35.1315 30.7716 35.64 32.4257ZM23.625 1.92003L21.1208 5.74879C21.7372 6.17037 22.2682 6.71404 22.68 7.34526L26.4195 4.78123C25.6806 3.64882 24.731 2.67657 23.625 1.92003ZM27.9315 8.51784L23.517 9.41168C23.6625 10.1569 23.6625 10.9241 23.517 11.6693L27.9315 12.5631C28.191 11.2278 28.191 9.85319 27.9315 8.51784ZM26.4195 16.2998L22.68 13.7357C22.2682 14.3669 21.7372 14.9106 21.1208 15.3322L23.625 19.161C24.7275 18.403 25.6792 17.4309 26.4195 16.2998Z" fill="white"/>
                                                </svg>
                                            </div>
                                            <div class="relative">
                                                <div class="bg-white rounded-full absolute p-6 round-comimg"></div>
                                                <div class="relative z-10">
                                                    <svg width="36" height="40" viewBox="0 0 34 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M33.6332 4.9329L29.7049 0.860485L6.13464 25.295V2.89669L0.556349 2.89669V35.1502H31.669L31.669 29.3674L10.063 29.3674L33.6332 4.9329Z" fill="#005EEA"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="text-xl xl:text-2xl 2xl:text-4xl clamp-text-two font-bold font_inter mt-8 mb-4 relative z-10 lg:h-[80px]" data-animate>{{ $data->title }}</h2>
                                        <p class="text-gray-200 font_inter font-normal text-sm relative z-10" data-animate>{{ $data->title }}</p>
                                    </div>
                                    <div class="my-4 mx-2" data-animate>
                                        <div class="bg-liner h-[1px] w-full rounded-xl"></div>
                                    </div>
                                    <div class="px-3 2xl:px-6">
                                        <div class="space-y-2 relative z-10" data-animate>
                                            @foreach ($data->Service as $service)
                                            <a href="{{url('service-details/'.$service->slug)}}" class="w-full text-base bg-black text-white py-2 rounded-lg flex justify-between items-center px-4 btn-hover transition">
                                                <span class="clamp-text-one">{{ $service->title }}</span>
                                                <span>→</span>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="my-8 lg:mx-4">
                        <div class="flex justify-end gap-3 items-center">
                            <div class="card-ourSer-slide-prev-button cursor-pointer">
                                <img class="w-[40px]" src="{{ asset('assets/Button-Previous.png') }}" alt="">
                            </div>
                            <div class="cursor-pointer card-ourSer-slide-next-button">
                                <img class="w-[40px]" src="{{ asset('assets/nextbutton.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="overflow-hidden whitespace-nowrap flex items-center py-6 relative z-10">
                <div class="marquee-content animate-marquee flex items-center lg:gap-24">
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/splunk.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/segment.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/Hubspot.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/asna.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/airtasker.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/splunk.png') }}" alt="" class="w-full"></div>

                    <!-- Duplicate images to create a seamless loop -->
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/segment.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/Hubspot.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/asna.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/airtasker.png') }}" alt="" class="w-full"></div>
                    <div class="w-[110px] mr-5"><img src="{{ asset('assets/home_Banner/splunk.png') }}" alt="" class="w-full"></div>
                </div>
            </div>

            <div class="flex justify-center mx-5 lg:mx-0 py-6 relative z-10 lg:pb-20">
                <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[4.5px] pl-5 pr-1 overflow-hidden group">
                    <!-- Initially the background will cover the full button -->
                    <div
                        class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                    </div>
                    <h6 class="relative z-10 text-white text-[12px] xl:text-[14px]">Let's turn your vision into reality</h6>
                    <div
                        class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:pb-[2px] xl:pt-[1px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[14px]">Connect Us</a>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 bg-under-ourse rounded-b-[35px] lg:rounded-b-[153px]">
                <img src="{{ asset('assets/home_Banner/imgage-vect-line.png') }}" alt="" class="">
            </div>
        </div>
        {{-- what makes us diff --}}
        <div class="what-makes relative mt-20 lg:mt-0">
            <div class="gradient-evitionstart absolute top-0">
                <img src="{{ asset('assets/home_Banner/sec-vectline.png') }}" alt="" class="">
            </div>
            <div class="container mx-auto px-5 xl:px-12 pb-12 lg:py-12 lg:my-16 h-full w-full z-10 relative">
                <div>
                    <div class="flex flex-col lg:flex-row justify-center items-center">
                        <div class="flex items-center w-full gap-2 lg:gap-7">
                            <h2 class="uppercase text-white font_inter font-normal text-4xl xl:text-6xl w-full lg:min-w-[500px] xl:min-w-[600px]" data-animate-left>
                                @if (isset($home))
                                    {{ $home->journey_title }}
                                @endif
                            </h2>
                            <div class="hidden lg:block w-full lg:mr-8" style="border: 1px solid #FFFFFF8C;margin-bottom: 8px;" data-animate-left></div>
                        </div>

                        <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 my-6 lg:py-20  py-[6.5px]  xl:py-[4.5px] pl-5 pr-1 group">
                            <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 min-w-fit max-w-full rounded-full"></div>
                            <h6 class="relative z-10 text-white text-[12px] xl:text-[14px] lg:whitespace-nowrap">Let's turn your vision into reality</h6>
                            <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:pb-[2px] xl:pt-[1px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                                <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[14px]">Connect Us</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row justify-between items-start gap-[10%] my-8">
                        <div class="text-white w-full flex flex-col justify-between lg:h-[424px]">
                            <div data-animate-left>
                                <p class="font_inter font-medium text-[20px] mb-6">
                                    @if (isset($home))
                                        {{ $home->journey_sub_title }}
                                    @endif
                                </p>
                                <p class="font_inter font-normal text-[15px] my-6 text-justify">
                                    @if (isset($home))
                                        {{ $home->journey_description }}
                                    @endif
                                </p>
                            </div>

                            <div class="py-8" data-animate-left>
                                <h5 id="journeyExperience" class="font_inter font-bold text-[83px] capitalize leading-tight">@if (isset($journey)) <span data-count="{{ $journey->experience }}">{{ $journey->experience }}</span>+ @endif</h5>
                                <h6 class="font_inter font-semibold text-lg capitalize leading-tight">Years of Experience</h6>
                            </div>

                            <div class="flex justify-between flex-wrap gap-6 items-center" data-animate-left>
                                <div class="ctc-sect">
                                    <h5>@if (isset($journey))
                                        {{ $journey->employees }}
                                    @endif</h5>
                                    <span>Employes</span>
                                </div>

                                <div class="ctc-sect">
                                    <h5>@if (isset($journey))
                                        {{ $journey->ratings }}
                                    @endif</h5>
                                    <span>Ratings</span>
                                </div>

                                <div class="ctc-sect">
                                    <h5>@if (isset($journey))
                                        {{ $journey->offices }}
                                    @endif</h5>
                                    <span>Offices</span>
                                </div>

                                <div class="ctc-sect">
                                    <h5>@if (isset($journey))
                                        {{ $journey->customers }}
                                    @endif</h5>
                                    <span>Customers Served</span>
                                </div>

                                <div class="ctc-sect">
                                    <h5>@if (isset($journey))
                                        {{ $journey->cases }}
                                    @endif</h5>
                                    <span>Active Cases</span>
                                </div>

                            </div>

                        </div>

                        <div class="w-full flex justify-center items-center rounded-lg overflow-hidden mt-6 relative group video-grade">
                            <!-- <img src="@if (isset($home)) {{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $home->journey_image1 }} @endif" alt="@if (isset($home)) {{ $home->journey_image1_alt_tag }} @endif" style="object-position: 0px 0px;" class="w-full h-[400px] object-cover video-imagepos"> -->
                            <video  class="w-full h-[400px] object-cover object-center video-imagepos"  style="object-position: 0px 0px;" loop>
                                @if (isset($home))
                                    <source src="{{ $locationData['storage_server_path'].$locationData['storage_video_path'].$home->journey_video }}">
                                @endif
                            </video>

                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[#113165] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white">
                                <!-- Play Icon -->
                                <div onclick="togglePlay(this)" class="cursor-pointer">
                                    <svg width="78" height="78" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="38.6475" cy="38.6475" r="38.6475" fill="white" fill-opacity="0.5"/>
                                        <mask id="mask0_1460_3580" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="23" y="24" width="30" height="30">
                                            <path d="M23.5664 24.5088H52.7877V53.7301H23.5664V24.5088Z" fill="white"/>
                                        </mask>
                                        <g mask="url(#mask0_1460_3580)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M50.5163 43.0709C53.5572 41.314 53.5572 36.9235 50.5163 35.1647L34.9834 26.1847C31.9407 24.4259 28.1328 26.623 28.1328 30.1387V48.0988C28.1328 51.6145 31.9407 53.8116 34.9834 52.051L50.5163 43.0709Z" fill="white"/>
                                        </g>
                                    </svg>
                                </div>

                                <!-- Text Content -->
                                <div>
                                    <p class="text-lg font-bold">{{$home->journey_video_name}}</p>
                                    <p class="text-sm">{{$home->journey_video_position}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div  class="w-full h-[600px] lg:pb-16 lg:pt-48 relative flex justify-center items-center">
                    <div class="absolute">
                        <img src="@if (isset($home)) {{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $home->certificate_image1 }} @endif" alt="@if (isset($home)) {{ $home->certificate_image1_alt_tag }} @endif" class="h-[600px] lg:h-auto object-cover rounded-lg">
                    </div>
                    <div id="certificateSection" class="z-10 relative text-white p-8 flex justify-center items-center flex-col" >
                        <h2 class="font_inter font-black text-3xl xl:text-4xl lg:w-[65%] xl:w-[50%] text-center">{{ $home->certificate_title ?? '' }}</h2>
                        <p class="py-5 font-semibold font_inter text-lg xl:text-xl clamp-3 text-center lg:w-[65%] xl:w-[50%]">{{ $home->certificate_description ?? '' }}</p>
                        <div class="flex flex-col lg:flex-row gap-5 items-center mt-6">
                            @foreach ($certificate as $data)
                                <div class="flex items-center flex-col justify-center">
                                    <img class="w-[200px] max-h-[66px]" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="{{ $data->alt_tag ?? 'Certificate' }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Testimonial --}}
        <div class="Testimonial bg-[#051b3b] relative">
            <div class="absolute -top-1/3">
                <img src="{{ asset('assets/home_Banner/testiminoalbgvect.png') }}" alt="" class="">
            </div>
            <div class="container mx-auto px-5 xl:px-12 lg:py-16 h-full w-full relative z-10">

                    <div class="flex items-end w-full gap-2 lg:gap-7 py-10">
                        <h2 class="uppercase text-white font_inter font-normal lg:text-4xl xl:text-6xl w-full xl:whitespace-nowrap" data-animate-left>
                            @if (isset($home))
                                {{ $home->testimonial_title }}
                            @endif
                        </h2>
                        <div class="w-full" style="border: 1px solid #FFFFFF8C;margin-bottom: 8px;"></div>
                    </div>

                    <h4 class="font_inter font-semibold text-[30px] 2xl:text-[42px] text-white" data-animate-left>
                        @if (isset($home))
                            {{ $home->testimonial_sub_title }}
                        @endif
                    </h4>
                    <p class="font_inter font-normal text-base 2xl:text-[20px] text-white pb-[85px]" data-animate-left>
                        @if (isset($home))
                            {{ $home->testimonial_description }}
                        @endif
                    </p>

                    <div id="testimonial-slider" class="splide w-full">
                        <div class="splide__track">
                            <div class="splide__list flex gap-5 px-4 md:px-0">
                                @foreach ($testimonials as $data)
                                    <div class="splide__slide p-6 bg-grade-testimonial text-white rounded-lg shadow-md">
                                        <div class="flex items-center justify-between space-x-4 mb-4">
                                            <div class="flex items-center gap-2">
                                                <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"
                                                alt="{{ $data->alt_tag }}" class="w-12 h-12 rounded-full">
                                                <div>
                                                    <h2 class="text-lg font-semibold">{{ $data->name }}</h2>
                                                    <p class="text-sm text-gray-400">{{ $data->occupation }}</p>
                                                </div>
                                            </div>
                                            <div class="ml-auto flex items-center gap-2">
                                                <span class="text-lg font-bold">{{ $data->rating }}</span>
                                                <div class="flex items-center">
                                                    @for ($i = 1; $i <= floor($data->rating); $i++)
                                                        <div class="text-yellow-500 flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-3 h-3" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                                        </div>
                                                    @endfor
                                                </div>
                                                @if ($data->rating - floor($data->rating) >= 0.5)
                                                    <img class="w-[12px]" src="{{ asset('assets/Navigation/halfstar.png') }}" alt="Half Star">
                                                @endif
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-300 leading-relaxed py-7 truncate-text">
                                            {{ $data->description }}
                                        </p>
                                        <div class="flex justify-end items-center">
                                            <img class="w-[25px] h-[25px] mt-6" src="{{ asset('assets/home_Banner/dobleinverted.png') }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Custom Navigation Buttons -->
                    <div class="flex flex-col lg:flex-row items-center justify-between mt-4 space-x-4">
                        <div class="lg:ml-8">
                            <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[4.5px] pl-5 pr-1 group">
                                <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 min-w-fit max-w-full rounded-full"></div>
                                <h6 class="relative z-10 text-white text-[12px] xl:text-[14px] whitespace-nowrap">Be One of Them</h6>
                                <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:pb-[2px] xl:pt-[1px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                                    <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[14px]">Connect Us</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="card-testi-slide-prev-button  p-2 rounded-full">
                                <svg width="50" height="50" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="69.5" y="69.5" width="69" height="69" rx="34.5" transform="rotate(180 69.5 69.5)" stroke="white" stroke-opacity="0.8"/>
                                    <path d="M38.384 43.384C38.1496 43.6184 37.8317 43.75 37.5003 43.75C37.1688 43.75 36.8509 43.6184 36.6165 43.384L29.1165 35.884C28.8822 35.6496 28.7505 35.3317 28.7505 35.0003C28.7505 34.6688 28.8822 34.3509 29.1165 34.1165L36.6165 26.6165C36.8523 26.3888 37.168 26.2628 37.4958 26.2657C37.8235 26.2685 38.137 26.4 38.3688 26.6317C38.6006 26.8635 38.732 27.177 38.7349 27.5048C38.7377 27.8325 38.6117 28.1483 38.384 28.384L31.7678 35.0003L38.384 41.6165C38.6184 41.8509 38.75 42.1688 38.75 42.5003C38.75 42.8317 38.6184 43.1496 38.384 43.384Z" fill="white"/>
                                </svg>

                            </button>
                            <button class="card-testi-slide-next-button p-2 rounded-full">
                                <svg width="50" height="50" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="69" height="69" rx="34.5" stroke="white" stroke-opacity="0.8"/>
                                    <path d="M31.616 26.616C31.8504 26.3816 32.1683 26.25 32.4997 26.25C32.8312 26.25 33.1491 26.3816 33.3835 26.616L40.8835 34.116C41.1178 34.3504 41.2495 34.6683 41.2495 34.9997C41.2495 35.3312 41.1178 35.6491 40.8835 35.8835L33.3835 43.3835C33.1477 43.6112 32.832 43.7372 32.5042 43.7343C32.1765 43.7315 31.863 43.6 31.6312 43.3683C31.3994 43.1365 31.268 42.823 31.2651 42.4952C31.2623 42.1675 31.3883 41.8517 31.616 41.616L38.2322 34.9997L31.616 28.3835C31.3816 28.1491 31.25 27.8312 31.25 27.4997C31.25 27.1683 31.3816 26.8504 31.616 26.616Z" fill="white"/>
                            5</svg>

                            </button>
                        </div>
                    </div>
            </div>
        </div>
        {{-- Blog sect --}}
        <div class="BlogCRDS bg-[#051b3b] lg:pt-24">
            <div class="container mx-auto px-5 py-12 xl:px-12 lg:py-16 h-full w-full">
                <div class="flex items-end w-full gap-2 lg:gap-7">
                    <h2 class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] lg:text-[45px] 2xl:text-[65px] leading-none fourthleft-to-right-animation">
                        @if (isset($home))
                            {{ $home->blog_title }}
                        @endif
                    </h2>
                    <div class="hidden lg:flex w-full fourthleft-to-right-width-animation" style="border: 1px solid #FFFFFF8C;margin-bottom: 8px;"></div>
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
                    <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[4.5px] pl-5 pr-1 group">
                        <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 min-w-fit max-w-full rounded-full"></div>
                        <h6 class="relative z-10 text-white text-[12px] xl:text-[14px] whitespace-nowrap">Be One of Them</h6>
                        <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:pb-[2px] xl:pt-[1px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                            <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[14px]">Connect Us</a>
                        </div>
                    </div>
                </div>

                <div id="blogSplide" class="splide pt-[20px] md:pb-[40px]">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($blogs as $data)
                                <li class="splide__slide">
                                    <a href="{{url('blog-details/'.$data->slug)}}">
                                        <div class="mx-auto bg-[#051b3b] shadow-lg rounded-lg overflow-hidden mt-[8px] 2xl:mt-10 lg:h-fit w-full sm:max-w-sm h-auto">
                                            <img class="w-full object-cover lg:h-[170px] 2xl:h-[225px] aspect-video" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"  alt="{{ $data->alt_tag }}">
                                            <div class="p-6 border-b border-l border-r border-white rounded-lg mt-[-7px]">
                                                <?php $date = $data->date . ' ' . $data->time; ?>

                                                <div class="flex items-center justify-between">
                                                    <p class="text-white text-[8px] 2xl:text-[10px] flex items-center gap-[8px]">
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

                                                <h2 class="text-[12px] 2xl:text-[14px] font-bold text-white mt-[10px] 2xl:mt-[12px] lg:w-[60%] clamp-text-two h-[60px]">
                                                    {{ $data->topics }}</h2>
                                                <div class="text-white text-[8px] lg:text-[14px] my-0 clamp-text">
                                                    {!! $data->description !!}
                                                </div>
                                                <div class="pt-[18px] 2xl:pt-[25px]">
                                                    <a href="{{url('blog-details/'.$data->slug)}}" class="text-[10px] 2xl:text-[10px] font_inter flex items-center text-white gap-[10px]">
                                                        Read more
                                                        <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.0957 6.00098L10.5957 9.50098C10.2676 9.85645 9.69336 9.85645 9.36523 9.50098C9.00977 9.17285 9.00977 8.59863 9.36523 8.27051L11.3613 6.24707H1.24414C0.751953 6.24707 0.369141 5.86426 0.369141 5.37207C0.369141 4.85254 0.751953 4.49707 1.24414 4.49707H11.3613L9.36523 2.50098C9.00977 2.17285 9.00977 1.59863 9.36523 1.27051C9.69336 0.915039 10.2676 0.915039 10.5957 1.27051L14.0957 4.77051C14.4512 5.09863 14.4512 5.67285 14.0957 6.00098Z" fill="white"/>
                                                        </svg>
                                                    </a>
                                                </div>
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
            <div class="flex justify-center py-6 lg:mt-10">
                <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group w-fit">
                    <!-- Background that moves on hover -->
                    <div
                        class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                    </div>

                    <!-- Text color that changes on hover -->
                    <h6 class="relative z-10 text-white text-[10px] md:text-[12px] 2xl:text-[16px] transition-colors duration-500 group-hover:text-[#072558]">
                        Ask your questions through</h6>
                    <div class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full transition-all duration-500 group-hover:bg-[#072558] group-hover:text-white">
                        <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[16px]">Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.Common.getintouch')

    {{-- explore section --}}
    <div class="explore-section bg-black">
        <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full">
            <div class="flex items-end w-full gap-2 lg:gap-7">
                <h2 class="uppercase text-white font_inter font-semibold text-[30px] md:text-[50px] 2xl:text-[65px] leading-none fifthleft-to-right-animation">
                    @if (isset($home))
                        {{ $home->explore_title }}
                    @endif
                </h2>
                <div class="w-full fifthleft-to-right-width-animation"
                    style="border: 1px solid #FFFFFF8C;margin-bottom: 8px;"></div>
            </div>
            <p class="text-white font_inter font-semibold text-[16px] lg:text-[24px] leading-[1.2] lg:w-[35%] mt-6 fifthleft-to-right-animation">
                @if (isset($home))
                    {{ $home->explore_sub_title }}
                @endif
            </p>

            <div id="exploreSplide" class="award_certificates_s splide splide mt-6 xl:pl-[50px] explore-slider-class z-0">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($explore as $data)
                            <li class="splide__slide">
                                <div class="relative image-card-explore cursor-pointer">
                                    <img class="w-full 2xl:w-[300px] h-full object-cover" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="{{ $data->alt_tag }}">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>



        {{-- <div class="container mx-auto px-5 xl:px-12 py-8 lg:pt-1 lg:pb-16 my-6 z-[99] h-full w-full relative z-50">
            <div class="flex justify-end gap-3 items-center">
                <div class="card-explore-slide-prev-button cursor-pointer">
                    <img class="w-[40px]" src="{{ asset('assets/Button-Previous.png') }}" alt="">
                </div>
                <div class="cursor-pointer card-explore-slide-next-button">
                    <img class="w-[40px]" src="{{ asset('assets/nextbutton.png') }}" alt="">
                </div>
            </div>
        </div> --}}


        {{-- <div class="award_certificates">
            <div class="award_certificates_s splide splide-3 lg:w-full lg:max-w-full">
                <div class="splide__track">
                    <div class="splide__list">
                        @foreach ($explore as $data)
                        <div class="splide__slide">
                            <div class="certs mx-auto bg-white h-24 sm:h-40 md:h-full">
                                <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="{{ $data->alt_tag }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Add the progress bar element -->
                <div class="flex items-center justify-center">
                    <div class="my-carousel-progress w-40 lg:w-72 lg:ml-auto">
                        <div class="my-carousel-progress-bar"></div>
                    </div>

                    <ul class="splide__pagination"></ul>
                </div>

            </div>
        </div> --}}
    </div>

    {{-- <div class="explore-section-dup bg-black ">
        <div class="container mx-auto px-5 xl:px-12 py-8 lg:pt-1 lg:pb-16  z-[99] h-full w-full">
            <div class="center">
                @foreach ($explore as $data)
                    <div class="mx-4">
                        <img class="w-full h-full object-cover" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}" alt="{{ $data->alt_tag }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}

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
        // document.addEventListener('DOMContentLoaded', function () {
        //     const numberElement = document.getElementById('count-number'); // Target number element
        //     const sectionToObserve = document.querySelector('.Navigatesec'); // Section to observe

        //     let hasCounted = false; // Prevent multiple executions

        //     const counterVal = parseInt($('#exp-count').val(), 10); // Parse the counter value safely

        //     // Define IntersectionObserver to monitor visibility
        //     const observer = new IntersectionObserver(function (entries) {
        //         if (entries[0].isIntersecting && !hasCounted) {
        //             hasCounted = true; // Mark as counted
        //             animateCountUp(numberElement, 0, counterVal, 2000); // Trigger count-up animation
        //         }
        //     }, {
        //         threshold: 0.5 // Trigger when 50% of the section is visible
        //     });

        //     // Ensure the element exists before observing
        //     if (sectionToObserve) {
        //         observer.observe(sectionToObserve);
        //     } else {
        //         console.error('Element with class "Navigatesec" not found.');
        //     }
        //     });

// Function to animate the count-up
function animateCountUp(element, start, end, duration) {
    const range = end - start;
    const increment = range / (duration / 16.67); // Approximate frames at 60fps
    let current = start;

    function step() {
        current += increment;
        if (current >= end) {
            current = end; // Ensure it doesn't exceed the target
            element.textContent = Math.round(current); // Final value
        } else {
            element.textContent = Math.round(current); // Update current value
            requestAnimationFrame(step); // Continue animation
        }
    }

    step(); // Start animation
}


            // document.addEventListener('DOMContentLoaded', function() {
            //     const videos = document.querySelectorAll('video');
            //     const playPauseButtons = document.querySelectorAll('.custom-controls');

            //     // Loop through all videos
            //     videos.forEach((video, index) => {
            //         const playPauseButton = playPauseButtons[index]; // Get corresponding play/pause button

            //         // Play video when hovering over the video
            //         video.addEventListener('mouseenter', function() {
            //             video.play();
            //             playPauseButton.querySelector('img').src =
            //                 "{{ asset('assets/pause.png') }}"; // Update button to pause icon
            //         });

            //         // Pause video when mouse leaves the video
            //         video.addEventListener('mouseleave', function() {
            //             video.pause();
            //             playPauseButton.querySelector('img').src =
            //                 "{{ asset('assets/play.png') }}"; // Update button to play icon
            //         });

            //         // Manually toggle play/pause on button click
            //         playPauseButton.addEventListener('click', function() {
            //             if (video.paused) {
            //                 video.play();
            //                 playPauseButton.querySelector('img').src =
            //                     "{{ asset('assets/pause.png') }}"; // Update to pause icon
            //             } else {
            //                 video.pause();
            //                 playPauseButton.querySelector('img').src =
            //                     "{{ asset('assets/play.png') }}"; // Update to play icon
            //             }
            //         });

            //         // Reset to play button when video ends
            //         video.addEventListener('ended', function() {
            //             playPauseButton.querySelector('img').src = "{{ asset('assets/play.png') }}";
            //         });
            //     });
            // });

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

{{-- @section('scripts') --}}

{{-- @endsection --}}

    {{-- slick slider --}}
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('.slick-slider-background').slick({
        //         autoplay: true,
        //         autoplaySpeed: 3000,
        //         fade: true,
        //         speed: 1000,
        //         arrows: false,
        //         dots: false
        //     });
        // });
        // $(document).ready(function() {
            // $('.center').slick({
            //     centerMode: true,
            //     centerPadding: '60px',
            //     slidesToShow: 3,
            //     responsive: [
            //         {
            //         breakpoint: 768,
            //         settings: {
            //             arrows: false,
            //             centerMode: true,
            //             centerPadding: '40px',
            //             slidesToShow: 3
            //         }
            //         },
            //         {
            //         breakpoint: 480,
            //         settings: {
            //             arrows: false,
            //             centerMode: true,
            //             centerPadding: '40px',
            //             slidesToShow: 1
            //         }
            //         }
            //     ]
            // });
        // });
    </script>


    <!-- splide code -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var slides = document.querySelectorAll('#blogSplide .splide__slide');

            if (slides.length > 1) {
                var splide = new Splide('#blogSplide', {
                    type: 'loop',
                    perMove: 1,
                    perPage: 3.5,
                    arrows: false,
                    pagination: false,
                    autoplay: true,
                    interval: 3000,
                    pauseOnHover: false,
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
                            perPage: 3.1,
                            gap: '24px'
                        },
                        1380: {
                            perPage: 3.1    ,
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

        document.addEventListener('DOMContentLoaded', function () {
            var slides = document.querySelectorAll('#testimonial-slider .splide__slide');

            if (slides.length > 1) {
                var splide = new Splide('#testimonial-slider', {
                    type: 'loop',
                    perMove: 1,
                    perPage: 3.3,
                    arrows: false,
                    pagination: false,
                    autoplay: true,
                    interval: 3000,
                    breakpoints: {
                        640: {
                            perPage: 1,
                            gap: '0px',
                        },
                        768: {
                            perPage: 1.9,
                            gap: '8px',
                        },
                        1024: {
                            perPage: 2,
                            gap: '12px',
                        },
                        1280: {
                            perPage: 2.8,
                            gap: '16px',
                        },
                        1580: {
                            perPage: 3.3,
                            gap: '16px',
                        },
                    },
                }).mount();

                document
                    .querySelector('.card-testi-slide-prev-button')
                    .addEventListener('click', function () {
                        splide.go('<');
                    });

                document
                    .querySelector('.card-testi-slide-next-button')
                    .addEventListener('click', function () {
                        splide.go('>');
                    });
            } else {
                console.log('Not enough slides to initialize the slider.');
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const bannerSlider = document.querySelector('#home-banner-slider .splide__list');
            const slides = bannerSlider.querySelectorAll('.splide__slide');

            if (slides.length > 1) {
                const splide = new Splide('#home-banner-slider', {
                    type: 'fade',
                    autoplay: true,
                    interval: 3000,
                    speed: 1000,
                    arrows: false,
                    pagination: false,
                    pauseOnHover: false,
                    rewind: true,
                });

                splide.mount();

                splide.on('move', (newIndex) => {
                    if (newIndex === slides.length - 1) {
                        setTimeout(() => {
                            splide.go(0);
                        }, 3000);
                    }
                });
            } else {
                console.warn('Not enough slides for a slider.');
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('#exploreSplide', {
                pagination: false,
                arrows: false,
                perPage: 4,
                gap: '1rem',
                pauseOnHover: false,
                autoplay: true,
                interval: 2000,
                type: 'slide',
                clones: 2,
                focus: 1,
                rewind: true,
                updateOnMove: true,
                pauseOnHover: false,
                pauseOnFocus: false,
                rewindSpeed: 1000,
                omitEnd: true,
                breakpoints: {
                    640: { perPage: 3 },
                    768: { perPage: 1.5 },
                    1024: { perPage: 2},
                    1280: { perPage: 3.9 },
                    1380: { perPage: 3.9 },
                    1580: { perPage: 4.3 },
                }
            }).mount();

            splide.on('mounted moved', function () {
                scaleCenterSlide(splide);
            });

            function scaleCenterSlide(splideInstance) {
                const slides = splideInstance.Components.Elements.slides;

                slides.forEach((slide, index) => {
                    slide.style.transform = 'scale(1)';
                    slide.style.transition = 'transform 0.3s';
                });

                // Find the active slide and scale it
                const activeIndex = splideInstance.index;
                const centerSlide = slides[activeIndex];
                if (centerSlide) {
                    centerSlide.style.transform = 'scale(1.2)';
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const splide = new Splide('#serviceCarousel', {
                type: 'slide',
                perPage: 4,
                autoplay: true,
                interval: 2000,
                pauseOnHover: false,
                perMove: 1,
                rewind: true,
                breakpoints: {
                    1024: {
                        perPage: 3,
                    },
                    767: {
                        perPage: 1,
                    },
                },
                gap: '1rem',
                pagination: false,
                arrows: false,
            }).mount();

            document.querySelector('.card-ourSer-slide-prev-button').addEventListener('click', function () {
                splide.go('<');
            });

            document.querySelector('.card-ourSer-slide-next-button').addEventListener('click', function () {
                splide.go('>'); // Navigate to the next slide
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
                const counterElement = document.querySelector("#journeyExperience span[data-count]");
                if (counterElement) {
                    const targetValue = parseInt(counterElement.getAttribute("data-count"), 10);

                    const startCounting = () => {
                        let currentValue = 0;
                        const duration = 2000; // Duration of animation in milliseconds
                        const increment = targetValue / (duration / 16); // Increment value per frame

                        const countUp = () => {
                            currentValue += increment;
                            if (currentValue >= targetValue) {
                                counterElement.textContent = targetValue; // End at the target value
                            } else {
                                counterElement.textContent = Math.floor(currentValue);
                                requestAnimationFrame(countUp);
                            }
                        };

                        countUp();
                    };

                    // Use Intersection Observer to trigger the animation
                    const observer = new IntersectionObserver(
                        (entries, observer) => {
                            entries.forEach((entry) => {
                                if (entry.isIntersecting) {
                                    startCounting();
                                    observer.unobserve(counterElement); // Stop observing after animation starts
                                }
                            });
                        },
                        { threshold: 0.5 } // Animation starts when 50% of the section is visible
                    );

                    observer.observe(counterElement);
                }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const openButtons = document.querySelectorAll('[data-popup-open]');
            const closeButtons = document.querySelectorAll('[data-popup-close]');

            openButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const popupName = this.getAttribute('data-popup-open');
                    const popup = document.querySelector(`[data-popup="${popupName}"]`);
                    if (popup) {
                        popup.style.display = 'flex'; // Show the popup
                    }
                });
            });

            closeButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const popupName = this.getAttribute('data-popup-close');
                    const popup = document.querySelector(`[data-popup="${popupName}"]`);
                    if (popup) {
                        popup.style.display = 'none'; // Hide the popup
                    }
                });
            });
        });
    </script>

    <script>
        function togglePlay(button) {
            const video = button.closest('.video-grade').querySelector('video'); // Select the video element
            const playIcon = button.querySelector('.play-icon'); // Select the play icon

            if (video.paused) {
                video.play(); // Play the video
                playIcon.style.display = 'none'; // Hide the play icon when playing
            } else {
                video.pause(); // Pause the video
                playIcon.style.display = 'block'; // Show the play icon when paused
            }
        }
    </script>

    {{-- gsap animtion --}}
    <script>

        gsap.registerPlugin(ScrollTrigger);

        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);
            gsap.to(".flag-img-contact", {
                scrollTrigger: {
                    trigger: ".contact-US-banner",
                    start: "top center",
                    toggleActions: "play none none none",
                },
                duration: 2,
                top: "4px",
                opacity: 1,
                ease: "bounce.out",
            });
        });

        gsap.utils.toArray("[data-animate]").forEach((element) => {
            gsap.fromTo(
                element,
                {
                    opacity: 0,
                    y: 50,
                },
                {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: element,
                        start: "top 80%",
                        end: "bottom 60%",
                        toggleActions: "play none none none",
                    },
                }
            );
        });

        const heading = document.querySelector("#animated-heading");
        const letters = heading.querySelectorAll("span");

        gsap.fromTo(
            letters,
            {
                opacity: 0,
                y: 50,
            },
            {
                opacity: 1,
                y: 0,
                stagger: 0.05,
                duration: 0.8,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: heading,
                    start: "top 80%",
                },
            }
        );

        gsap.utils.toArray("[data-animate-left]").forEach((element) => {
            gsap.fromTo(
                element,
                {
                    opacity: 0, // Start invisible
                    x: -100,    // Start from left
                },
                {
                    opacity: 1,       // Fade in
                    x: 0,             // Move to the original position
                    duration: 1.5,    // Animation duration
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: element,   // Element to watch
                        start: "top 80%",   // Trigger when the top of the element reaches 80% of the viewport
                        toggleActions: "play none none none", // Play the animation only once
                    },
                }
            );
        });

        const tl = gsap.timeline({
    scrollTrigger: {
        trigger: ".homeBanner",
        start: "top 80%",
        toggleActions: "play none none none",
    }
});

// First animation: `.banner-container-elem-bottom-to-top`
tl.set(".banner-container-elem-bottom-to-top", {
    y: 100, // Starting position (100px below)
    opacity: 0, // Hidden initially
}).to(".banner-container-elem-bottom-to-top", {
    y: 0, // Move to original position
    scale: 1,
    opacity: 1,
    duration: 2,
    ease: "power2.out",
});

// Second animation: `.banner-container-elem`, starts after the first
tl.set(".banner-container-elem", {
    x: -100, // Starting position (100px to the left)
    opacity: 0, // Hidden initially
}).to(".banner-container-elem", {
    x: 0, // Move to its original position
    scale: 1,
    opacity: 1,
    duration: 2,
    ease: "power2.out"
}, "+=0.5"); // Delay of 0.5 seconds after the first animation


        gsap.to('.award_certificates_s .splide__slide', {
            opacity: 1,
            y: 0,
            duration: 0.3,
            stagger: 0.1,
            scrollTrigger: {
                trigger: '.award_certificates',
                start: 'top +=120%',
            }
        })

        // gsap.to(".banner-contain-text", {
        //     scrollTrigger: {
        //         trigger: ".homeBanner",
        //         start: "top 80%",
        //         toggleActions: "play none none none"
        //     },
        //     x: 0,
        //     scale: 1,
        //     opacity: 1,
        //     duration: 0.5,
        //     ease: "power2.out"
        // });

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

        document.addEventListener("DOMContentLoaded", function () {
            gsap.fromTo("#certificateSection",
            {
                y: -200,
                opacity: 0
            },
            {
                y: 0,
                opacity: 1,
                duration: 1.5,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "#certificateSection",
                    start: "top 80%",
                    end: "bottom top",
                    toggleActions: "play none none none"
                },
            }
        );
        });
    </script>
@endsection
