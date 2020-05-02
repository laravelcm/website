<div class="js-cookie-consent flex fixed bottom-0 left-0 right justify-center items-center md:h-24 w-full">
    <div class="cookie-consent bg-white w-auto px-6 py-3 shadow-xl flex items-center md:rounded-full text-sm">

        <span class="cookie-consent__message mr-4">
            <span class="text-lg mr-1">🍪</span>
            {!! trans('cookieConsent::texts.message') !!}
        </span>

        <a href="javascript:;" class="js-cookie-consent-agree cookie-consent__agree text-sm link underline-animate">
            {{ trans('cookieConsent::texts.agree') }}
        </a>

    </div>
</div>
