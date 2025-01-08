@extends('layouts.main')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        .contact-US {
            background: linear-gradient(180deg, #02050B 20.98%, rgba(0, 0, 0, 0) 302.7%);
            z-index: 1;
            position: relative;
        }

        .dontwaitwrpr {
            background: linear-gradient(88deg, #000000 0%, rgba(0, 0, 0, 0) 100%);
        }


        .contact-US-banner {
            background-image: url(assets/home_Banner/contactUsbackground.webp) !important;
            background-repeat: no-repeat;
            background-position-y: center;
            background-size: cover;
            /* z-index: -1; */
            position: relative;
        }

        .canada-flag {
            position: relative;
        }

        /* .canada-flag::after {
            content: "";
            position: absolute;
            right: 10%;
            top: -150px;
            width: 100px;
            height: 100px;
            background-image: url(assets/home_Banner/reduse.png) !important;
            background-repeat: no-repeat;
            opacity: 0;
            z-index: 99;
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
            color: black !important;
            outline: none;
            border: none;
            font-weight: 500;
            font-size: 14px;
            font-family: "Inter", sans-serif;
        }

        .enquiry-form input {
            padding-bottom: 0px !important;
            padding-left: 10px;
            width: 100%;
        }

        #coverUploadersec,
        #imageUploadersec{
            padding-bottom: 8px !important;
        }
        #coverUploadersec,
        #imageUploadersec{
            padding-bottom: 8px !important;
        }

        .enquiry-form-inputparent {
            display: flex;
            align-items: center;
            padding-top: 10px;
            margin-top: 30px;
        }
        @media (max-width: 768px){
            .enquiry-form-inputparent {
                display: flex;
                align-items: center;
                padding-top: 10px;
                margin-top: 20px;
            }
        }

        .enquiry-form select {
            width: 100%;
            background: transparent;
        }

        .accordion-content-careers {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .accordion-active .accordion-content-careers {
            max-height: 6000px;
            /* Adjust the max-height to fit your content */
            transition: max-height 0.5s ease-in-out;
        }

        .flag-img {
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

        .modalPopup {
            display: none; /* Controlled by 'hidden' class */
            justify-content: center;
            align-items: center;
        }
        .modalPopup.flex {
            display: flex;
        }
        .job-decsript ul li{
            margin-top: 5px;
            margin-left: 20px;
            list-style-type: disc;
        }
        @media (min-width: 768px) and (max-width: 1380px){
            #jobenquirey .enquiry-form-inputparent{
                margin-top: 15px;
            }
        }
        .blakorblue{
            padding-top: 51px;
            background: #04183c;
        }

    </style>
    @include('frontend.Common.whatsapplogo')
    <div class="w-full h-full careers-parent contact-US-banner">
        <div class="w-full h-full contact-US">
            <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:pt-[8%] text-white">
                <div class="flex flex-col lg:flex-row justify-between items-start gap-[15%] lg:py-[50px] md:mt-36 lg:mt-0">
                    <div class="w-full h-full mb-8 font_inter">
                        <h1 class="mainHead font-semibold text-[40px] xl:w-[70%] uppercase">@if(isset($careerContents)) {{$careerContents->title}} @endif
                        </h1>
                        <p class="font-semibold text-[15px] py-[30px]">@if(isset($careerContents)) {{$careerContents->sub_title}} @endif</p>
                        @if(isset($careerContents)) {!!$careerContents->description!!} @endif
                        {{-- <h2 class="font-semibold text-[30px]">Our Team Identity :</h2>
                        <ul class="list-disc pl-5 text-[18px] mb-6 lg:mb-0">
                            <li class="py-2">Assist with Value-added services</li>
                            <li class="py-2">Learners Before Leaders</li>
                            <li class="py-2">Prepared for marathon</li>
                            <li class="py-2">Replace Self - Mentoring Other Team Members</li>
                        </ul> --}}
                    </div>
                    <div class="relative w-full bg-white rounded-xl h-fit canada-flag">
                        <div class="absolute right-6 top-[-10px]">
                            <img src="assets/home_Banner/reduse.png" class="flag-img" alt="Canada Flag" />
                        </div>
                        <div>
                            <form action="" class="text-black enquiry-form" id="career-add-form">
                                <h4 class="font_inter font-semibold text-black text-[32px] pb-10">Enquiry</h4>
                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                    <label for="name">NAME<span>*</span></label>
                                    <input type="text" name="name">
                                </div>

                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                    <label for="email">Email<span>*</span></label>
                                    <input type="Email" name="email">
                                </div>

                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent mobile flex-col !items-start !pointer-events-nonemd:items-center md:flex-row gap-4 md:gap-0">
                                    <div class="border-b border-b-[#D9D9D9] w-[90%] md:w-auto md:border-none">
                                        <select name="country" id="" class="bg-transparent">
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
                                    <div class="flex items-center w-full mt-7 md:mt-0 md:pl-4">
                                        <label class="flex md:whitespace-nowrap" for="mobile">
                                            Mobile <span class="!text-black hidden md:block pl-1"> NUMBER</span><span>*</span>
                                        </label>
                                        <input type="tel" name="mobile">
                                    </div>
                                </div>

                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent gap-[26px] ">
                                    <label class="md:whitespace-nowrap" for="email">select branch<span>*</span></label>
                                    <select name="branch" id="" class="bg-transparent">
                                        <option value="" selected disabled>---Select---</option>
                                        @foreach ($branches as $data)
                                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent gap-[26px]">
                                    <label class="md:whitespace-nowrap" for="email">department<span>*</span></label>
                                    <select name="department" id="" class="bg-transparent">
                                        <option value="" selected disabled>---Select---</option>
                                        @foreach ($departments as $data)
                                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                    <label for="coverUploaderone" class="flex items-center justify-between w-full gap-3 pb-1 cursor-pointer">
                                        <div class="md:whitespace-nowrap">Cover letter</div>
                                        <div class="flex justify-end w-full">
                                            <input id="coverUploaderone" class="!p-0" type="file" accept=".pdf,doc,docx " name="message"/>
                                            <img id="coveruploadIconone" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" width="19" height="15" />
                                        </div>
                                    </label>

                                    {{-- <label for="message">Message<span>*</span></label>
                                    <input type="text" name="message"> --}}
                                </div>

                                <!-- Resume Upload Section -->
                                <div class="flex-col enquiry-form-inputparent">
                                    <label for="resume" class="cursor-pointer flex justify-between items-center w-full !border-1 !border-b !border-b-[#D9D9D9] gap-3 pb-1" style="border:1px solid #D9D9D9 !important; border-top: transparent !important; border-left:transparent !important; border-right: transparent !important; ">
                                        <div class="md:whitespace-nowrap">Upload Resume<span>*</span></div>
                                        <div class="flex justify-end w-full">
                                            <input id="imageUploader"  type="file" accept=".pdf,doc,docx" class="relative z-50 !p-0"  name="resume" onchange="handleFileChange()" />
                                            <img id="uploadIcon" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" width="19" height="15" />
                                        </div>
                                    </label>
                                    {{-- <span id="resume-error" class="error invalid-feedback"></span> --}}
                                </div>

                                <div class="mt-10">    
                                    <div class="border rounded-full border-[#072558] cursor-pointer w-fit">
                                        <button  type="submit" class="!px-[80px] py-3 uppercase text-[#072558] cursor-pointer text-[16px] font-bold bg-transparent hover:bg-[#072558] hover:text-white transition-colors duration-300 rounded-full">Submit</button>
                                    </div>

                                    <div class="relative mt-4 group">
                                        <p class="text-[8px] capitalize whitespace-normal">
                                        Disclaimer:
                                        In order to provide you with the service you requested, we need to store and process your personal data. By submitting the form, you consent to us storing your personal data for this purpose. For more information about our privacy practices and how we are committed to protecting your privacy, please review our
                                            <a class="inline-block text-blue-500 underline" href="{{ url('privacy-policy') }}">Privacy Policy</a>
                                        </p>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="open-positions bg-[#04183c] py-8 lg:pt-[%] lg:pb-[4%]">
        @if(count($careers))
            <div class="container w-full h-full px-5 mx-auto text-white xl:px-12">
                <h2 class="my-10 font_inter font-semibold text-[25px] md:text-[50px] uppercase w-[50%]">Open positions</h2>
            </div>
        @endif
        @if(count($careers))
        @foreach ($careers as $index => $data)
        <div class="container mx-auto px-5 xl:px-12 lg:pb-[2px] h-full w-full text-white">
            <div class="cursor-pointer rounded-[33px] my-12 lg:my-4 border border-white" data-accordion>
                <div class="accordion-header-careers">
                    <div class="flex items-center justify-between px-5 pt-6 pb-4">
                        <div class="flex flex-col gap-6 md:flex-row lg:gap-10 md:items-center">
                            <div class="flex items-end gap-3">
                                <img class="w-[28px]" src="{{asset('assets/home_Banner/jobbox.png')}}" alt="">
                                <h2 class="font_inter font-bold text-[15px] text-white uppercase">{{ $data->title }}</h2>
                            </div>
                            <div class="flex flex-col gap-2 md:flex-row md:items-baseline">
                                <p class="text-[10px] font-extralight uppercase md:whitespace-nowrap lg:whitespace-normal">{{ $data->location }} /</p><p class="text-[10px] font-extralight uppercase">Remote  / </p><p class="text-[10px] font-extralight uppercase">{{ $data->experience }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-2 pr-5">
                                <img class="w-[13px]" src="{{asset('assets/home_Banner/dateicon.png')}}" alt="">
                                <div class="text-[12px] font-extralight uppercase">{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 lg:pr-8 lg:pl-[62px] pt-3 pb-6 flex flex-col lg:flex-row lg:items-end h-fit lg:justify-between gap-7">
                        <div class="lg:w-[70%]">
                            <h2 class="pb-3 text-sm font-extrabold uppercase font_inter">overview</h2>

                            @if(!empty($data->overview))
                                <p class="pb-3 text-sm font-light uppercase font_inter">{{ $data->overview }}</p>
                            @else
                                <p class="pb-3 text-sm font-light lowercase font_inter">We help unlock value through a start-up mindset and modern methods, fusing strategy, consulting and customer experience with agile engineering and problem-solving creativity. United by our core values and our purpose of helping people thrive in the brave pursuit.</p>
                            @endif
                        </div>

                        <div class="lg:w-[30%] flex justify-end items-center">
                            <button  class="viewmorebtn rounded-full px-16 py-2 text-sm border-[2px] font-semibold border-white uppercase font_inter">View More</button>
                        </div>
                    </div>
                </div>

                <div class="accordion-content-careers">
                    <div class="px-5 py-4 text-white lg:px-8 job-decsript">
                        {!! $data->description !!}
                    </div>
                    <div class="accordion-content-careers">
                        <div class="flex items-center justify-end px-5 py-4">
                            <!-- Unique Button ID -->
                            <button id="applyNowBtn" data-job-id="{{$data->id}}"
                                    class="relative py-2 overflow-hidden font-semibold text-white transition-all duration-500 ease-out border border-white rounded-md font_inter px-7 hover:text-black group applyNowBtn">
                                <span class="absolute inset-0 transition-transform duration-500 ease-out transform -translate-x-full bg-white group-hover:translate-x-0"></span>
                                <span class="relative z-10 block font-bold font_inter">Apply now</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


        @else
        <div class="container flex justify-center w-full h-full px-5 mx-auto text-white xl:px-12">
            <h2 class="mb-8 font_inter font-semibold text-center text-[25px] md:text-[50px] uppercase w-[50%]">Open positions</h2>
        </div>
        <div class="flex items-center justify-center mb-10">
            <div class="container flex items-center justify-center w-full h-full px-5 mx-auto text-white xl:px-12">
                <div class="flex items-center justify-center">
                    <h2 class="px-5 text-sm font-medium text-center text-white capitalize rounded-lg lg:w-1/2 font_inter"><span class="block px-2 mb-3 text-2xl text-white bg-black">At present, we do not have any available positions !!</span>However, we are continuously seeking skilled and talented individuals to join our workforce. We encourage you to visit our careers page regularly or follow us on social media for updates on future job openings</h2>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="relative">
        <!-- Unique Modal ID -->
        <div id="jobenquirey" class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-800 bg-opacity-50 modalPopup">
            <div class="rounded-xl pb-11 px-2 lg:p-6 w-[92%] lg:max-w-[50%]">
                <div class="relative">
                    <div class="relative w-full bg-white rounded-xl h-fit canada-flag lg:h-fit 2xl:h-auto">
                        <div class="absolute top-0 left-[30px]">
                            <button id="closejobModal" class="z-50 mt-2 mr-2 text-black closeModal">
                                <img width="25px" class="my-4" src="{{ asset('assets/home_Banner/cross.png') }}" alt="">
                            </button>
                        </div>
                        <form action="" class="text-black enquiry-form" id="career-add-form-new">
                            <input type="hidden" name="job_id" id="job_id" value="">
                            <h4 class="font_inter font-semibold text-black text-[18px] lg:text-[32px] py-10">Start Your Journey with Us</h4>
                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent !mt-[-11px]">
                                <label for="name">NAME<span>*</span></label>
                                <input type="text" name="name_n">
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="email">Email<span>*</span></label>
                                <input type="Email" name="email_n">
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent mobile flex-col !items-start !pointer-events-nonemd:items-center md:flex-row gap-4 md:gap-0">
                                <div class="border-b border-b-[#D9D9D9] w-full md:w-auto md:border-none">
                                    <select name="country_n" id="" class="bg-transparent">
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
                                <div class="flex items-center w-full mt-7 md:mt-0 md:pl-4">
                                    <label class="flex md:whitespace-nowrap" for="mobile">
                                        Mobile <span class="!text-black hidden md:block pl-1"> NUMBER</span><span>*</span>
                                    </label>
                                    <input type="tel" name="mobile_n">
                                </div>
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="coverUploadersec"
                                    class="flex items-center justify-between w-full cursor-pointer">
                                    <div class="md:whitespace-nowrap">Cover letter</div>
                                    <div class="flex justify-end w-full">
                                        <input id="coverUploadersec" class="pb-2" type="file" accept=".pdf,doc,docx " name="message_n" onchange="handleFileChange(1)" />
                                        <img id="coveruploadIconsec" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" class="w-[19px] h-[22px]" width="19" height="15" />
                                    </div>
                                </label>

                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="imageUploadersec"
                                    class="flex items-center justify-between w-full cursor-pointer">
                                    <div class="md:whitespace-nowrap">Upload Resume<span>*</span></div>
                                    <div class="flex justify-end w-full">
                                        <input id="imageUploadersec" class="pb-2" type="file" accept=".pdf, doc,docx" required name="resume_n" onchange="handleFileChange()" />
                                        <img id="uploadIconsec" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" class="w-[19px] h-[22px]" width="19" height="15" />
                                    </div>
                                </label>
                            </div>

                            <div class="mt-10">    
                            <div class="border rounded-full border-[#072558] cursor-pointer w-fit">
                                <button  type="submit" class="!px-[80px] py-3 uppercase text-[#072558] cursor-pointer text-[16px] font-bold bg-transparent hover:bg-[#072558] hover:text-white transition-colors duration-300 rounded-full">Submit</button>
                            </div>

                            <div class="relative mt-4 group">
                                <p class="text-[8px] capitalize whitespace-normal">
                                Disclaimer:
                                In order to provide you with the service you requested, we need to store and process your personal data. By submitting the form, you consent to us storing your personal data for this purpose. For more information about our privacy practices and how we are committed to protecting your privacy, please review our
                                    <a class="inline-block text-blue-500 underline" href="{{ url('privacy-policy') }}">Privacy Policy</a>
                                </p>
                            </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  @include('frontend.Common.getintouch') --}}

    <script>
        function handleFileChange() {
            const elements = [
                { inputId: 'imageUploader', iconId: 'uploadIcon' },
                { inputId: 'imageUploadersec', iconId: 'uploadIconsec' },
                { inputId: 'coverUploadersec', iconId: 'coveruploadIconsec' },
                { inputId: 'coverUploaderone', iconId: 'coveruploadIconone' }
            ];

            elements.forEach(({ inputId, iconId }) => {
                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);

                if (input?.files && input.files.length > 0) {
                    icon.style.filter = 'hue-rotate(270deg) brightness(2.5)';
                } else {
                    icon.style.filter = 'none';
                }
            });
        }

        document.querySelectorAll('[data-accordion]').forEach(accordion => {
            accordion.querySelector('.accordion-header-careers').addEventListener('click', () => {
                // Toggle the active state for the clicked accordion
                accordion.classList.toggle('accordion-active');

                // Rotate the arrow icon based on the active state
                const icon = accordion.querySelector('.accordion-icon');
                if (accordion.classList.contains('accordion-active')) {
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    icon.style.transform = 'rotate(0deg)';
                }
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);
            gsap.to(".flag-img", {
                scrollTrigger: {
                    trigger: ".careers-parent", // The section that triggers the animation
                    start: "top center", // When the top of the trigger hits the center of the viewport
                    toggleActions: "play none none none", // Play animation when triggered
                },
                duration: 2, // Duration of the animation
                top: "4px", // Final position of the flag (curtain falling to this point)
                opacity: 1, // Fade in the flag as it falls
                ease: "bounce.out", // Bounce effect to mimic a natural falling curtain
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const applyNowButtons = document.querySelectorAll("[id^='applyNowBtn']");
            applyNowButtons.forEach(button => {
                const index = button.id.split('-')[1];
                const modal = document.getElementById(`jobenquirey`);
                const closeModal = document.getElementById(`closejobModal`);

                button.addEventListener("click", function () {

                    $('#job_id').val(this.dataset.jobId);

                    modal.style.display = "flex";
                });

                closeModal.addEventListener("click", function () {
                    modal.style.display = "none";
                });
            });
        });


    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const viewMoreButtons = document.querySelectorAll(".viewmorebtn");

            viewMoreButtons.forEach(button => {
                button.addEventListener("click", (event) => {
                    const clickedButton = event.target; // Identify the clicked button

                    // Toggle the text of the clicked button
                    if (clickedButton.textContent.trim() === "View More") {
                        clickedButton.textContent = "View Less";
                    } else {
                        clickedButton.textContent = "View More";
                    }
                });
            });
        });
    </script>

    <script>
        // Check if the device is mobile
        document.addEventListener('DOMContentLoaded', () => {
        // Ensure the DOM is fully loaded
        const applyNowButton = document.getElementById('applyNowBtn');
        const jobEnquirySection = document.getElementById('jobenquirey');

        if (applyNowButton && jobEnquirySection) {
            applyNowButton.addEventListener('click', function () {
                if (/Mobi|Android/i.test(navigator.userAgent)) {
                    // Show the modal by removing the 'hidden' class
                    jobEnquirySection.classList.remove('hidden');
                    jobEnquirySection.style.display = 'flex'; // Ensure it displays correctly

                    // Scroll to the modal section
                    jobEnquirySection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center' // Adjust block position if needed
                    });

                    console.log('Apply button clicked, and scrolling to #jobenquirey.');
                } else {
                    console.log('Not a mobile device. Action skipped.');
                }
            });
        } else {
            console.error('Element with ID "applyNowBtn" or "jobenquirey" not found.');
        }
    });
    </script>



    @endsection
