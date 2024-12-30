@extends('layouts.main')
@section('content')

{{-- Load GSAP --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

<style>
    /* .slider-endballs::after{
        content:"";
        position: absolute;
        background-color:#062358;
        width:15px;
        height:15px;
        right: 0;
        top: -7px;

    } */
    /* .slider-endballs::before{
        content:"";
        position: absolute;
        background-color:#062358;
        width:15px;
        height:15px;
        left: 0;
        top: -7px;
    } */
    .page-item.active {
        background-color: #0085FF;
    }

</style>
@include('frontend.Common.whatsapplogo')
<div class="aboutusbanner relative h-full 2xl::h-[100vh]">
    <div class="absolute w-full h-full aboutbackgroundimage"></div>
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 lg:py-[8%]">
        <div class="flex flex-col justify-center items-start h-full w-full text-left text-white z-10 md:mt-[16%] lg:mt-[95px] 2xl:mt-[40px]">
            <h2 class="font_inter font-semibold text-[28px] xl:text-[40px] uppercase leading-normal"> @if(isset($aboutUs)) {{$aboutUs->about_title}} @endif</h2>
            <div class="flex items-center gap-4 pb-6 lg:py-2 xl:py-0">
                <h3 class="font_inter font-normal text-[15px] lg:text-[20px] text-justify"> @if(isset($aboutUs)) {{$aboutUs->about_sub_title}} @endif</h3>
                <img class="w-[50px] lg:w-[73px]" src="{{ asset('assets/about/aboutrocket.png') }}" alt="rocket">
            </div>
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4 mt-5 md:mt-8 lg:mt-[2.30rem] lg:gap-20">
                <div class="w-full">
                    <img class="w-[40px]" src="{{ asset('assets/about/rolloutimage.webp') }}" alt="roll">
                    <p class="font_inter font-medium text-[15px] 2xl:text-[20px] text-justify mt-8">
                        @if(isset($aboutUs)) {{$aboutUs->about_description}} @endif
                    </p>
                </div>
                <div class="w-full cursor-pointer">
                    <img class="hover:scale-105 ease-linear duration-300" src="@if(isset($aboutUs)) {{ $locationData['storage_server_path'].$locationData['storage_image_path'].$aboutUs->about_image }} @endif" alt="@if(isset($aboutUs)) {{$aboutUs->about_image_alt_tag}} @endif">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cta bg-[#062358]">
    <div class="container mx-auto px-5 lg:px-12 py-8 translate-large z-10 relative">
        
        <div class="md:py-10">
            <h6 class="capitalize mb-5 text-white font_inter font-semibold text-[19px]"> @if(isset($aboutUs)) {{$aboutUs->crew_title}} @endif</h6>
            <div class="about-meet-slider">
                <div class="splide__track">
                    <ul id="crew-list" class="splide__list gap-8">
                        {{-- Example Slide --}}
                        <li class="splide__slide">
                            <div class="crew-card" bis_skin_checked="1">
                                <div class="crew-card-img-parent" bis_skin_checked="1">
                                    <img class="crew-card-img" src="https://kgraph-iroid.s3.ap-south-1.amazonaws.com/storage/assets/uploads/mathews-benny-director-c0SPVtbopABTLRi.png" alt="Crew Image">
                                </div>
                                <div class="crew-card-content" bis_skin_checked="1">
                                    <h5>Mathews Benny</h5>
                                    <h6>Director</h6>
                                    <div class="address" bis_skin_checked="1">
                                        <p>Canada</p>
                                        <a class="email-link" href="mail.canada@kgraph.ca">canada@kgraph.ca</a>
                                    </div>
                                    <a class="read-bio-link" href="#">Read full bio &gt;</a>
                                </div>
                            </div>
                        </li>
                        {{-- Repeat Slides as Needed --}}
                    </ul>
                </div>
            </div>
            
            <div id="crew-list-pagination" class="flex items-center custom-navigation text-white space-x-2 justify-center py-8 md:py-5 md:mt-[66px]">
                <!-- Pagination Buttons -->
            </div>
        </div>

        <div class="lg:my-16">
            <div class="flex flex-col lg:flex-row gap-6">
                <div class="w-full">
                    <h4 class="text-white font_inter font-semibold text-[22px] lg:text-[30px] lg:w-[75%]">@if(isset($aboutUs)) {{$aboutUs->journey_title}} @endif</h4>
                    <p class="text-white font_inter font-thin text-justify text-[14px] py-4  lg:w-[75%]">@if(isset($aboutUs)) {{$aboutUs->journey_description}} @endif </p>
                </div>
                <div class="w-full rounded-[17px] overflow-hidden">
                    <img class="h-full rounded-[17px] object-center" src="@if(isset($aboutUs)) {{ $locationData['storage_server_path'].$locationData['storage_image_path'].$aboutUs->journey_image }} @endif" alt="@if(isset($aboutUs)) {{$aboutUs->journey_image_alt_tag}} @endif">
                </div>
            </div>

            <div class="md:flex items-end gap-[45px] mt-5">
                <div>
                    <h2 id="count-number" class="text-white font_inter font-bold text-[95px] leading-none">
                        @if (isset($journey))
                            {{ $journey->experience }}+
                        @endif
                    </h2>
                    <p class="text-white">Years of Experience</p>
                </div>
                <div class="my-6 md:my-0 lg:mt-[-51px] flex flex-wrap md:flex-nowrap items-start gap-5 lg:gap-[50px]">
                    <div>
                        <h2 class="text-white font_inter font-bold text-[35px] leading-none">@if (isset($journey))
                            {{ $journey->employees }}
                        @endif</h2>
                        <span class="text-white whitespace-nowrap">Employes</span>
                    </div>

                    <div>
                        <h2 class="text-white font_inter font-bold text-[35px] leading-none">@if (isset($journey))
                            {{ $journey->ratings }}
                        @endif</h2>
                        <div class="whitespace-nowrap flex items-center">
                            <span class="text-white block leading-none">Google</span>
                            <span class="text-white">Rating</span>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-white font_inter font-bold text-[35px] leading-none">@if (isset($journey))
                            {{ $journey->offices }}
                        @endif</h2>
                        <span class="text-white whitespace-nowrap">Offices</span>
                    </div>

                    <div>
                        <h2 class="text-white font_inter font-bold text-[35px] leading-none">@if (isset($journey))
                            {{ $journey->customers }}+
                        @endif</h2>
                        <span class="text-white whitespace-nowrap">Customers Served</span>
                    </div>

                    <div>
                        <h2 class="text-white font_inter font-bold text-[35px] leading-none">@if (isset($journey))
                            {{ $journey->cases }}+
                        @endif</h2>
                        <span class="text-white whitespace-nowrap">Active Cases</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="aboutOurStory" class="bg-white our-story my-10 h-full">
    <div class="container mx-auto px-5 lg:px-12">
        <h2>@if(isset($aboutUs)) {{$aboutUs->our_story_title}} @endif</h2>

        <div class="mt-6 flex justify-center items-center">
            <div class="h-[2px] w-[95vw] bg-[#0E3065]">
                <div id="movebarparent" class="container mx-auto px-5 lg:px-12 w-full h-full flex items-center relative">
                    <div class="hidden lg:block absolute bottom-0 rasing-falg-wrpr" style="">
                        <img class="rasing-falg" src="{{ asset('assets/home_Banner/canadaanimated.png') }}" alt="">
                    </div>
                    <div id="movedBar" class="bg-[#0E3065] rounded-full h-[6px] w-[30%]"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-5 lg:px-12">
        <div class="flex flex-col lg:flex-row items-center gap-[50px] mt-6">
            <p class="lg:w-[30%] text-[#06245A] font_inter font-semibold text-justify">
                “<strong>Our Mission</strong>
                @if(isset($aboutUs)) {{$aboutUs->mission}} @endif
            </p>
            <p class="lg:w-[30%] text-[#06245A] font_inter font-semibold text-justify">
                “<strong>Our Vision</strong>
                @if(isset($aboutUs)) {{$aboutUs->vision}} @endif
            </p>
        </div>
    </div>

    <div class="relative container mx-auto px-5 lg:px-12 py-12 lg:py-[120px] bg-[#F8FAFC] overflow-hidden">
        <div class="relative h-full w-full flex items-center justify-between">
            <!-- Previous Button -->
            <div class="aboutprev bg-[#062358] rounded-full w-10 h-10 px-5 flex justify-center items-center text-white font-bold cursor-pointer shadow-md text-lg">‹</div>
    
            <!-- Splide Slider -->
            <div id="newaboutSplide" class="splide flex items-center w-[79%] md:w-[90%] lg:w-[90%] xl:w-[94%]">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($ourStory as $data)
                        <li class="splide__slide flex flex-col md:flex-row items-center justify-around gap-6">
                            <!-- Left Section -->
                            <div class="flex flex-col w-full md:w-[45%] lg:w-[40%] md:gap-4 relative z-10">
                                <!-- Year and Title -->
                                <div class="flex items-center gap-4 h-[100px] md:h-[160px] xl:h-[90px]">
                                    <h5 class="text-[#072558] font-bold text-[20px] md:text-[24px] lg:text-[28px] pl-4 leading-none">
                                        {{$data->year}}
                                    </h5>
                                    <h3 class="text-[#07245A] font-semibold text-[16px] md:text-[20px] lg:text-[24px] leading-tight w-3/4">
                                        {{$data->title}}
                                    </h3>
                                </div>
                                <!-- Description -->
                                <p class="pl-4 text-[#07245A] h-[100px] md:h-[160px] xl:h-[90px] opacity-70 font-medium text-[14px] md:text-[16px] lg:text-[18px] leading-relaxed">
                                    {{$data->description}}
                                </p>
                            </div>
    
                            <!-- Horizontal Line -->
                            <div class="absolute hidden md:top-1/2 left-0 w-full h-[1px] bg-[#072558] opacity-50 z-0"></div>
    
                            <!-- Right Section (Images) -->
                            <div class="flex gap-4 w-full md:w-[50%] lg:w-[40%] justify-end relative z-10">
                                <img
                                    class="max-h-[60px] md:max-h-[80px] lg:max-h-[100px] 2xl:max-h-[170px] aspect-video object-cover rounded-md shadow-md"
                                    src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->image }}"
                                    alt="{{$data->alt_tag}}"
                                />
                                <img
                                    class="max-h-[60px] md:max-h-[80px] lg:max-h-[100px] 2xl:max-h-[170px] aspect-video object-cover rounded-md shadow-md"
                                    src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->second_image }}"
                                    alt="{{$data->second_alt_tag}}"
                                />
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
    
            <!-- Next Button -->
            <div class="aboutnext bg-[#062358] rounded-full w-10 h-10 px-5 flex justify-center items-center text-white font-bold cursor-pointer shadow-md text-lg">›</div>
        </div>
    </div>
    

