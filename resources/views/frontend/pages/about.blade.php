@extends('layouts.main')
@section('content')

<div class="aboutusbanner relative h-full">
    <div class="absolute w-full h-full aboutbackgroundimage"></div>
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 lg:py-[8%]">
        <div class="flex flex-col justify-center items-start h-full w-full text-left text-white z-10 md:mt-[16%] lg:mt-8">
            <h2 class="font_inter font-semibold text-[40px] uppercase leading-normal">About Us</h2>
            <div class="flex items-center gap-4 py-8">
                <h3 class="font_inter font-normal text-[15px] text-justify">Take a sneak peek in to our journey</h3>
                <img class="w-[50px]" src="{{ asset('assets/about/aboutrocket.png') }}" alt="rocket">
            </div>
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4 lg:gap-20">
                <div class="w-full">
                    <img class="w-[30px]" src="{{ asset('assets/about/rolloutimage.webp') }}" alt="roll">
                    <p class="font_inter font-medium text-[20px] text-justify mt-8">
                        “Just like the philosophy of Google, we incorporated our
                        company with the belief in ‘not being evil’. At Kansas,
                        we inspire our teams to be straight-forward, transparent,
                        and customer-centric and the rest is history.”
                    </p>
                </div>
                <div class="w-full">
                    <img src="{{ asset('assets/about/videodummy.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cta bg-[#062358]">
    <div class="container mx-auto px-5 lg:px-12 py-8">
        <div class="z-10 relative translate-large md:py-10">
            <h6 class="capitalize mb-5 text-white font_inter font-semibold text-[19px]">Meet Our crew</h6>
            <div class="flex items-center justify-evenly overflow-scroll scrollbar-hidden gap-4">
                <div class=" w-[273px]">
                    <img class="w-[273px]" src="{{ asset('assets/about/ctasectionbox.png') }}" alt="">
                </div>
                <div class="hidden md:block w-[273px]">
                    <img class="w-[273px]" src="{{ asset('assets/about/ctasectionbox.png') }}" alt="">
                </div>
                <div class="hidden md:block w-[273px]">
                    <img class="w-[273px]" src="{{ asset('assets/about/ctasectionbox.png') }}" alt="">
                </div>
                <div class="hidden md:block w-[273px]">
                    <img class="w-[273px]" src="{{ asset('assets/about/ctasectionbox.png') }}" alt="">
                </div>
                <div class="hidden md:block w-[273px]">
                    <img class="w-[273px]" src="{{ asset('assets/about/ctasectionbox.png') }}" alt="">
                </div>
                <div class="hidden md:block w-[273px]">
                    <img class="w-[273px]" src="{{ asset('assets/about/ctasectionbox.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="">
            <div class="flex flex-col lg:flex-row gap-6">
                <div class="w-full">
                    <h4 class="text-white font_inter font-semibold text-[22px] lg:text-[30px] lg:w-[75%]">Navigate Your Canadian Immigration Journey with Confidence</h4>
                    <p class="text-white font_inter font-thin text-justify text-[14px] py-4  lg:w-[75%]">We enable some of the most demanding organizations to enrich customer experiences, optimize efficiencies, launch new platforms, and monetize data opportunities. We offer fully-managed and end-to-end technology, tools, talent, </p>
                </div>
                <div class="w-full">
                    <img src="{{ asset('assets/about/tronoto.webp') }}" alt="">
                </div>
            </div>

            <div class="md:flex items-end gap-[45px] mt-5">
                <div>
                    <h2 id="count-number" class="text-white font_inter font-bold text-[85px] leading-none">60+</h2>
                    <p class="text-white">Years of Experience</p>
                </div>
                <div class="my-0 flex flex-wrap md:flex-nowrap items-start gap-5">
                    <div>
                        <h2 class="text-white font_inter font-bold text-[25px] leading-none">60+</h2>
                        <span class="text-white whitespace-nowrap">Employes</span>
                    </div>

                    <div>
                        <h2 class="text-white font_inter font-bold text-[25px] leading-none">4.5</h2>
                        <div class="whitespace-nowrap flex items-center">
                            <span class="text-white block leading-none">Google</span>
                            <span class="text-white">Rating</span>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-white font_inter font-bold text-[25px] leading-none">4.5</h2>
                        <span class="text-white whitespace-nowrap">Offices</span>
                    </div>
                    <div>
                        <h2 class="text-white font_inter font-bold text-[25px] leading-none">30k+</h2>
                        <span class="text-white whitespace-nowrap">Customers Served</span>
                    </div>
                    <div>
                        <h2 class="text-white font_inter font-bold text-[25px] leading-none">3k</h2>
                        <span class="text-white whitespace-nowrap">Active Cases</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="loaction bg-[#062358]">
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-12">
        <div class="flex items-end w-full gap-2 lg:gap-7">
            <h2 class="uppercase text-white font_inter font-semibold text-[30px] lg:text-[45px] leading-none thirdleft-to-right-animation">Locations</h2>
            <div class="w-full thirdleft-to-right-width-animation" style="border: 2px solid #FFFFFF8C;margin-bottom: 8px;"></div>
        </div>

        <div class="lg:flex lg:gap-[10%] mt-9">
            <div class="w-full mb-6 lg:mb-0">
                <h4 class="font_inter font-semibold text-[20px] text-white py-4">Find Your Licensed Immigration ConsultantWherever You Are Located</h4>
                <div class="grid gap-3 aboutnow knowbutton" style="">
                    <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                        <div class="text-white">Study in Canada</div>
                        <div>
                            <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                            </svg>
                        </div>
                    </button>

                    <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                        <div class="text-white">Study in Canada</div>
                        <div>
                            <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                            </svg>
                        </div>
                    </button>

                    <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                        <div class="text-white">Study in Canada</div>
                        <div>
                            <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                            </svg>
                        </div>
                    </button>

                    <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                        <div class="text-white">Study in Canada</div>
                        <div>
                            <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                            </svg>
                        </div>
                    </button>

                    <button class="flex items-center justify-between gap-4 border border-white rounded-full px-6 py-2">
                        <div class="text-white">Study in Canada</div>
                        <div>
                            <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 lg:w-full mb-4 lg:mb-0">
                <!-- Top Left -->
                <div class="flex justify-center items-center rounded-lg overflow-hidden h-[190px]">
                    <img src="{{ asset('assets/home_Banner/immigraton.png') }}" alt="Immigration" class="w-full h-full object-cover" />
                </div>

                <!-- Right Side (Spans both rows) -->
                <div class="row-span-2 rounded-lg overflow-hidden h-[400px]">
                    <img src="{{ asset('assets/home_Banner/cityrectangle.png') }}" alt="Cityscape" class="w-full h-full object-cover" />
                </div>

                <!-- Bottom Left -->
                <div class="flex justify-center items-center rounded-lg overflow-hidden h-[190px]">
                    <img src="{{ asset('assets/home_Banner/suareman.png') }}" alt="Lawyer" class="w-full h-full object-cover" />
                </div>
            </div>
        </div>


    </div>
</div>



@endsection
