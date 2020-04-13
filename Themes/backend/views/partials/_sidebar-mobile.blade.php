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
                <nav>
                    <div class="px-8">
                        <h2 class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Navigation</h2>
                        <div class="mt-3">
                            <a href="{{ route(home_route()) }}" class="-mx-3 px-3 py-2 flex items-center justify-between text-sm font-medium hover:bg-gray-200 rounded-lg {{ active_class(if_route(home_route()), 'bg-gray-200') }}">
                            <span class="inline-flex items-center">
                                <svg class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-2 {{ active_class(if_route(home_route()), 'text-gray-900', 'text-gray-700') }}">Dashboard</span>
                            </span>
                            </a>
                            <a href="#" class="mt-2 -mx-3 px-3 py-2 flex items-center justify-between text-sm font-medium hover:bg-gray-200 rounded-lg">
                            <span class="inline-flex items-center">
                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <span class="ml-2 {{ active_class(Active::checkUriPattern('console/tutorials*'), 'text-gray-900', 'text-gray-700') }}">Tutoriels</span>
                            </span>
                                <span class="inline-block w-9 text-center py-1 leading-none text-xs font-semibold text-gray-700 bg-gray-300 rounded-full">
                                2
                            </span>
                            </a>
                            <a href="{{ route('admin.posts.index') }}" class="mt-2 -mx-3 px-3 py-2 flex items-center justify-between text-sm font-medium hover:bg-gray-200 rounded-lg {{ active_class(Active::checkUriPattern('console/blog*'), 'bg-gray-200') }}">
                            <span class="inline-flex items-center">
                                <svg class="h-6 w-6 fill-current text-gray-500" viewBox="0 0 24 24">
                                    <path d="M19.707 4.293a1 1 0 00-1.414 0L10 12.586V14h1.414l8.293-8.293a1 1 0 000-1.414zM16.88 2.879A3 3 0 1121.12 7.12l-8.585 8.586a1 1 0 01-.708.293H9a1 1 0 01-1-1v-2.828a1 1 0 01.293-.708l8.586-8.585zM6 6a1 1 0 00-1 1v11a1 1 0 001 1h11a1 1 0 001-1v-5a1 1 0 112 0v5a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h5a1 1 0 110 2H6z" />
                                </svg>
                                <span class="ml-2 {{ active_class(Active::checkUriPattern('console/blog*'), 'text-gray-900', 'text-gray-700') }}">Articles</span>
                            </span>
                                <span class="inline-block w-9 text-center py-1 leading-none text-xs font-semibold text-gray-700 bg-gray-300 rounded-full">
                                2
                            </span>
                            </a>
                            <a href="{{ route('admin.auth.user.index') }}" class="mt-2 -mx-3 px-3 py-2 flex items-center justify-between text-sm font-medium hover:bg-gray-200 rounded-lg {{ active_class(Active::checkUriPattern('console/user*'), 'bg-gray-200') }}">
                            <span class="inline-flex items-center">
                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="ml-2 {{ active_class(Active::checkUriPattern('console/user*'), 'text-gray-900', 'text-gray-700') }}">Utilisateurs</span>
                            </span>
                                <span class="inline-block w-9 text-center py-1 leading-none text-xs font-semibold text-gray-700 bg-gray-300 rounded-full">
                                1
                            </span>
                            </a>
                            <a href="#" class="mt-2 -mx-3 px-3 py-2 flex items-center justify-between text-sm font-medium hover:bg-gray-200 rounded-lg">
                            <span class="inline-flex items-center">
                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <span class="ml-2 {{ active_class(Active::checkUriPattern('console/forum*'), 'text-gray-900', 'text-gray-700') }}">Forum</span>
                            </span>
                            </a>
                            <a href="#" class="mt-2 -mx-3 px-3 py-2 flex items-center justify-between text-sm font-medium hover:bg-gray-200 rounded-lg">
                            <span class="inline-flex items-center">
                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-2 {{ active_class(Active::checkUriPattern('console/jobs*'), 'text-gray-900', 'text-gray-700') }}">Jobs</span>
                            </span>
                            </a>
                        </div>
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
                        <div class="mt-4">
                            <a href="{{ route('frontend.index') }}" class="block text-sm font-medium text-gray-700 hover:text-gray-900 focus:text-gray-600">Afficher le site</a>
                            <a href="{{ route('admin.auth.profile.index', 'profile') }}" class="mt-4 block text-sm font-medium text-gray-700 hover:text-gray-900 focus:text-gray-600">Mon profil</a>
                            <a href="{{ route('frontend.auth.logout') }}" class="mt-4 block text-sm font-medium text-gray-700 hover:text-gray-900 focus:text-gray-600">Se déconnecter</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
