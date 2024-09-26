@extends('layouts.main')
@section('content')
<style>
 .contact-US{
    background: linear-gradient(180deg, #02050B 20.98%, rgba(0, 0, 0, 0) 302.7%);
    z-index: 1;
    position: relative;
 }
 .contact-US-banner{
    background-image: url(assets/home_Banner/contactUsbackground.png) !important;
    background-repeat: no-repeat;
    background-position-y: center;
    background-size: cover;
    /* z-index: -1; */
    position: relative;
 }
 .canada-flag{
    position: relative;
 }
 .canada-flag::after{
    content: "";
    /* display: block; */
    position: absolute;
    right: 10%;
    top: -10px;
    width: 100px;
    height: 100px;
    background-image: url(assets/home_Banner/reduse.png) !important;
    background-repeat: no-repeat;
 }
 .enquiry-form{
    padding: 30px;
    margin-top: 30px;
 }
 .enquiry-form span{
    color: red;
 }
 .enquiry-form label {
    text-transform: uppercase;
 }
 .enquiry-form label , .enquiry-form input , .enquiry-form select{
    color: black;
    outline: none;
    border: none;
    font-weight: 500;
    font-size: 14px;
    font-family: "Inter", sans-serif;
 }
 .enquiry-form input{
    padding-left: 10px;
    width: 100%;
 }
 .enquiry-form-inputparent{
    display: flex;
    align-items: center;
    padding-bottom: 10px;
    margin-bottom: 30px;
 }
 .enquiry-form select{
    width: 100%;
 }
</style>



<div class="contact-US-banner h-full w-full">
    <div class="contact-US h-full w-full">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 lg:pt-[8%] text-white">
            <div class="flex justify-between items-start gap-[15%] lg:py-[50px]">
                <div class="w-full h-full font_inter">
                    <h1 class="mainHead font-semibold text-[40px] w-[70%]">Grow Your Career with K-GRAPH</h1>
                    <p class="font-semibold text-[15px] py-[30px]">Kansas Overseas has prided itself on customer and employee satisfaction since its inception. This commitment to its staff has allowed the company to grow to over 200 employees across 5 cities. Kansas is one of the fastest-growing visa companies and is on track to double its workforce:</p>
                    <h2 class="font-semibold text-[30px]">Our Team Identity :</h2>
                    <ul class="list-disc pl-5 text-[18px]">
                        <li class="py-1">Assist with Value-added services</li>
                        <li class="py-1">Learners Before Leaders</li>
                        <li class="py-1">Prepared for marathon</li>
                        <li class="py-1">Replace Self - Mentoring Other Team Members</li>
                    </ul>
                </div>
                <div class="bg-white rounded-xl h-fit w-full canada-flag">
                    <div>
                        <form action="" class="text-black enquiry-form">
                            <h4 class="font_inter font-semibold text-black text-[32px] pb-10">Enquiry</h4>
                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="name">NAME<span>*</span></label>
                                <input type="text" name="name">
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="email">Email<span>*</span></label>
                                <input type="Email" name="email">
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent mobile">
                                <div>
                                    <select name="country" id="">
                                        <option value="">+91</option>
                                        <option value="">+93</option>
                                        <option value="">+94</option>
                                        <option value="">+96</option>
                                        <option value="">+97</option>
                                    </select>

                                </div>
                                <div class=" flex items-center w-full pl-4">
                                    <label class="whitespace-nowrap" for="mobile">Mobile NUMBER<span>*</span></label>
                                    <input type="tel" name="mobile">
                                </div>
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
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
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="message">Message<span>*</span></label>
                                <input type="text" name="message">
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="imageUploader" class="cursor-pointer flex justify-between items-center w-full">
                                    <div class="whitespace-nowrap">Upload Resume<span>*</span></div>
                                    <div class="w-full flex justify-end">
                                    <img id="uploadIcon" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" width="15" height="15" />
                                    </div>
                                </label>
                                <input id="imageUploader" type="file" accept="image/*" style="display: none;" onchange="handleFileChange()" />
                            </div>

                            <div class="flex justify-end items-center">
                                <div class="border rounded-full border-[#072558] cursor-pointer">
                                    <input class="!px-[50px] py-1 uppercase text-[#072558] cursor-pointer" type="button" value="Submit">
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
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 lg:py-[8%] text-white">
        <h2 class="my-10 font_inter font-semibold text-[50px] uppercase">Open positions</h2>

        <div class="bg-[#072f77] cursor-pointer rounded-[8px] my-4 border-b border-b-[#868686]">
            <div class="flex justify-between items-center px-5 py-4">
                <h2 class="font_inter font-bold text-[15px]">Marketing, Kochi, Kerala</h2>
                <div>
                    <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L9 9L17 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

        </div>

        <div class="bg-[#072f77] cursor-pointer rounded-[8px] my-4 border-b border-b-[#868686]">
            <div class="flex justify-between items-center px-5 py-4">
                <h2 class="font_inter font-bold text-[15px]">Marketing, Kochi, Kerala</h2>
                <div>
                    <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L9 9L17 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

        </div>

        <div class="bg-[#072f77] cursor-pointer rounded-[8px] my-4 border-b border-b-[#868686]">
            <div class="flex justify-between items-center px-5 py-4">
                <h2 class="font_inter font-bold text-[15px]">Marketing, Kochi, Kerala</h2>
                <div>
                    <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L9 9L17 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

        </div>

        <div class="bg-[#072f77] cursor-pointer rounded-[8px] my-4 border-b border-b-[#868686]">
            <div class="flex justify-between items-center px-5 py-4">
                <h2 class="font_inter font-bold text-[15px]">Marketing, Kochi, Kerala</h2>
                <div>
                    <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L9 9L17 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

        </div>
    </div>
</div>

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
