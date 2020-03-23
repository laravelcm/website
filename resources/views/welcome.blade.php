<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="crsf-token" content="{{ csrf_token() }}">
    <title>Laravel Cameroun</title>
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
</head>
<body class="bg-gray-200 text-gray-600 leading-normal font-body flex flex-col justify-between border-t-4 border-brand-primary pt-10 min-h-screen">

    <div class="container">
        <div class="flex items-center">
            <div class="w-full lg:w-1/2">
                <svg class="w-14 h-14" xmlns="http://www.w3.org/2000/svg">
                    <rect width="56" height="56" rx="10" fill="#fff"/>
                    <path d="M49.395 27.369a.89.89 0 00-.121-.238l-5.276-6.242a.703.703 0 00-.666-.221l-6.098 1.361a.661.661 0 00-.467.386.587.587 0 00.078.582l4.35 5.815-8.675 2.239-4.35 1.132-1.021-1.624L16.95 14.443a.66.66 0 00-.657-.295l-9.281 1.181a.669.669 0 00-.502.336.63.63 0 000 .582l4.117 7.349 6.808 12.146a.678.678 0 00.76.312l9.35-2.412 5.009 7.915a.657.657 0 00.57.303.66.66 0 00.217-.033l14.557-4.83a.656.656 0 00.415-.402.64.64 0 00-.087-.558l-4.714-6.29-.138-.18 2.915-.755 2.638-.68a.662.662 0 00.458-.41.547.547 0 00.009-.354zm-31.034 7.34L13.145 25.4 8.13 16.453l7.914-1.01 9.359 14.804 1.435 2.28-8.476 2.182zm28.266 1.377l-13.216 4.388-4.532-7.176 10.085-2.6 3.044-.787.139.18 4.48 5.995zm-4.065-7.619l-4.065-5.429 4.731-1.058 4.385 5.192-5.051 1.295z" fill="#00795D"/>
                </svg>
                <div class="mt-8 lg:mt-16">
                    <p class="text-sm font-semibold text-gray-800 uppercase tracking-wider">Coming soon</p>
                    <h1 class="mt-2 text-3xl leading-tight xl:text-4xl font-semibold font-display text-brand-primary">Laravel Cameroun</h1>
                    <p class="mt-3 text-lg max-w-xl lg:max-w-3xl xl:text-xl">
                        Rebranding du site, mise en avant des tutoriels, jobs, et ajout d’un forum inspiré de <a class="text-gray-700 font-medium hover:text-gray-900" href="https://laracasts.com/discuss" target="_blank">Laracasts</a>.
                        Un site plus frais, plus beau réalisé en utilisant <a class="text-gray-700 font-medium hover:text-gray-900" href="https://tailwindcss.com" target="_blank">Tailwindcss</a> et
                        <a class="text-gray-700 font-medium hover:text-gray-900" href="https://inertiajs.com" target="_blank">InertiaJS</a>.
                    </p>
                </div>
                <div class="mt-10">
                    <p class="text-sm xl:text-base font-medium text-gray-700 mb-3">Abonnez-vous pour etre informé de la prochaine mise en ligne du site.</p>
                    <form action="https://laravelcm.us4.list-manage.com/subscribe/post?u=0642d391e4785535c232a8c66&amp;id=6ff87af677" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="sm:flex relative" target="_blank" novalidate>
                        <input type="email" value="" name="EMAIL" id="mce-EMAIL" class="bg-white rounded-md py-3 px-5 focus:outline-none focus:shadow-outline-brand sm:max-w-sm w-full" placeholder="Entrer votre adresse email" />
                        <input type="hidden" name="b_0642d391e4785535c232a8c66_6ff87af677" tabindex="-1" value="">
                        <button type="submit" class="btn btn-primary font-medium w-full mt-4 sm:mt-0 sm:w-auto sm:ml-4 py-3 px-4">S'abonner</button>
                    </form>
                </div>
            </div>
            <div class="hidden lg:flex lg:w-1/2">
                <img class="ml-auto" src="{{ asset('img/illustration.svg') }}" alt="illustration">
            </div>
        </div>
    </div>
    <div>
        <svg class="w-full h-24" xmlns="http://www.w3.org/2000/svg"><path d="M1440 96L0 0v96h1440z" fill="#fff"/></svg>
        <div class="bg-gradient-white flex items-center h-20">
            <div class="container">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-xs mb-4 md:mb-0">© 2018 - {{ date('Y') }} Laravel Cameroun | Tous droits reservés. </p>
                    <div class="flex space-x-4 text-xs text-gray-700">
                        <a href="https://facebook.com/laravelcm" class="hover:text-brand-primary" target="_blank">Facebook</a>
                        <a href="https://twitter.com/laravelcm" class="hover:text-brand-primary" target="_blank">Twitter</a>
                        <a href="https://github.com/laravelcm" class="hover:text-brand-primary" target="_blank">Github</a>
                        <a href="https://www.youtube.com/channel/UCbQPQ8q31uQmuKtyRnATLSw" class="hover:text-brand-primary" target="_blank">YouTube</a>
                        <a href="{{ route('slack') }}" class="hover:text-brand-primary">Slack</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
