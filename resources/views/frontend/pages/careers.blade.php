@extends('layouts.main')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/ql-front.css') }}">
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
            position: relative;
        }

        .canada-flag { position: relative; }

        .enquiry-form { padding: 30px; margin-top: 30px; }
        .enquiry-form span { color: red; }
        .enquiry-form label { text-transform: uppercase; }
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

        .enquiry-form input { padding-bottom: 0px !important; padding-left: 10px; width: 100%; }

        #coverUploadersec, #imageUploadersec { padding-bottom: 8px !important; }

        .enquiry-form-inputparent {
            display: flex;
            align-items: center;
            padding-top: 10px;
            margin-top: 30px;
        }
        @media (max-width: 768px){
            .enquiry-form-inputparent { display: flex; align-items: center; padding-top: 10px; margin-top: 20px; }
        }

        .enquiry-form select { width: 100%; background: transparent; }

        .accordion-content-careers { max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; }
        .accordion-active .accordion-content-careers { max-height: 6000px; transition: max-height 0.5s ease-in-out; }

        .flag-img { position: relative; top: -150px; opacity: 0; width: 100px; height: 100px; }
        @media (max-width: 1023px){ .enquiry-form { padding: 30px; margin-top: 64px; } }

        .modalPopup { display: none; justify-content: center; align-items: center; }
        .modalPopup.flex { display: flex; }

        .job-decsript ul li{ margin-top: 5px; margin-left: 20px; list-style-type: disc; }

        @media (min-width: 768px) and (max-width: 1380px){
            #jobenquirey .enquiry-form-inputparent{ margin-top: 15px; }
        }

        .blakorblue{ padding-top: 51px; background: #04183c; }

        .career-desc { max-height: 150px; overflow: hidden; transition: max-height 0.3s ease; position: relative; }
        .career-desc.expanded { max-height: 2000px; }
    </style>
    @include('frontend.Common.whatsapplogo')

    <div class="w-full h-full contact-US-banner">
        <div class="w-full h-full contact-US">
            <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:pt-[8%] text-white">
                <div class="flex flex-col lg:flex-row justify-between items-start gap-[15%] lg:pt-[50px] md:mt-36 lg:mt-0">
                    <div class="w-full h-full mb-8 font_inter">
                        <h1 class="mainHead font-semibold text-[40px] xl:w-[70%] uppercase">
                            @if(isset($careerContents)) {{ $careerContents->title }} @endif
                        </h1>
                        <p class="font-semibold text-[12px] lg:text-[12px]" style="padding-top: 5px;">
                            @if(isset($careerContents)) {{ $careerContents->sub_title }} @endif
                        </p>

                        @if(isset($careerContents))
                            <div class="career-desc">
                                {!! $careerContents->description !!}
                            </div>
                            <a href="#" class="read-more mt-2 inline-block font-semibold text-blue-600">Read more</a>
                        @endif
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
                                <p class="text-[10px] font-extralight uppercase md:whitespace-nowrap lg:whitespace-normal">{{ $data->location }} /</p><p class="text-[10px] font-extralight uppercase">{{$data->type}}/ </p><p class="text-[10px] font-extralight uppercase">{{ $data->experience }}</p>
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
                            @if(!empty($data->overview))
                                <p class="pb-3 text-sm font-light font_inter">{{ $data->overview }}</p>
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

    {{-- New --}}

    <div class="w-full h-full careers-parent contact-US-banner">
        <div class="w-full h-full contact-US">
            <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:pt-[8%] text-white">
                <div class="flex flex-col lg:flex-row justify-between items-start gap-[15%] lg:py-[50px] md:mt-36 lg:mt-0">
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
                                            @foreach (config('country_codes') as $c)
                                                <option value="{{ $c['dial'] }}" {{ $c['country'] === 'Canada' ? 'selected' : '' }}>
                                                    {{ $c['label'] }}
                                                </option>
                                            @endforeach
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
                                </div>

                                <div class="flex-col enquiry-form-inputparent">
                                    <label for="resume" class="cursor-pointer flex justify-between items-center w-full !border-1 !border-b !border-b-[#D9D9D9] gap-3 pb-1" style="border:1px solid #D9D9D9 !important; border-top: transparent !important; border-left:transparent !important; border-right: transparent !important; ">
                                        <div class="md:whitespace-nowrap">Upload Resume<span>*</span></div>
                                        <div class="flex justify-end w-full">
                                            <input id="imageUploader"  type="file" accept=".pdf,doc,docx" class="relative z-50 !p-0"  name="resume" onchange="handleFileChange()" />
                                            <img id="uploadIcon" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" width="19" height="15" />
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
    </div>      

    <div class="relative">
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
                                        @foreach (config('country_codes') as $c)
                                            <option value="{{ $c['dial'] }}" {{ $c['country'] === 'Canada' ? 'selected' : '' }}>
                                                {{ $c['label'] }}
                                            </option>
                                        @endforeach
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
                                <label for="coverUploadersec" class="flex items-center justify-between w-full cursor-pointer">
                                    <div class="md:whitespace-nowrap">Cover letter</div>
                                    <div class="flex justify-end w-full">
                                        <input id="coverUploadersec" class="pb-2" type="file" accept=".pdf,doc,docx " name="message_n" onchange="handleFileChange(1)" />
                                        <img id="coveruploadIconsec" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" class="w-[19px] h-[22px]" width="19" height="15" />
                                    </div>
                                </label>
                            </div>

                            <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                                <label for="imageUploadersec" class="flex items-center justify-between w-full cursor-pointer">
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
                accordion.classList.toggle('accordion-active');
                const icon = accordion.querySelector('.accordion-icon');
                if (icon) icon.style.transform = accordion.classList.contains('accordion-active') ? 'rotate(180deg)' : 'rotate(0deg)';
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);
            gsap.to(".flag-img", {
                scrollTrigger: {
                    trigger: ".careers-parent",
                    start: "top center",
                    toggleActions: "play none none none",
                },
                duration: 2,
                top: "4px",
                opacity: 1,
                ease: "bounce.out",
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const applyNowButtons = document.querySelectorAll("[id^='applyNowBtn']");
            applyNowButtons.forEach(button => {
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
                    const clickedButton = event.target;
                    clickedButton.textContent = clickedButton.textContent.trim() === "View More" ? "View Less" : "View More";
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const applyNowButton = document.getElementById('applyNowBtn');
            const jobEnquirySection = document.getElementById('jobenquirey');

            if (applyNowButton && jobEnquirySection) {
                applyNowButton.addEventListener('click', function () {
                    if (/Mobi|Android/i.test(navigator.userAgent)) {
                        jobEnquirySection.classList.remove('hidden');
                        jobEnquirySection.style.display = 'flex';
                        jobEnquirySection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const desc = document.querySelector('.career-desc');
            const toggle = document.querySelector('.read-more');
            if (!desc || !toggle) return;
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const isExpanded = desc.classList.toggle('expanded');
                toggle.textContent = isExpanded ? 'Read less' : 'Read more';
            });
        });
    </script>
@endsection
