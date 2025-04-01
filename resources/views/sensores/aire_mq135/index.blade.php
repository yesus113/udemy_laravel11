@extends('dashboard.master')

@section('header')
    INDEX-MQ135
@endsection

@section ('content')
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    CO2
                </td>
                <td>
                    NH3
                </td>
                <td>
                    C2H5OH
                </td>
                <td>
                    TOLUENO
                </td>
                <td>
                    ALCOHOL
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
                @foreach ($mq135 as $mq)
                    <tr>
                        <td>
                            {{$mq->id}}
                        </td>
                        <td>
                            {{$mq->air_CO2}}
                        </td>
                        <td>
                            {{$mq->air_NH3}}
                        </td>
                        <td>
                            {{$mq->air_C2H5OH}}
                        </td>
                        <td>
                            {{$mq->air_toluelo}}
                        </td>
                        <td>
                            {{$mq->air_NOx}}
                        </td>
                        <td>
                            {{$mq->air_alcohol}}
                        </td>
                        <td>
                            {{$mq->air_fecha}}
                        </td>
                        <td>
                            {{$mq->configuration->con_equipo }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    {{$mq135->links() }}
   
@endsection