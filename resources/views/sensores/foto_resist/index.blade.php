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
                    DATO
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
