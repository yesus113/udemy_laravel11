@extends('dashboard.master')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-2 mx-4">
        <x-gauge.mq135-c02 />
        <x-gauge.mq135-n-h3 />
        <x-gauge.mq135c2h5oh />
        <x-gauge.mq135-tolueno />
        <x-gauge.mq135-alcohol />
        <div class="max-w-sm  border-gray-200 rounded-lg shadow-md bg-white  dark:border-gray-700">
            <a href="{{ route('mq135.index') }}">
                <br>
                <p class="text-black text-center font-bold">TABLE</P>
                
                
                <img src="{{ asset('static/img/table.png') }}" alt="Sensor DHT11" class="mx-auto w-48 h-48 object-contain"></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="container" style="height: 400px; min-width: 100%"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Colores para cada serie
        const seriesColors = {
            'CO2': '#00b894',
            'NH3': '#e17055',
            'C2H5OH': '#0984e3',
            'tolueno': '#6c5ce7',
            'NOx': '#d63031'
        };

        const fetchInitialData = async () => {
            const res = await fetch("{{ url('/aire-mq135/last20') }}");
            return await res.json();
        };

        const onChartLoad = function() {
            const chart = this;

            setInterval(async function() {
                const res = await fetch("{{ url('/mq135/latest') }}");
                const point = await res.json();

                // Actualizar cada serie con su respectivo valor
                chart.series.forEach((series, index) => {
                    const valueKey = index === 0 ? 'y' : `y${index}`;
                    if (point[valueKey] !== undefined) {
                        series.addPoint([point.x, point[valueKey]], true, true);
                    }
                });
            }, 1000);
        };

        // Cargar los últimos 5 puntos y luego generar la gráfica
        fetchInitialData().then(data => {
            //Series en el grafico
            const seriesDefinitions = [{
                    name: 'CO2',
                    color: seriesColors['CO2'],
                    data: []
                },
                {
                    name: 'NH3',
                    color: seriesColors['NH3'],
                    data: []
                },
                {
                    name: 'C2H5OH',
                    color: seriesColors['C2H5OH'],
                    data: []
                },
                {
                    name: 'Tolueno',
                    color: seriesColors['tolueno'],
                    data: []
                },
                {
                    name: 'NOx',
                    color: seriesColors['NOx'],
                    data: []
                }
            ];

            // Datos iniciales
            data.forEach(point => {
                seriesDefinitions[0].data.push([point.x, point.y]); // CO2
                seriesDefinitions[1].data.push([point.x, point.y1]); // NH3
                seriesDefinitions[2].data.push([point.x, point.y2]); // C2H5OH
                seriesDefinitions[3].data.push([point.x, point.y3]); // Tolueno
                seriesDefinitions[4].data.push([point.x, point.y4]); // NOx
            });

            const chart = Highcharts.chart('container', {
                chart: {
                    type: 'spline',
                    events: {
                        load: onChartLoad
                    }
                },
                time: {
                    useUTC: false
                },
                title: {
                    text: 'MQ135-Tiempo Real'
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150
                },
                yAxis: {
                    title: {
                        text: 'Concentración (PPM)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    formatter: function() {
                        let s = '<b>' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '</b>';

                        this.points.forEach(point => {
                            s += '<br/><span style="color:' + point.color + '">\u25CF</span> ' +
                                point.series.name + ': ' + point.y.toFixed(2) + ' PPM';
                        });

                        return s;
                    }
                },
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                },
                plotOptions: {
                    series: {
                        marker: {
                            radius: 4
                        }
                    }
                },
                series: seriesDefinitions
            });

            // Efecto de pulso para todas las series
            Highcharts.addEvent(Highcharts.Series, 'addPoint', e => {
                const point = e.point,
                    series = e.target;

                if (!series.pulse) {
                    series.pulse = series.chart.renderer.circle()
                        .add(series.markerGroup);
                }

                setTimeout(() => {
                    series.pulse
                        .attr({
                            x: series.xAxis.toPixels(point.x, true),
                            y: series.yAxis.toPixels(point.y, true),
                            r: series.options.marker.radius,
                            opacity: 1,
                            fill: series.color
                        })
                        .animate({
                            r: 20,
                            opacity: 0
                        }, {
                            duration: 1000
                        });
                }, 1);
            });
        });
    </script>
@endpush
