@extends('dashboard.master')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto">
        <h2 class="text-center text-xl font-bold mb-6">DESCRIPCIÓN DE LOS SENSORES Y MÉTRICAS</h2>

        <div class="space-y-6">
            <!-- Repite este bloque por cada sensor -->
            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/dht11.jpg') }}" alt="Sensor DHT11" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Utilizado para medir la temperatura y humedad habiente en el área de servicios para usuario.
                    <span class="font-bold">TEMPERATURA</span>,
                    <span class="font-medium">Rango:</span> de 0ºC a 50ºC,
                    <span class="font-medium">Precisión:</span> a 25ºC ± 2ºC.
                    <span class="font-bold">HUMEDAD</span>
                    <span class="font-medium">Rango:</span> de 20% RH a 90% RH,
                    <span class="font-medium">Precisión:</span> entre 0ºC y 50ºC ± 5% RH.
                    Es un sensor muy utilizado cuyas dos características más importantes son la fiabilidad y estabilidad.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/lm35.jpg') }}" alt=" Sensor LM35" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Utilizado para medir la temperatura y humedad habiente en el área de servicios para usuario.
                    <span class="font-bold">TEMPERATURA</span>,
                    <span class="font-medium">Rango:</span> de 0ºC a 50ºC,
                    <span class="font-medium">Precisión:</span> a 25ºC ± 2ºC.
                    <span class="font-bold">HUMEDAD</span>
                    <span class="font-medium">Rango:</span> de 20% RH a 90% RH,
                    <span class="font-medium">Precisión:</span> entre 0ºC y 50ºC ± 5% RH.
                    Es un sensor muy utilizado cuyas dos características más importantes son la fiabilidad y estabilidad.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/mq135.png') }}" alt=" Sensor LM35" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Utilizado para medir la temperatura y humedad habiente en el área de servicios para usuario.
                    <span class="font-bold">TEMPERATURA</span>,
                    <span class="font-medium">Rango:</span> de 0ºC a 50ºC,
                    <span class="font-medium">Precisión:</span> a 25ºC ± 2ºC.
                    <span class="font-bold">HUMEDAD</span>
                    <span class="font-medium">Rango:</span> de 20% RH a 90% RH,
                    <span class="font-medium">Precisión:</span> entre 0ºC y 50ºC ± 5% RH.
                    Es un sensor muy utilizado cuyas dos características más importantes son la fiabilidad y estabilidad.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/guva.jpg') }}" alt=" Sensor GUVA" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Utilizado para medir la temperatura y humedad habiente en el área de servicios para usuario.
                    <span class="font-bold">TEMPERATURA</span>,
                    <span class="font-medium">Rango:</span> de 0ºC a 50ºC,
                    <span class="font-medium">Precisión:</span> a 25ºC ± 2ºC.
                    <span class="font-bold">HUMEDAD</span>
                    <span class="font-medium">Rango:</span> de 20% RH a 90% RH,
                    <span class="font-medium">Precisión:</span> entre 0ºC y 50ºC ± 5% RH.
                    Es un sensor muy utilizado cuyas dos características más importantes son la fiabilidad y estabilidad.
                </p>
            </div>

        </div>
    </div>
@endsection
