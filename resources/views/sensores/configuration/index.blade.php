@extends('dashboard.master')

@section('header')
    INDEX
@endsection

@section ('content')
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    TIPO DE USUARIO
                </td>
                <td>
                    EQUIPO
                </td>
                <td>
                    FECHA DE ALTA
                </td>
                <td>
                    LATITUD
                </td>
                <td>
                    LONGITUD
                </td>
                <td>
                    NOMBRE DE USUARIO
                </td>
                <td>
                    CONTRASEÑA
                </td>
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