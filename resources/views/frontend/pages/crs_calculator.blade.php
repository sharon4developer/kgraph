@extends('layouts.main')
@section('content')


    <style>


/* Calculator Container */
.calculator {
  max-width: 800px;
  margin: 0 auto;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

/* Section Styling */
.section {
  padding: 20px;
  border-bottom: 1px solid #eee;
}
.section:last-child {
  border-bottom: none;
}
.section h2 {
  margin: 0 0 15px;
  font-size: 1.25rem;
  color: #1a202c;
}

/* Form Grid Layout */
.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}
.form-grid .full {
  grid-column: span 2;
}

/* Form Group */
.form-group {
  display: flex;
  flex-direction: column;
}
.form-group label {
  margin-bottom: 5px;
  font-weight: 600;
  color: #4a5568;
}
.form-group select,
.form-group input {
  padding: 8px;
  border: 1px solid #cbd5e0;
  border-radius: 4px;
  font-size: 1rem;
}
.form-group input[type="number"] {
  -moz-appearance: textfield;
}

/* Checkbox Group */
.checkbox-group {
  display: flex;
  align-items: center;
  gap: 8px;
  margin: 15px 0;
}
.checkbox-group label {
  font-size: 1rem;
  color: #4a5568;
}

/* Score Display */
#scoreDisplay {
  text-align: center;
  padding: 20px;
  font-size: 1.5rem;
  background: #e9f7ef;
  margin: 0;
  color: #2f855a;
}



        .servicesIIner-banner {
            background-image: url(/assets/servicesinner.jpg) !important;
            /* background-position-y: center;
                                                                                                                                                                    background-position-x: center; */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .services-banner-overlay {
            background: linear-gradient(180deg, #000000 0%, #113165ab 100%);
            height: 100%;
        }


 


        .tab-name {
            position: relative;
            cursor: pointer;
            padding-bottom: 0.5rem;
        }

        .tab-name.active {
            font-weight: bold;
            color: #000000;
            /* background-color: aliceblue; */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tab-names {
            display: flex;
            position: relative;
            /* border-bottom: 2px solid rgba(255, 255, 255, 0.2); */
        }

        .tab-indicator {
            position: absolute;
            height: 2px;
            /* background-color: white; */
            transition: left 0.3s ease, width 0.3s ease;
        }

        .tab-content {
            display: none;
            /* opacity: 0;  */
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .tab-content.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        ul.tabs {
            margin: 0px;
            padding: 0px;
            list-style: none;
        }

        ul.tabs li {
            color: #ededed;
            background: #04152f;
            border-radius: 30px;
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
        }

        ul.tabs li.current {
            font-weight: 800;
            color: #062358;
        }

        .center-position{
          display: flex;
          justify-content: center; /* horizontal centering */
          align-items: center;
        }


        @media (max-width: 1023px) {
            .tab-names ul.tabs li {
                white-space: nowrap;
                /* font-size: 10px; */
            }

            .tab-names ul.tabs {
                display: flex;
                overflow: scroll;
                padding-right: 6px;
            }
        }

    </style>



    {{-- services banner --}}
    <div class="relative h-full servicesIIner-banner">
        <!-- Background Image -->
        
                                      
        <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . 'crs_cal_banner.png' }}"
            alt="Background Image" class="absolute inset-0 z-0 object-cover w-full h-full">


        <div class="relative z-10 h-full bg-black bg-opacity-50 services-banner-overlay">
            <!-- Overlay for better contrast -->
            <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
                
                <div class="flex flex-col items-center justify-center my-10 text-center text-white">
                    <h1 class="uppercase font_inter font-semibold text-3xl lg:text-[40px]">CRS Calculator</h1>
                    <p class="lg:w-1/2 mt-5 font_inter font-semibold text-sm lg:text-[16px]">
                        This tool will help you calculate your Comprehensive Ranking System (CRS)
                    </p>
                </div>
            </div>
        </div>
    </div>

    

    {{-- tab section --}}
    <div class="tabsection bg-[#062358] overflow-hidden">
        <div class="container flex flex-col items-start justify-center w-full h-full px-5 py-8 mx-auto text-white lg:px-12 center-position">
            <!-- Tab Names -->
            <div class="tab-names flex flex-col relative  max-w-[100vw] scrollbar-hidden">
                <ul class="flex-wrap items-center gap-3 tabs scrollbar-hidden lg:flex">
                  <li>Core / Human Capital Factors</li>
                  <li>Spouse or Common-Law Partner Factors</li>
                  <li>Skills Transferability Factors</li>
                  <li>Additional Points</li>
                </ul>
            </div>
        </div>
    </div>



    {{-- Calculator --}}
    <div class="faq bg-[#062358]">


        <div class="faq-section bg-[#F7FCFF]">
            <div class="container w-full h-full px-5 py-8 mx-auto xl:px-12 lg:py-16">
                <div class="flex items-center justify-center">
                    {{-- Calculator HTML --}}

                    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow">

                        <!-- 1. Core / Human Capital Factors -->
                        <section class="p-6 border-b">
                          <h2 class="text-xl font-semibold mb-4">1. Core / Human Capital Factors</h2>
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                              <label for="age" class="block mb-1 font-medium">Age</label>
                              <select id="age" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select your age</option>
                                <option value="17">17 or less</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20-29">20–29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45+">45 or more</option>
                              </select>
                            </div>
                            <div>
                              <label for="education" class="block mb-1 font-medium">Level of Education</label>
                              <select id="education" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select education</option>
                                <option value="less_secondary">Less than secondary school</option>
                                <option value="secondary">Secondary diploma</option>
                                <option value="one_year">One-year post-secondary</option>
                                <option value="two_year">Two-year post-secondary</option>
                                <option value="bachelors">Bachelor’s degree or three-year post-secondary</option>
                                <option value="two_certificate">Two or More Certificates. One must be 3+ years</option>
                                <option value="masters">Master’s degree or professional degree</option>
                                <option value="doctoral">Doctoral (PhD) level</option>
                              </select>
                            </div>
                            <div>
                              <label for="lang1" class="block mb-1 font-medium">First Official Language (CLB)</label>
                              <select id="lang1" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select CLB level</option>
                                <option value="4">CLB 4 or less</option>
                                <option value="5">CLB 5</option>
                                <option value="6">CLB 6</option>
                                <option value="7">CLB 7</option>
                                <option value="8">CLB 8</option>
                                <option value="9">CLB 9</option>
                                <option value="10">CLB 10 or higher</option>
                              </select>
                            </div>
                            <div>
                              <label for="lang2" class="block mb-1 font-medium">Second Official Language (CLB)</label>
                              <select id="lang2" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select CLB level</option>
                                <option value="4">None or less than CLB 5</option>
                                <option value="5-6">CLB 5-6</option>
                                <option value="7-8">CLB 7-8</option>
                                <option value="9+">CLB  9 Plus</option>
                              </select>
                            </div>
                            <div class="md:col-span-2">
                              <label for="canExp" class="block mb-1 font-medium">Canadian Work Experience (years)</label>
                              <input id="canExp" type="number" min="0" max="10" step="1" class="w-full border rounded p-2" placeholder="0–10+">
                            </div>

                            <div class="md:col-span-2">
                              <label for="foreignExp" class="block mb-1 font-medium">Foreign Work Experience (years)</label>
                              <input id="foreignExp" type="number" min="0" max="10" step="1" class="w-full border rounded p-2" placeholder="0–10+">
                            </div>


                          </div>
                        </section>

                        <!-- 2. Spouse / Common-Law Partner Factors -->
                        <section class="p-6 border-b">
                          <h2 class="text-xl font-semibold mb-4">2. Spouse or Common-Law Partner Factors</h2>
                          <div class="flex items-center mb-4">
                            <input id="hasSpouse" type="checkbox" class="mr-2">
                            <label for="hasSpouse" class="font-medium">Include spouse / partner factors</label>
                          </div>
                          <div id="spouseSection" class="hidden space-y-4">
                            <div>
                              <label for="spEducation" class="block mb-1 font-medium">Spouse’s Level of Education</label>
                              <select id="spEducation" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select education</option>
                                <option value="less_secondary">Less than secondary school</option>
                                <option value="secondary">Secondary diploma</option>
                                <option value="one_year">One-year post-secondary</option>
                                <option value="two_year">Two-year post-secondary</option>
                                <option value="bachelors">Bachelor’s degree or three-year post-secondary</option>
                                <option value="masters">Master’s degree or professional degree</option>
                                <option value="doctoral">Doctoral (PhD) level</option>
                              </select>
                            </div>
                            <div>
                              <label for="spLang" class="block mb-1 font-medium">Spouse’s Language Proficiency (CLB)</label>
                              <select id="spLang" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select CLB level</option>
                                <option value="4">CLB 4 or less</option>
                                <option value="5">CLB 5 or 6</option>
                                <option value="7">CLB 7 or 8</option>
                                <option value="9">CLB 9 or higher</option>
                              </select>
                            </div>
                            <div>
                              <label for="spCanExp" class="block mb-1 font-medium">Spouse’s Canadian Work Experience (years)</label>
                              <input id="spCanExp" type="number" min="0" max="10" step="1" class="w-full border rounded p-2" placeholder="0–10+">
                            </div>
                          </div>
                        </section>

                        <!-- 3. Skills Transferability Factors -->
                        <section class="p-6 border-b">
                          <h2 class="text-xl font-semibold mb-4">3. Skills Transferability Factors</h2>
                          <div class="grid grid-cols-1 gap-4">

                            {{--
                            <div>
                              <label for="tranEduLang" class="block mb-1 font-medium">Education & Language</label>
                              <select id="tranEduLang" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select combination</option>
                                <option value="0">No combination</option>
                                <option value="50">Education + CLB 7+</option>
                                <option value="25">Education + CLB 9+</option>
                              </select>
                            </div>
                            <div>
                              <label for="tranWorkLang" class="block mb-1 font-medium">Foreign Work Experience & Language</label>
                              <select id="tranWorkLang" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select combination</option>
                                <option value="0">No combination</option>
                                <option value="50">Foreign exp + CLB 7+</option>
                                <option value="25">Foreign exp + CLB 9+</option>
                              </select>
                            </div>
                            <div>
                              <label for="tranCanEdu" class="block mb-1 font-medium">Canadian Work Experience & Education</label>
                              <select id="tranCanEdu" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select combination</option>
                                <option value="0">No combination</option>
                                <option value="50">Cdn exp + post‑sec edu</option>
                              </select>
                            </div>
                            --}}
                            <div>
                              <label for="tranCert" class="block mb-1 font-medium">Certificate of Qualification (Trade)</label>
                              <select id="tranCert" class="w-full border rounded p-2">
                                <option value="0" disabled selected>Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                            </div>
                          </div>
                        </section> 

                        <!-- 4. Additional Points -->
                        <section class="p-6">
                          <h2 class="text-xl font-semibold mb-4">4. Additional Points</h2>
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                              <label for="pnp" class="block mb-1 font-medium">Provincial Nomination</label>
                              <select id="pnp" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select option</option>
                                <option value="0">No</option>
                                <option value="600">Yes</option>
                              </select>
                            </div>
                            <div>
                              <label for="postSecEdu" class="block mb-1 font-medium">Post-secondary education in Canada</label>
                              <select id="postSecEdu" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select option</option>
                                <option value="0">None</option>
                                <option value="15">One or Two-year</option>
                                <option value="30">Three years or Longer</option>
                              </select>
                            </div>
                            <div>
                              <label for="french" class="block mb-1 font-medium">French Language Proficiency</label>
                              <select id="french" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select CLB</option>
                                <option value="0">Below CLB 7</option>
                                <option value="7">CLB 7+</option>
                              </select>
                            </div>
                            <div>
                              <label for="sibling" class="block mb-1 font-medium">Sibling in Canada</label>
                              <select id="sibling" class="w-full border rounded p-2">
                                <option value="" disabled selected>Select option</option>
                                <option value="0">No</option>
                                <option value="15">Yes</option>
                              </select>
                            </div>
                          </div>
                        </section>

                    </div>
                    {{-- Calculator HTML Ends--}}
                </div>
                <div class="text-center space-y-4">
                  <div id="scoreDisplay" class="text-2xl font-bold">Score: 0 / 1200</div>
                </div>

            </div>
        </div>
    </div>





    {{-- get in touch section --}}
    @include('frontend.Common.getintouch')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>

    </script>

    {{-- <script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>
        
    </script>


<script src="{{ asset('frontend/js/crs_calculator.js') }}"></script>

@endsection
