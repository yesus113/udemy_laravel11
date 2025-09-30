<div class="bg-white rounded-lg shadow-lg p-6">
    <!-- Título y controles -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Distribución de Tipos de Piel</h2>
            <p class="text-gray-600">
                Sensor TCS3200 - Año: <span class="font-semibold">{{ $chartYear ?? 0}}</span>
                @if(!($hasRealData ?? false))
                <span class="ml-2 px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded">Datos de Ejemplo</span>
                @endif
            </p>
        </div>
        <div class="text-sm text-gray-500">
            Series: <span class="font-semibold">{{ $totalSeries ?? 0}}</span>
        </div>
    </div>

    <!-- Gráfico -->
    <div id="tipoPielChartContainer">
        <div id="tipoPielChart" style="min-height: 400px;"></div>
    </div>

    <!-- Debug Info -->
    <div class="mt-4 p-3 bg-gray-100 rounded text-xs">
        <strong>DEBUG INFO:</strong> 
        User ID: {{ Auth::id() }} | 
        Year: {{ $chartYear ?? 0}} | 
        Has Real Data: {{ $hasRealData ?? 0 ? 'YES' : 'NO' }} | 
        Total Series: {{ $totalSeries ?? 0}}
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ✅ VALIDACIÓN SEGURA de los datos
    const chartData = @json($chartData ?? []);
   const chartYear = @json($chartYear ?? (new DateTime())->format('Y'));
    const hasRealData = @json($hasRealData ?? false);
    
    console.log('📊 TipoPielChart - Inicializando...', {
        año: chartYear,
        datosReales: hasRealData,
        series: chartData,
        conteoSeries: Array.isArray(chartData) ? chartData.length : 0
    });

    // Validar que chartData sea un array
    if (!Array.isArray(chartData)) {
        console.error('❌ ERROR: chartData no es un array:', chartData);
        return;
    }

    // Configuración del gráfico
    Highcharts.chart('tipoPielChart', {
        chart: {
            type: 'column',
            backgroundColor: 'transparent',
            height: 400
        },
        title: {
            text: hasRealData ? 'Distribución de Tipos de Piel por Mes' : 'Datos de Ejemplo - Gráfico de Demostración',
            style: { fontSize: '16px', fontWeight: 'bold' }
        },
        subtitle: {
            text: `Año ${chartYear} | Sensor TCS3200`,
            style: { color: '#666' }
        },
        xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 
                        'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            crosshair: true,
            title: { text: 'Meses' }
        },
        yAxis: {
            min: 0,
            title: { text: 'Cantidad de Registros' },
            gridLineWidth: 1
        },
        tooltip: {
            headerFormat: '<span style="font-size:12px"><b>{point.key}</b></span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                         '<td style="padding:0"><b>{point.y} registros</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0,
                borderRadius: 3,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}',
                    style: { 
                        fontSize: '10px',
                        textOutline: 'none'
                    }
                }
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom',
            itemStyle: { fontSize: '11px' }
        },
        credits: { enabled: false },
        series: chartData
    });

    console.log('✅ Gráfico inicializado correctamente');
});
</script>