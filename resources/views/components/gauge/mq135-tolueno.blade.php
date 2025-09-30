<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-tolueno"></div>
</div>

<script>
    console.log('tolueno value:', {{ $toluenoValue ?? 0 }});

    document.addEventListener('DOMContentLoaded', function() {
        const toluenoValue = {{$toluenoValue ?? 0 }};
        
        const toluenoGauge = Highcharts.chart('container-mq135-tolueno', {
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'tolueno'
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
                name: 'tolueno',
                data: [toluenoValue],
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

        function actualizarTolueno() {
            fetch("{{ url('/ultimo-registro-sensor') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && typeof data.tolueno !== 'undefined') {
                        toluenoGauge.series[0].points[0].update(Number(data.tolueno));
                    }
                })
                .catch(error => {
                    console.log('Error en actualización:', error);
                });
        }

        //5 segundos
        setInterval(actualizarTolueno, 5000);
    });
</script>
