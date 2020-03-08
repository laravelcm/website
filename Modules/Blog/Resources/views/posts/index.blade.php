@extends('layouts.master')
@section('title', "Listing des articles")

@section('content')

    @component('components.breadcrumb')
        <span class="text-gray-500">Tous les articles</span>
    @endcomponent

    <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-600 sm:text-3xl sm:leading-9 sm:truncate flex items-center">
                <svg class="h-6 w-6 fill-current text-gray-500 mr-2" viewBox="0 0 24 24">
                    <path d="M19.707 4.293a1 1 0 00-1.414 0L10 12.586V14h1.414l8.293-8.293a1 1 0 000-1.414zM16.88 2.879A3 3 0 1121.12 7.12l-8.585 8.586a1 1 0 01-.708.293H9a1 1 0 01-1-1v-2.828a1 1 0 01.293-.708l8.586-8.585zM6 6a1 1 0 00-1 1v11a1 1 0 001 1h11a1 1 0 001-1v-5a1 1 0 112 0v5a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h5a1 1 0 110 2H6z" />
                </svg>
                Articles
            </h2>
        </div>
        <div class="mt-4 flex-shrink-0 flex md:mt-0 md:ml-4">
            <span class="shadow-sm rounded-md">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Ajouter un article</a>
            </span>
        </div>
    </div>

@endsection
