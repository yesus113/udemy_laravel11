@extends('dashboard.master')

@section('header')
    INDEX- RECOMENDACIONES
@endsection

@section ('content')
    <table class="table">
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    RECOMENDACION
                </td>
                <td>
                    TIPO DE PIEL
                </td>
            </tr>
        </thead>
            <tbody>
                @foreach ($recommendation as $r)
                    <tr>
                        <td>
                            {{$r->id}}
                        </td>
                        <td>
                            {{$r->rec_recomendacion}}
                        </td>
                        <td>
                            {{$r->tipo_piel->tip_tipo}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>

    {{$recommendation->links() }}

@endsection
