<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-lm35"></div>
</div>

<script>
    console.log('LM35 value:', {{ $lm35Value ?? 0 }});

    document.addEventListener('DOMContentLoaded', function() {
        const lm35Value = {{ $lm35Value ?? 0 }};
        
        const lm35Gauge = Highcharts.chart('container-lm35', {
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'Temperatura Interna'
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
                name: 'LM35',
                data: [lm35Value],
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

        function actualizarLM35() {
            fetch("{{ url('/ultimo-registro-sensor') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && typeof data.lm35 !== 'undefined') {
                        lm35Gauge.series[0].points[0].update(Number(data.lm35));
                    }
                })
                .catch(error => {
                    console.log('Error en actualización:', error);
                });
        }

        //5 segundos
        setInterval(actualizarLM35, 5000);
    });
</script>
