<div
    class="z-30 fixed inset-y-0 left-0 w-72 bg-gray-100 overflow-y-auto transform -translate-x-full transition duration-150 ease-in-out sm:static sm:block sm:translate-x-0"
    id="sidebar"
>
    <div class="absolute top-0 left-0 pl-4 pt-3 sm:hidden">
        <button type="button" class="block text-brand-600 hover:text-gray-800" id="close-sidebar">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.293 18.707a1 1 0 001.414-1.414L13.414 12l5.293-5.293a1 1 0 00-1.414-1.414L12 10.586 6.707 5.293a1 1 0 00-1.414 1.414L10.586 12l-5.293 5.293a1 1 0 101.414 1.414L12 13.414l5.293 5.293z"/>
            </svg>
        </button>
    </div>
    <nav class="mt-16 sm:mt-0">
        <div class="mt-12 px-8">
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
                <a href="#" class="block text-sm font-medium text-gray-600">Logs</a>
                <a href="#" class="mt-4 block text-sm font-medium text-gray-600">Audits</a>
                <a href="#" class="mt-4 block text-sm font-medium text-gray-600">Backups</a>
            </div>
        </div>
        <div class="mt-8 p-6 border-t sm:hidden">
            <div class="flex items-center">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ $logged_in_user->picture }}" alt="{{ $logged_in_user->email }}" />
                <span class="ml-4 mr-2 text-sm font-medium text-gray-800">{{ $logged_in_user->full_name }}</span>
            </div>
            <div class="mt-4">
                <a href="{{ route('frontend.index') }}" class="block text-sm font-medium text-gray-700">Afficher le site</a>
                <a href="{{ route('admin.auth.profile.index', 'profile') }}" class="mt-4 block text-sm font-medium text-gray-700">Mon profil</a>
                <a href="{{ route('frontend.auth.logout') }}" class="mt-4 block text-sm font-medium text-gray-700">Se déconnecter</a>
            </div>
        </div>
    </nav>
</div>
