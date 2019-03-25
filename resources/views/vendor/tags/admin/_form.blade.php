@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}

<div class="row">
    <div class="col-md-6">
        {!! BootForm::text(__('Tag'), 'tag')->required() !!}
    </div>
    <div class="col-md-6 form-group @if ($errors->has('slug'))has-error @endif">
        {!! Form::label(__('Slug'))->addClass('control-label')->forId('slug') !!}
        <div class="input-group">
            {!! Form::text('slug')->addClass('form-control')->addClass($errors->has('slug') ? 'is-invalid' : '')->id('slug')->data('slug', 'tag') !!}
            <span class="input-group-append">
                <button class="btn btn-outline-secondary btn-slug @if ($errors->has('slug'))btn-danger @endif" type="button">{{ __('Generate') }}</button>
            </span>
            {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
