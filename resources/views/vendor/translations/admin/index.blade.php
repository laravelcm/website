@extends('core::admin.master')

@section('title', __('Translations'))

@section('content')

<item-list
    url-base="/api/translations"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,key"
    translatable-fields="translation"
    table="translations"
    title="translations"
    :publishable="false"
    :searchable="['key,translation']"
    :sorting="['key']">

    <template slot="add-button">
        @include('core::admin._button-create', ['module' => 'translations'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox"></item-list-column-header>
        <item-list-column-header name="edit"></item-list-column-header>
        <item-list-column-header name="key" sortable :sort-array="sortArray" :label="$t('Key')"></item-list-column-header>
        <item-list-column-header name="translation_translated" sortable :sort-array="sortArray" :label="$t('Translation')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td>@include('core::admin._button-edit', ['module' => 'translations'])</td>
        <td>@{{ model.key }}</td>
        <td>@{{ model.translation_translated }}</td>
    </template>

</item-list>

@endsection
