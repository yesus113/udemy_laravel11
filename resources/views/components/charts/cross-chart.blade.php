<div>
    <div id="cruzes"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chartData = @json($chartConfig['data']);

        console.log("=== DEBUG Highcharts ===");
        console.log("chartData recibido:", chartData);
        console.log("Tipo:", typeof chartData);
        if (Array.isArray(chartData)) {
            console.log("Es un Array con length:", chartData.length);
        } else if (chartData && typeof chartData === 'object') {
            console.log("Es un objeto con keys:", Object.keys(chartData));
        } else {
            console.log("chartData vacío o null:", chartData);
        }

        console.log("Contenido completo:", JSON.stringify(chartData, null, 2));

        Highcharts.chart('cruzes', {
            chart: {
                type: 'line',
                zoomType: 'xy'
            },
            title: {
                text: 'Promedios Diarios de Sensores',
                align: 'left'
            },
            subtitle: {
                text: 'Últimos 7 días',
                align: 'left'
            },
            xAxis: {
                categories: chartData.labels,
                crosshair: true,
                title: {
                    text: 'Fecha'
                }
            },
            yAxis: {
                title: {
                    text: 'Valores'
                },
                min: 0,
                max: 1000,
                tickInterval: 50
            },
            tooltip: {
                shared: true,
                headerFormat: '<b>{point.key}</b><br/>',
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    marker: {
                        enabled: true,
                        radius: 4
                    }
                }
            },
            series: (chartData.datasets ?? []).map(dataset => ({
                name: dataset.label,
                data: dataset.data,
                color: dataset.borderColor,
                marker: {
                    symbol: 'circle'
                }
            })),
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    });
</script>
