<style>
    #news-letter-email-error {
        position: absolute;
        bottom: -36px;
        left: 14px;
    }
</style>

<?php
use App\Models\ServiceCategory;
$serviceCategories = ServiceCategory::select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->limit(4)->get();
?>

<footer class="w-full bg-[#062357] footer-secpernt">
    <div class="relative footer-secpernt w-full footer-last">
        {{--
        <div class="container mx-auto px-5 lg:px-12 lg:w-screen relative">
            <div class="absolute  h-full w-[93%] container mx-auto lg:px-12  bg-center bg-contain bg-no-repeat opacity-10 z-[-1]" style="background-position-y: 50px;"></div>
        </div> --}}

        <div class="flex flex-col md:flex-row gap-6 md:gap-0 justify-start md:justify-center items-start md:items-center pt-6 py-3 md:py-8 container mx-auto lg:px-12 ">
            <div class="flex items-start md:items-center gap-5 justify-center">
                <img src="{{ asset('assets/nooneedvisa.png') }}" alt="visa no need">
                <h2 class="w-[60%] text-[14px] xl:text-[30px] font-semibold plus_jakarta text-white">Need any support for
                    tour and visa?
                </h2>
            </div>
            <div
                class="flex items-start md:items-center gap-5 md:border-l border-l-[#FFFFFF] border-opacity-50 justify-center">
                <img src="{{ asset('assets/travelstarted.png') }}" alt="started travelling">
                <h2 class="w-[60%] text-[14px] xl:text-[30px] font-semibold plus_jakarta text-white">Are you ready for
                    get started travelling?
                </h2>
            </div>
        </div>

        <div class="mt-[5%] md:mt-3 border-t border-b border-l-[#FFFFFF] border-opacity-50 py-11">
            <div
                class="flex flex-col lg:flex-row justify-center gap-10 lg:gap-[10%] items-start container mx-auto px-5 lg:px-12">
                <div class="flex flex-col justify-between items-start gap-[30px] md:gap-4 w-full">
                    <div class="flex items-center gap-[4px]">
                        <img class="w-[1.80rem] logo_image lg:w-[2.5rem]" src="{{ asset('assets/KgraphLogo.png') }}"
                            alt="K-graph logo">
                        <div>
                            <h2 class="text-base font-bold logo_text lg:text-[30px] text-white">KGRAPH</h2>
                            <h6 class="text-[7px]  font-medium logo_title lg:mt-1 text-white">IMMIGRATION CONSULTANCY
                                INC.</h6>
                        </div>
                    </div>

                    <div class="text-white">
                        <p class="font-thin text-sm plus_jakarta">Corporate business typically refers <br> to
                            large-scale mansola it enterprises <br> or organizat</p>
                    </div>

                    <div class="flex items-center gap-6">
                        <a href="https://www.facebook.com/KGraphimmigration/" target="_blank" rel="noopener noreferrer">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/facebookban.png') }}" alt="Facebook">
                        </a>
                        <a href="https://www.instagram.com/kgraph_immigration?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/instagramban.png') }}" alt="Instagram">
                        </a>
                        <a href="https://ca.linkedin.com/company/kgraph-homeabout-usstudy-abroadcanada-immigrationieltsother-servicescontact-1-416-989-7788-91-94476" target="_blank" rel="noopener noreferrer">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/linkedinban.png') }}" alt="LinkedIn">
                        </a>
                        <a href="https://www.youtube.com/@kgraphimmigration8686/featured" target="_blank" rel="noopener noreferrer">
                            <img class="w-[15px] transition-transform duration-300 transform hover:scale-125" src="{{ asset('assets/youtubeban.png') }}" alt="YouTube">
                        </a>
                    </div>
                    
                    
                </div>

                {{-- <div class="flex flex-col md:flex-row justify-between items-center"> --}}
                <div class="flex flex-col justify-between items-start gap-[30px] md:gap-4 w-full">
                    <h2 class="text-white">Services</h2>
                    <ul class="custom-bullets text-white">
                        @foreach ($serviceCategories as $serviceCategory)
                            <li class="lg:whitespace-nowrap"><a href="{{ url('services') }}">{{$serviceCategory->title}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col justify-between items-start gap-[30px] md:gap-4 w-full">
                    <h2 class="text-white">Useful Link</h2>
                    <ul class="custom-bulletssec text-white">
                        <li class="lg:whitespace-nowrap"><a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
                        <li class="lg:whitespace-nowrap"><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                        <li class="lg:whitespace-nowrap"><a href="{{ url('careers') }}">Careers</a></li>
                        <li class="lg:whitespace-nowrap"><a href="{{ url('blogs') }}">Blogs</a></li>
                    </ul>
                </div>
                {{-- </div> --}}

                <div class="flex flex-col justify-between items-start gap-[30px] md:gap-4 w-full">
                    <h2 class="text-white">Subscribe Our Newsletter</h2>
                    <p class="text-white text-sm">Corporate business typically refers to large-scale mansola it.</p>
                    {{-- <form class="candidate_fields relative" id="news-letter-add-form">
                        <div class="rounded-full bg-black border border-solid border-neutral-700 flex items-center relative w-full">
                            <input class="border-none outline-none bg-transparent py-3 2xl:py-6 h-full px-4 w-[88vw] md:w-full text-white placeholder:text-white" type="email" name="news_letter_email" id="news-letter-email" placeholder="Enter Email">
                            <button class=" absolute right-0 p-6 rounded-full bg-blue-900"><img class="md:w-6 lg:w-4" src="{{ asset('assets//sendingg.png') }}" alt=""></button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>

        <div class="container mx-auto px-5 lg:px-12 ">
            <div class="flex flex-col-reverse md:flex-row justify-between items-start md:items-center py-8 gap-5">
                <div>
                    <small class="capitalize font-light text-[10px] font_aktiv text-white">© 2024 - K-graph Canadian
                        Immigration Services.</small>
                </div>
                <div>
                    <ul class="flex flex-col md:flex-row items-start md:items-center gap-5 text-white">
                        <li><a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
                        <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>
{{-- <script src="{{ asset('admin/theme/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/assets/js/forms/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/theme/alertifyjs/build/alertify.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/assets/js/forms/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/theme/src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
<script src="{{ asset('common/theme/js/common.js') }}?v={{ config('app.version') }}"></script> --}}
