<div class="btn-toolbar mb-4">
    <button class="btn btn-sm btn-primary mr-2" value="true" id="exit" name="exit" type="submit">{{ __('Save and exit') }}</button>
    <button class="btn btn-sm btn-light mr-2" type="submit">{{ __('Save') }}</button>
    @if ($model->getTable() == 'pages' || TypiCMS::getPageLinkedToModule($model->getTable()))
    <a class="btn btn-sm btn-light btn-preview mr-2" href="{{ $model->previewUri() }}?preview=true">{{ __('Preview') }}</a>
    @endif
    {{ $slot }}
    @include('core::admin._lang-switcher-for-form')
</div>
