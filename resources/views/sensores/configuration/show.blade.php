@extends('dashboard.master')

@section('content')
    <h1>{{ $config->con_equipo }}</h1>

    <span>{{ $config->con_fechaAlta }}</span><br>
    <span>Latitud: {{ $config->con_latitud }}</span><br>
    <span>Longitud: {{ $config->con_longitud }}</span><br>

    <div>
        Usuario: {{ $config->con_user }}
    </div>

    <div>
        {{ $config->content }}
    </div>

    <!-- Contenedor del mapa -->
    <div id="map" style="height: 400px; margin-top: 20px;"></div>

    <script>
        // Verifica si las coordenadas existen
        const lat = {{ $config->con_latitud ?? '0' }};
        const lng = {{ $config->con_longitud ?? '0' }};

        
        // Inicializa el mapa centrado en las coordenadas
        const map = L.map('map').setView([lat, lng], 15); // Zoom calle

        // Carga el mapa base de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Agrega un marcador en la ubicación
        L.marker([lat, lng]).addTo(map)
            .bindPopup('Ubicación')
            .openPopup();
    </script>
@endsection
