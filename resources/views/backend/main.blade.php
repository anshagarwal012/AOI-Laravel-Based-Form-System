<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link href="{{ asset('/css/webly.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/theme.css') }}" rel="stylesheet" id="skin-default">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="nk-body bg-lighter ">
    <div class="nk-app-root">
        <div class="nk-wrap ">
            <div class="nk-header is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap pb-0">
                        <div class="nk-header-brand">
                            <img src="{{ asset('/images/logo.png') }}" width="80">
                        </div>
                        <div class="nk-header-menu ml-auto" data-content="headerNav">
                            <ul class="nk-menu nk-menu-main ui-s2">
                                {{-- <li class="nk-menu-item">
                                    <a href="/admin/dashboard" class="nk-menu-link">
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li> --}}
                                <li class="nk-menu-item">
                                    <a href="/admin/registration-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Registration Form/Application Form</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/admin/membership-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Membership Form</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/admin/presentation-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Presentation Form</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/admin/fellowship-registration-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Fellowship Registration Form</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/admin/registration-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Registration Form</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-footer bg-white">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright mx-auto"> © 2024 ... Designed &amp; Developed By <a
                                href="https://www.weblytechnolab.com">Webly Technolab</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="{{ asset('/js/bundle.js') }}"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
</body>

</html>
