<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-br from-blue-50 to-white dark:from-gray-900 dark:to-gray-800">
    <div class="min-h-screen flex flex-col">
        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600 opacity-10 dark:opacity-5"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
                <div class="text-center">
                    <div class="flex justify-center mb-8">
                        <<svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v2m0 14v2m9-9h-2M5 12H3m16.24-6.24l-1.42 1.42M6.34 17.66l-1.42 1.42M18.36 17.66l1.42 1.42M6.34 6.34L4.92 4.92M12 8a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                        Bienvenido a UV-CHECK v1.0
                    </h1>

                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-10">
                        Kendric.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 shadow-lg hover:shadow-xl">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 shadow-lg hover:shadow-xl">
                                    Log in
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-12 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Get Started</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Everything you need to build amazing applications with Laravel and Tailwind CSS.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Documentation Card -->
                    <a href="https://laravel.com/docs"
                        class="group bg-gray-50 dark:bg-gray-700 rounded-xl p-6 transition-all duration-200 hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-center mb-4">
                            <div
                                class="flex items-center justify-center w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 group-hover:bg-blue-200 dark:group-hover:bg-blue-800 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Documentation</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Laravel has wonderful documentation covering every aspect of the framework. Whether you're
                            new or experienced, we recommend reading it thoroughly.
                        </p>
                        <div
                            class="mt-4 flex items-center text-blue-600 dark:text-blue-400 group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors">
                            <span>Explore docs</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </a>

                    <!-- Laracasts Card -->
                    <a href="https://laracasts.com"
                        class="group bg-gray-50 dark:bg-gray-700 rounded-xl p-6 transition-all duration-200 hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-center mb-4">
                            <div
                                class="flex items-center justify-center w-12 h-12 rounded-lg bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 group-hover:bg-purple-200 dark:group-hover:bg-purple-800 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Laracasts</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development.
                            Check them out and level up your skills.
                        </p>
                        <div
                            class="mt-4 flex items-center text-purple-600 dark:text-purple-400 group-hover:text-purple-700 dark:group-hover:text-purple-300 transition-colors">
                            <span>Start watching</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </a>

                    <!-- Ecosystem Card -->
                    <div
                        class="group bg-gray-50 dark:bg-gray-700 rounded-xl p-6 transition-all duration-200 hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-center mb-4">
                            <div
                                class="flex items-center justify-center w-12 h-12 rounded-lg bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 group-hover:bg-green-200 dark:group-hover:bg-green-800 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Vibrant Ecosystem</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Laravel's ecosystem includes powerful tools like Forge, Vapor, Nova, and Horizon to take
                            your projects to the next level.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-sm rounded-full">Forge</span>
                            <span
                                class="px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 text-sm rounded-full">Vapor</span>
                            <span
                                class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-sm rounded-full">Nova</span>
                            <span
                                class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-sm rounded-full">Horizon</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-100 dark:bg-gray-900 py-8 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-gray-600 dark:text-gray-400">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </p>
                <p class="text-gray-500 dark:text-gray-500 text-sm mt-2">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>

</html>
