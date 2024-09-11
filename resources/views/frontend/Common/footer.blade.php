<footer class="w-full bg-[#062357] footer-secpernt mt-6">
    <div class="relative footer-secpernt w-full">

        <div class="container mx-auto px-5 lg:px-12 lg:w-screen">
            <div class="absolute footer-last h-full w-[93%] container mx-auto lg:px-12  bg-center bg-contain bg-no-repeat opacity-10 z-[-1]" style="background-position-y: 50px;"></div>
        </div>

        <div class="flex flex-col md:flex-row gap-6 md:gap-0 justify-start md:justify-center items-center py-3 md:py-8 md:mt-[2%] container mx-auto lg:px-12 ">
            <div class="flex items-start md:items-center gap-5 justify-center">
                <img src="{{asset('assets/nooneedvisa.png')}}" alt="visa no need">
                <h2 class="w-[60%] text-[14px] xl:text-[30px] font-semibold plus_jakarta text-white">Need any support for tour and visa?</h2>
            </div>
            <div class="flex items-start md:items-center gap-5 md:border-l border-l-[#FFFFFF] border-opacity-50 justify-center">
                <img src="{{ asset ('assets/travelstarted.png') }}" alt="started travelling">
                <h2 class="w-[60%] text-[14px] xl:text-[30px] font-semibold plus_jakarta text-white">are you ready for get started travelling?</h2>
            </div>
        </div>

        <div class="mt-[5%] md:mt-3 border-t border-b border-l-[#FFFFFF] border-opacity-50 py-11">
            <div class="flex flex-col lg:flex-row justify-center gap-10 lg:gap-[10%] items-start container mx-auto px-5 lg:px-12">
                <div class="flex flex-col justify-between items-start gap-[30px] md:gap-4 w-full">
                    <div class="flex items-center gap-[4px]">
                        <img class="w-[1.80rem] logo_image lg:w-[2.5rem]" src="{{asset('assets/KgraphLogo.png')}}" alt="K-graph logo">
                        <div>
                            <h2 class="text-base font-bold logo_text lg:text-[30px] text-white">KGRAPH</h2>
                            <h6 class="text-[7px]  font-medium logo_title lg:mt-1 text-white">IMMIGRATION CONSULTANCY INC.</h6>
                        </div>
                    </div>

                    <div class="text-white">
                        <p class="font-thin text-sm plus_jakarta">Corporate business typically refers <br> to large-scale mansola it enterprises <br> or organizat</p>
                    </div>

                    <div class="flex items-center gap-6">
                        <img class="max-h-[15px]" src="{{ asset('assets/facebookVector.png') }}" alt="facebook">
                        <img class="max-w-[15px]" src="{{ asset('assets/InstagramVector.png') }}" alt="Instagaram">
                        <img class="max-w-[15px]" src="{{ asset('assets/XVector.png') }}" alt="X">
                        <img class="max-w-[15px]" src="{{ asset('assets/LinkedIn.png') }}" alt="Linked">
                    </div>
                </div>

                {{-- <div class="flex flex-col md:flex-row justify-between items-center"> --}}
                <div class="flex flex-col justify-between items-start gap-[30px] md:gap-4 w-full">
                    <h2 class="text-white">Services</h2>
                    <ul class="custom-bullets text-white">
                        <li class="lg:whitespace-nowrap">Mistakes To Avoid</li>
                        <li class="lg:whitespace-nowrap">Your Startup</li>
                        <li class="lg:whitespace-nowrap">Knew About Fonts</li>
                        <li class="lg:whitespace-nowrap">Knew About Fonts</li>
                    </ul>
                </div>

                <div class="flex flex-col justify-between items-start gap-[30px] md:gap-4 w-full">
                    <h2 class="text-white">Useful Link</h2>
                    <ul class="custom-bulletssec text-white">
                        <li class="lg:whitespace-nowrap">Latest News</li>
                        <li class="lg:whitespace-nowrap">Careers</li>
                        <li class="lg:whitespace-nowrap">General Inquiries</li>
                        <li class="lg:whitespace-nowrap">Case Studies</li>
                    </ul>
                </div>
                {{-- </div> --}}

                <div class="flex flex-col justify-between items-start gap-[30px] md:gap-4 w-full">
                    <h2 class="text-white">Subscribe Our Newsletter</h2>
                    <p class="text-white text-sm">Corporate business typically refers to large-scale mansola it.</p>
                    <div class="rounded-full bg-black border border-solid border-neutral-700 flex items-center relative w-full">
                        <input class="border-none outline-none bg-transparent py-3 lg:py-6 h-full px-4 w-full text-white placeholder:text-white" type="email" name="" id="" placeholder="Enter Email">
                        <button class=" absolute right-0 p-6 rounded-full bg-blue-900"><img class="md:w-6 lg:w-4" src="{{ asset('assets//sendingg.png') }}" alt=""></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-5 lg:px-12 ">
            <div class="flex flex-col-reverse md:flex-row justify-between items-start md:items-center py-8 gap-5">
                <div>
                    <small class="capitalize font-light text-[10px] font_aktiv text-white">© 2024 - CanDo Canadian Immigration Services.</small>
                </div>
                <div>
                    <ul class="flex flex-col md:flex-row items-start md:items-center gap-5 text-white">
                        <li>Terms & Condition</li>
                        <li>Privacy Policy</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>
