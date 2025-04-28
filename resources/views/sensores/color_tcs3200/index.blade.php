@extends('dashboard.master')

@section('header')
    INDEX - SENSOR DE COLOR
@endsection

@section ('content')
    <table class="table">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    R
                </th>
                <th>
                    G
                </th>
                <th>
                    B
                </th>
                <th>
                    FECHA
                </th>
                <th>
                    CONFIGURATION
                </th>
                <th>
                    RIESGO
                </th>
                <th>
                    SENSIBILIDAD UV
                </th>
            </tr>
        </thead>

            <tbody>
                @foreach ($tcs as $t)
                    <tr>
                        <td>
                            {{$t->id}}
                        </td>
                        <td>
                            {{$t->col_R}}
                        </td>
                        <td>
                            {{$t->col_G}}
                        </td>
                        <td>
                            {{$t->col_B}}
                        </td>
                        <td>
                            {{$t->col_fecha}}
                        </td>
                        <td>
                            {{$t->configuration->con_equipo}}
                        </td>
                        <td>
                            {{$t->tipo_piel->tip_riesgo}}
                        </td>
                        <td>
                            {{$t->tipo_piel->tip_sensibilidadUV}}
                        </td>
                    </tr>

                @endforeach
            </tbody>
    </table>

    {{$tcs->links() }}

@endsection