</div>

<div class="loaction bg-[#062358] gradient-evition relative overflow-hidden ">
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-12 lg:py-[120px] relative z-10">
        <div class="flex items-end w-full gap-2 lg:gap-7">
            <h2 class="uppercase text-white font_inter font-semibold text-[30px] lg:text-[45px] leading-none thirdleft-to-right-animation">@if(isset($aboutUs)) {{$aboutUs->location_title}} @endif</h2>
            <div class="w-full thirdleft-to-right-width-animation" style="border: 1px solid #FFFFFF8C;margin-bottom: 8px;"></div>
        </div>

        <div class="flex flex-col lg:flex-row lg:gap-[10%] mt-9 py-4">
            <!-- Slider Section -->
            <div class="w-full lg:w-1/2 mb-6 lg:mb-0">
                <div class="w-full 2xl:w-[75%]">
                    <h4 class="font_inter font-semibold text-[20px] text-white pb-8">@if(isset($aboutUs)) {{$aboutUs->location_sub_title}} @endif</h4>
                    <div id="locationsection" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($locations as $data)

                                <li class="splide__slide">
                                    <div class="flex lg:gap-6 lg:py-[56px] lg:px-10 justify-center">
                                        <div class="bg-white my-4 lg:my-0 p-5 w-full lg:max-w-[430px] h-[248px] rounded-xl block">
                                            <div class="flex items-center justify-between">
                                                <h5 class="text-black uppercase">{{$data->location}}</h5>
                                                <img class="w-[48px] h-[48px] rounded-full" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->image }}" alt="{{$data->alt_tag}}">
                                            </div>
                                            {{-- <div class="bg-[#072558] text-white rounded-md w-fit px-5 py-1 my-2">
                                                {{$data->location}}
                                            </div> --}}

                                            <div class="flex flex-col md:flex-row items-start pl-[10%] gap-[35px]">
                                                <div class="">
                                                    <div class="flex items-center gap-[20px] my-4">
                                                        <div>
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M21.047 16.0415L20.0847 20.0911C19.9644 20.6925 19.4833 21.0935 18.8819 21.0935C8.77801 21.0534 0.558594 12.8339 0.558594 2.73008C0.558594 2.12866 0.919446 1.64752 1.52087 1.52724L5.57043 0.564964C6.13176 0.44468 6.73318 0.765438 6.97375 1.28667L8.8582 5.65699C9.05867 6.17823 8.93839 6.77965 8.49735 7.1004L6.33223 8.86457C7.69545 11.6311 9.94076 13.8764 12.7474 15.2396L14.5116 13.0745C14.8323 12.6736 15.4337 12.5132 15.955 12.7137L20.3253 14.5981C20.8465 14.8788 21.1673 15.4802 21.047 16.0415Z" fill="#072558"/>
                                                            </svg>
                                                        </div>
                                                        <div class="font_jakarta">
                                                            <h4 class="phone-text font-semibold">{{$data->phone}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center gap-[20px] my-4">
                                                        <div>
                                                            <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M19.1625 0.246205C20.205 0.246205 21.0871 1.12829 21.0871 2.17075C21.0871 2.81227 20.7663 3.37359 20.2852 3.73445L11.5846 10.2699C11.1035 10.6307 10.5021 10.6307 10.0209 10.2699L1.32039 3.73445C0.839257 3.37359 0.558594 2.81227 0.558594 2.17075C0.558594 1.12829 1.40058 0.246205 2.48314 0.246205H19.1625ZM9.25915 11.3123C10.1813 11.994 11.4243 11.994 12.3464 11.3123L21.0871 4.73681V13.0765C21.0871 14.5199 19.9243 15.6426 18.521 15.6426H3.12466C1.68125 15.6426 0.558594 14.5199 0.558594 13.0765V4.73681L9.25915 11.3123Z" fill="#072558"/>
                                                                </svg>
                                                        </div>
                                                        <div class="font_jakarta">
                                                            <h4 class="phone-text font-semibold">{{$data->email}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center gap-[20px] my-4">
                                                        <div>
                                                            <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7.29451 20.3769C5.20958 17.7708 0.558594 11.5561 0.558594 8.02774C0.558594 3.7777 3.96665 0.329557 8.25678 0.329557C12.5068 0.329557 15.955 3.7777 15.955 8.02774C15.955 11.5561 11.2639 17.7708 9.17896 20.3769C8.69782 20.9783 7.77564 20.9783 7.29451 20.3769ZM8.25678 10.5938C9.6601 10.5938 10.8228 9.47115 10.8228 8.02774C10.8228 6.62443 9.6601 5.46168 8.25678 5.46168C6.81337 5.46168 5.69072 6.62443 5.69072 8.02774C5.69072 9.47115 6.81337 10.5938 8.25678 10.5938Z" fill="#072558"/>
                                                            </svg>
                                                        </div>
                                                        <div class="font_jakarta">
                                                            <h4 class="phone-text font-semibold">{{$data->address}}</h4>
                                                        </div>
                                                    </div>

                                                    {{-- <button class="rounded-md text-[#061F4C] border border-[#061F4C] w-fit px-3 py-1 mt-4 font_inter font-medium text-[12px] cursor-pointer">
                                                        View Larger Map
                                                    </button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Section -->
            <div class="w-full lg:w-1/2 grid grid-cols-2 gap-4 lg:gap-[12px] py-8">
                <!-- Top Left Image -->
                <div class="flex justify-center items-center rounded-lg overflow-hidden h-[260px]">
                    <img src="@if(isset($aboutUs)) {{ $locationData['storage_server_path'].$locationData['storage_image_path'].$aboutUs->location_image1 }} @endif" alt="@if(isset($aboutUs)) {{$aboutUs->location_image1_alt_tag}} @endif" class="w-full h-full object-cover">
                </div>

                <!-- Right Large Image -->
                <div class="row-span-2 rounded-lg overflow-hidden h-[400px]">
                    <img src="@if(isset($aboutUs)) {{ $locationData['storage_server_path'].$locationData['storage_image_path'].$aboutUs->location_image2 }} @endif" alt="@if(isset($aboutUs)) {{$aboutUs->location_image2_alt_tag}} @endif" class="w-full h-full object-cover">
                </div>

                <!-- Bottom Left Image -->
                <div class="flex justify-center items-center rounded-lg overflow-hidden h-[121px]">
                    <img src="@if(isset($aboutUs)) {{ $locationData['storage_server_path'].$locationData['storage_image_path'].$aboutUs->location_image3 }} @endif" alt="@if(isset($aboutUs)) {{$aboutUs->location_image3_alt_tag}} @endif" class="w-full h-full object-cover">
                </div>
            </div>
        </div>



    </div>
</div>

@include('frontend.Common.getintouch')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        gsap.registerPlugin(ScrollTrigger);

        // Get the parent container where the bar should move within
        const moveBarParent = document.querySelector("#movebarparent");
        const movedBar = document.querySelector("#movedBar");
        const animatedImage = document.querySelector(".rasing-falg"); // Select the image

        // Set the initial height to 0 for the animated image
        gsap.set(animatedImage, { height: 0 });

        // Function to calculate and animate image height based on media query
        function animateImageHeight() {
            let flagHeight = 0;

            // Use window.innerWidth to determine which media query is active
            if (window.innerWidth >= 1536) {
                // Screen size > 1536px
                flagHeight = 325; // Set the height for this screen size
            } else if (window.innerWidth >= 1200) {
                // Screen size > 1200px
                flagHeight = 273;
            } else if (window.innerWidth >= 1024) {
                // Screen size > 1024px
                flagHeight = 273;
            } else {
                // Default smaller screen height
                flagHeight = animatedImage.naturalHeight || animatedImage.offsetHeight; // Fallback to image's natural height
            }

            // console.log("Calculated flag height based on media query: ", flagHeight); // Debugging

            // GSAP animation for image height
            gsap.to(animatedImage, {
                height: flagHeight,  // Target height based on calculated flag height
                ease: "power3.out",  // Smooth easing
                duration: 1,         // Duration for animation
                scrollTrigger: {
                    trigger: "#aboutOurStory",  // Trigger animation when #aboutOurStory comes into view
                    start: "top 80%",           // Start when top 80% of the viewport reaches the section
                    end: "top 20%",             // End when top 20% of the viewport reaches the section
                    toggleActions: "play none none none",  // Play animation when scrolling down
                    invalidateOnRefresh: true,  // Recalculate values on page resize
                }
            });
        }

        // Add load event listener to image to ensure correct height calculation after it loads
        animatedImage.addEventListener('load', () => {
            animateImageHeight(); // Call the function to animate the image height
        });

        // Fallback in case the image is already loaded (e.g., from cache)
        if (animatedImage.complete) {
            animateImageHeight();
        }

        // Recalculate and re-animate the image on window resize to account for media queries
        window.addEventListener('resize', () => {
            gsap.set(animatedImage, { height: 0 }); // Reset to height 0 on resize
            animateImageHeight();  // Recalculate and animate the image height based on new viewport
        });

        // Move Bar Animation
        const maxMoveDistance = "60vw";
        gsap.to(movedBar, {
            x: maxMoveDistance, // Move the bar to the end of the container
            ease: "power3.out", // Smooth easing function
            duration: 1, // Increase the duration to slow down the movement
            scrollTrigger: {
                trigger: "#aboutOurStory", // Trigger the animation when this section comes into view
                start: "top 80%", // Animation starts when 80% of the viewport reaches the top of #aboutOurStory
                end: "top 10%", // Animation ends when 20% of the viewport reaches the top of the section
                toggleActions: "play none none none", // Play animation when scrolling down
                invalidateOnRefresh: true, // Recalculate values on page resize
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select all slides in the slider
        var slides = document.querySelectorAll('.about-meet-slider .splide__slide');

        // Initialize slider only if more than one slide exists
        if (slides.length > 1) {
            var splide = new Splide('.about-meet-slider', {
                type: 'loop',      // Loop through slides
                perMove: 1,        // Move one slide at a time
                perPage: 3.5,      // Show multiple slides per page
                arrows: false,     // Disable default arrows
                pagination: false, // Disable default dots pagination
                autoplay: false,   // Disable autoplay
                interval: 3000,    // Interval for auto-slide
                gap: '16px',       // Gap between slides
                breakpoints: {     // Responsive breakpoints
                    640: { perPage: 1 },
                    768: { perPage: 1.5 },
                    1024: { perPage: 2 },
                    1280: { perPage: 2.8 },
                }
            }).mount();

            // Custom Previous Button
            document.querySelector('.card-explore-slide-prev-button').addEventListener('click', function () {
                splide.go('<'); // Navigate to previous slide
            });

            // Custom Next Button
            document.querySelector('.card-explore-slide-next-button').addEventListener('click', function () {
                splide.go('>'); // Navigate to next slide
            });
        } else {
            // Log placeholder for cases with insufficient slides
            console.log("Slider requires more than one slide to initialize.");
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var splide = new Splide('#newaboutSplide', {
            type: 'loop',
            perMove: 1,
            perPage: 1,
            arrows: false,
            pagination: false,
            autoplay: true,
            pauseOnHover: false,
            interval: 3000,
        }).mount();

        // Safeguarded custom navigation
        const prevButton = document.querySelector('.aboutprev');
        const nextButton = document.querySelector('.aboutnext');

        if (prevButton) {
            prevButton.addEventListener('click', function () {
                splide.go('<'); // Go to the previous slide
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', function () {
                splide.go('>'); // Go to the next slide
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const sliderElement = document.getElementById('locationsection');
        const slides = sliderElement.getElementsByClassName('splide__slide');

        new Splide('#locationsection', {
            type   : 'slide',
            perPage: 1,
            autoplay: true,
            interval: 3000,
            arrows: false,
            pagination: false,
            gap: '1rem',
            arrows: slides.length > 1,  // Show arrows only if there are more than one slide
        }).mount();
    });
</script>

<script src="{{ asset('frontend/js/about.js') }}"></script>

@endsection
