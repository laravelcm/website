<!doctype html>
<html lang="{{ config('typicms.admin_locale') }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ auth()->user()->api_token ?? '' }}">
    <title>@yield('title') – Console {{ config('typicms.'.config('typicms.admin_locale').'.website_title') }}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#00795d">
    <meta name="theme-color" content="#fff">
    <meta name="mobile-web-app-capable" content="yes">
    @stack('css')
    <link href="{{ App::environment('production') ? mix('/css/admin.css') : asset('/css/admin.css') }}" rel="stylesheet">
</head>

<body ontouchstart="" class="@can('see-navbar')has-navbar @endcan @yield('bodyClass')">

@section('navbar')
    @include('core::_navbar')
@show

@section('otherSideLink')
    @include('core::admin._navbar-public-link')
@endsection

<div>

    <div class="row-offcanvas">

        @section('sidebar')
            @include('core::admin._sidebar')
        @show

        <div id="app" class="@section('mainClass')main @show">

            @section('errors')
                @if (!$errors->isEmpty())
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ __('The form contains errors:') }}
                        <ul class="mb-0">
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @show

            @yield('content')

        </div>

        @include('core::admin._javascript')

        <script src="{{ App::environment('production') ? mix('/js/admin.js') : asset('/js/admin.js') }}"></script>

        @stack('js')

        <script type="text/javascript">
            alertify.logPosition('bottom right');
            @if (session('message'))
                alertify.success('{{ session('message') }}');
            @endif
        </script>

    </div>

</div>

</body>
</html>
