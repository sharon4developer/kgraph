@extends('layouts.main')
@section('content')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script> --}}


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
    background-color: transparent;
 }

 .requst-text{
    color: #727272;
    font-size: 10px;
    white-space: nowrap;
 }
 .phone-text{
    color: #034833;
    font-size: 12px;
    white-space: nowrap;
 }
 .flag-img-contact {
        position: relative;
        top: -150px; /* Start off-screen */
        opacity: 0;  /* Start invisible */
        width: 100px;
        height: 100px;
    }
</style>

<div class="contact-US-banner h-full w-full">
    <div class="contact-US h-full w-full">
        <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:pt-[8%] text-white">
            <div class="flex flex-col lg:flex-row justify-between items-start gap-[15%] lg:py-[50px] md:mt-[100px] lg:mt-0">
                <div class="w-full h-full font_inter">
                    <h1 class="mainHead font-semibold text-[40px] 2xl:w-[70%] uppercase">Grow Your Career with K-GRAPH</h1>
                    <p class="font-semibold text-[15px] py-[30px]">Kansas Overseas has prided itself on customer and employee satisfaction since its inception. This commitment to its staff has allowed the company to grow to over 200 employees across 5 cities. Kansas is one of the fastest-growing visa companies and is on track to double its workforce:</p>
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

                            <div class="flex justify-end items-center overflow-hidden rounded-full">
                                <div class="border rounded-full border-[#072558] cursor-pointer">
                                    <button class="!px-[80px] py-3 uppercase text-[#072558] cursor-pointer text-[16px] font-bold bg-transparent hover:bg-[#072558] hover:text-white transition-colors duration-300 rounded-full">Submit</button>
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
            <h2 class="left-to-right-animation font_inter font-semibold text-[50px] text-white leading-none uppercase"><span class="inline-block">WE </span><span class="inline-block">ARE IN</span></h2>
            <div class="md:pl-2 w-full" style="margin-bottom: -6%;">
                <div class="w-full my-6 left-to-right-width-animation" style="border: 1px solid #FFFFFF8C;"></div>
            </div>
        </div>

        <div class="lg:flex lg:gap-6 py-[56px] justify-between">
            <div class="bg-white my-4 lg:my-0 p-5 w-full rounded-xl">
                <div class="flex items-center justify-between">
                    <h5 class="text-black uppercase">Office Address</h5>
                    <img src="{{ asset('assets/indian-flag.png') }}" alt="">
                </div>
                <div class="bg-[#072558] text-white rounded-md w-fit px-5 py-1">
                    INDIA
                </div>

                <div class="flex flex-col md:flex-row items-start gap-[35px]">
                    <div class="border-r pr-24">
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.047 16.0415L20.0847 20.0911C19.9644 20.6925 19.4833 21.0935 18.8819 21.0935C8.77801 21.0534 0.558594 12.8339 0.558594 2.73008C0.558594 2.12866 0.919446 1.64752 1.52087 1.52724L5.57043 0.564964C6.13176 0.44468 6.73318 0.765438 6.97375 1.28667L8.8582 5.65699C9.05867 6.17823 8.93839 6.77965 8.49735 7.1004L6.33223 8.86457C7.69545 11.6311 9.94076 13.8764 12.7474 15.2396L14.5116 13.0745C14.8323 12.6736 15.4337 12.5132 15.955 12.7137L20.3253 14.5981C20.8465 14.8788 21.1673 15.4802 21.047 16.0415Z" fill="#072558"/>
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.1625 0.246205C20.205 0.246205 21.0871 1.12829 21.0871 2.17075C21.0871 2.81227 20.7663 3.37359 20.2852 3.73445L11.5846 10.2699C11.1035 10.6307 10.5021 10.6307 10.0209 10.2699L1.32039 3.73445C0.839257 3.37359 0.558594 2.81227 0.558594 2.17075C0.558594 1.12829 1.40058 0.246205 2.48314 0.246205H19.1625ZM9.25915 11.3123C10.1813 11.994 11.4243 11.994 12.3464 11.3123L21.0871 4.73681V13.0765C21.0871 14.5199 19.9243 15.6426 18.521 15.6426H3.12466C1.68125 15.6426 0.558594 14.5199 0.558594 13.0765V4.73681L9.25915 11.3123Z" fill="#072558"/>
                                    </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.29451 20.3769C5.20958 17.7708 0.558594 11.5561 0.558594 8.02774C0.558594 3.7777 3.96665 0.329557 8.25678 0.329557C12.5068 0.329557 15.955 3.7777 15.955 8.02774C15.955 11.5561 11.2639 17.7708 9.17896 20.3769C8.69782 20.9783 7.77564 20.9783 7.29451 20.3769ZM8.25678 10.5938C9.6601 10.5938 10.8228 9.47115 10.8228 8.02774C10.8228 6.62443 9.6601 5.46168 8.25678 5.46168C6.81337 5.46168 5.69072 6.62443 5.69072 8.02774C5.69072 9.47115 6.81337 10.5938 8.25678 10.5938Z" fill="#072558"/>
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>

                        <button class="rounded-md text-[#061F4C] border border-[#061F4C] w-fit px-3 py-1 font_inter font-medium text-[12px] cursor-pointer">
                            View Larger Map
                        </button>
                    </div>
                    <div class="mt-4">
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
                    </div>
                </div>
            </div>
            <div class="bg-white my-4 lg:my-0 p-5 w-full rounded-xl">
                <div class="flex items-center justify-between">
                    <h5 class="text-black uppercase">Office Address</h5>
                    <img src="{{ asset('assets/indian-flag.png') }}" alt="">
                </div>
                <div class="bg-[#072558] text-white rounded-md w-fit px-5 py-1">
                    INDIA
                </div>

                <div class="flex flex-col md:flex-row items-start gap-[35px]">
                    <div class="border-r pr-24">
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.047 16.0415L20.0847 20.0911C19.9644 20.6925 19.4833 21.0935 18.8819 21.0935C8.77801 21.0534 0.558594 12.8339 0.558594 2.73008C0.558594 2.12866 0.919446 1.64752 1.52087 1.52724L5.57043 0.564964C6.13176 0.44468 6.73318 0.765438 6.97375 1.28667L8.8582 5.65699C9.05867 6.17823 8.93839 6.77965 8.49735 7.1004L6.33223 8.86457C7.69545 11.6311 9.94076 13.8764 12.7474 15.2396L14.5116 13.0745C14.8323 12.6736 15.4337 12.5132 15.955 12.7137L20.3253 14.5981C20.8465 14.8788 21.1673 15.4802 21.047 16.0415Z" fill="#072558"/>
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.1625 0.246205C20.205 0.246205 21.0871 1.12829 21.0871 2.17075C21.0871 2.81227 20.7663 3.37359 20.2852 3.73445L11.5846 10.2699C11.1035 10.6307 10.5021 10.6307 10.0209 10.2699L1.32039 3.73445C0.839257 3.37359 0.558594 2.81227 0.558594 2.17075C0.558594 1.12829 1.40058 0.246205 2.48314 0.246205H19.1625ZM9.25915 11.3123C10.1813 11.994 11.4243 11.994 12.3464 11.3123L21.0871 4.73681V13.0765C21.0871 14.5199 19.9243 15.6426 18.521 15.6426H3.12466C1.68125 15.6426 0.558594 14.5199 0.558594 13.0765V4.73681L9.25915 11.3123Z" fill="#072558"/>
                                    </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.29451 20.3769C5.20958 17.7708 0.558594 11.5561 0.558594 8.02774C0.558594 3.7777 3.96665 0.329557 8.25678 0.329557C12.5068 0.329557 15.955 3.7777 15.955 8.02774C15.955 11.5561 11.2639 17.7708 9.17896 20.3769C8.69782 20.9783 7.77564 20.9783 7.29451 20.3769ZM8.25678 10.5938C9.6601 10.5938 10.8228 9.47115 10.8228 8.02774C10.8228 6.62443 9.6601 5.46168 8.25678 5.46168C6.81337 5.46168 5.69072 6.62443 5.69072 8.02774C5.69072 9.47115 6.81337 10.5938 8.25678 10.5938Z" fill="#072558"/>
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>

                        <button class="rounded-md text-[#061F4C] border border-[#061F4C] w-fit px-3 py-1 font_inter font-medium text-[12px] cursor-pointer">
                            View Larger Map
                        </button>
                    </div>
                    <div class="mt-4">
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
                    </div>
                </div>
            </div>
            <div class="bg-white my-4 lg:my-0 p-5 w-full rounded-xl hidden xl:block">
                <div class="flex items-center justify-between">
                    <h5 class="text-black uppercase">Office Address</h5>
                    <img src="{{ asset('assets/indian-flag.png') }}" alt="">
                </div>
                <div class="bg-[#072558] text-white rounded-md w-fit px-5 py-1">
                    INDIA
                </div>

                <div class="flex flex-col md:flex-row items-start gap-[35px]">
                    <div class="border-r pr-24">
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.047 16.0415L20.0847 20.0911C19.9644 20.6925 19.4833 21.0935 18.8819 21.0935C8.77801 21.0534 0.558594 12.8339 0.558594 2.73008C0.558594 2.12866 0.919446 1.64752 1.52087 1.52724L5.57043 0.564964C6.13176 0.44468 6.73318 0.765438 6.97375 1.28667L8.8582 5.65699C9.05867 6.17823 8.93839 6.77965 8.49735 7.1004L6.33223 8.86457C7.69545 11.6311 9.94076 13.8764 12.7474 15.2396L14.5116 13.0745C14.8323 12.6736 15.4337 12.5132 15.955 12.7137L20.3253 14.5981C20.8465 14.8788 21.1673 15.4802 21.047 16.0415Z" fill="#072558"/>
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.1625 0.246205C20.205 0.246205 21.0871 1.12829 21.0871 2.17075C21.0871 2.81227 20.7663 3.37359 20.2852 3.73445L11.5846 10.2699C11.1035 10.6307 10.5021 10.6307 10.0209 10.2699L1.32039 3.73445C0.839257 3.37359 0.558594 2.81227 0.558594 2.17075C0.558594 1.12829 1.40058 0.246205 2.48314 0.246205H19.1625ZM9.25915 11.3123C10.1813 11.994 11.4243 11.994 12.3464 11.3123L21.0871 4.73681V13.0765C21.0871 14.5199 19.9243 15.6426 18.521 15.6426H3.12466C1.68125 15.6426 0.558594 14.5199 0.558594 13.0765V4.73681L9.25915 11.3123Z" fill="#072558"/>
                                    </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-[20px] my-4">
                            <div>
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.29451 20.3769C5.20958 17.7708 0.558594 11.5561 0.558594 8.02774C0.558594 3.7777 3.96665 0.329557 8.25678 0.329557C12.5068 0.329557 15.955 3.7777 15.955 8.02774C15.955 11.5561 11.2639 17.7708 9.17896 20.3769C8.69782 20.9783 7.77564 20.9783 7.29451 20.3769ZM8.25678 10.5938C9.6601 10.5938 10.8228 9.47115 10.8228 8.02774C10.8228 6.62443 9.6601 5.46168 8.25678 5.46168C6.81337 5.46168 5.69072 6.62443 5.69072 8.02774C5.69072 9.47115 6.81337 10.5938 8.25678 10.5938Z" fill="#072558"/>
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h5 class="requst-text">Requesting A Call:</h5>
                                <h4 class="phone-text font-semibold">(629) 555-0129</h4>
                            </div>
                        </div>

                        <button class="rounded-md text-[#061F4C] border border-[#061F4C] w-fit px-3 py-1 font_inter font-medium text-[12px] cursor-pointer">
                            View Larger Map
                        </button>
                    </div>
                    <div class="mt-4">
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
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('frontend.Common.getintouch')

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
