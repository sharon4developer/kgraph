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

		 ul.tabs{
			margin: 0px;
			padding: 0px;
			list-style: none;
		}
		 ul.tabs li{
			background: none;
			color: #ededed;
			display: inline-block;
			padding: 10px 15px;
			cursor: pointer;
            font-size: 16px;
		}

		ul.tabs li.current{
			font-weight: 800;
			color: #062358;
		}

		.tab-content{
			display: none;
			/* background: #ededed; */
			padding: 15px;
		}

		.tab-content.current{
			display: inherit;
		}

        .tab-link {
            color: #ffffff;
            cursor: pointer;
            padding: 10px 15px;
            transition: color 0.3s ease;
        }

        .tab-link.current {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
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
        @media (max-width: 1023px){
            .tab-names ul.tabs li{
                white-space: nowrap;
            }
            .tab-names ul.tabs{
                display: flex;
                overflow: scroll;
                margin-right: 20px;
            }
        }
        @media (max-width: 350px){
            .tab-content>ul>li{
                max-width: 280px;
            }
        }
        @media (min-width: 350px) and (max-width: 650px){
            .tab-content>ul>li{
                max-width: 320px;
            }
        }

    </style>



    {{-- services banner --}}
    <div class="relative servicesIIner-banner h-full">
        <!-- Background Image -->
        <img src="{{ asset('assets/servicesinner.jpg') }}" alt="Background Image"
            class="absolute inset-0 w-full h-full object-cover z-0">

        <div class="services-banner-overlay relative z-10 bg-black bg-opacity-50 h-full">
            <!-- Overlay for better contrast -->
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                <div class="text-white text-[12px] font_inter font-semibold flex items-center gap-2">
                    <a href="{{url('services')}}">Services</a> > <a class="cursor-pointer block text-ellipsis whitespace-nowrap overflow-hidden w-[150px]">{{ $services->title }}</a>
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
            <div class="tab-names flex flex-col relative  max-w-[100vw] scrollbar-hidden">
                <ul class="tabs border-b-2 border-b-white scrollbar-hidden">
                    @foreach ($services->ServicePoint as $key => $ServicePoint)
                    <li class="tab-link {{ $key === 0 ? 'current' : '' }}" data-tab="tab-{{$key+1}}">{{ $ServicePoint->title }}</li>
                    @endforeach
                </ul>
                @foreach ($services->ServicePoint as $key => $ServicePoint)
                <div id="tab-{{$key+1}}" class="tab-content {{ $key === 0 ? 'current' : 'hidden' }}">
                    {!! $ServicePoint->description !!}
                </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- faq --}}
    <div class="faq bg-[#062358]">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:pt-[2%] lg:pb-[5%]">
            <div>
                <div class="services-grade w-full py-2 rounded-md my-8">
                    <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">other important FAQs</h2>
                </div>
                <div class="services-inner faq text-[#2D3E50] font_inter py-4 flex flex-col justify-start items-start gap-4">
                    @foreach ($services->ServiceFaq as $key => $ServiceFaq)
                    <div class="accordion-item bg-white p-5 lg:w-1/2 rounded-xl overflow-hidden cursor-pointer transition-all duration-300" onclick="toggleAccordion(this)">
                        <div class="flex justify-start items-center w-full h-full accordion-header gap-4">
                            <img class="accordion-icon transition-transform duration-300 w-2 lg:w-[14px]" src="{{ asset('assets/faqplus.png') }}" alt="Plus Icon">
                            <h3 class="text-[12px] text-[#2D3E50] font-semibold lg:text-[14px] lg:font-medium">{{ $ServiceFaq->title }}</h3>
                        </div>
                        <div class="pl-10 accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <p class="pt-3">{{ $ServiceFaq->description }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
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
    });
});



        function toggleAccordion(element) {
            const parent = element.closest('.accordion-item');
            const content = parent.querySelector('.accordion-content');
            const icon = parent.querySelector('.accordion-icon');
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.style.transform = "rotate(0deg)";
            } else {
                document.querySelectorAll('.accordion-content').forEach((p) => {
                    p.style.maxHeight = null;
                });
                document.querySelectorAll('.accordion-icon').forEach((img) => {
                    img.style.transform = "rotate(0deg)";
                });
                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = "rotate(45deg)";
            }
        }
    </script>
@endsection
