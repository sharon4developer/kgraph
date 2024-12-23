<style>
    #news-letter-email-error {
        position: absolute;
        bottom: 43px;
        left: 127px;
    }
    .glow-effect{
        -webkit-box-shadow: 0px 25px 25px -15px rgba(255, 255, 255, 0.73);
        -moz-box-shadow: 0px 25px 25px -15px rgba(255, 255, 255, 0.73);
        box-shadow: 0px 25px 25px -15px rgba(255, 255, 255, 0.73);
    }
    .arrow-comig {
    position: relative; /* Needed for pseudo-elements */
    display: inline-block;
    transition: all 0.3s ease; /* Smooth animation for hover */
    }.arrow-comig::before {
    content: '';
    position: absolute;
    width: 0;
    height: 2px; /* Thickness of the underline */
    bottom: 0;
    left: 0;
    border-radius: 100%;
    background-color: #7B7E86; /* Underline color */
    transition: width 0.3s ease; /* Smooth animation */
    }.arrow-comig:hover{
        /* font-weight: 500; */
        transform: scale(1.05);
        /* text-transform: uppercase; */
    }
    .arrow-comig:hover::after {
    opacity: 1; /* Show the arrow */
    right: -10px; /* Move it closer to the text */
    }.arrow-comig:hover::before {
    width: 100%; /* Expand the underline */
    }
    @media (min-width: 1024px){
    	.globebg{
            background-image: url(assets/home_Banner/earth.svg) !important;
            background-repeat: no-repeat;
            background-position-x: right;
            background-size: 800px;
        }
    }
</style>

<?php
use App\Models\ServiceCategory;
$serviceCategories = ServiceCategory::select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->limit(4)->get();
?>

<footer class="w-full bg-[#062357] footer-secpernt h-full relative overflow-hidden globebg">
    {{-- <div class="absolute z-10 top-[-18%] lg:left-[45%] left-[15%] lg:top-[-20%] h-full w-full">
        <img id="earth" src="{{asset('assets/home_Banner/earth.svg')}}" alt="" class="w-[1050px] h-full object-contain opacity-50">
    </div> --}}
    <div class="relative w-full footer z-30 py-6 md:pt-10 md:pb-6">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-4  lg:py-0 flex items-center">
            <div class="w-full xl:w-1/2">
                <div class="flex flex-col md:flex-row lg:items-center gap-5 lg:gap-10 pt-4">
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

                <div class="flex flex-col md:flex-row lg:items-center  lg:justify-start gap-10 lg:gap-36 py-8">
                    <div class="">
                        <h4 class="lg:pt-4 capitalize font_roboto font-semibold font_inter text-[18px] 2xl:text-xl pb-5 text-white lg:whitespace-nowrap">Company</h4>
                        <ul class="font_inter flex flex-col gap-1">
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('about-us') }}">About</a></li>
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('careers') }}">Careers</a></li>
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('packages') }}">Packages</a></li>
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('contact-us') }}">Contact us</a></li>
                            {{-- <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('contact-Us') }}">Contact Us</a></li> --}}
                        </ul>
                    </div>

                    <div class="">
                        <h4 class="lg:pt-4 capitalize font-semibold font_inter text-[18px] 2xl:text-xl pb-5 text-white lg:whitespace-nowrap">Services</h4>
                        <ul class="font_inter flex flex-col gap-1">
                            @foreach ($serviceCategories as $serviceCategory)
                                <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg capitalize lg:whitespace-nowrap" href="{{ url('services') }}">{!!$serviceCategory->title!!}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="">
                        <h4 class="lg:pt-4 capitalize font-semibold font_inter text-[18px] 2xl:text-xl pb-5 text-white lg:whitespace-nowrap">Useful links</h4>
                        <ul class="font_inter flex flex-col gap-1">
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('careers') }}">Careers</a></li>
                            {{-- <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('teams') }}">Blogs</a></li> --}}
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('blogs') }}">Blogs Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mx-8">
            <div class="bg-[#7B7E86] h-[1px] w-full"></div>
        </div>

        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8  lg:py-0 flex flex-col justify-center">
            <div class="flex flex-col md:flex-row lg:items-center gap-8 lg:justify-between w-full lg:pt-5">
                <div class="flex items-center gap-3 pt-10 md:pt-0"> 
                    <span class="capitalize font-bold text-sm text-white font_roboto hidden lg:block">Subscribe</span>
                    <form id="news-letter-add-form">
                        <div class="bg-white rounded-[50px] flex items-center overflow-hidden glow-effect">
                            <input type="email" class="min-w-[189px] w-[100vw] max-w-[245px] md:w-[280px] py-2 px-3 outline-none font_roboto" style="background: none;" name="news_letter_email" id="news-letter-email" placeholder="Enter your email Address">
                            <button class="bg-black text-white rounded-[50px] font_roboto font-normal text-sm py-2 px-3 mx-[2px] block">Subscribe</button>
                        </div>
                    </form>
                </div>

                <div class="lg:flex flex-col gap-2">
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
    
                    <div class="flex items-center gap-6  opacity-80">
                        <div><a class="text-white font_jakartafoot font-normal text-xs" href="{{ url('terms-and-conditions') }}">Trams & Condition</a></div>
                        <div><a class="text-white font_jakartafoot font-normal text-xs" href="{{ url('privacy-policy') }}">Privacy Policy</a></div>
                        <div><a class="text-white font_jakartafoot font-normal text-xs" href="{{ url('contact-us') }}">Contact Us</a></div>
                    </div>
                </div>
            </div>
            {{-- <div class="flex items-center flex-col md:flex-row lg:justify-around pt-3"> --}}
                <div class="pt-6">
                    <span class="text-white font_jakartafoot font-normal text-xs opacity-80">© 2024 - K-graph Canadian Immigration Services.</span>
                </div>

        
            {{-- </div> --}}
        </div>
    </div>
</footer>

<script>
    const links = document.querySelectorAll('.arrow-comig');
    links.forEach(link => {
    link.textContent = link.textContent.charAt(0).toUpperCase() + link.textContent.slice(1).toLowerCase();
    });
</script>

<script src="{{ asset('admin/theme/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/assets/js/forms/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/theme/alertifyjs/build/alertify.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/assets/js/forms/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
<script src="{{ asset('common/theme/js/common.js') }}?v={{ config('app.version') }}"></script>
