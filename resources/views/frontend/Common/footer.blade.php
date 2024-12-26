<style>

</style>

<?php
use App\Models\ServiceCategory;
$serviceCategories = ServiceCategory::select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->limit(4)->get();
?>

<footer class="w-full footer-secpernt h-full relative overflow-hidden">
    <div class="globebg">
        <div class="relative w-full footer z-30 py-6 md:pt-10 md:pb-6 bg-[#062357B2]">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-4  lg:py-0 flex flex-col lg:flex-row justify-between gap-10 lg:gap-72 items-start">
                <div class="w-full xl:w-[65%] flex flex-col gap-8 lg:gap-16">
                    <div class="flex items-center gap-5">
                        <img class="" src="{{ asset('assets/home_Banner/grouplogo.png') }}" alt="K-graph logo">
                    </div>
    
                    <div class="">
                        <ul class="font_inter flex flex-col lg:flex-row lg:items-center gap-6">
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('about-us') }}">About</a></li>
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('careers') }}">Careers</a></li>
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('packages') }}">Packages</a></li>
                            <li class=""><a class="arrow-comig font-light font_roboto text-white text-lg lg:text-xs 2xl:text-lg" href="{{ url('contact-us') }}">Contact us</a></li>
                        </ul>
                    </div>
    
                    <div class="flex flex-col md:flex-row lg:items-center gap-5">
                        <div class="flex items-center gap-3 mr-[5px]">
                            <img class="w-[60px]" src="{{ asset('assets/bluenooneedvisa.png') }}" alt="visa no need">
                            <div class="text-lg font_jakartafoot font-semibold font_roboto text-white">Need any support fortour and visa?</div>
                        </div>
        
                        <div class="flex items-center gap-3">
                            <img class="w-[60px]" src="{{ asset('assets/bluetravelstarted.png') }}" alt="started travelling">
                            <div class="text-lg font_jakartafoot font-semibold font_roboto text-white">Are you ready forget started travelling?</div>
                        </div>
                    </div>
                </div>
    
                <div class="w-full xl:w-[35%]">
                    <h6 class="font_inter text-[30px] lg:text-4xl font-semibold text-white">GET THE LATEST NEWS AND INSIGHTS</h6>
                    <p class="font_inter text-[14px] lg:text-base font-semibold lg:text-justify pt-8 capitalize pb-12 text-white">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                    
                    <div class="flex items-center gap-3 pt-10 md:pt-0"> 
                        <span class="capitalize font-bold text-sm text-white font_roboto hidden lg:block">Subscribe</span>
                        <form id="news-letter-add-form" class="relative">
                            <div class="bg-white rounded-[50px] flex items-center overflow-hidden glow-effect">
                                <input type="email" class="min-w-[189px] w-[100vw] max-w-[245px] md:w-[280px] py-2 px-3 outline-none font_roboto" style="background: none;" name="news_letter_email" id="news-letter-email" placeholder="Enter your email Address">
                                <button class="bg-black text-white rounded-[50px] font_roboto font-normal text-sm py-2 px-3 mx-[2px] block">Subscribe</button>
                            </div>
                        </form>
                    </div>
    
                    <div class="flex gap-5 flex-col lg:items-center pt-10">
                        <div class="capitalize font-bold text-sm text-white font_inter">Subscribe</div>
                        <div class=" flex items-center gap-5">
                            <a href="https://www.facebook.com/KGraphimmigration/" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[28px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/fbvector.png') }}" alt="facebook">
                            </a>
                            <a href="https://www.instagram.com/kgraph_immigration?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[28px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/instagaramvector.png') }}" alt="instagram">
                            </a>
                            <a href="https://ca.linkedin.com/company/kgraph-homeabout-usstudy-abroadcanada-immigrationieltsother-servicescontact-1-416-989-7788-91-94476" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[28px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/linkedinvector.png') }}" alt="linkedin">
                            </a>
                            <a href="https://www.youtube.com/@kgraphimmigration8686/featured" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[28px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/home_banner/youtubenew.png') }}" alt="youtube">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
    <div class="bg-black">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-4  lg:py-0 lg:flex justify-between gap-72 items-start">
            <div class="py-4 flex flex-col md:flex-row md:items-center gap-6">
                <div class="text-white font_jakartafoot font-normal text-xs opacity-80">© 2024 - K-graph Canadian Immigration Services.</div>
                <div class="flex items-center gap-7">
                    <div><a class="text-white font_jakartafoot font-normal text-xs" href="{{ url('terms-and-conditions') }}">Terms and conditions</a></div>
                    <div><a class="text-white font_jakartafoot font-normal text-xs" href="{{ url('privacy-policy') }}">Privacy Policy</a></div>
                    <div><a class="text-white font_jakartafoot font-normal text-xs" href="{{ url('contact-us') }}">Contact Us</a></div>
                </div>
            </div>
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
