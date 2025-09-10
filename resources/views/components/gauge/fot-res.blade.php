<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-foto"></div>
</div>

<script>
    const fotoGauge = Highcharts.chart('container-foto', {
        chart: {
            type: 'gauge'
        },
        title: {
            text: 'Intensidad de la Luz'
        },
        pane: {
            startAngle: -90,
            endAngle: 90,
            background: null,
            size: '100%'
        },
        yAxis: {
            min: 0,
            max: 1000,
            title: {
                text: '%'
            },
            plotBands: [{
                    from: 0,
                    to: 300,
                    color: '#3498db'
                },
                {
                    from: 300,
                    to: 600,
                    color: '#2ecc71'
                },
                {
                    from: 600,
                    to: 1000,
                    color: '#e74c3c'
                }
            ]
        },
        series: [{
            name: 'FT',
            data: [{{ $fotoValue }}],
            tooltip: {
                valueSuffix: ' %'
            }
        }]
    });

    function actualizarfoto() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                fotoGauge.series[0].points[0].update(data.FT);
            });
    }
    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizarfoto, 5000);
    });
</script>
