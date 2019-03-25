@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}

{!! BootForm::text(__('Name'), 'name')->required() !!}
{!! BootForm::text(__('Class'), 'class') !!}
<div class="form-group">
    {!! TranslatableBootForm::hidden('status')->value(0) !!}
    {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
</div>

@if ($model->id)

    <item-list-tree
        locale="{{ config('typicms.content_locale') }}"
        url-base="/api/menus/{{ $model->id }}/menulinks"
        fields="id,menu_id,page_id,position,parent_id"
        translatable-fields="status,title,url"
        table="menulinks"
        title="Menulinks"
    >

        <template slot="add-button">
            @include('core::admin._button-create', ['url' => route('admin::create-menulink', $model->id), 'module' => 'menulinks'])
        </template>

    </item-list-tree>

@endif
