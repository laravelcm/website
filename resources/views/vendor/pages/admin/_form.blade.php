@push('js')
    <script src="{{ asset('components/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.3/ace.js"></script>
    <script>
      var jsEditor = ace.edit("js", {
        theme: "ace/theme/monokai",
        mode: "ace/mode/javascript",
        minLines: 20,
        maxLines: 150,
        wrap: true,
        autoScrollEditorIntoView: true
      });

      var cssEditor = ace.edit("css", {
        theme: "ace/theme/monokai",
        mode: "ace/mode/css",
        minLines: 20,
        maxLines: 150,
        wrap: true,
        autoScrollEditorIntoView: true,
      });
    </script>
@endpush

@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}
{!! BootForm::hidden('position')->value($model->position ?: 0) !!}
{!! BootForm::hidden('parent_id') !!}

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="#tab-content" data-target="#tab-content" data-toggle="tab">{{ __('Content') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#tab-meta" data-target="#tab-meta" data-toggle="tab">{{ __('Meta') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#tab-options" data-target="#tab-options" data-toggle="tab">{{ __('Options') }}</a>
    </li>
</ul>

<div class="tab-content">

    <div class="tab-pane fade show active" id="tab-content">

        <filepicker related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></filepicker>
        <files related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></files>

        <div class="row">
            <div class="col-md-6">
                {!! TranslatableBootForm::text(__('Title'), 'title') !!}
            </div>
            <div class="col-md-6">
            @foreach ($locales as $lang)
                <div class="form-group form-group-translation">
                    <label class="control-label" for="slug[{{ $lang }}]"><span>{{ __('Url') }}</span> ({{ $lang }})</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{ $model->present()->parentUri($lang) }}</span>
                        </div>
                        <input class="form-control @if ($errors->has('slug.'.$lang))is-invalid @endif" type="text" name="slug[{{ $lang }}]" id="slug[{{ $lang }}]" value="{{ $model->translate('slug', $lang) }}" data-slug="title[{{ $lang }}]" data-language="{{ $lang }}">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary btn-slug" type="button">{{ __('Generate') }}</button>
                        </span>
                        {!! $errors->first('slug.'.$lang, '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        {!! TranslatableBootForm::hidden('uri') !!}
        <div class="form-group">
            {!! TranslatableBootForm::hidden('status')->value(0) !!}
            {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
        </div>
        {!! TranslatableBootForm::textarea(__('Body'), 'body')->addClass('ckeditor') !!}

        @can('see-all-page_sections')
        @if ($model->id)
        <item-list
            url-base="/api/pages/{{ $model->id }}/sections"
            locale="{{ config('typicms.content_locale') }}"
            fields="id,page_id,position"
            translatable-fields="status,title"
            table="page_sections"
            title="sections"
            include="images"
            :searchable="['title']"
            :sorting="['position']">

            <template slot="add-button">
                @include('core::admin._button-create', ['url' => route('admin::create-page_section', $model->id), 'module' => 'page_sections'])
            </template>

            <template slot="columns" slot-scope="{ sortArray }">
                <item-list-column-header name="checkbox"></item-list-column-header>
                <item-list-column-header name="edit"></item-list-column-header>
                <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
                <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
                <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
                <item-list-column-header name="title_translated" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
            </template>

            <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
                <td class="checkbox"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
                <td>@include('core::admin._button-edit', ['segment' => 'sections', 'module' => 'page_sections'])</td>
                <td><item-list-status-button :model="model"></item-list-status-button></td>
                <td><item-list-position-input :model="model"></item-list-position-input></td>
                <td><img :src="model.thumb" alt=""></td>
                <td>@{{ model.title_translated }}</td>
            </template>

        </item-list>
        @endif
        @endcan

    </div>

    <div class="tab-pane fade" id="tab-meta">
        {!! TranslatableBootForm::text(__('Meta keywords'), 'meta_keywords') !!}
        {!! TranslatableBootForm::textarea(__('Meta description'), 'meta_description') !!}
    </div>

    <div class="tab-pane fade" id="tab-options">
        <div class="form-group">
            {!! BootForm::hidden('is_home')->value(0) !!}
            {!! BootForm::checkbox(__('Is home'), 'is_home') !!}
            {!! BootForm::hidden('private')->value(0) !!}
            {!! BootForm::checkbox(__('Private'), 'private') !!}
            {!! BootForm::hidden('redirect')->value(0) !!}
            {!! BootForm::checkbox(__('Redirect to first child'), 'redirect') !!}
        </div>
        {!! BootForm::select(__('Module'), 'module', TypiCMS::getModulesForSelect())->disable($model->subpages->count() > 0)->helpBlock($model->subpages->count() ? __('A page containing subpages cannot be linked to a module') : '') !!}
        {!! BootForm::select(__('Template'), 'template', TypiCMS::templates())->helpBlock(TypiCMS::getTemplateDir()) !!}
        @if (!$model->id)
        {!! BootForm::select(__('Add to menu'), 'add_to_menu', ['' => ''] + Menus::all()->pluck('name', 'id')->all(), null, ['class' => 'form-control']) !!}
        @endif
        {!! BootForm::textarea(__('Css'), 'css') !!}
        {!! BootForm::textarea(__('Js'), 'js') !!}
    </div>

</div>
