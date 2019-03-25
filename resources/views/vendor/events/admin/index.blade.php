@extends('core::admin.master')

@section('title', __('Events'))

@section('content')

<item-list
    url-base="/api/events"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,start_date,end_date"
    translatable-fields="status,title"
    table="events"
    title="events"
    include="images"
    :searchable="['start_date,end_date,title']"
    :sorting="['-end_date']">

    <template slot="add-button">
        @include('core::admin._button-create', ['module' => 'events'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox"></item-list-column-header>
        <item-list-column-header name="edit"></item-list-column-header>
        <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
        <item-list-column-header name="start_date" sortable :sort-array="sortArray" :label="$t('Start date')"></item-list-column-header>
        <item-list-column-header name="end_date" sortable :sort-array="sortArray" :label="$t('End date')"></item-list-column-header>
        <item-list-column-header name="title_translated" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td>@include('core::admin._button-edit', ['module' => 'events'])</td>
        <td><item-list-status-button :model="model"></item-list-status-button></td>
        <td><img :src="model.thumb" alt=""></td>
        <td>@{{ model.start_date | date }}</td>
        <td>@{{ model.end_date | date }}</td>
        <td>@{{ model.title_translated }}</td>
    </template>

</item-list>

@endsection
