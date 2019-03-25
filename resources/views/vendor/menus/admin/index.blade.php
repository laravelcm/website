@extends('core::admin.master')

@section('title', __('Menus'))

@section('content')

<item-list
    url-base="/api/menus"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,name"
    translatable-fields="status"
    table="menus"
    title="menus"
    :searchable="['name']"
    :sorting="['name']">

    <template slot="add-button">
        @include('core::admin._button-create', ['module' => 'menus'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox"></item-list-column-header>
        <item-list-column-header name="edit"></item-list-column-header>
        <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="name" sortable :sort-array="sortArray" :label="$t('Name')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td>@include('core::admin._button-edit', ['module' => 'menus'])</td>
        <td><item-list-status-button :model="model"></item-list-status-button></td>
        <td>@{{ model.name }}</td>
    </template>

</item-list>

@endsection
