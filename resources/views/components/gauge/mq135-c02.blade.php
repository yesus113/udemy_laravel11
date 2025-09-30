<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-CO2"></div>
</div>


<script>
    console.log('CO2 value:', {{ $co2Value ?? 0 }});

    document.addEventListener('DOMContentLoaded', function() {
        const co2Value = {{$co2Value ?? 0 }};
        
        const co2Gauge = Highcharts.chart('container-mq135-CO2', {
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'CO2'
            },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 500000000,
                title: {
                    text: ''
                },
                plotBands: [{
                    from: 150000000,
                    to: 350000000,
                    color: '#3498db',
                    
                }, {
                    from: 0,
                    to: 150000000,
                    color: '#2ecc71',
                    
                }, {
                    from: 350000000,
                    to: 500000000,
                    color: '#e74c3c',
                    
                }]
            },
            series: [{
                name: 'CO2',
                data: [co2Value],
                tooltip: {
                    valueSuffix: ''
                },
                dataLabels: {
                    format: '{y} ppm',
                    borderWidth: 0,
                    color: '#000000'
                }
            }],
            credits: {
                enabled: false
            }
        });

        function actualizarCO2() {
            fetch("{{ url('/ultimo-registro-sensor') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && typeof data.CO2 !== 'undefined') {
                        co2Gauge.series[0].points[0].update(Number(data.CO2));
                    }
                })
                .catch(error => {
                    console.log('Error en actualización:', error);
                });
        }

        //5 segundos
        setInterval(actualizarCO2, 5000);
    });
</script>
