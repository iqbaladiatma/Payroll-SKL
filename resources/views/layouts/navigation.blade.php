<nav x-data="{ open: false, dropdownOpen: false }" class="bg-gradient-to-r from-slate-900 to-slate-800 shadow-xl backdrop-blur-lg border-b border-slate-700/50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center space-x-3">
                        <x-application-logo class="block h-8 w-auto fill-current text-indigo-400 hover:rotate-12 transition-transform" />
                        <span class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-blue-400 bg-clip-text text-transparent">
                            HRM System
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 space-x-4">
                    <x-nav-link :href="url('/')" :active="request()->routeIs('/')" class="group relative">
                        <span class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-indigo-400 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>{{ __('Home') }}</span>
                        </span>
                        <div class="absolute bottom-0 h-0.5 bg-indigo-400 transition-all duration-300 w-0 group-hover:w-full"></div>
                    </x-nav-link>

                    <x-nav-link :href="url('/about')" :active="request()->routeIs('/about')" class="group relative">
                        <span class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-cyan-400 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ __('About Us') }}</span>
                        </span>
                        <div class="absolute bottom-0 h-0.5 bg-cyan-400 transition-all duration-300 w-0 group-hover:w-full"></div>
                    </x-nav-link>

                    @if (Auth::check() && Auth::user()->usertype == 'admin')
                    <x-nav-link :href="url('/admin')" :active="request()->routeIs('/admin')" class="group relative">
                        <span class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-red-400 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            <span class="font-semibold">{{ __('Admin') }}</span>
                        </span>
                        <div class="absolute bottom-0 h-0.5 bg-red-400 transition-all duration-300 w-0 group-hover:w-full"></div>
                    </x-nav-link>
                    @endif
                    @if (Auth::check() && Auth::user()->usertype == 'user')
                    <x-nav-link :href="url('/user')" :active="request()->routeIs('/user')" class="group relative">
                        <span class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-red-400 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            <span class="font-semibold">{{ __('User') }}</span>
                        </span>
                        <div class="absolute bottom-0 h-0.5 bg-red-400 transition-all duration-300 w-0 group-hover:w-full"></div>
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right Side Menu -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                @auth
                <div class="relative" x-data="{ dropdownOpen: false }">
                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 group">
                        <div class="relative">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 flex items-center justify-center text-white font-bold shadow-lg">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-slate-900"></div>
                        </div>
                        <span class="text-slate-200 group-hover:text-white transition-colors">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4 inline-block transform transition-transform" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>

                    <!-- Dropdown Content -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute right-0 mt-2 w-48 origin-top-right bg-slate-800/95 backdrop-blur-sm rounded-lg shadow-xl py-2 z-50">
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-2 px-4 py-2 hover:bg-slate-700/50">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ __('Profile') }}</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center space-x-2 px-4 py-2 hover:bg-slate-700/50">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>{{ __('Log Out') }}</span>
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
                @endauth

                @guest
                <div class="flex space-x-3">
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-lg text-white font-medium hover:shadow-lg hover:from-indigo-600 hover:to-blue-600 transition-all flex items-center space-x-2">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Login</span>
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 border border-indigo-400 rounded-lg text-indigo-400 font-medium hover:bg-indigo-400/10 transition-colors">
                        Register
                    </a>
                </div>
                @endguest
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 rounded-lg hover:bg-slate-800/50 transition-colors">
                    <svg class="w-7 h-7 text-indigo-400 transform transition-transform" :class="{ 'rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="sm:hidden bg-slate-900/95 backdrop-blur-lg border-t border-slate-700/50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/')" :active="request()->routeIs('/')" class="flex items-center space-x-3 px-6 py-3 group">
                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-slate-200 group-hover:text-white">{{ __('Home') }}</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="url('/about')" :active="request()->routeIs('/about')" class="flex items-center space-x-3 px-6 py-3 group">
                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-slate-200 group-hover:text-white">{{ __('About Us') }}</span>
            </x-responsive-nav-link>
            @if (Auth::check() && Auth::user()->usertype == 'admin')
            <x-responsive-nav-link :href="url('/admin')" :active="request()->routeIs('/admin')" class="flex items-center space-x-3 px-6 py-3 group">
                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                <span class="text-slate-200 group-hover:text-white font-medium">{{ __('Admin') }}</span>
            </x-responsive-nav-link>
            @endif
            @if (Auth::check() && Auth::user()->usertype == 'user')
            <x-responsive-nav-link :href="url('/user')" :active="request()->routeIs('/user')" class="flex items-center space-x-3 px-6 py-3 group">
                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                <span class="text-slate-200 group-hover:text-white font-medium">{{ __('User') }}</span>
            </x-responsive-nav-link>
            @endif
        </div>

        @auth
        <div class="pt-4 pb-2 border-t border-slate-700/50">
            <div class="flex items-center space-x-3 px-6 py-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 flex items-center justify-center text-white font-bold shadow-lg">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-medium text-slate-200">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-slate-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-2 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center space-x-3 px-6 py-3 group">
                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="text-slate-200 group-hover:text-white">{{ __('Profile') }}</span>
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center space-x-3 px-6 py-3 group">
                        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="text-slate-200 group-hover:text-white">{{ __('Log Out') }}</span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth

        @guest
        <div class="pt-4 pb-4 border-t border-slate-700/50">
            <div class="flex flex-col space-y-3 px-6">
                <a href="{{ route('login') }}" class="w-full px-4 py-2 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-lg text-white font-medium text-center hover:shadow-lg transition-shadow">
                    Login
                </a>
                <a href="{{ route('register') }}" class="w-full px-4 py-2 border border-indigo-400 rounded-lg text-indigo-400 font-medium text-center hover:bg-indigo-400/10 transition-colors">
                    Register
                </a>
            </div>
        </div>
        @endguest
    </div>
</nav>