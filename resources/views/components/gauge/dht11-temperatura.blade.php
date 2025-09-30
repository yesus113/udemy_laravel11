<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-dht11-temperatura"></div>
</div>

<script>
    console.log('DHT11 Temp value:', {{ $temperaturaValue ?? 0 }});

    document.addEventListener('DOMContentLoaded', function() {
        const temperaturaValue = {{ $temperaturaValue ?? 0 }};
        
        const tempGauge = Highcharts.chart('container-dht11-temperatura', {
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'Temperatura'
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
                    text: ''
                },
                plotBands: [{
                    from: 0,
                    to: 300,
                    color: '#3498db',
                    thickness: 20
                }, {
                    from: 300,
                    to: 600,
                    color: '#2ecc71',
                    thickness: 20
                }, {
                    from: 600,
                    to: 1000,
                    color: '#e74c3c',
                    thickness: 20
                }]
            },
            series: [{
                name: 'Temp Interna',
                data: [temperaturaValue],
                tooltip: {
                    valueSuffix: ''
                },
                dataLabels: {
                    format: '{y} C',
                    borderWidth: 0,
                    color: '#000000'
                }
            }],
            credits: {
                enabled: false
            }
        });

        function actualizarTemp() {
            fetch("{{ url('/ultimo-registro-sensor') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && typeof data.temperatura !== 'undefined') {
                        tempGauge.series[0].points[0].update(Number(data.temperatura));
                    }
                })
                .catch(error => {
                    console.log('Error en actualización:', error);
                });
        }

        //5 segundos
        setInterval(actualizarTemp, 5000);
    });
</script>