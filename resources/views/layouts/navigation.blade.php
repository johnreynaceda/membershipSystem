<nav class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-green-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('member')" :active="request()->routeIs('member')">
                        {{ __('Members') }}
                    </x-nav-link>
                    <x-nav-link :href="route('equipments')" :active="request()->routeIs('equipments')">
                        {{ __('Gym Equipments') }}
                    </x-nav-link>
                    <x-nav-link :href="route('attendance')" :active="request()->routeIs('attendance')">
                        {{ __('Attendance') }}
                    </x-nav-link>
                    @if (auth()->user()->user_type == 'superadmin')
                        <x-nav-link :href="route('payments')" :active="request()->routeIs('payments')">
                            {{ __('Payments') }}
                        </x-nav-link>
                        <x-nav-link :href="route('reports')" :active="request()->routeIs('reports')">
                            {{ __('Reports') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" class="flex space-x-6 items-center group">
                            <img src="{{ asset('images/sample.png') }}" class="h-12 w-12 rounded-full object-cover "
                                alt="">
                            <div class="flex space-x-5 items-center ">
                                <div class="flex flex-col text-left">
                                    <h1 class="font-bold  uppercase">
                                        {{ auth()->user()->name }}</h1>
                                </div>
                                <form method="POST" action="{{ route('logout') }}" class="flex space-x-2  items-center">
                                    @csrf

                                    <a href="{{ route('profile.edit') }}" class="block  py-2 text-sm text-gray-500 hover:text-green-500"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">
                                        Your Profile
                                    </a>
                                    <span>|</span>
                                    <a href="#"
                                        onclick="event.preventDefault();
                            this.closest('form').submit();"
                                        class="block  py-2 text-sm text-gray-500 hover:text-green-500" role="menuitem" tabindex="-1"
                                        id="user-menu-item-2">
                                        Sign out
                                    </a>
                                </form>
                            </div>
                        </button>
                    </div>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                        style="display: none;">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-500"
                            role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Your Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#"
                                onclick="event.preventDefault();
                            this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                                id="user-menu-item-2">
                                Sign out
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
