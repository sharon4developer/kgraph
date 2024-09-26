@extends('layouts.main')
@section('content')
<style>
    .blog-banner-overlay{
        background: linear-gradient(180deg, #000000 0%, #113165e8 100%);
        height: 100%;
    }
    .styling-cards>div{
        margin-bottom: 25px;
    }
    @media (min-width: 768px){
        .styling-cards{
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            gap: 26px;
        }
    }
    @media (min-width: 1024px){
        .styling-cards{
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            gap: 26px;
        }
        .styling-cards>div{
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 0;
        }
    }

</style>

{{-- blogs banner --}}
<div class="blog-banner md:h-[50vh]">
    <div class="blog-banner-overlay">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
            <div class="text-left text-white mt-10">
                <h2 class="uppercase font_inter font-semibold text-[40px]">Blogs</h2>
                <p class="lg:w-[35%] mt-5 font_inter font-semibold text-[12px]">
                    In case you are filling out the form for a friend or sponsored person, please input the information of the person who wants to immigrate.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- blog cards --}}
{{-- Blog sect --}}
<div class="BlogCRDS bg-[#051b3b]">
    <div class="container mx-auto px-5 lg:px-12 lg:py-16 h-full w-full">
        <div class="pt-[20px] pb-[70px] gap-6  w-full styling-cards" style="">
            <div class="bg-white w-full h-[450px] mr-5">
                <img class="h-[150px] w-full object-cover object-top" src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="blog_image"/>
                <p class="text-[#072558] font_inter font-medium text-[14px] text-right mr-2">Topics: Canada Immigration</p>
                <div class="py-4 px-6">
                    <div class="flex items-center gap-4 relative">
                        <img class="w-[50px] h-[50px] absolute top-[-60px]" src="{{ asset('assets/home_Banner/athulraj.png') }}" alt="profile_image"/>
                        <div class="mt-2">
                            <h6 class="font_inter font-semibold text-16px text-[#072558]">Anusha</h6>
                            <p class="text-[#072558] font_inter font-medium text-[10px] lg:text-[12px] xl:text-[14px]">by Anusha, on Aug 5, 2024 11:46:47 AM</p>
                        </div>
                    </div>
                    <h5 class="text-[#072558] font_inter font-bold text-[10px] lg:text-[12px] xl:text-[14px] py-5">Top Immigration Consultant in Bangalore for 2024</h5>
                    <p class="text-[#072558] font_inter font-normal text-justify text-[10px] lg:text-[12px] xl:text-[14px]">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. </p>
                    <div class="flex justify-end">
                        <button class="border border-[#072558] rounded-full px-10 py-1 my-4 text-[#072558] hover:bg-[#072558] hover:text-white ease-linear duration-300">View</button>
                    </div>
                </div>
            </div>
            <div class="bg-white w-full h-[450px] mr-5">
                <img class="h-[150px] w-full object-cover object-top" src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="blog_image"/>
                <p class="text-[#072558] font_inter font-medium text-[14px] text-right mr-2">Topics: Canada Immigration</p>
                <div class="py-4 px-6">
                    <div class="flex items-center gap-4 relative">
                        <img class="w-[50px] h-[50px] absolute top-[-60px]" src="{{ asset('assets/home_Banner/athulraj.png') }}" alt="profile_image"/>
                        <div class="mt-2">
                            <h6 class="font_inter font-semibold text-16px text-[#072558]">Anusha</h6>
                            <p class="text-[#072558] font_inter font-medium text-[10px] lg:text-[12px] xl:text-[14px]">by Anusha, on Aug 5, 2024 11:46:47 AM</p>
                        </div>
                    </div>
                    <h5 class="text-[#072558] font_inter font-bold text-[10px] lg:text-[12px] xl:text-[14px] py-5">Top Immigration Consultant in Bangalore for 2024</h5>
                    <p class="text-[#072558] font_inter font-normal text-justify text-[10px] lg:text-[12px] xl:text-[14px]">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. </p>
                    <div class="flex justify-end">
                        <button class="border border-[#072558] rounded-full px-10 py-1 my-4 text-[#072558] hover:bg-[#072558] hover:text-white ease-linear duration-300">View</button>
                    </div>
                </div>
            </div>
            <div class="bg-white w-full h-[450px] mr-5">
                <img class="h-[150px] w-full object-cover object-top" src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="blog_image"/>
                <p class="text-[#072558] font_inter font-medium text-[14px] text-right mr-2">Topics: Canada Immigration</p>
                <div class="py-4 px-6">
                    <div class="flex items-center gap-4 relative">
                        <img class="w-[50px] h-[50px] absolute top-[-60px]" src="{{ asset('assets/home_Banner/athulraj.png') }}" alt="profile_image"/>
                        <div class="mt-2">
                            <h6 class="font_inter font-semibold text-16px text-[#072558]">Anusha</h6>
                            <p class="text-[#072558] font_inter font-medium text-[10px] lg:text-[12px] xl:text-[14px]">by Anusha, on Aug 5, 2024 11:46:47 AM</p>
                        </div>
                    </div>
                    <h5 class="text-[#072558] font_inter font-bold text-[10px] lg:text-[12px] xl:text-[14px] py-5">Top Immigration Consultant in Bangalore for 2024</h5>
                    <p class="text-[#072558] font_inter font-normal text-justify text-[10px] lg:text-[12px] xl:text-[14px]">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. </p>
                    <div class="flex justify-end">
                        <button class="border border-[#072558] rounded-full px-10 py-1 my-4 text-[#072558] hover:bg-[#072558] hover:text-white ease-linear duration-300">View</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
