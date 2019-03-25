<div class="btn-toolbar mb-4">
    <button class="btn btn-sm btn-primary mr-2" value="true" id="exit" name="exit" type="submit">{{ __('Save and exit') }}</button>
    <button class="btn btn-sm btn-light mr-2" type="submit">{{ __('Save') }}</button>
    @include('core::admin._lang-switcher-for-form')
</div>

<div class="row">

    {!! BootForm::hidden('id') !!}
    {!! BootForm::hidden('menu_id')->value($menu->id) !!}
    {!! BootForm::hidden('position') !!}
    {!! BootForm::hidden('parent_id') !!}

    <div class="col-sm-6">
        {!! TranslatableBootForm::text(__('Title'), 'title') !!}
        {!! TranslatableBootForm::text(__('Url'), 'url')->placeholder('http://') !!}
        <div class="form-group">
            {!! TranslatableBootForm::hidden('status')->value(0) !!}
            {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
        </div>
    </div>

    <div class="col-sm-6">
        {!! BootForm::select(__('Page'), 'page_id', Pages::allForSelect()) !!}
        <div class="form-group">
            {!! BootForm::hidden('has_categories')->value(0) !!}
            {!! BootForm::checkbox(__('Show categories'), 'has_categories') !!}
        </div>
        {!! BootForm::select(__('Target'), 'target', ['' => __('Active tab'), '_blank' => __('New tab')]) !!}
        {!! BootForm::text(__('Class'), 'class') !!}
        {!! BootForm::text(__('Icon class'), 'icon_class') !!}
    </div>

</div>
