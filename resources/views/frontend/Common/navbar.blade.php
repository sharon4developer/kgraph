<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
<link href="{{ asset('admin/theme/alertifyjs/build/css/alertify.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('admin/theme/src/plugins/src/sweetalerts2/sweetalerts2.css')}}">
<link href="{{ asset('admin/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
<div class="b-backgroun-nav z-50 w-full">
<?php
use App\Models\ServiceCategory;
$serviceCategories = ServiceCategory::with(['Service:id,slug,title,service_category_id'])->select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->get();
?>

    {{-- <header id="immaintop" class="text-white hidden md:block bg-black md:fixed top-0 z-50 w-full" style="display: none !important;">
        <div class="container mx-auto px-5 xl:px-12 flex justify-between items-start lg:items-center gap-1 lg:gap-0 flex-col md:flex-row font_aktiv py-[12px] lg:py-[10px] opacity-50">
            <div>
                <small class="uppercase font-light text-[10px] font_aktiv">KGRAPH IMMIGRATION CONSULTANCY INC.</small>
            </div>
            <div class="flex items-center gap-12">
                <div class="capitalize hidden lg:flex">
                    <ul class="flex items-center gap-1 font-light text-[10px]">
                        <li class="font_aktiv"><a href="{{ url('blogs') }}">blogs</a></li>|
                        <li class="font_aktiv">Legel</li>|
                        <li class="font_aktiv">News</li>|
                        <li class="font_aktiv">Privacy Policy</li>
                    </ul>
                </div>
                <small class="capitalize font-light text-[10px] font_aktiv">© 2024 - K-graph Canadian Immigration Services.</small>
            </div>
        </div>
    </header> --}}

    <nav id="imHeader" class="text-white bg-gradient-to-b from-black to-transparent md:fixed top-0 !z-50 w-full">
        <div class="flex items-center justify-between container mx-auto px-5 xl:px-12 py-4 lg:py-5">
            <a href="{{ url('/') }}"  class="flex items-center gap-[4px] z-10 cursor-pointer">
                <img class="w-[1.80rem] logo_image lg:w-[2.5rem] xl:w-[3.5rem]" src="{{asset('assets/KgraphLogo.png')}}" alt="K-graph logo">
                <div>
                    <h2 class="lg:text-3xl 2xl:text-[34px] font_inter font-bold logo_text">KGRAPH</h2>
                    <h6 class="text-[8px] font_inter font-medium logo_title lg:mt-1">IMMIGRATION CONSULTANCY INC.</h6>
                </div>

            </a>

            {{-- mobile device navigation bar --}}
            <div class="relative lg:hidden z-50">

                <nav class="menu--right" role="navigation">
                    <div class="menuToggle">
                        <ul id="mobilemenu" class="menuItem">
                            <!-- <div class="flex gap-2 items-center justify-start">
                                <li class="text-[12px] whitespace-nowrap text-black flex items-center"><a href="{{ url('blogs') }}">blogs</a></li>|
                                <li class="text-[12px] whitespace-nowrap text-black flex items-center"><a class="" href="#">Legal</a></li>|
                                <li class="text-[12px] whitespace-nowrap text-black flex items-center"><a class="" href="#">News</a></li>|
                                <li class="text-[12px] whitespace-nowrap text-black flex items-center"><a class="" href="#">Privacy Policy</a></li>
                            </div> -->

                            <li class="mt-4 px-[16px] py-2"><a href="{{ url('about-us') }}">About</a></li>
                            <li class="px-[16px] py-2"><a href="{{ url('services') }}">Service</a></li>
                            <li class="px-[16px] py-2"><a href="{{ url('packages') }}">Package</a></li>
                            <li class="px-[16px] py-2"><a href="{{ url('careers') }}">Careers</a></li>
                            <li class="px-[16px] py-2"><a href="{{ url('blogs') }}">Blogs</a></li>

                            <div class="bg-white text-blue-600 hover:bg-blue-600 hover:text-white px-[16px] py-[6px] rounded-sm ease-in duration-500 cursor-pointer w-fit">
                                <a href="" class="h-full !text-black">Contact Us</a>
                            </div>
                        </ul>
                    </div>
                </nav>
            </div>

            <button id="menuButton" class="lg:hidden">
                <img id="openicon" class="w-[50px]" src="{{ asset('assets/menuopen.png') }}" alt="">
                <img id="closeicon" class="hidden w-[50px] z-50 relative" style="scale: 0.6;" src="{{ asset('assets/close.png') }}" alt="">
            </button>

            <div class="capitalize hidden lg:flex gap-7">
                <ul class="flex items-center gap-7 text-base font_inter font-light">
                    <li class="nav-item"><a class="nav-link" href="{{ url('about-us') }}">About</a></li>
                    <li class="nav-item relative flex flex-col items-center">
                        <a class="nav-link" href="{{ url('services') }}">Services</a>
                        {{-- <ul class="bg-white h-0 overflow-hidden w-36 absolute top-[28px] z-50 pl-3 pr-8 py-3 rounded-lg flex-col transition-[height] duration-300 opacity-0">
                            @foreach ($serviceCategories as $serviceCategory)

                                <li class="nav-item"><a class="nav-link !text-blue-700" href="{{ url('packages') }}">{{$serviceCategory->title}}</a></li>
                            @endforeach
                        </ul>                         --}}
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('packages') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('careers') }}">Careers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('blogs') }}">Blogs</a></li>
                </ul>
                <div class="bg-white text-blue-600 hover:bg-blue-600 hover:text-white px-[26px] py-[7px] rounded-3xl ease-in duration-500 cursor-pointer">
                    <a href="{{ url('contact-us') }}" class="h-full font-semibold">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex justify-center opacity-20">
            <div class="bg-white line-animation mx-8 w-[98%] h-[0.5px]"></div>
        </div>
    </nav>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Select the parent <li> element for the dropdown
    const dropdownParent = document.querySelector('.nav-item.relative');
    const dropdownMenu = dropdownParent.querySelector('ul');

    // Function to show the dropdown with height animation
    const showDropdown = () => {
        dropdownMenu.style.height = `${dropdownMenu.scrollHeight}px`; // Set height to content's full height
        dropdownMenu.classList.add('opacity-100'); // Ensure the dropdown is visible
        dropdownMenu.style.overflow = 'visible'; // Allow content to be visible
    };

    // Function to hide the dropdown with height animation
    const hideDropdown = () => {
        dropdownMenu.style.height = '0'; // Collapse height to 0
        dropdownMenu.classList.remove('opacity-100'); // Hide the dropdown
        dropdownMenu.style.overflow = 'hidden'; // Prevent overflow content from showing
    };

    // Reset height after animation ends to allow re-calculation
    dropdownMenu.addEventListener('transitionend', () => {
        if (dropdownMenu.style.height === '0px') {
            dropdownMenu.classList.add('hidden'); // Fully hide the dropdown when collapsed
        } else {
            dropdownMenu.classList.remove('hidden'); // Ensure dropdown remains visible
            dropdownMenu.style.height = 'auto'; // Reset height to auto after expansion
        }
    });

    // Show dropdown on mouseenter of parent
    dropdownParent.addEventListener('mouseenter', () => {
        dropdownMenu.classList.remove('hidden'); // Ensure it starts visible
        showDropdown();
    });

    // Hide dropdown when mouse leaves parent and dropdown
    dropdownParent.addEventListener('mouseleave', (event) => {
        if (!dropdownMenu.contains(event.relatedTarget)) {
            hideDropdown();
        }
    });

    // Keep the dropdown visible when mouse enters it
    dropdownMenu.addEventListener('mouseenter', showDropdown);

    // Hide dropdown when mouse leaves it
    dropdownMenu.addEventListener('mouseleave', (event) => {
        if (!dropdownParent.contains(event.relatedTarget)) {
            hideDropdown();
        }
    });
});


