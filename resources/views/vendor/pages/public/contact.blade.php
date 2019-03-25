@extends('core::public.master')
@section('title', __('Contact US'))

@section('content')

    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="card">
                        <h3>{{ __('Contact US') }}</h3>
                        <p>
                            {!! __("Si vous avez des tutoriels ou des packages à proposer contactez nous sur <a href='https://laravelcm.slack.com'>Slack</a> ou par mail via l'adresse laravelcm@gmail.com") !!}
                        </p>
                        <p>
                            {!! __("Pour toutes autres informations appelez les numeros suivants : (00237) 694 033 025 | 698 319 729") !!}
                        </p>
                        <p>
                            {!! __("Pour intégrer le groupe WhatsApp cliquez sur ce <a href='https://chat.whatsapp.com/JwldKQPI4qjD0bU2Sxia0K'>lien d'intégration</a>") !!}
                        </p>
                        <address>
                            Laravel Cameroon <br>
                            Douala, Cameroon <br>
                            Laravelcm.com
                        </address>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('pages::public.partials.sidebar', ['name' => __('Search Results'), 'value' => 0, 'hide' => true])
                </div>
            </div>
            <div class="adwords lcm-2"></div>
        </div>
    </section>

@endsection
