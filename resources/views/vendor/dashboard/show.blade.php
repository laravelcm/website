@extends('core::admin.master')

@section('title', __('Dashboard'))

@section('h1') @endsection

@section('content')

<div class="row">

    <div class="col-sm-12">

        <div class="card mb-4">

            <div class="card-body">

                <h2 class="card-title">@lang('Welcome, :name!', ['name' => auth()->user()->first_name])</h2>

                <div class="card-text">
                    {!! $welcomeMessage !!}
                </div>

            </div>

        </div>

        @can('see-history')
        <history @can('clear-history'):clear-button="true"@endcan></history>
        @endcan

    </div>

</div>

@endsection
