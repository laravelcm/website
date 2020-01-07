<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name()) | {{ app_name() }}</title>
    <meta name="description" content="@yield('meta_description', 'Laravel Cameroun Admin Panel')">
    <meta name="author" content="@yield('meta_author', 'Arthur Monney')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @yield('meta')
    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <!--end::Fonts -->
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ themes('public/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles -->

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#00795d">
    <meta name="theme-color" content="#fff">
    <meta name="mobile-web-app-capable" content="yes">

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href={{ themes('public/plugins/global/plugins.bundle.css') }} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ themes('public/css/style.css') }}" rel="stylesheet" type="text/css">
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ themes('public/css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ themes('public/css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ themes('public/css/skins/brand/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ themes('public/css/skins/aside/light.css') }}" rel="stylesheet" type="text/css" />
    @stack('after-styles')
    @notifyCss
</head>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

    @include('partials._header.base-mobile')

    <!-- begin:: Root -->
    <div class="kt-grid kt-grid--hor kt-grid--root">

        <!-- begin:: Page -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            @include('partials._aside.base')

            <!-- begin:: Wrapper -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                @include('partials._header.base')

                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <!-- begin:: Impersonate -->
                    @include('includes.partials.logged-in-as')
                    <!-- end:: Impersonate -->

                    @include('partials._subheader.subheader-v2')

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        @include('includes.partials.messages')
                        @yield('content')
                    </div>
                    <!-- end:: Content -->

                </div>

                @include('partials._footer.base')
            </div>

            <!-- end:: Wrapper -->
        </div>

        <!-- end:: Page -->
    </div>

    <!-- end:: Root -->

    <!-- begin:: Topbar Offcanvas Panels -->

    @include('partials._topbar.offcanvas.search')

    @include('partials._topbar.offcanvas.quick-actions')

    <!-- end:: Topbar Offcanvas Panels -->

    @include('partials._scrolltop')

    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#007A5E",
                    "metal": "#c4c5d6",
                    "light": "#ffffff",
                    "accent": "#00c5dc",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995",
                    "focus": "#0FC098"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ themes('public/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ themes('public/js/scripts.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ themes('public/js/app.js') }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
    @include('notify::messages')
    @notifyJs
    @stack('after-scripts')
</body>
</html>
