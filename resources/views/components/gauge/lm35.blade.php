<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-lm35"></div>
</div>

<script>
    const lm35Gauge = Highcharts.chart('container-lm35', {
        chart: {
            type: 'gauge'
        },
        title: {
            text: 'Temperatura LM35'
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
            name: 'lm35',
            data: [{{ $lm35Value }}],
            tooltip: {
                valueSuffix: ' %'
            }
        }]
    });

    function actualizarlm35() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                lm35Gauge.series[0].points[0].update(data.lm35);
            });
    }
    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizarlm35, 5000);
    });
</script>
