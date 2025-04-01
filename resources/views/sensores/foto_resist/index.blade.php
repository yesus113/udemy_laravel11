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
                    DATO
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
                @foreach ($ft as $f)
                    <tr>
                        <td>
                            {{$f->id}}
                        </td>
                        <td>
                            {{$f->fot_intens_luz}}
                        </td>
                        <td>
                            {{$f->fot_fecha}}
                        </td>
                        <td>
                            {{$f->configuration->con_equipo }}
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </thead>
    </table>

    {{$ft->links() }}
   
@endsection