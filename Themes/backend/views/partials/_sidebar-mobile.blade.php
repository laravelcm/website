<!-- Off-canvas menu for mobile -->
<div x-show="sidebarOpen" class="md:hidden">
    <div @click="sidebarOpen = false" x-show="sidebarOpen" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 transition-opacity ease-linear duration-300">
        <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
    </div>
    <div class="fixed inset-0 flex z-40">
        <div x-show="sidebarOpen" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-100 transform ease-in-out duration-300">
            <div class="absolute top-0 right-0 -mr-14 p-1">
                <button x-show="sidebarOpen" @click="sidebarOpen = false" class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-brand-200" aria-label="Close sidebar">
                    <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-shrink-0 flex items-center px-4">
                <h3 class="inline-flex items-center w-full text-brand-primary flex-grow">
                    <svg class="text-brand-primary mr-2" width="59" height="38" viewBox="0 0 59 38" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M58.9657 18.1341C58.9301 18.0216 58.8708 17.9092 58.7995 17.808L51.5568 9.25229C51.3312 8.9937 50.975 8.88128 50.6426 8.94873L42.2719 10.815C41.9751 10.8825 41.7376 11.0849 41.6307 11.3434C41.5239 11.6133 41.5595 11.9168 41.7376 12.1417L47.7099 20.1128L35.8009 23.1821L29.8287 24.7336L28.4276 22.5075L14.429 0.415485C14.239 0.123173 13.8947 -0.0454672 13.5266 0.0107466L0.786606 1.6297C0.489773 1.66343 0.240434 1.84332 0.0979547 2.09066C-0.0326516 2.338 -0.0326516 2.64155 0.0979547 2.88889L5.74964 12.9624L15.0939 29.6129C15.2958 29.9727 15.7232 30.1413 16.1388 30.0401L28.9738 26.7348L35.8484 37.584C36.0147 37.8538 36.3115 38 36.6321 38C36.7271 38 36.8339 37.9888 36.9289 37.955L56.9117 31.3331C57.1847 31.2431 57.3866 31.0407 57.4816 30.7822C57.5647 30.5236 57.5172 30.2425 57.3628 30.0176L50.8919 21.3945L50.7019 21.1471L54.7032 20.1128L58.3246 19.1796C58.6214 19.1009 58.8589 18.8873 58.9539 18.6175C59.0132 18.4601 59.0132 18.2915 58.9657 18.1341ZM16.3644 28.1963L9.20477 15.4358L2.31826 3.16996L13.1823 1.7871L26.0292 22.0803L28.0002 25.2058L16.3644 28.1963ZM55.1663 30.0851L37.0239 36.1L30.8023 26.2626L44.6465 22.6986L48.8259 21.6193L49.0159 21.8667L55.1663 30.0851ZM49.5858 19.6406L44.0054 12.1979L50.5001 10.7476L56.5198 17.8642L49.5858 19.6406Z" />
                    </svg>
                    <span class="ml-2 text-lg font-semibold">Laravel Cameroun</span>
                </h3>
            </div>
            <div class="mt-10 flex-1 h-0 overflow-y-auto">
                <div class="px-8">
                    <h2 class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Navigation</h2>
                    {!! $sidebar !!}
                    <h2 class="mt-8 text-xs font-semibold text-gray-600 uppercase tracking-wide">Configuration</h2>
                    <div class="mt-4">
                        <a href="#" class="block text-sm font-medium text-gray-600 hover:text-gray-800 focus:text-gray-500">Logs</a>
                        <a href="#" class="mt-4 block text-sm font-medium text-gray-600 hover:text-gray-800 focus:text-gray-500">Audits</a>
                        <a href="#" class="mt-4 block text-sm font-medium text-gray-600 hover:text-gray-800 focus:text-gray-500">Backups</a>
                    </div>
                </div>
                <div class="mt-8 p-6 border-t">
                    <div class="flex items-center">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $logged_in_user->picture }}" alt="{{ $logged_in_user->email }}" />
                        <span class="ml-4 mr-2 text-sm font-medium text-gray-800">{{ $logged_in_user->full_name }}</span>
                    </div>
                    <nav class="mt-4">
                        <a href="{{ route('frontend.index') }}" class="block text-sm font-medium text-gray-700 hover:text-gray-900 focus:text-gray-600">Afficher le site</a>
                        <a href="{{ route('admin.auth.profile.index', 'profile') }}" class="mt-4 block text-sm font-medium text-gray-700 hover:text-gray-900 focus:text-gray-600">Mon profil</a>
                        <a href="{{ route('frontend.auth.logout') }}" class="mt-4 block text-sm font-medium text-gray-700 hover:text-gray-900 focus:text-gray-600">Se déconnecter</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
