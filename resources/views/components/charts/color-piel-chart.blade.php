<div class="bg-white p-4 rounded-lg shadow">
    <div id="colorPielChartContainer" style="width:100%; height:400px;"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const chartData = @json($chartData ?? []);
        console.log('Datos procesados:', chartData);

        const categories = chartData.map(item => item.name);
        const dataValues = chartData.map(item => item.y);

        Highcharts.chart('colorPielChartContainer', {
            chart: {
                type: 'column',
                backgroundColor: '#f9fafb'
            },
            title: {
                text: 'Registros por Mes - {{ date("Y") }}',
                style: { color: '#1f2937', fontWeight: 'bold' }
            },
            xAxis: {
                categories: categories,
                title: { text: 'Mes' },
                labels: { rotation: -45 }
            },
            yAxis: {
                min: 0,
                title: { text: 'Cantidad de registros' },
                allowDecimals: false
            },
            series: [{
                name: 'Registros',
                data: dataValues,
                color: '#3b82f6',
                dataLabels: {
                    enabled: true,
                    format: '{point.y}',
                    style: {
                        color: '#000',
                        fontSize: '12px',
                        textOutline: 'none'
                    }
                }
            }],
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: 'Total: <b>{point.y}</b> registros'
            },
            credits: { enabled: false }
        });
    });
    </script>
</div>
