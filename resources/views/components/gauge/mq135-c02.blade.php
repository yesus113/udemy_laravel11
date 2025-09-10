<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-CO2"></div>
</div>

<script>
    // Inicializar el gráfico
    const co2Gauge = Highcharts.chart('container-mq135-CO2', {
        chart: { type: 'gauge' },
        title: { text: 'Dióxido de Carbono' },
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
                { from: 25000000, to: 70000000, color: '#3498db' },
                { from: 0, to: 25000000, color: '#2ecc71' },
                { from: 70000000, to: 100000000, color: '#e74c3c' }
            ]
        },
        series: [{
            name: 'CO2',
            data: [{{ $co2Value }}],
            tooltip: { valueSuffix: ' ppm' }
        }]
    });

    // Función para actualizar solo este gauge
    function actualizarCO2() {
        fetch('/ultimo-registro-sensor')
            .then(response => response.json())
            .then(data => {
                co2Gauge.series[0].points[0].update(data.CO2);
            });
    }

    // Actualizar cada 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(actualizarCO2, 5000);
    });
</script>