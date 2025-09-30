<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-dht11-humedad"></div>
</div>

<script>
    console.log('DHT11 Humd value:', {{ $humedadValue ?? 0 }});

    document.addEventListener('DOMContentLoaded', function() {
        const humedadValue = {{ $humedadValue ?? 0 }};
        
        const humdGauge = Highcharts.chart('container-dht11-humedad', {
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'Humedad'
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
                name: 'Humd Interna',
                data: [humedadValue],
                tooltip: {
                    valueSuffix: ''
                },
                dataLabels: {
                    format: '{y} %',
                    borderWidth: 0,
                    color: '#000000'
                }
            }],
            credits: {
                enabled: false
            }
        });

        function actualizarHumd() {
            fetch("{{ url('/ultimo-registro-sensor') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && typeof data.humedad !== 'undefined') {
                        humdGauge.series[0].points[0].update(Number(data.humedad));
                    }
                })
                .catch(error => {
                    console.log('Error en actualización:', error);
                });
        }

        //5 segundos
        setInterval(actualizarHumd, 5000);
    });
</script>