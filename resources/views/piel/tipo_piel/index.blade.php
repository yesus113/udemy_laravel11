@extends('dashboard.master')

@section('header')
    INDEX- Caracteristicas de la piel
@endsection

@section ('content')
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    TIPO DE PIEL
                </td>
                <td>
                    COLOR DE PIEL
                </td>
                <td>
                    SENSIBILIDAD UV
                </td>
                <td>
                    RIESGO
                </td>
                <td>
                    FOTOTIPO CUTANEO
                </td>
                <td>
                    PROTECCION SOLAR
                </td>
            </tr>
        </thead>
            <tbody> 
                @foreach ($piel as $p)
                    <tr>
                        <td>
                            {{$p->id}}
                        </td>
                        <td>
                            {{$p->tip_tipo}}
                        </td>
                        <td>
                            {{$p->tip_colorPiel}}
                        </td>
                        <td>
                            {{$p->tip_sensibilidadUV}}
                        </td>
                        <td>
                            {{$p->tip_riesgo}}
                        </td>
                        <td>
                            {{$p->tip_fotCutaneo}}
                        </td>
                        <td>
                            {{$p->tip_protSolar}}
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </thead>
    </table>

    {{$piel->links() }}
   
@endsection