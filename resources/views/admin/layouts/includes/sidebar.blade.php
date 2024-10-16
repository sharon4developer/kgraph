<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ url('admin/dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/pages') }}">
                        <i class="fa fa-files-o" aria-hidden="true"></i>
                        <span data-key="t-dashboard">Pages</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span data-key="t-multi-level">Home</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ url('admin/home') }}" data-key="t-level-2-2">Home </a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Banners</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/banners') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/banners/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Service Categories</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/service-categories') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/service-categories/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Services</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/services') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/services/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Service Points</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/service-points') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/service-points/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Service Faq</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/service-faq') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/service-faq/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Who We Are</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/who-we-are') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/who-we-are/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Testimonials</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/testimonials') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/testimonials/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Faq</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/faq') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/faq/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Blogs</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/blogs') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/blogs/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Explore</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/explore') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/explore/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Certificates</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/certificates') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/certificates/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('admin/journey') }}" data-key="t-level-2-2">Journey </a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span data-key="t-multi-level">About</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ url('admin/about-us') }}" data-key="t-level-2-2">About </a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Crew</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/crew') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/crew/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Our Story</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/our-story') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/our-story/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Locations</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/locations') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/locations/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <span data-key="t-multi-level">Careers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Careers</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/careers') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/careers/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Branches</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/career-branches') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/career-branches/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Departments</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/career-departments') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/career-departments/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        <span data-key="t-multi-level">Packages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Packages</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/packages') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/packages/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Package Points</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/package-points') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/package-points/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Package Faq</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/package-faq') }}" data-key="t-level-2-2">View </a></li>
                                <li><a href="{{ url('admin/package-faq/create') }}" data-key="t-level-2-1">Add </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <span data-key="t-multi-level">Footer Links</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ url('admin/terms-and-condition') }}" data-key="t-level-2-2">Terms And Conditions </a></li>
                        <li><a href="{{ url('admin/privacy-policy') }}" data-key="t-level-2-2">Privacy Policy </a></li>
                        <li><a href="{{ url('admin/contact-us') }}" data-key="t-level-2-2">Contact Us </a></li>
                    </ul>
                </li>

            </ul>

            {{-- <div class="card sidebar-alert shadow-none text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="{{ asset('admin/theme/assets/images/giftbox.png') }}" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13 text-dark">Upgrade your plan from a Free trial, to select ‘Business
                            Plan’.</p>
                        <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- Sidebar -->
    </div>
</div>
