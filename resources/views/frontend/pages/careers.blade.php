@extends('layouts.main')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<style>
    .contact-US{
        background: linear-gradient(180deg, #02050B 20.98%, rgba(0, 0, 0, 0) 302.7%);
        z-index: 1;
        position: relative;
    }
    .contact-US-banner{
        background-image: url(assets/home_Banner/contactUsbackground.png) !important;
        background-repeat: no-repeat;
        background-position-y: center;
        background-size: cover;
        /* z-index: -1; */
        position: relative;
    }
    .canada-flag{
        position: relative;
    }
    /* .canada-flag::after {
        content: "";
        position: absolute;
        right: 10%;
        top: -150px;
        width: 100px;
        height: 100px;
        background-image: url(assets/home_Banner/reduse.png) !important;
        background-repeat: no-repeat;
        opacity: 0;
        z-index: 99;
    } */

    .enquiry-form{
        padding: 30px;
        margin-top: 30px;
    }
    .enquiry-form span{
        color: red;
    }
    .enquiry-form label {
        text-transform: uppercase;
    }
    .enquiry-form label , .enquiry-form input , .enquiry-form select{
        color: black;
        outline: none;
        border: none;
        font-weight: 500;
        font-size: 14px;
        font-family: "Inter", sans-serif;
    }
    .enquiry-form input{
        padding-left: 10px;
        width: 100%;
    }
    .enquiry-form-inputparent{
        display: flex;
        align-items: center;
        padding-bottom: 10px;
        margin-bottom: 30px;
    }
    .enquiry-form select{
        width: 100%;
    }
    .accordion-content-careers {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .accordion-active .accordion-content-careers {
        max-height: 1000px; /* Adjust the max-height to fit your content */
        transition: max-height 0.5s ease-in-out;
    }

    .flag-img {
        position: relative;
        top: -150px; /* Start off-screen */
        opacity: 0;  /* Start invisible */
        width: 100px;
        height: 100px;
    }

</style>

<div class="careers-parent contact-US-banner h-full w-full">
    <div class="contact-US h-full w-full">
        <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:pt-[8%] text-white">
            <div class="flex flex-col lg:flex-row justify-between items-start gap-[15%] lg:py-[50px] md:mt-36 lg:mt-0">
                <div class="w-full h-full font_inter">
                    <h1 class="mainHead font-semibold text-[40px] xl:w-[70%] uppercase">Grow Your Career with K-GRAPH</h1>
                    <p class="font-semibold text-[15px] py-[30px]">Kansas Overseas has prided itself on customer and employee satisfaction since its inception. This commitment to its staff has allowed the company to grow to over 200 employees across 5 cities. Kansas is one of the fastest-growing visa companies and is on track to double its workforce:</p>
                    <h2 class="font-semibold text-[30px]">Our Team Identity :</h2>
                    <ul class="list-disc pl-5 text-[18px] mb-6 lg:mb-0">
                        <li class="py-2">Assist with Value-added services</li>
                        <li class="py-2">Learners Before Leaders</li>
                        <li class="py-2">Prepared for marathon</li>
                        <li class="py-2">Replace Self - Mentoring Other Team Members</li>
                    </ul>
                </div>
                <div class="bg-white rounded-xl h-fit w-full canada-flag relative">
                    <div class="absolute right-6 top-[-10px]">
                        <img src="assets/home_Banner/reduse.png" class="flag-img" alt="Canada Flag" />
                    </div>
                    <div>
                        <form action="" class="text-black enquiry-form">
                            <h4 class="font_inter font-semibold text-black text-[32px] pb-10">Enquiry</h4>
                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="name">NAME<span>*</span></label>
                                <input type="text" name="name">
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="email">Email<span>*</span></label>
                                <input type="Email" name="email">
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent mobile">
                                <div>
                                    <select name="country" id="">
                                        <option value="">+91</option>
                                        <option value="">+93</option>
                                        <option value="">+94</option>
                                        <option value="">+96</option>
                                        <option value="">+97</option>
                                    </select>

                                </div>
                                <div class=" flex items-center w-full pl-4">
                                    <label class="md:whitespace-nowrap" for="mobile">Mobile NUMBER<span>*</span></label>
                                    <input type="tel" name="mobile">
                                </div>
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label class="md:whitespace-nowrap" for="email">select branch<span>*</span></label>
                                <select name="" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label class="md:whitespace-nowrap" for="email">department<span>*</span></label>
                                <select name="" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="message">Message<span>*</span></label>
                                <input type="text" name="message">
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="imageUploader" class="cursor-pointer flex justify-between items-center w-full">
                                    <div class="md:whitespace-nowrap">Upload Resume<span>*</span></div>
                                    <div class="w-full flex justify-end">
                                    <img id="uploadIcon" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" width="15" height="15" />
                                    </div>
                                </label>
                                <input id="imageUploader" type="file" accept="image/*" style="display: none;" onchange="handleFileChange()" />
                            </div>

                            <div class="flex justify-end items-center">
                                <div class="border rounded-full border-[#072558] cursor-pointer">
                                    {{-- <input class="!px-[50px] py-1 uppercase text-[#072558] cursor-pointer" type="button" value="Submit"> --}}
                                    <button class="!px-[80px] py-3 uppercase text-[#072558] cursor-pointer text-[16px] font-bold">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="open-positions bg-[#04183c]">
    <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:py-[8%] text-white">
        <h2 class="my-10 font_inter font-semibold text-[25px] md:text-[50px] uppercase w-[50%]">Open positions</h2>

        <div class="bg-[#072f77] cursor-pointer rounded-[8px] my-4 border-b border-b-[#868686]" data-accordion>
            <div class="flex justify-between items-center px-5 py-4 accordion-header-careers">
                <h2 class="font_inter font-bold text-[15px] text-white">Marketing, Kochi, Kerala</h2>
                <div>
                    <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="accordion-icon">
                        <path d="M1 1L9 9L17 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div class="accordion-content-careers">
                <p class="px-5 py-4 text-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum recusandae ut, obcaecati eius quia omnis error quidem non deserunt animi, modi, possimus quod officiis. Cum modi sequi quidem iste laudantium.
                </p>
            </div>
        </div>

        <div class="bg-[#072f77] cursor-pointer rounded-[8px] my-4 border-b border-b-[#868686]" data-accordion>
            <div class="flex justify-between items-center px-5 py-4 accordion-header-careers">
                <h2 class="font_inter font-bold text-[15px] text-white">Sales, Bangalore, Karnataka</h2>
                <div>
                    <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="accordion-icon">
                        <path d="M1 1L9 9L17 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div class="accordion-content-careers">
                <p class="px-5 py-4 text-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum recusandae ut, obcaecati eius quia omnis error quidem non deserunt animi, modi, possimus quod officiis. Cum modi sequi quidem iste laudantium.
                </p>
            </div>
        </div>

    </div>
</div>

{{-- get in touch section --}}
<div class="get-in-Touch bg-[#051b3b] py-28">
    <div class="container mx-auto px-5 xl:px-12 h-full w-full">
        <div class="flex justify-center items-center flex-col ">
            <div class="flex flex-col-reverse md:flex-row items-center">
                <h2 class="font_inter font-semibold text-4xl text-center md:text-left gettouch uppercase gradient-text">Get IN TOUCH WITH US</h2>
                <img class="w-[70px]" src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="">
            </div>
            <p class="text-white py-6 paddadjuster md:w-3/5 lg:w-1/2 text-center font_inter font-semibold lg:text-[22px] gettouchpara">Labaton Keller Sucharow is elevating excellence through innovation, client service, and teamwork.</p>
            <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[6.5px] pl-5 lg:pr-2 overflow-hidden group">
                <!-- Background animation using pseudo-element -->
                <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-0 group-hover:w-full w-0 left-full"></div>

                <h6 class="relative z-10 text-white text-[12px] xl:text-[16px]">Have any doubt</h6>
                <div class="relative z-10 bg-white text-blue-600 px-[20px] py-1 lg:pb-[2px] lg:pt-0 xl:py-[6px] md:rounded-sm cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                    <a href="" class="h-full text-[12px] xl:text-[16px]">Connect Us</a>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function handleFileChange() {
      const input = document.getElementById('imageUploader');
      const icon = document.getElementById('uploadIcon');

      if (input.files && input.files.length > 0) {
        icon.style.filter = 'hue-rotate(270deg) brightness(2.5)';
      } else {
        icon.style.filter = 'none';
      }
    }

    document.querySelectorAll('[data-accordion]').forEach(accordion => {
            accordion.querySelector('.accordion-header-careers').addEventListener('click', () => {
                // Toggle the active state for the clicked accordion
                accordion.classList.toggle('accordion-active');

                // Rotate the arrow icon based on the active state
                const icon = accordion.querySelector('.accordion-icon');
                if (accordion.classList.contains('accordion-active')) {
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    icon.style.transform = 'rotate(0deg)';
                }
            });
        });
</script>


<script>

    document.addEventListener("DOMContentLoaded", function() {
        gsap.registerPlugin(ScrollTrigger);
        gsap.to(".flag-img", {
            scrollTrigger: {
            trigger: ".careers-parent", // The section that triggers the animation
            start: "top center", // When the top of the trigger hits the center of the viewport
            toggleActions: "play none none none", // Play animation when triggered
            },
            duration: 2, // Duration of the animation
            top: "4px", // Final position of the flag (curtain falling to this point)
            opacity: 1, // Fade in the flag as it falls
            ease: "bounce.out", // Bounce effect to mimic a natural falling curtain
        });
    });

</script>

@endsection
