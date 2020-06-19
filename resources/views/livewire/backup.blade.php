<div>
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">{{ __('Backups') }}</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <span class="shadow-sm rounded-md">
                <button wire:click="create" type="button" class="btn btn-primary inline-flex items-center transition duration-150 ease-in-out">
                    <span wire:loading wire:target="create" class="mt-1 pr-2">
                        <span class="btn-spinner"></span>
                    </span>
                  {{ __('Faire un backup') }}
                </button>
            </span>
        </div>
    </div>

    <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-md">
        @if(session()->has('success'))
            <div class="bg-green-100 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="text-sm leading-5 text-green-700">
                            {{ session()->get('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if(session()->has('error'))
            <div class="bg-red-50 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm leading-5 font-medium text-red-800">
                            {{ session()->get('error') }}
                        </h3>
                    </div>
                </div>
            </div>
        @endif

        <div class="divide-y divide-gray-200">
            @forelse($backups as $backup)
                <div class="block">
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <h4 class="text-sm leading-5 font-medium text-green-600 truncate">
                                {{ $backup['file_name'] }}
                            </h4>
                            <div class="flex ml-2 items-center space-x-2">
                                @if($backup['download'])
                                    <div class="flex-shrink-0 flex">
                                        <a href="{{ route('admin.backup.download') }}?disk={{ $backup['disk'] }}&path={{ urlencode($backup['file_path']) }}&file_name={{ urlencode($backup['file_name']) }}" target="_blank" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-green-700 bg-green-100 hover:bg-green-50 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-green-200 transition ease-in-out duration-150">
                                            Télécharger
                                        </a>
                                    </div>
                                @endif
                                <div class="flex-shrink-0 flex">
                                    <button wire:click="delete('{{ $backup['disk'] }}', '{{ $backup['file_path'] }}')" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-red-700 bg-red-100 hover:bg-red-50 focus:outline-none focus:border-red-300 focus:shadow-outline-red active:bg-red-200 transition ease-in-out duration-150">
                                        <svg class="h-4 w-4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                                <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    {{ round((int) $backup['file_size']/1048576, 2).' MB' }}
                                </div>
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span>
                                    Crée le
                                    <time>{{ \Carbon\Carbon::createFromTimeStamp($backup['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}</time>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center py-6">
                    <span class="flex-shrink-0 h-10 w-10">
                        <svg class="h-full w-full" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                    </span>
                    <h5 class="text-sm leading-5 text-gray-600 font-medium">{{ __("Aucune sauvegarde de base de données.") }}</h5>
                </div>
            @endforelse
        </div>
    </div>
</div>
