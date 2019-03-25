@if (isset($model) and $model->id)
<a class="nav-link" href="{{ TypiCMS::isLocaleEnabled($locale) ? url($model->uri($locale)) : url($model->uri()) }}">
@elseif ($module = Request::segment(2) and Route::has($locale.'::index-'.$module))
<a class="nav-link" href="{{ route($locale.'::index-'.$module) }}">
@else
<a class="nav-link" href="{{ url('/') }}">
@endif
{{ __('View website', [], config('typicms.admin_locale')) }}
</a>
