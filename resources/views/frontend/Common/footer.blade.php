<style>
/* Custom list styles for Services */
.services-list {
    list-style: none; /* Remove default bullets */
    padding: 0;
    margin: 0;
}

.services-list li {
    color: white;
    white-space: nowrap;
    text-transform: capitalize;
    position: relative;
    padding-left: 25px; /* Space for bullet image */
    margin-bottom: 10px; /* Space between items */
}

.services-list li::before {
    content: "";
    background-image: url(/assets/listbullets.png);
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
    background-image: url(/assets/nowlistbullets.png); /* Replace with the actual path to your arrow icon */
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

@media (max-width: 1480px) {
    .placeholder-custom::placeholder {
        font-size: 0.65rem;
    }
}



</style>

<?php
use App\Models\ServiceCategory;
$serviceCategories = ServiceCategory::select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->limit(4)->get();
?>

<footer class="relative w-full h-full overflow-hidden footer-secpernt">
    <div class="pt-10 blakorblue">
        <div class="container flex justify-center w-full h-full px-5 mx-auto lg:px-12 md:pb-4">
            <div class="bg-[linear-gradient(89.96deg,_#00154E_-47.02%,_#00B0FF_112.6%)] flex flex-col md:flex-row lg:justify-around lg:items-center gap-3 py-4 md:py-10 w-full lg:w-[80%] px-3 md:px-10 rounded-[30px] mb-[-60px] md:mb-[-80px] relative z-40">
                <div class="flex items-center justify-center gap-5">
                    {{-- <h2 class="text-4xl font-semibold text-center uppercase font_inter 2xl:text-5xl md:text-left gettouch gradient-text">Get IN TOUCH WITH US</h2> --}}
                    <h2 class="text-base font-semibold text-left text-white uppercase font_inter md:text-xl 2xl:text-4xl gettouch lg:whitespace-nowrap">Get IN TOUCH WITH US</h2>
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
            <div class="container flex flex-col items-start justify-between w-full h-full gap-8 px-5 py-4 mx-auto lg:px-12 footer-gaping lg:py-0 lg:flex-row lg:gap-12 2xl:gap-28">
                <div class="flex flex-col gap-6  lg:w-[753px]">
                    <div class="flex items-center gap-5 lg:gap-0">
                        <img class="lg:w-[753px] pb-3 text-sm font-extrabold  font_inter" src="{{ asset('assets/home_Banner/grouplogo.png') }}" alt="K-graph logo">
                    </div>

                    <p class="font_inter text-[12px] w-1/2 lg:w-full  font-light  capitalize  text-white">
                    A team of certified consultants is ready to guide your immigration journey.
                    Contact us to get expert help with your visa, residency or citizenship application</p>
                </div>

                <div class="flex flex-col gap-6 md:flex-row md:gap-14">
                    <!-- Services Section -->
                    <div>
                        <h4 class="mb-4 text-lg font-bold text-white">Services</h4>
                        <ul class="services-list">
                            @foreach ($serviceCategories as $serviceCategory)
                                <li><a href="{{ url('services') }}" class="text-sm text-white hover:underline whitespace-nowrap">{{$serviceCategory->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Useful Links Section -->
                    <div>
                        <h4 class="mb-4 text-lg font-bold text-white">Useful Links</h4>
                        <ul class="links-list">
                            <li><a href="{{ url('terms-and-conditions') }}" class="text-sm text-white hover:underline whitespace-nowrap">Terms & Conditions</a></li>
                            <li><a href="{{ url('privacy-policy') }}" class="text-sm text-white hover:underline whitespace-nowrap">Privacy Policy</a></li>
                            <li><a href="{{ url('careers') }}" class="text-sm text-white hover:underline whitespace-nowrap">Careers</a></li>
                            <li><a href="{{ url('blogs') }}" class="text-sm text-white hover:underline whitespace-nowrap">Blogs</a></li>
                        </ul>
                    </div>
                </div>

                <div class="w-full">
                    <h6 class="font_inter text-[20px] lg:text-[33px] font-semibold text-white">GET THE LATEST NEWS AND INSIGHTS</h6>
                    <div class="flex flex-col gap-3 pt-12 xl:flex-row w-fit xl:items-center">
                        {{-- <span class="hidden text-sm font-bold text-white capitalize font_roboto lg:block">Subscribe</span> --}}
                        <form id="news-letter-add-form" class="relative">
                            <div class="bg-white rounded-[50px] flex items-center overflow-hidden glow-effect">
                                <input type="email" class="min-w-[189px] w-[100vw] max-w-[245px] lg:w-[148px] lg:min-w-[100px] 2xl:w-[280px] py-2 px-3 outline-none font_roboto placeholder-custom" style="background: none;" name="news_letter_email" id="news-letter-email" placeholder="Enter your email Address">
                                <button type="submit" class="bg-black text-white rounded-[50px] font_roboto font-normal text-sm py-2 px-3 mx-[2px] block">Subscribe</button>
                            </div>
                        </form>
                    </div>

                    <div class="flex flex-col gap-5 pt-10">
                        {{-- <div class="text-sm font-bold text-white capitalize font_inter">Subscribe</div> --}}
                        <div class="flex items-center gap-5 ">
                            <?php use App\Models\whatsApp; $links = whatsApp::first(); ?>
                            <a href="@if(isset($links) && isset($links->facebook)) {{$links->facebook}} @else https://www.facebook.com/KGraphimmigration/ @endif" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[20px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/fbvector.png') }}" alt="facebook">
                            </a>
                            <a href="@if(isset($links) && isset($links->instagram)) {{$links->instagram}} @else https://www.instagram.com/kgraph_immigration?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw== @endif" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[20px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/instagaramvector.png') }}" alt="instagram">
                            </a>
                            <a href="@if(isset($links) && isset($links->linkedin)) {{$links->linkedin}} @else https://ca.linkedin.com/company/kgraph-homeabout-usstudy-abroadcanada-immigrationieltsother-servicescontact-1-416-989-7788-91-94476 @endif" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[20px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/linkedinvector.png') }}" alt="linkedin">
                            </a>
                            <a href="@if(isset($links) && isset($links->youtube)) {{$links->youtube}} @else https://www.youtube.com/@kgraphimmigration8686/featured @endif" target="_blank" rel="noopener noreferrer">
                                <img  class="w-auto h-[20px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/home_Banner/youtubenew.png') }}" alt="youtube">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="container items-start justify-between w-full h-full px-5 py-4 mx-auto lg:px-12 lg:py-0 lg:flex gap-72">
            <div class="flex flex-col gap-6 py-4 md:flex-row md:items-center">
                <div class="text-xs font-normal text-black font_jakartafoot opacity-80">© 2024 - K-graph Canadian Immigration Services.</div>
                <div class="flex items-center gap-7">
                    <div><a class="text-xs font-normal text-black font_jakartafoot" href="{{ url('terms-and-conditions') }}">Terms and conditions</a></div>
                    <div><a class="text-xs font-normal text-black font_jakartafoot" href="{{ url('privacy-policy') }}">Privacy Policy</a></div>
                    <div><a class="text-xs font-normal text-black font_jakartafoot" href="{{ url('contact-us') }}">Contact Us</a></div>
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

    // document.addEventListener('DOMContentLoaded', () => {
    //     const serviceListItems = document.querySelectorAll('.services-list li');
    //     serviceListItems.forEach((item) => {
    //         item.textContent = item.textContent
    //             .toLowerCase()
    //             .replace(/\b\w/g, (char) => char.toUpperCase());
    //     });
    // });

</script>

<script src="{{ asset('admin/theme/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/assets/js/forms/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/theme/alertifyjs/build/alertify.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/assets/js/forms/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
<script src="{{ asset('common/theme/js/common.js') }}?v={{ config('app.version') }}"></script>
