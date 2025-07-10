@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/ql-front.css') }}">
    <style>
        .services-grade {
            background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
        }

        .servicesIIner-banner {
            background-image: url(/assets/servicesinner.jpg) !important;
            background-position-x: center;
            */ background-size: cover;
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
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tab-names {
            display: flex;
            position: relative;
        }

        .tab-indicator {
            position: absolute;
            height: 2px;
            transition: left 0.3s ease, width 0.3s ease;
        }

        .tab-content {
            display: none;
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
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .tab-content.current {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 1023px) {
            .tab-names ul.tabs li {
                white-space: nowrap;
            }

            .tab-names ul.tabs {
                display: flex;
                overflow: scroll;
                padding-right: 100px;
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


        .custom-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .custom-list li::before {
            content: '\2713';
            color: #062358;
            background-color: #FFFFFF;
            border-radius: 26px;
            padding-left: 4px;
            padding-right: 3px;
            font-size: 12px;
            margin-right: 8px;
        }

        .custom-list ul {
            padding-top: 10px;
            padding-left: 15px;
        }

        .custom-list li {
            padding-left: 0;
            padding-bottom: 10px;
        }

        .custom-list ul li {
            padding-left: 10px;
        }

        /* .custom-list {
                                                                        list-style: none;
                                                                        padding: 0;
                                                                        margin: 0;
                                                                    }

                                                                    .custom-list > li {
                                                                        position: relative;
                                                                        padding-left: 30px;
                                                                        margin-top: 15px !important;
                                                                        margin-bottom: 15px !important;
                                                                        font-size: 16px;
                                                                        line-height: 1.6;
                                                                    }

                                                                    .custom-list > li::before {
                                                                        content: '\2713';
                                                                        position: absolute;
                                                                        left: 0;
                                                                        top: 50%;
                                                                        transform: translateY(-50%);
                                                                        width: 15px;
                                                                        height: 15px;
                                                                        background-color: #ffffff;
                                                                        border-radius: 50%;
                                                                        color: #062358;
                                                                        font-size: 10px;
                                                                        text-align: center;
                                                                        line-height: 15px;
                                                                        font-weight: 800;
                                                                    }

                                                                    .custom-list ul {
                                                                        list-style: none;
                                                                        padding: 0;
                                                                        margin: 0;
                                                                        padding-left: 30px;
                                                                    }

                                                                    .custom-list ul > li {
                                                                        margin-top: 15px !important;
                                                                        margin-bottom: 15px !important;
                                                                        padding-left: 30px;
                                                                    }

                                                                    .custom-list > li:has(ul)::before {
                                                                        top: 11%;
                                                                    } */



        .active-item {
            font-weight: bold;
            color: white;
            /* border-left: 4px solid #2563eb; */
            background-color: #062358;
            /* padding-left: 10px; */
        }

        .content-btn.active-button {
            background-color: white;
            color: #062358;
            font-weight: 700;
            border-radius: 25px;
            border: none;
        }

        /* @media (min-width: 768px){
                                                                        .content-btn.active-button {
                                                                            background-color: white;
                                                                            color: #062358;
                                                                            font-weight: 700;
                                                                            border-top-right-radius: 7px;
                                                                            border-top-left-radius: 7px;
                                                                            border: none;
                                                                        }
                                                                    } */

        /* .custom-tab-content {
                                                                        display: none;
                                                                    } */

        /* .custom-tab-content:not(.hidden) {
                                                                        display: block;
                                                                    } */


        /* .custom-tab-content {
                                                                        display: none;
                                                                    } */

        .custom-tab-content.active {
            display: block !important;
        }

        .content-btn {
            background-color: #04152f;
            border-radius: 25px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .content-btn:hover {
            /* background-color: #2563eb; */
            /* color: white; */
        }
    </style>

    {{-- services banner --}}
    <div class="relative servicesIIner-banner h-full">
        <!-- Background Image -->
        <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $services->banner_image }}"
            alt="Background Image" class="absolute inset-0 w-full h-full object-cover z-0">

        <div class="services-banner-overlay relative z-10 bg-black bg-opacity-50 h-full">
            <!-- Overlay for better contrast -->
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                <div class="text-white text-[12px] font_inter font-semibold flex items-center gap-2">
                    <a href="{{ url('services') }}">Services</a> > <a
                        class="cursor-pointer block text-ellipsis whitespace-nowrap overflow-hidden w-[150px]">{{ $services->title }}</a>
                </div>
                <div class="text-center text-white my-10 flex flex-col justify-center items-center">
                    <h1 class="uppercase font_inter font-semibold text-3xl lg:text-[40px]">{{ $services->title }}</h1>
                    <p class="lg:w-1/2 mt-5 font_inter font-semibold text-sm lg:text-[18px]">
                        {{ $services->sub_title }}
                    </p>
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

    {{-- services section section --}}
    <div class="services Realize section section">
        <div class="service-details">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[3%] lg:pb-1">
                <!-- Services Section -->
                <div class="lg:w-full font_inter flex flex-col justify-center">
                    <h2 class="font-semibold text-xl my-4 lg:text-4xl text-[#062358]">
                        {{ $services->inner_title }}
                    </h2>
                    <p>{!! $services->description !!}</p>
                    <div class="blufader-grade text-white my-6 px-5 rounded-md py-3">Key Highlight</div>

                    <ul class="list-disc lg:pl-5 text-[#062358] leading-normal list-none md:pb-6">
                        @foreach ($services->ServicePoint as $key => $ServicePoint)
                            @if ($ServicePoint->status == 1)
                                <li class="my-1 py-2 px-4 w-full lg:w-1/2 transition-all duration-200 cursor-pointer rounded-md border border-[#d6d6d6] text-gray-800 @if ($key == 0) active-item @endif"
                                    data-target="service-point{{ $key }}">
                                    <a href="#sub-services">{{ $ServicePoint->title }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="services bg-[#062358]">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[3%]">
            @foreach ($services->ServicePoint as $key => $ServicePoint)
                @if ($ServicePoint->status == 1)
                    <div id="service-point{{ $key }}"
                        class="buttons-wrapper @if ($key != 0) hidden @endif">
                        <div id="sub-services" class="">
                            <div class="mb-8 pb-5 flex flex-wrap items-center gap-3 border-b border-b-white mb-2">
                                @foreach ($ServicePoint->ServicePointContents as $index => $content)
                                    @if ($content->status == 1)
                                        <button
                                            class="content-btn text-left md:whitespace-nowrap w-fit bg-[#062358] text-white py-2 px-4  font-semibold focus:outline-none @if ($index == 0) active-button @endif"
                                            data-target="content{{ $key }}-{{ $index }}">
                                            {{ $content->title }}
                                        </button>
                                    @endif
                                @endforeach
                            </div>

                            <div class="pl-4">
                                @foreach ($ServicePoint->ServicePointContents as $key2 => $ServicePointContent)
                                    @if ($ServicePointContent->status == 1)
                                        <div id="content{{ $key }}-{{ $key2 }}"
                                            class="custom-tab-content lg:mt-4 @if ($key != 0) hidden @endif">
                                            {{-- <h2 class="text-xl font-bold mb-4 text-white">{{ $ServicePointContent->title }}</h2> --}}
                                            <p class="text-white mb-4">{{ $content->description }}</p>

                                            @foreach ($ServicePointContent->Title as $title)
                                                <h2 class="text-xl font-bold mb-4 text-white">
                                                    {{ $title->name }}</h2>
                                                @if (count($title->paragraphs))
                                                    @foreach ($title->paragraphs as $paragraph)
                                                        <p class="text-white">
                                                            {!! $paragraph->content !!}
                                                            {{-- @if ($paragraph->url)
                                                                <a href="{{ $paragraph->url }}" class="text-white"><b> Read
                                                                        more...</b></a>
                                                            @endif --}}
                                                        </p>
                                                    @endforeach
                                                @endif
                                                @if (count($title->options))
                                                    <ul class="list-discs custom-list list-inside text-white space-y-2">
                                                        @foreach ($title->options as $option)
                                                            <li>{{ $option->value }}
                                                                @if (count($option->subOptions))
                                                                    <ul
                                                                        class="list-discs custom-list list-inside text-white space-y-2">
                                                                        @foreach ($option->subOptions as $subOptions)
                                                                            <li>{{ $subOptions->value }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>



    <div class="faq bg-[#062358]">
        {{-- <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:pt-[2%] lg:pb-[5%]">
            <div>
                <div class="services-grade w-full py-2 rounded-md my-8">
                    <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">other important FAQs</h2>
                </div>
            </div>
        </div> --}}

        <div class="faq-section bg-[#F7FCFF]">
            <div class="container mx-auto px-5 xl:px-12 py-8 lg:py-16 h-full w-full">
                <div class="flex justify-center items-center">
                    <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold uppercase">other important FAQs
                    </h2>
                </div>
                <div class="mt-8 faq-parent lg:px-[10%]">

                    @foreach ($services->ServiceFaq as $key => $ServiceFaq)
                        @if ($ServiceFaq->status == 1)
                            <div class="accordion bg-white rounded-2xl my-3 lg:my-0 h-fit p-6">
                                <div class="accordion-header flex justify-between items-center  cursor-pointer">
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
                                    {!! $ServiceFaq->description !!}
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
        </div>
    </div>



    {{-- faq --}}
    {{-- <div class="faq bg-[#062358]">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:pt-[2%] lg:pb-[5%]">
            <div>
                <div class="services-grade w-full py-2 rounded-md mb-8">
                    <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">other important FAQs
                    </h2>
                </div>
                <div class="services-inner faq text-[#2D3E50] font_inter py-4 flex flex-col justify-start items-start gap-4">
                    @foreach ($services->ServiceFaq as $key => $ServiceFaq)
                        @if ($ServiceFaq->status == 1)
                            <div class="accordion-item bg-white p-5 lg:w-1/2 rounded-xl overflow-hidden cursor-pointer transition-all duration-300"
                                onclick="toggleAccordion(this)">
                                <div class="flex justify-start items-center w-full h-full accordion-header gap-4">
                                    <img class="accordion-icon transition-transform duration-300 w-2 lg:w-[14px]"
                                        src="{{ asset('assets/faqplus.png') }}" alt="Plus Icon">
                                    <h3 class="text-[12px] text-[#2D3E50] font-semibold lg:text-[14px] lg:font-medium">
                                        {{ $ServiceFaq->title }}</h3>
                                </div>
                                <div
                                    class="pl-10 accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                    <p class="pt-3">{{ $ServiceFaq->description }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

    {{-- don't wait --}}
    <div class="dontwait bg-[#062358] h-[30vh] w-full">
        <div class="dontwaitwrpr h-full w-full">
            <div
                class="container mx-auto px-5 lg:px-12 h-full w-full py-8 flex justify-center items-start flex-col  text-white">
                <h4 class="font_inter text-lg font-medium">Don’t wait. Begin your visa application today!</h4>
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

    <script>
        $(document).ready(function() {
            // Hide all `.buttons-wrapper` and `.custom-tab-content` except the first one
            $(".buttons-wrapper").addClass("hidden").first().removeClass("hidden");
            $(".custom-tab-content").addClass("hidden").first().removeClass("hidden");
            $(".list-disc > li").first().addClass("active-item");
            $(".content-btn").first().addClass("active-button");

            // Handle clicks on ServicePoint list items (scoped narrowly to direct children only)
            $(".list-disc > li").on("click", function() {
                // Remove active state from all ServicePoint list items and hide all buttons
                $(".list-disc > li").removeClass("active-item");
                $(".buttons-wrapper").addClass("hidden");

                // Set active state for the clicked list item and show its buttons
                $(this).addClass("active-item");
                const target = $(this).data("target");
                $(`#${target}`).removeClass("hidden");

                // Set the first button and its content as active
                $(`#${target} .content-btn`).removeClass("active-button").first().addClass("active-button");
                $(`#${target} .custom-tab-content`).addClass("hidden").first().removeClass("hidden");
            });

            // Handle clicks on buttons inside buttons-wrapper
            $(".content-btn").on("click", function() {
                // Remove active state from all buttons and hide all content
                $(".content-btn").removeClass("active-button");
                $(".custom-tab-content").addClass("hidden");

                // Set active state for the clicked button and show its content
                $(this).addClass("active-button");
                const target = $(this).data("target");
                $(`#${target}`).removeClass("hidden");
            });

            // Prevent clicks on dynamically generated options list items from affecting parent state
            $(document).on("click", ".custom-list > li", function(e) {
                e.stopPropagation(); // Prevent the click from propagating to parent elements
            });
        });


        $(document).ready(function() {
            const offsetAdjustment = $(window).height() / 2; // Center adjustment

            // Handle clicks on <li> elements in the specific section
            $(".list-disc > li").on("click", function(e) {
                e.preventDefault(); // Prevent default behavior

                const targetId = $(this).data("target"); // Get the target section's ID
                const target = $(`#${targetId}`); // Find the corresponding section

                if (target.length) {
                    const targetPosition = target.offset().top -
                        offsetAdjustment; // Calculate the center position

                    // Smooth scroll to bring the section into view
                    $("html, body").animate({
                            scrollTop: targetPosition,
                        },
                        500, // Animation duration in milliseconds
                        "swing" // Easing function
                    );
                }
            });
        });
    </script>
@endsection
