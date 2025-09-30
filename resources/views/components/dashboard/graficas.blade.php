<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-dht-temp">
        </div>
    </div>
    
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-dht-humd" >

        </div>
    </div>

    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-mq135-CO2" >
        </div>
    </div>

    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-mq135-NH3" >
        </div>
    </div>
</div>
<br>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-mq135-C2H5OH">
        </div>
    </div>
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-mq135-tolueno">
        </div>
    </div>
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-mq135-NOx">
        </div>
    </div>
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-mq135-alcohol"></div>
    </div>
</div>
<br>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-FT">
        </div>
    </div>
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-lm35">
        </div>
    </div>
    <div class="bg-gray-100 p-4 rounded h-72 overflow-hidden">
        <div id="container-guva" >
        </div>
    </div>
</div>

<script>
const gauges = {};

function initGraficas() {
    console.log('Inicializando gráficas...');
    
    try {
        gauges.temperatura = Highcharts.chart('container-dht-temp', {
            chart: { type: 'gauge' },
            title: { text: 'Temperatura Ambiente' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 100,
                title: { text: '°C' },
                plotBands: [
                    { from: 0, to: 30, color: '#2ecc71' },
                    { from: 30, to: 60, color: '#e67e22' },
                    { from: 60, to: 100, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'Temperatura',
                data: [{{ $temperatura ?? 0 }}],
                tooltip: { valueSuffix: ' °C' }
            }]
        });

        // Humedad
        gauges.humedad = Highcharts.chart('container-dht-humd', {
            chart: { type: 'gauge' },
            title: { text: 'Humedad Ambiente' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 100,
                title: { text: '%' },
                plotBands: [
                    { from: 0, to: 30, color: '#e67e22' },
                    { from: 30, to: 70, color: '#2ecc71' },
                    { from: 70, to: 100, color: '#3498db' }
                ]
            },
            series: [{
                name: 'Humedad',
                data: [{{ $humedad ?? 0 }}],
                tooltip: { valueSuffix: ' %' }
            }]
        });

        
        gauges.co2 = Highcharts.chart('container-mq135-CO2', {
            chart: { type: 'gauge' },
            title: { text: 'CO2' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 50000000,
                title: { text: 'ppm' },
                plotBands: [
                    { from: 0, to: 15000000, color: '#2ecc71' },
                    { from: 15000000, to: 35000000, color: '#3498db' },
                    { from: 35000000, to: 50000000, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'CO2',
                data: [{{ $mq135['air_CO2'] ?? 0 }}],
                tooltip: { valueSuffix: ' ppm' }
            }]
        });

        // NH3
        gauges.nh3 = Highcharts.chart('container-mq135-NH3', {
            chart: { type: 'gauge' },
            title: { text: 'NH3' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 1500000000,
                title: { text: 'ppm' },
                plotBands: [
                    { from: 0, to: 500000000, color: '#2ecc71' },
                    { from: 500000000, to: 1000000000, color: '#3498db' },
                    { from: 1000000000, to: 1500000000, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'NH3',
                data: [{{ $mq135['air_NH3'] ?? 0 }}],
                tooltip: { valueSuffix: ' ppm' }
            }]
        });

        // C2H5OH
        gauges.c2h5oh = Highcharts.chart('container-mq135-C2H5OH', {
            chart: { type: 'gauge' },
            title: { text: 'C2H5OH' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 1000000000,
                title: { text: 'ppm' },
                plotBands: [
                    { from: 0, to: 250000000, color: '#2ecc71' },
                    { from: 250000000, to: 750000000, color: '#3498db' },
                    { from: 750000000, to: 1000000000, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'C2H5OH',
                data: [{{ $mq135['air_C2H5OH'] ?? 0 }}],
                tooltip: { valueSuffix: ' ppm' }
            }]
        });

        // Tolueno
        gauges.tolueno = Highcharts.chart('container-mq135-tolueno', {
            chart: { type: 'gauge' },
            title: { text: 'Tolueno' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 100000000,
                title: { text: 'ppm' },
                plotBands: [
                    { from: 0, to: 25000000, color: '#2ecc71' },
                    { from: 25000000, to: 70000000, color: '#3498db' },
                    { from: 70000000, to: 100000000, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'Tolueno',
                data: [{{ $mq135['air_tolueno'] ?? 0 }}],
                tooltip: { valueSuffix: ' ppm' }
            }]
        });

        // NOx
        gauges.nox = Highcharts.chart('container-mq135-NOx', {
            chart: { type: 'gauge' },
            title: { text: 'NOx' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 500000000,
                title: { text: 'ppm' },
                plotBands: [
                    { from: 0, to: 200000000, color: '#2ecc71' },
                    { from: 200000000, to: 400000000, color: '#3498db' },
                    { from: 400000000, to: 500000000, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'NOx',
                data: [{{ $mq135['air_NOx'] ?? 0 }}],
                tooltip: { valueSuffix: ' ppm' }
            }]
        });

        // Alcohol
        gauges.alcohol = Highcharts.chart('container-mq135-alcohol', {
            chart: { type: 'gauge' },
            title: { text: 'Alcohol' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 1000000000,
                title: { text: 'ppm' },
                plotBands: [
                    { from: 0, to: 400000000, color: '#2ecc71' },
                    { from: 400000000, to: 800000000, color: '#3498db' },
                    { from: 800000000, to: 1000000000, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'Alcohol',
                data: [{{ $mq135['air_alcohol'] ?? 0 }}],
                tooltip: { valueSuffix: ' ppm' }
            }]
        });

        // FT (Foto-resistencia)
        gauges.ft = Highcharts.chart('container-FT', {
            chart: { type: 'gauge' },
            title: { text: 'Intensidad de luz' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 1000,
                title: { text: 'LX' },
                plotBands: [
                    { from: 0, to: 300, color: '#3498db' },
                    { from: 300, to: 600, color: '#2ecc71' },
                    { from: 600, to: 1000, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'FT',
                data: [{{ $foto_resist ?? 0 }}],
                tooltip: { valueSuffix: ' LX' }
            }]
        });

        // LM35
        gauges.lm35 = Highcharts.chart('container-lm35', {
            chart: { type: 'gauge' },
            title: { text: 'Temperatura interna' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 100,
                title: { text: '°C' },
                plotBands: [
                    { from: 0, to: 30, color: '#3498db' },
                    { from: 30, to: 60, color: '#2ecc71' },
                    { from: 60, to: 100, color: '#e74c3c' }
                ]
            },
            series: [{
                name: 'LM35',
                data: [{{ $lm35 ?? 0 }}],
                tooltip: { valueSuffix: ' °C' }
            }]
        });

        // GUVA
        gauges.guva = Highcharts.chart('container-guva', {
            chart: { type: 'gauge' },
            title: { text: 'Índice UV' },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                size: '100%'
            },
            yAxis: {
                min: 0,
                max: 12,
                title: { text: 'UV' },
                plotBands: [
                    { from: 0, to: 2, color: '#3498db' },
                    { from: 2, to: 5, color: '#2ecc71' },
                    { from: 5, to: 7, color: '#e67e22' },
                    { from: 7, to: 10, color: '#e74c3c' },
                    { from: 10, to: 12, color: '#8b0000' }
                ]
            },
            series: [{
                name: 'GUVA',
                data: [{{ $guva ?? 0 }}],
                tooltip: { valueSuffix: ' UV' }
            }]
        });

        console.log('Todas las gráficas inicializadas correctamente', gauges);
        
    } catch (error) {
        console.error('Error inicializando gráficas:', error);
    }
}

function actualizarDatos() {
    console.log('Actualizando datos...');
    
    fetch("{{ url('/ultimo-registro-sensor') }}")
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(data => {
            console.log('Datos recibidos del API:', data);
            
            // Verificar que las gráficas existen antes de actualizar
            if (gauges.temperatura && gauges.temperatura.series && gauges.temperatura.series[0]) {
                gauges.temperatura.series[0].points[0].update(parseFloat(data.temperatura) || 0);
            }
            if (gauges.humedad && gauges.humedad.series && gauges.humedad.series[0]) {
                gauges.humedad.series[0].points[0].update(parseFloat(data.humedad) || 0);
            }
            if (gauges.co2 && gauges.co2.series && gauges.co2.series[0]) {
                gauges.co2.series[0].points[0].update(parseFloat(data.CO2) || 0);
            }
            if (gauges.nh3 && gauges.nh3.series && gauges.nh3.series[0]) {
                gauges.nh3.series[0].points[0].update(parseFloat(data.NH3) || 0);
            }
            if (gauges.c2h5oh && gauges.c2h5oh.series && gauges.c2h5oh.series[0]) {
                gauges.c2h5oh.series[0].points[0].update(parseFloat(data.C2H5OH) || 0);
            }
            if (gauges.tolueno && gauges.tolueno.series && gauges.tolueno.series[0]) {
                gauges.tolueno.series[0].points[0].update(parseFloat(data.tolueno) || 0);
            }
            if (gauges.nox && gauges.nox.series && gauges.nox.series[0]) {
                gauges.nox.series[0].points[0].update(parseFloat(data.NOx) || 0);
            }
            if (gauges.alcohol && gauges.alcohol.series && gauges.alcohol.series[0]) {
                gauges.alcohol.series[0].points[0].update(parseFloat(data.alcohol) || 0);
            }
            if (gauges.ft && gauges.ft.series && gauges.ft.series[0]) {
                gauges.ft.series[0].points[0].update(parseFloat(data.FT) || 0);
            }
            if (gauges.lm35 && gauges.lm35.series && gauges.lm35.series[0]) {
                gauges.lm35.series[0].points[0].update(parseFloat(data.lm35) || 0);
            }
            if (gauges.guva && gauges.guva.series && gauges.guva.series[0]) {
                gauges.guva.series[0].points[0].update(parseFloat(data.guva) || 0);
            }
            
            console.log('Datos actualizados correctamente');
        })
        .catch(error => {
            console.error('Error actualizando datos:', error);
        });
}

// Iniciar gráficas cuando la página cargue
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado, inicializando gráficas...');
    initGraficas();
    
    setTimeout(() => {
        console.log('Iniciando actualización automática cada 5 segundos...');
        setInterval(actualizarDatos, 5000);
        
        actualizarDatos();
    }, 1000);
});
</script>