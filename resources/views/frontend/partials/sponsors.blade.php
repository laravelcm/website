<section class="sponsors">
    <div class="container">
        <h2 class="sponsors__title">{{ __('Our Sponsors') }}</h2>
        <p class="sponsors_text">{{ __('The companies that help make the community a success.') }}</p>
        <ul class="sponsors_list">
            <li class="sponsor">
                <a href="https://www.johns-corporation.com" class="jc_sponsor">
                    <img src="{{ asset('img/partners/logo-jc.svg') }}" alt="John's Corporation Logo">
                </a>
            </li>
            <li class="sponsor">
                <a href="https://diool.com" class="diool_sponsor">
                    <img src="{{ asset('img/partners/logo-diool.svg') }}" alt="Diool Logo">
                </a>
            </li>
            <li class="sponsor">
                <a href="https://www.bhent.net/" class="bhent_sponsor">
                    <img src="{{ asset('img/partners/bhent-logo.svg') }}" alt="Bhent Logo" style="height: auto">
                </a>
            </li>
        </ul>
        <a href="javascript:;" class="btn btn-primary" target="_blank">{{ __('Become a Sponsor') }} <i class="icon ion-ios-arrow-forward"></i></a>
    </div>
</section>
