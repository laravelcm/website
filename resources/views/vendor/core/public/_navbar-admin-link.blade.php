@if (isset($model))
<a class="nav-link" href="{{ $model->editUrl() }}?locale={{ config('app.locale') }}">
@elseif (isset($page) and $page->module and Route::has('admin::index-'.$page->module))
<a class="nav-link" href="{{ route('admin::index-'.$page->module) }}?locale={{ config('app.locale') }}">
@elseif (isset($page))
<a class="nav-link" href="{{ $page->editUrl() }}?locale={{ config('app.locale') }}">
@else
<a class="nav-link" href="{{ route('dashboard') }}">
@endif
{{ __('Back-office', [], config('typicms.admin_locale')) }}
</a>
