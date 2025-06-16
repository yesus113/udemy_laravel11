@extends('dashboard.master')

@section('content')
    <h1 class="h1">
        Configuracion de usuario 
    </h1>
     <a class="btn btn-primary my-3" href="{{route('config.create')}}" target="blank">Create</a> 

    <table class="table">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    TIPO DE USUARIO
                </th>
                <th>
                    EQUIPO
                </th>
                <th>
                    FECHA DE ALTA
                </th>
                <th>
                    LATITUD
                </th>
                <th>
                    LONGITUD
                </th>
                <th>
                    USUARIO
                </th>
                <th>
                    PASSWORD
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($config as $c)
                <tr>
                    <td>
                        {{ $c->id }}
                    </td>
                    <td>
                        {{ $c->con_tipo_user }}
                    </td>
                    <td>
                        {{ $c->con_equipo }}
                    </td>
                    <td>
                        {{ $c->con_fechaAlta }}
                    </td>
                    <td>
                        {{ $c->con_latitud }}
                    </td>
                    <td>
                        {{ $c->con_longitud }}
                    </td>
                    <td>
                        {{ $c->con_user }}
                    </td>
                    <td>
                        <a class="btn btn-success mt-3" href="{{ route('config.edit', $c) }}">Edit</a>
                        <a class="btn btn-warning mt-3" href="{{ route('config.show', $c) }}">Show</a>
                        <form action="{{ route('config.destroy', $c) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger mt-3" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">

    </div>
    {{ $config->links() }}
@endsection
