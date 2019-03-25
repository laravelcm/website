@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}
{!! BootForm::hidden('group')->value('db') !!}

{!! BootForm::text(__('Key'), 'key')->required() !!}

<label class="control-label">{{ __('Translations') }}</label>

@foreach ($locales as $lang)
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{{ strtoupper($lang) }}</span>
            </div>
            {!! Form::text('translation['.$lang.']')->addClass('form-control')->addClass($errors->has('translation.'.$lang) ? 'is-invalid' : '') !!}
            {!! $errors->first('translation.'.$lang, '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
@endforeach
