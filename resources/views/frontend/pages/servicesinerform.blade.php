@extends('layouts.main')

@push('styles')
<style>
    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        background-color: white !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.5rem;
        color: #0f172a !important;
        font-size: 1rem;
        transition: all 0.2s;
        min-height: 44px;
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
        margin-bottom: 0.5rem;
    }
    
    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
    
    .form-textarea {
        resize: none;
        min-height: 100px;
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
        margin: 2rem 0;
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
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12 md:py-16">
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
                <p class="text-slate-300 leading-relaxed mb-6 max-w-4xl" style="font-size: 1.12rem;">
                    By filling out this Immigration Pre-Assessment Form you will provide us information to access your eligibility to come and immigrate to Canada as a worker, student, investor or permanent resident. You will be required to provide details on your education, language skills, work experience and other factors considered by Immigration Canada to access candidates' eligibility.
                </p>
                
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
                
                <p class="text-slate-400 text-sm">We look forward to assisting you with your immigration matter.</p>
                <p class="text-white font-semibold mt-2">KGraph Immigration Services</p>
            </div>
        </div>
    </section>

    {{-- Form Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8 md:p-12">
                <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-200">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900">Immigration Pre-Assessment Form</h2>
                    <img class="h-12 md:h-16" src="{{ asset('assets/home_Banner/k-graph-logo-blue.png') }}" alt="K-Graph Logo">
                </div>
                
                <p class="text-slate-600 mb-8">
                    <strong>Note:</strong> In case you are filling out the form for a friend or sponsored person, please input the information of the person who wants to immigrate.
                </p>

                <form action="" class="contact-form" id="eligibility-form">
                    {{-- Personal Information Section --}}
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 pb-2 border-b border-slate-200">Personal Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="first-name" class="form-label">First Name <span class="text-red-500">*</span></label>
                                <input type="text" id="first-name" name="first_name" class="form-input" required>
                            </div>
                            <div>
                                <label for="last-name" class="form-label">Last Name <span class="text-red-500">*</span></label>
                                <input type="text" id="last-name" name="last_name" class="form-input" required>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
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
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="email" class="form-label">Email <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" class="form-input lowercase" required>
                            </div>
                            <div>
                                <label for="mobile" class="form-label">Mobile Number <span class="text-red-500">*</span></label>
                                <div class="flex items-center gap-2">
                                    <select name="country_live" id="country" class="form-select w-24 flex-shrink-0">
                                        <option selected value="+1">+1</option>
                                        <option value="+93">+93</option>
                                        <option value="+355">+355</option>
                                        <option value="+213">+213</option>
                                        <option value="+1684">+1684</option>
                                        <option value="+376">+376</option>
                                        <option value="+244">+244</option>
                                        <option value="+1264">+1264</option>
                                        <option value="+672">+672</option>
                                        <option value="+1268">+1268</option>
                                        <option value="+54">+54</option>
                                        <option value="+374">+374</option>
                                        <option value="+297">+297</option>
                                        <option value="+61">+61</option>
                                        <option value="+43">+43</option>
                                        <option value="+994">+994</option>
                                        <option value="+1242">+1242</option>
                                        <option value="+973">+973</option>
                                        <option value="+880">+880</option>
                                        <option value="+1246">+1246</option>
                                        <option value="+375">+375</option>
                                        <option value="+32">+32</option>
                                        <option value="+501">+501</option>
                                        <option value="+229">+229</option>
                                        <option value="+1441">+1441</option>
                                        <option value="+975">+975</option>
                                        <option value="+591">+591</option>
                                        <option value="+387">+387</option>
                                        <option value="+267">+267</option>
                                        <option value="+55">+55</option>
                                        <option value="+246">+246</option>
                                        <option value="+673">+673</option>
                                        <option value="+359">+359</option>
                                        <option value="+226">+226</option>
                                        <option value="+257">+257</option>
                                        <option value="+855">+855</option>
                                        <option value="+237">+237</option>
                                        <option value="+238">+238</option>
                                        <option value="+1345">+1345</option>
                                        <option value="+236">+236</option>
                                        <option value="+235">+235</option>
                                        <option value="+56">+56</option>
                                        <option value="+86">+86</option>
                                        <option value="+57">+57</option>
                                        <option value="+269">+269</option>
                                        <option value="+242">+242</option>
                                        <option value="+682">+682</option>
                                        <option value="+506">+506</option>
                                        <option value="+385">+385</option>
                                        <option value="+53">+53</option>
                                        <option value="+357">+357</option>
                                        <option value="+420">+420</option>
                                        <option value="+45">+45</option>
                                        <option value="+253">+253</option>
                                        <option value="+1767">+1767</option>
                                        <option value="+593">+593</option>
                                        <option value="+20">+20</option>
                                        <option value="+503">+503</option>
                                        <option value="+240">+240</option>
                                        <option value="+291">+291</option>
                                        <option value="+372">+372</option>
                                        <option value="+251">+251</option>
                                        <option value="+500">+500</option>
                                        <option value="+298">+298</option>
                                        <option value="+679">+679</option>
                                        <option value="+358">+358</option>
                                        <option value="+33">+33</option>
                                        <option value="+594">+594</option>
                                        <option value="+689">+689</option>
                                        <option value="+241">+241</option>
                                        <option value="+220">+220</option>
                                        <option value="+995">+995</option>
                                        <option value="+49">+49</option>
                                        <option value="+233">+233</option>
                                        <option value="+350">+350</option>
                                        <option value="+30">+30</option>
                                        <option value="+299">+299</option>
                                        <option value="+1473">+1473</option>
                                        <option value="+590">+590</option>
                                        <option value="+1671">+1671</option>
                                        <option value="+502">+502</option>
                                        <option value="+224">+224</option>
                                        <option value="+245">+245</option>
                                        <option value="+592">+592</option>
                                        <option value="+509">+509</option>
                                        <option value="+504">+504</option>
                                        <option value="+852">+852</option>
                                        <option value="+36">+36</option>
                                        <option value="+354">+354</option>
                                        <option value="+91">+91</option>
                                        <option value="+62">+62</option>
                                        <option value="+98">+98</option>
                                        <option value="+964">+964</option>
                                        <option value="+353">+353</option>
                                        <option value="+972">+972</option>
                                        <option value="+39">+39</option>
                                        <option value="+1876">+1876</option>
                                        <option value="+81">+81</option>
                                        <option value="+962">+962</option>
                                        <option value="+7">+7</option>
                                        <option value="+254">+254</option>
                                        <option value="+686">+686</option>
                                        <option value="+965">+965</option>
                                        <option value="+996">+996</option>
                                        <option value="+856">+856</option>
                                        <option value="+371">+371</option>
                                        <option value="+961">+961</option>
                                        <option value="+266">+266</option>
                                        <option value="+231">+231</option>
                                        <option value="+218">+218</option>
                                        <option value="+423">+423</option>
                                        <option value="+370">+370</option>
                                        <option value="+352">+352</option>
                                        <option value="+853">+853</option>
                                        <option value="+389">+389</option>
                                        <option value="+261">+261</option>
                                        <option value="+265">+265</option>
                                        <option value="+60">+60</option>
                                        <option value="+960">+960</option>
                                        <option value="+223">+223</option>
                                        <option value="+356">+356</option>
                                    </select>
                                    <input type="tel" id="mobile" name="mobile" placeholder="Enter your phone number" class="form-input flex-1" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 pb-2 border-b border-slate-200">Education & Qualifications</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
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
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 pb-2 border-b border-slate-200">Language Skills</h3>
                        
                        <div class="mb-6">
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

                        <div id="language-test" class="hidden mb-6">
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
                            <label class="form-label mb-4">Language Test Scores <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
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
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 pb-2 border-b border-slate-200">Work Experience</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 pb-2 border-b border-slate-200">Additional Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
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
                        
                        <div class="mb-6">
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
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
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
                    <div class="mt-12 mb-8">
                        <div class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 rounded-2xl p-8 md:p-12 shadow-2xl border border-blue-500/20">
                            <div class="max-w-3xl mx-auto">
                                {{-- Submit Button --}}
                                <div class="text-center mb-8">
                                    <button type="submit" class="group relative inline-flex items-center justify-center w-full md:w-auto px-10 md:px-16 py-4 md:py-5 bg-white text-blue-700 rounded-xl font-bold text-base md:text-lg hover:bg-blue-100 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 active:scale-100 border-2 border-transparent hover:border-blue-300">
                                        <span class="relative z-10 flex items-center space-x-2">
                                            <span class="group-hover:text-blue-800 transition-colors duration-300">SUBMIT FORM</span>
                                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                
                                {{-- Disclaimer Block --}}
                                <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 md:p-8 border border-white/30 shadow-lg">
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
</script>

@endsection
