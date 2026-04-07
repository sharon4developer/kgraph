@extends('layouts.main')

@push('styles')
<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 0.625rem 0.875rem;
        background-color: white !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.5rem;
        color: #0f172a !important;
        font-size: 1rem;
        transition: all 0.2s;
        min-height: 42px;
        display: block;
        opacity: 1;
        visibility: visible;
    }
    
    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #94a3b8;
    }
    
    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.375rem;
    }
    
    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
    
    /* Mobile number field container */
    #country {
        font-weight: 600;
        background-color: #f8fafc !important;
        border-right: 1px solid #cbd5e1 !important;
    }
    
    #country:focus {
        background-color: white !important;
        border-color: #3b82f6 !important;
        z-index: 10;
    }
    
    #mobile {
        border-left: 1px solid #cbd5e1 !important;
    }
    
    #mobile:focus {
        border-left-color: #3b82f6 !important;
        z-index: 10;
    }
    
    /* Ensure container doesn't overflow */
    .flex.items-stretch.gap-0 {
        max-width: 100%;
    }
    
    @media (max-width: 640px) {
        #country {
            padding-right: 1.5rem;
            font-size: 0.875rem;
            min-width: 65px;
            max-width: 85px;
        }
        
        #mobile {
            font-size: 0.875rem;
        }
    }
    
    .form-textarea {
        resize: none;
        min-height: 80px;
    }
    
    .radio-group {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .radio-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .radio-input {
        width: 1rem;
        height: 1rem;
        color: #2563eb;
        border-color: #cbd5e1;
        cursor: pointer;
    }
    
    .radio-input:focus {
        outline: 2px solid #3b82f6;
        outline-offset: 2px;
    }
    
    .radio-label {
        color: #334155;
        font-weight: 500;
        cursor: pointer;
    }
    
    .section-divider {
        border-top: 1px solid #e2e8f0;
        margin: 1rem 0;
    }
    
    /* Override any conflicting styles from contact-form class */
    .contact-form input,
    .contact-form select,
    .contact-form textarea {
        background: white !important;
        border: 1px solid #cbd5e1 !important;
        color: #0f172a !important;
        padding: 0.75rem 1rem !important;
        border-radius: 0.5rem !important;
        font-size: 1rem !important;
        min-height: 44px !important;
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
        height: auto !important;
    }
    
    .contact-form label {
        color: #334155 !important;
        font-weight: 600 !important;
        font-size: 0.875rem !important;
        margin-bottom: 0.5rem !important;
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }
    
    /* Ensure form fields are visible */
    #eligibility-form input,
    #eligibility-form select,
    #eligibility-form textarea {
        background-color: white !important;
        color: #0f172a !important;
        border: 1px solid #cbd5e1 !important;
        opacity: 1 !important;
        visibility: visible !important;
    }
    
    /* Ensure submit button is visible and styled */
    #eligibility-form button[type="submit"] {
        background-color: white !important;
        color: #1e40af !important;
        border: none !important;
        opacity: 1 !important;
        visibility: visible !important;
        display: inline-flex !important;
        cursor: pointer !important;
        min-height: 56px !important;
        padding: 1rem 2.5rem !important;
    }
    
    #eligibility-form button[type="submit"]:hover {
        background-color: #dbeafe !important;
        transform: scale(1.05) !important;
        border-color: #93c5fd !important;
    }
    
    #eligibility-form button[type="submit"]:active {
        transform: scale(1) !important;
    }
    
    @media (max-width: 768px) {
        #eligibility-form button[type="submit"] {
            width: 100% !important;
            padding: 1rem 1.5rem !important;
        }
    }
</style>
@endpush

@section('content')
@php
    $locationData = getLocationData();
@endphp

