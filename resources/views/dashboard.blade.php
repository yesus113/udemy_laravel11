<x-app-layout>
    @section('scripts')
        <!-- Highcharts -->
        <script src="{{ asset('static/lib/Highcharts-11.4.6/code/highcharts.js') }}"></script>
        <script src="{{ asset('static/lib/Highcharts-11.4.6/code/highcharts-more.js') }}"></script>
        <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/solid-gauge.js') }}"></script>
        <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/exporting.js') }}"></script>
        <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/export-data.js') }}"></script>
        <script src="{{ asset('static/lib/Highcharts-11.4.6/code/modules/accessibility.js') }}"></script>
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-50 dark:text-gray-900">
                    {{ __('BIENVENIDO BRO!') }}
                </div>
                <x-card class="text-center text-red-50 bg-gray-600 w-[450px] mx-auto text-3xl">
                    @slot('card')
                        GRAFICAS EN TIEMPO REAL
                    @endslot
                </x-card>
                <br>
                <x-dashboard.graficas>

                </x-dashboard.graficas>

            </div>
        </div>
    </div>
</x-app-layout>
