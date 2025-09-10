<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-tolueno"></div>
</div>

<script>
    // Inicializar el gráfico
    const toluenoGauge = Highcharts.chart('container-mq135-tolueno', {
        chart: { type: 'gauge' },
        title: { text: 'Tolueno' },
        pane: {
            startAngle: -90,
            endAngle: 90,
            background: null,
            size: '100%'
        },
        yAxis: {
            min: 0,
            max: 100000000,
            title: { text: 'ppm' },
            plotBands: [
                { from: 30000000, to: 70000000, color: '#3498db' },
                { from: 0, to: 30000000, color: '#2ecc71' },
                { from: 70000000, to: 100000000, color: '#e74c3c' }
            ]
        },
        series: [{
            name: 'tolueno',
            data: [{{ $toluenoValue }}],
            tooltip: { valueSuffix: ' ppm' }
        }]
    });

    // Función para actualizar solo este gauge
    function actualizartolueno() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                toluenoGauge.series[0].points[0].update(data.tolueno);
            });
    }

    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizartolueno, 5000);
    });
</script>