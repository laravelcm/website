@if (count($locales) > 1)
    <div class="btn-group btn-group-sm ml-auto">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownLangSwitcher" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span id="active-locale">{{ $locale ? : __('All languages') }}</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLangSwitcher">
            @foreach ($locales as $lang)
            <a class="dropdown-item btn-lang-js @if (!session('allLocalesInForm') && $lang == $locale)active @endif" href="#" data-locale="{{ $lang }}">@lang('languages.'.$lang)</a>
            @endforeach
            <div class="dropdown-divider"></div>
            <a class="dropdown-item btn-lang-js @if (session('allLocalesInForm'))active @endif" href="#" data-locale="all">@lang('All languages')</a>
        </div>
    </div>
@endif
