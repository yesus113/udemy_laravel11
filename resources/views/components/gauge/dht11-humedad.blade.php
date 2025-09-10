<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-dht11-humedad"></div>
</div>

<script>
    // Inicializar el gráfico
    const humedadGauge = Highcharts.chart('container-dht11-humedad', {
        chart: {
            type: 'gauge'
        },
        title: {
            text: 'Humedad'
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
            name: 'humedad',
            data: [{{ $humedadValue }}],
            tooltip: {
                valueSuffix: ' %'
            }
        }]
    });

    // Función para actualizar solo este gauge
    function actualizarhumedad() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                humedadGauge.series[0].points[0].update(data.humedad);
            });
    }

    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizarhumedad, 5000);
    });
</script>
