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
                    TEMPERATURA
                </th>
                <th>
                    FECHA
                </th>
                <th>
                    EQUIPO
                </th>
            </tr>
        </thead>
            <tbody>
                @foreach ($lm35 as $l)
                    <tr>
                        <td>
                            {{$l->id}}
                        </td>
                        <td>
                            {{$l->tem_data}}
                        </td>
                        <td>
                            {{$l->tem_fecha }}
                        </td>
                        <td>
                            {{$l->configuration->con_equipo}}
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </thead>
    </table>

    {{$lm35->links() }}

@endsection
