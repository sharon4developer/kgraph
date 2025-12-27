@extends('layouts.main')
@section('content')


    <link rel="stylesheet" type="text/css" href="{{ asset('quill/ql-front.css') }}">
    <style>
        .services-grade {
            background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
        }

        .servicesIIner-banner {
            background-image: url(/assets/servicesinner.jpg) !important;
            /* background-position-y: center;
                                                                                                                                                                    background-position-x: center; */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .services-banner-overlay {
            background: linear-gradient(180deg, #000000 0%, #113165ab 100%);
            height: 100%;
        }

        .services-inner>h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
        }

        .services-inner>h2 {
            font-size: 16px;
        }

        .services-inner>h3 {
            font-size: 14px;
        }

        .services-inner>h4 {
            font-size: 12px;
        }

        .services-inner>h5,
        h6 {
            font-size: 10px;
        }

        .services-inner>p,
        li {
            font-size: 14px;
        }

        .services-inner>li {
            list-style-type: disc;
        }

        .dontwaitwrpr {
            background: linear-gradient(88deg, #000000 0%, rgba(0, 0, 0, 0) 100%);
        }

        .bg-whitefader-garde {
            background: linear-gradient(90deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
            position: relative;
        }

        .blufader-grade {
            background: linear-gradient(90deg, #072558 0%, rgba(7, 37, 88, 0) 100%);
        }

        .Realize {
            background-image: url(/assets/whitefader.png) !important;
            background-size: cover;
        }


        .tab-name {
            position: relative;
            cursor: pointer;
            padding-bottom: 0.5rem;
        }

        .tab-name.active {
            font-weight: bold;
            color: #000000;
            /* background-color: aliceblue; */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tab-names {
            display: flex;
            position: relative;
            /* border-bottom: 2px solid rgba(255, 255, 255, 0.2); */
        }

        .tab-indicator {
            position: absolute;
            height: 2px;
            /* background-color: white; */
            transition: left 0.3s ease, width 0.3s ease;
        }

        .tab-content {
            display: none;
            /* opacity: 0;  */
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .tab-content.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        ul.tabs {
            margin: 0px;
            padding: 0px;
            list-style: none;
        }

        ul.tabs li {
            color: #ededed;
            background: #04152f;
            border-radius: 30px;
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
        }

        ul.tabs li.current {
            font-weight: 800;
            color: #062358;
        }

        .tab-content {
            display: none;
            /* background: #ededed; */
            padding: 15px;
        }

        .tab-content.current {
            display: inherit;
        }

        .tab-link {
            color: #ffffff;
            cursor: pointer;
            padding: 10px 15px;
            transition: color 0.3s ease;
        }

        .tab-link.current {
            border-radius: 30px;
            background: #ededed;
            color: #062358;
        }

        .tab-content {
            display: none;
            /* opacity: 0; */
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .tab-content.current {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .tab-content.current ul li {
            list-style-type: disc;
        }

        .tab-content.current ul li,
        .tab-content.current ol li {
            margin-left: 10px;
        }

        .tab-content.current ol li {
            list-style-type: decimal;
        }

        @media (max-width: 1023px) {
            .tab-names ul.tabs li {
                white-space: nowrap;
                /* font-size: 10px; */
            }

            .tab-names ul.tabs {
                display: flex;
                overflow: scroll;
                padding-right: 6px;
            }
        }

        @media (max-width: 350px) {
            .tab-content>* {
                max-width: 280px;
            }
        }

        @media (min-width: 350px) and (max-width: 650px) {
            .tab-content>* {
                max-width: 320px;
            }
        }

        @media (max-width: 650px) {
            .tab-content>* {
                overflow-x: hidden;
            }
        }
    </style>



    {{-- services banner --}}
    <div class="relative h-full servicesIIner-banner">
        <!-- Background Image -->
        <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $services->banner_image }}"
            alt="Background Image" class="absolute inset-0 z-0 object-cover w-full h-full">

        <div class="relative z-10 h-full bg-black bg-opacity-50 services-banner-overlay">
            <!-- Overlay for better contrast -->
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                <div class="text-white text-[12px] font_inter font-semibold flex items-center gap-2">
                    <a href="{{ url('services') }}">Services</a> > <a
                        class="cursor-pointer block text-ellipsis whitespace-nowrap overflow-hidden w-[150px]">{{ $services->title }}</a>
                </div>
                <div class="flex flex-col items-center justify-center my-10 text-center text-white">
                    <h1 class="uppercase font_inter font-semibold text-3xl lg:text-[40px]">{{ $services->title }}</h1>
                    <p class="lg:w-1/2 mt-5 font_inter font-semibold text-sm lg:text-[18px]">
                        {{ $services->sub_title }}
                    </p>
                </div>
                <div class="flex items-center justify-center">
                    <div
                        class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group">
                        <div
                            class="absolute inset-0 left-0 w-full transition-all duration-500 ease-out bg-blue-600 group-hover:left-full">
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

    {{-- Realize can section --}}
    <div class="">
        <div class="Realize">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[3%]">
                <div class="lg:w-1/2 font_inter">
                    <h2 class="font-semibold text-xl lg:text-4xl text-[#062358]">{{ $services->inner_title }}</h2>
                    <p>{!! $services->description !!}</p>
                    <div class="px-5 py-3 my-6 text-white rounded-md blufader-grade">Key Highlight</div>
                    <div>
                        <ul class="list-disc pl-5 text-[#062358] leading-normal">
                            @if (count($services->SubService))
                                @foreach ($services->SubService as $SubService)
                                    @if ($SubService->status == 1)
                                        <li class="py-1"><a
                                                href="{{ url('sub-service-details/' . $SubService->slug) }}">{{ $SubService->title }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($services->ServicePoint as $ServicePoint)
                                    @if ($ServicePoint->status == 1)
                                        <li class="py-1">{{ $ServicePoint->title }}</li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- tab section --}}
    <div class="tabsection bg-[#062358] overflow-hidden">
        <div class="container flex flex-col items-start justify-center w-full h-full px-5 py-8 mx-auto text-white lg:px-12">
            <!-- Tab Names -->
            <div class="tab-names flex flex-col relative  max-w-[100vw] scrollbar-hidden">
                <ul class="flex-wrap items-center gap-3 tabs scrollbar-hidden lg:flex">
                    @foreach ($services->ServicePoint as $key => $ServicePoint)
                        @if ($ServicePoint->status == 1)
                            <li class="lg:whitespace-nowrap tab-link {{ $key === 0 ? 'current' : '' }}"
                                data-tab="tab-{{ $key + 1 }}">{{ $ServicePoint->title }}</li>
                        @endif
                    @endforeach
                </ul>
                @foreach ($services->ServicePoint as $key => $ServicePoint)
                    @if ($ServicePoint->status == 1)
                        <div id="tab-{{ $key + 1 }}"
                            class="tab-content mt-4 {{ $key === 0 ? 'current' : 'hidden lg:w-full' }}">
                            {!! $ServicePoint->description !!}
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>

    {{-- tab section
    <div class="lg:hidden new bg-[#062358] overflow-hidden">
        <div
            class="container mx-auto px-5 lg:px-12 h-full w-[89vw] py-8 flex justify-center items-start flex-col text-white">

            <div id="splide" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($services->ServicePoint as $key => $ServicePoint)
                            @if ($ServicePoint->status == 1)
                                <li class="splide__slide">
                                    <div class="slide-content">
                                        <h3 class="font-bold text-white text-4xl w-[80vw]">{{ $ServicePoint->title }}</h3>
                                        <div id="tab-{{ $key + 1 }}" class="w-[80vw] my-8">
                                            {!! $ServicePoint->description !!}
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
    </div> --}}

    {{-- faq --}}
    <div class="faq bg-[#062358]">
        {{-- <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:pt-[2%] lg:pb-[5%]">
            <div>
                <div class="w-full py-2 my-8 rounded-md services-grade">
                    <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">other important FAQs</h2>
                </div>
            </div>
        </div> --}}

        <div class="faq-section bg-[#F7FCFF]">
            <div class="container w-full h-full px-5 py-8 mx-auto xl:px-12 lg:py-16">
                <div class="flex items-center justify-center">
                    <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold uppercase">other important FAQs
                    </h2>
                </div>
                <div class="mt-8 faq-parent lg:px-[10%]">

                    @foreach ($services->ServiceFaq as $key => $ServiceFaq)
                        @if ($ServiceFaq->status == 1)
                            <div class="p-6 my-3 bg-white accordion rounded-2xl lg:my-0 h-fit">
                                <div class="flex items-center justify-between cursor-pointer accordion-header">
                                    <h6>{{ $ServiceFaq->title }}</h6>
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
                                        <svg class="hidden icon-expanded" width="40" height="40" viewBox="0 0 40 40"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="20" cy="20" r="20" fill="#072558" />
                                            <path
                                                d="M26 22C26 22.2813 25.9062 22.5313 25.7188 22.7188C25.3438 23.125 24.6875 23.125 24.3125 22.7188L20 18.4375L15.7188 22.7188C15.3438 23.125 14.6875 23.125 14.3125 22.7188C13.9062 22.3438 13.9062 21.6875 14.3125 21.3125L19.3125 16.3125C19.6875 15.9063 20.3438 15.9063 20.7188 16.3125L25.7188 21.3125C25.9062 21.5 26 21.75 26 22Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="overflow-hidden transition-all duration-500 ease-out accordion-content max-h-0">
                                    {!! $ServiceFaq->description !!}
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
        </div>
    </div>




    {{-- don't wait --}}
    <div class="dontwait bg-[#062358] h-[30vh] w-full">
        <div class="w-full h-full dontwaitwrpr">
            <div
                class="container flex flex-col items-start justify-center w-full h-full px-5 py-8 mx-auto text-white lg:px-12">
                <h4 class="text-lg font-medium font_inter">Don’t wait. Begin your visa application today!</h4>
                <a href="{{ url('eligibility-check') }}"
                    class="my-4 border border-white rounded-full px-5 py-2 text-[14px] hover:bg-white hover:border-black hover:text-black ease-linear duration-300 hover:font-semibold">FREE
                    ELIGIBILITY CHECK
                </a>
            </div>
        </div>
    </div>

    {{-- get in touch section --}}
    @include('frontend.Common.getintouch')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Ensure only the first tab is active on load
            $('ul.tabs li:first-child').addClass('current');
            $('.tab-content').hide(); // Hide all tab content
            $('.tab-content:first').show(); // Show only the first tab content

            // Handle tab click events
            $('ul.tabs li').click(function() {
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').hide(); // Hide all tab content

                $(this).addClass('current');
                $("#" + tab_id).show(); // Show the selected tab content

                // Center align the current tab
                centerTab($(this));
            });

            // Function to center align the active tab
            function centerTab($tab) {
                var $container = $tab.closest('ul.tabs'); // Parent container (scrollable element)
                var containerWidth = $container.outerWidth(); // Width of the container
                var tabWidth = $tab.outerWidth(); // Width of the tab
                var tabOffsetLeft = $tab.position().left; // Position of the tab relative to container
                var currentScroll = $container.scrollLeft(); // Current scroll position

                // Calculate the ideal scroll position to center the tab
                var scrollPosition = currentScroll + tabOffsetLeft + tabWidth / 2 - containerWidth / 2;

                // Ensure the calculated scrollPosition does not exceed scrollable boundaries
                var maxScrollLeft = $container[0].scrollWidth - containerWidth; // Maximum scrollable left position
                if (scrollPosition < 0) {
                    scrollPosition = 0; // Prevent scrolling before the start
                } else if (scrollPosition > maxScrollLeft) {
                    scrollPosition = maxScrollLeft; // Prevent scrolling beyond the container
                }

                // Smoothly scroll the container
                $container.animate({
                    scrollLeft: scrollPosition
                }, 300); // 300ms animation
            }
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
    </script>

    {{-- <script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const splide = new Splide('#splide', {
                type: 'fade',
                rewind: true,
                perPage: 1,
                autoplay: true,
                interval: 4000,
                arrows: false,
                pagination: false,
                pauseOnHover: false,
            });

            splide.on('mounted active', () => {

                const activeSlide = document.querySelector('.splide__slide.is-active .slide-content');

                if (activeSlide) {
                    const elementsToAnimate = activeSlide.querySelectorAll('h3, div');
                    gsap.set(elementsToAnimate, {
                        opacity: 0,
                        y: 50
                    });

                    gsap.to(elementsToAnimate, {
                        opacity: 1,
                        y: 0,
                        duration: 1,
                        ease: 'power3.out',
                        stagger: 0.2
                    });
                }
            });

            splide.mount();
        });
    </script>



@endsection
