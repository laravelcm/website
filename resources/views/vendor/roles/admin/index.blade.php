@extends('core::admin.master')

@section('title', __('Roles'))

@section('content')

<item-list
    url-base="/api/roles"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,name"
    table="roles"
    title="roles"
    :publishable="false"
    :searchable="['name']"
    :sorting="['name']">

    <template slot="add-button">
        @include('core::admin._button-create', ['module' => 'roles'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox"></item-list-column-header>
        <item-list-column-header name="edit"></item-list-column-header>
        <item-list-column-header name="name" sortable :sort-array="sortArray" :label="$t('Name')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td>@include('core::admin._button-edit', ['module' => 'roles'])</td>
        <td>@{{ model.name }}</td>
    </template>

</item-list>

@endsection
