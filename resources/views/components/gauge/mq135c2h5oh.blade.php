<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-C2H5OH"></div>
</div>

<script>
    // Inicializar el gráfico
    const C2H5OHGauge = Highcharts.chart('container-mq135-C2H5OH', {
        chart: { type: 'gauge' },
        title: { text: 'Etanol' },
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
            name: 'C2H5OH',
            data: [{{ $C2H5OHValue }}],
            tooltip: { valueSuffix: ' ppm' }
        }]
    });

    // Función para actualizar solo este gauge
    function actualizarC2H5OH() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                C2H5OHGauge.series[0].points[0].update(data.C2H5OH);
            });
    }

    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizarC2H5OH, 5000);
    });
</script>