@extends('layouts.main')
@section('content')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <style>
        .contact-US {
            background: linear-gradient(180deg, #02050B 20.98%, rgba(0, 0, 0, 0) 302.7%);
            z-index: 1;
            position: relative;
        }

        .contact-US-banner {
            background-image: url(assets/home_Banner/contactUsbackground.png) !important;
            background-repeat: no-repeat;
            background-position-y: center;
            background-size: cover;
            /* z-index: -1; */
            position: relative;
        }

        .canada-flag {
            position: relative;
        }

        /* .canada-flag::after{
                                content: "";
                                position: absolute;
                                right: 10%;
                                top: -10px;
                                width: 100px;
                                height: 100px;
                                background-image: url(assets/home_Banner/reduse.png) !important;
                                background-repeat: no-repeat;
                             } */
        .enquiry-form {
            padding: 30px;
            margin-top: 30px;
        }

        .enquiry-form span {
            color: red;
        }

        .enquiry-form label {
            text-transform: uppercase;
        }

        .enquiry-form label,
        .enquiry-form input,
        .enquiry-form select {
            color: black;
            outline: none;
            border: none;
            font-weight: 500;
            font-size: 14px;
            font-family: "Inter", sans-serif;
        }

        .enquiry-form input {
            padding-left: 10px;
            width: 100%;
        }

        .enquiry-form-inputparent {
            display: flex;
            align-items: center;
            padding-top: 10px;
            margin-top: 30px;
        }

        .enquiry-form select {
            width: 100%;
            background-color: transparent;
        }

        .requst-text {
            color: #727272;
            font-size: 10px;
            white-space: nowrap;
        }

        .phone-text {
            color: #034833;
            font-size: 12px;
            /* white-space: nowrap; */
        }

        .flag-img-contact {
            position: relative;
            top: -150px;
            /* Start off-screen */
            opacity: 0;
            /* Start invisible */
            width: 100px;
            height: 100px;
        }

        @media (max-width: 1023px){
            .enquiry-form {
                padding: 30px;
                margin-top: 64px;
            } 
        }
    </style>
    @include('frontend.Common.whatsapplogo')
    <div class="contact-US-banner h-full w-full">
        <div class="contact-US h-full w-full">
            <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:pt-[8%] text-white">
                <div
                    class="flex flex-col lg:flex-row justify-between items-start gap-[15%] lg:py-[50px] md:mt-[100px] lg:mt-0">
                    <div class="w-full h-full font_inter">
                        <h1 class="mainHead font-semibold text-[40px] 2xl:w-[70%] uppercase">Grow Your Career with K-GRAPH
                        </h1>
                        <p class="font-semibold text-[15px] py-[30px]">Kansas Overseas has prided itself on customer and
                            employee satisfaction since its inception. This commitment to its staff has allowed the company
                            to grow to over 200 employees across 5 cities. Kansas is one of the fastest-growing visa
                            companies and is on track to double its workforce:</p>
                        <h2 class="font-semibold text-[30px]">Our Team Identity :</h2>
                        <ul class="list-disc pl-5 text-[18px]">
                            <li class="py-2">Assist with Value-added services</li>
                            <li class="py-2">Learners Before Leaders</li>
                            <li class="py-2">Prepared for marathon</li>
                            <li class="py-2">Replace Self - Mentoring Other Team Members</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl h-fit w-full mt-[52px] lg:mt-0 relative">
                        <div class="absolute right-6 top-[-10px]">
                            <img src="assets/home_Banner/reduse.png" class="flag-img-contact" alt="Canada Flag" />
                        </div>
                        <div>
                            <form action="" class="text-black enquiry-form" id="contact-add-form">
                                <h4 class="font_inter font-semibold text-black text-[32px] pb-10 capitalize">Talk to an Expert</h4>
                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                    <label for="name">NAME<span>*</span></label>
                                    <input type="text" name="name">
                                </div>

                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                    <label for="email">Email<span>*</span></label>
                                    <input type="Email" name="email">
                                </div>

                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent mobile flex flex-col gap-4 md:gap-0 md:flex-row !items-start md:!items-center">
                                    <div class="hidden lg:flex ">
                                        <select name="country" id="">
                                            <option value="+1">+1 (Canada)</option>
                                            <option value="+93">+93 (Afghanistan)</option>
                                            <option value="+355">+355 (Albania)</option>
                                            <option value="+213">+213 (Algeria)</option>
                                            <option value="+1684">+1684 (American Samoa)</option>
                                            <option value="+376">+376 (Andorra)</option>
                                            <option value="+244">+244 (Angola)</option>
                                            <option value="+1264">+1264 (Anguilla)</option>
                                            <option value="+672">+672 (Antarctica)</option>
                                            <option value="+1268">+1268 (Antigua and Barbuda)</option>
                                            <option value="+54">+54 (Argentina)</option>
                                            <option value="+374">+374 (Armenia)</option>
                                            <option value="+297">+297 (Aruba)</option>
                                            <option value="+61">+61 (Australia)</option>
                                            <option value="+43">+43 (Austria)</option>
                                            <option value="+994">+994 (Azerbaijan)</option>
                                            <option value="+1242">+1242 (Bahamas)</option>
                                            <option value="+973">+973 (Bahrain)</option>
                                            <option value="+880">+880 (Bangladesh)</option>
                                            <option value="+1246">+1246 (Barbados)</option>
                                            <option value="+375">+375 (Belarus)</option>
                                            <option value="+32">+32 (Belgium)</option>
                                            <option value="+501">+501 (Belize)</option>
                                            <option value="+229">+229 (Benin)</option>
                                            <option value="+1441">+1441 (Bermuda)</option>
                                            <option value="+975">+975 (Bhutan)</option>
                                            <option value="+591">+591 (Bolivia)</option>
                                            <option value="+387">+387 (Bosnia and Herzegovina)</option>
                                            <option value="+267">+267 (Botswana)</option>
                                            <option value="+55">+55 (Brazil)</option>
                                            <option value="+246">+246 (British Indian Ocean Territory)</option>
                                            <option value="+673">+673 (Brunei)</option>
                                            <option value="+359">+359 (Bulgaria)</option>
                                            <option value="+226">+226 (Burkina Faso)</option>
                                            <option value="+257">+257 (Burundi)</option>
                                            <option value="+855">+855 (Cambodia)</option>
                                            <option value="+237">+237 (Cameroon)</option>
                                            <option value="+1">+1 (Canada)</option>
                                            <option value="+238">+238 (Cape Verde)</option>
                                            <option value="+1345">+1345 (Cayman Islands)</option>
                                            <option value="+236">+236 (Central African Republic)</option>
                                            <option value="+235">+235 (Chad)</option>
                                            <option value="+56">+56 (Chile)</option>
                                            <option value="+86">+86 (China)</option>
                                            <option value="+57">+57 (Colombia)</option>
                                            <option value="+269">+269 (Comoros)</option>
                                            <option value="+242">+242 (Congo)</option>
                                            <option value="+682">+682 (Cook Islands)</option>
                                            <option value="+506">+506 (Costa Rica)</option>
                                            <option value="+385">+385 (Croatia)</option>
                                            <option value="+53">+53 (Cuba)</option>
                                            <option value="+357">+357 (Cyprus)</option>
                                            <option value="+420">+420 (Czech Republic)</option>
                                            <option value="+45">+45 (Denmark)</option>
                                            <option value="+253">+253 (Djibouti)</option>
                                            <option value="+1767">+1767 (Dominica)</option>
                                            <option value="+1">+1 (Dominican Republic)</option>
                                            <option value="+593">+593 (Ecuador)</option>
                                            <option value="+20">+20 (Egypt)</option>
                                            <option value="+503">+503 (El Salvador)</option>
                                            <option value="+240">+240 (Equatorial Guinea)</option>
                                            <option value="+291">+291 (Eritrea)</option>
                                            <option value="+372">+372 (Estonia)</option>
                                            <option value="+251">+251 (Ethiopia)</option>
                                            <option value="+500">+500 (Falkland Islands)</option>
                                            <option value="+298">+298 (Faroe Islands)</option>
                                            <option value="+679">+679 (Fiji)</option>
                                            <option value="+358">+358 (Finland)</option>
                                            <option value="+33">+33 (France)</option>
                                            <option value="+594">+594 (French Guiana)</option>
                                            <option value="+689">+689 (French Polynesia)</option>
                                            <option value="+241">+241 (Gabon)</option>
                                            <option value="+220">+220 (Gambia)</option>
                                            <option value="+995">+995 (Georgia)</option>
                                            <option value="+49">+49 (Germany)</option>
                                            <option value="+233">+233 (Ghana)</option>
                                            <option value="+350">+350 (Gibraltar)</option>
                                            <option value="+30">+30 (Greece)</option>
                                            <option value="+299">+299 (Greenland)</option>
                                            <option value="+1473">+1473 (Grenada)</option>
                                            <option value="+590">+590 (Guadeloupe)</option>
                                            <option value="+1671">+1671 (Guam)</option>
                                            <option value="+502">+502 (Guatemala)</option>
                                            <option value="+224">+224 (Guinea)</option>
                                            <option value="+245">+245 (Guinea-Bissau)</option>
                                            <option value="+592">+592 (Guyana)</option>
                                            <option value="+509">+509 (Haiti)</option>
                                            <option value="+504">+504 (Honduras)</option>
                                            <option value="+852">+852 (Hong Kong)</option>
                                            <option value="+36">+36 (Hungary)</option>
                                            <option value="+354">+354 (Iceland)</option>
                                            <option value="+91">+91 (India)</option>
                                            <option value="+62">+62 (Indonesia)</option>
                                            <option value="+98">+98 (Iran)</option>
                                            <option value="+964">+964 (Iraq)</option>
                                            <option value="+353">+353 (Ireland)</option>
                                            <option value="+972">+972 (Israel)</option>
                                            <option value="+39">+39 (Italy)</option>
                                            <option value="+1876">+1876 (Jamaica)</option>
                                            <option value="+81">+81 (Japan)</option>
                                            <option value="+962">+962 (Jordan)</option>
                                            <option value="+7">+7 (Kazakhstan)</option>
                                            <option value="+254">+254 (Kenya)</option>
                                            <option value="+686">+686 (Kiribati)</option>
                                            <option value="+965">+965 (Kuwait)</option>
                                            <option value="+996">+996 (Kyrgyzstan)</option>
                                            <option value="+856">+856 (Laos)</option>
                                            <option value="+371">+371 (Latvia)</option>
                                            <option value="+961">+961 (Lebanon)</option>
                                            <option value="+266">+266 (Lesotho)</option>
                                            <option value="+231">+231 (Liberia)</option>
                                            <option value="+218">+218 (Libya)</option>
                                            <option value="+423">+423 (Liechtenstein)</option>
                                            <option value="+370">+370 (Lithuania)</option>
                                            <option value="+352">+352 (Luxembourg)</option>
                                            <option value="+853">+853 (Macau)</option>
                                            <option value="+389">+389 (North Macedonia)</option>
                                            <option value="+261">+261 (Madagascar)</option>
                                            <option value="+265">+265 (Malawi)</option>
                                            <option value="+60">+60 (Malaysia)</option>
                                            <option value="+960">+960 (Maldives)</option>
                                            <option value="+223">+223 (Mali)</option>
                                            <option value="+356">+356 (Malta)</option>
                                            <option value="+692">+692 (Marshall Islands)</option>
                                            <option value="+596">+596 (Martinique)</option>
                                            <option value="+222">+222 (Mauritania)</option>
                                            <option value="+230">+230 (Mauritius)</option>
                                            <option value="+262">+262 (Mayotte)</option>
                                            <option value="+52">+52 (Mexico)</option>
                                            <option value="+691">+691 (Micronesia)</option>
                                            <option value="+373">+373 (Moldova)</option>
                                            <option value="+377">+377 (Monaco)</option>
                                            <option value="+976">+976 (Mongolia)</option>
                                            <option value="+382">+382 (Montenegro)</option>
                                            <option value="+1664">+1664 (Montserrat)</option>
                                            <option value="+212">+212 (Morocco)</option>
                                            <option value="+258">+258 (Mozambique)</option>
                                            <option value="+95">+95 (Myanmar)</option>
                                            <option value="+264">+264 (Namibia)</option>
                                            <option value="+674">+674 (Nauru)</option>
                                            <option value="+977">+977 (Nepal)</option>
                                            <option value="+31">+31 (Netherlands)</option>
                                            <option value="+687">+687 (New Caledonia)</option>
                                            <option value="+64">+64 (New Zealand)</option>
                                            <option value="+505">+505 (Nicaragua)</option>
                                            <option value="+227">+227 (Niger)</option>
                                            <option value="+234">+234 (Nigeria)</option>
                                            <option value="+683">+683 (Niue)</option>
                                            <option value="+850">+850 (North Korea)</option>
                                            <option value="+47">+47 (Norway)</option>
                                            <option value="+968">+968 (Oman)</option>
                                            <option value="+92">+92 (Pakistan)</option>
                                            <option value="+680">+680 (Palau)</option>
                                            <option value="+970">+970 (Palestine)</option>
                                            <option value="+507">+507 (Panama)</option>
                                            <option value="+675">+675 (Papua New Guinea)</option>
                                            <option value="+595">+595 (Paraguay)</option>
                                            <option value="+51">+51 (Peru)</option>
                                            <option value="+63">+63 (Philippines)</option>
                                            <option value="+48">+48 (Poland)</option>
                                            <option value="+351">+351 (Portugal)</option>
                                            <option value="+974">+974 (Qatar)</option>
                                            <option value="+40">+40 (Romania)</option>
                                            <option value="+7">+7 (Russia)</option>
                                            <option value="+250">+250 (Rwanda)</option>
                                            <option value="+685">+685 (Samoa)</option>
                                            <option value="+378">+378 (San Marino)</option>
                                            <option value="+966">+966 (Saudi Arabia)</option>
                                            <option value="+221">+221 (Senegal)</option>
                                            <option value="+381">+381 (Serbia)</option>
                                            <option value="+248">+248 (Seychelles)</option>
                                            <option value="+232">+232 (Sierra Leone)</option>
                                            <option value="+65">+65 (Singapore)</option>
                                            <option value="+421">+421 (Slovakia)</option>
                                            <option value="+386">+386 (Slovenia)</option>
                                            <option value="+677">+677 (Solomon Islands)</option>
                                            <option value="+252">+252 (Somalia)</option>
                                            <option value="+27">+27 (South Africa)</option>
                                            <option value="+82">+82 (South Korea)</option>
                                            <option value="+34">+34 (Spain)</option>
                                            <option value="+94">+94 (Sri Lanka)</option>
                                            <option value="+249">+249 (Sudan)</option>
                                            <option value="+597">+597 (Suriname)</option>
                                            <option value="+268">+268 (Eswatini)</option>
                                            <option value="+46">+46 (Sweden)</option>
                                            <option value="+41">+41 (Switzerland)</option>
                                            <option value="+963">+963 (Syria)</option>
                                            <option value="+886">+886 (Taiwan)</option>
                                            <option value="+992">+992 (Tajikistan)</option>
                                            <option value="+255">+255 (Tanzania)</option>
                                            <option value="+66">+66 (Thailand)</option>
                                            <option value="+228">+228 (Togo)</option>
                                            <option value="+676">+676 (Tonga)</option>
                                            <option value="+216">+216 (Tunisia)</option>
                                            <option value="+90">+90 (Turkey)</option>
                                            <option value="+993">+993 (Turkmenistan)</option>
                                            <option value="+688">+688 (Tuvalu)</option>
                                            <option value="+256">+256 (Uganda)</option>
                                            <option value="+380">+380 (Ukraine)</option>
                                            <option value="+971">+971 (United Arab Emirates)</option>
                                            <option value="+44">+44 (United Kingdom)</option>
                                            <option value="+1">+1 (United States)</option>
                                            <option value="+598">+598 (Uruguay)</option>
                                            <option value="+998">+998 (Uzbekistan)</option>
                                            <option value="+678">+678 (Vanuatu)</option>
                                            <option value="+58">+58 (Venezuela)</option>
                                            <option value="+84">+84 (Vietnam)</option>
                                            <option value="+967">+967 (Yemen)</option>
                                            <option value="+260">+260 (Zambia)</option>
                                            <option value="+263">+263 (Zimbabwe)</option>
                                        </select>

                                    </div>
                                    <div class=" flex items-center w-full lg:pl-4">
                                        <label class="whitespace-nowrap" for="mobile">Mobile <span class="hidden lg:inline-block !text-black">NUMBER</span><span>*</span></label>
                                        <input type="tel" name="mobile">
                                    </div>
                                </div>

                                {{-- <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label class="whitespace-nowrap" for="email">select branch<span>*</span></label>
                                <select name="" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label class="whitespace-nowrap" for="email">department<span>*</span></label>
                                <select name="" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div> --}}

                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                    <label for="message">Message<span>*</span></label>
                                    <input type="text" name="message">
                                </div>

                                {{-- <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="imageUploader" class="cursor-pointer flex justify-between items-center w-full">
                                    <div class="whitespace-nowrap">Upload Resume<span>*</span></div>
                                    <div class="w-full flex justify-end">
                                    <img id="uploadIcon" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" width="15" height="15" />
                                    </div>
                                </label>
                                <input id="imageUploader" type="file" accept="image/*" style="display: none;" onchange="handleFileChange()" />
                            </div> --}}

                                <div class="flex justify-center lg:justify-end items-center overflow-hidden rounded-full mt-10">
                                    <div class="border rounded-full border-[#072558] cursor-pointer">
                                        <button
                                            class="!px-[80px] py-3 uppercase text-[#072558] cursor-pointer text-[16px] font-bold bg-transparent hover:bg-[#072558] hover:text-white transition-colors duration-300 rounded-full">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="open-positions bg-[#04183c]">
        <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:py-[8%] text-white">
            <div class="md:flex items-center">
                <h2 class="left-to-right-animation font_inter font-semibold text-[50px] text-white leading-none uppercase">
                    <span class="inline-block">WE </span><span class="inline-block">ARE IN</span>
                </h2>
                <div class="md:pl-2 w-full" style="margin-bottom: -6%;">
                    <div class="w-full my-6 left-to-right-width-animation" style="border: 1px solid #FFFFFF8C;"></div>
                </div>
            </div>

            <div class="lg:flex lg:gap-6 py-[56px] justify-between">
                <div id="splide" class="splide w-full">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($locations as $data)
                            <li class="splide__slide">
                                <div class="bg-white my-4 lg:my-0 p-5 w-full lg:max-w-[430px] rounded-xl">
                                    <div class="flex items-center justify-between">
                                        <h5 class="text-black uppercase">Office Address</h5>
                                        <img class="w-[48px]" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->image }}" alt="{{$data->alt_tag}}">
                                    </div>
                                    <div class="bg-[#072558] text-white rounded-md w-fit px-5 py-1 lg:my-3">
                                        {{$data->location}}
                                    </div>

                                    <div class="flex flex-col md:flex-row items-start gap-[35px]">
                                        <div class="border-r pr-12">
                                            <div class="flex items-center gap-[20px] my-4">
                                                <div>
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M21.047 16.0415L20.0847 20.0911C19.9644 20.6925 19.4833 21.0935 18.8819 21.0935C8.77801 21.0534 0.558594 12.8339 0.558594 2.73008C0.558594 2.12866 0.919446 1.64752 1.52087 1.52724L5.57043 0.564964C6.13176 0.44468 6.73318 0.765438 6.97375 1.28667L8.8582 5.65699C9.05867 6.17823 8.93839 6.77965 8.49735 7.1004L6.33223 8.86457C7.69545 11.6311 9.94076 13.8764 12.7474 15.2396L14.5116 13.0745C14.8323 12.6736 15.4337 12.5132 15.955 12.7137L20.3253 14.5981C20.8465 14.8788 21.1673 15.4802 21.047 16.0415Z"
                                                            fill="#072558" />
                                                    </svg>
                                                </div>
                                                <div class="font_jakarta">
                                                    {{-- <h5 class="requst-text">Requesting A Call:</h5> --}}
                                                    <h4 class="phone-text font-semibold">{{$data->phone}}</h4>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-[20px] my-4">
                                                <div>
                                                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M19.1625 0.246205C20.205 0.246205 21.0871 1.12829 21.0871 2.17075C21.0871 2.81227 20.7663 3.37359 20.2852 3.73445L11.5846 10.2699C11.1035 10.6307 10.5021 10.6307 10.0209 10.2699L1.32039 3.73445C0.839257 3.37359 0.558594 2.81227 0.558594 2.17075C0.558594 1.12829 1.40058 0.246205 2.48314 0.246205H19.1625ZM9.25915 11.3123C10.1813 11.994 11.4243 11.994 12.3464 11.3123L21.0871 4.73681V13.0765C21.0871 14.5199 19.9243 15.6426 18.521 15.6426H3.12466C1.68125 15.6426 0.558594 14.5199 0.558594 13.0765V4.73681L9.25915 11.3123Z"
                                                            fill="#072558" />
                                                    </svg>
                                                </div>
                                                <div class="font_jakarta">
                                                    {{-- <h5 class="requst-text">Requesting A Call:</h5> --}}
                                                    <h4 class="phone-text font-semibold">{{$data->email}}</h4>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-[20px] my-4">
                                                <div>
                                                    <svg width="16" height="21" viewBox="0 0 16 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.29451 20.3769C5.20958 17.7708 0.558594 11.5561 0.558594 8.02774C0.558594 3.7777 3.96665 0.329557 8.25678 0.329557C12.5068 0.329557 15.955 3.7777 15.955 8.02774C15.955 11.5561 11.2639 17.7708 9.17896 20.3769C8.69782 20.9783 7.77564 20.9783 7.29451 20.3769ZM8.25678 10.5938C9.6601 10.5938 10.8228 9.47115 10.8228 8.02774C10.8228 6.62443 9.6601 5.46168 8.25678 5.46168C6.81337 5.46168 5.69072 6.62443 5.69072 8.02774C5.69072 9.47115 6.81337 10.5938 8.25678 10.5938Z"
                                                            fill="#072558" />
                                                    </svg>
                                                </div>
                                                <div class="font_jakarta">
                                                    {{-- <h5 class="requst-text">Requesting A Call:</h5> --}}
                                                    <h4 class="phone-text font-semibold">{{$data->address}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="mt-4">
                                            <div class="font_jakarta">
                                                <h5 class="requst-text">Requesting A Call:</h5>
                                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                                            </div>
                                            <div class="font_jakarta">
                                                <h5 class="requst-text">Requesting A Call:</h5>
                                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                                            </div>
                                            <div class="font_jakarta">
                                                <h5 class="requst-text">Requesting A Call:</h5>
                                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mx-5 lg:mx-0 py-6 relative z-10">
                <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[4.5px] pl-5 pr-1 overflow-hidden group">
                    <!-- Initially the background will cover the full button -->
                    <div
                        class="absolute inset-0 bg-blue-600 transition-all duration-500 ease-out group-hover:left-full left-0 w-full">
                    </div>
                    <h6 class="relative z-10 text-white text-[12px] xl:text-[14px]">Let's turn your vision into reality</h6>
                    <div
                        class="relative z-10 bg-white text-blue-600 px-[20px] pb-1 md:py-1 lg:pb-[2px] lg:pt-0 xl:pb-[2px] xl:pt-[1px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[14px]">Connect Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('frontend.Common.getintouch') --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);
            gsap.to(".flag-img-contact", {
                scrollTrigger: {
                    trigger: ".contact-US-banner", // The section that triggers the animation
                    start: "top center", // When the top of the trigger hits the center of the viewport
                    toggleActions: "play none none none", // Play animation when triggered
                },
                duration: 2, // Duration of the animation
                top: "4px", // Final position of the flag (curtain falling to this point)
                opacity: 1, // Fade in the flag as it falls
                ease: "bounce.out", // Bounce effect to mimic a natural falling curtain
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#splide', {
                type: 'slide',
                autoplay: true,
                interval: 1000,
                perMove: 1,
                arrows: false,
                pagination: false,
                gap: '16px',
                breakpoints: {
                    1536: {
                        perPage: 3,
                    },
                    768: {
                        perPage: 2,
                    },
                    767: {
                        perPage: 1,
                    },
                },
            }).mount();
        });
    </script>


    <script>
        function handleFileChange() {
            const input = document.getElementById('imageUploader');
            const icon = document.getElementById('uploadIcon');

            if (input.files && input.files.length > 0) {
                icon.style.filter = 'hue-rotate(270deg) brightness(2.5)';
            } else {
                icon.style.filter = 'none';
            }
        }
    </script>
@endsection
