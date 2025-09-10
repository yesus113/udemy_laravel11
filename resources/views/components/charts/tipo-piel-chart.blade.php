

   <div>
    <div id="tipoPielChart"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    Highcharts.chart('tipoPielChart', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Tipos de Piel por Mes'
        },
        subtitle: {
            text: 'Sensor: TCS3200'
        },
        xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            title: {
                text: null
            },
            gridLineWidth: 1,
            lineWidth: 0
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad de Registros',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            },
            gridLineWidth: 0
        },
        tooltip: {
            valueSuffix: ' registros'
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                dataLabels: {
                    enabled: true
                },
                groupPadding: 0.1
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: @json($chartData)
    });
});
</script>