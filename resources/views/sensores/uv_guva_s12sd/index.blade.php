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
                    UV
                </td>
                <td>
                    FECHA
                </td>
                <td>
                    EQUIPO
                </td>
            </tr>
        </thead>
            <tbody>
                @foreach ($guva as $g)
                    <tr>
                        <td>
                            {{$g->id}}
                        </td>
                        <td>
                            {{$g->uv_data}}
                        </td>
                        <td>
                            {{$g->uv_fecha }}
                        </td>
                        <td>
                            {{$g->configuration->con_equipo}}
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
    </table>

    {{$guva->links() }}
   
@endsection