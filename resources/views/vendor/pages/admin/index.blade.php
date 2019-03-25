@extends('core::admin.master')

@section('title', __('Pages'))

@section('content')

<item-list-tree
    locale="{{ config('typicms.content_locale') }}"
    url-base="/api/pages"
    fields="id,position,parent_id,module,redirect,is_home,private"
    translatable-fields="status,title,slug,uri"
    table="pages"
    title="Pages"
>

    <template slot="add-button">
        @include('core::admin._button-create', ['url' => route('admin::create-page'), 'module' => 'pages'])
    </template>

</item-list-tree>

@endsection
