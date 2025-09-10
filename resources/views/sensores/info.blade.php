@extends('dashboard.master')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto">
        <h2 class="text-center text-xl font-bold mb-6">DESCRIPCIÓN DE LOS SENSORES Y TIPOS DE PIEL</h2>

        <div class="space-y-6">
            <!-- Repite este bloque por cada sensor -->
            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/dht11.jpg') }}" alt="Sensor DHT11" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    DHT11: Mide la temperaturay humedad ambiente, que puede influir en los efectos de la exposición solar.
                    <span class="font-bold">CARACTERISTICAS</span>:
                    <span class="font-medium">Voltaje de operación:</span> 3V - 5V DC,
                    <span class="font-medium">Rango de medición de temperatura:</span> 0 a 50 °C.
                    <span class="font-medium">Rango de medición de humedad:</span> de 20% RH a 90% RH.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/lm35.jpg') }}" alt=" Sensor LM35" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    LM35: Es un dispositivo preciso para medir la temperatura en grados Celsius. Se utiliza comúnmente en
                    aplicaciones
                    que requieren monitoreo constante de la temperatura en diferentes ambientes.
                    <span class="font-bold">CARACTERISTICAS</span>:
                    <span class="font-medium">Voltaje de operación:</span> 4V - 30V (5 V Recomendado),
                    <span class="font-medium">Rango de medición de temperatura:</span> -55 °C a +150 °C.
                    <span class="font-medium">Precisión en el rango de -10 °C hasta +85 °C:</span> ±0.5 °C.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/mq135.png') }}" alt=" Sensor MQ135"
                    class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    MQ135: Este sensor es capaz de detectar concentraciones bajas de gases tóxicos, con un tiempo de
                    respuesta menor a 10 segundos.
                    Es ideal para aplicaciones de monitoreo ambiental en espacios interiores.
                    <span class="font-bold">CARACTERISTICAS</span>:
                    <span class="font-medium">Voltaje de operación:</span> 5V,
                    <span class="font-medium">Gases detectados:</span> Amoníaco, alcohol, benceno, CO₂, entre otros.
                    <span class="font-medium">Humedad de operación:</span> 5% a 95% RH.
                </p>
            </div>
            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/guva.jpg') }}" alt=" Sensor GUVA" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    GUVA-S12SD: Es un dispositivo electrónico diseñado para detectar la radiación ultravioleta (UV) de la
                    luz solar.
                    <span class="font-bold">CARACTERISTICAS</span>:
                    <span class="font-medium">Voltaje de operación:</span> 2.7V - 5.5V DC.
                </p>
            </div>
            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/fotocelda.jpg') }}" alt=" Sensor LDR"
                    class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    LDR: Un LDR es un dispositivo cuya resistencia varía de acuerdo con la cantidad de luz que reciba.
                    <span class="font-bold">CARACTERISTICAS</span>:
                    <span class="font-medium">Voltaje de operación:</span> 3.3V - 5.5V DC,
                    <span class="font-medium"></span> Potenciómetro para ajuste de comparador.
                </p>
            </div>
            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/sensores/tcs3200.jpg') }}" alt=" Sensor COLOR"
                    class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    TCS3200: Es un componente electrónico diseñado para detectar y medir la intensidad de diferentes colores
                    de luz. Es como un "ojo electrónico" que puede distinguir entre el rojo, verde y azul, los colores
                    primarios de la luz.
                    <span class="font-bold">CARACTERISTICAS</span>:
                    <span class="font-medium">Voltaje de operación:</span> 3 - 5V DC,
                    <span class="font-medium">Sensibilidad</span> Puede detectar una amplia gama de colores.
                </p>
            </div>
            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/piel/tipo1.jpg') }}" alt="TIPO 1" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Tipo 1: La piel se quema con gran facilidad y nunca o casi nunca se broncea.
                </p>
            </div>
            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/piel/tipo2.jpg') }}" alt="TIPO 2" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Tipo 2: La piel se quema con facilidad y se broncea lentamente.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/piel/tipo3.jpg') }}" alt="TIPO 3" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Tipo 3: La piel no se quema con facilidad, sino que se broncea.
                </p>
            </div>

             <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/piel/tipo4.jpg') }}" alt="TIPO 4" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Tipo 4: La piel casi nunca se quema, y se broncea con facilidad (tipo de piel mediterráneo).
                </p>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/piel/tipo5.jpg') }}" alt="TIPO 5" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Tipo 5: La piel nunca se quema y es naturalmente más oscura.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('static/img/piel/tipo6.jpg') }}" alt="TIPO 6" class="w-24 h-24 object-contain">
                <p class="text-justify text-sm">
                    Tipo 6: La piel nunca se
quema y es naturalmente oscura.
                </p>
            </div>
        </div>
    </div>
@endsection
