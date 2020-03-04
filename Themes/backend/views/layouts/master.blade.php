<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="crsf-token" content="{{ csrf_token() }}">
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
    @notifyCss
</head>
<body class="bg-gray-50 text-gray-600 leading-normal font-body">

    <div id="app" class="h-screen flex flex-col">

        @include('layouts._header')

        <div class="flex-1 flex overflow-hidden">

            @include('layouts._sidebar')

            <main class="flex-1 flex">
                <div class="flex-1 overflow-y-auto px-12 py-8">
                    @yield('content')
                </div>
            </main>

        </div>

    </div>

    <script src="{{ mix('/js/backend.js') }}" defer></script>
    @include("notify::messages")
    @notifyJs

</body>
</html>
