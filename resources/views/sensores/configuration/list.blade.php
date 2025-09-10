@extends('dashboard.master')

@section('content')

    <div class="max-w-7xl mx-auto 2 sm:px-6 lg:px-4">

        <h1 class="text-2xl font-bold text-white mb-6">SENSOR MQ-135</h1>

        <div class="overflow-x-auto bg-slate-300 shadow rounded-lg">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">EQUIPO</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">FECHA DE ALTA</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">LATITUD</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">LONGITUD</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">USUARIO</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ROL</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($config as $c)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $c->id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $c->con_equipo }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $c->con_fechaAlta }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $c->con_latitud }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $c->con_longitud }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $c->user->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $c->user->rol }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                @auth
                                    @if (auth()->user()->isSuperAdmin())
                                        <a class="btn btn-success mt-3" href="{{ route('config.edit', $c) }}">Editar</a>
                                    @endif
                                @endauth
                                <a class="btn btn-warning mt-3" href="{{ route('config.show', $c) }}">Mostrar</a>

                                <form action="{{ route('config.destroy', $c) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    @auth
                                        @if (auth()->user()->isSuperAdmin())
                                            <button class="btn btn-danger mt-3" type="submit">Eliminar</button>
                                        @endif
                                    @endauth
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
        </div>
    </div>
    {{ $config->links() }}
@endsection
