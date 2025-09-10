@extends('dashboard.master')

@section('content')
    <div class="max-w-7xl mx-auto 2 sm:px-6 lg:px-4">
        <h1 class="text-2xl font-bold text-white mb-6">SENSOR MQ-135</h1>

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
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">CO2</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">NH3</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">C2H5OH</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">TOLUENO</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ALCOHOL</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">NOx</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">FECHA</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">EQUIPO</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($mq135 as $mq)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->air_CO2 }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->air_NH3 }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->air_C2H5OH }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->air_tolueno }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->air_alcohol }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->air_NOx }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->air_fecha }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $mq->configuration->con_equipo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $mq135->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
