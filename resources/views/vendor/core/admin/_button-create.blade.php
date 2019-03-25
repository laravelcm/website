@can ('create-'.Illuminate\Support\Str::singular($module))
<a class="btn btn-primary btn-sm header-btn-add mr-2" href="{{ $url ?? route('admin::create-'.Illuminate\Support\Str::singular($module)) }}">
    <span class="fa fa-plus text-white-50"></span> @lang('Add')
</a>
@endcan
