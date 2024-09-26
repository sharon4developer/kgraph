@extends('layouts.main')
@section('content')

{{-- Load GSAP --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>


<div class="aboutusbanner relative h-full">
    <div class="absolute w-full h-full aboutbackgroundimage"></div>
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 lg:py-[8%]">
        <div class="flex flex-col justify-center items-start h-full w-full text-left text-white z-10 md:mt-[16%] lg:mt-8">
            <h2 class="font_inter font-semibold text-[40px] uppercase leading-normal">About Us</h2>
            <div class="flex items-center gap-4 py-8 lg:py-4">
                <h3 class="font_inter font-normal text-[15px] lg:text-[20px] text-justify">Take a sneak peek in to our journey</h3>
                <img class="w-[50px]" src="{{ asset('assets/about/aboutrocket.png') }}" alt="rocket">
            </div>
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4 lg:gap-20">
                <div class="w-full">
                    <img class="w-[30px]" src="{{ asset('assets/about/rolloutimage.webp') }}" alt="roll">
                    <p class="font_inter font-medium text-[14px] md:text-[20px] text-justify mt-8">
                        “Just like the philosophy of Google, we incorporated our
                        company with the belief in ‘not being evil’. At Kansas,
                        we inspire our teams to be straight-forward, transparent,
                        and customer-centric and the rest is history.”
                    </p>
                </div>
                <div class="w-full cursor-pointer">
                    <img class="hover:scale-105 ease-linear duration-300" src="{{ asset('assets/about/videodummy.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cta bg-[#062358]">
    <div class="container mx-auto px-5 lg:px-12 py-8">
        <div class="z-10 relative translate-large md:py-10">
            <h6 class="capitalize mb-5 text-white font_inter font-semibold text-[19px]">Meet Our crew</h6>
            <div class="flex items-center overflow-scroll scrollbar-hidden gap-4 mb-6">
                <div class="w-full md:w-[273px] border rounded-xl">
                    <img class="md:w-[273px] rounded-xl" src="{{ asset('assets/about/ctaabout.png') }}" alt="">
                    <div class="text-white font_inter px-5 pb-4">
                        <h5 class="pt-[10px] font-semibold text-base">Eric J.Befli</h5>
                        <h6 class="font-semibold text-xs">Partner</h6>

                        <div class="py-[25px] font-bold text-[10px]">
                            <p>140 Broadway, New York, NY 10005</p>
                            <a class="" href="mail.ebelfi@labaton.com">ebelfi@labaton.com</a>
                        </div>

                        <a class="underline underline-offset-2 font-bold text-[10px]" href="#">Read full bio ></a>
                    </div>
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
                <div class="my-6 md:my-0 flex flex-wrap md:flex-nowrap items-start gap-5">
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

<div id="aboutOurStory" class="bg-white our-story my-10 h-[50vh]">
    <div class="container mx-auto px-5 lg:px-12">
        <h2>Our Story</h2>
    </div>
    <div class="mt-6 flex justify-center items-center">
        <div class="h-[2px] w-[95vw] bg-[#0E3065]">
            <div id="movebarparent" class="container mx-auto px-5 lg:px-12 w-full h-full flex items-center relative">
                <div class="absolute bottom-0" style="right: 1%;z-index: 10;top: -61px;">
                    <img class="w-[500px]" src="{{ asset('assets/home_Banner/canadaanimated.png') }}" alt="">
                </div>
                <div id="movedBar" class="bg-[#0E3065] rounded-full h-[6px] w-[30%]"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-5 lg:px-12">
        <div class="flex items-center gap-[50px] mt-6">
            <p class="w-[30%] text-[#06245A] font_inter font-semibold text-justify">
                “<strong>Our Mission</strong> Just like the philosophy of Google,
                we incorporated our company with the belief in
                ‘not being evil’. At Kansas,
                we inspire our teams to be straight-forward,
                transparent, and customer-centric and the rest
                is history.”
            </p>
            <p class="w-[30%] text-[#06245A] font_inter font-semibold text-justify">
                “<strong>Our Mission</strong> Just like the philosophy of Google,
                we incorporated our company with the belief in
                ‘not being evil’. At Kansas,
                we inspire our teams to be straight-forward,
                transparent, and customer-centric and the rest
                is history.”
            </p>
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



<script>
    document.addEventListener('DOMContentLoaded', () => {
        gsap.registerPlugin(ScrollTrigger);

        // Get the parent container where the bar should move within
        const moveBarParent = document.querySelector("#movebarparent");
        const movedBar = document.querySelector("#movedBar");
        const animatedImage = document.querySelector("#movebarparent img"); // Select the image

        // Set the initial height of the image
        animatedImage.style.height = "10px";

        // Calculate the available width in the parent container for movement
        const parentWidth = moveBarParent.offsetWidth;
        const movedBarWidth = movedBar.offsetWidth;

        // Calculate the maximum distance the bar can move within the container
        const maxMoveDistance = (parentWidth - movedBarWidth) * 0.9; // Moves 90% of the way

        // GSAP animation to move the bar within its parent but not fully to the end
        gsap.to(movedBar, {
            x: maxMoveDistance, // Move the bar but stop before the end of the parent container
            ease: "power3.out", // Smooth easing function
            duration: 1, // Increase the duration to slow down the movement
            scrollTrigger: {
                trigger: "#aboutOurStory", // Trigger the animation when this section comes into view
                start: "top 80%", // Animation starts when 80% of the viewport reaches the top of #aboutOurStory
                end: "top 20%", // Animation ends when 20% of the viewport reaches the top of the section
                scrub: 6, // Higher value to slow down the scroll effect
                toggleActions: "play none none none", // Play animation when scrolling down
                invalidateOnRefresh: true, // Recalculate values on page resize
            }
        });

        // GSAP animation to resize the image when the bar reaches the end
        gsap.to(animatedImage, {
            height: "360px", // Target height when the bar reaches the end
            ease: "power3.out", // Smooth easing
            duration: 1, // Increase the duration for a slower animation
            scrollTrigger: {
                trigger: "#aboutOurStory", // Trigger the animation when this section comes into view
                start: "top 80%", // Same scroll trigger as the bar
                end: "top 20%", // Animation ends when 20% of the viewport reaches the top of the section
                scrub: 6, // Slower scroll effect to match the bar animation
                toggleActions: "play none none none", // Play the animation on scroll
                invalidateOnRefresh: true, // Recalculate the layout on window resize
            },
        });
    });
</script>



@endsection
