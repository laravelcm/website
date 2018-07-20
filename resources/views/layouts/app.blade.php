<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index,follow,noodp"><!-- All Search Engines -->
    <meta name="url" content="{{ url('/') }}">
    <meta http-equiv="content-language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="category" content="laravel, development, php, framework, javascript">
    <meta name="langage" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="copyright" content="//laravelcm.com">

    @if(Request::is( Config::get('chatter.routes.home')) )
        <title>Forum -  Laravel Cameroon</title>
    @elseif(Request::is( Config::get('chatter.routes.home') . '/' . Config::get('chatter.routes.category') . '/*' ) && isset( $discussion ) )
        <title>{{ $discussion->category->name }} - Laravel Cameroon</title>
    @else
        <title>@yield('title') - Laravel Cameroon</title>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- Open Graph Meta -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Laravel Cameroon">
    <meta property="og:langage" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@laravelcm">
    <meta name="twitter:creator" content="@laravelcm">
    @yield('meta')
    <!-- Styles -->
    @yield('css')
    <link href="{{ Asset::path('application.css') }}" rel="stylesheet" type="text/css">
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

</head>
<body>

    <span class="overlay"></span>
    <nav class="site_nav" id="site_nav">
        <div class="container">
            <div class="nav_header">
                <a href="{{ route('home') }}" class="nav__logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="84.1" height="57.6" viewBox="0 0 84.1 57.6">
                        <path fill="#00795D" d="M83.8 26.9c-.6-.6-8.3-10.3-9.6-11.9-1.4-1.6-2-1.3-2.9-1.2s-10.6 1.8-11.7 1.9c-1.1.2-1.8.6-1.1 1.6.6.9 7 9.9 8.4 12l-25.5 6.1L21.2 1.5c-.8-1.2-1-1.6-2.8-1.5C16.6.1 2.5 1.3 1.5 1.3c-1 .1-2.1.5-1.1 2.9S17.4 41 17.8 42c.4 1 1.6 2.6 4.3 2 2.8-.7 12.4-3.2 17.7-4.6 2.8 5 8.4 15.2 9.5 16.7 1.4 2 2.4 1.6 4.5 1 1.7-.5 26.2-9.3 27.3-9.8 1.1-.5 1.8-.8 1-1.9-.6-.8-7-9.5-10.4-14 2.3-.6 10.6-2.8 11.5-3.1 1-.3 1.2-.8.6-1.4zm-46.3 9.5c-.3.1-14.6 3.5-15.3 3.7-.8.2-.8.1-.8-.2-.2-.3-17-35.1-17.3-35.5-.2-.4-.2-.8 0-.8S17.6 2.4 18 2.4c.5 0 .4.1.6.4 0 0 18.7 32.3 19 32.8.4.5.2.7-.1.8zm40.2 7.5c.2.4.5.6-.3.8-.7.3-24.1 8.2-24.6 8.4-.5.2-.8.3-1.4-.6s-8.2-14-8.2-14L68.1 32c.6-.2.8-.3 1.2.3.4.7 8.2 11.3 8.4 11.6zm1.6-17.6c-.6.1-9.7 2.4-9.7 2.4l-7.5-10.2c-.2-.3-.4-.6.1-.7.5-.1 9-1.6 9.4-1.7.4-.1.7-.2 1.2.5.5.6 6.9 8.8 7.2 9.1.3.3-.1.5-.7.6z"></path>
                    </svg>
                    <span class="logo__title">{{ __('Laravel Cameroon') }}</span>
                </a>
                <button class="nav_hamberger js-menu-toogle" id="menu-drawer">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="nav__container">
                <ul class="main-menu">
                    <li class="menu__item"><a href="{{ route('blog') }}" class="{{ (url()->current() == route('blog'))? 'active' : '' }}">{{ __('Blog') }}</a></li>
                    <li class="menu__item"><a href="{{ route('chatter.home') }}" class="{{ (url()->current() == route('chatter.home'))? 'active' : '' }}">{{ __('Forum') }}</a></li>
                    <li class="menu__item"><a href="{{ route('tutorials') }}" class="{{ (url()->current() == route('tutorials'))? 'active' : '' }}">{{ __('Tutorials') }}</a></li>
                    <li class="menu__item"><a href="{{ route('packages') }}" class="{{ (url()->current() == route('packages'))? 'active' : '' }}">{{ __('Packages') }}</a></li>
                    <li class="menu__item"><a href="https://laravelevents.com" target="_blank">{{ __('Events') }}</a></li>
                    <li class="menu__item">
                        @if(LaravelLocalization::getCurrentLocale() == 'en')
                            <a rel="alternate" hreflang="fr" href="{{ LaravelLocalization::getLocalizedURL('fr', null, [], true) }}">
                                <i class="icon ion-android-globe"></i> Fr
                            </a>
                        @else
                            <a rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                <i class="icon ion-android-globe"></i> En
                            </a>
                        @endif
                    </li>

                </ul>
                <ul class="nav-social">
                    <li><a href="https://www.facebook.com/laravelcm"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/laravelcm"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://laravelcm.slack.com"><i class="fa fa-slack"></i></a></li>
                </ul>
                <div class="nav__search">
                    <form action="{{ route('search') }}" class="search">
                        <input type="text" placeholder="Search" name="q">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @include('layouts.siderbar')
    <main class="site-content">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px" viewBox="0 0 547 550.5">
                <g>
                    <path fill="#fff" d="M535.7,267.1c-0.3-1.1-0.8-2.2-1.5-3.1l-64.4-80.4c-2-2.4-5.1-3.5-8.2-2.8l-74.4,17.6c-2.6,0.6-4.8,2.5-5.7,5
    c-1,2.5-0.6,5.3,1,7.5l53.1,74.9l-106,28.8l-53.1,14.4L264,308.3L139.5,100.7c-1.7-2.8-4.8-4.3-8-3.9L18.1,112.1
    c-2.6,0.3-4.9,2-6.1,4.3c-1.2,2.3-1.2,5.1,0.1,7.5l50.3,94.6L145.5,375c1.8,3.3,5.6,5,9.3,4l114.2-31L330,449.8
    c1.5,2.5,4.2,3.9,6.9,3.9c0.9,0,1.8-0.1,2.7-0.5l177.8-62.2c2.4-0.8,4.3-2.8,5-5.2c0.8-2.4,0.4-5.1-1.1-7.1l-57.5-81.1l-1.6-2.3
    l35.6-9.7l32.2-8.8c2.6-0.7,4.7-2.7,5.6-5.3C536,270.2,536.1,268.6,535.7,267.1z M156.7,361.7L93,241.8L31.7,126.6l96.6-13
    l114.3,190.6l17.6,29.3L156.7,361.7z M501.9,379.4l-161.4,56.5l-55.4-92.4L408.3,310l37.2-10.1l1.7,2.4L501.9,379.4z M452.2,281.3
    l-49.6-69.9l57.8-13.6l53.5,66.8L452.2,281.3z"/>
                </g>
            </svg>
            <ul class="footer-social">
                <li class="social__item">
                    <a href="https://www.facebook.com/laravelcm">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 35C27.165 35 35 27.165 35 17.5C35 7.83502 27.165 0 17.5 0C7.83502 0 0 7.83502 0 17.5C0 27.165 7.83502 35 17.5 35Z" fill="#3B5998"/>
                            <path d="M10.104 11.394H6.981V22.835H2.25V11.394H2.74658e-07V7.374H2.25V4.774C2.25 2.914 3.134 -6.10352e-07 7.023 -6.10352e-07L10.523 0.0150007V3.915H7.988C7.84607 3.90807 7.70437 3.93264 7.57305 3.98694C7.44174 4.04124 7.32406 4.12393 7.22848 4.22907C7.13289 4.33422 7.06176 4.45921 7.02018 4.59509C6.97861 4.73097 6.96761 4.87437 6.988 5.015V7.381H10.524L10.104 11.394Z" transform="translate(11.7959 6.79102)" fill="white"/>
                        </svg>
                    </a>
                </li>
                <li class="social__item">
                    <a href="https://www.twitter.com/laravelcm">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 35C27.165 35 35 27.165 35 17.5C35 7.83502 27.165 0 17.5 0C7.83502 0 0 7.83502 0 17.5C0 27.165 7.83502 35 17.5 35Z" fill="#55ACEE"/>
                            <path d="M20.392 1.95892C19.6294 2.29697 18.8204 2.51876 17.992 2.61692C18.8659 2.0945 19.5199 1.27202 19.832 0.302923C19.011 0.790186 18.1127 1.13347 17.176 1.31792C16.5452 0.647462 15.711 0.203574 14.8026 0.0549409C13.8941 -0.0936922 12.9619 0.0612162 12.1504 0.495695C11.3388 0.930173 10.693 1.62 10.313 2.45845C9.93294 3.29689 9.83981 4.23722 10.048 5.13392C8.38469 5.05073 6.75748 4.61858 5.27206 3.86553C3.78665 3.11249 2.47626 2.0554 1.426 0.762922C0.891121 1.68387 0.727202 2.77401 0.967589 3.81154C1.20798 4.84906 1.83461 5.75604 2.72 6.34792C2.05584 6.32729 1.40632 6.14759 0.826001 5.82392C0.826001 5.84192 0.826001 5.85992 0.826001 5.87692C0.826478 6.84259 1.16089 7.77838 1.77255 8.52564C2.38421 9.2729 3.23547 9.78563 4.182 9.97692C3.56599 10.1442 2.91996 10.1688 2.293 10.0489C2.56104 10.8792 3.08177 11.6051 3.78242 12.125C4.48308 12.6449 5.32865 12.933 6.201 12.9489C4.44475 14.3247 2.21543 14.9495 3.8147e-07 14.6869C1.79793 15.8379 3.87238 16.4841 6.0059 16.5576C8.13943 16.6312 10.2535 16.1295 12.1264 15.1051C13.9993 14.0807 15.5622 12.5713 16.6512 10.7351C17.7402 8.899 18.3152 6.80372 18.316 4.66892C18.316 4.48792 18.316 4.30692 18.304 4.12792C19.1234 3.53639 19.8305 2.8032 20.392 1.96292V1.95892Z" transform="translate(7.82788 10.6182)" fill="#F1F2F2"/>
                        </svg>
                    </a>
                </li>
                <li class="social__item">
                    <a href="https://laravelcm.slack.com">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 35C27.165 35 35 27.165 35 17.5C35 7.83502 27.165 0 17.5 0C7.83502 0 0 7.83502 0 17.5C0 27.165 7.83502 35 17.5 35Z" fill="white"/>
                            <path d="M4.25996 1.50846C4.17132 1.23577 4.02983 0.983205 3.84358 0.765195C3.65733 0.547184 3.42996 0.367993 3.17446 0.237851C2.91896 0.10771 2.64033 0.0291674 2.35447 0.00670833C2.06862 -0.0157508 1.78114 0.0183132 1.50845 0.106955C1.23576 0.195598 0.983203 0.337082 0.765192 0.523331C0.547182 0.70958 0.36799 0.936945 0.237849 1.19245C0.107707 1.44795 0.0291676 1.72658 0.00670844 2.01243C-0.0157507 2.29829 0.0183164 2.58577 0.106959 2.85846L5.75196 20.2285C5.94777 20.7572 6.34051 21.1898 6.84797 21.4356C7.35544 21.6814 7.93829 21.7214 8.47459 21.5472C9.01088 21.3731 9.45905 20.9983 9.72528 20.5012C9.9915 20.0041 10.0552 19.4234 9.90295 18.8805C9.88795 18.8355 4.25996 1.50846 4.25996 1.50846Z" transform="translate(16.8811 5.24658)" fill="#FFC107"/>
                            <path d="M4.25996 1.50846C4.17131 1.23577 4.02983 0.983204 3.84358 0.765194C3.65733 0.547183 3.42996 0.367991 3.17446 0.23785C2.91896 0.107709 2.64033 0.0291691 2.35448 0.00670995C2.06862 -0.0157492 1.78115 0.0183141 1.50846 0.106956C1.23577 0.195599 0.983203 0.337082 0.765193 0.523331C0.547182 0.709579 0.367994 0.936943 0.237853 1.19244C0.107712 1.44794 0.029168 1.72658 0.0067089 2.01243C-0.0157502 2.29829 0.0183131 2.58577 0.106955 2.85846L5.75195 20.2265C5.94776 20.7552 6.3405 21.1878 6.84797 21.4336C7.35543 21.6794 7.9383 21.7194 8.47459 21.5452C9.01089 21.3711 9.45904 20.9963 9.72527 20.4992C9.9915 20.0021 10.0552 19.4214 9.90295 18.8785L4.25996 1.50846Z" transform="translate(8.13306 8.09351)" fill="#4CAF50"/>
                            <path d="M20.1446 4.25996C20.6953 4.08094 21.1523 3.69047 21.4152 3.17446C21.678 2.65846 21.7251 2.05918 21.5461 1.50846C21.3671 0.95774 20.9766 0.50068 20.4606 0.237847C19.9446 -0.0249848 19.3453 -0.0720636 18.7946 0.106958L1.42557 5.75396C0.896801 5.94977 0.464253 6.3425 0.218447 6.84997C-0.0273589 7.35744 -0.0673699 7.94031 0.106787 8.4766C0.280944 9.0129 0.65577 9.46104 1.15283 9.72727C1.64988 9.9935 2.23064 10.0572 2.77357 9.90496L20.1446 4.25996Z" transform="translate(8.10132 16.8801)" fill="#EC407A"/>
                            <path d="M1.349 5.50101L5.5 4.151L4.151 0L-2.68555e-06 1.35001L1.349 5.50101Z" transform="translate(11.7969 20.5459)" fill="#472A49"/>
                            <path d="M1.34899 5.50301C2.91899 4.99301 4.37699 4.52001 5.49999 4.15301L4.15099 -9.0332e-06L-1.19629e-05 1.35L1.34899 5.50301Z" transform="translate(20.5459 17.697)" fill="#CC2027"/>
                            <path d="M20.1545 4.25996C20.7053 4.08094 21.1623 3.69047 21.4251 3.17447C21.688 2.65846 21.7351 2.05918 21.556 1.50846C21.377 0.957735 20.9866 0.500686 20.4706 0.237854C19.9545 -0.0249784 19.3553 -0.0720648 18.8045 0.106956L1.43754 5.75196C0.905587 5.94543 0.469525 6.33786 0.221266 6.84656C-0.0269928 7.35525 -0.0680539 7.94047 0.106738 8.47884C0.281529 9.01722 0.658518 9.46671 1.15824 9.73256C1.65797 9.99841 2.24139 10.0599 2.78554 9.90396L20.1545 4.25996Z" transform="translate(5.24854 8.13306)" fill="#2196F3"/>
                            <path d="M1.348 5.50099L5.501 4.151C4.991 2.582 4.518 1.124 4.151 1.09863e-06L-3.2959e-06 1.35001L1.348 5.50099Z" transform="translate(8.95605 11.7981)" fill="#1A937D"/>
                            <path d="M1.34999 5.503L5.503 4.153C4.993 2.583 4.518 1.125 4.153 3.35693e-06L1.31836e-05 1.35L1.34999 5.503Z" transform="translate(17.7019 8.9541)" fill="#65863A"/>
                        </svg>
                    </a>
                </li>
            </ul>
            <ul class="footer-lara-links">
                <li class="link__laravel"><a href="https://laravel.com" target="_blank">Laravel</a></li>
                <li class="link__laravel-news"><a href="https://laravel-news.com" target="_blank">News</a></li>
                <li class="link__laravel-jobs"><a href="https://larajobs.com" target="_blank">Jobs</a></li>
                <li class="link__account"><a href="{{ route('users.account') }}">{{ __('My account') }}</a></li>
                <li class="link__contact"><a href="javascript:;">Contact</a></li>
            </ul>
            <ul class="footer-links">
                <li class="link__tutorials"><a href="{{ route('tutorials') }}">{{ __('Tutorials') }}</a></li>
                <li class="link__blog"><a href="{{ route('blog') }}">{{ __('Blog') }}</a></li>
                <li class="link__events"><a href="https://laravelevents.com">{{ __('Events') }}</a></li>
                <li class="link__packages"><a href="{{ route('packages') }}">{{ __('Packages') }}</a></li>
                <li class="link__github"><a href="https://github.com/laravelcm" target="_blank">Github</a></li>
            </ul>
            <p> &copy; Copyright {{ date('Y') }}</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="{{ Asset::path('application.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    @yield('js')
    @stack('scripts')
</body>
</html>
