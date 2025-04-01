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
                    TEMPERATURA
                </td>
                <td>
                    HUMEDAD
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
                @foreach ($dht11 as $d)
                    <tr>
                        <td>
                            {{$d->id}}
                        </td>
                        <td>
                            {{$d->hyt_temp}}
                        </td>
                        <td>
                            {{$d->hyt_humd}}
                        </td>
                        <td>
                            {{$d->hyt_fecha }}
                        </td>
                        <td>
                            {{$d->configuration->con_equipo}}
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
    </table>

    {{$dht11->links() }}
   
@endsection