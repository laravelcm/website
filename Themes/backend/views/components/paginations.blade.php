<div class="bg-white px-4 py-3 flex items-center justify-between sm:px-6">
    <div class="flex-1 flex justify-between sm:hidden">
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            Previous
        </a>
        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            Next
        </a>
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm leading-5 text-gray-700">
                Showing
                <span class="font-medium">{{ ($records->currentPage() - 1) * $records->perPage() + 1 }}</span>
                to
                <span class="font-medium">{{ ($records->currentPage() - 1) * $records->perPage() + count($records->items()) }}</span>
                of
                <span class="font-medium">{!! $records->total() !!}</span>
                results
            </p>
        </div>
        {!! $records->links('includes.paginations') !!}
    </div>
</div>
