@extends('layouts.master')
@section('title', "Listing des articles")

@section('content')

    @component('components.breadcrumb')
        <span class="text-gray-500">Tous les articles</span>
    @endcomponent

    <div class="mt-3 md:flex md:items-center md:justify-between">
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

    <div class="flex flex-col mt-6">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden rounded-md border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-2 bg-white">
                    <div class="flex items-center">
                        <input aria-label="Delete" type="checkbox" class="form-checkbox h-4 w-4 mr-1 text-brand-primary transition duration-150 ease-in-out" />
                    </div>
                    <div x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false" class="relative inline-block text-left">
                        <div>
                            <span class="rounded-md shadow-sm">
                                <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 p-1 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                              </button>
                            </span>
                        </div>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                            <div class="rounded-md bg-white shadow-xs">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Edit</a>
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Duplicate</a>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Archive</a>
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Move</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-100"></th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Auteur</th>
                            <th class="px-6 py-3 bg-gray-100"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse($records as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <input aria-label="Delete" type="checkbox" class="form-checkbox h-4 w-4 mr-1 text-brand-primary transition duration-150 ease-in-out" />
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-sm" src="{{ $post->image }}" alt="{{ $post->title }}" />
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">{{ $post->title }}</div>
                                            <div class="text-sm leading-5 text-gray-500">{{ $post->featured ? 'Mise en avant' : 'Simple' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">{{ $post->category->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->status_classname }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $post->creator->full_name }}</div>
                                    <div class="text-sm leading-5 text-gray-500">{{ $post->creator->rolesLabel }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <div class="flex justify-end">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="mr-4 flex items-center">
                                            <svg class="h-5 w-5 text-gray-600 hover:text-gray-800" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.3 12.3l10-10a1 1 0 011.4 0l4 4a1 1 0 010 1.4l-10 10a1 1 0 01-.7.3H7a1 1 0 01-1-1v-4a1 1 0 01.3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 012 0v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6c0-1.1.9-2 2-2h6a1 1 0 110 2H4v14h14v-6z"
                                                    fill="currentColor"
                                                />
                                            </svg>
                                        </a>
                                        <form action='{{ route('admin.posts.destroy', $post) }}' method='POST' name='delete_item'>
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="flex items-center" title="Supprimer">
                                                <svg class="h-5 w-5 text-gray-600 hover:text-gray-800" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 012 2v2h5a1 1 0 110 2h-1v12a2 2 0 01-2 2H6a2 2 0 01-2-2V8H3a1 1 0 010-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 011 1v6a1 1 0 01-2 0v-6a1 1 0 011-1zm4 0a1 1 0 011 1v6a1 1 0 01-2 0v-6a1 1 0 011-1z" fill="currentColor" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="6">
                                    <h4 class="py-4 text-center font-medium text-xl text-gray-800">Aucun article pour le moment.</h4>
                                </td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
                @include('components.paginations')
            </div>
        </div>
    </div>

@endsection
