@push('css')
    <link rel="stylesheet" href="{{ asset('components/simplemde/simplemde.css') }}">
@endpush
@push('js')
    <script src="{{ asset('components/simplemde/simplemde.js') }}"></script>
    <script>
      var simplemde = new SimpleMDE({ element: document.querySelector(".simplemde") });
    </script>
@endpush

@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}

<filepicker related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></filepicker>
<files related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></files>

@include('core::form._title-and-slug')
<div class="form-group">
    {!! TranslatableBootForm::hidden('status')->value(0) !!}
    {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
</div>
{!! TranslatableBootForm::textarea(__('Summary'), 'summary')->rows(4) !!}
{!! BootForm::textarea(__('Body'), 'body')->addClass('simplemde') !!}
