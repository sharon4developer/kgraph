@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <style>
        .services-grade {
            background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
        }

        .packaginner-banner {
            background-image: url(assets/home_Banner/bannerCity.jpg) !important;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .packages-banner-overlay {
            background: #00000099;
            height: 100%;
        }
    </style>

    {{-- services banner --}}

@php
$study2 = $study;

@endphp

    <div class="packaginner-banner h-full relative overflow-hidden">
        @foreach ($study as $data)
        @if ($loop->first)  {{-- Ensures the image only appears once --}}
            <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->study_banner_image }}"
                alt="" class="absolute top-0 left-0 w-full h-full object-cover z-[-1] object-top" alt="Banner City">
        @endif
        <div class="packages-banner-overlay">
            <div id="toptobottom"
                class="opacity-0 translate-y-20 container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                <div class="text-white text-[12px] font_inter font-semibold">
                    <a href="#">Study</a> > <a href="#">Study in Canada</a>
                </div>
                <div class="text-center text-white my-10 flex flex-col justify-center items-center">
                    <h1 class="font_inter font-semibold text-3xl lg:text-[40px] uppercase">
                        {{ $data->study_banner_title }}</h1>
                    <p class="lg:w-1/2 mt-5 font_inter font-medium text-sm lg:text-[14px]">
                        {{ $data->banner_description }}
                    </p>
                </div>
                <div class="flex justify-center items-center lg:mt-16">
                    <div class="w-fit">
                        <div
                            class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-[4.5px] pl-6 pr-1 overflow-hidden group">
                            <div
                                class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                            </div>
                            <h6 class="relative z-10 text-white text-[10px] md:text-[14px] 2xl">Let's turn your vision
                                into reality.</h6>
                            <div
                                class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:py-[4px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                                <a href="{{ url('contact-us') }}"
                                        class="h-full text-[12px] lg:text-[16px] font-semibold">Connect Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     </div>

     <div class="bg-[#072358] overflow-hidden">
        <div class="bg-[linear-gradient(140deg,#000000_0%,rgba(0,0,0,0)_100%)]">
            <div
                class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[3%] flex flex-col-reverse lg:flex-row gap-4 md:gap-0 items-start justify-between">
                <div leftto
                    class="md:w-1/2 flex flex-col md:h-[400px] justify-between z-10 relative opacity-0 -translate-x-20">
                    <div>
                        <h3 class="font-bold text-4xl text-white uppercase mb-5">{{ $data->sub_content_title }}</h3>
                        <p class="font_inter text-sm font-semibold mb-5 text-white clamp-text-twelve lg:w-[80%]">
                            {{ $data->sub_content_description }}
                        </p>
                    </div>
                    <button
                        class="font_inter text-sm font-semibold mb-3 text-white border border-white rounded-full w-fit uppercase px-7 py-2 hover:bg-white hover:text-black hover:border-slate-600 transform duration-200 ease-linear">
                        Learn More
                    </button>
                </div>

                <div rightto class="h-[400px] md:w-1/2 z-10 relative opacity-0 translate-x-20">



                        <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->sub_image }}"
                            alt="">





                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="bg-[#062358] overflow-hidden">
        <div class="relative">
            <img class="absolute right-[-20%] top-[-10%] w-[970px]" src="{{ asset('assets/blue-glow-image.png') }}"
                alt="">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[3%] text-white relative z-10">
                <div bottomtotoppara class="lg:w-1/2 opacity-0 translate-y-20">
                    <h2 class="font-semibold font_inter text-3xl capitalize mb-3">{{ $data->package_title }}</h2>
                    <p class="text-sm font-medium font_inter mb-3">{{ $data->package_description }}
                    </p>
                </div>

                <div class="grid cards grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-[64px] gap-4">

                    @foreach ($study as $study)
                    @foreach ($study->packages as $package)

                        <div class="bg-white card rounded-[26px] text-[#062358] p-6">
                            <div class="mb-3">
                                <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M35 0C15.701 0 0 15.701 0 35C0 54.299 15.701 70 35 70C54.299 70 70 54.299 70 35C70 15.701 54.299 0 35 0ZM7 35C7 31.8535 7.546 28.833 8.5085 26.0085L14 31.5L21 38.5V45.5L28 52.5L31.5 56V62.7585C17.7135 61.026 7 49.252 7 35ZM57.155 52.0555C54.8695 50.2145 51.4045 49 49 49V45.5C49 43.6435 48.2625 41.863 46.9497 40.5503C45.637 39.2375 43.8565 38.5 42 38.5H28V28C29.8565 28 31.637 27.2625 32.9497 25.9497C34.2625 24.637 35 22.8565 35 21V17.5H38.5C40.3565 17.5 42.137 16.7625 43.4497 15.4497C44.7625 14.137 45.5 12.3565 45.5 10.5V9.0615C55.748 13.223 63 23.275 63 35C62.9994 41.1764 60.943 47.177 57.155 52.0555Z"
                                        fill="#062358" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="mb-3 capitalize font_inter font-bold text-xl">

                                    <p>{{ $package->package_list_title }}</p>
                                </h3>
                                <p class="clamp-text-seven font_inter text-sm">{{ $package->package_list_description }}</p>
                            </div>
                        </div>
                    @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <div class="bg-[#072358] overflow-hidden">
        <div class="bg-[linear-gradient(140deg,#000000_0%,rgba(0,0,0,0)_100%)] relative z-10">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[3%]">
                <h3 righttotext class="font-bold text-4xl text-white uppercase mb-5 opacity-0 translate-x-2 0">Top Cities
                    Preferred by students in Canada</h3>
                <div lefttoslider class="mt-[4%] opacity-0 -translate-x-20">
                    <div id="studyimage-slider" class="splide" aria-label="Image Slider">
                        <div class="splide__track">
                            <ul class="splide__list">

                                @foreach ($study2 as $demo)

                                @foreach ($demo?->cities ?? [] as $city)
                                    @if (isset($city->cities_list_image))
                                            <li class="splide__slide">
                                                <img class="h-[200px] md:h-[260px] w-full md:w-[430px] rounded-[25px] object-cover"
                                                     src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $city->cities_list_image }}"
                                                     alt="">
                                            </li>
                                            @endif
                                            @endforeach
                                        @endforeach
                            </ul>

                        </div>
                    </div>

                    <!-- Custom Navigation Buttons -->
                    <div class="flex justify-center items-center gap-5 mt-7">
                        <div><button id="prev-slide"><img class="w-[50px]" src="{{ asset('assets/Button-Previous.png') }}"
                                    alt=""></button></div>
                        <div><button id="next-slide"><img class="w-[50px]" src="{{ asset('assets/nextbutton.png') }}"
                                    alt=""></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- faq section --}}
    <div class="faq-section bg-[#F7FCFF]  overflow-hidden">
        <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full">
            <div class="flex justify-center items-center flex-col">
                <h2 class="font_aktiv font-bold text-[18px] faqSectHead text-[#07245A]">
                    Have Any Questions?
                </h2>
                <div class="my-6">
                    <h2 class="font_aktiv font-bold text-[32px] faqSectHeading text-[#07245A]">
                        FAQs ?
                    </h2>
                    <img class="mt-[-11px] w-[100px]" src="{{ asset('assets/home_Banner/underlinefaq.png') }}"
                        alt="">
                </div>
            </div>
            <div class="mt-8 faq-parent lg:px-[10%]">
                @foreach ($data->faqs as $faq)
                    <div class="accordion bg-white rounded-2xl my-3 lg:my-0 h-fit p-6">
                        <div class="accordion-header flex justify-between items-center  cursor-pointer">
                            <h6>{{ $faq->faq_question }}</h6>
                            <div class="icon">
                                <!-- Collapsed Icon -->
                                <svg class="icon-collapsed" width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                            {{ $faq->faq_answer }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center py-6 lg:mt-10">
                <div
                    class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group w-fit">
                    <!-- Background that moves on hover -->
                    <div
                        class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                    </div>

                    <!-- Text color that changes on hover -->
                    <h6
                        class="relative z-10 text-white text-[10px] md:text-[12px] 2xl:text-[16px] transition-colors duration-500 group-hover:text-[#072558]">
                        Ask your questions through</h6>
                    <div
                        class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full transition-all duration-500 group-hover:bg-[#072558] group-hover:text-white">
                        <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[16px]">Email</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('#studyimage-slider', {
                type: 'loop',
                perPage: 3,
                perMove: 1,
                gap: 20,
                pagination: false,
                arrows: false,
                autoplay: true,
                interval: 3000,
                pauseOnHover: false,
                pauseOnFocus: false,
                breakpoints: {
                    1024: {
                        perPage: 2,
                        gap: 15
                    },
                    768: {
                        perPage: 1,
                        gap: 10
                    },
                }
            });

            // Custom button controls
            document.getElementById('prev-slide').addEventListener('click', function() {
                splide.go('<'); // Move to the previous slide
            });

            document.getElementById('next-slide').addEventListener('click', function() {
                splide.go('>'); // Move to the next slide
            });

            splide.mount();
        });

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

        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);

            gsap.to("#toptobottom", {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "#toptobottom",
                    start: "top 80%", // Starts animation when 80% of the element is in view
                    toggleActions: "play none none none"
                }
            });

            gsap.to("[leftto]", {
                opacity: 1,
                x: 0,
                duration: 1.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "[leftto]",
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });

            gsap.to("[rightto]", {
                opacity: 1,
                x: 0,
                duration: 1.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "[rightto]",
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });

            gsap.to("[bottomtotoppara]", {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "[bottomtotoppara]",
                    start: "top 80%", // Starts animation when 80% of the element is in view
                    toggleActions: "play none none none"
                }
            });

            gsap.to("[righttotext]", {
                opacity: 1,
                x: 0,
                duration: 1.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "[righttotext]",
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });

            gsap.to("[lefttoslider]", {
                opacity: 1,
                x: 0,
                duration: 1.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "[lefttoslider]",
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });

            gsap.from(".card", {
                opacity: 0,
                y: 50,
                duration: 1,
                stagger: 0.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: ".cards",
                    start: "top 80%",
                    toggleActions: "play none none reverse"
                }
            });

        });
    </script>
@endsection
