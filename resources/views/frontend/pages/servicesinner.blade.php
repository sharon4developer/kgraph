@extends('layouts.main')
@section('content')
<style>
    .services-grade{
        background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
    }
    .servicesIIner-banner{
        background-image: url(assets/servicesinner.jpg) !important;
        /* background-position-y: center;
        background-position-x: center; */
        background-size: cover;
        background-repeat: no-repeat;
    }
    .services-banner-overlay{
        background: linear-gradient(180deg, #000000 0%, #113165e8 100%);
        height: 100%;
    }
    .services-inner> h2,h3,h4,h5,h6{
        font-weight: 700;
    }
    .services-inner> h2{
        font-size: 16px;
    }
    .services-inner> h3{
        font-size: 14px;
    }
    .services-inner> h4{
        font-size: 12px;
    }
    .services-inner> h5,h6{
        font-size: 10px;
    }
    .services-inner> p,li{
        font-size: 14px;
    }
    .services-inner> li{
        list-style-type: disc;
    }
    .dontwaitwrpr{
        background: linear-gradient(88deg, #000000 0%, rgba(0, 0, 0, 0) 100%);
    }
    .bg-whitefader-garde{
        background: linear-gradient(90deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
        position: relative;
    }
    /* .bg-whitefader-garde::after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 25vh;
        background-image: url(assets/toronto-street-view.jpg) !important;
        z-index: 1;
    } */
     .blufader-grade{
        background: linear-gradient(90deg, #072558 0%, rgba(7, 37, 88, 0) 100%);
     }
</style>



{{-- services banner --}}
<div class="servicesIIner-banner h-full">
    <div class="services-banner-overlay">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
            <div class="text-white text-[12px] font_inter font-semibold">
                <a href="#">Study</a> > <a href="#">Study in Canada</a>
            </div>
            <div class="text-center text-white my-10 flex flex-col justify-center items-center">
                <h1 class="uppercase font_inter font-semibold text-3xl lg:text-[40px]">Student Visa Consultant</h1>
                <p class="lg:w-1/2 mt-5 font_inter font-semibold text-sm lg:text-[18px]">
                    Studying in America can be an exciting experience, but it also comes with its own set of challenges. One such challenge is getting your US student visa approved by the US embassy or consulate
                </p>
            </div>
            <div class="flex justify-center items-center">
                <div class="duration-200 cursor-pointer ease-linear md:bg-transparent text-blue-600 bg-blue-600 lg:hover:bg-blue-600 flex justify-center items-center rounded-full gap-5 py-[6.5px] pl-5 lg:pr-2 w-fit">
                    <h6 class="text-white text-[12px] lg:text-[16px]">Let's turn your vision into reality.</h6>
                    <div class="bg-white text-blue-600 hover:bg-blue-600 hover:text-white px-[20px] py-1 lg:py-[6px] md:rounded-sm ease-in duration-500 cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="" class="h-full">Connect Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Realize can section --}}
<div class="Realize">
    <div class="bg-whitefader-garde">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[3%]">
            <div class="lg:w-1/2 font_inter">
                <h2 class="font-semibold text-xl lg:text-4xl text-[#062358]">Realize Your Canadian Education Goals</h2>
                <div class="blufader-grade text-white my-6 px-5 rounded-md py-3">Key Highlight</div>
                <div>
                    <ul class="list-disc pl-5 text-[#062358] leading-normal">
                        <li class="py-1">What is a US Student Visa?</li>
                        <li class="py-1">What is a US Student Visa?</li>
                        <li class="py-1">What is a US Student Visa?</li>
                        <li class="py-1">What is a US Student Visa?</li>
                        <li class="py-1">What is a US Student Visa?</li>
                        <li class="py-1">What is a US Student Visa?</li>
                        <li class="py-1">What is a US Student Visa?</li>
                        <li class="py-1">What is a US Student Visa?</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- services inner head --}}
<div class="bg-[#062358]">
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
        <div>
            <div class="services-grade w-full py-2 rounded-md my-8">
                <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">Foriegn Nationals</h2>
            </div>
            <div class="services-inner text-white font_inter py-4">
                <h3 class="py-1">There are 3 different types of US Student visas:</h3>
                <h2 class="py-1">It is the most common of all the USA student visas.</h2>
                <p class="py-1">The F1 visa is issued to international students for academic studies. It is issued to students attending a regular</p>
                <p class="py-1">The F1 visa is issued to international students for academic studies. It is issued to students attending a regular</p>
                <ul class="list-disc pl-5 py-4">
                    <li>Have a completed application form</li>
                    <li>Have a completed application form</li>
                    <li>Have a completed application form</li>
                    <li>Have a completed application form</li>
                    <li>Have a completed application form</li>
                    <li>Have a completed application form</li>
                </ul>
            </div>
        </div>

        <div>
            <div class="services-grade w-full py-2 rounded-md my-8">
                <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">other important FAQs</h2>
            </div>
            <div class="services-inner faq text-[#2D3E50] font_inter py-4 flex flex-col justify-start items-start gap-4">
                <div class="accordion-item bg-white p-5 lg:w-1/2 rounded-xl overflow-hidden cursor-pointer transition-all duration-300">
                    <div class="flex justify-between items-center w-full accordion-header gap-4" onclick="toggleAccordion(this)">
                        <img class="accordion-icon transition-transform duration-300 w-2 lg:w-[14px]" src="{{ asset('assets/faqplus.png') }}" alt="Plus Icon">
                        <h3 class="text-[12px] font-semibold lg:text-[14px] lg:font-medium">1. Can I get interviewed at the nearest US Embassy or Consulate?</h3>
                    </div>
                    <p class="pl-10 pt-4 accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ea perferendis reprehenderit! Harum facilis voluptates necessitatibus debitis eius aliquam dolor hic, corporis, delectus laboriosam dolores vitae magnam voluptatem iusto esse!
                    </p>
                </div>

                <div class="accordion-item bg-white p-5 lg:w-1/2 rounded-xl overflow-hidden cursor-pointer transition-all duration-300">
                    <div class="flex justify-between items-center w-full accordion-header gap-4" onclick="toggleAccordion(this)">
                        <img class="accordion-icon transition-transform duration-300 w-2 lg:w-[14px]" src="{{ asset('assets/faqplus.png') }}" alt="Plus Icon">
                        <h3 class="text-[12px] font-semibold lg:text-[14px] lg:font-medium">2. Can I get interviewed at the nearest US Embassy or Consulate?</h3>
                    </div>
                    <p class="pl-10 pt-4 accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ea perferendis reprehenderit! Harum facilis voluptates necessitatibus debitis eius aliquam dolor hic, corporis, delectus laboriosam dolores vitae magnam voluptatem iusto esse!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- don't wait --}}
<div class="dontwait bg-[#062358] h-[30vh] w-full">
    <div class="dontwaitwrpr h-full w-full">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 flex justify-center items-start flex-col  text-white">
            <h4 class="font_inter text-lg font-medium">Don’t wait. Begin your visa application today!</h4>
            <button class="my-4 border border-white rounded-full px-5 py-2 text-[14px] hover:bg-white hover:border-black hover:text-black ease-linear duration-300 hover:font-semibold">FREE ELIGIBILITY CHECK</button>
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
    function toggleAccordion(element) {
        const content = element.nextElementSibling;
        const icon = element.querySelector('.accordion-icon');

        // Check if the content is already expanded
        if (content.style.maxHeight) {
            // Close the accordion
            content.style.maxHeight = null;
            icon.style.transform = "rotate(0deg)"; // Reset the plus icon to original position
        } else {
            // Close any other open accordion
            document.querySelectorAll('.accordion-content').forEach((p) => {
                p.style.maxHeight = null;
            });
            document.querySelectorAll('.accordion-icon').forEach((img) => {
                img.style.transform = "rotate(0deg)";
            });

            // Open the current accordion
            content.style.maxHeight = content.scrollHeight + "px"; // Set the max height dynamically based on content
            icon.style.transform = "rotate(45deg)"; // Rotate the plus icon to indicate it's open
        }
    }
</script>



@endsection
