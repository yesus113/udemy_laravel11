@extends('dashboard.master')

@section('header')
    INDEX
@endsection

@section ('content')
    <table class="table">
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
                        <th>
                            {{$d->id}}
                        </th>
                        <th>
                            {{$d->hyt_temp}}
                        </th>
                        <th>
                            {{$d->hyt_humd}}
                        </th>
                        <th>
                            {{$d->hyt_fecha }}
                        </th>
                        <th>
                            {{$d->configuration->con_equipo}}
                        </th>
                    </tr>

                @endforeach
            </tbody>
    </table>

    {{$dht11->links() }}

@endsection
