<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-alcohol"></div>
</div>

<script>
    // Inicializar el gráfico
    const alcoholGauge = Highcharts.chart('container-mq135-alcohol', {
        chart: { type: 'gauge' },
        title: { text: 'Alcohol' },
        pane: {
            startAngle: -90,
            endAngle: 90,
            background: null,
            size: '100%'
        },
        yAxis: {
            min: 0,
            max: 500000000,
            title: { text: 'ppm' },
            plotBands: [
                { from: 200000000, to: 400000000, color: '#3498db' },
                { from: 0, to: 200000000, color: '#2ecc71' },
                { from: 400000000, to: 500000000, color: '#e74c3c' }
            ]
        },
        series: [{
            name: 'alcohol',
            data: [{{ $alcoholValue }}],
            tooltip: { valueSuffix: ' ppm' }
        }]
    });

    // Función para actualizar solo este gauge
    function actualizaralcohol() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                alcoholGauge.series[0].points[0].update(data.alcohol);
            });
    }

    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizaralcohol, 5000);
    });
</script>