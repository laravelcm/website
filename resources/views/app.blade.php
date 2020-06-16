<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="crsf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Arthur Monney">
    <!-- Meta -->
    <title>{{ $title ?? "Communauté Laravel & PHP Cameroun" }} - Laravel Cameroun</title>
    <meta name='description' itemprop='description' content="{{ $description ?? "Bienvenue sur le site de la communauté des développeurs PHP et Laravel du Cameroun, le plus gros rassemblement de développeurs au Cameroun." }}" />
    <meta name='keywords' content="laravel, php, Cameroun, developers, tutorials, formations, jobs" />

    <meta property="og:description" content="{{ $description ?? "Bienvenue sur le site de la communauté des développeurs PHP et Laravel du Cameroun, le plus gros rassemblement de développeurs au Cameroun." }}" />
    <meta property="og:title" content="{{ $title ?? "Communauté Laravel & PHP Cameroun" }}" />
    <meta property="og:url" content="{{ $openGraphURL ?? url('/') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="fr-FR" />
    <meta property="og:site_name" content="Communauté Laravel & PHP Cameroun" />
    <meta property="og:image:url" content="{{ $OpenGraphImage ?? asset('/img/preview-site.png') }}" />

    <meta name="twitter:url" content="{{ $openGraphURL ?? url('/') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? "Communauté Laravel & PHP Cameroun" }}" />
    <meta name="twitter:site" content="@laravelcm" />
    <meta name="twitter:creator" content="@laravelcm" />
    <meta name="twitter:description" content="{{ $description ?? "Bienvenue sur le site de la communauté des développeurs PHP et Laravel du Cameroun, le plus gros rassemblement de développeurs au Cameroun." }}" />
    <meta name="twitter:image" content="{{ $OpenGraphImage ?? asset('/img/preview-site.png') }}" />
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
    @include('partials.ga')
    @notifyCss
</head>
<body class="bg-gray-50 text-gray-600 leading-normal font-body">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-549VBWB" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    @inertia
    @include('cookieConsent::index')

    <script src="{{ mix('/js/app.js') }}" defer></script>
    @include("notify::messages")
    @notifyJs
</body>
</html>
