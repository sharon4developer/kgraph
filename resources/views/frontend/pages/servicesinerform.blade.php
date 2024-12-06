@extends('layouts.main')
@section('content')
<style>@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap');</style>

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

        /* .contact-form div {
            margin-top: 0px;
            margin-bottom: 0px;
        } */

        .contact-form label {
            font-family: "Inter", sans-serif;
            font-weight: 400;
            font-size: 12px;
            color: #1E1E1E;
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
            border: 1px solid #C6C6C6;
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
        .date-input {
            position: relative;
            font-family: inherit;
            font-size: 1rem;
            padding: 0.5rem;
        }
        .date-input::placeholder {
            color: #a0a0a0;
        }
        .custom-placeholder::placeholder {
            color: #062358;
            font-weight: 500;
        }
        .font_syne{
            font-family: "Syne", serif;
        }

        @media (max-width: 1023px){
        .contact-form div {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        }
    </style>

    <div class="services-banner md:h-[50vh]">
        <div class="services-banner-overlay">
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                <div class="text-left text-white mt-10">
                    <div class="text-white text-[12px] font_inter font-semibold mt-[20px] mb-[6%]">
                        <a href="#">Study</a> > <a href="#">Study in Canada</a> > <a href="#">Immigration
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
                <p>K-graph Canadian Immigration Services</p>
            </div>
        </div>

        <div class="bg-white">
            <div class="container mx-auto px-5 lg:px-12 xl:px-32 h-full w-full py-8 md:pt-[15%] lg:pb-[4%] lg:pt-0">
                <div class="w-full py-2 mt-8 mb-4 flex justify-between items-center border-b border-b-[#062358] pt-14">
                    <h2 class="text-[#014598] font_inter text-[16px] md:text-[23px] font-extrabold font_inter capitalize">Immigration Pre-Assessment Form</h2>
                    <img class="w-[115px]" src="{{ asset('assets/home_Banner/k-graph-logo-blue.png') }}" alt="k-graph">
                </div>
                <p class="text-[#062358] lg:w-[55%] mb-6">In case you are filling out the form for a friend or sponsored person, please input the information of the person who wants to immigrate.</p>
            </div>
        </div>

        <form action="" class="contact-form bg-white" id="eligibility-form">
            <div class="container mx-auto px-5 lg:px-12 xl:px-32 h-full w-full py-8 md:pt-[15%] lg:pb-[4%] lg:pt-0">
                <div class="lg:grid grid-cols-[1fr_1fr_auto_1fr] gap-x-14 items-start">
                    <!-- First Name -->
                    <div class="flex flex-col">
                        <label for="first-name">First Name<span>*</span></label>
                        <input type="text" id="first-name" name="first_name" class="border rounded px-2 py-1 w-full">
                    </div>

                    <!-- Last Name -->
                    <div class="flex flex-col">
                        <label for="last-name">Last Name<span>*</span></label>
                        <input type="text" id="last-name" name="last_name" class="border rounded px-2 py-1 w-full">
                    </div>

                    <!-- Date of Birth -->
                    <div class="flex flex-col">
                        <label for="dob">Date of Birth<span>*</span></label>
                        <input type="date" id="dob" name="dob" value="2000-01-01" class="border rounded px-2 py-1 w-full">
                    </div>

                    <!-- Marital Status -->
                    <div class="flex flex-col">
                        <label for="marital-status">Marital Status<span>*</span></label>
                        <select id="marital-status" name="marital_status" class="border rounded px-2 py-1 w-full">
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

                <div class="lg:grid grid-cols-[1fr_1fr_auto_1fr] gap-x-14 lg:py-10">
                    <div class="flex flex-col">
                        <label for="email">Email<span>*</span></label>
                        <input type="email" class="lowercase" id="email" name="email">
                    </div>

                    <div class="flex flex-col">
                        <label for="mobile">Mobile Number<span>*</span></label>
                        <section class="flex items-center gap-2">
                            <input class="w-[40px] inline-block text-center" type="text" name="country" id="country" value="+21" >
                            <input type="tel" class="w-full" id="mobile" name="mobile" placeholder="Enter your phone number" >
                        </section>
                    </div>

                    <div class="hidden lg:flex flex-col invisible">
                        <label for="dob">Date of Birth<span>*</span></label>
                        <input type="date" id="d-ob" name="dob" value="2000-01-01" class="border rounded px-2 py-1 w-full">
                    </div>

                    <div class="hidden lg:flex flex-col invisible">
                        <label for="marital-status">Marital Status<span>*</span></label>
                        <select id="marital-status" name="maritalstatus" class="border rounded px-2 py-1 w-full">
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

                <div class="lg:grid grid-cols-[1fr_auto] gap-x-14">
                    <div class="flex flex-col w-full">
                        <label for="street-address-1">Address<span>*</span></label>
                        <input type="text" id="street-address-1" name="street_address">
                    </div>

                    <div class="flex flex-col">
                        <label for="city">Citizenship<span>*</span></label>
                        <input type="text" id="city" name="city">
                    </div>
                </div>

                <div class="hidden lg:block h-[2px] bg-[#D3D3D3] w-full lg:!mt-24 lg:!mb-12"></div>

                <div class="lg:grid grid-cols-2 gap-x-14">
                    <div class="flex flex-col lg:w-1/2">
                        <label for="highest-education-inside">Highest Level of Education<span>*</span></label>
                        <select id="highest-education-inside" name="highest_education_inside_can" class="border rounded px-2 py-1">
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
                        <label>Have you held a Canadian Education<span>*</span></label>
                        <div class="check-box-wrpr !mt-0">
                            <div class="!my-0">
                                <input type="radio" id="qualification-yes" name="certificate_of_qualification" value="Yes">
                                <label for="qualification-yes">Yes</label>
                            </div>
                            <div class="!my-0">
                                <input type="radio" id="qualification-no" name="certificate_of_qualification" value="No">
                                <label for="qualification-no">No</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="lg:grid grid-cols-3 items-start gap-x-14 lg:py-10">
                    <div>
                        <label>Do you have a valid Language Skills Test Result</label>
                        <div id="language-skills" class="check-box-wrpr !mt-0">
                            <div class="!my-0">
                                <input type="radio" id="qualification-yes" name="country_of_studies" value="Yes">
                                <label for="qualification-yes">Yes</label>
                            </div>
                            <div class="!my-0">
                                <input type="radio" id="qualification-no" name="country_of_studies" value="No">
                                <label for="qualification-no">No</label>
                            </div>
                        </div>
                    </div>

                    <div id="language-test" class="hidden flex-col w-full bg-[#EDEDED] h-full py-4 px-3">
                        <label for="which-lang">Which language test did you take?<span>*</span></label>
                        <select id="which-lang" name="language_test" class="border rounded px-2 py-1">
                            <option value="" disabled selected>Select</option>
                            <option value="CELPIP-G">CELPIP-G</option>
                            <option value="IELTS">IELTS</option>
                            <option value="PTE Core">PTE Core</option>
                            <option value="TEF Canada">TEF Canada</option>
                            <option value="TCF Canada">TCF Canada</option>
                        </select>
                    </div>

                    <div id="language-scores" class="hidden flex-col bg-[#EDEDED] h-full py-4 px-3">
                        <label for="scores" class="invisible">If selected any of the above, show the below text boxes<span>*</span></label>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="number" id="speaking" name="speaking" class="w-full" placeholder="Speaking">
                            <input type="number" id="reading" name="reading" class="w-full" placeholder="Reading">
                            <input type="number" id="listening" name="listening" class="w-full" placeholder="Listening">
                            <input type="number" id="writing" name="writing" class="w-full" placeholder="Writing">
                        </div>
                    </div>
                </div>

                <div class="lg:grid grid-cols-3 gap-[53px] lg:!mb-12">
                    <div class="flex flex-col w-full">
                        <label for="state">Canadian Experience<span>*</span></label>
                        <select id="state" name="state" class="border rounded px-2 py-1">
                            <option value="" disabled selected>Select your Canadian Experience</option>
                            <option value="0 year">0 year</option>
                            <option value="1 year">1 year</option>
                            <option value="2 years">2 years</option>
                            <option value="3 years">3 years</option>
                        </select>
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="zip">Foreign Experience<span>*</span></label>
                        <select id="zip" name="zip" class="border rounded px-2 py-1">
                            <option value="" disabled selected>Select your Foreign Experience</option>
                            <option value="0 year">0 year</option>
                            <option value="1 year">1 year</option>
                            <option value="2 years">2 years</option>
                            <option value="3 years">3 years</option>
                        </select>
                    </div>
                </div>

                <div class="lg:grid grid-cols-[auto_auto_1fr_1fr] gap-[53px]">
                    <div>
                        <label>Any Previous Visa Refusal<span>*</span></label>
                        <div class="check-box-wrpr !mt-0">
                            <div class="!my-0">
                                <input type="radio" id="qualification-yes" name="refused_or_cancelled_visa" value="Yes">
                                <label for="qualification-yes">Yes</label>
                            </div>
                            <div class="!my-0">
                                <input type="radio" id="qualification-no" name="refused_or_cancelled_visa" value="No">
                                <label for="qualification-no">No</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Do you have any criminal record(s) in your home country or any other country<span>*</span></label>
                        <div class="check-box-wrpr !mt-0">
                            <div class="!my-0">
                                <input type="radio" id="qualification-yes" name="criminal_record" value="Yes">
                                <label for="qualification-yes">Yes</label>
                            </div>
                            <div class="!my-0">
                                <input type="radio" id="qualification-no" name="criminal_record" value="No">
                                <label for="qualification-no">No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:grid grid-cols-2 lg:pt-10">
                    <div>
                        <label>Do you or your spouse or common-law partner have a blood relative living in
                            Canada who is a citizen or a permanent resident of Canada<span>*</span></label>
                        <div class="check-box-wrpr !mt-0">
                            <div class="!my-0">
                                <input type="radio" id="qualification-yes" name="family_relations_in_canada" value="Yes">
                                <label for="qualification-yes">Yes</label>
                            </div>
                            <div class="!my-0">
                                <input type="radio" id="qualification-no" name="family_relations_in_canada" value="No">
                                <label for="qualification-no">No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:py-10">
                    <div class="flex flex-col lg:w-1/4">
                        <label for="hear-about-us">How Did You Hear About Us<span>*</span></label>
                        <select id="hear-about-us" name="hear_about_canada" class="border rounded px-2 py-1">
                            <option value="" disabled selected>Select an option</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Google Search">Google Search</option>
                            <option value="Friend Family">Friend/Family</option>
                            <option value="Advertisement">Advertisement</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                </div>

                <div class="lg:py-10">
                    <div class="flex flex-col lg:w-1/4">
                        <label for="birth-country">Any Additional Information<span>*</span></label>
                        <textarea rows="4" cols="50" class="!h-44 scrollbar-hidden"></textarea>
                    </div>
                </div>
            </div>

            <div class=" bg-gradient-to-r from-black to-transparent ">
                <div class="submit-btn container mx-auto px-5 lg:px-12 xl:px-32 h-full w-full">
                    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[2%] mt-[-50px]">
                        <button class="font_syne my-4 text-white border border-white rounded-full w-full lg:w-fit lg:px-16 py-2 text-[14px] lg:text-base  hover:bg-white hover:border-black hover:text-black ease-linear duration-300 font-bold" style="">SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    @include('frontend.Common.getintouch')
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
                        languageTestDiv.classList.add('flex');
                    } else {
                        languageTestDiv.classList.add('hidden');
                        languageTestDiv.classList.remove('flex');
                        languageScoresDiv.classList.add('hidden');
                        languageScoresDiv.classList.remove('flex');
                    }
                });
            });

            languageTestSelect.addEventListener('change', () => {
                if (languageTestSelect.value) {
                    languageScoresDiv.classList.remove('hidden');
                    languageScoresDiv.classList.add('flex');
                } else {
                    languageScoresDiv.classList.add('hidden');
                    languageScoresDiv.classList.remove('flex');
                }
            });
        });
    </script>

    <script>
        const countryInput = document.getElementById('country');
        const defaultCountryCode = '+91';
        countryInput.value = defaultCountryCode;
        countryInput.addEventListener('input', (e) => {
            if (!/^\+\d+$/.test(e.target.value)) {
                alert('Country code must start with a "+" followed by numbers.');
                e.target.value = defaultCountryCode;
            }
        });
  </script>

@endsection
