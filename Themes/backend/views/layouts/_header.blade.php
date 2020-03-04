<header class="flex flex-shrink-0 bg-white border-t-4 border-brand-primary shadow-smooth h-18 items-center">
    <div class="flex-shrink-0 px-4 py-3 lg:w-72">
        <button type="button" id="open-sidebar" class="block text-brand-primary hover:text-brand-900 sm:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M3 6a1 1 0 011-1h16a1 1 0 110 2H4a1 1 0 01-1-1zM3 12a1 1 0 011-1h16a1 1 0 110 2H4a1 1 0 01-1-1zM4 17a1 1 0 100 2h7a1 1 0 100-2H4z" />
            </svg>
        </button>
        <a href="{{ route(home_route()) }}" class="hidden sm:flex sm:items-center sm:w-full text-brand-primary flex-grow">
            <svg class="text-brand-primary mr-2" width="59" height="38" viewBox="0 0 59 38" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M58.9657 18.1341C58.9301 18.0216 58.8708 17.9092 58.7995 17.808L51.5568 9.25229C51.3312 8.9937 50.975 8.88128 50.6426 8.94873L42.2719 10.815C41.9751 10.8825 41.7376 11.0849 41.6307 11.3434C41.5239 11.6133 41.5595 11.9168 41.7376 12.1417L47.7099 20.1128L35.8009 23.1821L29.8287 24.7336L28.4276 22.5075L14.429 0.415485C14.239 0.123173 13.8947 -0.0454672 13.5266 0.0107466L0.786606 1.6297C0.489773 1.66343 0.240434 1.84332 0.0979547 2.09066C-0.0326516 2.338 -0.0326516 2.64155 0.0979547 2.88889L5.74964 12.9624L15.0939 29.6129C15.2958 29.9727 15.7232 30.1413 16.1388 30.0401L28.9738 26.7348L35.8484 37.584C36.0147 37.8538 36.3115 38 36.6321 38C36.7271 38 36.8339 37.9888 36.9289 37.955L56.9117 31.3331C57.1847 31.2431 57.3866 31.0407 57.4816 30.7822C57.5647 30.5236 57.5172 30.2425 57.3628 30.0176L50.8919 21.3945L50.7019 21.1471L54.7032 20.1128L58.3246 19.1796C58.6214 19.1009 58.8589 18.8873 58.9539 18.6175C59.0132 18.4601 59.0132 18.2915 58.9657 18.1341ZM16.3644 28.1963L9.20477 15.4358L2.31826 3.16996L13.1823 1.7871L26.0292 22.0803L28.0002 25.2058L16.3644 28.1963ZM55.1663 30.0851L37.0239 36.1L30.8023 26.2626L44.6465 22.6986L48.8259 21.6193L49.0159 21.8667L55.1663 30.0851ZM49.5858 19.6406L44.0054 12.1979L50.5001 10.7476L56.5198 17.8642L49.5858 19.6406Z" />
            </svg>
            <h4 class="ml-2 text-lg">Laravel Cameroun</h4>
        </a>
    </div>
    <div class="flex-1 flex items-center justify-between pl-2 pr-6 lg:px-8">
        <button class="lg:hidden relative p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-600 focus:bg-gray-100 transition duration-150 ease-in-out z-10">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"/>
            </svg>
        </button>
        <div class="hidden lg:block relative w-80">
            <label class="hidden" aria-label="Search Input" for="search"></label>
            <span class="relative" style="direction: ltr">
                <input
                    class="transition font-light focus:outline-none focus:bg-gray-100 placeholder-gray-600 rounded-md bg-transparent py-2 pr-4 pl-10 block w-full appearance-none leading-normal ds-input"
                    type="text"
                    placeholder='Recherche (Press "\" to focus)'
                    autoComplete="off"
                    id="search"
                    style="position: relative; vertical-align: top"
                />
            </span>
            <div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                <svg class="fill-current pointer-events-none text-gray-500 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                </svg>
            </div>
        </div>
        <div class="ml-auto flex items-center space-x-2">
            <button class="relative p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-600 focus:bg-gray-100 transition duration-150 ease-in-out z-10">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </button>
            <button class="relative p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-600 focus:bg-gray-100 transition duration-150 ease-in-out z-10">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>
            <div @click.away="open = false" class="relative hidden sm:block" x-data="{ open: false }">
                <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid">
                    <img class="h-7 w-7 rounded-full" src="{{ $logged_in_user->picture }}" alt="{{ $logged_in_user->email }}" />
                </button>
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="origin-top-right absolute right-0 mt-2 w-60 bg-white rounded-md shadow-lg"
                >
                    <div class="flex items-center bg-gray-50 px-3 py-4">
                        <div class="h-15 w-15 rounded-sm overflow-hidden">
                            <img src="{{ $logged_in_user->picture }}" alt="{{ $logged_in_user->email }}" class="h-full w-full object-cover"/>
                        </div>
                        <div class="pl-4 text-truncate">
                            <span class="block text-gray-800 font-medium">{{ $logged_in_user->full_name }}</span>
                            <span class="text-xs text-gray-500">{{ $logged_in_user->email }}</span>
                        </div>
                    </div>
                    <div class="py-2">
                        <a href="{{ route('frontend.index') }}" class="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100">Afficher le site</a>
                        <a href="{{ route('admin.auth.profile.index', 'profile') }}" class="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100">Mon Profil</a>
                        <div class="py-3 px-4 mt-1 border-t border-gray-200">
                            <a href="{{ route('frontend.auth.logout') }}" class="text-sm py-2 px-3 inline-block bg-brand-100 rounded text-brand-primary hover:text-white hover:bg-brand-primary">Se déconnecter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
