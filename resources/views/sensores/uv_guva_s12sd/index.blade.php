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
                    UV
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
