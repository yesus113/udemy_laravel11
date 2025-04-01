@extends('dashboard.master')

@section('header')
    INDEX - SENSOR DE COLOR
@endsection

@section ('content')
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    R
                </td>
                <td>
                    G
                </td>
                <td>
                    B
                </td>
                <td>
                    FECHA
                </td>
                <td>
                    CONFIGURATION
                </td>
                <td>
                    RIESGO
                </td>
                <td>
                    SENSIBILIDAD UV
                </td>
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