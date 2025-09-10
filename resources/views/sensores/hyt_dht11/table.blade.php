@extends('dashboard.master')

@section('header')
    INDEX
@endsection

@section('content')
    <div class="max-w-7xl mx-auto 2 sm:px-6 lg:px-4">
        <h1 class="text-2xl font-bold text-white mb-6">SENSOR DHT11</h1>

        <form method="GET" action="{{ route('mq135.index') }}"
            class="mb-6 bg-slate-300 p-4 rounded-lg shadow flex flex-col md:flex-row gap-4 items-start md:items-end">
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700">Filtrar por fecha:</label>
                <input type="date" name="fecha" id="fecha" value="{{ request('fecha') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex items-center gap-2">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition font-medium">
                    Filtrar
                </button>
                <a href="{{ route('mq135.index') }}" class="text-sm text-blue-600 hover:underline font-medium">
                    Limpiar filtro
                </a>
            </div>
        </form>
        <div class="overflow-x-auto bg-slate-300 shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <td class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</td>
                        <td class="px-4 py-2 text-left text-sm font-medium text-gray-700">TEMPERATURA</td>
                        <td class="px-4 py-2 text-left text-sm font-medium text-gray-700">HUMEDAD</td>
                        <td class="px-4 py-2 text-left text-sm font-medium text-gray-700">FECHA</td>
                        <td class="px-4 py-2 text-left text-sm font-medium text-gray-700">EQUIPO</td>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($dht11 as $d)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $d->id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $d->hyt_temp }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $d->hyt_humd }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $d->hyt_fecha }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $d->configuration->con_equipo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $dht11->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
