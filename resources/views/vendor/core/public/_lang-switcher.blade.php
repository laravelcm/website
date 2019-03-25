@if ($enabledLocales = TypiCMS::enabledLocales() and count($enabledLocales) > 1)
<nav class="lang-switcher dropdown">
    <button class="lang-switcher-btn btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownLangSwitcher">
        {{ $lang }}
    </button>
    <div class="lang-switcher-list dropdown-menu" aria-labelledby="dropdownLangSwitcher">
        @foreach ($enabledLocales as $locale)
            @if (isset($model) and isset($page))
                @if ($model->category and $model->translate('status', $locale))
                    <a class="lang-switcher-item dropdown-item" href="{{ url($page->uri($locale).'/'.$model->category->translate('slug', $locale).'/'.$model->translate('slug', $locale)) }}" @if ($locale == config('app.locale'))active @endif>{{ $locale }}</a>
                @elseif ($model->translate('status', $locale))
                    <a class="lang-switcher-item dropdown-item" href="{{ url($page->uri($locale).'/'.$model->translate('slug', $locale)) }}" @if ($locale == config('app.locale'))active @endif>{{ $locale }}</a>
                @else
                    <a class="lang-switcher-item dropdown-item" href="{{ url($page->uri($locale)) }}" @if ($locale == config('app.locale'))active @endif>{{ $locale }}</a>
                @endif
            @elseif (isset($page) && Route::current()->hasParameter('category'))
            <a class="lang-switcher-item dropdown-item" href="{{ url($page->uri($locale).'/'.$category->translate('slug', $locale)) }}" @if ($locale == config('app.locale'))active @endif>{{ $locale }}</a>
            @elseif (isset($page))
            <a class="lang-switcher-item dropdown-item" href="{{ url($page->uri($locale)) }}" @if ($locale == config('app.locale'))active @endif>{{ $locale }}</a>
            @else
            <a class="lang-switcher-item dropdown-item" href="{{ url('/') }}" @if ($locale == config('app.locale'))active @endif>{{ $locale }}</a>
            @endif
        @endforeach
    </div>
</nav>
@endif
