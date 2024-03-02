<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link href="{{ asset('/css/webly.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/theme.css') }}" rel="stylesheet" id="skin-default">
</head>

<body class="nk-body bg-lighter ">
    <div class="nk-app-root">
        <div class="nk-wrap ">
            <div class="nk-header is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-header-brand"></div>
                        <div class="nk-header-menu ml-auto" data-content="headerNav">
                            <ul class="nk-menu nk-menu-main ui-s2">
                                <li class="nk-menu-item">
                                    <a href="{{ route('dashboard') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('users.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Users</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('banner') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Banner</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('logout') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Logout</span>
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
