@extends('layouts.main')
@section('content')
<style>
    .services-grade{
        background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
    }
    .packaginner-banner{
        background-image: url(assets/home_Banner/bannerCity.jpg) !important;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .packages-banner-overlay{
        background: #00000099;

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
     .Realize{
        background-image: url(/assets/whitefader.png) !important;
        background-size: cover;
     }
     .services-inner {
    color: white; /* Example styles */
    font-family: 'Inter', sans-serif;
    padding-top: 1rem;
    padding-bottom: 1rem;
}

.services-inner h3, .services-inner h2, .services-inner p {
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
}

.services-inner ul {
    list-style-type: disc;
    padding-left: 1.25rem;
    padding-top: 1rem;
    padding-bottom: 1rem;
}

.services-inner ul li {
    /* Style for the list items */
    margin-bottom: 0.5rem; /* Example: space between list items */
    color: inherit; /* Inherits the text color from .services-inner */
    font-size: 1rem; /* Example font size */
}

</style>



{{-- services banner --}}
<div class="packaginner-banner h-full relative">
    @if($package) <!-- Assuming $package is the variable containing the package data -->
    <img  src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$package->image }}" alt="{{ $package->alt_tag }}" class="absolute top-0 left-0 w-full h-full object-cover z-[-1] object-top" alt="Banner City">
    @endif

    <div class="packages-banner-overlay">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
            <div class="text-white text-[12px] font_inter font-semibold">
                <a href="#">Study</a> > <a href="#">Study in Canada</a>
            </div>
            <div class="text-center text-white my-10 flex flex-col justify-center items-center">
                <h1 class="capitalize font_inter font-semibold text-3xl lg:text-[40px]">{{$package->title}}</h1>
                <p class="lg:w-1/2 mt-5 font_inter font-medium text-sm lg:text-[14px]">
                    {{$package->description}}
                </p>
            </div>
            <div class="flex justify-center items-center">
                <div class="w-fit">
                    <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-[4.5px] pl-6 pr-1 overflow-hidden group">
                        <!-- Background animation using pseudo-element -->
                        <div class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>
                        <h6 class="relative z-10 text-white text-[10px] md:text-[14px] 2xl">Let's turn your vision into reality.</h6>
                        <div class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:py-[4px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                            <a href="{{ url('contact-us') }}" class="h-full text-[12px] lg:text-[16px] font-semibold">Connect Us</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


{{-- services inner head --}}
<div class="bg-[#062358]">
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
        <div>
            @foreach ($package->PackagePoint as $PackagePoint)
            @if($PackagePoint->status ==1)
            <div class="services-grade w-full py-2 rounded-md my-8">
                <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">{{$PackagePoint->title}}</h2>
            </div>
            <div class="services-inner text-white font_inter py-4">
                {!!$PackagePoint->description!!}
            </div>
            @endif
            @endforeach
        </div>

        <div>
            <div class="services-grade w-full py-2 rounded-md my-8">
                <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">other important FAQs</h2>
            </div>
            <div class="services-inner faq text-[#2D3E50] font_inter py-4 flex flex-col justify-start items-start gap-4">
                @foreach ($package->PackageFaq as $PackageFaq)
                @if($PackageFaq->status ==1)
                <div class="accordion-item bg-white p-5 lg:w-1/2 rounded-xl overflow-hidden cursor-pointer transition-all duration-300" onclick="toggleAccordion(this)">
                    <div class="flex justify-start items-center w-full h-full accordion-header gap-4">
                        <img class="accordion-icon transition-transform duration-300 w-2 lg:w-[14px]" src="{{ asset('assets/faqplus.png') }}" alt="Plus Icon">
                        <h3 class="text-[12px] text-[#2D3E50] font-semibold font_inter lg:text-[14px] 2xl:text-[16px] lg:font-medium">{{$PackageFaq->title}}</h3>
                    </div>
                    <div class="pl-10 accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <p class="pt-3">{{$PackageFaq->description}}</p>
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
    <div class="dontwaitwrpr h-full w-full">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 flex justify-center items-start flex-col  text-white">
            <h4 class="font_inter text-lg font-medium">Don’t wait. Begin your visa application today!</h4>
            <a href="{{ url('eligibility-check') }}" class="my-4 border border-white rounded-full px-5 py-2 text-[14px] hover:bg-white hover:border-black hover:text-black ease-linear duration-300 hover:font-semibold">FREE ELIGIBILITY CHECK</a>
        </div>
    </div>
</div>

@include('frontend.Common.getintouch')

<script>
function toggleAccordion(element) {
    // Find the parent accordion-item
    const parent = element.closest('.accordion-item');
    const content = parent.querySelector('.accordion-content');
    const icon = parent.querySelector('.accordion-icon');

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
