<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>{{ __('Join Laravel Cameroon on Slack') .' | '. __('The best Laravel & PHP developers in Cameroon') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">
    <meta http-equiv="content-language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="category" content="laravel, development, php, framework, javascript">
    <meta name="langage" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="copyright" content="//laravelcm.com">
    <!-- Fonts -->
    <link href="{{ Asset::path('application.css') }}" rel="stylesheet" type="text/css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#00795d">
    <meta name="theme-color" content="#fff">
    <meta name="mobile-web-app-capable" content="yes">

    <style>
        .site__bg {
            margin: 0;
            text-align: center;
            padding-top: 150px;
            color: #fff;
        }

        .slack_icon {
            margin-bottom: 25px;
        }

        .top__margin {
            margin-top: 50px;
        }
    </style>
</head>
<body class="site__bg">

    <div class="container text-center">

        <p class="slack_icon">
            <svg width="100" height="100" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
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
        </p>
        <h1 class="text-primary">Join &ldquo;{{ __('Laravel Cameroon') }}&rdquo; on Slack</h1>

        <div class="row justify-content-md-center top__margin">
            <div class="col-md-8 col-sm-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        <i class="fa fa-warning"></i> {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="text-center top__margin">
            <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Return to Homepage') }}</a>
        </div>
    </div>

</body>
</html>
