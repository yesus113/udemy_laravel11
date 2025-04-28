@extends('dashboard.master')

@section('header')
    INDEX
@endsection

@section ('content')
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
                    NOMBRE DE USUARIO
                </th>
                <th>
                    CONTRASEÑA
                </th>
            </tr>
        </thead>
            <tbody>
                @foreach ($config as $c)
                    <tr>
                        <td>
                            {{$c->id}}
                        </td>
                        <td>
                            {{$c->con_tipo_user}}
                        </td>
                        <td>
                            {{$c->con_equipo}}
                        </td>
                        <td>
                            {{$c->con_fechaAlta}}
                        </td>
                        <td>
                            {{$c->con_latitud}}
                        </td>
                        <td>
                            {{$c->con_logitud}}
                        </td>
                        <td>
                            {{$c->con_user}}
                        </td>
                        <td>
                            {{$c->con_password}}
                        </td>
                    </tr>

                @endforeach
            </tbody>
    </table>

    {{$config->links() }}

@endsection
