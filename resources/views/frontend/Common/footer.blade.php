<style>
/* Custom list styles for Services */
.services-list {
    list-style: none; /* Remove default bullets */
    padding: 0;
    margin: 0;
}

.services-list li {
    position: relative;
    padding-left: 25px; /* Space for bullet image */
    margin-bottom: 10px; /* Space between items */
}

.services-list li::before {
    content: "";
    background-image: url(assets/listbullets.png);
    background-size: contain;
    background-repeat: no-repeat;
    width: 16px; /* Adjust based on your image size */
    height: 16px;
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
}

/* Custom list styles for Useful Links */
.links-list {
    list-style: none; /* Remove default bullets */
    padding: 0;
    margin: 0;
}

.links-list li {
    position: relative;
    padding-left: 25px; /* Space for bullet image */
    margin-bottom: 10px; /* Space between items */
}

.links-list li::before {
    content: "";
    background-image: url(assets/nowlistbullets.png); /* Replace with the actual path to your arrow icon */
    background-size: contain;
    background-repeat: no-repeat;
    width: 16px; /* Adjust based on your image size */
    height: 16px;
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
}

/* Hover effect for links */
.services-list li a:hover,
.links-list li a:hover {
    text-decoration: underline;
}

@media (min-width: 1460px){
    .footer-gaping{
        gap: 10rem;
    }
}

@media (max-width: 1280px) {
    .placeholder-custom::placeholder {
        font-size: 0.65rem;
    }
}



</style>

<?php
use App\Models\ServiceCategory;
$serviceCategories = ServiceCategory::select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->limit(4)->get();
?>

