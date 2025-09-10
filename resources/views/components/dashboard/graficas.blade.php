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
// Datos iniciales desde PHP
let temperaturaActual = {{ $temperatura ?? 0}};
let humedadActual = {{ $humedad ?? 0}};
//
let CO2Actual = {{ $mq135['air_CO2'] ?? 0}};
let NH3Actual = {{ $mq135['air_NH3'] ?? 0}};
let C2H5OHActual = {{ $mq135['air_C2H5OH'] ?? 0}};
let toluenoActual = {{ $mq135['air_tolueno'] ?? 0}};
let NOxActual = {{ $mq135['air_NOx'] ?? 0}};
let alcoholActual = {{ $mq135['air_alcohol'] ?? 0}};
//
let FTActual = {{ $foto_resist ?? 0}};
//lm35
let lm35Actual = {{$lm35 ?? 0}};
let guvaActual = {{$guva ?? 0}};


// Inicializar gráficas
function initGraficas() {

    // Gráfico de Temperatura
    Highcharts.chart('container-dht-temp', {
        chart: { type: 'gauge' },
        title: { text: 'Temperatura Ambiente ' },
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
                { from: 0, to: 30, color: '#2ecc71' },  // Azul (frío)
                { from: 30, to: 60, color: '#e67e22' }, // Verde (normal)
                { from: 60, to: 100, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'Temperatura',
            data: [temperaturaActual],
            tooltip: { valueSuffix: ' °C' }
        }]
    });

    // Gráfico de Humedad
    Highcharts.chart('container-dht-humd', {
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
                { from: 0, to: 30, color: '#e67e22' },  // Naranja (seco)
                { from: 30, to: 70, color: '#2ecc71' }, // Verde (ideal)
                { from: 70, to: 100, color: '#3498db' } // Azul (húmedo)
            ]
        },
        series: [{
            name: 'Humedad',
            data: [humedadActual],
            tooltip: { valueSuffix: ' %' }
        }]
    });
    
    Highcharts.chart('container-mq135-CO2', {
        chart: { type: 'gauge' },
        title: { text: 'C02' },
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
                { from: 15000000, to: 35000000, color: '#3498db' },  // Azul (frío)
                { from: 0, to: 15000000, color: '#2ecc71' }, // Verde (normal)
                { from: 35000000, to: 50000000, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'CO2',
            data: [CO2Actual],
            tooltip: { valueSuffix: 'ppm' }
        }]
    });

    Highcharts.chart('container-mq135-NH3', {
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
                { from: 500000000, to:1000000000, color: '#3498db' },  // Azul (frío)
                { from: 0, to: 500000000, color: '#2ecc71' }, // Verde (normal)
                { from: 1000000000, to: 1500000000, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'NH3',
            data: [NH3Actual],
            tooltip: { valueSuffix: 'ppm' }
        }]
    });

    Highcharts.chart('container-mq135-C2H5OH', {
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
                { from: 250000000, to: 750000000, color: '#3498db' },  // Azul (frío)
                { from: 0, to: 250000000, color: '#2ecc71' }, // Verde (normal)
                { from: 750000000, to: 1000000000, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'C2H5OH',
            data: [C2H5OHActual],
            tooltip: { valueSuffix: 'ppm' }
        }]
    });

    Highcharts.chart('container-mq135-tolueno', {
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
                { from: 25000000, to: 70000000, color: '#3498db' },  // Azul (frío)
                { from: 0, to: 25000000, color: '#2ecc71' }, // Verde (normal)
                { from: 70000000, to: 100000000, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'tolueno',
            data: [toluenoActual],
            tooltip: { valueSuffix: 'ppm' }
        }]
    });

    Highcharts.chart('container-mq135-NOx', {
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
                { from: 200000000, to: 400000000, color: '#3498db' },  // Azul (frío)
                { from: 0, to: 200000000, color: '#2ecc71' }, // Verde (normal)
                { from: 400000000, to: 1000000000, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'NOx',
            data: [C2H5OHActual],
            tooltip: { valueSuffix: 'ppm' }
        }]
    });

    Highcharts.chart('container-mq135-alcohol', {
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
            title: { text: '%' },
            plotBands: [
                { from: 400000000, to: 800000000, color: '#3498db' },  // Azul (frío)
                { from: 0, to: 400000000, color: '#2ecc71' }, // Verde (normal)
                { from: 800000000, to: 1000000000, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'alcohol',
            data: [C2H5OHActual],
            tooltip: { valueSuffix: '%' }
        }]
    });

    Highcharts.chart('container-FT', {
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
                { from: 0, to: 300, color: '#3498db' },  // Azul (frío)
                { from: 300, to: 600, color: '#2ecc71' }, // Verde (normal)
                { from: 600, to: 1000, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'FT',
            data: [FTActual],
            tooltip: { valueSuffix: 'LX' }
        }]
    });

    Highcharts.chart('container-lm35', {
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
                { from: 0, to: 30, color: '#3498db' },  // Azul (frío)
                { from: 30, to: 60, color: '#2ecc71' }, // Verde (normal)
                { from: 60, to: 100, color: '#e74c3c' }  // Rojo (caliente)
            ]
        },
        series: [{
            name: 'lm35',
            data: [lm35Actual],
            tooltip: { valueSuffix: '°C' }
        }]
    });

    Highcharts.chart('container-guva', {
        chart: { type: 'gauge' },
        title: { text: 'INDICE UV' },
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
                { from: 0, to: 2, color: '#3498db' },  // Azul (frío)
                { from: 2, to: 5, color: '#2ecc71' }, // Verde (normal)
                { from: 5, to: 7, color: '#e74c3c' },  // Rojo (caliente)
                { from: 7, to: 10, color: '#e74c3c' },
                { from: 10, to: 12, color: '#e74c3c' } 
            ]
        },
        series: [{
            name: 'guva',
            data: [guvaActual],
            tooltip: { valueSuffix: '°C' }
        }]
    });
}

// Función para actualizar datos
function actualizarDatos() {
    fetch('/ultimo-registro-sensor')
        .then(response => response.json())
        .then(data => {
            // Actualizar variables
            temperaturaActual = data.temperatura;
            humedadActual = data.humedad;
            CO2Actual = data.CO2;
            NH3Actual = data.NH3;
            C2H5OHActual = data.C2H5OH;
            toluenoActual = data.tolueno;
            NOxActual = data.NOx;
            alcoholActual = data.alcohol;
            FTActual = data.FT;
            lm35Actual = data.lm35;
            guvaActual = data.guva;
            
            
            // Actualizar gráficas
            Highcharts.charts[0].series[0].points[0].update(temperaturaActual);
            Highcharts.charts[1].series[0].points[0].update(humedadActual);
            Highcharts.charts[2].series[0].points[0].update(CO2Actual);
            Highcharts.charts[3].series[0].points[0].update(NH3Actual);
            Highcharts.charts[4].series[0].points[0].update(C2H5OHActual);
            Highcharts.charts[5].series[0].points[0].update(toluenoActual);
            Highcharts.charts[6].series[0].points[0].update(NOxActual);
            Highcharts.charts[7].series[0].points[0].update(alcoholActual);
            Highcharts.charts[8].series[0].points[0].update(FTActual);
            Highcharts.charts[9].series[0].points[0].update(lm35Actual);
            Highcharts.charts[10].series[0].points[0].update(guvaActual);
        });
}

// Iniciar gráficas cuando la página cargue
document.addEventListener('DOMContentLoaded', function() {
    initGraficas();
    setInterval(actualizarDatos, 5000);
});
</script>