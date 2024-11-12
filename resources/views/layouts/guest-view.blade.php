{{-- resources/views/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- Navigation --}}
            <nav class="bg-white border-b border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20">
                        <div class="flex items-center">
                            <!-- Logo -->
                            <a href="/">
                                <img src="{{ asset('image/cute.gif') }}" alt="Logo" class="w-20 h-20 mx-auto">
                            </a>
                        </div>

                        <!-- Guest Links -->
                        @guest
                            <div class="hidden sm:flex sm:items-center">
                                <a href="{{ route('login') }}" class="block py-2 text-gray-600 hover:text-gray-800"><button type="button" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button></a>
                                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800"><button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">Register</button></a>
                            </div>

                            <!-- Hamburger Icon for Mobile -->
                            <div class="-mr-2 flex items-center sm:hidden">
                                <button @click="mobileMenuOpen = ! mobileMenuOpen"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none"
                                        x-data="{ mobileMenuOpen: false }">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': mobileMenuOpen, 'inline-flex': ! mobileMenuOpen }"
                                              class="inline-flex"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! mobileMenuOpen, 'inline-flex': mobileMenuOpen }"
                                              class="hidden"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endguest
                    </div>
                </div>

                <!-- Responsive Menu -->
                @guest
                    <div :class="{'block': mobileMenuOpen, 'hidden': ! mobileMenuOpen}"
                         class="hidden sm:hidden"
                         x-data="{ mobileMenuOpen: false }">
                        <div class="pt-2 pb-3 space-y-1">
                            <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-600 hover:text-gray-800"><button type="button" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button></a>
                            <a href="{{ route('register') }}" class="block px-3 py-2 text-gray-600 hover:text-gray-800">Register</a>
                        </div>
                    </div>
                @endguest
            </nav>
            

            {{-- Page Content --}}
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
