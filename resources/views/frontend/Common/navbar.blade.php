<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
<link href="{{ asset('admin/theme/alertifyjs/build/css/alertify.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('admin/theme/src/plugins/src/sweetalerts2/sweetalerts2.css')}}">
<link href="{{ asset('admin/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />

<style>
/* Basic submenu styling */
.nav ul {
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    display: none; /* Hidden by default */
    z-index: 1000;
    padding: 0.5rem;
    border-radius: 0.25rem;
}

.nav ul li {
    position: relative;
}

.nav ul li ul {
    top: 0;
    left: 100%;
    display: none;
}

.nav-item.relative ul.opacity-100 {
    display: flex;
    flex-direction: column;
}


    .accordion-header {
        display: flex;
        /* justify-content: space-between; */
        align-items: center;
    }
    .submenu{
        max-height: none !important;
    }

    .submenu .accordion-header a {
        background: none;
        border: none;
        text-align: left;
        width: 100%;
        cursor: pointer;
        font-size: 16px;
        padding: 8px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .accordion-toggle {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .accordion-toggle .arrow {
        transition: transform 0.3s ease;
    }

    .accordion-toggle .arrow.rotate {
        transform: rotate(180deg);
    }

    .submenu {
        padding-left: 20px;
    }

    .submenu-item {
        padding-left: 15px;
    }

    .submenu a {
        text-decoration: none;
        color: inherit;
    }


</style>
<div class="b-backgroun-nav z-50 w-full">
    <?php use App\Models\ServiceCategory; $navbarServiceCategories = ServiceCategory::with(['Service:id,slug,title,service_category_id','Service.SubService:id,slug,title,service_id'])->select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->get();?>



    <nav id="imHeader" class="text-white bg-gradient-to-b from-black to-transparent md:fixed top-0 !z-50 w-full">
        <div class="flex items-center justify-between container mx-auto px-5 xl:px-12 py-4 lg:py-5">
            <a href="{{ url('/') }}"  class="flex items-center gap-[4px] z-10 cursor-pointer">
                <img class="w-[1.80rem] logo_image lg:w-[2.5rem] xl:w-[3.5rem]" src="{{asset('assets/KgraphLogo.png')}}" alt="K-graph logo">
                <div>
                    <h2 class="lg:text-3xl 2xl:text-[34px] font_inter font-bold logo_text">KGRAPH</h2>
                    <h6 class="text-[8px] font_inter font-medium logo_title lg:mt-1">IMMIGRATION CONSULTANCY INC.</h6>
                </div>

            </a>

            <div class="relative lg:hidden z-50">
                <nav class="menu--right" role="navigation">
                    <div class="menuToggle">
                        <ul id="mobilemenu" class="menuItem">
                            <li class="mt-4 px-4 py-2">
                                <a href="{{ url('about-us') }}">About</a>
                            </li>
                            <li class="relative px-4 py-2">
                                <div class="accordion-header">
                                    <span>Services</span>
                                    <button class="accordion-toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="arrow h-5 w-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                                <ul class="submenu hidden">
                                    @foreach ($navbarServiceCategories as $navbarServiceCategory)
                                    <li class="submenu-item">
                                        <div class="accordion-header">
                                            <a href="#">{{$navbarServiceCategory->title}}</a>
                                            @if(count($navbarServiceCategory->Service))
                                            <button class="accordion-toggle">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow h-4 w-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>
                                            @endif
                                        </div>
                                        @if(count($navbarServiceCategory->Service))
                                        <ul class="submenu hidden">
                                            @foreach ($navbarServiceCategory->Service as $innerServices)
                                            <li class="submenu-item">
                                                <div class="accordion-header">
                                                    <a href="{{url('service-details/'.$innerServices->slug)}}">{{$innerServices->title}}</a>
                                                    @if(count($innerServices->SubService))
                                                    <button class="accordion-toggle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="arrow h-4 w-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                                        </svg>
                                                    </button>
                                                    @endif
                                                </div>
                                                @if(count($innerServices->SubService))
                                                <ul class="submenu hidden">
                                                    @foreach ($innerServices->SubService as $innerSubServices)
                                                    <li class="submenu-item">
                                                        <a class="pb-3 block" href="{{url('sub-service-details/'.$innerSubServices->slug)}}">{{$innerSubServices->title}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="px-4 py-2">
                                <a href="{{ url('packages') }}">Packages</a>
                            </li>
                            <li class="px-4 py-2">
                                <a href="{{ url('careers') }}">Careers</a>
                            </li>
                            <li class="px-4 py-2">
                                <a href="{{ url('blogs') }}">Blogs</a>
                            </li>
                            <li class="px-4 py-2">
                                <a href="{{ url('contact-us') }}" class="bg-white text-blue-600 px-4 py-1 rounded-sm">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            
            
            
            
            
            


            <button id="menuButton" class="lg:hidden">
                <img id="openicon" class="w-[50px]" src="{{ asset('assets/menuopen.png') }}" alt="">
                <img id="closeicon" class="hidden w-[50px] z-50 relative" style="scale: 0.5;" src="{{ asset('assets/close.png') }}" alt="">
            </button>

            <div class="capitalize hidden lg:flex gap-7">
                <ul class="flex items-center gap-7 text-base font_inter font-light">
                    <li class="nav-item"><a class="nav-link" href="{{ url('about-us') }}">About</a></li>
                    <li class="nav-item relative flex flex-col items-center">
                        <a class="nav-link Services-nav Services-nav-serv" href="{{ url('services') }}">Services</a>
                        <ul class=" bg-white hidden absolute top-full left-[-230px] w-[300px] rounded-[18px] py-1 z-50 shadow-md flex-col transition-[height] duration-300 opacity-0">

                            @foreach ($navbarServiceCategories as $navbarServiceCategory)
                            <li class="nav-item nav-link-for my-3 @if(count($navbarServiceCategory->Service)) relative @endif">
                                <a class=" text-blue-700 font_inter font-semibold text-[15px] flex justify-between items-center">{{$navbarServiceCategory->title}}</a>
                                @if(count($navbarServiceCategory->Service))
                                <ul class=" bg-white hidden absolute left-[95%] rounded-[18px] top-0 z-50 shadow-md transition-[height] duration-300 opacity-0">
                                    @foreach ($navbarServiceCategory->Service as $innerServices)
                                    <li class="nav-item nav-link-for @if(count($innerServices->SubService)) relative @endif">
                                        <a class="text-blue-700 font_inter font-semibold text-[15px]" href="{{url('service-details/'.$innerServices->slug)}}">{{$innerServices->title}}</a>
                                        <!-- Sub-submenu for PNP -->
                                        @if(count($innerServices->SubService))
                                        <ul class="sub-mnu-pnrt bg-white hidden absolute rounded-[18px] left-[95%] top-0 z-50 shadow-md transition-[height] duration-300 opacity-0">
                                            @foreach ($innerServices->SubService as $innerSubServices)
                                            <li class="nav-item nav-link-for !my-[1px]"><a class=" text-blue-700 font_inter font-semibold text-[15px]" href="{{url('sub-service-details/'.$innerSubServices->slug)}}">{{$innerSubServices->title}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('packages') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('careers') }}">Careers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('blogs') }}">Blogs</a></li>
                </ul>
                <a href="{{ url('contact-us') }}" class="bg-white block text-blue-600 hover:bg-blue-600 hover:text-white px-[26px] py-[7px] rounded-3xl ease-in duration-500 cursor-pointer">
                    <span  class="h-full font-semibold">Contact Us</span>
                </a>
            </div>



        </div>
        <div class="hidden lg:flex justify-center opacity-20">
            <div class="bg-white line-animation mx-8 w-[98%] h-[0.5px]"></div>
        </div>
    </nav>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Function to show a dropdown
    const showDropdown = (dropdownMenu) => {
        dropdownMenu.classList.remove('hidden');
        dropdownMenu.classList.add('opacity-100');
    };

    // Function to hide a dropdown
    const hideDropdown = (dropdownMenu) => {
        dropdownMenu.classList.add('hidden');
        dropdownMenu.classList.remove('opacity-100');
    };

    // Attach event handlers for dropdown behavior
    const attachDropdownHandlers = (dropdownParent) => {
        const dropdownMenu = dropdownParent.querySelector('ul');

        dropdownParent.addEventListener('mouseenter', () => {
            if (dropdownMenu) showDropdown(dropdownMenu);
        });

        dropdownParent.addEventListener('mouseleave', () => {
            if (dropdownMenu) hideDropdown(dropdownMenu);
        });

        // Recursively handle nested dropdowns
        const nestedDropdownParents = dropdownMenu?.querySelectorAll('.nav-item.relative') || [];
        nestedDropdownParents.forEach(attachDropdownHandlers);
    };

    // Add dynamic icons (down arrow for parent menu, right arrow for submenus)
    const addDynamicIcons = () => {
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach((item) => {
            const submenu = item.querySelector('ul');
            if (submenu) {
                const icon = document.createElement('span');
                if (item.closest('ul').classList.contains('flex')) {
                    // Add down arrow for top-level menu
                    icon.innerHTML = '<svg width="10" height="6" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L7 7L13 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'; 
                    icon.classList.add('submenu-icon', 'ml-2', 'text-gray-500','inline-block');
                } else {
                    // Add right arrow for submenu
                    icon.innerHTML = '<svg width="6" height="10" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 13L7 7L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'; 
                    icon.classList.add('submenu-icon', 'ml-6', 'text-gray-500','inline-block');
                }

                item.querySelector('a').appendChild(icon);
            }
        });
    };

    // Initialize dropdowns and icons
    const dropdownParents = document.querySelectorAll('.nav-item.relative');
    dropdownParents.forEach(attachDropdownHandlers);

    addDynamicIcons();
});

document.addEventListener('DOMContentLoaded', () => {
    const toggles = document.querySelectorAll('.accordion-toggle');

    toggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            const submenu = toggle.closest('.accordion-header').nextElementSibling;
            const arrow = toggle.querySelector('.arrow');

            if (submenu && submenu.classList.contains('submenu')) {
                submenu.classList.toggle('hidden');
                arrow.classList.toggle('rotate');
            }

            // Prevent default action for buttons
            e.preventDefault();
        });
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