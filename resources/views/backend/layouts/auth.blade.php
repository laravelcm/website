<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta name="robots" content="noindex">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ app_name() }}</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="apple-mobile-web-app-title" content="{{ app_name() }}">
    <meta name="application-name" content="{{ app_name()  }}">
    <meta name="theme-color" content="#ffffff">
    {{ style(mix('css/login.css')) }}
</head>
<body class="my-login-page">

    <section class="wrapper">
        <div class="container h-100">
            @yield('content')
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>
    {!! script(mix('js/login.js')) !!}

</body>
</html>
