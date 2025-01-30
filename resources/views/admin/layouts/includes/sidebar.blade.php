<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                {{-- @if (auth()->user()->hasPermissionTo('dashboard')) --}}
                <li>
                    <a href="{{ url('admin/dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/profile') }}">
                        <i data-feather="user"></i>
                        <span data-key="t-user">Profile</span>
                    </a>
                </li>
                {{-- @endif --}}
                @if (auth()->user()->hasPermissionTo('pages'))
                    <li>
                        <a href="{{ url('admin/pages') }}">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <span data-key="t-dashboard">Pages</span>
                        </a>
                    </li>
                @endif
                {{-- @if (auth()->user()->hasPermissionTo('roles')) --}}
                @if (auth()->user()->hasPermissionTo('roles'))
                    <li>
                        <a href="{{ url('admin/roles') }}">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <span data-key="t-dashboard">Roles & Permissions</span>
                        </a>
                    </li>
                @endif
                {{-- @endif --}}
                {{-- @if (auth()->user()->hasPermissionTo('sub-admin')) --}}
                @if (auth()->user()->hasPermissionTo('sub-admin'))
                    <li>
                        <a href="{{ url('admin/sub-admin') }}">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <span data-key="t-dashboard">Sub Admin</span>
                        </a>
                    </li>
                @endif
                {{-- @endif --}}
                @if (auth()->user()->hasPermissionTo('home') ||
                        auth()->user()->hasPermissionTo('banners') ||
                        auth()->user()->hasPermissionTo('banners-create') ||
                        auth()->user()->hasPermissionTo('testimonials') ||
                        auth()->user()->hasPermissionTo('testimonials-create'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span data-key="t-multi-level">Home</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            @if (auth()->user()->hasPermissionTo('home'))
                                <li><a href="{{ url('admin/home') }}" data-key="t-level-2-2">Home </a></li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('banners') || auth()->user()->hasPermissionTo('banners-create'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Banners</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        @if (auth()->user()->hasPermissionTo('banners'))
                                            <li><a href="{{ url('admin/banners') }}" data-key="t-level-2-2">View </a>
                                            </li>
                                        @endif
                                        @if (auth()->user()->hasPermissionTo('banners-create'))
                                            <li><a href="{{ url('admin/banners/create') }}" data-key="t-level-2-1">Add
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif


                            {{-- <li>
                                                        <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Who We Are</a>
                                                        <ul class="sub-menu" aria-expanded="true">
                                                            <li><a href="{{ url('admin/who-we-are') }}" data-key="t-level-2-2">View </a></li>
                                                            <li><a href="{{ url('admin/who-we-are/create') }}" data-key="t-level-2-1">Add </a></li>
                                                        </ul>
                                                                            </li> --}}
                            @if (auth()->user()->hasPermissionTo('testimonials') || auth()->user()->hasPermissionTo('testimonials-create'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow"
                                        data-key="t-level-1-2">Testimonials</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        @if (auth()->user()->hasPermissionTo('testimonials'))
                                            <li><a href="{{ url('admin/testimonials') }}" data-key="t-level-2-2">View
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth()->user()->hasPermissionTo('testimonials-create'))
                                            <li><a href="{{ url('admin/testimonials-create') }}"
                                                    data-key="t-level-2-1">Add </a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('faq') || auth()->user()->hasPermissionTo('faq-create'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Faq</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/faq') }}" data-key="t-level-2-2">View </a></li>
                                        @if (auth()->user()->hasPermissionTo('faq-create'))
                                            <li><a href="{{ url('admin/faq/create') }}" data-key="t-level-2-1">Add </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('blog-contents') ||
                                    auth()->user()->hasPermissionTo('blogs-create') ||
                                    auth()->user()->hasPermissionTo('blogs'))
                                <li><a href="{{ url('admin/blog-contents') }}" data-key="t-level-2-2">Blog Contents
                                    </a></li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('blogs'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Blogs</a>
                                    <ul class="sub-menu" aria-expanded="true">

                                        <li><a href="{{ url('admin/blogs') }}" data-key="t-level-2-2">View </a></li>
                                        @if (auth()->user()->hasPermissionTo('blogs-create'))
                                            <li><a href="{{ url('admin/blogs/create') }}" data-key="t-level-2-1">Add
                                                </a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('explore'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Explore</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/explore') }}" data-key="t-level-2-2">View </a></li>
                                        <li><a href="{{ url('admin/explore/create') }}" data-key="t-level-2-1">Add </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('certificates'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow"
                                        data-key="t-level-1-2">Certificates</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/certificates') }}" data-key="t-level-2-2">View </a>
                                        </li>
                                        <li><a href="{{ url('admin/certificates/create') }}" data-key="t-level-2-1">Add
                                            </a></li>
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('journey'))
                                <li><a href="{{ url('admin/journey') }}" data-key="t-level-2-2">Journey </a></li>
                            @endif
                        </ul>
                    </li>
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('service-contents') ||
                        auth()->user()->hasPermissionTo('service-categories') ||
                        auth()->user()->hasPermissionTo('services-create') ||
                        auth()->user()->hasPermissionTo('sub-services') ||
                        auth()->user()->hasPermissionTo('sub-services-create') ||
                        auth()->user()->hasPermissionTo('service-points') ||
                        auth()->user()->hasPermissionTo('service-points-create') ||
                        auth()->user()->hasPermissionTo('sub-service-points') ||
                        auth()->user()->hasPermissionTo('service-faq') ||
                        auth()->user()->hasPermissionTo('service-faq-create') ||
                        auth()->user()->hasPermissionTo('sub-service-point-contents'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span data-key="t-multi-level">Services</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            @if (auth()->user()->hasPermissionTo('service-contents'))
                                <li><a href="{{ url('admin/service-contents') }}" data-key="t-level-2-2">Service
                                        Contents
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('service-categories'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Service
                                        Categories</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/service-categories') }}"
                                                data-key="t-level-2-2">View
                                            </a></li>
                                        <li><a href="{{ url('admin/service-categories/create') }}"
                                                data-key="t-level-2-1">Add </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('services'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow"
                                        data-key="t-level-1-2">Services</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/services') }}" data-key="t-level-2-2">View </a>
                                        </li>
                                        <li><a href="{{ url('admin/services/create') }}" data-key="t-level-2-1">Add
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermissionTo('service-points'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Service
                                        Points</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/service-points') }}" data-key="t-level-2-2">View
                                            </a>
                                        </li>
                                        @if (auth()->user()->hasPermissionTo('service-points-create'))
                                            <li><a href="{{ url('admin/service-points/create') }}"
                                                    data-key="t-level-2-1">Add </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasAnyPermission(['service-faq', 'service-faq-create']))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Service
                                        Faq</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/service-faq') }}" data-key="t-level-2-2">View</a>
                                        </li>
                                        @if (auth()->user()->hasPermissionTo('service-faq-create'))
                                            <li><a href="{{ url('admin/service-faq/create') }}"
                                                    data-key="t-level-2-1">Add</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('sub-services'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Sub
                                        Services</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/sub-services') }}" data-key="t-level-2-2">View
                                            </a>
                                        </li>
                                        <li><a href="{{ url('admin/sub-services/create') }}"
                                                data-key="t-level-2-1">Add
                                            </a></li>
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('sub-service-points'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Sub
                                        Service
                                        Points</a>
                                    <ul class="sub-menu" aria-expanded="true">

                                        <li><a href="{{ url('admin/sub-service-points') }}"
                                                data-key="t-level-2-2">View
                                            </a></li>
                                        @if (auth()->user()->hasPermissionTo('sub-service-points-create'))
                                            <li><a href="{{ url('admin/sub-service-points/create') }}"
                                                    data-key="t-level-2-1">Add
                                                </a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            {{-- @if (auth()->user()->hasPermissionTo('service-faq') || auth()->user()->hasPermissionTo('service-faq-create'))                <li>
                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Service Faq</a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ url('admin/service-faq') }}" data-key="t-level-2-2">View </a></li>
                        @if (auth()->user()->hasPermissionTo('service-faq-create'))
                            <li><a href="{{ url('admin/service-faq/create') }}" data-key="t-level-2-1">Add </a></li>
                        @endif
                    </ul>

            @endif --}}
                            {{-- </li> --}}







                            @if (auth()->user()->hasPermissionTo('sub-service-faq'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Sub
                                        Service
                                        Faq</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/sub-service-faq') }}" data-key="t-level-2-2">View
                                            </a>
                                        </li>
                                        @if (auth()->user()->hasPermissionTo('service-faq-create'))
                                            <li><a href="{{ url('admin/sub-service-faq/create') }}"
                                                    data-key="t-level-2-1">Add </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('sub-service-point-contents'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Sub Service
                                        Contents</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/sub-service-point-contents') }}"
                                                data-key="t-level-2-2">View </a>
                                        </li>
                                        @if (auth()->user()->hasPermissionTo('sub-service-point-contents-create'))
                                            <li><a href="{{ url('admin/sub-service-point-contents/create') }}"
                                                    data-key="t-level-2-1">Add </a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('about-us'))
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


                            @if (auth()->user()->hasPermissionTo('our-story'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Our
                                        Story</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/our-story') }}" data-key="t-level-2-2">View </a>
                                        </li>
                                        @if (auth()->user()->hasPermissionTo('our-story-create'))
                                            <li><a href="{{ url('admin/our-story/create') }}"
                                                    data-key="t-level-2-1">Add </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('locations'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow"
                                        data-key="t-level-1-2">Locations</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ url('admin/locations') }}" data-key="t-level-2-2">View </a>
                                        </li>
                                        @if (auth()->user()->hasPermissionTo('locations-create'))
                                            <li><a href="{{ url('admin/locations/create') }}"
                                                    data-key="t-level-2-1">Add </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                    {{-- </ul> --}}
                @endif
                {{-- @if (auth()->user()->hasPermissionTo('career-contents'))
            <li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span data-key="t-multi-level">Careers</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li>
                        <a href="{{ url('admin/career-contents') }}" data-key="t-level-2-2">Career Contents</a>
                    </li>
                    @if (auth()->user()->hasPermissionTo('careers'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Careers</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('admin/careers') }}" data-key="t-level-2-2">View</a></li>
                            </ul>
                        </li>
                    @endif
                    @if (auth()->user()->hasPermissionTo('careers-create'))
                        <li><a href="{{ url('admin/careers/create') }}" data-key="t-level-2-1">Add</a></li>
                    @endif
                </ul>

                         @endif

            @if (auth()->user()->hasPermissionTo('career-branches'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Branches</a>
                    <ul class="sub-menu" aria-expanded="true">
                        @if (auth()->user()->hasPermissionTo('career-branches'))
                        <li><a href="{{ url('admin/career-branches') }}" data-key="t-level-2-2">View </a></li>
                        @endif
                        @if (auth()->user()->hasPermissionTo('career-branches-create'))
                            <li><a href="{{ url('admin/career-branches/create') }}" data-key="t-level-2-1">Add
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasPermissionTo('career-departments'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Departments</a>
                    <ul class="sub-menu" aria-expanded="true">
                        @if (auth()->user()->hasPermissionTo('career-departments'))
                        <li><a href="{{ url('admin/career-departments') }}" data-key="t-level-2-2">View </a></li>
                        @endif
                        @if (auth()->user()->hasPermissionTo('career-departments-create'))
                            <li><a href="{{ url('admin/career-departments/create') }}" data-key="t-level-2-1">Add
                                </a></li>
                        @endif
                    </ul>
                </li>
            @endif
            </ul>
            </li>
        </li>
            @endif --}}
                @if (auth()->user()->hasPermissionTo('career-contents') ||
                        auth()->user()->hasPermissionTo('careers') ||
                        auth()->user()->hasPermissionTo('careers-create') ||
                        auth()->user()->hasPermissionTo('career-branches') ||
                        auth()->user()->hasPermissionTo('career-branches-create') ||
                        auth()->user()->hasPermissionTo('career-departments'))

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span data-key="t-multi-level">Careers</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            @if (auth()->user()->hasPermissionTo('career-contents'))
                                <li>
                                    <a href="{{ url('admin/career-contents') }}" data-key="t-level-2-2">Career
                                        Contents</a>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('careers'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow"
                                        data-key="t-level-1-2">Careers</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        @if (auth()->user()->hasPermissionTo('careers-create'))
                                            <li><a href="{{ url('admin/careers/create') }}"
                                                    data-key="t-level-2-1">Add</a></li>
                                        @endif
                                        <li><a href="{{ url('admin/careers') }}" data-key="t-level-2-2">View</a></li>
                                    </ul>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermissionTo('career-branches') || auth()->user()->hasPermissionTo('career-branches-create'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow"
                                        data-key="t-level-1-2">Branches</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        @if (auth()->user()->hasPermissionTo('career-branches'))
                                            <li><a href="{{ url('admin/career-branches') }}"
                                                    data-key="t-level-2-2">View</a></li>
                                        @endif
                                        @if (auth()->user()->hasPermissionTo('career-branches-create'))
                                            <li><a href="{{ url('admin/career-branches/create') }}"
                                                    data-key="t-level-2-1">Add</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('career-departments'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow"
                                        data-key="t-level-1-2">Departments</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        @if (auth()->user()->hasPermissionTo('career-departments'))
                                            <li><a href="{{ url('admin/career-departments') }}"
                                                    data-key="t-level-2-2">View</a></li>
                                        @endif
                                        @if (auth()->user()->hasPermissionTo('career-departments-create'))
                                            <li><a href="{{ url('admin/career-departments/create') }}"
                                                    data-key="t-level-2-1">Add</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif






                {{-- @if (auth()->user()->hasPermissionTo('career-departments')) --}}
                @if (auth()->user()->hasPermissionTo('package-contents') ||
                        auth()->user()->hasPermissionTo('packages') ||
                        auth()->user()->hasPermissionTo('packages-create') ||
                        auth()->user()->hasPermissionTo('package-points') ||
                        auth()->user()->hasPermissionTo('package-points-create') ||
                        auth()->user()->hasPermissionTo('package-faq'))

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                            <span data-key="t-multi-level">Packages</span>
                        </a>
                        @if (auth()->user()->hasPermissionTo('package-contents') ||
                                auth()->user()->hasPermissionTo('packages') ||
                                auth()->user()->hasPermissionTo('packages-create'))

                            <ul class="sub-menu" aria-expanded="true">
                                @if (auth()->user()->hasPermissionTo('package-contents'))
                                    <li><a href="{{ url('admin/package-contents') }}" data-key="t-level-2-2">Package
                                            Contents
                                        </a></li>
                                @endif
                                @if (auth()->user()->hasPermissionTo('packages'))
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow"
                                            data-key="t-level-1-2">Packages</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="{{ url('admin/packages') }}" data-key="t-level-2-2">View
                                                </a>
                                            </li>
                                            @if (auth()->user()->hasPermissionTo('packages-create'))
                                                <li><a href="{{ url('admin/packages/create') }}"
                                                        data-key="t-level-2-1">Add
                                                    </a></li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                                @if (auth()->user()->hasPermissionTo('package-points') || auth()->user()->hasPermissionTo('package-points-create'))
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow"
                                            data-key="t-level-1-2">Package
                                            Points</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            @if (auth()->user()->hasPermissionTo('package-points'))
                                                <li><a href="{{ url('admin/package-points') }}"
                                                        data-key="t-level-2-2">View
                                                    </a></li>
                                            @endif
                                            @if (auth()->user()->hasPermissionTo('package-points-create'))
                                                <li><a href="{{ url('admin/package-points/create') }}"
                                                        data-key="t-level-2-1">Add </a></li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                                @if (auth()->user()->hasPermissionTo('package-faq') || auth()->user()->hasPermissionTo('package-faq-create'))

                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow"
                                            data-key="t-level-1-2">Package
                                            Faq</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="{{ url('admin/package-faq') }}" data-key="t-level-2-2">View
                                                </a>
                                            </li>
                                            @if (auth()->user()->hasPermissionTo('package-faq-create'))
                                                <li><a href="{{ url('admin/package-faq/create') }}"
                                                        data-key="t-level-2-1">Add </a></li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('terms-and-condition'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="fa fa-link" aria-hidden="true"></i>
                            <span data-key="t-multi-level">Footer Links</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ url('admin/terms-and-condition') }}" data-key="t-level-2-2">Terms And
                                    Conditions </a></li>
                            @if (auth()->user()->hasPermissionTo('privacy-policy'))
                                <li><a href="{{ url('admin/privacy-policy') }}" data-key="t-level-2-2">Privacy Policy
                                    </a></li>
                            @endif
                            {{-- <li><a href="{{ url('admin/contact-us') }}" data-key="t-level-2-2">Contact Us </a></li> --}}
                        </ul>
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('contact-us') ||
                        auth()->user()->hasPermissionTo('applied-career') ||
                        auth()->user()->hasPermissionTo('eligibility-check') ||
                        auth()->user()->hasPermissionTo('news-letter'))
                    <li>

                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                            <span data-key="t-multi-level">Contact</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            @if (auth()->user()->hasPermissionTo('news-letter'))
                                <li><a href="{{ url('admin/news-letter') }}" data-key="t-level-2-2">News Letter </a>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('contact-us'))
                                <li><a href="{{ url('admin/contact') }}" data-key="t-level-2-2">Contact Us </a></li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('applied-career'))
                                <li><a href="{{ url('admin/applied-career') }}" data-key="t-level-2-2">Career </a>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermissionTo('eligibility-check'))
                                <li><a href="{{ url('admin/eligibility-check') }}" data-key="t-level-2-2">Eligibility
                                        Check </a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->hasPermissionTo('settings'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="fa fa-solid fa-gear" aria-hidden="true"></i>
                            <span data-key="t-multi-level">Settings</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            @if (auth()->user()->hasPermissionTo('settings'))
                                <li><a href="{{ url('admin/settings') }}" data-key="t-level-2-2">Settings </a>
                                </li>
                            @endif
                        </ul>

                    </li>
                @endif

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