<div class="min-h-screen bg-slate-50">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 pt-12 pb-4 md:pt-16 md:pb-4">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <div class="text-sm text-slate-400 mb-4">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a> 
                    <span class="mx-2">/</span>
                    <span class="text-slate-300">Immigration Pre-Assessment</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">
                    Immigration Pre-Assessment
                </h1>
                <div x-data="{ showFullContent: false }" class="mb-6 max-w-4xl">
                    <p class="text-slate-300 leading-relaxed mb-6" style="font-size: 1.12rem;" 
                       :class="showFullContent ? '' : 'line-clamp-3 md:line-clamp-none'">
                        By filling out this Immigration Pre-Assessment Form you will provide us information to access your eligibility to come and immigrate to Canada as a worker, student, investor or permanent resident. You will be required to provide details on your education, language skills, work experience and other factors considered by Immigration Canada to access candidates' eligibility.
                    </p>
                    
                    <div class="bg-slate-800/50 rounded-xl p-5 border border-slate-700 mb-4" 
                         :class="showFullContent ? '' : 'hidden md:block'">
                        <div class="space-y-3 text-slate-300">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p>We respect your privacy. Your personal information will not be released to any third party.</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p>The Pre-Assessment is free. If you need a consultation with our immigration consultant, charges apply.</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p>We will contact you via email within 3 business days after you submit the form. If you do not hear from us after that period, please check your junk/spam emails.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div x-show="showFullContent" x-cloak class="md:hidden">
                        <div class="bg-slate-800/50 rounded-xl p-5 border border-slate-700 mb-4">
                            <div class="space-y-3 text-slate-300">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p>We respect your privacy. Your personal information will not be released to any third party.</p>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p>The Pre-Assessment is free. If you need a consultation with our immigration consultant, charges apply.</p>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p>We will contact you via email within 3 business days after you submit the form. If you do not hear from us after that period, please check your junk/spam emails.</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-slate-400 text-sm mb-2">We look forward to assisting you with your immigration matter.</p>
                        <p class="text-white font-semibold">KGraph Immigration Services</p>
                    </div>
                    
                    <div class="hidden md:block">
                        <p class="text-slate-400 text-sm">We look forward to assisting you with your immigration matter.</p>
                        <p class="text-white font-semibold mt-2">KGraph Immigration Services</p>
                    </div>
                    
                    <button @click="showFullContent = !showFullContent" 
                            class="md:hidden mt-4 text-blue-400 hover:text-blue-300 font-medium text-sm underline transition-colors">
                        <span x-show="!showFullContent">Read More</span>
                        <span x-show="showFullContent">Read Less</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Form Section --}}
    <section class="py-6 md:py-8 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-4 md:p-6">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-200">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900">Immigration Pre-Assessment Form</h2>
                    <img class="h-12 md:h-16" src="{{ asset('assets/home_Banner/k-graph-logo-blue.png') }}" alt="K-Graph Logo">
                </div>
                
                <p class="text-slate-800 mb-4" style="color: #1e293b !important;">
                    <strong>Note:</strong> In case you are filling out the form for a friend or sponsored person, please input the information of the person who wants to immigrate.
                </p>

                <form action="{{ route('submit-eligibility-form') }}" method="POST" class="contact-form" id="eligibility-form">
                    @csrf
                    {{-- Honeypot: hidden field to trap bots --}}
                    <input type="text" name="website" style="display:none !important;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">
                    {{-- Personal Information Section --}}
                    <div class="mb-5">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 pb-2 border-b border-slate-200">Personal Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="first-name" class="form-label">First Name <span class="text-red-500">*</span></label>
                                <input type="text" id="first-name" name="first_name" class="form-input" required>
                            </div>
                            <div>
                                <label for="last-name" class="form-label">Last Name <span class="text-red-500">*</span></label>
                                <input type="text" id="last-name" name="last_name" class="form-input" required>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="dob" class="form-label">Date of Birth <span class="text-red-500">*</span></label>
                                <input type="date" id="dob" name="dob" value="2000-01-01" class="form-input" required>
                            </div>
                            <div>
                                <label for="marital-status" class="form-label">Marital Status <span class="text-red-500">*</span></label>
                                <select id="marital-status" name="marital_status" class="form-select" required>
                                    <option value="" disabled selected>Select your marital status</option>
                                    <option value="Never Married / Single">Never Married / Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Common-Law">Common-Law</option>
                                    <option value="Divorced / Separated">Divorced / Separated</option>
                                    <option value="Legally Separated">Legally Separated</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="email" class="form-label">Email <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" class="form-input lowercase" required>
                            </div>
                            <div>
                                <label for="mobile" class="form-label">Mobile Number <span class="text-red-500">*</span></label>
                                <div class="flex items-stretch gap-0 w-full overflow-hidden">
                                    <select name="country_live" id="country" class="form-select w-20 sm:w-24 flex-shrink-0 text-sm sm:text-base border-r-0 rounded-r-none" style="min-width: 70px; max-width: 100px;">
                                        <option selected value="+1">+1 (US/Canada)</option>
                                        <option value="+7">+7 (Russia/Kazakhstan)</option>
                                        <option value="+20">+20 (Egypt)</option>
                                        <option value="+27">+27 (South Africa)</option>
                                        <option value="+30">+30 (Greece)</option>
                                        <option value="+31">+31 (Netherlands)</option>
                                        <option value="+32">+32 (Belgium)</option>
                                        <option value="+33">+33 (France)</option>
                                        <option value="+34">+34 (Spain)</option>
                                        <option value="+36">+36 (Hungary)</option>
                                        <option value="+39">+39 (Italy)</option>
                                        <option value="+43">+43 (Austria)</option>
                                        <option value="+44">+44 (UK)</option>
                                        <option value="+45">+45 (Denmark)</option>
                                        <option value="+49">+49 (Germany)</option>
                                        <option value="+51">+51 (Peru)</option>
                                        <option value="+52">+52 (Mexico)</option>
                                        <option value="+53">+53 (Cuba)</option>
                                        <option value="+54">+54 (Argentina)</option>
                                        <option value="+55">+55 (Brazil)</option>
                                        <option value="+56">+56 (Chile)</option>
                                        <option value="+57">+57 (Colombia)</option>
                                        <option value="+60">+60 (Malaysia)</option>
                                        <option value="+61">+61 (Australia)</option>
                                        <option value="+62">+62 (Indonesia)</option>
                                        <option value="+63">+63 (Philippines)</option>
                                        <option value="+64">+64 (New Zealand)</option>
                                        <option value="+65">+65 (Singapore)</option>
                                        <option value="+66">+66 (Thailand)</option>
                                        <option value="+81">+81 (Japan)</option>
                                        <option value="+82">+82 (South Korea)</option>
                                        <option value="+84">+84 (Vietnam)</option>
                                        <option value="+86">+86 (China)</option>
                                        <option value="+90">+90 (Turkey)</option>
                                        <option value="+91">+91 (India)</option>
                                        <option value="+92">+92 (Pakistan)</option>
                                        <option value="+93">+93 (Afghanistan)</option>
                                        <option value="+94">+94 (Sri Lanka)</option>
                                        <option value="+95">+95 (Myanmar)</option>
                                        <option value="+98">+98 (Iran)</option>
                                        <option value="+212">+212 (Morocco)</option>
                                        <option value="+213">+213 (Algeria)</option>
                                        <option value="+218">+218 (Libya)</option>
                                        <option value="+220">+220 (Gambia)</option>
                                        <option value="+224">+224 (Guinea)</option>
                                        <option value="+225">+225 (Ivory Coast)</option>
                                        <option value="+226">+226 (Burkina Faso)</option>
                                        <option value="+227">+227 (Niger)</option>
                                        <option value="+228">+228 (Togo)</option>
                                        <option value="+229">+229 (Benin)</option>
                                        <option value="+230">+230 (Mauritius)</option>
                                        <option value="+231">+231 (Liberia)</option>
                                        <option value="+232">+232 (Sierra Leone)</option>
                                        <option value="+233">+233 (Ghana)</option>
                                        <option value="+234">+234 (Nigeria)</option>
                                        <option value="+235">+235 (Chad)</option>
                                        <option value="+236">+236 (Central African Republic)</option>
                                        <option value="+237">+237 (Cameroon)</option>
                                        <option value="+238">+238 (Cape Verde)</option>
                                        <option value="+240">+240 (Equatorial Guinea)</option>
                                        <option value="+241">+241 (Gabon)</option>
                                        <option value="+242">+242 (Republic of the Congo)</option>
                                        <option value="+243">+243 (DR Congo)</option>
                                        <option value="+244">+244 (Angola)</option>
                                        <option value="+245">+245 (Guinea-Bissau)</option>
                                        <option value="+246">+246 (British Indian Ocean Territory)</option>
                                        <option value="+248">+248 (Seychelles)</option>
                                        <option value="+249">+249 (Sudan)</option>
                                        <option value="+250">+250 (Rwanda)</option>
                                        <option value="+251">+251 (Ethiopia)</option>
                                        <option value="+252">+252 (Somalia)</option>
                                        <option value="+253">+253 (Djibouti)</option>
                                        <option value="+254">+254 (Kenya)</option>
                                        <option value="+255">+255 (Tanzania)</option>
                                        <option value="+256">+256 (Uganda)</option>
                                        <option value="+257">+257 (Burundi)</option>
                                        <option value="+258">+258 (Mozambique)</option>
                                        <option value="+260">+260 (Zambia)</option>
                                        <option value="+261">+261 (Madagascar)</option>
                                        <option value="+262">+262 (Réunion)</option>
                                        <option value="+263">+263 (Zimbabwe)</option>
                                        <option value="+264">+264 (Namibia)</option>
                                        <option value="+265">+265 (Malawi)</option>
                                        <option value="+266">+266 (Lesotho)</option>
                                        <option value="+267">+267 (Botswana)</option>
                                        <option value="+268">+268 (Swaziland)</option>
                                        <option value="+269">+269 (Comoros)</option>
                                        <option value="+290">+290 (Saint Helena)</option>
                                        <option value="+291">+291 (Eritrea)</option>
                                        <option value="+297">+297 (Aruba)</option>
                                        <option value="+298">+298 (Faroe Islands)</option>
                                        <option value="+299">+299 (Greenland)</option>
                                        <option value="+350">+350 (Gibraltar)</option>
                                        <option value="+351">+351 (Portugal)</option>
                                        <option value="+352">+352 (Luxembourg)</option>
                                        <option value="+353">+353 (Ireland)</option>
                                        <option value="+354">+354 (Iceland)</option>
                                        <option value="+355">+355 (Albania)</option>
                                        <option value="+356">+356 (Malta)</option>
                                        <option value="+357">+357 (Cyprus)</option>
                                        <option value="+358">+358 (Finland)</option>
                                        <option value="+359">+359 (Bulgaria)</option>
                                        <option value="+370">+370 (Lithuania)</option>
                                        <option value="+371">+371 (Latvia)</option>
                                        <option value="+372">+372 (Estonia)</option>
                                        <option value="+373">+373 (Moldova)</option>
                                        <option value="+374">+374 (Armenia)</option>
                                        <option value="+375">+375 (Belarus)</option>
                                        <option value="+376">+376 (Andorra)</option>
                                        <option value="+377">+377 (Monaco)</option>
                                        <option value="+378">+378 (San Marino)</option>
                                        <option value="+380">+380 (Ukraine)</option>
                                        <option value="+381">+381 (Serbia)</option>
                                        <option value="+382">+382 (Montenegro)</option>
                                        <option value="+383">+383 (Kosovo)</option>
                                        <option value="+385">+385 (Croatia)</option>
                                        <option value="+386">+386 (Slovenia)</option>
                                        <option value="+387">+387 (Bosnia and Herzegovina)</option>
                                        <option value="+389">+389 (North Macedonia)</option>
                                        <option value="+420">+420 (Czech Republic)</option>
                                        <option value="+421">+421 (Slovakia)</option>
                                        <option value="+423">+423 (Liechtenstein)</option>
                                        <option value="+500">+500 (Falkland Islands)</option>
                                        <option value="+501">+501 (Belize)</option>
                                        <option value="+502">+502 (Guatemala)</option>
                                        <option value="+503">+503 (El Salvador)</option>
                                        <option value="+504">+504 (Honduras)</option>
                                        <option value="+505">+505 (Nicaragua)</option>
                                        <option value="+506">+506 (Costa Rica)</option>
                                        <option value="+507">+507 (Panama)</option>
                                        <option value="+508">+508 (Saint Pierre and Miquelon)</option>
                                        <option value="+509">+509 (Haiti)</option>
                                        <option value="+590">+590 (Guadeloupe)</option>
                                        <option value="+591">+591 (Bolivia)</option>
                                        <option value="+592">+592 (Guyana)</option>
                                        <option value="+593">+593 (Ecuador)</option>
                                        <option value="+594">+594 (French Guiana)</option>
                                        <option value="+595">+595 (Paraguay)</option>
                                        <option value="+596">+596 (Martinique)</option>
                                        <option value="+597">+597 (Suriname)</option>
                                        <option value="+598">+598 (Uruguay)</option>
                                        <option value="+599">+599 (Netherlands Antilles)</option>
                                        <option value="+670">+670 (East Timor)</option>
                                        <option value="+672">+672 (Antarctica)</option>
                                        <option value="+673">+673 (Brunei)</option>
                                        <option value="+674">+674 (Nauru)</option>
                                        <option value="+675">+675 (Papua New Guinea)</option>
                                        <option value="+676">+676 (Tonga)</option>
                                        <option value="+677">+677 (Solomon Islands)</option>
                                        <option value="+678">+678 (Vanuatu)</option>
                                        <option value="+679">+679 (Fiji)</option>
                                        <option value="+680">+680 (Palau)</option>
                                        <option value="+681">+681 (Wallis and Futuna)</option>
                                        <option value="+682">+682 (Cook Islands)</option>
                                        <option value="+683">+683 (Niue)</option>
                                        <option value="+685">+685 (Samoa)</option>
                                        <option value="+686">+686 (Kiribati)</option>
                                        <option value="+687">+687 (New Caledonia)</option>
                                        <option value="+688">+688 (Tuvalu)</option>
                                        <option value="+689">+689 (French Polynesia)</option>
                                        <option value="+850">+850 (North Korea)</option>
                                        <option value="+852">+852 (Hong Kong)</option>
                                        <option value="+853">+853 (Macau)</option>
                                        <option value="+855">+855 (Cambodia)</option>
                                        <option value="+856">+856 (Laos)</option>
                                        <option value="+880">+880 (Bangladesh)</option>
                                        <option value="+886">+886 (Taiwan)</option>
                                        <option value="+960">+960 (Maldives)</option>
                                        <option value="+961">+961 (Lebanon)</option>
                                        <option value="+962">+962 (Jordan)</option>
                                        <option value="+963">+963 (Syria)</option>
                                        <option value="+964">+964 (Iraq)</option>
                                        <option value="+965">+965 (Kuwait)</option>
                                        <option value="+966">+966 (Saudi Arabia)</option>
                                        <option value="+967">+967 (Yemen)</option>
                                        <option value="+968">+968 (Oman)</option>
                                        <option value="+970">+970 (Palestine)</option>
                                        <option value="+971">+971 (UAE)</option>
                                        <option value="+972">+972 (Israel)</option>
                                        <option value="+973">+973 (Bahrain)</option>
                                        <option value="+974">+974 (Qatar)</option>
                                        <option value="+975">+975 (Bhutan)</option>
                                        <option value="+976">+976 (Mongolia)</option>
                                        <option value="+977">+977 (Nepal)</option>
                                        <option value="+992">+992 (Tajikistan)</option>
                                        <option value="+993">+993 (Turkmenistan)</option>
                                        <option value="+994">+994 (Azerbaijan)</option>
                                        <option value="+995">+995 (Georgia)</option>
                                        <option value="+996">+996 (Kyrgyzstan)</option>
                                        <option value="+998">+998 (Uzbekistan)</option>
                                        <option value="+1242">+1242 (Bahamas)</option>
                                        <option value="+1246">+1246 (Barbados)</option>
                                        <option value="+1264">+1264 (Anguilla)</option>
                                        <option value="+1268">+1268 (Antigua and Barbuda)</option>
                                        <option value="+1345">+1345 (Cayman Islands)</option>
                                        <option value="+1441">+1441 (Bermuda)</option>
                                        <option value="+1473">+1473 (Grenada)</option>
                                        <option value="+1671">+1671 (Guam)</option>
                                        <option value="+1684">+1684 (American Samoa)</option>
                                        <option value="+1767">+1767 (Dominica)</option>
                                        <option value="+1784">+1784 (Saint Vincent)</option>
                                        <option value="+1787">+1787 (Puerto Rico)</option>
                                        <option value="+1809">+1809 (Dominican Republic)</option>
                                        <option value="+1868">+1868 (Trinidad and Tobago)</option>
                                        <option value="+1869">+1869 (Saint Kitts and Nevis)</option>
                                        <option value="+1876">+1876 (Jamaica)</option>
                                        <option value="+1939">+1939 (Puerto Rico)</option>
                                    </select>
                                    <input type="tel" id="mobile" name="mobile" placeholder="Enter your phone number" class="form-input flex-1 min-w-0 rounded-l-none border-l-0" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="street-address-1" class="form-label">Address <span class="text-red-500">*</span></label>
                                <input type="text" id="street-address-1" name="street_address" class="form-input" required>
                            </div>
                            <div>
                                <label for="city" class="form-label">Citizenship <span class="text-red-500">*</span></label>
                                <input type="text" id="city" name="city" class="form-input" required>
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    {{-- Education Section --}}
                    <div class="mb-5">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 pb-2 border-b border-slate-200">Education & Qualifications</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="highest-education-inside" class="form-label">Highest Level of Education <span class="text-red-500">*</span></label>
                                <select id="highest-education-inside" name="highest_education_inside_can" class="form-select" required>
                                    <option value="" disabled selected>Select your highest level of education</option>
                                    <option value="None, or high school">None, or high school</option>
                                    <option value="Secondary diploma">Secondary diploma</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Bachelor's degree">Bachelor's degree</option>
                                    <option value="Two or more certificates, diplomas or degrees">Two or more certificates, diplomas or degrees</option>
                                    <option value="Master's degree, or professional degree">Master's degree, or professional degree</option>
                                    <option value="Doctoral level university degree (PhD)">Doctoral level university degree (PhD)</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label">Have you held a Canadian Education <span class="text-red-500">*</span></label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="qualification-yes" name="certificate_of_qualification" value="Yes" class="radio-input" required>
                                        <label for="qualification-yes" class="radio-label">Yes</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="qualification-no" name="certificate_of_qualification" value="No" class="radio-input" required>
                                        <label for="qualification-no" class="radio-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    {{-- Language Skills Section --}}
                    <div class="mb-5">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 pb-2 border-b border-slate-200">Language Skills</h3>
                        
                        <div class="mb-4">
                            <label class="form-label">Do you have a valid Language Skills Test Result <span class="text-red-500">*</span></label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="language-skills-yes" name="country_of_studies" value="Yes" class="radio-input" required>
                                    <label for="language-skills-yes" class="radio-label">Yes</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="language-skills-no" name="country_of_studies" value="No" class="radio-input" required>
                                    <label for="language-skills-no" class="radio-label">No</label>
                                </div>
                            </div>
                        </div>

                        <div id="language-test" class="hidden mb-4">
                            <label for="which-lang" class="form-label">Which language test did you take? <span class="text-red-500">*</span></label>
                            <select id="which-lang" name="language_test" class="form-select">
                                <option value="" disabled selected>Select</option>
                                <option value="CELPIP-G">CELPIP-G</option>
                                <option value="IELTS">IELTS</option>
                                <option value="PTE Core">PTE Core</option>
                                <option value="TEF Canada">TEF Canada</option>
                                <option value="TCF Canada">TCF Canada</option>
                            </select>
                        </div>

                        <div id="language-scores" class="hidden">
                            <label class="form-label mb-3">Language Test Scores <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                <div>
                                    <label for="speaking" class="form-label">Speaking</label>
                                    <input type="number" id="speaking" name="speaking" class="form-input" min="0" oninput="this.value = this.value < 0 ? 0 : this.value">
                                </div>
                                <div>
                                    <label for="listening" class="form-label">Listening</label>
                                    <input type="number" id="listening" name="listening" class="form-input" min="0" oninput="this.value = this.value < 0 ? 0 : this.value">
                                </div>
                                <div>
                                    <label for="reading" class="form-label">Reading</label>
                                    <input type="number" id="reading" name="reading" class="form-input" min="0" oninput="this.value = this.value < 0 ? 0 : this.value">
                                </div>
                                <div>
                                    <label for="writing" class="form-label">Writing</label>
                                    <input type="number" id="writing" name="writing" class="form-input" min="0" oninput="this.value = this.value < 0 ? 0 : this.value">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    {{-- Work Experience Section --}}
                    <div class="mb-5">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 pb-2 border-b border-slate-200">Work Experience</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="state" class="form-label">Canadian Experience <span class="text-red-500">*</span></label>
                                <select id="state" name="state" class="form-select" required>
                                    <option value="" disabled selected>Select your Canadian Experience</option>
                                    <option value="0 year">0 year</option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years">3 years</option>
                                    <option value="4 years">4 years</option>
                                    <option value="5 years or more">5 years or more</option>
                                </select>
                            </div>
                            <div>
                                <label for="zip" class="form-label">Foreign Experience <span class="text-red-500">*</span></label>
                                <select id="zip" name="zip" class="form-select" required>
                                    <option value="" disabled selected>Select your Foreign Experience</option>
                                    <option value="0 year">0 year</option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years or more">3 years or more</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    {{-- Additional Information Section --}}
                    <div class="mb-5">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 pb-2 border-b border-slate-200">Additional Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="form-label">Any Previous Visa Refusal <span class="text-red-500">*</span></label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="visa-refusal-yes" name="refused_or_cancelled_visa" value="Yes" class="radio-input" required>
                                        <label for="visa-refusal-yes" class="radio-label">Yes</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="visa-refusal-no" name="refused_or_cancelled_visa" value="No" class="radio-input" required>
                                        <label for="visa-refusal-no" class="radio-label">No</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="form-label">Do you have any criminal record(s) in your home country or any other country <span class="text-red-500">*</span></label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="criminal-yes" name="criminal_record" value="Yes" class="radio-input" required>
                                        <label for="criminal-yes" class="radio-label">Yes</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="criminal-no" name="criminal_record" value="No" class="radio-input" required>
                                        <label for="criminal-no" class="radio-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Do you or your spouse or common-law partner have a blood relative living in Canada who is a citizen or a permanent resident of Canada <span class="text-red-500">*</span></label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="family-yes" name="family_relations_in_canada" value="Yes" class="radio-input" required>
                                    <label for="family-yes" class="radio-label">Yes</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="family-no" name="family_relations_in_canada" value="No" class="radio-input" required>
                                    <label for="family-no" class="radio-label">No</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="hear-about-us" class="form-label">How Did You Hear About Us <span class="text-red-500">*</span></label>
                                <select id="hear-about-us" name="hear_about_canada" class="form-select" required>
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Google Search">Google Search</option>
                                    <option value="Friend Family">Friend/Family</option>
                                    <option value="Advertisement">Advertisement</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label for="birth-country" class="form-label">Any Additional Information</label>
                            <textarea rows="4" id="birth-country" name="detained" class="form-textarea" placeholder="Please provide any additional information that might be relevant..."></textarea>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    {{-- Submit Section --}}
                    <div class="mt-6 mb-4">
                        <div class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 rounded-2xl p-6 md:p-8 shadow-2xl border border-blue-500/20">
                            <div class="max-w-3xl mx-auto">
                                {{-- Success/Error Message Display --}}
                                <div id="form-message" class="hidden mb-6"></div>
                                
                                {{-- Submit Button --}}
                                <div class="text-center mb-6">
                                    <button type="submit" id="submit-btn" class="group relative inline-flex items-center justify-center w-full md:w-auto px-10 md:px-16 py-4 md:py-5 bg-white text-blue-700 rounded-xl font-bold text-base md:text-lg hover:bg-blue-100 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 active:scale-100 border-2 border-transparent hover:border-blue-300 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 disabled:hover:bg-white">
                                        <span class="relative z-10 flex items-center space-x-3">
                                            <span id="submit-text" class="group-hover:text-blue-800 transition-colors duration-300">SUBMIT FORM</span>
                                            <svg id="submit-icon" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                            <img id="submit-loader-gif" class="hidden w-6 h-6" src="https://i.gifer.com/origin/34/34338d26023e5515f6cc8969aa027bca_w200.gif" alt="Loading..." style="display: none;">
                                        </span>
                                    </button>
                                </div>
                                
                                {{-- Disclaimer Block --}}
                                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 md:p-6 border border-white/30 shadow-lg">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="text-white font-bold text-base md:text-lg mb-3">Privacy & Data Protection</h4>
                                            <p class="text-white/95 text-sm md:text-base leading-relaxed">
                                                By submitting this form, you consent to us storing and processing your personal data for the purpose of providing immigration assessment services. We respect your privacy and will not share your information with third parties. For detailed information about our privacy practices, please review our 
                                                <a class="text-white font-semibold underline hover:text-blue-200 transition-colors inline-flex items-center" href="{{ url('privacy-policy') }}">
                                                    Privacy Policy
                                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                    </svg>
                                                </a>.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('frontend.Common.getintouch')
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const languageSkillsRadios = document.getElementsByName('country_of_studies');
        const languageTestDiv = document.getElementById('language-test');
        const languageScoresDiv = document.getElementById('language-scores');
        const languageTestSelect = document.getElementById('which-lang');

        languageSkillsRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.value === 'Yes') {
                    languageTestDiv.classList.remove('hidden');
                    languageTestDiv.classList.add('block');
                } else {
                    languageTestDiv.classList.add('hidden');
                    languageTestDiv.classList.remove('block');
                    languageScoresDiv.classList.add('hidden');
                    languageScoresDiv.classList.remove('block');
                    languageTestSelect.value = '';
                }
            });
        });

        languageTestSelect.addEventListener('change', () => {
            if (languageTestSelect.value) {
                languageScoresDiv.classList.remove('hidden');
                languageScoresDiv.classList.add('block');
            } else {
                languageScoresDiv.classList.add('hidden');
                languageScoresDiv.classList.remove('block');
            }
        });
    });

    // Form submission handler
    document.getElementById('eligibility-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submit-btn');
        const submitText = document.getElementById('submit-text');
        const submitIcon = document.getElementById('submit-icon');
        const submitLoaderGif = document.getElementById('submit-loader-gif');
        const messageDiv = document.getElementById('form-message');
        
        // Disable submit button and show loading state
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
        submitText.textContent = 'SUBMITTING...';
        submitIcon.classList.add('hidden');
        submitLoaderGif.classList.remove('hidden');
        submitLoaderGif.style.display = 'block';
        messageDiv.classList.add('hidden');
        
        // Get form data
        const formData = new FormData(form);
        
        // Submit via AJAX
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Reset button state only on success/error
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-70', 'cursor-not-allowed');
            submitText.textContent = 'SUBMIT FORM';
            submitIcon.classList.remove('hidden');
            submitLoaderGif.classList.add('hidden');
            submitLoaderGif.style.display = 'none';
            
            // Show message
            messageDiv.classList.remove('hidden');
            
            if (data.status) {
                // Success - Enhanced Design
                messageDiv.className = 'mb-6 p-6 rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-400 shadow-lg';
                messageDiv.innerHTML = `
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center shadow-md">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-green-800 font-bold text-lg mb-1">Success!</h4>
                            <p class="text-green-700 text-base leading-relaxed">
                                ${data.message || 'Your eligibility check form has been submitted successfully! We will contact you via email within 3 business days.'}
                            </p>
                        </div>
                        <button onclick="document.getElementById('form-message').classList.add('hidden')" class="flex-shrink-0 text-green-600 hover:text-green-800 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                `;
                
                // Reset form
                form.reset();
                
                // Scroll to message with smooth animation
                setTimeout(() => {
                    messageDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
                
                // Auto-hide after 10 seconds
                setTimeout(() => {
                    messageDiv.classList.add('hidden');
                }, 10000);
            } else {
                // Error - Enhanced Design
                messageDiv.className = 'mb-6 p-6 rounded-xl bg-gradient-to-r from-red-50 to-rose-50 border-2 border-red-400 shadow-lg';
                messageDiv.innerHTML = `
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center shadow-md">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-red-800 font-bold text-lg mb-1">Error</h4>
                            <p class="text-red-700 text-base leading-relaxed">
                                ${data.message || 'Something went wrong. Please check your connection and try again.'}
                            </p>
                        </div>
                        <button onclick="document.getElementById('form-message').classList.add('hidden')" class="flex-shrink-0 text-red-600 hover:text-red-800 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                `;
                
                // Scroll to message
                setTimeout(() => {
                    messageDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            }
        })
        .catch(error => {
            // Reset button state on error
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-70', 'cursor-not-allowed');
            submitText.textContent = 'SUBMIT FORM';
            submitIcon.classList.remove('hidden');
            submitLoaderGif.classList.add('hidden');
            submitLoaderGif.style.display = 'none';
            
            // Show error message - Enhanced Design
            messageDiv.classList.remove('hidden');
            messageDiv.className = 'mb-6 p-6 rounded-xl bg-gradient-to-r from-red-50 to-rose-50 border-2 border-red-400 shadow-lg';
            messageDiv.innerHTML = `
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center shadow-md">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-red-800 font-bold text-lg mb-1">Network Error</h4>
                        <p class="text-red-700 text-base leading-relaxed">
                            Please check your internet connection and try again.
                        </p>
                    </div>
                    <button onclick="document.getElementById('form-message').classList.add('hidden')" class="flex-shrink-0 text-red-600 hover:text-red-800 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;
            
            // Scroll to message
            setTimeout(() => {
                messageDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 100);
            
            console.error('Form submission error:', error);
        });
    });
</script>

@endsection
