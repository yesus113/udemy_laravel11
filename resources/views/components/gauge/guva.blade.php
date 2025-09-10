<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-guva"></div>
</div>

<script>
    const guvaGauge = Highcharts.chart('container-guva', {
        chart: {
            type: 'gauge'
        },
        title: {
            text: 'Indice UV'
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
            name: 'guva',
            data: [{{ $guvaValue }}],
            tooltip: {
                valueSuffix: ' %'
            }
        }]
    });

    function actualizarguva() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                guvaGauge.series[0].points[0].update(data.guva);
            });
    }
    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizarguva, 5000);
    });
</script>
