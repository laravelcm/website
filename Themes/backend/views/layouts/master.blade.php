<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="locale" content="{{ app()->getLocale() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name()) - Laravel Admin</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#00795d">
    <meta name="theme-color" content="#fff">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900">
    <link href="{{ mix('/css/application.css') }}" rel="stylesheet" />
    @stack('styles')
    @notifyCss
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-600 leading-normal font-body">

    <div id="app" class="h-screen flex flex-col" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">

        @include('partials._header')

        @include('partials._sidebar-mobile')

        <div class="h-screen flex overflow-hidden">
            @include('partials._sidebar')
            <div class="flex flex-col w-0 flex-1 overflow-hidden">
                <main class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none" tabindex="0" x-data x-init="$el.focus()">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 md:px-8 lg:px-12">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="{{ mix('/js/backend.js') }}" defer></script>
    @include("notify::messages")
    @notifyJs
    @livewireScripts
    @stack('scripts')

</body>
</html>
