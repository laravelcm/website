@extends('layouts.master')
@section('title', $tutorial->title)

@section('content')

    @component('components.breadcrumb')
        <a href="{{ route('admin.tutorials.index') }}" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">{{ __("Tous les tutoriels") }}</a>
    @endcomponent

    <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                {{ $tutorial->title }}
            </h2>
        </div>
    </div>

    <div class="py-8">
        {!! Form::model($tutorial, ['route' => ['admin.tutorials.update', $tutorial], 'files' => true, 'method' => 'PUT']) !!}
            <div class="flex flex-col lg:flex-row">
                <div class="w-full lg:w-2/3 space-y-5">
                    <div class="bg-white shadow rounded-md overflow-hidden px-4 py-4 sm:px-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label for="title" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Titre') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    {!! Form::text('title', null, [
                                            'class' => "form-input block w-full sm:text-sm sm:leading-5",
                                            'id' => 'title',
                                            'autocomplete' => 'off',
                                            'placeholder' => "Ex. Nouveautés de Laravel 7"
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label for="category_id" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Categorie') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    {!! Form::select('category_id', $categories, null, ['class' => 'form-select block w-full', 'id' => 'category_id']); !!}
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label for="status" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Status') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    {!! Form::select('status', $status, null, [
                                            'class' => 'form-select block w-full',
                                            'id' => 'status'
                                        ]);
                                    !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded-md overflow-hidden p-4">
                        <label for="status" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Contenu du tutoriel") }}</label>
                        <div id="editor" class="mt-2" data-content="{{ $tutorial->body }}"></div>
                    </div>
                    <div class="bg-white p-4 shadow rounded-md">
                        <h4 class="text-gray-500 font-medium pb-8 text-base">{{ __('Informations Optionnelles') }}</h4>
                        <div class="w-full mb-3">
                            <label for="summary" class="block text-sm font-medium leading-5 text-gray-700">Résumé du tutoriel</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                {!! Form::textarea('summary', null, [
                                        'class' => "form-input block w-full sm:text-sm sm:leading-5",
                                        'id' => 'summary',
                                        'autocomplete' => 'off',
                                        'rows' => 4,
                                    ])
                                !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/3 space-y-5 mt-4 lg:mt-0 lg:ml-4">
                    <div class="shadow bg-white p-4 rounded-md">
                        <h4 class="text-gray-500 font-medium text-base">{{ __('Provider') }}</h4>
                        <p class="text-gray-400 text-sm mt-2">{{ __("Le provider ici c'est le service utilisé pour la video, par default YouTube") }}</p>
                        <div class="grid grid-cols-2 gap-4 mt-6">
                            <div class="col-span-2">
                                <label for="provider" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Nom du provider') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    {!! Form::select('provider', ['youtube' => 'Youtube'], null, [
                                            'class' => 'form-select block w-full',
                                            'id' => 'provider'
                                        ]);
                                    !!}
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="provider_id" class="block text-sm font-medium leading-5 text-gray-700">{{ __('ID de la video') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    {!! Form::text('provider_id', null, [
                                            'class' => "form-input block w-full sm:text-sm sm:leading-5",
                                            'id' => 'provider_id',
                                            'autocomplete' => 'off',
                                            'placeholder' => "Ex. XHjdgIO(0",
                                            'required' => true
                                        ])
                                    !!}
                                </div>
                                <p class="mt-2 text-xs text-gray-500 leading-5">
                                    {{ __("L'id de la vidéo peut s'obtenir comme ceci.") }}
                                    <code class="p-1 bg-red-50 text-red-400 rounded">https://youtube.com/watch?v={<span class="text-red-600 font-medium">YOUTUBE_VIDEO_ID</span>}</code>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="shadow rounded-md">
                        <div class="bg-white p-4">
                            <h4 class="text-gray-500 font-medium text-base">{{ __('Date de publication') }}</h4>
                            <p class="text-gray-400 text-sm mt-2">{{ __('Spécifiez la date de publication du tutoriel. Si aucune date n\'est renseigné la date du jour sera prise.') }}</p>
                        </div>
                        @include('components.datetime-picker', ['show' => true, 'publishedAt' => $tutorial->published_at])
                    </div>
                    <div class="bg-white p-4 shadow rounded-md">
                        <h4 class="text-gray-500 font-medium pb-8 text-base">{{ __('Article Preview') }}</h4>
                        <div id="dropzone-simple" data-preview="{{ $tutorial->preview_image_link }}" data-id="{{ $tutorial->preview_image_id }}"></div>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t pt-5 border-gray-200">
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">{{ __('Enrégistrer') }}</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

