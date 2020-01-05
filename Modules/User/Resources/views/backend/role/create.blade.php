@extends('layouts.master')
@section('title', __('user::labels.backend.access.roles.management') . ' | ' . __('user::labels.backend.access.roles.create'))

@section('content')

    {{ html()->form('POST', route('admin.auth.role.store'))->class('form-horizontal')->open() }}

        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('user::labels.backend.access.roles.attributes.display_name'). '<span class="text-danger">*</span>')
                                ->class('form-control-label')
                                ->for('display_name') }}
                            {{ html()->text('display_name')
                                ->class('form-control')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                            <span class="form-text text-muted">@lang('user::labels.backend.access.roles.attributes.text_display')</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('user::labels.backend.access.roles.attributes.name'). '<span class="text-danger">*</span>')
                                ->class('form-control-label')
                                ->for('slug') }}
                            {{ html()->text('name')
                                ->class('form-control')
                                ->id('slug')
                                ->attribute('data-slug', 'display_name')
                                ->required()
                            }}
                            <span class="form-text text-muted">@lang('user::labels.backend.access.roles.attributes.text_code')</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ html()->label('Description')
                        ->class('form-control-label')
                        ->for('name') }}
                    {{ html()->textarea('description')
                        ->class('form-control kt_maxlength')
                        ->attribute('maxlength', 100)
                    }}
                </div>
            </div>
        </div>

        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h5 class="kt-section__title">@lang('user::labels.backend.access.roles.attributes.associated_permissions')</h5>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <ul class="list-group list-group-flush">
                    @if($permissions->count())
                        @foreach($permissions as $permission)
                            <li class="list-group-item">
                                <div class="checkbox d-flex align-items-center justify-content-between">
                                    {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}

                                    {{ html()->label(
                                            html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)
                                                  ->id('permission-'.$permission->id)
                                                . '<span></span>')
                                            ->class('kt-checkbox kt-checkbox--solid kt-checkbox--brand')
                                        ->for('permission-'.$permission->id) }}
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">@lang('buttons.general.crud.create')</button>
                            <a href="{{ route('admin.auth.role.index') }}" class="btn btn-secondary">@lang('buttons.general.cancel')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{ html()->form()->close() }}

@endsection

@push('after-scripts')
    <script>
        $('.kt_maxlength').maxlength({
            threshold: 3,
            warningClass: "kt-badge kt-badge--danger kt-badge--rounded kt-badge--inline",
            limitReachedClass: "kt-badge kt-badge--success kt-badge--rounded kt-badge--inline",
            separator: ' {{ __('of') }} ',
            preText: '{{ __('You have') }} ',
            postText: ' {{ __('chars remaining.') }}',
            validate: true
        });
    </script>
@endpush
