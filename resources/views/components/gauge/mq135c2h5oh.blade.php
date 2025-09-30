<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-mq135-C2H5OH"></div>
</div>

<script>
    console.log('C2H5OH value:', {{ $C2H5OHValue ?? 0 }});

    document.addEventListener('DOMContentLoaded', function() {
        const C2H5OHValue = {{$C2H5OHValue ?? 0 }};
        
        const C2H5OHGauge = Highcharts.chart('container-mq135-C2H5OH', {
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'Etanol'
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
                name: 'C2H5OH',
                data: [C2H5OHValue],
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

        function actualizarC2H5OH() {
            fetch("{{ url('/ultimo-registro-sensor') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && typeof data.C2H5OH !== 'undefined') {
                        C2H5OHGauge.series[0].points[0].update(Number(data.C2H5OH));
                    }
                })
                .catch(error => {
                    console.log('Error en actualización:', error);
                });
        }

        //5 segundos
        setInterval(actualizarC2H5OH, 5000);
    });
</script>