<footer class="w-full footer-secpernt h-full relative overflow-hidden">
    <div class="blakorblue lg:pt-10">
        <div class="container mx-auto px-5 lg:px-12 h-full flex justify-center w-full md:pb-4">
            <div class="bg-[linear-gradient(89.96deg,_#00154E_-47.02%,_#00B0FF_112.6%)] flex flex-col md:flex-row lg:justify-around lg:items-center gap-3 py-4 md:py-10 w-full lg:w-[80%] px-3 md:px-10 rounded-[30px] mb-[-60px] md:mb-[-80px] relative z-40">
                <div class="flex  items-center justify-center gap-5">
                    {{-- <h2 class="font_inter font-semibold text-4xl 2xl:text-5xl text-center md:text-left gettouch uppercase gradient-text">Get IN TOUCH WITH US</h2> --}}
                    <h2 class="font_inter font-semibold text-base md:text-xl 2xl:text-4xl text-left gettouch uppercase text-white lg:whitespace-nowrap">Get IN TOUCH WITH US</h2>
                    <img class="w-[43px] lg:w-[70px]" src="{{ asset('assets/home_Banner/rocketicon.png') }}" alt="">
                </div>

                <div class="flex justify-center lg:justify-end">
                    <div class="relative cursor-pointer flex justify-center items-center w-fit rounded-full gap-5 py-[4.5px] pl-6 pr-1 overflow-hidden group">
                        <!-- Background animation using pseudo-element -->
                        <div class="absolute inset-0 bg-[linear-gradient(90deg,_#003D99_0%,_#0066FF_100%)] transition-all duration-500 ease-out group-hover:left-full left-0 w-full"></div>
                        <h6 class="relative z-10 text-white text-[10px] md:text-[14px] 2xl">Have any doubt</h6>
                        <div class="relative z-10 bg-white text-blue-600 px-[20px] lg:px-[35px] py-1 lg:py-[4px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                            <a href="{{ url('contact-us') }}" class="h-full text-[12px] lg:text-[16px] font-semibold">Connect Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="globebg">
        <div class="relative w-full footer z-30 pt-[86px] py-6 md:pt-28 md:pb-6">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-4 footer-gaping lg:py-0 flex flex-col lg:flex-row justify-between gap-8 lg:gap-12 2xl:gap-28   items-start">
                <div class="w-full flex flex-col gap-6">
                    <div class="flex items-center gap-5">
                        <img class="" src="{{ asset('assets/home_Banner/grouplogo.png') }}" alt="K-graph logo">
                    </div>

                    <p class="font_inter text-[12px]  font-light lg:text-justify capitalize  text-white">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                </div>

                <div class="flex flex-col md:flex-row gap-6 md:gap-14">
                    <!-- Services Section -->
                    <div>
                        <h4 class="text-lg font-bold mb-4 text-white">Services</h4>
                        <ul class="services-list">
                            @foreach ($serviceCategories as $serviceCategory)
                                <li><a href="{{ url('services') }}" class="text-sm hover:underline text-white whitespace-nowrap">{{$serviceCategory->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                
                    <!-- Useful Links Section -->
                    <div>
                        <h4 class="text-lg font-bold mb-4 text-white">Useful Links</h4>
                        <ul class="links-list">
                            <li><a href="{{ url('terms-and-conditions') }}" class="text-sm hover:underline text-white whitespace-nowrap">Terms & Conditions</a></li>
                            <li><a href="{{ url('privacy-policy') }}" class="text-sm hover:underline text-white whitespace-nowrap">Privacy Policy</a></li>
                            <li><a href="{{ url('careers') }}" class="text-sm hover:underline text-white whitespace-nowrap">Careers</a></li>
                            <li><a href="{{ url('blogs') }}" class="text-sm hover:underline text-white whitespace-nowrap">Blogs</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="w-full">
                    <h6 class="font_inter text-[20pxpx] 2xl:text-[33px] font-semibold text-white">GET THE LATEST NEWS AND INSIGHTS</h6>
                    <div class="flex flex-col xl:flex-row w-fit xl:items-center gap-3 pt-12">
                        <span class="capitalize font-bold text-sm text-white font_roboto hidden lg:block">Subscribe</span>
                        <form id="news-letter-add-form" class="relative">
                            <div class="bg-white rounded-[50px] flex items-center overflow-hidden glow-effect">
                                <input type="email" class="min-w-[189px] w-[100vw] max-w-[245px] lg:w-[148px] lg:min-w-[100px] 2xl:w-[280px] py-2 px-3 outline-none font_roboto placeholder-custom" style="background: none;" name="news_letter_email" id="news-letter-email" placeholder="Enter your email Address">
                                <button type="submit" class="bg-black text-white rounded-[50px] font_roboto font-normal text-sm py-2 px-3 mx-[2px] block">Subscribe</button>
                            </div>
                        </form>
                    </div>

                    <div class="flex gap-5 flex-col pt-10">
                        {{-- <div class="capitalize font-bold text-sm text-white font_inter">Subscribe</div> --}}
                        <div class=" flex items-center gap-5">
                            <a href="https://www.facebook.com/KGraphimmigration/" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[20px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/fbvector.png') }}" alt="facebook">
                            </a>
                            <a href="https://www.instagram.com/kgraph_immigration?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[20px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/instagaramvector.png') }}" alt="instagram">
                            </a>
                            <a href="https://ca.linkedin.com/company/kgraph-homeabout-usstudy-abroadcanada-immigrationieltsother-servicescontact-1-416-989-7788-91-94476" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[20px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/linkedinvector.png') }}" alt="linkedin">
                            </a>
                            <a href="https://www.youtube.com/@kgraphimmigration8686/featured" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[20px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/home_Banner/youtubenew.png') }}" alt="youtube">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-4  lg:py-0 lg:flex justify-between gap-72 items-start">
            <div class="py-4 flex flex-col md:flex-row md:items-center gap-6">
                <div class="text-black font_jakartafoot font-normal text-xs opacity-80">© 2024 - K-graph Canadian Immigration Services.</div>
                <div class="flex items-center gap-7">
                    <div><a class="text-black font_jakartafoot font-normal text-xs" href="{{ url('terms-and-conditions') }}">Terms and conditions</a></div>
                    <div><a class="text-black font_jakartafoot font-normal text-xs" href="{{ url('privacy-policy') }}">Privacy Policy</a></div>
                    <div><a class="text-black font_jakartafoot font-normal text-xs" href="{{ url('contact-us') }}">Contact Us</a></div>
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
