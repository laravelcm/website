@extends('layouts.master')
@section('title', "Créer un nouvel article")

@section('content')

    {!! Form::open(['route' => 'admin.posts.store', 'files' => true]) !!}
        <h1 class="flex items-center font-semibold text-xl mb-8">
            <svg class="h-6 w-6 fill-current text-gray-500 mr-2" viewBox="0 0 24 24">
                <path d="M19.707 4.293a1 1 0 00-1.414 0L10 12.586V14h1.414l8.293-8.293a1 1 0 000-1.414zM16.88 2.879A3 3 0 1121.12 7.12l-8.585 8.586a1 1 0 01-.708.293H9a1 1 0 01-1-1v-2.828a1 1 0 01.293-.708l8.586-8.585zM6 6a1 1 0 00-1 1v11a1 1 0 001 1h11a1 1 0 001-1v-5a1 1 0 112 0v5a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h5a1 1 0 110 2H6z" />
            </svg>
            Créer un nouvel article
        </h1>
        <div class="flex items-center mb-6">
            <div class="w-full md:w-2/3">
                <label for="title" aria-label="Titre de l'article" class="hidden block text-sm leading-5 font-medium text-gray-700 mb-2"></label>
                <div class="w-full mb-3">
                    {!! Form::text('title', null, ['class' => 'input-form', 'id' => 'title', 'placeholder' => "Titre de l'article", 'autofocus' => true]) !!}
                </div>
            </div>
            <div class="hidden md:flex items-center justify-end w-1/3 mb-3">
                <span class="flex w-full rounded-md shadow-sm sm:w-auto">
                    <button type="button" class="btn-white flex items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Preview
                    </button>
                </span>
                <span class="flex w-full rounded-md shadow-sm sm:ml-2 sm:w-auto">
                <button type="submit" class="btn btn-primary flex">Enrégistrer</button>
              </span>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between">
            <div class="bg-white shadow-md w-full rounded-md md:w-2/3 mb-4">
                <div id="editor"></div>
            </div>
            <div class="w-full md:w-1/3 md:pl-12 justify-end space-y-6">
                <div>
                    <label for="category_id" class="block text-sm leading-5 font-medium text-gray-700 mb-2">Selectionner la categorie</label>
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-select block w-full', 'id' => 'category_id']); !!}
                </div>
                <div>
                    <label for="cover" class="block text-sm leading-5 font-medium text-gray-700 mb-2">Image de couverture</label>
                    <div class="hidden">
                        <svg fill="none" id="icon" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input
                        type="file"
                        name="image"
                        label="Upload a file or drag and drop"
                        help="Upload files here and they won't be sent immediately"
                        is="drop-files"
                    />
                </div>
                <div id="datepicker" class="space-y-6"></div>
            </div>
        </div>
    {!! Form::close() !!}

@endsection

