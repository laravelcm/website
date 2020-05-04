<div class="bg-white px-4 py-3 flex items-center justify-between sm:px-6">
    <div class="flex-1 flex justify-between sm:hidden">
        {{ $records->links('pagination::simple-default') }}
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm leading-5 text-gray-700">
                {{ __('Affichage de') }}
                <span class="font-medium">{{ ($records->currentPage() - 1) * $records->perPage() + 1 }}</span>
                {{ __('à') }}
                <span class="font-medium">{{ ($records->currentPage() - 1) * $records->perPage() + count($records->items()) }}</span>
                {{ __('sur') }}
                <span class="font-medium"> {!! $records->total() !!}</span>
                {{ __('résultats') }}
            </p>
        </div>
        {!! $records->links() !!}
    </div>
</div>
