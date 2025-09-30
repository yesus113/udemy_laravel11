<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-NH3"></div>
</div>

<script>
    console.log('NH3 value:', {{ $NH3Value ?? 0 }});

    document.addEventListener('DOMContentLoaded', function() {
        const NH3Value = {{$NH3Value ?? 0 }};
        
        const NH3Gauge = Highcharts.chart('container-mq135-NH3', {
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'NH3'
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
                name: 'NH3',
                data: [NH3Value],
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

        function actualizarNH3() {
            fetch("{{ url('/ultimo-registro-sensor') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && typeof data.NH3 !== 'undefined') {
                        NH3Gauge.series[0].points[0].update(Number(data.NH3));
                    }
                })
                .catch(error => {
                    console.log('Error en actualización:', error);
                });
        }

        //5 segundos
        setInterval(actualizarNH3, 5000);
    });
</script>