<div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
    <div id="container-foto"></div>
</div>

<script>
    console.log('Foto value:', {{ $fotoValue ?? 0 }});

    document.addEventListener('DOMContentLoaded', function() {
        const fotoValue = {{ $fotoValue ?? 0 }};
        
        const fotoGauge = Highcharts.chart('container-foto', {
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'Intensidad de la Luz'
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
                    text: 'Lux'
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
                name: 'Intensidad Lumínica',
                data: [fotoValue],
                tooltip: {
                    valueSuffix: ' Lux'
                },
                dataLabels: {
                    format: '{y} Lux',
                    borderWidth: 0,
                    color: '#000000'
                }
            }],
            credits: {
                enabled: false
            }
        });

        function actualizarfoto() {
            fetch("{{ url('/ultimo-registro-sensor') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && typeof data.FT !== 'undefined') {
                        fotoGauge.series[0].points[0].update(Number(data.FT));
                    }
                })
                .catch(error => {
                    console.log('Error en actualización:', error);
                });
        }

        //5 segundos
        setInterval(actualizarfoto, 5000);
    });
</script>