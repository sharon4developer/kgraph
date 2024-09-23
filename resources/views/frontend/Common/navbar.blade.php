<div class="b-backgroun-nav z-50 w-full">
    <header id="immaintop" class="text-white hidden md:block bg-black md:fixed top-0 z-50 w-full">
        <div class="container mx-auto px-5 lg:px-12 flex justify-between items-start lg:items-center gap-1 lg:gap-0 flex-col md:flex-row font_aktiv py-[12px] lg:py-[10px]">
            <div>
                <small class="uppercase font-light text-[10px] font_aktiv">KGRAPH IMMIGRATION CONSULTANCY INC.</small>
            </div>
            <div class="flex items-center gap-12">
                <div class="capitalize hidden lg:flex">
                    <ul class="flex items-center gap-4 text-sm font-light">
                        <li class="font_aktiv">Blogs</li>|
                        <li class="font_aktiv">Legel</li>|
                        <li class="font_aktiv">News</li>|
                        <li class="font_aktiv">Privacy Policy</li>
                    </ul>
                </div>
                <small class="capitalize font-light text-[10px] font_aktiv">© 2024 - CanDo Canadian Immigration Services.</small>
            </div>
        </div>
    </header>

    <nav id="imHeader" class="text-white bg-gradient-to-b from-black to-transparent md:fixed top-10 !z-50 w-full">
        <div class="flex items-center justify-between container mx-auto px-5 lg:px-12 py-4 lg:py-5">
            <a href="{{ url('/') }}"  class="flex items-center gap-[4px] z-10">
                <img class="w-[1.80rem] logo_image lg:w-[2.5rem]" src="{{asset('assets/KgraphLogo.png')}}" alt="K-graph logo">
                <div>
                    <h2 class="text-base font-bold logo_text lg:text-[30px]">KGRAPH</h2>
                    <h6 class="text-[7px]  font-medium logo_title lg:mt-1">IMMIGRATION CONSULTANCY INC.</h6>
                </div>

            </a>

            {{-- mobile device navigation bar --}}
            <div class="relative lg:hidden z-50">

                <nav class="menu--right" role="navigation">
                    <div class="menuToggle">
                        <ul id="mobilemenu" class="menuItem">
                            <div class="flex gap-2 items-center justify-start">
                                <li class="text-[12px] whitespace-nowrap text-black flex items-center"><a class="" href="#">Blogs</a></li>|
                                <li class="text-[12px] whitespace-nowrap text-black flex items-center"><a class="" href="#">Legal</a></li>|
                                <li class="text-[12px] whitespace-nowrap text-black flex items-center"><a class="" href="#">News</a></li>|
                                <li class="text-[12px] whitespace-nowrap text-black flex items-center"><a class="" href="#">Privacy Policy</a></li>
                            </div>

                            <li class="mt-4 px-[16px] py-2"><a href="#">About</a></li>
                            <li class="px-[16px] py-2"><a href="#">Service</a></li>
                            <li class="px-[16px] py-2"><a href="#">Package</a></li>
                            <li class="px-[16px] py-2"><a href="#">Careers</a></li>

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

            <div class="capitalize hidden lg:flex gap-4">
                <ul class="flex items-center gap-4 text-sm font-light">
                    <li><a href="{{ url('about-us') }}">About</a></li>
                    <li><a href="{{ url('services') }}">Services</a></li>
                    <li>Packages</li>
                    <li>Careers</li>
                </ul>
                <div class="bg-white text-blue-600 hover:bg-blue-600 hover:text-white px-[26px] py-[7px] rounded-3xl ease-in duration-500 cursor-pointer">
                    <a href="" class="h-full font-semibold">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<script>

    const header = document.getElementById('imHeader');
    const mheader = document.getElementById('immaintop');

    function handleScroll() {
        if (window.innerWidth >= 768) {
            if (window.scrollY > 10) {
                document.body.classList.add('scrolled');
                header.classList.add('scrolled-header');
                mheader.classList.add('hidden');
            } else {
                document.body.classList.remove('scrolled');
                header.classList.remove('scrolled-header');
                mheader.classList.remove('hidden');
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




