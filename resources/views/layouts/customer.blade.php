<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Nadi Nurita') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-xl font-bold text-rose-600">
                    Nadi Nurita
                </a>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-rose-600">Home</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-rose-600">Products</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-rose-600">Categories</a>
                </nav>

                <!-- Right Side -->
                <div class="flex items-center gap-4">
                    <!-- Cart -->
                    <a href="#" class="relative text-gray-600 hover:text-rose-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-9H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-rose-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </a>

                    @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 text-sm text-gray-600 hover:text-rose-600">
                            {{ auth()->user()->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('my-orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Orders</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-rose-600">Login</a>
                    <a href="{{ route('register') }}" class="text-sm bg-rose-600 text-white px-4 py-2 rounded-lg hover:bg-rose-700">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold text-rose-600 mb-4">Nadi Nurita</h3>
                    <p class="text-sm text-gray-600">Koleksi tudung berkualiti untuk wanita moden.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="{{ route('home') }}" class="hover:text-rose-600">Home</a></li>
                        <li><a href="#" class="hover:text-rose-600">Products</a></li>
                        <li><a href="#" class="hover:text-rose-600">Categories</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>📧 hello@nadinurita.com</li>
                        <li>📱 +60 12-345 6789</li>
                    </ul>
                </div>
            </div>
            <div class="border-t mt-8 pt-8 text-center text-sm text-gray-500">
                © {{ date('Y') }} Nadi Nurita. All rights reserved.
            </div>
        </div>
    </footer>

</body>

</html>