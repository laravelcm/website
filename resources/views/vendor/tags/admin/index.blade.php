@extends('core::admin.master')

@section('title', __('Tags'))

@section('content')

<item-list
    url-base="/api/tags"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,tag,slug"
    table="tags"
    title="tags"
    :publishable="false"
    :searchable="['tag']"
    :sorting="['tag']">

    <template slot="add-button">
        @include('core::admin._button-create', ['module' => 'tags'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox"></item-list-column-header>
        <item-list-column-header name="edit"></item-list-column-header>
        <item-list-column-header name="tag" sortable :sort-array="sortArray" :label="$t('Tag')"></item-list-column-header>
        <item-list-column-header name="uses" sortable :sort-array="sortArray" :label="$t('Uses')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td>@include('core::admin._button-edit', ['module' => 'tags'])</td>
        <td>@{{ model.tag }}</td>
        <td>@{{ model.uses }}</td>
    </template>

</item-list>

@endsection
