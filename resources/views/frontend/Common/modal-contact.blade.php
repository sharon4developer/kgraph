
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
        top: -150px;
        opacity: 0;
        width: 100px;
        height: 100px;
   }
</style>
</style>

<div id="modalpopup" class="z-50 fixed top-0 bg-[#0000009c] h-screen overflow-hidden hidden">
    <div class="flex justify-center items-center w-screen md:pt-[10%] xl:pt-[5%] 2xl:pt-[6%]">
        <div class="w-[85%] md:w-[75%] lg:w-[50vw] 2xl:w-[40%]">
            <div class="bg-white rounded-xl h-fit w-full mt-[52px] lg:mt-0 relative">
                <button id="close-btn" class="cursor-pointer absolute top-[-10px] left-[-10px]">
                    <img class="w-[30px]" src="{{ asset('assets/home_Banner/cross.png') }}" alt="">
                </button>
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

                        {{-- <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
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
                        </div> --}}

                        {{-- <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                            <label for="message">Message<span>*</span></label>
                            <input type="text" name="message">
                        </div> --}}

                        {{-- <div class="border-b border-b-[#D9D9D9] enquiry-form-inputparent">
                            <label for="imageUploader" class="cursor-pointer flex justify-between items-center w-full">
                                <div class="whitespace-nowrap">Upload Resume<span>*</span></div>
                                <div class="w-full flex justify-end">
                                <img id="uploadIcon" src="{{ asset('assets/home_Banner/fileuploadbutton.png') }}" alt="Upload Logo" width="15" height="15" />
                                </div>
                            </label>
                            <input id="imageUploader" type="file" accept="image/*" style="display: none;" onchange="handleFileChange()" />
                        </div> --}}

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

<script>
    let closebtn = document.getElementById('close-btn');
    let modal = document.getElementById('modalpopup');
    let scrollTimeout;

    window.addEventListener('scroll', function () {
        clearTimeout(scrollTimeout);

        scrollTimeout = setTimeout(function () {
            modal.classList.remove('hidden');
        }, 2000);
    });


    closebtn.addEventListener('click', function() {
        modal.classList.add('!hidden');
    });

</script>
