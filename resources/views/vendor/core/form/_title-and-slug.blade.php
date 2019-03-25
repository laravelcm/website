<div class="row">
    <div class="col-md-6">
        {!! TranslatableBootForm::text(__('Title'), 'title') !!}
    </div>
    <div class="col-md-6">
        @include('core::form._slug')
    </div>
</div>
