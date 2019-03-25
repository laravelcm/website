@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}

<div class="row">
    <div class="col-sm-6">
        {!! BootForm::email(__('Email'), 'email')->autocomplete('off')->required() !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! BootForm::password(__('Password'), 'password') !!}
    </div>
    <div class="col-sm-6">
        {!! BootForm::password(__('Password confirmation'), 'password_confirmation') !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! BootForm::text(__('First name'), 'first_name')->required() !!}
    </div>
    <div class="col-sm-6">
        {!! BootForm::text(__('Last name'), 'last_name')->required() !!}
    </div>
</div>

<div class="form-group">
{!! BootForm::hidden('activated')->value(0) !!}
{!! BootForm::hidden('superuser')->value(0) !!}
{!! BootForm::checkbox(__('Activated'), 'activated') !!}
{!! BootForm::checkbox(__('Superuser'), 'superuser') !!}
</div>

@if ($roles = Roles::findAll() and $roles->count() > 0)
<div class="form-group">
    <label>{{ __('Roles') }}</label>
    @foreach ($roles as $role)
    <div class="form-check">
        {!! Form::checkbox('roles[]', $role->id)->addClass('form-check-input')->id('role-'.$role->name) !!}
        <label class="form-check-label" for="{{ 'role-'.$role->name }}">{{ $role->name }}</label>
    </div>
    @endforeach
</div>
@endif

<label>{{ __('User permissions') }}</label>
@include('core::admin._permissions-form')
