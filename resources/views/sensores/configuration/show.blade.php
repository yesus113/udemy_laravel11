@extends('dashboard.master')

@section('content')
<div class="container my-4">
    <div class="card shadow-lg border-0">
        <div class="card-body bg-dark text-white rounded-top">
            <h2 class="card-title mb-3">
                <i class="fas fa-microchip"></i> {{ $config->con_equipo }}
            </h2>

            <p class="mb-1">
                <i class="far fa-calendar-alt"></i> <strong>Fecha de alta:</strong> {{ $config->con_fechaAlta }}
            </p>
            <p class="mb-1">
                <i class="fas fa-map-marker-alt"></i> <strong>Latitud:</strong> {{ $config->con_latitud }}
            </p>
            <p class="mb-3">
                <i class="fas fa-map-marker-alt"></i> <strong>Longitud:</strong> {{ $config->con_longitud }}
            </p>

            <hr class="bg-light">

            <p>
                <i class="fas fa-user"></i> <strong>Usuario:</strong> {{ $config->user->name }}
            </p>

            <div class="mt-3">
                {!! nl2br(e($config->content)) !!}
            </div>
        </div>

        <div class="card-footer bg-light text-center">
            <!-- Contenedor del mapa -->
            <div id="map" style="height: 250px; width: 100%; max-width: 500px; margin: auto; border-radius: 10px; overflow: hidden;"></div>
        </div>
    </div>
</div>

<script>
    const lat = {{ $config->con_latitud ?? '0' }};
    const lng = {{ $config->con_longitud ?? '0' }};

    const map = L.map('map').setView([lat, lng], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup('Ubicación')
        .openPopup();
</script>
@endsection
