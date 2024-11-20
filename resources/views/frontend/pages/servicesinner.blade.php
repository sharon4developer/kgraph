@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js"></script>

    <style>
        .services-grade {
            background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
        }

        .servicesIIner-banner {
            background-image: url(assets/servicesinner.jpg) !important;
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
            background-image: url(assets/whitefader.png) !important;
            background-size: cover;
        }


        .tab-name {
            position: relative;
            cursor: pointer;
            padding-bottom: 0.5rem; /* Space for the underline */
        }

        .tab-name.active {
            font-weight: bold;
            color: #000000;
            background-color: aliceblue;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tab-names {
            display: flex;
            position: relative;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .tab-indicator {
            position: absolute;
            height: 2px;
            background-color: white;
            transition: left 0.3s ease, width 0.3s ease;
        }
        .tab-content {
            display: none; /* Hide all content by default */
            opacity: 0; /* For smooth transition effect */
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .tab-content.active {
            display: block; /* Show only the active content */
            opacity: 1;
            transform: translateY(0);
        }
        /* @media (max-width: 768px) {
            .tab-name.active {
                color: #FF6347; /* Change active text color for mobile/tablet (example: tomato) */
            }
        } */


    </style>



    {{-- services banner --}}
    <div class="relative servicesIIner-banner h-full">
        <!-- Background Image -->
        <img src="{{ asset('assets/servicesinner.jpg') }}" alt="Background Image"
            class="absolute inset-0 w-full h-full object-cover z-0">

        <div class="services-banner-overlay relative z-10 bg-black bg-opacity-50 h-full">
            <!-- Overlay for better contrast -->
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                <div class="text-white text-[12px] font_inter font-semibold">
                    <a href="#">Study</a> > <a href="#">Study in Canada</a>
                </div>
                <div class="text-center text-white my-10 flex flex-col justify-center items-center">
                    <h1 class="uppercase font_inter font-semibold text-3xl lg:text-[40px]">{{ $services->title }}</h1>
                    <p class="lg:w-1/2 mt-5 font_inter font-semibold text-sm lg:text-[18px]">
                        {{ $services->sub_title }}
                    </p>
                </div>
                <div class="flex justify-center items-center">
                    <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 pr-2 overflow-hidden group">
                        <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                        </div>
                        <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Let's turn your vision into reality.
                        </h6>
                        <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                            <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
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
                    <h2 class="font-semibold text-xl lg:text-4xl text-[#062358]">Realize Your Canadian Education Goals</h2>
                    <div class="blufader-grade text-white my-6 px-5 rounded-md py-3">Key Highlight</div>
                    <div>
                        <ul class="list-disc pl-5 text-[#062358] leading-normal">
                            @foreach ($services->ServicePoint as $ServicePoint)
                                <li class="py-1">{{ $ServicePoint->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

     {{-- tab section --}}
     <div class="tabsection bg-[#062358] overflow-hidden">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 flex justify-center items-start flex-col text-white">
            <!-- Tab Names -->
            <div class="tab-names flex relative overflow-scroll max-w-[100vw] scrollbar-hidden">
                @foreach ($services->ServicePoint as $key => $ServicePoint)
                    <div  class="tab-name card whitespace-nowrap cursor-pointer w-full py-2 text-center text-white font_inter text-[20px] px-4 font-extrabold capitalize {{ $key === 0 ? 'active' : '' }}"
                        data-tab="tab-{{ $key }}">
                        {{ $ServicePoint->title }}
                    </div>
                @endforeach
                <!-- Active Tab Indicator -->
                <div class="hidden lg:flex tab-indicator absolute bottom-0 left-0 h-1 bg-white transition-all duration-300"></div>
            </div>

            <!-- Tab Contents -->
            <div class="tab-contents mt-4">
                @foreach ($services->ServiceFaq as $key => $ServiceFaq)
                    <div
                        class="tab-content pl-5 transition-all duration-300 ease-in-out {{ $key === 0 ? 'active' : 'hidden' }}"
                        id="tab-{{ $key }}">
                        <h3 class="text-[12px] font-semibold lg:text-[14px] xl:text-2xl lg:font-medium">{{ $ServiceFaq->title }}</h3>
                        <div class="pt-3 lg:w-1/2">{{ $ServiceFaq->description }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    {{-- don't wait --}}
    <div class="dontwait bg-[#062358] h-[30vh] w-full">
        <div class="dontwaitwrpr h-full w-full">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 flex justify-center items-start flex-col  text-white">
                <h4 class="font_inter text-lg font-medium">Don’t wait. Begin your visa application today!</h4>
                <a href="{{ url('eligibility-check') }}"
                    class="my-4 border border-white rounded-full px-5 py-2 text-[14px] hover:bg-white hover:border-black hover:text-black ease-linear duration-300 hover:font-semibold">FREE
                    ELIGIBILITY CHECK
                </a>
            </div>
        </div>
    </div>

    {{-- get in touch section --}}
    <div class="get-in-Touch bg-[#051b3b] py-28">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full">
            <div class="flex justify-center items-center flex-col ">
                <div class="flex flex-col-reverse md:flex-row items-center">
                    <h2 class="font_inter font-semibold text-4xl text-center md:text-left gettouch uppercase gradient-text">
                        Get IN TOUCH WITH US</h2>
                    <img class="w-[70px]" src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="">
                </div>
                <p
                    class="text-white py-6 paddadjuster md:w-3/5 lg:w-1/2 text-center font_inter font-semibold lg:text-[22px] gettouchpara">
                    Labaton Keller Sucharow is elevating excellence through innovation, client service, and teamwork.</p>
                <div
                    class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 lg:pr-2 overflow-hidden group">
                    <!-- Background animation using pseudo-element -->
                    <div
                        class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-0 group-hover:w-full w-0 left-full">
                    </div>

                    <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Have any doubts</h6>
                    <div
                        class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-sm cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabNames = document.querySelectorAll('.tab-name');
            const tabContents = document.querySelectorAll('.tab-content');
            const tabIndicator = document.querySelector('.tab-indicator');

            // Initialize the tab indicator position and size
            function updateIndicator(tab) {
                const rect = tab.getBoundingClientRect();
                const containerRect = tab.parentElement.getBoundingClientRect();
                tabIndicator.style.left = `${rect.left - containerRect.left}px`;
                tabIndicator.style.width = `${rect.width}px`;
            }

            // Set up event listeners for tab switching
            tabNames.forEach((tab, index) => {
                if (index === 0) updateIndicator(tab); // Set initial position for the indicator

                tab.addEventListener('click', () => {
                    // Remove active class from all tabs and hide all contents
                    tabNames.forEach((t) => t.classList.remove('active'));
                    tabContents.forEach((content) => content.classList.remove('active'));

                    // Add active class to the clicked tab and show respective content
                    tab.classList.add('active');
                    const tabId = tab.getAttribute('data-tab');
                    const activeContent = document.getElementById(tabId);
                    activeContent.classList.add('active');

                    // Move the indicator
                    updateIndicator(tab);
                });
            });

            // Recalculate indicator position on window resize
            window.addEventListener('resize', () => {
                const activeTab = document.querySelector('.tab-name.active');
                if (activeTab) {
                    updateIndicator(activeTab);
                }
            });
        });
    </script>
@endsection
