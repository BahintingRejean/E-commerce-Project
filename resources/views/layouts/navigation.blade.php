<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/">
                        <img src="{{ asset('image/cute.gif') }}" alt="Logo" class="w-20 h-20 mx-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (auth('admin')->check())
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Admin Dashboard') }}
                        </x-nav-link>
                    @elseif(auth('web')->check())
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>
            <div class="flex items-center">
                <!-- Cart Icon with Badge Overlay -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a href="{{ route('cart.index') }}"
                        class="relative text-gray-500 hover:text-gray-700 transition ease-in-out duration-150">
                        <!-- Cart Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7a1 1 0 00.9 1.3h10.9a1 1 0 00.9-1.3L17 13m-10 0V9m0 4v4m4-8h8" />
                        </svg>

                        <!-- Badge Overlay for Cart Item Count -->
                        @if ($cartItemCount > 0)
                            <span
                                class="absolute top-0 right-0 inline-flex items-center justify-center w-3 h-3 bg-red-600 text-white text-[10px] font-semibold rounded-full">
                                {{ $cartItemCount }}
                            </span>
                        @endif
                    </a>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                @if (auth('admin')->check())
                                    <div>{{ Auth::guard('admin')->user()->name }}</div>
                                @elseif(auth('web')->check())
                                    <div>{{ Auth::user()->name }}</div>
                                @endif

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile Link -->
                            @if (auth('admin')->check())
                                <x-dropdown-link :href="route('admin.profile.edit')">
                                    {{ __('Admin Profile') }}
                                </x-dropdown-link>
                            @elseif(auth('web')->check())
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST"
                                action="{{ auth('admin')->check() ? route('admin.logout') : route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="auth('admin')->check() ? route('admin.logout') : route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger for mobile -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                @if (auth('admin')->check())
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Admin Dashboard') }}
                    </x-responsive-nav-link>
                @elseif(auth('web')->check())
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @endif
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">
                        {{ auth('admin')->check() ? Auth::guard('admin')->user()->name : Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">
                        {{ auth('admin')->check() ? Auth::guard('admin')->user()->email : Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    @if (auth('admin')->check())
                        <x-responsive-nav-link :href="route('admin.profile.edit')">
                            {{ __('Admin Profile') }}
                        </x-responsive-nav-link>
                    @elseif(auth('web')->check())
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST"
                        action="{{ auth('admin')->check() ? route('admin.logout') : route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="auth('admin')->check() ? route('admin.logout') : route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
