@foreach ($locales as $lang)
<div class="form-group form-group-translation @if ($errors->has('slug.'.$lang))has-error @endif">
    {!! Form::label('<span>'.__('Slug').'</span> <span>('.$lang.')</span>')->addClass('control-label')->forId('slug['.$lang.']') !!}
    <span></span>
    <div class="input-group">
        {!! Form::text('slug['.$lang.']')->addClass('form-control')->addClass($errors->has('slug.'.$lang) ? 'is-invalid' : '')->id('slug['.$lang.']')->data('slug', 'title['.$lang.']')->data('language', $lang) !!}
        <span class="input-group-append">
            <button class="btn btn-outline-secondary btn-slug" type="button">{{ __('Generate') }}</button>
        </span>
        {!! $errors->first('slug.'.$lang, '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
@endforeach
