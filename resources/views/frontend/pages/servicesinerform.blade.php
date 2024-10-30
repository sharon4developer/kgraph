@extends('layouts.main')
@section('content')
    <style>
        .services-grade {
            background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
        }

        .services-form-contnt-wrpr p {
            color: white;
            margin-bottom: 25px;
            font-weight: 300;
            font-size: 13px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .contact-form div {
            margin-top: 16px;
            margin-bottom: 16px;
        }

        .contact-form label {
            font-family: "Inter", sans-serif;
            font-weight: 400;
            font-size: 12px;
            color: white;
            text-transform: capitalize;
        }

        .contact-form input,
        .contact-form select,
        .contact-form textarea {
            font-family: "Inter", sans-serif;
            font-weight: 400;
            font-size: 12px;
            color: black;
            text-transform: capitalize;
            background: white;
            border: 2px solid #D1D6DC;
            border-radius: 3px;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 5px;
            padding-right: 5px;
            height: 35px;
            margin-top: 5px;
        }

        .contact-form input:focus-visible,
        .contact-form select:focus-visible,
        .contact-form textarea:focus-visible {
            outline: 1px solid blue;
        }

        .contact-form span {
            color: red;
        }

        .check-box-wrpr>div {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .check-box-wrpr>div label {
            margin-bottom: -5px;
        }

        .heading-in-form {
            font-family: "Inter", sans-serif;
            font-weight: 600;
            font-size: 18px;
            color: white;
        }
    </style>

    {{-- services banner --}}
    <div class="services-banner md:h-[50vh]">
        <div class="services-banner-overlay">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                <div class="text-left text-white mt-10">
                    <div class="text-white text-[12px] font_inter font-semibold mt-[20px] mb-[6%]">
                        <a href="#">Study</a> > <a href="#">Study in Canada</a> > <a href="#">Immegration
                            Enquiry</a>
                    </div>
                    <h1 class="uppercase font_inter font-semibold text-[40px]">Immigration Pre-Assessment</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="services-inner-form bg-[#062358]">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[4%]">
            <div class="services-form-contnt-wrpr lg:w-[70%]">
                <p>
                    By filling out this Immigration Pre-Assessment Form you will provide us information to access your
                    eligibility to come and
                    immigrate to Canada as a worker, student, investor or permanent resident. You will be required to
                    provide details on your
                    education, language skills, work experience and other factors considered by Immigration Canada to access
                    candidates'
                    eligibility.
                </p>
                <p>We respect your privacy. Your personal information will not be released to any third party.</p>
                <p>The Pre-Assessment is free. If you need a consultation with our immigration consultant, charges apply.
                </p>
                <p>We will contact you via email within 3 business days after you submit the form. If you do not hear from
                    us after that period,
                    please check your junk/spam emails.</p>
                <p>We look forward to assisting you with your immigration matter.</p>
                <p>CanDo Canadian Immigration Services</p>
            </div>
        </div>
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:pb-[4%] lg:pt-0">
            <div class="services-grade w-full py-2 rounded-md my-8">
                <h2 class="text-[#072459] font_inter text-[16px] md:text-[20px] pl-4 font-extrabold capitalize">Immigration
                    Pre-Assessment Form</h2>
            </div>

            <img class="w-[115px]" src="{{ asset('assets/k-graph-logo.png') }}" alt="k-graph">
            <p class="text-white lg:w-[55%] my-6">In case you are filling out the form for a friend or sponsored person,
                please input the information of the
                person who wants to immigrate.</p>
            <div class="lg:w-1/2">
                <h2 class="text-white my-6 font_inter font-medium text-[30px]">Contact Information</h2>
                <form action="" class="contact-form" id="eligibility-form">
                    <div class="flex flex-col">
                        <label for="first-name">First Name<span>*</span></label>
                        <input type="text" id="first-name" name="first_name">
                    </div>

                    <div class="flex flex-col">
                        <label for="last-name">Last Name<span>*</span></label>
                        <input type="text" id="last-name" name="last_name">
                    </div>

                    <div class="flex flex-col">
                        <label for="email">Email<span>*</span></label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="flex flex-col">
                        <label for="street-address-1">Street Address<span>*</span></label>
                        <input type="text" id="street-address-1" name="street_address">
                    </div>

                    <div class="flex flex-col">
                        <label for="city">City<span>*</span></label>
                        <input type="text" id="city" name="city">
                    </div>

                    <div class="flex flex-col">
                        <label for="state">State/Province<span>*</span></label>
                        <input type="text" id="state" name="state">
                    </div>

                    <div class="flex flex-col">
                        <label for="zip">Zip/Postal Code</label>
                        <input type="text" id="zip" name="zip">
                    </div>

                    <div class="flex flex-col">
                        <label for="current-country">Country where you currently live<span>*</span></label>
                        <input type="text" id="current-country" name="country_live">
                    </div>

                    <div class="flex flex-col">
                        <label for="birth-country">Country where you were born<span>*</span></label>
                        <input type="text" id="birth-country" name="country_born">
                    </div>

                    <div class="flex flex-col">
                        <label for="mobile">Mobile Number<span>*</span></label>
                        <input type="tel" id="mobile" name="mobile">
                    </div>

                    <div class="flex flex-col">
                        <label for="dob">Date of Birth<span>*</span></label>
                        <input type="date" id="dob" name="dob">
                    </div>

                    <div class="flex flex-col">
                        <label for="marital-status">Marital Status<span>*</span></label>
                        <input type="text" id="marital-status" name="marital_status">
                    </div>

                    <div class="flex flex-col">
                        <label>Do you have children?<span>*</span></label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="children-yes" name="have_children" value="yes">
                                <label for="children-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="children-no" name="have_children" value="no">
                                <label for="children-no">No</label>
                            </div>
                        </div>
                    </div>


                    <div class="flex flex-col">
                        <label for="hear-about">How did you hear about CANADA?</label>
                        <select id="hear-about" name="hear_about_canada">
                            <option value="Select">Select</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label>Type of application you are looking for:<span>*</span></label>
                        <div class="check-box-wrpr">
                            <div>
                                <input type="radio" id="study" name="type_of_application" value="study">
                                <label for="study">Study in Canada</label>
                            </div>
                            <div>
                                <input type="radio" id="work" name="type_of_application" value="work">
                                <label for="work">Work in Canada</label>
                            </div>
                            <div>
                                <input type="radio" id="invest" name="type_of_application" value="invest">
                                <label for="invest">Invest in Canada</label>
                            </div>
                            <div>
                                <input type="radio" id="visit" name="type_of_application" value="visit">
                                <label for="visit">Visit Canada</label>
                            </div>
                            <div>
                                <input type="radio" id="express-entry" name="type_of_application"
                                    value="express-entry">
                                <label for="express-entry">Apply for Permanent Residency via Express Entry</label>
                            </div>
                            <div>
                                <input type="radio" id="sponsorship" name="type_of_application" value="sponsorship">
                                <label for="sponsorship">Apply for Permanent Residency via Sponsorship</label>
                            </div>
                            <div>
                                <input type="radio" id="extend-stay" name="type_of_application" value="extend-stay">
                                <label for="extend-stay">Extend your stay in Canada</label>
                            </div>
                            <div>
                                <input type="radio" id="citizenship" name="type_of_application" value="citizenship">
                                <label for="citizenship">Apply for Citizenship</label>
                            </div>
                            <div>
                                <input type="radio" id="other" name="type_of_application" value="other">
                                <label for="other">Other</label>
                            </div>
                        </div>
                    </div>



                    <div class="flex flex-col">
                        <label for="further-info">Further Information</label>
                        <textarea id="further-info" name="further_info"></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label for="funds">Funds available to invest in your plan to immigrate to Canada</label>
                        <select id="funds" name="funds_available">
                            <option value="Select">Select</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <!-- Education Section -->
                    <h2 class="heading-in-form">Education</h2>

                    <div class="flex flex-col">
                        <label for="highest-education-outside">Highest Level of Education - Outside
                            Canada<span>*</span></label>
                        <select id="highest-education-outside" name="highest_education_outside_can">
                            <option value="Select">Select</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="country-studies">Country of Studies<span>*</span></label>
                        <select id="country-studies" name="country_of_studies">
                            <option value="Select">Select</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="highest-education-inside">Highest Level of Education - Inside Canada</label>
                        <select id="highest-education-inside" name="highest_education_inside_can">
                            <option value="does-not-apply">Does not apply</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <!-- Language Skills Section -->
                    <h2 class="heading-in-form">Language Skills</h2>

                    <div class="flex flex-col">
                        <label for="english-level">Language Level - English<span>*</span></label>
                        <select id="english-level" name="language_level_english">
                            <option value="Select">Select</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label>Have you taken an English language test (IELTS, CELPIP, PTE, or
                            Duolingo)?<span>*</span></label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="english-test-yes" name="english_language_test">
                                <label for="english-test-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="english-test-no" name="english_language_test">
                                <label for="english-test-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="french-level">Language Level - French</label>
                        <select id="french-level" name="language_level_french">
                            <option value="Select">Select</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label>Have you taken a French language test (TEF, TEF Canada, or TCF Canada)?<span>*</span></label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="french-test-yes" name="french_language_test">
                                <label for="french-test-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="french-test-no" name="french_language_test">
                                <label for="french-test-no">No</label>
                            </div>
                        </div>
                    </div>
                    <!-- Work and Employment -->
                    <h2 class="heading-in-form pb-6">Work and Employment</h2>

                    <!-- Work in Canada -->
                    <h4 class="font_arial font-bold text-[12px] text-white">Work in Canada</h4>

                    <h6 class="text-white text-[12px] font-light py-3">*Important: If you are interested in working in
                        Canada, please attach below your updated resume in English, showing your complete work experience
                        and education.</h6>
                    <h6 class="text-white text-[12px] font-light pb-3">If the resume is missing or does not meet the
                        requirements above, we will not process your pre-assessment.</h6>

                    <div class="flex flex-col">
                        <label for="resume">Please attach your updated resume/CV in English*</label>
                        <input type="file" id="resume" name="resume"
                            accept=".pdf, image/jpeg, image/png, image/jpg">
                    </div>

                    <div class="flex flex-col">
                        <label for="occupation-industry">Main Occupation Industry*</label>
                        <input type="text" id="occupation-industry" name="main_industry">
                    </div>

                    <div class="flex flex-col">
                        <label for="outside-canada-work">Outside Canada - Work Experience*</label>
                        <select id="outside-canada-work" name="work_exp_outside_can">
                            <option value="Select">Please Select</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="inside-canada-work">Inside Canada - Work Experience*</label>
                        <input type="text" id="inside-canada-work"
                            placeholder="If you don't have any experience working in Canada, please select 'Does Not Apply'."
                            name="work_exp_inside_can">
                    </div>

                    <div>
                        <label>Are you legally entitled to work in that country?</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="legally-entitled-yes" name="entitled_to_work">
                                <label for="legally-entitled-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="legally-entitled-no" name="entitled_to_work">
                                <label for="legally-entitled-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Do you own/manage a business?</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="manage-business-yes" name="manage_business">
                                <label for="manage-business-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="manage-business-no" name="manage_business">
                                <label for="manage-business-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Have you been in Canada as a temporary foreign worker?</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="foreign-worker-yes" name="temporary_foreign_worker">
                                <label for="foreign-worker-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="foreign-worker-no" name="temporary_foreign_worker">
                                <label for="foreign-worker-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Do you have a certificate of qualification in a trade occupation issued by a Canadian
                            Province?</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="qualification-yes" name="certificate_of_qualification">
                                <label for="qualification-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="qualification-no" name="certificate_of_qualification">
                                <label for="qualification-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Do you have a job offer from a Canadian employer?</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="job-offer-yes" name="job_offer">
                                <label for="job-offer-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="job-offer-no" name="job_offer">
                                <label for="job-offer-no">No</label>
                            </div>
                        </div>
                    </div>

                    <!-- Family Relations in Canada -->
                    <h2 class="heading-in-form">Family Relations in Canada</h2>

                    <div>
                        <label>Do you or, if applicable, your accompanying spouse or common-law partner have a blood
                            relative living in Canada who is a citizen or a permanent resident of Canada?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="relative-in-canada-yes" name="family_relations_in_canada">
                                <label for="relative-in-canada-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="relative-in-canada-no" name="family_relations_in_canada">
                                <label for="relative-in-canada-no">No</label>
                            </div>
                        </div>
                    </div>

                    <!-- Immigration History -->
                    <h2 class="heading-in-form">Immigration History</h2>

                    <div>
                        <label>Have you been REFUSED or CANCELLED a visa or permit or any immigration application to Canada,
                            USA, or any other country?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="visa-refused-yes" name="refused_or_cancelled_visa">
                                <label for="visa-refused-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="visa-refused-no" name="refused_or_cancelled_visa">
                                <label for="visa-refused-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Have you been REFUSED admission to, ORDERED to leave, or DEPORTED from Canada, USA, or any
                            other country? This includes a border officer taking away your visa?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="deported-yes" name="refused_admission">
                                <label for="deported-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="deported-no" name="refused_admission">
                                <label for="deported-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Have you or your spouse/partner been to Canada?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="been-to-canada-yes" name="partner_been_to_canada">
                                <label for="been-to-canada-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="been-to-canada-no" name="partner_been_to_canada">
                                <label for="been-to-canada-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Have you overstayed in any country you were living or visiting (stayed with an expired visa
                            or permit)?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="overstayed-yes" name="overstayed_in_any_country">
                                <label for="overstayed-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="overstayed-no" name="overstayed_in_any_country">
                                <label for="overstayed-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Have you or your spouse/partner previously applied for a visa/permit to Canada?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="previously-applied-yes"
                                    name="partner_previously_applied_for_visa">
                                <label for="previously-applied-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="previously-applied-no"
                                    name="partner_previously_applied_for_visa">
                                <label for="previously-applied-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Have you or your spouse/partner previously submitted an application for Canadian permanent
                            residency?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="permanent-residency-yes"
                                    name="partner_previously_submitted_an_application">
                                <label for="permanent-residency-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="permanent-residency-no"
                                    name="partner_previously_submitted_an_application">
                                <label for="permanent-residency-no">No</label>
                            </div>
                        </div>
                    </div>

                    <!-- Criminal Record and Other Information -->
                    <h2 class="heading-in-form">Criminal Record</h2>

                    <div>
                        <label>Do you have any criminal record(s) in your home country or any other country you visited or
                            lived in the last 10 years?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="criminal-record-yes" name="criminal_record">
                                <label for="criminal-record-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="criminal-record-no" name="criminal_record">
                                <label for="criminal-record-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Have you ever committed, been arrested for or been charged with or convicted of any CRIMINAL
                            OFFENCE in any country or territory?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="criminal-offence-yes" name="arrested">
                                <label for="criminal-offence-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="criminal-offence-no" name="arrested">
                                <label for="criminal-offence-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Have you been detained, incarcerated, or PUT IN JAIL?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="detained-yes" name="detained">
                                <label for="detained-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="detained-no" name="detained">
                                <label for="detained-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>Do you have a nomination certificate from a Canadian Province (except Quebec)?*</label>
                        <div class="check-box-wrpr !mt-0">
                            <div>
                                <input type="radio" id="nomination-certificate-yes" name="nomination_certificate">
                                <label for="nomination-certificate-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="nomination-certificate-no" name="nomination_certificate">
                                <label for="nomination-certificate-no">No</label>
                            </div>
                        </div>
                    </div>

                    <!-- Privacy and Consent Section -->
                    <div class="flex flex-col">
                        {{-- <label for="outside-canada-work">Outside Canada - Work Experience*</label> --}}
                        <select id="outside-canada-work">
                            <option value="">Please Select</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <p class="text-white font_arial text-[14px] font-normal pb-6">CanDo Immigration is committed to
                        protecting and respecting your privacy, and we’ll only use your personal information to administer
                        your account and to provide the products
                        and services you requested from us. From time to time, we would like to contact you about our
                        products and services, as well as other content that may be of interest to you. If you
                        consent to us contacting you for this purpose, please tick below to say how you would like us to
                        contact you:</p>

                    <div class="check-box-wrpr !mt-0">
                        <div>
                            <input type="radio" id="receive-communications" name="receive_communications">
                            <label for="receive-communications">I agree to receive other communications from CanDo
                                Immigration.</label>
                        </div>
                        <div>
                            <input type="radio" id="consent-data" name="consent_data">
                            <label for="consent-data">I agree to allow CanDo Immigration to store and process my personal
                                data.</label>
                        </div>
                    </div>

                    <div class="submit-btn bg-[black]">
                        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[2%] mt-[-50px]">
                            <button
                                class="my-4 text-white border border-white rounded-full w-full lg:w-fit lg:px-16 py-2 text-[14px] hover:bg-white hover:border-black hover:text-black ease-linear duration-300 hover:font-semibold">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('frontend.Common.getintouch')
@endsection
