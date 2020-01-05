@extends('layouts.master')
@section('title', __('user::labels.backend.access.users.management') . ' | ' . __('user::labels.backend.access.users.deleted'))

@section('breadcrumb-links')
    <div class="kt-subheader__toolbar">
        <a href="{{ route('admin.auth.user.create') }}" class="btn btn-brand btn-bold">@lang('user::menus.backend.access.users.create')</a>
        @include('user::backend.user.includes.breadcrumb-links')
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('user::labels.backend.access.users.management')
                    <small class="text-muted">@lang('user::labels.backend.access.users.deleted')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('user::labels.backend.access.users.table.last_name')</th>
                            <th>@lang('user::labels.backend.access.users.table.first_name')</th>
                            <th>@lang('user::labels.backend.access.users.table.email')</th>
                            <th>@lang('user::labels.backend.access.users.table.confirmed')</th>
                            <th>@lang('user::labels.backend.access.users.table.roles')</th>
                            <th>@lang('user::labels.backend.access.users.table.other_permissions')</th>
                            <th>@lang('user::labels.backend.access.users.table.social')</th>
                            <th>@lang('user::labels.backend.access.users.table.last_updated')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($users->count())
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{!! $user->confirmed_label !!}</td>
                                    <td>{!! $user->roles_label !!}</td>
                                    <td>{!! $user->permissions_label !!}</td>
                                    <td>{!! $user->social_buttons !!}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>{!! $user->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">@lang('strings.backend.access.users.no_deleted')</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $users->total() !!} {{ trans_choice('user::labels.backend.access.users.table.total', $users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
