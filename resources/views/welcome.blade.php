<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Cameroun</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <meta name="robots" content="index,follow,noodp"><!-- All Search Engines -->
        <meta name="url" content="{{ url('/') }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
        <meta name="category" content="laravel, development, php, framework, javascript">
        <meta name="langage" content="{{ app()->getLocale() }}">
        <meta name="copyright" content="//laravelcm.com">
        <!-- Facebook Meta -->
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Laravel Cameroon">
        <meta property="og:langage" content="{{ app()->getLocale() }}">
        <meta property="og:image" content="{{ asset('img/og-image.jpg') }}">
        <meta property="og:description" content="Official community of PHP and Laravel developers in Cameroon. Web artisan">
        <!-- Twitter Meta -->
        <meta name="twitter:url" content="{{ url('/') }}">
        <meta name="twitter:title" content="Laravel Cameroon Community">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@laravelcm">
        <meta name="twitter:creator" content="@laravelcm">
        <meta name="twitter:description" content="Official community of PHP and Laravel developers in Cameroon. Web artisan">
        <meta name="twitter:image" content="{{ asset('img/og-image.jpg') }}">
        <!-- Favicon -->
        <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}" sizes="180x180">
        <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-16x16.png') }}" sizes="16x16">
        <link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#00795d">
        <meta name="theme-color" content="#fff">
        <meta name="mobile-web-app-capable" content="yes">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121194903-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-121194903-1');

            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            img {
                width: 250px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ asset('img/logo-full.svg') }}" alt="Lavarel cameroun icon">
                </div>

                <div class="links">
                    <a href="https://facebook.com/laravelcm">Facebook</a>
                    <a href="https://twitter.com/laravelcm">Twitter</a>
                    <a href="https://github.com/laravelcm">GitHub</a>
                    <a href="https://laravelcm.slack.com">Slack</a>

                </div>
            </div>
        </div>
    </body>
</html>
