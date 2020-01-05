<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Ugocarpool - Carpooling SAAS for Cameroun')">
    <meta name="author" content="@yield('meta_author', 'Arthur Monney')">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i" rel="stylesheet">

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    <link rel="stylesheet" href="{{ themes('public/css/app.css') }}">
    @notifyCss

    @stack('after-styles')
    @include('includes.ga')
</head>
<body>

    <div id="app">
        @include('partials.logged-in-as')
        @include('partials.nav')

        <div class="container">
            @include('partials.messages')
            @yield('content')
        </div><!-- container -->
    </div><!-- #app -->

    <!-- Scripts -->
    <script src="{{ themes('public/js/app.js') }}"></script>
    @stack('after-scripts')
    @include('notify::messages')
    @notifyJs

</body>
</html>