</script>

<script>

    const header = document.getElementById('imHeader');
    const mheader = document.getElementById('immaintop');

    function handleScroll() {
        if (window.innerWidth >= 768) {
            if (window.scrollY > 10) {
                document.body.classList.add('scrolled');
                header.classList.add('scrolled-header');
                // mheader.classList.add('hidden');
            } else {
                document.body.classList.remove('scrolled');
                header.classList.remove('scrolled-header');
                // mheader.classList.remove('hidden');
            }
        }
    }

    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleScroll);


    let menuItem = document.getElementById('mobilemenu');
    let closeicon = document.getElementById('closeicon');
    let openicon = document.getElementById('openicon');
    document.getElementById('menuButton').addEventListener('click', function() {
        menuItem.classList.toggle('openmobilemenu');
        closeicon.classList.toggle('hidden');
        openicon.classList.toggle('hidden');

    });
</script>

<script>
    // Wait for the DOM to load
    // Wait for the DOM to load
    document.addEventListener("DOMContentLoaded", function() {

        // GSAP animation for the left-to-right line fill
        gsap.fromTo(".line-animation",
            { scaleX: 0, transformOrigin: "left center" },  // Start with scaleX 0, origin at the left
            {
                scaleX: 1,  // Animate to full width (scaleX 1)
                duration: 2,  // Duration of the animation (2 seconds)
                ease: "power2.inOut",  // Smooth ease-in-out animation
                scrollTrigger: {
                    trigger: ".imHeader",  // Trigger the animation when .imHeader is reached
                    start: "top center",  // Start animation when the top of .imHeader is at the center of the viewport
                    toggleActions: "play none none none"  // Play animation once
                }
            }
        );
    });


</script>




