@extends('layouts.main')
@section('content')


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

        .enquiry-form-inputparent {
            display: flex;
            align-items: center;
            padding-top: 10px;
            margin-top: 30px;
        }

        .enquiry-form select { width: 100%; background-color: transparent; }

        .requst-text { color: #727272; font-size: 10px; white-space: nowrap; }
        .phone-text { color: #034833; font-size: 12px; }

        .flag-img-contact { position: relative; top: -150px; opacity: 0; width: 100px; height: 100px; }


        @media (max-width: 1023px){
            .enquiry-form { padding: 30px; margin-top: 64px; }
            h1.mainHead {
                font-size: 25px; /* for larger screens */
            }
        }
        .blakorblue{ background: #04183c; }

        /* Read more like Careers */
        .contact-desc { max-height: 120px; overflow: hidden; transition: max-height 0.3s ease; position: relative; }
        .contact-desc.expanded { max-height: 2000px; }
    </style>
    @include('frontend.Common.whatsapplogo')

    {{-- HERO: Content only (form moved down) --}}
    <div class="w-full h-full contact-US-banner">
        <div class="w-full h-full contact-US">
            <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:pt-[8%] text-white">
                <div class="flex flex-col justify-between items-start gap-[15%] lg:py-[50px] md:mt-[100px] lg:mt-0">
                    <div class="w-full h-full font_inter">
                        <h1 class="mainHead font-semibold text-[40px] uppercase">
                            Get in Touch with KGraph Immigration<label class="text-[16px]">- Gateway to a New Life in Canada</label>
                        </h1>

                        <div class="contact-desc mt-6">
                            <p class="font-semibold text-[14px] py-[10px]">
                                We understand that navigating the immigration process can be complex and overwhelming. Whether you're looking to study, work, visit, or settle in Canada, the team at KGraph Immigration is here to support you every step of the way. We are committed to providing expert advice, personalized guidance, and tailored solutions to meet your unique immigration needs. With years of experience in the field, our immigration consultants are well-equipped to help you understand your options, prepare your applications, and overcome any challenges that may arise along the way. At KGraph Immigration, we pride ourselves on offering the highest level of service, ensuring that your immigration journey is as smooth and stress-free as possible. Reach out to us today for a consultation, and let us help you take the next step toward your new life in Canada.
                            </p>

                            <h2 class="font-semibold text-[20px] mt-6">Our Team Identity :</h2>
                            <ul class="list-disc pl-5 text-[14px]">
                                <li class="py-2">Study Permits: Assistance with securing study permits for international students wishing to study in Canada.</li>
                                <li class="py-2">Work Permits: Guidance for obtaining temporary or permanent work permits for skilled workers, entrepreneurs, and other professionals.</li>
                                <li class="py-2">Permanent Residency: Expert advice on applying for Canadian Permanent Residency through Express Entry, Provincial Nominee Programs (PNPs), and other pathways.</li>
                                <li class="py-2">Family Sponsorship: Helping Canadian citizens and permanent residents sponsor their loved ones for reunification in Canada.</li>
                            </ul>
                        </div>

                        <a href="#" class="read-more mt-2 inline-block font-semibold text-blue-600">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- “WE ARE IN” centered --}}
    <div class="open-positions bg-[#04183c]">
        <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:py-[6%] text-white">
            <div class="flex flex-col items-center text-center lg:mb-8">
                <h2 class="left-to-right-animation font_inter font-semibold text-[35px] md:text-[50px] text-white leading-none uppercase">
                    WE ARE IN
                </h2>
                <div class="w-full md:w-2/3 lg:w-1/2 mx-auto mt-3 lg:my-6" style="border: 1px solid #FFFFFF8C;"></div>
            </div>

            <div class="lg:grid lg:grid-cols-3 lg:gap-6 py-[40px]">
                @foreach ($locations as $data)
                <div class="bg-white my-4 p-5 w-full h-[218px] rounded-xl shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-black uppercase">{{$data->location}}</h5>
                        <img class="w-[48px] h-[48px] rounded-full" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->image }}" alt="{{$data->alt_tag}}">
                    </div>
                    <div class="flex flex-col gap-[20px]">
                        <div class="flex items-center gap-[20px]">
                            <div class="w-6">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.047 16.0415L20.0847 20.0911C19.9644 20.6925 19.4833 21.0935 18.8819 21.0935C8.77801 21.0534 0.558594 12.8339 0.558594 2.73008C0.558594 2.12866 0.919446 1.64752 1.52087 1.52724L5.57043 0.564964C6.13176 0.44468 6.73318 0.765438 6.97375 1.28667L8.8582 5.65699C9.05867 6.17823 8.93839 6.77965 8.49735 7.1004L6.33223 8.86457C7.69545 11.6311 9.94076 13.8764 12.7474 15.2396L14.5116 13.0745C14.8323 12.6736 15.4337 12.5132 15.955 12.7137L20.3253 14.5981C20.8465 14.8788 21.1673 15.4802 21.047 16.0415Z" fill="#072558" />
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h4 class="font-semibold phone-text">{{$data->phone}}</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-[20px]">
                            <div class="w-6">
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.1625 0.246205C20.205 0.246205 21.0871 1.12829 21.0871 2.17075C21.0871 2.81227 20.7663 3.37359 20.2852 3.73445L11.5846 10.2699C11.1035 10.6307 10.5021 10.6307 10.0209 10.2699L1.32039 3.73445C0.839257 3.37359 0.558594 2.81227 0.558594 2.17075C0.558594 1.12829 1.40058 0.246205 2.48314 0.246205H19.1625ZM9.25915 11.3123C10.1813 11.994 11.4243 11.994 12.3464 11.3123L21.0871 4.73681V13.0765C21.0871 14.5199 19.9243 15.6426 18.521 15.6426H3.12466C1.68125 15.6426 0.558594 14.5199 0.558594 13.0765V4.73681L9.25915 11.3123Z" fill="#072558" />
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h4 class="font-semibold phone-text">{{$data->email}}</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-[20px]">
                            <div class="w-6">
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.29451 20.3769C5.20958 17.7708 0.558594 11.5561 0.558594 8.02774C0.558594 3.7777 3.96665 0.329557 8.25678 0.329557C12.5068 0.329557 15.955 3.7777 15.955 8.02774C15.955 11.5561 11.2639 17.7708 9.17896 20.3769C8.69782 20.9783 7.77564 20.9783 7.29451 20.3769ZM8.25678 10.5938C9.6601 10.5938 10.8228 9.47115 10.8228 8.02774C10.8228 6.62443 9.6601 5.46168 8.25678 5.46168C6.81337 5.46168 5.69072 6.62443 5.69072 8.02774C5.69072 9.47115 6.81337 10.5938 8.25678 10.5938Z" fill="#072558" />
                                </svg>
                            </div>
                            <div class="font_jakarta">
                                <h4 class="font-semibold phone-text">{{$data->address}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- CTA centered 
            <div class="relative z-10 flex justify-center py-6 mx-5 lg:mx-0">
                <div class="relative cursor-pointer flex justify-center items-center rounded-full gap-5 py-[6.5px] lg:py-1 xl:py-[4.5px] pl-5 pr-1 overflow-hidden group">
                    <div class="absolute inset-0 left-0 w-full transition-all duration-500 ease-out bg-blue-600 group-hover:left-full"></div>
                    <h6 class="relative z-10 text-white text-[12px] xl:text-[14px]">Let's turn your vision into reality</h6>
                    <div class="relative z-10 bg-white text-blue-600 px-[20px] pb-1 md:py-1 lg:pb-[2px] lg:pt-0 xl:pb-[2px] xl:pt-[1px] md:rounded-full cursor-pointer w-fit lg:rounded-full whitespace-nowrap rounded-full">
                        <a href="{{ url('contact-us') }}" class="h-full text-[12px] xl:text-[14px]">Connect Us</a>
                    </div>
                </div>
            </div>
            --}}
        </div>
    </div>

    {{-- FORM moved down as its own section --}}
    <div class="w-full h-full blakorblue">
        <div class="container mx-auto px-5 xl:px-12 h-full w-full py-8 lg:py-[6%] text-white">
            <div class="relative w-full bg-white rounded-xl h-fit canada-flag">
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
                            <div class="flex mb-6 md:mb-0 border-b border-b-[#D9D9D9] w-full lg:w-fit md:border-none">
                                <select name="country" id="">
                                    @foreach (config('country_codes') as $c)
                                        <option value="{{ $c['dial'] }}" {{ $c['country'] === 'Canada' ? 'selected' : '' }}>
                                            {{ $c['label'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center w-full lg:pl-4">
                                <label class="whitespace-nowrap" for="mobile">Mobile <span class="hidden lg:inline-block !text-black">NUMBER</span><span>*</span></label>
                                <input type="tel" name="mobile">
                            </div>
                        </div>

                        <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                            <label for="message">Message</label>
                            <input type="text" name="message">
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

    {{-- (Optional) Splide init kept safe if present on page --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Flag animation
            gsap.registerPlugin(ScrollTrigger);
            gsap.to(".flag-img-contact", {
                scrollTrigger: {
                    trigger: ".blakorblue",
                    start: "top bottom",
                    toggleActions: "play none none none",
                },
                duration: 2,
                top: "4px",
                opacity: 1,
                ease: "bounce.out",
            });
        });

        // Guarded Splide init
        document.addEventListener('DOMContentLoaded', function () {
            const splideElement = document.querySelector('#splideclunt');
            if (!splideElement) return;
            const slideItems = splideElement.querySelectorAll('.splide__slide').length;

            function getSliderType() {
                const screenWidth = window.innerWidth;
                if (screenWidth <= 767) return slideItems > 1 ? 'loop' : 'slide';
                if (screenWidth <= 1023) return slideItems > 2 ? 'loop' : 'slide';
                return slideItems > 3 ? 'loop' : 'slide';
            }

            new Splide('#splideclunt', {
                type: getSliderType(),
                autoplay: true,
                interval: 3000,
                perPage: 3,
                perMove: 1,
                arrows: false,
                pagination: false,
                gap: '16px',
                breakpoints: {
                    1536: { perPage: 3 },
                    1023: { perPage: 2 },
                    767: { perPage: 1 },
                },
                speed: 1000,
                easing: 'linear',
            }).mount();
        });
    </script>

    <script>
        // Read more/less like Careers
        document.addEventListener('DOMContentLoaded', function() {
            const desc = document.querySelector('.contact-desc');
            const toggle = document.querySelector('.read-more');
            if (!desc || !toggle) return;
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const isExpanded = desc.classList.toggle('expanded');
                toggle.textContent = isExpanded ? 'Read less' : 'Read more';
            });
        });

        // (kept) file change helper if you add file inputs later
        function handleFileChange() {
            const input = document.getElementById('imageUploader');
            const icon = document.getElementById('uploadIcon');
            if (!input || !icon) return;
            icon.style.filter = (input.files && input.files.length > 0) ? 'hue-rotate(270deg) brightness(2.5)' : 'none';
        }
    </script>
@endsection
