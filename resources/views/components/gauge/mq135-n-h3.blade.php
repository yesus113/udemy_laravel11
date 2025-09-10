<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-NH3"></div>
</div>

<script>
    // Inicializar el gráfico
    const NH3Gauge = Highcharts.chart('container-mq135-NH3', {
        chart: { type: 'gauge' },
        title: { text: 'Amoníaco' },
        pane: {
            startAngle: -90,
            endAngle: 90,
            background: null,
            size: '100%'
        },
        yAxis: {
            min: 0,
            max: 1000000000,
            title: { text: 'ppm' },
            plotBands: [
                { from: 200000000, to: 700000000, color: '#3498db' },
                { from: 0, to: 200000000, color: '#2ecc71' },
                { from: 700000000, to: 1000000000, color: '#e74c3c' }
            ]
        },
        series: [{
            name: 'NH3',
            data: [{{ $NH3Value }}],
            tooltip: { valueSuffix: ' ppm' }
        }]
    });

    // Función para actualizar solo este gauge
    function actualizarNH3() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                NH3Gauge.series[0].points[0].update(data.NH3);
            });
    }

    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizarNH3, 5000);
    });
</script>