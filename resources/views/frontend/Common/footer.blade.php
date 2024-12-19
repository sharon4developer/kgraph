<style>
    #news-letter-email-error {
        position: absolute;
        bottom: -36px;
        left: 14px;
    }
    .glow-effect{
        -webkit-box-shadow: 0px 25px 25px -15px rgba(255, 255, 255, 0.73);
        -moz-box-shadow: 0px 25px 25px -15px rgba(255, 255, 255, 0.73);
        box-shadow: 0px 25px 25px -15px rgba(255, 255, 255, 0.73);

    }
</style>

<?php
use App\Models\ServiceCategory;
$serviceCategories = ServiceCategory::select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->limit(4)->get();
?>

<footer class="w-full bg-[#062357] footer-secpernt h-full relative overflow-hidden">
    <div class="absolute z-10 top-[-18%] lg:left-[45%] left-[15%] lg:top-[-20%] h-full w-full">
        <img id="earth" src="{{asset('assets/home_Banner/earth.svg')}}" alt="" class="w-[850px] h-full object-contain opacity-50">
    </div>
    <div class="relative w-full footer z-30 py-10">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-4  lg:py-0 flex items-center">
            <div class="lg:w-1/2">
                <div class="flex flex-col lg:flex-row lg:items-center gap-5 lg:gap-10 pt-16">
                    <div class="flex items-center gap-5">
                        <img class="" src="{{ asset('assets/home_Banner/grouplogo.png') }}" alt="K-graph logo">
                    </div>

                    <div class="flex items-center gap-3 mr-[5px]">
                        <img class="w-[20px]" src="{{ asset('assets/nooneedvisa.png') }}" alt="visa no need">
                        <div class="text-sm font-semibold font_roboto text-white">Need any support fortour and visa?</div>
                    </div>

                    <div class="flex items-center gap-3">
                        <img class="w-[20px]" src="{{ asset('assets/travelstarted.png') }}" alt="started travelling">
                        <div class="text-sm font-semibold font_roboto text-white">Are you ready forget started travelling?</div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row lg:items-center md:justify-center  lg:justify-start gap-10 lg:gap-36 py-16">
                    <div class="">
                        <h4 class="lg:pt-8 capitalize font_roboto font-semibold font_inter text-[18px] pb-5 text-white">Company</h4>
                        <ul class="font_inter flex flex-col gap-1">
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('about-us') }}">About</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('careers') }}">Careers</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('faq') }}">Faq</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('teams') }}">Teams</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('contact-Us') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="">
                        <h4 class="lg:pt-8 capitalize font-semibold font_inter text-[18px] pb-5 text-white">Services</h4>
                        <ul class="font_inter flex flex-col gap-1">
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('about-us') }}">About</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('careers') }}">Careers</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('faq') }}">Faq</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('teams') }}">Teams</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('contact-Us') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="">
                        <h4 class="lg:pt-8 capitalize font-semibold font_inter text-[18px] pb-5 text-white">Useful links</h4>
                        <ul class="font_inter flex flex-col gap-1">
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('about-us') }}">About</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('careers') }}">Careers</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('faq') }}">Faq</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('teams') }}">Teams</a></li>
                            <li class=""><a class="font-light font_roboto text-white text-lg lg:text-xs" href="{{ url('contact-Us') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mx-8">
            <div class="bg-[#7B7E86] h-[1px] w-full"></div>
        </div>

        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8  lg:py-0 flex flex-col justify-center">
            <div class="flex flex-col lg:flex-row gap-8 lg:justify-between w-full">
                <div class="flex items-center gap-3 pt-10"> 
                    <span class="capitalize font-bold text-sm text-white font_roboto hidden lg:block">Subscribe</span>
                    <div class="bg-white rounded-[50px] flex items-center overflow-hidden glow-effect">
                        <input type="email" class="min-w-[189px] w-[100vw] max-w-[280px] md:w-[280px] py-2 px-3 outline-none font_roboto" style="background: none;" name="email" id="footer-email" placeholder="Enter your email Address">
                        <button class="bg-black text-white rounded-[50px] font_roboto font-normal text-sm py-2 px-3 mx-[2px] block">Subscribe</button>
                    </div>
                </div>

                <div class="flex gap-5 items-center">
                    <div class="capitalize font-bold text-sm text-white font_inter">Subscribe</div>
                    <div class="flex items-center gap-4">
                        <a href="https://www.facebook.com/KGraphimmigration/" target="_blank" rel="noopener noreferrer">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/facebookban.png') }}" alt="facebook">
                        </a>
                        <a href="https://www.instagram.com/kgraph_immigration?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/instagramban.png') }}" alt="instagram">
                        </a>
                        <a href="https://ca.linkedin.com/company/kgraph-homeabout-usstudy-abroadcanada-immigrationieltsother-servicescontact-1-416-989-7788-91-94476" target="_blank" rel="noopener noreferrer">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/linkedinban.png') }}" alt="linkedin">
                        </a>
                        <a href="https://www.youtube.com/@kgraphimmigration8686/featured" target="_blank" rel="noopener noreferrer">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/youtubeban.png') }}" alt="youtube">
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center flex-col md:flex-row lg:justify-around pt-6">
                <div>
                    <span class="text-white font_jakartafoot font-normal text-xs opacity-80">© K-graph  2025 | All Rights Reserved</span>
                </div>

                <div class="flex items-center gap-6  opacity-80">
                    <div><a class="text-white font_jakartafoot font-normal text-xs" href="#">Trams & Condition</a></div>
                    <div><a class="text-white font_jakartafoot font-normal text-xs" href="#">Privacy Policy</a></div>
                    <div><a class="text-white font_jakartafoot font-normal text-xs" href="#">Contact Us</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    // gsap.to("#earth", {
    //     rotation: 360, // Rotate 360 degrees
    //     duration: 60,  // Animation duration (20 seconds for a smooth spin)
    //     repeat: -1,    // Infinite rotation
    //     ease: "linear" // Linear easing for constant speed
    // });
</script>

<script src="{{ asset('admin/theme/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/assets/js/forms/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/theme/alertifyjs/build/alertify.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/assets/js/forms/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
<script src="{{ asset('common/theme/js/common.js') }}?v={{ config('app.version') }}"></script>
