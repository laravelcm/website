<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
    @foreach(array_keys(config('locale.languages')) as $lang)
        @if($lang != app()->getLocale())
            <li class="kt-nav__item">
                <a href="{{ '/lang/'.$lang }}" class="kt-nav__link">
                    <span class="kt-nav__link-icon">
                        <img src="{{ themes('public/media/flags/'.$lang.'.svg') }}" alt="local {{ $lang }}" />
                    </span>
                    <span class="kt-nav__link-text">@lang('menus.language-picker.langs.'. $lang)</span>
                </a>
            </li>
        @endif
    @endforeach
</ul>
