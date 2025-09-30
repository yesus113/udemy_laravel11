@extends('dashboard.master')

@section('content')
    <div class="flex justify-center flex-wrap gap-6">
        {{-- Tarjeta 1 --}}
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('tipoPiel') }}">
                <br>
                <img src="{{ asset('static/img/charts/tipoPiel.jpg') }}" alt="Sensor DHT11"
                    class="w-auto h-auto object-contain"></a>
            <div class="p-5 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Gráfica Tipo de Piel</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-justify">En este gráfico se muestra la
                    cantidad de registros por mes divididos por tipo de piel del sensor de Color: TCS3200.</p>
                <a href="{{ route('tipoPiel') }}"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Mostrar
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Tarjeta 2 --}}
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('colorPiel') }}">
                <br>
                <img src="{{ asset('static/img/charts/colorPiel.jpg') }}"
                    class="w-auto h-auto object-contain"></a>
            <div class="p-5 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Gráfica Color Piel</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-justify">En este gráfico se muestra la
                    cantidad de registros
                    por mes proveniente del sensor de Color: TCS3200.</p>
                <a href="{{ route('colorPiel') }}"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Mostrar
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Tarjeta 3 --}}
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('cross') }}">
                <br>
                <img src="{{ asset('static/img/charts/cruzes.jpg') }}" alt=
                    class="w-auto h-auto object-contain">
            </a>
            <div class="p-5 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Gráfica Cruce Sensores
                </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-justify">En este gráfico se muestra el
                    promedio de registros de cada sensor utilizado,
                    los datos mostrados entran en un rango de los ultimos 7 dias.</p>
                <a href="{{ route('cross') }}"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Mostrar
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
