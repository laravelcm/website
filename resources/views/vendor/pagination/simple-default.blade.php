@if ($paginator->hasPages())

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <button aria-disabled="true" type="button" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 opacity-50 cursor-not-allowed">
            {{ __('Précédent') }}
        </button>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" rel="prev" aria-label="{{ __('Précédent') }}">
            {{ __('Précédent') }}
        </a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Suivant') }}">
            {{ __('Suivant') }}
        </a>
    @else
        <button type="button" aria-disabled="true" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 opacity-50 cursor-not-allowed" aria-label="{{ __('Suivant') }}">
            {{ __('Suivant') }}
        </button>
    @endif

@endif
