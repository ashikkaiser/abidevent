<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="/admin/assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


    <title>{{ config('app.name', 'Event-Management') }}</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('admin/assets/img/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/vendor/css/rtl/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('admin/assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('admin/assets/css/demo.css') }}" />


    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/config.js') }}"></script>
    {{-- <script>
        window.templateCustomizer = new TemplateCustomizer({
            cssPath: '',
            themesPath: '',
            defaultShowDropdownOnHover: {{ $configData['showDropdownOnHover'] }}, // true/false (for horizontal layout only)
            displayCustomizer: {{ $configData['displayCustomizer'] }},
            lang: '{{ app()->getLocale() }}',
            pathResolver: function(path) {
                var resolvedPaths = {
                    // Core stylesheets
                    @foreach (['core'] as $name)
                        '{{ $name }}.css': '{{ asset(mix("assets/vendor/css{$configData['rtlSupport']}/{$name}.css")) }}',
                        '{{ $name }}-dark.css': '{{ asset(mix("assets/vendor/css{$configData['rtlSupport']}/{$name}-dark.css")) }}',
                    @endforeach

                    // Themes
                    @foreach (['default', 'bordered', 'semi-dark'] as $name)
                        'theme-{{ $name }}.css': '{{ asset(mix("assets/vendor/css{$configData['rtlSupport']}/theme-{$name}.css")) }}',
                        'theme-{{ $name }}-dark.css': '{{ asset(mix("assets/vendor/css{$configData['rtlSupport']}/theme-{$name}-dark.css")) }}',
                    @endforeach
                }
                return resolvedPaths[path] || path;
            },
            'controls': <?php echo json_encode($configData['customizerControls']); ?>,
        });
    </script> --}}
    @yield('css')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

                <div class="app-brand demo">
                    <a href="/home" class="app-brand-link">

                        {{-- <span class="app-brand-text demo menu-text fw-bold ms-2">MICROXEN</span> --}}
                        <div class="">
                            <img src="/frontend/images/logo.png" alt="" height="60px" width="100%">

                        </div>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
                        <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-divider mt-0"></div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->

                    <li class="menu-item">
                        <a href="{{ url('/home') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboards">Dashboards</div>
                        </a>
                    </li>
                    <!-- Apps & Pages -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">PLAYERS &amp;
                            EVENT INFO</span>
                    </li>

                    <li class="menu-item {{ request()->is('leaderboard/*') ? 'open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-check"></i>
                            <div data-i18n="LEADERBOARD">LEADERBOARD</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item {{ request()->is('leaderboard/1') ? 'active' : '' }}">
                                <a href="{{ route('leaderboard.index', '1') }}" class="menu-link">
                                    <div data-i18n="High School">High School </div>
                                </a>
                            </li>

                            <li class="menu-item {{ request()->is('leaderboard/2') ? 'active' : '' }}">
                                <a href="{{ route('leaderboard.index', '2') }}" class="menu-link">
                                    <div data-i18n="4 Year College">4 Year College</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('leaderboard/3') ? 'active' : '' }}">
                                <a href="{{ route('leaderboard.index', '3') }}" class="menu-link">
                                    <div data-i18n="2 Year/JUCO">2 Year/JUCO</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('leaderboard/4') ? 'active' : '' }}">
                                <a href="{{ route('leaderboard.index', '4') }}" class="menu-link">
                                    <div data-i18n="Free Agent/Post School">Free Agent/Post School</div>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="menu-item {{ request()->is('student/*') || request()->is('student') ? 'open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-check"></i>
                            <div data-i18n="PLAYERS">PLAYERS</div>
                        </a>
                        <ul class="menu-sub">

                            <li
                                class="menu-item {{ Route::currentRouteName() == 'athlete.create' ? 'active' : '' }}">
                                <a href="{{ route('athlete.create') }}" class="menu-link">
                                    <div data-i18n="Add Athlete">Add Athlete </div>
                                </a>
                            </li>

                            <li class="menu-item {{ Route::currentRouteName() == 'athlete.index' ? 'active' : '' }}">
                                <a href="{{ route('athlete.index') }}" class="menu-link">
                                    <div data-i18n="Athlete List">Athlete List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="menu-item {{ request()->is('recommended-player/*') || request()->is('student') ? 'open' : '' }}">
                        <a href="{{ route('recommended-player.index') }}" class="menu-link">
                            <i class='menu-icon bx bx-user-check'></i>
                            <div data-i18n="PLAYERS" class="text-uppercase">recommended player </div>
                        </a>

                    </li>
                    {{-- @php
                        dd(
                            Route::getFacadeRoot()
                                ->current()
                                ->uri(),
                        );
                    @endphp --}}

                    <li
                        class="menu-item {{ request()->is('admin/event/*') || request()->is('admin/event') ? 'open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="EVENTS">EVENTS</div>
                        </a>
                        <ul class="menu-sub">
                            <li
                                class="menu-item {{ request()->fullUrl() == url()->current() . '?type=indivudual' ? '' : '' }}">
                                <a href="{{ route('event.create') }}?type=indivudual" class="menu-link">
                                    <div data-i18n="Add Event">Add Indivudual Event </div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ request()->fullUrl() == url()->current() . '?type=showcase' ? '' : '' }}">
                                <a href="
                                {{ route('event.create') }}?type=showcase" class="menu-link">
                                    <div data-i18n="Add Event">Add Showcase Event </div>
                                </a>
                            </li>

                            <li
                                class="menu-item {{ request()->fullUrl() == url()->current() . '?type=indivudual' ? '' : '' }}">
                                <a href="{{ route('event.index') }}?type=indivudual" class="menu-link">
                                    <div data-i18n="Event List">Indivudual Event List</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ request()->fullUrl() == url()->current() . '?type=showcase' ? '' : '' }}">
                                <a href="{{ route('event.index') }}?type=showcase" class="menu-link">
                                    <div data-i18n="Event List">Showcase Event List</div>
                                </a>
                            </li>


                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Paid User">Paid User</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->is('news/*') || request()->is('news') ? 'open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="NEWS">NEWS</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item {{ Route::currentRouteName() == 'news.create' ? 'active' : '' }}">
                                <a href="{{ route('news.create') }}" class="menu-link">
                                    <div data-i18n="Add News">Add News </div>
                                </a>
                            </li>


                            <li class="menu-item {{ Route::currentRouteName() == 'news.index' ? 'active' : '' }}">
                                <a href="{{ route('news.index') }}" class="menu-link">
                                    <div data-i18n="News List">News List</div>
                                </a>
                            </li>


                        </ul>
                    </li>
                    </li>

                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">SETTINGS</span></li>
                    <li class="menu-item {{ Route::currentRouteName() == 'page.index' ? 'active' : '' }}">
                        <a href="{{ route('page.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-list-check"></i>
                            <div data-i18n="Site Settings">Page Settings</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::currentRouteName() == 'slider.index' ? 'active' : '' }}">
                        <a href="{{ route('slider.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Basic Settings">Slider </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="User Settings">User Settings</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('siteSettings') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="User Settings">Site Settings</div>
                        </a>
                    </li>
                    <li class="menu-item">

                        <a class="menu-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="menu-icon tf-icons bx bx-exit"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>



                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="container-fluid">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">


                                <!-- Style Switcher -->
                                <li class="nav-item me-2 me-xl-0">
                                    <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                        <i class="bx bx-sm"></i>
                                    </a>
                                </li>
                                <!--/ Style Switcher -->





                                <!-- User -->
                                {{-- <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                        data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            Menu
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                            <img src="{{ url('admin/assets/img/avatars/1.png') }}"
                                                                alt class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span
                                                            class="fw-semibold d-block lh-1">{{ 'Baseball data combine' }}</span>
                                                        <small>Admin</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>

                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>



                                        </li>
                                    </ul>
                                </li> --}}
                                <!--/ User -->
                            </ul>
                        </div>

                        <!-- Search Small Screens -->
                        <div class="navbar-search-wrapper search-input-wrapper d-none">
                            <input type="text" class="form-control search-input container-fluid border-0"
                                placeholder="Search..." aria-label="Search..." />
                            <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                        </div>
                    </div>
                </nav>

                <!-- / Navbar -->
                @yield('content')


                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">

                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/js/menu.js') }}"></script>
    @yield('js')
    <script src="/admin/assets/js/main.js"></script>
    <script>
        $(function() {
            $('aside a[href^="' + location.href + '"]').addClass('active');

        });
    </script>

</body>

</html>
