@can ($permission ?? 'update-'.Illuminate\Support\Str::singular($module))
<a class="btn btn-light btn-xs" :href="'{{ $segment ?? $module }}/'+model.id+'/edit'">@lang('Edit')</a>
@endcan
