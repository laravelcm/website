<div class="py-8">
    <div class="bg-white overflow-hidden shadow rounded-md">
        <div class="bg-white border-b border-gray-200">
            <div class="sm:hidden p-4">
                <select aria-label="Selected tab" class="form-select form-select-goshen block w-full pl-3 pr-10 py-2 text-base leading-6 sm:text-sm sm:leading-5 transition ease-in-out duration-150">
                    <option>{{ __('Tous') }}</option>
                    <option>{{ __('Brouillon') }}</option>
                    <option>{{ __('Proposé') }}</option>
                </select>
            </div>
            <div class="hidden sm:block">
                <div class="">
                    <nav class="-mb-px flex">
                        <a href="#" class="whitespace-no-wrap ml-8 py-4 px-3 border-b-2 border-brand-900 font-medium text-sm leading-5 text-brand-primary focus:outline-none focus:text-brand-200 focus:border-brand-900">
                            {{ __('Tous') }}
                        </a>
                        <a href="#" class="whitespace-no-wrap ml-8 py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                            {{ __('Brouillon') }}
                        </a>
                        <a href="#" class="whitespace-no-wrap ml-8 py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                            {{ __('Proposé') }}
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="px-4 py-4 sm:px-6">
            <label for="filter" class="sr-only">{{ __('Rechercher') }}</label>
            <div class="flex rounded-md shadow-sm">
                <div class="relative flex-grow focus-within:z-10">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                        </svg>
                    </div>
                    <input id="filter" autocomplete="off" wire:model.debounce.300ms="search" class="form-input block w-full rounded-none rounded-l-md pl-10 transition ease-in-out duration-150 sm:text-sm sm:leading-5" placeholder="{{ __('Rechercher un membre') }}" />
                    <div wire:loading class="spinner right-0 top-0 mt-5 mr-6"></div>
                </div>
                <button wire:click="toggleDirection('{{ $direction }}')" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-r-md text-gray-700 bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none focus:shadow-outline-brand focus:border-brand-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                    </svg>
                    <span class="ml-2">{{ __('Réorganiser') }}</span>
                </button>
            </div>
        </div>
        @if($posts->total() > 0)
            <div class="flex flex-col px-4 sm:px-6 pt-2">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="align-middle inline-block min-w-full overflow-hidden">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Titre') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Categorie') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __("Publication") }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Auteur') }}
                                    </th>
                                    <th class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-t border-gray-100">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    @if($post->image)
                                                        <img class="h-10 w-10 object-cover rounded-md" src="{{ $post->image }}" alt="{{ $post->title }}" />
                                                    @else
                                                        <div class="h-10 w-10 bg-gray-200 flex items-center justify-center rounded-md">
                                                            <svg class="h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ml-4 truncate">
                                                    <h3 class="text-sm leading-5 font-medium text-gray-900 truncate">{{ $post->title }}</h3>
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->status_classname }}">
                                                        {{ $post->status }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-t border-gray-100">
                                            <div class="text-sm leading-5 text-gray-900">{{ $post->category->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-t border-gray-100 text-sm leading-5 text-gray-500">
                                            {{ $post->published_at->format('d F, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-t border-gray-100 text-sm leading-5 text-gray-500">
                                            <div class="text-sm leading-5 text-gray-900">{{ $post->creator->full_name }}</div>
                                            <div class="text-xs leading-5 text-gray-500">{{ $post->creator->rolesLabel }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-right border-t border-gray-100 text-gray-500 text-sm leading-5 font-medium">
                                            <div class="flex items-center space-x-2">
                                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-brand-200 hover:text-brand-900 focus:outline-none">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                                <button wire:click="delete({{ $post->id }})" type="button" class="text-brand-200 hover:text-brand-900 focus:outline-none">
                                                    <svg class="h-5 w-5" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                                                        <path d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 012 2v2h5a1 1 0 110 2h-1v12a2 2 0 01-2 2H6a2 2 0 01-2-2V8H3a1 1 0 010-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 011 1v6a1 1 0 01-2 0v-6a1 1 0 011-1zm4 0a1 1 0 011 1v6a1 1 0 01-2 0v-6a1 1 0 011-1z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="flex-1 flex justify-between sm:hidden">
                    {{ $posts->links('components.wire-mobile-pagination-links') }}
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm leading-5 text-gray-700">
                            {{ __('Affichage') }}
                            <span class="font-medium">{{ ($posts->currentPage() - 1) * $posts->perPage() + 1 }}</span>
                            {{ __('de') }}
                            <span class="font-medium">{{ ($posts->currentPage() - 1) * $posts->perPage() + count($posts->items()) }}</span>
                            {{ __('sur') }}
                            <span class="font-medium"> {!! $posts->total() !!}</span>
                            {{ __('résultats') }}
                        </p>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        @else
            <div class="flex flex-col items-center justify-center px-4 sm:px-6 py-6">
                <span class="flex-shrink-0 h-20 w-20">
                    <svg class="w-full h-full text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </span>
                <h3 class="text-gray-600 font-medium text-base leading-5 mt-2">{{ __("Aucun articles.") }}</h3>
            </div>
        @endif
    </div>
</div>
