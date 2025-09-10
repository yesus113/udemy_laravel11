<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!--map -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Graficas-->
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/highcharts.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/accessibility.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/highcharts.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/highcharts-more.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/solid-gauge.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/accessibility.js') }}"></script>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-[#384358]">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <br>
            <x-card class="text-center text-black bg-gray-300 w-[450px] text-3xl max-w-7xl mx-auto 2 sm:px-6 lg:px-0">
                {{ $header }}
            </x-card>
        @endisset

        <!-- Page Content -->
        <main>

            <div class="container mx-auto">
                @if (session('status'))
                    <div class="card card-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="mt-8">
                    @yield('content')
                </div>

            </div>

        </main>
    </div>
    @stack('scripts')
</body>

</html>
